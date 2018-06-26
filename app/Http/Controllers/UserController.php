<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\User;
use App\Comment;
use App\Movies;
use DB;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $user=Auth::user();
      return view('profile', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function comment()
    {
        $comment=Comment::all();
        return $comment;
    }
    public function users()
    {
        $users=User::all();
        return view('user', compact('users'));
    }
    public function movies()
    {
        $comment=Movies::all();
        return $comment;
    }

    public function show($id)
    {
      $user=User::find($id);
      return view('userUpdate', compact('user'));
    }

    public function destroy($id)
    {
      $user=User::find($id);
      $user->delete();
      session()->flash('message', 'Successfully Deleted');
      return redirect('/admin');
    }

    public function makeAgent($id)
    {
      $user=User::find($id);
      $user->type="agent";
      $user->save();
      session()->flash('message', 'Successfully Created Cinema Agent');
      return redirect('/admin');
    }

    public function getTicket()
    {
      $user = DB::table('ticket')->where('users_id',Auth::user()->id )->get();
      return $user;
    }
}
