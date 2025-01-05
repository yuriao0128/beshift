<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sampleImagePath = 'user_images/sample.jpg';

        // ダミーユーザーを作成
        User::create([
            'name' => 'Test User',
            'email' => 'test2@example.com',
            'role' => 'admin', 
            'password' => Hash::make('password'), // パスワードは "password"
            'image' => $sampleImagePath,
            
        ]);

        User::create([
            'name' => 'John Doe',
            'email' => 'john1@example.com',
            'role' => 'user', 
            'password' => Hash::make('password'), // パスワードは "password"
            'image' => $sampleImagePath,
        ]);

        User::create([
            'name' => 'Jane Smith',
            'email' => 'jane1@example.com',
            'role' => 'user', 
            'password' => Hash::make('password'),
            'image' => $sampleImagePath, // パスワードは "password"
        ]);
    }
}
