<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FeaturedMentor;
use App\User;
use App\Course;
use Image;
use Session;
use Storage;

class FeaturedMentorController extends Controller
{
    public function index(){
        $data = FeaturedMentor::with('user','courses')->get();
        
		return view('admin.featured_mentors.index',compact('data'));
    }

    public function create()
	{
        $users = User::where(['status'=>1,'role'=>'mentors'])->get();
     
		return view('admin.featured_mentors.create',compact('users'));
    }

    public function edit($id)
	{
        $data = FeaturedMentor::with('user','courses')->where(['id'=>$id])->first();
        $users = User::where(['status'=>1,'role'=>'mentors'])->get();
        $courses = Course::where(['user_id' => $data->user_id])->get();
        
		return view('admin.featured_mentors.edit',compact('data','users','courses'));
    }

    public function store(Request $request)
	{   
        $data = $this->validate($request,[
            'mentor' => 'required',
            'course' => 'required',
            'user_img' => 'required',
            'image_thumbnail' => 'required',
        ]);
         
        $check = FeaturedMentor::where(['user_id'=>$request->mentor])->first();
        if($check){
            Session::flash('success','User already in featured mentors.');
            return redirect()->back()->withInput();        
        }

        if ($file = $request->file('user_image')) {
                
                $photo = Image::make($file);
                
                $file_name = time().rand().'.'.$file->getClientOriginalExtension();
                
                // $input['preview_image'] = Storage::putFile(config('path.course.img'), $photo );
                Storage::put(config('path.mentor.featured').$file_name, $photo->stream() );
                // Storage::put(config('path.course.img').$file_name, $photo->getEncoded());
                $input['user_image'] = $file_name;
        }

        if ($file = $request->file('image_thumbnail')) {
                
                $photo = Image::make($file);
                
                $file_name = time().rand().'.'.$file->getClientOriginalExtension();
                
                // $input['preview_image'] = Storage::putFile(config('path.course.img'), $photo );
                Storage::put(config('path.mentor.featuredthumbnail').$file_name, $photo->stream() );
                // Storage::put(config('path.course.img').$file_name, $photo->getEncoded());
                $input['user_thumbnail'] = $file_name;
        }

        $input['user_id'] = $request->mentor;
        $input['course_id'] = $request->course;
        $input['status'] = $request->status?1:0;

        FeaturedMentor::create($input);

        Session::flash('success','Added Successfully !');
        return redirect('/featuredMentors');        

    }

    public function update(Request $request)
	{   
        $data = $this->validate($request,[
            'course' => 'required'
        ]);
            
        $featuredmentor = FeaturedMentor::where('id', $request->featured_id)->first();
         
        if($featuredmentor){

            if ($file = $request->file('user_image')) {

                if ($featuredmentor->user_image != null) {

                    $exists = Storage::exists(config('path.mentor.featured').$featuredmentor->user_image);
                    if ($exists)
                    Storage::delete(config('path.mentor.featured').$featuredmentor->user_image);
                    }
                    
                    $photo = Image::make($file);
                    
                    $file_name = time().rand().'.'.$file->getClientOriginalExtension();
                    
                    // $input['preview_image'] = Storage::putFile(config('path.course.img'), $photo );
                    Storage::put(config('path.mentor.featured').$file_name, $photo->stream() );
                    // Storage::put(config('path.course.img').$file_name, $photo->getEncoded());
                    $input['user_image'] = $file_name;
            }

            if ($file = $request->file('image_thumbnail')) {

                if ($featuredmentor->image_thumbnail != null) {

                    $exists = Storage::exists(config('path.mentor.featuredthumbnail').$featuredmentor->user_thumbnail);
                    if ($exists)
                        Storage::delete(config('path.mentor.featuredthumbnail').$featuredmentor->user_thumbnail);
                    }
                    
                    $photo = Image::make($file);
                    
                    $file_name = time().rand().'.'.$file->getClientOriginalExtension();
                    
                    // $input['preview_image'] = Storage::putFile(config('path.course.img'), $photo );
                    Storage::put(config('path.mentor.featuredthumbnail').$file_name, $photo->stream() );
                    // Storage::put(config('path.course.img').$file_name, $photo->getEncoded());
                    $input['user_thumbnail'] = $file_name;
            }

            
            $input['course_id'] = $request->course;
            
            $input['status'] = $request->status?$request->status:0;
       
            $featuredmentor->update($input);
            Session::flash('success','Added Successfully !');
            return redirect('/featuredMentors');      
        }

        Session::flash('success','Something went wrong!');
        
        return redirect()->back();       

    }

    
    public function getCourses(Request $request){
        $courses = null;

        if($request->user_id)
            $courses = Course::where(['user_id'=>$request->user_id, 'status'=> 1])->pluck('title','id');

        return response()->json($courses);

    }

    public function delete($id){
        FeaturedMentor::where('id',$id)->delete();
        Session::flash('success','Mentor Removed from featured list.');
        
        return redirect()->back();       
    }
}
