<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movies;
use App\Comment;
use App\Rate;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use DB;
use DateTime;
class moviesController extends Controller
{

    public function index()
    {
        $movies= Movies::all( )->sortByDesc('id', 1);
        return  view('show', compact('movies'));
    }

    public function search(Request $request)
    {
      if($request->input('genere')){
        $movies=Movies::where('genere', $request->input('genere'))->get();
        return  view('show', compact('movies'));
      }elseif ($request->input('popular')) {
        $movies= Movies::all( )->sortByDesc('view', 1);
        return  view('show', compact('movies'));
      }elseif ($request->input('date')) {
        $movies=Movies::where('date', $request->input('date'))->get();
        return  view('show', compact('movies'));
      }else{
        $movies=Movies::where('movie_name', 'like', '%'.$request->input('name').'%')->get();
        return  view('show', compact('movies'));
      }
    }

    public function reserve(Request $request, $id)
    {

      DB::transaction(function () use($id) {
        if(Movies::find($id)->seat>=33){
          session()->flash('message', 'Sorry all are reserved');
          return back();
        }
        $date = new DateTime();
        $balance=DB::table('users')->find(Auth::user()->id)->balance;
        $price=Movies::find($id)->price;
        $movie=Movies::find($id);
        $movie->seat+=1;
        $movie->save();
        $cinema_balance=DB::table('cinema')->find(1)->balance;
        $balance=$balance- $price;
        $cinema_balance=$cinema_balance + $price;
        DB::table('cinema')->update(['balance' => $cinema_balance]);
        //DB::table('users')->find(Auth::user()->id)->update(['balance' => $balance]);
        DB::update('update users set balance = ? where id = ?', [$balance,Auth::user()->id ]);
        DB::table('tickets')->insert([
          'movie_name'=>Movies::find($id)->movie_name,
          'movies_id'=>$id,
          'user_id'=>Auth::user()->id,
          'status'=>"pending",
          'ticket_number'=> $date->getTimestamp()
        ]);
        session()->flash('message', 'Successfully reserved');
      });
      return back();
    }

    public function show($id)
    {
        $movie= Movies::find($id);
        $movie->view+=1;
        $movie->save();
        $average = Rate::where('movies_id', $id)->avg('rate');
        $count = Rate::where('movies_id', $id)->count('rate');
        return view('movies.show', ['movie'=>$movie, 'rate'=>$average, 'count'=>$count]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function comment(Request $request, $id)
    {
        //
      $comment= new  Comment;
      $comment->movies_id=$id;
      $comment->users_id=Auth::user()->id;
      $comment->comment=$request->input('comment');
      $comment->save();
      return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie= Movies::find($id);
        $movie->delete();
        return '/';
    }
    public function rate(Request $request, $id)
    {
      $rate= new  Rate;
      $rate->movies_id=$id;
      $rate->users_id=Auth::user()->id;
      $rate->rate=$request->input('rate');
      $rate->save();
      $average = Rate::where('movies_id', $id)->avg('rate');
      $count = Rate::where('movies_id', $id)->count('rate');
      $rateArray=array('average'=>$average, 'count'=>$count);
      return $rateArray;
    }


}
