@extends('learners.layouts.app')

@section('seo_content')
    <title>Learn Anything Artistic Online | Start For Free Today | LILA</title>
    <meta name='description' itemprop='description' content='Creative online course for creative minds. Discover & learn classes on art,design, baking, tattoo making & much more. Start your free trial with LILA now' />

    <meta property="og:description"content="Creative online course for creative minds. Discover & learn classes on art,design, baking, tattoo making & much more. Start your free trial with LILA now" />
    <meta property="og:title"content="Learn Anything Artistic Online | Start For Free Today | LILA" />
    <meta property="og:url"content="{{Request::url()}}" />
    <meta property="og:type"content="website" />
    <meta property="og:site_name"content="LILA Art" />
    <meta property="og:image"content="{{config('app.url')}}/images/learners/logo.svg" />
    <meta property="og:image:url"content="{{config('app.url')}}/images/learners/logo.svg" />
    <meta property="og:image:size"content="300" />

    <meta name="twitter:card"content="summary" />
    <meta name="twitter:title"content="Learn Anything Artistic Online | Start For Free Today | LILA" />
    <meta name="twitter:site"content="@lilaaliens" />
    
    <script type="application/ld+json">{"@context":"https://schema.org","@type":"WebPage","name":"Learn Anything Artistic Online | Start For Free Today | LILA"}</script>

    <script>
      (function(h,e,a,t,m,p) {
      m=e.createElement(a);m.async=!0;m.src=t;
      p=e.getElementsByTagName(a)[0];p.parentNode.insertBefore(m,p);
      })(window,document,'script','https://u.heatmap.it/log.js');
    </script>
@endsection

@section('content')

@if(session('success'))
  <div class="la-btn__alert position-relative">
    <div class="la-btn__alert-success col-lg-4 offset-lg-4  alert alert-success alert-dismissible fade show" role="alert">
        <span class="la-btn__alert-msg">{{session('success')}}</span>
        <button type="button" class="close la-btn__alert-close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true" style="color:#56188C">&times;</span>
        </button>
    </div>
  </div>
@endif


