<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    public function run()
    {
        $blogs = Blog::get();
        foreach ($blogs as $blog){
            for ($c=0;$c <4;$c++){
                $blog->comments()->create([
                    'name' => 'Susi Doel',
                    'email' => 'guest@app.com',
                    'website' => 'https://guest.com',
                    'comment' => 'Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus. '
                ]);
            }
        }

    }
}
