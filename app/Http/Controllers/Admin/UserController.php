<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = User::query();

            // 管理者を除外
    $query->where('role', '!=', 'admin'); // 'role' が 'admin' のユーザーを除外

        // 絞り込み検索
        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->filled('email')) {
            $query->where('email', 'like', '%' . $request->email . '%');
        }

        $users = $query->paginate(10); // ページネーション

        return view('admin.users-list', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $validated = $request->validated();
        $validated['image'] = $request->file('image')->store('users','public');
        $validated['password'] = Hash::make($validated['password']);
        $validated['role'] = 'admin';
        User::create($validated);
    
        return back()->with('success','管理者を登録しました');
    }



    //ユーザー登録関連のメゾット追加↓↓↓

/**
 * Show the form for creating a new user (not admin).
 */
public function createUser()
{
    return view('users.create'); // ユーザー登録用ビュー
}

/**
 * Store a newly created user in storage.
 */
public function storeUser(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
    ]);

    // roleを'user'に設定
    $validated['role'] = 'user';
    $validated['password'] = Hash::make($validated['password']);

    // プロフィール画像を保存（任意）
    if ($request->hasFile('image')) {
        $validated['image'] = $request->file('image')->store('users', 'public');
    }
    $validated['introduction'] = '';
    User::create($validated);

    return redirect()->route('users.login')->with('success', 'ユーザーを登録しました');
}

    //ユーザー登録関連のメゾット追加↑↑↑


    public function mypage()
    {
        return view('users.mypage', ['user' => Auth::user()]);
    }
    
    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
