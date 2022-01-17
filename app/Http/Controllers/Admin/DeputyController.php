<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator,Redirect,Response;
Use App\User;
use App\Deputy;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;
use Illuminate\Support\MessageBag;

class DeputyController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    public function list()
    {
    	$deputies = User::with('deputies')->has('deputies')->paginate(5);

    	return view('admin.deputy')->with('deputies',$deputies);
    }

    public function add()
    {
    	$users = User::all();
    	return view('admin.deputy_form')->with(['users'=>$users]);
    }

    public function store()
    {
    	$data = Request()->validate([
    		'user'=>'required|numeric',
    		'province'=>'required|numeric'
    	]);

    	$user_id = $data['user'];
    	$province = $data['province'];
    	$deputy = Deputy::where(['user_id'=>$user_id,'province'=>$province])->get();

    	if(count($deputy)>0){
    		$errors = new MessageBag;
        	$errors->add('duplicate_item','Cette combination Député et Ville existe déjà.');
        	return redirect()->back()->withErrors($errors)->withInput();
    	}

    	Deputy::create([
    		'province'=>$province
    	])->user()->associate($user_id)->save();

    	return redirect()->back()->with('success','Député ajouté avec succès.');

    }

}
