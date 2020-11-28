<?php

namespace App\Http\Controllers;

use App\Announcement;
use Illuminate\Http\Request;
use App\User;
use App\Course;
use App\Categories;
use Auth;
use Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use Notification;
use App\Notifications\NewReleases;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'announcement_title' => 'required',
            'announcement_category' => 'required',
            'announcement_short' => 'required',
            'announcement_long' => 'required',
            'layouts' => 'required',
            'status' => 'required',
            'preview_image'=>'mimes:jpg,jpeg',
            'preview_video'=>'mimes:mp4,avi,wmv'
          ]);
  
        $input['title'] = $request->announcement_title;
        $input['category_id'] = $request->announcement_category;
        $input['short_description'] = $request->announcement_short;
        $input['long_description'] = $request->announcement_long;
        $input['status'] = $request->status;
        $input['layout'] = $request->layouts;
        $input['course_id'] = $request->course_id;
        $input['user_id'] = Auth::user()->id;
        
        if ($file = $request->file('preview_image')) {

            $optimizeImage = Image::make($file);
            $optimizePath = public_path().'/images/announcement/';
            $image = time().$file->getClientOriginalName();
            $optimizeImage->save($optimizePath.$image, 72);
            $input['preview_image'] = $image;
          
        }

        if ($file = $request->file('preview_video')) {

            // $file_name = md5(microtime().rand()). time().'.'.$file->getClientOriginalExtension();
            $file_name = basename(Storage::putFile(config('path.announcement.preview_video'), $file ));
            $input['preview_video'] = $file_name;

            $response = Http::withHeaders([
                'X-Auth-Key' => env('CLOUDFLARE_Auth_Key'),
                'X-Auth-Email' => env('CLOUDFLARE_Auth_EMAIL'),
            ])->post('https://api.cloudflare.com/client/v4/accounts/'.env('CLOUDFLARE_ACCOUNT_ID').'/stream/copy', [
                'url' => Storage::temporaryUrl(config('path.announcement.preview_video'). $file_name, now()->addMinutes(10)),
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

        $anno = Announcement::create($input);

        $users = [1, 2, 4];
        if($anno->status == 1){
            $notificationData['id'] = $anno->id;
            $notificationData['title'] = $anno->title;
            $notificationData['created_at'] = $anno->created_at;
            // $notificationData['created_at'] = $anno->created_at; 
            // dd($notificationData);
            foreach($users as $id){
                $user = User::find($id);
                Notification::send($user, new NewReleases($notificationData));
            }
        }
        

        return redirect()->back()->with('success','Announcement Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $annou = Announcement::find($id);
        $user =  User::all();
        $courses = Course::all();
        $categories= Categories::where('status',1)->pluck('title','id');

        return view('admin.course.announcement.edit',compact('annou','courses','user','categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $request->validate([
            'announcement_title' => 'required',
            'announcement_category' => 'required',
            'announcement_short' => 'required',
            'announcement_long' => 'required',
            'layouts' => 'required',
            'preview_image'=>'mimes:jpg,jpeg',
            'preview_video'=>'mimes:mp4,avi,wmv'
          ]);
  
        $input['title'] = $request->announcement_title;
        $input['category_id'] = $request->announcement_category;
        $input['short_description'] = $request->announcement_short;
        $input['long_description'] = $request->announcement_long;
        $input['status'] = $request->status="on"?1:0;
        $input['layout'] = $request->layouts;
        $input['course_id'] = $request->course_id;
        $input['user_id'] = Auth::user()->id;
        
        $annou = Announcement::find($id);

        if ($file = $request->file('preview_image')) {

            if($annou->preview_image != null) {
                $content = @file_get_contents(public_path().'/images/announcement/'.$annou->user_img);
                if ($content) {
                  unlink(public_path().'/images/announcement/'.$annou->user_img);
                }
            }

            $optimizeImage = Image::make($file);
            $optimizePath = public_path().'/images/announcement/';
            $image = time().$file->getClientOriginalName();
            $optimizeImage->save($optimizePath.$image, 72);
            $input['preview_image'] = $image;
          
        }

        if ($file = $request->file('preview_video')) {

             if ($annou->preview_video != "") {
                $exists = Storage::exists(config('path.announcement.preview_video').$annou->preview_video);
                if ($exists){
                    Storage::delete(config('path.announcement.preview_video').$annou->preview_video);

                    Http::withHeaders([
                        'X-Auth-Key' => env('CLOUDFLARE_Auth_Key'),
                        'X-Auth-Email' => env('CLOUDFLARE_Auth_EMAIL'),
                    ])->delete('https://api.cloudflare.com/client/v4/accounts/'.env('CLOUDFLARE_ACCOUNT_ID').'/stream/'.$course->stream_video);
                }
            }

            $file_name = basename(Storage::putFile(config('path.announcement.preview_video'), $file ));
            $input['preview_video'] = $file_name;

            $response = Http::withHeaders([
                'X-Auth-Key' => env('CLOUDFLARE_Auth_Key'),
                'X-Auth-Email' => env('CLOUDFLARE_Auth_EMAIL'),
            ])->post('https://api.cloudflare.com/client/v4/accounts/'.env('CLOUDFLARE_ACCOUNT_ID').'/stream/copy', [
                'url' => Storage::temporaryUrl(config('path.announcement.preview_video'). $file_name, now()->addMinutes(10)),
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

        $annou->update($input);

        $users = [1, 2, 4];
        if($annou->status == 1){
            $notificationData['id'] = $annou->id;
            $notificationData['title'] = $annou->title;
            $notificationData['created_at'] = $annou->created_at;
            // $notificationData['created_at'] = $anno->created_at; 
            // dd($notificationData);
            foreach($users as $id){
                $user = User::find($id);
                Notification::send($user, new NewReleases($notificationData));
            }
        }


        return redirect('/course/create/'.$annou->course_id)->with('success','Announcement edited successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function showAllRelease(){
        $allReleases = Announcement::where(['status'=>1])->get();
        // dd($allReleases);
        return view('learners.pages.new-releases',compact('allReleases'));
    }

    public function showRelease($id){
        $release = Announcement::where(['status'=>1, 'id'=>$id])->first();
        if($release == null){
            return redirect()->back();
        }
        return view('learners.pages.new-release', compact('release'));
    }
    public function markNotificationRead(){
        $user = Auth::user();
        foreach ($user->unreadNotifications as $notification) {
            $notification->markAsRead();
        }
        return 1;
    }
}
