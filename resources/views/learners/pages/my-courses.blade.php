@extends('learners.layouts.app')

@section('content')
<section class="la-cbg--main">
    <!-- Section Ongoing: Start-->
    <section class="la-section__small">
      <div class="la-section__inner">
        <!-- Alert Message-->
        <div id="wishlist_alert_div" class="container"></div> 

        <div class="container">
          <div class="col-12 la-anim__wrap">
            <a class="la-icon la-icon--5xl icon-back-arrow d-block d-md-none ml-n1 mt-n2 mb-5" href="{{URL::previous()}}"></a>
            <h1 class="la-mycourses__title text-4xl mb-8 la-anim__stagger-item">My Courses</h1>
            <!-- Global Search: Start-->
            <div class="la-gsearch la-anim__stagger-item">
              <form class="form-inline" action="{{ url('/search-course/') }}">
                <div class="form-group ">
                  <input class="la-gsearch__input form-control w-100" style="background:transparent" type="text" name="course_name" placeholder="Search course or class">
                </div>
                <button class="la-gsearch__submit btn" type="submit"><i class="la-icon la-icon--3xl icon icon-search"></i></button>
              </form>
            </div>
            <!-- Global Search: End-->
          </div>

          <div class="col-12 d-flex justify-content-between align-items-center mb-8 la-anim__wrap ">
            <div class="la-mycourses__subtitle text-2xl head-font la-anim__stagger-item--x">Ongoing</div>
             <!-- Filters : Start -->
           <div class="la-courses__nav-filters d-flex align-items-start ml-6 ">
              <div class="la-courses__nav-props">
                <a class="la-icon icon-list-layout la-courses__nav-filter  mr-3" id="showLayout" role="button"></a>
              </div>
              <div class="la-courses__nav-props">
                <a class="la-icon icon-sort la-courses__nav-filter  mr-3" id="sortCourses" data-toggle="dropdown" href="javascript:void(0);" role="button"></a>
                <!-- Sort Courses Dropdown -->
                <div class="dropdown-menu dropdown-menu-right la-header__dropdown-menu" aria-labelledby="sortCourses"  style="border:none !important;">
                  <div class="la-form__input-wrap px-5">
                      <div class="la-form__lable la-form__lable--medium mb-2 text-md pt-2 text-dark">Sort by</div>
                      <div class=" pt-2">
                          <div class="la-form__radio-wrap mr-5">
                                <input class="la-form__radio d-none" type="radio" value="most_popular" name="sort_by" id="most_popular1">
                                <label class="d-flex align-items-center text-sm" for="most_popular1"><span class="la-form__radio-circle d-flex justify-content-center align-items-center mr-2"></span><span>Most Popular</span></label>
                          </div>
                          <div class="la-form__radio-wrap mr-5">
                              <input class="la-form__radio d-none" type="radio" value="highest_rated" name="sort_by" id="highest_rated1">
                              <label class="d-flex align-items-center text-sm" for="highest_rated1"><span class="la-form__radio-circle d-flex justify-content-center align-items-center mr-2"></span><span>Highest Rated</span></label>
                          </div>
                          <div class="la-form__radio-wrap mr-5">
                              <input class="la-form__radio d-none" type="radio" value="latest" name="sort_by" id="latest1">
                              <label class="d-flex align-items-center text-sm" for="latest1"><span class="la-form__radio-circle d-flex justify-content-center align-items-center mr-2"></span><span>Latest</span></label>
                          </div>
                      </div>
                  </div>
                </div>
              </div>
                
              <div class="la-courses__nav-filterprops">
               <a class="la-icon icon-filter la-courses__nav-filter " id="filteredCourses"  role="button"></a>
              
                  <!-- Filter Courses Dropdown -->
                  <div class="la-courses__nav-filterdropdown" id="filtered_sidebar">
                      <div class="la-form__input-wrap px-5">
                          <div class="d-flex justify-content-between align-items-center">
                            <div class="la-form__lable la-form__lable--medium mb-2 text-md pt-3 text-dark">Filter by</div>
                            <button class="la-courses__nav-filterclose close text-4xl mt-1" type="button" id="filter_close">&times;</button>
                          </div>

                            <form action="{{ url()->current() }}" method="get" id="filter_form">
                                <input type="hidden" name="categories" id="filter_categories" value="{{implode(',',$selected_categories)}}"/>
                                <input type="hidden" name="sub_categories" id="filter_sub_categories" value="{{implode(',',$selected_subcategories)}}"/>
                                <input type="hidden" name="languages" id="filter_languages" value="{{implode(',',$selected_languages)}}"/>
                                <input type="hidden" name="level" id="filter_level" value="{{implode(',',$selected_level)}}"/>
                                <input type="hidden" name="filters" value="applied" />

                                
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
                                        <input class="d-none" type="checkbox" id="course_{{$c->id}}" @if(in_array($c->id, $selected_categories)) checked @endif onclick="addToCategory({{$c->id}})" value="{{$c->id}}"><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                                        <div class="pl-2 mt-n1">{{$c->title}}
                                            @if($c->subcategory != null)
                                              <ul class="d-flex flex-column">
                                                @foreach($c->subcategory as $sc)
                                                  <li>
                                                    <label class="glabel d-flex" for="sub_course_{{$sc->id}}">
                                                      <input class="d-none" id="sub_course_{{$sc->id}}" type="checkbox" @if(in_array($sc->id, $selected_subcategories)) checked @endif onclick="addToSubCategory({{$sc->id}})"  value="{{$sc->id}}"><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
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
                                      <input class="d-none" id="lang_{{$l->id}}" @if(in_array($l->id, $selected_languages)) checked @endif type="checkbox" onclick="addToLanguage({{$l->id}})" value="{{$l->id}}"><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                                      <div class="pl-2 mt-n1">{{$l->name}}</div>
                                    </label>
                                  @endforeach
                               
                                </div>

                                <div class="form-group pt-2">
                                  <label class="glabel-main" >Level</label>
                                  <label class="glabel d-flex" for="level_1">
                                    <input class="d-none" id ="level_1" type="checkbox" name="" onclick="addToLevel(1)" @if(in_array(1, $selected_level)) checked @endif><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                                    <div class="pl-2 mt-n1">Beginner</div>
                                  </label>

                                  <label class="glabel d-flex" for="level_2">
                                    <input class="d-none" id="level_2"  type="checkbox" name="" onclick="addToLevel(2)" @if(in_array(2, $selected_level)) checked @endif><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                                    <div class="pl-2 mt-n1">Intermediate</div>
                                  </label>

                                  <label class="glabel d-flex" for="level_3">
                                    <input class="d-none" id="level_3"  type="checkbox" name="" onclick="addToLevel(3)" @if(in_array(3, $selected_level)) checked @endif><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                                    <div class="pl-2 mt-n1">Advanced</div>
                                  </label>
                                </div>

                                <button onclick="$('#filter_form').submit()" class="la-btn la-btn__secondary bg-transparent text-uppercase text-center py-3 mt-6">Apply</button> 
                            </form>
                      </div>
                  </div>
              </div>
            </div>
            <!-- Filters : End -->
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
                  <!-- Filters : Start -->
                <div class="la-courses__nav-filters d-flex align-items-start ml-6">
                  <div class="la-courses__nav-props">
                    <a class="la-icon icon-list-layout la-courses__nav-filter  mr-3" id="showLayout2" role="button"></a>
                  </div>
                  <div class="la-courses__nav-props">
                    <a class="la-icon icon-sort la-courses__nav-filter  mr-3" id="sortCourses2" data-toggle="dropdown" href="javascript:void(0);" role="button"></a>
                    <!-- Sort Courses Dropdown -->
                    <div class="dropdown-menu dropdown-menu-right la-header__dropdown-menu" aria-labelledby="sortCourses2"  style="border:none !important;">
                      <div class="la-form__input-wrap px-5">
                          <div class="la-form__lable la-form__lable--medium mb-2 text-md pt-2 text-dark">Sort by</div>
                          <div class=" pt-2">
                              <div class="la-form__radio-wrap mr-5">
                                    <input class="la-form__radio d-none" type="radio" value="most_popular" name="sort_by" id="most_popular2">
                                    <label class="d-flex align-items-center text-sm" for="most_popular2"><span class="la-form__radio-circle d-flex justify-content-center align-items-center mr-2"></span><span>Most Popular</span></label>
                              </div>
                              <div class="la-form__radio-wrap mr-5">
                                  <input class="la-form__radio d-none" type="radio" value="highest_rated" name="sort_by" id="highest_rated2">
                                  <label class="d-flex align-items-center text-sm" for="highest_rated2"><span class="la-form__radio-circle d-flex justify-content-center align-items-center mr-2"></span><span>Highest Rated</span></label>
                              </div>
                              <div class="la-form__radio-wrap mr-5">
                                  <input class="la-form__radio d-none" type="radio" value="latest" name="sort_by" id="latest2">
                                  <label class="d-flex align-items-center text-sm" for="latest2"><span class="la-form__radio-circle d-flex justify-content-center align-items-center mr-2"></span><span>Latest</span></label>
                              </div>
                          </div>
                      </div>
                    </div>
                  </div>


              <div class="la-courses__nav-filterprops">
               <a class="la-icon icon-filter la-courses__nav-filter " id="filteredCourses2"  role="button"></a>
              
                  <!-- Filter Courses Dropdown -->
                  <div class="la-courses__nav-filterdropdown" id="filtered_sidebar2">
                      <div class="la-form__input-wrap px-5">
                          <div class="d-flex justify-content-between align-items-center">
                            <div class="la-form__lable la-form__lable--medium mb-2 text-md pt-3 text-dark">Filter by</div>
                            <button class="la-courses__nav-filterclose close text-4xl mt-1" type="button" id="filter_close2">&times;</button>
                          </div>

                            <form action="{{ url()->current() }}" method="get" id="filter_form">
                                <input type="hidden" name="categories" id="filter_categories" value="{{implode(',',$selected_categories)}}"/>
                                <input type="hidden" name="sub_categories" id="filter_sub_categories" value="{{implode(',',$selected_subcategories)}}"/>
                                <input type="hidden" name="languages" id="filter_languages" value="{{implode(',',$selected_languages)}}"/>
                                <input type="hidden" name="level" id="filter_level" value="{{implode(',',$selected_level)}}"/>
                                <input type="hidden" name="filters" value="applied" />

                                
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
                                        <input class="d-none" type="checkbox" id="course_{{$c->id}}" @if(in_array($c->id, $selected_categories)) checked @endif onclick="addToCategory({{$c->id}})" value="{{$c->id}}"><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                                        <div class="pl-2 mt-n1">{{$c->title}}
                                            @if($c->subcategory != null)
                                              <ul class="d-flex flex-column">
                                                @foreach($c->subcategory as $sc)
                                                  <li>
                                                    <label class="glabel d-flex" for="sub_course_{{$sc->id}}">
                                                      <input class="d-none" id="sub_course_{{$sc->id}}" type="checkbox" @if(in_array($sc->id, $selected_subcategories)) checked @endif onclick="addToSubCategory({{$sc->id}})"  value="{{$sc->id}}"><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
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
                                      <input class="d-none" id="lang_{{$l->id}}" @if(in_array($l->id, $selected_languages)) checked @endif type="checkbox" onclick="addToLanguage({{$l->id}})" value="{{$l->id}}"><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                                      <div class="pl-2 mt-n1">{{$l->name}}</div>
                                    </label>
                                  @endforeach
                               
                                </div>

                                <div class="form-group pt-2">
                                  <label class="glabel-main" >Level</label>
                                  <label class="glabel d-flex" for="level_1">
                                    <input class="d-none" id ="level_1" type="checkbox" name="" onclick="addToLevel(1)" @if(in_array(1, $selected_level)) checked @endif><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                                    <div class="pl-2 mt-n1">Beginner</div>
                                  </label>

                                  <label class="glabel d-flex" for="level_2">
                                    <input class="d-none" id="level_2"  type="checkbox" name="" onclick="addToLevel(2)" @if(in_array(2, $selected_level)) checked @endif><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                                    <div class="pl-2 mt-n1">Intermediate</div>
                                  </label>

                                  <label class="glabel d-flex" for="level_3">
                                    <input class="d-none" id="level_3"  type="checkbox" name="" onclick="addToLevel(3)" @if(in_array(3, $selected_level)) checked @endif><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                                    <div class="pl-2 mt-n1">Advanced</div>
                                  </label>
                                </div>

                                <button onclick="$('#filter_form').submit()" class="la-btn la-btn__secondary bg-transparent text-uppercase text-center py-3 mt-6">Apply</button> 
                            </form>
                      </div>
                  </div>
              </div>
            </div>
            <!-- Filters : End -->
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
                  <!-- Filters : Start -->
              <div class="la-courses__nav-filters d-flex align-items-start ml-6">
                <div class="la-courses__nav-props ">
                  <a class="la-icon icon-list-layout la-courses__nav-filter  mr-3" id="showLayout3" role="button"></a>
                </div>
                <div class="la-courses__nav-props">
                  <a class="la-icon icon-sort la-courses__nav-filter  mr-3" id="sortCourses3" data-toggle="dropdown" href="javascript:void(0);" role="button"></a>
                  <!-- Sort Courses Dropdown -->
                  <div class="dropdown-menu dropdown-menu-right la-header__dropdown-menu" aria-labelledby="sortCourses3"  style="border:none !important;">
                    <div class="la-form__input-wrap px-5">
                        <div class="la-form__lable la-form__lable--medium mb-2 text-md pt-2 text-dark">Sort by</div>
                        <div class=" pt-2">
                            <div class="la-form__radio-wrap mr-5">
                                  <input class="la-form__radio d-none" type="radio" value="most_popular" name="sort_by" id="most_popular3">
                                  <label class="d-flex align-items-center text-sm" for="most_popular3"><span class="la-form__radio-circle d-flex justify-content-center align-items-center mr-2"></span><span>Most Popular</span></label>
                            </div>
                            <div class="la-form__radio-wrap mr-5">
                                <input class="la-form__radio d-none" type="radio" value="highest_rated" name="sort_by" id="highest_rated3">
                                <label class="d-flex align-items-center text-sm" for="highest_rated3"><span class="la-form__radio-circle d-flex justify-content-center align-items-center mr-2"></span><span>Highest Rated</span></label>
                            </div>
                            <div class="la-form__radio-wrap mr-5">
                                <input class="la-form__radio d-none" type="radio" value="latest" name="sort_by" id="latest3">
                                <label class="d-flex align-items-center text-sm" for="latest3"><span class="la-form__radio-circle d-flex justify-content-center align-items-center mr-2"></span><span>Latest</span></label>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
                  
                <div class="la-courses__nav-filterprops">
               <a class="la-icon icon-filter la-courses__nav-filter " id="filteredCourses3"  role="button"></a>
              
                  <!-- Filter Courses Dropdown -->
                  <div class="la-courses__nav-filterdropdown" id="filtered_sidebar3">
                      <div class="la-form__input-wrap px-5">
                          <div class="d-flex justify-content-between align-items-center">
                            <div class="la-form__lable la-form__lable--medium mb-2 text-md pt-3 text-dark">Filter by</div>
                            <button class="la-courses__nav-filterclose close text-4xl mt-1" type="button" id="filter_close3">&times;</button>
                          </div>

                            <form action="{{ url()->current() }}" method="get" id="filter_form">
                                <input type="hidden" name="categories" id="filter_categories" value="{{implode(',',$selected_categories)}}"/>
                                <input type="hidden" name="sub_categories" id="filter_sub_categories" value="{{implode(',',$selected_subcategories)}}"/>
                                <input type="hidden" name="languages" id="filter_languages" value="{{implode(',',$selected_languages)}}"/>
                                <input type="hidden" name="level" id="filter_level" value="{{implode(',',$selected_level)}}"/>
                                <input type="hidden" name="filters" value="applied" />

                                
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
                                        <input class="d-none" type="checkbox" id="course_{{$c->id}}" @if(in_array($c->id, $selected_categories)) checked @endif onclick="addToCategory({{$c->id}})" value="{{$c->id}}"><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                                        <div class="pl-2 mt-n1">{{$c->title}}
                                            @if($c->subcategory != null)
                                              <ul class="d-flex flex-column">
                                                @foreach($c->subcategory as $sc)
                                                  <li>
                                                    <label class="glabel d-flex" for="sub_course_{{$sc->id}}">
                                                      <input class="d-none" id="sub_course_{{$sc->id}}" type="checkbox" @if(in_array($sc->id, $selected_subcategories)) checked @endif onclick="addToSubCategory({{$sc->id}})"  value="{{$sc->id}}"><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
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
                                      <input class="d-none" id="lang_{{$l->id}}" @if(in_array($l->id, $selected_languages)) checked @endif type="checkbox" onclick="addToLanguage({{$l->id}})" value="{{$l->id}}"><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                                      <div class="pl-2 mt-n1">{{$l->name}}</div>
                                    </label>
                                  @endforeach
                               
                                </div>

                                <div class="form-group pt-2">
                                  <label class="glabel-main" >Level</label>
                                  <label class="glabel d-flex" for="level_1">
                                    <input class="d-none" id ="level_1" type="checkbox" name="" onclick="addToLevel(1)" @if(in_array(1, $selected_level)) checked @endif><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                                    <div class="pl-2 mt-n1">Beginner</div>
                                  </label>

                                  <label class="glabel d-flex" for="level_2">
                                    <input class="d-none" id="level_2"  type="checkbox" name="" onclick="addToLevel(2)" @if(in_array(2, $selected_level)) checked @endif><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                                    <div class="pl-2 mt-n1">Intermediate</div>
                                  </label>

                                  <label class="glabel d-flex" for="level_3">
                                    <input class="d-none" id="level_3"  type="checkbox" name="" onclick="addToLevel(3)" @if(in_array(3, $selected_level)) checked @endif><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                                    <div class="pl-2 mt-n1">Advanced</div>
                                  </label>
                                </div>

                                <button onclick="$('#filter_form').submit()" class="la-btn la-btn__secondary bg-transparent text-uppercase text-center py-3 mt-6">Apply</button> 
                            </form>
                      </div>
                  </div>
              </div>
            </div>
            <!-- Filters : End -->
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