<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    // THÊM DÒNG NÀY VÀO ĐÂY NÈ CON
    protected $fillable = [
        'name',
        'slug',
        'image',
    ];

    // Các quan hệ khác (nếu có)
    public function locations()
    {
        return $this->hasMany(Location::class);
    }
}