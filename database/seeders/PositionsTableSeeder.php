<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Position;

class PositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $positions = [
            '営業',
            'エンジニア',
            'デザイナー',
            'マーケティング',
            '人事',
            'カスタマーサポート',
            'プロジェクトマネージャー',
            'データアナリスト',
            'QAエンジニア',
            'コンテンツライター',
            'フロントエンド開発者',
            'バックエンド開発者',
            'モバイルアプリ開発者',
            'システムアドミニストレーター',
            'ネットワークエンジニア',
            'UI/UXデザイナー',
            'ビジネスアナリスト',
            'ソフトウェアテスター',
            'データサイエンティスト',
            'クラウドエンジニア',
        ];

        foreach ($positions as $position) {
            Position::create(['position' => $position]);
        }
    }
}
