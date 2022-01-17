<?php

use Illuminate\Database\Seeder;
use App\PositionUser;

class PositionUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pos = [
        	['user_id'=>1,'position_id'=>1],
        	['user_id'=>2,'position_id'=>2],
        	['user_id'=>3,'position_id'=>3]
    ];
        foreach ($pos as $position) {
        	PositionUser::create($position);
        }
    }
}
