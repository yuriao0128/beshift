<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mentor;

class MentorsTableSeeder extends Seeder
{
    public function run()
    {
        // ダミーデータを作成
        Mentor::create([
            'name' => '佐藤 太郎',
            'expertise' => 'キャリアコンサルタント',
            'bio' => 'キャリア相談歴10年以上の経験豊富なアドバイザーです。',
            'image' => 'mentor_images/default1.jpg',
        ]);

        Mentor::create([
            'name' => '山田 花子',
            'expertise' => 'IT業界キャリア',
            'bio' => '3歳と4歳の娘を育てながらフリーランスで働いています',
            'image' => 'mentor_images/default2.jpg',
        ]);

        Mentor::create([
            'name' => '田中 一郎',
            'expertise' => 'エンジニアリング',
            'bio' => 'エンジニアとしてのキャリアパスを明確にするお手伝いをします。',
            'image' => 'mentor_images/default3.jpg',
        ]);
    }
}

