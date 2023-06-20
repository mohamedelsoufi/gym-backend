<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run()
    {
        $setting = Setting::create([
            'ar' => [
                'website_title' => 'ترانسفورمر جيم',
            ],
            'en' => [
                'website_title' => 'Transformer Gym',
            ],
            'contact_email' => 'contact@app.com',
        ]);
        $setting->file()->create([
            'path' => 'seeder/logo.png',
            'type' => 'logo'
        ]);

        $setting->file()->create([
            'path' => 'seeder/logo.png',
            'type' => 'white_logo'
        ]);

        $setting->file()->create([
            'path' => 'seeder/favicon.ico',
            'type' => 'favicon'
        ]);

        $setting->file()->create([
            'path' => 'seeder/slider&footer.jpg',
            'type' => 'footer_img'
        ]);

        $setting->file()->create([
            'path' => 'seeder/breadcrumb.jpg',
            'type' => 'breadcrumb'
        ]);
    }
}
