@extends('learners.layouts.app')

@section('seo_content')
    <title>{{ $course->title }} Class | Learn Tattoo & Graphic Design | LILA</title>
    <meta name='description' itemprop='description' content='Check out the classses you enrolled in tattoo, graphic design, digital art from basic to advanced.Join LILA & enhance your skills with these online classes.' />

    <meta property="og:description" content="Check out the classses you enrolled in tattoo, graphic design, digital art from basic to advanced.Join LILA & enhance your skills with these online classes." />
    <meta property="og:title" content="Class | Learn Tattoo & Graphic Design | LILA" />
    <meta property="og:url" content="{{Request::url()}}" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="LILA Art" />
    <meta property="og:image" content="{{$course->preview_image}}" />
    <meta property="og:image:url" content="{{$course->preview_image}}" />
    <meta property="og:image:size" content="300" />

    <meta name="twitter:card"content="summary" />
    <meta name="twitter:title"content="Class | Learn Tattoo & Graphic Design | LILA" />
    <meta name="twitter:site"content="@lilaaliens" />

    <script type="application/ld+json">{"@context":"https://schema.org","@type":"WebPage","name":"Class | Learn Tattoo & Graphic Design | LILA"}</script>
@endsection

@section('headAssets')
  <link href="https://vjs.zencdn.net/7.8.4/video-js.css" rel="stylesheet" />
  <link href="https://unpkg.com/@silvermine/videojs-quality-selector/dist/css/quality-selector.css" rel="stylesheet">
@endsection

@section('content')
@php
use Carbon\Carbon;
$course_id = $course->id;
@endphp

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

<x-add-to-playlist
  :playlists="$playlists"
