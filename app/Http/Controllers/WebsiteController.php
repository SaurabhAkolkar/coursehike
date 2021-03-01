<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FaqInstructor;
use App\FaqStudent;
use App\Testimonial;
use stdClass;
use Stevebauman\Location\Facades\Location;


class WebsiteController extends Controller
{
    public function becomeCreator(){

        $faqs = FaqInstructor::where(['status'=>1])->get();
        $testimonial = Testimonial::where(['status'=>1, 'type'=>'mentor'])->get()->take(3);
        
        return view('learners.pages.become-creator', compact('faqs', 'testimonial'));
    }

    public function guidedCreator(){

        $faqs = FaqInstructor::where(['status'=>1])->get();
        return view('learners.pages.guided-creator', compact('faqs'));
    }

    public function learningPlans(){

        $faqs = FaqStudent::where(['status'=>1])->get();

        $testimonial = Testimonial::where(['status'=>1, 'type'=>'learner'])->get()->take(3);

        $country = 'US';
        $currency = '$';
        if ($position = Location::get()) {
            $country = $position->countryCode;
        }

        if($country != 'IN'){
            // Global
            $plan1 = new stdClass;
            $plan1->plan = "Monthly";
            $plan1->discount = '$39';
            $plan1->oldPrice = 49;
            $plan1->class= "red";
            $plan1->saving = 10;
            $plan1->slug = "monthly-global";

            $plan2 = new stdClass;
            $plan2->plan = "Yearly";
            $plan2->discount = '$309';
            $plan2->oldPrice = 324;
            $plan2->class= "green";
            $plan2->saving = 25;
            $plan2->slug = "yearly-global";

            $plans = array($plan1, $plan2);

        }else{
            // Indian
            $plan1 = new stdClass;
            $plan1->plan = "Monthly";
            $plan1->discount = '₹2899';
            $plan1->oldPrice = 49;
            $plan1->class= "red";
            $plan1->saving = 10;
            $plan1->slug = "monthly-india";

            $plan2 = new stdClass;
            $plan2->plan = "Yearly";
            $plan2->discount = '₹22599';
            $plan2->oldPrice = 324;
            $plan2->class= "green";
            $plan2->saving = 25;
            $plan2->slug = "yearly-india";

            $plans = array($plan1, $plan2);
        }

        

        return view('learners.pages.learning-plans', compact('plans', 'faqs','testimonial'));
    }
}
