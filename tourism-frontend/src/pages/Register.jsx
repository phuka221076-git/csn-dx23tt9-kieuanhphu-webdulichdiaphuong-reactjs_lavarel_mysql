import React, { useState } from 'react';
import axios from 'axios';
import { useNavigate, Link } from 'react-router-dom';

const Register = () => {
    const [formData, setFormData] = useState({ name: '', email: '', password: '', password_confirmation: '' });
    const navigate = useNavigate();

    const handleRegister = async (e) => {
        e.preventDefault();
        try {
            await axios.post('http://127.0.0.1:8000/api/register', formData);
            alert("Đăng ký thành công! Hãy đăng nhập.");
            navigate('/login');
        } catch (err) {
            alert("Lỗi đăng ký: " + err.response?.data?.message);
        }
    };

    return (
        <div className="min-h-screen bg-gray-900 flex items-center justify-center px-6">
            <div className="max-w-md w-full bg-white p-10 rounded-[2rem] shadow-2xl">
                <h2 className="text-5xl font-black italic uppercase tracking-tighter mb-8 text-gray-900">Đăng ký</h2>
                <form onSubmit={handleRegister} className="space-y-4">
                    <input type="text" placeholder="HỌ TÊN" className="w-full p-4 bg-gray-100 rounded-xl font-bold outline-none" 
                        onChange={e => setFormData({...formData, name: e.target.value})} required />
                    <input type="email" placeholder="EMAIL" className="w-full p-4 bg-gray-100 rounded-xl font-bold outline-none" 
                        onChange={e => setFormData({...formData, email: e.target.value})} required />
                    <input type="password" placeholder="MẬT KHẨU" className="w-full p-4 bg-gray-100 rounded-xl font-bold outline-none" 
                        onChange={e => setFormData({...formData, password: e.target.value})} required />
                    <input type="password" placeholder="XÁC NHẬN MẬT KHẨU" className="w-full p-4 bg-gray-100 rounded-xl font-bold outline-none" 
                        onChange={e => setFormData({...formData, password_confirmation: e.target.value})} required />
                    <button type="submit" className="w-full bg-blue-600 text-white p-4 rounded-xl font-black italic uppercase hover:bg-black transition-all">Tạo tài khoản</button>
                </form>
                <p className="mt-6 text-center font-bold italic text-sm text-gray-400">
                    Đã có tài khoản? <Link to="/login" className="text-blue-600 underline">ĐĂNG NHẬP</Link>
                </p>
            </div>
        </div>
    );
};

export default Register;