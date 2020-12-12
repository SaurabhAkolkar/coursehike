<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CourseProgress;
use App\CourseChapter;
use App\UserWatchTime;
use Auth;

class CourseProgressController extends Controller
{
    public function checked(Request $request, $id)
	{
		$data = $this->validate($request, [
            'checked' => 'required',
        ]);

		$progress = CourseProgress::where('course_id','=',$id)->where('user_id', Auth::User()->id)->first();

		if(isset($progress))
		{
			CourseProgress::where('course_id', $id)->where('user_id', '=', Auth::user()
                    ->id)
                    ->update(['mark_chapter_id' => $request->checked]);
		}
		else
        {
	   	
		   	$chapter = CourseChapter::where('course_id', $id)->get();

		   	$chapter_id = array();

		   	foreach($chapter as $c)
	        {
	           array_push($chapter_id, "$c->id");
	        }

		   	$created_progress = CourseProgress::create([
	            'course_id' => $id,
	            'user_id' => Auth::User()->id,
	            'mark_chapter_id' => $request->checked,
	            'all_chapter_id' => $chapter_id,
	            'created_at'  => \Carbon\Carbon::now()->toDateTimeString(),
	            'updated_at'  => \Carbon\Carbon::now()->toDateTimeString(),
	            ]
	        );
		}

        return back(); 
	}

    public function progress_log(Request $request, $course_id, $class_id)
	{
		// print_r($course_id);
		if(!Auth::check())
			return;
		$logs = array();
		foreach ($request->all() as $log) {
			$logs[] = [
				'user_id' => Auth::User()->id ?? 0,
				'course_id' => $course_id,
				'class_id' => $class_id,
				'time' => $log["time"],
				'position' => $log["position"],
				'created_at'  => \Carbon\Carbon::now()->toDateTimeString()
			];
		}
		UserWatchTime::insert($logs);
		// $response = array(
		// 	'status' => 'success',
		// );
		// return response()->json($response, 200);
	}
}
