<!DOCTYPE html>
<html lang="ja">
<head>
  <title>ユーザーログイン</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="/css/tailwind/tailwind.min.css">

  <link rel="icon" type="image/png" sizes="16x16" href="/favicon.png">
  <script src="/js/main.js"></script>
</head>
<body class="antialiased bg-body text-body font-body">
<div>
  <section class="h-screen py-48 bg-blueGray-50">
    <div class="container px-4 mx-auto">
      <div class="flex max-w-md mx-auto flex-col text-center">
        <div class="mt-12 mb-8 p-8 bg-white rounded shadow">
          <h1 class="mb-6 text-3xl">ユーザーログイン</h1>

          @if($errors->any())
            <div class="mb-8 py-4 px-6 border border-red-300 bg-red-50 rounded">
              <p class="text-red-400">ログインに失敗しました</p>
            </div>
          @endif

          <form action="{{ route('users.login') }}" method="POST">
            @csrf
            <div class="flex mb-4 px-4 bg-blueGray-50 rounded">
              <input class="w-full py-4 text-xs placeholder-blueGray-400 font-semibold leading-none bg-blueGray-50 outline-none" type="email" placeholder="メールアドレス" name="email" value="{{ old('email') }}">
              <svg class="h-6 w-6 ml-4 my-auto text-blueGray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
              </svg>
            </div>

            <div class="flex mb-6 px-4 bg-blueGray-50 rounded">
              <input class="w-full py-4 text-xs placeholder-blueGray-400 font-semibold leading-none bg-blueGray-50 outline-none" type="password" placeholder="パスワード" name="password">
              <button class="ml-4">
                <svg class="h-6 w-6 my-auto text-blueGray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                </svg>
              </button>
            </div>
            <button type="submit" class="block w-full p-4 text-center text-m text-white font-semibold leading-none bg-gradient-to-r from-pink-200 to-blue-200 rounded-lg shadow-md opacity-90 hover:opacity-100 hover:shadow-lg transition">ログイン</button>
          </form>

 <!-- 新規会員登録 -->

 <div class="mt-4 text-center">
            <p class="text-sm text-gray-600">
              アカウントをお持ちでない方は
              <a href="{{ route('user.register') }}" class="text-blue-500 hover:underline">こちら</a>
            </p>
          </div>

        </div>
      </div>
    </div>
  </section>
</div>
</body>
</html>
