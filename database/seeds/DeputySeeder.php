<?php

use Illuminate\Database\Seeder;
use App\Deputy;

class DeputySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	for ($i=1; $i < 3; $i++) { 
    		Deputy::create([
    			'province'=>$i
        	])->user()->associate($i)->save();
    	}
        
    }
}
