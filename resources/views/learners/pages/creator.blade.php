@extends('learners.layouts.app')

@section('content')
<!-- Page: Start-->
<section class="la-cbg--main">
  <div class="la-page la-page--vcreator ">
      <div class="la-page__header">
        <div class="container la-anim__wrap">
          <div class="row">
            <div class="col-1 mb-14">
              <a href="{{URL::previous()}}" class="la-vcreator__back"><span class="la-icon la-icon--5xl icon-back-arrow"></span></a>
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
                  :awards="$awards"
                  :facebook="$creator->facebook_id"
                  :google="$creator->google_id"
              />
        
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
                  <div class="row py-6 py-md-20">   
                    <div class="col-12 px-0">
                      <h4 class="text-2xl text-md-3xl px-3 px-md-1 pb-8">Courses from <span class="text-capitalize">{{ucfirst($creator->FullName)}}</span></h4>
                      <div class="la-courses__creator-courses d-md-flex">

                        
                      @foreach($courses as $course)
                      
                          <div class="col-md-4 px-0 ">
                            <x-course 
                                :id="$course->id"
                                :img="$course->preview_image" 
                                :course="$course->title" 
                                :url="$course->title" 
                                :rating="$course->review->avg('rating')"
                                :creatorImg="$course->user->user_img"
                                :creatorName="$course->user->FullName"
                                :creatorUrl="$course->user->id"
                                :learnerCount="$course->learnerCount"
                              />
                          </div>
                  
                      @endforeach
                  </div>
                </div>
              </div>

          @endif
        </div>
      </div>
    </div>
</section>
    <!-- Page: End-->
@endsection