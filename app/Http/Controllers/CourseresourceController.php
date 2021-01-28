<?php

namespace App\Http\Controllers;

use App\CourseResource;
use Illuminate\Http\Request;
use DB;
use App\Course;
use Illuminate\Support\Facades\Storage;
use Session;
use Image;

class CourseresourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coursechapter = CourseResource::all();
        return view('admin.course.courseresource.index',compact("coursechapter"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $coursechapter = Course::all();
        return view('admin.course.courseresource.insert',compact('coursechapter'));
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
            'file_name' => 'required',
            // 'add_file' => 'mimes:docs,pdf,jpg,png'
        ]);

        $input = $request->all();

        $data = CourseResource::create($input);

        if($file = $request->file('add_file'))
        { 
        //   $filename = time().rand().'.'.$file->getClientOriginalExtension();
        //   $file->move(public_path().'/files/material/',$filename);
        //   $data->file_url = $filename;
          $data->file_url = basename(Storage::putFile(config('path.course.resources'). $request->course_id, $file , 'private'));
        }
        $data->status = "1";

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
        $cate = CourseResource::find($id);
        $courses = Course::all();
        return view('admin.course.courseresource.edit',compact('cate','courses'));
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
            'file_name' => 'required',
        ]);

        $data = CourseResource::findorfail($id);
        $input = $request->all();

        if($file = $request->file('edit_file'))
        {
            // if($data->file_url != "")
            // {
            //     $chapter_file = @file_get_contents(public_path().'/files/material/'.$data->file_url);

            //     if($chapter_file)
            //     {
            //         unlink('files/material/'.$data->file_url);
            //     }
            // }
            // $name = time().$file->getClientOriginalName();
            // $file->move('files/material', $name);
            // $input['file_url'] = $name;

            if ($data->file_url != "") {
                $exists = Storage::exists(config('path.course.resources'). $data->course_id .'/'. $data->file_url);
                if ($exists) {
                    Storage::delete(config('path.course.resources'). $data->course_id .'/'. $data->file_url);
                }
            }

            $input['file_url'] = basename(Storage::putFile(config('path.course.resources'). $data->course_id, $file , 'private'));
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
        $coursechapter = CourseResource::find($id);

        if($coursechapter->file_url != null)
        {
                
            $image_file = @file_get_contents(public_path().'/files/material/'.$coursechapter->file_url);

            if($image_file)
            {
                unlink(public_path().'/files/material/'.$coursechapter->file_url);
            }
        }
        DB::table('course_resources')->where('id',$id)->delete();
        return back(); 
    }
}
