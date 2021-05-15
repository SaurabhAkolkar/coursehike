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
        }

        if(Auth::check()){
            $playlists = Playlist::where('user_id', Auth::user()->id)->get();
        }
        $master_classes = MasterClass::with(array('courses' => function($query) {$query->where('status', 1)->orderBy('order');}),'courses.user')->get();

        $featuredMentor = FeaturedMentor::with('user','courses','courses.category')->where(['status'=>'1'])->get();

		$bundleCoures = BundleCourse::where(['status'=>1])->get();

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
            'courses' => $courses,
            'langauges' => $langauges,
            'filter_categories'=>$filter_categories,
            'bundleCoures' => $bundleCoures
        ];

        return view('learners.pages.home')->with($data);
    }

}
