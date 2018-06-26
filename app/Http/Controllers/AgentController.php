<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movies;
use App\Comment;
use App\Rate;
use App\Ticket;
use App\Usercomment;
class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $movies= Movies::all( )->sortByDesc('id', 1);
      return  view('Agentshow', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('movies.addMovie');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
       $movie->date=$request->input('date');
       $movie->time=$request->input('time');
       $movie->description=$request->input('description');
       $movie->image=$image;

       $movie->save();
       return redirect('/');
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $movie= Movies::find($id);
      $movie->view+=1;
      $movie->save();
      $average = Rate::where('movies_id', $id)->avg('rate');
      $count = Rate::where('movies_id', $id)->count('rate');
      return view('movies.AgentShow', ['movie'=>$movie, 'rate'=>$average, 'count'=>$count]);
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
      return redirect('/agent');
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
        session()->flash('message', 'Successfully Deleted');

        return redirect('/agent');
    }

    public function approve($id)
    {
      $ticket=Ticket::find($id);
      $ticket->status="approved";
      $ticket->save();
      session()->flash('message', 'Ticket Approved Successfully');
      return redirect('/agent');
    }

    public function ticket()
    {
      $tickets=Ticket::all();

      return view('ticket', compact('tickets'));
    }

    public function comment()
    {
      // code...
      $comments= Usercomment::all( )->sortByDesc('id', 1);
      return  view('comments', compact('comments'));
    }
    public function commentDelete($id)
    {
      $comment=Comment::find($id);
      $comment->delete();
      session()->flash('message', 'Comment Deleted Successfully');
      return back();
    }
}
