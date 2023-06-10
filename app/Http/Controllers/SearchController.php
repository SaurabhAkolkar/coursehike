<?php

namespace App\Http\Controllers;

use App\Categories;
use Illuminate\Http\Request;
use App\Course;
use App\Search;
use App\Question;
use App\Playlist;
use Auth;
use App\ReviewRating;
use App\UserPurchasedCourse;
use App\CourseLanguage;
use App\MasterClass;
use App\UserWatchProgress;
use App\UserWatchTimelog;
use App\BundleCourse;

class SearchController extends Controller
{
    public function classes(Request $request) 
    {	
		
		$langauges = CourseLanguage::where(['status'=>1])->get();
		$filter_categories = Categories::with('subcategory')->where(['status'=>1])->get();
		$courses =[];
		$categories = [];
		$playlists = [];
		$selected_categories = [];
		$selected_subcategories = [];
		$selected_level = [];
		$selected_languages = [];
		$sort_type = "";
		$filtres_applied = false;
		$selected_duration = "";

		if(Auth::check()){
			$playlists = Playlist::where('user_id', Auth::user()->id)->get();   
		}	

		if($request->filters == 'applied'){
			$filtres_applied = true;
			if(isset($request->sort_by)){
				$sort_type = $request->sort_by;
				if($request->sort_by == 'latest'){
					$courses = Course::with('user')->where('status',1)->orderBy('created_at')->get();
				}else if($request->sort_by == 'highest_rated'){		
					$courses = Course::with('user')->where('status',1)->orderBy('created_at')->get();
				}		
			}else{
				$courses = Course::with('user')->where('status',1)->get();
			}
			
			
			if(isset($request->duration) && $request->duration != null){
				$selected_duration =$request->duration;
				if($selected_duration == 'lessthan1'){
					$courses = $courses->where('duration','<=',1);
				}
				if($selected_duration == 'lessthan5'){
					$courses = $courses->where('duration','<=',5);
				}
				if($selected_duration == 'morethan5'){
					$courses = $courses->where('duration','>',5);
				}
			
			}

			if(isset($request->categories) && $request->categories != null){

				$categories = array_map('intval', explode(',',$request->categories));
				$selected_categories =$categories;
				$courses = $courses->whereIn('category_id',$categories);
			
			}
		
			if(isset($request->sub_categories ) && $request->categories != null){
	
				$sub_categories = array_map('intval', explode(',',$request->sub_categories));
				$selected_subcategories =$sub_categories;
				
				$courses = $courses->whereIn('subcategory_id',$sub_categories);
			}	
	
			if(isset($request->languages) && $request->categories != null){
	
				$languages = array_map('intval', explode(',',$request->languages));
				$selected_languages =$languages;
				$courses = $courses->whereIn('language_id',$languages);
			}
	
			if(isset($request->level) && $request->level != null){
	
				$level = array_map('intval', explode(',',$request->level));
				$selected_level =$level;
				$courses = $courses->whereIn('level',$level);
			}
			
			return view('learners.pages.classes', compact('categories','selected_duration','sort_type','selected_languages','selected_categories','selected_subcategories','selected_level','filtres_applied','courses','playlists','langauges','filter_categories'));

		}

		if(isset($request->sort_by)){
			$sort_type = $request->sort_by;

			if($request->sort_by == 'latest'){
				$categories = Categories::has('courses')->with(array('courses' => function($query) {$query->where(['status' => 1])->orderBy('created_at' , 'DESC' );}),'subcategory')->where('featured','1')->orderBy('position','ASC')->get();
			}else if($request->sort_by=='highest_rated'){

				$categories = Categories::has('courses')->with(array('courses' => function($query) {$query->where(['status' => 1]);}),'subcategory')->where('featured' , '1')->orderBy('position','ASC')->get();

			}else if($request->sort_by=='most_popular'){
				$categories = Categories::has('courses')->with(array('courses' => function($query) {$query->where([ 'status' => 1])->orderBy('created_at' , 'DESC');}),'courses','subcategory')->where('featured','1')->orderBy('position','ASC')->get();
			}else{
				$categories = Categories::has('courses')->with(array('courses' => function($query) {$query->where('status', 1);}),'subcategory')->where('featured','1')->orderBy('position','ASC')->get();
			}
		
		}else{
				$categories = Categories::has('courses')->with(array('courses' => function($query) {$query->where('status', 1);}),'subcategory')->where('featured','1')->orderBy('position','ASC')->get();
		}
		
		
		return view('learners.pages.classes', compact('categories','filtres_applied', 'selected_duration','sort_type','selected_languages','selected_categories','selected_subcategories','selected_level','playlists','langauges','filter_categories'));

        // if(isset($searchTerm))
        // {
        // 	$courses = Course::search($searchTerm)->paginate(20);
        // 	return view('learners.pages.courses', compact('courses', 'searchTerm'));
    	// }
    	// else
    	// {
    	// 	return back()->with('delete','No Search Value Found');
    	// }
        
	}

