<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class Admin
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
      if (Auth::check() && Auth::user()->type == 'admin') {
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
