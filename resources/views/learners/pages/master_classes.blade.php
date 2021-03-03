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
      <div class="container-fluid">
      <div class="row">
        <a class="la-icon la-icon--5xl icon-back-arrow d-block d-md-none ml-n1 mt-n2 mb-2" href="{{URL::previous()}}"></a>
        <div class="col-12 px-0 d-flex justify-content-between la-anim__wrap">  
          <h1 class="la-page__title mb-16 mb-md-8 la-anim__stagger-item">Master Classes</h1>
          <a class="la-icon--2xl icon-filter d-none d-lg-none" id="filterCourses" role="button"></a>

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
                              <input type="hidden" name="level" id="filter_level" value="{{implode(',',$selected_level)}}"/>
                              <input type="hidden" name="filters" value="applied" />

                              <div class="form-group pt-2">
                                <div class="glabel-main mb-2"> Category</div>
                                  @foreach($categories as $c)
                                    <label class="glabel d-flex" for="course_{{$c->id}}">
                                      <input class="d-none" type="checkbox" id="course_{{$c->id}}" @if(in_array($c->id, $selected_categories)) checked @endif onclick="addToCategory({{$c->id}})" value="{{$c->id}}">
                                      <span class="gcheck position-relative"><span class="gcheck-icon la-icon icon-tick text-xs position-absolute"></span></span>
                                      <span class="pl-2 mt-n1 text-capitalize">{{$c->title}} </span>
                                    </label>
                                  @endforeach
                              </div>

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
        </div> 
      </div> 

            <div class="row la-section la-anim__wrap">
                <div class="col-12 ">
                
                    <div class="la-mccourses py-4">
                      <div class="row justify-content-center px-0 la-anim__stagger la-anim__A">

                      @if(count($master_classes) == 0)
                      <div class="la-empty__courses w-100 d-md-flex justify-content-between align-items-center mx-5 mt-0 mt-md-6">
                          <div class="la-empty__inner">
                              <h6 class="col la-empty__course-title text-xl la-anim__stagger-item">No master classes uploaded yet! </h6>
                          </div>
                          <div class="col text-md-right la-empty__browse-courses mt-n4 la-anim__stagger-item--x">
                              <a href="/browse/courses" class="la-empty__browse">
                                  Browse Courses
                                  <span class="la-empty__browse-icon la-icon la-icon--5xl icon-grey-arrow "></span>
                              </a>
                          </div>
                      </div>  

                      @else
                          <div class="row row-cols-md-6 row-cols-lg-4">
                          @foreach ($master_classes as $master)
                              <x-master-class
                              :img="$master->preview_image"
                              :title="$master->title"
                              :profileImg="$master->user->user_img"
                              :profileName="$master->user->fullName"
                              :learners="$master->learnerCount"
                              :id="$master->id"
                              :slug="$master->slug"
                              />
                          @endforeach
                          </div>
                      @endif
                          
                    </div>
                </div>
                </div>
            </div>
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