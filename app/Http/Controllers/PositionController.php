<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Position;

class PositionController extends Controller
{
    /**
     * Display a listing of the positions.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // すべての職種を取得
        $positions = Position::all();

        // ビューにデータを渡す（パスを修正）
        return view('admin.users.position', compact('positions'));
    }

    /**
     * Show the form for creating a new position.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create_position'); // 新規作成用ビューのパスを設定
    }

    /**
     * Store a newly created position in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'position' => 'required|string|max:255|unique:positions,position',
        ]);

        // 新しい職種を作成
        Position::create([
            'position' => $request->position,
        ]);

        // リダイレクトと成功メッセージ
        return redirect()->route('positions.index')->with('success', '職種が正常に追加されました。');
    }

    /**
     * Show the form for editing the specified position.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function edit(Position $position)
    {
        return view('admin.users.edit_position', compact('position')); // 編集用ビューのパスを設定
    }

    /**
     * Update the specified position in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Position $position)
    {
        // バリデーション
        $request->validate([
            'position' => 'required|string|max:255|unique:positions,position,' . $position->id,
        ]);

        // 職種を更新
        $position->update([
            'position' => $request->position,
        ]);

        // リダイレクトと成功メッセージ
        return redirect()->route('positions.index')->with('success', '職種が正常に更新されました。');
    }

    /**
     * Remove the specified position from storage.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function destroy(Position $position)
    {
        $position->delete();

        return redirect()->route('positions.index')->with('success', '職種が正常に削除されました。');
    }
}
