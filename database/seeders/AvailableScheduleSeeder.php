<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AvailableSchedule;

class AvailableScheduleSeeder extends Seeder
{
    public function run()
    {
        // mentor_id: 1 (小田切 ゆりあ)
        AvailableSchedule::create([
            'mentor_id'       => 1,
            'available_date'  => '2025-05-10',
            'available_time'  => '10:00-11:00',
        ]);
        AvailableSchedule::create([
            'mentor_id'       => 1,
            'available_date'  => '2025-05-15',
            'available_time'  => '13:00-14:00',
        ]);

        // mentor_id: 2 (山田 雨)
        AvailableSchedule::create([
            'mentor_id'       => 2,
            'available_date'  => '2025-05-11',
            'available_time'  => '09:00-10:00',
        ]);
        AvailableSchedule::create([
            'mentor_id'       => 2,
            'available_date'  => '2025-05-17',
            'available_time'  => '14:00-15:00',
        ]);

        // mentor_id: 3 (塚橋 仁美)
        AvailableSchedule::create([
            'mentor_id'       => 3,
            'available_date'  => '2025-05-12',
            'available_time'  => '10:00-11:00',
        ]);
        AvailableSchedule::create([
            'mentor_id'       => 3,
            'available_date'  => '2025-05-20',
            'available_time'  => '15:00-16:00',
        ]);

        // mentor_id: 4 (佐藤 あかね)
        AvailableSchedule::create([
            'mentor_id'       => 4,
            'available_date'  => '2025-05-13',
            'available_time'  => '10:00-11:00',
        ]);
        AvailableSchedule::create([
            'mentor_id'       => 4,
            'available_date'  => '2025-05-26',
            'available_time'  => '14:00-15:00',
        ]);

        // mentor_id: 5 (鈴木 美和)
        AvailableSchedule::create([
            'mentor_id'       => 5,
            'available_date'  => '2025-05-14',
            'available_time'  => '09:00-10:00',
        ]);
        AvailableSchedule::create([
            'mentor_id'       => 5,
            'available_date'  => '2025-05-22',
            'available_time'  => '13:00-14:00',
        ]);

        // mentor_id: 6 (高橋 明朗)
        AvailableSchedule::create([
            'mentor_id'       => 6,
            'available_date'  => '2025-05-15',
            'available_time'  => '10:00-11:00',
        ]);
        AvailableSchedule::create([
            'mentor_id'       => 6,
            'available_date'  => '2025-05-25',
            'available_time'  => '16:00-17:00',
        ]);
    }
}
