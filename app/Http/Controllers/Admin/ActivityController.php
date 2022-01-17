<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Activity;
use Intervention\Image\Facades\Image;

class ActivityController extends Controller
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
        $activities = Activity::orderBy("activity_date")->paginate(5);

        return view('admin.activity')->with('activities', $activities);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.activity_form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = Request()->validate([
            'name' => 'required|string|max:250',
            'details' => 'required',
            'featured' => 'required',
            'image' => 'required|image',
            'activity_date' => 'required|date'
        ]);


        if (request('image')) {
            $image = Request()->file("image");
            $imageName = time() . "_" . $image->getClientOriginalName();
            $imageDestination = public_path("/../../../public_html/storage/activity/");
            $image->move($imageDestination, $imageName);

            $updatedImage = $imageDestination . $imageName;

            $imagePath = "activity/{$imageName}";

            $image = Image::make($updatedImage)->fit(1000, 700);

            $imageArray = ['image' => $imagePath];

            $image->save($updatedImage);

        }


        $slug = createSlug($data['name']);
        $newslug = $slug;

        while (Activity::where('slug', $newslug)->count()) {
            $rand_string = generateRandomStringLC();
            $newslug = $slug . '-' . $rand_string;
        }

        $activity = Activity::create([
            'name' => $data['name'],
            'details' => $data['details'],
            'slug' => $newslug,
            'image' => $imageArray['image'],
            'activity_date' => $data['activity_date']
        ]);

        return redirect()->back()->with('success', 'Activité ajoutée avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $activity = Activity::where('id', $id)->firstOrFail();
        return view('admin.activity_form')->with(['activity' => $activity]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Request()->validate([
            'name' => 'required|string|max:250',
            'details' => 'required',
            'featured' => 'required',
            'image' => 'nullable|image',
            'activity_date' => 'required|date'
        ]);

        $activity = Activity::where('id', $id)->firstOrFail();

        if (request('image')) {

            $image = Request()->file("image");
            $imageName = time() . "_" . $image->getClientOriginalName();
            $imageDestination = public_path("/../../../public_html/storage/activity/");

            $image->move($imageDestination, $imageName);

            $updatedImage = $imageDestination . $imageName;

            $imagePath = "activity/{$imageName}";

            $image = Image::make($updatedImage)->fit(1000, 700);

            $imageArray = ['image' => $imagePath];

            $image->save($updatedImage);

        } else {
            $imagePath = $activity->image;
        }


        $slug = createSlug($data['name']);
        $newslug = $slug;

        while (Activity::where([['slug', $newslug], ['id', '!=', $id]])->count()) {
            $rand_string = generateRandomStringLC();
            $newslug = $slug . '-' . $rand_string;
        }

        $activity->update([
            'name' => $data['name'],
            'details' => $data['details'],
            "featured" => $data["featured"],
            'slug' => $newslug,
            'image' => $imagePath,
            'activity_date' => $data['activity_date']
        ]);

        $activities = Activity::all();

        return redirect()->route('activity.index')->with(['activities' => $activities, 'success' => 'Activité modifiée avec succès.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
