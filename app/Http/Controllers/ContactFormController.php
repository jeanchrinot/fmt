<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactUs;

class ContactFormController extends Controller
{
    	public function store()
    {

    	$data = Request()->validate([
    		'name'=>'required',
    		'surname'=>'required',
    		'phone'=>'',
    		'email'=>'required|email',
    		'subject'=>'required|string',
    		'message'=>'required|string|min:5'
    	]);

    		//dd($data);
    		ContactUs::create([
    		'name'=>$data['name'],
    		'surname'=>$data['surname'],
    		'phone'=>$data['phone'],
    		'email'=>$data['email'],
    		'subject'=>$data['subject'],
    		'message'=>$data['message']
    		]);

    		return redirect()->back()->with('success','Votre message a été envoyé!');
    	
    	

    	// \App\Post::create($data);
    	// dd($data);
    }
}
