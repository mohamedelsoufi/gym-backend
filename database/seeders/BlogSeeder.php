<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    public function run()
    {
        for ($b=0;$b<3;$b++){
            $blog = Blog::create([
                'ar' => [
                  'title' => 'شخص يتحدث مع بعضهم البعض',
                    'description' => '<p> Lorem ipsum dolor sit amet، consectetur adipisicing elit، sed do eiusmod tempor incidunt ut labore et dolore magna aliqua. كل ما في الأمر هو الحد الأدنى من التمرين ، ممارسة العمل على nostrud. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. باستثناء حالات معينة ، يجب أن يكون الشخص مسؤولاً عن ممارسة الجنس. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. باستثناء حالات معينة ، يجب أن يكون الشخص غير محترف ، يجب أن يكون السبب في ذلك. </ p>

<p> Lorem ipsum dolor sit amet، consectetur adipisicing elit، sed do eiusmod tempor incidunt ut labore et dolore magna aliqua. كل ما في الأمر هو الحد الأدنى من التمرين ، ممارسة العمل على nostrud. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. باستثناء حالات معينة ، يجب أن يكون الشخص غير محترف ، يجب أن يكون السبب في ذلك. </ p>

<blockquote> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. باستثناء حالات معينة ، يجب أن يكون الشخص مسؤولاً عن ممارسة الجنس.
<p> كارول مونغول </ p>
</blockquote>

<div> & nbsp؛ </div>

<p> <strong> Ut enim ad minim veniam </strong> </p>

<p> Lorem ipsum dolor sit amet، consectetur adipisicing elit، sed do eiusmod tempor incidunt ut labore et dolore magna aliqua. كل ما في الأمر هو الحد الأدنى من التمرين ، ممارسة العمل على nostrud. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. باستثناء حالات معينة ، يجب أن يكون الشخص مسؤولاً عن ممارسة الجنس. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. باستثناء حالات معينة ، يجب أن يكون الشخص غير محترف ، يجب أن يكون السبب في ذلك. </ p>

<p> Lorem ipsum dolor sit amet، consectetur adipisicing elit، sed do eiusmod tempor incidunt ut labore et dolore magna aliqua. كل ما في الأمر هو الحد الأدنى من التمرين ، ممارسة العمل على nostrud. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. باستثناء حالات معينة ، يجب أن يكون الشخص غير محترف ، يجب أن يكون السبب في ذلك. </ p>'
                ],
                'en' => [
                    'title' => 'Person talking to each other',
                    'description' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

<blockquote>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
<p>Carol Mongol</p>
</blockquote>

<div>&nbsp;</div>

<p><strong>Ut enim ad minim veniam</strong></p>

<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>'
                ],
                'status' => 1
            ]);
            $blog->file()->create([
                'path' => 'seeder/dummy-img-900x500.jpg',
                'type' => 'image'
            ]);
        }
    }
}
