@extends('learners.layouts.app')


@section('seo_content')
    <title> My Courses & Classes </title>
@endsection

@section('content')

@if(session('message'))
<div class="la-btn__alert position-relative">
  <div class="la-btn__alert-success col-lg-4 offset-lg-4  alert alert-success alert-dismissible fade show" role="alert">
      <span class="la-btn__alert-msg">{{session('message')}}</span>
      <button type="button" class="close la-btn__alert-close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true" style="color:#56188C">&times;</span>
      </button>
  </div>
</div>
@endif

<section class="la-cbg--main">
    <section class="la-section__small">
      <div class="la-section__inner">
        <!-- Alert Message-->
        <div id="wishlist_alert_div" class="container"></div> 

        <div class="container-fluid">
          <div class="col-12 la-anim__wrap d-md-flex justify-content-between align-items-center px-0">
            <a class="la-icon la-icon--5xl icon-back-arrow d-block d-md-none ml-n1 mt-n2 mb-2 la-anim__stagger-item" href="{{URL::previous()}}"></a>
            <h1 class="la-mycourses__title text-4xl mb-4 la-anim__stagger-item">My Courses & Classes</h1>

            <!-- Global Search: Start-->
            <div class="la-gsearch la-anim__stagger-item--x">
              <form class="form-inline" action="{{ url('/search-course/') }}">
                <div class="form-group d-flex align-items-center">
                  <input class="la-gsearch__input form-control w-75 la-gsearch__input-browsecourses" style="background:transparent" type="text" name="course_name" placeholder="Search your Courses and Classes">
                </div>
                <button class="la-gsearch__submit btn" type="submit"><i class="la-icon  icon icon-search la-gsearch__input-icon"></i></button>
              </form>
            </div>
            <!-- Global Search: End-->
          </div>



          <div class="la-courses mt-1 mt-md-10 la-anim__wrap">
            <nav class="la-courses__nav position-relative">
                <ul class="nav nav-pills la-courses__nav-tabs mb-0" id="cc_nav-tab" role="tablist" tabindex="0">
                  <li class="nav-item la-courses__nav-item la-anim__stagger-item--x">
                    <a class="nav-link la-courses__nav-link text-2xl active" id="course_tab" data-toggle="tab" href="#course_tab-content" role="tab" aria-controls="course_tab" aria-selected="true"> 
                      <span class="position-relative text-nowrap">Courses</span>
                    </a>
                  </li> 

                  <li class="nav-item la-courses__nav-item la-anim__stagger-item--x">
                    <a class="nav-link la-courses__nav-link text-2xl " id="class_tab" data-toggle="tab" href="#class_tab-content" role="tab" aria-controls="class_tab" aria-selected="true"> 
                      <span class="position-relative text-nowrap">Classes</span>
                    </a>
                  </li>
                </ul>
            </nav>

            <div class="tab-content la-courses__nav-content la-anim__wrap position-relative" id="cc_nav-tabContent">
              
              <!-- Courses Tab Pane: Start -->
              <div class="tab-pane fade show la-anim__wrap active" id="course_tab-content" role="tabpanel" aria-labelledby="course_tab">
                <!-- Ongoing Courses -->
                <div class="la-section__small">
                  <div class="la-mycourses__subtitle text-2xl mb-6 head-font la-anim__stagger-item--x">Ongoing</div> 
                  
                    <x-add-to-playlist 
                      :playlists="$playlists"
                    />

                    <div class="swiper-container  la-my__courses-container">  <!-- Swiper Container : Start -->         
                      <div class="swiper-wrapper la-my__courses-wrapper ">  <!-- Swiper Wrapper : Start -->  

                        @if(count($on_going_bundle) != 0)
                          <div class="swiper-slide la-my__courses-slide la-anim__stagger-item">
                            @foreach($on_going_bundle as $course)                            
                                <x-bundle-course 
                                  :id="$course->id"
                                  :img="$course->preview_image"
                                  :course="$course->title"
                                  :url="$course->slug"
                                  :rating="round($course->average_rating, 2)"
                                  :videoCount="$course->videoCount()"
                                  :classesCount="count($course->course_id)"
                                  :creatorImg="$course->users()"
                                  :creatorName="$course->users()->first()->fname"
                                  :creatorUrl="$course->user->id"
                                  :learnerCount="$course->learnerCount"
                                  :price="$course->price"
                                  :bought="$course->isPurchased()"
                                  :checkWishList="$course->checkWishList"
                                  :checkCart="$course->checkCart"
                                  :progress="$course->progress"

                              />      
                            @endforeach
                          </div>                     
                     
                          @else

                            <div class="col-12 la-empty__courses m-0 d-md-flex justify-content-between align-items-start la-anim__stagger-item">
                                <div class="col la-empty__inner">
                                    <h6 class="la-empty__course-title la-anim__stagger-item">No Courses</h6>
                                    <p class="la-empty__course-desc leading-snug m-0 la-anim__stagger-item">You have not started any course yet</p>
                                </div>
                                <div class="col text-md-right la-empty__browse-courses mt-n2 la-anim__stagger-item--x">
                                    <a href="/browse/courses" class="la-empty__browse">
                                        Browse Courses
                                        <span class="la-empty__browse-icon la-icon la-icon--5xl icon-grey-arrow "></span>
                                    </a>
                                </div>
                            </div>

                        @endif
                    </div> <!-- Swiper Wrapper : End -->  

                      @if(count($on_going_bundle) != 0)
                        <div class="w-100 mt-10 d-md-flex justify-content-end align-items-start">
                          <div class="la-slider__navigations la-home__course-navigations d-md-flex  align-items-center">
                            <div class="swiper-pagination la-slider__navigations-dots la-home__course-paginations la-slider__paginations la-slider__paginations--purble la-right"></div>
                          </div>
                        </div> 
                      @endif
                  </div> <!-- Swiper Container : End -->  
                </div>
                <!-- Ongoing Courses: End -->

                <!-- Yet to start - Courses -->
                <div class="la-section__small">
                    <div class="la-mycourses__subtitle text-2xl mb-6 head-font  la-anim__stagger-item--x">Yet to Start</div>

                    <div class="swiper-container la-my__courses-container"> <!-- Swiper Container : Start -->        
                      <div class="swiper-wrapper la-my__courses-wrapper ">  <!-- Swiper Wrapper : Start -->  

                        @if($yet_to_start_bundle && count($yet_to_start_bundle) > 0)

                        <div class="swiper-slide la-my__courses-slide la-anim__stagger-item">
                            @foreach($yet_to_start_bundle as $course)
                          
                            <x-bundle-course 
                                  :id="$course->id"
                                  :img="$course->preview_image"
                                  :course="$course->title"
                                  :url="$course->slug"
                                  :rating="round($course->average_rating, 2)"
                                  :videoCount="$course->videoCount()"
                                  :classesCount="count($course->course_id)"
                                  :creatorImg="$course->users()"
                                  :creatorName="$course->users()->first()->fname"
                                  :creatorUrl="$course->user->id"
                                  :learnerCount="$course->learnerCount"
                                  :price="$course->price"
                                  :bought="$course->isPurchased()"
                                  :checkWishList="$course->checkWishList"
                                  :checkCart="$course->checkCart"
                                  :progress="$course->progress"

                              />    

                            @endforeach
                          </div>

                        @else

                          <div class="col-12 la-empty__courses m-0 d-md-flex justify-content-between align-items-start la-anim__stagger-item">
                              <div class="col la-empty__inner">
                                  <h6 class="la-empty__course-title la-anim__stagger-item">No Courses</h6>
                                  <p class="la-empty__course-desc leading-snug m-0 la-anim__stagger-item">You haven't bought or subscribed to any course yet</p>
                              </div>
                              <div class="col text-md-right la-empty__browse-courses mt-n2 la-anim__stagger-item--x">
                                  <a href="/browse/courses" class="la-empty__browse ">
                                      Browse Courses
                                      <span class="la-empty__browse-icon la-icon la-icon--5xl icon-grey-arrow "></span>
                                  </a>
                              </div>
                          </div> 
                          
                        @endif
                      </div> <!-- Swiper Wrapper : End -->  

                      @if(count($yet_to_start_bundle)  != 0)
                          <div class="w-100 mt-10 d-md-flex justify-content-end align-items-start">
                            <div class="la-slider__navigations la-home__course-navigations d-md-flex  align-items-center">
                              <div class="swiper-pagination la-slider__navigations-dots la-home__course-paginations la-slider__paginations la-slider__paginations--purble la-right"></div>
                            </div>
                          </div>
                      @endif

                    </div> <!-- Swiper Container : End -->  
                </div>
                <!-- Yet to start - Courses : End -->

                 <!-- Completed Courses -->
                <div class="la-section__small">
                    <div class="la-mycourses__subtitle text-2xl mb-6 head-font la-anim__stagger-item--x">Completed</div>

                    <div class="swiper-container la-my__courses-container"> <!-- Swiper Container : Start -->        
                      <div class="swiper-wrapper la-my__courses-wrapper ">  <!-- Swiper Wrapper : Start -->  
                        @if($completed_bundle && count($completed_bundle) != 0)
                          <div class="swiper-slide la-my__courses-slide la-anim__stagger-item">
                            @foreach($completed_bundle as $course)
                          
                              <x-bundle-course 
                                  :id="$course->id"
                                  :img="$course->preview_image"
                                  :course="$course->title"
                                  :url="$course->slug"
                                  :rating="round($course->average_rating, 2)"
                                  :videoCount="$course->videoCount()"
                                  :classesCount="count($course->course_id)"
                                  :creatorImg="$course->users()"
                                  :creatorName="$course->users()->first()->fname"
                                  :creatorUrl="$course->user->id"
                                  :learnerCount="$course->learnerCount"
                                  :price="$course->price"
                                  :bought="$course->isPurchased()"
                                  :checkWishList="$course->checkWishList"
                                  :checkCart="$course->checkCart"
                                  :progress="$course->progress"

                              />   

                            @endforeach
                          </div>
                        @else
                          <div class="col-12 la-empty__courses m-0 d-md-flex justify-content-between align-items-start la-anim__stagger-item">
                            <div class="col la-empty__inner">
                                <h6 class="la-empty__course-title  la-anim__stagger-item">No Courses</h6>
                                <p class="la-empty__course-desc leading-snug m-0 la-anim__stagger-item">You have not finished any course yet.</p>
                            </div>
                            <div class="col text-md-right la-empty__browse-courses mt-n2 la-anim__stagger-item--x">
                                <a href="/browse/courses" class="la-empty__browse ">
                                    Browse Courses
                                    <span class="la-empty__browse-icon la-icon la-icon--5xl icon-grey-arrow "></span>
                                </a>
                            </div>
                          </div>
                        @endif

                      </div> <!-- Swiper Wrapper : End -->  

                        @if(count($completed_bundle) != 0)
                            <div class="w-100 mt-10 d-md-flex justify-content-end align-items-start">
                              <div class="la-slider__navigations la-home__course-navigations d-md-flex  align-items-center">
                                <div class="swiper-pagination la-slider__navigations-dots la-home__course-paginations la-slider__paginations la-slider__paginations--purble la-right"></div>
                              </div>
                            </div>
                        @endif

                    </div> <!-- Swiper Container : End -->  
                </div>
                 <!-- Completed Courses : End -->
              </div> <!-- Courses Tab Pane: End -->           
            


              <!-- Classes Tab Pane: Start -->
              <div class="tab-pane fade show la-anim__wrap" id="class_tab-content" role="tabpanel" aria-labelledby="class_tab">
                <!-- Ongoing Classes -->
                <div class="la-section__small">
                    <div class="la-mycourses__subtitle text-2xl mb-6 head-font la-anim__stagger-item--x">Ongoing</div> 
                          
                    <x-add-to-playlist 
                      :playlists="$playlists"
                    />

                    <div class="swiper-container  la-my__classes-container">  <!-- Swiper Container : Start -->         
                      <div class="swiper-wrapper la-my__classes-wrapper ">  <!-- Swiper Wrapper : Start -->  

                        @if(count($on_going_classes) != 0)
                          <div class="swiper-slide la-my__classes-slide la-anim__stagger-item">
                            @foreach($on_going_classes as $course)
                            
                              <x-course 
                                :id="$course->id"
                                :img="$course->preview_image" 
                                :course="$course->title" 
                                :url="$course->slug" 
                                :rating="round($course->average_rating, 2)"
                                :creatorImg="$course->user->user_img"
                                :creatorName="$course->user->fullName"
                                :creatorUrl="$course->user->id"
                                :price="$course->price"
                                :learnerCount="$course->learnerCount"
                                :bought="$course->isPurchased()"
                                :checkWishList="$course->checkWishList"
                                :checkCart="$course->checkCart"
                                :videoCount="$course->videoCount"
                                :chapterCount="$course->chapterCount"
                                :progress="$course->getProgress()"

                              />

                            @endforeach
                          </div>

                          @else

                            <div class="col-12 la-empty__courses m-0 d-md-flex justify-content-between align-items-start la-anim__stagger-item">
                                <div class="col la-empty__inner">
                                    <h6 class="la-empty__course-title la-anim__stagger-item">No Classes</h6>
                                    <p class="la-empty__course-desc leading-snug m-0 la-anim__stagger-item">You have not started any classes yet</p>
                                </div>
                                <div class="col text-md-right la-empty__browse-courses mt-n2 la-anim__stagger-item--x">
                                    <a href="/browse/classes" class="la-empty__browse">
                                        Browse Classes
                                        <span class="la-empty__browse-icon la-icon la-icon--5xl icon-grey-arrow "></span>
                                    </a>
                                </div>
                            </div> 
                          @endif
                      </div> <!-- Swiper Wrapper : End -->  

                        @if(count($on_going_classes) != 0)
                          <div class="w-100 mt-10 d-md-flex justify-content-end align-items-start">
                            <div class="la-slider__navigations la-home__course-navigations d-md-flex  align-items-center">
                              <div class="swiper-pagination la-slider__navigations-dots la-home__course-paginations la-slider__paginations la-slider__paginations--purble la-right"></div>
                            </div>
                          </div>
                        @endif
                    </div>  <!-- Swiper Container : End -->  
                </div>
                <!-- Ongoing Classes : End -->

                <!-- Yet to start - Classes -->
                <div class="la-section__small">
                  <div class="la-mycourses__subtitle text-2xl mb-6 head-font  la-anim__stagger-item--x">Yet to Start</div>

                  <div class="swiper-container  la-my__classes-container">  <!-- Swiper Container : Start -->         
                      <div class="swiper-wrapper la-my__classes-wrapper ">  <!-- Swiper Wrapper : Start -->  
                       
                        @if($yet_to_start_classes && count($yet_to_start_classes) > 0)
                          <div class="swiper-slide la-my__classes-slide la-anim__stagger-item">
                            @foreach($yet_to_start_classes as $course)
                          
                              <x-course 
                                :id="$course->id"
                                :img="$course->preview_image" 
                                :course="$course->title" 
                                :url="$course->slug" 
                                :rating="round($course->average_rating, 2)"
                                :creatorImg="$course->user->user_img"
                                :creatorName="$course->user->fullName"
                                :creatorUrl="$course->user->id"
                                :price="$course->price"
                                :learnerCount="$course->learnerCount"
                                :bought="$course->isPurchased()"
                                :checkWishList="$course->checkWishList"
                                :checkCart="$course->checkCart"
                                :videoCount="$course->videoCount"
                                :chapterCount="$course->chapterCount"
                                :progress="$course->getProgress()"

                              />

                            @endforeach
                          </div>
                        @else

                          <div class="col-12 la-empty__courses m-0 d-md-flex justify-content-between align-items-start la-anim__stagger-item">
                              <div class="col la-empty__inner">
                                  <h6 class="la-empty__course-title la-anim__stagger-item">No Classes</h6>
                                  <p class="la-empty__course-desc leading-snug m-0 la-anim__stagger-item">You haven't bought or subscribed to any class yet</p>
                              </div>
                              <div class="col text-md-right la-empty__browse-courses mt-n2 la-anim__stagger-item--x">
                                  <a href="/browse/classes" class="la-empty__browse ">
                                      Browse Classes
                                      <span class="la-empty__browse-icon la-icon la-icon--5xl icon-grey-arrow "></span>
                                  </a>
                              </div>
                          </div> 
                          
                        @endif
                        
                      </div> <!-- Swiper Wrapper : End -->  

                        @if(count($yet_to_start_classes) != 0)
                          <div class="w-100 mt-10 d-md-flex justify-content-end align-items-start">
                            <div class="la-slider__navigations la-home__course-navigations d-md-flex  align-items-center">
                              <div class="swiper-pagination la-slider__navigations-dots la-home__course-paginations la-slider__paginations la-slider__paginations--purble la-right"></div>
                            </div>
                          </div>
                        @endif


                    </div>  <!-- Swiper Container : End -->  
                </div>
                <!-- Yet to start - Classes : End -->


                <!-- Completed Classes -->
                <div class="la-section__small">
                    <div class="la-mycourses__subtitle text-2xl mb-6 head-font la-anim__stagger-item--x">Completed</div>

                    <div class="swiper-container  la-my__classes-container">  <!-- Swiper Container : Start -->         
                      <div class="swiper-wrapper la-my__classes-wrapper ">  <!-- Swiper Wrapper : Start --> 

                        @if($completed_classes && count($completed_classes) != 0)
                          <div class="swiper-slide la-my__classes-slide la-anim__stagger-item">
                            @foreach($completed_classes as $course)
                          
                            <x-course 
                                :id="$course->id"
                                :img="$course->preview_image" 
                                :course="$course->title" 
                                :url="$course->slug" 
                                :rating="round($course->average_rating, 2)"
                                :creatorImg="$course->user->user_img"
                                :creatorName="$course->user->fullName"
                                :creatorUrl="$course->user->id"
                                :price="$course->price"
                                :learnerCount="$course->learnerCount"
                                :bought="$course->isPurchased()"
                                :checkWishList="$course->checkWishList"
                                :checkCart="$course->checkCart"
                                :videoCount="$course->videoCount"
                                :chapterCount="$course->chapterCount"
                                :progress="$course->getProgress()"
                                

                              />
                            @endforeach
                          </div>

                        @else

                          <div class="col-12 la-empty__courses m-0 d-md-flex justify-content-between align-items-start la-anim__stagger-item">
                            <div class="col la-empty__inner">
                                <h6 class="la-empty__course-title  la-anim__stagger-item">No Classes</h6>
                                <p class="la-empty__course-desc leading-snug m-0 la-anim__stagger-item">You have not finished any class yet.</p>
                            </div>
                            <div class="col text-md-right la-empty__browse-courses mt-n2 la-anim__stagger-item--x">
                                <a href="/browse/classes" class="la-empty__browse ">
                                    Browse Classes
                                    <span class="la-empty__browse-icon la-icon la-icon--5xl icon-grey-arrow "></span>
                                </a>
                            </div>
                          </div>

                        @endif
                      </div> <!-- Swiper Wrapper : End -->  

                      @if(count($completed_classes) != 0)
                        <div class="w-100 mt-10 d-md-flex justify-content-end align-items-start">
                          <div class="la-slider__navigations la-home__course-navigations d-md-flex  align-items-center">
                            <div class="swiper-pagination la-slider__navigations-dots la-home__course-paginations la-slider__paginations la-slider__paginations--purble la-right"></div>
                          </div>
                        </div>
                      @endif

                    </div>  <!-- Swiper Container : End -->  
                </div>
                <!-- Completed Classes : End -->
              </div> <!-- Classes Tab Pane: End -->  

            </div> 
          </div>

        </div>
      </div>
    </section>

  </section>
@endsection