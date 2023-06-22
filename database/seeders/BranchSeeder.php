<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    public function run()
    {
        $title_ar = ['نايل فيو', 'معادي', 'زايد'];
        $title_en = ['Nile View', 'Maadi', 'Zayed'];
        $phone = ['01010005368', '01021219000', '01000601590'];
        $images = ['branch1.jpg', 'branch2.jpg', 'branch3.jpg'];

        for ($b = 0; $b < 3; $b++) {
            $branch = Branch::create([
                'ar' => [
                    'title' => $title_ar[$b],
                ],
                'en' => [
                    'title' => $title_en[$b],
                ],
                'phone' => $phone[$b],
                'facebook' => 'https://www.facebook.com/Transformersfitnesscenter',
                'instagram' => 'https://www.instagram.com/transformersfitnesscommunity/?hl=en',
                'status' => 1
            ]);
            $branch->file()->create([
                'path' => 'seeder/' . $images[$b],
                'type' => 'image'
            ]);
        }
    }
}
