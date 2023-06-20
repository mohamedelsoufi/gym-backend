<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    public function run()
    {
        $images = ['slider&footer.jpg', 'slider2.jpg', 'slider3.jpg'];
        $title_ar = ['مرحبا بكم في TFC', 'ابدأ صحتك', 'لياقة رهيبة'];
        $title_en = ['WELCOME TO TFC', 'START YOUR HEALTH', 'AWESOME FITNESS'];
        $sub_title_ar = ['تجاوز حدودك', 'احصل على لياقتك في أقل من أسبوعين', 'احصل على لياقتك في أقل من أسبوعين'];
        $sub_title_en = ['GO BEYOND YOUR LIMITS', 'GET FIT IN LESS 2 WEEKS', 'GET FIT IN LESS 2 WEEKS'];
        $description_ar = ['مرحبًا بكم في صالة الألعاب الرياضية لدينا! نحن ملتزمون بمساعدتك على تحقيق أهداف لياقتك في بيئة ترحيبية وداعمة ..', 'نحن نقدم الأعمال التجارية العالية ، دولور الجلوس أميت ، كونسيكتيتور أديبيسينج إيليت دولور سيت أميت كونكتيتوير أديبيسينج إيليت ، سيد ديام نيبه يويسمود.', 'نحن نقدم الأعمال التجارية العالية ، دولور الجلوس أميت ، كونسيكتيتور أديبيسينج إيليت دولور سيت أميت كونكتيتوير أديبيسينج إيليت ، سيد ديام نيبه يويسمود.'];
        $description_en = ['Welcome to our gym! We are dedicated to helping you achieve your fitness goals in a welcoming and supportive environment..', 'We provide high businesses dolor sit amet, consectetur adipiscing elit dolor sit amet consectetuer adipiscing elit, sed diam nonummy nibh euismod.', 'We provide high businesses dolor sit amet, consectetur adipiscing elit dolor sit amet consectetuer adipiscing elit, sed diam nonummy nibh euismod.'];

        for ($s = 0; $s < 3; $s++) {
            $slider = Slider::create([
                'ar' => [
                    'title' => $title_ar[$s],
                    'sub_title' => $sub_title_ar[$s],
                    'description' => $description_ar[$s],
                ],
                'en' => [
                    'title' => $title_en[$s],
                    'sub_title' => $sub_title_en[$s],
                    'description' => $description_en[$s],
                ],
                'status' => 1
            ]);
            $slider->file()->create([
                'path' => 'seeder/' . $images[$s],
                'type' => 'image'
            ]);
        }
    }
}
