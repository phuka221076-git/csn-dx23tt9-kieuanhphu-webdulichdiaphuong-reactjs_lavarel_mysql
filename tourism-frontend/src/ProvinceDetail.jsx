import { useEffect, useState } from 'react'
import { useParams, Link } from 'react-router-dom'
import axios from 'axios'

function ProvinceDetail() {
  const { id } = useParams(); // Lấy ID từ thanh địa chỉ (URL)
  const [locations, setLocations] = useState([]);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    axios.get(`http://127.0.0.1:8000/api/provinces/${id}/locations`)
      .then(res => {
        setLocations(res.data);
        setLoading(false);
      })
      .catch(err => console.log(err));
  }, [id]);

  if (loading) return <div className="text-center mt-10">Đang tải địa điểm...</div>;

  return (
    <div className="min-h-screen bg-gray-50 p-8">
      <div className="max-w-6xl mx-auto">
        <Link to="/" className="text-blue-600 hover:underline mb-6 inline-block">← Quay lại danh sách tỉnh</Link>
        
        <h2 className="text-3xl font-bold mb-8 text-gray-800">Địa điểm du lịch nổi bật</h2>

        {locations.length === 0 ? (
          <p className="text-gray-500">Chưa có dữ liệu địa điểm cho tỉnh này.</p>
        ) : (
          <div className="grid grid-cols-1 md:grid-cols-2 gap-8">
            {locations.map(loc => (
              <div key={loc.id} className="bg-white rounded-2xl shadow-lg overflow-hidden flex flex-col md:flex-row border border-gray-100">
                src={`${BASE_URL}/storage/images/${loc.image_thumbnail}`} 
                alt={loc.name}
                className="w-full sm:w-48 h-48 object-cover"
                onError={(e) => {
                  // Debug giúp bạn: Nếu ảnh lỗi, nó sẽ in ra tên file đang thiếu
                  console.log("Lỗi tải ảnh địa điểm:", loc.image_thumbnail); 
                  e.target.src = 'https://images.unsplash.com/photo-1528127269322-539801943592?q=80&w=500';
                }}
                <div className="p-6">
                  <span className="text-xs font-semibold bg-blue-100 text-blue-600 px-3 py-1 rounded-full uppercase">
                    {loc.category?.name}
                  </span>
                  <h3 className="text-xl font-bold mt-2 text-gray-800">{loc.name}</h3>
                  <p className="text-gray-500 text-sm mt-1">📍 {loc.address}</p>
                  <p className="text-gray-600 mt-4 line-clamp-2 text-sm italic">"{loc.content}"</p>
                </div>
              </div>
            ))}
          </div>
        )}
      </div>
    </div>
  );
}

export default ProvinceDetail;