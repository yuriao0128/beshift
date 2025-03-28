<?php

namespace App\Http\Controllers;
use App\Models\DesiredCondition;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DesiredConditionController extends Controller
{
    public function create()
    {
        $desiredConditions = DesiredCondition::where('user_id', Auth::id())->get();
        return view('users.desired.create', compact('desiredConditions'));
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'desired_work_style'  => 'required|string|max:255',
            'desired_position'    => 'required|string|max:255',
            'desired_salary'      => 'nullable|string|max:255',
            'desired_location'    => 'required|string|max:255',
            'desired_work_time'   => 'required|string|max:255',
            'desired_work_detail' => 'nullable|string',
        ]);

        DesiredCondition::create([
            'user_id'                => Auth::id(),
            'desired_work_style'     => $request->desired_work_style,
            'desired_position'       => $request->desired_position,
            'desired_salary'         => $request->desired_salary,
            'desired_location'       => $request->desired_location,
            'desired_work_time'      => $request->desired_work_time,
            'desired_work_detail'    => $request->desired_work_detail,
            'receive_scout'          => true,  // 初期は true などデフォルト値
        ]);

        return redirect()->route('users.desired.create')->with('success', '希望条件が登録されました。');
    }


    public function edit($id)
    {
        $desiredCondition = DesiredCondition::findOrFail($id);
    
        // セキュリティチェック（ログインユーザーのレコードかどうか）
        if ($desiredCondition->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
    
        return view('users.desired.edit', compact('desiredCondition'));
    }

    public function update(Request $request, $id)
{
    $desiredCondition = DesiredCondition::findOrFail($id);

    if ($desiredCondition->user_id !== Auth::id()) {
        abort(403, 'Unauthorized action.');
    }

    $request->validate([
        'desired_work_style'  => 'required|string|max:255',
        'desired_position'    => 'required|string|max:255',
        'desired_salary'      => 'nullable|string|max:255',
        'desired_location'    => 'required|string|max:255',
        'desired_work_time'   => 'required|string|max:255',
        'desired_work_detail' => 'nullable|string',
    ]);

    $desiredCondition->update([
        'desired_work_style'  => $request->desired_work_style,
        'desired_position'    => $request->desired_position,
        'desired_salary'      => $request->desired_salary,
        'desired_location'    => $request->desired_location,
        'desired_work_time'   => $request->desired_work_time,
        'desired_work_detail' => $request->desired_work_detail,
    ]);

    return redirect()->route('users.desired.create')->with('success', '希望条件が更新されました。');
}

public function destroy($id)
{
    $desiredCondition = DesiredCondition::findOrFail($id);

    if ($desiredCondition->user_id !== Auth::id()) {
        abort(403, 'Unauthorized action.');
    }

    $desiredCondition->delete();

    return redirect()->route('users.desired.create')->with('success', '希望条件が削除されました。');
}   

    public function toggleScout($id)
    {
        $condition = DesiredCondition::findOrFail($id);

        // ログインユーザーのレコードか確認
        if ($condition->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        // 値を反転
        $condition->receive_scout = ! $condition->receive_scout;
        $condition->save();

        return back()->with('success', 'スカウト受信設定を更新しました。');
    }

}
