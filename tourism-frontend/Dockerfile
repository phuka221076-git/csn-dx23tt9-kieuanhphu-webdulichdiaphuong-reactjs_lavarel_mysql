# Sử dụng Node.js image
FROM node:20-alpine

WORKDIR /app

# Chỉ copy package.json trước để tận dụng cache của Docker
COPY package*.json ./
RUN npm install

# Copy toàn bộ code
COPY . .

# Mở port cho Vite
EXPOSE 5173

# Chạy ở chế độ dev (hoặc build nếu muốn deploy)
CMD ["npm", "run", "dev", "--", "--host"]