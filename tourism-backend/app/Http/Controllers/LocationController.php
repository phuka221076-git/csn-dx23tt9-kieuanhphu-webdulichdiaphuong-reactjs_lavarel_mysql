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
    
    public function getByProvince($province_id)
    {
        // Thêm with('province') để lấy luôn thông tin tên tỉnh
        $locations = Location::where('province_id', $province_id)
                            ->with('province') 
                            ->get();
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

        // TỰ ĐỘNG TẠO NAME_SEARCH KHI LƯU
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
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'is_featured' => 'nullable',
        ]);

        // CẬP NHẬT NAME_SEARCH KHI SỬA TÊN
        $validated['name_search'] = $this->vn_to_str($request->name);

        if ($request->hasFile('image')) {
            if ($location->image_thumbnail) {
                Storage::disk('public')->delete($location->image_thumbnail);
            }
            $path = $request->file('image')->store('locations', 'public');
            $validated['image_thumbnail'] = $path;
        }

        $location->update($validated);
        return response()->json(['message' => 'Thành công', 'data' => $location]);
    }

    // Copy hàm này từ ProvinceController sang để dùng chung
    private function vn_to_str($str) {
        $unicode = [
            'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ', 'd'=>'đ', 'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
            'i'=>'í|ì|ỉ|ĩ|ị', 'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
            'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự', 'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
            'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ', 'D'=>'Đ', 'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
            'I'=>'Í|Ì|Ỉ|Ĩ|Ị', 'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
            'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự', 'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
        ];
        foreach($unicode as $nonUnicode=>$uni){
            $str = preg_replace("/($uni)/i", $nonUnicode, $str);
        }
        return strtolower($str);
    }
    
}