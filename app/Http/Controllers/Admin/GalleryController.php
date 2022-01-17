<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Gallery;
use App\Gallerycategory;
use Intervention\Image\Facades\Image;

class GalleryController extends Controller
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
        $galleries = Gallery::orderBy("created_at", "desc")->paginate(5);

        return view('admin.gallery')->with('galleries', $galleries);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = \App\Gallerycategory::all();

        return view('admin.gallery_form')->with('categories', $categories);
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
            'title' => 'required|string|max:250',
            'featured' => 'required',
            'image' => 'required|image',
            'categories' => ''
        ]);

        $categories = array_values($data['categories']);

        // dd($categories);

        if (request('image')) {
            $app_storage = config('app.storage');
            $image = Request()->file("image");
            $imageName = time() . "_" . $image->getClientOriginalName();
            $imageDestination = public_path($app_storage."/gallery/");
            // dd($imageDestination);
            $image->move($imageDestination, $imageName);

            $uploadedImage = $imageDestination . $imageName;

            // $image = Image::make($uploadedImage)->fit(1000, 700);
            $image = Image::make($uploadedImage);
            $imagePath = "gallery/" . $imageName;
            $imageArray = ['image' => $imagePath];

            $image->save($uploadedImage);
        }

        $gallery = Gallery::create([
            'title' => $data['title'],
            'image' => $imageArray['image'],
            'featured' => $data['featured']
        ]);

        $gallery->categories()->attach($categories);

        return redirect()->back()->with('success', 'Image ajoutée avec succès.');
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

    public function FunctionName($name)
    {
        $name = "salut les gens";
        $fullname = (string) $name;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gallery = Gallery::where('id', $id)->firstOrFail();
        $categories = \App\Gallerycategory::all();
        return view('admin.gallery_form')->with(['categories' => $categories, 'gallery' => $gallery]);
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
            'title' => 'required|string|max:250',
            'featured' => 'required',
            'image' => 'nullable|image',
            'categories' => ''
        ]);

        $new_categories = array_values($data['categories'] ?? []);
        $gallery = Gallery::where('id', $id)->firstOrFail();
        $categories = $gallery->categories;

        $all_cats = [];

        foreach ($categories as $key => $category) {
            $all_cats[$key] = $category->id;
        }


        if (request('image')) {
            $app_storage = config('app.storage');
            $image = Request()->file("image");
            $imageName = time() . "_" . $image->getClientOriginalName();
            $imageDestination = public_path($app_storage."/gallery/");
            $image->move($imageDestination, $imageName);

            $updatedImage = $imageDestination . $imageName;

            // $image = Image::make($updatedImage)->fit(1000, 700);
            $image = Image::make($updatedImage);
            $imagePath = "gallery/" . $imageName;
            $imageArray = ['image' => $imagePath];

            $image->save($updatedImage);
        } else {
            $imagePath = $gallery->image;
        }

        $gallery->update([
            'title' => $data['title'],
            'featured' => $data['featured'],
            'image' => $imagePath
        ]);

        $gallery->categories()->detach($all_cats);
        $gallery->categories()->attach($new_categories);

        $galleries = Gallery::all();

        return redirect()->route('gallery.index')->with(['galleries' => $galleries, 'success' => 'Galerie modifiée avec succès.']);
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