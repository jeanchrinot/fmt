<?php

use Illuminate\Database\Seeder;
use App\Position;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $positions = [
        	['function'=>1],
        	['function'=>2],
            ['function'=>3],
        	['function'=>4]
        ];

        foreach ($positions as $position) {
        	Position::create($position);
        }
    }
}
