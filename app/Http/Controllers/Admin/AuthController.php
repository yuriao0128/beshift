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
        $role = $request->query('role', 'user'); // クエリパラメータからロールを取得（デフォルトは'user'）
        
        if ($role === 'admin') {
            return view('admin.login');
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
    
            return redirect()->route('admin.dashboard')->with('success', '管理者としてログインしました');
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
