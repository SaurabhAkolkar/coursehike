@extends('learners.layouts.app')

@section('seo_content')
    <title> Explore LILA | Learn Tattoo & Graphic Design | LILA </title>
    <meta name='description' itemprop='description' content='Explore LILA on tattoo, graphic design, digital art from basic to advanced .Join LILA & enhance your skills with these online classes.' />

    <meta property="og:description" content="Explore LILA on tattoo, graphic design, digital art from basic to advanced .Join LILA & enhance your skills with these online classes." />
    <meta property="og:title" content="Search Global | Learn Tattoo & Graphic Design | LILA" />
    <meta property="og:url" content="{{Request::url()}}" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="LILA Art" />
    <meta property="og:image" content="{{config('app.url')}}/images/learners/logo.svg" />
    <meta property="og:image:url" content="{{config('app.url')}}/images/learners/logo.svg" />
    <meta property="og:image:size" content="300" />

    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="Search Global | Learn Tattoo & Graphic Design | LILA" />
    <meta name="twitter:site" content="@lilaaliens" />

    <script type="application/ld+json">{"@context":"https://schema.org","@type":"WebPage","name":"Explore LILA | Learn Tattoo & Graphic Design | LILA"}</script>
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

        <div class="row la-anim__wrap">
            <div class="col-12">
                <a class="la-icon la-icon--5xl icon-back-arrow ml-n1 mt-n2 d-block d-xl-none" href="{{URL::previous()}}"></a>
                <div class="d-flex justify-content-between position-relative la-anim__stagger-item">
                    <a href="{{URL::previous()}}" class="la-vcreator__back d-none d-xl-block" style="top:-6px"><span class="la-icon la-icon--5xl icon-back-arrow"></span></a>
                    <h1 class="la-page__title mb-4 mb-lg-8">Explore LILA</h1>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <!-- Global Search: Start-->
                    <div class="la-gsearch mb-0 la-anim__stagger-item">
                        <form class="form-inline" action="{{ url('/explore') }}">
                            <div class="form-group mb-0 d-flex align-items-center">
                                <input class="la-gsearch__input form-control la-gsearch__input-searchglobal text-md" style="background:transparent;" value={{$search_query}} name="q" type="text" placeholder="Type to search" required>
                                <button class="la-gsearch__submit btn mt-0" type="submit"><i class="la-icon icon icon-search la-gsearch__input-icon"></i></button>
                            </div>
                        </form>
                    </div>
                    <!-- Global Search: End-->

                    <!-- Filters : Start -->
                    {{-- <div class="la-courses__nav-filters d-flex align-items-start ml-6">
                        <div class="la-courses__nav-props d-none d-lg-block">
                            <a class="la-courses__nav-filter  mr-3" id="show_list" role="button">
                                <span class="la-icon icon-list-layout" id="layout_change"></span>
                            </a>
                        </div> 
                        
                        <div class="la-courses__nav-props">
                            <a class="la-icon icon-sort la-courses__nav-filter  mr-3" id="sortCourses" data-toggle="dropdown" href="javascript:void(0);" role="button"></a>
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

                                    {{-- <form action="{{ url()->current() }}" method="get" id="filter_form">
                                        <input type="hidden" name="categories" id="filter_categories" value="{{implode(',',$selected_categories)}}"/>
                                        <input type="hidden" name="sub_categories" id="filter_sub_categories" value="{{implode(',',$selected_subcategories)}}"/>
                                        <input type="hidden" name="languages" id="filter_languages" value="{{implode(',',$selected_languages)}}"/>
                                        <input type="hidden" name="level" id="filter_level" value="{{implode(',',$selected_level)}}"/>
                                        <input type="hidden" name="filters" value="applied" />

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
                                            <a href="/browse/classes" role="button" class="btn btn-primary la-btn__app text-uppercase text-center py-3 mt-4">Clear</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <!-- Filters : End -->
                </div>
                <!-- filter div : END -->
            </div>
        </div>
    </div>

    <div class="container-fluid grid-container py-10 la-anim__wrap">
        <h2 class="text-md text-lg text-md-xl mb-6 la-anim__stagger-item">Search Result for "{{$search_query}}" </h2>

        <div class="row search-results">

            @if ($results)

                @foreach ($results as $result)
                    <div class="col-12 la-global__search-col la-anim__stagger-item">
                        <div class="la-global__search-list">
                            <div class="d-md-flex align-items-start">
                                <div class="la-global__search-list--img">
                                    <img src={{$result['img']}} alt="Search List" class="d-block mx-0" />
                                </div>

                                <div class="la-global__search-list--info">
                                    <div class="la-global__searc-list--inner d-lg-flex align-items-start justify-content-between">
                                        <div class="la-global__search-list--lft">
                                            <div class="la-global__search-list--tag text-xs text-capitalize">{{$result['tag']}}</div>
                                            <h6 class="la-global__search-list--title mb-1">{{$result['title']}}</h6>
                                        </div>
                                        <div class="la-global__search-list--rgt leading-none">
                                            <span class="la-global__search-list--seq text-xs pr-1">{{$result['mentor_name']}}</span>
                                            <span class="la-global__search-list--seq text-xs pr-1">{{$result['video_count']}} Video</span>
                                            <span class="la-global__search-list--seq text-xs pr-1">{{$result['duration']}}</span>
                                        </div>
                                    </div>

                                    <div class="la-global__search-list--desc text-xs mt-2">
                                        {{strip_tags($result['desc'])}}
                                    </div>

                                    <div class="la-global__search-list--grid leading-none">
                                        <span class="la-global__search-list--seq text-xs pr-1">{{$result['mentor_name']}}</span>
                                        <span class="la-global__search-list--seq text-xs pr-1">{{$result['video_count']}}</span>
                                        <span class="la-global__search-list--seq text-xs pr-1">{{$result['duration']}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            {{-- <div class="col-12 la-global__search-col la-anim__stagger-item">
                <div class="la-global__search-list">
                    <div class="d-md-flex align-items-start">
                        <div class="la-global__search-list--img">
                            <img src="https://picsum.photos/250/150" alt="Search List" class="d-block mx-0" />
                        </div>

                        <div class="la-global__search-list--info">
                            <div class="la-global__searc-list--inner d-lg-flex align-items-start justify-content-between">
                                <div class="la-global__search-list--lft">
                                    <div class="la-global__search-list--tag text-xs text-capitalize">Bundled Course</div>
                                    <h6 class="la-global__search-list--title mb-1">Realistic Portrait Tattoo of Muhammad Ali</h6>
                                </div>
                                <div class="la-global__search-list--rgt leading-none">
                                    <span class="la-global__search-list--seq text-xs pr-1">Sunny Bhanushali</span>
                                    <span class="la-global__search-list--seq text-xs pr-1">8 Classes</span>
                                    <span class="la-global__search-list--seq text-xs pr-1">2h 15m</span>
                                </div>
                            </div>

                            <div class="la-global__search-list--desc text-xs mt-2">
                                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.<br/><br/>
                                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd
                            </div>

                            <div class="la-global__search-list--grid leading-none">
                                <span class="la-global__search-list--seq text-xs pr-1">Sunny Bhanushali</span>
                                <span class="la-global__search-list--seq text-xs pr-1">8 Classes</span>
                                <span class="la-global__search-list--seq text-xs pr-1">2h 15m</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 la-global__search-col la-anim__stagger-item">
                <div class="la-global__search-list">
                    <div class="la-global__searc-list--inner d-md-flex align-items-start">
                        <div class="la-global__search-list--img">
                            <img src="https://picsum.photos/250/150" alt="Search List" class="d-block mx-0" />
                        </div>

                        <div class="la-global__search-list--info">
                            <div class="d-lg-flex align-items-start justify-content-between">
                                <div class="la-global__search-list--lft">
                                    <div class="la-global__search-list--tag text-xs text-capitalize">Class</div>
                                    <h6 class="la-global__search-list--title mb-1">All about Tattoo Machines</h6>
                                </div>
                                <div class="la-global__search-list--rgt leading-none">
                                    <span class="la-global__search-list--seq text-xs pr-1">Allan Gios</span>
                                    <span class="la-global__search-list--seq text-xs pr-1">20 Videos</span>
                                    <span class="la-global__search-list--seq text-xs pr-1">8 Chapters</span>
                                    <span class="la-global__search-list--seq text-xs pr-1">4h 15m</span>
                                </div>
                            </div>

                            <div class="la-global__search-list--desc text-xs mt-2">
                                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.<br/><br/>
                                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd
                            </div>

                            <div class="la-global__search-list--grid leading-none">
                                <span class="la-global__search-list--seq text-xs pr-1">Allan Gios</span>
                                <span class="la-global__search-list--seq text-xs pr-1">20 Videos</span>
                                <span class="la-global__search-list--seq text-xs pr-1">8 Chapters</span>
                                <span class="la-global__search-list--seq text-xs pr-1">4h 15m</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}


                
            @else
                <div class="col-12 la-anim__wrap">
                    <div class="la-empty__courses text-center la-anim__stagger-item">
                        <div class="la-empty__inner mb-0">
                            <h6 class="la-empty__course-title mb-0">No Classes/Courses Found.</h6>
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

          $('.la-gsearch__input-searchglobal').on('input', function() {
            var q = $(this).val();
            $.get("/explore-ajax?q="+q, function( data ) {
                $( ".search-results" ).html( data );
            });
        });
      </script>
  @endsection
