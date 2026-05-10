import React, { useState, useEffect } from 'react';
import axios from 'axios';

const BASE_URL = 'http://localhost:8000';

const UserManager = () => {
    const [users, setUsers] = useState([]);
    const [isFormOpen, setIsFormOpen] = useState(false);
    const [editingId, setEditingId] = useState(null);
    const [searchTerm, setSearchTerm] = useState('');
    const [pagination, setPagination] = useState({});
    const [currentPage, setCurrentPage] = useState(1);

    const [formData, setFormData] = useState({
        name: '',
        email: '',
        password: '',
        role: 'user',
        avatar: null
    });

    // 1. Gọi dữ liệu từ Laravel API
    const fetchData = async (page = 1) => {
        try {
            const res = await axios.get(`${BASE_URL}/api/admin/users?page=${page}`);
            // Fix lỗi gán dữ liệu từ Laravel Paginate
            if (res.data && res.data.data) {
                setUsers(res.data.data); 
                setPagination({
                    current_page: res.data.current_page,
                    last_page: res.data.last_page,
                    links: res.data.links
                });
            }
        } catch (err) {
            console.error("Lỗi fetch:", err);
        }
    };

    useEffect(() => {
        fetchData(currentPage);
    }, [currentPage]);

    // 2. Xử lý hiển thị Avatar
    const renderAvatar = (path, name) => {
        if (!path) return `https://ui-avatars.com/api/?name=${encodeURIComponent(name || 'User')}&background=random&color=fff`;
        if (path.startsWith('http')) return path;
        return `${BASE_URL}/storage/avatars/${path}`;
    };

    const handleInputChange = (e) => {
        const { name, value } = e.target;
        setFormData({ ...formData, [name]: value });
    };

    // 3. Xử lý Lưu / Cập nhật (Kèm gửi file)
    const handleSubmit = async (e) => {
        e.preventDefault();
        const data = new FormData();
        data.append('name', formData.name);
        data.append('email', formData.email);
        data.append('role', formData.role);
        
        if (formData.password) data.append('password', formData.password);
        if (formData.avatar) data.append('avatar', formData.avatar);

        try {
            let url = `${BASE_URL}/api/admin/users`;
            if (editingId) {
                // Khi UPDATE: Phải dùng POST và kèm _method PUT để gửi được file
                url = `${BASE_URL}/api/admin/users/${editingId}`;
                data.append('_method', 'PUT'); 
            }

            await axios.post(url, data, {
                headers: { 'Content-Type': 'multipart/form-data' }
            });

            alert("Ngon lành cành đào rồi ông giáo! ⚽");
            resetForm();
            fetchData(currentPage);
        } catch (err) {
            const msg = err.response?.data?.message || "Kiểm tra lại Route hoặc DB!";
            alert("Lỗi: " + msg);
        }
    };

    const resetForm = () => {
        setFormData({ name: '', email: '', password: '', role: 'user', avatar: null });
        setEditingId(null);
        setIsFormOpen(false);
    };

    const handleEdit = (user) => {
        setEditingId(user.id);
        setFormData({
            name: user.name,
            email: user.email,
            password: '', 
            role: user.role || 'user',
            avatar: null
        });
        setIsFormOpen(true);
    };

    const handleDelete = async (id) => {
        if (window.confirm("Có chắc muốn tiễn thành viên này không ông giáo?")) {
            try {
                await axios.delete(`${BASE_URL}/api/admin/users/${id}`);
                fetchData(currentPage);
            } catch (err) { alert("Xóa thất bại!"); }
        }
    };

    return (
        <div className="p-8 bg-gray-50 min-h-screen font-sans">
            {/* Header & Search */}
            <div className="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
                <div>
                    <h2 className="text-3xl font-black italic uppercase text-slate-900 tracking-tight">Quản lý Thành viên</h2>
                    <div className="h-1 w-16 bg-red-600 rounded-full"></div>
                </div>
                <div className="flex gap-3">
                    <input 
                        className="px-5 py-3 rounded-2xl shadow-sm border-none outline-none focus:ring-2 focus:ring-red-400 w-80 font-bold text-sm"
                        placeholder="Tìm theo tên hoặc email..."
                        value={searchTerm}
                        onChange={e => setSearchTerm(e.target.value)}
                    />
                    <button onClick={() => setIsFormOpen(true)} className="bg-slate-900 text-white px-8 py-3 rounded-2xl font-black uppercase text-xs hover:bg-red-600 transition-all shadow-lg">
                        + Thêm mới
                    </button>
                </div>
            </div>

            {/* Form Thêm/Sửa */}
            {isFormOpen && (
                <div className="bg-white p-8 rounded-[2.5rem] shadow-2xl mb-10 border border-red-50 animate-in fade-in slide-in-from-top-4">
                    <form onSubmit={handleSubmit} className="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div className="space-y-4">
                            <input name="name" value={formData.name} onChange={handleInputChange} placeholder="Họ và tên" className="w-full p-4 bg-gray-50 rounded-2xl border-none font-bold outline-none" required />
                            <input name="email" type="email" value={formData.email} onChange={handleInputChange} placeholder="Email" className="w-full p-4 bg-gray-50 rounded-2xl border-none font-bold outline-none" required />
                            <input name="password" type="password" value={formData.password} onChange={handleInputChange} placeholder={editingId ? "Để trống nếu không đổi" : "Mật khẩu"} className="w-full p-4 bg-gray-50 rounded-2xl border-none font-bold outline-none" required={!editingId} />
                        </div>
                        <div className="space-y-4">
                            <select name="role" value={formData.role} onChange={handleInputChange} className="w-full p-4 bg-gray-50 rounded-2xl border-none font-bold outline-none">
                                <option value="user">Thành viên (User)</option>
                                <option value="admin">Quản trị viên (Admin)</option>
                            </select>
                            <div className="p-4 bg-red-50 rounded-2xl border-2 border-dashed border-red-100">
                                <p className="text-[10px] font-black uppercase text-red-400 mb-2">Ảnh đại diện</p>
                                <input type="file" onChange={e => setFormData({...formData, avatar: e.target.files[0]})} className="text-[10px] w-full" />
                            </div>
                            <div className="flex gap-2 text-white">
                                <button type="submit" className="flex-1 bg-red-600 py-4 rounded-2xl font-black uppercase text-xs shadow-xl hover:scale-105 transition-transform">Lưu lại</button>
                                <button type="button" onClick={resetForm} className="px-6 bg-gray-400 rounded-2xl font-black uppercase text-[10px]">Hủy</button>
                            </div>
                        </div>
                    </form>
                </div>
            )}

            {/* Table Danh sách - Đã fix tìm kiếm theo Tên & Email */}
            <div className="bg-white rounded-[2.5rem] shadow-sm border border-gray-100 overflow-hidden">
                <table className="w-full text-left border-collapse">
                    <thead className="bg-slate-900 text-[10px] font-black uppercase text-slate-400">
                        <tr>
                            <th className="p-6">Thành viên</th>
                            <th className="p-6">Email</th>
                            <th className="p-6">Vai trò</th>
                            <th className="p-6 text-right">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody className="divide-y divide-gray-50">
                        {users.length > 0 ? (
                            users
                            .filter(u => 
                                (u.name || "").toLowerCase().includes(searchTerm.toLowerCase()) || 
                                (u.email || "").toLowerCase().includes(searchTerm.toLowerCase())
                            )
                            .map(user => (
                                <tr key={user.id} className="hover:bg-red-50/50 transition-all group">
                                    <td className="p-6 flex items-center gap-4">
                                        <img src={renderAvatar(user.avatar, user.name)} className="w-12 h-12 rounded-full object-cover border-2 border-white shadow-sm" alt="" />
                                        <div className="font-black text-slate-800 uppercase italic group-hover:text-red-600 transition-colors">{user.name}</div>
                                    </td>
                                    <td className="p-6 font-bold text-gray-500 text-sm">{user.email}</td>
                                    <td className="p-6">
                                        <span className={`px-3 py-1 rounded-full text-[9px] font-black uppercase ${user.role === 'admin' ? 'bg-red-100 text-red-600' : 'bg-blue-100 text-blue-600'}`}>
                                            {user.role}
                                        </span>
                                    </td>
                                    <td className="p-6 text-right space-x-2">
                                        <button onClick={() => handleEdit(user)} className="text-blue-600 font-black text-[10px] uppercase bg-blue-50 px-4 py-2 rounded-lg hover:bg-blue-600 hover:text-white transition-all">Sửa</button>
                                        <button onClick={() => handleDelete(user.id)} className="text-red-500 font-black text-[10px] uppercase bg-red-50 px-4 py-2 rounded-lg hover:bg-red-500 hover:text-white transition-all">Xóa</button>
                                    </td>
                                </tr>
                            ))
                        ) : (
                            <tr>
                                <td colSpan="4" className="p-10 text-center font-black uppercase text-gray-400">Đang tải dữ liệu thành viên... ⚽</td>
                            </tr>
                        )}
                    </tbody>
                </table>
            </div>

            {/* Phân trang */}
            <div className="mt-8 flex justify-center gap-1">
                {pagination.links?.map((link, i) => (
                    <button 
                        key={i} 
                        onClick={() => {
                            const url = new URL(link.url);
                            setCurrentPage(Number(url.searchParams.get('page')));
                        }}
                        disabled={!link.url || link.active}
                        className={`px-4 py-2 rounded-xl font-black text-[10px] transition-all ${link.active ? 'bg-red-600 text-white shadow-lg' : 'bg-white text-slate-400 hover:bg-gray-100'}`}
                        dangerouslySetInnerHTML={{__html: link.label}} 
                    />
                ))}
            </div>
        </div>
    );
};

export default UserManager;