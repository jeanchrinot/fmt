<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\Gallerycategory;
use App\Video;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function gallery()
    {
        $pagination = 12;

        if (request()->year) {
            $year = request()->year;
            $galleries = Gallery::where('featured', true)->whereYear('created_at', '=', date($year))->paginate($pagination);
        } elseif (request()->cat) {
            $cat = Gallerycategory::where('slug', request()->cat)->firstOrFail();
            $galleries = $cat->galleries()->where('featured', true)->paginate($pagination);

            //dd($cat->galleries);
        } else {
            $galleries = Gallery::where('featured', true)->orderBy("updated_at", "desc")->paginate($pagination);
        }

        $gallery_categories = GalleryCategory::where('featured', true)->get();

        //dd($gallery_categories);

        return view('gallery')->with([
            'galleries' => $galleries,
            'categories' => $gallery_categories,
        ]);
    }
    public function video(Request $request)
    {
        $pagination = 4;

        if (request()->year) {
            $year = request()->year;
            $videos = Video::where('featured', true)->whereYear('created_at', '=', date($year))->paginate($pagination);
        } elseif (request()->cat) {
            $cat = Gallerycategory::where('slug', request()->cat)->firstOrFail();
            $videos = $cat->videos()->where('featured', true)->paginate($pagination);

            // dd($videos);
        } else {
            $videos = Video::where('featured', true)->paginate($pagination);
        }

        $gallery_categories = GalleryCategory::where('featured', true)->get();

        return view('video')->with([
            'videos' => $videos,
            'categories' => $gallery_categories,
        ]);
    }

    public function actuality(Request $request, $slug = null)
    {
        if ($slug == null) {
            $pagination = 6;
            if (request()->cat) {
                $cat = \App\Actucategory::where('slug', request()->cat)->firstOrFail();
                $news = $cat->actus()->where('featured', true)->paginate($pagination);
            } else {
                $news = \App\Actu::where('featured', true)->paginate($pagination);
            }

            $categories = \App\Actucategory::all();
            //dd($categories);
            return view('actuality')->with([
                'news' => $news,
                'categories' => $categories,
            ]);
        } else {
            // Show one actuality
            $new = \App\Actu::where(['slug' => $slug, 'featured' => true])->firstOrFail();
            $others = \App\Actu::where([['slug', '!=', $slug], ['featured', true]])->get();

            return view('single-actuality')->with(['new' => $new, 'others' => $others]);
        }
    }

    public function activity(Request $request, $slug = null)
    {
        if ($slug == null) {
            $pagination = 4;
            if (request()->year) {
                $year = request()->year;
                $events = \App\Activity::where('featured', true)->whereYear('activity_date', '=', date($year))->paginate($pagination);
            } else {
                $events = \App\Activity::where('featured', true)->paginate($pagination);
            }

            return view('activity')->with([
                'events' => $events,
            ]);
        } else {
            $event = \App\Activity::where(['slug' => $slug, 'featured' => true])->firstOrFail();
            $others = \App\Activity::where([['slug', '!=', $slug], ['featured', true]])->get();

            return view('single-activity')->with(['event' => $event, 'others' => $others]);
        }
    }

    public function bureau()
    {
        return view('bureau');
    }
}