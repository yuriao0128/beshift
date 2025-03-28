@extends('layouts.app') {{-- レイアウトを変更したい場合は適宜変更してください --}}

@section('content')
<div class="max-w-3xl mx-auto px-4 py-8">
    <div class="bg-white shadow-md rounded-2xl p-6">

        {{-- タイトル --}}
        <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $article->title }}</h1>

        {{-- 公開日 --}}
        @if($article->published_at)
            <p class="text-sm text-gray-500 mb-2">
                公開日: {{ $article->published_at->format('Y年m月d日') }}
            </p>
        @endif

        {{-- カテゴリ --}}
        @if($article->category)
            <span class="inline-block bg-gray-200 text-gray-800 text-xs px-2 py-1 mb-4 rounded">
                {{ $article->category }}
            </span>
        @endif

        {{-- 記事画像 --}}
        @if($article->image_path)
            <img src="{{ asset($article->image_path) }}" alt="記事画像" class="w-full h-64 object-cover rounded mb-6">
        @endif

        {{-- 本文 --}}
        <div class="text-gray-800 leading-relaxed text-base">
            {!! nl2br(e($article->body)) !!}
        </div>

        {{-- 戻るボタン --}}
        <div class="mt-8 text-right">
            <a href="{{ url()->previous() }}" class="text-blue-600 hover:underline">
                ← 記事一覧に戻る
            </a>
        </div>
    </div>
</div>
@endsection
