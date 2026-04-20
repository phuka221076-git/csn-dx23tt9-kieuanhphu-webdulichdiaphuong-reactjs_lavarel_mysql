import { useEffect, useState } from 'react';
import { Routes, Route, Link, useParams, useNavigate } from 'react-router-dom';
import axios from 'axios';
import './index.css';

// 1. Khai báo URL của Backend
const BASE_URL = "http://127.0.0.1:8000";

// --- COMPONENT TRANG CHI TIẾT ĐỊA ĐIỂM ---
function LocationDetail() {
  const { id } = useParams();
  const navigate = useNavigate();
  const [location, setLocation] = useState(null);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    setLoading(true);
    axios.get(`${BASE_URL}/api/locations/${id}`)
      .then(res => {
        setLocation(res.data);
        setLoading(false);
        if(res.data) document.title = res.data.name;
      })
      .catch(err => {
        console.error("Lỗi lấy chi tiết địa điểm:", err);
        setLoading(false);
      });
  }, [id]);

  if (loading) return <div className="text-center py-20 font-bold text-blue-600">Đang tải thông tin...</div>;
  if (!location) return <div className="text-center py-20 text-red-500">Không tìm thấy địa điểm.</div>;

  return (
    <div className="min-h-screen bg-white">
      {/* Banner Ảnh lớn */}
      <div className="relative h-[60vh] w-full overflow-hidden">
        <img 
          src={`${BASE_URL}/storage/images/${location.image_thumbnail}`} 
          className="w-full h-full object-cover transition-transform duration-700 hover:scale-105"
          alt={location.name}
          onError={(e) => e.target.src = 'https://images.unsplash.com/photo-1501785888041-af3ef285b470?q=80&w=1500'}
        />
        <div className="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
        
        <button 
          onClick={() => navigate(-1)}
          className="absolute top-6 left-6 bg-white/90 p-3 rounded-full shadow-xl hover:bg-blue-600 hover:text-white transition-all z-10"
        >
          ← Quay lại
        </button>

        <div className="absolute bottom-12 left-10 text-white">
            <span className="uppercase tracking-[0.3em] text-sm font-bold text-blue-300 bg-blue-900/40 px-3 py-1 rounded">
                {location.category?.name} | {location.province?.name}
            </span>
            <h1 className="text-6xl font-black mt-4 drop-shadow-2xl italic uppercase">{location.name}</h1>
        </div>
      </div>

      <div className="max-w-5xl mx-auto px-6 py-16">
        <div className="flex flex-col md:flex-row gap-12">
          
          {/* Nội dung bài viết */}
          <div className="flex-1">
            <div className="flex items-center text-gray-700 mb-8 pb-6 border-b border-gray-100">
              <span className="text-3xl mr-3">📍</span>
              <span className="text-xl font-medium">{location.address}</span>
            </div>

            {/* Render HTML từ database và căn đều chữ */}
            <div 
                className="prose prose-xl max-w-none text-gray-800 text-justify whitespace-pre-line custom-article-style"
                dangerouslySetInnerHTML={{ __html: location.content }}
            />
          </div>

          {/* Cột phải: Thông tin hỗ trợ & Google Maps */}
          <div className="w-full md:w-80">
            <div className="bg-gray-50 p-8 rounded-3xl border border-gray-100 sticky top-10">
              <h3 className="text-xl font-bold mb-4 text-blue-900">Thông tin hỗ trợ</h3>
              <p className="text-gray-600 text-sm mb-6 leading-relaxed text-justify">
                Địa điểm này nằm tại <strong>{location.province?.name}</strong>. 
                Vui lòng kiểm tra thời tiết và chuẩn bị trang phục phù hợp trước khi ghé thăm.
              </p>

              {/* Nút Maps: Sửa lại cú pháp nối chuỗi biến latitude/longitude */}
              {location.latitude && location.longitude ? (
                <a 
                  href={`https://www.google.com/maps?q=${location.latitude},${location.longitude}`}
                  target="_blank"
                  rel="noopener noreferrer"
                  className="w-full flex items-center justify-center gap-2 bg-blue-600 text-white py-4 rounded-2xl font-bold hover:bg-blue-700 transition-all shadow-lg shadow-blue-200 uppercase text-xs"
                >
                  🗺️ Xem bản đồ đường đi
                </a>
              ) : (
                <p className="text-xs text-gray-400 italic text-center italic">Tọa độ chưa được cập nhật</p>
              )}
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}

