<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Du lịch Biển đảo',
                'slug' => 'du-lich-bien-dao',
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Du lịch Nghỉ dưỡng',
                'slug' => 'du-lich-nghi-duong',
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Di tích Lịch sử - Văn hóa',
                'slug' => 'di-tich-lich-su-van-hoa',
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Du lịch Sinh thái - Rừng',
                'slug' => 'du-lich-sinh-thai-rung',
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
            ),
            4 => 
            array (
                'id' => 5,
            'name' => 'Du lịch Tâm linh (Chùa, Đền)',
                'slug' => 'du-lich-tam-linh',
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Vui chơi Giải trí',
                'slug' => 'vui-choi-giai-tri',
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Ẩm thực & Đặc sản',
                'slug' => 'am-thuc-dac-san',
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Du lịch Khám phá - Mạo hiểm',
                'slug' => 'du-lich-kham-pha-mao-hiem',
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Danh lam Thắng cảnh',
                'slug' => 'danh-lam-thang-canh',
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
            ),
        ));
        
        
    }
}