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
    private $limitOther = 5;
    private $limitRecent = 8;
    private $paginate = 6;

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

        $dates = Gallery::pluck("created_at");

        $years = $this->getYearsArray($dates);

        //dd($gallery_categories);

        return view('gallery')->with([
            'galleries' => $galleries,
            'categories' => $gallery_categories,
            "years" => $years
        ]);
    }
    public function video()
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

        $dates = Gallery::pluck("created_at");

        $years = $this->getYearsArray($dates);

        return view('video')->with([
            'videos' => $videos,
            'categories' => $gallery_categories,
            "years" => $years
        ]);
    }

    public function actuality($slug = null)
    {
        $others = [];
        $recents = [];
        $categories = [];

        if ($slug == null) {
            $categories = \App\Actucategory::all();
            $pagination = 6;
            if (request()->cat) {
                $cat = \App\Actucategory::where('slug', request()->cat)->firstOrFail();
                $news = $cat->actus()->where('featured', true)->paginate($pagination);
            } else {
                $news = \App\Actu::where('featured', true)->paginate($pagination);
            }

            return view('actuality')->with([
                'news' => $news,
                'categories' => $categories,
            ]);
        } else {
            // Show one actuality
            $new = Actu::where(['slug' => $slug, 'featured' => true])->firstOrFail();

            $actives = Actu::where("featured", true);

            if ($actives->count() > $this->limitOther) {
                $recents = $actives->where("slug", "!=", $slug)
                    ->orderBy("id", "desc")
                    ->limit($this->limitOther)
                    ->get();

                $others = $actives->skip($this->limitOther)
                    ->limit($this->limitRecent)
                    ->get();
            } else {
                $recents = $actives->where("slug", "!=", $slug)->limit($this->limitRecent)->get();
            }

            return view("default-detail")->with([
                'image' => $new->image,
                'title' => $new->title ?? $new->name,
                "longText" => $new->text ?? $new->details,
                'others' => $others,
                "recents" => $recents,
                "baseUrl" => "actualites"
            ]);
        }
    }

    public function activity($slug = null)
    {
        $others = [];
        $recents = [];

        if ($slug == null) {
            $pagination = 4;
            if (request()->year) {
                $year = request()->year;
                $events = Activity::where('featured', true)->whereYear('activity_date', '=', date($year))->paginate($pagination);
            } else {
                $events = Activity::where('featured', true)->paginate($pagination);
            }

            $dates = Activity::pluck("activity_date");

            $years = $this->getYearsArray($dates);

            return view('activity')->with([
                'events' => $events,
                "years" => $years
            ]);
        } else {
            // Show one activity
            $event = Activity::where(['slug' => $slug, 'featured' => true])->firstOrFail();

            $actives = Activity::where("featured", true);

            if ($actives->count() > $this->limitOther) {
                $recents = $actives->where("slug", "!=", $slug)
                    ->orderBy("id", "desc")
                    ->limit($this->limitOther)
                    ->get();

                $others = $actives->skip($this->limitOther)
                    ->limit($this->limitRecent)
                    ->get();
            } else {
                $recents = $actives->where("slug", "!=", $slug)->limit($this->limitRecent)->get();
            }

            return view("default-detail")->with([
                'image' => $event->image,
                'title' => $event->title ?? $event->name,
                "longText" => $event->text ?? $event->details,
                'others' => $others,
                "recents" => $recents,
                "baseUrl" => "activites"
            ]);
        }
    }

    public function bureau()
    {
        return view('bureau');
    }

    public function bourseInfo($slug = null)
    {
        $others = [];
        $recents = [];

        $year = request()->year;

        $actives = BourseInformation::where("status", true);

        if (is_null($slug)) {
            if ($year) {
                $bourseInfos = $actives->whereYear('created_at', '=', date($year))->paginate($this->paginate);
            } else {
                $bourseInfos = $actives->orderBy("id", "desc")->paginate($this->paginate);
            }

            $dates = BourseInformation::pluck("created_at");

            $years = $this->getYearsArray($dates);

            return view("bourse-infos", compact("bourseInfos", "years"));
        } else {
            $bourseInfo = BourseInformation::where("slug", $slug)
                ->where("status", true)
                ->firstOrFail();

            if ($actives->count() > $this->limitOther) {
                $recents = $actives->where("slug", "!=", $slug)
                    ->orderBy("id", "desc")
                    ->limit($this->limitOther)
                    ->get();

                $others = $actives->skip($this->limitOther)
                    ->limit($this->limitRecent)
                    ->get();
            } else {
                $recents = $actives->where("slug", "!=", $slug)->limit($this->limitRecent)->get();
            }

            return view("default-detail")->with([
                'image' => $bourseInfo->image,
                'title' => $bourseInfo->title ?? $bourseInfo->name,
                "longText" => $bourseInfo->text ?? $bourseInfo->details,
                'others' => $others,
                "recents" => $recents,
                "baseUrl" => "information-bourse"
            ]);
        }
    }

    private function getYearsArray($dates = [])
    {
        $years = [];

        if (count($dates)) {
            foreach ($dates as $date) {
                $years[] = date("Y", strtotime($date));
            }
        }

        $years = array_unique($years);
        rsort($years);

        return $years;
    }
}
