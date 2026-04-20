<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    // Hàm này dùng để lấy chi tiết 1 địa điểm
    public function show($id)
    {
        // with(['province', 'category']) giúp lấy thêm tên tỉnh và danh mục
        $location = Location::with(['province', 'category'])->find($id);

        if (!$location) {
            return response()->json(['message' => 'Không tìm thấy địa điểm'], 404);
        }

        return response()->json($location);
    }
}