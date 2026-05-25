// src/main.jsx
import React from 'react';
import ReactDOM from 'react-dom/client';
import { BrowserRouter } from 'react-router-dom';
import App from './App';
import './index.css';
import 'leaflet/dist/leaflet.css';
import axios from 'axios'; // Import axios để cấu hình toàn cục

/* |--------------------------------------------------------------------------
| CẤU HÌNH AXIOS INTERCEPTOR (BỘ LỌC TỰ ĐỘNG)
|--------------------------------------------------------------------------
*/

// 1. Tự động đính kèm Token vào mọi Request gửi đi
axios.interceptors.request.use((config) => {
  const token = localStorage.getItem('token');
  if (token) {
    config.headers.Authorization = `Bearer ${token}`;
  }
  return config;
}, (error) => {
  return Promise.reject(error);
});

// 2. Tự động xử lý khi Token hết hạn hoặc sai (Lỗi 401)
axios.interceptors.response.use(
  (response) => response,
  (error) => {
    // Nếu server trả về 401 (Unauthorized)
    if (error.response && error.response.status === 401) {
      localStorage.removeItem('token');
      localStorage.removeItem('user');
      // Chỉ chuyển hướng nếu không phải đang ở trang login để tránh lặp vô tận
      if (window.location.pathname !== '/login') {
        window.location.href = '/login';
      }
    }
    return Promise.reject(error);
  }
);

/* |--------------------------------------------------------------------------
| KHỞI CHẠY ỨNG DỤNG
|--------------------------------------------------------------------------
*/
ReactDOM.createRoot(document.getElementById('root')).render(
    <BrowserRouter> 
      <App />
    </BrowserRouter>
);