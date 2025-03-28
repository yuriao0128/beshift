@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-3xl font-semibold mb-6 text-gray-800">キャリア情報の編集</h1>

    <!-- バリデーションエラー表示 -->
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white shadow rounded-lg p-6">
        <form action="{{ route('users.career.update', $careerRecord->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- 会社名 -->
                <div>
                    <label for="company_name" class="block text-sm font-medium text-gray-700">会社名</label>
                    <input 
                        type="text" 
                        id="company_name" 
                        name="company_name" 
                        value="{{ old('company_name', $careerRecord->company_name) }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                        required
                    >
                </div>

                <!-- 役職 -->
                <div>
                    <label for="position" class="block text-sm font-medium text-gray-700">役職</label>
                    <input 
                        type="text" 
                        id="position" 
                        name="position" 
                        value="{{ old('position', $careerRecord->position) }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" 
                        required
                    >
                </div>

                <!-- 職種 -->
                <div>
                    <label for="job_type" class="block text-sm font-medium text-gray-700">職種</label>
                    <input 
                        type="text" 
                        id="job_type" 
                        name="job_type" 
                        value="{{ old('job_type', $careerRecord->job_type) }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" 
                        required
                    >
                </div>

                <!-- 経験年数 (プルダウン) -->
                <div>
                    <label for="years" class="block text-sm font-medium text-gray-700">経験年数</label>
                    <select 
                        id="years" 
                        name="years" 
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                        required
                    >
                        <option value="">選択してください</option>
                        <option value="1年未満" {{ old('years', $careerRecord->years) == '1年未満' ? 'selected' : '' }}>1年未満</option>
                        <option value="1-3年" {{ old('years', $careerRecord->years) == '1-3年' ? 'selected' : '' }}>1-3年</option>
                        <option value="3-5年" {{ old('years', $careerRecord->years) == '3-5年' ? 'selected' : '' }}>3-5年</option>
                        <option value="5年以上" {{ old('years', $careerRecord->years) == '5年以上' ? 'selected' : '' }}>5年以上</option>
                    </select>
                </div>

                <!-- スキル・経験 (カンマ区切り入力) -->
                <div class="md:col-span-2">
                    <label for="skills" class="block text-sm font-medium text-gray-700">スキル・経験</label>
                    <input
                        type="text"
                        id="skills"
                        name="skills"
                        value="{{ old('skills', $careerRecord->skills) }}"
                        placeholder="例：プロジェクト管理, チームリーダーシップ, アジャイル開発"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    >
                    <p class="text-gray-500 text-sm mt-1">カンマ区切りで入力してください</p>
                </div>
            </div>

            <!-- 送信ボタン -->
            <div class="mt-6 flex justify-end">
                <button 
                    type="submit" 
                    class="px-6 p-3 text-center text-m text-white font-semibold leading-none bg-gradient-to-r from-pink-200 to-blue-200 rounded-lg shadow-md opacity-90 hover:opacity-100 hover:shadow-lg transition">
                    更新
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
