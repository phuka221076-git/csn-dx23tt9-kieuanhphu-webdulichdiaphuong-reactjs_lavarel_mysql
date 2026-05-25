<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    //
    use HasFactory;

    // Phải có dòng này để Seeder có thể chạy lệnh create()
    protected $fillable = ['province_id', 'category_id', 'name','name_search', 'address', 'content', 'image_thumbnail', 'latitude', 'longitude', 'is_featured'];

    // THÊM ĐOẠN NÀY VÀO MODEL
    protected $casts = [
        'is_featured' => 'integer',
    ];

    // Khai báo quan hệ để React có thể lấy tên tỉnh/danh mục
    public function province() {
        return $this->belongsTo(Province::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }
    // app/Models/Location.php
    public function reviews()
    {
        // Phải là Review::class (không có s, viết hoa R)
        return $this->hasMany(Review::class, 'location_id');
    }
    public function contents() 
    {
        return $this->hasMany(LocationContent::class, 'location_id');
    }
}
