@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-3xl font-bold mb-6 text-gray-800">プロフィール</h1>

    <div class="bg-white shadow rounded-lg p-6">
        <div class="flex items-center mb-6">
            <!-- プロフィール画像 -->
            <p>画像パス: {{ $user->image }}</p>
            <img src="{{ $user->image ? asset('storage/' . $user->image) : asset('storage/user_images/user.jpg') }}"
                 alt="{{ $user->name }}" class="w-24 h-24 object-cover rounded-full mr-6">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">{{ $user->name }}</h2>
                <p class="text-gray-600">{{ $user->email }}</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- フリガナ -->
            <div>
                <label class="block text-sm font-medium text-gray-700">フリガナ</label>
                <p class="mt-1 text-gray-800">{{ $profile->kana ?? '未登録' }}</p>
            </div>

            <!-- 生年月日 -->
            <div>
                <label class="block text-sm font-medium text-gray-700">生年月日</label>
                <p class="mt-1 text-gray-800">{{ $profile->birth_date ?? '未登録' }}</p>
            </div>

            <!-- 電話番号 -->
            <div>
                <label class="block text-sm font-medium text-gray-700">電話番号</label>
                <p class="mt-1 text-gray-800">{{ $profile->phone_number ?? '未登録' }}</p>
            </div>

            <!-- 最終学歴 -->
            <div>
                <label class="block text-sm font-medium text-gray-700">最終学歴</label>
                <p class="mt-1 text-gray-800">{{ $profile->education ?? '未登録' }}</p>
            </div>

            <!-- 学校名 -->
            <div>
                <label class="block text-sm font-medium text-gray-700">学校名</label>
                <p class="mt-1 text-gray-800">{{ $profile->school_name ?? '未登録' }}</p>
            </div>

            <!-- 卒業年月 -->
            <div>
                <label class="block text-sm font-medium text-gray-700">卒業年月</label>
                <p class="mt-1 text-gray-800">{{ $profile->graduation_date ?? '未登録' }}</p>
            </div>

            <!-- 保有資格 -->
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700">保有資格</label>
                <p class="mt-1 text-gray-800 whitespace-pre-wrap">{{ $profile->qualifications ?? '未登録' }}</p>
            </div>

            <!-- 自己紹介 -->
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700">自己紹介</label>
                <p class="mt-1 text-gray-800 whitespace-pre-wrap">{{ $profile->introduction ?? '未登録' }}</p>
            </div>
        </div>

        <!-- 編集ボタン -->
        <div class="mt-6 flex justify-end">
            <a href="{{ route('users.profile.reedit') }}"
               class="px-6 p-3 text-center text-m text-white font-semibold leading-none
                           bg-gradient-to-r from-pink-200 to-blue-200 rounded-lg shadow-md opacity-90
                           hover:opacity-100 hover:shadow-lg transition">
                編集
            </a>
        </div>
    </div>
</div>
@endsection

