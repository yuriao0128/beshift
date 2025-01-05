<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Profile;
use App\Models\Position;


class ProfileController extends Controller
{
    /**
     * プロフィール編集フォームの表示
     */
    public function edit()
    {
        // 現在のユーザー
        $user = Auth::user();

        // プロファイル情報を取得または作成
        $profile = Profile::firstOrCreate(['user_id' => $user->id]);

        // positions テーブルからすべての職種を取得
        $positions = Position::all();

        return view('users.profile.edit', compact('user', 'profile', 'positions'));
    }

    /**
     * プロフィールの更新
     */
    public function update(Request $request)
    {
        // バリデーション
            $request->validate([
                'kana' => 'required|string|max:255',
                'birth_date' => 'nullable|date_format:Y-m-d', // YYYY-MM-DD形式を指定
                'phone_number' => 'nullable|string|max:15',
                'education' => 'nullable|string|max:255',
                'school_name' => 'nullable|string|max:255',
                'graduation_date' => 'nullable|date_format:Y-m-d',
                'qualifications' => 'nullable|string|max:1000',
            ]);
        

        // 現在のユーザー
        $user = Auth::user();

        // プロファイル情報を取得または作成
        $profile = Profile::firstOrCreate(['user_id' => $user->id]);

    // データの更新
    $profile->kana = $request->kana;
    $profile->birth_date = $request->birth_date;
    $profile->phone_number = $request->phone_number;
    $profile->education = $request->education;
    $profile->school_name = $request->school_name;
    $profile->graduation_date = $request->graduation_date;
    $profile->qualifications = $request->qualifications;
    $profile->save();

    return redirect()->route('users.profile.edit')->with('success', '基本情報が正常に更新されました。');
}
}
