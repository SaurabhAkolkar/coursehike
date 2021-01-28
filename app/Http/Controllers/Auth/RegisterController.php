<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Mail\WelcomeUser;
use Illuminate\Support\Facades\Mail;
// use App\Http\Controllers\ZohoController;
use App\Setting;
use Carbon\Carbon;
use Redirect;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/interests';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct(ZohoController $ZohoController)
    // {
    //     $this->ZohoController = $ZohoController;
    //     $this->middleware('guest');
    // }

    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {   
        
        $setting = Setting::first();

        if($setting->captcha_enable == 1){

            return Validator::make($data, [
                'fname' => ['required', 'string', 'max:255'],
                'lname' => ['required', 'string', 'max:255'],
                'mobile' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:6'],
                // 'g-recaptcha-response' => 'required|captcha',
            ]);
        }
        else{

            return Validator::make($data, [
                'fname' => ['required', 'string', 'max:255'],
                'lname' => ['required', 'string', 'max:255'],
                'mobile' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:6'],
            ]);

        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $setting = Setting::first();

        // if($setting->mobile_enable == 1)
        // {
        //     $mobile = $data['mobile'];
        // }
        // else
        // {
        //     $mobile = NULL;
        // }

        // if($setting->verify_enable == 0)
        // {
        //     $verified = \Carbon\Carbon::now()->toDateTimeString();
        // }
        // else
        // {
            $verified = NULL;
            $token = sha1(uniqid(rand(), true));
        // }

                
        $user = User::create([

            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'email' => $data['email'],
            'mobile' => $data['mobile'],
            'email_verified_at'  => $verified,
            'dob' => $data['dob'],
            'token' => $token,
            'password' => Hash::make($data['password']),
        ]);

    // $zohoData = [];
        // $zohoData['email'] = $data['email'];
        // $zohoData['mobile'] = $data['mobile'];
        // $zohoData['name'] = $data['fname'].' '.$data['lname'];
        // $response = $this->ZohoController->createRecords($zohoData);
      
        if($setting->w_email_enable == 1){
            try{
               
                Mail::to($data['email'])->send(new WelcomeUser($user));
               
            }
            catch(\Swift_TransportException $e){

                header( "refresh:5;url=./login" );
                
                dd("Your Registration is successfull ! but welcome email is not sent because your webmaster not updated the mail settings in admin dashboard ! Kindly go back and login");

            }
        }

        return $user;
    }
}
