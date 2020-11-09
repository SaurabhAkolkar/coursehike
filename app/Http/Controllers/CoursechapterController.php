<?php

namespace App\Http\Controllers;

use App\CourseChapter;
use Illuminate\Http\Request;
use DB;
use App\Course;
use Session;
use Image;

class CoursechapterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coursechapter = CourseChapter::all();
        return view('admin.course.coursechapter.index',compact("coursechapter"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $coursechapter = Course::all();
        return view('admin.course.coursechapter.insert',compact('coursechapter'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request,[
            'chapter_name' => 'required',
        ]);

        $input = $request->all();
        $data = CourseChapter::create($input);

        if($file = $request->file('preview_image'))
        { 
            //   $filename = time().rand().'.'.$file->getClientOriginalExtension();
            //   $file->move(public_path().'/images/course',$filename);
            //   $data->thumbnail = $filename;
            //   $input['thumbnail'] = $filename;

            $photo = Image::make($file)->fit(600, 360, function ($constraint) {
                $constraint->upsize();
            })->encode('jpg', 70);

            $file_name = time().rand().'.'.$file->getClientOriginalExtension();
            Storage::put(config('path.course.class_thumnail').$request->course_id .'/'. $file_name, $photo->stream() );
            $data->thumbnail = $file_name;
        }

        $data->save();

        Session::flash('success','Added Successfully !');
        return redirect()->route('course.show',$request->course_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\coursechapter  $coursechapter
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $cate = CourseChapter::find($id);
        $courses = Course::all();
        return view('admin.course.coursechapter.edit',compact('cate','courses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\coursechapter  $coursechapter
     * @return \Illuminate\Http\Response
     */
    public function edit(coursechapter $coursechapter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\coursechapter  $coursechapter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $data = $this->validate($request,[
            'chapter_name' => 'required',
        ]);

        $data = CourseChapter::findorfail($id);
        $input = $request->all();

        if(isset($request->status))
        {
            $input['status'] = '1';
        }
        else
        {
            $input['status'] = '0';
        }

        if($file = $request->file('preview_image'))
        {
            // if($data->preview_image != "")
            // {
            //     $chapter_file = @file_get_contents(public_path().'/files/material/'.$data->file);

            //     if($chapter_file)
            //     {
            //         unlink('files/material/'.$data->file);
            //     }
            // }
            // $name = time().$file->getClientOriginalName();
            // $file->move('files/material', $name);
            // $input['file'] = $name;

            if ($data->thumbnail != null) {
                $exists = Storage::exists(config('path.course.class_thumnail').$data->thumbnail);
                if ($exists)
                    Storage::delete(config('path.course.class_thumnail').$data->thumbnail);
            }

            $photo = Image::make($file)->fit(600, 360, function ($constraint) {
                $constraint->upsize();
            })->encode('jpg', 70);

            $file_name = time().rand().'.'.$file->getClientOriginalExtension();
            Storage::put(config('path.course.class_thumnail').$file_name, $photo->stream() );
            $input['file'] = $file_name;

        }

        $data->update($input);

        Session::flash('success','Updated Successfully !');
        return redirect()->route('course.show',$request->course_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\coursechapter  $coursechapter
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coursechapter = CourseChapter::find($id);

        if($coursechapter->file != null)
        {
                
            $image_file = @file_get_contents(public_path().'/files/material/'.$coursechapter->file);

            if($image_file)
            {
                unlink(public_path().'/files/material/'.$coursechapter->file);
            }
        }

        DB::table('course_chapters')->where('id',$id)->delete();
        DB::table('course_classes')->where('coursechapter_id',$id)->delete();
        return back(); 
    }
}
