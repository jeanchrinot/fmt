<?php

use Illuminate\Database\Seeder;
use App\Video;

class VideoSeeder extends Seeder
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

        		Video::create([
        			'title'=>'Video '.$img,
        			'video'=>'https://www.youtube.com/embed/wIOFD9R8y_Q'
        		])->categories()->attach($i);

        		$img++;
        	}
        }
    }
}
