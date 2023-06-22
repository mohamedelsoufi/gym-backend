<?php

namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PartenerSeeder extends Seeder
{
    public function run()
    {
        $images = ['partner1.png', 'partner2.png', 'partner3.png', 'partner4.png', 'partner5.png', 'partner6.png'];

        for ($p = 0; $p < 6; $p++) {
            $partner = Partner::create([
                'status' => 1
            ]);
            $partner->file()->create([
                'path' => 'seeder/' . $images[$p],
                'type' => 'image'
            ]);
        }
    }
}
