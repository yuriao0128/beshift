<?php

namespace App\Http\Controllers;
use App\Models\CareerRecord;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CareerRecordController extends Controller
{
    public function create()
    {
            // ログインユーザーに紐づくCareerRecordをすべて取得
    $careerRecords = CareerRecord::where('user_id', Auth::id())->get();

    // ビューに $experiences を渡して表示
    return view('users.career.create', compact('careerRecords'));
    }

    public function store(Request $request)
    {
        // バリデーションルールを変更
        $request->validate([
            'company_name' => 'required|string|max:255',
            'position'     => 'required|string|max:255',
            'job_type'     => 'required|string|max:255',
            'years'        => 'required|string', // プルダウンの選択結果（例: "1年未満", "1-3年", etc.）
            'skills'       => 'nullable|string', // カンマ区切りの文字列
        ]);

        $skills = $request->skills;
        if ($skills) {
            $skills = preg_replace('/,\s*$/', '', trim($skills));
        }
    
        CareerRecord::create([
            'user_id'      => Auth::id(),
            'company_name' => $request->company_name,
            'position'     => $request->position,
            'job_type'     => $request->job_type,
            'years'        => $request->years,      // 選択した経験年数
            'skills'       => $skills,     // カンマ区切りの文字列をそのまま保存
        ]);
    
        // 登録後、同じcreateページへリダイレクト
        return redirect()->route('users.career.create')->with('success', 'キャリア情報が登録されました。');
    }

    public function edit($id)
{
    // 指定されたキャリア情報を取得
    $careerRecord = CareerRecord::findOrFail($id);

    // セキュリティチェック（必要に応じて）
    if ($careerRecord->user_id !== Auth::id()) {
        abort(403, 'Unauthorized action.');
    }

    // 編集フォーム用のビューにデータを渡す
    return view('users.career.edit', compact('careerRecord'));
}

public function update(Request $request, $id)
{
    $careerRecord = CareerRecord::findOrFail($id);

    if ($careerRecord->user_id !== Auth::id()) {
        abort(403, 'Unauthorized action.');
    }

    // バリデーション（store() とほぼ同じルールでOK）
    $request->validate([
        'company_name' => 'required|string|max:255',
        'position'     => 'required|string|max:255',
        'job_type'     => 'required|string|max:255',
        'years'        => 'required|string',
        'skills'       => 'nullable|string',
    ]);

    $skills = $request->skills;
    if ($skills) {
        $skills = preg_replace('/,\s*$/', '', trim($skills));
    }

    $careerRecord->update([
        'company_name' => $request->company_name,
        'position'     => $request->position,
        'job_type'     => $request->job_type,
        'years'        => $request->years,
        'skills'       => $skills,
    ]);

    return redirect()->route('users.career.create')->with('success', 'キャリア情報が更新されました。');
}

public function destroy($id)
{
    // 1. 指定IDのキャリアレコードを取得
    $careerRecord = CareerRecord::findOrFail($id);

    // 2. セキュリティチェック（必要なら）
    if ($careerRecord->user_id !== Auth::id()) {
        abort(403, 'Unauthorized action.');
    }

    // 3. レコード削除
    $careerRecord->delete();

    // 4. リダイレクト（再度createページなどへ戻す）
    return redirect()->route('users.career.create')->with('success', 'キャリア情報が削除されました。');
}
    
}
