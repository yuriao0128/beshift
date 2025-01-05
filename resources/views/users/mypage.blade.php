@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <!-- 成功メッセージの表示 -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h1>ようこそ、{{ Auth::user()->name }}さん！</h1>
    <p>ここはユーザーマイページです。</p>

        <!-- プロフィール編集ページへのリンクボタン -->
        <a href="{{ route('users.profile.edit') }}" class="btn btn-primary mt-3">プロフィールを編集</a>

        <a href="{{ route('users.career.create') }}" class="btn btn-secondary mt-3">キャリア情報を更新</a>

        <a href="{{ route('users.desired.create') }}" class="btn btn-secondary mt-3">希望条件を登録</a>

        <!-- ログアウトボタン -->
        <form action="{{ route('users.logout') }}" method="POST" class="mt-4">
        @csrf
        <button type="submit" class="btn btn-danger">ログアウト</button>
    </form>
</div>

@endsection
