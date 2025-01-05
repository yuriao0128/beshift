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
                        required>
                </div>

                <!-- 役職 -->
                <div>
                    <label for="position" class="block text-sm font-medium text-gray-700">役職</label>
                    <input 
                        type="text" 
                        id="position" 
                        name="position" 
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" 
                        required>
                </div>

                <!-- 職種 -->
                <div>
                    <label for="job_type" class="block text-sm font-medium text-gray-700">職種</label>
                    <input 
                        type="text" 
                        id="job_type" 
                        name="job_type" 
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" 
                        required>
                </div>

                <!-- 雇用形態 -->
                <div>
                    <label for="employment_type" class="block text-sm font-medium text-gray-700">雇用形態</label>
                    <input 
                        type="text" 
                        id="employment_type" 
                        name="employment_type" 
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" 
                        required>
                </div>

                <!-- 開始日 -->
                <div>
                    <label for="start_date" class="block text-sm font-medium text-gray-700">開始日</label>
                    <input 
                        type="date" 
                        id="start_date" 
                        name="start_date" 
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" 
                        required>
                </div>

                <!-- 終了日 -->
                <div>
                    <label for="end_date" class="block text-sm font-medium text-gray-700">終了日</label>
                    <input 
                        type="date" 
                        id="end_date" 
                        name="end_date" 
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <!-- 職務内容 -->
                <div class="md:col-span-2">
                    <label for="description" class="block text-sm font-medium text-gray-700">職務内容</label>
                    <textarea 
                        id="description" 
                        name="description" 
                        rows="4" 
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                </div>
            </div>

            <!-- ボタン -->
            <div class="mt-6 flex justify-end">
                <button 
                    type="submit" 
                    class="px-6 py-2 bg-indigo-500 text-white font-medium rounded-md shadow hover:bg-indigo-600 focus:outline-none">
                    保存
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
