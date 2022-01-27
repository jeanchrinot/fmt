<?php

use App\BourseInformation;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class BourseInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 11; $i++) {
            $title = "bourse info $i";
            $slug = Str::slug($title);

            $paragraph = "";
            for ($j = 0; $j < 10; $j++) {
                $paragraph .= "<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>";
            }

            $bourse = [
                "title" => $title,
                "slug" => $slug,
                "truncate" => "Lorem1 ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua",
                "text" => $paragraph,
                "user_id" => User::first()->id,
                "image" =>"https://lokeshdhakar.com/projects/lightbox2/images/image-3.jpg"
            ];

            BourseInformation::create($bourse);
        }
    }
}
