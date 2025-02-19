<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckCreator
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
        if(Auth::user()->role == "mentors" || Auth::user()->role == "admin" ){
            return redirect()->back()->with('message','You are already a Mentor');
        }
        return $next($request);
    }
}
