<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Lấy danh sách user kèm phân trang và tìm kiếm (Tên + Email)
     */
    public function index(Request $request) 
    {
        $searchTerm = $request->query('q');

        $users = User::query()
            ->when($searchTerm, function ($query, $searchTerm) {
                $query->where(function($q) use ($searchTerm) {
                    $q->where('name', 'LIKE', "%{$searchTerm}%")
                      ->orWhere('email', 'LIKE', "%{$searchTerm}%");
                });
            })
            ->latest()
            ->paginate(10);

        return response()->json($users);
    }

    /**
     * Hàm khóa/mở tài khoản
     */
    public function toggleStatus($id) 
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'Không tìm thấy người dùng'], 404);
        }

        // Đảo ngược giá trị is_active
        $user->is_active = !$user->is_active;
        $user->save();

        return response()->json([
            'message' => $user->is_active ? 'Đã mở khóa tài khoản' : 'Đã khóa tài khoản',
            'is_active' => $user->is_active
        ]);
    }

    /**
     * Thêm mới người dùng
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role' => 'required'
        ]);

        $data = $request->only(['name', 'email', 'role']);
        $data['password'] = Hash::make($request->password);
        $data['is_active'] = 1; // Mặc định khi tạo mới là hoạt động

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/avatars', $filename);
            $data['avatar'] = $filename;
        }

        User::create($data);

        return response()->json(['message' => 'Thêm người dùng thành công!'], 201);
    }

    /**
     * Cập nhật thông tin người dùng
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Validate cơ bản, email bỏ qua user hiện tại
        $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:users,email,'.$id,
            'password' => 'nullable|min:6',
        ]);

        $data = $request->only(['name', 'email', 'role']);

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        if ($request->hasFile('avatar')) {
            // Xóa ảnh cũ nếu tồn tại trong ổ đĩa
            if ($user->avatar) {
                Storage::delete('public/avatars/' . $user->avatar);
            }
            
            $file = $request->file('avatar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/avatars', $filename);
            $data['avatar'] = $filename;
        }

        $user->update($data);

        return response()->json(['message' => 'Cập nhật thông tin thành công!']);
    }

    /**
     * Xóa người dùng
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        
        // Xóa ảnh đại diện trước khi xóa record
        if ($user->avatar) {
            Storage::delete('public/avatars/' . $user->avatar);
        }
        
        $user->delete();
        return response()->json(['message' => 'Đã xóa người dùng khỏi hệ thống!']);
    }
}