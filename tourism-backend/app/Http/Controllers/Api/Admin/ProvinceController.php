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
        $provinces = Province::with('locations')->get();

        // Chuyển thủ công sang Array để kiểm tra chắc chắn mảng locations tồn tại
        $data = $provinces->map(function ($province) {
            $item = $province->toArray();
            // Ép mảng locations phải có mặt trong kết quả trả về
            $item['locations'] = $province->locations; 
            return $item;
        });

        return response()->json($data);
    
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
        $province->name_search = $this->vn_to_str($request->name); // Thêm dòng này
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
            'name_search' => $this->vn_to_str($request->name), // Thêm dòng này
            'image' => 'default.jpg'
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
    // Hàm chuyển tiếng Việt có dấu thành không dấu (Dùng cho Backend)
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