<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FirstSection;
use Session;
use Image;

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

        if($file = $request->file('image')) 
        {        
          $optimizeImage = Image::make($file);
          $optimizePath = public_path().'/images/firstsection/';
          $image = time().$file->getClientOriginalName();
          $optimizeImage->save($optimizePath.$image, 72);

          $input['image'] = $image;
          
        }

        $firstSection = FirstSection::first();
        if(isset($firstSection))
        {
            $firstSection->update($input);
            Session::flash('success','Updated Successfully !');
            return redirect('/firstsection');
        }
        else
        {

            if($request->image){
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
