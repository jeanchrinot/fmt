<?php

namespace App\Http\Controllers\Admin;

use Session;

use App\User;
use App\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Validator, Redirect, Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Symfony\Component\Console\Input\Input;

class MemberController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    public function add()
    {
        return view('admin.user_form');
    }

    public function store(Request $request)
    {
        // dd(request()->all());
        /*$rules = array(
            'name' => 'required|string|max:100|regex:/^[A-Za-z\s-_]+$/',
            'surname' => 'required|string|max:100|regex:/^[A-Za-z\s-_]+$/',
            'birthday' => 'required|date',
            'gender' => 'required|numeric|max:2',
            'province' => 'required|numeric|lt:82|gt:0',
            'phone' => ['required', 'regex:/^(\+|00){0,1}[0-9]{0,3}(\({1}[0-9]{1,3}\){1}){0,1}[0-9]{1,18}$/'],
            'email' => 'required|email|regex:/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/',
            'department' => 'required',
            'type' => 'required|numeric|max:3',
            'password' => 'nullable|string|min:8',
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:5000',
        );*/
        $rules = array(
            'name' => 'required|string|max:100',
            'surname' => 'required|string|max:100',
            'birthday' => 'required|date',
            'gender' => 'required|numeric|max:2',
            'province' => 'required|numeric|lt:82|gt:0',
            'phone' => ['required'],
            'email' => 'required|email',
            'department' => 'required',
            'type' => 'required|numeric|max:3',
            'password' => 'nullable|string|min:8',
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:5000',
        );
        $messages = array(
            "name.string" => "Le format du nom n'est pas valide.",
            "name.regex" => "Le format du nom n'est pas valide.",
            "surname.string" => "Le format du prenom n'est pas valide.",
            "surname.regex" => "Le format du prenom n'est pas valide.",
            "phone.regex" => "Le format du téléphone n'est pas valide.",
            "password" => "Le mot de passe doit comporter au moins 8 caractères.",
            "phone.regex" => "Le format du téléphone n'est pas valide.",
            "image.image" => "Format d'image invalide",
            "image.mimes" => "L'image doit être un fichier de type: jpg, png, jpeg, gif, svg."
        );

        $data = Request()->validate($rules, $messages);

        if (request('image')) {
            $app_storage = config('app.storage');
            $image = $request->file("image");
            $ImageName = time() . "_" . $image->getClientOriginalName();
            $imageDestination = public_path($app_storage."/user/");
            $image->move($destinationPath, $ImageName);

            $uploadedImage = $destinationPath . $ImageName;
            $imagePath = "user/" . $ImageName;
            $image = Image::make($uploadedImage)->fit(1000, 1000);

            $imageArray = ['image' => $imagePath];

            $image->save($uploadedImage);
        }

        if (request('password')) {
            $passwordArray = ['password' => bcrypt(request('password'))];
        }

        $data = array_merge(
            $data,
            $passwordArray ?? [],
            $imageArray ?? []
        );

        //dd($data['gender']);


        User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'birthday' => $data['birthday'],
            'gender' => (int)$data['gender'],
            'province' => $data['province'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'department' => $data['department'],
            'type' => (int)$data['type'],
            'password' => $data['password'] ?? '',
            'image' => $data['image'] ?? ''
        ]);

        return redirect()->back()->with('success', 'Membre ajouté avec succès.');

        //dd($data);
    }

    public function list()
    {
        $users = User::orderBy("created_at", "desc")->paginate(5);

        return view('admin.members')->with('users', $users);
    }


    public function edit($id)
    {
        $user = User::where('id', $id)->firstOrFail();

        return view('admin.user_form')->with('edit_user', $user);
    }

    public function update($id)
    {
        /*$rules = array(
            'name' => 'required|string|max:100|regex:/^[A-Za-z\s-_]+$/',
            'surname' => 'required|string|max:100|regex:/^[A-Za-z\s-_]+$/',
            'birthday' => 'required|date',
            'gender' => 'required|numeric|max:2',
            'province' => 'required|numeric|lt:82|gt:0',
            'phone' => ['required', 'regex:/^(\+|00){0,1}[0-9]{0,3}(\({1}[0-9]{1,3}\){1}){0,1}[0-9]{1,18}$/'],
            'email' => 'required|email|regex:/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/',
            'department' => 'required',
            'type' => 'required|numeric|max:3',
            'password' => 'nullable|string|min:8',
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:5000',
        );*/
        $rules = array(
            'name' => 'required|string|max:100',
            'surname' => 'required|string|max:100',
            'birthday' => 'required|date',
            'gender' => 'required|numeric|max:2',
            'province' => 'required|numeric|lt:82|gt:0',
            'phone' => ['required'],
            'email' => 'required|email',
            'department' => 'required',
            'type' => 'required|numeric|max:3',
            'password' => 'nullable|string|min:8',
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:5000',
        );
        $messages = array(
            "name.string" => "Le format du nom n'est pas valide.",
            "name.regex" => "Le format du nom n'est pas valide.",
            "surname.string" => "Le format du prenom n'est pas valide.",
            "surname.regex" => "Le format du prenom n'est pas valide.",
            "phone.regex" => "Le format du téléphone n'est pas valide.",
            "password" => "Le mot de passe doit comporter au moins 8 caractères.",
            "phone.regex" => "Le format du téléphone n'est pas valide.",
            "image.image" => "Format d'image invalide",
            "image.mimes" => "L'image doit être un fichier de type: jpg, png, jpeg, gif, svg."
        );

        $data = Request()->validate($rules, $messages);

        if (request('image')) {
            $app_storage = config('app.storage');
            $image = Request()->file("image");
            $imageName = time() . "_" . $image->getClientOriginalName();
            $imageDestination = public_path($app_storage."/user/");
            $image->move($imageDestination, $imageName);

            $updatedImage = $imageDestination . $imageName;

            $image = Image::make($updatedImage)->fit(1000, 1000);
            $imagePath = "user/" . $imageName;
            $imageArray = ['image' => $imagePath];

            $image->save($updatedImage);
        }

        if (request('password')) {
            $passwordArray = ['password' => bcrypt(request('password'))];
        }

        $password = true;

        $data = array_merge(
            $data,
            $passwordArray ?? [],
            $imageArray ?? []
        );

        $data['gender'] = (int)$data['gender'];
        $data['type'] = (int)$data['type'];

        //dd($data['gender']);

        User::where('id', $id)->update($data);

        return redirect()->route('listMember')->with('success', 'Membre mis a jour avec succes.');
    }
}