<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AvailableSchedule;

class AvailableScheduleController extends Controller
{
    public function index()
    {
        $schedules = AvailableSchedule::all();
        return view('admin.schedules.index', compact('schedules'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'available_date' => 'required|date|after_or_equal:today',
            'available_time' => 'required|date_format:H:i',
        ]);

        AvailableSchedule::create([
            'available_date' => $request->available_date,
            'available_time' => $request->available_time,
        ]);

        return redirect()->route('admin.schedules.index')->with('success', 'スケジュールが登録されました。');
    }
}
