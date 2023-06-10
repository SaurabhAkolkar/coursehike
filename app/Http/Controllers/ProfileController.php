<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Allstate;
use App\Allcity;
use App\Allcountry;
use Auth;
use Session;
use Image;
use Illuminate\Support\Facades\Storage;
use Hash;
use App\User;

class ProfileController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

       /**
     * Displaying Current Profile.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $cities = [];
        $states = Allstate::pluck('name','id')->all();
        $countries = Allcountry::pluck('name','id')->all();

        if(Auth::user()->state_id != null){
               $cities = Allcity::where('state_id', Auth::user()->state_id)->pluck('name','id')->all();
        }

        if(Auth::user()->country_id != null){
            $states = Allstate::where('country_id', Auth::user()->country_id)->pluck('name','id')->all();
        }

        return view('learners.pages.profile')->with(['cities' => $cities, 'states' => $states, 'countries' => $countries]);
    }
     /**
     * Update the user profile in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(Request $request)
    {

        $user = Auth::user();

        $request->validate([
            //   'email' => 'required|email|unique:users,email,'.$user->id,
              'first_name' => 'required|min:3',
              'last_name' => 'required|min:3',
              'gender' => 'required',
              'dob' => 'required',
              'mobile' => 'required|min:10',
              'address' => 'required|min:6',
              'country' => 'required',
              'state' => 'required',
              'city' => 'required',
              'zipcode' => 'required',
              'user_img' => 'max:5000|mimes:jpg,jpeg,png',
          ]);
       //   dd($request->all());
        $input['fname'] = $request->first_name;
        $input['lname'] = $request->last_name;
        $input['gender'] = $request->gender;
        $input['dob'] = $request->dob;
        $input['address'] = $request->address;
        $input['country_id'] = $request->country;
        $input['state_id'] = $request->state;
        $input['city_id'] = $request->city;
        $input['pin_code'] = $request->zipcode;
        $input['detail'] = $request->short_bio;
        $input['mobile'] = $request->mobile;

            if ($file = $request->file('user_img')) {

                if ($user->user_img != null) {
                    $exists = Storage::exists(config('path.profile').$user->user_img);
                    if ($exists)
                        Storage::delete(config('path.profile').$user->user_img);
                }


                $photo = Image::make($file);

                $file_name = time().rand().'.'.$file->getClientOriginalExtension();
                Storage::put(config('path.profile').$file_name, $photo->stream() );
                $input['user_img'] = $file_name;
            }

        if(isset($request->update_pass)){

            $input['password'] = Hash::make($request->password);
        }
        else{
            $input['password'] = $user->password;
        }

        $user->update($input);

        Session::flash('message','User Updated Successfully !');
        return redirect('/profile');
    }

    public function updatePassword(Request $request){

        $user = User::where('id',Auth::user()->id)->firstOrFail();
        $request->validate([
            'new_password' => 'required|min:6',
            'current_password' => 'required|min:6',
        ]);

        if(Hash::check($request->current_password, $user->password) || $user->password == ""){
            $input['password'] = Hash::make($request->new_password);
            $user->password= $input['password'];
            User::where('id',Auth::user()->id)->update(['password'=>$input['password']]);
        }else{
            Session::flash('message','Current Password does not match.');
            return redirect('/profile');
        }
        Session::flash('message','Password Updated Successfully.');
        return redirect('/profile');
    }
}
