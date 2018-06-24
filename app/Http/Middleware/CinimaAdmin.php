<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class CinimaAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      if (Auth::check() && Auth::user()->type == 'agent') {
        return $next($request);
      }
      elseif (Auth::check() && Auth::user()->type == 'admin') {
        return redirect('/movies');
      }
      else {
        return redirect('/');
      }
    }
}
