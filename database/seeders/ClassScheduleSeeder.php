<?php

namespace Database\Seeders;

use App\Models\ClassSchedule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassScheduleSeeder extends Seeder
{
    public function run()
    {
        $cover = ['coverSchedule1.jpg', 'coverSchedule2.jpg', 'coverSchedule3.jpg'];
        $image = ['schedule1.jpg', 'schedule2.jpg', 'schedule3.jpg'];

        for ($s = 0; $s < 3; $s++) {
            $schedule = ClassSchedule::create([
                'status' => 1
            ]);
            $schedule->file()->create([
                'path' => 'seeder/'.$cover[$s],
                'type' => 'cover'
            ]);
            $schedule->file()->create([
                'path' => 'seeder/'.$image[$s],
                'type' => 'image'
            ]);
        }
    }
}
