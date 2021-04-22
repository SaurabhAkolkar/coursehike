<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Wishlist;
use Auth;
use App\Playlist;
use App\PlaylistCourse;

class LearnerWishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $wishlist_courses = Wishlist::with('bundle','bundle.user')->where('user_id',Auth::User()->id)->where('bundle_course_id','>','0')->get();
        $wishlist_classes = Wishlist::with('courses','courses.review','courses.user')->where('user_id',Auth::User()->id)->where('course_id','>',0)->get();
        $playlists = [];
        if(Auth::check()){
			$playlists = Playlist::where('user_id', Auth::user()->id)->get();   
        }
        return view('learners.pages.wishlist',compact('wishlist_courses','wishlist_classes','playlists'));
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
            'course_id' => 'required',
        ]);
        
        if($request->bundleCourse == 'true'){ 
            
            $input['course_id'] = 0;
            $input['user_id'] = Auth::user()->id;
            $input['bundle_course_id'] = $request->course_id;

            $checkWishlist = Wishlist::where(['user_id'=>$input['user_id'], 'bundle_course_id'=>$input['bundle_course_id']])->get();

            if(count($checkWishlist)){
                return 'Course Already Exist in wishlist';
            }else{
                Wishlist::create($input);
            }
            return 'Added to Wishlist';

        }else
        {

            $input['course_id'] = $request->course_id;
            $input['user_id'] = Auth::user()->id;

            $checkWishlist = Wishlist::where(['user_id'=>$input['user_id'], 'course_id'=>$input['course_id']])->get();

            if(count($checkWishlist)){
                return 'Class Already Exist in wishlist';
            }else{
                Wishlist::create($input);
            }
            return 'Added to Wishlist';
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Wishlist::where(['user_id'=>Auth::user()->id, 'id'=>$id])->delete();
        
        return redirect()->back()->with('message','Course Removed Successfully.');
    }

    public function deletePlaylist($id){
   
        $check = Playlist::where(['id'=>$id, 'user_id'=>Auth::user()->id])->first();

        if(empty($check)){
            return redirect()->back()->with('success','This Playlist Cannot be deleted By You.');
        }
        
        Playlist::where('id',$id)->delete();
        
        $delete = PlaylistCourse::where('playlist_id',$id)->delete();

        return redirect()->back()->with('success','Playlist Deleted Successfully');
    }
}
