<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use App\About;
use App\News;
use App\Studentword;
use App\User;
use App\Contact;

class HomeController extends Controller
{
    //
    public function index(){
    	$sliders = Slider::where('featured',true)->take(3)->get();
    	$abouts = About::where('featured',true)->take(1)->get();
    	$about = $abouts[0];
        $news = News::where('featured',true)->take(10)->get();
        $studentwords = Studentword::where('featured',true)->get();
        $office_members = User::with('positions')->has('positions')->get();
        $contacts = Contact::take(2)->get();
        //dd((array)$contacts);

        $contactArr = json_decode(json_encode($contacts), true);

        $assContact = array_filter($contactArr, function ($contact) {
                        return ($contact['name'] == 'Association');
                    });

        $consulatContact = array_filter($contactArr, function ($contact) {
                        return ($contact['name'] == 'Consulat');
                    });

        //dd($consulatContact);

        //$temp = json_decode(json_encode((object)$assContact[0]));

        $assContact = $this->toObject($assContact[0]);
        $consulatContact = $this->toObject($consulatContact[1]);

        //dd($assContact->phone);
        
        
        // dd($AssContact);
        
        // Positions = Membre de bureau
        //$positions = Position::all();
        //dd(count($office_members));
        // foreach ($office_members as $office) {
        //     $test = $office;
        //     break;
        // }

        // $pos = array();

        // foreach ($test->positions as $position) {
        //     $pos = $position;
        //     break;
        // }
        // dd($pos);

    	//$about->dd();
    	return view('index')->with([
    		'sliders'=>$sliders,
    		'about'=>$about,
            'news'=>$news,
            'studentwords'=>$studentwords,
            'office_members'=>$office_members,
            'assContact'=>$assContact,
            'consulatContact'=>$consulatContact
    	]);
    }


    public function toObject($arr)
        {
            return json_decode(json_encode((object)$arr), false);
        }

}