<!-- Section: Start-->
<section class="la-section la-section--hero clearfix p-0 position-relative">
    <div class="la-section__inner">
      <div class="jumbotron jumbotron-fluid p-0 m-0">
        <div class="la-hero__top row la-anim__wrap">
          <!-- Column: Start-->
          <div class="col-12 position-relative my-auto">
            @if($firstSection->video_url == null)

            <div class="la-hero__img position-relative d-flex align-items-center la-anim__fade-in-right">
              <h2 class="la-section__title la-section__title--big">
                <span class="la-anim__text-move--content">{{$firstSection->image_text}}</span>
              </h2>
              <img class="img-fluid la-hero__img-bg" src="{{$firstSection->image}}" alt="{{$firstSection->image_text}}">
            </div> 

            @else

            <!-- Video Section: Start -->
            <div class="la-hero__video-main position-relative la-anim__stagger-item--x">
              <div class="la-hero__video">
                <video autoplay playsinline muted loop id="home_video">
                  <source src='{{$firstSection->video_url}}'  type='video/mp4' />
                </video>
              </div>
            </div>
            <!-- Video Section: End -->

            @endif

            <!-- Video Content Section: Start -->
            <div class="container-fluid la-hero la-hero__video-content d-flex justify-content-center flex-column align-items-center">
              <div class="la-hero__video-info text-center text-md-left">
                <p class="la-hero__tag mb-2 mb-md-0 d-none d-md-block la-anim__stagger-item">Ace the learning curve with Courses & Classes by</p>
                <p class="la-hero__tag mb-2 mb-md-0 d-block d-md-none la-anim__stagger-item">Courses & Classes by</p>
                <h1 class="la-hero__title la-anim__stagger-item mb-5">World’s finest <span class="la-hero__subtitle">Artists</span></h1>
                <p class="la-hero__lead la-anim__stagger-item">{{$firstSection->sub_heading}}</p>
              
                <div class="d-md-flex align-items-center">
                  <div class="la-hero__actions la-anim__stagger-item mt-6 mt-md-10">
                    @if(Auth::check() && Auth::User()->subscription() && Auth::User()->subscription()->active())
											<div class="">
												<a href="/browse/courses" class="btn btn-primary la-hero__cta la-btn la-btn--primary active text-white px-md-4">Start Learning</a>
											</div>

                    @else
												<div class="">
														<a href="/learning-plans" class="btn btn-primary la-hero__cta la-btn la-btn--primary active text-white px-md-4" style="letter-spacing:1.5px">
															Subscribe for
															<span class="la-soffer__bestprice la-home__bestprice" style="color:var(--white)"> 
																@if (getLocation() == 'IN')
																	<sup>₹</sup>2999/<span class="text-xxs">Month</span>
																@else
																	<sup>$</sup>39/<span class="text-xxs">Month</span>
																@endif
														</span>
														</a>
												</div>
												
												<div class="la-soffer mt-2 d-inline-flex justify-content-center flex-column align-items-md-center">
														{{-- <div class="la-soffer__bestprice" style="color:var(--white)"> 
															@if (getLocation() == 'IN')
																<sup>₹</sup> 2999 / Month
															@else
																<sup>$</sup> 39 / Month
															@endif
														</div> --}}

														@if (getLocation() == 'IN')
															<div class="la-soffer__realprice la-home__realprice" style="color:var(--white)"> <sup>₹</sup> 5999 (INR)</div>
														@else
															<div class="la-soffer__realprice la-home__realprice" style="color:var(--white)"> <sup>$</sup> 99 (USD)</div>
														@endif
												</div>
											@endif
                  </div>
                
                  <div class="la-hero__bottom-trial mt-6 mt-md-2 ml-md-6 la-anim__stagger-item ">@if(Auth::check() && Auth::User()->subscription() && Auth::User()->subscription()->active())  @else<a href="/learning-plans" class="btn btn-primary la-btn la-btn--primary bg-transparent text-white px-md-4" style="letter-spacing:1.8px">Start free trial</a> @endif </div>
                </div>
              </div>
               
              <div class="la-hero__btn--scroll-down la-anim__stagger-item">
                <div class="la-hero__bottom-browse la-btn__arrow la-btn__arrow-down text-white text-uppercase text--md font-weight--medium text-spacing d-none d-lg-block">
                  <a href="#home_courses" id="home_courses_redirect">BROWSE COURSES
                    <span class="la-btn__arrow-icon arrow-down la-icon la-icon--7xl icon-grey-arrow"> </span>
                  </a>
                </div>
              </div>
            </div>
             <!-- Video Content Section: End -->
          </div>
          <!-- Column: End -->
        </div>

          <!-- Column: Start-->
         {{-- <div class="col-12 col-lg-5 la-anim__item la-anim__item--left my-auto">
            <div class="la-hero pt-6 pt-lg-2 la-anim__stagger">
              <p class="la-hero__tag mb-2 mb-md-0 la-anim__stagger-item">Ace the learning curve with Courses & Classes by</p>
              <h1 class="la-hero__title la-anim__stagger-item">World’s finest <span class="la-hero__subtitle">Tattooists</span></h1>
              <p class="la-hero__lead la-anim__stagger-item">{{$firstSection->sub_heading}}</p>

              <div class="d-none d-lg-block">
                <div class="la-hero__actions d-md-flex align-items-center la-anim__stagger-item">
                  @if(Auth::check() && Auth::User()->subscription() && Auth::User()->subscription()->active())

                    <div class="col-md-7 px-0">
                      <a href="/browse/course" class="btn btn-primary la-hero__cta la-btn la-btn--primary">Start Learning</a>
                    </div>

                  @else

                  <div class="col-md-7 px-0">
                      <a href="/learning-plans" class="btn btn-primary la-hero__cta la-btn la-btn--primary">Subscribe Now</a>
                      <p class="m-0 pt-1 pl-1 text-sm text-center text-md-left">Instant access to all courses <!-- at nominal monthly fees --></p>
                  </div>
                  
                    <div class="col-md-5 px-0 la-soffer d-flex d-lg-block justify-content-center  mb-lg-auto">
                      <div class="la-soffer__bestprice"> 
                        @if (getLocation() == 'IN')
                          <sup>₹</sup> 2999 / Month
                        @else
                          <sup>$</sup> 39 / Month
                        @endif
                      </div>
                      @if (getLocation() == 'IN')
                        <div class="la-soffer__realprice"> <sup>₹</sup> 5999 (INR)</div>
                      @else
                        <div class="la-soffer__realprice"> <sup>$</sup> 99 (USD)</div>
                      @endif
                    </div>
                  @endif
                </div>
              </div>
             
            </div>
          </div>
          <!-- Column: End-->
          
          <!-- Column: Start-->
          <div class="col-12 col-lg-6 offset-lg-1 la-anim__item la-anim__item--right">

            @if($firstSection->video_url == null)

            <div class="la-hero__img position-relative d-flex align-items-center la-anim__fade-in-right">
              <h2 class="la-section__title la-section__title--big">
                <span class="la-anim__text-move--content">{{$firstSection->image_text}}</span>
              </h2>
              <img class="img-fluid" src="{{$firstSection->image}}" alt="{{$firstSection->image_text}}">
            </div> 

            @else
            <!-- Video Section: Start -->
            <div class="la-hero__video-main position-relative la-anim__stagger-item--x la-anim__C" >
              <div class="la-hero__video" style="mask-image:url('../../images/learners/home/home-mask.png'); -webkit-mask-image:url('../../images/learners/home/home-mask.png');">
                  <video autoplay='' playsinline muted='muted' loop='loop' id="home_video">
                      <source src='{{$firstSection->video_url}}'  type='video/mp4' />
                  </video>
              </div>
            </div>
             <!-- Video Section: End -->
            @endif

            <div class="d-block d-lg-none">
              @if(Auth::check() && Auth::User()->subscription() && Auth::User()->subscription()->active())

                <div class="col-md-6 px-0">
                  <a href="/browse/course" class="btn btn-primary la-hero__cta la-btn la-btn--primary btn-block">Browse Course</a>
                </div>  

              @else

                <div class="la-hero__actions pb-8 pb-md-10 d-md-flex align-items-start  la-anim__stagger-item la-anim__C">
                  <div class="col-md-6 px-0">
                        <a href="/learning-plans" class="btn btn-primary la-hero__cta la-btn la-btn--primary btn-block">Subscribe Now</a>
                        <p class="m-0 pt-2 pl-1 text-sm text-center text-md-left">Instant access to all courses <!-- at nominal monthly fees --></p>
                  </div>
                  <div class="col-md-6 px-0 pt-4 la-soffer d-flex justify-content-center mx-0">
                    @if (getLocation() == 'IN')
                      <div class="la-soffer__bestprice"> <sup><small>₹</small></sup>  2999 / Month</div>
                      <div class="la-soffer__realprice"> <sup><small>₹</small></sup>  5999 (INR)</div>
                    @else
                      <div class="la-soffer__bestprice"> <sup><small>$</small></sup>  39 / Month</div>
                      <div class="la-soffer__realprice"> <sup><small>$</small></sup>  99 (USD)</div>
                    @endif
                  </div>
                </div>

              @endif
            </div> 
          </div> 
          <!-- Column: End-->
        

        <!-- Row: Start-->
        <div class="la-anim__wrap">
          <div class="la-hero__bottom d-flex justify-content-center justify-content-lg-between align-items-center pt-4 pb-14 la-anim__fade-in-bottom la-anim__D">
            <div class="la-hero__bottom-trial la-btn__arrow text--green text-uppercase text--md font-weight--medium text-spacing">@if(Auth::check() && Auth::User()->subscription() && Auth::User()->subscription()->active())  @else<a href="/learning-plans">Start free trial<span class="la-btn__arrow-icon la-icon la-icon--7xl icon-grey-arrow"></span></a> @endif </div>
            <div class="la-hero__bottom-browse la-btn__arrow la-btn__arrow-down text--burple text-uppercase text--md font-weight--medium text-spacing d-none d-lg-block"><a href="#home_courses">BROWSE COURSES</a><span class="la-btn__arrow-icon arrow-down la-icon la-icon--7xl icon-grey-arrow"> </span></div>
          </div>
        </div>
        <!-- Row: End-->
        --}}
      </div>
    </div>
  </section>
  <!-- Section: End-->

  <!-- Section: Start-->
  <section class="la-section la-section--grey la-section--art-categories position-relative"  id="home_courses">
    <div class="la-section__inner la-anim__wrap la-section--courses-inwrap" >
      <div class="container-fluid la-home__course-fluid position-relative" id="home_fluid_container">
        <div class="la-courses">
          <h3 class="la-home__course-mtitle ml-n3 ml-md-0 text-center mb-3 mb-md-10 la-anim__stagger-item">Learn what you love!</h3>
          <h2 class="la-courses__nav-content--title la-anim__stagger-item mb-3 mb-md-6 text-center">Featured Classes</h2>

          <nav class="la-courses__nav mb-3 mb-md-3 d-inline-flex justify-content-start justify-content-md-center position-relative">
              <ul class="nav nav-pills la-courses__nav-tabs justify-content-center" id="nav-tab" role="tablist" tabindex="0">
              
                @if(!$filtres_applied)
                  {{-- <li class="nav-item la-courses__nav-item"><a class="nav-link la-courses__nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"> <span class="position-relative">Tattoo</span></a></li>
                  <li class="nav-item la-courses__nav-item"><a class="nav-link la-courses__nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"> <span class="position-relative">Rangoli</span></a></li>
                  <li class="nav-item la-courses__nav-item"><a class="nav-link la-courses__nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false"> <span class="position-relative">Design</span></a></li> --}}
                  @foreach ($categories as $category)
                    <!-- <div class="d-none d-md-block la-courses__nav-prev la-anim__fade-in-left"><span class="la-courses__nav-prev--icon la-icon icon-arrow"></span></div> -->
                    <li class="nav-item la-courses__nav-item la-anim__stagger-item--x"><a class="nav-link la-courses__nav-link @if ($loop->first) active @endif " id="nav-{{$category->slug}}-tab" data-toggle="tab" href="#nav-{{$category->slug}}" role="tab" aria-controls="nav-{{$category->slug}}" aria-selected="true"> <span class="position-relative text-nowrap">{{ $category->title}}</span></a></li>
                    <!-- <div class="d-none d-md-block  la-courses__nav-next la-anim__fade-in-right"><span class="la-courses__nav-next--icon la-icon icon-right-arrow2"></span></div> -->
                  @endforeach
                @endif
                
              </ul>
          </nav>
          <!-- <nav class="la-courses__nav position-relative d-flex justify-content-between align-items-start">
            
              <ul class="nav nav-pills la-courses__nav-tabs" id="nav-tab" role="tablist" tabindex="0">
              {{-- <div class="d-none d-md-block la-courses__nav-prev la-anim__fade-in-left"><span class="la-courses__nav-prev--icon la-icon icon-arrow"></span></div> --}}
              @if($filtres_applied == null)
                @foreach ($categories as $category)
                  <li class="nav-item la-courses__nav-item la-anim__stagger-item--x">
                    <a class="nav-link la-courses__nav-link @if ($loop->first) active @endif " id="nav-{{$category->slug}}-tab" data-toggle="tab" href="#nav-{{$category->slug}}" role="tab" aria-controls="nav-{{$category->slug}}" aria-selected="true"> 
                      <span class="position-relative text-nowrap">{{ $category->title}}</span>
                    </a>
                  </li>
                @endforeach
                {{-- <li class="nav-item la-courses__nav-item"><a class="nav-link la-courses__nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"> <span class="position-relative">Rangoli</span></a></li>
                <li class="nav-item la-courses__nav-item"><a class="nav-link la-courses__nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false"> <span class="position-relative">Design</span></a></li> --}}
                @endif

                {{--<div class="d-none d-md-block la-courses__nav-next la-anim__stagger-item--x"><span class="la-courses__nav-next--icon la-icon icon-right-arrow2"></span></div>--}}
              </ul>
          </nav> -->

         
              <x-add-to-playlist 
                   :playlists="$playlists"
              />
                {{-- Categories Tab :Start --}}
                 @if(!$filtres_applied)
                  <div class="tab-content la-courses__nav-content position-relative pt-0 " id="nav-tabContent">
                    @foreach ($categories as $category)
                      <div class="position-relative tab-pane fade show @if ($loop->first) active @endif" id="nav-{{$category->slug}}" role="tabpanel" aria-labelledby="nav-{{$category->slug}}-tab">
                        
                        <!-- Featured Classes Section -->
                        <div class="la-courses__nav-content--classes la-anim__wrap">
                          
                          <div class="swiper-container la-home__course-container2">
                            <div class="swiper-wrapper la-home__course-wrapper2">
                                                                                            
                                      @php
                                        $courses = $category->courses->where('featured', 1);
                                      @endphp

                                      @foreach($courses as $course)
                                                                               
                                        <div class="swiper-slide la-home__course-slide2 pt-md-6 la-anim__stagger-item" >
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
                                            :progress="$course->getProgress()"
                                          />
                                        </div>
                                      @endforeach                                  
                                    
                            </div>

                            @if(count($courses) == 0)
                            <div class="container">
                              <div class="row">
                                <div class="col-12  my-3 my-md-8 la-empty__courses d-md-flex justify-content-center align-items-start la-anim__wrap">
                                  <div class="la-empty__inner text-center mb-0">
                                      <h6 class="la-empty__course-title la-anim__stagger-item">No Courses available currently.</h6>
                                  </div>
                                </div>
                              </div>
                            </div>
                            @endif

                            @if(count($courses) != 0)
                            <div class=" mt-10 w-100 text-center d-md-flex justify-content-between align-items-start">

                              <div class="la-slider__navigations2 la-home__course-navigations d-md-flex  align-items-center">
                                <!-- <div class="swiper-button-prev la-slider__navigations-arrow la-home__course-prev"></div> -->
                                <div class="swiper-pagination la-slider__navigations-dots2 la-home__course-paginations2 la-slider__paginations2  la-slider__paginations--purble la-right"></div>
                                <!-- <div class="swiper-button-next la-slider__navigations-arrow la-home__course-next"></div> -->
                              </div>
                              <div class=" position-relative text-center text-md-right la-anim__wrap pb-2">
                                <div class=" la-btn__arrow text--burple text-uppercase text-spacing font-weight--bold mr-1 mr-md-7 la-anim__fade-in-right la-anim--B">
                                  <a href="/browse/classes" >explore more <span class="la-btn__arrow-icon la-icon la-icon--7xl icon-grey-arrow"></span></a>
                                </div>
                              </div>
                            </div> 
                            @endif



                          </div>              
                        </div>

                        <!-- Featured Courses Section -->
                        <div class="la-courses__nav-content--classes pt-8 la-anim__wrap">
                          <h2 class="la-courses__nav-content--title la-anim__stagger-item text-center">Featured Courses</h2>
                          <div class="swiper-container la-home__course-container">
                            <div class="swiper-wrapper la-home__course-wrapper ">
                                                                                            
                                      @php
                                        $courses = $bundleCoures->where('category_id',$category->id)->where('featured', 1);          
                                      @endphp

                                      @foreach($courses as $course)
                                                                               
                                        <div class="swiper-slide la-home__course-slide pt-md-6 la-anim__stagger-item" >
                                          <x-bundle-course 
                                              :id="$course->id"
                                              :img="$course->preview_image"
                                              :course="$course->title"
                                              :url="$course->slug"
                                              :rating="round($course->average_rating, 2)"
                                              :videoCount="$course->videoCount()"
                                              :classesCount="count($course->course_id)"
                                              :creatorImg="$course->users()"
                                              :creatorName="$course->users()->first()->fname"
                                              :creatorUrl="$course->user->id"
                                              :learnerCount="$course->learnerCount"
                                              :price="$course->price"
                                              :bought="$course->isPurchased()"
                                              :checkWishList="$course->checkWishList"
                                              :checkCart="$course->checkCart"
                                              :progress="$course->progress"
                                          />
                                        </div>
                                        
                                      @endforeach                                  
                                    
                            </div>

                            @if(count($courses) == 0)
                            <div class="container">
                              <div class="row">
                                <div class="col-12  my-3 my-md-8 la-empty__courses d-md-flex justify-content-center align-items-start la-anim__wrap">
                                  <div class="la-empty__inner text-center mb-0">
                                      <h6 class="la-empty__course-title la-anim__stagger-item">No Courses available currently.</h6>
                                  </div>
                                </div>
                              </div>
                            </div>
                            @endif

                            @if(count($courses) != 0)
                            <div class="mt-10 w-100 text-center d-md-flex justify-content-between align-items-start">

                              <div class="la-slider__navigations la-home__course-navigations d-md-flex  align-items-center">
                                <!-- <div class="swiper-button-prev la-slider__navigations-arrow la-home__course-prev"></div> -->
                                <div class="swiper-pagination la-slider__navigations-dots la-home__course-paginations la-slider__paginations la-slider__paginations--purble la-right"></div>
                                <!-- <div class="swiper-button-next la-slider__navigations-arrow la-home__course-next"></div> -->
                              </div>
                              <div class=" position-relative text-center text-md-right la-anim__wrap pb-2">
                                <div class=" la-btn__arrow text--burple text-uppercase text-spacing font-weight--bold mr-1 mr-md-7 la-anim__fade-in-right la-anim--B">
                                  <a href="/browse/courses" >explore more <span class="la-btn__arrow-icon la-icon la-icon--7xl icon-grey-arrow"></span></a>
                                </div>
                              </div>
                            </div> 
                            @endif
                          </div> 
                        </div>

                      </div>
                    @endforeach

                    
                
                        {{-- Categories Tab : END --}}
                  </div>

                @endif
          </div>
        </div>
      </div>
  </section>
  <!-- Section: End-->

  <!-- Section: Start-->
  <section class="la-section--artists position-relative la-anim__wrap">
    <div class="la-section__inner position-relative">
      <span class="la-section__circle"></span>
      <h2 class="d-block d-md-none la-anim__fade-in-top text-center la-section__title la-section__title--big position-relative" style="z-index:4;">Lila Mentors</h2>
      <div class="swiper-container gallery-top la-artist__slider container-fluid">
        
        <div class="swiper-wrapper">
          <div class="d-none d-md-block">
            <div class="la-artist__designation la-artist__designation--front position-absolute w-50 pt-10 my-auto d-flex align-items-center justify-content-left la-anim__fade-in-top la-anim__A">
                <h2 class="la-artist__designation-title mb-0  d-flex flex-row justify-content-center align-items-center">
                    <span style="opacity:0.25">Lila</span> 
                </h2>
            </div>

            <div class="la-artist__designation position-absolute w-100 pt-10 my-auto d-flex align-items-center justify-content-center la-anim__fade-in-top la-anim__A">
                <h2 class="la-artist__designation-title mb-0  d-flex flex-row justify-content-center align-items-center">
                    <span class="ml-6" style="color: var(--gray);"> Mentors </span>
                </h2>
            </div>
          </div>
            @foreach ($featuredMentor as $feat)
                <x-artist 
                  :artistName="ucfirst($feat->user->fullName)"
                  :artistImage="$feat->user_image"
                  :artistCategory="$feat->courses->category->title"
                  :artistCampany="$feat->courses->title"
                  :course="$feat->courses"
                  :artistId="$feat->user->id"
                />
            @endforeach
        </div>
      </div>

      <div class="swiper-container gallery-thumbs la-artist__thumbnails-wrap la-anim__fade-in-right">
        <div class="swiper-wrapper la-artist__thumbnails">

          @foreach($featuredMentor as $feat)
            <div class="swiper-slide la-artist__thumbnail"><img src="{{ $feat->user_thumbnail }}" alt=""></div>
          @endforeach
        
        </div>
      </div>

    </div>
  </section>
  <!-- Section: End-->

  <!-- Section: Start-->
  <section class="la-section la-section--dark la-section--classes position-relative la-anim__wrap">
    <div class="la-section__inner">
      <div class="la-home__master-fluid">
        <div class="la-anim__fade-in-top la-anim__A">
          <h2 class="la-section--classes-title text-center la-section__title la-section__title--big  position-relative ">Master <span>classes</span></h2>
        </div> 

        <div class="la-mccourses pt-20 pt-md-6">
            <div class="swiper-container la-home__master-container">
              <div class="swiper-wrapper la-home__master-wrapper">

                @foreach ($master_classes as $master)
                  @if($master->courses != null)
                    <div class="swiper-slide  la-home__master-slide">
                      <x-master-class
                        :img="$master->courses->preview_image"
                        :title="$master->courses->title"
                        :url="$master->courses->slug"
                        :profileImg="$master->courses->user->user_img"
                        :profileName="$master->courses->user->fullName"
                        :learners="$master->courses->learnerCount"
                        :id="$master->courses->id"
                        :slug="$master->courses->slug"
                        :price="$master->courses->price"
                        :bought="$master->courses->isPurchased()"
                        :checkWishList="$master->courses->checkWishList"
                        :checkCart="$master->courses->checkCart"
                      />
                    </div>
                  @endif
                @endforeach
              </div>
            </div>
            <div class="container-fluid  w-100 text-center d-md-flex justify-content-between align-items-start mt-6 mt-md-16 la-anim__stagger-item">
              <div class="la-slider__navigations la-home__course-navigations d-md-flex align-items-center">
                <!-- <div class="swiper-button-prev la-slider__navigations-arrow la-home__master-prev"></div> -->
                <div class="swiper-pagination la-slider__navigations-dots la-home__master-pagination la-slider__paginations la-slider__paginations--purble la-right"></div>
                <!-- <div class="swiper-button-next la-slider__navigations-arrow la-home__master-next"></div> -->
              </div>
              <div class="la-mccourse__view-more position-relative text-center text-md-right ">
                <div class=" la-btn__arrow text-white text-uppercase text-spacing font-weight--bold mr-1 mr-md-1">
                  <a href="/master-classes" >explore more <span class="la-btn__arrow-icon la-icon la-icon--7xl icon-grey-arrow"></span></a>
                </div>
              </div>
            </div>

        </div>

      </div>
    </div>
  </section>
  <!-- Section: End-->

  <!-- Section: Start -->
  <div class="la-section  la-section--purple la-home__section-customize position-relative la-anim__wrap">
    <div class="la-section__inner position-relative">
      <span class="la-section__circle la-section__circle--right la-section__circle-learn d-none d-md-block"></span>
        <div class="container-fluid la-home__customize-fluid">
            <div class="row">
                <div class="col-lg-4 my-auto h-100">
                    <div class="la-home__customize position-relative">
                        <h3 class="la-home__customize-title leading-none position-relative la-anim__stagger-item">Customized Learning with you in mind!</h3>
                        <p class="la-home__customize-para mb-0 la-anim__stagger-item">A learning platform just for you. An approach that aims to customize learning for each student's strengths, needs, skills, and interests.</p>
                        
                        <div class="la-btn__arrow la-btn__text--yellow text-uppercase text-spacing font-weight--bold mr-5 mr-md-1 la-anim__stagger-item--x">
                          <a @if(Auth::check()) href="/user-dashboard" @else data-toggle="modal" data-target="#locked_login_modal" @endif >explore more <span class="la-btn__arrow-icon la-icon la-icon--7xl icon-grey-arrow"></span></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7 position-relative la-home__customize-sliders  w-100  la-anim__stagger-item">
                 
                    <div class="la-home__customize-right position-relative mx-auto" style="background:url('../../images/learners/home/clslider.svg') no-repeat center;">
                        <div id="la-home-customize-laptop" class="swiper-container la-home__customize-container la-home__customize-container--desktop position-relative" >
                            <div class="swiper-wrapper la-home__customize-wrapper la-home__customize-wrapper--desktop">
                                <div class="swiper-slide la-home__customize-slide la-home__customize-slide--desktop" data-swiper-autoplay="1500" href="#clm_dashboard">
                                    <div class="la-home__customize-info--desktop">
                                        <img src="./images/learners/home/clap1.jpg" alt="Personalised dashboard" class="img-fluid mx-auto d-block la-home__customize-img">
                                      </div>
                                </div>

                                <div class="swiper-slide la-home__customize-slide la-home__customize-slide--desktop" data-swiper-autoplay="1500" href="#clm_course">
                                    <div class="la-home__customize-info--desktop">
                                        <img src="./images/learners/home/clap2.jpg" alt="Unique tattoo styles" class="img-fluid mx-auto d-block la-home__customize-img">
                                    </div>
                                </div>

                                <div class="swiper-slide la-home__customize-slide la-home__customize-slide--desktop" data-swiper-autoplay="1500" href="#clm_playlist">
                                    <div class="la-home__customize-info--desktop">
                                        <img src="./images/learners/home/clap3.jpg" alt="Personal Playlist" class="img-fluid mx-auto d-block la-home__customize-img">
                                      </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Mobile Slider -->
                    <div class="la-home__customize-mobile--section la-anim__stagger-item--x">
                      <div class="la-home__customize-right--mobile" style="background:url('../../images/learners/home/cmslider.svg') no-repeat center;">
                          <div id="la-home-customize-mobile" class="swiper-container la-home__customize-container la-home__customize-container--mobile position-relative" >
                              <div class="swiper-wrapper la-home__customize-wrapper la-home__customize-wrapper--mobile">
                                  <div class="swiper-slide la-home__customize-slide la-home__customize-slide--mobile" data-swiper-autoplay="1500" href="#clm_dashboard">
                                      <div class="la-home__customize-info--mobile">
                                          <img src="./images/learners/home/cmob1.jpg" alt="Personalised dashboard" class="img-fluid mx-auto d-block la-home__customize-img">
                                        </div>
                                  </div>

                                  <div class="swiper-slide la-home__customize-slide la-home__customize-slide--mobile" data-swiper-autoplay="1500" href="#clm_course">
                                      <div class="la-home__customize-info--mobile">
                                          <img src="./images/learners/home/cmob2.jpg" alt="Unique tattoo styles" class="img-fluid mx-auto d-block la-home__customize-img">
                                      </div>
                                  </div>

                                  <div class="swiper-slide la-home__customize-slide la-home__customize-slide--mobile" data-swiper-autoplay="1500" href="#clm_playlist">
                                      <div class="la-home__customize-info--mobile">
                                          <img src="./images/learners/home/cmob3.jpg" alt="Personal Playlist" class="img-fluid mx-auto d-block la-home__customize-img">
                                        </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                    </div>
                  
                </div>

              
                <div class="col-lg-8 offset-lg-4 la-anim__stagger-item la-home__customize-container--content-wrap">
                  <div id="la-home-customize-content" class="swiper-container la-home__customize-container la-home__customize-container--content pl-md-3">
                      <div class="swiper-wrapper la-home__customize-wrapper">
                          <div class="swiper-slide la-home__customize-slide col-md-8 px-0" data-swiper-autoplay="1500">
                              <div class="la-home__customize-desc" id="clm_dashboard">
                                  <div class="la-home__customize-infotitle leading-tight mt-8">Personalised dashboard for focused learning</div>
                                  <p class="la-home__customize-infopara">Courses based on your interests, favourite mentors, on one easy learning platform</p>
                              </div>
                          </div>

                          <div class="swiper-slide la-home__customize-slide col-md-8 px-0" data-swiper-autoplay="1500">
                              <div class="la-home__customize-desc" id="clm_course">
                                  <div class="la-home__customize-infotitle leading-tight mt-8">Unique tattoo styles from around of the world</div>
                                  <p class="la-home__customize-infopara">Learn unique styles created by incredible artists from across the world</p>
                              </div>
                          </div>

                          <div class="swiper-slide la-home__customize-slide col-md-8 px-0" data-swiper-autoplay="1500">
                              <div class="la-home__customize-desc" id="clm_playlist">
                                  <div class="la-home__customize-infotitle leading-tight mt-8">Personal Playlist to help you organise</div>
                                  <p class="la-home__customize-infopara">Create playlist to save all the courses you want to learn in a personal space and learn whenever, wherever yo want!</p>
                              </div>
                          </div>
                      </div>
                  </div> 
      
                  <!--<div class="d-inline-flex justify-content-start align-items-center">
                    <div class="swiper-pagination  la-home__pagination-top " id="slideshow"></div>
                  </div>-->

                  <div class="la-slider__navigations  la-home__course-navigations d-flex justify-content-end align-items-start">
                    <div class="swiper-pagination la-slider__navigations-dots la-home__customize-pagination la-slider__paginations la-slider__paginations--purble la-right"></div>
                  </div>
                </div> 
            </div>
        </div>
    </div>
  </div>
  <!-- Section: End -->

  <!-- Section: Start -->
  <!-- <div class="la-section  la-home__section-learn position-relative la-anim__wrap">
      <div class="la-section__inner position-relative">
        <span class="la-section__circle la-section__circle-learn d-none d-md-block"></span>
          <div class="container-fluid">
              <div class="row">
                  <div class="col-lg-2">
                      <div class="la-home__learn position-relative">
                          <h3 class="la-home__learn-title leading-none mb-4 la-anim__stagger-item">How do you learn?</h3>
                         
                          <div class=" la-btn__arrow text--burple text-uppercase text-spacing font-weight--bold pt-md-8 mr-5 mr-md-1 la-anim__stagger-item--x">
                            <a href="/browse/courses" >Get Started</a><span class="la-btn__arrow-icon la-icon la-icon--7xl icon-grey-arrow"></span>
                          </div>
                      </div>
                  </div>

                  <div class="col-lg-10">
                      <div class="la-home__learn-info position-relative la-anim__stagger-item--x">
                            <img src="./images/learners/home/learn.png" alt="How do you Learn?" class="img-fluid mx-auto d-block la-home__learn-img">
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div> -->
  <!-- Section: End -->
  
  <!-- Section: Start-->
  <!-- <section class="la-section la-section--trail position-relative la-section--grey  la-anim__wrap">
    <div class="la-section__inner">
      <span class="la-section__circle la-section__circle--right"></span>
      <div class="container-fluid">
       
        <div class="row">
          <div class="col-12 col-md-5 la-trail__left  position-relative">
            <div class="la-trail__img-wrap la-anim__fade-in-right la-anim__B">
              <div class="la-trail__img position-relative">
                <img class="w-100" src="./images/learners/home/observe.png" alt="observe">
              </div>
            </div>
          </div>

          <div class="col-12 col-md-7 pl-md-0 mt-auto position-relative">
            <div class="la-trail__title-main">
              <div class="swiper-container la-trail__title-container ">
                <div class="swiper-wrapper la-trail__title-wrapper">
                  <div class="swiper-slide la-trail__title-slide">
                      <div class="la-trail__title text-left la-trail__title--black la-section__title la-section__title--big">Observe.</div>
                  </div>
                  <div class="swiper-slide la-trail__title-slide">
                      <div class="la-trail__title text-left la-trail__title--black la-section__title la-section__title--big">Learn.</div>
                  </div>
                  <div class="swiper-slide la-trail__title-slide">
                      <div class="la-trail__title text-left la-trail__title--black la-section__title la-section__title--big">Practice.</div>
                  </div>
                  <div class="swiper-slide la-trail__title-slide">
                      <div class="la-trail__title text-left la-trail__title--black la-section__title la-section__title--big">Repeat.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="la-trail__right position-relative d-flex align-items-end">
              <div class="la-trail__content-wrap la-anim__stagger">
                <div class="la-home__trail-btn la-btn__plain d-flex justify-content-start align-items-start la-anim__fade-in-left">
                  <div class="la-btn__arrow text--burple text-uppercase text-spacing font-weight--bold la-anim__fade-in-right" style="transform: translate(0px, 0px); opacity: 1;">
                      <a href="/about">ALIENS WAY OF TEACHING <span class="la-btn__arrow-icon la-icon la-icon--7xl icon-grey-arrow"></span></a>
                  </div>
                </div>

                <div class="la-trail__para la-anim__stagger-item la-anim__B">We strongly believe observation is integral to honing art. Learn from artists who have created their niche in the world of tattooing with consistent practice, and become the master of your niche!</div>
                @if(Auth::check())
                  @if(Auth::user()->subscription() )
                    <a class="btn btn-primary la-btn  mt-md-10 la-anim__stagger-item" href="/browse/course/">Browse Course</a>
                  @else
                    <a class="btn btn-primary la-btn  mt-md-6 la-anim__stagger-item" href="/login">Start free trial</a>
                  @endif
                @else
                  <a class="btn btn-primary la-btn  mt-md-6 la-anim__stagger-item" href="/login">Start free trial</a>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> -->
  <!-- Section: End-->

  <!-- Section: Start-->
  <section class="la-section__small la-section--price la-section--grey  la-anim__wrap la-anim__wrap-pin">
    <div class="la-section__inner ">
      <div class="container-fluid">
        <div class="la-price__container">

          <div class="col-12 px-0 mt-auto position-relative la-anim__wrap-pin">
            <div class="la-trail__title-main la-anim__pin">
              <div class="swiper-container la-trail__title-container ">
                <div class="swiper-wrapper la-trail__title-wrapper">
                  <div class="swiper-slide la-trail__title-slide">
                      <div class="la-trail__title text-left la-trail__title--purple la-section__title la-section__title--big">Observe</div>
                  </div>
                  <div class="swiper-slide la-trail__title-slide">
                      <div class="la-trail__title text-left la-trail__title--purple la-section__title la-section__title--big">Learn</div>
                  </div>
                  <div class="swiper-slide la-trail__title-slide">
                      <div class="la-trail__title text-left la-trail__title--purple la-section__title la-section__title--big">Practice</div>
                  </div>
                  <div class="swiper-slide la-trail__title-slide">
                      <div class="la-trail__title text-left la-trail__title--purple la-section__title la-section__title--big">Repeat</div>
                  </div>
                </div>
              </div>

              <h2 class="la-section__title la-section__title--big leading-none la-price__container-title text-left"> 
                  <!-- <span style="color: var(--gray2);" class="la-anim__fade-in-top">Learn it</span><br> -->
                  <span style="font-weight:var(--font-extrabold)">it like aliens</span>
              </h2>
            </div>
          </div>

         
          <div class="la-price__slider la-anim__slider">
              <div class="la-price__slide la-anim__slide mt-16 mb-6 mb-md-16">
                <div class="la-price__row row ">
                
                  <div class="col-lg-5 la-anim__wrap">
                    <div class="la-home__subscription-main ">
                      <div class="la-home__subscription-ques la-home__subscription__ques--first">
                        <h3 class="la-section__subtitle la-home__subscription-title la-anim__stagger-item">LILA's way of teaching</h3>
                        <p class="la-section__text text-lg text-md-xl la-anim__stagger-item--x ">We strongly believe observation is integral to honing art. Learn from artists who have created their niche in the world of tattooing with consistent practice, and become the master of your niche!</p>
                        <div class="la-btn__arrow text--burple text-uppercase text-spacing font-weight--bold pt-4 pt-md-8 la-anim__stagger-item--x">
                          <a href="/about">learn more<span class="la-icon la-icon--7xl icon-grey-arrow la-btn__arrow-icon"></span></a>
                        </div>
                      </div>

                      <div class="la-home__subscription-ques la-home__subscription__ques--second">
                        <h3 class="la-section__subtitle--medium la-anim__stagger-item">How does subscription works?</h3>
                        <p class="la-section__text text-lg text-md-xl la-anim__stagger-item--x ">Learning need not be expensive. At LILA, our subscription model gives you the benefit to choose from any number of courses or individual classes, as you please.</p>
                        <p class="la-section__text text-lg text-md-xl la-anim__stagger-item--x ">  All at nominal fees! So, learn away! </p>
                        <div class="la-btn__arrow text--burple text-uppercase text-spacing font-weight--bold pt-4 pt-md-8 la-anim__stagger-item--x">
                          <a href="/learning-plans">learn more<span class="la-icon la-icon--7xl icon-grey-arrow la-btn__arrow-icon"></span></a>
                        </div>
                      </div>

                      <div class="la-home__subscription-ques la-home__subscription__ques--third la-anim__wrap">
                        <h3 class="la-section__subtitle--medium la-anim__stagger-item">What’s LILA for you ?</h3>
                        <p class="la-section__text text-lg text-md-xl la-anim__stagger-item--x">Our mission is to Encourage, Empower and Embrace self-learning among all curious individuals who wish to learn, expand their potential and make a mark in the world.</p>
                        <p class="la-section__text text-lg text-md-xl la-anim__stagger-item--x">   Through our Radical team, we strive every day to make knowledge Affordable, Accessible for everyone regardless of who or where they are</p>
                        <div class="la-btn__arrow text--burple text-uppercase text-spacing font-weight--bold  pt-4 pt-md-8  la-anim__stagger-item--x">
                          <a href="/about">learn more<span class="la-icon la-icon--7xl icon-grey-arrow la-btn__arrow-icon"></span></a>
                        </div>
                      </div>
                    </div>
                  </div>
        
                  @if(Auth::check() && Auth::User()->subscription() && Auth::User()->subscription()->active())
                  
                        <div class="col-md-10 offset-md-1 col-lg-5 offset-lg-1">
                          <div class="la-price__box-wrap la-anim__wrap-pin2 ">
                            <div class="la-anim__wrap ">
                                <div class="la-price__box la-anim__pin2 ">
                                  <div class="la-price__box-inner la-anim__stagger-item">
                                      <p class="la-price__box-para mb-8 la-anim__stagger-item--x">Discover our wide range of art courses curated by top artists from around the world and explore your creativity! </p>
                                      <a href="/browse/course" class="btn btn-primary la-btn w-100">Start Learning</a>                                   
                                  </div>
                                </div>
                            </div>
                          </div>
                        </div>                      

                  @else

                      <div class="col-md-10 offset-md-1 col-lg-5 offset-lg-1">
                        <div class="la-price__box-wrap">
                          <div class="la-anim__wrap la-anim__wrap-pin2">
                              <div class="la-price__box la-anim__pin2 ">
                                <div class="la-price__box-inner la-anim__stagger-item">
                                    <a href="/learning-plans" class="btn btn-primary la-btn w-100">SUBSCRIBE NOW</a>
                                    <p class="la-price__box-para mt-8 mb-2 la-anim__stagger-item--x">Get <span class="la-color--primary">35% savings </span>on Annual Plan</p>
                                    <div class="la-price__box-soffer la-soffer ml-0">
                                      
                                      @if (getLocation() == 'IN')
                                        <div class="la-soffer__bestprice la-soffer__bestprice--black la-anim__stagger-item--x" style="font-weight:var(--font-bold)"> <sup><small>₹</small></sup>  2999 / Month</div>
                                        <div class="la-soffer__realprice la-soffer__realprice--black la-anim__stagger-item--x"> <sup><small>₹</small></sup>  5999 (INR) </div>
                                      @else
                                        <div class="la-soffer__bestprice la-soffer__bestprice--black la-anim__stagger-item--x" style="font-weight:var(--font-bold)"> <sup><small>$</small></sup>  39 / Month</div>
                                        <div class="la-soffer__realprice la-soffer__realprice--black la-anim__stagger-item--x"> <sup><small>$</small></sup>  99 (USD) </div>
                                      @endif
                                    </div>
                                </div>
                              </div>
                          </div>
                        </div>
                      </div> 

                    @endif

                </div>
              </div>

              <!-- <div class="la-price__slide la-anim__slide">
                <div class="la-price__row row mb-16">
                  <div class="col-lg-5 pt-lg-20 la-anim__wrap">
                    <h3 class="la-section__subtitle la-anim__stagger-item">What’s LILA for you ?</h3>
                    <p class="la-section__text text-lg text-md-xl la-anim__stagger-item--x">Our mission is to Encourage, Empower and Embrace self-learning among all curious individuals who wish to learn, expand their potential and make a mark in the world.<br/><br/> 
                        Through our Radical team, we strive every day to make knowledge Affordable, Accessible for everyone regardless of who or where they are
                    </p>
                    <div class="la-btn__arrow text--burple text-uppercase text-spacing font-weight--bold  pt-4 pt-md-8  la-anim__stagger-item--x">
                      <a href="/about">learn more<span class="la-icon la-icon--7xl icon-grey-arrow la-btn__arrow-icon"></span></a>
                    </div>
                  </div>
                </div>
              </div> -->

          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Section: End-->
  @endsection
  