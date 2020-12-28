<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Instructor;
use DB;
use App\User;
use App\Mail\CreatorRequest;
use App\Setting;

class InstructorRequestController extends Controller
{
    public function index()
    {
        $items = Instructor::where('status', '0')->get();
        return view('admin.instructor.instructor_request.index',compact('items'));
    }

    public function create()
    {
        $data = Instructor::all();
        return view('admin.instructor.instructor_request.create',compact('data'));
    }

    public function edit($id)
    {
        $show = Instructor::where('id', $id)->first();
        return view('admin.instructor.instructor_request.view',compact('show'));
    }

    public function update(Request $request, $id)
    {

        $data = Instructor::findorfail($id);
        $input['status'] = $request->status;
   
        if($request->status == 0)
        {
            $show = User::where('id', $request->user_id)->first();
            $input['role'] = 'user';
            
            User::where('id', $request->user_id)
                    ->update(['role' => 'user']);
                    
            
            
            Instructor::where('user_id', $request->user_id)
                    ->update(['status' => 0]);

            
        }
        else
        { 
            
            $show = User::where('id', $request->user_id)->first();
            $abc['role'] = $request->role;
            
            $user = User::where('id', $request->user_id)
                    ->update(['role' => $request->role]);
            
            $setting = Setting::first();    
            if($setting->w_email_enable == 1){
                try{
                    
                    Mail::to($request->email)->send(new CreatorRequest($user));
                    
                }
                catch(\Swift_TransportException $e){

                    header( "refresh:5;url=./login" );

                    dd("Your Registration is successfull ! but welcome email is not sent because your webmaster not updated the mail settings in admin dashboard ! Kindly go back and login");

                }
            }
            
            Instructor::where('user_id', $request->user_id)
                    ->update(['status' => 1]);
            
        }

        $show = User::where('id', $request->user_id)->first();
        $input['detail'] = $request->detail;
        $input['mobile'] = $request->mobile;
        $input['gender'] = $request->gender;
        $input['dob'] = $request->dob;
        
        // User::where('id', $request->user_id)
        //             ->update(['detail' => $request->detail, 'mobile' => $request->mobile, 'gender' => $request->gender, 'dob' => $request->dob ]);

        return redirect()->route('requestinstructor.index');
    }

    public function destroy($id)
    {
        DB::table('instructors')->where('id',$id)->delete();
        return redirect()->route('requestinstructor.index');
    }

    public function allinstructor()
    {
        $items = Instructor::where('status','1')->get();
        return view('admin.instructor.all_instructor.index',compact('items'));
    }

    public function instructorpage()
    {
        return view('front.instructor');
    }


    public function instructor(Request $request)
    {
        $users = Instructor::where('user_id', $request->user_id)->get();

        if(!$users->isEmpty()){
            return back()->with('delete','Already Requested' );  
        }
        else{

            $input = $request->all();

            if ($file = $request->file('image'))
            {
                $name = time().$file->getClientOriginalName();
                $file->move('images/instructor', $name);
                $input['image'] = $name;
            }


            if($file = $request->file('file'))
            {
                $name = time().$file->getClientOriginalName();
                $file->move('files/instructor/',$name);
                $input['file'] = $name;
            }
                      
            
            $data = Instructor::create($input);
            $data->save(); 
        }

        return back()->with('success','Request Successfully !');

    }
}
