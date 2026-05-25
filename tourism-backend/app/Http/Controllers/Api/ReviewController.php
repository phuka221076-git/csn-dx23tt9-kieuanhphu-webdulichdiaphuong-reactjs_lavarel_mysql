<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Location;

class ReviewController extends Controller
{
    /**
     * 1. Lấy danh sách đánh giá cho một địa điểm cụ thể (Công khai)
     * Khớp với Route: GET /api/locations/{id}/reviews
     */
    public function index($id)
    {
        try {
            $reviews = Review::with('user')
                ->where('location_id', $id)
                ->orderBy('created_at', 'desc')
                ->get();

            return response()->json($reviews, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * 2. Lưu đánh giá mới (Cần đăng nhập)
     * Khớp với Route: POST /api/reviews
     */
    public function store(Request $request)
    {
        $request->validate([
            'location_id' => 'required|exists:locations,id',
            'user_id'     => 'required',
            'rating'      => 'required|integer|min:1|max:5',
            'comment'     => 'required|string',
            'images.*'    => 'image|mimes:jpeg,png,jpg|max:2048' // Tối đa 2MB/ảnh
        ]);

        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                // Lưu vào public/storage/reviews
                $path = $image->store('reviews', 'public');
                $imagePaths[] = $path;
            }
        }

        $review = Review::create([
            'user_id'     => $request->user_id,
            'location_id' => $request->location_id,
            'rating'      => $request->rating,
            'comment'     => $request->comment,
            'images'      => json_encode($imagePaths) // Lưu mảng dưới dạng JSON
        ]);

        return response()->json([
            'message' => 'Đã đăng bài kèm ảnh!',
            'data' => $review->load('user')
        ], 201);
    }   

    /**
     * 3. Lấy toàn bộ bình luận cho Admin
     * Khớp với Route: GET /api/admin/reviews
     */
    public function adminIndex()
    {
        $reviews = Review::with(['user', 'location'])
            ->orderBy('created_at', 'desc')
            ->get();
        return response()->json($reviews);
    }   

    /**
     * 4. Xóa bình luận
     * Khớp với Route: DELETE /api/admin/reviews/{id}
     */
    public function destroy($id) {
        $review = Review::find($id);
        if ($review) {
            $review->delete();
            return response()->json(['message' => 'Đã xóa bình luận!']);
        }
        return response()->json(['message' => 'Không tìm thấy bình luận'], 404);
    }
}