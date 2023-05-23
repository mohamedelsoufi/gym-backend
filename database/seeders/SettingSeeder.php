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
                'website_title' => 'لوحة التحكم',
            ],
            'en' => [
                'website_title' => 'Dashboard',
            ],
            'contact_email' => 'mohamed@app.com',
            'newsletter_email' => 'mohamed@app.com',
        ]);
        $setting->file()->create([
            'path' => 'favicon.ico',
            'type' => 'logo'
        ]);

        $setting->file()->create([
            'path' => 'favicon.ico',
            'type' => 'white_logo'
        ]);

        $setting->file()->create([
            'path' => 'favicon.ico',
            'type' => 'favicon'
        ]);

        $setting->file()->create([
            'path' => 'favicon.ico',
            'type' => 'contact_img'
        ]);

        $setting->file()->create([
            'path' => 'favicon.ico',
            'type' => 'footer_img'
        ]);

        $setting->file()->create([
            'path' => 'favicon.ico',
            'type' => 'breadcrumb'
        ]);
    }
}
