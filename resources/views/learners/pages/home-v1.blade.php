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
<section class="la-section  la-section--hero clearfix p-0">
    <div class="la-section__inner">
      <div class="container">
        <div class="la-hero__top row pt-3 align-items-center la-anim__wrap la-anim__wrap--hero ">
          <!-- Column: Start-->
          <div class="col-12 col-lg-5 la-anim__item la-anim__item--left my-auto">
            <div class="la-hero pt-6 pt-lg-2 la-anim__stagger">
              <p class="la-hero__tag mb-2 mb-md-0 la-anim__stagger-item">COURSES & CLASSES BY</p>
              <h1 class="la-hero__title la-anim__stagger-item">World’s best <span class="la-hero__subtitle">Creators</span></h1>
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
        </div>

        <!-- Row: Start-->
        <div class="la-anim__wrap">
          <div class="la-hero__bottom d-flex justify-content-center justify-content-lg-between align-items-center pt-4 pb-14 la-anim__fade-in-bottom la-anim__D">
            <div class="la-hero__bottom-trial la-btn__arrow text--green text-uppercase text--md font-weight--medium text-spacing">@if(Auth::check() && Auth::User()->subscription() && Auth::User()->subscription()->active())  @else<a href="/learning-plans">Start free trial<span class="la-btn__arrow-icon la-icon la-icon--7xl icon-grey-arrow"></span></a> @endif </div>
            <div class="la-hero__bottom-browse la-btn__arrow la-btn__arrow-down text--burple text-uppercase text--md font-weight--medium text-spacing d-none d-lg-block"><a href="#home_courses">BROWSE COURSES</a><span class="la-btn__arrow-icon arrow-down la-icon la-icon--7xl icon-grey-arrow"> </span></div>
          </div>
        </div>
        <!-- Row: End-->
      </div>
    </div>
  </section>
  <!-- Section: End-->

  <!-- Section: Start-->
  <section class="la-section  la-section--grey la-section--art-categories position-relative"  id="home_courses">
    <div class="la-section__inner la-anim__wrap" >
      <div class="container position-relative">
        <span class="la-section__cross-line"></span>
        <div class="la-courses">
          <nav class="la-courses__nav position-relative d-flex justify-content-between align-items-start">
            
              <ul class="nav nav-pills la-courses__nav-tabs" id="nav-tab" role="tablist" tabindex="0">
              <div class="d-none d-md-block la-courses__nav-prev la-anim__fade-in-left"><span class="la-courses__nav-prev--icon la-icon icon-arrow"></span></div>
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

                <div class="d-none d-md-block la-courses__nav-next la-anim__stagger-item--x"><span class="la-courses__nav-next--icon la-icon icon-right-arrow2"></span></div>
              </ul>
              
      
        </nav> 
        <nav class="la-courses__nav">
                    <x-add-to-playlist 
                        :playlists="$playlists"
                    />
                    {{-- Categories Tab :Start --}}
                      @if(!$filtres_applied)
                        <div class="tab-content la-courses__content la-anim__wrap" id="nav-tabContent">
                          @foreach ($categories as $category)
                            <div class=" tab-pane fade show @if ($loop->first) active @endif" id="nav-{{$category->slug}}" role="tabpanel" aria-labelledby="nav-{{$category->slug}}-tab">
                              <div class="row row-cols-md-2 row-cols-lg-3 la-anim__stagger-item la-anim__C">
                                    @php

                                      $courses = $category->courses;

                                      if($sort_type == 'highest_rated')
                                      {
                                        $courses = $courses->sortByDesc('average_rating');
                                      }                
                                    @endphp

                                    @foreach($courses as $course)
                                      @if ($course->featured == 0)
                                          @continue
                                      @endif
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
                                        />
                                    @endforeach

                                    
                              </div>
                            </div>
                          @endforeach
                        </div>
                        {{-- Categories Tab : END --}}
                      @else
                            @php
                            if($sort_type == 'highest_rated')
                            {
                              $courses = $courses->sortByDesc('average_rating');
                            }                
                            @endphp
                            <div class="row row-cols-md-2 row-cols-lg-3 la-anim__stagger-item la-anim__C">
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
                                  />
                              @endforeach
                              </div>

                              @if(count($courses) == 0)
                                <div class="col-12 la-empty__courses d-md-flex justify-content-between align-items-start la-anim__wrap">
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
                      @endif
            </nav>
          </div>
        </div>
      </div>
  </section>
  <!-- Section: End-->

  <!-- Section: Start-->
  <section class="la-section  la-section--artists position-relative la-anim__wrap">
    <div class="la-section__inner position-relative">
      <span class="la-section__circle"></span>
      <div class="swiper-container gallery-top la-artist__slider container">

        <div class="col-md-12 la-artist__slider-col la-artist__designation position-absolute d-flex align-items-center justify-content-center la-anim__fade-in-top la-anim__A">
            <h2 class="la-section__title la-section__title--big">Alien <span style="color: var(--gray);"> MENTOR </span></h2>
        </div>

        <div class="swiper-wrapper">
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
            <div class="swiper-slide la-artist__thumbnail"><img src="{{ $feat->user_thumbnail }}" alt="" style="width: 90px; height:100px;"></div>
          @endforeach
        
        </div>
      </div>

    </div>
  </section>
  <!-- Section: End-->

  <!-- Section: Start-->
  <section class="la-section  la-section--classes la-section--grey position-relative la-anim__wrap">
    <div class="la-section__inner">
      <div class="container">
        <h2 class="la-section__title la-section__title--big position-relative la-anim__fade-in-top la-anim__A">Master <span>classes</span></h2>
        <div class="la-mccourses pt-20 pt-md-6">
          <div class="row justify-content-center px-lg-5 la-anim__stagger">
           
              @foreach ($master_classes as $master)
                @if($master->courses != null)
                  <x-master-class
                    :img="$master->courses->preview_image"
                    :title="$master->courses->title"
                    :profileImg="$master->courses->user->user_img"
                    :profileName="$master->courses->user->fullName"
                    :learners="$master->courses->learnerCount"
                    :id="$master->courses->id"
                    :slug="$master->courses->slug"
                  />
                @endif
              @endforeach
             
          </div>
        </div>

        <div class="la-mccourse__view-more position-relative text-right la-anim__wrap">
            <div class=" la-btn__arrow text--burple text-uppercase text-spacing font-weight--bold pt-md-8 mr-5 mr-md-1 la-anim__fade-in-right">
              <a href="/master-classes" >explore more</a><span class="la-btn__arrow-icon la-icon la-icon--7xl icon-grey-arrow"></span>
            </div>
        </div>

      </div>
    </div>
  </section>
  <!-- Section: End-->

  <!-- Section: Start-->
  <section class="la-section la-section--trail position-relative la-anim__wrap">
    <div class="la-section__inner">
      <span class="la-section__circle la-section__circle--right"></span>
      <div class="container">
       
        <div class="row">
          <div class="col-12 col-md-5 la-trail__left">
            <div class="la-trail__title d-none d-sm-block la-trail__title-out la-trail__title--black la-section__title la-section__title--big position-absolute la-anim__text-move">Observe.</div>
            <div class="la-trail__img-wrap la-anim__fade-in-right la-anim__B">
              <div class="la-trail__img position-relative">
                <img class="w-100" src="./images/learners/home/observe.jpg" alt="observe">
              </div>
              <div class="la-trail__title la-trail__title-in la-trail__title--purple la-section__title la-section__title--big position-absolute la-anim__text-move la-anim__text-move--z1">Observe.</div>
            </div>
          </div>

          <div class="col-12 col-md-7 pl-md-0 ">
            <div class="la-trail__btn la-btn__plain d-flex justify-content-center la-anim__fade-in-left">
              <a href="/about" class="d-none d-md-block">ALIENS WAY OF TEACHING</a>
            </div>
            <div class="la-trail__right position-relative d-flex align-items-end ">
              <div class="la-trail__content-wrap la-anim__stagger">
                <div class="la-trail__para la-anim__stagger-item la-anim__B">We strongly believe observation is integral to honing art. Learn from masters in their respective fields with consistent practice, and become a pro yourself!</div>
                @if(Auth::check())
                  @if(Auth::user()->subscription() )
                    <a class="btn btn-primary la-btn la-btn--primary mt-md-10 la-anim__stagger-item" href="/browse/course/">Browse Course</a>
                  @else
                    <a class="btn btn-primary la-btn la-btn--primary mt-md-6 la-anim__stagger-item" href="/login">Start free trail</a>
                  @endif
                @else
                  <a class="btn btn-primary la-btn la-btn--primary mt-md-6 la-anim__stagger-item" href="/login">Start free trail</a>
                @endif
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
  <!-- Section: End-->

  <!-- Section: Start-->
  <section class="la-section la-section--price la-anim__wrap la-anim__wrap-pin">
    <div class="la-section__inner ">
      <div class="container ">
        <div class="la-price__container">
          <h2 class="la-section__title la-section__title--big leading-none la-anim__pin la-price__container-title text-left"> 
            <span style="color: var(--gray);" class="la-anim__fade-in-top">Learn it </span><br>
            <span class="la-anim__stagger-item">like aliens</span>
          </h2>
          <div class="la-price__slider la-anim__slider">
              <div class="la-price__slide la-anim__slide mb-6 mb-lg-16">
                <div class="la-price__row row ">
                
                  <div class="col-lg-5 pt-20 la-anim__wrap">
                    <h3 class="la-section__subtitle la-anim__stagger-item">How does subscription works?</h3>
                    <p class="la-section__text text-lg text-md-xl la-anim__stagger-item--x ">Learning need not be expensive. At LILA, our subscription model gives you the benefit to choose from any number of courses or individual classes, as you please.<br/><br/> All at nominal fees! So, learn away! </p>
                    <div class="la-btn__arrow text--burple text-uppercase text-spacing font-weight--bold pt-4 pt-md-8 la-anim__stagger-item--x">
                      <a href="/learning-plans">learn more<span class="la-icon la-icon--7xl icon-grey-arrow la-btn__arrow-icon"></span></a>
                    </div>
                  </div>
        
                  @if(Auth::check() && Auth::User()->subscription() && Auth::User()->subscription()->active())
                  
                        <div class="col-md-7 col-lg-5 offset-lg-1 pt-12 pt-md-20">
                          <div class="la-anim__wrap la-anim__wrap-pin2 ">
                              <div class="la-price__box la-anim__pin2 ">
                                <div class="la-price__box-inner la-anim__stagger-item">
                                    <p class="la-price__box-para mb-8 la-anim__stagger-item--x">Discover our wide range of art courses curated by top artists from around the world and explore your creativity! </p>
                                    <a href="/browse/course" class="btn btn-primary la-btn la-btn--primary w-100">Start Learning</a>                                   
                                </div>
                              </div>
                          </div>
                        </div>                      

                  @else

                      <div class="col-md-7 col-lg-5 offset-lg-1 pt-12 pt-md-20">
                        <div class="la-anim__wrap la-anim__wrap-pin2 ">
                            <div class="la-price__box la-anim__pin2 ">
                              <div class="la-price__box-inner la-anim__stagger-item">
                                  <a href="/learning-plans" class="btn btn-primary la-btn la-btn--primary w-100">SUBSCRIBE NOW</a>
                                  <p class="la-price__box-para mt-8 mb-2 la-anim__stagger-item--x">Get <span class="la-color--primary">35% savings </span>on Annual Plan</p>
                                  <div class="la-price__box-soffer la-soffer ml-0">
                                    
                                    @if (getLocation() == 'IN')
                                      <div class="la-soffer__bestprice la-soffer__bestprice--black la-anim__stagger-item--x"> <sup><small>₹</small></sup>  2999 / Month</div>
                                      <div class="la-soffer__realprice la-anim__stagger-item--x"> <sup><small>₹</small></sup>  5999 (INR) </div>
                                    @else
                                      <div class="la-soffer__bestprice la-soffer__bestprice--black la-anim__stagger-item--x"> <sup><small>$</small></sup>  39 / Month</div>
                                      <div class="la-soffer__realprice la-anim__stagger-item--x"> <sup><small>$</small></sup>  99 (USD) </div>
                                    @endif
                                  </div>
                              </div>
                            </div>
                        </div>
                      </div> 


                    @endif

                </div>
              </div>

              <div class="la-price__slide la-anim__slide">
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
              </div>

          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Section: End-->
  @endsection
  