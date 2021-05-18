<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;
use App\Slider;
use App\SliderFacts;
use App\CategorySlider;
use App\Course;
use App\Meeting;
use App\BBL;
use App\BundleCourse;
use App\Testimonial;
use App\Trusted;
use App\Playlist;
use App\MasterClass;
use App\FirstSection;
use App\FeaturedMentor;
use Auth;
use App\CourseLanguage;
use Illuminate\Support\Facades\Cache;
use stdClass;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware(['auth','verified']);
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $categories = [];
        $playlists = [];

        // $cor = Cache::remember('classes', $seconds = 86400, function () {
        //     return Course::with('review', 'user')->get();
        // });

        $cor = Course::with('review', 'user')->get();

        // $filter_categories = Cache::remember('categories', $seconds = 86400, function () {
        //     return Categories::with('subcategory', 'courses', 'courses.user')->where(['status'=>1])->get();
        // });
        $filter_categories = Categories::with('subcategory', 'courses', 'courses.user')->where(['status'=>1])->get();

        $selected_categories = [];
		$selected_level = [];
		$selected_languages = [];
		$sort_type = "";
		$filtres_applied = false;
        $selected_duration = "";
        $courses = [];

        // $firstSection = Cache::remember('HomeFirstSection', $seconds = 86400, function () {
        //     $firstSection = FirstSection::first();
        //     if($firstSection == null){
        //         $firstSection = new stdClass;
        //         $firstSection->sub_heading = 'Observe, learn and converse with creators to master your arts';
        //         $firstSection->image = asset('images/learners/home/design-a@2x.png');
        //         $firstSection->image_text = 'DESIGN';            
        //     }
        //     return $firstSection;
        // });

        $firstSection = FirstSection::first();
        if($firstSection == null){
            $firstSection = new stdClass;
            $firstSection->sub_heading = 'Observe, learn and converse with creators to master your arts';
            $firstSection->image = asset('images/learners/home/design-a@2x.png');
            $firstSection->image_text = 'DESIGN';            
        }

        if(Auth::check())
            $playlists = Playlist::where('user_id', Auth::user()->id)->get();

        // $master_classes = Cache::remember('master_classes', $seconds = 86400, function () {
        //     return MasterClass::with(array('courses' => function($query) {$query->with('user')->where('status', 1)->orderBy('order');}),'courses.user', 'review')->get();
        // });

        $master_classes = MasterClass::with(array('courses' => function($query) {$query->with('user')->where('status', 1)->orderBy('order');}),'courses.user', 'review')->get();
        
        // $featuredMentor = Cache::remember('featuredMentor', $seconds = 86400, function () {
        //     return FeaturedMentor::with('user','courses','courses.category')->where(['status'=>'1'])->get();
        // });

        $featuredMentor = FeaturedMentor::with('user','courses','courses.category')->where(['status'=>'1'])->get();;

        // $bundleCoures = Cache::remember('bundle', $seconds = 86400, function () {
        //     return BundleCourse::with('user')->where(['status'=>1])->get();
        // });

        $bundleCoures = BundleCourse::with('user')->where(['status'=>1])->get();
        
        // $categories = Cache::remember('categories', $seconds = 1, function () {
        //     return Categories::with(array('courses' => function($query) {$query->orderBy('order')->where('status', 1);}),'subcategory')->where('featured','1')->orderBy('position','ASC')->get();
        // });

        $categories = Categories::with(array('courses' => function($query) {$query->orderBy('order')->where('status', 1);}),'subcategory')->where('featured','1')->orderBy('position','ASC')->get();;

        
        $data = [
            'categories'=>$categories,
            'playlists' => $playlists,
            'firstSection' => $firstSection,
            'featuredMentor' => $featuredMentor,
            'master_classes' => $master_classes,
            // 'sliders' => $sliders,
            // 'facts' => $facts,
            'cor' => $cor,
            // 'bundles' => $bundles,
            // 'meetings' => $meetings,
            // 'bigblue' => $bigblue,
            // 'testi' => $testi,
            // 'trusted' => $trusted,
            'selected_duration' => $selected_duration,
            'sort_type' => $sort_type,
            'selected_languages' => $selected_languages,
            'selected_categories' => $selected_categories,
            'selected_level' => $selected_level,
            'filtres_applied' => $filtres_applied,
            'courses' => $courses,
            // 'langauges' => $langauges,
            'filter_categories'=>$filter_categories,
            'bundleCoures' => $bundleCoures
        ];

        return view('learners.pages.home')->with($data);
    }

}


//filter code commented
/*
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
    
    $data = [
        'categories'=>$categories,
        'playlists' => $playlists,
        'firstSection' => $firstSection,
        'featuredMentor' => $featuredMentor,
        'master_classes' => $master_classes,
        'sliders' => $sliders,
        'facts' => $facts,
        'cor' => $cor,
        'bundles' => $bundles,
        'meetings' => $meetings,
        'bigblue' => $bigblue,
        'testi' => $testi,
        'trusted' => $trusted,
        'selected_duration' => $selected_duration,
        'sort_type' => $sort_type,
        'selected_languages' => $selected_languages,
        'selected_categories' => $selected_categories,
        'selected_level' => $selected_level,
        'filtres_applied' => $filtres_applied,
        'courses' => $courses,
        'langauges' => $langauges,
        'filter_categories'=>$filter_categories
    ];
    
    return view('learners.pages.home')->with($data);

**/