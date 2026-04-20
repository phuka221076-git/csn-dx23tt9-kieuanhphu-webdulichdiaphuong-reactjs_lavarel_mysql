import axios from 'axios';

const api = axios.create({
    baseURL: 'http://127.0.0.1:8000/api' // Đường dẫn đến Laravel của bạn
});

export const getProvinces = () => api.get('/provinces');
export const getLocationsByProvince = (id) => api.get(`/provinces/${id}/locations`);

export default api;