@extends('learners.layouts.app')
@section('seo_content')
    <title>Interests | Learn Anything Artistic Online | Start For Free Today | LILA</title>
    <meta name='description' itemprop='description' content='Creative online course for creative minds. Discover & learn classes on art,design, baking, tattoo making & much more. Start your free trial with LILA now' />

    <meta property="og:description" content="Creative online course for creative minds. Discover & learn classes on art,design, baking, tattoo making & much more. Start your free trial with LILA now" />
    <meta property="og:title" content="Interests | Learn Anything Artistic Online | Start For Free Today | LILA" />
    <meta property="og:url" content="{{Request::url()}}" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="LILA Art" />
    <meta property="og:image" content="{{config('app.url')}}/images/learners/logo.svg" />
    <meta property="og:image:url" content="{{config('app.url')}}/images/learners/logo.svg" />
    <meta property="og:image:size" content="300" />

    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="Interests | Learn Anything Artistic Online | Start For Free Today | LILA" />
    <meta name="twitter:site" content="@lilaaliens" />

    <script type="application/ld+json">{"@context":"https://schema.org","@type":"WebPage","name":"Dashboard | Learn Anything Artistic Online | Start For Free Today | LILA"}</script>
@endsection


@section('content')
    <section class="la-cdashboard-main">
        <div class="la-section__small la-section__inner">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4 text-center">
                        <div class="la-dashboard__interests">
                            <h1 class="la-cdashboard__user-name mb-2 text-3xl text-md-4xl text-capitalize">
                                Welcome 
                                <span style="color:var(--app-indigo-1);">Nathan!</span>
                            </h1>
                            <p class="la-dashboard__interests-tag">Let's explore something extraordinary <br class="d-none d-md-block"/> and learn it like aliens.</p>
                        </div>

                       
                        <div class="py-6 py-lg-10">
                            <h2 class="la-entry__content-title text-xl mb-6">Tell us what you like</h2>
                                
                                @php
                                        $interest1 = new stdClass;                        
                                        $interest1->img = "../images/learners/dashboard/hp1.png";
                                        $interest1->name = "Photography";
                                        $interest1->id = "1";
            
                                        $interest2 = new stdClass;                           
                                        $interest2->img = "../images/learners/dashboard/hp2.png";
                                        $interest2->name = "Design";
                                        $interest2->id = "2";
            
                                        $interest3 = new stdClass;
                                        $interest3->img = "../images/learners/dashboard/hp3.png";
                                        $interest3->name = "Tattoo";
                                        $interest3->id = "3";

                                        $interest4 = new stdClass;                        
                                        $interest4->img = "../images/learners/dashboard/hp1.png";
                                        $interest4->name = "Photography";
                                        $interest4->id = "1";
            
                                        $interest5 = new stdClass;                           
                                        $interest5->img = "../images/learners/dashboard/hp2.png";
                                        $interest5->name = "Design";
                                        $interest5->id = "2";
            
                                        $interest6 = new stdClass;
                                        $interest6->img = "../images/learners/dashboard/hp3.png";
                                        $interest6->name = "Tattoo";
                                        $interest6->id = "3";

                                        $interest7 = new stdClass;
                                        $interest7->img = "../images/learners/dashboard/hp3.png";
                                        $interest7->name = "Tattoo";
                                        $interest7->id = "3";

                                        $interest8 = new stdClass;
                                        $interest8->img = "../images/learners/dashboard/hp3.png";
                                        $interest8->name = "Tattoo";
                                        $interest8->id = "3";

                                        $interest9 = new stdClass;
                                        $interest9->img = "../images/learners/dashboard/hp3.png";
                                        $interest9->name = "Tattoo";
                                        $interest9->id = "3";

                                        $interest10 = new stdClass;
                                        $interest10->img = "../images/learners/dashboard/hp3.png";
                                        $interest10->name = "Tattoo";
                                        $interest10->id = "3";

                                        $interest11 = new stdClass;
                                        $interest11->img = "../images/learners/dashboard/hp3.png";
                                        $interest11->name = "Tattoo";
                                        $interest11->id = "3";

                                        $interest12 = new stdClass;
                                        $interest12->img = "../images/learners/dashboard/hp3.png";
                                        $interest12->name = "Tattoo Art & Creative";
                                        $interest12->id = "3";

                                        $interest13 = new stdClass;
                                        $interest13->img = "../images/learners/dashboard/hp3.png";
                                        $interest13->name = "Tattoo";
                                        $interest13->id = "3";
                                        
                                        $interests = array( $interest1, $interest2, $interest3, $interest4, $interest5, $interest6, $interest7, $interest8, $interest9, $interest10, $interest11, $interest12, $interest13);
                                @endphp
                                    
                            <div class="la-entry__interests la-entry__interests--dashboard">
                                <div class="row ">
                                     @foreach ($interests as $interest)
                                        <x-learner-interest
                                            :img="$interest->img"
                                            :name="$interest->name"
                                            :id="$interest->id"
                                        />
                                    @endforeach
                                </div>
                            </div>
                        </div>        
                        
                        <div class="py-6 py-md-10">
                            <h3 class="text-xl mb-6">Tell us something about you</h3>

                            <div class="">
                                <form class="la-learner__interest-form">
                                    <div class="la-form__input-wrap text-left">
                                        <div class="la-form__lable la-form__lable--medium mb-2" style="color:var(--gray3)">What do you want to learn?</div>
                                        <select class="la-form__input" name="select_interest" id="select_interest">
                                            <option disabled selected>Select </option>
                                            <option value="">Something</option>
                                          <select>
                                    </div>

                                    <div class="la-form__input-wrap text-left">
                                        <div class="la-form__lable la-form__lable--medium mb-2" style="color:var(--gray3)">How much experience do you have in this field?</div>
                                        <div class="d-md-flex pt-2">
                                            <div class="la-form__radio-wrap mr-5">
                                                <input class="la-form__radio d-none" type="radio" value="experience_1" name="learner_experience" id="experience_1" @if(Auth::user()->gender == "male")checked @endif>
                                                <label class="d-flex align-items-center" for="experience_1">
                                                  <span class="la-form__radio-circle d-flex justify-content-center align-items-center mr-2"></span>
                                                  <span class="text-sm">0-1 year</span>
                                                </label>
                                            </div>

                                            <div class="la-form__radio-wrap mr-5">
                                                <input class="la-form__radio d-none" type="radio" value="experience_2" name="learner_experience" id="experience_2" @if(Auth::user()->gender == "female")checked @endif>
                                                <label class="d-flex align-items-center" for="experience_2">
                                                  <span class="la-form__radio-circle d-flex justify-content-center align-items-center mr-2"></span>
                                                  <span class="text-sm">1-5 years</span>
                                                </label>
                                            </div>

                                            <div class="la-form__radio-wrap mr-5">
                                                <input class="la-form__radio d-none" type="radio" value="experience_3" name="learner_experience" id="experience_3" @if(Auth::user()->gender == "Other")checked @endif>
                                                <label class="d-flex align-items-center" for="experience_3">
                                                  <span class="la-form__radio-circle d-flex justify-content-center align-items-center mr-2"></span>
                                                  <span class="text-sm">more than 5 years</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="la-entry__interest-next my-6 la-btn__arrow text--purple text-uppercase">
                                        <a onclick="" role="button">
                                            <span class="text-lg">GET STARTED</span>
                                            <span class="la-btn__arrow-icon la-icon la-icon--7xl icon-black-arrow"></span>
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection