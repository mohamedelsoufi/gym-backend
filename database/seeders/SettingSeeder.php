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
                'address' => 'شارع 104 المعادي - القاهرة - مصر',
                'copyrights' => 'حقوق النشر 2023 © TFC. <a target="_blank" href="https://marwan.tech/ar/service-request"> تصميم وبرمجة مجموعة مروان لتقنية المعلومات </a>',
            ],
            'en' => [
                'website_title' => 'Transformer Gym',
                'address' => 'Street 104 Maadi - Cairo - Egypt',
                'copyrights' => 'Copyright 2023 © TFC. <a target="_blank" href="https://marwan.tech/ar/service-request">Designed and programmed by Marwan Group for Information Technology</a>',
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

        // contacts start
        $setting->contact()->create([
            'contact'=>'inquires@transformersgym.com',
            'type'=>'email',
            'icon'=> 'far fa-envelope',
            'status' => 1
        ]);

        $setting->contact()->create([
            'contact'=>'info@transformersgym.com',
            'type'=>'email',
            'icon'=> 'far fa-envelope',
            'status' => 1
        ]);

        $setting->contact()->create([
            'contact'=>'01021219000',
            'type'=>'mobile',
            'icon'=> 'fas fa-mobile-alt',
            'status' => 1
        ]);

        $setting->contact()->create([
            'contact'=>'https://www.facebook.com/Transformersfitnesscenter',
            'type'=>'social',
            'icon'=> 'fab fa-facebook-f',
            'status' => 1
        ]);

        $setting->contact()->create([
            'contact'=>'https://www.instagram.com/transformersfitnesscommunity/?hl=en',
            'type'=>'social',
            'icon'=> 'fab fa-instagram',
            'status' => 1
        ]);
        // contacts end
    }
}
