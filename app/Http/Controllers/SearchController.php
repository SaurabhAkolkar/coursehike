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
use App\UserWatchTimelog;

class SearchController extends Controller
{
    public function index(Request $request) 
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
		
		
		return view('learners.pages.courses', compact('categories','filtres_applied', 'selected_duration','sort_type','selected_languages','selected_categories','selected_subcategories','selected_level','playlists','langauges','filter_categories'));

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
		
		$playlists = Playlist::where('user_id', Auth::user()->id)->get();   
		$course_ids = UserPurchasedCourse::with('course','course.user','course.review')->where(['user_id'=>Auth::User()->id])->pluck('course_id')->toArray();
		$on_going_courses = UserWatchTimelog::with('course')->whereIn('course_id', $course_ids)->groupBy('course_id')->get()->take(4);

		$yet_to_start = array_diff($course_ids, $on_going_courses->pluck('course_id')->toArray());
		$yet_to_start_courses = Course::whereIn('id', $yet_to_start)->get()->take(4);

		return view('learners.pages.my-courses',compact('playlists','on_going_courses','yet_to_start_courses'));
	}

	public function masterClasses(Request $request){

		$categories = [];
		$selected_categories = [];
		$selected_level = [];
		$sort_type = "";
		$filtres_applied = false;
		$search_input = null;

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
			
			return view('learners.pages.master_classes', compact('master_classes','search_input','filtres_applied','sort_type','selected_level','selected_categories','categories'));

		}

		return view('learners.pages.master_classes', compact('master_classes','search_input','filtres_applied','sort_type','selected_level','selected_categories','categories'));
	}

   
}
