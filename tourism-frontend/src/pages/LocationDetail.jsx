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
    const [selectedImages, setSelectedImages] = useState([]);
    const [submitting, setSubmitting] = useState(false);

    // Lấy thông tin user
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

    const handleImageChange = (e) => {
        if (e.target.files) {
            setSelectedImages([...e.target.files]);
        }
    };

    const handleSubmitReview = async (e) => {
        e.preventDefault();
        if (!comment.trim()) {
            alert("Vui lòng nhập nội dung bình luận!");
            return;
        }

        setSubmitting(true);
        const formData = new FormData();
        formData.append('location_id', id);
        formData.append('user_id', userId);
        formData.append('rating', rating);
        formData.append('comment', comment);
        
        selectedImages.forEach((image) => {
            formData.append('images[]', image);
        });

        try {
            await axios.post(`${BASE_URL}/api/reviews`, formData, {
                headers: {
                    'Authorization': `Bearer ${token}`,
                    'Content-Type': 'multipart/form-data'
                }
            });
            
            setComment(""); 
            setRating(5);   
            setSelectedImages([]); 
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
            {/* Banner chính với Tỉnh nổi bật */}
            <div className="relative h-[65vh] w-full overflow-hidden">
                <img 
                    src={renderImage(location.image_thumbnail)} 
                    alt={location.name}
                    className="w-full h-full object-cover"
                />
                <div className="absolute inset-0 bg-black/50 flex items-center justify-center">
                    <div className="text-center text-white px-4">
                        <h1 className="text-4xl md:text-6xl font-black uppercase tracking-tighter mb-4 drop-shadow-2xl">
                            {location.name}
                        </h1>
                        <div className="flex flex-col items-center gap-3">
                            {/* Hiển thị Tỉnh như một Badge nổi trên nền */}
                            <span className="bg-emerald-600 text-white px-6 py-2 rounded-full text-lg font-bold shadow-xl border border-emerald-400">
                                <i className="fas fa-map-marker-alt mr-2"></i>
                                {location.province?.name}
                            </span>
                            <span className="text-sm opacity-80 uppercase tracking-[0.3em] font-medium">
                                {location.category?.name}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div className="max-w-7xl mx-auto px-4 py-12">
                <div className="grid grid-cols-1 lg:grid-cols-12 gap-12">
                    
                    <div className="lg:col-span-8">
                        {/* Phần Nội dung chi tiết - Đã thu nhỏ chữ */}
                        <div className="prose max-w-none">
                            {location.contents && location.contents.length > 0 ? (
                                <div className="space-y-16">
                                    {location.contents.map((item, index) => (
                                        <div key={index} className="group">
                                            <div className="flex items-center mb-4">
                                                <span className="w-10 h-[2px] bg-emerald-500 mr-4"></span>
                                                <h3 className="text-emerald-600 font-black text-xs uppercase tracking-[0.2em]">
                                                    {item.info_type?.name}
                                                </h3>
                                            </div>
                                            {/* text-base và leading-loose giúp chữ nhỏ nhưng thoáng */}
                                            <div className="text-slate-600 leading-loose text-base text-justify whitespace-pre-line pl-0 md:pl-14">
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
                                <form onSubmit={handleSubmitReview} className="mb-16 bg-slate-50 p-8 rounded-3xl border border-slate-100 shadow-sm">
                                    <h4 className="font-bold text-slate-800 mb-4 text-lg">Chào {userName}, trải nghiệm của bạn thế nào?</h4>
                                    
                                    <div className="flex mb-4">
                                        {[1, 2, 3, 4, 5].map((s) => (
                                            <button 
                                                key={s} type="button" onClick={() => setRating(s)}
                                                className={`text-3xl mr-1 transition-all ${s <= rating ? 'text-yellow-400 scale-110' : 'text-gray-300'}`}
                                            >
                                                ★
                                            </button>
                                        ))}
                                    </div>

                                    <textarea 
                                        className="w-full p-5 rounded-2xl border border-slate-200 focus:ring-2 focus:ring-emerald-500 outline-none text-gray-700 mb-4"
                                        rows="4"
                                        placeholder="Chia sẻ cảm nhận thực tế của bạn..."
                                        value={comment}
                                        onChange={(e) => setComment(e.target.value)}
                                    ></textarea>

                                    <div className="mb-6">
                                        <label className="block text-slate-700 font-bold mb-2 text-sm">Đính kèm ảnh thực tế:</label>
                                        <input 
                                            type="file" multiple accept="image/*" onChange={handleImageChange}
                                            className="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100 cursor-pointer"
                                        />
                                    </div>

                                    <button 
                                        type="submit" disabled={submitting}
                                        className="bg-emerald-600 text-white px-10 py-3 rounded-full font-bold hover:bg-emerald-700 transition-all shadow-lg disabled:bg-gray-400"
                                    >
                                        {submitting ? "Đang gửi..." : "Đăng đánh giá"}
                                    </button>
                                </form>
                            ) : (
                                <div className="mb-16 p-8 bg-slate-50 rounded-3xl border-2 border-dashed border-slate-200 text-center">
                                    <p className="text-gray-500">
                                        Vui lòng <Link to="/login" className="text-emerald-600 font-bold underline">Đăng nhập</Link> để chia sẻ đánh giá.
                                    </p>
                                </div>
                            )}

                            <div className="space-y-12">
                                {reviews.map((rev) => (
                                    <div key={rev.id} className="pb-8 border-b border-slate-100 last:border-0">
                                        <div className="flex justify-between items-center mb-4">
                                            <div className="flex items-center gap-3">
                                                <div className="w-10 h-10 bg-emerald-100 rounded-full flex items-center justify-center text-emerald-700 font-bold uppercase">
                                                    {(rev.user?.name || "D").charAt(0)}
                                                </div>
                                                <div>
                                                    <p className="font-bold text-slate-900">{rev.user?.name || `Du khách`}</p>
                                                    <span className="text-yellow-400 text-sm">{'★'.repeat(rev.rating)}</span>
                                                </div>
                                            </div>
                                            <span className="text-slate-400 text-xs">
                                                {new Date(rev.created_at).toLocaleDateString('vi-VN')}
                                            </span>
                                        </div>
                                        <p className="text-slate-600 leading-relaxed mb-4">{rev.comment}</p>

                                        {/* Hiển thị mảng ảnh Review */}
                                        {rev.images && (
                                            <div className="flex gap-3 flex-wrap">
                                                {JSON.parse(rev.images).map((img, idx) => (
                                                    <img 
                                                        key={idx}
                                                        src={`${BASE_URL}/storage/${img}`} 
                                                        alt="review"
                                                        className="w-24 h-24 object-cover rounded-xl border border-slate-200 hover:scale-105 transition-transform cursor-zoom-in"
                                                        onClick={() => window.open(`${BASE_URL}/storage/${img}`, '_blank')}
                                                    />
                                                ))}
                                            </div>
                                        )}
                                    </div>
                                ))}
                            </div>
                        </div>
                    </div>

                    {/* Cột Thông tin bên phải */}
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