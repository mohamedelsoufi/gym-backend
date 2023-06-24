<?php

namespace Database\Seeders;

use App\Models\Event;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSubscriberSeeder extends Seeder
{
    public function run()
    {
        $events = Event::get();
        $factory = Factory::create();

        foreach ($events as $event){
            for ($s=0;$s<4;$s++){
                $event->subscribers()->create([
                    'name' =>$factory->name(),
                    'email' => $factory->email(),
                    'phone' => $factory->phoneNumber()
                ]);
            }
        }
    }
}
