@extends('layouts.admin')

@section('content')
<div class="container mx-auto py-8 px-4">
    <h1 class="text-3xl font-semibold mb-6 text-gray-800 text-center">面談一覧</h1>

    <div class="bg-white shadow rounded-lg p-6">
        <!-- テーブル -->
        <div class="overflow-x-auto">
            <table class="min-w-full table-auto border-collapse">
                <thead class="bg-gray-100 text-left">
                    <tr>
                        <th class="py-3 px-4 text-sm font-medium text-gray-600">#</th>
                        <th class="py-3 px-4 text-sm font-medium text-gray-600">ユーザー名</th>
                        <th class="py-3 px-4 text-sm font-medium text-gray-600">希望日</th>
                        <th class="py-3 px-4 text-sm font-medium text-gray-600">希望時間</th>
                        <th class="py-3 px-4 text-sm font-medium text-gray-600">相談内容</th>
                        <th class="py-3 px-4 text-sm font-medium text-gray-600">コメント</th>
                        <th class="py-3 px-4 text-sm font-medium text-gray-600">操作</th>
                    </tr>
                </thead>
                <tbody class="text-sm text-gray-700 divide-y">
                    @foreach($appointments as $index => $appointment)
                        <tr>
                            <td class="py-3 px-4">{{ $index + 1 }}</td>
                            <td class="py-3 px-4">{{ $appointment->user->name }}</td>
                            <td class="py-3 px-4">{{ $appointment->desired_date }}</td>
                            <td class="py-3 px-4">{{ $appointment->desired_time }}</td>
                            <td class="py-3 px-4">{{ $appointment->purpose }}</td>
                            <td class="py-3 px-4">{{ $appointment->comments }}</td>
                            <td class="py-3 px-4 flex space-x-2">
                            <a href="{{ route('admin.appointments.edit', $appointment->id) }}" class="px-4 py-2 bg-blue-500 text-white text-sm rounded-md shadow hover:bg-blue-600">
        修正
</a>
                                <form action="{{ route('admin.appointments.delete', $appointment->id) }}" method="POST" onsubmit="return confirm('本当に削除しますか？')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-4 py-2 bg-red-500 text-white text-sm rounded-md shadow hover:bg-red-600">
                                        削除
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- ページネーション -->
        <div class="mt-6">
            {{ $appointments->links() }}
        </div>
    </div>
</div>
@endsection