@extends('layouts.admin')

@section('content')
<section class="py-8">
    <div class="container px-4 mx-auto">
        <!-- タブメニュー -->
                <div class="px-4 mx-auto">
            <div class="py-4">
                <div class="flex space-x-4">
                    <a href="{{ route('admin.users.create') }}" class="py-2 px-4 text-sm font-medium {{ request()->routeIs('admin.users.create') ? 'bg-blue-200 font-bold text-white' : 'bg-gray-300 text-gray-700' }} rounded-md">
                        管理者登録
                    </a>
                    <a href="{{ route('admin.admin.list') }}" class="py-2 px-4 text-sm font-medium {{ request()->routeIs('admin.admin.list') ? 'bg-blue-200 font-bold text-white' : 'bg-gray-300 text-gray-700' }} rounded-md">
                        登録済み管理者
                    </a>
                </div>
            </div>
        </div>
        <!-- 管理者一覧 -->
        <div class="py-4 bg-white rounded">
            <div class="flex px-6 pb-4 border-b">
                <h3 class="text-xl font-bold">登録済み管理者</h3>
            </div>

            <div class="pt-4 px-6">
                @if($admins->isEmpty())
                    <p class="text-gray-600">登録されている管理者はいません。</p>
                @else
                    <table class="w-full text-sm text-left">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="py-3 px-6">名前</th>
                                <th class="py-3 px-6">メールアドレス</th>
                                <th class="py-3 px-6">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($admins as $admin)
                            <tr class="border-b">
                                <td class="py-3 px-6">{{ $admin->name }}</td>
                                <td class="py-3 px-6">{{ $admin->email }}</td>
                                <td class="py-3 px-6 flex space-x-2">
                                    <a href="{{ route('admin.edit', $admin->id) }}" class="py-1 px-3 text-sm text-white bg-blue-500 rounded-md">編集</a>
                                    <form action="{{ route('admin.destroy', $admin->id) }}" method="POST" onsubmit="return confirm('本当に削除しますか？')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="py-1 px-3 text-sm text-white bg-red-500 rounded-md">削除</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
