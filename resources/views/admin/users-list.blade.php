@extends('layouts.admin')

@section('content')
<div class="container mx-auto py-6">
    <h1 class="text-2xl font-semibold mb-6">ユーザー一覧</h1>

    <!-- 絞り込み検索フォーム -->
    <form method="GET" action="{{ route('admin.users-list') }}" class="mb-6">
        <div class="flex items-center space-x-4">
            <input 
                type="text" 
                name="name" 
                placeholder="名前で検索" 
                value="{{ request('name') }}" 
                class="border rounded px-3 py-2 w-1/3 focus:ring focus:ring-indigo-300"
            >
            <input 
                type="text" 
                name="email" 
                placeholder="メールアドレスで検索" 
                value="{{ request('email') }}" 
                class="border rounded px-3 py-2 w-1/3 focus:ring focus:ring-indigo-300"
            >
            <button 
                type="submit" 
                class="px-6 p-3 text-center text-m text-white font-semibold leading-none bg-gradient-to-r from-pink-200 to-blue-200 rounded-lg shadow-md opacity-90 hover:opacity-100 hover:shadow-lg transition">
                検索
            </button>
        </div>
    </form>

    <!-- ユーザー一覧 -->
    <div class="py-4 bg-white rounded shadow">
        <table class="w-full text-sm text-left border-collapse">
            <thead class="bg-gray-100 border-b">
                <tr>
                    <th class="py-3 px-6 text-gray-700 font-medium">ID</th>
                    <th class="py-3 px-6 text-gray-700 font-medium">名前</th>
                    <th class="py-3 px-6 text-gray-700 font-medium">メールアドレス</th>
                    <th class="py-3 px-6 text-gray-700 font-medium">登録日</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="border-b">
                        <td class="py-3 px-6">{{ $user->id }}</td>
                        <td class="py-3 px-6">{{ $user->name }}</td>
                        <td class="py-3 px-6">{{ $user->email }}</td>
                        <td class="py-3 px-6">{{ $user->created_at->format('Y-m-d H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- ページネーション -->
    <div class="mt-4">
        {{ $users->links() }}
    </div>
</div>
@endsection
