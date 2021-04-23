@extends('learners.layouts.app')

@section('seo_content')
    <title>Browse Classes | Learn Anything & Anywhere Artistic | Online Classes For Creatives</title>
    <meta name='description' itemprop='description' content='Discover online classes on art, creativity, design, digital art, artistic baking & much more. Join LILA & enhance your skills with these online classes.' />

    <meta property="og:description"content="Creative online course for creative minds. Discover & learn classes on art,design, baking, tattoo making & much more. Start your free trial with LILA now" />
    <meta property="og:title"content="Learn Anything & Anywhere Artistic | Online Classes For Creatives" />
    <meta property="og:url"content="{{Request::url()}}" />
    <meta property="og:type"content="website" />
    <meta property="og:site_name"content="LILA Art" />
    <meta property="og:image"content="{{config('app.url')}}/images/learners/logo.svg" />
    <meta property="og:image:url"content="{{config('app.url')}}/images/learners/logo.svg" />
    <meta property="og:image:size"content="300" />

    <meta name="twitter:card"content="summary" />
    <meta name="twitter:title"content="Learn Anything & Anywhere Artistic | Online Classes For Creatives" />
    <meta name="twitter:site"content="@lilaaliens" />
    
    <script type="application/ld+json">{"@context":"https://schema.org","@type":"WebPage","name":"Learn Anything & Anywhere Artistic | Online Classes For Creatives"}</script>
    <script>
      (function(h,e,a,t,m,p) {
      m=e.createElement(a);m.async=!0;m.src=t;
      p=e.getElementsByTagName(a)[0];p.parentNode.insertBefore(m,p);
      })(window,document,'script','https://u.heatmap.it/log.js');
    </script>
