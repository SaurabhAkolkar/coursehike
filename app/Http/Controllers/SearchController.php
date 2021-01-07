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

class SearchController extends Controller
{
    public function index(Request $request) 
    {	
		$playlists = [];
		if(Auth::check()){
			$playlists = Playlist::where('user_id', Auth::user()->id)->get();   
		}	
		$langauges = CourseLanguage::where(['status'=>1])->get();
		$filter_categories = Categories::with('subcategory')->where(['status'=>1])->get();
		$categories = Categories::with('courses','subcategory')->where('featured','1')->orderBy('position','ASC')->get();
		// dd($categories);

		return view('learners.pages.courses', compact('categories','playlists','langauges','filter_categories'));

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

	public function applyFilter(Request $request){
		$courses = Course::with('user')->where('status',1)->get();
		dd($request);
		$playlists = [];
		if(Auth::check()){
			$playlists = Playlist::where('user_id', Auth::user()->id)->get();   
		}	

		$langauges = CourseLanguage::where(['status'=>1])->get();
		$filter_categories = Categories::with('subcategory')->where(['status'=>1])->get();
		
		if(isset($request->categories)){
			$courses = $courses->whereIn('category_id',$request->categories);
		
		}
		
		if(isset($request->sub_categories)){
			$courses = $courses->whereIn('subcategory_id',$request->sub_categories);
		}	

		if(isset($request->languages)){
			$courses = $courses->whereIn('language_id',$request->languages);
		}

		return view('learners.pages.filtered_courses', compact('filter_categories','playlists','langauges','courses'));	
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

   
}
