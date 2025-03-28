@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-3xl font-semibold mb-6 text-gray-800">キャリア情報の登録</h1>

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
        <form action="{{ route('users.career.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- 会社名 -->
                <div>
                    <label for="company_name" class="block text-sm font-medium text-gray-700">会社名</label>
                    <input 
                        type="text" 
                        id="company_name" 
                        name="company_name" 
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
                        <option value="1年未満">1年未満</option>
                        <option value="1-3年">1-3年</option>
                        <option value="3-5年">3-5年</option>
                        <option value="5年以上">5年以上</option>
                    </select>
                </div>

                <!-- スキル・経験 (カンマ区切り入力) -->
                <div class="md:col-span-2">
                    <label for="skills" class="block text-sm font-medium text-gray-700">スキル・経験</label>
                    <input
                        type="text"
                        id="skills"
                        name="skills"
                        placeholder="例：プロジェクト管理, チームリーダーシップ, アジャイル開発"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    >
                    <p class="text-gray-500 text-sm mt-1">カンマ区切りで入力してください</p>
                </div>
            </div>

            <!-- ボタン -->
            <div class="mt-6 flex justify-end">
                <button 
                    type="submit" 
                    class="px-6 p-3 text-center text-m text-white font-semibold leading-none bg-gradient-to-r from-pink-200 to-blue-200 rounded-lg shadow-md opacity-90 hover:opacity-100 hover:shadow-lg transition">
                    保存
                </button>
            </div>
        </form>
    </div>

    <!-- 登録済みデータの一覧表示（下部に追加） -->
    @if(isset($careerRecords) && $careerRecords->count() > 0)
        <div class="bg-white shadow rounded-lg p-6 mt-8">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">登録済みのキャリア情報</h2>
            @foreach($careerRecords as $record)
    <div class="border border-gray-300 rounded-lg p-4 mb-4">
    <div class="flex justify-between items-center">
    <p class="font-bold">{{ $record->company_name }} ({{ $record->years }}経験)</p>
    <div class="flex items-center space-x-2">
        <!-- 編集ボタン (丸背景, 同じ大きさ) -->
        <a href="{{ route('users.career.edit', $record->id) }}"
           class="flex items-center justify-center w-8 h-8 bg-blue-100 rounded-full hover:bg-blue-200 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg"
                 class="w-4 h-4 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M11 4H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2v-5m-5.586-9.414
                         a2 2 0 112.828 2.828L13 11l-4 1 1-4 4.414-4.414z" />
            </svg>
        </a>

        <!-- 削除ボタン (丸背景, 同じ大きさ) -->
        <form action="{{ route('users.career.destroy', $record->id) }}" method="POST"
              onsubmit="return confirm('削除してよろしいですか？');">
            @csrf
            @method('DELETE')
            <button type="submit"
                    class="flex items-center justify-center w-8 h-8 bg-pink-100 rounded-full hover:bg-pink-200 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-pink-500"
                     fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862
                             a2 2 0 01-1.995-1.858L5 7m5-4h4a2 2 0 012 2v2H8V5
                             a2 2 0 012-2z" />
                </svg>
            </button>
        </form>
    </div>
</div>

        <p class="text-sm text-gray-500 mb-2">役職: {{ $record->position }} / 職種: {{ $record->job_type }}</p>
        
        <!-- スキル表示（カンマ区切りをタグ化） -->
        @if($record->skills)
            @php
                $skillsArray = array_map('trim', explode(',', $record->skills));
            @endphp
            <div class="flex flex-wrap gap-2 mb-2">
                @foreach($skillsArray as $skill)
                    <span class="bg-gray-100 text-gray-600 px-2 py-1 rounded-md text-sm">
                        {{ $skill }}
                    </span>
                @endforeach
            </div>
        @endif

        @if($record->description)
            <p class="mt-2 text-gray-800">{{ $record->description }}</p>
        @endif
    </div>
@endforeach

        </div>
    @else
        <p class="text-gray-500 mt-6">まだ登録されたキャリア情報はありません。</p>
    @endif
</div>
@endsection
