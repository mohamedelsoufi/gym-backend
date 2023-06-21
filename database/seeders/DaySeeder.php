<?php

namespace Database\Seeders;

use App\Models\Day;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DaySeeder extends Seeder
{
    public function run()
    {
        $day_ar = ['السبت', 'الأحد', 'الأثنين', 'الثلاثاء', 'الأربعاء', 'الخميس', 'الجمعة'];
        $day_en = ['Sat', 'Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri'];

        for ($d = 0; $d < 7; $d++) {
            Day::create([
                'ar' => [
                    'day' => $day_ar[$d]
                ],
                'en' => [
                    'day' => $day_en[$d]
                ],
                'status' => 1
            ]);
        }
    }
}
