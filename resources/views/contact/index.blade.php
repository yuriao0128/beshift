@extends('layouts.default')
@section('title', 'お問い合わせ')

@section('content')
<section class="bg-gray-100 pt-2">
  <div class="container mx-auto">
    <p class="text-left px-4 pt-2 text-gray-400"><a href="#" class="text-blue-600 hover:underline">ホーム</a><span class="px-2">&gt</span>お問い合わせ</p>
    <h1 class="mt-2 text-4xl font-bold font-heading h-40 text-center p-12">お問い合わせ</h1>
  </div>
</section>

<section class="mt-20 pb-24">
  <div class="w-192 mx-auto">
    <p class="text-left">以下のフォームに必要事項をご入力の上、ご送信下さい。<br>
      通常お問い合わせから3営業日以内にご入力いただいたメールアドレスに返信させていただきます。<br>
      なお、info@nekocafe.xx.xxからの返信が受信できるように事前に設定のご確認をお願い致します。
    </p>
    <div class="mt-8">
      <!-- ▼▼▼▼エラーメッセージ▼▼▼▼　-->
       @if($errors->any())
      <div class="mb-8 py-4 px-6 border border-pink-300 bg-pink-50 rounded">
        <ul>
          @foreach($errors->all() as $error)
            <li class="text-pink-400">{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
      <!-- ▲▲▲▲エラーメッセージ▲▲▲▲　-->

      <form action="{{ route('contact')}}" method="POST">
          @csrf
        <div class="mb-4">
          <label for="name" class="block text-left p-1 my-1 font-medium">お名前<span class="text-white text-xs bg-yellow-400 mx-2 py-1 px-2">必須</span></label>
          <input id="name" class="w-full p-4 text-xs leading-none bg-blueGray-50 rounded outline-none border" type="text" placeholder="例）田中太郎" name="name" value="{{ old('name')}}">
          @if($errors->has('name'))
          <p class="text-red-400">{{ $errors->first('name')}}</p>
          @endif
          <div class="mb-4">
          <label for=name_kana class="block text-left p-1 my-1 font-medium">お名前（フリガナ）<span class="text-white text-xs bg-yellow-400 mx-2 py-1 px-2">必須</span></label>
          <input id="name_kana" class="w-full p-4 text-xs leading-none bg-blueGray-50 rounded outline-none border" type="text" placeholder="例）タナカタロウ" name="name_kana" value="{{ old('name_kana')}}">
        </div>
        <div class="mb-4">
          <label for="phone" class="block text-left p-1 my-1 font-medium">電話番号</label>
          <input id="phone" class="w-full p-4 text-xs leading-none bg-blueGray-50 rounded outline-none border" type="text" placeholder="例）0312345678" name="phone" value="{{ old('phone')}}">
        </div>
        <div class="mb-4">
          <label for="email" class="block text-left p-1 my-1 font-medium">メールアドレス<span class="text-white text-xs bg-yellow-400 mx-2 py-1 px-2">必須</span></label>
          <input id="email" class="w-full p-4 text-xs leading-none bg-blueGray-50 rounded outline-none border" type="email" placeholder="info@example.com" name="email" value="{{ old('email')}}">
        </div>
        <div class="mb-4">
          <label for="body" class="block text-left p-1 my-1 font-medium">お問い合わせ内容<span class="text-white text-xs bg-yellow-400 mx-2 py-1 px-2">必須</span></label>
          <textarea id="body" class="w-full h-24 p-4 text-xs leading-none resize-none bg-blueGray-50 rounded outline-none border" type="text" placeholder="ご自由にご記入ください" name="body">{{ old('body')}}</textarea>
        </div>
        <div class="text-center">
            <p>送信される際は、<a href="#" class="text-blue-600 hover:underline">個人情報保護方針</a>に同意したものとします。</p>
            <button class="mt-6 text-white font-semibold leading-none bg-blue-600 hover:bg-blue-700 rounded py-4 px-12" type="submit">送信</button>
        </div>
      </form>
    </div>
  </div>
</section>
@endsection