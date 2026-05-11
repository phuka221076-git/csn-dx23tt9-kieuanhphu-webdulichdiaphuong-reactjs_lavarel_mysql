🌏 Ứng Dụng Web Tra Cứu Thông Tin Du Lịch Địa PhươngDự án này là hệ thống tra cứu thông tin du lịch (CSN - Đề tài: Web du lịch địa phương), tích hợp các tính năng hiện đại để quảng bá và hỗ trợ khách du lịch. Hệ thống được phát triển bởi sinh viên khoa Kỹ thuật và Công nghệ - Trường Đại học Trà Vinh (TVU).  🛠 Công Nghệ Sử DụngBackend: PHP 8.x, Framework Laravel 10.  Frontend: ReactJS (Vite), Tailwind CSS.  Database: MySQL.  Containerization: Docker & Docker Compose.  Công cụ quản lý mã nguồn: GitHub.  🚀 Hướng Dẫn Cài Đặt (Local Development)1. Yêu cầu hệ thốngĐã cài đặt Docker & Docker Compose.  Hoặc cài đặt thủ công: PHP >= 8.1, Node.js >= 16, Composer.  2. Triển khai bằng Docker (Khuyên dùng)Dự án đã được cấu hình sẵn môi trường Docker để đảm bảo tính đồng nhất:  Bash# Clone dự án từ Github
git clone https://github.com/phuka221076-git/csn-dx23tt9-kieuanhphu-webdulichdiaphuong-reactjs_lavarel_mysql.git
cd csn-dx23tt9-kieuanhphu-webdulichdiaphuong-reactjs_lavarel_mysql

# Khởi chạy các container
docker-compose up -d --build
```[cite: 1]

### 3. Cài đặt thủ công không dùng Docker
**Thiết lập Backend (Laravel):**
```bash
cd backend
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed  # Tạo cấu trúc bảng và dữ liệu mẫu
php artisan serve
```[cite: 1]

**Thiết lập Frontend (ReactJS):**
```bash
cd frontend
npm install
npm run dev
```[cite: 1]

## 🌐 Hướng Dẫn Deploy (Production)

*   **Frontend (Vercel):** Kết nối repository với Vercel, đặt thư mục gốc là `/frontend` và cấu hình biến môi trường `VITE_API_URL`[cite: 1].
*   **Backend (Render/Railway/VPS):** Cấu hình các biến môi trường MySQL và APP_KEY trên server. Chạy lệnh `php artisan migrate --force` để khởi tạo cơ sở dữ liệu[cite: 1].

## 📂 Cấu Trúc Dự Án
*   `/backend`: Chứa mã nguồn API xử lý dữ liệu du lịch địa phương[cite: 1].
*   `/frontend`: Chứa mã nguồn giao diện người dùng hiển thị thông tin địa danh[cite: 1].
*   `/docker`: Các file cấu hình môi trường chạy dự án[cite: 1].

## 📝 Ghi Chú Đồ Án
Dự án tập trung vào việc áp dụng lý thuyết lập trình Full-stack để xây dựng ứng dụng thực tiễn, giúp tra cứu thông tin địa phương một cách trực quan và hiệu quả[cite: 1].

---
**Tác giả:** Kiều Anh Phú[cite: 1]
**Đơn vị:** Khoa Kỹ thuật và Công nghệ - Đại học Trà Vinh (TVU)[cite: 1].

---


