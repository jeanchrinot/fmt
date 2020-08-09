<?php

use Illuminate\Database\Seeder;
use App\Studentword;

class StudentwordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 3; $i++) { 
        	Studentword::create([
        		'words'=>'Lorem '.$i.' ipsum dolor sit amet, consectetur adipisicing elit. Molestias fugiat earum voluptatum explicabo illum doloremque debitis, tenetur officia odit unde!'
        	])->user()->associate(1)->save();
        }
        for ($i=1; $i < 3; $i++) { 
        	Studentword::create([
        		'words'=>'Lorem '.$i.' ipsum dolor sit amet, consectetur adipisicing elit. Molestias fugiat earum voluptatum explicabo illum doloremque debitis, tenetur officia odit unde!'
        	])->user()->associate(2)->save();
        }
        for ($i=1; $i < 3; $i++) { 
        	Studentword::create([
        		'words'=>'Lorem '.$i.' ipsum dolor sit amet, consectetur adipisicing elit. Molestias fugiat earum voluptatum explicabo illum doloremque debitis, tenetur officia odit unde!'
        	])->user()->associate(3)->save();
        }
    }
}
