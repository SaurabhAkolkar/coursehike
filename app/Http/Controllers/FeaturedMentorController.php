<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FeaturedMentor;
use App\User;
use App\Course;
use Image;
use Session;

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
            'user_image' => 'required',
            'image_thumbnail'=>'required',
        ]);
            
        $check = FeaturedMentor::where(['user_id'=>$request->user_id])->first();
        if($check){
            Session::flash('success','User already in featured mentors.');
            return redirect()->back();        
        }
        if($file = $request->file('user_image')) 
        {        
          $optimizeImage = Image::make($file);
          $optimizePath = public_path().'/images/featuredmentor/';
        if (!file_exists($optimizePath)) {
            mkdir($optimizePath, 666, true);
        }
          $image = time().$file->getClientOriginalName();
          $optimizeImage->save($optimizePath.$image, 72);

          $input['user_image'] = $image;
          
        }

        if($file = $request->file('image_thumbnail')) 
        {        
          $optimizeImage = Image::make($file);
          $optimizePath = public_path().'/images/featuredmentor/thumbnail/';
          if (!file_exists($optimizePath)) {
            mkdir($optimizePath, 666, true);
            }
          $image = time().$file->getClientOriginalName();
          $optimizeImage->save($optimizePath.$image, 72);

          $input['user_thumbnail'] = $image;
          
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
            if($file = $request->file('user_image')) 
            {      
                if($featuredmentor->image != null) {
                    $content = @file_get_contents(public_path().'/images/featuredmentor/'.$featuredmentor->user_image);
                    if ($content) {
                      unlink(public_path().'/images/featuredmentor/'.$featuredmentor->user_image);
                    }
                }
    
              $optimizeImage = Image::make($file);
              $optimizePath = public_path().'/images/featuredmentor/';
    
              
                if (!file_exists($optimizePath)) {
                    mkdir($optimizePath, 666, true);
                }

                $image = time().$file->getClientOriginalName();
                $optimizeImage->save($optimizePath.$image, 72);
        
                $input['user_image'] = $image;
              
            }
    
            if($file = $request->file('image_thumbnail')) 
            {     
                if($featuredmentor->image != null) {
                    $content = @file_get_contents(public_path().'/images/featuredmentor/thumbnail/'.$featuredmentor->user_thumbnail);
                    if ($content) {
                      unlink(public_path().'/images/featuredmentor/'.$featuredmentor->user_thumbnail);
                    }
                }   
                $optimizeImage = Image::make($file);
                $optimizePath = public_path().'/images/featuredmentor/thumbnail/';
                if (!file_exists($optimizePath)) {
                    mkdir($optimizePath, 666, true);
                    }
                $image = time().$file->getClientOriginalName();
                $optimizeImage->save($optimizePath.$image, 72);
        
                $input['user_thumbnail'] = $image;
              
            }
            $input['course_id'] = $request->course;
            $input['status'] = $request->status?1:0;
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
