<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FaqInstructor;
use App\FaqStudent;

class WebsiteController extends Controller
{
    public function becomeCreator(){

        $faqs = FaqInstructor::where(['status'=>1])->get();
        return view('learners.pages.become-creator', compact('faqs'));
    }

    public function guidedCreator(){

        $faqs = FaqInstructor::where(['status'=>1])->get();
        return view('learners.pages.guided-creator', compact('faqs'));
    }

    public function learningPlans(){

        $faqs = FaqStudent::where(['status'=>1])->get();
        
        return view('learners.pages.learning-plans', compact('faqs'));
    }
}
