@extends('learners.layouts.app')

@section('content')
<div class="la-profile">
    <div class="la-profile__wrap">

      <!-- Side Navbar: Start -->
        @include ('learners.pages.sidebar')
      <!-- Side Navbar: End -->

      @php  
      $tattoo1 = new stdClass;$tattoo1->img= "https://picsum.photos/600/400";$tattoo1->course= "Tattoo Art";$tattoo1->rating= "4";$tattoo1->url= "";$tattoo1->creatorImg= "https://picsum.photos/100";$tattoo1->creatorName= "Joseph Phill";$tattoo1->creatorUrl= "/creator";
      $tattoo2 = new stdClass;$tattoo2->img= "https://picsum.photos/600/400"; $tattoo2->course= "Tattoo Art";$tattoo2->rating= "4";$tattoo2->url= "";$tattoo2->creatorImg= "https://picsum.photos/100";$tattoo2->creatorName= "Amy D'souza";$tattoo2->creatorUrl= "/creator";
      $tattoo3 = new stdClass;$tattoo3->img= "https://picsum.photos/600/400";$tattoo3->course= "Tattoo Art";$tattoo3->rating= "4";$tattoo3->url= "";$tattoo3->creatorImg= "https://picsum.photos/100";$tattoo3->creatorName= "Alton Crew";$tattoo3->creatorUrl= "/creator";
     
        $tattoos = array($tattoo1, $tattoo2, $tattoo3);
        $creatorURL = "/creator";
        $rating = "4";

        $img = "https://picsum.photos/600/400";
        $course_name = "Tatto Art";
        $addedToWhishList = true;
      @endphp

      <div class="la-profile__main">
        <div class="container la-anim__wrap">
          
          <!-- Alert Message  -->
          <div id="wishlist_alert_div"></div>
          <!-- Alert Message  -->
          @if(session('message'))
              <div class="la-btn__alert-success col-md-4 offset-md-8  alert alert-success alert-dismissible fade show" role="alert">
                  <h6 class="la-btn__alert-msg">{{session('message')}}</h6>
                  <button type="button" class="close mt-1" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                  </button>
              </div>
          @endif
            
          <div class="la-profile__main-inner la-anim__stagger-item">
            <div class="la-profile__title-wrap">
              <a class="la-icon la-icon--5xl icon-back-arrow d-block d-md-none ml-n1 mt-n2 mb-6" href="{{URL::previous()}}"></a>
              <h1 class="la-profile__title">Wishlist</h1>
              
              <!-- Mobile Version Add Courses Btn -->
              <div class="la-btn__add-icon d-block d-md-none">
                <a class="la-playlist__mobile text-lg text-uppercase" href="/browse/courses"> 
                  <span class="la-icon la-icon--md icon-plus mr-3"></span>Add Courses</a>
              </div>
            </div>
          
            <section class="la-section la-wishlist__sec pt-0">
              <div class="la-wishlist__inner">
                <div class="row la-wishlist__row">
                    @foreach($wishlist_courses as $courses)
                      <div class="col-md-4 px-0">
                        <x-course 
                          :id="$courses->course_id"
                          :img="$img" 
                          :course="$course_name" 
                          :url="$rating" 
                          :rating="$rating"
                          :creatorImg="$img"
                          :creatorName="$creatorURL"
                          :creatorUrl="$creatorURL"
                          :addedToWhishList="$addedToWhishList"
                        />
                    </div>
                    @endforeach
                
                    <div class="col-md-4 col-lg-4 d-none d-md-block">
                      <a class="la-btn__add d-flex justify-content-center align-items-center" href="/browse/courses">
                        <span class="la-btn__add-icon">+</span>
                      </a>
                    </div>
                </div>
              </div>
            </section>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection