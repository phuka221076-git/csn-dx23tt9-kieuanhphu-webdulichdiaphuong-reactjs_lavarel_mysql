import { useEffect, useState } from 'react';
import { Routes, Route, Link, useParams, useNavigate } from 'react-router-dom';
import axios from 'axios';
import './index.css';

// 1. IMPORT
import AdminLayout from './layouts/AdminLayout';
import LocationManager from './pages/admin/LocationManager';
import UserManager from './pages/admin/UserManager'; 
import ProvinceManager from './pages/admin/ProvinceManager';
import Login from './pages/Login';
import Register from './pages/Register'; 
import ReviewManager from './pages/admin/ReviewManager';
//import LocationCreate from './pages/admin/LocationCreate';

const BASE_URL = "http://127.0.0.1:8000";

// --- 2. THANH MENU (NAVBAR) ---
function Navbar({ user, setUser }) {
  const navigate = useNavigate();
  const handleLogout = () => {
    localStorage.removeItem('token');
    localStorage.removeItem('user');
    setUser(null); 
    navigate('/');
  };

  return (
    <nav className="fixed top-0 left-0 w-full z-50 bg-white/80 backdrop-blur-md shadow-sm border-b border-gray-100">
      <div className="max-w-7xl mx-auto px-10 py-5 flex justify-between items-center">
        <Link to="/" className="text-sm font-black italic uppercase text-gray-400 hover:text-blue-950 transition-all">
          Home
        </Link>
        <div className="flex gap-6 items-center font-bold italic uppercase text-[10px] tracking-widest text-gray-600">
          {user ? (
            <>
              <span className="text-blue-600 border-b-2 border-blue-600">CHÀO, {user?.name}</span>
              {user?.role === 'admin' && (
                <Link to="/admin" className="text-red-500 hover:underline">QUẢN TRỊ</Link>
              )}
              <button onClick={handleLogout} className="bg-gray-100 px-4 py-2 rounded-full hover:bg-gray-200 transition-all">Thoát</button>
            </>
          ) : (
            <>
              <Link to="/login" className="hover:text-blue-600 transition-colors">Đăng nhập</Link>
              <Link to="/register" className="bg-blue-950 text-white px-6 py-2.5 rounded-full hover:bg-blue-800 shadow-lg shadow-blue-900/20 transition-all">Đăng ký</Link>
            </>
          )}
        </div>
      </div>
    </nav>
  );
}

// --- 3. CHI TIẾT ĐỊA ĐIỂM (ĐÃ THÊM MỤC REVIEWS) ---
function LocationDetail({ user, setUser }) {
  const { id } = useParams();
  const [loc, setLoc] = useState(null);
  const [error, setError] = useState(null); // Thêm state để bắt lỗi
  const [newComment, setNewComment] = useState(""); // State lưu nội dung nhập
  const [rating, setRating] = useState(5); // State lưu số sao

  useEffect(() => {
    // Reset lại state khi đổi ID
    setLoc(null);
    setError(null);

    axios.get(`${BASE_URL}/api/locations/${id}`)
      .then(res => {
        console.log("Dữ liệu nhận được:", res.data);
        setLoc(res.data);
      })
      .catch(e => {
        console.error("Lỗi API chi tiết:", e.response?.data || e.message);
        setError(e.response?.data?.message || "Lỗi server (500) hoặc không tìm thấy địa điểm.");
      });
  }, [id]);

  // Hàm gửi bình luận
  const handleSubmitReview = async () => {
      const token = localStorage.getItem('token');
    console.log("Token hiện tại là:", token); // <-- KIỂM TRA DÒNG NÀY Ở TAB CONSOLE
    if (!token) {
        alert("Không tìm thấy token, con đăng nhập lại nhé!");
        return;
    }
      if (!user) {
        alert("Bạn phải đăng nhập mới bình luận được nhé!");
        return;
      }
      
      // 2. Chuẩn bị dữ liệu gửi đi (phải khớp với tên cột trong DB)
      const reviewData = {
          location_id: id,
          user_id: user.id,
          rating: rating,
          comment: newComment // Nếu trong DB con đặt là 'content' thì sửa lại ở đây
      };

      try {
          const res = await axios.post(`${BASE_URL}/api/reviews`, reviewData);
          
          // 3. Cập nhật state để bình luận hiện ra ngay không cần F5
          setLoc({
              ...loc,
              reviews: [res.data, ...(loc.reviews || [])]
          });
          setNewComment(""); // Xóa trắng ô nhập sau khi gửi thành công
          alert("Gửi bình luận thành công rồi con!");
      } catch (e) {
          // 4. Nếu lỗi, in lỗi ra console để má con mình cùng xem
          console.error("Lỗi gửi bình luận:", e.response?.data);
          alert("Lỗi rồi: " + (e.response?.data?.message || e.message));
      }
  };

  // Nếu có lỗi, hiện thông báo lỗi thay vì cứ "Đang tải"
  if (error) return (
    <div className="min-h-screen flex flex-col items-center justify-center bg-gray-50">
      <h2 className="text-2xl font-bold text-red-600 mb-4">Ối! Có lỗi xảy ra</h2>
      <p className="text-gray-600">{error}</p>
      <Link to="/" className="mt-4 text-blue-600 underline">Quay lại trang chủ</Link>
    </div>
  );

  if (!loc) return (
    <div className="min-h-screen flex items-center justify-center font-black italic text-gray-300 uppercase tracking-tighter animate-pulse">
      Đang tải dữ liệu...
    </div>
  );

  return (
    <div className="min-h-screen bg-white">
      <Navbar user={user} setUser={setUser} />
      
      {/* Header Image */}
      <div className="relative h-[60vh] overflow-hidden mt-16">
        <img 
          src={loc?.image_thumbnail ? `${BASE_URL}/storage/images/${loc.image_thumbnail}` : 'https://via.placeholder.com/1200x600'} 
          className="w-full h-full object-cover" 
          alt={loc?.name} 
        />
        <div className="absolute inset-0 bg-black/30 flex items-center justify-center text-center px-4">
            <h1 className="text-white text-5xl md:text-7xl font-black italic uppercase tracking-tighter">
              {loc?.name || "Đang cập nhật..."}
            </h1>
        </div>
      </div>

      <div className="max-w-4xl mx-auto py-10 px-8">
        {/* Nội dung bài viết */}
        <div 
          className="prose prose-lg font-medium text-gray-700 leading-relaxed mb-20" 
          dangerouslySetInnerHTML={{ __html: loc?.content || "Chưa có nội dung." }} 
        />
        
        {/* MỤC ĐÁNH GIÁ - REVIEWS (Sửa đúng theo bảng reviews) */}
        <div className="max-w-4xl mx-auto px-8 pb-32">
          {/* FORM NHẬP BÌNH LUẬN */}
          <div className="bg-blue-50 p-8 rounded-3xl mb-12 shadow-inner">
            <h4 className="text-xl font-black italic uppercase mb-4 text-blue-900">Viết đánh giá của con</h4>
            <div className="flex gap-2 mb-4">
              {[1, 2, 3, 4, 5].map(star => (
                <button key={star} onClick={() => setRating(star)} className="text-2xl">
                  {star <= rating ? '⭐' : '☆'}
                </button>
              ))}
            </div>
            <textarea 
              className="w-full p-4 rounded-2xl border-none outline-none focus:ring-4 ring-blue-200 text-gray-700 mb-4"
              placeholder="Cảm nhận của con về nơi này..."
              value={newComment}
              onChange={(e) => setNewComment(e.target.value)}
            />
            <button 
              onClick={handleSubmitReview}
              className="bg-blue-950 text-white px-8 py-3 rounded-full font-bold italic uppercase hover:bg-blue-800 transition-all"
            >
              Gửi bình luận
            </button>
          </div>

          {/* DANH SÁCH BÌNH LUẬN (Code cũ của con) */}
          <h3 className="text-3xl font-black italic uppercase mb-8">Đánh giá từ cộng đồng</h3>
          {/* ... map loc.reviews ra như cũ ... */}
        </div>
      </div>
    </div>
  );
}

// --- 4. CHI TIẾT TỈNH (ĐÃ FIX LỖI LOOP DÒNG 96) ---
function ProvinceDetail({ user, setUser }) {
  const { id } = useParams();
  const [locations, setLocations] = useState([]);
  const [province, setProvince] = useState(null);

  useEffect(() => {
    if (id) { 
        // Lấy thông tin tỉnh
        axios.get(`${BASE_URL}/api/provinces/${id}`)
          .then(res => setProvince(res.data))
          .catch(e => console.error("Lỗi lấy tỉnh:", e));

        // Lấy danh sách địa điểm của tỉnh
        axios.get(`${BASE_URL}/api/provinces/${id}/locations`)
          .then(res => setLocations(res.data))
          .catch(error => console.error("Lỗi Server (500):", error.response?.data));
    }
  }, [id]); // Chạy lại khi id thay đổi

  return (
    <div className="min-h-screen bg-white pt-24">
      <Navbar user={user} setUser={setUser} />
      <div className="py-16 text-center">
        <h2 className="text-7xl font-black italic uppercase tracking-tighter text-gray-900">{province?.name}</h2>
        <div className="h-2 w-24 bg-blue-950 mx-auto mt-4"></div>
      </div>
      <div className="max-w-7xl mx-auto px-8 grid grid-cols-1 md:grid-cols-2 gap-12 pb-32">
        {locations.map(l => (
          <Link to={`/location/${l?.id}`} key={l?.id} className="group">
            <div className="aspect-video overflow-hidden rounded-3xl shadow-2xl mb-6 bg-gray-100">
              <img src={`${BASE_URL}/storage/images/${l?.image_thumbnail}`} className="w-full h-full object-cover group-hover:scale-105 transition-all duration-1000" alt={l?.name} />
            </div>
            <h3 className="text-4xl font-black italic uppercase tracking-tighter group-hover:text-blue-600 transition-colors">{l?.name}</h3>
          </Link>
        ))}
      </div>
    </div>
  );
}

// --- 5. TRANG CHỦ ---
function Home({ provinces, user, setUser }) {
  const [searchTerm, setSearchTerm] = useState("");
  const filtered = provinces.filter(p => p.name.toLowerCase().includes(searchTerm.toLowerCase()));
  
  return (
    <div className="min-h-screen bg-gray-50">
      <Navbar user={user} setUser={setUser} />
      <div className="bg-blue-950 pt-48 pb-24 text-center text-white border-b-8 border-blue-900">
        <h1 className="text-5xl md:text-7xl font-black italic uppercase tracking-tighter mb-10 leading-none px-4">
          Tra cứu du lịch <br/> địa phương
        </h1>
        <div className="max-w-xl mx-auto px-6">
          <input 
            type="text" 
            placeholder="Tìm kiếm điểm đến của bạn..." 
            className="w-full px-10 py-5 rounded-2xl text-gray-900 outline-none shadow-2xl text-xl font-bold focus:ring-8 ring-blue-500/20 transition-all"
            onChange={(e) => setSearchTerm(e.target.value)}
          />
        </div>
      </div>
      <div className="max-w-7xl mx-auto px-8 py-20 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10">
        {filtered.map(p => (
          <Link to={`/province/${p?.id}`} key={p?.id}>
             <div className="aspect-[3/4] overflow-hidden rounded-[3rem] shadow-2xl bg-black relative group hover:-translate-y-3 transition-all duration-500">
                <img src={`${BASE_URL}/storage/images/provinces/${p?.image}`} className="w-full h-full object-cover opacity-60 group-hover:opacity-100 transition-all duration-1000" alt={p?.name} />
                <div className="absolute bottom-10 left-10 text-white">
                   <h3 className="text-3xl font-black italic uppercase tracking-tighter">{p?.name}</h3>
                </div>
             </div>
          </Link>
        ))}
      </div>
    </div>
  );
}

// --- 6. APP CHÍNH ---
function App() {
  const [provinces, setProvinces] = useState([]);
  const [user, setUser] = useState(null);

  useEffect(() => { 
    const savedUser = localStorage.getItem('user');
    if (savedUser && savedUser !== "undefined") {
      try { setUser(JSON.parse(savedUser)); } catch (e) { console.log(e); }
    }
    axios.get(`${BASE_URL}/api/provinces`).then(res => setProvinces(res.data)).catch(e => console.log(e)); 
  }, []);

  return (
    <Routes>
      <Route path="/" element={<Home provinces={provinces} user={user} setUser={setUser} />} />
      <Route path="/login" element={<Login setUser={setUser} />} />
      <Route path="/register" element={<Register />} /> 
      <Route path="/province/:id" element={<ProvinceDetail user={user} setUser={setUser} />} />
      <Route path="/location/:id" element={<LocationDetail user={user} setUser={setUser} />} />
      <Route path="/admin" element={<AdminLayout />}>
        <Route index element={<div className="p-10 font-black italic text-4xl uppercase text-gray-200">Hệ thống quản trị</div>} />
        <Route path="locations" element={<LocationManager />} />
        <Route path="users" element={<UserManager />} />
        <Route path="provinces" element={<ProvinceManager />} />
        <Route path="reviews" element={<ReviewManager />} /> {/* THÊM DÒNG NÀY */}
      </Route>
      <Route path="*" element={<div className="min-h-screen flex items-center justify-center font-black text-9xl italic text-gray-100 uppercase">404</div>} />
    </Routes>
  );
}

export default App;