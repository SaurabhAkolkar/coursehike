<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;
use App\Slider;
use App\SliderFacts;
use App\CategorySlider;
use App\Course;
use App\BundleCourse;
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

        $cor = Cache::remember('home_classes', $seconds = 86400, function () {
            return Course::with('review', 'user')->get();
        });

        $filter_categories = Cache::remember('home_filter_categories', $seconds = 86400, function () {
            return Categories::with('subcategory', 'courses', 'courses.user')->where(['status'=>1])->get();
        });

        $selected_categories = [];
		$selected_level = [];
		$selected_languages = [];
		$sort_type = "";
		$filtres_applied = false;
        $selected_duration = "";
        $courses = [];

        $firstSection = Cache::remember('home_FirstSection', $seconds = 86400, function () {
            $firstSection = FirstSection::first();
            if($firstSection == null){
                $firstSection = new stdClass;
                $firstSection->sub_heading = 'Observe, learn and converse with creators to master your arts';
                $firstSection->image = asset('images/learners/home/design-a@2x.png');
                $firstSection->image_text = 'DESIGN';
            }
            return $firstSection;
        });

        if(Auth::check())
            $playlists = Playlist::where('user_id', Auth::user()->id)->get();

        $master_classes = Cache::remember('home_master_classes', $seconds = 86400, function () {
            return MasterClass::with(array('courses' => function($query) {$query->with('user')->where('status', 1)->orderBy('order');}),'courses.user', 'review')->get();
        });
        
        $featuredMentor = Cache::remember('home_featuredMentor', $seconds = 86400, function () {
            return FeaturedMentor::with('user','courses','courses.category')->where(['status'=>'1'])->get();
        });

        $bundleCoures = Cache::remember('home_bundle', $seconds = 86400, function () {
            return BundleCourse::with('user')->where(['status'=>1])->get();
        });
        
        $categories = Cache::remember('home_categories', $seconds = 86400, function () {
            return Categories::with(array('courses' => function($query) {$query->orderBy('order')->where('status', 1);}),'subcategory')->where('featured','1')->orderBy('position','ASC')->get();
        });


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
