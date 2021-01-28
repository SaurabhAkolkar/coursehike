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
use App\UserSubscription;
use App\UserPurchasedCourse;
use App\CourseChapter;
use Illuminate\Support\Str;
use App\UserInvoiceDetail;
use Carbon\Carbon;
use App\UserSubscriptionInvoice;
use Illuminate\Support\Facades\Storage;
use App\Mail\PasswordReset;
use Illuminate\Support\Facades\Mail;
use DB;
use App\Setting;

class UserController extends Controller
{

    // public function __construct()
    // {
    //     return $this->middleware('auth');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function viewAllUser()
    {
        $users = User::with('country')->get();
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function subscriptions($id){

        $subscriptions = UserSubscription::with('subscriptionDetails')->where('user_id', $id)->get();
        $courses_purchased =  UserPurchasedCourse::with('course')->where('user_id', $id)->get();
        $user_id = $id;
  
        return view('admin.user.subscriptions', compact('subscriptions','courses_purchased','user_id'));

    }

    public function addCourse($id){
        $user_id = $id;
        $courses = Course::where(['status'=>1])->get();
        
        return view('admin.user.addcourse', compact('user_id','courses'));
    }

    public function getClasses(Request $request){
        $course_id = $request->course_id;
        $classes = CourseChapter::where(['course_id'=>$course_id])->pluck('chapter_name','id');
        
        return $classes;
    }

    public function addUserCourse(Request $request){
        $request->validate([
                'course_id' => 'required',
                'purchase_type' => 'required',
                'amount' => 'required',
        ]);
         
        $check = UserPurchasedCourse::where(['course_id'=>$request->course_id, 'user_id'=>$request->user_id])->get();
        
        if(count($check) > 0){
            return redirect()->back()->with('delete','Course is already added for the User.');
        }
        if($request->purchase_type == 'selected_classes'){
            if($request->class_id ==  null){
                return back()->withErrors(['class_id'=> 'classes are required']);
            }
        }
        else if($request->purchase_type == 'all_classes'){
            $request->class_id = CourseChapter::where(['course_id'=>$request->course_id])->pluck(['id']);
        }   

                $random = Str::of(Str::orderedUuid())->upper()->explode('-');
               
                $insert['invoice_id'] = '#LILA-'. date('m-d') . '-'. $random[0]. '-'. $random[1];
                $insert['user_id'] = $request->user_id;
                $insert['discount_type'] = 'regular_discount';
                $insert['purchase_type'] = $request->puchase_type;
                $insert['status'] = 'successful';
                $insert['sub_total'] = $request->amount;
                
                $get_order_id = UserInvoiceDetail::create($insert);
               
                $order['order_id'] = 1;
                $order['user_id'] = $request->user_id;
                $order['course_id'] = $request->course_id;
                $classes = array_values($request->class_id);
                $order['class_id'] = json_encode($classes);
                $order['purchase_type'] = $request->puchase_type;
                

                UserPurchasedCourse::create($order);

                return redirect('/user/subscriptions/'.$request->user_id)->with('success','Courses added successfully.');

    }

    public function addSubscription($id){
        $user_id = $id;

        return view('admin.user.addsubscription', compact('user_id'));
    }

    public function storeSubscription(Request $request){
        
        $request->validate([
            'start_date' => 'required',
            'end_date' => 'required',
            'amount' => 'required',
        ]);
            $start_date = Carbon::parse($request->start_date);
            $end_date = Carbon::parse($request->end_date);
            $diff = $start_date->diffInDays($end_date);

            if(round($diff/30) <= 1)
                $plan_id = 'price_1Hk3QlE6m1twc6cGzy7K0Xwh';
            else if(round($diff/30) <= 3 )
                $plan_id = 'price_1HyL7FE6m1twc6cGxmT4KI6G';
            else if(round($diff/30) <= 12)
                $plan_id = 'price_1Hk3Q8E6m1twc6cGJjmdFY17';

            $input['user_id'] = $request->user_id;
            $input['stripe_subscription_id'] = 'Admin-Purchased';
            $input['payment_id'] = $plan_id;
                
            $subscription = UserSubscription::create($input);

            $input['subscription_id'] = $subscription->id;
            $input['start_date'] = $start_date->format('Y-m-d h:i:s');
            $input['end_date'] = $end_date->format('Y-m-d h:i:s');
            $input['stripe_subscription_id'] = 'Admin-Purchased';
            $input['stripe_invoice_id'] = $plan_id;
            $input['invoice_charge_id'] = $plan_id;
            $input['invoice_charge_id'] = $plan_id;
            $input['payment_intent_id'] = $plan_id;
            $input['invoice_paid'] = $request->amount;
            $input['status'] = 'successful';

            UserSubscriptionInvoice::create($input);

        return redirect('/user/subscriptions/'.$request->user_id)->with('success','Subscription added successfully.');
    }
    public function create()
    {
        $cities = Allcity::all();
        $states = Allstate::all();
        $countries = Allcountry::get();

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

        if ($file = $request->file('user_img')) {
            $photo = Image::make($file);

            $file_name = time().rand().'.'.$file->getClientOriginalExtension();
            Storage::put(config('path.profile').$file_name, $photo->stream() );
            $input['user_img'] = $file_name;
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
        
        $user = User::findorfail($id);
        $cities = Allcity::where(['state_id'=>$user->id])->get();
        $states = State::all();
        $countries = Allcountry::get();
      
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
              'mobile' => 'required|integer|min:10',
          ]);

        if($request->dob){
            $dob = Carbon::parse($request->dob);
            $now = Carbon::now();

            $diff = $dob->diffInDays($now);
            if(round($diff/365) < 18){
                return redirect()->back()->with('success','Date of birth is invalid.');
            }
        }
        $input = $request->all();

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

        if(isset($request->status))
        {
            $input['status'] = '1';
        }
        else
        {
            $input['status'] = '0';
        }

        $user->update($input);
        if($user->id == Auth::user()->id)
        {
            Session::flash('success','Profile Updated Successfully !');
            return redirect()->back();
        }else{
            Session::flash('success','User Updated Successfully !');
        }
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
        $input['category_id'] = $request->interets;
        $input['category_id']=explode(",",$input['category_id']);
        $input['course_id_all']=array_filter($input['category_id']);
        UserInterest::where('user_id', Auth::User()->id)->delete();
        foreach($input['course_id_all'] as $c){
            $input['category_id'] = $c; 
            $check = UserInterest::where(['user_id'=>Auth::User()->id, 'category_id'=>$c])->first();

            if(!$check){
                UserInterest::create($input);
            }
        }
        return redirect('/');

    }

