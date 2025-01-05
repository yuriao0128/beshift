@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-3xl font-semibold mb-6 text-gray-800">プロフィール編集</h1>

    <div class="bg-white shadow rounded-lg p-6">
        <form method="POST" action="{{ route('users.profile.update') }}">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- フリガナ -->
                <div>
                    <label for="kana" class="block text-sm font-medium text-gray-700">フリガナ</label>
                    <input 
                        type="text" 
                        name="kana" 
                        id="kana" 
                        value="{{ old('kana', $user->kana) }}" 
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <!-- 生年月日 -->
                <div>
                    <label for="birth_date" class="block text-sm font-medium text-gray-700">生年月日</label>
                    <input 
                        type="date" 
                        name="birth_date" 
                        id="birth_date" 
                        value="{{ old('birth_date', $user->birth_date) }}" 
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <!-- 電話番号 -->
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700">電話番号</label>
                    <input 
                        type="text" 
                        name="phone" 
                        id="phone" 
                        value="{{ old('phone', $user->phone) }}" 
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <!-- 最終学歴 -->
                <div>
                    <label for="education" class="block text-sm font-medium text-gray-700">最終学歴</label>
                    <input 
                        type="text" 
                        name="education" 
                        id="education" 
                        value="{{ old('education', $user->education) }}" 
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <!-- 学校名 -->
                <div>
                    <label for="school_name" class="block text-sm font-medium text-gray-700">学校名</label>
                    <input 
                        type="text" 
                        name="school_name" 
                        id="school_name" 
                        value="{{ old('school_name', $user->school_name) }}" 
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <!-- 卒業年月 -->
                <div>
                    <label for="graduation_date" class="block text-sm font-medium text-gray-700">卒業年月</label>
                    <input 
                        type="date" 
                        name="graduation_date" 
                        id="graduation_date" 
                        value="{{ old('graduation_date', $user->graduation_date) }}" 
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <!-- 保有資格 -->
                <div class="md:col-span-2">
                    <label for="qualifications" class="block text-sm font-medium text-gray-700">保有資格</label>
                    <textarea 
                        name="qualifications" 
                        id="qualifications" 
                        rows="4"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">{{ old('qualifications', $user->qualifications) }}</textarea>
                </div>
            </div>

            <!-- ボタン -->
            <div class="mt-6 flex justify-end">
                <button type="submit" class="px-6 py-2 bg-indigo-500 text-white font-medium rounded-md shadow hover:bg-indigo-600 focus:outline-none">
                    保存
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
