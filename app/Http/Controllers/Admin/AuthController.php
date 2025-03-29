<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // ログインフォーム表示
    public function showLoginForm(Request $request)
    {
        if (Auth::check()) {
            // ロールを見てリダイレクト先を変える
            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect()->route('users.mypage');
            } else {
                return redirect()->route('users.mypage');
            }
        }
    
        $role = $request->query('role', 'user');

        if ($role === 'admin') {
            return view('users.login');
        } else {
            return view('users.login');
        }
    }

    // ログイン処理
    public function adminLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
    
            // 管理者でない場合、ログアウトしてリダイレクト
            if (Auth::user()->role !== 'admin') {
                Auth::logout();
                return redirect()->route('admin.login')->withErrors(['email' => '管理者ではありません']);
            }
    
            return redirect()->route('users.mypage')->with('success', 'ログインしました');
        }
    
        return back()->withErrors(['email' => 'メールアドレスまたはパスワードが正しくありません']);
    }

    // ログアウト処理
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'ログアウトしました');
    }
}
