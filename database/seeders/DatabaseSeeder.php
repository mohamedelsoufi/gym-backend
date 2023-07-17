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
        $this->call(BranchPointSeeder::class);
        $this->call(BranchSeeder::class);
        $this->call(DaySeeder::class);
        $this->call(GymClassSeeder::class);
        $this->call(ClassScheduleSeeder::class);
        $this->call(TeamSeader::class);
        $this->call(GallerySeeder::class);
        $this->call(PackageSeeder::class);
        $this->call(PartenerSeeder::class);
        $this->call(BlogSeeder::class);
        $this->call(EventSeeder::class);
//        $this->call(EventSubscriberSeeder::class);
        $this->call(CommentSeeder::class);
        $this->call(SettingSeeder::class);
    }
}