// --- COMPONENT TRANG CHI TIẾT TỈNH THÀNH ---
function ProvinceDetail() {
  const { id } = useParams();
  const [locations, setLocations] = useState([]);
  const [provinceName, setProvinceName] = useState("");
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    setLoading(true);
    axios.get(`${BASE_URL}/api/provinces/${id}/locations`)
      .then(res => {
        setLocations(res.data);
        if (res.data.length > 0 && res.data[0].province) {
          setProvinceName(res.data[0].province.name);
        }
        setLoading(false);
      })
      .catch(err => {
        console.error(err);
        setLoading(false);
      });
  }, [id]);

  if (loading) return <div className="flex justify-center items-center min-h-screen text-blue-600 font-bold">Đang tải dữ liệu...</div>;

  return (
    <div className="min-h-screen bg-gray-50 pb-20">
      <div className="bg-blue-700 text-white py-16 px-6 mb-12 shadow-inner">
        <div className="max-w-6xl mx-auto">
          <Link to="/" className="text-blue-200 hover:text-white mb-6 inline-block transition-colors">← Quay lại danh sách</Link>
          <h2 className="text-5xl font-black italic uppercase">Khám phá {provinceName}</h2>
          <p className="mt-3 text-blue-100 text-lg italic">Tìm thấy {locations.length} địa điểm tuyệt vời cho hành trình của bạn.</p>
        </div>
      </div>

      <div className="max-w-6xl mx-auto px-6">
        <div className="grid grid-cols-1 md:grid-cols-2 gap-10">
          {locations.map(loc => (
            <div key={loc.id} className="bg-white rounded-3xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100 group">
              <div className="flex flex-col sm:flex-row">
                <div className="w-full sm:w-56 h-56">
                    <img 
                        src={`${BASE_URL}/storage/images/${loc.image_thumbnail}`} 
                        className="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                        alt={loc.name}
                        onError={(e) => e.target.src = 'https://images.unsplash.com/photo-1528127269322-539801943592?q=80&w=500'}
                    />
                </div>
                <div className="p-8 flex-1 flex flex-col justify-between">
                  <div>
                    <span className="inline-block px-3 py-1 text-[10px] font-bold uppercase tracking-wider text-blue-600 bg-blue-50 rounded-md mb-3">
                        {loc.category?.name || "Du lịch"}
                    </span>
                    <Link to={`/location/${loc.id}`}>
                        <h3 className="text-2xl font-bold text-gray-800 hover:text-blue-600 transition-colors mb-2 uppercase">{loc.name}</h3>
                    </Link>
                    <p className="text-gray-400 text-xs flex items-center mb-4 italic">
                        📍 {loc.address}
                    </p>
                  </div>
                  <Link 
                    to={`/location/${loc.id}`}
                    className="mt-6 text-sm font-black text-blue-600 flex items-center gap-1 group-hover:gap-3 transition-all"
                  >
                    XEM CHI TIẾT →
                  </Link>
                </div>
              </div>
            </div>
          ))}
        </div>
      </div>
    </div>
  );
}

// --- TRANG CHỦ (HOME) ---
function Home({ provinces }) {
  const [searchTerm, setSearchTerm] = useState("");
  const filteredProvinces = provinces.filter(p => 
    p.name.toLowerCase().includes(searchTerm.toLowerCase())
  );

  return (
    <div className="min-h-screen bg-gray-50">
      <div className="bg-blue-900 py-28 px-6 text-center text-white relative">
        <h1 className="text-6xl font-black mb-6 tracking-tighter uppercase italic">VinaTour Explorer</h1>
        <p className="text-blue-200 mb-10 text-xl font-light">Tìm kiếm và khám phá vẻ đẹp của 63 tỉnh thành Việt Nam</p>
        <div className="max-w-2xl mx-auto">
          <input 
            type="text" 
            placeholder="Nhập tên tỉnh thành muốn đến..." 
            className="w-full px-10 py-5 rounded-2xl text-gray-900 focus:outline-none shadow-2xl text-lg border-4 border-blue-800/50"
            onChange={(e) => setSearchTerm(e.target.value)}
          />
        </div>
      </div>

      <div className="max-w-7xl mx-auto p-12 -mt-10 relative z-20">
        <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-12">
          {filteredProvinces.map(p => (
            <Link to={`/province/${p.id}`} key={p.id} className="group bg-white rounded-[2rem] shadow-xl overflow-hidden hover:-translate-y-2 transition-all duration-300">
              <div className="relative h-72">
                <img 
                  src={`${BASE_URL}/storage/images/provinces/${p.image}`} 
                  className="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                  alt={p.name}
                />
                <div className="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                <div className="absolute bottom-6 left-8">
                  <h3 className="text-3xl font-black text-white uppercase italic">{p.name}</h3>
                </div>
              </div>
              <div className="p-8">
                <p className="text-gray-500 text-sm leading-relaxed line-clamp-3 mb-6">
                  {p.description || `Khám phá những danh lam thắng cảnh tuyệt vời tại ${p.name}.`}
                </p>
                <div className="flex items-center text-blue-600 font-black text-xs tracking-[0.2em]">
                  BẮT ĐẦU HÀNH TRÌNH →
                </div>
              </div>
            </Link>
          ))}
        </div>
      </div>
    </div>
  );
}

// --- MAIN APP COMPONENT ---
function App() {
  const [provinces, setProvinces] = useState([]);

  useEffect(() => {
    axios.get(`${BASE_URL}/api/provinces`)
      .then(res => setProvinces(res.data))
      .catch(err => console.error("Lỗi kết nối Backend:", err));
  }, []);

  return (
    <Routes>
      <Route path="/" element={<Home provinces={provinces} />} />
      <Route path="/province/:id" element={<ProvinceDetail />} />
      <Route path="/location/:id" element={<LocationDetail />} />
    </Routes>
  );
}

export default App;