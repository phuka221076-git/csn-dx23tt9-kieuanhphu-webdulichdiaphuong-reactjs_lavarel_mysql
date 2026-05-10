import React, { useEffect, useState, useCallback } from 'react';
import { useParams } from 'react-router-dom';
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

// Hàm render ảnh chuẩn hóa
const renderImage = (path) => {
    if (!path) return "https://placehold.co/600x400?text=No+Image";
    if (path.startsWith('http')) return path;

    // Tách lấy tên file cuối cùng (phòng hờ trong DB vẫn còn chữ locations/)
    const parts = path.split('/');
    const fileName = parts[parts.length - 1];

    return `http://localhost:8000/storage/images/${fileName}`;
};

const LocationDetail = () => {
    const { id } = useParams();
    const [location, setLocation] = useState(null);
    const [loading, setLoading] = useState(true);

    const fetchDetail = useCallback(async () => {
        try {
            setLoading(true);
            const res = await axios.get(`${BASE_URL}/api/locations/${id}`);
            setLocation(res.data);
        } catch (error) {
            console.error("Lỗi:", error);
        } finally {
            setLoading(false);
        }
    }, [id]);

    useEffect(() => {
        if (id) fetchDetail();
    }, [fetchDetail]);

    if (loading) return <div className="p-20 text-center font-bold text-blue-600">Đang tải...</div>;
    if (!location) return <div className="p-20 text-center text-red-500">⚠️ Không tìm thấy!</div>;

    // Chỉ khai báo 1 lần duy nhất
    const lat = parseFloat(location.latitude);
    const lng = parseFloat(location.longitude);
    const hasCoordinates = !isNaN(lat) && !isNaN(lng);

    return (
        <div className="max-w-7xl mx-auto p-4 md:p-8">
            <h1 className="text-4xl font-black uppercase mb-6">{location.name}</h1>
            
            <div className="grid grid-cols-1 lg:grid-cols-12 gap-8">
                <div className="lg:col-span-8">
                    {/* Sửa lỗi hiển thị ảnh ở đây */}
                    <div className="rounded-3xl overflow-hidden shadow-xl mb-8">
                        <img 
                            src={renderImage(location.image_thumbnail)} 
                            alt={location.name} 
                            className="w-full h-auto"
                        />
                    </div>
                    <div dangerouslySetInnerHTML={{ __html: location.content }} className="prose max-w-none" />
                </div>

                <div className="lg:col-span-4">
                    <div className="h-[400px] sticky top-4 rounded-3xl overflow-hidden border-2">
                        {hasCoordinates ? (
                            <MapContainer center={[lat, lng]} zoom={15} style={{height: '100%'}}>
                                <TileLayer url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png" />
                                <Marker position={[lat, lng]}><Popup>{location.name}</Popup></Marker>
                            </MapContainer>
                        ) : <div className="bg-gray-100 h-full flex items-center justify-center italic">Chưa có tọa độ</div>}
                    </div>
                </div>
            </div>
        </div>
    );
};

export default LocationDetail;