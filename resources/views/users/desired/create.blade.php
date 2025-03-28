@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-3xl font-semibold mb-6 text-gray-800">キャリア希望条件の登録</h1>

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

    <!-- 登録フォーム -->
    <div class="bg-white shadow rounded-lg p-6">
        <form action="{{ route('users.desired.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- 希望する働き方 -->
                <div>
                <label for="desired_work_style" class="block text-sm font-medium text-gray-700">希望する働き方</label>
                <select id="desired_work_style" name="desired_work_style" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                    <option value="">選択してください</option>
                    <option value="在宅あり（週1,2回）">在宅あり（週1,2回）</option>
                    <option value="在宅あり（週3,4回）">在宅あり（週3,4回）</option>
                    <option value="フル在宅">フル在宅</option>
                </select>
            </div>

            <!-- 希望する就業時間 -->
                <div>
                    <label for="desired_work_time" class="block text-sm font-medium text-gray-700">希望する就業時間</label>
                    <select id="desired_work_time" name="desired_work_time" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                        <option value="">選択してください</option>
                        <option value="時短">時短</option>
                        <option value="フルタイム">フルタイム</option>
                    </select>
                </div>


                <!-- 希望する働き方の詳細 -->
                <div class="md:col-span-2">
                    <label for="desired_work_detail" class="block text-sm font-medium text-gray-700">希望する働き方の詳細</label>
                    <textarea id="desired_work_detail" name="desired_work_detail" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                    <p class="text-gray-500 text-sm mt-1">希望する働き方についての詳細を記入してください</p>
                </div>

                <!-- 希望する職種 -->
                <div>
                    <label for="desired_position" class="block text-sm font-medium text-gray-700">希望する職種</label>
                    <input 
                        type="text" 
                        id="desired_position" 
                        name="desired_position" 
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm
                               focus:ring-indigo-500 focus:border-indigo-500" 
                        required>
                </div>

                <!-- 希望給与 -->
                <div>
                    <label for="desired_salary" class="block text-sm font-medium text-gray-700">希望給与</label>
                    <input 
                        type="text" 
                        id="desired_salary" 
                        name="desired_salary" 
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm
                               focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <!-- 希望勤務地 -->
                <div>
                    <label for="desired_location" class="block text-sm font-medium text-gray-700">希望勤務地</label>
                    <input 
                        type="text" 
                        id="desired_location" 
                        name="desired_location" 
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm
                               focus:ring-indigo-500 focus:border-indigo-500" 
                        required>
                </div>
            </div>

            <!-- ボタン -->
            <div class="mt-6 flex justify-end">
                <button 
                    type="submit" 
                    class="px-6 p-3 text-center text-m text-white font-semibold leading-none
                           bg-gradient-to-r from-pink-200 to-blue-200 rounded-lg shadow-md opacity-90
                           hover:opacity-100 hover:shadow-lg transition">
                    保存
                </button>
            </div>
        </form>
    </div>

    @if(isset($desiredConditions) && $desiredConditions->count() > 0)
    <div class="bg-white shadow rounded-lg p-6 mt-8">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">登録済みの希望条件</h2>

        @foreach($desiredConditions as $condition)
    <div class="border border-gray-300 rounded-lg p-4 mb-4">
        <div class="flex items-center justify-between">
            <!-- 左側：アイコン & テキスト -->
            <div class="flex items-center space-x-2">
                <!-- アイコン：スカウトON→緑ベル、OFF→グレーベルSlash -->
                @if($condition->receive_scout)
                    <!-- ベルアイコン (ON) -->
                    <svg xmlns="http://www.w3.org/2000/svg" 
                         class="h-6 w-6 text-green-500" 
                         viewBox="0 0 20 20" 
                         fill="currentColor">
                        <path d="M10 2a6 6 0 00-6 6v3.586l-1.707 
                                 1.707A1 1 0 003 15h14a1 1 0 
                                 00.707-1.707L16 11.586V8a6 
                                 6 0 00-6-6zM8 18a2 2 0 
                                 104 0H8z" />
                    </svg>
                @else
                    <!-- ベルSlashアイコン (OFF) -->
                    <svg xmlns="http://www.w3.org/2000/svg" 
                         class="h-6 w-6 text-gray-400" 
                         viewBox="0 0 20 20" 
                         fill="currentColor">
                        <path d="M10 2a6 6 0 
                                 00-6 6v3.586l-1.707 1.707A1 
                                 1 0 003 15h14a1 1 0 
                                 00.707-1.707L16 11.586V8a6 
                                 6 0 00-6-6zM8 18a2 2 0 
                                 104 0H8z" />
                        <line x1="3" y1="3" x2="17" y2="17" 
                              stroke="white" stroke-width="2" 
                              stroke-linecap="round" />
                    </svg>
                @endif

                <!-- 希望条件のタイトルなど -->
                <div>
                    <p class="font-bold text-gray-800">
                        {{ $condition->desired_work_style }} 
                        <span class="font-bold text-gray-800"> {{ $condition->desired_work_time }}</span>
                    </p>
                    <p class="text-sm text-gray-500">
                        {{ $condition->desired_position }} （{{ $condition->desired_location }} / {{ $condition->desired_salary }}）
                    </p>
                    <p class="text-sm text-gray-500">
                        詳細: {{ $condition->desired_work_detail }}
                    </p>
                </div>
            </div>

            <!-- 右側：削除ボタン + スカウト受信切り替えボタン -->
            <div class="flex items-center space-x-2">
                <!-- 削除ボタン -->
                <form action="{{ route('users.desired.destroy', $condition->id) }}" 
                      method="POST" 
                      onsubmit="return confirm('削除してよろしいですか？');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="flex items-center justify-center w-8 h-8 bg-red-100 rounded-full hover:bg-red-200 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" 
                             class="h-4 w-4 text-red-500" 
                             fill="none" viewBox="0 0 24 24" 
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M19 7l-.867 12.142A2 2 0 0116.138 
                                     21H7.862a2 2 0 01-1.995-1.858L5 
                                     7m5-4h4a2 2 0 012 2v2H8V5a2 
                                     2 0 012-2z" />
                        </svg>
                    </button>
                </form>

                <!-- スカウト受信切り替えボタン -->
                <form action="{{ route('users.desired.toggleScout', $condition->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    @if($condition->receive_scout)
                        <button type="submit"
                                class="bg-green-50 text-green-600 px-3 py-1 rounded-full hover:bg-green-100 transition-colors text-sm font-semibold">
                            スカウトを受け取らない
                        </button>
                    @else
                        <button type="submit"
                                class="bg-gray-50 text-gray-600 px-3 py-1 rounded-full hover:bg-gray-100 transition-colors text-sm font-semibold">
                            スカウトを受け取る
                        </button>
                    @endif
                </form>
            </div>
        </div>
    </div>
@endforeach
    </div>
@else
    <p class="text-gray-500 mt-6">まだ希望条件が登録されていません。</p>
@endif

</div>
@endsection
