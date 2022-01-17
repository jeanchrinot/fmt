<?php

use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('about')->insert([
        'about' => " Cette page a été ouverte d'abord pour faciliter nos recherches sur la présence des malgaches en Turquie, et sur la «communauté malgache en Turquie».
Autre raison aussi afin que nous puissions interagir avec tout le monde dans ce réseau. Merci à tous.",
        'words_of_president' => "Nosokafana ity pejy ity :
voalohany mba hanamora ny fikarohana tiantsika hatao mikasika ny fisian'ny malagasy aty torkia, sy mikasika ny fikambanana “ fiombonan'ny malagasy eto torkia”.",
        'image' => 'zafera.jpg',
        'featured'=>true,
    	]);
    }
}
