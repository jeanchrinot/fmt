<?php
 
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator,Redirect,Response;
Use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;
use Illuminate\Support\MessageBag;
use App\ContactUs;
use Intervention\Image\Facades\Image;
 
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

	public function store()
	{
        //dd(request('province'));

		$data = Request()->validate([
    		'name'=>'required|string|max:100|regex:/^[A-Za-z\s-_]+$/',
    		'surname'=>'required|string|max:100|regex:/^[A-Za-z\s-_]+$/',
    		'birthday'=>'required|date',
    		'gender'=>'required|numeric|max:2',
    		'province'=>'required|numeric|lt:82|gt:0',
    		'phone'=>['required','regex:/^(\+|00){0,1}[0-9]{0,3}(\({1}[0-9]{1,3}\){1}){0,1}[0-9]{1,18}$/'],
    		'email'=>'required|email|regex:/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/',
    		'department'=>'required',
    		'type'=>'required|numeric|max:3',
    		'password'=>'nullable|string|min:8',
    		'image'=>'nullable|image'
    	]);

    	 if(request('image')){

            $imagePath = request('image')->store('user','public');

            //dd($imagePath);

            $image = Image::make(public_path("/storage/{$imagePath}"))->fit(1000,1000);

            $imageArray = ['image'=>$imagePath];

            $image->save();

        }

        if(request('password')){
        	$passwordArray = ['password'=>bcrypt(request('password'))];
        }

        $data = array_merge(
            $data,
            $passwordArray ?? [],
            $imageArray ?? []
        );

       //dd($data['gender']);

        User::create([
        	'name'=>$data['name'],
        	'surname'=>$data['surname'],
        	'birthday'=>$data['birthday'],
        	'gender'=>(int)$data['gender'], 
        	'province'=>$data['province'],
        	'phone'=>$data['phone'],
        	'email'=>$data['email'],
        	'department'=>$data['department'],
        	'type'=>(int)$data['type'],
        	'password'=>$data['password'] ?? '',
        	'image'=>$data['image'] ?? ''
        ]);

        return redirect()->back()->with('success','Membre ajouté avec succès.');

		//dd($data);
	}

	public function list()
	{
		$users = User::all();
		return view('admin.members')->with('users',$users);
	}

    public function edit($id)
    {
        $user = User::where('id',$id)->firstOrFail();

        return view('admin.user_form')->with('edit_user',$user);
    }

    public function update($id)
    {
        $data = Request()->validate([
            'name'=>'required|string|max:100|regex:/^[A-Za-z\s-_]+$/',
            'surname'=>'required|string|max:100|regex:/^[A-Za-z\s-_]+$/',
            'birthday'=>'required|date',
            'gender'=>'required|numeric|max:2',
            'province'=>'required|numeric|lt:82|gt:0',
            'phone'=>['required','regex:/^(\+|00){0,1}[0-9]{0,3}(\({1}[0-9]{1,3}\){1}){0,1}[0-9]{1,18}$/'],
            'email'=>'required|email|regex:/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/',
            'department'=>'required',
            'type'=>'required|numeric|max:3',
            'password'=>'nullable|string|min:8',
            'image'=>'nullable|image'
        ]);

         if(request('image')){

            $imagePath = request('image')->store('user','public');

            //dd($imagePath);

            $image = Image::make(public_path("/storage/{$imagePath}"))->fit(1000,1000);

            $imageArray = ['image'=>$imagePath];

            $image->save();

        }

        if(request('password')){
            $passwordArray = ['password'=>bcrypt(request('password'))];
        }

        $data = array_merge(
            $data,
            $passwordArray ?? [],
            $imageArray ?? []
        );

        $data['gender'] = (int)$data['gender'];
        $data['type'] = (int)$data['type'];

       //dd($data['gender']);

        User::where('id',$id)->update($data);

        return redirect()->route('listMember')->with('success','Membre mis a jour avec succes.');
    }
}