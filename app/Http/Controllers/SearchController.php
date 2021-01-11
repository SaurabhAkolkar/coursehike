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
		$selected_language = [];
		$filtres_applied = false;
		if(Auth::check()){
			$playlists = Playlist::where('user_id', Auth::user()->id)->get();   
		}	

		if($request->filters == 'applied'){
			$filtres_applied = true;
			if(isset($request->sort_by)){
				if($request->sort_by == 'latest'){
					$courses = Course::with('user')->where('status',1)->orderBy('created_at')->get();
				}else{
					$courses = Course::with('user')->where('status',1)->orderBy('created_at')->get();
				}		
			}else{
				$courses = Course::with('user')->where('status',1)->get();
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
				$courses = $courses->level('level',$level);
			}

			return view('learners.pages.courses', compact('categories','selected_language','selected_categories','selected_subcategories','selected_level','filtres_applied','courses','playlists','langauges','filter_categories'));

		}

		if(isset($request->sort_by)){
		
			if($request->sort_by == 'latest'){
				$categories = Categories::with(array('courses' => function($query) {$query->orderBy('created_at', 'DESC');}),'subcategory')->where('featured','1')->orderBy('position','ASC')->get();
			}else if($request->sort_by=='highest_rated'){
				$categories = Categories::with(array('courses' => function($query) {$query->orderBy('created_at', 'DESC');}),'courses','subcategory')->where('featured','1')->orderBy('position','ASC')->get();
			}else if($request->sort_by=='most_popular'){
				$categories = Categories::with(array('courses' => function($query) {$query->orderBy('created_at', 'DESC');}),'courses','subcategory')->where('featured','1')->orderBy('position','ASC')->get();
			}else{
				$categories = Categories::with('courses','subcategory')->where('featured','1')->orderBy('position','ASC')->get();
			}
		
		}else{
				$categories = Categories::with('courses','subcategory')->where('featured','1')->orderBy('position','ASC')->get();
		}
		
		
		return view('learners.pages.courses', compact('categories','filtres_applied','selected_language','selected_categories','selected_subcategories','selected_level','playlists','langauges','filter_categories'));

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
			return redirect()->back()->with('failed','You have already reviewed the course');
		}
		ReviewRating::create($input);
		
		return redirect()->back()->with('success','Reivew added successfully.');
	}
	
	public function myCourses(){
		$playlists = Playlist::where('user_id', Auth::user()->id)->get();   
		$courses = UserPurchasedCourse::with('course','course.user','course.review')->where(['user_id'=>Auth::User()->id])->get();
		return view('learners.pages.my-courses',compact('playlists','courses'));
	}

	public function masterClasses(){
        $master_classes = MasterClass::with('courses','courses.user')->get();
		return view('learners.pages.master_classes', compact('master_classes'));
	}

   
}
