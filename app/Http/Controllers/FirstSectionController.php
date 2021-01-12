<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FirstSection;
use Session;
use Image;
use Storage;
use Illuminate\Support\Facades\Http;


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

        if ($file = $request->file('preview_video')) {
            if ($firstSection->video_url != "") {
                $exists = Storage::exists(config('path.firstsection_video').$firstSection->video_url);
                if ($exists){
                    Storage::delete(config('path.firstsection_video').$firstSection->video_url);

                    Http::withHeaders([
                        'X-Auth-Key' => env('CLOUDFLARE_Auth_Key'),
                        'X-Auth-Email' => env('CLOUDFLARE_Auth_EMAIL'),
                    ])->delete('https://api.cloudflare.com/client/v4/accounts/'.env('CLOUDFLARE_ACCOUNT_ID').'/stream/'.$firstSection->video_url);
                }
            }

            // $file_name = md5(microtime().rand()). time().'.'.$file->getClientOriginalExtension();
            $file_name = basename(Storage::putFile(config('path.firstsection_video'), $file ));
            $input['video_url'] = $file_name;

            $response = Http::withHeaders([
                'X-Auth-Key' => env('CLOUDFLARE_Auth_Key'),
                'X-Auth-Email' => env('CLOUDFLARE_Auth_EMAIL'),
            ])->post('https://api.cloudflare.com/client/v4/accounts/'.env('CLOUDFLARE_ACCOUNT_ID').'/stream/copy', [
                'url' => Storage::temporaryUrl(config('path.firstsection_video'). $file_name, now()->addMinutes(10)),
                'meta' => [
                    'name' => $file_name
                ],
                "requireSignedURLs" => true,
            ]);
            
            if($response->successful()){
                $res = $response->json();
                $input['stream_video'] = $res['result']['uid'];
            }

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
