<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mentor;

class MentorSeeder extends Seeder
{
    public function run()
    {
        Mentor::create([
            'name'      => '山田 仁美',
            'expertise' => 'キャリアカウンセリング, コーチング',
            'bio'       => '15年以上のキャリアカウンセリングの実績を持ち、多くの転職支援やキャリアアップのサポートを行っています。',
            'image'     => 'mentors/yanada_hitomi.jpg',
        ]);

        Mentor::create([
            'name'      => '佐藤 明',
            'expertise' => '人材エージェント, 採用コンサルティング',
            'bio'       => '大手人材エージェントでの採用業務経験を活かし、企業と求職者のマッチングを得意としています。',
            'image'     => 'mentors/sato_akira.jpg',
        ]);

        Mentor::create([
            'name'      => '鈴木 美和',
            'expertise' => 'ビジネスケアラー支援, ワークライフバランス',
            'bio'       => '介護や家族支援の経験を活かし、ビジネスケアラーとして多くの企業の働き方改革を支援してきました。',
            'image'     => 'mentors/suzuki_miwa.jpg',
        ]);

        Mentor::create([
            'name'      => '高橋 隆',
            'expertise' => 'キャリアコンサルタント, リーダーシップ開発',
            'bio'       => '企業内キャリア開発のプロフェッショナルとして、管理職向けのリーダーシップ開発やキャリアパス構築の支援を行っています。',
            'image'     => 'mentors/takahashi_raku.jpg',
        ]);
    }
}
