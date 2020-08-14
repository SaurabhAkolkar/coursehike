<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminIntructor
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
        if(Auth::user()->role == "admin" || Auth::user()->role == "instructor")
        {
            return $next($request);  
        }
        else{
            abort(404, 'Page Not Found.');
        }
    }
}