	public function courses(Request $request) 
    {	
		
		$langauges = CourseLanguage::where(['status'=>1])->get();
		$filter_categories = Categories::with('subcategory')->where(['status'=>1])->get();
		$courses =[];
		$categories = [];
		$playlists = [];
		$selected_categories = [];
		$selected_subcategories = [];
		$selected_level = [];
		$selected_languages = [];
		$sort_type = "";
		$filtres_applied = false;
		$selected_duration = "";
		$bundleCoures = [];

		if(Auth::check()){
			$playlists = Playlist::where('user_id', Auth::user()->id)->get();   
		}	

		$categories = Categories::has('bundle')->where(['featured'=>1,'status'=>1])->get();
		if($request->filters == 'applied'){
			$filtres_applied = true;
			$bundleCoures = BundleCourse::where(['status'=>1])->get();

			if(isset($request->categories) && $request->categories != null){

				$categories = array_map('intval', explode(',',$request->categories));
				$selected_categories =$categories;
				$bundleCoures = $bundleCoures->whereIn('category_id',$categories);			
			}

			if(isset($request->level) && $request->level != null){
	
				$level = array_map('intval', explode(',',$request->level));
				$selected_level =$level;
				$bundleCoures = $bundleCoures->whereIn('level',$level);
			}
			
		}
		else{
			$bundleCoures = BundleCourse::where(['status'=>1])->get();
		}
		
		return view('learners.pages.courses', compact('categories','bundleCoures','filtres_applied', 'selected_duration','sort_type','selected_languages','selected_categories','selected_subcategories','selected_level','playlists','langauges','filter_categories'));

        // if(isset($searchTerm))
        // {
        // 	$courses = Course::search($searchTerm)->paginate(20);
        // 	return view('learners.pages.courses', compact('courses', 'searchTerm'));
    	// }
    	// else
    	// {
    	// 	return back()->with('delete','No Search Value Found');
    	// }
        /*
		old course page
			if($request->filters == 'applied'){
			$filtres_applied = true;
			if(isset($request->sort_by)){
				$sort_type = $request->sort_by;
				if($request->sort_by == 'latest'){
					$courses = Course::with('user')->where('status',1)->orderBy('created_at')->get();
				}else if($request->sort_by == 'highest_rated'){		
					$courses = Course::with('user')->where('status',1)->orderBy('created_at')->get();
				}		
			}else{
				$courses = Course::with('user')->where('status',1)->get();
			}
			
			
			if(isset($request->duration) && $request->duration != null){
				$selected_duration =$request->duration;
				if($selected_duration == 'lessthan1'){
					$courses = $courses->where('duration','<=',1);
				}
				if($selected_duration == 'lessthan5'){
					$courses = $courses->where('duration','<=',5);
				}
				if($selected_duration == 'morethan5'){
					$courses = $courses->where('duration','>',5);
				}
			
			}

			if(isset($request->categories) && $request->categories != null){

				$categories = array_map('intval', explode(',',$request->categories));
				$selected_categories =$categories;
				$courses = $courses->whereIn('category_id',$categories);
			
			}
		
			if(isset($request->sub_categories ) && $request->categories != null){
	
				$sub_categories = array_map('intval', explode(',',$request->sub_categories));
				$selected_subcategories =$sub_categories;
				
				$courses = $courses->whereIn('subcategory_id',$sub_categories);
			}	
	
			if(isset($request->languages) && $request->categories != null){
	
				$languages = array_map('intval', explode(',',$request->languages));
				$selected_languages =$languages;
				$courses = $courses->whereIn('language_id',$languages);
			}
	
			if(isset($request->level) && $request->level != null){
	
				$level = array_map('intval', explode(',',$request->level));
				$selected_level =$level;
				$courses = $courses->whereIn('level',$level);
			}
			
			return view('learners.pages.courses', compact('categories','selected_duration','sort_type','selected_languages','selected_categories','selected_subcategories','selected_level','filtres_applied','courses','playlists','langauges','filter_categories'));

		}

		if(isset($request->sort_by)){
			$sort_type = $request->sort_by;

			if($request->sort_by == 'latest'){
				$categories = Categories::with(array('courses' => function($query) {$query->where(['status' => 1])->orderBy('created_at' , 'DESC' );}),'subcategory')->where('featured','1')->orderBy('position','ASC')->get();
			}else if($request->sort_by=='highest_rated'){

				$categories = Categories::with(array('courses' => function($query) {$query->where(['status' => 1]);}),'subcategory')->where('featured' , '1')->orderBy('position','ASC')->get();

			}else if($request->sort_by=='most_popular'){
				$categories = Categories::with(array('courses' => function($query) {$query->where([ 'status' => 1])->orderBy('created_at' , 'DESC');}),'courses','subcategory')->where('featured','1')->orderBy('position','ASC')->get();
			}else{
				$categories = Categories::with(array('courses' => function($query) {$query->where('status', 1);}),'subcategory')->where('featured','1')->orderBy('position','ASC')->get();
			}
		
		}else{
				$categories = Categories::with(array('courses' => function($query) {$query->where('status', 1);}),'subcategory')->where('featured','1')->orderBy('position','ASC')->get();
		}
		
		*/
	}
	
