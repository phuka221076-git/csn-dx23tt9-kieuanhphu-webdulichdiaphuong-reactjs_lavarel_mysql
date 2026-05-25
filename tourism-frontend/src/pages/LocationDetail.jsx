import React, { useEffect, useState, useCallback } from 'react';
import { useParams, Link } from 'react-router-dom';
import axios from 'axios';
import { MapContainer, TileLayer, Marker, Popup } from 'react-leaflet';
import 'leaflet/dist/leaflet.css';
import L from 'leaflet';

// Fix icon Marker Leaflet
import markerIcon from 'leaflet/dist/images/marker-icon.png';
import markerShadow from 'leaflet/dist/images/marker-shadow.png';

let DefaultIcon = L.icon({
    iconUrl: markerIcon,
    shadowUrl: markerShadow,
    iconSize: [25, 41],
    iconAnchor: [12, 41]
});
L.Marker.prototype.options.icon = DefaultIcon;

const BASE_URL = 'http://localhost:8000';

const renderImage = (path) => {
    if (!path) return "https://placehold.co/800x400?text=No+Image";
    if (path.startsWith('http')) return path;
    const fileName = path.split('/').pop();
    return `${BASE_URL}/storage/images/${fileName}`;
};

const LocationDetail = () => {
    const { id } = useParams();
    const [location, setLocation] = useState(null);
    const [reviews, setReviews] = useState([]);
    const [loading, setLoading] = useState(true);

    // State cho Form đánh giá
    const [rating, setRating] = useState(5);
    const [comment, setComment] = useState("");
    const [selectedImages, setSelectedImages] = useState([]); // --- THÊM MỚI: State lưu ảnh ---
    const [submitting, setSubmitting] = useState(false);

    // Lấy thông tin user từ localStorage
    const userRaw = localStorage.getItem('user');
    const userObj = userRaw ? JSON.parse(userRaw) : null;
    const userId = userObj?.id; 
    const userName = userObj?.name || "Bạn";
    const token = localStorage.getItem('token');

    const fetchData = useCallback(async () => {
        try {
            setLoading(true);
            const locRes = await axios.get(`${BASE_URL}/api/locations/${id}`);
            setLocation(locRes.data);

            const revRes = await axios.get(`${BASE_URL}/api/locations/${id}/reviews`);
            setReviews(Array.isArray(revRes.data) ? revRes.data : []);
        } catch (error) {
            console.error("Lỗi khi tải dữ liệu:", error);
        } finally {
            setLoading(false);
        }
    }, [id]);

    useEffect(() => {
        fetchData();
    }, [fetchData]);

    // --- THÊM MỚI: Hàm xử lý chọn ảnh ---
    const handleImageChange = (e) => {
        if (e.target.files) {
            setSelectedImages([...e.target.files]);
        }
    };

    // Hàm gửi đánh giá
    const handleSubmitReview = async (e) => {
        e.preventDefault();
        if (!comment.trim()) {
            alert("Vui lòng nhập nội dung bình luận!");
            return;
        }

        setSubmitting(true);

        // --- THAY ĐỔI: Sử dụng FormData để gửi kèm file ---
        const formData = new FormData();
        formData.append('location_id', id);
        formData.append('user_id', userId);
        formData.append('rating', rating);
        formData.append('comment', comment);
        
        // Append từng file ảnh vào mảng images[]
        selectedImages.forEach((image) => {
            formData.append('images[]', image);
        });

        try {
            await axios.post(`${BASE_URL}/api/reviews`, formData, {
                headers: {
                    'Authorization': `Bearer ${token}`,
                    'Content-Type': 'multipart/form-data' // Bắt buộc khi gửi file
                }
            });
            
            setComment(""); 
            setRating(5);   
            setSelectedImages([]); // Xóa danh sách ảnh đã chọn
            fetchData();    
            alert("Cảm ơn bạn đã đánh giá!");
        } catch (error) {
            console.error("Lỗi gửi đánh giá:", error.response?.data || error);
            alert("Lỗi: " + (error.response?.data?.message || "Không thể gửi đánh giá."));
        } finally {
            setSubmitting(false);
        }
    };

    if (loading) return <div className="text-center py-20 font-medium">Đang tải dữ liệu...</div>;
    if (!location) return <div className="text-center py-20">Không tìm thấy địa điểm.</div>;

    const lat = parseFloat(location.latitude);
    const lng = parseFloat(location.longitude);

    return (
        <div className="bg-white min-h-screen">
            {/* Banner chính */}
            <div className="relative h-[60vh] w-full overflow-hidden">
                <img 
                    src={renderImage(location.image_thumbnail)} 
                    alt={location.name}
                    className="w-full h-full object-cover"
                />
                <div className="absolute inset-0 bg-black/40 flex items-center justify-center">
                    <div className="text-center text-white px-4">
                        <h1 className="text-4xl md:text-6xl font-black uppercase tracking-tighter mb-4">
                            {location.name}
                        </h1>
                        <p className="text-lg md:text-xl opacity-90">
                            {location.province?.name} — {location.category?.name}
                        </p>
                    </div>
                </div>
            </div>

            <div className="max-w-7xl mx-auto px-4 py-12">
                <div className="grid grid-cols-1 lg:grid-cols-12 gap-12">
                    
                    <div className="lg:col-span-8">
                        <div className="prose max-w-none">
                            {location.contents && location.contents.length > 0 ? (
                                <div className="space-y-16">
                                    {location.contents.map((item, index) => (
                                        <div key={index} className="group">
                                            <div className="flex items-center mb-6">
                                                <span className="w-12 h-[2px] bg-emerald-500 mr-4"></span>
                                                <h3 className="text-emerald-600 font-black text-sm uppercase tracking-[0.2em]">
                                                    {item.info_type?.name}
                                                </h3>
                                            </div>
                                            <div className="text-gray-700 leading-relaxed text-lg text-justify whitespace-pre-line pl-0 md:pl-16">
                                                {item.content}
                                            </div>
                                        </div>
                                    ))}
                                </div>
                            ) : (
                                <p className="italic text-gray-400">Đang cập nhật nội dung chi tiết...</p>
                            )}
                        </div>

                        {/* PHẦN ĐÁNH GIÁ (REVIEWS) */}
                        <div className="mt-24 border-t pt-16">
                            <h2 className="text-3xl font-black text-slate-900 mb-10 uppercase">
                                Đánh giá từ cộng đồng ({reviews.length})
                            </h2>

                            {userId ? (
                                <form onSubmit={handleSubmitReview} className="mb-16 bg-emerald-50 p-8 rounded-3xl border border-emerald-100 shadow-sm">
                                    <h4 className="font-bold text-emerald-900 mb-4 text-lg">Chào {userName}, trải nghiệm của bạn thế nào?</h4>
                                    
                                    <div className="flex mb-4">
                                        {[1, 2, 3, 4, 5].map((s) => (
                                            <button 
                                                key={s} 
                                                type="button" 
                                                onClick={() => setRating(s)}
                                                className={`text-3xl mr-1 transition-transform hover:scale-125 ${s <= rating ? 'text-yellow-400' : 'text-gray-300'}`}
                                            >
                                                ★
                                            </button>
                                        ))}
                                    </div>

                                    <textarea 
                                        className="w-full p-5 rounded-2xl border-none ring-1 ring-emerald-200 focus:ring-2 focus:ring-emerald-500 outline-none text-gray-700 shadow-inner mb-4"
                                        rows="4"
                                        placeholder="Chia sẻ cảm nhận của bạn về con người, cảnh vật hay món ăn tại đây..."
                                        value={comment}
                                        onChange={(e) => setComment(e.target.value)}
                                    ></textarea>

                                    {/* --- THÊM MỚI: UI Input chọn nhiều ảnh --- */}
                                    <div className="mb-6">
                                        <label className="block text-emerald-800 font-bold mb-2 text-sm uppercase tracking-wide">Đính kèm ảnh thực tế:</label>
                                        <input 
                                            type="file" 
                                            multiple 
                                            accept="image/*" 
                                            onChange={handleImageChange}
                                            className="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-emerald-100 file:text-emerald-700 hover:file:bg-emerald-200 cursor-pointer"
                                        />
                                        {selectedImages.length > 0 && (
                                            <p className="mt-2 text-xs text-emerald-600 font-medium">Đã chọn {selectedImages.length} ảnh</p>
                                        )}
                                    </div>

                                    <button 
                                        type="submit"
                                        disabled={submitting}
                                        className="bg-emerald-600 text-white px-10 py-3 rounded-full font-bold hover:bg-emerald-700 transition-all shadow-lg disabled:bg-gray-400"
                                    >
                                        {submitting ? "Đang gửi..." : "Đăng đánh giá"}
                                    </button>
                                </form>
                            ) : (
                                <div className="mb-16 p-8 bg-slate-50 rounded-3xl border-2 border-dashed border-slate-200 text-center">
                                    <p className="text-gray-500 text-lg">
                                        Vui lòng <Link to="/login" className="text-emerald-600 font-bold underline">Đăng nhập</Link> để chia sẻ đánh giá của bạn.
                                    </p>
                                </div>
                            )}

                            <div className="space-y-8">
                                {reviews.length > 0 ? (
                                    reviews.map((rev) => (
                                        <div key={rev.id} className="border-b border-gray-100 pb-8 last:border-0">
                                            <div className="flex justify-between items-start mb-3">
                                                <div>
                                                    <span className="font-bold text-gray-900 mr-3">{rev.user?.name || `Du khách #${rev.user_id}`}</span>
                                                    <span className="text-yellow-400">{'★'.repeat(rev.rating)}</span>
                                                </div>
                                                <span className="text-gray-400 text-sm italic">
                                                    {new Date(rev.created_at).toLocaleDateString('vi-VN')}
                                                </span>
                                            </div>
                                            <p className="text-gray-600 leading-relaxed italic mb-4">"{rev.comment}"</p>

                                            {/* --- THÊM MỚI: Hiển thị mảng ảnh của bình luận --- */}
                                            {rev.images && (
                                                <div className="flex gap-2 flex-wrap">
                                                    {JSON.parse(rev.images).map((img, idx) => (
                                                        <img 
                                                            key={idx}
                                                            src={`${BASE_URL}/storage/${img}`} 
                                                            alt="review"
                                                            className="w-24 h-24 object-cover rounded-xl border border-gray-100 shadow-sm hover:scale-105 transition-transform cursor-pointer"
                                                            onClick={() => window.open(`${BASE_URL}/storage/${img}`, '_blank')}
                                                        />
                                                    ))}
                                                </div>
                                            )}
                                        </div>
                                    ))
                                ) : (
                                    <p className="text-gray-400 text-center py-10">Chưa có đánh giá nào. Hãy là người đầu tiên!</p>
                                )}
                            </div>
                        </div>
                    </div>

                    <div className="lg:col-span-4">
                        <div className="sticky top-10 space-y-6">
                            <div className="bg-slate-900 p-8 rounded-[2.5rem] text-white shadow-xl">
                                <h4 className="text-emerald-400 text-xs font-black uppercase tracking-widest mb-4">Địa chỉ</h4>
                                <p className="text-xl font-medium leading-snug">{location.address}</p>
                            </div>

                            <div className="h-[450px] rounded-[2.5rem] overflow-hidden shadow-2xl border-8 border-white">
                                {!isNaN(lat) && !isNaN(lng) && (
                                    <MapContainer center={[lat, lng]} zoom={15} style={{height: '100%', width: '100%'}}>
                                        <TileLayer url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png" />
                                        <Marker position={[lat, lng]}>
                                            <Popup>{location.name}</Popup>
                                        </Marker>
                                    </MapContainer>
                                )}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
};

export default LocationDetail;