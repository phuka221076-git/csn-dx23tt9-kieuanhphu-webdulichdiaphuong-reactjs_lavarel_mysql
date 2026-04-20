<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category; // Đảm bảo bạn đã import Model Category

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $categories = [
            ['name' => 'Du lịch Biển đảo', 'slug' => 'du-lich-bien-dao'],
            ['name' => 'Du lịch Nghỉ dưỡng', 'slug' => 'du-lich-nghi-duong'],
            ['name' => 'Di tích Lịch sử - Văn hóa', 'slug' => 'di-tich-lich-su-van-hoa'],
            ['name' => 'Du lịch Sinh thái - Rừng', 'slug' => 'du-lich-sinh-thai-rung'],
            ['name' => 'Du lịch Tâm linh (Chùa, Đền)', 'slug' => 'du-lich-tam-linh'],
            ['name' => 'Vui chơi Giải trí', 'slug' => 'vui-choi-giai-tri'],
            ['name' => 'Ẩm thực & Đặc sản', 'slug' => 'am-thuc-dac-san'],
            ['name' => 'Du lịch Khám phá - Mạo hiểm', 'slug' => 'du-lich-kham-pha-mao-hiem'],
            ['name' => 'Danh lam Thắng cảnh', 'slug' => 'danh-lam-thang-canh'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
