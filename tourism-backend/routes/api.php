<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\Location;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\Admin\ProvinceController;
use App\Http\Controllers\Api\Admin\UserController;
use App\Http\Controllers\Api\Admin\LocationController;
use App\Http\Controllers\Api\ReviewController;

/*
|--------------------------------------------------------------------------
| 1. CẤU HÌNH ĐĂNG NHẬP & CÔNG KHAI (PUBLIC)
|--------------------------------------------------------------------------
*/

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register']);

// --- ROUTE BÌNH LUẬN (ĐÃ FIX: Chỉ để 1 cái duy nhất ở ngoài để test) ---
Route::post('/reviews', [ReviewController::class, 'store']); 
Route::get('/locations/{id}/reviews', [ReviewController::class, 'index']); 

// Các API cho khách xem
Route::get('/provinces', function () {
    return Province::withCount('locations')->get();
});

Route::get('/locations/search', function (Request $request) {
    $query = $request->query('q');
    return Location::where('name', 'LIKE', "%{$query}%")->with(['province', 'category'])->get();
});

Route::get('/locations/{id}', [LocationController::class, 'show']);
Route::get('/provinces/{id}/locations', [LocationController::class, 'getLocationsByProvince']);
Route::get('/provinces/{id}', [ProvinceController::class, 'show']);


/*
|--------------------------------------------------------------------------
| 2. NHÓM QUẢN TRỊ (ADMIN)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->group(function () {
    Route::get('/users', [UserController::class, 'index']);
    Route::patch('/users/{id}/toggle-status', [UserController::class, 'toggleStatus']);

    // 1. Route lấy danh sách (Đã có)
    Route::get('/users', [UserController::class, 'index']);
    
    // 2. THÊM MỚI (Đây là dòng đang thiếu gây lỗi Method Not Supported)
    Route::post('/users', [UserController::class, 'store']); 
    
    // 3. CẬP NHẬT (Dùng cả 2 để an toàn khi gửi file)
    Route::put('/users/{id}', [UserController::class, 'update']);
    Route::post('/users/{id}', [UserController::class, 'update']); 

    // 4. XÓA
    Route::delete('/users/{id}', [UserController::class, 'destroy']);

    // ... các route khác (provinces, locations) giữ nguyên ...
    
    

    Route::get('/provinces', [ProvinceController::class, 'index']);
    Route::post('/provinces', [ProvinceController::class, 'store']);
    Route::put('/provinces/{id}', [ProvinceController::class, 'update']);
    Route::delete('/provinces/{id}', [ProvinceController::class, 'destroy']);

    Route::get('/locations', [LocationController::class, 'index']);
    Route::post('/locations', [LocationController::class, 'store']);
    Route::post('/locations/{id}', [LocationController::class, 'update']);
    Route::delete('/locations/{id}', [LocationController::class, 'destroy']);

    Route::patch('/users/{id}/toggle-status', [UserController::class, 'toggleStatus']);

    // Thêm route quản lý reviews
    Route::get('/reviews', [ReviewController::class, 'adminIndex']); // Xem tất cả
    Route::delete('/reviews/{id}', [ReviewController::class, 'destroy']); // Xóa review xấu
});

/*
|--------------------------------------------------------------------------
| 3. CÁC ROUTE CẦN BẢO MẬT (SANCTUM)
|--------------------------------------------------------------------------
*/
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post('/logout', [AuthController::class, 'logout']);
    // Khi nào làm xong hết trơn, muốn bảo mật thì mới chuyển Route post('/reviews') vào đây
});