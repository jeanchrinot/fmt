<?php

use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i=1; $i <= 4; $i++) { 


        	 DB::table('sliders')->insert([
            'name' => 'Slider'.$i,
            'details' => 'This is just a test description for slider '.$i,
            'image' => $i.'.jpg',
            'featured'=>true,
        	]);

        }
    }
}
