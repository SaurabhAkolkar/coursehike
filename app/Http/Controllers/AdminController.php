<?php

namespace App\Http\Controllers;

use App\admin;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Categories;
use App\Course;
use App\UserInvoiceDetail;
use App\InvoiceDetail;
use App\UserSubscriptionInvoice;

class AdminController extends Controller
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
    public function index()
    {   
        if(Auth::User()->role == "admin")
        {
            $users = User::where(['status'=>1])->count();
            $categories = Categories::where(['status'=>1])->count();
            $courses = Course::where(['status'=>1])->count();
            $mentor = User::where(['role'=>'mentors'])->count();
            $recent_subscriptions = UserSubscriptionInvoice::with('user')->where(['status'=>'paid'])->groupBy('user_id')->limit(5)->get();
            $recent_courses = InvoiceDetail::with('invoice','course','course.user')
                                                    ->whereHas('invoice', function ($query) {
                                                        $query->where(['status'=>'paid']);
                                                    })
                                                    ->limit(5)
                                                    ->get();
                                                   
            $course_amount = UserInvoiceDetail::where(['status'=>'paid'])->sum('total');
            $subscription_amount = UserSubscriptionInvoice::where([ ['status','paid'], ['invoice_paid', '!=' , 0], ['stripe_subscription_id', '!=' ,'Admin-Purchased'] ])->sum('invoice_paid');
            $total = $course_amount + $subscription_amount;

            return view('admin.dashboard', compact('users','categories','courses','recent_courses','mentor','total','recent_subscriptions'));
        }
        elseif(Auth::User()->role == "mentors")
        {
            return view('instructor.dashboard');
        }
        else
        {
            abort(404, 'Page Not Found.');
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(admin $admin)
    {
        //
    }
}
