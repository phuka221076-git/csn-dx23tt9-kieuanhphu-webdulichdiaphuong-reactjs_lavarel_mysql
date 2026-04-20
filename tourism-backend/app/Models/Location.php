<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    //
    use HasFactory;

    // Phải có dòng này để Seeder có thể chạy lệnh create()
    protected $fillable = [
        'province_id', 
        'category_id', 
        'name', 
        'address', 
        'content', 
        'image_thumbnail', 
        'is_featured'
    ];

    // Khai báo quan hệ để React có thể lấy tên tỉnh/danh mục
    public function province() {
        return $this->belongsTo(Province::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

}
