<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User; 

class AdminController extends Controller
{
    /**
     * 管理者ダッシュボードの表示
     */
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function listAdmins()
    {
        $admins = User::where('role', 'admin')->get(); // 管理者のみ取得
        return view('admin.admin-list', compact('admins'));
    }
    public function editAdmin($id)
    {
        // 指定された管理者情報を取得
        $admin = User::where('id', $id)->where('role', 'admin')->firstOrFail();
        return view('admin.admin-edit', compact('admin'));
    }

    public function updateAdmin(Request $request, $id)
{
    // 指定された管理者情報を取得
    $admin = User::where('id', $id)->where('role', 'admin')->firstOrFail();

    // バリデーションルール
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email,' . $admin->id,
        'password' => 'nullable|string|min:8|confirmed',
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    // 管理者情報を更新
    $admin->name = $validated['name'];
    $admin->email = $validated['email'];

    if (!empty($validated['password'])) {
        $admin->password = Hash::make($validated['password']);
    }

    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('user_images', 'public');
        $admin->image = $path;
    }

    $admin->save(); // データベース保存

    return redirect()->route('admin.admin.list')->with('success', '管理者情報を更新しました。');
    }
}
