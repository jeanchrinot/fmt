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
         	NewsCategorySeeder::class,
         	NewsSeeder::class,
            UserSeeder::class,
            StudentwordSeeder::class,
            PositionSeeder::class,
            PositionUserSeeder::class,
            GallerycategorySeeder::class,
            GallerySeeder::class
         ]);

    }
}
