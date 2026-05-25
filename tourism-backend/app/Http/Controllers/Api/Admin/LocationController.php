<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LocationController extends Controller
{
    public function index()
    {
        // Khi lấy danh sách địa điểm, lấy luôn province để React có dữ liệu tỉnh
        $locations = Location::with('province')->paginate(10);
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

        // Tạo tên không dấu để tìm kiếm
        $validated['name_search'] = $this->vn_to_str($request->name);

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

        // Cập nhật tên không dấu mới nếu người dùng đổi tên
        $validated['name_search'] = $this->vn_to_str($request->name);

        // Xử lý ảnh (Gọn gàng hơn bản cũ của bạn)
        if ($request->hasFile('image')) {
            if ($location->image_thumbnail) {
                Storage::disk('public')->delete($location->image_thumbnail);
            }
            $path = $request->file('image')->store('locations', 'public');
            $validated['image_thumbnail'] = $path;
        }

        $location->update($validated);

        return response()->json([
            'message' => 'Cập nhật thành công!',
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
        return response()->json(['message' => 'Xóa thành công']);
    }

    public function show($id)
    {

        try {
            $location = Location::with(['contents.infoType','reviews.user', 'province', 'category'])->findOrFail($id);
            return response()->json($location);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Không tìm thấy'], 404);
        }
    }

    public function getLocationsByProvince($id) {
        $locations = Location::where('province_id', $id)->get();
        return response()->json($locations);
    }

    // HÀM QUAN TRỌNG ĐỂ THÔNG DỮ LIỆU TÌM KIẾM
    private function vn_to_str($str) {
        $unicode = [
            'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
            'd'=>'đ',
            'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
            'i'=>'í|ì|ỉ|ĩ|ị',
            'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
            'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
            'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
            'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
            'D'=>'Đ',
            'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
            'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
            'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
            'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
            'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
        ];
        foreach($unicode as $nonUnicode=>$uni){
            $str = preg_replace("/($uni)/i", $nonUnicode, $str);
        }
        return strtolower($str);
    }
}