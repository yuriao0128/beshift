@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-3xl font-semibold mb-6 text-gray-800 text-center">希望日時とメンターを選択</h1>

    <div class="bg-white shadow rounded-lg p-6 max-w-lg mx-auto">
        <form action="{{ route('appointment.calendar.save') }}" method="POST">
            @csrf

            <!-- メンター選択 -->
            <div class="mb-6">
                <label for="mentor_id" class="block text-sm font-medium text-gray-700 mb-2">メンターを選択</label>
                <input type="hidden" id="mentor_id" name="mentor_id" required>
                <div class="mentor-select grid grid-cols-1 sm:grid-cols-2 gap-4">
                    @foreach ($mentors as $mentor)
                        <div 
                            class="mentor-option flex items-center p-4 border rounded-md shadow-sm hover:bg-indigo-100 cursor-pointer" 
                            data-id="{{ $mentor->id }}">
                            @if ($mentor->image)
                                <img src="{{ asset('storage/' . $mentor->image) }}" alt="{{ $mentor->name }}" 
                                     class="w-12 h-12 object-cover rounded-full mr-4">
                            @endif
                            <div>
                                <p class="text-sm font-medium text-gray-800">{{ $mentor->name }}</p>
                                <p class="text-xs text-gray-600">{{ $mentor->expertise }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- 希望日選択 -->
            <div class="mb-6">
                <label for="desired_date" class="block text-sm font-medium text-gray-700 mb-2">希望日</label>
                <select id="desired_date" name="desired_date" 
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                    @foreach ($schedules->groupBy('available_date') as $date => $times)
                        <option value="{{ $date }}">{{ $date }}</option>
                    @endforeach
                </select>
            </div>

            <!-- 希望時間選択 -->
            <div class="mb-6">
                <label for="desired_time" class="block text-sm font-medium text-gray-700 mb-2">希望時間</label>
                <select id="desired_time" name="desired_time" 
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                    @foreach ($schedules as $schedule)
                        <option value="{{ $schedule->available_time }}">{{ $schedule->available_time }}</option>
                    @endforeach
                </select>
            </div>

            <!-- ボタン -->
            <div class="flex justify-end">
                <button 
                    type="submit" 
                    class="px-6 p-3 text-center text-m text-white font-semibold leading-none bg-gradient-to-r from-pink-200 to-blue-200 rounded-lg shadow-md opacity-90 hover:opacity-100 hover:shadow-lg transition">
                    次へ
                </button>
            </div>
        </form>
    </div>
</div>

<!-- メンター選択のJavaScript -->
<script>
    document.querySelectorAll('.mentor-option').forEach(option => {
        option.addEventListener('click', function () {
            document.querySelectorAll('.mentor-option').forEach(opt => opt.classList.remove('bg-indigo-100', 'border-indigo-500'));
            this.classList.add('bg-indigo-100', 'border-indigo-500');
            document.getElementById('mentor_id').value = this.dataset.id;
        });
    });
</script>
@endsection