    public function search(Request $request) 
    {
        $searchTerm = $request->input('searchTerm');

        if(isset($searchTerm))
        {
        	$courses = Course::search($searchTerm)->paginate(20);
        	return view('learners.pages.courses', compact('courses', 'searchTerm'));
    	}
    	else
    	{
    		return back()->with('delete','No Search Value Found');
    	}
        
	}
	
	public function rateCourse(Request $request){
		$request->validate([
            'review' => 'required',
            'rating_value' => 'required',
		]);
		
		$input['review'] = $request->review;
		$input['rating'] = $request->rating_value;
		$input['user_id'] = Auth::user()->id;
		$input['course_id'] = $request->course_id;
		$input['learn'] = 0;
		$input['price'] = 0;
		$check_review = ReviewRating::where(['user_id'=>$input['user_id'], 'course_id'=>$input['course_id']])->get();
		if(count($check_review) > 0){
			return redirect()->back()->with('success','You have already reviewed the course');
		}
		ReviewRating::create($input);
		
		return redirect()->back()->with('success','Reivew added successfully.');
	}

	public function updateReview(Request $request){
	
		$request->validate([
            'review' => 'required',
            'rating_value' => 'required',
		]);
		
		$review = ReviewRating::where(['id'=>$request->rating_id, 'user_id'=>Auth::user()->id])->first();
		if($review){

			$review->rating = $request->rating_value;
			$review->review = $request->review;
			$review->save();

			return redirect()->back()->with('success','Reivew updated successfully.');
		}else{
			return redirect()->back()->with('success','Review not found');
		}	
		
	}

	
	public function myCourses(){
		
		$playlists = [];

		$on_going_courses = [];
		$yet_to_start_courses = [];
		$completed_courses = [];

		$playlists = Playlist::where('user_id', Auth::user()->id)->get();   

		$watched_courses = UserWatchProgress::where(['user_id'=>Auth::User()->id])->groupBy('course_id')->get()->pluck('course_id')->toArray();

		$purchased_classes = UserPurchasedCourse::with('course','course.user','course.review')->where(['user_id'=>Auth::User()->id])->whereNotIn('course_id', $watched_courses)->whereNull('bundle_id')->pluck('course_id')->toArray();
				
		$ongoing_completed_classes = Course::whereIn('id', $watched_courses)->whereNotIn('id', $purchased_classes)->get();

		$completed_classes = $ongoing_completed_classes->filter->isCompleted()->values();

		$on_going_classes = $ongoing_completed_classes->filter(function ($course) {
			return !$course->isCompleted();
		})->values();

		$yet_to_start = array_diff($purchased_classes, $on_going_classes->pluck('course_id')->toArray());

		$yet_to_start_classes = Course::whereIn('id', $yet_to_start)->get();

		// courses variable

		// $purchased_courses = UserPurchasedCourse::with('course','course.user','course.review')->where(['user_id'=>Auth::User()->id])->whereNotIn('course_id', $watched_courses)->where('bundle_id','>',0)->pluck('bundle_id')->toArray();

		$purchased_courses_ids = UserPurchasedCourse::with('course','course.user','course.review')->where(['user_id'=>Auth::User()->id])->whereNotIn('course_id', $watched_courses)->where('bundle_id','>',0)->groupBy('bundle_id')->get()->pluck('bundle_id')->toArray();
		// dd($purchased_courses, $purchased_courses_ids);
		// $ongoing_completed_courses = BundleCourse::whereIn('id', $watched_courses)->whereNotIn('id', $purchased_courses_ids)->get();
		
		// $completed_courses = $ongoing_completed_courses->filter->isCompleted()->values();

		// $on_going_courses = $ongoing_completed_courses->filter(function ($course) {
		// 	return !$course->isCompleted();
		// })->values();

		$all_bundle_course = BundleCourse::whereIn('id', $purchased_courses_ids)->get();

		$on_going_bundle = $all_bundle_course->filter(function ($course) {
				return !$course->isCompleted();
			})->values();

		// dd($on_going_courses);

		// $completed_ids = $completed_courses->pluck('id')->toArray();

		$completed_bundle = $all_bundle_course->filter->isCompleted()->values();
		// if(count($completed_ids) > 0){
		// 	$completed_bundle = $all_bundle_course->filter(function ($course) use($completed_ids){
		// 		$c = $course->course_id;
		// 		foreach($completed_ids as $ci){
		// 			if(in_array($ci , $c)){
		// 				return $course;
		// 			}
		// 		}
				
		// 	})->values();
		// }

		// $on_going_courses_ids = $on_going_courses->pluck('id')->toArray();
		// $on_going_bundle = [];
		// if(count($on_going_courses_ids) > 0){
		// 	$on_going_bundle = $all_bundle_course->filter(function ($course) use($on_going_courses_ids){
		// 		$c = $course->course_id;
		// 		foreach($on_going_courses_ids as $ci){
		// 			if(in_array($ci , $c)){
		// 				return true;
		// 			}
		// 		}
				
		// 	})->values();
		// }

		$yet_to_start = array_diff($purchased_courses_ids, $on_going_bundle->pluck('id')->toArray());


		$yet_to_start_bundle = BundleCourse::whereIn('id', $yet_to_start)->get();

		// $yet_to_start_ids = $yet_to_start_courses->pluck('id')->toArray();		
		// $yet_to_start_bundle = [];
		

		// if(count($yet_to_start_ids) > 0){
		// 	$yet_to_start_bundle = $all_bundle_course->filter(function ($course) use($yet_to_start_ids){
		// 		$c = $course->course_id;
		// 		foreach($yet_to_start_ids as $ci){
		// 			if(in_array($ci , $c)){
		// 				return true;
		// 			}
		// 		}
				
		// 	})->values();
		// }

		// dd($yet_to_start_bundle);

		return view('learners.pages.my-courses',compact('on_going_bundle','yet_to_start_bundle','completed_bundle','playlists','on_going_classes','yet_to_start_classes', 'completed_classes'));
	}

