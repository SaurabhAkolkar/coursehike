@extends('learners.layouts.app')

@section('content')
<section class="la-section__small la-cbg--main">
    <div class="la-section__inner">
      <div class="container">
        <!-- Alert Message -->
        @if(session('message'))
          <div class="la-btn__alert position-relative">
            <div class="la-btn__alert-success col-md-4 offset-md-4  alert alert-success alert-dismissible fade show" role="alert">
              <h6 class="la-btn__alert-msg">{{session('message')}}</h6>
              <button type="button" class="close mt-2" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true" style="color:#56188C">&times;</span>
              </button>
            </div>
          </div>
        @endif
        <!-- Wishlist Alert Message -->
        <div id="wishlist_alert_div"></div> 
        
        <a class="la-icon la-icon--5xl icon-back-arrow ml-n1 mt-n2 mb-5 d-block d-md-none" href="{{URL::previous()}}"></a> 
        
        <div class="d-flex justify-content-between position-relative">  
          <a href="{{URL::previous()}}" class="la-vcreator__back d-none d-md-block" style="top:-6px"><span class="la-icon la-icon--5xl icon-back-arrow"></span></a>
          <h1 class="la-page__title mb-8">Search Courses</h1>
          <a class="la-icon--3xl icon-filter d-block d-lg-none" id="filterCourses" role="button"></a>
           <!-- Filters : Start -->
           <div class="la-courses__nav-filters d-flex align-items-start ml-6">
              <div class="la-courses__nav-props ">
                <a class="la-icon--2xl icon-list-layout la-courses__nav-filter mr-3 " id="showLayout" role="button"></a>
              </div>
              <div class="la-courses__nav-props">
                <a class="la-icon--2xl icon-sort la-courses__nav-filter  mr-3" id="sortCourses" data-toggle="dropdown" href="javascript:void(0);" role="button"></a>
                <!-- Sort Courses Dropdown -->
                <div class="dropdown-menu dropdown-menu-right la-header__dropdown-menu" aria-labelledby="sortCourses"  style="border:none !important;">
                  <div class="la-form__input-wrap px-5">
                      <div class="la-form__lable la-form__lable--medium mb-2 text-md pt-2 text-dark">Sort by</div>
                      <div class=" pt-2">
                          <div class="la-form__radio-wrap mr-5">
                                <input class="la-form__radio d-none" type="radio" value="most_popular" name="sort_by" id="most_popular">
                                <label class="d-flex align-items-center text-sm" for="most_popular"><span class="la-form__radio-circle d-flex justify-content-center align-items-center mr-2"></span><span>Most Popular</span></label>
                          </div>
                          <div class="la-form__radio-wrap mr-5">
                              <input class="la-form__radio d-none" type="radio" value="highest_rated" name="sort_by" id="highest_rated">
                              <label class="d-flex align-items-center text-sm" for="highest_rated"><span class="la-form__radio-circle d-flex justify-content-center align-items-center mr-2"></span><span>Highest Rated</span></label>
                          </div>
                          <div class="la-form__radio-wrap mr-5">
                              <input class="la-form__radio d-none" type="radio" value="latest" name="sort_by" id="latest">
                              <label class="d-flex align-items-center text-sm" for="latest"><span class="la-form__radio-circle d-flex justify-content-center align-items-center mr-2"></span><span>Latest</span></label>
                          </div>
                      </div>
                  </div>
                </div>
              </div>
                
              <div class="la-courses__nav-filterprops">
               <a class="la-icon--2xl icon-filter la-courses__nav-filter d-none d-lg-block" id="filteredCourses"  role="button"></a>
              
                  <!-- Filter Courses Dropdown -->
                  <div class="la-courses__nav-filterdropdown" id="filtered_sidebar">
                      <div class="la-form__input-wrap px-5">
                        <div class="d-flex justify-content-between align-items-center">
                          <div class="la-form__lable la-form__lable--medium mb-2 text-md pt-3 text-dark">Filter by</div>
                          <button class="la-courses__nav-filterclose close text-4xl mt-1" type="button" id="filter_close">&times;</button>
                        </div>
                            <form action="" method="" id="">
                                                                
                                <div class="form-group pt-2">
                                  <label class="glabel-main" > Course Duration</label>
                                  <label class="glabel d-flex" for="dur_hr">
                                    <input class="d-none" id="dur_hr" type="checkbox" name=""><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                                    <div class="pl-2 mt-n1">less than an hr</div>
                                  </label>

                                  <label class="glabel d-flex" for="dur_hrs">
                                    <input class="d-none" id="dur_hrs" type="checkbox" name=""><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                                    <div class="pl-2 mt-n1">1 hr - 5 hr</div>
                                  </label>

                                  <label class="glabel d-flex" for="dur_more">
                                    <input class="d-none" id="dur_more" type="checkbox" name=""><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                                    <div class="pl-2 mt-n1">more than 5 hrs</div>
                                  </label>
                                </div>

                                <div class="form-group pt-2">
                                  <label class="glabel-main" > Category</label>
                                   
                                      <label class="glabel d-flex" for="">
                                        <input class="d-none" type="checkbox" id="" onclick="" value=""><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                                        <div class="pl-2 mt-n1">
                                            
                                              <ul class="d-flex flex-column">
                                                
                                                  <li>
                                                    <label class="glabel d-flex" for="">
                                                      <input class="d-none" id="" type="checkbox" name="sub_categories" value=""><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                                                      <div class="pl-2 mt-n1"></div>
                                                    </label>
                                                  </li>
                                               
                                              </ul>
                                            
                                            
                                          </div>
                                      </label>
                                    
                                </div>

                                <div class="form-group pt-2">
                                  <label class="glabel-main" > Language</label>
                                
                                    <label class="glabel d-flex" for="">
                                      <input class="d-none" id="" type="checkbox" name="languages" value=""><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                                      <div class="pl-2 mt-n1"></div>
                                    </label>
                                 
                               
                                </div>

                                <div class="form-group pt-2">
                                  <label class="glabel-main" >Level</label>
                                  <label class="glabel d-flex" for="level_1">
                                    <input class="d-none" id="level_1" type="checkbox" name=""><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                                    <div class="pl-2 mt-n1">Beginner</div>
                                  </label>

                                  <label class="glabel d-flex" for="level_2">
                                    <input class="d-none" id="level_2" type="checkbox" name=""><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                                    <div class="pl-2 mt-n1">Intermediate</div>
                                  </label>

                                  <label class="glabel d-flex" for="level_3">
                                    <input class="d-none" id="level_3" type="checkbox" name=""><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                                    <div class="pl-2 mt-n1">Advanced</div>
                                  </label>
                                </div>

                                <button onclick="" class="la-btn la-btn__secondary bg-transparent text-uppercase text-center py-3 mt-6">Apply</button> 
                            </form>
                      </div>
                  </div>
              </div>
            </div>
            <!-- Filters : End -->
        </div>
        <!-- Global Search: Start-->
        <div class="la-gsearch mb-0">
          <form class="form-inline "  action="{{ url('/search-course/') }}">
            <div class="form-group ">
              <input class="la-gsearch__input form-control" style="width:300px; background:transparent" value="{{$search_input}}" name="course_name" type="text" placeholder="What you want to learn today?">
            </div>
            <button class="la-gsearch__submit btn" type="submit"><i class="la-icon la-icon--3xl icon icon-search"></i></button>
          </form>
        </div>
        <!-- Global Search: End-->

        <div class="la-courses py-4 py-md-16">
             
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
                            :rating="$course->review->avg('rating')"
                            :creatorImg="$course->user->user_img"
                            :creatorName="$course->user->fname"
                            :creatorUrl="$course->user->id"
                          />
                      @endforeach                  
                  @endif

                </div>
                @if(count($courses) == 0)
                <div class="col-12 px-0">
                  <div class="la-empty__courses d-md-flex justify-content-between align-items-center">
                        <div class="la-empty__inner">
                            <h6 class="la-empty__course-title">No Courses Found.</h6>
                        </div>
                        <div class="la-empty__browse-courses mt-md-n4">
                            <a href="{{Url('/browse/courses')}}" class="la-empty__browse">
                                Browse Courses
                                <span class="la-empty__browse-icon la-icon la-icon--5xl icon-grey-arrow"></span>
                            </a>
                        </div>
                    </div>
                  </div>
                @endif
        </div>
      </div>
    </div>
  </section>

  
  @endsection
  