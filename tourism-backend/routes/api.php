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
| 1. ROUTE CÔNG KHAI (Ai cũng xem được)
|--------------------------------------------------------------------------
*/
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register']);

// API xem thông tin (Khách xem thoải mái)
Route::get('/provinces', function () {
    return Province::withCount('locations')->get();
});

Route::get('/locations/search', function (Request $request) {
    $query = $request->query('q');
    return Location::where('name', 'LIKE', "%{$query}%")->with(['province', 'category'])->get();
});

Route::get('/locations/{id}', [LocationController::class, 'show']);
Route::get('/locations/{id}/reviews', [ReviewController::class, 'index']); 
Route::get('/provinces/{id}/locations', [LocationController::class, 'getLocationsByProvince']);
Route::get('/provinces/{id}', [ProvinceController::class, 'show']);


/*
|--------------------------------------------------------------------------
| 2. ROUTE CẦN ĐĂNG NHẬP (MIDDLEWARE AUTH:SANCTUM)
|--------------------------------------------------------------------------
*/
Route::middleware('auth:sanctum')->group(function () {
    
    // Thông tin cá nhân & Đăng xuất
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post('/logout', [AuthController::class, 'logout']);

    // Review (Chỉ người đã đăng nhập mới được viết bình luận)
    Route::post('/reviews', [ReviewController::class, 'store']); 

    /*
    |--------------------------------------------------------------------------
    | 3. NHÓM QUẢN TRỊ (Phải đăng nhập mới được vào đây)
    |--------------------------------------------------------------------------
    */
    Route::prefix('admin')->group(function () {
        // Quản lý Users
        Route::get('/users', [UserController::class, 'index']);
        Route::post('/users', [UserController::class, 'store']); 
        Route::put('/users/{id}', [UserController::class, 'update']);
        Route::post('/users/{id}', [UserController::class, 'update']); 
        Route::delete('/users/{id}', [UserController::class, 'destroy']);
        Route::patch('/users/{id}/toggle-status', [UserController::class, 'toggleStatus']);

        // Quản lý Provinces (Tỉnh)
        Route::get('/provinces', [ProvinceController::class, 'index']);
        Route::post('/provinces', [ProvinceController::class, 'store']);
        Route::put('/provinces/{id}', [ProvinceController::class, 'update']);
        Route::delete('/provinces/{id}', [ProvinceController::class, 'destroy']);

        // Quản lý Locations (Địa điểm)
        Route::get('/locations', [LocationController::class, 'index']);
        Route::post('/locations', [LocationController::class, 'store']);
        Route::post('/locations/{id}', [LocationController::class, 'update']);
        Route::delete('/locations/{id}', [LocationController::class, 'destroy']);

        // Quản lý Reviews (Admin xóa review)
        Route::get('/reviews', [ReviewController::class, 'adminIndex']); 
        Route::delete('/reviews/{id}', [ReviewController::class, 'destroy']);
    });
});