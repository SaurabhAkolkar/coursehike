<?php

namespace App\Http\Controllers;

use App\Course;
use App\Order;
use App\ReviewRating;
use App\User;
use Auth;
use DB;
use Illuminate\Http\Request;

class ReviewratingController extends Controller
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

        $user_id = Auth::id();
        if (ReviewRating::where('user_id', '=', $user_id)->exists()) {
            DB::table('review_ratings')->where('user_id',$user_id)
            ->update(
                array(
                    'course_id' => $request->course_id,
                    'user_id' => $user_id,
                    'review' => $request->review,
                    'status' => 1,
                    'rating' => $request->rating,
                    'approved' => 1,
                    // 'featured' => $request->featured,
                    'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                    'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                )
            );
            return back()->with("success", "Rating update successfully.");
        } else {

            DB::table('review_ratings')->insert(
                array(
                    'course_id' => $request->course_id,
                    'user_id' => $user_id,
                    'review' => $request->review,
                    'status' => 1,
                    'rating' => $request->rating,
                    'approved' => 1,
                    // 'featured' => $request->featured,
                    'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                    'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                )
            );
            return back()->with("success", "Thanks for your valuable ratings.");
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\reviewrating  $reviewrating
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $jp = ReviewRating::find($id);
        $users = User::all();
        $courses = Course::all();
        return view('admin.course.reviewrating.edit', compact('jp', 'courses', 'users'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\reviewrating  $reviewrating
     * @return \Illuminate\Http\Response
     */
    public function edit(reviewrating $reviewrating)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\reviewrating  $reviewrating
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $data = ReviewRating::findorfail($id);
        $input = $request->all();
        $data->update($input);

        return redirect()->route('course.show', $request->course);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\reviewrating  $reviewrating
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('review_ratings')->where('id', $id)->delete();
        return back();
    }

    public function rating(Request $request, $id)
    {

        $orders = Order::where('user_id', Auth::User()->id)->where('course_id', $id)->first();
        $review = ReviewRating::where('user_id', Auth::User()->id)->where('course_id', $id)->first();

        if (!empty($orders)) {
            if (!empty($review)) {
                return back()->with('delete', 'You already reviewed this course');
            } else {

                $input = $request->all();
                $input['course_id'] = $id;
                $input['user_id'] = Auth::User()->id;
                $data = ReviewRating::create($input);
                $data->save();

                return back()->with('success', 'Review Successfully');
            }
            return back()->with('success', 'Review Successfully');
        } else {
            return back()->with('delete', 'Purchase to review this course');

        }

    }

}
