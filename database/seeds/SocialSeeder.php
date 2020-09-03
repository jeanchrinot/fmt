<?php

use Illuminate\Database\Seeder;
use App\Social;

class SocialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Social::create([
        	'facebook'=>'#',
        	'twitter'=>'#',
        	'instagram'=>'#',
        	'youtube'=>'#'
        ]);
    }
}
