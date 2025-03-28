<?php

namespace App\Http\Controllers;
use App\Models\AvailableSchedule;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Mentor;

class AppointmentController extends Controller
{

        public function create()
        {
            // すべての予約可能スケジュールを取得（必要なら mentor_id でグループ化も可能）
            $schedules = \App\Models\AvailableSchedule::all();
            $mentors = \App\Models\Mentor::all();
            
            return view('appointment.calendar', compact('schedules', 'mentors'));
        }
        // 申し込み開始画面
        public function start()
        {
            return view('users.appointment.start');
        }
    
        // カレンダー画面
        public function calendar()
        {
            $schedules = AvailableSchedule::all();
            $mentors = Mentor::all();
        
            return view('users.appointment.calendar', compact('schedules', 'mentors'));
        }
    
        // カレンダー選択データ保存
        public function saveCalendar(Request $request)
        {
            $request->validate([
                'mentor_id'    => 'required|integer',
                'desired_date' => 'required|date|after_or_equal:today',
                'desired_time' => 'required',
            ]);
    
            session([
                'appointment.mentor_id'    => $request->mentor_id,
                'appointment.desired_date' => $request->desired_date,
                'appointment.desired_time' => $request->desired_time,
            ]);
    
            return redirect()->route('appointment.details');
        }

    // 管理者用: 面談申し込みカレンダー画面
    public function adminCalendar()
    {
        // すべての面談予約を取得
        $appointments = Appointment::all(['id', 'desired_date', 'desired_time', 'purpose']);

        // カレンダーに表示するイベントデータを整形
        $events = $appointments->map(function ($appointment) {
            return [
                'id' => $appointment->id,
                'title' => $appointment->purpose, // 面談目的をタイトルとして表示
                'start' => $appointment->desired_date . 'T' . $appointment->desired_time,
            ];
        });

        return view('admin.appointments.calendar', compact('events'));
    }
    
        // 基本情報入力画面
        public function details()
        {
            $user = Auth::user();
            $desiredDate = session('appointment.desired_date');
            $desiredTime = session('appointment.desired_time');
    
            return view('users.appointment.details', compact('user', 'desiredDate', 'desiredTime'));
        }
    
        // 面談予約を保存
        public function submit(Request $request)
        {
            $request->validate([
                'purpose' => 'required|string|max:1000',
            ]);
    
            Appointment::create([
                'user_id' => Auth::id(),
                'desired_date' => session('appointment.desired_date'),
                'desired_time' => session('appointment.desired_time'),
                'purpose' => $request->purpose,
                'comments' => $request->comments,
            ]);
    
            return redirect()->route('users.mypage')->with('success', '面談予約が完了しました。');
        }

            public function show($id)
    {
        $appointment = Appointment::with('user')->findOrFail($id);

        return view('admin.appointments.show', compact('appointment'));
    }

            public function index()
        {
            // すべての面談データを取得し、ユーザー情報も一緒に取得
            $appointments = Appointment::with('user')->paginate(10);

            // ビューに渡す
            return view('admin.appointments.show', compact('appointments'));
        }


                public function edit($id)
        {
            $appointment = Appointment::findOrFail($id);
            return view('admin.appointments.edit', compact('appointment'));
        }

                public function update(Request $request, $id)
        {
            $request->validate([
                'desired_date' => 'required|date|after_or_equal:today',
                'desired_time' => 'required',
                'purpose' => 'required|string|max:1000',
            ]);

            $appointment = Appointment::findOrFail($id);
            $appointment->update([
                'desired_date' => $request->desired_date,
                'desired_time' => $request->desired_time,
                'purpose' => $request->purpose,
                'comments' => $request->comments,
            ]);

            return redirect()->route('admin.appointments.index')->with('success', '面談内容を更新しました。');
        }

        public function cancel($id)
{
    $appointment = Appointment::findOrFail($id);
    $appointment->delete();

    

    return redirect()->route('appointment.calendar')->with('success', '面談をキャンセルしました。');
}

}
