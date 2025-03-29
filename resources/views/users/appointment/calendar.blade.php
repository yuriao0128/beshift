@extends('layouts.app')
@section('content')

<div class="container mx-auto py-8">
  <h1 class="text-3xl font-semibold mb-6 text-gray-800 text-center">希望日時とメンターを選択</h1>

  <div class="bg-white shadow rounded-lg p-6 max-w-2xl mx-auto">
    <form action="{{ route('appointment.calendar.save') }}" method="POST" id="appointmentForm">
      @csrf

      <!-- メンター選択 -->
      <div class="mb-6">
        <label for="mentor_id" class="block text-sm font-medium text-gray-700 mb-2">メンターを選択</label>
        <!-- hidden フィールドは x-model ではなく、JSで値をセット -->
        <input type="hidden" id="mentor_id" name="mentor_id" required>
        <div class="mentor-select grid grid-cols-1 sm:grid-cols-2 gap-4">
          @foreach ($mentors as $mentor)
            <div class="mentor-option flex flex-col p-4 border rounded-md shadow-sm hover:bg-indigo-100 cursor-pointer"
                 data-id="{{ $mentor->id }}">
              @if ($mentor->image)
                <img src="{{ asset('/mentor_images/' . $mentor->image) }}" alt="{{ $mentor->name }}" class="w-12 h-12 object-cover rounded-full mr-4">
              @endif
              <div>
                <p class="text-sm font-medium text-gray-800">{{ $mentor->name }}</p>
                <p class="text-xs text-gray-600">{{ $mentor->expertise }}</p>
              </div>
              <!-- 詳細をみるボタン -->
              <button type="button" class="mt-auto self-end text-xs text-indigo-600 hover:text-indigo-800 detail-btn"
                      data-mentor='@json($mentor)'>
                詳細をみる
              </button>
            </div>
            <div class="text-red-500 text-sm">
                {{ $mentor->image }}
            </div>
          @endforeach
        </div>
      </div>

      <!-- 希望日選択 -->
      <div class="mb-6">
        <label for="desired_date" class="block text-sm font-medium text-gray-700 mb-2">希望日</label>
        <select id="desired_date" name="desired_date"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
          <!-- オプションは JavaScript で動的に追加 -->
        </select>
      </div>

      <!-- 希望時間選択 -->
      <div class="mb-6">
        <label for="desired_time" class="block text-sm font-medium text-gray-700 mb-2">希望時間</label>
        <select id="desired_time" name="desired_time"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
          <!-- オプションは JavaScript で動的に追加 -->
        </select>
      </div>

      <!-- ボタン -->
      <div class="flex justify-end">
        <button type="submit" class="px-6 p-3 text-center text-m text-white font-semibold leading-none bg-gradient-to-r from-pink-200 to-blue-200 rounded-lg shadow-md opacity-90 hover:opacity-100 hover:shadow-lg transition">
          次へ
        </button>
      </div>
    </form>
  </div>

  <!-- モーダル (メンター詳細) -->
  <div id="mentorModal" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 z-50" style="display: none;">
    <div class="bg-white rounded-lg p-8 w-11/12 max-w-md">
      <div class="flex justify-between items-center mb-4">
        <h2 id="modalMentorName" class="text-2xl font-bold text-gray-800"></h2>
        <button id="closeModal" class="text-gray-500 hover:text-gray-700">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
               viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
      <div class="flex items-start space-x-4">
        <img id="modalMentorImage" src="" alt="" class="w-16 h-16 object-cover rounded-full" style="display:none;">
        <div class="space-y-2">
          <p class="text-gray-700"><strong>得意分野:</strong> <span id="modalMentorExpertise"></span></p>
          <p class="text-gray-700"><strong>経歴・経験:</strong> <span id="modalMentorBio"></span></p>
        </div>
      </div>
      <button id="closeModal2" class="mt-6 w-full bg-indigo-500 text-white py-2 rounded hover:bg-indigo-600 transition-colors">
        閉じる
      </button>
    </div>
  </div>
</div>

