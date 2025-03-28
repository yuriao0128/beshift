@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8 px-4">
    <h1 class="text-3xl font-semibold mb-6 text-gray-800 text-center">基本情報入力</h1>

    <div class="bg-white shadow rounded-lg p-6 max-w-lg mx-auto">
        <form action="{{ route('appointment.submit') }}" method="POST">
            @csrf

            <!-- 相談したい内容 -->
            <div class="mb-6">
                <label for="purpose" class="block text-sm font-medium text-gray-700 mb-2">相談したい内容</label>
                <textarea 
                    id="purpose" 
                    name="purpose" 
                    rows="6" 
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" 
                    placeholder="相談内容を具体的に記載してください" 
                    required></textarea>
            </div>

            <!-- 予約ボタン -->
            <div class="flex justify-end">
                <button 
                    type="submit" 
                    class="px-6 p-3 text-center text-m text-white font-semibold leading-none bg-gradient-to-r from-pink-200 to-blue-200 rounded-lg shadow-md opacity-90 hover:opacity-100 hover:shadow-lg transition">
                    予約を確定
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
