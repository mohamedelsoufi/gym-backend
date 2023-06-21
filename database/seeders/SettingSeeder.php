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
            'map'=>'<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3456.3974791897244!2d31.246574174502744!3d29.968004922190243!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14584792d2935d1b%3A0x72ecfc4c9725fe41!2sTransformers%20fitness%20club!5e0!3m2!1sen!2seg!4v1685801194891!5m2!1sen!2seg" width="1100" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>'

        ]);
        $setting->file()->create([
            'path' => 'seeder/logo.png',
            'type' => 'logo'
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
