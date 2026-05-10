<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Review; // Nhớ import Review nếu con dùng hàm storeReview ở đây
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::with('province')->paginate(10); // 10 là số dòng mỗi trang
        return response()->json($locations);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'province_id' => 'required|exists:provinces,id',
            'category_id' => 'required|exists:categories,id',
            'address' => 'required|string',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('locations', 'public');
            $validated['image_thumbnail'] = $path;
        }

        $location = Location::create($validated);
        return response()->json($location, 201);
    }

    public function update(Request $request, $id)
    {
        $location = Location::findOrFail($id);

        if ($request->hasFile('image_thumbnail')) {
            $file = $request->file('image_thumbnail');
            
            // 1. Tạo tên file duy nhất
            $fileName = time() . '_' . $file->getClientOriginalName();
            
            // 2. Lưu trực tiếp vào thư mục public/images trong storage
            // Nó sẽ nằm tại: storage/app/public/images/ten_file.jpg
            $file->storeAs('public/images', $fileName);
            
            // 3. CHỈ LƯU TÊN FILE vào database
            $location->image_thumbnail = $fileName;
        }

        $location->save();


        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'province_id' => 'required|exists:provinces,id',
            'category_id' => 'required|exists:categories,id',
            'address' => 'required|string',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'is_featured' => 'nullable',
        ]);

        // Xử lý cập nhật ảnh
        if ($request->hasFile('image')) {
            // Xóa ảnh cũ nếu tồn tại
            if ($location->image_thumbnail) {
                Storage::disk('public')->delete($location->image_thumbnail);
            }
            // Lưu ảnh mới
            $path = $request->file('image')->store('locations', 'public');
            $validated['image_thumbnail'] = $path;
        }

        // Cập nhật dữ liệu vào Database
        $location->update($validated);

        return response()->json([
            'message' => 'Cập nhật địa điểm thành công!',
            'data' => $location
        ], 200);
    }

    public function destroy($id)
    {
        $location = Location::findOrFail($id);
        if ($location->image_thumbnail) {
            Storage::disk('public')->delete($location->image_thumbnail);
        }
        $location->delete();
        return response()->json(['message' => 'Xóa địa điểm thành công']);
    }

    public function show($id)
    {
        try {
            // Lấy địa điểm kèm reviews và user của review đó
            $location = Location::with(['reviews.user', 'province', 'category'])->findOrFail($id);
            return response()->json($location);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Không tìm thấy địa điểm hoặc lỗi hệ thống: ' . $e->getMessage() 
            ], 404);
        }
    }

    public function getLocationsByProvince($id) {
        try {
            $locations = Location::where('province_id', $id)->get();
            return response()->json($locations, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    // Hàm này nếu con đã dùng ReviewController thì có thể xóa bớt cho gọn api.php
    public function storeReview(Request $request) {
        try {
            $request->validate([
                'location_id' => 'required',
                'user_id' => 'required',
                'comment' => 'required',
                'rating' => 'required|integer|min:1|max:5'
            ]);

            $review = Review::create([
                'location_id' => $request->location_id,
                'user_id'     => $request->user_id,
                'rating'      => $request->rating,
                'comment'     => $request->comment,
            ]);

            return response()->json($review->load('user'), 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}