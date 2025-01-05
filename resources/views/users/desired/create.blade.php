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

    <div class="bg-white shadow rounded-lg p-6">
        <form action="{{ route('users.desired.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- 希望する働き方 -->
                <div>
                    <label for="desired_work_style" class="block text-sm font-medium text-gray-700">希望する働き方</label>
                    <input 
                        type="text" 
                        id="desired_work_style" 
                        name="desired_work_style" 
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" 
                        required>
                </div>

                <!-- 希望する職種 -->
                <div>
                    <label for="desired_position" class="block text-sm font-medium text-gray-700">希望する職種</label>
                    <input 
                        type="text" 
                        id="desired_position" 
                        name="desired_position" 
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" 
                        required>
                </div>

                <!-- 希望給与 -->
                <div>
                    <label for="desired_salary" class="block text-sm font-medium text-gray-700">希望給与</label>
                    <input 
                        type="text" 
                        id="desired_salary" 
                        name="desired_salary" 
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <!-- 希望勤務地 -->
                <div>
                    <label for="desired_location" class="block text-sm font-medium text-gray-700">希望勤務地</label>
                    <input 
                        type="text" 
                        id="desired_location" 
                        name="desired_location" 
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" 
                        required>
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
