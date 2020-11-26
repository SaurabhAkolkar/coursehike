<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Playlist;
use App\PlaylistCourse;
use Auth;
use Session;
use Redirect;
class PlaylistController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    /**
     * Displaying Playlist of current User.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {   
      $playlists = Playlist::where('user_id', Auth::User()->id)->get();

      return view('learners.pages.playlist')->with(['playlists' => $playlists]);
    }

    /**
     * Displaying Courses of Playlist.
     * 
     * @param  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {   
      $courses = PlaylistCourse::with('courses')
                                ->where('playlist_id', $id)
                                ->get();
                               

      $playlist = Playlist::findorfail($id);
      return view('learners.pages.playlist-courses')->with(['courses' => $courses, 'playlist'=>$playlist]);
    }

    /**
     * Adding Course to playlist
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function addToPlaylist(Request $request)
    {   
      
        $request->validate([
            'playlist_id' => 'required',
            'course_id' => 'required'
        ]);
      
        $input['playlist_id'] = $request->playlist_id;
        $input['course_id'] = $request->course_id;

        $check_if_exist = PlaylistCourse::where(['course_id'=>$input['course_id'],'playlist_id'=>$input['playlist_id']])->get();
        if(count($check_if_exist) > 0){
            return redirect()->back()->with('message','Course Already Exist in Playlist');
        }

        $courses = PlaylistCourse::create($input);
        $playlist = Playlist::findOrFail($input['playlist_id']);
        $playlist->count = $playlist->count + 1;
        $playlist->save();

      return redirect()->back()->with('message','Course Added to Playlist');
    }


     /**
     * Create a new Playlist.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createPlaylist(Request $request)
    {
        
        $request->validate([
            'playlist_name' => 'required'
        ]);

        $input['name'] =  $request->playlist_name;
        $input['user_id'] = Auth::user()->id;

        $exitingPlaylist = Playlist::where(['name'=>$input['name'] , 'user_id'=> $input['user_id']])->get();
        
            if(count($exitingPlaylist) == 0){
                $addedPlaylist = Playlist::create($input);
                if($request->ajax_request == true){
                    return $addedPlaylist;
                }
                Session::flash('success','New Playlist Added');
            }else{
                if($request->ajax_request == true){
                    return 0;
                }
                Session::flash('playlist_exists','Playlist with this name already exist.');
                return Redirect::back()->withInput();
            }

        return redirect('/playlist');
    }

    public function deletePlaylist($id){
        $check = Playlist::where(['id'=>$id, 'user_id'=>Auth::user()->id])->first();
        if(empty($check)){
            return redirect()->back()->with('failed','This Playlist Cannot be deleted By You.');
        }
        
        Playlist::destroy($id);
        $delete = PlaylistCourse::where('playlist_id',$id)->delete();

        return redirect()->back()->with('success','Playlist Deleted Successfully');
    }

}
