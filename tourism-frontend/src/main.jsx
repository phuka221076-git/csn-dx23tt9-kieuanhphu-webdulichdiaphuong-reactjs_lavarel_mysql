// src/main.jsx
import React from 'react';
import ReactDOM from 'react-dom/client';
import { BrowserRouter } from 'react-router-dom'; // 1. Import cái này
import App from './App';
import './index.css';
import 'leaflet/dist/leaflet.css'; // Sẵn tiện kiểm tra xem có dòng này chưa nhé

ReactDOM.createRoot(document.getElementById('root')).render(
  //<React.StrictMode>
    <BrowserRouter> {/* 2. Bao bọc App lại */}
      <App />
    </BrowserRouter>
  //</React.StrictMode>
);