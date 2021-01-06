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
            <div class="form-group d-flex align-items-center">
              <input class="la-gsearch__input form-control" style="width:290px; background:transparent" name="course_name" type="text" placeholder="What you want to learn today?">
              <button class="la-gsearch__submit btn" type="submit"><i class="la-icon la-icon--3xl icon icon-search"></i></button>
            </div>
            
          </form>
        </div>
        <!-- Global Search: End-->

        

        <div class="la-courses mt-6 mt-md-14 la-anim__wrap">
          <nav class="la-courses__nav d-flex justify-content-between">
            <ul class="nav nav-pills la-courses__nav-tabs " id="nav-tab" role="tablist">
              {{-- <li class="nav-item la-courses__nav-item"><a class="nav-link la-courses__nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"> <span class="position-relative">Tattoo</span></a></li>
              <li class="nav-item la-courses__nav-item"><a class="nav-link la-courses__nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"> <span class="position-relative">Rangoli</span></a></li>
              <li class="nav-item la-courses__nav-item"><a class="nav-link la-courses__nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false"> <span class="position-relative">Design</span></a></li> --}}
              @foreach ($categories as $category)
                <li class="nav-item la-courses__nav-item la-anim__stagger-item--x"><a class="nav-link la-courses__nav-link @if ($loop->first) active @endif " id="nav-{{$category->slug}}-tab" data-toggle="tab" href="#nav-{{$category->slug}}" role="tab" aria-controls="nav-{{$category->slug}}" aria-selected="true"> <span class="position-relative text-nowrap">{{ $category->title}}</span></a></li>
              @endforeach
            </ul>
            
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
                                    @foreach($categories as $c)
                                      <label class="glabel d-flex" for="course_1">
                                        <input class="d-none" type="checkbox" name="categories[]" value="{{$c->id}}"><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                                        <div class="pl-2 mt-n1">{{$c->title}}
                                            @if($c->subcategory != null)
                                              <ul class="d-flex flex-column">
                                                @foreach($c->subcategory as $sc)
                                                  <li>
                                                    <label class="glabel d-flex" for="sub_course_3">
                                                      <input class="d-none" id="sub_course_3" type="checkbox" name="sub_categories[]" value="{{$sc->id}}"><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
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
                                    <label class="glabel d-flex" for="lang_1">
                                      <input class="d-none" id="lang_1" type="checkbox" name="languages[]" value="{{$l->id}}"><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                                      <div class="pl-2 mt-n1">{{$l->name}}</div>
                                    </label>
                                  @endforeach
                               
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
                            </form>
                      </div>
                  </div>
              </div>
            </div>
            <!-- Filters : End -->
          </nav>

          @php  

            $tattoo1 = new stdClass;$tattoo1->id=1;$tattoo1->img= "https://picsum.photos/600/400";$tattoo1->course= "Tattoo Art";$tattoo1->rating= "4";$tattoo1->url= "/course";$tattoo1->creatorImg= "https://picsum.photos/100";$tattoo1->creatorName= "Joseph Phill";$tattoo1->creatorUrl= "/creator";
            $tattoo2 = new stdClass;$tattoo2->id=2;$tattoo2->img= "https://picsum.photos/600/400"; $tattoo2->course= "Tattoo Art";$tattoo2->rating= "4";$tattoo2->url= "/course";$tattoo2->creatorImg= "https://picsum.photos/100";$tattoo2->creatorName= "Amy D'souza";$tattoo2->creatorUrl= "/creator";
            $tattoo3 = new stdClass;$tattoo3->id=3;$tattoo3->img= "https://picsum.photos/600/400";$tattoo3->course= "Tattoo Art";$tattoo3->rating= "4";$tattoo3->url= "/course";$tattoo3->creatorImg= "https://picsum.photos/100";$tattoo3->creatorName= "Alton Crew";$tattoo3->creatorUrl= "/creator";
            $tattoo4 = new stdClass;$tattoo4->id=4;$tattoo4->img= "https://picsum.photos/600/400";$tattoo4->course= "Tattoo Art";$tattoo4->rating= "4";$tattoo4->url= "/course";$tattoo4->creatorImg= "https://picsum.photos/100";$tattoo4->creatorName= "Nathan Spark";$tattoo4->creatorUrl= "/creator";
            $tattoo5 = new stdClass;$tattoo5->id=5;$tattoo5->img= "https://picsum.photos/600/400";$tattoo5->course= "Tattoo Art"; $tattoo5->rating= "4";$tattoo5->url= "/course"; $tattoo5->creatorImg= "https://picsum.photos/100"; $tattoo5->creatorName= "Harry Lisa"; $tattoo5->creatorUrl= "/creator";
            $tattoo6 = new stdClass;$tattoo6->id=6;$tattoo6->img= "https://picsum.photos/600/400";$tattoo6->course= "Tattoo Art";$tattoo6->rating= "4"; $tattoo6->url= "/course";$tattoo6->creatorImg= "https://picsum.photos/100";$tattoo6->creatorName= "Natalia Spark";$tattoo6->creatorUrl= "/creator";
            $tattoo7 = new stdClass;$tattoo7->id=7;$tattoo7->img= "https://picsum.photos/600/400"; $tattoo7->course= "Tattoo Art";$tattoo7->rating= "4"; $tattoo7->url= "/course";$tattoo7->creatorImg= "https://picsum.photos/100";$tattoo7->creatorName= "Remo Joseph"; $tattoo7->creatorUrl= "/creator";

            $tattoos = array($tattoo1, $tattoo2, $tattoo3, $tattoo4, $tattoo5, $tattoo6, $tattoo7);
          @endphp

             
                   <x-add-to-playlist 
                      :playlists="$playlists"
                    />
                  <!-- Add to Playlist Modal -->
                  

          <!-- Tattoo Art Tab: Start -->
          <div class="tab-content la-courses__content la-anim__wrap position-relative" id="nav-tabContent">

            @foreach ($categories as $category)
              <div class="tab-pane fade show @if ($loop->first) active @endif" id="nav-{{$category->slug}}" role="tabpanel" aria-labelledby="nav-{{$category->slug}}-tab">
                <div class="row row-cols-lg-3 la-anim__stagger-item">
                      @foreach($category->courses as $course)
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
              </div>
            @endforeach
            {{-- <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
              <div class="row row-cols-lg-3">
      
                    @foreach($tattoos as $tattoo)
                      
                      <x-course 
                          :id="$tattoo->id"
                          :img="$tattoo->img" 
                          :course="$tattoo->course" 
                          :url="$tattoo->url" 
                          :rating="$tattoo->rating"
                          :creatorImg="$tattoo->creatorImg"
                          :creatorName="$tattoo->creatorName"
                          :creatorUrl="$tattoo->creatorUrl"
                        />
                    @endforeach
                
              </div>
            </div>
            <!-- Tattoo Art Tab: End -->
            
            <!-- Rangoli Tab: Start -->
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
              <div class="row row-cols-lg-3">

                  @foreach($tattoos as $tattoo)
                    <x-course 
                        :id="$tattoo->id"
                        :img="$tattoo->img" 
                        :course="$tattoo->course" 
                        :url="$tattoo->url" 
                        :rating="$tattoo->rating"
                        :creatorImg="$tattoo->creatorImg"
                        :creatorName="$tattoo->creatorName"
                        :creatorUrl="$tattoo->creatorUrl"
                      />
                  @endforeach

              </div>
            </div>
             <!-- Rangoli Tab: End -->

             <!-- Design Tab: Start -->
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
              <div class="row row-cols-lg-3">

                  @foreach($tattoos as $tattoo)
                    <x-course 
                        :id="$tattoo->id"
                        :img="$tattoo->img" 
                        :course="$tattoo->course" 
                        :url="$tattoo->url" 
                        :rating="$tattoo->rating"
                        :creatorImg="$tattoo->creatorImg"
                        :creatorName="$tattoo->creatorName"
                        :creatorUrl="$tattoo->creatorUrl"
                      />
                  @endforeach
                  
              </div>
            </div> --}}
             <!-- Rangoli Tab: End -->

          </div>
        </div>
      </div>
    </div>
  </section>
  @endsection