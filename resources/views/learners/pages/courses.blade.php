@extends('learners.layouts.app')
<!-- Playlist Alert Message-->
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

<!-- Wishlist Alert Message-->
<div id="wishlist_alert_div"></div> 
@section('content')

<section class="la-section__small la-cbg--main">
    <div class="la-section__inner">
      <div class="container">
        <div class="la-anim__wrap">  
          <a class="la-icon la-icon--5xl icon-back-arrow d-block d-md-none ml-n1 mt-n2 mb-5 la-anim__stagger-item--x" href="{{URL::previous()}}"></a>
          <h1 class="la-page__title mb-8 la-anim__stagger-item">Browse Courses</h1>
        </div>
        
        <div class="d-flex justify-content-between align-items-start ">
            <!-- Global Search: Start-->
            <div class="la-gsearch la-anim__wrap">
              <form class="form-inline m-0 la-anim__stagger-item"  action="{{ url('/search-course/') }}">
                <div class="form-group d-flex align-items-center">
                  <input class="la-gsearch__input form-control la-gsearch__input-searchcourses " style="background:transparent" name="course_name" type="text" placeholder="What can we interest you in learning today?">
                  <button class="la-gsearch__submit btn mt-0" type="submit"><i class="la-icon icon icon-search la-gsearch__input-icon"></i></button>
                </div>
              </form>
            </div>
            <!-- Global Search: End-->

              <!-- Filters : Start -->
            <div class="la-courses__nav-filters  d-flex align-items-start ml-6 ">
              <!-- <div class="la-courses__nav-props">
                <a class="la-icon icon-list-layout la-courses__nav-filter  mr-3" id="showLayout" role="button"></a>
              </div> -->
              <div class="la-courses__nav-props ">
                <a class="la-icon icon-sort la-courses__nav-filter  mr-3" id="sortCourses" data-toggle="dropdown" href="javascript:void(0);" role="button"></a>
                <!-- Sort Courses Dropdown -->
                <div class="dropdown-menu dropdown-menu-right la-header__dropdown-menu" aria-labelledby="sortCourses"  style="border:none !important;">
                  <div class="la-form__input-wrap px-5">
                      <div class="la-form__lable la-form__lable--medium mb-2 text-md pt-2 text-dark">Sort by</div>
                      <div class=" pt-2">
                          <div class="la-form__radio-wrap mr-5">
                                <input class="la-form__radio d-none" type="radio" value="most_popular" name="sort_by" id="most_popular" @if($sort_type =='most_popular') checked @endif>
                                <label class="d-flex align-items-center text-sm" for="most_popular"><span class="la-form__radio-circle d-flex justify-content-center align-items-center mr-2"></span><span>Most Popular</span></label>
                          </div>
                          <div class="la-form__radio-wrap mr-5">
                              <input class="la-form__radio d-none" type="radio" value="highest_rated" name="sort_by" id="highest_rated" @if($sort_type =='highest_rated') checked @endif>
                              <label class="d-flex align-items-center text-sm" for="highest_rated"><span class="la-form__radio-circle d-flex justify-content-center align-items-center mr-2"></span><span>Highest Rated</span></label>
                          </div>
                          <div class="la-form__radio-wrap mr-5">
                              <input class="la-form__radio d-none" type="radio" value="latest" name="sort_by" id="latest" @if($sort_type =='latest') checked @endif>
                              <label class="d-flex align-items-center text-sm" for="latest"><span class="la-form__radio-circle d-flex justify-content-center align-items-center mr-2"></span><span>Latest</span></label>
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
                                  <label class="glabel d-flex  align-items-center m-0" for="dur_hr">
                                      <!-- <input class="d-none" id="dur_hr" type="checkbox" value="1" onclick="addToDuration(1)"><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span> -->
                                      
                                      <input class="la-form__radio d-none la-vcourse__purchase-input" @if($selected_duration == "lessthan1") checked @endif type="radio" name="duration" id="lessthan1" value="lessthan1">
                                      <label class="d-flex align-items-center" for="lessthan1">
                                        <span class="la-form__radio-circle la-form__radio-circle--typeB d-flex justify-content-center align-items-center" for="lessthan1"></span>
                                        <strong class="pl-2" style="color:var(--gray6);opacity:1;"> Less than an hrs</strong>
                                      </label>
                                  </label>

                                  <label class="glabel d-flex  align-items-center m-0" for="dur_hr">
                                      <!-- <input class="d-none" id="dur_hr" type="checkbox" value="1" onclick="addToDuration(1)"><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span> -->
                                      
                                      <input class="la-form__radio d-none la-vcourse__purchase-input" @if($selected_duration == "lessthan5") checked @endif type="radio" name="duration" id="lessthan5" value="lessthan5">
                                      <label class="d-flex align-items-center" for="lessthan5">
                                        <span class="la-form__radio-circle la-form__radio-circle--typeB d-flex justify-content-center align-items-center" for="lessthan5"></span>
                                        <strong class="pl-2" style="color:var(--gray6);opacity:1;">  1hr - 5hrs</strong>
                                      </label>
                                  </label>

                                  <label class="glabel d-flex  align-items-center m-0" for="dur_hr">
                                      <!-- <input class="d-none" id="dur_hr" type="checkbox" value="1" onclick="addToDuration(1)"><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span> -->
                                      
                                      <input class="la-form__radio d-none la-vcourse__purchase-input" @if($selected_duration == "morethan5") checked @endif type="radio" name="duration" id="morethan5" value="morethan5">
                                      <label class="d-flex align-items-center" for="morethan5">
                                        <span class="la-form__radio-circle la-form__radio-circle--typeB d-flex  justify-content-center align-items-center" for="morethan5"></span>
                                        <strong class="pl-2" style="color:var(--gray6);opacity:1;"> More than 5hrs</strong>
                                      </label>
                                  </label>
                              
                                </div>

                                <div class="form-group pt-2">
                                  <label class="glabel-main" > Category</label>
                                    @foreach($filter_categories as $c)
                                      <label class="glabel d-flex" for="course_{{$c->id}}">
                                        <input class="d-none" type="checkbox" id="course_{{$c->id}}" @if(in_array($c->id, $selected_categories)) checked @endif onclick="addToCategory({{$c->id}})" value="{{$c->id}}"><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                                        <div class="pl-2 mt-n1 text-capitalize">{{$c->title}}
                                            <!-- @if($c->subcategory != null)
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
                                            @endif -->                                            
                                          </div>
                                      </label>
                                    @endforeach
                                </div>

                                <div class="form-group pt-2">
                                  <label class="glabel-main" > Language</label>
                                  @foreach($langauges as $l)
                                    <label class="glabel d-flex" for="lang_{{$l->id}}">
                                      <input class="d-none" id="lang_{{$l->id}}" @if(in_array($l->id, $selected_languages)) checked @endif type="checkbox" onclick="addToLanguage({{$l->id}})" value="{{$l->id}}">
                                      <span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                                      <div class="pl-2 mt-n1 text-capitalize">{{$l->name}}</div>
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
                                <div class="mt-6">
                                  <a href="/browse/courses" role="button" class="la-btn la-btn__secondary bg-transparent text-uppercase text-center py-3 mt-6">Clear</a> 
                                </div>
                            </form>
                      </div>
                  </div>
              </div>
            </div>
            <!-- Filters : End -->
        </div>
              

        <div class="la-courses mt-6 mt-md-14 la-anim__wrap">
          <nav class="la-courses__nav d-flex justify-content-between">
          @if(!$filtres_applied)
            <ul class="nav nav-pills la-courses__nav-tabs " id="nav-tab" role="tablist">
              {{-- <li class="nav-item la-courses__nav-item"><a class="nav-link la-courses__nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"> <span class="position-relative">Tattoo</span></a></li>
              <li class="nav-item la-courses__nav-item"><a class="nav-link la-courses__nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"> <span class="position-relative">Rangoli</span></a></li>
              <li class="nav-item la-courses__nav-item"><a class="nav-link la-courses__nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false"> <span class="position-relative">Design</span></a></li> --}}
              @foreach ($categories as $category)
                <li class="nav-item la-courses__nav-item la-anim__stagger-item--x"><a class="nav-link la-courses__nav-link @if ($loop->first) active @endif " id="nav-{{$category->slug}}-tab" data-toggle="tab" href="#nav-{{$category->slug}}" role="tab" aria-controls="nav-{{$category->slug}}" aria-selected="true"> <span class="position-relative text-nowrap">{{ $category->title}}</span></a></li>
              @endforeach
            </ul>
          @endif
          </nav>
             
          <x-add-to-playlist 
            :playlists="$playlists"
          />
                  <!-- Add to Playlist Modal -->
      
          @if($filtres_applied)
                  <div class="row row-cols-lg-3 la-anim__stagger-item">
                              
                              @foreach($courses as $course)
                                <x-course 
                                    :id="$course->id"
                                    :img="$course->preview_image"
                                    :course="$course->title"
                                    :url="$course->slug"
                                    :rating="round($course->average_rating, 2)"
                                    :creatorImg="$course->user->user_img"
                                    :creatorName="$course->user->fname"
                                    :creatorUrl="$course->user->id"
                                    :learnerCount="$course->learnerCount"
                                  />
                              @endforeach

                        </div>

                        @if(count($courses) == 0)

                          <div class="la-empty__courses d-md-flex justify-content-between align-items-start">
                              <div class="la-empty__inner">
                                  <h6 class="la-empty__course-title la-anim__stagger-item">No Courses Found.</h6>
                              </div>
                              <div class="la-empty__browse-courses mt-n4 la-anim__stagger-item--x">
                                  <a href="{{Url('/browse/courses')}}" class="la-empty__browse">
                                      Browse Courses
                                      <span class="la-empty__browse-icon la-icon la-icon--5xl icon-grey-arrow"></span>
                                  </a>
                              </div>
                          </div>
                        @endif
          @else
                    <!-- Tattoo Art Tab: Start -->
                    <div class="tab-content la-courses__content la-anim__wrap position-relative" id="nav-tabContent">

                      @foreach ($categories as $category)
                        <div class="tab-pane fade show @if ($loop->first) active @endif" id="nav-{{$category->slug}}" role="tabpanel" aria-labelledby="nav-{{$category->slug}}-tab">
                          <div class="row row-cols-md-2 row-cols-lg-3 la-anim__stagger-item la-anim__C">
                                @php
                                    $courses = $category->courses;
                                    if($sort_type == 'highest_rated')
                                    {
                                      $courses = $category->courses->sortByDesc('average_rating');
                                    }                
                                @endphp
                                @foreach($courses as $course)
                                
                                  <x-course 
                                      :id="$course->id"
                                      :img="$course->preview_image"
                                      :course="$course->title"
                                      :url="$course->slug"
                                      :rating="round($course->average_rating, 2)"
                                      :creatorImg="$course->user->user_img"
                                      :creatorName="$course->user->fname"
                                      :creatorUrl="$course->user->id"
                                      :learnerCount="$course->learnerCount"
                                    />
                                @endforeach

                          </div>
                        </div>
                      @endforeach

                    </div>
                    </div>

            @endif
  
          </div>
        </div>
      </div>
    </div>
  </section>
  @endsection
  @section('footerScripts')
      <script>
         

            function addToDuration(id){
              var level = $('#filter_duration').val();

              if(level){
                  arr = JSON.parse("[" + level + "]");
                  if(arr.includes(id)){
                      index = arr.indexOf(id);
                      arr.splice(index, 1);
                  }else{
                    arr.push(id);
                  }
                $('#filter_duration').val(arr);
              }else{
                level = [];
                level.push(id);
                $('#filter_duration').val(level);
              }
            }

      </script>
  @endsection