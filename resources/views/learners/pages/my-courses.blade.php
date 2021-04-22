@extends('learners.layouts.app')

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
    <!-- Section Ongoing: Start-->
    <section class="la-section__small">
      <div class="la-section__inner">
        <!-- Alert Message-->
        <div id="wishlist_alert_div" class="container"></div> 

        <div class="container-fluid">
          <div class="col-12 la-anim__wrap d-md-flex justify-content-between align-items-center px-0 pb-md-12">
            <a class="la-icon la-icon--5xl icon-back-arrow d-block d-md-none ml-n1 mt-n2 mb-2 la-anim__stagger-item" href="{{URL::previous()}}"></a>
            <h1 class="la-mycourses__title text-4xl mb-4 mb-lg-8 la-anim__stagger-item">My Courses</h1>

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

          <!-- Ongoing Courses -->
          <div class="la-anim__wrap">
              <div class="la-mycourses__subtitle text-2xl mb-6 head-font la-anim__stagger-item--x">Ongoing Courses</div> 
                    
              <x-add-to-playlist 
                :playlists="$playlists"
              />

              <div class="col-12 px-0 la-anim__wrap">
                  @if(count($on_going_courses) != 0)
                    <div class="row row-cols-md-2 row-cols-lg-3 row-cols-xl-4 la-anim__stagger-item">
                      @foreach($on_going_courses as $course)
                      
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
                        />
                      @endforeach
                    </div>

                    @else

                      <div class="la-empty__courses d-md-flex justify-content-between align-items-start la-anim__stagger-item">
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

              </div>
          </div>

          <!-- Ongoing Classes -->
          <div class="la-anim__wrap pt-10">
              <div class="la-mycourses__subtitle text-2xl mb-6 head-font la-anim__stagger-item--x">Ongoing Classes</div> 
                    
              <x-add-to-playlist 
                :playlists="$playlists"
              />

              <div class="col-12 px-0 la-anim__wrap">
                  @if(count($on_going_courses) != 0)
                    <div class="row row-cols-md-2 row-cols-lg-3 row-cols-xl-4 la-anim__stagger-item">
                      @foreach($on_going_courses as $course)
                      
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
                        />
                      @endforeach
                    </div>

                    @else

                      <div class="la-empty__courses d-md-flex justify-content-between align-items-start la-anim__stagger-item">
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

              </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Section Ongoing: End-->


    <!-- Section Yet to Start: Start-->
    <section class="la-section__small">
      <div class="la-section__inner">
        <div class="container-fluid la-anim__wrap">
          <div class="row">
            <!-- Yet to start - Courses -->
            <div class="col-12">
                <div class="la-mycourses__subtitle text-2xl mb-6 head-font  la-anim__stagger-item--x">Yet to Start Courses</div>
                @if($yet_to_start_courses && count($yet_to_start_courses) > 0)
                  <div class="row row-cols-md-2 row-cols-lg-3 row-cols-xl-4 la-anim__stagger-item">
                    @foreach($yet_to_start_courses as $course)
                  
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
                      />
                    @endforeach
                  </div>
                @else

                  <div class="la-empty__courses d-md-flex justify-content-between align-items-start la-anim__stagger-item">
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
            </div>

            <!-- Yet to start - Classes -->
            <div class="col-12 pt-10">
                <div class="la-mycourses__subtitle text-2xl mb-6 head-font  la-anim__stagger-item--x">Yet to Start Classes</div>
                @if($yet_to_start_courses && count($yet_to_start_courses) > 0)
                  <div class="row row-cols-md-2 row-cols-lg-3 row-cols-xl-4 la-anim__stagger-item">
                    @foreach($yet_to_start_courses as $course)
                  
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
                      />
                    @endforeach
                  </div>
                @else

                  <div class="la-empty__courses d-md-flex justify-content-between align-items-start la-anim__stagger-item">
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
            </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Section Yet to Start: End-->

  <!-- Section Completed: Start-->
    <section class="la-section__small">
      <div class="la-section__inner">
        <div class="container-fluid la-anim__wrap">
          <div class="row">
            <!-- Completed Courses -->
            <div class="col-12">
                <div class="la-mycourses__subtitle text-2xl mb-6 head-font la-anim__stagger-item--x">Completed Courses</div>
                @if($completed_courses && count($completed_courses) != 0)
                  <div class="row row-cols-md-2 row-cols-lg-3 row-cols-xl-4  la-anim__stagger-item">
                    @foreach($completed_courses as $course)
                  
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
                      />
                    @endforeach
                  </div>
                @else
                  <div class="la-empty__courses d-md-flex justify-content-between align-items-start la-anim__stagger-item">
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

            </div>

            <!-- Completed Classes -->
            <div class="col-12 pt-10">
                <div class="la-mycourses__subtitle text-2xl mb-6 head-font la-anim__stagger-item--x">Completed Classes</div>
                @if($completed_courses && count($completed_courses) != 0)
                  <div class="row row-cols-md-2 row-cols-lg-3 row-cols-xl-4  la-anim__stagger-item">
                    @foreach($completed_courses as $course)
                  
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
                      />
                    @endforeach
                  </div>
                @else
                  <div class="la-empty__courses d-md-flex justify-content-between align-items-start la-anim__stagger-item">
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

            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Section Completed: End-->
  </section>
@endsection