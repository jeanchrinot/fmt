<?php

use Illuminate\Database\Seeder;
use App\Activity;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$date = date_create("2020-03-10 10:00:00");
    	$date2 = date_create("2021-02-10 10:00:00");
        for ($i=1; $i < 6; $i++) { 
        	Activity::create([
        		'name'=>'Acitivité '.$i,
        		'details'=>'Les détails de l\'activité sont ici...blablabla',
        		'image'=>'activite-'.$i.'.jpg',
        		'activity_date'=>$date
        	]);
        }

         for ($i=6; $i < 11; $i++) { 
        	Activity::create([
        		'name'=>'Acitivité '.$i,
        		'details'=>'Les détails de l\'activité sont ici...blablabla',
        		'image'=>'activite-'.$i.'.jpg',
        		'activity_date'=>$date2
        	]);
        }
    }
}
