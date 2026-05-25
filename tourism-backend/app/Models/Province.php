<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'name_search', 'image'];

    // BỎ dòng $withCount nếu có, hoặc thêm dòng này để ép luôn lấy locations
    protected $with = ['locations']; 

    public function locations()
    {
        return $this->hasMany(Location::class, 'province_id', 'id');
    }
}