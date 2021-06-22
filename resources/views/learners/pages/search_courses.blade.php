@extends('learners.layouts.app')

@section('seo_content')
    <title> Search Courses | Learn Tattoo & Graphic Design | LILA </title>
    <meta name='description' itemprop='description' content='Search course on tattoo, graphic design, digital art from basic to advanced .Join LILA & enhance your skills with these online classes.' />

    <meta property="og:description" content="Search course on tattoo, graphic design, digital art from basic to advanced .Join LILA & enhance your skills with these online classes." />
    <meta property="og:title" content="Search Courses | Learn Tattoo & Graphic Design | LILA" />
    <meta property="og:url" content="{{Request::url()}}" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="LILA Art" />
    <meta property="og:image" content="{{config('app.url')}}/images/learners/logo.svg" />
    <meta property="og:image:url" content="{{config('app.url')}}/images/learners/logo.svg" />
    <meta property="og:image:size" content="300" />

    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="Search Courses | Learn Tattoo & Graphic Design | LILA" />
    <meta name="twitter:site" content="@lilaaliens" />

    <script type="application/ld+json">{"@context":"https://schema.org","@type":"WebPage","name":"Search Courses | Learn Tattoo & Graphic Design | LILA"}</script>
@endsection

@section('content')
<section class="la-section__small la-cbg--main">
    <div class="la-section__inner">
      <div class="container-fluid">
        <!-- Alert Message -->
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
        <!-- Wishlist Alert Message -->
        <div id="wishlist_alert_div"></div>

        <a class="la-icon la-icon--5xl icon-back-arrow ml-n1 mt-n2 d-block d-xl-none" href="{{URL::previous()}}"></a>

        <div class="d-flex justify-content-between position-relative">
          <a href="{{URL::previous()}}" class="la-vcreator__back d-none d-xl-block" style="top:-6px"><span class="la-icon la-icon--5xl icon-back-arrow"></span></a>
          <h1 class="la-page__title mb-4 mb-lg-8">Search Courses</h1>
        </div>

        <div class="d-flex justify-content-between align-items-center">
            <!-- Global Search: Start-->
            <div class="la-gsearch mb-0">
              <form class="form-inline"  action="{{ url('/explore') }}">
                <div class="form-group mb-0 d-flex align-items-center">
                  <input class="la-gsearch__input form-control la-gsearch__input-searchcourses" style=" background:transparent" value="{{$search_input}}" name="q" type="text" placeholder="What you want to learn today?" required>
                  <button class="la-gsearch__submit btn mt-0" type="submit"><i class="la-icon icon icon-search la-gsearch__input-icon"></i></button>
                </div>
              </form>
            </div>
            <!-- Global Search: End-->

            <!-- Filters : Start -->
           <div class="la-courses__nav-filters d-flex align-items-start ml-6">
              {{-- <div class="la-courses__nav-props ">
                <a class="la-icon icon-list-layout la-courses__nav-filter mr-3 " id="showLayout" role="button"></a>
              </div> --}}
              <div class="la-courses__nav-props">
                <a class="la-icon icon-sort la-courses__nav-filter mr-3" id="sortCourses" data-toggle="dropdown" href="javascript:void(0);" role="button"></a>
                <!-- Sort Courses Dropdown -->
                <div class="dropdown-menu dropdown-menu-right la-header__dropdown-menu mt-3" aria-labelledby="sortCourses"  style="border:none !important;">
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
                <!-- filter div -->
                <div class="la-courses__nav-filterprops">
                <a class="la-icon icon-filter la-courses__nav-filter " id="filteredCourses"  role="button"></a>

                  <!-- Filter Courses Dropdown -->
                  <div class="la-courses__nav-filterdropdown" id="filtered_sidebar">
                      <div class="la-form__input-wrap px-md-5">
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
                                        <input class="la-form__radio d-none la-vcourse__purchase-input" type="radio" name="duration" id="lessthan1" value="lessthan1">
                                        <label class="d-flex align-items-center" for="lessthan1">
                                          <span class="la-form__radio-circle la-form__radio-circle--typeB d-flex justify-content-center align-items-center" for="lessthan1"></span>
                                          <strong class="pl-2" style="color:var(--gray6);opacity:1;"> Less than an hr</strong>
                                        </label>
                                    </div>

                                    <div class="glabel d-flex  align-items-center m-0">
                                        <input class="la-form__radio d-none la-vcourse__purchase-input" type="radio" name="duration" id="lessthan5" value="lessthan5">
                                        <label class="d-flex align-items-center" for="lessthan5">
                                          <span class="la-form__radio-circle la-form__radio-circle--typeB d-flex justify-content-center align-items-center" for="lessthan5"></span>
                                          <strong class="pl-2" style="color:var(--gray6);opacity:1;">  1hr - 5hrs</strong>
                                        </label>
                                    </div>

                                    <div class="glabel d-flex  align-items-center m-0">
                                        <input class="la-form__radio d-none la-vcourse__purchase-input" type="radio" name="duration" id="morethan5" value="morethan5">
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

                                {{-- <div class="form-group pt-2">
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

                                <button onclick="$('#filter_form').submit()" class="btn btn-primary la-btn__app text-uppercase text-center py-3 mt-6">Apply</button>
                                <div>
                                  <a href="/browse/courses" role="button" class="btn btn-primary la-btn__app text-uppercase text-center py-3 mt-4">Clear</a>
                                </div>
                            </form>
                      </div>
                  </div>
                </div>
                </div>
                <!-- Filters : End -->
                </div>
                <!-- filter div : END -->


        <div class="la-courses py-10">

                   <x-add-to-playlist
                      :playlists="$playlists"
                    />
                  <!-- Add to Playlist Modal -->

                @if(count($courses) > 0)
                    <div class="la-anim__wrap">
                      <div class="row row-cols-md-2 row-cols-lg-3 row-cols-xl-4 la-anim__stagger-item">
                        @foreach($courses as $course)
                                      <x-bundle-course
                                      :id="$course->id"
                                      :img="$course->preview_image"
                                      :course="$course->title"
                                      :url="$course->slug"
                                      :rating="round($course->average_rating, 2)"
                                      :videoCount="$course->videoCount()"
                                      :classesCount="count($course->course_id)"
                                      :creatorImg="$course->users()"
                                      :creatorName="$course->users()->first()->fullName"
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
                    </div>
                @endif


                @if(count($courses) == 0)
                <div class="col-12 px-0 la-anim__wrap">
                  <div class="la-empty__courses d-md-flex justify-content-between align-items-center la-anim__stagger-item">
                        <div class="la-empty__inner mb-0">
                            <h6 class="la-empty__course-title mb-0 la-anim__stagger-item">No Courses Found.</h6>
                        </div>
                        <div class="la-empty__browse-courses mt-n4 la-anim__stagger-item--x">
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

  @section('footerScripts')
      <script>
          $('input[type=radio][name=sort_by]').change(function() {
             window.location.href= '{{url()->current()}}?sort_by='+this.value;

          });
      </script>
  @endsection
