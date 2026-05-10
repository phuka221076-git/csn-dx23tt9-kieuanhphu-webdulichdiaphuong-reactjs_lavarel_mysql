import { useEffect, useState } from 'react';
import axios from 'axios';

const BASE_URL = "http://127.0.0.1:8000";

function ReviewManager() {
  const [reviews, setReviews] = useState([]);

  /* useEffect(() => {
    fetchReviews();
  }, []); */

  // Ví dụ logic đổ dữ liệu vào bảng
useEffect(() => {
    axios.get('http://127.0.0.1:8000/api/admin/reviews')
        .then(res => {
            setReviews(res.data); // Đổ dữ liệu vào state để map ra table
        })
        .catch(err => console.log("Lỗi rồi bạn ơi:", err));
}, []);

  /* const fetchReviews = () => {
    axios.get(`${BASE_URL}/api/admin/reviews`).then(res => setReviews(res.data));
  }; */

  const fetchReviews = () => {
        axios.get(`${BASE_URL}/api/admin/reviews`)
        .then(res => {
            console.log("Dữ liệu Admin nhận được:", res.data); // <-- Con F12 xem dòng này hiện gì
            setReviews(res.data);
        })
        .catch(e => console.error("Lỗi gọi API Admin:", e));
    };
    
  const handleDelete = (id) => {
    if(window.confirm("Con có chắc muốn xóa bình luận này không?")) {
        axios.delete(`${BASE_URL}/api/admin/reviews/${id}`).then(() => fetchReviews());
    }
  };

  return (
    <div className="p-8">
      <h2 className="text-3xl font-black italic uppercase mb-6">Kiểm duyệt bình luận</h2>
      <div className="bg-white rounded-2xl shadow-xl overflow-hidden">
        <table className="w-full text-left">
          <thead className="bg-gray-50 border-b">
            <tr>
              <th className="p-4 uppercase text-xs font-bold">Người dùng</th>
              <th className="p-4 uppercase text-xs font-bold">Địa điểm</th>
              <th className="p-4 uppercase text-xs font-bold">Nội dung</th>
              <th className="p-4 uppercase text-xs font-bold">Hành động</th>
            </tr>
          </thead>
          <tbody>
            {reviews.map(r => (
              <tr key={r.id} className="border-b hover:bg-gray-50">
                <td className="p-4 font-bold">{r.user?.name}</td>
                <td className="p-4 text-blue-600">{r.location?.name}</td>
                <td className="p-4 italic text-gray-600">"{r.comment}"</td>
                <td className="p-4">
                  <button onClick={() => handleDelete(r.id)} className="text-red-500 font-bold hover:underline">Xóa</button>
                </td>
              </tr>
            ))}
          </tbody>
        </table>
      </div>
    </div>
  );
}

export default ReviewManager;