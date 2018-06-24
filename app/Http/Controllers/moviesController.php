<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movies;
use App\Comment;
use App\Rate;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use DB;
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
      }
      $movies=Movies::where('movie_name', 'like', '%'.$request->input('name').'%')->get();
      return  view('show', compact('movies'));
    }


    public function create()
    {
      return view('movies.addMovie');
    }

    public function store(Request $request)
    {
        //
      if($request->hasFile('file')){
        $file = $request->file('file');
        $image=time().".".$request->file->extension();
        $file->move("uploads" ,$image);
      }
      $movie= new  Movies;
      $movie->movie_name=$request->input('movie_name');
      $movie->price=$request->input('price');
      $movie->genere=$request->input('genere');
      $movie->description=$request->input('description');
      $movie->image=$image;

      $movie->save();
        return request()->all();
    }

    public function reserve(Request $request, $id)
    {
      DB::transaction(function () use($id) {

        $balance=DB::table('users')->find(Auth::user()->id)->balance;
        $price=Movies::find($id)->price;
        $cinema_balance=DB::table('cinema')->find(1)->balance;
        $balance=$balance- $price;
        $cinema_balance=$cinema_balance + $price;
        DB::table('cinema')->update(['balance' => $cinema_balance]);
        //DB::table('users')->find(Auth::user()->id)->update(['balance' => $balance]);
        DB::update('update users set balance = ? where id = ?', [$balance,Auth::user()->id ]);

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
    public function edit($id)
    {
        $movie= Movies::find($id);
        return view('movies.edit', ['movie'=>$movie]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $movie= Movies::find($id);
        $movie->movie_name=$request->input('movie_name');
        $movie->price=$request->input('price');
        $movie->genere=$request->input('genere');
        $movie->description=$request->input('description');
        $movie->save();
        return view('movies.edit', ['movie'=>$movie]);
    }

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
