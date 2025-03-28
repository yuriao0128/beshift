@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-8 px-4">
@if (!empty(Auth::user()->career_summary))
    <div class="bg-white shadow-lg rounded-lg p-8 mb-10 border border-gray-200">
        <div class="flex items-start justify-between">
            <div>
                <h2 class="text-2xl font-semibold text-gray-900 mb-2">
                    キャリア移行プラン
                </h2>
                <p class="text-gray-600">
                    {{ Auth::user()->career_summary }}
                </p>
            </div>
            <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">
                順調に進行中
            </span>
        </div>
    </div>
@endif

    {{-- 成功メッセージ --}}
    @if(session('success'))
    @endif

    {{-- トップ画像 --}}
    <div class="w-full mb-6 overflow-hidden rounded-lg" style="max-height: 300px;">
        <img src="{{ asset('images/index/mypage.jpg') }}" 
             alt="トップ画像" 
             class="w-full h-72 object-cover object-center">
    </div>

    <h1 class="text-2xl font-bold mb-2">ようこそ、{{ Auth::user()->name }}さん！</h1>
    <p class="text-gray-700 mb-4">ここはユーザーマイページです。</p>

    {{-- BESHIFTで何ができるのか --}}
    <div class="bg-gradient-to-r mt-6 from-pink-50 to-blue-50 border border-white-200 rounded-lg p-6 shadow-lg">
    <h3 class="text-lg font-bold text-black-800 mb-4">BESHIFTで実現できること</h3>
    <ul class="space-y-3">
        <li class="flex items-start">
            <span class="flex-shrink-0 w-6 h-6 text-black-500">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m2 0a2 2 0 012 2v6a2 2 0 01-2 2H7a2 2 0 01-2-2v-6a2 2 0 012-2m2-6h6m2-2a2 2 0 012 2v2H5V6a2 2 0 012-2h10z" />
                </svg>
            </span>
            <span class="ml-3 text-gray-800">
                休職中・退職前から始めるキャリア面談
            </span>
        </li>
        <li class="flex items-start">
            <span class="flex-shrink-0 w-6 h-6 text-black-500">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 0 1-.825-.242m9.345-8.334a2.126 2.126 0 0 0-.476-.095 48.64 48.64 0 0 0-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0 0 11.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155" />
</svg>
            </span>
            <span class="ml-3 text-gray-800">
                産休中〜復帰後を見据えたキャリアプランニング
            </span>
        </li>
        <li class="flex items-start">
            <span class="flex-shrink-0 w-6 h-6 text-black-500">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904 9 18.75l-.813-2.846a4.5 4.5 0 0 0-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 0 0 3.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 0 0 3.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 0 0-3.09 3.09ZM18.259 8.715 18 9.75l-.259-1.035a3.375 3.375 0 0 0-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 0 0 2.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 0 0 2.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 0 0-2.456 2.456ZM16.894 20.567 16.5 21.75l-.394-1.183a2.25 2.25 0 0 0-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 0 0 1.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 0 0 1.423 1.423l1.183.394-1.183.394a2.25 2.25 0 0 0-1.423 1.423Z" />
</svg>

            </span>
            <span class="ml-3 text-gray-800">
                キャリア持続を前提としたライフイベント期の仕事オファー
            </span>
        </li>
        <li class="flex items-start">
            <span class="flex-shrink-0 w-6 h-6 text-black-500">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
</svg>

            </span>
            <span class="ml-3 text-gray-800">
                ライフイベント後のキャリア復職・転職支援
            </span>
        </li>
    </ul>
</div>


{{-- 記事一覧 --}}
<h2 class="text-xl font-semibold mb-4 mt-10 text-center">Career Articles</h2>
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    @foreach($articles as $article)
        <div class="flex flex-col bg-white shadow-md rounded-lg overflow-hidden">
            
            {{-- 新着バッジ --}}
            @if($article->is_new)
                <span class="bg-red-500 text-white text-xs px-2 py-1 absolute mt-2 ml-2 rounded">
                    新着
                </span>
            @endif

            {{-- 記事画像 --}}
            @if($article->image_path)
                <img src="{{ asset($article->image_path) }}"
                     alt="記事イメージ" 
                     class="w-full h-48 object-cover object-center">
            @else
                <img src="{{ asset('images/default-article.jpg') }}"
                     alt="記事イメージ" 
                     class="w-full h-48 object-cover object-center">
            @endif

            <div class="p-4 flex flex-col flex-grow">
                {{-- 公開日 --}}
                @if($article->published_at)
                    <small class="text-gray-500 text-sm">
                        {{ $article->published_at->format('Y/m/d') }}
                    </small>
                @endif

                {{-- 記事タイトル --}}
                <h5 class="text-lg font-semibold mt-2">
                    {{ $article->title }}
                </h5>

                {{-- 本文抜粋 --}}
                <p class="text-gray-700 mt-2 flex-grow">
                    {{ Str::limit($article->body, 50, '...') }}
                </p>

                {{-- カテゴリ --}}
                @if($article->category)
                    <span class="inline-block bg-gray-200 text-gray-800 text-xs px-2 py-1 mt-2 rounded">
                        {{ $article->category }}
                    </span>
                @endif

                {{-- 記事を読むリンク --}}
                <div class="mt-4 text-right">
                    <a href="{{ route('articles.show', $article->id) }}" class="text-blue-600 hover:underline font-semibold">
                        記事を読む
                    </a>
                </div>
            </div>
        </div>
    @endforeach
</div>

    {{-- ボタン類 --}}
    <div class="mt-10">
    <!-- サービスタイトル -->
    <h2 class="text-2xl font-semibold mb-6 text-center text-gray-800">Services</h2>

    <!-- ボタンエリア -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- プロフィール編集 -->
        <a href="{{ route('users.profile.edit') }}" class="block bg-gradient-to-r from-pink-50 to-blue-50 p-6 rounded-lg shadow-md hover:from-pink-100 hover:to-blue-100 transition">
            <div class="flex items-center mb-3">
                <svg class="w-6 h-6 text-blue-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                <span class="text-lg font-medium">プロフィールを編集</span>
            </div>
            <p class="text-sm text-gray-600">あなたのプロフィール情報を更新してアピール度を高めましょう。</p>
        </a>

        <!-- キャリア情報更新 -->
        <a href="{{ route('users.career.create') }}" class="block bg-gradient-to-r from-pink-50 to-blue-50 p-6 rounded-lg shadow-md hover:from-pink-100 hover:to-blue-100 transition">
            <div class="flex items-center mb-3">
                <svg class="w-6 h-6 text-gray-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h11M9 21V3" />
                </svg>
                <span class="text-lg font-medium">キャリア情報を更新</span>
            </div>
            <p class="text-sm text-gray-600">あなたのキャリア履歴を充実させて企業への魅力をアップ。</p>
        </a>

        <!-- キャリア面談 -->
        <a href="{{ route('appointment.calendar') }}" class="block bg-gradient-to-r from-pink-50 to-blue-50 p-6 rounded-lg shadow-md hover:from-pink-100 hover:to-blue-100 transition">
            <div class="flex items-center mb-3">
                <svg class="w-6 h-6 text-gray-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7" />
                </svg>
                <span class="text-lg font-medium">キャリア面談</span>
            </div>
            <p class="text-sm text-gray-600">見通しがモヤモヤしている状態でもOK！キャリア面談を通して、今後の方向性を見出しましょう。</p>
        </a>
    </div>
</div>


</div>
@endsection
