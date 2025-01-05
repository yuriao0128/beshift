@extends('layouts.admin')

@section('content')
<section class="py-8">
    <div class="container px-4 mx-auto">
        <div class="py-4 bg-white rounded">
            <div class="px-6 pb-4 border-b">
                <h3 class="text-xl font-bold">お問い合わせ内容</h3>
            </div>

            <div class="pt-4 px-6">
                <div class="mb-6">
                    <label class="block text-sm font-medium mb-2" for="name">お名前</label>
                    <input id="name" class="block w-96 max-w-full px-4 py-3 mb-2 text-sm text-gray-500 border rounded" type="text" disabled value="山田太郎">
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium mb-2" for="name_kana">お名前（フリガナ）</label>
                    <input id="name_kana" class="block w-96 max-w-full px-4 py-3 mb-2 text-sm text-gray-500 border rounded" type="text" disabled value="ヤマダタロウ">
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium mb-2" for="phone">電話番号</label>
                    <input id="phone" class="block w-96 max-w-full px-4 py-3 mb-2 text-sm text-gray-500 border rounded" type="text" disabled value="0x0-1234-5678">
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium mb-2" for="email">メールアドレス</label>
                    <input id="email" class="block w-96 max-w-full px-4 py-3 mb-2 text-sm text-gray-500 border rounded" type="email" disabled value="user@wxample.com">
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium mb-2" for="body">本文</label>
                    <textarea id="body" class="block w-full px-4 py-3 mb-2 text-sm text-gray-500 border rounded" name="field-name" rows="5" disabled>はじめまして
御社のLaravelを使ったウェブサイト制作について検討しております
特に導入までの流れ、ランニングコスト、サポート内容について詳しく知りたいので
資料などがございましたらご提供いただけますでしょうか</textarea>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection