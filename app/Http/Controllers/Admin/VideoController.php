<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Video;
use App\Gallerycategory;
use Intervention\Image\Facades\Image;

class VideoController extends Controller
{
    
    function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::all();

        return view('admin.video')->with('videos',$videos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = \App\Gallerycategory::all();
         return view('admin.video_form')->with('categories',$categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = Request()->validate([
            'title'=>'required|string|max:250',
            'featured'=>'required',
            'video'=>'required',
            'categories'=>''
        ]);

        $categories = array_values($data['categories']);

        $video = Video::create([
            'title'=>$data['title'],
            'video'=>$data['video'],
            'featured'=>$data['featured']
        ]);

        $video->categories()->attach($categories);

        return redirect()->back()->with('success','Vidéo ajoutée avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $video = Video::where('id',$id)->firstOrFail();
        $categories = \App\Gallerycategory::all();
        return view('admin.video_form')->with(['categories'=>$categories,'video'=>$video]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Request()->validate([
            'title'=>'required|string|max:250',
            'featured'=>'required',
            'video'=>'required',
            'categories'=>''
        ]);

        $new_categories = array_values($data['categories'] ?? []);
        $video = Video::where('id',$id)->firstOrFail();
        $categories = $video->categories;

        $all_cats = [];
  
          foreach($categories as $key=>$category){
            $all_cats[$key] = $category->id;
          }

        $video->update([
            'title'=>$data['title'],
            'featured'=>$data['featured'],
            'video'=>$data['video']
        ]);

        $video->categories()->detach($all_cats);
        $video->categories()->attach($new_categories);

        $videos = Video::all();

        return redirect()->route('video.index')->with(['videos'=>$videos,'success'=>'Galerie modifiée avec succès.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
