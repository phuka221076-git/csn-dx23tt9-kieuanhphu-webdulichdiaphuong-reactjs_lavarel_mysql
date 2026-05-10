<?php

namespace App\Http\Controllers\Api; // Đảm bảo namespace này khớp với file của con

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review; // PHẢI CÓ DÒNG NÀY
use App\Models\Location;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        try {
            $request->validate([
                'location_id' => 'required',
                'user_id'     => 'required', // Lấy ID từ phía React gửi lên
                'rating'      => 'required|integer|min:1|max:5',
                'comment'     => 'required|string',
            ]);

            $review = Review::create([
                'user_id'     => $request->user_id, // Quan trọng: dùng request thay vì auth()
                'location_id' => $request->location_id,
                'rating'      => $request->rating,
                'comment'     => $request->comment,
            ]);

            return response()->json([
                'message' => 'Gửi thành công!', 
                'data' => $review->load('user')
            ], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    // Lấy toàn bộ bình luận để admin xem
    public function adminIndex()
    {
        // Lấy tất cả review, kèm theo tên user và tên địa điểm
        $reviews = Review::with(['user', 'location'])->orderBy('created_at', 'desc')->get();
        return response()->json($reviews);
    }   
    // Xóa bình luận
    public function destroy($id) {
        $review = Review::find($id);
        if ($review) {
            $review->delete();
            return response()->json(['message' => 'Đã xóa bình luận!']);
        }
        return response()->json(['message' => 'Không tìm thấy bình luận'], 404);
    }
}