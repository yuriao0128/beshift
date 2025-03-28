@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-3xl font-semibold mb-6 text-gray-800">希望条件の編集</h1>

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
        <form action="{{ route('users.desired.update', $desiredCondition->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- 希望する働き方 -->
                <div>
                    <label for="desired_work_style" class="block text-sm font-medium text-gray-700">希望する働き方</label>
                    <select id="desired_work_style" name="desired_work_style" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                        <option value="">選択してください</option>
                        <option value="在宅あり（週1,2回）" {{ old('desired_work_style', $desiredCondition->desired_work_style) == '在宅あり（週1,2回）' ? 'selected' : '' }}>在宅あり（週1,2回）</option>
                        <option value="在宅あり（週3,4回）" {{ old('desired_work_style', $desiredCondition->desired_work_style) == '在宅あり（週3,4回）' ? 'selected' : '' }}>在宅あり（週3,4回）</option>
                        <option value="フル在宅" {{ old('desired_work_style', $desiredCondition->desired_work_style) == 'フル在宅' ? 'selected' : '' }}>フル在宅</option>
                    </select>
                </div>

                <!-- 希望する職種 -->
                <div>
                    <label for="desired_position" class="block text-sm font-medium text-gray-700">希望する職種</label>
                    <input type="text" id="desired_position" name="desired_position" value="{{ old('desired_position', $desiredCondition->desired_position) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>

                <!-- 希望給与 -->
                <div>
                    <label for="desired_salary" class="block text-sm font-medium text-gray-700">希望給与</label>
                    <input type="text" id="desired_salary" name="desired_salary" value="{{ old('desired_salary', $desiredCondition->desired_salary) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <!-- 希望勤務地 -->
                <div>
                    <label for="desired_location" class="block text-sm font-medium text-gray-700">希望勤務地</label>
                    <input type="text" id="desired_location" name="desired_location" value="{{ old('desired_location', $desiredCondition->desired_location) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>

                <!-- 希望する就業時間 -->
                <div>
                    <label for="desired_work_time" class="block text-sm font-medium text-gray-700">希望する就業時間</label>
                    <select id="desired_work_time" name="desired_work_time" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                        <option value="">選択してください</option>
                        <option value="時短" {{ old('desired_work_time', $desiredCondition->desired_work_time) == '時短' ? 'selected' : '' }}>時短</option>
                        <option value="フルタイム" {{ old('desired_work_time', $desiredCondition->desired_work_time) == 'フルタイム' ? 'selected' : '' }}>フルタイム</option>
                    </select>
                </div>

                <!-- 希望する働き方の詳細 -->
                <div class="md:col-span-2">
                    <label for="desired_work_detail" class="block text-sm font-medium text-gray-700">希望する働き方の詳細</label>
                    <textarea id="desired_work_detail" name="desired_work_detail" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">{{ old('desired_work_detail', $desiredCondition->desired_work_detail) }}</textarea>
                    <p class="text-gray-500 text-sm mt-1">詳細を記入してください</p>
                </div>
            </div>

            <!-- 更新ボタン -->
            <div class="mt-6 flex justify-end">
                <button type="submit" class="px-6 p-3 text-center text-m text-white font-semibold leading-none bg-gradient-to-r from-pink-200 to-blue-200 rounded-lg shadow-md opacity-90 hover:opacity-100 hover:shadow-lg transition">
                    更新
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
