<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(LaratrustSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(SliderSeeder::class);
        $this->call(PageSeeder::class);
        $this->call(FeatureSeeder::class);
        $this->call(DaySeeder::class);
        $this->call(GymClassSeeder::class);
        $this->call(SettingSeeder::class);
    }
}
