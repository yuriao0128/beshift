@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-3xl font-bold mb-6 text-gray-800">プロフィール編集</h1>

    <div class="bg-white shadow rounded-lg p-6">
        <form action="{{ route('users.profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <!-- プロフィール画像のアップロード -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">プロフィール画像</label>
                <div class="relative w-32 h-32">
                <img id="profilePreview"
                src="{{ $user->image ? asset('storage/users/' . $user->image) : 'https://beshift.sakura.ne.jp/mentor_images/default1.jpg' }}"
                alt="{{ $user->name }}"
                class="w-32 h-32 object-cover rounded-full">
                    <!-- オーバーレイ（hover で表示） -->
                    <label for="image"
                           class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 hover:opacity-100 transition-opacity rounded-full cursor-pointer">
                        <span class="text-white text-sm">更新する</span>
                    </label>
                    <!-- ファイル入力は非表示 -->
                    <input type="file" id="image" name="image" accept="image/*" class="hidden">
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- フリガナ -->
                <div>
                    <label for="kana" class="block text-sm font-medium text-gray-700">フリガナ</label>
                    <input type="text" name="kana" id="kana" value="{{ old('kana', $profile->kana) }}"
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <!-- 生年月日 -->
                <div>
                    <label for="birth_date" class="block text-sm font-medium text-gray-700">生年月日</label>
                    <input type="date" name="birth_date" id="birth_date" value="{{ old('birth_date', $profile->birth_date) }}"
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <!-- 電話番号 -->
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700">電話番号</label>
                    <input type="text" name="phone" id="phone" value="{{ old('phone', $profile->phone_number) }}"
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <!-- 最終学歴 -->
                <div>
                    <label for="education" class="block text-sm font-medium text-gray-700">最終学歴</label>
                    <input type="text" name="education" id="education" value="{{ old('education', $profile->education) }}"
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <!-- 学校名 -->
                <div>
                    <label for="school_name" class="block text-sm font-medium text-gray-700">学校名</label>
                    <input type="text" name="school_name" id="school_name" value="{{ old('school_name', $profile->school_name) }}"
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <!-- 卒業年月 -->
                <div>
                    <label for="graduation_date" class="block text-sm font-medium text-gray-700">卒業年月</label>
                    <input type="date" name="graduation_date" id="graduation_date" value="{{ old('graduation_date', $profile->graduation_date) }}"
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <!-- 保有資格 -->
                <div class="md:col-span-2">
                    <label for="qualifications" class="block text-sm font-medium text-gray-700">保有資格</label>
                    <textarea name="qualifications" id="qualifications" rows="4"
                              class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">{{ old('qualifications', $profile->qualifications) }}</textarea>
                </div>
                <!-- 自己紹介 -->
                <div class="md:col-span-2">
                    <label for="introduction" class="block text-sm font-medium text-gray-700">自己紹介</label>
                    <textarea name="introduction" id="introduction" rows="3"
                              class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">{{ old('introduction', $profile->introduction) }}</textarea>
                </div>
            </div>

            <!-- ボタン -->
            <div class="mt-6 flex justify-end">
                <button type="submit" 
                        class="px-6 p-3 text-center text-m text-white font-semibold leading-none
                           bg-gradient-to-r from-pink-200 to-blue-200 rounded-lg shadow-md opacity-90
                           hover:opacity-100 hover:shadow-lg transition">
                    更新
                </button>
            </div>
        </form>
    </div>
</div>

<!-- 画像プレビュー用のスクリプト -->
<script>
    document.getElementById('image').addEventListener('change', e => {
        const previewImageNode = document.getElementById('profilePreview');
        const file = e.target.files[0];
        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = () => {
                document.getElementById('profilePreview').src = reader.result;
            };
            reader.readAsDataURL(file);
        } else {
            alert('画像ファイルを選択してください');
        }
    });
</script>
@endsection
