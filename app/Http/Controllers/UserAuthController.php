<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Log;

class UserAuthController extends Controller
{
    // ログインフォーム表示
    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect()->route('users.mypage');
        }
    
        return view('users.login');
    }

    // ログイン処理
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // ログイン試行
        if (Auth::attempt($credentials)) {
            // セッションを再生成（セキュリティ対策）
            $request->session()->regenerate();

            // ロールによるリダイレクト処理
            $userRole = Auth::user()->role;
            if ($userRole === 'user') {
                return redirect()->route('users.mypage')->with('success', 'ログインしました');
            } elseif ($userRole === 'admin') {
                return redirect()->route('users.mypage')->with('success', 'ログインしました');
            } else {
                // 不明なロールの場合の処理
                Auth::logout();
                return back()->withErrors([
                    'login_error' => 'このアカウントではログインできません。',
                ]);

                // ログイン試行の前に、入力データを確認
            }
        }

        // ログイン失敗時の処理
        return back()->withErrors([
            'login_error' => 'メールアドレスまたはパスワードが正しくありません',
        ])->onlyInput('email');
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

