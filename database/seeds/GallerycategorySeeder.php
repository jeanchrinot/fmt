<?php

use Illuminate\Database\Seeder;
use App\Gallerycategory;

class GallerycategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 10; $i++) { 
        	Gallerycategory::create([
        		'name'=>'categorie '.$i
        	]);
        }
    }
}
