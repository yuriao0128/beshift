@extends('layouts.app')

@section('content')
<div class="container text-center mt-4">
    <h1>キャリア面談申し込み</h1>
    <a href="{{ route('appointment.calendar') }}" class="btn btn-primary btn-lg">無料で申し込む</a>
</div>
@endsection
