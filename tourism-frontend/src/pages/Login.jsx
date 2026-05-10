import { useState } from 'react';
import axios from 'axios';
import { useNavigate, Link } from 'react-router-dom';

function Login({ setUser }) {
    const [formData, setFormData] = useState({ email: '', password: '' });
    const navigate = useNavigate();

    const handleSubmit = async (e) => {
        e.preventDefault();
        try {
            const res = await axios.post('http://127.0.0.1:8000/api/login', formData);
            
            // Lưu thông tin vào máy
            localStorage.setItem('token', res.data.token);
            localStorage.setItem('user', JSON.stringify(res.data.user));
            
            // CẬP NHẬT STATE Ở APP.JSX (Quan trọng nhất)
            setUser(res.data.user);
            
            navigate('/'); // Về trang chủ
        } catch (err) {
            alert("Email hoặc mật khẩu không chính xác!");
        }
    };

    return (
        <div className="min-h-screen flex items-center justify-center bg-gray-50">
            <div className="max-w-md w-full p-10 bg-white shadow-2xl rounded-[2rem]">
                <div className="text-center mb-10">
                    <h2 className="text-4xl font-black italic uppercase tracking-tighter text-blue-950">ĐĂNG NHẬP</h2>
                    <p className="text-gray-400 font-bold text-xs mt-2 uppercase tracking-widest">Chào mừng bạn trở lại Vinatour</p>
                </div>
                
                <form onSubmit={handleSubmit} className="space-y-6">
                    <div>
                        <label className="block text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2">Email</label>
                        <input 
                            type="email" 
                            className="w-full px-6 py-4 bg-gray-50 border-none rounded-2xl outline-none focus:ring-2 ring-blue-900 font-bold"
                            placeholder="your@email.com"
                            onChange={(e) => setFormData({...formData, email: e.target.value})}
                            required
                        />
                    </div>
                    <div>
                        <label className="block text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2">Mật khẩu</label>
                        <input 
                            type="password" 
                            className="w-full px-6 py-4 bg-gray-50 border-none rounded-2xl outline-none focus:ring-2 ring-blue-900 font-bold"
                            placeholder="••••••••"
                            onChange={(e) => setFormData({...formData, password: e.target.value})}
                            required
                        />
                    </div>
                    
                    <button 
                        type="submit"
                        className="w-full py-4 bg-blue-950 text-white rounded-2xl font-black italic uppercase tracking-tighter hover:bg-blue-800 transition-all shadow-xl shadow-blue-900/20"
                    >
                        Đăng nhập ngay
                    </button>
                </form>

                <p className="text-center mt-8 text-sm font-bold text-gray-400">
                    Chưa có tài khoản? <Link to="/register" className="text-blue-600 underline">Đăng ký ngay</Link>
                </p>
            </div>
        </div>
    );
}

export default Login;