/>

  <!-- Intro & Video Player Section :  Start -->
  <section class="la-vcourse__intro-section la-section__small" style="background: var(--gray)">
    <div class="la-vcourse">
      <div class="container-fluid la-vcourse__intro-fluid">
        <div class="d-none d-md-block mb-3 la-anim__wrap">
          <div class="la-vcourse__intro-left d-lg-flex flex-row justify-content-between">
            <div class="la-vcourse__intro-top la-vcourse__header mb-6 mr-6 la-anim__stagger-item">
              <h1 class="la-vcourse__title leading-none mb-1">{{ $course->title }}</h1>
              
              <div class="la-vcourse__creator d-flex align-items-center">
                <a href="/mentor/{{$course->user->id}}" class="la-vcourse__creator-name text-capitalize">{{ $course->user->fullName }}</a>
              </div>
            </div>

            <div class="la-vcourse__intro-bottom la-vcourse__buy d-md-flex align-items-start justify-content-lg-end text-lg-right mb-6 la-anim__stagger-item">
                @if ($course->isPurchased() == null)
                <div class="la-vcourse__buy-btn text-center">
                  <form class="la-vcourse__purchase-form" id="add_to_cart_form_1" name="add_to_cart_form" method="post" action="/add-to-cart">
                    <input type="hidden" name="course_id" value="{{$course->id}}" />
                    <input type="hidden" value="all-classes" name="classes" />
                    @csrf
                    <a class="la-vcourse__buy-course btn btn-primary la-btn__app border-black  d-lg-inline-flex justify-content-end mr-2 px-4 py-3 mb-2 mb-md-0" @if(Auth::check()) onclick="$('#add_to_cart_form_1').submit()" @else data-toggle="modal" data-target="#locked_login_modal" @endif>Buy this Class</a><br/>
                    <span class="text-gray4" style="opacity:0.55;font-family:'Roboto',sans-serif">@ {{ getSymbol() }}{{$course->convertedprice}}</span>
                  </form>
                </div>
                @endif
    
                @if ( !auth()->check() ||  ( (auth()->check() && !Auth::User()->subscription()) || (auth()->check() && !Auth::User()->subscription()->active())  ) )
                <div class="la-vcourse__buy-btn text-center">
                  <a class="la-vcourse__buy-course btn btn-primary la-btn__app active py-3 color-black text-white d-lg-inline-flex justify-content-end mb-2" href="/learning-plans">Subscribe for Free</a><br/>
                  <span class="text-gray4" style="opacity:0.55;">Access all Courses & Classes</span>
                </div>
                @endif
            </div>
          </div>

          <div class="la-vcourse__intro-right d-flex flex-row justify-content-between align-items-center">
            <div class="la-vcourse__intro-top la-anim__stagger-item">
                <div class="la-vcourse__languages d-md-flex align-items-start "> 
                  <div class="la-text-gray4 mb-2 mt-md-2 mr-4">Languages: </div> 
                  
                  <div class="la-vcourse__language-switcher d-flex align-items-center justify-content-between justify-content-md-start flex-wrap">
                    {{-- @dd($course->multilingual) --}}
                    <input type="radio" class="la-vcourse__language-switch" id="lang_1" name="language_selector" value="en"  checked/>
                    <label for="lang_1" class="la-vcourse__language-label">English</label>
                    @foreach ($course->multilingual as $multilingual)
                      <input type="radio" class="la-vcourse__language-switch" id="lang_{{$multilingual->lang_code}}" name="language_selector" value="{{$multilingual->lang_code}}" />
                      <label for="lang_{{$multilingual->lang_code}}" class="la-vcourse__language-label">{{$multilingual->vid_lang}}</label>
                    @endforeach
                  </div>          
                </div>
            </div>

            <div class="la-vcourse__intro-bottom text-right la-anim__stagger-item">
              <ul class="list-unstyled">
                <li class="la-vcourse__videos-info  text-sm">
                  <span class="la--count">{{ $course->courseclass->count() }} Videos ({{ $course->duration }} )</span>
                </li>
              </ul>
            </div>
          </div>
        </div>

        <div id="vcourse_row" class="la-vcourse__class-row d-flex flex-wrap la-anim__wrap">
          <div class="la-vcourse__class-col la-vcourse__class-col--video la-anim__stagger-item" id="class_video_player">
            <div class="la-player la-vcourse__video-wrap mb-md-3">
                
                <video-js
                    id="lila-video"
                    class="la-vcourse__video video-js"
                    controls
                    autoplay
                    preload="auto"
                    width="100%"
                    height="100%"
                    poster="{{ $course->video_preview_img }}"
                    data-setup='{"fluid": true, "aspectRatio": "16:9"}'
                    type="application/x-mpegURL"
                >
                    {{-- <source src="{{ $course->getSignedStreamURL()}}" type="application/x-mpegURL" /> --}}
                  <p class="vjs-no-js"></p>

                </video-js>
            </div>

            <div class="d-none d-md-flex justify-content-between la-anim__stagger-item">
              <h2 class="la-vlesson__title m-0 text-lg mr-3 text-capitalize">{{ $course->title}} - Class Preview</h2>
              
              <div>
                <a role="button" class="mr-1">
                  <span class="la-icon la-icon--lg icon-playlist"></span>
                </a>
                
                <a role="button">
                  <span class="la-icon la-icon--lg icon-wishlist"></span>
                </a>
              </div>
            </div>

            <!-- Mobile NavTabs : Start -->
            <nav class="d-block d-md-none la-courses__nav la-vcourse__nav la-anim__stagger-item">
              <ul class="nav nav-pills la-courses__nav-tabs la-vcourse__nav-tabs" id="cnav-tab" role="tablist">
                <li class="nav-item la-courses__nav-item la-vcourse__nav-item d-block d-md-none">
                  <a class="nav-link la-courses__nav-link la-vcourse__nav-link text-capitalize" id="cnav-chapters-tab" data-toggle="tab" href="#cnav-chapters" role="tab" aria-controls="cnav-chapters">
                    Chapters
                  </a>
                </li>
                <li class="nav-item la-courses__nav-item la-vcourse__nav-item">
                  <a class="nav-link la-courses__nav-link la-vcourse__nav-link text-capitalize" id="cnav-about-tab" data-toggle="tab" href="#cnav-about" role="tab" aria-controls="cnav-about">
                    About
                  </a>
                </li>
                <li class="nav-item la-courses__nav-item la-vcourse__nav-item">
                  <a class="nav-link la-courses__nav-link la-vcourse__nav-link text-capitalize" id="cnav-reviews-tab" data-toggle="tab" href="#cnav-reviews" role="tab" aria-controls="cnav-reviews">
                    Reviews
                  </a>
                </li>
              </ul>
            </nav>
            <!-- Mobile NavTabs : End -->

          </div>

            <div class="d-none d-md-block la-vcourse__class-col la-vcourse__class-col--video-list px-0 la-anim__stagger-item">
              <div class="la-vcourse__curriculam panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                @foreach($course->chapter as $class)
                <div class="panel panel-default">
                  <div class="la-vcourse__class  panel-heading mb-2" role="tab" id="videoHeader">
                    <a class="la-vcourse__class-header d-flex collapsed" role="button" id="videoToggle" data-toggle="collapse" data-parent="#accordion" href="#videoCollapse" aria-expanded="true" aria-controls="videoCollapse">
                      {{-- <div class="la-vcourse__class-thumb">
                        <img class="img-fluid mx-auto lazy" src="{{$class->thumbnail}}" data-src="{{$class->thumbnail}}" alt="M" />
                      </div> --}}
                      <div class="d-flex flex-column ml-3">
                        <div class=" leading-snug pr-3">
                              <span class="la-vcourse__class-title text-xs text-capitalize pr-1">{{$class->chapter_name}}</span>
                              <small class="la-vcourse__class-videoscount text-xs pl-2">{{$class->courseclass->count()}} Videos</small>
                        </div>
                        <div class="la-vcourse__class-title--chapter text-xs">{{$course->title}}</div>
                      </div>
                    </a>

                    <div class="la-vcourse__lessons collapse" id="videoCollapse" role="tabpanel" aria-labelledby="videoHeader">
                      @foreach ($class->courseclass->sortBy('position') as $class_video)
                        @php
                          // $lesson_access = $class_video->is_preview == '1' ? 'free' : ($video_access ? 'free' : 'locked');
                          if($class_video->is_preview == '1')
                            $lesson_access = 'free';
                          else{
                            if($video_access == true || (is_array($class_access) && in_array($class_video->id, $class_access)) || $class_access === 1)
                              $lesson_access = 'free';
                            else
                              $lesson_access = 'locked';
                          }
                        @endphp
                        
                        <x-class-video
                          :id="$class_video->id"
                          :title="$class_video->title"
                          :thumbnail="$class_video->image"
                          :detail="$class_video->detail"
                          :author="$class_video->courses->user->fullName"
                          :watchduration="$class_video->duration"
                          :statuspercentage="$class_video->getProgress()"
                          :access="$lesson_access"
                        />
                      @endforeach
                    </div>

                  </div>
              </div>
                @endforeach
              </div>

              {{-- <div class="la-vcourse__btn-wrap text-center mt-3 la-anim__wrap">
                <div id="vcourseFullView" class="la-btn__arrow-down la-vcourse__btn d-inline-block la-anim__stagger-item">
                  <span class="icon-down-arrow la-btn__icon la-btn__icon--grey"></span>
                  <div class="la-btn__text la-btn__text--purple">See the list</div>
                </div>
              </div> --}}
            </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Intro & Video Player Section: End-->



  <!-- Chapters/About/Reviews Section: Start-->
  <section class="la-ctabs__section la-section__small position-relative">
    <div class="la-section__inner">
      <div class="container-fluid la-anim__wrap">
        <div class="row">
          <div class="col-12 px-0 px-md-3 la-ctabs ">
            <nav class="d-none d-md-block la-courses__nav la-vcourse__nav la-anim__stagger-item">
              <ul class="nav nav-pills la-courses__nav-tabs la-vcourse__nav-tabs" id="cnav-tab" role="tablist">
                <li class="nav-item la-courses__nav-item la-vcourse__nav-item d-block d-md-none">
                  <a class="nav-link la-courses__nav-link la-vcourse__nav-link text-capitalize" id="cnav-chapters-tab" data-toggle="tab" href="#cnav-chapters" role="tab" aria-controls="cnav-chapters">
                    Chapters
                  </a>
                </li>
                <li class="nav-item la-courses__nav-item la-vcourse__nav-item">
                  <a class="nav-link la-courses__nav-link la-vcourse__nav-link text-capitalize" id="cnav-about-tab" data-toggle="tab" href="#cnav-about" role="tab" aria-controls="cnav-about">
                    About
                  </a>
                </li>
                <li class="nav-item la-courses__nav-item la-vcourse__nav-item">
                  <a class="nav-link la-courses__nav-link la-vcourse__nav-link text-capitalize" id="cnav-reviews-tab" data-toggle="tab" href="#cnav-reviews" role="tab" aria-controls="cnav-reviews">
                    Reviews
                  </a>
                </li>
                
                {{-- @if($video_access == true)
                  <li class="nav-item la-courses__nav-item la-vcourse__nav-item">
                    <a class="nav-link la-courses__nav-link la-vcourse__nav-link text-capitalize" id="cnav-resource-tab" data-toggle="tab" href="#cnav-resource" role="tab" aria-controls="cnav-resource">
                      Resources
                    </a>
                  </li>
                  <li class="nav-item la-courses__nav-item"><a class="nav-link la-courses__nav-link text-capitalize" id="cnav-certificate-tab" data-toggle="tab" href="#cnav-certificate" role="tab" aria-controls="cnav-certificate" >Certificate</a></li> 
                @endif --}}
              </ul>
            </nav>

            <div class="tab-content la-vcourse__nav-content" id="cnav-tabContent">
              <!-- Chapters Tab : Start -->
              <div class="tab-pane fade" id="cnav-chapters" role="tabpanel" aria-labelledby="cnav-chapters-tab">
                <div class="d-block d-md-none">
                  <h1 class="la-vcourse__title leading-tight text-2xl mb-4 la-anim__stagger-item--x">{{ $course->title }}</h1>
                  
                  <!-- Creator -->
                  <div class="la-vcourse__creator d-flex align-items-center la-anim__stagger-item--x">
                    <div class="la-vcourse__creator-avator">
                      <img src="{{ $course->user->user_img }}" data-src="{{ $course->user->user_img }}" class="img-fluid lazy" alt="{{ $course->user->fullName }}" />
                    </div>
                    <div class="ml-2 leading-tight">
                      <div class="la-vcourse__creator-name text-capitalize" style="color:var(--gray6);">{{ $course->user->fullName }}</div>
                      <div class="text-xs">Mentor</div>
                    </div>

                    <div class="la-btn__arrow text--burple text-uppercase text-spacing font-weight--semibold ml-auto">
                      <a href="/mentor/{{$course->user->id}}">see profile
                      <span class="la-btn__arrow-icon la-vcourse__creator-link--icon la-icon la-icon--5xl icon-grey-arrow "></span></a>
                    </div>
                  </div>

                  <!-- Creator Info -->
                  <ul class="list-unstyled d-flex align-items-center justify-content-between la-anim__stagger-item--x">
                    <li class="la-vcourse__videos-info text-sm">
                      <div class="la--count">
                        <span>{{ $course->courseclass->count() }}</span> Videos <span>({{ $course->duration }} )</span>
                      </div>

                      <div class="d-flex align-items-center">
                        <div class="la-vcourse__info-item la-vcourse__info--learnerscount">
                          <span class="la--countlearners text-xs">{{$course->learnerCount}}</span> 
                          <span class="la--label">Learners</span>
                        </div>
                        
                        <div class="px-1" style="color:var(--gray4)">|</div>

                        <div class="la-vcourse__info-item la-vcourse__info--level">
                          <div class="la--label">
                            @if($course->level == 1)
                              Beginner
                            @elseif($course->level == 2)
                              Intermediate
                            @else
                              Advanced
                            @endif
                          </div>
                        </div>
                      </div>
                    </li>

                    <li class="la-vcourse__videos-info ml-6 ml-lg-8 text-sm">
                      <div class="la-rtng__icons d-inline-flex">
                        @for($counter=1;$counter <= round($average_rating); $counter++)
                            <div class="la-icon la-icon--lg icon-star la-rtng__fill"> </div>
                        @endfor
          
                        @for($counter=1;$counter <= 5-round($average_rating); $counter++)
                            <div class="la-icon la-icon--lg icon-star la-rtng__unfill"> </div>
                        @endfor
                      </div>
                    </li>
                  </ul>

                  <!-- Video Class List -->
                  <div class="d-block d-md-none  la-vcourse__class-col--video-list px-0 la-anim__stagger-item--x">
                    <div class="la-vcourse__curriculam mt-6 panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                      @foreach($course->chapter as $class)
                      <div class="panel panel-default">
                        <div class="la-vcourse__class panel-heading mb-2" role="tab" id="videoHeader">
                          <a class="la-vcourse__class-header d-flex collapsed" role="button" id="videoToggle" data-toggle="collapse" data-parent="#accordion" href="#videoCollapse" aria-expanded="true" aria-controls="videoCollapse">
                            <div class="d-flex flex-column">
                              <div class=" leading-snug pr-3">
                                    <span class="la-vcourse__class-title text-xs text-capitalize pr-1">{{$class->chapter_name}}</span>
                                    <small class="la-vcourse__class-videoscount text-xs pl-2">{{$class->courseclass->count()}} Videos</small>
                              </div>
                              <div class="la-vcourse__class-title--chapter text-xs">{{$course->title}}</div>
                            </div>
                          </a>
        
                          <div class="la-vcourse__lessons collapse" id="videoCollapse" role="tabpanel" aria-labelledby="videoHeader">
                            @foreach ($class->courseclass->sortBy('position') as $class_video)
                              @php
                                // $lesson_access = $class_video->is_preview == '1' ? 'free' : ($video_access ? 'free' : 'locked');
                                if($class_video->is_preview == '1')
                                  $lesson_access = 'free';
                                else{
                                  if($video_access == true || (is_array($class_access) && in_array($class_video->id, $class_access)) || $class_access === 1)
                                    $lesson_access = 'free';
                                  else
                                    $lesson_access = 'locked';
                                }
                              @endphp
                              
                              <x-class-video
                                :id="$class_video->id"
                                :title="$class_video->title"
                                :thumbnail="$class_video->image"
                                :detail="$class_video->detail"
                                :author="$class_video->courses->user->fullName"
                                :watchduration="$class_video->duration"
                                :statuspercentage="$class_video->getProgress()"
                                :access="$lesson_access"
                              />
                            @endforeach
                          </div>
        
                        </div>
                    </div>
                      @endforeach
                    </div>
                  </div>

                </div>  
              </div>
              <!-- Chapters Tab : End -->

              <!-- About Tab : Start -->
              <div class="tab-pane fade" id="cnav-about" role="tabpanel" aria-labelledby="cnav-about-tab">
                <div class="row">
                  <div class="col-md-7 col-lg-8">
                    <div class="la-ctabs__about-section la-anim__stagger-item">
                      <h6 class="text-xl mb-4">About this Class</h6>
                      <div class="la-ctabs__about">
                        <div>{!! $course->short_detail !!}</div>
                        <div>{!! $course->detail  !!}</div>
                        <div class="la-ctabs__about-collapse collapse" id="about_collapse">
                          {!! $course->detail  !!}
                        </div>
                      </div>

                      <div class="la-vcourse__btn-wrap la-anim__stagger-item--x">
                        <a class="la-btn__arrow-down la-vcourse__btn-collapse d-inline-block collapsed" data-toggle="collapse" href="#about_collapse"></a>
                      </div>
                    </div>
                  </div>

                  <!-- Mentor Profile -->
                  <div class="col-md-5 col-lg-4 d-none d-md-block ">
                    <div class="la-vcourse__info-mentor la-anim__stagger-item--x">
                      <div class="la-vcourse__info-items d-flex align-items-center justify-content-start ">
                        <div class="la-vcourse__info-item la-vcourse__info--videos d-flex flex-column align-items-center justify-content-end">
                          <div class="la--count ">{{ $course->courseclass->count() }}</div>
                          <span class="la--label mt-2">Videos</span>
                        </div>
            
                        <div class="la-vcourse__info-item la-vcourse__info--learners d-flex flex-column align-items-center justify-content-end mx-10">
                          <div class="la--count">{{$course->learnerCount}}</div>
                          <span class="la--label mt-2">Learners</span>
                        </div>
            
                        <div class="la-vcourse__info-item la-vcourse__info--level d-flex flex-column align-items-center justify-content-end">
                          <div class="la--icon mt-n3">
                            @if($course->level == 1)
                              <span class="la-vcourse__info-icon la-icon la-icon--5xl icon-beginner"></span>
                            @elseif($course->level == 2)
                            <span class="la-vcourse__info-icon la-icon la-icon--5xl icon-intermediate"></span>
                            @else
                            <span class="la-vcourse__info-icon la-icon la-icon--5xl icon-advanced"></span>
                            @endif
                          </div>
                          <div class="la--label mt-n2 la-anim__stagger-item--x">
                            @if($course->level == 1)
                              Beginner
                            @elseif($course->level == 2)
                              Intermediate
                            @else
                              Advanced
                            @endif
                          </div>
                        </div>
                      </div> 
          
                      <div class="mt-6 mt-lg-10">
                        <h6 class="mb-6">Mentor</h6>
                        <div class="la-vcourse__creator d-flex align-items-center ">
                          <div class="la-vcourse__creator-avator">
                            <img src="{{ $course->user->user_img }}" data-src="{{ $course->user->user_img }}" class="img-fluid lazy" alt="{{ $course->user->fullName }}" />
                          </div>
                          <div class="ml-3">
                              <div class="la-vcourse__creator-name text-capitalize" style="color:var(--gray6);">{{ $course->user->fullName }}</div>
                              <div class="text-sm">Mentor</div>
                          </div>
                        </div>
            
                        @php
                            $details = strip_tags($course->user->detail);
                            $details = preg_replace("/&#?[a-z0-9]+;/i"," ",$details);
                        @endphp
            
                        @if(strlen($details) != 0)
                          <p class="la-creator__para text-sm my-3">{{ substr($details, 0, 200) }}...</p>
                          <div class="la-creator__content-btn">
                            <div class="la-btn__arrow text--burple text-uppercase text-spacing font-weight--semibold ">
                              <a href="/mentor/{{$course->user->id}}">see profile
                              <span class="la-btn__arrow-icon la-icon la-icon--7xl icon-grey-arrow "></span></a>
                            </div>
                          </div>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- About Tab : End -->

              <!-- Reviews Tab : Start -->
              <div class="tab-pane fade" id="cnav-reviews" role="tabpanel" aria-labelledby="cnav-reviews-tab">
                <div class="row">
                  <div class="col-md-5 col-lg-3">
                    <div class="la-rtng__item m-0">
                      <div class="la-rtng__inner ">
                        <h3 class="la-rtng__title text-xl mb-4">Class Reviews</h3>
        
                        <div class="la-rtng__wrapper">
                          <div class="la-rtng__overall mb-6">
                            <div class="la-rtng__total text-3xl mb-0">{{$average_rating}}</div>
                            <div class="la-rtng__icons d-inline-flex">
                              @for($counter=1;$counter <= round($average_rating); $counter++)
                                  <div class="la-icon la-icon--lg icon-star la-rtng__fill"> </div>
                              @endfor
        
                              @for($counter=1;$counter <= 5-round($average_rating); $counter++)
                                  <div class="la-icon la-icon--lg icon-star la-rtng__unfill"> </div>
                              @endfor
                            </div>
        
                            <div class="la-rtng__course text-sm">Class Rating</div>
                          </div>
        
                            <div class="la-rtng__indicators p-0">
                              <div class="la-rtng__bars d-flex flex-row align-items-start">
                                <div class="la-rtng__pg-rtng text-xs">5 star</div>
                                <div class="progress la-rtng__progress mx-3">
                                  <div class="progress-bar la-rtng__progress-bar" role="progressbar" style="width:{{$five_rating_percentage}}%" aria-valuenow="{{$five_rating_percentage}}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="la-rtng__percent body-font text-xs">{{$five_rating_percentage}}%</div>
                              </div>
        
                              <div class="la-rtng__bars d-flex flex-row align-items-start">
                                <div class="la-rtng__pg-rtng text-xs">4 star</div>
                                <div class="progress la-rtng__progress mx-3">
                                  <div class="progress-bar la-rtng__progress-bar" role="progressbar" style="width:{{$four_rating_percentage}}%" aria-valuenow="{{$four_rating_percentage}}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="la-rtng__percent body-font text-xs">{{$four_rating_percentage}}%</div>
                              </div>
        
                              <div class="la-rtng__bars d-flex flex-row align-items-start">
                                <div class="la-rtng__pg-rtng text-xs">3 star</div>
                                <div class="progress la-rtng__progress mx-3">
                                  <div class="progress-bar la-rtng__progress-bar" role="progressbar" style="width:{{$three_rating_percentage}}%" aria-valuenow="{{$three_rating_percentage}}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="la-rtng__percent body-font text-xs">{{$three_rating_percentage}}%</div>
                              </div>
        
                              <div class="la-rtng__bars d-flex flex-row align-items-start">
                                <div class="la-rtng__pg-rtng text-xs">2 star</div>
                                <div class="progress la-rtng__progress mx-3">
                                  <div class="progress-bar la-rtng__progress-bar" role="progressbar" style="width:{{$two_rating_percentage}}%" aria-valuenow="{{$two_rating_percentage}}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="la-rtng__percent body-font text-xs">{{$two_rating_percentage}}%</div>
                              </div>
        
                            <div class="la-rtng__bars d-flex flex-row align-items-start">
                              <div class="la-rtng__pg-rtng text-xs mr-1">1 star</div>
                              <div class="progress la-rtng__progress mx-3">
                                <div class="progress-bar la-rtng__progress-bar" role="progressbar" style="width:{{$one_rating_percentage}}%" aria-valuenow="{{$one_rating_percentage}}" aria-valuemin="0" aria-valuemax="100">  </div>
                              </div>
                              <div class="la-rtng__percent body-font text-xs">{{$one_rating_percentage}}%</div>
                            </div>
        
                          </div>
                        </div>
                      
                      </div>
                    </div>
                  </div>
        
                  <div class="col-md-7 col-lg-9">
                    <div class="la-rtng__review-popup mt-0">
                        <div class="text-md-right">
                          <a class="la-rtng__review text-uppercase text-nowrap" onclick="openReview()">Leave a Review</a>
                        </div>
                          <!-- Leave a Rating Popup: Start -->
                            <div class="modal fade la-rtng__review-modal" id="leave_rating">
                              <div class="modal-dialog la-rtng__review-dialog">
                                  <div class="modal-content la-rtng__review-content">
                                      <div class="modal-header la-rtng__review-header d-flex align-items-start">
                                          <h6 class="la-rtng__review-title">Leave a Review</h6>
                                          <button type="button" class="close text--black" data-dismiss="modal">&times;</button> <br/>
                                      </div>
        
                                      <div class="modal-body la-rtng__review-body">
                                        <form action="{{route('rate.course')}}" method="post" id="rate_course_form" name="rate_course_form">
                                          @csrf
                                          <div class="la-rtng__review-top">
                                            <textarea cols="60" rows="5" class="la-form__textarea la-rtng__review-textarea" name="review" id="review_input" placeholder="Type your Review here..."></textarea>
                                                
                                            <div class="la-rtng__review-stars d-flex justify-content-between align-items-center pt-4 pb-3">
                                              <div class="text-sm">Star Rating</div>
                                              <div class="starRatingContainer">
                                                <div class="rate2 text-xl" style="color:#FFC516"></div>
                                                <input id="rating_value_input" class="border-0 d-none">
                                                <input type="hidden" name="course_id" value="{{$course->id}}" class="border-0">
                                                <input id="input2" type="hidden" name="rating_value" type="text">
                                              </div>
                                            </div>                                                                                                          
                                          </div>                                       
        
                                          <div class="w-50 text-right ml-auto mt-10">
                                            <a role="button" class="btn btn-primary la-btn__app text-white color-black active py-2" onclick="submitRateCourseForm()">Submit</a>
                                          </div>
                                        </form>
                                      </div>
                                  </div>
                              </div>
                            </div>
        
                            {{-- Edit Rating Modal:Starts --}}
                                <div class="modal fade la-rtng__review-modal" id="edit_rating">
                                  <div class="modal-dialog la-rtng__review-dialog">
                                      <div class="modal-content la-rtng__review-content">
                                          <div class="modal-header la-rtng__review-header d-flex align-items-start">
                                              <h6 class="la-rtng__review-title">Edit Review</h6>
                                              <button type="button" class="close text--black" data-dismiss="modal">&times;</button> <br/>
                                          </div>
        
                                          <div class="modal-body la-rtng__review-body">
                                                <form action="{{route('update.review')}}" method="post" id="edit_rate_form" name="edit_rate_form">
                                                    @csrf
                                                    {{ method_field('PUT') }}
                                                    <div class="la-rtng__review-top">
                                                        <textarea cols="60" rows="5" class="la-form__textarea la-rtng__review-textarea" name="review" id="update_review_input" placeholder="Type your Review here..."></textarea>
                                                        
                                                        <div class="la-rtng__review-stars d-flex justify-content-between align-items-center pt-4 pb-3">
                                                          <div class="text-sm">Star Rating</div>
                                                          <div class="starRatingContainer">
                                                            <div class="rate2 text-xl" style="color:#FFC516"></div>
                                                            <input id="rating_value_input" class="border-0 d-none">
                                                            <input type="hidden" name="rating_id" id="rating_id" />
                                                            <input type="hidden" name="course_id" value="" id="rating_course_id"  class="border-0">
                                                            <input id="input2" type="hidden" name="rating_value" type="text">
                                                          </div>
                                                        </div>
                                                    </div>
        
                                                    <div class="d-flex align-items-center justify-content-between justify-content-md-end mt-10">
                                                      <a role="button" class="btn btn-danger la-btn bg-danger bg-transparent py-2">Delete</a>
                                                      <a role="button" class="btn btn-primary la-btn__app active color-black text-white py-2 ml-10 ml-md-3" onclick="$('#edit_rate_form').submit()">Update</a>
                                                    </div>
                                                </form>
                                          </div>
                                      </div>
                                  </div>
                                </div>
                            {{-- Edit Rating Modal:Ends --}}
                          <!-- Leave a Rating Popup: End -->
                    </div>
        
                    <div class="la-mcard__slider-wrap pl-0">
                      @if(count($reviews))
                      <div class="swiper-container h-100 la-lcreviews__container">
                        <div class="swiper-wrapper la-lcreviews__wrapper my-6">
        
                          @foreach($reviews as $review)
                            <div class="swiper-slide la-lcreviews__slider">
                              <div class="la-lcreviews__item">
                                <div class="d-flex align-items-start justify-content-between">
                                  <div class="la-lcreviews__prfle d-flex align-items-center ">
                                    <div class="la-lcreviews__prfle-img">
                                      <img class="img-fluid d-block lazy" src="{{ $review->user->user_img }}" data-src="{{ $review->user->user_img }}" alt="{{$review->user->fullName}}" />
                                    </div>
        
                                    <div class="la-lcreviews__prfle-info ml-2 ">
                                      <h4 class="la-lcreviews__uname text-sm text-capitalize">{{$review->user->fullName}}</h4>
                                      <div class="la-lcreviews__timestamp text-xs">
                                        @if($review->created_at->diffInWeeks(Carbon::now())> 0)
                                          {{$review->created_at->diffInWeeks(Carbon::now())}} weeks ago
                                        @elseif($review->created_at->diffInDays(Carbon::now())>0)
                                          {{$review->created_at->diffInDays(Carbon::now())}} days ago
                                        @else
                                          Today
                                        @endif
                                      </div>
                                    </div>
                                  </div>
                                  <div class="la-lcreviews__edit-comment">
                                      @if(Auth::check() && Auth::user()->id == $review->user_id)
                                        <a class="text-sm la-rtng__review-edit"  role="button" onclick="editReview({{ $review->id }}, {{ $review->course_id }}, '{{ $review->review }}', {{ $review->rating }})">
                                          <span class="la-icon la-icon--md icon-edit"></span>
                                        </a>
                                      @endif
                                  </div>                        
                                </div>                          
        
                                <div class="la-lcreviews__content pt-3">
                                  <div class="la-lcreviews__ratings"> @for($couter=1 ; $couter <= $review->rating; $couter++)<span class="la-icon--md icon-star la-rtng__fill"></span>@endfor  @for($couter=1 ; $couter <= 5 - $review->rating; $couter++)<span class="la-icon--md icon-star la-rtng__unfill"></span>@endfor</div>
                                  <div class="la-lcreviews__comment text-sm pt-1">{{$review->review}}</div>
                                </div>
                              </div>
        
                              <div class="d-flex align-items-center mx-2 mt-1">
                                  <a class="la-lcreviews__comment-reply" role="button">Reply</a>
                                  <div class="la-lcreviews__comment-count ml-2 pl-3">4 Comments</div>
                              </div>
                            </div>                    
                          @endforeach
        
                        </div>
                      </div>
                      <div class="swiper-pagination swiper-pagination-custom la-lcreviews__pagination"></div>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
              <!-- Reviews Tab : End -->

              <!-- Resources : Start -->
              {{-- @if($video_access == true)
                <div class="tab-pane fade" id="cnav-resource" role="tabpanel" aria-labelledby="cnav-resource-tab">

                    @if(count($course->resources) == 0)
                        <div class=" la-anim__wrap text-center">
                            <div class="la-empty__inner mb-0 la-anim__stagger-item">
                                <h6 class="la-empty__course-title text-2xl py-8" style="color:var(--gray8);font-weight:var(--font-medium);">No Resources available for this Class.</h6>
                              </div>
                        </div>
                    @else
                      <div class="col-lg px-0 d-flex">
                        @foreach ( $course->resources as $resource)
                          <div class="col-12 col-md col-lg px-0">
                            <div class="la-ctabs__resources d-flex">
                              <div class="la-ctabs__resources-pdf"><i class="la-icon--5xl icon-pdf mr-4"></i></div>
                              <div class="la-ctabs__resources-desc">
                                <div class="la-ctabs__resources-title text-lg  text-uppercase">{{$resource->file_name}}</div><a class="la-ctabs__resources-file text-sm" href="{{$resource->file_url}}" target="_blank">Download Now</a>
                              </div>
                            </div>
                          </div>
                        @endforeach
                      </div>
                      <!-- <div class="col-12 px-0 d-flex justify-content-end"> <a class="la-ctabs__download-all text-sm" href=""><span class="text-uppercase">DOWNLOAD ALL<span class="pl-1 la-icon icon-download"> </span></span></a></div> -->
                    @endif
              </div> --}}
              <!-- Resources : End -->


              {{-- <div class="tab-pane fade" id="cnav-certificate" role="tabpanel" aria-labelledby="cnav-certificate-tab">
                  <div class="col-lg px-0 d-flex">
                    <div class="col-12 col-md-6 col-lg px-0">
                      <div class="la-ctabs__certificate d-flex">
                        <div class="la-ctabs__certificate-pdf"><i class="la-icon--5xl icon-certificate mr-4"></i></div>
                        <div class="la-ctabs__certificate-desc">
                          <div class="la-ctabs__certificate-title text-lg text-uppercase">Water Color</div><a target="_blank" class="la-ctabs__certificate-file text-sm" href="/download-certificate/{{$course->id}}">watercolor_certificate.pdf</a>
                        </div>
                      </div>
                    </div>
                  </div>
              </div> 
              @endif --}}

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Chapters/About/Reviews Section: End-->


  <!-- Purchase Class Section : Start -->
  <section class="la-vcourse__purchase la-section__small d-none d-md-block" >
      <div class="container-fluid la-vcourse__purchase-inwrap la-anim__wrap">
          <div class="row">
              <div class="col-12 px-0 px-md-4 text-center position-relative la-anim__stagger-item">
                  <div class="la-vcourse__purchase-content la-section position-relative" style="background:url('../../../images/learners/course-benefits/learn.jpg') no-repeat center;">
                    <div class="la-title la-title--purple la-vcourse__purchase-title leading-snug text-3xl text-md-4xl mb-8 la-anim__stagger-item">
                        <span class="la-title--circle position-relative"></span>
                        <span class="position-relative text-white">Learn your skills</span>
                    </div>

                    <div class="la-vcourse__buy mx-6 mx-md-1 d-md-flex justify-content-center la-anim__stagger-item--x">
                        @if ($course->isPurchased() == null)
                          <div class="la-vcourse__buy-btn text-center">
                            <form class="la-vcourse__purchase-form" id="add_to_cart_form_1" name="add_to_cart_form" method="post" action="/add-to-cart">
                              <input type="hidden" name="course_id" value="{{$course->id}}" />
                              <input type="hidden" value="all-classes" name="classes" />
                              @csrf
                              <a class="la-vcourse__buy-course btn btn-primary la-btn__app border-white d-lg-inline-flex justify-content-end mr-2 px-4 py-3 mb-2 mb-md-0" @if(auth()->check()) onclick="$('#add_to_cart_form_1').submit()" @else data-toggle="modal" data-target="#locked_login_modal" @endif>Buy this Class</a><br/>
                              <span class="text-white" style="opacity:0.65;font-family:'Roboto',sans-serif;font-weight:var(--font-light); ">@ {{ getSymbol() }}{{$course->convertedprice}}</span>
                            </form>
                          </div>
                        @endif
                        
                        @if ( !auth()->check() ||  ( (auth()->check() && !Auth::User()->subscription()) || (auth()->check() && !Auth::User()->subscription()->active())  ) )
                          <div class="la-vcourse__buy-btn text-center">
                            <a class="la-vcourse__buy-course btn btn-primary la-btn__white d-lg-inline-flex justify-content-end py-3 mb-2" href="/learning-plans">Subscribe for Free</a><br/>
                            <span class="text-white" style="opacity:0.65;font-weight:var(--font-light);">Access all Courses & Classes</span>
                          </div>
                        @endif
                    </div>

                  </div>
              </div>
          </div>
      </div>
  </section>
  <!--  Purchase Class Section : End -->


  <!-- Watch Next Section: Start-->
  <section class="la-section__small">
    <div class="la-section__inner">
      <div class="container-fluid la-anim__wrap">
        <h2 class="la-section__title text-xl text-md-2xl mb-10 la-anim__stagger-item">Watch Next</h2>

          @if(count($related_courses) == 0)

            <div class="la-empty__courses w-100 d-md-flex justify-content-between align-items-center mt-0 mt-md-6 la-anim__stagger-item">
                <div class="col la-empty__inner mb-0">
                  <h6 class="la-empty__course-title text-md text-md-xl la-anim__stagger-item--x">No more Classes available right now!</h6>
                </div>
            </div>

          @else

            <div class="row row-cols-md-2 row-cols-lg-3 row-cols-xl-4 la-anim__stagger-item--x ">
              @foreach ($related_courses as $related_course)
                  <x-course
                      :id="$related_course->id"
                      :img="$related_course->preview_image"
                      :course="$related_course->title"
                      :url="$related_course->slug"
                      :rating="round($related_course->average_rating, 2)"
                      :creatorImg="$related_course->user->user_img"
                      :creatorName="$related_course->user->fullName"
                      :creatorUrl="$related_course->user->id"
                      :learnerCount="$related_course->learnerCount"
                      :price="$related_course->price"
                      :bought="$related_course->isPurchased()"
                      :checkWishList="$course->checkWishList"
                      :checkCart="$course->checkCart"
                      :videoCount="$course->videoCount"
                      :chapterCount="$course->videoCount"
                      :progress="$course->getProgress()"
                  />
              @endforeach
            </div>
          @endif

      </div>
    </div>
  </section>
  <!-- Watch Next Section: End-->


  <!-- Section CTA's Before Login/Subscribe in Mobile Responsive : Start -->
  <section class="d-block d-md-none">
    <div class="la-section__inner">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="la-vcourse__buy-course--mobile">
              <div class="d-flex justify-content-between align-items-center">
                @if ( !auth()->check() ||  ( (auth()->check() && !Auth::User()->subscription()) || (auth()->check() && !Auth::User()->subscription()->active())  ) )
                <div class="la-vcourse__buy-btn text-center mb-0">
                  <a class="la-vcourse__buy-course--mobile-btn btn btn-primary la-btn__app active text-white" href="/learning-plans">Try it for Free</a>
                </div>
                @endif

                @if ($course->isPurchased() == null)
                <div class="la-vcourse__buy-btn text-center ml-2 mb-0">
                  <form class="la-vcourse__purchase-form" id="add_to_cart_form_1" name="add_to_cart_form" method="post" action="/add-to-cart">
                    <input type="hidden" name="course_id" value="{{$course->id}}" />
                    <input type="hidden" value="all-classes" name="classes" />
                    @csrf
                    <a class="la-vcourse__buy-course--mobile-btn btn btn-primary la-btn__app border-white" @if(Auth::check()) onclick="$('#add_to_cart_form_1').submit()" @else data-toggle="modal" data-target="#locked_login_modal" @endif>
                      <span class="pr-1">Buy Now</span>
                      <span  style="font-family:'Roboto',sans-serif">@ {{ getSymbol() }}{{$course->convertedprice}}</span>
                    </a>
                  </form>
                </div>
                @endif
            </div>
          </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Section CTA's Before Login/Subscribe in Mobile Responsive : Start -->


