<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CourseProgress;
use App\CourseChapter;
use App\UserPurchasedCourse;
use App\UserWatchProgress;
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
		if(!Auth::check())
			return;
		
		$user = Auth::User();
		$order = UserPurchasedCourse::where('user_id', $user->id)->where('course_id', $course_id)->first();
		
		if( $user->role == "admin" || 
			($user->subscription() && $user->subscription()->active()) ||
			(!empty( $order) && ( $order->purchase_type == 'all_classes' || in_array($class_id, json_decode($order->class_id))) ) )
		{
			// TODO: Verify the Order Purchased and Subscription area

				$logs = array();
				foreach ($request->all() as $log) {
					$logs[] = [
						'user_id' => $user->id ?? 0,
						'course_id' => $course_id,
						'class_id' => $class_id,
						'time' => $log["time"],
						'position' => $log["position"],
						'created_at'  => \Carbon\Carbon::now()->toDateTimeString()
					];
					$percentage_completion = (int) (($log["position"] / $log["total"]) * 100);
					UserWatchProgress::updateOrCreate(
						['user_id' => $user->id, 'course_id' => $course_id, 'class_id' => $class_id],
						['current_position' => $percentage_completion ]
					);
				}

				if($user->subscription() && $user->subscription()->active() && !$user->subscription()->onTrial())
					UserWatchTime::insert($logs);
			
		}			
		$response = array(
			'status' => 'success',
		);
		return response()->json($response, 200);
	}

    public function class_completed(Request $request, $course_id, $class_id)
	{
		if(!Auth::check())
			return;
		
		$user = Auth::User();
		$order = UserPurchasedCourse::where('user_id', $user->id)->where('course_id', $course_id)->first();
		
		if( $user->role == "admin" || 
			($user->subscription() && $user->subscription()->active()) ||
			(!empty( $order) && ( $order->purchase_type == 'all_classes' || in_array($class_id, json_decode($order->class_id))) ) )
		{				
				UserWatchProgress::updateOrCreate(
					['user_id' => $user->id, 'course_id' => $course_id, 'class_id' => $class_id],
					['completion' => true , 'current_position' => 100]
				);
			
		}			
		$response = array(
			'status' => 'success',
		);
		return response()->json($response, 200);
	}
}
