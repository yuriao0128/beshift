<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Fonts -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="/css/admin/tailwind/tailwind.min.css">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ユーザー登録 - {{ config('app.name', 'Laravel') }}</title>
</head>
<body class="antialiased bg-body text-body font-body">
<div>
    <!-- トップバー -->
    <div class="bg-white border-b border-gray-200">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <span class="text-lg font-bold text-indigo-600"></span>
                <div class="flex items-center">
                    <a href="{{ route('users.login') }}" class="text-blue-500 text-sm hover:underline">
                        ログインへ戻る
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- コンテンツ -->
    <main class="py-10">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl mx-auto bg-white p-8 rounded shadow">
                <h1 class="text-2xl font-bold mb-6">ユーザー登録</h1>

                @if($errors->any())
                    <div class="mb-8 py-4 px-6 border border-red-300 bg-red-50 rounded">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li class="text-red-400">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('user.register.submit') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-2" for="name">名前</label>
                        <input id="name" class="block w-full px-4 py-3 mb-2 text-sm bg-white border rounded" type="text" name="name" value="{{ old('name') }}">
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-2" for="email">メールアドレス</label>
                        <input id="email" class="block w-full px-4 py-3 mb-2 text-sm bg-white border rounded" type="email" name="email" value="{{ old('email') }}">
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-2" for="password">パスワード</label>
                        <input id="password" class="block w-full px-4 py-3 mb-2 text-sm bg-white border rounded" type="password" name="password">
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-2" for="password_confirmation">パスワード(確認)</label>
                        <input id="password_confirmation" class="block w-full px-4 py-3 mb-2 text-sm bg-white border rounded" type="password" name="password_confirmation">
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-2" for="image">画像</label>
                        <div class="flex items-center">
                            <img id="previewImage" src="/images/admin/noimage.jpg" data-noimage="/images/admin/noimage.jpg" alt="プロフィール画像プレビュー" class="rounded-full shadow-md w-32 mr-4">
                            <input id="image" class="block w-full px-4 py-3 mb-2" type="file" accept='image/*' name="image">
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-2" for="introduction">自己紹介文</label>
                        <textarea id="introduction" class="block w-full px-4 py-3 mb-2 text-sm bg-white border rounded" name="introduction" rows="3">{{ old('introduction') }}</textarea>
                    </div>

                    <button type="submit" class="w-full py-3 text-white bg-indigo-500 hover:bg-indigo-600 rounded">登録</button>
                </form>
            </div>
        </div>
    </main>
</div>

<script>
    // 画像プレビュー
    document.getElementById('image').addEventListener('change', e => {
        const previewImageNode = document.getElementById('previewImage');
        const fileReader = new FileReader();
        const file = e.target.files[0];

        if (file && file.type.startsWith('image/')) {
            fileReader.onload = () => previewImageNode.src = fileReader.result;
            fileReader.readAsDataURL(file);
        } else {
            previewImageNode.src = previewImageNode.dataset.noimage;
            alert('画像ファイルを選択してください');
        }
    });
</script>
</body>
</html>
