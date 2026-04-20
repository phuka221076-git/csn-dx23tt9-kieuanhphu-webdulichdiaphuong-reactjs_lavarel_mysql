<?php
namespace Database\Seeders\Provinces;
use Illuminate\Database\Seeder;
use App\Models\Location;
use App\Models\Province;

class LaoCaiSeeder extends Seeder {
    public function run() {
        $p = Province::where('name', 'LIKE', '%Lào Cai%')->first();
        if (!$p) return;
        $locations = [
            ['province_id'=>$p->id, 'category_id'=>9, 'name'=>'Đỉnh Fansipan', 'address'=>'Sapa, Lào Cai', 'content'=>'Nóc nhà Đông Dương với độ cao 3.143m.', 'image_thumbnail'=>'fansipan.jpg'],
            ['province_id'=>$p->id, 'category_id'=>9, 'name'=>'Bản Cát Cát', 'address'=>'Sapa, Lào Cai', 'content'=>'Ngôi làng cổ của người Hmong với phong cảnh thơ mộng.', 'image_thumbnail'=>'cat-cat.jpg'],
        ];
        foreach ($locations as $loc) Location::create($loc);
    }
}