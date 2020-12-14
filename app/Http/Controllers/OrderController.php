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
use Carbon\Carbon;

    
class OrderController extends Controller 
{
    public function index()
    {
        $invoiceDetails = DB::table('invoice_details as id')
                ->join('user_invoice_details as uid', 'id.invoice_id', '=', 'uid.id')
                ->join('courses as c','c.id','=','id.course_id')
                ->leftJoin('course_chapters as cc','cc.id','=','id.class_id')
                ->join('users as u','uid.user_id','=','u.id')
                ->where(['uid.status' => 'successful'])
                ->get(['c.title','uid.sub_total', 'uid.status','uid.coupon_id','c.title','id.id','id.course_id','cc.chapter_name','u.fname','u.lname']);

        $learners = DB::table('user_invoice_details as uid')
                        ->rightJoin('invoice_details as id', 'id.invoice_id', '=', 'uid.id')
                        ->where(['uid.status' => 'successful'])
                        ->count('uid.user_id');

        $courses_count = DB::table('invoice_details as id')
                                ->rightJoin('user_invoice_details as uid', 'id.invoice_id', '=', 'uid.id')
                                ->where(['id.class_id'=>0])
                                ->where(['uid.status' => 'successful'])
                                ->groupBy('course_id')
                                ->count('course_id');

        $classes = DB::table('invoice_details as id')
                            ->rightJoin('user_invoice_details as uid', 'id.invoice_id', '=', 'uid.id')
                            ->where('id.class_id','>' , 0 )
                            ->where(['uid.status' => 'successful'])
                            ->count('course_id');

        $total_earning = DB::table('user_invoice_details as uid')
                                ->join('invoice_details as id', 'id.invoice_id', '=', 'uid.id')
                                ->where(['uid.status' => 'successful'])
                                ->sum('uid.sub_total');

        $orders = Order::all();

        return view('admin.order.index', compact('orders','learners','courses_count', 'invoiceDetails','classes','total_earning'));
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
                $data[$i]['chapters'] = $d->class_id?'All Chapters':'Selected Classes'; 
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
        $show = Order::where('id', $id)->first();
        return view('admin.order.view', compact('show', 'setting'));
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
