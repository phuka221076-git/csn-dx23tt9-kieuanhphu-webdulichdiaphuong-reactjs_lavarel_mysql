<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// Class phải trùng tên với File (Review)
class Review extends Model 
{
    protected $table = 'reviews'; // Bảng trong DB vẫn là reviews
    protected $fillable = ['location_id', 'user_id', 'rating', 'comment', 'images'];

    public function location()
    {
        // Một bình luận thuộc về một Địa điểm (Location)
        // 'location_id' là khóa ngoại trong bảng reviews
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}