import React, { useState, useEffect } from 'react';
import axios from 'axios';

const BASE_URL = 'http://localhost:8000';

const ProvinceManager = () => {
    const [provinces, setProvinces] = useState([]);
    const [editingProvince, setEditingProvince] = useState(null);
    const [isAdding, setIsAdding] = useState(false);
    const [name, setName] = useState('');
    
    // Tìm kiếm và Phân trang
    const [searchTerm, setSearchTerm] = useState("");
    const [currentPage, setCurrentPage] = useState(1);
    const itemsPerPage = 8; // Số lượng tỉnh hiển thị trên mỗi trang

    const fetchProvinces = () => {
        axios.get(`${BASE_URL}/api/admin/provinces`)
            .then(res => setProvinces(res.data))
            .catch(err => console.error(err));
    };

    useEffect(() => {
        fetchProvinces();
    }, []);

    // --- XỬ LÝ LỌC VÀ PHÂN TRANG ---
    const filteredProvinces = provinces.filter(p => 
        p.name.toLowerCase().includes(searchTerm.toLowerCase())
    );

    const indexOfLastItem = currentPage * itemsPerPage;
    const indexOfFirstItem = indexOfLastItem - itemsPerPage;
    const currentItems = filteredProvinces.slice(indexOfFirstItem, indexOfLastItem);
    const totalPages = Math.ceil(filteredProvinces.length / itemsPerPage);

    // --- CÁC HÀM THAO TÁC ---
    const handleSubmit = async (e) => {
        e.preventDefault();
        const token = localStorage.getItem('token');
        try {
            if (editingProvince) {
                // Lệnh Sửa
                await axios.put(`${BASE_URL}/api/admin/provinces/${editingProvince.id}`, 
                    { name }, 
                    { headers: { Authorization: `Bearer ${token}` } }
                );
                alert('Cập nhật thành công!');
            } else {
                // Lệnh Thêm mới
                await axios.post(`${BASE_URL}/api/admin/provinces`, 
                    { name }, 
                    { headers: { Authorization: `Bearer ${token}` } }
                );
                alert('Thêm tỉnh thành công!');
            }
            setName('');
            setEditingProvince(null);
            setIsAdding(false);
            fetchProvinces();
        } catch (err) {
            alert('Lỗi: ' + (err.response?.data?.message || 'Không thể thực hiện thao tác'));
        }
    };

    const handleDelete = async (id) => {
        if (!window.confirm("Con có chắc muốn xóa tỉnh này không?")) return;
        const token = localStorage.getItem('token');
        try {
            await axios.delete(`${BASE_URL}/api/admin/provinces/${id}`, {
                headers: { Authorization: `Bearer ${token}` }
            });
            fetchProvinces();
        } catch (err) {
            alert('Lỗi: Có thể tỉnh này đang chứa địa điểm du lịch, không thể xóa!');
        }
    };

    return (
        <div className="p-2">
            <div className="flex justify-between items-center mb-6">
                <h2 className="text-2xl font-black italic uppercase text-slate-800 tracking-tighter">Quản lý Tỉnh thành</h2>
                <button 
                    onClick={() => { setIsAdding(true); setEditingProvince(null); setName(''); }}
                    className="bg-green-600 text-white px-6 py-2.5 rounded-xl font-black uppercase text-[10px] tracking-widest hover:bg-green-700 transition-all shadow-lg shadow-green-900/20"
                >
                    + Thêm tỉnh mới
                </button>
            </div>

            {/* FORM NHẬP LIỆU (THÊM/SỬA) */}
            {(isAdding || editingProvince) && (
                <div className="mb-8 bg-slate-900 p-6 rounded-2xl text-white shadow-xl animate-in fade-in zoom-in duration-300">
                    <div className="flex justify-between items-center mb-4">
                        <h3 className="font-black italic uppercase text-xs text-blue-400 tracking-widest">
                            {editingProvince ? `Đang chỉnh sửa: ${editingProvince.name}` : 'Tạo tỉnh thành mới'}
                        </h3>
                        <button onClick={() => {setIsAdding(false); setEditingProvince(null);}} className="text-xs opacity-50 hover:opacity-100 uppercase font-bold">Hủy bỏ ✕</button>
                    </div>
                    <form onSubmit={handleSubmit} className="flex gap-3">
                        <input 
                            type="text" 
                            value={name} 
                            onChange={(e) => setName(e.target.value)}
                            className="flex-1 px-4 py-3 rounded-xl text-gray-900 font-bold outline-none border-4 border-transparent focus:border-blue-500 transition-all"
                            placeholder="Ví dụ: Kiên Giang, Trà Vinh..."
                            autoFocus
                        />
                        <button type="submit" className="bg-blue-500 px-8 py-3 rounded-xl font-black uppercase text-xs hover:bg-blue-400 shadow-lg transition-all">Lưu</button>
                    </form>
                </div>
            )}

            {/* THANH TÌM KIẾM */}
            <div className="mb-6 bg-white p-2 rounded-2xl shadow-sm border border-gray-100 flex items-center">
                <span className="px-4 opacity-30">🔍</span>
                <input 
                    type="text" 
                    placeholder="Gõ tên tỉnh để tìm nhanh..." 
                    className="w-full py-3 rounded-xl outline-none text-sm font-bold"
                    onChange={(e) => { setSearchTerm(e.target.value); setCurrentPage(1); }}
                />
            </div>

            {/* BẢNG DỮ LIỆU */}
            <div className="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                <table className="w-full text-left">
                    <thead className="bg-slate-50 text-[10px] font-black uppercase text-slate-400 tracking-widest border-b">
                        <tr>
                            <th className="p-5 w-20">ID</th>
                            <th className="p-5">Tên tỉnh thành</th>
                            <th className="p-5">Đường dẫn (Slug)</th>
                            <th className="p-5 text-right">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody className="text-sm font-bold">
                        {currentItems.length > 0 ? currentItems.map(p => (
                            <tr key={p.id} className="border-b border-gray-50 hover:bg-blue-50/50 transition-all">
                                <td className="p-5 text-gray-300 font-mono">#{p.id}</td>
                                <td className="p-5 uppercase text-slate-700">{p.name}</td>
                                <td className="p-5 text-xs font-normal text-gray-400 italic">{p.slug}</td>
                                <td className="p-5 text-right flex justify-end gap-2">
                                    <button 
                                        onClick={() => { setEditingProvince(p); setName(p.name); setIsAdding(false); window.scrollTo({top: 0, behavior: 'smooth'}); }}
                                        className="px-4 py-2 text-blue-500 hover:bg-blue-100 rounded-lg font-black uppercase text-[10px] transition-all"
                                    >
                                        Sửa
                                    </button>
                                    <button 
                                        onClick={() => handleDelete(p.id)}
                                        className="px-4 py-2 text-red-500 hover:bg-red-100 rounded-lg font-black uppercase text-[10px] transition-all"
                                    >
                                        Xóa
                                    </button>
                                </td>
                            </tr>
                        )) : (
                            <tr>
                                <td colSpan="4" className="p-10 text-center text-gray-300 italic font-normal">Không tìm thấy tỉnh nào...</td>
                            </tr>
                        )}
                    </tbody>
                </table>
            </div>

            {/* ĐIỀU HƯỚNG PHÂN TRANG */}
            {totalPages > 1 && (
                <div className="mt-8 flex justify-center items-center gap-2 pb-10">
                    <button 
                        disabled={currentPage === 1}
                        onClick={() => setCurrentPage(prev => prev - 1)}
                        className={`px-4 py-2 rounded-xl text-[10px] font-black uppercase transition-all ${currentPage === 1 ? 'bg-gray-100 text-gray-300' : 'bg-white text-slate-700 shadow-sm hover:bg-slate-900 hover:text-white'}`}
                    >
                        Trước
                    </button>
                    
                    <div className="flex gap-1">
                        {[...Array(totalPages)].map((_, i) => (
                            <button
                                key={i + 1}
                                onClick={() => setCurrentPage(i + 1)}
                                className={`w-10 h-10 rounded-xl text-[10px] font-black transition-all ${currentPage === i + 1 ? 'bg-blue-600 text-white shadow-lg' : 'bg-white text-slate-400 hover:bg-gray-100'}`}
                            >
                                {i + 1}
                            </button>
                        ))}
                    </div>

                    <button 
                        disabled={currentPage === totalPages}
                        onClick={() => setCurrentPage(prev => prev + 1)}
                        className={`px-4 py-2 rounded-xl text-[10px] font-black uppercase transition-all ${currentPage === totalPages ? 'bg-gray-100 text-gray-300' : 'bg-white text-slate-700 shadow-sm hover:bg-slate-900 hover:text-white'}`}
                    >
                        Sau
                    </button>
                </div>
            )}
        </div>
    );
};

export default ProvinceManager;