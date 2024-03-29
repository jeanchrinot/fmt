<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use App\About;
use App\Actu;
use App\Studentword;
use App\User;
use App\Contact;
use App\Activity;
use App\BourseInformation;

class HomeController extends Controller
{
    //
    public function index()
    {
        $sliders = Slider::where('featured', true)->get();
        $abouts = About::where('featured', true)->take(1)->get();
        $about = $abouts[0];
        $news = Actu::where('featured', true)->orderBy('created_at', 'desc')->take(3)->get();
        $events = Activity::where([['featured', true], ['activity_date', '>', now()]])->orderBy('activity_date')->take(4)->get();
        //dd($events);
        $coming_event = $events->shift();
        $events = $events->all();

        $studentwords = Studentword::with('user')->has('user')->where('featured', true)->get();

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

        //$temp = json_decode(json_encode((object)$assContact[0]));

        $assContact = $this->toObject($assContact[0]);
        $consulatContact = $this->toObject($consulatContact[1]);
        $bourseInfos = BourseInformation::orderBy("id", "desc")->limit(3)->get();

        return view('index')->with([
            'sliders' => $sliders,
            'about' => $about,
            'news' => $news,
            'coming_event' => $coming_event,
            'events' => $events,
            'studentwords' => $studentwords,
            'office_members' => $office_members,
            'assContact' => $assContact,
            'consulatContact' => $consulatContact,
            "bourseInfos" => $bourseInfos
        ]);
    }


    public function toObject($arr)
    {
        return json_decode(json_encode((object)$arr), false);
    }
}