@endsection


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
      <div class="container-fluid">
        <div class="la-anim__wrap">  
          <a class="la-icon la-icon--5xl icon-back-arrow d-block d-md-none ml-n1 mt-n2 mb-2 la-anim__stagger-item--x" href="{{URL::previous()}}"></a>
          <h1 class="la-page__title mb-4 mb-md-8 la-anim__stagger-item">Browse Classes</h1>
        </div>
        
        <div class="d-flex justify-content-between align-items-start flex-wrap flex-column flex-md-row">
            <!-- Global Search: Start-->
            <div class="la-gsearch la-anim__wrap">
              <form class="form-inline m-0 la-anim__stagger-item"  action="{{ url('/search-classes/') }}">
                <div class="form-group d-flex align-items-center">
                  <input class="la-gsearch__input form-control la-gsearch__input-searchcourses " style="background:transparent" name="course_name" type="text" placeholder="What can we interest you in learning today?" required>
                  <button class="la-gsearch__submit btn mt-0" type="submit"><i class="la-icon icon icon-search la-gsearch__input-icon"></i></button>
                </div>
              </form>
            </div>
            <!-- Global Search: End-->

              <!-- Filters : Start -->
            <div class="la-courses__nav-filters  d-flex align-items-start ml-auto ml-md-6 ">
              <div class="la-courses__nav-props d-none d-lg-block">
                @if(!$filtres_applied)
                <a class="la-courses__nav-filter  mr-3" id="show_list" role="button">
                  <span class="la-icon icon-list-layout" id="layout_change"></span>
                </a>
                @endif
              </div> 
              <div class="la-courses__nav-props ">
                <a class="la-icon icon-sort la-courses__nav-filter  mr-3" id="sortCourses" data-toggle="dropdown" href="javascript:void(0);" role="button"></a>
                <!-- Sort Courses Dropdown -->
                <div class="dropdown-menu dropdown-menu-right la-header__dropdown-menu" aria-labelledby="sortCourses"  style="border:none !important;">
                  <div class="la-form__input-wrap px-5">
                      <div class="la-form__lable la-form__lable--medium mb-2 text-md pt-2 text-dark">Sort by</div>
                      <div class=" pt-2">
                          <div class="la-form__radio-wrap mr-5">
                                <input class="la-form__radio d-none" type="radio" value="most_popular" name="sort_by" id="most_popular" @if($sort_type =='most_popular') checked @endif>
                                <label class="la-form__radio-filterlabel d-flex align-items-center text-sm" for="most_popular"><span class="la-form__radio-circle d-flex justify-content-center align-items-center mr-2"></span><span>Most Popular</span></label>
                          </div>
                          <div class="la-form__radio-wrap mr-5">
                              <input class="la-form__radio d-none" type="radio" value="highest_rated" name="sort_by" id="highest_rated" @if($sort_type =='highest_rated') checked @endif>
                              <label class="la-form__radio-filterlabel d-flex align-items-center text-sm" for="highest_rated"><span class="la-form__radio-circle d-flex justify-content-center align-items-center mr-2"></span><span>Highest Rated</span></label>
                          </div>
                          <div class="la-form__radio-wrap mr-5">
                              <input class="la-form__radio d-none" type="radio" value="latest" name="sort_by" id="latest" @if($sort_type =='latest') checked @endif>
                              <label class="la-form__radio-filterlabel d-flex align-items-center text-sm" for="latest"><span class="la-form__radio-circle d-flex justify-content-center align-items-center mr-2"></span><span>Latest</span></label>
                          </div>
                      </div>
                  </div>
                </div>
              </div>
                
              <div class="la-courses__nav-filterprops">
               <a class="la-icon icon-filter la-courses__nav-filter " id="filteredCourses"  role="button"></a>
              
               
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

                                
                               {{-- <div class="form-group pt-2">
                                  <div class="glabel-main mb-1"> Course Duration</div>
                                    <div class="glabel d-flex  align-items-center m-0">
                                        <input class="la-form__radio d-none la-vcourse__purchase-input" @if($selected_duration == "lessthan1") checked @endif type="radio" name="duration" id="lessthan1" value="lessthan1">
                                        <label class="d-flex align-items-center" for="lessthan1">
                                          <span class="la-form__radio-circle la-form__radio-circle--typeB d-flex justify-content-center align-items-center" for="lessthan1"></span>
                                          <strong class="pl-2" style="color:var(--gray6);opacity:1;"> Less than an hr</strong>
                                        </label>
                                    </div>

                                    <div class="glabel d-flex  align-items-center m-0">
                                        <input class="la-form__radio d-none la-vcourse__purchase-input" @if($selected_duration == "lessthan5") checked @endif type="radio" name="duration" id="lessthan5" value="lessthan5">
                                        <label class="d-flex align-items-center" for="lessthan5">
                                          <span class="la-form__radio-circle la-form__radio-circle--typeB d-flex justify-content-center align-items-center" for="lessthan5"></span>
                                          <strong class="pl-2" style="color:var(--gray6);opacity:1;">  1hr - 5hrs</strong>
                                        </label>
                                    </div>

                                    <div class="glabel d-flex  align-items-center m-0">
                                        <input class="la-form__radio d-none la-vcourse__purchase-input" @if($selected_duration == "morethan5") checked @endif type="radio" name="duration" id="morethan5" value="morethan5">
                                        <label class="d-flex align-items-center" for="morethan5">
                                          <span class="la-form__radio-circle la-form__radio-circle--typeB d-flex  justify-content-center align-items-center" for="morethan5"></span>
                                          <strong class="pl-2" style="color:var(--gray6);opacity:1;"> More than 5hrs</strong>
                                        </label>
                                    </div>
                                </div> --}}

                                <div class="form-group pt-2">
                                  <div class="glabel-main mb-2"> Category</div>
                                    @foreach($filter_categories as $c)
                                      <label class="glabel d-flex" for="course_{{$c->id}}">
                                        <input class="d-none" type="checkbox" id="course_{{$c->id}}" @if(in_array($c->id, $selected_categories)) checked @endif onclick="addToCategory({{$c->id}})" value="{{$c->id}}">
                                        <span class="gcheck position-relative"><span class="gcheck-icon la-icon icon-tick text-xs position-absolute"></span></span>
                                        <span class="pl-2 mt-n1 text-capitalize">{{$c->title}} </span>
                                      </label>
                                    @endforeach
                                </div>

                                {{--<div class="form-group pt-2">
                                  <div class="glabel-main mb-2"> Language</div>
                                  @foreach($langauges as $l)
                                    <label class="glabel d-flex" for="lang_{{$l->id}}">
                                      <input class="d-none" id="lang_{{$l->id}}" @if(in_array($l->id, $selected_languages)) checked @endif type="checkbox" onclick="addToLanguage({{$l->id}})" value="{{$l->id}}">
                                      <span class="gcheck position-relative"><span class="gcheck-icon la-icon icon-tick text-xs position-absolute"></span></span>
                                      <span class="pl-2 mt-n1 text-capitalize">{{$l->name}}</span>
                                    </label>
                                  @endforeach
                                </div> --}}

                                <div class="form-group pt-2">
                                  <div class="glabel-main mb-2">Level</div>
                                  <label class="glabel d-flex" for="level_1">
                                    <input class="d-none" id ="level_1" type="checkbox" name="" onclick="addToLevel(1)" @if(in_array(1, $selected_level)) checked @endif>
                                    <span class="gcheck position-relative"><span class="gcheck-icon la-icon icon-tick text-xs position-absolute"></span></span>
                                    <span class="pl-2 mt-n1">Beginner</span>
                                  </label>

                                  <label class="glabel d-flex" for="level_2">
                                    <input class="d-none" id="level_2"  type="checkbox" name="" onclick="addToLevel(2)" @if(in_array(2, $selected_level)) checked @endif>
                                    <span class="gcheck position-relative"><span class="gcheck-icon la-icon icon-tick text-xs position-absolute"></span></span>
                                    <span class="pl-2 mt-n1">Intermediate</span>
                                  </label>

                                  <label class="glabel d-flex" for="level_3">
                                    <input class="d-none" id="level_3"  type="checkbox" name="" onclick="addToLevel(3)" @if(in_array(3, $selected_level)) checked @endif>
                                    <span class="gcheck position-relative"><span class="gcheck-icon la-icon icon-tick text-xs position-absolute"></span></span>
                                    <span class="pl-2 mt-n1">Advanced</span>
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
      </div>        

      <x-add-to-playlist 
        :playlists="$playlists"
      />
      
      <div class="container-fluid grid-container">
        <div class="la-courses mt-1 mt-md-14 la-anim__wrap">
          
          <nav class="la-courses__nav position-relative">
              <h5 class="la-courses__nav-title mb-5 mb-lg-8 la-anim__stagger-item">Categories</h5>
              <ul class="nav nav-pills la-courses__nav-tabs" id="nav-tab" role="tablist" tabindex="0">
              
                @if(!$filtres_applied)
                  @foreach ($categories as $category)
                    <!-- <div class="d-none d-md-block la-courses__nav-prev la-anim__fade-in-left"><span class="la-courses__nav-prev--icon la-icon icon-arrow"></span></div> -->
                      <li class="nav-item la-courses__nav-item la-anim__stagger-item--x"><a class="nav-link la-courses__nav-link @if ($loop->first) active @endif " id="nav-{{$category->slug}}-tab" data-toggle="tab" href="#nav-{{$category->slug}}" role="tab" aria-controls="nav-{{$category->slug}}" aria-selected="true"> <span class="position-relative text-nowrap">{{ $category->title}}</span></a></li>
                    <!-- <div class="d-none d-md-block  la-courses__nav-next la-anim__fade-in-right"><span class="la-courses__nav-next--icon la-icon icon-right-arrow2"></span></div> -->
                  @endforeach
                @endif
                
              </ul>
          </nav>      
         
          <div class="la-courses__content">
              <!-- Add to Playlist Modal -->
             
              
              @if($filtres_applied)
                  <div class="la-courses__content-desc">
                    <div class="la-anim__wrap">
                      <div class="row row-cols-md-2 row-cols-lg-3 row-cols-xl-4 la-anim__stagger-item">
                                    
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
                                  :price="$course->price"
                                  :bought="$course->isPurchased()"
                                  :checkWishList="$course->checkWishList"
                                  :checkCart="$course->checkCart"
                                  :videoCount="$course->videoCount"
                                  :chapterCount="$course->chapterCount"
                              />
                            @endforeach

                      </div>
                    </div>

                      @if(count($courses) == 0)

                        <div class="container la-empty__courses d-md-flex justify-content-between align-items-start la-anim__wrap">
                          <div class="la-empty__inner">
                              <h6 class="la-empty__course-title la-anim__stagger-item">No Classes Found.</h6>
                          </div>
                          <div class="la-empty__browse-courses mt-n4 la-anim__stagger-item--x">
                              <a href="{{Url('/browse/courses')}}" class="la-empty__browse">
                                  Browse Classes
                                  <span class="la-empty__browse-icon la-icon la-icon--5xl icon-grey-arrow"></span>
                              </a>
                          </div>
                        </div>
                        
                      @endif
                      @else
                        <div class="tab-content la-courses__nav-content la-anim__wrap position-relative" id="nav-tabContent">
                              @foreach ($categories as $category)
                              <div class="tab-pane fade show la-anim__wrap @if ($loop->first) active @endif" id="nav-{{$category->slug}}" role="tabpanel" aria-labelledby="nav-{{$category->slug}}-tab">
                                  
                                      @php
                                          $courses = $category->courses;
                                          if($sort_type == 'highest_rated')
                                          {
                                            $courses = $category->courses->sortByDesc('average_rating');
                                          }                
                                      @endphp

                                      <!-- ==== Featured Courses: Start  ====== -->
                                      <div class="swiper-container  la-courses__featured-container">
                                        <h5 class="la-courses__featured-title mb-5 mb-lg-8 ml-0 ml-lg-2 la-anim__fade-in-top">Featured Classes</h5>
                                        <div class="swiper-wrapper la-courses__featured-wrapper ">
                                                                                                        
                                                  @php
                                                    $courses = $category->courses;     
                                                  @endphp

                                                  @foreach($courses->where('featured','like','1') as $course)
                                                   
                                                    
                                                    <div class="swiper-slide la-courses__featured-slide la-anim__stagger-item">
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
                                                        :price="$course->price"
                                                        :bought="$course->isPurchased()"
                                                        :checkWishList="$course->checkWishList"
                                                        :checkCart="$course->checkCart"
                                                        :videoCount="$course->videoCount"
                                                        :chapterCount="$course->chapterCount"
                                                      />
                                                    </div>
                                                  @endforeach                                  
                                                
                                        </div>

                                          @if(count($courses) == 0 || count($courses->where('featured','like','1')) == 0 )
                                        
                                              <div class="mb-3 mb-md-8 la-empty__courses d-md-flex justify-content-center align-items-start la-anim__wrap">
                                                <div class="la-empty__inner text-center mb-0">
                                                    <h6 class="la-empty__course-title la-anim__stagger-item">No Featured Classes available currently.</h6>
                                                </div>
                                              </div>
                                            
                                          @endif

                                          @if(count($courses) != 0)
                                          <div class="w-100 mt-10 d-md-flex justify-content-end align-items-start">
                                            <div class="la-slider__navigations la-home__course-navigations d-md-flex  align-items-center">
                                              <div class="swiper-pagination la-slider__navigations-dots la-home__course-paginations la-slider__paginations la-slider__paginations--purble la-right"></div>
                                            </div>
                                          </div> 
                                          @endif
                                        
                                      </div>  
                                      <!-- ==== Featured Courses: End  ====== -->
                                      
                                      <div class="la-courses__other la-section__small">
                                        <h5 class="la-courses__featured-title mb-5 mb-lg-8 la-anim__fade-in-top">Other Classes</h5>
                                        <div class="row row-cols-md-2 row-cols-lg-3 row-cols-xl-4 la-anim__stagger-item la-anim__C">
                                          @php
                                            
                                            $collection = $courses->where('featured','=','0');
                                            $merged = $collection->merge($courses->whereNull('featured'));
                                          @endphp
                                          @foreach($merged as $course)
                                          
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
                                                :price="$course->price"
                                                :bought="$course->isPurchased()"
                                                :checkWishList="$course->checkWishList"
                                                :checkCart="$course->checkCart"
                                                :videoCount="$course->videoCount"
                                                :chapterCount="$course->chapterCount"
                                            
                                              />
                                          @endforeach
                                        </div>

                                        @if(count($courses) == 0 || count($merged) == 0 )

                                          <div class=" my-3 my-md-8  la-empty__courses d-md-flex justify-content-center align-items-start la-anim__wrap">
                                            <div class="la-empty__inner mb-0">
                                                <h6 class="la-empty__course-title la-anim__stagger-item">No Classes available Here.</h6>
                                            </div>
                                          </div>
                                          
                                        @endif
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