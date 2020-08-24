<?php

use Illuminate\Database\Seeder;
use App\Actu;

class ActuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1;$i<=10;$i++){
        	Actu::create([
        		'title'=>'Madagascar Actulité '.$i,
        		'details'=>'Lorem'.$i.' ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ',
        		'image'=>'madagascar-actualite-'.$i.'.jpg',
        		'slug'=>'madagascar-actualite-'.$i,
        	])->categories()->attach(1);
        }

        for($i=1;$i<=10;$i++){
        	Actu::create([
        		'title'=>'Turquie Actulité '.$i,
        		'details'=>'Lorem'.$i.' ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ',
        		'image'=>'turquie-actualite-'.$i.'.jpg',
        		'slug'=>'turquie-actualite-'.$i,
        	])->categories()->attach(2);
        }
    }
}
