<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FirstSection;
use Session;
use Image;
use Storage;

class FirstSectionController extends Controller
{
    public function index(){
        $show = FirstSection::first();
        if(!$show){
            $show['heading'] = '';
            $show['sub_heading'] = '';
            $show['image'] = '';
            $show['image_text'] = '';
            $show['status'] = '';
        }
      
      	return view('admin.firstsection.edit',compact('show'));
    }
    public function update(Request $request)
    {
        $data = $this->validate($request,[
            'heading' => 'required',
            'sub_heading' => 'required',
            'image_text' => 'required',
        ]);

        $input = $request->all();   

        $firstSection = FirstSection::first();

        if ($file = $request->file('image')) {
            if($firstSection)
                if ($firstSection->image != null) {
                    $exists = Storage::exists(config('path.firstsection').$firstSection->image);
                    if ($exists)
                        Storage::delete(config('path.firstsection').$firstSection->image);
                }
                
                $photo = Image::make($file);
                
                $file_name = time().rand().'.'.$file->getClientOriginalExtension();
                
                // $input['preview_image'] = Storage::putFile(config('path.course.img'), $photo );
                Storage::put(config('path.firstsection').$file_name, $photo->stream() );
                // Storage::put(config('path.course.img').$file_name, $photo->getEncoded());
                $input['image'] = $file_name;
        }

       
        if(isset($firstSection))
        {
            $firstSection->update($input);
            Session::flash('success','Updated Successfully !');
            return redirect('/firstsection');
        }
        else
        {

            if($request->file('image') == null){
                Session::flash('success','Image is required.');
                return redirect('/firstsection');
            }
            $firstSection = FirstSection::create($input);
          
            $firstSection->save();
            Session::flash('success','Added Successfully !');
            return redirect('/firstsection');
        }


       
    }
}
