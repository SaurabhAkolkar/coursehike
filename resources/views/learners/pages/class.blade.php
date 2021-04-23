@extends('learners.layouts.app')

@section('seo_content')
    <title>{{ $course->title }} | Classes | Best Online Courses for Art & Creativity | LILA</title>
    <meta name='description' itemprop='description' content='Best Online Courses in art & creativity for creative minds Get Started for free and learn from passionate creators & mentors all around the world. Join now' />

    <meta property="og:description" content="Best Online Courses in art & creativity for creative minds Get Started for free and learn from passionate creators & mentors all around the world. Join now" />
    <meta property="og:title" content="Courses | Best Online Courses for Art & Creativity | LILA" />
    <meta property="og:url" content="{{Request::url()}}" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="LILA Art" />
    <meta property="og:image" content="{{$course->preview_image}}" />
    <meta property="og:image:url" content="{{$course->preview_image}}" />
    <meta property="og:image:size" content="300" />

    <meta name="twitter:card"content="summary" />
    <meta name="twitter:title"content="Courses | Best Online Courses for Art & Creativity | LILA" />
    <meta name="twitter:site"content="@lilaaliens" />
    
    <script type="application/ld+json">{"@context":"https://schema.org","@type":"WebPage","name":"Courses | Best Online Courses for Art & Creativity | LILA"}</script>
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

