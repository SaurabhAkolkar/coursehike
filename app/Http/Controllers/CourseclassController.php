<?php

namespace App\Http\Controllers;

use App\CourseClass;
use Illuminate\Http\Request;
use Notification;
use DB;
use App\CourseChapter;
use App\Course;
use App\Order;
use App\User;
use App\Notifications\CourseNotification;
use App\Subtitle;
use Session;
use Storage;

class CourseclassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courseclass = CourseClass::all();
        return view('admin.course.courseclass.index',compact("courseclass"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courseclass = CourseClass::all();
        return view('admin.course.courseclass.insert',compact('courseclass')); 
 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        
        // $request->validate([
        //     'video_upld' => 'mimes:mp4,avi,wmv'
        // ]);

        ini_set('max_execution_time', 400);

        $courseclass = new CourseClass;
        $courseclass->course_id = $request->course_id;
        $courseclass->coursechapter_id =  $request->course_chapters;
        $courseclass->title = $request->title;
        $courseclass->duration = $request->duration;
        $courseclass->status = $request->status;
        $courseclass->featured = $request->featured;
        $courseclass->video = $request->video;
        $courseclass->date_time = $request->date_time;
        $courseclass->detail = $request->detail;

        $courseclass['position'] = (CourseClass::count()+1);

        $courseclass->status = $request->status;
        

        if(isset($request->featured))
        {
            $courseclass->featured = '1';
        }
        else
        {
            $courseclass->featured = '0';
        }

        if(isset($request->is_preview))
        {
            $courseclass->is_preview = '1';
        }
        else
        {
            $courseclass->is_preview = '0';
        }

           
        $courseclass->type = "video";
                
        if($file = $request->file('video_upld'))
        {
            $name = 'video_course_'.time().'.'.$file->getClientOriginalExtension();
            $file->move('video/class',$name);
            $courseclass->video = $name;
        }
  
        if($file = $request->file('preview_image'))
        {
            $name = 'video_thumbnail_'.time().'.'.$file->getClientOriginalExtension();
            $file->move('video/class/preview',$name);
            $courseclass->image = $name;
        }

        if($request->checkVideo == "aws_upload")
        {

            $file = request()->file('aws_upload');
            $videoname = time() . $file->getClientOriginalName();

            $t = Storage::disk('s3')->put($videoname, file_get_contents($file) , 'public');
            $upload_video = $videoname;
            $aws_url = env('AWS_URL') . $videoname;
            

            $videoname = Storage::disk('s3')->url($videoname);

            $courseclass->aws_upload = $aws_url;
        }

        // Notification when course class add
        $cor = Course::where('id', $request->course_id)->first();

        $course = [
          'title' => $cor->title,
          'image' => $cor->preview_image,
        ];

        $enroll = Order::where('course_id', $request->course_id)->get();

        if(!$enroll->isEmpty())
        {
            foreach($enroll as $enrol)
            {
              if($courseclass->save()) 
              {
                $user = User::where('id', $enrol->user_id)->get();
                Notification::send($user,new CourseNotification($course));
              }
            }
        }
        else
        {
            $courseclass->save();
        }
          
        // Subtitle 
        if($request->has('sub_t')){
        foreach($request->file('sub_t') as $key=> $image)
          {
          
            $name = $image->getClientOriginalName();
            $image->move(public_path().'/subtitles/', $name);  
           
            $form= new Subtitle();
            $form->sub_lang = $request->sub_lang[$key];
            $form->sub_t=$name;
            $form->c_id = $courseclass->id;
            $form->save(); 
          }
        }

        return back()->with('success','Class Video is Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\courseclass  $courseclass
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        
        $subtitles = Subtitle::where('c_id', $id)->get();
        $cate = CourseClass::find($id);
        $coursechapt = CourseChapter::where('course_id', $cate->course_id)->get();

        $datetimevalue= strtotime($cate->date_time);
        $formatted = date('Y-m-d', $datetimevalue);

        $pd = $cate['date_time'];
        $live_date = str_replace(" ", "T", $pd);

        return view('admin.course.courseclass.edit',compact('cate','coursechapt','subtitles', 'live_date')); 

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\courseclass  $courseclass
     * @return \Illuminate\Http\Response
     */
    public function edit(courseclass $courseclass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\courseclass  $courseclass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'video' => 'mimes:mp4,avi,wmv'
        ]);


        ini_set('max_execution_time', 400);

        $courseclass = CourseClass::findOrFail($id);

        $courseclass->coursechapter_id=$request->coursechapter_id;
        $courseclass->title = $request->title;
        $courseclass->duration = $request->duration;
        $courseclass->status = $request->status;
        $courseclass->featured = $request->featured;
        $courseclass->date_time = $request->date_time;
        $courseclass->detail = $request->detail;
         
        $coursefind  = CourseChapter::findOrFail($request->coursechapter);
        $maincourse = Course::findorfail($coursefind->course_id);

        $courseclass->type = "video";

        if($file = $request->file('video_upld'))
        {
            if($courseclass->video !="")
            {
                $content = @file_get_contents(public_path().'/video/class/'.$courseclass->video);

                if ($content) {
                    unlink(public_path().'/video/class/'.$courseclass->video);
                }
            }
        
            $name = 'video_course_'.time().'.'.$file->getClientOriginalExtension();
            $file->move('video/class',$name);
            $courseclass->video = $name;
            $courseclass->date_time = null;
            $courseclass->aws_upload = null;

        }

        if($file = $request->file('preview_image'))
        {
            if($courseclass->image !="")
            {
                $content = @file_get_contents(public_path().'/video/class/preview/'.$courseclass->image);

                if ($content) {
                    unlink(public_path().'/video/class/preview/'.$courseclass->image);
                }
            }
            $name = 'video_thumbnail_'.time().'.'.$file->getClientOriginalExtension();
            $file->move('video/class/preview',$name);
            $courseclass->image = $name;
        }

        if($request->checkVideo == "aws_upload")
        {

            $file = request()->file('aws_upload');
            $videoname = time() . $file->getClientOriginalName();

            $t = Storage::disk('s3')->put($videoname, file_get_contents($file) , 'public');
            $upload_video = $videoname;
            $aws_url = env('AWS_URL') . $videoname;
            

            $videoname = Storage::disk('s3')->url($videoname);

            $courseclass->aws_upload = $aws_url;
            $courseclass->video = null;
            $courseclass->date_time = null;

        }

        if(isset($request->status))
        {
            $courseclass['status'] = '1';
        }
        else
        {
            $courseclass['status'] = '0';
        }

        if(isset($request->featured))
        {
            $courseclass['featured'] = '1';
        }
        else
        {
            $courseclass['featured'] = '0';
        }


        $courseclass->save();
        Session::flash('success','Updated Successfully !');
        return redirect()->route('course.show',$maincourse->id); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\courseclass  $courseclass
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $courseclass = CourseClass::find($id);

        if($courseclass->type == "video")
        {
                
            $video_file = @file_get_contents(public_path().'/video/class/'.$courseclass->video);

            if($video_file)
            {
                unlink(public_path().'/video/class/'.$courseclass->video);
            }
        }

        if($courseclass->type == "audio")
        {
                
            $video_file = @file_get_contents(public_path().'/files/audio/'.$courseclass->audio);

            if($video_file)
            {
                unlink(public_path().'/files/audio/'.$courseclass->audio);
            }
        }

        if($courseclass->type == "image")
        {
                
            $image_file = @file_get_contents(public_path().'/images/class/'.$courseclass->image);

            if($image_file)
            {
                unlink(public_path().'/images/class/'.$courseclass->image);
            }
        }

        if($courseclass->type == "zip")
        {
                
            $zip_file = @file_get_contents(public_path().'/files/zip/'.$courseclass->zip);

            if($zip_file)
            {
                unlink(public_path().'/files/zip/'.$courseclass->zip);
            }
        }

        if($courseclass->type == "pdf")
        {
                
            $pdf_file = @file_get_contents(public_path().'/files/pdf/'.$courseclass->pdf);

            if($pdf_file)
            {
                unlink(public_path().'/files/pdf/'.$courseclass->pdf);
            }
        }

        if($courseclass->preview_type = "video")
        {
            $content = @file_get_contents(public_path().'/video/class/preview/'.$courseclass->preview_video);
            if($content) {
              unlink(public_path().'/video/class/preview/'.$courseclass->preview_video);
            }
        }

        $courseclass->delete();
        
        return back();
    }


    public function sort(Request $request){
        
        $posts = CourseClass::all();

        foreach ($posts as $post) {

            foreach ($request->order as $order) {

                if($order['id'] == $post->id) {

                    \DB::table('course_classes')->where('id',$post->id)->update(['position' => $order['position']]);
                    
                }
            }
        }
        
        return response()->json('Update Successfully.', 200);
    }

   
}
