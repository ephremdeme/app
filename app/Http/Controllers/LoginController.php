<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class LoginController extends Controller
{
    //
    public function __construct(){
      $this->middleware('guest', ['except'=>'logout']);
    }

    protected $redirectTo = '/';

    protected function redirectTo()
    {
        return redirect('/');
    }

    public function create(){
      return view('login');
    }

    public function logout(){
      auth()->logout();
      return redirect()->home();
    }
    public function login(){

      if(!auth()->attempt(request( ['email', 'password']))){
        session()->flash('message', 'Incorrect password or username! Please try again.');
        return back();
      }
      session()->flash('message', 'Login Successfully');
      return redirect()->home();
    }

    public function home(){
      redirect('/');;
    }

}
