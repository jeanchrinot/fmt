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
 
class AdminController extends Controller
{
    public function login()
    {
        //session()->put('previousUrl',url()->previous());

        if(Auth::check()){
            return view('admin.dashboard');
        }

        return view('admin.login');
    }  


    // public function showLoginForm()
    // {
    //     session()->put('previousUrl',url()->previous());
    //     return view('auth.login');
    // }
 
    public function register()
    {
        return view('register');
    }
     
    public function auth(Request $request)
    {

        request()->validate([
        'email' => 'required',
        'password' => 'required',
        ]);
 
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('admin/dashboard');
        }

        $errors = new MessageBag;
        $errors->add('auth_failed','Email or password invalid.');

        return redirect()->route("adminLogin")->withErrors($errors);

        //return Redirect::to("admin/login")->with('errMessage','Oppes! You have entered invalid credentials');
        //return Redirect::back()->withInput()->withFlashMessage('Username or password incorrect');
    }
 
    public function postRegister(Request $request)
    {  
        request()->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6',
        ]);
         
        $data = $request->all();
 
        $check = $this->create($data);
       
        return Redirect::to("admin/dashboard")->withSuccess('Great! You have Successfully loggedin');
    }
     
    public function dashboard(Request $request)
    {
        $path = $request->path();
        $path = explode('/',$path);

        $currentPath = $path[1];

        $data = $this->getData($currentPath);

        //dd($data);

        //dd($currentPath);
 
      if(Auth::check()){

        return view('admin.dashboard')->with('data',$data);
      }
       return Redirect::to("admin/login")->with('errMessage','Oups! You do not have access');
    }
 
    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }
     
    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('admin/login');
    }


    protected function getData($path){
        $data = [];
        switch($path){
            case "dashboard": 
                $messages = ContactUs::all(); $data['messages']=$messages;
                $users = User::all(); $data['users']=$users;
                $office_members = User::with('positions')->has('positions')->get(); $data['office_members'] = $office_members;
                break;
        }

        return $data;
    }
}