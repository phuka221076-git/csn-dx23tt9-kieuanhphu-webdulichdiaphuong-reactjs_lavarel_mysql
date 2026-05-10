import { Outlet, Link, useNavigate } from 'react-router-dom';
// Má đã xóa dòng import CSS bị lỗi ở đây cho con

function AdminLayout() {
  const navigate = useNavigate();

  const handleLogout = () => {
    localStorage.removeItem('token');
    localStorage.removeItem('user');
    window.location.href = '/'; 
  };

  return (
    <div className="flex min-h-screen bg-gray-100 text-gray-900">
      {/* Sidebar cố định bên trái */}
      <div className="w-64 bg-slate-900 text-white flex flex-col h-screen sticky top-0 shadow-2xl">
        <div className="p-6 mb-4">
            <h2 className="text-xl font-black italic tracking-tighter text-blue-400">ADMIN PANEL</h2>
            <div className="h-0.5 w-8 bg-blue-500 mt-1"></div>
        </div>
        
        <nav className="flex-1 px-4 space-y-2 font-bold uppercase text-[10px] tracking-widest">
          <Link to="/admin/provinces" className="block p-3 rounded-lg hover:bg-slate-800 transition-all">Quản lý Tỉnh</Link>
          <Link to="/admin/locations" className="block p-3 rounded-lg hover:bg-slate-800 transition-all">Quản lý Địa điểm</Link>
          <Link to="/admin/users" className="block p-3 rounded-lg hover:bg-slate-800 transition-all">Quản lý User</Link>
          <Link to="/admin/reviews" className="block p-3 rounded-lg hover:bg-slate-800 transition-all">Quản lý Kiểm duyệt</Link>
          
          <div className="pt-4 border-t border-slate-800 mt-4">
            <Link to="/" className="text-slate-500 hover:text-white pl-3">← VỀ TRANG CHỦ</Link>
          </div>
        </nav>

        <div className="p-4">
          <button 
            onClick={handleLogout}
            className="w-full bg-red-600/20 text-red-500 border border-red-600/30 py-3 rounded-xl font-black uppercase text-[10px] hover:bg-red-600 hover:text-white transition-all"
          >
            Đăng xuất
          </button>
        </div>
      </div>

      {/* Nội dung bên phải */}
      <div className="flex-1 p-8 overflow-y-auto">
        <div className="bg-white rounded-2xl shadow-sm p-8 min-h-full">
          <Outlet />
        </div>
      </div>
    </div>
  );
}

export default AdminLayout;