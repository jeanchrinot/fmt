<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Actu;
use App\BourseInformation;
use App\Gallery;
use App\Gallerycategory;
use App\Video;
use Illuminate\Http\Request;

class PageController extends Controller
{
    private $paginate = 5;
    private $limitOther = 5;

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
        $data = $this->loadingData($slug, "App\Actu", "featured", "activites",request()->year);

        if ($data["items"]) {
            $categories = \App\Actucategory::all();
            //dd($categories);
            return view('actuality')->with([
                'news' => $data["items"],
                'categories' => $categories,
            ]);
        } else if ($data["item-detail"]) {
            return view("default-detail")->with($data["item-detail"]);
        }
    }

    public function activity(Request $request, $slug = null)
    {
        $data = $this->loadingData($slug, "App\Activity", "featured", "activites");

        if ($data["items"]) {
            return view("activity")->with([
                'events' => $data["items"]
            ]);
        } else if ($data["item-detail"]) {
            return view("default-detail")->with($data["item-detail"]);
        }
    }

    // public function activitya(Request $request, $slug = null)
    // {
    //     if ($slug == null) {
    //         $pagination = 4;
    //         if (request()->year) {
    //             $year = request()->year;
    //             $events = \App\Activity::where('featured', true)->whereYear('activity_date', '=', date($year))->paginate($pagination);
    //         } else {
    //             $events = \App\Activity::where('featured', true)->paginate($pagination);
    //         }

    //         return view('activity')->with([
    //             'events' => $events,
    //         ]);
    //     } else {
    //         $event = \App\Activity::where(['slug' => $slug, 'featured' => true])->firstOrFail();
    //         $others = \App\Activity::where([['slug', '!=', $slug], ['featured', true]])->get();


    //         return view('single-activity')->with(['event' => $event, 'others' => $others]);
    //     }
    // }

    public function bureau()
    {
        return view('bureau');
    }

    public function bourseInfo(Request $request, $slug = null)
    {
        $data = $this->loadingData($slug, "App\BourseInformation", "status", "information-bourse",);

        if ($data["items"]) {
            return view("bourse-infos")->with([
                'bourseInfos' => $data["items"]
            ]);
        } else if ($data["item-detail"]) {
            return view("default-detail")->with($data["item-detail"]);
        }
    }

    private function loadingData($slug = null, $modelName, $statusColumn, $baseUrl,$year=null)
    {
        $others = [];
        $recents = [];
        $results = [];
        $items = [];
        $item = [];

        dd($year);
        $results["items"] = $items;
        $results["item-detail"] = $item;

        $model = new $modelName();

        if ($slug == null) {
            if ($year) {
                $year = $year;
                $items = $model->where($statusColumn, true)->whereYear('created_at', '=', date($year))->paginate($this->paginate);
            } else {
                $items = $model->where($statusColumn, true)->orderBy("id", "desc")->paginate($this->paginate);
            }
            $results["items"] = $items;
        } else {
            $item = $model->where(['slug' => $slug, $statusColumn => true])->firstOrFail();
            if ($model->count() > $this->limitOther) {
                $others = $model->where("slug", "!=", $slug)->orderBy("id", "desc")->limit($this->limitOther)->get();
                $recents =  $model->where("slug", "!=", $slug)->whereNotIn("id",  $others->pluck("id"))->orderBy("id", "desc")->limit($this->limitOther)->get();
            } else {
                $recents =  $model->where("slug", "!=", $slug)->orderBy("id", "desc")->limit($this->limitOther)->get();
            }

            $results["item-detail"] = [
                'image' => $item->image,
                'title' => $item->title??$item->name,
                "longText" => $item->text ?? $item->details,
                'others' => $others,
                "recents" => $recents,
                "baseUrl" => $baseUrl
            ];
        }

        return $results;
    }
}
