<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$date = date_create("1995-03-15");
    	$users = [
    				['name'=>'Olvanot','surname'=>'Rakotonirina','birthday'=>$date,'gender'=>1,'province'=>'Bursa','phone'=>'0428562','email'=>'olvanot@gmail.com','department'=>'Computer Engineering','type'=>1,'image'=>'olvanot.jpg'],
    				['name'=>'Jean','surname'=>'Chrinot','birthday'=>$date,'gender'=>1,'province'=>'Kocaeli','phone'=>'0428562','email'=>'jean@gmail.com','department'=>'Electronics Engineering','type'=>2,'image'=>'chrinot.jpg','password'=> bcrypt('password')],
    				['name'=>'Mirana','surname'=>'Rakoto','birthday'=>$date,'gender'=>2,'province'=>'Bursa','phone'=>'0428562','email'=>'mirana@gmail.com','department'=>'Computer Engineering','type'=>0,'image'=>'mirana.jpg']
    			];

        foreach ($users as $user) {
        	User::create($user);
        }
    }
}
