import { useEffect, useState } from 'react';
import { Routes, Route, Link, useParams, Navigate, useNavigate, useLocation } from 'react-router-dom';
import axios from 'axios';
import './index.css';

// Import các trang
import LocationDetail from './pages/LocationDetail'; 
import AdminLayout from './layouts/AdminLayout';
import LocationManager from './pages/admin/LocationManager';
import UserManager from './pages/admin/UserManager'; 
import ProvinceManager from './pages/admin/ProvinceManager';
import Login from './pages/Login';
import Register from './pages/Register'; 
import ReviewManager from './pages/admin/ReviewManager';
import { removeAccents } from './utils/stringUtils';

const BASE_URL = "http://127.0.0.1:8000";

// --- 1. NAVBAR (TÔNG SÁNG - TƯƠI MỚI) ---
function Navbar({ user, setUser, searchTerm, setSearchTerm }) {
  const navigate = useNavigate();
  const location = useLocation();

  const handleLogout = () => {
    localStorage.removeItem('token');
    localStorage.removeItem('user');
    setUser(null); 
    navigate('/');
  };

  return (
    <nav className="fixed top-0 left-0 w-full z-50 bg-white/95 backdrop-blur-sm shadow-sm border-b border-gray-100">
      <div className="max-w-7xl mx-auto px-8 py-3 flex justify-between items-center">
        <Link to="/" className="text-xl font-black italic uppercase tracking-tighter text-gray-950 shrink-0">
          Vina<span className="text-emerald-600">Tour</span>
        </Link>

        {/* Ô TÌM KIẾM Header */}
        <div className="hidden md:block relative w-64 lg:w-96 mx-4">
          <input 
            type="text" 
            value={searchTerm}
            placeholder="Tìm tỉnh thành, địa danh..." 
            className="w-full bg-gray-50 border border-gray-100 px-4 py-2 rounded-xl text-sm text-gray-900 outline-none focus:ring-2 focus:ring-emerald-500/20 transition-all placeholder:text-gray-400"
            onChange={(e) => {
                setSearchTerm(e.target.value);
                if (location.pathname !== '/') navigate('/');
            }}
          />
        </div>

        <div className="flex gap-5 items-center font-bold italic uppercase text-[10px] tracking-widest text-gray-500">
          {user ? (
            <>
              <span className="text-emerald-700">Hi, {user?.name}</span>
              {user?.role === 'admin' && (
                <Link to="/admin" className="text-emerald-700 bg-emerald-50 px-3 py-1 rounded-md border border-emerald-100">QUẢN TRỊ</Link>
              )}
              <button onClick={handleLogout} className="hover:text-gray-950 transition-colors">Thoát</button>
            </>
          ) : (
            <>
              <Link to="/login" className="hover:text-emerald-600 transition-colors">Đăng nhập</Link>
              <Link to="/register" className="bg-gray-950 text-white px-5 py-2 rounded-xl hover:bg-gray-800 transition-all shadow-sm">Đăng ký</Link>
            </>
          )}
        </div>
      </div>
    </nav>
  );
}

// --- 2. TRANG CHỦ (NỀN TRẮNG - HÌNH ẢNH RỰC RỠ) ---
function Home({ provinces, searchTerm }) {
  const filtered = provinces.filter(p => {
      const search = removeAccents(searchTerm || "").toLowerCase().trim();
      if (!search) return true;
      const matchProvince = removeAccents(p.name || "").toLowerCase().includes(search) || (p.name_search || "").toLowerCase().includes(search);
      const matchLocation = p.locations?.some(loc => {
          const locName = removeAccents(loc.name || "").toLowerCase();
          return locName.includes(search) || (loc.name_search || "").toLowerCase().includes(search);
      });
      return matchProvince || matchLocation;
  });

  return (
    <div className="min-h-screen bg-white pt-24 text-gray-900">
      <div className="max-w-7xl mx-auto px-8 py-10">
        {/* Đã bỏ hẳn phần tiêu đề theo yêu cầu trước */}
        
        <div className="grid grid-cols-2 md:grid-cols-4 gap-8">
            {filtered?.map(p => (
            <Link to={`/province/${p?.id}`} key={p?.id} className="group">
                <div className="aspect-[4/5] overflow-hidden rounded-3xl bg-gray-50 relative border border-gray-100 group-hover:border-emerald-200 transition-all duration-500 shadow-sm hover:shadow-xl hover:-translate-y-1">
                    <img 
                    src={`${BASE_URL}/storage/images/provinces/${p?.image}`} 
                    // Đã bỏ opacity-80 để hình ảnh sáng 100%
                    className="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" 
                    alt={p?.name} 
                    onError={(e) => { e.target.src = 'https://via.placeholder.com/400x500?text=No+Image'; }}
                    />
                    {/* Đã bỏ gradient đen che ảnh */}
                    <div className="absolute inset-0 bg-gradient-to-t from-white/80 via-transparent to-transparent"></div>
                    <div className="absolute bottom-6 left-6">
                        <h3 className="text-xl font-black italic uppercase tracking-tighter text-gray-950 group-hover:text-emerald-700 transition-colors">{p?.name}</h3>
                        <div className="flex items-center gap-2 mt-1">
                            <span className="w-8 h-[2px] bg-emerald-500"></span>
                            <span className="text-[10px] text-emerald-600 font-bold uppercase tracking-widest">{p.locations?.length || 0} điểm đến</span>
                        </div>
                    </div>
                </div>
            </Link>
            ))}
        </div>

        {filtered.length === 0 && (
            <div className="text-center py-32">
                <p className="text-gray-400 font-bold uppercase tracking-widest text-lg">Không tìm thấy địa danh nào cho "{searchTerm}"</p>
            </div>
        )}
      </div>
    </div>
  );
}

