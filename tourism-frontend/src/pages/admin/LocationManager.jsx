import React, { useState, useEffect } from 'react';
import axios from 'axios';

const BASE_URL = 'http://localhost:8000';

const LocationManager = () => {
    const [locations, setLocations] = useState([]);
    const [provinces, setProvinces] = useState([]);
    const [isFormOpen, setIsFormOpen] = useState(false);
    const [editingId, setEditingId] = useState(null);
    const [searchTerm, setSearchTerm] = useState('');
    const [pagination, setPagination] = useState({});
    const [currentPage, setCurrentPage] = useState(1);

    const [formData, setFormData] = useState({
        province_id: '',
        category_id: '1',
        name: '',
        address: '',
        content: '',
        latitude: '',
        longitude: '',
        is_featured: 0,
        image: null
    });

    // 1. Lấy dữ liệu
    const fetchData = async (page = 1) => {
        try {
            const resLoc = await axios.get(`${BASE_URL}/api/admin/locations?page=${page}`);
            const resProv = await axios.get(`${BASE_URL}/api/admin/provinces`);
            setLocations(resLoc.data.data || []);
            setPagination({
                current_page: resLoc.data.current_page,
                last_page: resLoc.data.last_page,
                links: resLoc.data.links
            });
            setProvinces(resProv.data);
        } catch (err) {
            console.error("Lỗi tải dữ liệu:", err);
        }
    };

    useEffect(() => {
        fetchData(currentPage);
    }, [currentPage]);

    // 2. Tìm kiếm không dấu
    const removeVietnameseTones = (str) => {
        if (!str) return "";
        return str.normalize('NFD').replace(/[\u0300-\u036f]/g, '').replace(/đ/g, 'd').replace(/Đ/g, 'D').toLowerCase();
    };

    const filteredLocations = locations.filter(loc => 
        removeVietnameseTones(loc.name).includes(removeVietnameseTones(searchTerm))
    );

    // 3. Render ảnh chống trùng storage/
    const renderImage = (path) => {
        // Nếu không có dữ liệu path
        if (!path) return "https://placehold.co/100x75?text=No+Image";
        
        // Nếu là link ảnh từ web khác
        if (path.startsWith('http')) return path;

        // Vì DB chỉ lưu "tên-file.jpg", mình phải nối thêm "storage/images/" vào giữa
        // Kết quả mong muốn: http://localhost:8000/storage/images/ha-noi-ho-hoan-kiem.jpg
        return `${BASE_URL}/storage/images/${path}`;
    };

    // 4. Xử lý Input
    const handleInputChange = (e) => {
        const { name, value, type, checked } = e.target;
        setFormData({ 
            ...formData, 
            [name]: type === 'checkbox' ? (checked ? 1 : 0) : value 
        });
    };

    // 5. Submit Form (Đã fix lỗi Latitude/Longitude must be a number)
    const handleSubmit = async (e) => {
        e.preventDefault();
        const data = new FormData();
        
        data.append('name', formData.name);
        data.append('province_id', formData.province_id);
        data.append('category_id', formData.category_id);
        data.append('address', formData.address || '');
        data.append('content', formData.content || '');
        
        // Ép kiểu số để Laravel không báo lỗi Validation
        data.append('latitude', formData.latitude ? parseFloat(formData.latitude) : '');
        data.append('longitude', formData.longitude ? parseFloat(formData.longitude) : '');
        data.append('is_featured', formData.is_featured);
        
        if (formData.image) {
            data.append('image', formData.image);
        }

        try {
            const url = editingId 
                ? `${BASE_URL}/api/admin/locations/${editingId}` 
                : `${BASE_URL}/api/admin/locations`;
            
            // Nếu là Update, một số server yêu cầu giả lập PUT bằng cách thêm _method
            if (editingId) data.append('_method', 'POST'); 

            await axios.post(url, data, {
                headers: { 'Content-Type': 'multipart/form-data' }
            });

            alert("Ngon lành cành đào! ⚽");
            resetForm();
            fetchData(currentPage);
        } catch (err) {
            const serverMsg = err.response?.data?.message || "Lỗi không xác định";
            const errors = err.response?.data?.errors;
            console.log("Chi tiết lỗi:", errors);
            alert("Lỗi: " + serverMsg);
        }
    };

    const resetForm = () => {
        setFormData({ 
            province_id: '', category_id: '1', name: '', address: '', 
            content: '', latitude: '', longitude: '', is_featured: 0, image: null 
        });
        setEditingId(null);
        setIsFormOpen(false);
    };

    const handleEdit = (loc) => {
        setEditingId(loc.id);
        setFormData({
            province_id: loc.province_id,
            category_id: loc.category_id,
            name: loc.name,
            address: loc.address || '',
            content: loc.content || '',
            latitude: loc.latitude || '',
            longitude: loc.longitude || '',
            is_featured: loc.is_featured,
            image: null
        });
        setIsFormOpen(true);
    };

    return (
        <div className="p-8 bg-gray-50 min-h-screen text-slate-800">
            {/* Header */}
            <div className="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
                <div>
                    <h2 className="text-3xl font-black italic uppercase text-slate-900 tracking-tight">Quản lý Địa điểm</h2>
                    <p className="text-[10px] font-bold text-blue-500 uppercase tracking-widest">Tra Vinh University Project</p>
                </div>
                <div className="flex gap-3">
                    <input 
                        className="px-5 py-3 rounded-2xl shadow-sm border-none outline-none focus:ring-2 focus:ring-blue-400 w-64 font-bold"
                        placeholder="Tìm tên địa điểm..."
                        value={searchTerm}
                        onChange={e => setSearchTerm(e.target.value)}
                    />
                    <button onClick={() => setIsFormOpen(true)} className="bg-blue-600 text-white px-8 py-3 rounded-2xl font-black uppercase text-xs shadow-lg hover:bg-slate-900 transition-all">
                        + Thêm mới
                    </button>
                </div>
            </div>

            {/* Form Modal */}
            {isFormOpen && (
                <div className="bg-white p-8 rounded-[2.5rem] shadow-2xl border border-blue-50 mb-10 animate-in fade-in zoom-in duration-200">
                    <form onSubmit={handleSubmit} className="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div className="md:col-span-2 space-y-4">
                            <input name="name" value={formData.name} onChange={handleInputChange} placeholder="Tên địa điểm" className="w-full p-4 bg-gray-50 rounded-2xl border-none font-bold outline-none focus:bg-white focus:ring-2 focus:ring-blue-100 transition-all" required />
                            <div className="grid grid-cols-2 gap-4">
                                <select name="province_id" value={formData.province_id} onChange={handleInputChange} className="p-4 bg-gray-50 rounded-2xl border-none font-bold text-gray-500 outline-none" required>
                                    <option value="">-- Chọn Tỉnh --</option>
                                    {provinces.map(p => <option key={p.id} value={p.id}>{p.name}</option>)}
                                </select>
                                <input name="category_id" type="number" value={formData.category_id} onChange={handleInputChange} placeholder="Mã danh mục" className="p-4 bg-gray-50 rounded-2xl border-none font-bold outline-none" />
                            </div>
                            <input name="address" value={formData.address} onChange={handleInputChange} placeholder="Địa chỉ chi tiết" className="w-full p-4 bg-gray-50 rounded-2xl border-none font-bold outline-none" />
                            <textarea name="content" value={formData.content} onChange={handleInputChange} placeholder="Mô tả nội dung (LongText)..." className="w-full p-4 bg-gray-50 rounded-2xl border-none h-40 font-bold outline-none" />
                        </div>
                        
                        <div className="bg-slate-50 p-6 rounded-[2rem] space-y-4 shadow-inner">
                            <input name="latitude" type="number" step="any" value={formData.latitude} onChange={handleInputChange} placeholder="Vĩ độ (Latitude)" className="w-full p-4 bg-white rounded-xl border-none font-mono text-sm" />
                            <input name="longitude" type="number" step="any" value={formData.longitude} onChange={handleInputChange} placeholder="Kinh độ (Longitude)" className="w-full p-4 bg-white rounded-xl border-none font-mono text-sm" />
                            
                            <div className="p-4 bg-blue-50 rounded-2xl border-2 border-dashed border-blue-100">
                                <p className="text-[10px] font-black uppercase text-blue-400 mb-2">Ảnh Thumbnail</p>
                                <input type="file" onChange={e => setFormData({...formData, image: e.target.files[0]})} className="text-[10px] w-full" />
                            </div>

                            <label className="flex items-center gap-3 p-4 bg-white rounded-xl cursor-pointer shadow-sm border border-transparent hover:border-blue-200 transition-all">
                                <input type="checkbox" name="is_featured" checked={formData.is_featured === 1} onChange={handleInputChange} className="w-5 h-5 accent-blue-600" />
                                <span className="font-black text-[10px] uppercase text-slate-600">Địa điểm nổi bật</span>
                            </label>

                            <div className="flex gap-2 pt-4">
                                <button type="submit" className="flex-1 bg-slate-900 text-white py-4 rounded-2xl font-black uppercase text-xs shadow-xl">Lưu dữ liệu</button>
                                <button type="button" onClick={resetForm} className="px-6 bg-gray-200 text-gray-500 rounded-2xl font-black uppercase text-[10px]">Hủy</button>
                            </div>
                        </div>
                    </form>
                </div>
            )}

            {/* Table */}
            <div className="bg-white rounded-[2.5rem] shadow-sm border border-gray-100 overflow-hidden">
                <table className="w-full text-left">
                    <thead className="bg-slate-900 text-[10px] font-black uppercase text-slate-400">
                        <tr>
                            <th className="p-6">Thumbnail</th>
                            <th className="p-6">Địa danh</th>
                            <th className="p-6">Tọa độ</th>
                            <th className="p-6 text-right">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody className="divide-y divide-gray-50">
                        {filteredLocations.map(loc => (
                            <tr key={loc.id} className="hover:bg-blue-50/50 transition-all">
                                <td className="p-6">
                                    <img 
                                        src={renderImage(loc.image_thumbnail)} 
                                        className="w-20 h-14 object-cover rounded-xl shadow-md border-2 border-white" 
                                        alt="" 
                                        onError={e => e.target.src = "https://placehold.co/100x75?text=Lỗi+Ảnh"} 
                                    />
                                </td>
                                <td className="p-6">
                                    <div className="font-black text-slate-800 uppercase italic text-lg">{loc.name}</div>
                                    <div className="text-[10px] text-gray-400 font-bold uppercase line-clamp-1">{loc.address}</div>
                                    {loc.is_featured === 1 && <span className="inline-block mt-1 bg-yellow-400 text-[8px] font-black px-2 py-0.5 rounded-full">NỔI BẬT</span>}
                                </td>
                                <td className="p-6 font-mono text-[10px] text-gray-400">
                                    {loc.latitude}<br/>{loc.longitude}
                                </td>
                                <td className="p-6 text-right space-x-2">
                                    <button onClick={() => handleEdit(loc)} className="bg-blue-50 text-blue-600 px-4 py-2 rounded-lg font-black text-[10px] uppercase hover:bg-blue-600 hover:text-white transition-all">Sửa</button>
                                    <button onClick={async () => { if(window.confirm("Xóa nhé ông giáo?")) { await axios.delete(`${BASE_URL}/api/admin/locations/${loc.id}`); fetchData(currentPage); } }} className="bg-red-50 text-red-500 px-4 py-2 rounded-lg font-black text-[10px] uppercase hover:bg-red-500 hover:text-white transition-all">Xóa</button>
                                </td>
                            </tr>
                        ))}
                    </tbody>
                </table>
            </div>

            {/* Pagination */}
            <div className="mt-8 flex justify-center gap-1">
                {pagination.links?.map((link, i) => (
                    <button 
                        key={i} 
                        onClick={() => {
                            const url = new URL(link.url);
                            setCurrentPage(Number(url.searchParams.get('page')));
                        }} 
                        disabled={!link.url || link.active}
                        className={`px-4 py-2 rounded-xl font-black text-[10px] transition-all ${link.active ? 'bg-blue-600 text-white shadow-lg shadow-blue-200' : 'bg-white text-slate-400 hover:bg-gray-100'}`}
                        dangerouslySetInnerHTML={{__html: link.label}} 
                    />
                ))}
            </div>
        </div>
    );
};

export default LocationManager;