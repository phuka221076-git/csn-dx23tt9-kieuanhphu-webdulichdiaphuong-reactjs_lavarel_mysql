import React, { useState, useEffect, useRef } from 'react';
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

    // Mỏ neo để cuộn màn hình lên đầu
    const topRef = useRef(null);

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

    // 1. Lấy dữ liệu (Sử dụng Interceptor đã cài ở main.jsx)
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

    // 2. Hàm cuộn trang mượt mà
    const scrollToForm = () => {
        setTimeout(() => {
            // Ưu tiên cuộn bằng window để chắc chắn nhảy lên đầu
            window.scrollTo({ top: 0, behavior: 'smooth' });
            // Hoặc dùng ref nếu layout bị bọc bởi div overflow
            topRef.current?.scrollIntoView({ behavior: 'smooth' });
        }, 100);
    };

    const removeVietnameseTones = (str) => {
        if (!str) return "";
        return str.normalize('NFD').replace(/[\u0300-\u036f]/g, '').replace(/đ/g, 'd').replace(/Đ/g, 'D').toLowerCase();
    };

    const filteredLocations = locations.filter(loc => 
        removeVietnameseTones(loc.name).includes(removeVietnameseTones(searchTerm))
    );

    const renderImage = (path) => {
        if (!path) return "https://placehold.co/100x75?text=No+Image";
        if (path.startsWith('http')) return path;
        return `${BASE_URL}/storage/images/${path}`;
    };

    const handleInputChange = (e) => {
        const { name, value, type, checked } = e.target;
        setFormData({ 
            ...formData, 
            [name]: type === 'checkbox' ? (checked ? 1 : 0) : value 
        });
    };

    const handleSubmit = async (e) => {
        e.preventDefault();
        const data = new FormData();
        
        data.append('name', formData.name);
        data.append('province_id', formData.province_id);
        data.append('category_id', formData.category_id);
        data.append('address', formData.address || '');
        data.append('content', formData.content || '');
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
            
            if (editingId) data.append('_method', 'POST'); 

            await axios.post(url, data); // Không cần headers thủ công vì có Interceptor

            alert("Ngon lành cành đào! ⚽");
            resetForm();
            fetchData(currentPage);
        } catch (err) {
            alert("Lỗi: " + (err.response?.data?.message || "Lỗi không xác định"));
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
        scrollToForm(); // Gọi hàm cuộn lên khi sửa
    };

    return (
        <div className="p-8 bg-gray-50 min-h-screen text-slate-800">
            {/* Đánh dấu vị trí đầu trang */}
            <div ref={topRef} />

            {/* Header */}
            <div className="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
                <div>
                    <h2 className="text-3xl font-black italic uppercase text-slate-900 tracking-tight">Quản lý Địa điểm</h2>
                    <p className="text-[10px] font-bold text-blue-500 uppercase tracking-widest">Tra Vinh University Project</p>
                </div>
                <div className="flex gap-3">
                    <input 
                        className="px-5 py-3 rounded-2xl shadow-sm border-none outline-none focus:ring-2 focus:ring-blue-400 w-64 font-bold text-sm"
                        placeholder="Tìm tên địa điểm..."
                        value={searchTerm}
                        onChange={e => setSearchTerm(e.target.value)}
                    />
                    <button 
                        onClick={() => { setIsFormOpen(true); scrollToForm(); }} 
                        className="bg-blue-600 text-white px-8 py-3 rounded-2xl font-black uppercase text-xs shadow-lg hover:bg-slate-900 transition-all"
                    >
                        + Thêm mới
                    </button>
                </div>
            </div>

            {/* Form Modal */}
            {isFormOpen && (
                <div className="bg-white p-8 rounded-[2.5rem] shadow-2xl border border-blue-50 mb-10 animate-in fade-in zoom-in duration-300">
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
                            
                            {/* Thêm whitespace-pre-wrap cho textarea để trực quan */}
                            <textarea name="content" value={formData.content} onChange={handleInputChange} placeholder="Mô tả nội dung..." className="w-full p-4 bg-gray-50 rounded-2xl border-none h-40 font-bold outline-none whitespace-pre-wrap" />
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
                            <th className="p-6 w-1/3">Mô tả</th>
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
                                    <div className="font-black text-slate-800 uppercase italic text-lg leading-tight">{loc.name}</div>
                                    <div className="text-[10px] text-gray-400 font-bold uppercase line-clamp-1 mt-1">{loc.address}</div>
                                    {loc.is_featured === 1 && <span className="inline-block mt-2 bg-yellow-400 text-[8px] font-black px-2 py-0.5 rounded-full">NỔI BẬT</span>}
                                </td>
                                <td className="p-6">
                                    {/* FIX DÍNH CHỮ Ở ĐÂY: whitespace-pre-wrap giữ dòng, leading-relaxed giãn dòng */}
                                    <div className="text-[11px] text-gray-500 font-medium whitespace-pre-wrap break-words line-clamp-3 leading-relaxed">
                                        {loc.content}
                                    </div>
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
                            scrollToForm(); // Cuộn lên khi sang trang mới
                        }} 
                        disabled={!link.url || link.active}
                        className={`px-4 py-2 rounded-xl font-black text-[10px] transition-all ${link.active ? 'bg-blue-600 text-white shadow-lg' : 'bg-white text-slate-400 hover:bg-gray-100'}`}
                        dangerouslySetInnerHTML={{__html: link.label}} 
                    />
                ))}
            </div>
        </div>
    );
};

export default LocationManager;