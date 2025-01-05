<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {

        // ログインしており、roleがadminの場合は次の処理へ進む
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request);
        }

        // roleがuserまたはログインしていない場合はリダイレクト
        if (!Auth::check()) {
            return redirect()->route('users.login')->with('error', 'ログインが必要です。');
        }

        return redirect()->route('users.mypage')->with('error', '管理者専用ページにはアクセスできません。');
    }
}
