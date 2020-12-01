@extends('learners.layouts.app')

@section('content')
<!-- Page: Start-->
<section class="la-cbg--main">
  <div class="la-page la-page--vcreator ">
      <div class="la-page__header">
        <div class="container">
          <div class="row">
            <div class="col-1 mb-16">
              <a href="" class="la-vcreator__back-link"><span class="la-icon la-icon--6xl icon-grey-arrow"></span></a>
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
              $creator->awards = 5;

             if($creator->user_img){
                  $creator->user_img = asset('/images/user_img/'.$creator->user_img);
             }else{
                  $creator->user_img = "https://picsum.photos/1200/600";
             } 
             if(!$rating){
                $rating = 0;
             }
             $course_count = count($courses);
             if(!$creator->facebook_id){
                  $creator->facebook_id = "#";
             }
             if(!$creator->google_id){
                  $creator->google_id = "#";
             }
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
                  :awards="$creator->awards"
                  :facebook="$creator->facebook_id"
                  :google="$creator->google_id"
              />
        

          <div class="row py-6 py-md-20">   
            <div class="col p-md-0">
              <h4 class="text-3xl head-font font-weight-bold p-3">Courses from {{ucfirst($creator->FullName)}}</h4>
              <div class="la-courses__creator-courses d-flex flex-row">
                @php  
                  $tattoo1 = new stdClass;$tattoo1->img= "https://picsum.photos/600/400";$tattoo1->course= "Tattoo Art";$tattoo1->rating= "4";$tattoo1->url= "";$tattoo1->creatorImg= "https://picsum.photos/100";$tattoo1->creatorName= "Joseph Phill";$tattoo1->creatorUrl= "/creator";
                  $tattoo2 = new stdClass;$tattoo2->img= "https://picsum.photos/600/400"; $tattoo2->course= "Tattoo Art";$tattoo2->rating= "4";$tattoo2->url= "";$tattoo2->creatorImg= "https://picsum.photos/100";$tattoo2->creatorName= "Amy D'souza";$tattoo2->creatorUrl= "/creator";
                  $tattoo3 = new stdClass;$tattoo3->img= "https://picsum.photos/600/400";$tattoo3->course= "Tattoo Art";$tattoo3->rating= "4";$tattoo3->url= "";$tattoo3->creatorImg= "https://picsum.photos/100";$tattoo3->creatorName= "Alton Crew";$tattoo3->creatorUrl= "/creator";
                
                  $tattoos = array($tattoo1, $tattoo2, $tattoo3);
                @endphp

                @foreach($courses as $course)
                  <x-course 
                      :id="$course->id"
                      :img="$course->preview_image" 
                      :course="$course->title" 
                      :url="$course->title" 
                      :rating="4"
                      :creatorImg="$course->user()->user_img"
                      :creatorName="$course->user()->FullName"
                      :creatorUrl="$course->user()->id"
                    />
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