<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    public function run()
    {
        $images = ['package1.jpg', 'package2.jpg', 'page1.jpg'];
        $title_ar = ['إيرلي بيرد', 'عائلي', 'الباقة السنوية'];
        $title_en = ['EarlyBird', 'Family', 'Annual Package'];
        $description_ar = ['<ul>
	<li>من 6 صباحا حتى 2 مساءا</li>
	<li>الوصول إلى صالة الألعاب الرياضية ومعداتها</li>
	<li>كل يوم</li>
	<li>&nbsp;جاكوزي - ساونا - بخار</li>
	<li>&nbsp;أدلة النظام الغذائي</li>
</ul>',
            '<ul>
	<li>365 يوما</li>
	<li>إحضار فرد من العائلة</li>
	<li>3 جلسات توجيهية</li>
	<li>جاكوزي - ساونا - بخار</li>
	<li>أدلة النظام الغذائي</li>
</ul>', '<ul>
	<li>365 يوما</li>
	<li>الوصول إلى صالة الألعاب الرياضية ومعداتها</li>
	<li>3 جلسات تغذية.</li>
	<li>5 اختبار داخلي</li>
	<li>أدلة النظام الغذائي</li>
</ul>'
        ];
        $description_en = ['<div>
<ul>
	<li>From 6 AM Till 2 PM&nbsp;</li>
	<li>GYM Access &amp; Equipment</li>
	<li>Every Day&nbsp;</li>
	<li>&nbsp;Jacuzzi &ndash; Sauna &ndash; Steam</li>
	<li>Diet Guides</li>
</ul>
</div>',
            '<ul>
	<li>365 Days</li>
	<li>Bring Family Member</li>
	<li>3 Orientation Sessions</li>
	<li>Jacuzzi &ndash; Sauna &ndash; Steam</li>
	<li>Diet Guides</li>
</ul>',
            '<ul>
	<li>365 Days</li>
	<li>GYM Access &amp; Equipment</li>
	<li>3 Nutrition Sessions.</li>
	<li>5 Inbody test</li>
	<li>Diet Guides</li>
</ul>'];
        for ($p = 0; $p < 3; $p++) {
            $package = Package::create([
                'ar' => [
                    'title' => $title_ar[$p],
                    'description' => $description_ar[$p],
                ],
                'en' => [
                    'title' => $title_en[$p],
                    'description' => $description_en[$p],
                ],
                'status' => 1
            ]);
            $package->file()->create([
                'path' => 'seeder/' . $images[$p],
                'type' => 'image'
            ]);
        }
    }
}
