<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Slider;
use App\About;
use App\User;
use App\Studentword;
use Intervention\Image\Facades\Image;
use Illuminate\Support\MessageBag;

class PageController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    public function list($item)
    {
        switch ($item) {
            case 'slider':
                $sliders = Slider::orderBy("created_at", "desc")->paginate(5);
                return view('admin.slider')->with('sliders', $sliders);
                break;
            case 'about':
                $about = About::where('id', 1)->firstOrFail();
                return view('admin.about')->with('about', $about);
                break;
            case 'student_words':

                $students = User::with('words')->has('words')->get();
                return view('admin.student_words')->with('students', $students);
                break;
            default:
                # code...
                break;
        }
    }

    public function add($item)
    {
        switch ($item) {
            case 'slider':
                return view('admin.slider_form');
                break;
            case 'student_words':
                $users = User::all();
                return view('admin.student_words_form')->with('users', $users);
                break;
            default:
                # code...
                break;
        }
    }

    public function store($item)
    {
        switch ($item) {
            case 'slider':
                $data = Request()->validate([
                    'name' => 'required|string',
                    'details' => 'string|nullable|min:10',
                    'image' => 'required|image',
                    'featured' => 'required|numeric|min:0|max:1'
                ]);

                if (request('image')) {
                    $imageArray = $this->saveImage(Request()->file("image"), 'slider', true);

                    if ($imageArray) {

                        $data = array_merge(
                            $data,
                            $imageArray ?? []
                        );

                        Slider::create($data);

                        return redirect()->back()->with('success', 'Slide ajouté avec succès.');

                    }

                }

                $errors = new MessageBag;
                $errors->add('image_not_uploaded', 'Oups! Une erreur est survenue.');
                return redirect()->back()->withErrors($errors)->withInput();

                break;
            case 'student_words':
                $data = Request()->validate([
                    'user' => 'required|numeric',
                    'words' => 'required|string|max:300',
                    'featured' => 'required|numeric|min:0|max:1',
                ]);


                Studentword::create([
                    'words' => $data['words'],
                    'featured' => $data['featured'],
                    "user_id" => Request()->user
                ]);//->user()->associate(1)->save();

                return redirect()->back()->with('success', 'Mot d\'étudiant ajouté avec succès.');
                break;
            default:
                # code...
                break;
        }
    }


    public function edit($item, $id)
    {
        switch ($item) {
            case 'slider':
                $slider = Slider::where('id', $id)->firstOrFail();
                return view('admin.slider_form')->with('slider', $slider);
                break;
            case 'about':
                $about = About::where('id', $id)->firstOrFail();
                return view('admin.about_form')->with('about', $about);
                break;
            case 'student_words':
                $word = Studentword::where('id', $id)->firstOrFail();
                $users = $word->user;
                return view('admin.student_words_form')->with(['users' => $users, 'word' => $word]);
                break;
            default:
                # code...
                break;
        }
    }

    public function update($item, $id)
    {
        switch ($item) {
            case 'slider':
                $data = Request()->validate([
                    'name' => 'required|string',
                    'details' => 'string|nullable|min:10',
                    'image' => 'nullable|image',
                    'featured' => 'required|numeric|min:0|max:1'
                ]);

                if (request('image')) {
                    $imageArray = $this->saveImage(request('image'), 'slider', true);
                }

                $data = array_merge(
                    $data,
                    $imageArray ?? []
                );

                Slider::where('id', $id)->update($data);

                return redirect()->route('page.item.list', ['item' => 'slider'])->with('success', 'Slide modifié avec succès.');


                break;
            case 'about':
                $data = Request()->validate([
                    'about' => 'required',
                    'mission' => '',
                    'vision' => '',
                    'words_of_president' => 'required',
                    'image' => 'nullable|image',
                    'image2' => 'nullable|image',
                ]);
                if (request("image") && request("image2")) {
                    $imageArray = $this->saveImage(request('image'), 'about', false);
                    $image2Array = $this->saveImage(request('image2'), 'about', false);
                } else {
                    if (request('image')) {
                        $imageArray = $this->saveImage(request('image'), 'about', false);
                    }
                    if (request('image2')) {
                        $image2Array = $this->saveImage(request('image2'), 'about', false);
                    }
                }


                $data = array_merge(
                    $data,
                    $imageArray ?? [],
                    $image2Array ?? []
                );

                About::where('id', $id)->update($data);

                return redirect()->route('page.item.list', ['item' => 'about'])->with('success', 'A propos modifié avec succès.');

                break;
            case 'student_words':

                $data = Request()->validate([
                    'user' => 'required|numeric',
                    'words' => 'required|string|max:300',
                    'featured' => 'required|numeric|min:0|max:1'
                ]);

                Studentword::where('id', $id)->update([
                    'words' => $data['words'],
                    'featured' => $data['featured']
                ]);
                return redirect()->route('page.item.list', ['item' => 'student_words'])->with('success', 'Mot d\'étudiant modifié avec succès.');
                break;
            default:
                # code...
                break;
        }
    }

    protected function saveImage($img, $folder, $resize)
    {
        if ($img) {
            $app_storage = config('app.storage');
            $imageDestination = public_path($app_storage."/{$folder}/");
            $imageName = time() . "_" . $img->getClientOriginalName();
            $img->move($imageDestination, $imageName);

            $uploadedImage = $imageDestination . $imageName;

            $imagePath = $folder . "/" . $imageName;

            // $imagePath = $img->store($folder,'public');

            if ($resize) {
                $image = Image::make($uploadedImage)->fit(1200, 600);
            } else {
                $image = Image::make($uploadedImage);
            }

            $image->save($uploadedImage);

            if ($img == request("image2")) {
                return ["image2" => $imagePath];
            }

            return ["image" => $imagePath];

        }

        return null;
    }

}