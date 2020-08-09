<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;
use App\Gallerycategory;

class VideoController extends Controller
{
    public function index()
    {
    	$videos = Video::where('featured',true)->take(6)->get();
    	$video_categories = Gallerycategory::where('featured',true)->get();
    	//dd($videos);
    	return view('gallery.videos')->with([
    		'videos'=>$videos,
    		'categories'=>$video_categories
    	]);
    }
}
