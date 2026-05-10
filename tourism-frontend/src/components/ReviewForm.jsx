import { Star } from 'lucide-react';

const ReviewForm = ({ locationId }) => {
    const [rating, setRating] = useState(0);
    const [comment, setComment] = useState("");

    const handleSubmit = async (e) => {
        e.preventDefault();
        try {
            await axios.post('/api/reviews', {
                location_id: locationId,
                rating,
                comment
            }, {
                headers: { Authorization: `Bearer ${localStorage.getItem('token')}` }
            });
            alert("Gửi đánh giá thành công!");
        } catch (error) {
            alert("Con cần đăng nhập để bình luận nhé!");
        }
    };

    return (
        <form onSubmit={handleSubmit} className="p-4 bg-white rounded-lg shadow">
            <h3 className="font-bold mb-2">Đánh giá địa điểm này</h3>
            <div className="flex mb-2">
                {[1, 2, 3, 4, 5].map((star) => (
                    <Star 
                        key={star} 
                        fill={star <= rating ? "gold" : "none"} 
                        onClick={() => setRating(star)}
                        className="cursor-pointer"
                    />
                ))}
            </div>
            <textarea 
                className="w-full border p-2 rounded" 
                placeholder="Nhập cảm nghĩ của bạn..."
                onChange={(e) => setComment(e.target.value)}
            />
            <button className="bg-red-600 text-white px-4 py-2 mt-2 rounded">Gửi</button>
        </form>
    );
};