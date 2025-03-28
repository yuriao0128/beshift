@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 max-w-2xl py-12">
    <div class="mb-8">
        <div class="h-2 w-full bg-gray-200 rounded-full overflow-hidden">
            <div class="h-2 bg-gradient-to-r from-pink-200 to-blue-200 rounded-full transition-all duration-300" style="width: {{ ($step / $totalSteps) * 100 }}%;"></div>
        </div>
        <p class="text-sm text-gray-600 mt-2">質問 {{ $step }} / {{ $totalSteps }}</p>
    </div>

    <div class="bg-white rounded-2xl shadow p-8">
        <h2 class="text-2xl font-bold text-gray-900 mb-6">{{ $question['question'] }}</h2>

        <form method="POST" action="{{ route('assessment.store', ['step' => $step]) }}">
            @csrf
            <div class="space-y-3">
    @foreach ($question['options'] as $option)
    <button type="submit" name="answer" value="{{ $option }}"
        class="w-full text-left px-6 py-4 rounded-xl border-2 border-gray-200 
               bg-gradient-to-r from-white to-white
               transition duration-700 ease-in-out 
               hover:from-pink-50 hover:to-blue-50 
               hover:text-black hover:border-transparent">
        {{ $option }}
    </button>
    @endforeach
</div>

    <div class="mt-8 flex justify-between">
        @if($step > 1)
            <a href="{{ route('assessment', ['step' => $step - 1]) }}" class="text-gray-600 hover:text-blue-500">
                ← 戻る
            </a>
        @endif
        <span class="text-gray-500">{{ $step }} / {{ $totalSteps }}</span>
    </div>
</div>
@endsection
