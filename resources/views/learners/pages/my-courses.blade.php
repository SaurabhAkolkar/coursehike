@extends('learners.layouts.app')

@section('content')
<section class="la-cbg--main">
    <!-- Section Ongoing: Start-->
    <section class="la-section__small">
      <div class="la-section__inner">
        <!-- Alert Message-->
        <div id="wishlist_alert_div" class="container"></div> 

        <div class="container">
          <div class="col-12 la-anim__wrap d-md-flex justify-content-between align-items-center">
            <a class="la-icon la-icon--5xl icon-back-arrow d-block d-md-none ml-n1 mt-n2 mb-5" href="{{URL::previous()}}"></a>
            <h1 class="la-mycourses__title text-4xl mb-8 la-anim__stagger-item">My Courses</h1>
            <!-- Global Search: Start-->
            <div class="la-gsearch la-anim__stagger-item">
              <form class="form-inline" action="{{ url('/search-course/') }}">
                <div class="form-group ">
                  <input class="la-gsearch__input form-control w-100" style="background:transparent" type="text" name="course_name" placeholder="Search Course or Class">
                </div>
                <button class="la-gsearch__submit btn" type="submit"><i class="la-icon la-icon--3xl icon icon-search"></i></button>
              </form>
            </div>
            <!-- Global Search: End-->
          </div>

          <div class="col-12 d-flex justify-content-between align-items-center mb-8 la-anim__wrap ">
            <div class="la-mycourses__subtitle text-2xl head-font la-anim__stagger-item--x">Ongoing</div> 
          </div>
          
          <x-add-to-playlist 
                      :playlists="$playlists"
          />
          <div class="col-12 la-anim__wrap">
            
              @if(count($courses) != 0)
                <div class="row row-cols-lg-3 ">
                  @foreach($courses as $course)
                  
                  <x-course 
                      :id="$course->course->id"
                      :img="$course->course->preview_image" 
                      :course="$course->course->title" 
                      :url="$course->course->slug" 
                      :rating="$course->course->review->avg('rating')"
                      :creatorImg="$course->course->user->img"
                      :creatorName="$course->course->user->fullName"
                      :creatorUrl="$course->course->user->id"
                    />
                  @endforeach
                </div>
              @else
                <div class="la-empty__courses d-md-flex justify-content-between align-items-start ">
                    <div class="la-empty__inner">
                        <h6 class="la-empty__course-title pb-2 la-anim__stagger-item">No Courses</h6>
                        <p class="la-empty__course-desc m-0 la-anim__stagger-item">You have not started any course yet</p>
                    </div>
                    <div class="la-empty__browse-courses la-anim__stagger-item--x">
                        <a href="/browse/courses" class="la-empty__browse">
                            Browse Courses
                            <span class="la-empty__browse-icon la-icon la-icon--5xl icon-grey-arrow "></span>
                        </a>
                    </div>
                </div> 
              @endif

          </div>
        </div>
      </div>
    </section>
    <!-- Section Ongoing: End-->
    <!-- Section Yet to Start: Start-->
    <section class="la-section__small">
      <div class="la-section__inner">
        <div class="container la-anim__wrap">
          <div class="row">
            <div class="col-12">
              <div class=" d-flex justify-content-between mb-6">
                <div class="la-mycourses__subtitle text-2xl head-font  la-anim__stagger-item--x">Yet to Start</div>
              </div>
            
            <div class="col-12">
                <div class="la-empty__courses d-md-flex justify-content-between align-items-start ">
                    <div class="la-empty__inner">
                        <h6 class="la-empty__course-title pb-2 la-anim__stagger-item">No Courses</h6>
                        <p class="la-empty__course-desc m-0 la-anim__stagger-item">You have not bought or subscribed to any course yet</p>
                    </div>
                    <div class="la-empty__browse-courses la-anim__stagger-item--x">
                        <a href="/browse/courses" class="la-empty__browse ">
                            Browse Courses
                            <span class="la-empty__browse-icon la-icon la-icon--5xl icon-grey-arrow "></span>
                        </a>
                    </div>
              </div> 
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Section Yet to Start: End-->

  <!-- Section Completed: Start-->
    <section class="la-section__small">
      <div class="la-section__inner">
        <div class="container la-anim__wrap">
          <div class="row">
            <div class="col-12 d-flex justify-content-between mb-6 ">
              <div class="la-mycourses__subtitle text-2xl head-font la-anim__stagger-item--x">Completed</div>
            </div>

              <div class="col-12">
                <div class="la-empty__courses d-md-flex justify-content-between align-items-start ">
                  <div class="la-empty__inner">
                      <h6 class="la-empty__course-title pb-2 la-anim__stagger-item">No Courses</h6>
                      <p class="la-empty__course-desc m-0 la-anim__stagger-item">You have not finished any course yet.</p>
                  </div>
                  <div class="la-empty__browse-courses la-anim__stagger-item--x">
                      <a href="/browse/courses" class="la-empty__browse ">
                          Browse Courses
                          <span class="la-empty__browse-icon la-icon la-icon--5xl icon-grey-arrow "></span>
                      </a>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Section Completed: End-->
  </section>
@endsection