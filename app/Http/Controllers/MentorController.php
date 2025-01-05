<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mentor;

class MentorController extends Controller
{
    public function index()
    {
        $mentors = Mentor::all();
        return view('admin.mentors.index', compact('mentors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'expertise' => 'required|string|max:255',
            'bio' => 'nullable|string|max:1000',
        ]);

        Mentor::create($request->all());

        return redirect()->route('admin.mentors.index')->with('success', 'メンターが登録されました。');
    }
}
