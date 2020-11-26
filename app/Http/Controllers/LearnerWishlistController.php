<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Wishlist;
use Auth;

class LearnerWishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wishlist_courses = Wishlist::with('courses')->where('user_id',Auth::User()->id)->get();

        return view('learners.pages.wishlist',compact('wishlist_courses'));
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
        
        $input['course_id'] = $request->course_id;
        $input['user_id'] = Auth::user()->id;

        $checkWishlist = Wishlist::where(['user_id'=>$input['user_id'], 'course_id'=>$input['course_id']])->get();

        if(count($checkWishlist)){
            return 'Course Already Exist in wishlist';
        }else{
            Wishlist::create($input);
        }
        return 'Added to Wishlist';
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
    public function destroy(Request $request)
    {
        $request->validate([
            'course_id' => 'required',
        ]);

        Wishlist::where(['user_id'=>Auth::user()->id, 'course_id'=>$request->course_id])->delete();
        
        return "Course remove successfully";
    }
}
