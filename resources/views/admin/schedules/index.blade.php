@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>スケジュール管理</h1>

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

    <!-- スケジュール登録フォーム -->
    <form action="{{ route('admin.schedules.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="available_date" class="form-label">利用可能日</label>
            <input type="date" id="available_date" name="available_date" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="available_time" class="form-label">利用可能時間</label>
            <input type="time" id="available_time" name="available_time" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">スケジュール登録</button>
    </form>

    <!-- 登録済みスケジュール一覧 -->
    <h2 class="mt-4">登録済みスケジュール</h2>
    <ul>
        @foreach ($schedules as $schedule)
            <li>{{ $schedule->available_date }} {{ $schedule->available_time }}</li>
        @endforeach
    </ul>
</div>
@endsection
