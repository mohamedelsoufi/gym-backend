<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\GymClass;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GymClassSeeder extends Seeder
{
    public function run()
    {
        $images = ['class1.jpg', 'class2.jpg', 'class3.jpg','class4.jpg','class5.jpg','class6.jpg'];
        $title_ar = ['فصول الغزل', 'فصول MMA', 'فصول الكيك بوكسينج','يوجا','يوجا TRX','تمارين القلب والتنغيم'];
        $title_en = ['Spinning CLASSES', 'MMA CLASSES', 'Kickboxing CLASSES','YOGA','TRX YOGA','Cardio and Toning'];
        $time = ['19:00', '21:00', '18:00','19:00', '21:00', '18:00'];
        $c1 = [3, 2, 5, 7];
        $branches = [1,2];


        for ($g = 0; $g < 6; $g++) {
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
            $class->branches()->attach($branches);
        }
    }
}
