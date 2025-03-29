<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Profile;


class ProfileController extends Controller
{
    /**
     * プロフィール編集フォームの表示
     */
    public function edit()
    {
        // 既存のプロフィール表示画面用の処理（閲覧用）
        $user = Auth::user();
        $profile = Profile::firstOrCreate(['user_id' => $user->id]);
    
        return view('users.profile.edit', compact('user', 'profile'));
    }
    
    public function reedit()
    {
        // 編集ボタンを押したときに遷移する編集用のページ
        $user = Auth::user();
        $profile = Profile::firstOrCreate(['user_id' => $user->id]);
    
        return view('users.profile.reedit', compact('user', 'profile'));
    }
    /**
     * プロフィールの更新
     */
    public function update(Request $request)
    {
        // バリデーション
        $request->validate([
            'kana'             => 'required|string|max:255',
            'birth_date'       => 'nullable|date_format:Y-m-d',
            'phone_number'     => 'nullable|string|max:15',
            'education'        => 'nullable|string|max:255',
            'school_name'      => 'nullable|string|max:255',
            'graduation_date'  => 'nullable|date_format:Y-m-d',
            'qualifications'   => 'nullable|string|max:1000',
            'introduction'     => 'nullable|string',
            // 画像アップロードのバリデーション（任意）
            'image'            => 'nullable|image|max:2048',
        ]);
        

        // 現在のユーザー
        $user = Auth::user();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
    
            // 既存の画像がある場合は削除（任意）
            if ($user->image && \Storage::disk('public')->exists($user->image)) {
                \Storage::disk('public')->delete($user->image);
            }
    
            // 画像を保存し、パスを取得（'user_images' フォルダに保存）
            $path = $file->store('users', 'public');

            dd($path); //
    
            // User モデルの image フィールドを更新
            $user->image = $path;
            $user->save();
        }


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