@extends('layouts.admin')

@section('content')
<section class="py-8">
    <div class="container px-4 mx-auto">
                <!-- タブメニュー -->
                <div class="py-4 px-6">
            <div class="flex space-x-4">
                <a href="{{ route('admin.users.create') }}" class="py-2 px-4 text-sm font-medium {{ request()->routeIs('admin.users.create') ? 'bg-indigo-500 text-white' : 'bg-gray-300 text-gray-700' }} rounded-md">
                    管理者登録
                </a>
                <a href="{{ route('admin.admin.list') }}" class="py-2 px-4 text-sm font-medium {{ request()->routeIs('admin.list') ? 'bg-indigo-500 text-white' : 'bg-gray-300 text-gray-700' }} rounded-md">
                    登録済み管理者
                </a>
            </div>
        </div>
        <div class="py-4 bg-white rounded">
        <form action="{{ route('admin.update', $admin->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

                <div class="flex px-6 pb-4 border-b">
                    <h3 class="text-xl font-bold">管理者編集</h3>
                    <div class="ml-auto">
                        <button type="submit" class="py-2 px-3 text-xs text-white font-semibold bg-indigo-500 rounded-md">更新</button>
                    </div>
                </div>

                <div class="pt-4 px-6">
                    @if($errors->any())
                        <div class="mb-8 py-4 px-6 border border-red-300 bg-red-50 rounded">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li class="text-red-400">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-2" for="name">名前</label>
                        <input id="name" class="block w-full px-4 py-3 mb-2 text-sm bg-white border rounded" type="text" name="name" value="{{ old('name', $admin->name) }}">
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-2" for="email">メールアドレス</label>
                        <input id="email" class="block w-full px-4 py-3 mb-2 text-sm bg-white border rounded" type="email" name="email" value="{{ old('email', $admin->email) }}">
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-2" for="password">パスワード</label>
                        <input id="password" class="block w-full px-4 py-3 mb-2 text-sm bg-white border rounded" type="password" name="password">
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-2" for="password_confirmation">パスワード(確認)</label>
                        <input id="password_confirmation" class="block w-full px-4 py-3 mb-2 text-sm bg-white border rounded" type="password" name="password_confirmation">
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-2" for="image">画像</label>
                        <div class="flex items-end">
                            <img id="previewImage" src="{{ $admin->image ? asset('storage/'.$admin->image) : '/images/admin/noimage.jpg' }}" data-noimage="/images/admin/noimage.jpg" alt="" class="rounded-full shadow-md w-32">
                            <input id="image" class="block w-full px-4 py-3 mb-2" type="file" accept='image/*' name="image">
                        </div>
                    </div>
                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-2" for="introduction">自己紹介文</label>
                        <textarea id="introduction" class="block w-full px-4 py-3 mb-2 text-sm bg-white border rounded" name="introduction" rows="2">{{ old('introduction', $admin->introduction) }}</textarea>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<script>
    // 画像プレビュー
    document.getElementById('image').addEventListener('change', e => {
        const previewImageNode = document.getElementById('previewImage')
        const fileReader = new FileReader()
        fileReader.onload = () => previewImageNode.src = fileReader.result
        if (e.target.files.length > 0) {
            fileReader.readAsDataURL(e.target.files[0])
        } else {
            previewImageNode.src = previewImageNode.dataset.noimage
        }
    })
</script>
@endsection
