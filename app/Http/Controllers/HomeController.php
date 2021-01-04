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
    public function index()
    {
        $categories = Categories::with('courses')->where('featured','1')->orderBy('position','ASC')->get();
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
            if($firstSection == null){
                $firstSection = new stdClass;
                $firstSection->sub_heading = 'Observe, learn and converse with creators to master your arts';
                $firstSection->image = asset('images/learners/home/design-a@2x.png');
                $firstSection->image_text = 'DESIGN';
                
            }

        if(Auth::check()){
            $playlists = Playlist::where('user_id', Auth::user()->id)->get();   
        }
        $master_classes = MasterClass::with('courses','courses.user')->get();
        $featuredMentor = FeaturedMentor::with('user','courses','courses.category')->where(['status'=>'1'])->get();
       
        //dd($featuredMentor);
        
    
        return view('learners.pages.home', compact('categories','playlists','firstSection', 'featuredMentor','master_classes','sliders', 'facts', 'cor', 'bundles', 'meetings', 'bigblue', 'testi', 'trusted'));
    }

}
