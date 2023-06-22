<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    public function run()
    {
        $images = ['gallery1.jpg', 'gallery2.jpg', 'gallery3.jpg', 'gallery4.jpg', 'gallery5.jpg', 'gallery6.jpg'];

        for ($g = 0; $g < 6; $g++) {
            $gallery = Gallery::create([
                'status' => 1
            ]);
            $gallery->file()->create([
                'path' => 'seeder/' . $images[$g],
                'type' => 'image'
            ]);
        }
    }
}
