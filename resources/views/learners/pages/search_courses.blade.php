@extends('learners.layouts.app')

@section('content')
<section class="la-section la-cbg--main">
    <div class="la-section__inner">
      <div class="container">
        <!-- Alert Message -->
        @if(session('message'))
          <div class="la-btn__alert-success col-md-4 offset-md-8  alert alert-success alert-dismissible fade show" role="alert">
            <h6 class="la-btn__alert-msg">{{session('message')}}</h6>
            <button type="button" class="close mt-2" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true" class="text-white">&times;</span>
            </button>
          </div>
        @endif
        <!-- Wishlist Alert Message -->
        <div id="wishlist_alert_div"></div> 
        
        <a class="la-icon--lg icon-arrow font-weight-bold my-5 d-block d-md-none" href="{{URL::previous()}}"></a>
        <div class="d-flex justify-content-between">  
          <h1 class="la-page__title mb-8">Browse Courses</h1><a class="la-icon--3xl icon-filter d-block d-lg-none" id="filterCourses" role="button"></a>
        </div>
        <!-- Global Search: Start-->
        <div class="la-gsearch">
          <form class="form-inline"  action="{{ url('/search-course/') }}">
            <div class="form-group ">
              <input class="la-gsearch__input form-control" style="width:300px; background:transparent" value="{{$search_input}}" name="course_name" type="text" placeholder="What you want to learn today?">
            </div>
            <button class="la-gsearch__submit btn" type="submit"><i class="la-icon la-icon--3xl icon icon-search"></i></button>
          </form>
        </div>
        <!-- Global Search: End-->

        <div class="la-courses mt-14">
             
                   <x-add-to-playlist 
                      :playlists="$playlists"
                    />
                  <!-- Add to Playlist Modal -->
                
              
                <div class="row row-cols-lg-3">
                  @if(count($courses) > 0)
                      @foreach($courses as $course)
                        @if ($course->featured == 0)
                            @continue
                        @endif
                        <x-course 
                            :id="$course->id"
                            :img="$course->preview_image"
                            :course="$course->title"
                            :url="$course->slug"
                            :rating="$course->price"
                            :creatorImg="$course->user->user_img"
                            :creatorName="$course->user->fname"
                            :creatorUrl="$course->user->fname"
                          />
                      @endforeach                  
                  @endif

                </div>
                @if(count($courses) == 0)
                <div class="la-empty__courses d-md-flex justify-content-between align-items-start">
                      <div class="la-empty__inner">
                          <h6 class="la-empty__course-title pb-2">No Courses Found.</h6>
                      </div>
                      <div class="la-empty__browse-courses">
                          <a href="{{Url('/browse/courses')}}" class="la-empty__browse">
                              Browse Courses
                              <span class="la-empty__browse-icon la-icon la-icon--5xl icon-grey-arrow"></span>
                          </a>
                      </div>
                  </div>
                @endif
        </div>
      </div>
    </div>
  </section>

  
  @endsection
  