<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\InvoiceDetail;
use App\UserInvoiceDetail;
use DB;

class InstructorRevenueController extends Controller
{
    public function instructorRevenue(){
        
        $courses = Course::where(['user_id'=>Auth()->user()->id])->pluck('id');

        $invoiceDetails = DB::table('invoice_details as id')
                                ->join('user_invoice_details as uid', 'id.invoice_id', '=', 'uid.id')
                                ->join('courses as c','c.id','=','id.course_id')
                                ->leftJoin('course_chapters as cc','cc.id','=','id.class_id')
                                ->join('users as u','uid.user_id','=','u.id')
                                ->whereIn('id.course_id',$courses)
                                ->where(['uid.status' => 'successful'])
                                ->get(['c.title','uid.sub_total', 'id.id','id.course_id','cc.chapter_name','u.fname','u.lname']);

        $learners = DB::table('user_invoice_details as uid')
                        ->rightJoin('invoice_details as id', 'id.invoice_id', '=', 'uid.id')
                        ->whereIn('id.course_id',$courses)
                        ->where(['uid.status' => 'successful'])
                        ->count('uid.user_id');

        $courses_count = DB::table('invoice_details as id')
                        ->rightJoin('user_invoice_details as uid', 'id.invoice_id', '=', 'uid.id')
                        ->whereIn('id.course_id',$courses)
                        ->where(['id.class_id'=>0])
                        ->where(['uid.status' => 'successful'])
                        ->groupBy('course_id')
                        ->count('course_id');

        $classes = DB::table('invoice_details as id')
                        ->rightJoin('user_invoice_details as uid', 'id.invoice_id', '=', 'uid.id')
                        ->whereIn('id.course_id',$courses)
                        ->where('id.class_id','>' , 0 )
                        ->where(['uid.status' => 'successful'])
                        ->count('course_id');
        
        $total_earning = DB::table('user_invoice_details as uid')
                        ->join('invoice_details as id', 'id.invoice_id', '=', 'uid.id')
                        ->where(['uid.status' => 'successful'])
                        ->sum('uid.sub_total');
        


        return view('instructor.revenue.instructorRevenue',compact('invoiceDetails','total_earning','classes','courses_count','learners'));
    }
}
