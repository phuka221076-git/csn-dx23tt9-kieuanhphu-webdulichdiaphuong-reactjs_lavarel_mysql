<?php
namespace Database\Seeders\Provinces;
use Illuminate\Database\Seeder;
use App\Models\Location;
use App\Models\Province;

class NinhBinhSeeder extends Seeder {
    public function run() {
        $p = Province::where('name', 'LIKE', '%Ninh Bình%')->first();
        if (!$p) return;
        $locations = [
            ['province_id'=>$p->id, 'category_id'=>9, 'name'=>'Tràng An', 'address'=>'Hoa Lư, Ninh Bình', 'content'=>'Di sản văn hóa và thiên nhiên thế giới UNESCO.', 'image_thumbnail'=>'trang-an.jpg'],
            ['province_id'=>$p->id, 'category_id'=>5, 'name'=>'Chùa Bái Đính', 'address'=>'Gia Viễn, Ninh Bình', 'content'=>'Quần thể chùa lớn nhất Việt Nam.', 'image_thumbnail'=>'bai-dinh.jpg'],
        ];
        foreach ($locations as $loc) Location::create($loc);
    }
}