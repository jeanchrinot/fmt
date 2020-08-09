<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;
use App\GalleryCategory;
use App\Video;

class GalleryController extends Controller
{

    public function getGalleryCategories()
    {
        $gallery_categories = GalleryCategory::where('featured',true)->get();
        return $gallery_categories;
    }

    public function images()
    {
    	$galleries = Gallery::where('featured',true)->take(12)->get();
        $gallery_categories = $this->getGalleryCategories();

    	//dd($gallery_categories);

    	return view('gallery.images')->with([
    		'galleries'=>$galleries,
    		'categories'=>$gallery_categories
    	]);
    }

     public function videos()
    {
        $videos = Video::where('featured',true)->take(6)->get();
        $gallery_categories = $this->getGalleryCategories();

        return view('gallery.videos')->with([
            'videos'=>$videos,
            'categories'=>$gallery_categories
        ]);
    }
}
