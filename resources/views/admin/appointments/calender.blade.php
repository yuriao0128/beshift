@extends('layouts.admin')

@section('content')
<div class="container mx-auto py-6">
    <h1 class="text-2xl font-semibold mb-6">キャリア面談管理 - カレンダー</h1>

    <!-- カレンダー表示 -->
    <div id="calendar"></div>
</div>

<!-- FullCalendar用のスクリプトとCSS -->
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale: 'ja', // 日本語化
            events: @json($events) // Laravelから渡されたデータをJavaScriptで使用
        });

        calendar.render();
    });
</script>
@endsection
