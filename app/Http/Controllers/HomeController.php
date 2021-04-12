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
        $sliders = Slider::orderBy('position', 'ASC')->get();
        $facts = SliderFacts::limit(3)->get();
        // $categories = CategorySlider::first();
        $cor = Course::all();
        $bundles = BundleCourse::get();
        $meetings = Meeting::where('link_by', NULL)->get();
        $bigblue = BBL::where('is_ended','!=',1)->where('link_by', NULL)->get();
        $testi = Testimonial::all();
        $trusted = Trusted::all();
        $playlists = [];
        $firstSection = FirstSection::first();
        $langauges = CourseLanguage::where(['status'=>1])->get();
		$filter_categories = Categories::with('subcategory')->where(['status'=>1])->get();
        $selected_categories = [];
		$selected_level = [];
		$selected_languages = [];
		$sort_type = "";
		$filtres_applied = false;
        $selected_duration = "";
        $courses = [];
        

        

        if($firstSection == null){
            $firstSection = new stdClass;
            $firstSection->sub_heading = 'Observe, learn and converse with creators to master your arts';
            $firstSection->image = asset('images/learners/home/design-a@2x.png');
            $firstSection->image_text = 'DESIGN';
            //- $firstSection->video_url = 'https://static.wixstatic.com/media/86f3ff_12683ef001af42d593da862ef103a9b6f000.jpg/v1/fill/w_760,h_476,al_c,q_85,usm_0.33_1.00_0.00/86f3ff_12683ef001af42d593da862ef103a9b6f000.webp';
            
        }

        if(Auth::check()){
            $playlists = Playlist::where('user_id', Auth::user()->id)->get();   
        }
        $master_classes = MasterClass::with(array('courses' => function($query) {$query->where('status', 1)->orderBy('order');}),'courses.user')->get();
        
        $featuredMentor = FeaturedMentor::with('user','courses','courses.category')->where(['status'=>'1'])->get();

		$bundleCoures = BundleCourse::where(['status'=>1])->get();
        
        // if(isset($request->sort_by)){
        //     $sort_type = $request->sort_by;

        //     if($request->sort_by == 'latest'){
        //         $categories = Categories::with(array('courses' => function($query) {$query->where(['status' => 1])->orderBy('created_at' , 'DESC' );}),'subcategory')->where('featured','1')->orderBy('position','ASC')->get();
        //     }else if($request->sort_by=='highest_rated'){

        //         $categories = Categories::with(array('courses' => function($query) {$query->where(['status' => 1]);}),'subcategory')->where('featured','1')->orderBy('position','ASC')->get();

        //     }else if($request->sort_by=='most_popular'){
        //         $categories = Categories::with(array('courses' => function($query) {$query->where([ 'status' => 1])->orderBy('created_at' , 'DESC');}),'subcategory')->where('featured','1')->orderBy('position','ASC')->get();
        //     }else{
        //         $categories = Categories::with(array('courses' => function($query) {$query->where('status', 1);}),'subcategory')->where('featured','1')->orderBy('position','ASC')->get();
        //     }
        
        // }else{
        // }

        $categories = Categories::with(array('courses' => function($query) {$query->orderBy('order')->where('status', 1);}),'subcategory')->where('featured','1')->orderBy('position','ASC')->get();

        
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