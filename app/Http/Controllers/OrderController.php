<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use DB;
use App\Setting;
use App\Course;
use App\User;
use Auth;
use Redirect;
use PDF;
use App\Currency;
use App\BundleCourse;
use Session;
use Crypt;
use Excel;
use App\UserInvoiceDetail;
use App\Exports\UserInvoiceExport;
use App\UserSubscriptionInvoice;
use Carbon\Carbon;

    
class OrderController extends Controller 
{
    public function index()
    {

        // UserPurchasedCourse::
        $total_purchase = UserInvoiceDetail::with('user')->where('status','successful')->get();
        $courses_count = $total_purchase->where('purchase_type','bundle')->count();
        $classes_count = $total_purchase->where('purchase_type','classes')->count();
        $total_earning = $total_purchase->sum('total');
        

        // User Subscription Data:

        $start = new Carbon('first day of last month');
        $end = new Carbon('last day of last month');

        $plan_subscription =  app('rinvex.subscriptions.plan_subscription')::whereBetween('created_at', [$start->startOfMonth(), $end->endOfMonth()])->get();

        $current_monthly_subscriptions = $plan_subscription->whereIn('plan_id', [1, 3])->count();
        $current_yearly_subscriptions = $plan_subscription->whereIn('plan_id', [2, 4])->count();

        
        $current_month_susbcriptions = UserSubscriptionInvoice::where([ ['status','paid'], ['invoice_paid', '!=' , 0], ['stripe_subscription_id', '!=' ,'Admin-Purchased']])->whereBetween('created_at', [$start->startOfMonth(), $end->endOfMonth()])->get();        

        $current_month_susbcription_income = 0;
        foreach ($current_month_susbcriptions as $invoice) {
            if($invoice->invoice_currency == 'INR')
                $current_month_susbcription_income += (int)$invoice->invoice_paid;
        }


        $total_active_monthly_subscriptions = app('rinvex.subscriptions.plan_subscription')->byPlanId(1)->where([ ['ends_at','>', now()], ['trial_ends_at','<', now()] ])->count() + app('rinvex.subscriptions.plan_subscription')->byPlanId(3)->where([ ['ends_at','>', now()], ['trial_ends_at','<', now()] ])->count();
        $total_active_yearly_subscriptions = app('rinvex.subscriptions.plan_subscription')->byPlanId(2)->where([ ['ends_at','>', now()], ['trial_ends_at','<', now()] ])->count() + app('rinvex.subscriptions.plan_subscription')->byPlanId(4)->where([ ['ends_at','>', now()], ['trial_ends_at','<', now()] ])->count();
        $total_trial_subscriptions = app('rinvex.subscriptions.plan_subscription')->findEndingTrial(7)->count();
        

        // UserPurchasedCourse::
        $total_subscription = UserSubscriptionInvoice::where([ ['status', '=', 'paid'],['invoice_paid', '>', 0] ,['stripe_subscription_id', '!=', 'Admin-Purchased'] ])->get();
        // $total_earning = $total_subscription->sum('invoice_paid');
        
        return view('admin.order.index', compact(   'current_month_susbcription_income', 'current_monthly_subscriptions', 'current_yearly_subscriptions',
                                                    'total_trial_subscriptions', 'total_active_monthly_subscriptions', 'total_active_yearly_subscriptions',
                                                    'total_purchase','courses_count', 'classes_count','total_earning'));
    }

    public function getExcel(){

        $invoiceDetails = DB::table('invoice_details as id')
                                ->join('user_invoice_details as uid', 'id.invoice_id', '=', 'uid.id')
                                ->join('courses as c','c.id','=','id.course_id')
                                ->leftJoin('course_chapters as cc','cc.id','=','id.class_id')
                                ->join('users as u','uid.user_id','=','u.id')
                                ->where(['uid.status' => 'successful'])
                                ->get(['c.title','uid.sub_total', 'uid.created_at','uid.status', 'class_id','uid.coupon_id','c.title','id.id','id.course_id','cc.chapter_name','u.fname','u.lname']);

        $data = [];
        $i = 0;
        foreach($invoiceDetails as $d){
                $data[$i]['Sr#'] = $i+1 ;
                $data[$i]['title'] = json_decode($d->title)->en; 
                $data[$i]['user_name'] = $d->fname.' '.$d->lname;
                $data[$i]['chapters'] = $d->class_id==0?'All Classes':'Selected Classes'; 
                $data[$i]['coupon_appied'] = $d->coupon_id==null?'No':'Yes'; 
                $data[$i]['sub_total'] = '$ '.$d->sub_total;
                $data[$i]['date'] = Carbon::parse($d->created_at)->format('d/m/Y');
                $i++;
        }
      
        $export = new UserInvoiceExport($data);
        ob_end_clean(); // this
        ob_start(); // and this
        return Excel::download($export, 'invoice.xlsx');
    }
    public function create()
    {
        $users = User::all();
        $courses = Course::all();
        return view('admin.order.create', compact('users', 'courses'));
    }

    public function purchasedCourses(){
        
        $purchased_courses = UserInvoiceDetail::with('user','coupon')->get();

        return view('admin.order.purchased_courses',compact('purchased_courses'));
    }

    public function store(Request $request)
    {
        $created_order = Order::create([
            'course_id' => $request->course_id,
            'user_id' => $request->user_id,
            'instructor_id' => $request->user_id,
            'payment_method' => 'Admin Enroll',
            'created_at'  => \Carbon\Carbon::now()->toDateTimeString(),
            ]
        );

        Session::flash('success','Enrolled Successfully !');
        return redirect('order');
    }

    public function destroy($id)
    {
        DB::table('orders')->where('id',$id)->delete();
        DB::table('pending_payouts')->where('order_id',$id)->delete();
        return back();
    }

    public function vieworder($id)
    {
        $setting = Setting::first();
        $show = UserInvoiceDetail::with('details','details.course','details.bundle','details.bundle.user','details.course.user','user','user.state','user.country')->where('id', $id)->first();
       
        return view('admin.order.view', compact('show', 'setting'));
    }

    public function updateDollarPrice(Request $request){
        
        $this->validate($request, [
            'price' => 'required',
        ]);

        $setting = Setting::first();
        $setting->dollar_price = $request->price;
        $setting->save();

        return redirect()->back()->with('success','Dollar Price updated successfully.');
    }

    public function purchasehistory()
    {
        $course = Course::all();
        $orders = Order::all();
        if(Auth::check())
        {
            return view('front.purchase_history.purchase',compact('orders', 'course'));
        }
        return Redirect::route('login')->withInput()->with('delete', 'Please Login to access restricted area.'); 
    }

    public function invoice($id)
    {
        $course = Course::all();
        $Bundle = BundleCourse::all();
        $orders = Order::where('id', $id)->first();

        $bundle_order = BundleCourse::where('id', $orders->bundle_id)->first();

        if(Auth::check())
        {
            return view('front.purchase_history.invoice',compact('orders', 'course', 'Bundle', 'bundle_order')); 
        }

        return Redirect::route('login')->withInput()->with('delete', 'Please Login to access restricted area.'); 
    }

    public function pdfdownload($id){
        $course = Course::all();
        $orders = Order::where('id', $id)->first();

        $bundle_order = BundleCourse::where('id', $orders->bundle_id)->first();

        $pdf = PDF::loadView('front.purchase_history.download', compact('orders','course', 'bundle_order'))->setPaper('a4', 'landscape');
        return $pdf->download('invoice.pdf');
        // return $pdf->stream();

    }

    
}