@endsection

@section('footerScripts')
  <script>var course_id = {!! json_encode($course_id) !!};</script>
  <!-- video js -->
  <script src="https://unpkg.com/video.js/dist/video.js"></script>
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/videojs-contrib-hls/5.15.0/videojs-contrib-hls.min.js" integrity="sha512-R1+Pgd+uyqnjx07LGUmp85iW8MSL1iLR2ICPysFAt8Y4gub8C42B+aNG2ddOfCWcDDn1JPWZO4eby4+291xP9g==" crossorigin="anonymous"></script> --}}
  <!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->
  <script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
  <script src="https://unpkg.com/@silvermine/videojs-quality-selector/dist/js/silvermine-videojs-quality-selector.min.js"></script>
  <script src="{{asset('/js/rater.min.js')}}" charset="utf-8"></script>
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/videojs-contrib-quality-levels/2.0.9/videojs-contrib-quality-levels.min.js" integrity="sha512-zkCFMhOIASwe5fZfTUz26vG8miAAMOM6EzleZtBx28ZkCvhp7+6NVZC6iroJiNizWNh+pfQMgjo4Iv8ro9tSuw==" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/videojs-hls-quality-selector@1.1.4/dist/videojs-hls-quality-selector.cjs.min.js"></script> --}}
  {{-- <script src="https://unpkg.com/@videojs/http-streaming@2.3.0/dist/videojs-http-streaming.min.js"></script> --}}
  {{-- <script src="https://unpkg.com/@videojs/http-streaming@2.3.0/dist/videojs-http-streaming.js"></script> --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
  <script src="/js/scripts/video-progress-log.js"></script>
  <script>


            $("form[name='rate_course_form']").validate({

                  rules: {
                    review: {
                      required: true,
                      minlength: 3
                    }
                  },
                  // Specify validation error messages
                  messages: {
                    review: {
                      required: "Please provide a review.",
                      minlength: "Review must be 3 characters in length."
                    }
                  },
                  // Make sure the form is submitted to the destination defined
                  // in the "action" attribute of the form when valid
                  submitHandler: function(form) {
                    form.submit();
                  }

                });


                function submitRateCourseForm(){
                    $('#rate_course_form').submit();
                }

                $("form[name='add_to_cart_form']").validate({

                    rules: {

                      classes: {
                        required: true,
                      },
                      selected_classes: {
                        required: true,
                      }
                    },
                    // Specify validation error messages
                    messages: {
                      classes: {
                        required: "Please select the type of purchase.",
                      },
                      selected_classes: {
                        required: "Please select classes.",
                      }
                    },
                    // Make sure the form is submitted to the destination defined
                    // in the "action" attribute of the form when valid
                    submitHandler: function(form) {
                      form.submit();
                    }

                });

                $('input[type=radio][name=classes]').change(function() {
                    if (this.value == 'all-classes') {
                        $('.selected_classes').prop('checked', true);
                    }
                    if(this.value == 'select-classes'){
                      $('.selected_classes').removeAttr('checked');
                    }

                });

                $('.selected_classes').change(function(){

                    if($('.selected_classes').not(":checked"))
                    {
                      $('#selectClasses').prop('checked', true);
                    }

                    if ($('.selected_classes:checked').length == $('.selected_classes').length) {
                      $('#allClasses').prop('checked', true);
                    }
                });

              function openReview(){

                  var options = {
                  max_value: 5,
                  step_size: 1,
                  url: '/',
                  initial_value: 3,
                  update_input_field_name: $("#input2, #rating_value_input, #rating_value_input2, #input3"),
                  };

                  $(".rate2").rate(options);
                  $('#leave_rating').modal('show');

              }

              function editReview(review_id, course_id, review, rating_value){

                  $('#rating_id').val(review_id);
                  $('#rating_course_id').val(course_id);
                  $('#update_review_input').val(review);

                  var options = {
                    max_value: 5,
                    step_size: 1,
                    url: '/',
                    initial_value: rating_value,
                    update_input_field_name: $("#input2, #rating_value_input, #rating_value_input2, #input3"),
                  }
                // $('#input2').change(function(){
                //     $('#reating_value_input').val($this.val());
                // });
                $(".rate2").rate(options);

                $('#edit_rating').modal('show');

              }





  </script>
@endsection
