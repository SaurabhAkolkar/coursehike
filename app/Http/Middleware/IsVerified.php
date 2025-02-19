<?php

namespace App\Http\Middleware;

use Closure;
use App\Setting;
use Auth;

class IsVerified
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

        if(Auth::check())
        {
            if(Auth::user()->role != "admin")
            {
                $setting = Setting::first();
                if($setting->verify_enable == 1)
                {
                    if(Auth::user()->email_verified_at == NULL)
                    { 
                        return redirect()->route('verification.notice');
                    }
                    else{

                        return $next($request);
                    }
                }
                else
                {
                    return $next($request);
                }
            }
            else
            {
                return $next($request);
            }
        }
        else
        {
            return $next($request);
            // return redirect()->route('register');
        }
    }
}
