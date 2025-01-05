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
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>
<body class="antialiased bg-body text-body font-body">
<div>

    <!-- サイドバー -->
    <div class="hidden lg:block navbar-menu relative z-50">
        <nav class="fixed top-0 left-0 bottom-0 flex flex-col w-64 pt-6 pb-8 bg-gray-800 overflow-y-auto">
            <h1 class="px-6 pb-6 mb-6 text-white text-xl font-semibold border-b border-gray-700">
                ユーザーページ
            </h1>
            <div class="px-4 pb-6">
                <h3 class="mb-2 text-xs uppercase text-gray-500 font-medium">メニュー</h3>
                <ul class="mb-8 text-sm font-medium">
                    <li>
                        <a class="flex items-center pl-3 py-3 pr-4 text-gray-50 hover:bg-gray-900 rounded"
                           href="{{ route('users.profile.edit') }}">
                            <span class="inline-block mr-3">
                                <svg class="text-gray-600 w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M12 4.354a4.354 4.354 0 100 8.708 4.354 4.354 0 000-8.708zM6.92 18.62A7.488 7.488 0 0112 15.75c1.78 0 3.42.66 4.68 1.72M6.92 18.62A7.48 7.48 0 015.25 15.75C5.25 12.44 8.44 9.25 12 9.25m0 0a7.48 7.48 0 016.75 6.5M6.92 18.62c-1.04.84-2.3 1.33-3.67 1.33M18.68 18.62c1.04.84 2.3 1.33 3.67 1.33M12 15.75c.94 0 1.8-.15 2.56-.44M6.92 18.62c.76.29 1.62.44 2.56.44"></path>
                                </svg>
                            </span>
                            <span>プロフィール編集</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center pl-3 py-3 pr-4 text-gray-50 hover:bg-gray-900 rounded"
                           href="{{ route('users.career.create') }}">
                            <span class="inline-block mr-3">
                                <svg class="text-gray-600 w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M9 19V6l-2 1V4a2 2 0 012-2h8a2 2 0 012 2v3l-2-1v13a2 2 0 11-4 0v-6a2 2 0 10-4 0v6a2 2 0 01-4 0z"></path>
                                </svg>
                            </span>
                            <span>キャリア情報編集</span>
                        </a>
                    </li>
                    <li>
                    <a class="flex items-center pl-3 py-3 pr-4 text-gray-50 hover:bg-gray-900 rounded"
                    href="{{ route('users.desired.create') }}">
                        <span class="inline-block mr-3">
                            <svg class="text-gray-600 w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 3v16c0 .35.06.69.17 1h6.83a3 3 0 002.95-3.35l-1.08-9a3 3 0 00-2.95-2.65H6zm6 6h4"></path>
                            </svg>
                        </span>
                        <span>希望のキャリア編集</span>
                    </a>
                </li>
                    <li>
                        <a class="flex items-center pl-3 py-3 pr-4 text-gray-50 hover:bg-gray-900 rounded"
                           href="{{ route('appointment.calendar') }}">
                            <span class="inline-block mr-3">
                                <svg class="text-gray-600 w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M16 8V6a4 4 0 00-8 0v2m-4 4h16m-2 6H6a2 2 0 01-2-2V10a2 2 0 012-2h12a2 2 0 012 2v8a2 2 0 01-2 2z"></path>
                                </svg>
                            </span>
                            <span>面談予約</span>
                        </a>
                    </li>
                </ul>
                <div class="absolute bottom-2 left-4 right-4">
                <form action="{{ route('users.logout') }}" method="post">
                    @csrf
                    <button type="submit" class="w-full flex items-center pl-3 py-3 pr-2 text-gray-50 hover:bg-gray-900 rounded">
                        <span class="inline-block mr-4">
                            <svg class="text-gray-600 w-5 h-5" viewbox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0.333618 8.99996C0.333618 9.22097 0.421416 9.43293 0.577696 9.58922C0.733976 9.7455 0.945938 9.83329 1.16695 9.83329H7.49195L5.57528 11.7416C5.49718 11.8191 5.43518 11.9113 5.39287 12.0128C5.35057 12.1144 5.32879 12.2233 5.32879 12.3333C5.32879 12.4433 5.35057 12.5522 5.39287 12.6538C5.43518 12.7553 5.49718 12.8475 5.57528 12.925C5.65275 13.0031 5.74492 13.0651 5.84647 13.1074C5.94802 13.1497 6.05694 13.1715 6.16695 13.1715C6.27696 13.1715 6.38588 13.1497 6.48743 13.1074C6.58898 13.0651 6.68115 13.0031 6.75862 12.925L10.0919 9.59163C10.1678 9.51237 10.2273 9.41892 10.2669 9.31663C10.3503 9.11374 10.3503 8.88618 10.2669 8.68329C10.2273 8.581 10.1678 8.48755 10.0919 8.40829L6.75862 5.07496C6.68092 4.99726 6.58868 4.93563 6.48716 4.89358C6.38564 4.85153 6.27683 4.82988 6.16695 4.82988C6.05707 4.82988 5.94826 4.85153 5.84674 4.89358C5.74522 4.93563 5.65298 4.99726 5.57528 5.07496C5.49759 5.15266 5.43595 5.2449 5.3939 5.34642C5.35185 5.44794 5.33021 5.55674 5.33021 5.66663C5.33021 5.77651 5.35185 5.88532 5.3939 5.98683C5.43595 6.08835 5.49759 6.18059 5.57528 6.25829L7.49195 8.16663H1.16695C0.945938 8.16663 0.733976 8.25442 0.577696 8.4107C0.421416 8.56698 0.333618 8.77895 0.333618 8.99996Z" fill="currentColor"></path>
                            </svg>
                        </span>
                        <span>ログアウト</span>
                    </button>
                </form> 
            </div>
        </nav>
    </div>

    <!-- トップバー -->
    <div class="bg-white border-b border-gray-200">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <span class="text-lg font-bold text-indigo-600"></span>
                <div class="flex items-center">
                    <span class="text-gray-600 text-sm mr-4">
                        {{ Auth::user()->name }} さん
                    </span>
                    @if (Auth::user()->image)
                        <img src="{{ asset('storage/' . Auth::user()->image) }}" class="w-10 h-10 rounded-full object-cover" alt="{{ Auth::user()->name }}">
                    @else
                        <div class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center">
                            <span class="text-gray-500">N/A</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>


    <!-- コンテンツ -->
    <main class="ml-64 py-10">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 border-l-4 border-green-500 text-green-700">
                    {{ session('success') }}
                </div>
            @endif
            @yield('content')

        </div>
    </main>
</div>
</body>
</html>
