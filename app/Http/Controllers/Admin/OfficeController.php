<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator,Redirect,Response;
Use App\User;
use App\Position;
use App\PositionUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;
use Illuminate\Support\MessageBag;

class OfficeController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    public function list()
    {
    	$office_members = User::with('positions')->has('positions')->paginate(5) ;

    	return view('admin.office')->with('office_members',$office_members);
    }

    public function add()
    {
    	$users = User::all();
    	$positions = Position::all();
    	return view('admin.office_form')->with(['users'=>$users,'positions'=>$positions]);
    }

    public function store()
    {
    	$data = Request()->validate([
    		'user'=>'required|numeric',
    		'position'=>'required|numeric'
    	]);

    	$user_id = $data['user'];
    	$position_id = $data['position'];
    	$position = PositionUser::where(['user_id'=>$user_id,'position_id'=>$position_id])->get();

    	if(count($position)>0){
    		$errors = new MessageBag;
        	$errors->add('duplicate_function','Cette fonction a déja été attribué a ce membre.');
        	return redirect()->back()->withErrors($errors)->withInput();
    	}

    	PositionUser::create([
    		'user_id'=>$user_id,
    		'position_id'=>$position_id
    	]);

    	return redirect()->back()->with('success','Membre de bureau ajouté avec succes.');

    }

}
