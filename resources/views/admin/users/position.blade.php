@extends('layouts.admin')

@section('content')
<section class="py-8">
    <div class="container px-4 mx-auto">
        <div class="py-4 bg-white rounded">
            <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
                @csrf   
                @method('PUT') 
                <div class="flex px-6 pb-4 border-b">
                    <h3 class="text-xl font-bold">プロフィール編集</h3>
                    <div class="ml-auto">
                        <button type="submit" class="py-2 px-3 text-xs text-white font-semibold bg-indigo-500 rounded-md">更新</button>
                    </div>
                </div>

                <div class="pt-4 px-6">
                    <!-- エラーメッセージ -->
                    @if($errors->any())
                    <div class="mb-8 py-4 px-6 border border-red-300 bg-red-50 rounded">
                        <ul>
                            @foreach($errors->all() as $error)
                            <li class="text-red-400">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <!-- エラーメッセージ終わり -->

                    <!-- 名前 -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-2" for="name">名前</label>
                        <input id="name" class="block w-full px-4 py-3 mb-2 text-sm bg-white border rounded" type="text" name="name" value="{{ old('name', $user->name) }}" required>
                    </div>

                    <!-- 経験スキル -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-2" for="experience_skills">経験スキル</label>
                        <textarea id="experience_skills" class="block w-full px-4 py-3 mb-2 text-sm bg-white border rounded" name="experience_skills" rows="5" required>{{ old('experience_skills', $user->experience_skills) }}</textarea>
                    </div>

                    <!-- 希望の働き方 -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-2" for="desired_work_style">希望の働き方</label>
                        <input id="desired_work_style" class="block w-full px-4 py-3 mb-2 text-sm bg-white border rounded" type="text" name="desired_work_style" value="{{ old('desired_work_style', $user->desired_work_style) }}" required>
                    </div>

                    <!-- 経験職種（プルダウン） -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-2" for="position_id">経験職種</label>
                        <div class="flex">
                            <select id="position_id" class="appearance-none block pl-4 pr-8 py-3 mb-2 text-sm bg-white border rounded" name="position_id" required>
                                <option value="">職種を選択してください</option>
                                @foreach($positions as $position)
                                <option value="{{ $position->id }}" @if($position->id == old('position_id', $user->position_id)) selected @endif>{{ $position->position }}</option>
                                @endforeach
                            </select>
                            <div class="pointer-events-none transform -translate-x-full flex items-center px-2 text-gray-500">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- 履歴書（ファイルアップロード） -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-2" for="resume">履歴書（PDFまたはWord形式）</label>
                        <div class="flex items-center">
                            @if($user->resume)
                                <a href="{{ asset('storage/' . $user->resume) }}" target="_blank" class="text-indigo-500 underline mr-4">現在の履歴書を閲覧</a>
                            @endif
                            <input id="resume" class="block w-full px-4 py-3 mb-2" type="file" accept='application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document' name="resume">
                        </div>
                    </div>

                    <!-- 自己紹介 -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-2" for="introduction">自己紹介</label>
                        <textarea id="introduction" class="block w-full px-4 py-3 mb-2 text-sm bg-white border rounded" name="introduction" rows="5">{{ old('introduction', $user->introduction) }}</textarea>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<script>
    // 履歴書ファイルのプレビュー機能は不要なため削除
    // もし画像アップロードが必要な場合は、以下のようなコードを追加できます。
    /*
    document.getElementById('resume').addEventListener('change', e => {
        const previewImageNode = document.getElementById('previewImage')
        const fileReader = new FileReader()
        fileReader.onload = () => previewImageNode.src = fileReader.result
        if (e.target.files.length > 0) {
            fileReader.readAsDataURL(e.target.files[0])
        } else {
            previewImageNode.src = previewImageNode.dataset.noimage
        }
    })
    */
</script>
@endsection
