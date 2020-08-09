<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\NewsCategory;

class NewsCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();

        NewsCategory::insert([
        	['name'=>'Madagascar','slug'=>'madagascar','created_at'=>$now,'updated_at'=>$now],
        	['name'=>'Turquie','slug'=>'turquie','created_at'=>$now,'updated_at'=>$now],
        	['name'=>'International','slug'=>'international','created_at'=>$now,'updated_at'=>$now],
        	['name'=>'Covid-19','slug'=>'covid-19','created_at'=>$now,'updated_at'=>$now]
        ]);
    }
}
