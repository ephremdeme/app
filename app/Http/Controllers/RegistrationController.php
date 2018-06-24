<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class RegistrationController extends Controller
{
    //

    public function __construct(){
      $this->middleware('guest');
    }
    protected $redirectTo ='/';
    protected function redirectTo()
    {
        return redirect('home');
    }
    public function create(){
      return view('signup');
    }

    public function store(Request $request){
      if($request->hasFile('file')){
        $file = $request->file('file');
        $image=time().".".$request->file->extension();
        $file->move("uploads" ,$image);
      }
      $user=new User;
      $user->email=$request->input('email');
      $user->image=$image;
      $user->password=$request->input('password');
      $user->balance=$request->input('balance');
      $user->name=$request->input('name');
      $user->save();
      auth()->login($user);
      session()->flash('message', 'Acount Created sucessfully');
      return redirect()->home();
    }
    public function home(){
      redirect('/');;
    }
}
