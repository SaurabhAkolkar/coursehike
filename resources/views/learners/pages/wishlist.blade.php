@extends('learners.layouts.app')

@section('content')
<div class="la-profile">
    <div class="la-profile__wrap">

      <!-- Side Navbar: Start -->
        @include ('learners.pages.sidebar')
      <!-- Side Navbar: End -->

      @php  
        $addedToWhishList = true;
      @endphp
      
      <x-add-to-playlist 
              :playlists="$playlists"
            />

      <div class="la-profile__main">
        <div class="container la-anim__wrap">
          
          <!-- Alert Message  -->
          <div id="wishlist_alert_div"></div>
          <!-- Alert Message  -->
          @if(session('message'))
            <div class="la-btn__alert position-relative">
                <div class="la-btn__alert-success col-lg-4 offset-lg-2 alert alert-success alert-dismissible fade show" role="alert">
                    <span class="la-btn__alert-msg">{{session('message')}}</span>
                    <button type="button" class="close la-btn__alert-close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true" style="color:#56188C">&times;</span>
                    </button>
                </div>
            </div>
          @endif
            
          <div class="la-profile__main-inner ">
            <div class="la-profile__title-wrap la-anim__stagger-item">
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
                      <div class="col-md-6 col-lg-4 px-0  la-anim__stagger-item">
                        <x-course 
                          :id="$courses->course_id"
                          :img="$courses->courses->preview_image" 
                          :course="$courses->courses->title" 
                          :url="$courses->courses->slug" 
                          :rating="round($courses->courses->average_rating, 2)"
                          :creatorImg="$courses->courses->user->user_img"
                          :creatorName="$courses->courses->user->FullName"
                          :creatorUrl="$courses->courses->user->id"
                          :addedToWhishList="$addedToWhishList"
                          :learnerCount="$courses->courses->leanerCount"
                        />
                    </div>
                    @endforeach
                
                    <div class="col-md-6 col-lg-4 d-none d-md-block  la-anim__stagger-item">
                      <a class="la-btn__add la-playlist__add-wishlist d-flex justify-content-center align-items-center" href="/browse/courses">
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