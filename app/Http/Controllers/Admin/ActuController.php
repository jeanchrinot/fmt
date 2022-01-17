<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Actu;
use App\Actucategory;
use Intervention\Image\Facades\Image;

class ActuController extends Controller
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
        $actus = Actu::orderBy("created_at", "desc")->paginate(5);

        return view('admin.actu')->with('actus', $actus);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = \App\Actucategory::all();
        return view('admin.actu_form')->with('categories', $categories);
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
            'title' => 'required|string|max:250',
            'details' => 'required',
            'featured' => '',
            'image' => 'required|image',
            'categories' => ''
        ]);

        $categories = array_values($data['categories']);

        //dd($categories);

        if (request('image')) {
            $app_storage = config('app.storage');
            $image = Request()->file("image");
            $imageName = time() . "_" . $image->getClientOriginalName();
            $imageDestination = public_path($app_storage."/actuality/");

            $image->move($imageDestination, $imageName);


            $uploadedImage = $imageDestination . $imageName;

            $imagePath = "actuality/{$imageName}";

            $image = Image::make($uploadedImage)->fit(1000, 700);

            $imageArray = ['image' => $imagePath];

            $image->save($uploadedImage);

        }


        $slug = createSlug($data['title']);
        $newslug = $slug;

        while (Actu::where('slug', $newslug)->count()) {
            $rand_string = generateRandomStringLC();
            $newslug = $slug . '-' . $rand_string;
        }

        $actu = Actu::create([
            'title' => $data['title'],
            'details' => $data['details'],
            'slug' => $newslug,
            'image' => $imageArray['image']
        ]);

        $actu->categories()->attach($categories);

        // if(count($categories)){
        //     foreach ($categories as $category) {
        //         $actu->categories()->attach($category);
        //     }
        // }

        return redirect()->back()->with('success', 'Actualité ajoutée avec succès.');
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
        $actu = Actu::where('id', $id)->firstOrFail();
        $categories = \App\Actucategory::all();
        return view('admin.actu_form')->with(['categories' => $categories, 'actu' => $actu]);
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
            'title' => 'required|string|max:250',
            'details' => 'required',
            'featured' => '',
            'image' => 'nullable|image',
            'categories' => ''
        ]);

        $new_categories = array_values($data['categories'] ?? []);

        $actu = Actu::where('id', $id)->firstOrFail();
        $categories = $actu->categories;

        $all_cats = [];
        foreach ($categories as $key => $category) {
            $all_cats[$key] = $category->id;
        }

        if (request('image')) {
            $app_storage = config('app.storage');
            $image = Request()->file("image");
            $imageName = time() . "_" . $image->getClientOriginalName();
            $imageDestination = public_path($app_storage."/actuality/");

            $image->move($imageDestination, $imageName);


            $updatedImage = $imageDestination . $imageName;

            $imagePath = "actuality/{$imageName}";

            $image = Image::make($updatedImage)->fit(1000, 700);

            $imageArray = ['image' => $imagePath];

            $image->save($updatedImage);

        } else {
            $imagePath = $actu->image;
        }


        $slug = createSlug($data['title']);
        $newslug = $slug;

        while (Actu::where([['slug', $newslug], ['id', '!=', $id]])->count()) {
            $rand_string = generateRandomStringLC();
            $newslug = $slug . '-' . $rand_string;
        }

        $actu->update([
            'title' => $data['title'],
            'details' => $data['details'],
            "featured" => $data["featured"],
            'slug' => $newslug,
            'image' => $imagePath
        ]);

        $actu->categories()->detach($all_cats);
        $actu->categories()->attach($new_categories);

        $actus = Actu::all();

        return redirect()->route('actu.index')->with(['actus' => $actus, 'success' => 'Actualité modifiée avec succès.']);
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
