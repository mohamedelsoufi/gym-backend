<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamSeader extends Seeder
{
    public function run()
    {
        $name_ar = ['محمد النجار', 'مانو', 'فاطمة', 'عبدالرحمن', 'هدير', 'حسن'];
        $name_en = ['Mohamed El Nagar', 'Mano', 'Fatma', 'Abd El Rahman', 'Hadeer', 'Hassan'];
        $job_title_ar = ['مدرب شخصي', 'مدرب شخصي', 'مدرب شخصي', 'مدرب شخصي', 'مدرب شخصي', 'مدرب شخصي'];
        $job_title_en = ['Personal Trainer', 'Personal Trainer', 'Personal Trainer', 'Personal Trainer', 'Personal Trainer', 'Personal Trainer'];
        $images = ['trainer1.jpg', 'trainer2.jpg', 'trainer3.jpg', 'trainer4.jpg', 'trainer5.jpg', 'Hassan.jpg'];

        for ($t = 0; $t < 6; $t++) {
            $team = Team::create([
                'ar' => [
                    'name' => $name_ar[$t],
                    'job_title' => $job_title_ar[$t],
                ],
                'en' => [
                    'name' => $name_en[$t],
                    'job_title' => $job_title_en[$t],
                ],
                'facebook' => 'https://facebook.com/'.$t,
                'instagram' => 'https://www.instagram.com/'.$t,
                'status' => 1
            ]);
            $team->file()->create([
                'path' => 'seeder/' . $images[$t],
                'type' => 'image'
            ]);
        }
    }
}