    public function addMyInterests(Request $request){

        if($request->category_id){
            $check = UserInterest::where(['user_id'=> Auth::User()->id, 'category_id' => $request->category_id])->first();

            if($check){
                return 'Interest is already added.';
            }
            $myInterests = UserInterest::create(['user_id'=>Auth::User()->id, 'category_id' => $request->category_id]);

            return 'Interest added Successfully';
        }        
        return 'No course selected';
    }

    public function removeInterest(Request $request){

        if($request->category_id){
   
            $myInterests = UserInterest::where(['user_id'=>Auth::User()->id, 'category_id' => $request->category_id])->delete();

            return 'Interest removed Successfully';
        }        
        return 'No course selected';
    }

    public function myInterests(){
        $myInterests = UserInterest::with('category')->where('user_id',Auth::User()->id)->get();
        $coursesId = $myInterests->pluck('category_id');


        if(count($coursesId)){
            $otherCategories = Categories::where('status',1)->whereNotIn('id', $coursesId)->get();
        }else{
            $otherCategories = Categories::where('status',1)->get();
        }
     // dd($myInterests);
        return view('learners.pages.my-interests',compact('myInterests','otherCategories'));
    }


    public function verifyEmail($id, $hash, Request $request){


        $user = User::where([ 'id' => $id ,'token' => $hash])->first();  

        if($user){
            if(Carbon::createFromTimestamp($request->expiry)->gt(Carbon::now())){

                $user->email_verified_at = Carbon::now()->format('Y-m-d h:i:s');
                $user->token = null;
                $user->save();

                return redirect('/')->with('success','Email verified successfully.');

            }else{
                return redirect('/')->with('success','Email expired. Please send another one.');
            }
         
        }
        
        return redirect('/')->with('success','Email expired. Please send another one.');
        
    }

    public function resetPasswordMail(Request $request){

        $token = sha1(uniqid(rand(), true));
        $setting = Setting::first();
        
        DB::table('password_resets')->insert(['email'=>$request->email, 'token' => Hash::make($token), 'created_at' => Carbon::now()->toDateTimeString() ]);
        $email = $request->email;

        if($setting->w_email_enable == 1){
            try{
               
                Mail::to($request->email)->send(new PasswordReset($email, $token));
               
            }
            catch(\Swift_TransportException $e){

                header( "refresh:5;url=./login" );
                
                dd("Your Registration is successfull ! but welcome email is not sent because your webmaster not updated the mail settings in admin dashboard ! Kindly go back and login");

            }
        }

        return redirect()->back()->with('success','Password reset link sent successfully.');

    }
    
}
