<?php

namespace App\Http\Controllers;

use App\LearnerAnnouncement;
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
use Carbon\Carbon;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $announcement = LearnerAnnouncement::where('status',1)->get();
        return view('admin.course.announcement.index',compact('announcement'));

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
            'announcement_short' => 'required',
            'announcement_long' => 'required',
            'layouts' => 'required',
            'status' => 'required',
            'preview_image'=>'mimes:jpg,jpeg',
            'preview_video'=>'mimes:mp4,avi,wmv'
          ]);


        $input['title'] = $request->announcement_title;
        $input['short_description'] = $request->announcement_short;
        $input['long_description'] = $request->announcement_long;
        $input['status'] = $request->status;
        $input['layout'] = $request->layouts;
        $input['course_id'] = $request->course_id;
        $input['user_id'] = Auth::user()->id;

        if ($file = $request->file('preview_image')) {

            $file_name = basename(Storage::putFile(config('path.announcement.img'), $file ));

            $input['preview_image'] = $file_name;

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

        $anno = LearnerAnnouncement::create($input);

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
        $annou = LearnerAnnouncement::find($id);
        $user =  User::all();

        return view('admin.course.announcement.edit',compact('annou'));
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
            'announcement_short' => 'required',
            'announcement_long' => 'required',
            'layouts' => 'required',
            'preview_image'=>'mimes:jpg,jpeg',
            'preview_video'=>'mimes:mp4,avi,wmv'
          ]);

        $input['title'] = $request->announcement_title;
        $input['short_description'] = $request->announcement_short;
        $input['long_description'] = $request->announcement_long;
        $input['status'] = $request->status="on"?1:0;
        $input['layout'] = $request->layouts;
        $input['course_id'] = $request->course_id;
        $input['user_id'] = Auth::user()->id;

        $annou = LearnerAnnouncement::find($id);

        if ($file = $request->file('preview_image')){

           // $exists = Storage::exists(config('path.announcement.img').$annou->preview_image);
            if ($annou->preview_image){

                Storage::delete(config('path.announcement.img').$annou->preview_image);

            }
            $file_name = basename(Storage::putFile(config('path.announcement.img'), $file ));

            $input['preview_image'] = $file_name;

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

        return redirect('/announcement')->with('success','Announcement edited successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Announcement::where('id',$id)->delete();
        return redirect()->back();
    }

    public function showAllRelease(){
        $allReleases = LearnerAnnouncement::where(['status'=>1])->get();
        // dd($allReleases);
        return view('learners.pages.new-releases',compact('allReleases'));
    }

    public function showRelease($id){
        $release = LearnerAnnouncement::where(['status'=>1, 'id'=>$id])->first();
        if($release == null){
            return redirect()->back();
        }
        return view('learners.pages.new-release', compact('release'));
    }
    public function markNotificationRead(){
        $user = Auth::user();
        $user->last_annoucement_check = Carbon::now();
        $user->save();
        return 1;
    }
}