// --- 3. CHI TIẾT TỈNH (SÁNG SỦA) ---
function ProvinceDetail() {
    const { id } = useParams();
    const [locations, setLocations] = useState([]);
    const [province, setProvince] = useState(null);

    useEffect(() => {
        axios.get(`${BASE_URL}/api/provinces/${id}`).then(res => setProvince(res.data));
        axios.get(`${BASE_URL}/api/provinces/${id}/locations`).then(res => setLocations(res.data));
        window.scrollTo(0, 0);
    }, [id]);

    return (
        <div className="min-h-screen bg-white pt-20 text-gray-900">
            <div className="relative h-[40vh] w-full overflow-hidden bg-gray-950">
                <img 
                    src={`${BASE_URL}/storage/images/provinces/${province?.image}`} 
                    // Giữ opacity một chút ở banner để chữ trắng nổi lên
                    className="w-full h-full object-cover opacity-70"
                    alt={province?.name}
                    onError={(e) => e.target.src = 'https://via.placeholder.com/1200x400?text=No+Image'}
                />
                <div className="absolute inset-0 bg-gradient-to-t from-gray-950 via-transparent to-transparent"></div>
                <div className="absolute bottom-10 left-8">
                    <span className="text-emerald-400 font-bold uppercase tracking-[0.5em] text-[8px]">Khám phá</span>
                    <h2 className="text-5xl font-black italic uppercase tracking-tighter mt-2 text-white">{province?.name}</h2>
                </div>
            </div>

            <div className="max-w-7xl mx-auto px-8 py-16 grid grid-cols-1 md:grid-cols-3 gap-10">
                {locations.map(l => (
                    <Link to={`/location/${l.id}`} key={l.id} className="group">
                        <div className="aspect-video overflow-hidden rounded-2xl bg-gray-50 mb-6 border border-gray-100 group-hover:border-emerald-200 transition-all shadow-sm group-hover:shadow-lg">
                            <img 
                                src={`${BASE_URL}/storage/images/${l.image_thumbnail}`} 
                                // Hình ảnh địa điểm sáng 100%
                                className="w-full h-full object-cover group-hover:scale-110 transition-all duration-700" 
                                alt={l.name} 
                                onError={(e) => { e.target.src = 'https://via.placeholder.com/400x250?text=No+Image'; }}
                            />
                        </div>
                        <h3 className="text-2xl font-black italic uppercase tracking-tight group-hover:text-emerald-700 transition-all text-gray-950">{l.name}</h3>
                    </Link>
                ))}
            </div>
        </div>
    );
}

// --- 4. COMPONENT CHÍNH ---
export default function App() {
  const [provinces, setProvinces] = useState([]);
  const [user, setUser] = useState(null);
  const [searchTerm, setSearchTerm] = useState("");

  useEffect(() => { 
    const savedUser = localStorage.getItem('user');
    if (savedUser && savedUser !== "undefined") {
      try { setUser(JSON.parse(savedUser)); } catch (e) { console.error(e); }
    }
    axios.get(`${BASE_URL}/api/provinces`).then(res => setProvinces(res.data)); 
  }, []);

  return (
    <>
      <Navbar user={user} setUser={setUser} searchTerm={searchTerm} setSearchTerm={setSearchTerm} />
      <Routes>
        <Route path="/" element={<Home provinces={provinces} searchTerm={searchTerm} />} />
        <Route path="/login" element={<Login setUser={setUser} />} />
        <Route path="/register" element={<Register />} /> 
        <Route path="/province/:id" element={<ProvinceDetail />} />
        <Route path="/location/:id" element={<LocationDetail user={user} />} />

        <Route path="/admin" element={<AdminLayout />}>
          <Route index element={<div className="p-10 font-black italic text-2xl text-gray-300 uppercase">Hệ thống quản trị</div>} />
          <Route path="locations" element={<LocationManager />} />
          <Route path="users" element={<UserManager />} />
          <Route path="provinces" element={<ProvinceManager />} />
          <Route path="reviews" element={<ReviewManager />} />
        </Route>
      </Routes>
    </>
  );
}