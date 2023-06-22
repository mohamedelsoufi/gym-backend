<?php

namespace Database\Seeders;

use App\Models\BranchPoint;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BranchPointSeeder extends Seeder
{

    public function run()
    {
        $description_ar = ['تقدم منشآتنا أحدث المعدات لتدريب القلب والأوعية الدموية والقوة ، بالإضافة إلى مجموعة واسعة من فصول اللياقة البدنية الجماعية بقيادة مدربين على دراية وتحفيز. يتوفر مدربونا الشخصيون المعتمدون لتقديم التوجيه والدعم الفردي لمساعدتك في الوصول إلى أهداف اللياقة البدنية الفردية الخاصة بك.',
            'بالإضافة إلى عروض اللياقة لدينا ، نقدم لك أيضًا مجموعة من خدمات السبا وخطط التغذية للحصول على تجربة لياقة وعافية كاملة.',
            'قم بالمغامرة في تجربة لا مثيل لها من العمر ، حيث يوفر لك مركز اللياقة البدنية والعافية لدينا مرافق لا حصر لها لتوفر لك أقصى درجات الرضا والهدوء .. تعال وانضم إلينا واستمتع بمشروب في منطقة الاسترخاء لدينا المطلة على نهر النيل الخلاب واستمتع بسرعة وبرودة. تمرن أو استرخِ ببساطة مع جلسة مساج تبعث على الاسترخاء.'];
        $description_en = ['Our facility offers state-of-the-art equipment for cardiovascular and strength training, as well as a wide range of group fitness classes led by knowledgeable and motivating instructors. Our certified personal trainers are available to provide one-on-one guidance and support to help you reach your individual fitness goals.',
            'In addition to our fitness offerings, we also provide you with a range of spa services and nutrition plans for a full fitness and wellness experience.',
            'Venture on an extravagant experience of a lifetime, our fitness and wellness center offers you countless facilities to offer you utmost satisfaction and tranquility.. Come join us and enjoy a drink in our relaxation area looking across the scenic River Nile and enjoy a quick, chilling workout or simply unwind with a relaxing massage session.'];

        for ($d = 0; $d < 3; $d++) {
            BranchPoint::create([
                'ar' => [
                    'description' => $description_ar[$d]
                ],
                'en' => [
                    'description' => $description_en[$d]
                ],
                'status' => 1
            ]);
        }
    }
}
