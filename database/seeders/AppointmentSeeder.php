<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Appointment;

class AppointmentSeeder extends Seeder
{
    public function run()
    {
        Appointment::create([
            'user_id' => 1, // 任意のユーザーID
            'desired_date' => '2025-01-10',
            'desired_time' => '10:00:00',
            'purpose' => 'キャリア相談',
            'comments' => '自己分析の方法を知りたいです。',
        ]);

        Appointment::create([
            'user_id' => 2, // 任意のユーザーID
            'desired_date' => '2025-01-15',
            'desired_time' => '14:00:00',
            'purpose' => '転職相談',
            'comments' => '業界の動向について教えてください。',
        ]);
    }
}
