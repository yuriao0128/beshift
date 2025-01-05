@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>メンター管理</h1>

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

    <!-- メンター登録フォーム -->
    <form action="{{ route('admin.mentors.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">メンター名</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
    <label for="image" class="form-label">顔写真</label>
    <input type="file" id="image" name="image" class="form-control">
</div>
        <div class="mb-3">
            <label for="expertise" class="form-label">専門分野</label>
            <input type="text" id="expertise" name="expertise" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="bio" class="form-label">自己紹介</label>
            <textarea id="bio" name="bio" class="form-control" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">登録</button>
    </form>

    <!-- 登録済みメンター一覧 -->
    <h2 class="mt-4">登録済みメンター</h2>
    <ul>
    @foreach ($mentors as $mentor)
        <li style="display: flex; align-items: center; margin-bottom: 10px;">
            <!-- 画像がある場合のみ表示 -->
            @if ($mentor->image)
                <img src="{{ asset('storage/' . $mentor->image) }}" alt="{{ $mentor->name }}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%; margin-right: 10px;">
            @endif
            <div>
                <strong>{{ $mentor->name }}</strong> ({{ $mentor->expertise }})
                <p style="margin: 0;">{{ $mentor->bio }}</p>
            </div>
        </li>
    @endforeach
    </ul>
</div>
@endsection