<section class="la-section__small">
    <div class="la-vcourse">
      <div class="container-fluid">
        <div class="d-flex flex-wrap mb-12 la-anim__wrap"> 
          <div class="la-vcourse__intro-left">
            <div class="la-vcourse__header d-flex flex-column align-items-start ">
              <h6 class="la-vcourse__tag text-uppercase la-anim__fade-in-top"> Class</h6>
              <h1 class="la-vcourse__title leading-none la-anim__stagger-item mb-2">{{ $course->title }}</h1>
              {{-- <div class="la-vcourse__badges la-anim__stagger-item">
                <img src="/images/learners/icons/badge.svg" alt="badge">
              </div> --}}
            </div>

            {{--<div class="la-rtng__icons d-inline-flex la-anim__stagger-item">
              @for($counter=1;$counter <= round($average_rating); $counter++)
                  <div class="la-icon la-icon--2xl icon-star la-rtng__fill"> </div>
              @endfor

              @for($counter=1;$counter <= 5-round($average_rating); $counter++)
                  <div class="la-icon la-icon--2xl icon-star la-rtng__unfill"> </div>
              @endfor                      
            </div>--}}

            <p class="la-vcourse__excerpt mb-5 la-anim__stagger-item">{{ $course->short_detail }}</p>
            <div class="la-vcourse__creator d-flex align-items-center la-anim__stagger-item">
              <div class="la-vcourse__creator-avator la-anim__fade-in-left"><img src="{{ $course->user->user_img }}" class="img-fluid" alt=""></div>
              <div class="la-vcourse__creator-name text-capitalize la-anim__stagger-item--x">{{ $course->user->fname }}</div>
            </div>

            {{-- <div class="la-vcourse__primary-info d-flex mt-5">
                <div class="la-vcourse__classes-info pr-2 la-anim__stagger-item--x">
                  <span class="la--count">{{ $course->chapter->count() }}</span>
                  <span class="la--label">Chapters</span>
                </div>
                <div class="la-vcourse__videos-info pl-2 la-anim__stagger-item--x">
                  <span class="la--count">{{ $course->courseclass->count() }}</span>
                  <span class="la--label">Videos</span>
                  @php
                      $startTime = \Carbon\Carbon::parse('2020-12-05T01:18:36.862+00:30');
                      $finishTime = \Carbon\Carbon::parse('2020-12-05T01:18:36.862+1:30');

                      $totalDuration = $finishTime->diffInHours($startTime);
                      
                  @endphp
                </div>
              </div> --}}

            <div class="row la-anim__wrap mt-6">
              <div class="col">
                <ul class="list-unstyled d-block d-lg-flex align-items-center">
                  <li class="la-vcourse__videos-info mr-6 mr-lg-8 la-anim__stagger-item text-sm">
                    <span class="la--count">{{ $course->courseclass->count() }}</span>
                    <span class="la--label">Videos</span>
                    @php
                        $startTime = \Carbon\Carbon::parse('2020-12-05T01:18:36.862+00:30');
                        $finishTime = \Carbon\Carbon::parse('2020-12-05T01:18:36.862+1:30');

                        $totalDuration = $finishTime->diffInHours($startTime);
                        
                    @endphp
                  </li>
                  <li class="la-vcourse__duration mr-6 mr-lg-8 la-anim__stagger-item"><span class="la-text-gray4">Duration: </span>  <span class="font-normal">{{ $course->duration }} Hrs</span></li>
                  <li class="la-vcourse__updatedon mr-6 mr-lg-8 la-anim__stagger-item"><span class="la-text-gray4">Last Updated: </span>  <span class="font-normal">{{ $course->updated_at->format('d-M Y') }}</span></li>
                  <li class="la-vcourse__languages mr-6 mr-lg-8 la-anim__stagger-item"> <span class="la-text-gray4">Languages: </span> <span class="font-normal"> {{$course->language->name}}</span> </li>
                </ul>
              </div>
            </div>
          </div>
          
          <div class="la-vcourse__intro-right pt-10 d-flex flex-column justify-content-start justify-content-lg-between align-items-center align-items-md-end la-anim__wrap">
            
              <div class="la-vcourse__buy w-100 d-md-flex flex-wrap align-items-start justify-content-lg-end text-lg-right mb-1 mb-md-6 la-anim__stagger-item--x">
                @if ( !auth()->check() ||  ( (auth()->check() && !Auth::User()->subscription()) || (auth()->check() && !Auth::User()->subscription()->active())  ) )
                  <div class="la-vcourse__buy-btn text-center">
                    <form class="la-vcourse__purchase-form" id="add_to_cart_form_1" name="add_to_cart_form" method="post" action="/add-to-cart">
                      <input type="hidden" name="course_id" value="{{$course->id}}" />
                      <input type="hidden" value="all-classes" name="classes" />
                      @csrf
                      <a class="la-vcourse__buy-course btn  la-btn la-btn--app color-grey d-lg-inline-flex justify-content-end mr-2 mb-2 px-4 mb-md-0" @if(Auth::check()) onclick="$('#add_to_cart_form_1').submit()" @else data-toggle="modal" data-target="#locked_login_modal" @endif>Buy this Class</a><br/>
                      <span class="text-grey">@ {{ getSymbol() }}{{$course->convertedprice}}</span>
                    </form>
                  </div>

                  <div class="la-vcourse__buy-btn text-center">
                    <a class="la-vcourse__buy-course btn btn-primary la-btn la-btn--primary d-lg-inline-flex justify-content-end mb-2 active" href="/learning-plans">Subscribe for Free</a><br/>
                    <span class="text-grey">Access all Courses & Classes</span>
                  </div>
                @endif
              </div>

              <div class="w-100 d-md-flex flex-column flex-lg-row flex-wrap justify-content-lg-end">
                @if(auth()->check())
                  <div class="la-vcourse__buy-progress text-center la-anim__stagger-item--x  mb-6 mb-md-0">
                    <div class="la-vcourse__buy-complete mt-5 mb-1 w-100 text-center text-md-left">
                      <span class="pr-2" style="color:var(--green)">{{$course->getProgress()}}%</span> <span style="color:var(--gray8)"> Completed</span>
                    </div>
                    <div class="progress la-rtng__progress w-100"> 
                      <div class="progress-bar la-rtng__progress-bar" role="progressbar" style="width:{{$course->getProgress()}}%" aria-valuenow="{{$course->getProgress()}}" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                @endif

                <div class="la-vcourse__info-items d-flex align-items-center  justify-content-center justify-content-md-start justify-content-lg-end la-anim__stagger-item--x">
                  <div class="la-vcourse__info-item la-vcourse__info--videos d-flex flex-column align-items-center justify-content-end">
                    <div class="la--count ">{{ $course->courseclass->count() }}</div>
                    <span class="la--label mt-2">Videos</span>
                  </div>
                  <div class="la-vcourse__info-item la-vcourse__info--learners d-flex flex-column align-items-center justify-content-end mx-10">
                    <div class="la--count">{{$course->learnerCount}}</div>
                    <span class="la--label mt-2">Learners</span>
                  </div>
                  <div class="la-vcourse__info-item la-vcourse__info--level d-flex flex-column align-items-center justify-content-end">
                    <div class="la--icon mt-n3 la-anim__stagger-item--x">
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
              </div>

          </div>
        </div>

        <div id="vcourse_row" class="la-vcourse__class-row d-flex flex-wrap la-anim__wrap">
          <div class="la-vcourse__class-col la-vcourse__class-col--video  la-anim__stagger-item">
            <div class="la-player la-vcourse__video-wrap mb-3">
              
                <video-js
                  id="lila-video"
                  class="la-vcourse__video video-js"
                  controls
                  preload="auto"
                  width="100%"
                  height="100%"
                  poster="{{ $course->preview_image }}"
                  data-setup="{}"
                  type="application/x-mpegURL" 
                >
                  <source src="{{ $course->getSignedStreamURL()}}" type="application/x-mpegURL" />
                  <p class="vjs-no-js"></p>
                </video-js>
              
            </div>
            <h2 class="la-vlesson__title m-0  text-capitalize la-anim__stagger-item">{{ $course->title}} - Class Preview</h2>
            <small class="la-vlesson__creator text-capitalize la-anim__stagger-item">{{ $course->user->fname }}</small>
          </div>

          <div class="la-vcourse__class-col la-vcourse__class-col--video-list px-0 px-md-2 la-anim__stagger-item--x">
            <div class="la-vcourse__curriculam ">
              @foreach($course->chapter as $class)
              <div class="la-vcourse__class la-anim__stagger-item">
                <div class="la-vcourse__class-header d-flex mb-7 ml-5 ">
                  <div class="la-vcourse__class-thumb"><img class="img-fluid mx-auto" src="{{$class->thumbnail}}"></div>
                  <div class="d-flex flex-column ml-3">
                    <div class=" leading-snug ">
                          <span class="la-vcourse__class-title text-sm text-uppercase pr-1">{{$class->chapter_name}}</span>
                          <small class="la-vcourse__class-videoscount pl-2">{{$class->courseclass->count()}} Videos</small>
                    </div>
                    <div class="la-vcourse__class-title--chapter text-sm">All about tattoo machines</div>                    
                  </div>
                </div>

                <div class="la-vcourse__lessons">

                  @foreach ($class->courseclass as $class_video)
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
                      :author="$class_video->courses->user->fname"
                      :watchduration="$class_video->duration"
                      :statuspercentage="$class_video->getProgress()"
                      :access="$lesson_access"
                    />
                  @endforeach
                </div>
              </div>
              @endforeach
            </div>
            <div class="la-vcourse__btn-wrap text-center mt-3 la-anim__wrap">
              <div id="vcourseFullView" class="la-btn__arrow-down la-vcourse__btn d-inline-block la-anim__stagger-item">
                <span class="icon-down-arrow la-btn__icon la-btn__icon--grey"></span>
                <div class="la-btn__text la-btn__text--purple">See the list</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Section: End-->
  <!-- Section: Start-->
  <section class="la-section__small">
    <div class="la-section__inner">
      <div class="container-fluid">
        <div class="la-ctabs d-none d-sm-block la-anim__wrap">
          <nav class="la-courses__nav la-anim__stagger-item--x">
            <ul class="nav nav-pills la-courses__nav-tabs " id="cnav-tab" role="tablist">
              <li class="nav-item la-courses__nav-item "><a class="nav-link la-courses__nav-link active text-capitalize" id="cnav-about-tab" data-toggle="tab" href="#cnav-about" role="tab" aria-controls="cnav-about" aria-selected="true">About</a></li>
              @if($video_access == true)
                <li class="nav-item la-courses__nav-item"><a class="nav-link la-courses__nav-link text-capitalize" id="cnav-resource-tab" data-toggle="tab" href="#cnav-resource" role="tab" aria-controls="cnav-resource" aria-selected="false">Resources</a></li>
                {{-- <li class="nav-item la-courses__nav-item"><a class="nav-link la-courses__nav-link text-capitalize" id="cnav-certificate-tab" data-toggle="tab" href="#cnav-certificate" role="tab" aria-controls="cnav-certificate" aria-selected="false">Certificate</a></li> --}}
              @endif
            </ul>
          </nav>
          
          <div class="tab-content la-courses__nav-content" id="cnav-tabContent">
            <div class="tab-pane fade show active" id="cnav-about" role="tabpanel" aria-labelledby="cnav-about-tab">
              <div class="col-lg-11 px-0">
                <div class="la-ctabs__about-section la-anim__wrap">
                  <div class="la-ctabs__about la-anim__stagger-item">
                    <div>{!! $course->short_detail !!}</div>
                    <div>{!! $course->detail  !!}</div>
                    {{--<div class="la-ctabs__about-collapse collapse" id="about_collapse">
                      {!! $course->detail  !!}
                    </div> --}}
                    
                  </div>
                  
                  {{-- <div class="la-vcourse__btn-wrap text-right mt-3 la-anim__stagger-item pr-1 pr-lg-4">
                    <a class="la-btn__arrow-down la-vcourse__btn-collapse d-inline-block text-center collapsed" data-toggle="collapse" href="#about_collapse">
                      <div class="la-vcourse__btn-text la-btn__text la-btn__text--purple pt-4">Read More</div>
                    </a>
                  </div> --}}
                </div>
              </div>
            </div>

            @if($video_access == true)
              <div class="tab-pane fade" id="cnav-resource" role="tabpanel" aria-labelledby="cnav-resource-tab">
                
                  @if(count($course->resources) == 0)
                      <div class=" la-anim__wrap text-center">
                          <div class="la-empty__inner mb-0 la-anim__stagger-item">
                              <h6 class="la-empty__course-title text-2xl py-8" style="color:var(--gray8);">No Resources available for this Class.</h6>
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
              </div>


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
              </div> --}}

            @endif
          </div>
        </div>

        <!-- Mobile Version: Start -->
        <div class="la-ctabs d-block d-sm-none">
          <div class="la-ctabs__content la-anim__wrap">
            <!-- About -->
            <div class="col-12 mb-6 px-0 ">
              <h5 class="la-ctabs__title mb-4 la-anim__stagger-item">About</h5>
                <div class="col-12 col-lg px-0">
                  <div class="la-ctabs__about la-anim__stagger-item--x">
                    {!! $course->short_detail !!}
                    <span class="la-ctabs__about-collapse collapse" id="read_more">
                      {!! $course->detail !!}
                    </span>
                  </div>
                 
                  <div class="la-vcourse__btn-wrap text-center la-anim__stagger-item--x">
                    <a class="la-btn__arrow-down la-vcourse__btn-collapse d-inline-block text-center collapsed" data-toggle="collapse" href="#read_more">
                      <div class="la-vcourse__btn-text la-btn__text la-btn__text--purple pt-4">Read More</div>
                    </a>
                  </div>
                </div>
            </div>

            <!-- Resources -->
            @if($video_access == true)
            <div class="col-12 mb-4 px-0">
              <h5 class="la-ctabs__title mb-4 la-anim__stagger-item">Resources</h5>

              @if(count($course->resources) == 0)
                  <div class=" la-anim__wrap text-center pt-4 pb-10">
                    <div class="la-empty__inner mb-0 la-anim__stagger-item">
                      <h6 class="la-empty__course-title text-xl" style="color:var(--gray8);">No Resources available for this Class.</h6>
                      </div>
                  </div>
              @else
                  @foreach ( $course->resources as $resource)
                    <div class="col-12 col-md col-lg px-0">
                      <div class="la-ctabs__resources d-flex">
                        <div class="la-ctabs__resources-pdf la-anim__stagger-item--x"><i class="la-icon--xl la-ctabs__resources-download icon-pdf mr-3"></i></div>
                        <div class="la-ctabs__resources-desc la-anim__stagger-item--x">
                          <div class="la-ctabs__resources-title text-uppercase">{{$resource->file_name}}</div><a class="la-ctabs__resources-file text-sm" href="{{$resource->file_url}}" target="_blank">Download Now</a>
                        </div>
                      </div>
                    </div>
                  @endforeach
                  <!-- <div class="col-12 mb-4 text-right la-anim__wrap"><a class="la-ctabs__download-all la-anim__stagger-item--x" href=""><span class="text-uppercase text-sm">DOWNLOAD ALL<span class="pl-1 la-icon icon-download"> </span></span></a></div> -->
              @endif
            </div>
            
            

            <!-- Certificate -->
            {{-- <div class="col-12 mb-4 px-0">
              <h5 class="la-ctabs__title mb-4 la-anim__stagger-item">Certificate</h5>
              <div class="col-12 col-md-6 col-lg px-0">
                <div class="la-ctabs__certificate d-flex">
                  <div class="la-ctabs__certificate-pdf la-anim__stagger-item--x"><i class="la-icon--xl la-ctabs__resources-download icon-certificate mr-3"></i></div>
                  <div class="la-ctabs__certificate-desc la-anim__stagger-item--x">
                    <div class="la-ctabs__certificate-title text-uppercase">{{$course->title}}</div><a class="la-ctabs__certificate-file text-sm" href="">{{$course->title}}.pdf</a>
                  </div>
                </div>
              </div>
            </div> --}}
            @endif
          </div>
        </div>
         <!-- Mobile Version: End -->
      </div>
    </div>
  </section>
  <!-- Section: End-->


  <!--  Section PUrchase : Start -->
  <section class="la-vcourse__purchase">
      <div class="container-fluid  la-vcourse__purchase-inwrap la-anim__wrap">
          <div class="row">
              <div class="col-12 text-center position-relative">
                  <div class="la-vcourse__purchase-content la-section--grey la-section position-relative">
                    <div class="la-title  la-title--purple la-vcourse__purchase-title leading-snug  mb-6 mb-md-14 la-anim__fade-in-top">
                        <span class="la-title--circle position-relative"></span>
                        <span class="position-relative">Learn your skills</span>
                    </div>

                    <div class="la-vcourse__buy mx-6 mx-md-1 d-md-flex justify-content-center la-anim__stagger-item">
                        @if ( !auth()->check() ||  ( (auth()->check() && !Auth::User()->subscription()) || (auth()->check() && !Auth::User()->subscription()->active())  ) )
                          <div class="la-vcourse__buy-btn text-center">
                            <form class="la-vcourse__purchase-form" id="add_to_cart_form_1" name="add_to_cart_form" method="post" action="/add-to-cart">
                              <input type="hidden" name="course_id" value="{{$course->id}}" />
                              <input type="hidden" value="all-classes" name="classes" />
                              @csrf
                              <a class="la-vcourse__buy-course btn  la-btn la-btn--app color-grey d-lg-inline-flex justify-content-end mr-2 mb-2 px-4 mb-md-0" @if(Auth::check()) onclick="$('#add_to_cart_form_1').submit()" @else data-toggle="modal" data-target="#locked_login_modal" @endif>Buy this Class</a><br/>
                              <span style="color:var(--gray7)">@ {{ getSymbol() }}{{$course->convertedprice}}</span>
                            </form>
                          </div>

                          <div class="la-vcourse__buy-btn text-center">
                            <a class="la-vcourse__buy-course btn btn-primary la-btn la-btn--primary d-lg-inline-flex justify-content-end mb-2 active" href="/learning-plans">Subscribe for Free</a><br/>
                            <span style="color:var(--gray7)">Access all Courses & Classes</span>
                          </div>
                        @endif
                    </div>

                  </div>
              </div>
          </div>
      </div>
  </section>
  <!--  Section PUrchase : End -->

  <!-- Section: Start-->
  <section class="la-section__small">
    <div class="la-section__inner">
      <div class="container-fluid la-rtng__container">
        <div class="row">
          <div class="col-lg-5">
            <li class="la-rtng__item">
              <div class="la-rtng__inner d-flex flex-column flex-md-row justify-content-between ">
                <div class=" la-anim__wrap">
                    <h3 class="la-rtng__title text-xl text-2xl la-anim__stagger-item">Reviews &amp; Ratings</h3>
                  <div class="la-rtng__wrapper d-flex flex-column flex-md-row justify-content-between">
                    <div class="la-rtng__overall text-left text-md-center la-anim__stagger-item">
                      <div class="la-rtng__total body-font text-5xl">{{$average_rating}}</div>
                      <div class="la-rtng__icons d-inline-flex">
                        @for($counter=1;$counter <= round($average_rating); $counter++)
                            <div class="la-icon la-icon--xl icon-star la-rtng__fill"> </div>
                        @endfor

                        @for($counter=1;$counter <= 5-round($average_rating); $counter++)
                            <div class="la-icon la-icon--xl icon-star la-rtng__unfill"> </div>
                        @endfor                      
                        
                      </div>
                      <div class="la-rtng__course body-font text-sm mt-n1 px-3 px-md-0">Course Rating</div>
                    </div>
                    <div class="la-rtng__indicators la-anim__stagger-item">
                      <div class="la-rtng__bars d-flex flex-row jsutify-content-between">
                        <div class="progress la-rtng__progress">
                          <div class="progress-bar la-rtng__progress-bar" role="progressbar" style="width:{{$five_rating_percentage}}%" aria-valuenow="{{$five_rating_percentage}}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="la-rtng__pg-rtng d-inline-flex px-3">
                          <div class="la-icon--md icon-star la-rtng__fill"></div>
                          <div class="la-icon--md icon-star la-rtng__fill"></div>
                          <div class="la-icon--md icon-star la-rtng__fill"></div>
                          <div class="la-icon--md icon-star la-rtng__fill"></div>
                          <div class="la-icon--md icon-star la-rtng__fill"></div>
                        </div>
                        <div class="la-rtng__percent body-font text-xs">{{$five_rating_percentage}}%</div>
                      </div>
                      <div class="la-rtng__bars d-flex flex-row jsutify-content-between">
                        <div class="progress la-rtng__progress">
                          <div class="progress-bar la-rtng__progress-bar" role="progressbar" style="width:{{$four_rating_percentage}}%" aria-valuenow="{{$four_rating_percentage}}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="la-rtng__pg-rtng d-inline-flex px-3">
                          <div class="la-icon--md icon-star la-rtng__fill"></div>
                          <div class="la-icon--md icon-star la-rtng__fill"></div>
                          <div class="la-icon--md icon-star la-rtng__fill"></div>
                          <div class="la-icon--md icon-star la-rtng__fill"></div>
                          <div class="la-icon--md icon-star la-rtng__unfill"></div>
                        </div>
                        <div class="la-rtng__percent body-font text-xs">{{$four_rating_percentage}}%</div>
                      </div>
                      <div class="la-rtng__bars d-flex flex-row jsutify-content-between">       
                        <div class="progress la-rtng__progress">
                          <div class="progress-bar la-rtng__progress-bar" role="progressbar" style="width:{{$three_rating_percentage}}%" aria-valuenow="{{$three_rating_percentage}}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="la-rtng__pg-rtng d-inline-flex px-3">
                          <div class="la-icon--md icon-star la-rtng__fill"></div>
                          <div class="la-icon--md icon-star la-rtng__fill"></div>
                          <div class="la-icon--md icon-star la-rtng__fill"></div>
                          <div class="la-icon--md icon-star la-rtng__unfill"></div>
                          <div class="la-icon--md icon-star la-rtng__unfill"></div>
                        </div>
                        <div class="la-rtng__percent body-font text-xs">{{$three_rating_percentage}}%</div>
                      </div>
                      <div class="la-rtng__bars d-flex flex-row jsutify-content-between">       
                        <div class="progress la-rtng__progress">
                          <div class="progress-bar la-rtng__progress-bar" role="progressbar" style="width:{{$two_rating_percentage}}%" aria-valuenow="{{$two_rating_percentage}}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="la-rtng__pg-rtng d-inline-flex px-3">
                          <div class="la-icon--md icon-star la-rtng__fill"></div>
                          <div class="la-icon--md icon-star la-rtng__fill"></div>
                          <div class="la-icon--md icon-star la-rtng__unfill"></div>
                          <div class="la-icon--md icon-star la-rtng__unfill"></div>
                          <div class="la-icon--md icon-star la-rtng__unfill"></div>
                        </div>
                        <div class="la-rtng__percent body-font text-xs">{{$two_rating_percentage}}%</div>
                      </div>
                      <div class="la-rtng__bars d-flex flex-row jsutify-content-between">       
                        <div class="progress la-rtng__progress">
                          <div class="progress-bar la-rtng__progress-bar" role="progressbar" style="width:{{$one_rating_percentage}}%" aria-valuenow="{{$one_rating_percentage}}" aria-valuemin="0" aria-valuemax="100">  </div>
                        </div>
                        <div class="la-rtng__pg-rtng d-inline-flex px-3">
                          <div class="la-icon--md icon-star la-rtng__fill"></div>
                          <div class="la-icon--md icon-star la-rtng__unfill"></div>
                          <div class="la-icon--md icon-star la-rtng__unfill"></div>
                          <div class="la-icon--md icon-star la-rtng__unfill"></div>
                          <div class="la-icon--md icon-star la-rtng__unfill"></div>
                        </div>
                        <div class="la-rtng__percent body-font text-xs">{{$one_rating_percentage}}%</div>
                      </div>
                    </div>
                  </div>
                </div>

               
              </div>
            </li>
          </div>

          <div class="col-lg-7">
            <div class="la-rtng__review-popup la-anim__wrap">
                {{-- <div class="text-lg-right">
                  <a class="la-rtng__review text-uppercase text-nowrap la-anim__stagger-item" onclick="openReview()">Leave a Review</a>
              </div> --}}
                    <!-- Leave a Rating Popup: Start -->
                    <div class="modal fade la-rtng__review-modal" id="leave_rating">
                      <div class="modal-dialog la-rtng__review-dialog">
                          <div class="modal-content la-rtng__review-content">
                              <div class="modal-header la-rtng__review-header">
                                  <button type="button" class="close text--black" data-dismiss="modal">&times;</button> <br/>
                              </div>
                              
                              <div class="modal-body la-rtng__review-body">
                                    <form action="{{route('rate.course')}}" method="post" id="rate_course_form" name="rate_course_form">
                                        @csrf
                                        <div class="la-rtng__review-top">
                                            <h6 class="la-rtng__review-title">Leave a rating</h6>
                                            <div class="la-rtng__review-stars">
                                                <div class="starRatingContainer">
                                                    <div class="rate2 text-2xl" style="color:#FFC516"></div>
                                                    <input id="rating_value_input" class="border-0">
                                                    <input type="hidden" name="course_id" value="{{$course->id}}" class="border-0">
                                                    <input id="input2" type="hidden" name="rating_value" type="text"></div>
                                            </div>
                                        </div>

                                        <div class="la-rtng__review-btm py-8">
                                            <h6 class="la-rtng__review-title">Review</h6>
                                            <textarea cols="38" rows="5" class="la-form__textarea la-rtng__review-textarea" name="review" id="review_input" placeholder="Type your Review here..."></textarea>
                                        </div>

                                        <div class="text-right">
                                          <a role="button" class="la-rtng__review-btn" onclick="submitRateCourseForm()">Submit Review</a>
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
                                  <div class="modal-header la-rtng__review-header">
                                      <button type="button" class="close text--black" data-dismiss="modal">&times;</button> <br/>
                                  </div>
                                  
                                  <div class="modal-body la-rtng__review-body">
                                        <form action="{{route('update.review')}}" method="post" id="edit_rate_form" name="edit_rate_form">
                                            @csrf
                                            {{ method_field('PUT') }}
                                            <div class="la-rtng__review-top">
                                                <h6 class="la-rtng__review-title">Update Review</h6>
                                                <div class="la-rtng__review-stars">
                                                    <div class="starRatingContainer">
                                                        <div class="rate2 text-2xl" style="color:#FFC516"></div>
                                                        <input id="rating_value_input" class="border-0">
                                                        <input type="hidden" name="rating_id" id="rating_id" />
                                                        <input type="hidden" name="course_id" value="" id="rating_course_id"  class="border-0">
                                                        <input id="input2" type="hidden" name="rating_value" type="text">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="la-rtng__review-btm py-8">
                                                <h6 class="la-rtng__review-title">Review</h6>
                                                <textarea cols="38" rows="5" class="la-form__textarea la-rtng__review-textarea" name="review" id="update_review_input" placeholder="Type your Review here..."></textarea>
                                            </div>

                                            <div class="text-right">
                                              <a role="button" class="la-rtng__review-btn" onclick="$('#edit_rate_form').submit()">Update Review</a>
                                            </div>
                                        </form>
                                  </div>
                              </div>
                          </div>
                        </div>
                    {{-- Edit Rating Modal:Ends --}}
                    <!-- Leave a Rating Popup: End -->
            </div>
            
            <div class="la-mcard__slider-wrap mt-6 la-anim__wrap px-0">
            @if(count($reviews))
              <div class="swiper-container h-100 la-lcreviews__container">
                <div class="swiper-wrapper la-lcreviews__wrapper"> 
              
                    @foreach($reviews as $review)

                    <div class="swiper-slide la-lcreviews__slider la-anim__stagger-item">  
                      <div class="la-lcreviews__item">
                        <div class="la-lcreviews__wrapper ">
                          <div class="d-flex justify-content-between align-item-start ">
                            <div class="la-lcreviews__prfle d-inline-flex align-items-center ">
                              <div class="la-lcreviews__prfle-img">
                                <img class="img-fluid rounded-circle d-block" src="{{ $review->user->user_img }}" alt="{{$review->user->fname}}">
                              </div>
                              <div class="la-lcreviews__prfle-info ml-2 ">
                                <div class="la-lcreviews__timestamp text-sm">
                                              @if($review->created_at->diffInWeeks(Carbon::now())> 0) 
                                                  {{$review->created_at->diffInWeeks(Carbon::now())}} weeks ago
                                              @elseif($review->created_at->diffInDays(Carbon::now())>0)
                                                  {{$review->created_at->diffInDays(Carbon::now())}} days ago 
                                              @else
                                                  Today                                      
                                              @endif
                                </div>
                                <h4 class="la-lcreviews__uname text-md text-uppercase ">{{$review->user->fname.' '.$review->user->lname}}</h4>
                              </div>
                            </div>
                            <div class="d-none d-md-block la-lcreviews__ratings"> @for($couter=1 ; $couter <= $review->rating; $couter++)<span class="la-icon--lg icon-star la-rtng__fill"></span>@endfor  @for($couter=1 ; $couter <= 5 - $review->rating; $couter++)<span class="la-icon--lg icon-star la-rtng__unfill"></span>@endfor</div>
                          </div>

                          <div class="la-lcreviews__content">
                            <div class="d-block d-md-none la-lcreviews__ratings"> @for($couter=1 ; $couter <= $review->rating; $couter++)<span class="la-icon--xl icon-star la-rtng__fill"></span>@endfor  @for($couter=1 ; $couter <= 5 - $review->rating; $couter++)<span class="la-icon--xl icon-star la-rtng__unfill"></span>@endfor</div>
                            <div class="la-lcreviews__comment text-sm">{{$review->review}}</div>
                            <div class="la-lcreviews__edit-comment text-right">
                              @if(Auth::check() && Auth::user()->id == $review->user_id)<a class="text-sm la-rtng__review-edit"  role="button" onclick="editReview({{ $review->id }}, {{ $review->course_id }}, '{{ $review->review }}', {{ $review->rating }})">Edit</a>@endif
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    @endforeach
                </div> 
              </div>
              <div class="swiper-pagination swiper-pagination-custom la-lcreviews__pagination la-anim__stagger-item--x"></div> 
            </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Section: End-->

  <!-- Section: Start-->
  <section class="la-section__small la-creator__section">
    <div class="la-section__inner">
      <div class="container">
        <!-- <div class="la-anim__wrap">
          <h2 class="la-section__title text-2xl text-md-4xl mb-9 la-anim__stagger-item">Creator</h2>
        </div> -->
        <div class="row">
          <div class="col-md-5 la-creator la-anim__wrap">
            <div class="la-creator__wrap d-flex justify-content-center position-relative">
              <div class="la-creator__inwrap la-anim__stagger-item">
                <div class="la-creator__img la-anim__fade-in-top text-center">
                  <img class="img-fluid mx-auto d-block" src="{{$course->user->user_img}}" alt="{{$course->user->fullName}}">
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-7 my-auto la-anim__wrap">
            <div class="la-creator__content offset-lg-1 ">
              <div class="la-creator__detail">
                  <div class="la-creator__name-label la-anim__fade-in-top">Class by</div>
                  <div class="la-creator__name text-capitalize position-relative mb-4">
                    <h6 class="la-title la-title--circle la-anim__stagger-item"><span class="position-relative">{{$course->user->fullName}}</span></h6>
                  </div>
                  <div class="la-creator__specialist mt-1 mb-3 text-capitalize la-anim__stagger-item--x">{{ $course->category->title }}</div>
              </div>
              @php
                    $details = strip_tags($course->user->detail);
                   $details = preg_replace("/&#?[a-z0-9]+;/i"," ",$details); 
              @endphp 
            @if(strlen($details) != 0)
              <div class="la-creator__para mb-6 la-anim__stagger-item--x">{{ substr($details, 0, 200) }}...</div>
                <div class="la-creator__content-btn la-anim__stagger-item--x  ">
                  <div class="la-btn__arrow text--burple text-uppercase text-spacing font-weight--bold ">
                    <a href="/mentor/{{$course->user->id}}">read about
                    <span class="la-btn__arrow-icon la-icon la-icon--7xl icon-grey-arrow "></span></a>
                  </div>
                </div>
              </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Section: End-->
  
  
  <!-- Section: Start-->
  <section class="la-section__small">
    <div class="la-section__inner">
      <div class="container-fluid la-anim__wrap">
        <h2 class="la-section__title text-2xl text-md-4xl mb-9 la-anim__stagger-item">Related Classes</h2>
                
          @if(count($related_courses) == 0)

            <div class="la-empty__courses w-100 d-md-flex justify-content-between align-items-center mt-0 mt-md-6 la-anim__stagger-item">
                <div class="col la-empty__inner mb-0">
                  <h6 class="la-empty__course-title text-xl la-anim__stagger-item--x">No more Classes available right now!</h6>
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
                      :creatorName="$related_course->user->fname"
                      :creatorUrl="$related_course->user->id"
                      :learnerCount="$related_course->learnerCount"
                      :price="$related_course->price"
                      :bought="$related_course->isPurchased()"
                      :checkWishList="$course->checkWishList"
                      :checkCart="$course->checkCart"
                      :videoCount="$course->videoCount"
                      :chapterCount="$course->videoCount"
                  />
              @endforeach
            </div>
          @endif

      </div>
    </div>
  </section>
  <!-- Section: End-->



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