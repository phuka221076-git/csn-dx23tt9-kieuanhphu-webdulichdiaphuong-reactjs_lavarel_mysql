<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ProvinceController extends Controller
{
    // Hàm lấy danh sách tỉnh cho trang Admin
    public function index()
    {
        return response()->json(Province::all());
    }

    // Hàm cập nhật tỉnh thành (Cái con đang cần nè!)
    public function update(Request $request, $id)
    {
        $province = Province::find($id);

        if (!$province) {
            return response()->json(['message' => 'Không tìm thấy tỉnh này'], 404);
        }

        // Validate dữ liệu gửi lên
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Cập nhật tên và tự động đổi Slug cho đẹp
        $province->name = $request->name;
        $province->slug = Str::slug($request->name);
        $province->save();

        return response()->json([
            'message' => 'Cập nhật thành công!',
            'data' => $province
        ]);
    }
    // Hàm Thêm mới
    public function store(Request $request) {
        $request->validate(['name' => 'required|unique:provinces']);
        $province = Province::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'image' => 'default.jpg' // Tạm thời để ảnh mặc định
        ]);
        return response()->json($province);
    }

    // Hàm Xóa
    public function destroy($id) {
        $province = Province::find($id);
        if($province) {
            $province->delete();
            return response()->json(['message' => 'Đã xóa thành công']);
        }
        return response()->json(['message' => 'Không tìm thấy'], 404);
    }

    public function show($id)
    {
        try {
            // Má nghi là con chưa import Model Province ở đầu file
            // Hoặc trong database không có id = 4
            $province = Province::findOrFail($id); 
            
            return response()->json($province);
        } catch (\Exception $e) {
            // Dòng này giúp con thấy lỗi thật sự trong tab Network của trình duyệt
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}