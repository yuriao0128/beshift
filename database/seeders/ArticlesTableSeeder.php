<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('articles')->insert([
            [
                'title' => '30代から始めるキャリア再構築',
                'body' => '子育てとキャリアを両立するための考え方を紹介します。',
                'image_path' => 'images/index/blog.webp',  // 実在しない場合は公開フォルダにサンプル画像を置いてください
                'is_new' => true,
                'category' => 'キャリア',
                'published_at' => '2025-01-01 10:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'リモートワークで活かす働き方改革',
                'body' => 'リモートワークとオフィスワークのハイブリッド運用事例を紹介。',
                'image_path' => 'images/index/blog.webp',
                'is_new' => true,
                'category' => 'ワークスタイル',
                'published_at' => '2025-01-05 09:30:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => '英語スキルを活かしてキャリアアップ',
                'body' => '英語を使った仕事を目指す人向けに学習方法やおすすめ資格を解説します。',
                'image_path' => 'images/index/blog.webp',
                'is_new' => false,
                'category' => 'スキルアップ',
                'published_at' => '2025-01-10 14:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'テクノロジー業界のトレンドまとめ',
                'body' => 'AI、IoT、ブロックチェーンなど注目技術の動向をまとめました。',
                'image_path' => 'images/index/blog.webp',
                'is_new' => false,
                'category' => 'テクノロジー',
                'published_at' => '2025-01-12 13:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => '転職成功事例インタビュー特集',
                'body' => '実際に転職に成功した方々へのインタビューをまとめました。',
                'image_path' => 'images/index/blog.webp',
                'is_new' => true,
                'category' => 'キャリア',
                'published_at' => '2025-01-15 16:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
