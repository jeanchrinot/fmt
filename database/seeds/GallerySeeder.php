<?php

use Illuminate\Database\Seeder;
use App\Gallery;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$img = 1;
        for ($i=1; $i < 5 ; $i++) { 
        	for ($j=1; $j < 5; $j++) { 

        		Gallery::create([
        			'title'=>'Galerie '.$img,
        			'image'=>$img.'.jpg'
        		])->categories()->attach($i);

        		$img++;
        	}
        }
    }
}
