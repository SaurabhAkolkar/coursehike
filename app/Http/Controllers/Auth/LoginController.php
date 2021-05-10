<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Socialite;
use App\User;
use DB;
use App\Mail\UserLogged;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected function authenticated(Request $request, User $user)
    {
        if (Auth::User()->role == "user")
            auth()->logoutOtherDevices($request->password);

        Mail::to($user->email)->later(now()->addSeconds(5), new UserLogged($user));

        if (Auth::User()->status == 1)
        {
            if (Auth::User()->role == "admin")
                return redirect()->route('admin.index');
            else if (Auth::User()->role == "mentors")
                return redirect()->route('instructor.index');
            else
                return redirect('/');
        }
        else{
            Auth::logout();
            return redirect()->route('login')->with('delete','You are deactivated !');
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function socialLogin($social)
    {
        return Socialite::driver($social)->redirect();
    }

    public function handleProviderCallback($social)
    {
        $userSocial = Socialite::driver($social)->user();
        $user = User::where(['email' => $userSocial->getEmail()])->first();

        // set the remember me cookie if the user check the box
        $remember = (Input::has('remember')) ? true : false;

        // attempt to do the login
        $auth = Auth::attempt(
            [
                'email'  => strtolower(Input::get('email')),
                'password'  => Input::get('password')
            ], $remember
        );

        if ($user) {
            Auth::login($user);
            return redirect()-> action('HomeController@index');
        }
        else {
            return view('auth.register', ['name'=> $userSocial->getName(),
                                            'email' => $userSocial->getEmail()]);
        }
    }
}
