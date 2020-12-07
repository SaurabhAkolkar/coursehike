<?php

namespace App\Http\Controllers;

use App\User;
use App\Allstate;
use App\Allcity;
use App\Allcountry;
use Illuminate\Http\Request;
use Hash;
use Session;
use Image;
use Auth;
use App\Wishlist;
use App\Cart;
use App\Order;
use App\ReviewRating;
use App\Question;
use App\Answer;
use App\State;
use App\City;
use App\Country;
use App\Course;
use App\Meeting;
use App\BundleCourse;
use App\BBL;
use App\Instructor;
use App\CourseProgress;
use App\Categories;
use App\UserInterest;


class UserController extends Controller
{

    public function __construct()
    {
        return $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function viewAllUser()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $cities = Allcity::all();
        $states = Allstate::all();
        $countries = Country::all();
        return view('admin.user.adduser')->with(['cities' => $cities, 'states' => $states, 'countries' => $countries]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'fname' => 'required',
            'lname' => 'required',
            'mobile' => 'required|regex:/[0-9]{9}/',
            'address' => 'required|max:2000',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6|max:20',
            'role' => 'required',
        ]);


        $input = $request->all();
        if ($file = $request->file('user_img')) 
        {            
            $optimizeImage = Image::make($file);
            $optimizePath = public_path().'/images/user_img/';
            $image = time().$file->getClientOriginalName();
            $optimizeImage->save($optimizePath.$image, 72);
            $input['user_img'] = $image;
            
        }

        $input['password'] = Hash::make($request->password);
        $input['detail'] = $request->detail;
        $input['email_verified_at'] = \Carbon\Carbon::now()->toDateTimeString();           
        $data = User::create($input);
        $data->save(); 

        Session::flash('success','User Added Successfully !');
        return redirect('user');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */

    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cities = City::all();
        $states = State::all();
        $countries = Country::all();
        $user = User::findorfail($id);
        return view('admin.user.edit',compact('cities','states','countries','user'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

        $user = User::findorfail($id);

        $request->validate([
              'email' => 'required|email|unique:users,email,'.$user->id,
          ]);

        $input = $request->all();
        

        if ($file = $request->file('user_img')) {

            if($user->user_img != null) {
                $content = @file_get_contents(public_path().'/images/user_img/'.$user->user_img);
                if ($content) {
                  unlink(public_path().'/images/user_img/'.$user->user_img);
                }
            }

            $optimizeImage = Image::make($file);
            $optimizePath = public_path().'/images/user_img/';
            $image = time().$file->getClientOriginalName();
            $optimizeImage->save($optimizePath.$image, 72);
            $input['user_img'] = $image;
          
        }


        if(isset($request->update_pass)){
          
            $input['password'] = Hash::make($request->password);
        }
        else{
            $input['password'] = $user->password;
        }

        if(isset($request->status))
        {
            $input['status'] = '1';
        }
        else
        {
            $input['status'] = '0';
        }

        $user->update($input);

        Session::flash('success','User Updated Successfully !');
        return redirect()->route('user.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $user = User::find($id);

        if(config('app.demolock') == 0){

            if ($user->user_img != null)
            {
                    
                $image_file = @file_get_contents(public_path().'/images/user_img/'.$user->user_img);

                if($image_file)
                {
                    unlink(public_path().'/images/user_img/'.$user->user_img);
                }
            }

            $value = $user->delete();
            Course::where('user_id', $id)->delete();
            Wishlist::where('user_id', $id)->delete();
            Cart::where('user_id', $id)->delete();
            Order::where('user_id', $id)->delete();
            ReviewRating::where('user_id', $id)->delete();
            Question::where('user_id', $id)->delete();
            Answer::where('ans_user_id', $id)->delete();
            Meeting::where('user_id', $id)->delete();
            BundleCourse::where('user_id', $id)->delete();
            BBL::where('instructor_id', $id)->delete();
            Instructor::where('user_id', $id)->delete();
            CourseProgress::where('user_id', $id)->delete();

            if($value)
            {
                session()->flash("delete","User Has Been Deleted");
                return redirect("user");
            }
        }
        else
        {
            return back()->with('delete','You can\'t delete Users in Demo');
        }
    }

    public function getInterests(){
            $categories = Categories::where('status',1)->get();
            return view('learners.auth.interests', compact('categories'));
    }
    public function storeInterest(Request $request){

        $input['user_id'] = Auth::user()->id;
        $input['course_id'] = $request->interets;
        $input['course_id']=explode(",",$input['course_id']);
        $input['course_id_all']=array_filter($input['course_id']);
        UserInterest::where('user_id', Auth::User()->id)->delete();
        foreach($input['course_id_all'] as $c){
            $input['course_id'] = $c; 
            $check = UserInterest::where(['user_id'=>Auth::User()->id, 'course_id'=>$c])->first();

            if(!$check){
                UserInterest::create($input);
            }
        }
        return redirect('/');

    }
    
}
