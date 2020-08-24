<?php

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
         $this->call([
         	AboutSeeder::class,
         	SliderSeeder::class,
         	ActucategorySeeder::class,
         	ActuSeeder::class,
            UserSeeder::class,
            StudentwordSeeder::class,
            PositionSeeder::class,
            PositionUserSeeder::class,
            GallerycategorySeeder::class,
            GallerySeeder::class,
            ContactSeeder::class,
            ActivitySeeder::class,
            VideoSeeder::class
         ]);

    }
}
