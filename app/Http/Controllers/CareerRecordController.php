<?php

namespace App\Http\Controllers;
use App\Models\CareerRecord;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CareerRecordController extends Controller
{
    public function create()
    {
        return view('users.career.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'job_type' => 'required|string|max:255', // 職種
            'employment_type' => 'required|string|max:255', // 雇用形態
            'start_date' => 'required|date_format:Y-m-d',
            'end_date' => 'nullable|date_format:Y-m-d|after_or_equal:start_date',
            'description' => 'nullable|string',
        ]);

        CareerRecord::create([
            'user_id' => Auth::id(),
            'company_name' => $request->company_name,
            'position' => $request->position,
            'job_type' => $request->job_type,
            'employment_type' => $request->employment_type,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'description' => $request->description,
        ]);

        return redirect()->route('users.mypage')->with('success', 'キャリア情報が登録されました。');
    }
}
