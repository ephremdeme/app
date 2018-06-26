<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class User
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
      if (Auth::check() && Auth::user()->type == 'user') {
        return $next($request);
      }
      elseif (Auth::check() && Auth::user()->type == 'agent') {
        return redirect('/');
      }
      else {
        return redirect('/');
      }
    }
}
