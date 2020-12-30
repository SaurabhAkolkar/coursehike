<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CreatorPayout;
use App\User;

class CreatorPayoutController extends Controller
{
    public function index(){
        
        $payouts = CreatorPayout::with('user')->get();
        return view('admin.revenue.creatorpayouts', compact('payouts'));
    }

    public function create(){
        $creators = User::where(['role'=>'mentors', 'status'=>1])->get();
        return view('admin.revenue.addcreatorpayout', compact('creators'));
    }

    public function store(Request $request){

        $request->validate([
              'month' => 'required',
              'user_id' => 'required',
              'subscription_amount' => 'required',
              'course_amount' => 'required',
        ]);

        
        $check = CreatorPayout::where(['user_id'=>$request->id, 'month'=>$request->month])->first();

        if($check){
            return back()->with('delete', 'Payout already exist.');
        }

        $input['user_id'] = $request->user_id;
        $input['month'] = $request->month;
        $input['subscription_amount'] = $request->subscription_amount;
        $input['course_amount'] = $request->course_amount;
        $input['status'] = 'pending';

        CreatorPayout::create($input);

        return redirect('/admin/creatorpayout')->with('success', 'Payout added successfully.');       
    }

    public function edit($id){

        $payout = CreatorPayout::findorfail($id);
        $creators = User::where(['role'=>'mentors', 'status'=>1])->get();

        return view('admin.revenue.editcreatorpayout', compact('payout','creators'));
    }

    public function update(Request $request){
        
        $payout = CreatorPayout::findorfail($request->payout_id);
        if($payout){
            $payout->user_id = $request->user_id;
            $payout->month = $request->month;
            $payout->subscription_amount = $request->subscription_amount;
            $payout->course_amount = $request->course_amount;
            $payout->status = $request->status;
            $payout->save();

            return redirect('/admin/creatorpayout')->with('success','Creator Payout updated successfully.');
        }
       
    }
}
