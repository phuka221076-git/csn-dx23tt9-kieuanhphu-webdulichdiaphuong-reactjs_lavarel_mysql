<?php

use App\Models\Province;
use App\Models\Location;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\LocationController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// 1. Lấy danh sách tất cả các tỉnh thành (để hiện lên menu/dropdown)
Route::get('/provinces', function () {
    return Province::all();
});

// 2. Lấy danh sách địa điểm theo ID của tỉnh (Chức năng tra cứu theo địa phương)
Route::get('/provinces/{id}/locations', function ($id) {
    // Trả về các địa điểm thuộc tỉnh đó, kèm theo thông tin loại hình (category)
    return Location::where('province_id', $id)->with('category')->get();
});

Route::get('/provinces', function () {
    // Thêm withCount('locations') để Laravel trả về thêm cột 'locations_count'
    return App\Models\Province::withCount('locations')->get();
});

// 3. Lấy thông tin chi tiết của 1 địa điểm cụ thể
Route::get('/locations/{id}', function ($id) {
    return Location::with(['province', 'category'])->find($id);
});

// 4 API tìm kiếm địa điểm theo tên
Route::get('/locations/search', function (Request $request) {
    $query = $request->query('q');
    return Location::where('name', 'LIKE', "%{$query}%")->get();
});

Route::get('/locations/{id}', [LocationController::class, 'show']);