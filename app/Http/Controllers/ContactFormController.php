<?php

namespace App\Http\Controllers;

use App\ContactUs;
use Illuminate\Http\Request;
use App\Helper\SendMailHelper;
use App\Mail\MessageRequested;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
	public function store()
	{

		$data = Request()->validate([
			'name' => 'required',
			'surname' => 'required',
			'phone' => '',
			'email' => 'required|email',
			'subject' => 'required|string',
			'message' => 'required|string|min:5'
		]);

		
	 	$contactUs= ContactUs::create([
			'name' => $data['name'],
			'surname' => $data['surname'],
			'phone' => $data['phone'],
			'email' => $data['email'],
			'subject' => $data['subject'],
			'message' => $data['message']
		]);

		$receivers =["olvanotpoint@gmail.com","jean.chrinot@gmail.com","edinogeraldinbelalahy@gmail.com"];

		Mail::to($receivers)->send(new MessageRequested($contactUs));

		return redirect()->back()->with('success', 'Votre message a été envoyé!');
	}

}
