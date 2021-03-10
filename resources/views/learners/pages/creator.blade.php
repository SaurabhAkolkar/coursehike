@extends('learners.layouts.app')

@section('seo_content')
    <title>{{$creator->FullName}} | Mentor | Best Online Courses for Art & Creativity | LILA</title>
    <meta name='description' itemprop='description' content='Best Online Courses in art & creativity for creative minds Get Started for free and learn from passionate creators & mentors all around the world. Join now' />

    <meta property="og:description"content="Best Online Courses in art & creativity for creative minds Get Started for free and learn from passionate creators & mentors all around the world. Join now" />
    <meta property="og:title"content="{{$creator->FullName}} | Mentor | Best Online Courses for Art & Creativity | LILA" />
    <meta property="og:url"content="{{Request::url()}}" />
    <meta property="og:type"content="website" />
    <meta property="og:site_name"content="LILA Art" />
    <meta property="og:image"content="{{config('app.url')}}/images/learners/logo.svg" />
    <meta property="og:image:url"content="{{config('app.url')}}/images/learners/logo.svg" />
    <meta property="og:image:size"content="300" />

    <meta name="twitter:card"content="summary" />
    <meta name="twitter:title"content="{{$creator->FullName}} | Mentor | Best Online Courses for Art & Creativity | LILA" />
    <meta name="twitter:site"content="@lilaaliens" />
    
    <script type="application/ld+json">{"@context":"https://schema.org","@type":"WebPage","name":"{{$creator->FullName}} | Mentor | Best Online Courses for Art & Creativity | LILA"}</script>
@endsection

@section('content')
<!-- Page: Start-->
<section class="la-cbg--main">
  <div class="la-page la-page--vcreator ">
      <div class="la-page__header">
        <div class="container-fluid la-anim__wrap">
          <div class="row">
            <div class="col-1 mb-14">
              <a href="/mentors" class="la-vcreator__back"><span class="la-icon la-icon--5xl icon-back-arrow"></span></a>
            </div>
          </div>

          @php
             if(!$rating){
                $rating = 0;
             }
             $course_count = count($courses);
          @endphp

          
            <x-creator-profile 
                  :img="$creator->user_img"
                  :name="$creator->FullName"
                  :desc="$creator->detail"
                  :email="$creator->email"
                  :skill="$creator->skill"
                  :location="$creator->location"
                  :courses="$course_count"
                  :rating="$rating"
                  :awards="$creator->award_count"
                  :facebook="$creator->facebook_id"
                  :google="$creator->google_id"
              />
        
              <div class="row py-14 py-md-20">   
                  <div class="col-12 la-anim__wrap">
                    <h4 class="text-2xl text-md-3xl px-0 pb-8 la-anim__stagger-item">Courses from <span class="text-capitalize"> {{ucfirst($creator->FullName)}}</span></h4>
                   
                    @if(count($courses) == 0) 

                        <div class="row">
                            <div class="la-empty__courses w-100 d-md-flex justify-content-between align-items-center mt-0 mt-md-6">
                              <div class="la-empty__inner">
                                  <h6 class="la-empty__course-title text-xl la-anim__stagger-item">No more Courses from {{ucfirst($creator->FullName)}}</h6>
                              </div>
                              <div class="la-empty__browse-courses mt-n4 la-anim__stagger-item--x">
                                  <a href="/browse/courses" class="la-empty__browse">
                                      Browse Courses
                                      <span class="la-empty__browse-icon la-icon la-icon--5xl icon-grey-arrow "></span>
                                  </a>
                              </div>
                            </div>    
                        </div>

                    @else
                            
                        <div class="la-courses__creator-courses row row-cols-md-2 row-cols-lg-3 la-anim__stagger-item">
                                
                                @foreach($courses as $course)
                                
                                    <div class="col-md-6 col-lg-3 px-0">
                                      <x-course 
                                          :id="$course->id"
                                          :img="$course->preview_image" 
                                          :course="$course->title" 
                                          :url="$course->title" 
                                          :rating="round($course->average_rating, 2)"
                                          :creatorImg="$course->user->user_img"
                                          :creatorName="$course->user->FullName"
                                          :creatorUrl="$course->user->id"
                                          :learnerCount="$course->learnerCount"
                                          :price="$course->price"
                                          :bought="$course->isPurchased()"
                                          :checkWishList="$course->checkWishList"
                                          :checkCart="$course->checkCart"
                                        />
                                    </div>
                            
                                @endforeach
                          </div>
                    @endif
                  </div>
              </div>
        </div>
      </div>
    </div>
</section>
    <!-- Page: End-->
@endsection