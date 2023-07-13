<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use function Nette\Utils\files;

class EventSeeder extends Seeder
{
    public function run()
    {
        $title_ar = ['تمرين لمدة 3 أيام التحدي في TFC', 'غزل حصري مع ساوي', 'نقدم 20٪ استرداد نقدي للعضو الجديد'];
        $title_en = ['WORKOUT 3 DAYS CHALLANGE IN TFC', 'EXCLUSIVE Spinning WITH Sawy', 'WE OFFER 20% CASHBACK FOR NEW MEMBER'];
        $description_ar = ['نحن نقدم تصميم عالي الجودة في vero eos et accusamus et iusto', 'نحن نقدم تصميم عالي الجودة في vero eos et accusamus et iusto', 'We provide high quality design at vero eos et accusamus et iusto'];
        $description_en = ['We provide high quality design at vero eos et accusamus et iusto', 'We provide high quality design at vero eos et accusamus et iusto', 'نحن نقدم تصميم عالي الجودة في vero eos et accusamus et iusto'];
        $date = ['2023-06-18', '2023-02-18'];

        for ($e = 0; $e < 3; $e++) {
            $event = Event::create([
                "ar" => [
                    "title" => $title_ar[$e],
                    "description" => $description_ar[$e]
                ],
                "en" => [
                    "title" => $title_en[$e],
                    "description" => $description_en[$e]
                ],
                'duration' => $e == 0 ? 'weekly' : 'date',
                'date' => $e != 0 ? $date[array_rand($date)] : null,
                'from' => '19:00',
                'to' => '23:00',
                'status' => 1
            ]);

        }
    }
}
