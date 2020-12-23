@extends('learners.layouts.app')

@section('content')
<!-- Page: Start-->
<section class="la-cbg--main">
  <div class="la-page la-page--vcreator ">
      <div class="la-page__header">
        <div class="container la-anim__wrap">
          <div class="row">
            <div class="col-1 mb-16">
              <a href="{{URL::previous()}}" class="la-vcreator__back"><span class="la-icon la-icon--5xl icon-back-arrow"></span></a>
            </div>
            <!-- <div class="col offset-7">  
              <div class="la-gsearch my-10">
                <form class="form-inline" action="">
                  <div class="form-group flex-grow-1">
                    <input class="la-gsearch__input w-100 form-control" style="background:transparent" type="text" placeholder="Search Alien Mentor">
                  </div>
                  <button class="la-gsearch__submit btn" type="submit"><i class="la-icon la-icon--3xl icon icon-search"></i></button>
                </form>
              </div>
            </div> -->
          </div>

          @php

             if($creator->user_img){
                  $creator->user_img = asset('/images/user_img/'.$creator->user_img);
             }else{
                  $creator->user_img = "https://picsum.photos/1200/600";
             } 
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
        

          <div class="row py-6 py-md-20">   
            <div class="col-12 p-md-0">
              <h4 class="text-3xl head-font font-weight-bold p-3">Courses from {{ucfirst($creator->FullName)}}</h4>
              <div class="la-courses__creator-courses row col-12">


                @foreach($courses as $course)
                  <div class="col-md-4 px-0">
                    <x-course 
                        :id="$course->id"
                        :img="$course->preview_image" 
                        :course="$course->title" 
                        :url="$course->title" 
                        :rating="$course->review->avg('rating')"
                        :creatorImg="$course->user->user_img"
                        :creatorName="$course->user->FullName"
                        :creatorUrl="$course->user->id"
                      />
                  </div>
                @endforeach

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
    <!-- Page: End-->
@endsection