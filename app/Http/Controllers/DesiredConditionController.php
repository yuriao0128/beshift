<?php

namespace App\Http\Controllers;
use App\Models\DesiredCondition;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DesiredConditionController extends Controller
{
    public function create()
    {
        return view('users.desired.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'desired_work_style' => 'required|string|max:255',
            'desired_position' => 'required|string|max:255',
            'desired_salary' => 'nullable|string|max:255',
            'desired_location' => 'required|string|max:255',
        ]);

        DesiredCondition::updateOrCreate(
            ['user_id' => Auth::id()],
            [
                'desired_work_style' => $request->desired_work_style,
                'desired_position' => $request->desired_position,
                'desired_salary' => $request->desired_salary,
                'desired_location' => $request->desired_location,
            ]
        );

        return redirect()->route('users.mypage')->with('success', '希望条件が登録されました。');
    }
}
