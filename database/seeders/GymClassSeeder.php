<?php

namespace Database\Seeders;

use App\Models\GymClass;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GymClassSeeder extends Seeder
{
    public function run()
    {
        $images = ['class1.jpg', 'class2.jpg', 'class3.jpg'];
        $title_ar = ['فصول الغزل', 'فصول MMA', 'فصول الكيك بوكسينج'];
        $title_en = ['Spinning CLASSES', 'MMA CLASSES', 'Kickboxing CLASSES'];
        $time = ['19:00', '21:00', '18:00'];
        $c1 = [3, 2, 5, 7];

        for ($g = 0; $g < 3; $g++) {
            $class = GymClass::create([
                'ar' => [
                    'title' => $title_ar[$g],
                ],
                'en' => [
                    'title' => $title_en[$g],
                ],
                'time' => $time[$g],
                'status' => 1
            ]);

            $class->file()->create([
                'path' => 'seeder/' . $images[$g],
                'type' => 'image'
            ]);

            $class->days()->attach($c1);
        }
    }
}
