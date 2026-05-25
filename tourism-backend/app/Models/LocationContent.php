<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationContent extends Model
{
    use HasFactory;

    // Nếu tên bảng của bạn là location_details, hãy khai báo dòng này.
    // Nếu bảng là location_contents thì không cần.
    protected $table = 'location_details'; 

    protected $fillable = [
        'location_id',
        'info_type_id',
        'content',
        'sort_order' // Thêm cột này nếu bạn muốn sắp xếp thứ tự hiển thị
    ];

    /**
     * Kết nối ngược lại với bảng Locations
     */
    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    /**
     * Kết nối với bảng phân loại (Kiến trúc, Di chuyển, Giờ mở cửa...)
     */
    public function infoType()
    {
        return $this->belongsTo(LocationInfoType::class, 'info_type_id');
    }
}