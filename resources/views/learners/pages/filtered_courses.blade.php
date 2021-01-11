@extends('learners.layouts.app')
<!-- Playlist Alert Message-->
@if(session('message'))
<div class="la-btn__alert position-relative">
  <div class="la-btn__alert-success col-md-4 offset-md-4  alert alert-success alert-dismissible" role="alert">
      <h6 class="la-btn__alert-msg">{{session('message')}}</h6>
      <button type="button" class="close mt-2" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true" style="color:#56188C">&times;</span>
      </button>
  </div>
</div>
@endif

<!-- Wishlist Alert Message-->
<div id="wishlist_alert_div"></div> 
@section('content')

<section class="la-section__small la-cbg--main">
    
    
    <div class="la-section__inner">
      <div class="container">
        
        <a class="la-icon la-icon--5xl icon-back-arrow d-block d-md-none ml-n1 mt-n2 mb-5" href="{{URL::previous()}}"></a>
        <div class="d-flex justify-content-between la-anim__wrap">  
          <h1 class="la-page__title mb-8 la-anim__stagger-item">Browse Courses</h1>
          <a class="la-icon--2xl icon-filter d-none d-lg-none" id="filterCourses" role="button"></a>
        </div>
        
        <!-- Global Search: Start-->
        <div class="la-gsearch la-anim__wrap">
          <form class="form-inline la-anim__stagger-item"  action="{{ url('/search-course/') }}">
            <div class="form-group ">
              <input class="la-gsearch__input form-control" style="width:300px; background:transparent" name="course_name" type="text" placeholder="What you want to learn today?">
            </div>
            <button class="la-gsearch__submit btn" type="submit"><i class="la-icon la-icon--3xl icon icon-search"></i></button>
          </form>
        </div>
        <!-- Global Search: End-->

        

        <div class="la-courses mt-6 mt-md-14 la-anim__wrap">
          <nav class="la-courses__nav d-flex justify-content-between">
           
            
            <!-- Filters : Start -->
            <div class="la-courses__nav-filters d-flex align-items-start ml-6">
              <div class="la-courses__nav-props">
                <a class="la-icon--2xl icon-list-layout la-courses__nav-filter  mr-3" id="showLayout" role="button"></a>
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

              <div class="la-courses__nav-props">
                <a class="la-icon--2xl icon-filter la-courses__nav-filter " id="filteredCourses" data-toggle="dropdown" href="javascript:void(0);" role="button"></a>
                  <!-- Filter Courses Dropdown -->
                  <div class="dropdown-menu dropdown-menu-right la-header__dropdown-menu" aria-labelledby="filteredCourses"  style="border:none !important;">
                      <div class="la-form__input-wrap px-5">
                          <div class="la-form__lable la-form__lable--medium mb-2 text-md pt-3 text-dark">Filter by</div>
                            <form action="{{route('apply.filters')}}" method="get" id="filter_form">
                                <input type="hidden" name="categories" id="filter_categories" />
                                <input type="hidden" name="sub_categories" id="filter_sub_categories" />
                                <input type="hidden" name="languages" id="filter_languages" />
                                <input type="hidden" name="level" id="filter_level" />

                                <a onclick="$('#filter_form').submit()" class="la-rtng__review text-uppercase text-center text-md-right">Apply</a> 
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
                                    @foreach($filter_categories as $c)
                                      <label class="glabel d-flex" for="course_{{$c->id}}">
                                        <input class="d-none" type="checkbox" id="course_{{$c->id}}" onclick="addToCategory({{$c->id}})" value="{{$c->id}}"><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                                        <div class="pl-2 mt-n1">{{$c->title}}
                                            @if($c->subcategory != null)
                                              <ul class="d-flex flex-column">
                                                @foreach($c->subcategory as $sc)
                                                  <li>
                                                    <label class="glabel d-flex" for="sub_course_{{$sc->id}}">
                                                      <input class="d-none" id="sub_course_{{$sc->id}}" type="checkbox" onclick="addToSubCategory({{$sc->id}})"  value="{{$sc->id}}"><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                                                      <div class="pl-2 mt-n1">{{$sc->title}}</div>
                                                    </label>
                                                  </li>
                                                @endforeach
                                              </ul>
                                            @endif
                                            
                                          </div>
                                      </label>
                                    @endforeach
                                </div>

                                <div class="form-group pt-2">
                                  <label class="glabel-main" > Language</label>
                                  @foreach($langauges as $l)
                                    <label class="glabel d-flex" for="lang_{{$l->id}}">
                                      <input class="d-none" id="lang_{{$l->id}}" type="checkbox" onclick="addToLanguage({{$l->id}})" value="{{$l->id}}"><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                                      <div class="pl-2 mt-n1">{{$l->name}}</div>
                                    </label>
                                  @endforeach
                               
                                </div>

                                <div class="form-group pt-2">
                                  <label class="glabel-main" >Level</label>
                                  <label class="glabel d-flex" for="level_1">
                                    <input class="d-none" id ="level_1" type="checkbox" name="" onclick="addToLevel(1)"><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                                    <div class="pl-2 mt-n1">Beginner</div>
                                  </label>

                                  <label class="glabel d-flex" for="level_2">
                                    <input class="d-none" id="level_2"  type="checkbox" name="" onclick="addToLevel(2)"><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                                    <div class="pl-2 mt-n1">Intermediate</div>
                                  </label>

                                  <label class="glabel d-flex" for="level_3">
                                    <input class="d-none" id="level_3"  type="checkbox" name="" onclick="addToLevel(3)"><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                                    <div class="pl-2 mt-n1">Advanced</div>
                                  </label>
                                </div>
                            </form>
                      </div>
                  </div>
              </div>
            </div>
            <!-- Filters : End -->
          </nav>
             
                   <x-add-to-playlist 
                      :playlists="$playlists"
                    />
                  <!-- Add to Playlist Modal -->
                  

          <!-- Tattoo Art Tab: Start -->
                <div class="row row-cols-lg-3 la-anim__stagger-item">
                      @foreach($courses as $course)
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

             <!-- Rangoli Tab: End -->

          </div>
        </div>
      </div>
    </div>
  </section>
  @endsection