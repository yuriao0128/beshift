@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h1>面談内容の修正</h1>

    <!-- バリデーションエラー表示 -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- 修正フォーム -->
    <form action="{{ route('admin.appointments.update', $appointment->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="desired_date" class="block text-sm font-medium text-gray-700">希望日</label>
            <input type="date" id="desired_date" name="desired_date" class="form-input mt-1 block w-full p-3 border border-gray-300 rounded-md" value="{{ $appointment->desired_date }}" required>
        </div>

        <div class="mb-4">
            <label for="desired_time" class="block text-sm font-medium text-gray-700">希望時間</label>
            <input type="time" id="desired_time" name="desired_time" class="form-input mt-1 block w-full p-3 border border-gray-300 rounded-md" value="{{ $appointment->desired_time }}" required>
        </div>

        <div class="mb-4">
            <label for="purpose" class="block text-sm font-medium text-gray-700">相談したい内容</label>
            <textarea id="purpose" name="purpose" class="form-input mt-1 block w-full p-3 border border-gray-300 rounded-md" rows="4" required>{{ $appointment->purpose }}</textarea>
        </div>

        <div class="mb-4">
            <label for="comments" class="block text-sm font-medium text-gray-700">コメント</label>
            <textarea id="comments" name="comments" class="form-input mt-1 block w-full p-3 border border-gray-300 rounded-md" rows="3">{{ $appointment->comments }}</textarea>
        </div>

        <div class="flex space-x-4 mt-6">
            <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded-md shadow-md hover:bg-indigo-700">更新</button>
        <a href="{{ route('admin.appointments.index') }}" class="btn btn-secondary">キャンセル</a>
    </form>
</div>
@endsection