<!-- 手動用 JavaScript -->
<script>
    // まず、DBから渡されたスケジュールデータを JavaScript 変数に
    var schedules = @json($schedules);

    // Helper: ユニークな日付リストを生成
    function getUniqueDates(schedules) {
    const today = new Date().setHours(0, 0, 0, 0);
    // 過去の日付を除外してユニークな日付リストを返す
    let dates = schedules
        .filter(s => new Date(s.available_date).setHours(0, 0, 0, 0) >= today)
        .map(s => s.available_date);
    return [...new Set(dates)];
}

    // 希望時間オプションを更新する関数
    function updateTimeOptions(filteredSchedules, selectedDate) {
        const timeSelect = document.getElementById('desired_time');
        timeSelect.innerHTML = '';
        // 選択された日付に一致するスケジュールの時間を抽出
        let times = filteredSchedules
            .filter(s => s.available_date === selectedDate)
            .map(s => s.available_time);
        times = [...new Set(times)]; // 重複除去
        times.forEach(time => {
            const option = document.createElement('option');
            option.value = time;
            option.textContent = time;
            timeSelect.appendChild(option);
        });
    }

    // 希望日オプションを更新する関数
    function updateDateOptions(uniqueDates) {
        const dateSelect = document.getElementById('desired_date');
        dateSelect.innerHTML = '';
        uniqueDates.forEach(date => {
            const option = document.createElement('option');
            option.value = date;
            option.textContent = date;
            dateSelect.appendChild(option);
        });
    }

    // 選択されたメンターに対応するスケジュールをフィルタリングする
    function selectMentor(id) {
        var mentorId = parseInt(id);
        document.getElementById('mentor_id').value = mentorId;
        // mentor_id に一致するスケジュールを抽出
        var filtered = schedules.filter(function(schedule) {
            return schedule.mentor_id === mentorId;
        });
        // 希望日セレクトにユニークな日付を設定
        var uniqueDates = getUniqueDates(filtered);
        updateDateOptions(uniqueDates);
        // 初期値として、最初の希望日が選択される場合、その日付に対応する時間を設定
        if (uniqueDates.length > 0) {
            document.getElementById('desired_date').value = uniqueDates[0];
            updateTimeOptions(filtered, uniqueDates[0]);
        } else {
            // オプションがない場合は空に
            document.getElementById('desired_date').innerHTML = '';
            document.getElementById('desired_time').innerHTML = '';
        }
        // 保存用に filteredSchedules を保持しておく場合はグローバル変数などにセットしてもよい
        window.currentFilteredSchedules = filtered;
    }

    // 希望日選択の変更時に、対応する希望時間を更新
    document.getElementById('desired_date').addEventListener('change', function() {
        var selectedDate = this.value;
        updateTimeOptions(window.currentFilteredSchedules || [], selectedDate);
    });

    // メンター選択のためのイベントリスナー
    document.querySelectorAll('.mentor-option').forEach(function(option) {
        option.addEventListener('click', function() {
            // 選択状態をリセット（全オプションのクラスを除去）
            document.querySelectorAll('.mentor-option').forEach(function(opt) {
                opt.classList.remove('bg-indigo-100', 'border-indigo-500');
            });
            // クリックされた要素に選択状態を追加
            this.classList.add('bg-indigo-100', 'border-indigo-500');
            // メンター選択処理を実行
            selectMentor(this.dataset.id);
        });
    });

    // モーダル処理
    document.querySelectorAll('.detail-btn').forEach(function(btn) {
        btn.addEventListener('click', function() {
            var mentorData = JSON.parse(this.getAttribute('data-mentor'));
            document.getElementById('modalMentorName').textContent = mentorData.name;
            document.getElementById('modalMentorExpertise').textContent = mentorData.expertise;
            document.getElementById('modalMentorBio').textContent = mentorData.bio;
            if (mentorData.image) {
                var img = document.getElementById('modalMentorImage');
                img.src = '/mentor_images/' + mentorData.image;
                img.style.display = 'block';
            } else {
                document.getElementById('modalMentorImage').style.display = 'none';
            }
            document.getElementById('mentorModal').style.display = 'flex';
        });
    });
    // モーダル閉じるボタン
    document.getElementById('closeModal').addEventListener('click', function() {
        document.getElementById('mentorModal').style.display = 'none';
    });
    document.getElementById('closeModal2').addEventListener('click', function() {
        document.getElementById('mentorModal').style.display = 'none';
    });
</script>
@endsection
