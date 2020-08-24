<?php
 
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contact;
use Illuminate\Support\MessageBag;

class ContactController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    public function show($id)
    {
    	$contact = Contact::where('id',$id)->firstOrFail();
    	return view('admin.contacts')->with('contact',$contact);
    }
    public function edit($id)
    {
    	$contact = Contact::where('id',$id)->firstOrFail();
    	return view('admin.contact_form')->with('contact',$contact);
    }

    public function update($id)
    {
    	$data = Request()->validate([
    		'phone'=>['required','regex:/^(\+|00){0,1}[0-9]{0,3}(\({1}[0-9]{1,3}\){1}){0,1}[0-9]{1,18}$/'],
    		'phone2'=>['nullable','regex:/^(\+|00){0,1}[0-9]{0,3}(\({1}[0-9]{1,3}\){1}){0,1}[0-9]{1,18}$/'],
    		'phone3'=>['nullable','regex:/^(\+|00){0,1}[0-9]{0,3}(\({1}[0-9]{1,3}\){1}){0,1}[0-9]{1,18}$/'],
    		'fax'=>['nullable','regex:/^(\+|00){0,1}[0-9]{0,3}(\({1}[0-9]{1,3}\){1}){0,1}[0-9]{1,18}$/'],
    		'email'=>'required|email|regex:/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/',
    		'email2'=>'nullable|email|regex:/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/',
    		'address'=>'required'
    	]);

    	Contact::where('id',$id)->update($data);

    	return redirect()->route('contact.show',['id'=>$id])->with('success','Contact modifié avec succès.');

    }
}