	public function searchCourse(Request $request){
        
        $input['course_name'] = $request->course_name;

        $langauges = CourseLanguage::where(['status'=>1])->get();
		$filter_categories = Categories::with('subcategory')->where(['status'=>1])->get();
		$courses =[];
		$categories = [];
		$playlists = [];
		$selected_categories = [];
		$selected_subcategories = [];
		$selected_level = [];
		$selected_languages = [];
        $filtres_applied = false;
        
        // if(isset($request->sort_by)){
        //     if($request->sort_by == 'latest'){
        //         $courses = Course::with('user')->where('status',1)->where('title','like','%'.$input['course_name'].'%')->orderBy('created_at')->get();
        //     }else{
        //         $courses = Course::with('user')->where('status',1)->where('title','like','%'.$input['course_name'].'%')->orderBy('created_at')->get();
        //     }		
        // }else{
            $courses = BundleCourse::with('user')->where('title','like','%'.$input['course_name'].'%')->where('status',1)->get();
        // }

        if($request->filters == 'applied'){
            $filtres_applied = true;
            
			if(isset($request->categories) && $request->categories != null){

				$categories = array_map('intval', explode(',',$request->categories));
				$selected_categories =$categories;
				$courses = $courses->whereIn('category_id',$categories);
			
			}		
	
			if(isset($request->level) && $request->level != null){
	
				$level = array_map('intval', explode(',',$request->level));
				$selected_level =$level;
				$courses = $courses->whereIn('level',$level);
			}
        }
        

		if(Auth::check()){
			$playlists = Playlist::where('user_id', Auth::user()->id)->get();   
        }	
        $search_input = $input['course_name'];
        
        return view('learners.pages.search_courses', compact('selected_languages','selected_categories','selected_subcategories','selected_level','filtres_applied','courses','playlists','langauges','filter_categories','search_input'));
    }

	public function searchClass(Request $request){
        
        $input['course_name'] = $request->course_name;

        $langauges = CourseLanguage::where(['status'=>1])->get();
		$filter_categories = Categories::with('subcategory')->where(['status'=>1])->get();
		$courses =[];
		$categories = [];
		$playlists = [];
		$selected_categories = [];
		$selected_subcategories = [];
		$selected_level = [];
		$selected_languages = [];
        $filtres_applied = false;
        
        if(isset($request->sort_by)){
            if($request->sort_by == 'latest'){
                $courses = Course::with('user')->where('status',1)->where('title','like','%'.$input['course_name'].'%')->orderBy('created_at')->get();
            }else{
                $courses = Course::with('user')->where('status',1)->where('title','like','%'.$input['course_name'].'%')->orderBy('created_at')->get();
            }		
        }else{
            $courses = Course::with('user')->where('title','like','%'.$input['course_name'].'%')->where('status',1)->get();
        }

        if($request->filters == 'applied'){
            $filtres_applied = true;
            
			if(isset($request->categories) && $request->categories != null){

				$categories = array_map('intval', explode(',',$request->categories));
				$selected_categories =$categories;
				$courses = $courses->whereIn('category_id',$categories);
			
			}		
	
			if(isset($request->level) && $request->level != null){
	
				$level = array_map('intval', explode(',',$request->level));
				$selected_level =$level;
				$courses = $courses->whereIn('level',$level);
			}
        }
        

		if(Auth::check()){
			$playlists = Playlist::where('user_id', Auth::user()->id)->get();   
        }	
        $search_input = $input['course_name'];
        
        return view('learners.pages.search_classes', compact('selected_languages','selected_categories','selected_subcategories','selected_level','filtres_applied','courses','playlists','langauges','filter_categories','search_input'));
    }


	public function masterClasses(Request $request){

		$categories = [];
		$selected_categories = [];
		$selected_level = [];
		$sort_type = "";
		$filtres_applied = false;
		$search_input = null;
		$playlists = [];
		if(Auth::check())
		{
			Playlist::where('user_id', Auth::user()->id)->get();
		}
		
		$categories = Categories::where(['status'=>1])->get();

		if($request->course_name){
			$master_classes = Course::has('masterclass')->where('title','like','%'.$request->course_name.'%')->where('status',1)->get();
			$search_input = $request->course_name;
		}else{
			$master_classes = Course::has('masterclass')->where('status',1)->get();
		}

		if($request->filters == 'applied'){

			$filtres_applied = true;

			if(isset($request->sort_by)){

				$sort_type = $request->sort_by;

				if($request->sort_by == 'latest'){	

					$master_classes = Course::has('masterclass')->orderBy('created_at' , 'DESC' )->where('status',1)->get();

				}else if($request->sort_by == 'highest_rated'){	

					$master_classes = Course::has('masterclass')->orderBy('created_at' , 'DESC' )->where('status',1)->get();
				}		
			}else{
				$master_classes = Course::has('masterclass')->where('status',1)->get();
			}
		

			if(isset($request->categories) && $request->categories != null){

				$get_categories = array_map('intval', explode(',',$request->categories));
				$selected_categories = $get_categories;
				$master_classes = $master_classes->whereIn('category_id',$get_categories);
			
			}
		
			if(isset($request->level) && $request->level != null){
	
				$level = array_map('intval', explode(',',$request->level));
				$selected_level = $level;
				$master_classes = $master_classes->whereIn('level',$level);
			}
			
			return view('learners.pages.master_classes', compact('master_classes','playlists','search_input','filtres_applied','sort_type','selected_level','selected_categories','categories'));

		}

		return view('learners.pages.master_classes', compact('master_classes','playlists','search_input','filtres_applied','sort_type','selected_level','selected_categories','categories'));
	}

   
}
