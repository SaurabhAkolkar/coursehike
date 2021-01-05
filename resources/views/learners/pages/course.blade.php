@extends('learners.layouts.app')

@section('headAssets')
  <link href="https://vjs.zencdn.net/7.8.4/video-js.css" rel="stylesheet" />
  <link href="https://unpkg.com/@silvermine/videojs-quality-selector/dist/css/quality-selector.css" rel="stylesheet">
  <title>{{ $course->title }}</title>

@endsection

@section('content')
@php
use Carbon\Carbon;
@endphp
<section class="la-section">
    <div class="la-vcourse">
      <div class="container">
        @if(Session('failed'))
          <h5>Review Already Added for this course by you.</h5>
        @endif
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
        <div id="wishlist_alert_div"></div> 
        <div class="row  mb-12"> 
          <div class="col-12 col-lg-7">
            <div class="la-vcourse__header d-flex align-items-center">
              <h1 class="la-vcourse__title mr-8">{{ $course->title }}</h1>
              {{-- <div class="la-vcourse__badges">
                <img src="/images/learners/icons/badge.svg" alt="badge">
              </div> --}}
            </div>
            <div class="la-vcourse__rating mb-2">
              <div id="rateYo"></div>
            </div>
            <p class="la-vcourse__excerpt mb-5">{{ $course->short_detail }}</p>
            <div class="la-vcourse__creator d-flex align-items-center">
              <div class="la-vcourse__creator-avator"><img src="https://picsum.photos/200/200" alt=""></div>
              <div class="la-vcourse__creator-name">{{ $course->user->fname }}</div>
            </div>
          </div>
          <div class="col-12 col-lg-5 d-flex flex-column justify-content-between">
            <div class="la-vcourse__buy text-right mb-2">
              <a class="btn btn-primary la-btn la-btn--primary d-lg-inline-flex justify-content-end" href="/learning-plans">Subscribe Now</a>
            </div>
            <div class="la-vcourse__info-items d-flex align-items-center justify-content-end">
              <div class="la-vcourse__info-item la-vcourse__info--videos d-flex flex-column align-items-center justify-content-end">
                <div class="la--count">{{ $course->courseclass->count() }}</div>
                <span class="la--label mt-1">Videos</span>
              </div>
              <div class="la-vcourse__info-item la-vcourse__info--learners d-flex flex-column align-items-center justify-content-end mx-10">
                <div class="la--count">300</div>
                <span class="la--label mt-1">Learners</span>
              </div>
              <div class="la-vcourse__info-item la-vcourse__info--level d-flex flex-column align-items-center justify-content-end">
                <div class="la--icon"><img src="/images/learners/icons/level-beginner.svg" alt="beginner"></div>
                <span class="la--label mt-1">Beginner</span>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <ul class="list-unstyled d-block d-lg-flex mb-6">
              <li class="la-vcourse__duration mr-14"><span class="la-text-gray4">Duration </span>  {{ $course->duration }}</li>
              <li class="la-vcourse__updatedon mr-14"><span class="la-text-gray4">Last Updated </span>  {{ $course->updated_at->format('d-M Y') }}</li>
              <li class="la-vcourse__languages mr-14"> <span class="la-text-gray4">Languages </span>  {{$course->language->name}} </li>
            </ul>
          </div>
          <div class="col-12 la-vcourse__primary-info d-flex mb-2">
            <div class="la-vcourse__classes-info pr-2">
              <span class="la--count">{{ $course->chapter->count() }}</span>
              <span class="la--label">Classes</span>
            </div>
            <div class="la-vcourse__videos-info pl-2">
              <span class="la--count">{{ $course->courseclass->count() }}</span>
              <span class="la--label">Videos</span>
              @php
                  $startTime = \Carbon\Carbon::parse('2020-12-05T01:18:36.862+00:30');
                  $finishTime = \Carbon\Carbon::parse('2020-12-05T01:18:36.862+1:30');

                  $totalDuration = $finishTime->diffInHours($startTime);
                  
              @endphp
            </div>
          </div>
        </div>
        <div id="vcourse_row" class="row la-vcourse__class-row">
          <div class="col-12 col-lg-6 la-vcourse__class-col">
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
                {{-- <source src="http://d2zihajmogu5jn.cloudfront.net/bipbop-advanced/bipbop_16x9_variant.m3u8" type="application/x-mpegURL"> --}}
                <p class="vjs-no-js">
                  {{-- To view this video please enable JavaScript, and consider upgrading to a
                  web browser that
                  <a href="https://videojs.com/html5-video-support/" target="_blank"
                    >supports HTML5 video</a
                  > --}}
                </p>
              </video-js>
            </div>
            <h2 class="la-vlesson__title m-0">{{ $course->title}} - Course Preview</h2><small class="la-vlesson__creator">{{ $course->user->fname }}</small>
          </div>
          <div class="col-12 col-lg-6 la-vcourse__class-col">
            <div class="la-vcourse__curriculam pl-2 pl-lg-8">
              @foreach($course->chapter as $class)
              <div class="la-vcourse__class">
                <div class="la-vcourse__class-header d-flex mb-7 ml-5">
                  <div class="la-vcourse__class-thumb mr-3"><img class="img-fluid" src="{{$class->thumbnail}}"></div>
                  <div class="d-flex flex-column">
                    <div class="la-vcourse__class-title leading-4 text-xl mb-1">{{$class->chapter_name}}</div><small class="la-vcourse__class-videoscount">{{$class->courseclass->count()}} Videos</small>
                  </div>
                </div>

                <div class="la-vcourse__lessons">

                  @foreach ($class->courseclass as $class_video)
                    @php
                      $lesson_access = $class_video->is_preview == '1' ? 'free' : ($video_access ? 'free' : 'locked');  
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
                      :statuspercentage="$class_video->duration"
                      :access="$lesson_access"
                    />
                  @endforeach
                </div>
              </div>
              @endforeach
            </div>
            <div class="la-vcourse__btn-wrap text-center mt-3">
              <div id="vcourseFullView" class="la-btn__arrow-down la-vcourse__btn d-inline-block">
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
  <section class="la-section">
    <div class="la-section__inner">
      <div class="container">
        <div class="la-ctabs d-none d-sm-block">
          <nav class="la-courses__nav">
            <ul class="nav nav-pills la-courses__nav-tabs" id="cnav-tab" role="tablist">
              <li class="nav-item la-courses__nav-item"><a class="nav-link la-courses__nav-link active text-capitalize" id="cnav-about-tab" data-toggle="tab" href="#cnav-about" role="tab" aria-controls="cnav-about" aria-selected="true">About</a></li>
              @if($video_access == true)
                <li class="nav-item la-courses__nav-item"><a class="nav-link la-courses__nav-link text-capitalize" id="cnav-resource-tab" data-toggle="tab" href="#cnav-resource" role="tab" aria-controls="cnav-resource" aria-selected="false">Resources</a></li>
                <li class="nav-item la-courses__nav-item"><a class="nav-link la-courses__nav-link text-capitalize" id="cnav-certificate-tab" data-toggle="tab" href="#cnav-certificate" role="tab" aria-controls="cnav-certificate" aria-selected="false">Certificate</a></li>
              @endif
            </ul>
          </nav>
          <div class="tab-content la-courses__content" id="cnav-tabContent">
            <div class="tab-pane fade show active" id="cnav-about" role="tabpanel" aria-labelledby="cnav-about-tab">
              <div class="col-lg-9 px-0">
                <div class="col-12 col-lg px-0">
                  <div class="la-ctabs__about">
                    {!! $course->detail !!}
                  </div>
                  <div class="la-vcourse__btn-wrap text-right mt-3">
                    <a class="la-btn__arrow-down la-vcourse__btn d-inline-block text-center" href="">
                      <span class="icon-down-arrow la-btn__icon la-btn__icon--grey"></span>
                      <div class="la-btn__text la-btn__text--purple">Read More</div>
                    </a>
                  </div>
                </div>
              </div>
            </div>

            @if($video_access == true)
              <div class="tab-pane fade" id="cnav-resource" role="tabpanel" aria-labelledby="cnav-resource-tab">
                <div class="col-lg px-0 d-flex">
                  @foreach ( $course->resources as $resource)
                    <div class="col-12 col-md col-lg px-0">
                      <div class="la-ctabs__resources d-flex">
                        <div class="la-ctabs__resource-pdf"><i class="la-icon--5xl icon-download mr-8"></i></div>
                        <div class="la-ctabs__resource-desc">
                          <div class="la-ctabs__resource-title text-lg head-font text-uppercase">{{$resource->file_name}}</div><a class="la-ctabs__resource-file text-sm" href="{{$resource->file_url}}" target="_blank">Download Now</a>
                        </div>
                      </div>
                    </div>
                  @endforeach

                </div>
                <div class="col-12 px-0 d-flex justify-content-end"> <a class="la-ctabs__download-all text-sm" href=""><span class="text-uppercase">DOWNLOAD ALL<span class="pl-1 la-icon icon-download"> </span></span></a></div>
              </div>
              <div class="tab-pane fade" id="cnav-certificate" role="tabpanel" aria-labelledby="cnav-certificate-tab">
                <div class="col-lg px-0 d-flex">
                  <div class="col-12 col-md-6 col-lg px-0">
                    <div class="la-ctabs__certificate d-flex">
                      <div class="la-ctabs__certificate-pdf"><i class="la-icon--5xl icon-download mr-8"></i></div>
                      <div class="la-ctabs__certificate-desc">
                        <div class="la-ctabs__certificate-title text-lg head-font text-uppercase">Water Color</div><a target="_blank" class="la-ctabs__certificate-file text-sm" href="/download-certificate/{{$course->id}}">watercolor_certificate.pdf</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @endif
          </div>
        </div>
        <!-- Mobile Version-->
        <div class="la-ctabs d-block d-sm-none">
          <div class="la-ctabs__content">
            <div class="col-12 mb-20">
              <div class="la-ctabs__title text-4xl mb-8">About</div>
                <div class="col-12 col-lg px-0">
                  <div class="la-ctabs__about">
                    {!! $course->detail !!}
                  </div><a class="la-ctabs__readmore d-flex justify-content-center justify-content-md-end mt-lg-3" role="button" href="#readmore" data-toggle="collapse" aria-expanded="true">Read More</a>
                </div>
            </div>
            <div class="col-12 mb-4">
              <div class="la-ctabs__title text-4xl mb-8">Resources</div>
              @foreach ( $course->resources as $resource)
                  <div class="col-12 col-md col-lg px-0">
                    <div class="la-ctabs__resources d-flex">
                      <div class="la-ctabs__resource-pdf"><i class="la-icon--5xl icon-download mr-8"></i></div>
                      <div class="la-ctabs__resource-desc">
                        <div class="la-ctabs__resource-title text-lg head-font text-uppercase">{{$resource->file_name}}</div><a class="la-ctabs__resource-file text-sm" href="{{$resource->file_url}}" target="_blank">Download Now</a>
                      </div>
                    </div>
                  </div>
                @endforeach

                
                <div class="col-12 col-md col-lg px-0">
                  <div class="la-ctabs__resources d-flex">
                    <div class="la-ctabs__resource-pdf"><i class="la-icon--5xl icon-download mr-8"></i></div>
                    <div class="la-ctabs__resource-desc">
                      <div class="la-ctabs__resource-title text-lg head-font text-uppercase">Daily Routine</div><a class="la-ctabs__resource-file text-sm" href="">daily_routine.pdf</a>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-md col-lg px-0">
                  <div class="la-ctabs__resources d-flex">
                    <div class="la-ctabs__resource-pdf"><i class="la-icon--5xl icon-download mr-8"></i></div>
                    <div class="la-ctabs__resource-desc">
                      <div class="la-ctabs__resource-title text-lg head-font text-uppercase">Important Tips</div><a class="la-ctabs__resource-file text-sm" href="">important_tips.pdf</a>
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-12 mb-20 text-center"><a class="la-ctabs__download-all text-md" href=""><span class="text-uppercase">DOWNLOAD ALL<span class="pl-1 la-icon icon-download"> </span></span></a></div>
            <div class="col-12 mb-4">
              <div class="la-ctabs__title text-4xl mb-8">Certificate</div>
              <div class="col-12 col-md-6 col-lg px-0">
                <div class="la-ctabs__certificate d-flex">
                  <div class="la-ctabs__certificate-pdf"><i class="la-icon--5xl icon-download mr-8"></i></div>
                  <div class="la-ctabs__certificate-desc">
                    <div class="la-ctabs__certificate-title text-lg head-font text-uppercase">Water Color</div><a class="la-ctabs__certificate-file text-sm" href="">watercolor_certificate.pdf</a>
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
  <!-- Section: Start-->
  <section class="la-section">
    <div class="la-section__inner">
      <div class="container">
        <div class="la-cbenefits d-flex my-8">
          <div class="row">
            <div class="col">
              <div class="la-cbenefits__item d-flex flex-column align-items-center">
                <div class="mb-7">
                  <img class="img-fluid d-block" src="/images/learners/course-benefits/video.svg" />
                </div>
                <h4 class="la-cbenefits__item-title mb-3">Unlimited Learning</h4>
                <p class="la-cbenefits__item-desc m-0">One plan - All subscribed content</p>
              </div>
            </div>
            <div class="col">
              <div class="la-cbenefits__item d-flex flex-column align-items-center">
                <div class="mb-7"><img class="img-fluid d-block" src="/images/learners/course-benefits/certificate.svg"></div>
                <h4 class="la-cbenefits__item-title mb-3">Certification</h4>
                <p class="la-cbenefits__item-desc m-0">Course completion certificate</p>
              </div>
            </div>
            <div class="col">
              <div class="la-cbenefits__item d-flex flex-column align-items-center">
                <div class="mb-7"><img class="img-fluid d-block" src="/images/learners/course-benefits/online-course.svg"></div>
                <h4 class="la-cbenefits__item-title mb-3">Assignments &amp; QUiz</h4>
                <p class="la-cbenefits__item-desc m-0">Test your progress</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Section: End-->

  <!-- Section: Start-->
  @if($video_access || !auth()->check())

  <section class="la-section la-section--grey la-vcourse__purchase">
    <div class="la-vcourse__purchase-inwrap container">
      <div class="row la-vcourse__purchase-row">
        <div class="col-md-6 la-vcourse__purchase-left">
          <div class="la-vcourse__purchase-prize mb-8">Purchase this Course @ <span class="la-vcourse__purchase-prize--amount"><b>${{$course->price}}</b></span></div>
          <form class="la-vcourse__purchase-form" id="add_to_cart_form" name="add_to_cart_form" method="post" action="/add-to-cart">
            <input type="hidden" name="course_id" value="{{$course->id}}" />
            @csrf
            <div class="la-vcourse__purchase-classes">
              <div class="la-vcourse__purchase-class la-vcourse__purchase-class--all mb-4">
                <div class="la-form__radio-wrap">
                  <input class="la-form__radio d-none la-vcourse__purchase-input" @if($order_type == null || $order_type == 'all_classes') checked @endif type="radio" value="all-classes" name="classes" id="allClasses">
                  <label class="d-flex align-items-center la-vcourse__purchase-label" for="allClasses">
                    <span class="la-form__radio-circle la-form__radio-circle--typeB d-flex justify-content-center align-items-center mr-2"></span>
                    <span class="">All Classes</span>
                  </label>
                </div>
              </div>
              <div class="la-vcourse__purchase-class la-vcourse__purchase-class--select">
                <div class="la-form__radio-wrap">
                  <input class="la-form__radio d-none la-vcourse__purchase-input" type="radio" value="select-classes" @if($order_type == 'selected_classes') @endif name="classes" id="selectClasses">
                  <label class="d-flex align-items-center la-vcourse__purchase-label" for="selectClasses">
                    <span class="la-form__radio-circle la-form__radio-circle--typeB d-flex justify-content-center align-items-center mr-2"></span>
                    <span class="">Select Classes</span>
                  </label>
                </div>
                <div class="la-vcourse__purchase-items mt-8 pl-8" id="selected_class_div">
                  <table class="w-100 la-vcourse__classes-wrap">
                    <tr class="la-vcourse__sclass-item">
                      <th class="mb-4 la-vcourse__sclass-heading"></th>
                      <th class="mb-4 la-vcourse__sclass-heading">Class</th>
                      <th class="mb-4 la-vcourse__sclass-heading">Name</th>
                      <th class="mb-4 la-vcourse__sclass-heading">Mentor</th>
                      <th class="mb-4 la-vcourse__sclass-heading">Price</th>
                    </tr>
                    @foreach ($course->chapter as $class)
                    
                      <tr class="la-vcourse__sclass-item align-top">
                        <td class="la-vcourse__sclass-data pt-3 la-vcourse__sclass-data--checkbox">
                          <div>
                            <input id="selectItem_{{$class->id}}" name="selected_classes[]" class="la-form__checkbox-input selected_classes custom-control-input" type="checkbox" value="{{$class->id}}" @if($order_type == 'all_classes') checked @endif>
                            
                            <label class="" for="selectItem_{{$class->id}}">
                              <svg viewBox="0 0 16 16" height="16" width="16">
                                <g id="Group_5052" data-name="Group 5052" transform="translate(-129 -2108)">
                                  <g id="Rectangle_3239" data-name="Rectangle 3239" transform="translate(129 2108)" fill="none" stroke="#7400d7" stroke-width="1">
                                    <rect class="la-form__checkbox-rect" x="0.5" y="0.5" width="15" height="15" fill="none" />
                                  </g>
                                </g>
                                <path class="la-form__checkbox-mark" id="Path_17096" data-name="Path 17096" d="M147.263,194.53a.857.857,0,0,0,.56.4.994.994,0,0,0,.171.02.854.854,0,0,0,.5-.161l7.175-5.128a.856.856,0,0,0-1-1.392l-6.419,4.589-1.871-3.1a.856.856,0,1,0-1.467.882Z" transform="matrix(0.985, -0.174, 0.174, 0.985, -173.013, -153.894)" fill="#010101"/>
                              </svg>
                            </label>
                          </div>
                        </td>
                        <td class="la-vcourse__sclass-data la-vcourse__sclass-data--thumbnail">
                          <img src="https://picsum.photos/68/46" alt="purchase item">
                        </td>
                        <td class="la-vcourse__sclass-data pt-3 la-vcourse__sclass-data--name">{{$class->chapter_name}}</td>
                        <td class="la-vcourse__sclass-data pt-3 la-vcourse__sclass-data--mentor">{{$course->user->fname}}</td>
                        <td class="la-vcourse__sclass-data pt-3 la-vcourse__sclass-data--price">${{$class->price}}</td>
                      </tr>
                     
                    @endforeach
                  </table>
                </div>
              </div>
            </div>
            <div class="la-vcourse__purchase-actions d-flex flex-wrap align-items-center mt-8">
              <div class="la-vcourse__purchase-btn w-50">
                <a class="btn btn-primary la-btn la-btn--primary w-100 text-center" @if(Auth::check()) onclick="$('#add_to_cart_form').submit()" @else data-toggle="modal" data-target="#locked_login" @endif >Buy course</a>
              </div>
              <div class="la-vcourse__purchase-btn w-50">
                <a class="btn la-btn la-btn__plain text--green w-100 text-center" @if(Auth::check()) onclick="$('#add_to_cart_form').submit()" @else data-toggle="modal" data-target="#locked_login" @endif>ADD TO CART</a>
              </div>
            </div>
          </form>
        </div>
        <div class="col-md-6 la-vcourse__purchase-right">
          <div class="la-vcourse__purchase-content offset-md-2">
            <div class="la-vcourse__purchase-prize mb-8">Subscribe for all Courses @ <span class="la-vcourse__purchase-prize--amount"><b>$39/month</b></span></div>
            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam consetetur sadipscing</p>
            <div class="la-vcourse__purchase-actions d-inline-block text-center mt-8">
              <div class="la-vcourse__purchase-btn">
                <a class="btn btn-primary active la-btn la-btn--primary text-center"  href="/learning-plans">SUBSCRIBE NOW</a>
              </div>
              <a @if(Auth::check()) href="#" @else data-toggle="modal" data-target="#locked_login" @endif  class="la-vcourse__purchase-trial--lnk mt-8">Start free 7 Days trial</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  @endif
  <!-- Section: End-->

  <!-- Section: Start-->
  <section class="la-section">
    <div class="la-section__inner">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <li class="la-rtng__item">
              <div class="la-rtng__inner d-flex flex-column flex-md-row justify-content-between">
                <div class="la-rtng__title head-font text-xl">Reviews &amp; Ratings
                  <div class="la-rtng__wrapper d-flex flex-column flex-md-row justify-content-between">
                    <div class="la-rtng__overall text-left text-md-center">
                      <div class="la-rtng__total body-font text-5xl mx-4 mx-md-0 px-5 px-md-0">{{$average_rating}}</div>
                      <div class="la-rtng__icons d-inline-flex">
                        @for($counter=1;$counter <= round($average_rating); $counter++)
                            <div class="la-icon--xl icon-star la-rtng__fill"> </div>
                        @endfor

                        @for($counter=1;$counter <= 5-round($average_rating); $counter++)
                            <div class="la-icon--xl icon-star la-rtng__unfill"> </div>
                        @endfor                      
                        
                      </div>
                      <div class="la-rtng__course body-font text-sm mt-n1 px-3 px-md-0">Course Rating</div>
                    </div>
                    <div class="la-rtng__indicators">
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

                <div class="la-rtng__review-popup">
                  <a class="la-rtng__review text-uppercase text-center text-md-right" data-toggle="modal" data-target="#leave_rating">Leave a Review</a>

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
                                                  <div class="rate2"></div>
                                                  <input id="rating_value_input" class="border-0">
                                                  <input type="hidden" name="course_id" value="{{$course->id}}" class="border-0">
                                                  <input id="input2" type="hidden" name="rating_value" type="text"></div>
                                          </div>
                                      </div>

                                      <div class="la-rtng__review-btm py-4">
                                          <h6 class="la-rtng__review-title">Review</h6>
                                          <textarea cols="38" rows="5" class="la-rtng__review-msg" name="review" id="review_input" placeholder="Type here..."></textarea>
                                      </div>

                                      <div class="text-right">
                                        <a role="button" class="la-rtng__review-btn" onclick="submitRateCourseForm()">Submit Review</a>
                                      </div>
                                  </form>
                            </div>
                        </div>
                    </div>
                </div>
                  <!-- Leave a Rating Popup: End -->
                </div>
              </div>
            </li>
          </div>
          <div class="col-lg-8">
            
            @foreach($reviews as $review)
           
              <li class="la-lcreviews__item">
                <div class="la-lcreviews__inner">
                  <div class="la-lcreviews__wrapper d-flex flex-column flex-md-row justify-content-between">
                    <div class="la-lcreviews__prfle d-inline-flex">
                      <div class="la-lcreviews__prfle-img"><img class="img-fluid rounded-circle d-block" src="https://picsum.photos/70" alt="Amish Patel"></div>
                      <div class="la-lcreviews__prfle-info">
                          <div class="la-reviews__timestamp text-sm">
                                    @if($review->created_at->diffInWeeks(Carbon::now())> 0) 
                                        {{$review->created_at->diffInWeeks(Carbon::now())}} Weeks Ago
                                    @elseif($review->created_at->diffInDays(Carbon::now())>0)
                                        {{$review->created_at->diffInDays(Carbon::now())}} Days ago 
                                    @else
                                        Today                                      
                                    @endif
                          </div>
                        <div class="la-reviews__uname text-xl text-uppercase">{{$review->user->fname.' '.$review->user->lname}}</div>
                      </div>
                    </div>
                    <div class="la-lcreviews__content w-100">
                      <div class="la-lcreviews__ratings"> @for($couter=1 ; $couter <= $review->rating; $couter++)<span class="la-icon--xl icon-star la-rtng__fill"></span>@endfor  @for($couter=1 ; $couter <= 5 - $review->rating; $couter++)<span class="la-icon--xl icon-star la-rtng__unfill"></span>@endfor</div>
                      <div class="la-lcreviews__comment text-md">{{$review->review}}</div>
                    </div>

                  </div>
                </div>
              </li>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Section: End-->
  <!-- Section: Start-->
  <section class="la-section">
    <div class="la-section__inner">
      <div class="container">
        <h2 class="la-section__title mb-9">Creators</h2>
        <div class="row">
          <div class="col-md-5 la-creator pr-10">
            <div class="la-creator__wrap position-relative pl-md-16">
              <div class="la-creator__inwrap d-flex align-items-end">
                <div class="la-creator__img">
                @php 
                      if($course->user->user_img == ""){
                          $course->user->user_img = "https://picsum.photos/400";
                      }else{
                          $course->user->user_img = asset('/images/user_img/'.$mentor->user_img);
                      }
                @endphp

                  <span><img src="{{$course->user->user_img}}" alt=""></span>
                </div>
                <div class="la-creator__detail pl-8">
                  <span class="la-creator__name">{{$course->user->fullName}}</span>
                  <div class="la-creator__specialist mt-1">Design</div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-7">
            <div class="la-creator__content offset-1 pt-14">
              <div class="la-creator__content-title d-flex align-items-md-end mb-6">
                <span class="la--icon"><img src="../../images/learners/course/icon-quote@2x.png" alt=""></span>
                <span class="la--text pl-4">Stet clita kasd gubergren</span>
              </div>
              <div class="la-creator__para mb-6">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor 
                invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.</div>
                <div class="la-creator__content-btn">
                  <div class="la-btn__arrow text--burple text-uppercase text-spacing font-weight--bold">
                    <a href="/creator/{{$course->user->id}}">read about</a>
                    <span class="la-btn__arrow-icon la-icon la-icon--7xl icon-grey-arrow"></span>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Section: End-->
  <!-- Section: Start-->
  <section class="la-section la-section--grey">
    <div class="la-section__inner">
      <div class="container">
        <h2 class="la-section__title mb-9">More from Creators</h2>
        <div class="row col-12 px-0">
          @foreach ($mentor_other_courses as $related_course)
              
          <div class="col-md-4" >
              <div class="la-course">
                  <div class="la-course__inner">
                      <a href= {{ '/learn/course/'.$related_course->id.'/'.$related_course->slug }}>
                            <div class="la-course__overlay" id="la-course__nested-links">
                              
                                  <ul class="la-course__options list-unstyled text-white">
                                      <li class="la-course__option">
                                          <span class="d-inline-block la-course__addtocart" onclick="addToCart({{$related_course->id}})">
                                              <i class="la-icon la-icon--2xl icon icon-cart"></i>
                                          </span>
                                      </li>

                                      <li class="la-course__option">
                                          <span class="d-inline-block la-course__like">
                                              <i class="la-icon la-icon--2xl icon icon-wishlist"></i>
                                          </span>
                                      </li>

                                      <li class="la-course__option">
                                          <div class="dropdown">
                                              <span class="dropdown-toggle d-inline-block la-course__menubtn" data-toggle="dropdown" href="javascript:void(0);">
                                                  <i class="la-icon la-icon--2xl icon icon-menu"></i>
                                              </span>
                                              <div class="la-cmenu dropdown-menu py-0">
                                                  <span class="dropdown-item la-cmenu__item d-inline-flex" onclick="showAddToPlaylist({{$related_course->id}})" ><i class="icon icon-playlist la-icon la-icon--2xl mr-2"></i> Add to Playlist </span>
                                                  <span class="dropdown-item la-cmenu__item d-inline-flex" onclick="addToWishList({{$related_course->id}})"><i class="icon icon-wishlist la-icon la-icon--2xl mr-2"></i>  Add to Wishlist  </span>
                                                  <span class="dropdown-item la-cmenu__item d-inline-flex" onclick="addToCart({{$related_course->id}})"><i class="icon icon-cart la-icon la-icon--2xl mr-2"></i>  Add to Cart</span>
                                              </div>
                                          </div>
                                      </li>
                                  </ul>

                                  <div class="la-course__learners"><strong>300</strong>  Learners</div>
                          </div>
                      
                          <div class="la-course__imgwrap">
                              <img class="img-fluid" src="{{$related_course->preview_image}}" alt= {{ $related_course->title }} />
                          </div>
                      </a>
                  </div>

                  <div class="la-course__btm">
                      <div class="la-course__info d-flex align-items-center mb-1">
                          <a class="la-course__title" > {{ $related_course->title }} </a>
                          <div class="la-course__rating ml-auto"> 4 </div>
                      </div>
                      
                      <a class="la-course__creator d-inline-flex align-items-center"  >
                          <div class="la-course__creator-imgwrap">
                              <img class="img-fluid" src="https://picsum.photos/200/200" alt={{ $related_course->user->fullName }} />
                           
                          </div>
                          <div class="la-course__creator-name">{{ $related_course->user->fullName }}</div>
                      </a>
                  </div>
              </div>
          </div>              
          @endforeach
          
        </div>
      </div>
    </div>
  </section>
  <!-- Section: End-->
  <!-- Section: Start-->
  <section class="la-section la-section--grey">
    <div class="la-section__inner">
      <div class="container">
        <h2 class="la-section__title mb-9">Looking for something else?</h2>
        <div class="row col-12 px-0 ">
          @foreach ($related_courses as $related_course)
          <div class="col-md-4" >
              <div class="la-course">
                  <div class="la-course__inner">
                      <a href= {{ '/learn/course/'.$related_course->id.'/'.$related_course->slug }}>
                          <div class="la-course__overlay">

                                  <ul class="la-course__options list-unstyled text-white">
                                      <li class="la-course__option">
                                          <span class="d-inline-block la-course__addtocart" onclick="addToCart({{$related_course->id}})">
                                              <i class="la-icon la-icon--2xl icon icon-cart"></i>
                                          </span>
                                      </li>

                                      <li class="la-course__option">
                                          <span class="d-inline-block la-course__like">
                                              <i class="la-icon la-icon--2xl icon icon-wishlist"></i>
                                          </span>
                                      </li>

                                      <li class="la-course__option">
                                          <div class="dropdown">
                                              <span class="dropdown-toggle d-inline-block la-course__menubtn" data-toggle="dropdown" href="javascript:void(0);">
                                                  <i class="la-icon la-icon--2xl icon icon-menu"></i>
                                              </span>
                                              <div class="la-cmenu dropdown-menu py-0">
                                                  <span class="dropdown-item la-cmenu__item d-inline-flex" onclick="showAddToPlaylist({{$related_course->id}})" ><i class="icon icon-playlist la-icon la-icon--2xl mr-2"></i> Add to Playlist </span>
                                                  <span class="dropdown-item la-cmenu__item d-inline-flex" onclick="addToWishList({{$related_course->id}})"><i class="icon icon-wishlist la-icon la-icon--2xl mr-2"></i>  Add to Wishlist  </span>
                                                  <span class="dropdown-item la-cmenu__item d-inline-flex" onclick="addToCart({{$related_course->id}})"><i class="icon icon-cart la-icon la-icon--2xl mr-2"></i>  Add to Cart</span>
                                                  
                                              </div>
                                          </div>
                                      </li>
                                  </ul>

                                  <div class="la-course__learners"><strong>300</strong>  Learners</div>
                          </div>
                      
                          <div class="la-course__imgwrap">
                              <img class="img-fluid" src="{{$related_course->preview_image}}" alt= {{ $related_course->title }} />
                          </div>
                      </a>
                  </div>

                  <div class="la-course__btm">
                      <div class="la-course__info d-flex align-items-center mb-1">
                          <a class="la-course__title" > {{ $related_course->title }} </a>
                          <div class="la-course__rating ml-auto"> 4 </div>
                      </div>
                      
                      <a class="la-course__creator d-inline-flex align-items-center"  >
                          <div class="la-course__creator-imgwrap">
                              <img class="img-fluid" src="https://picsum.photos/200/200" alt={{ $related_course->user->fullName }} />
                           
                          </div>
                          <div class="la-course__creator-name">{{ $related_course->user->fullName }}</div>
                      </a>
                  </div>
              </div>
          </div>

          
          @endforeach

        </div>
      </div>
    </div>
  </section>
  <!-- Section: End-->

  <!-- ==== Popup Section: Start ===== -->
  <section>
    <div class="container">
      <div class="row">
        <!-- Locked Login Popup: Start -->
        <div class="col-12">
          <!-- <a class="" data-toggle="modal" data-target="#locked_login">Locked Course Login</a>-->
                
            <div class="modal fade  la-locked__modal" id="locked_login">
              <div class="modal-dialog  la-locked__modal-dialog">
                  <div class="modal-content  la-locked__modal-content px-6">
                      <div class="modal-header  la-locked__modal-header">
                          <button type="button" class="close text-4xl" data-dismiss="modal">&times;</button> <br/>
                      </div>
                    
                      <div class="modal-body  la-locked__modal-body text-center">
                          <h5 class="modal-title la-locked__modal-title ">Login Required</h5>
                          <img src="/images/learners/status/locked-login.svg" alt="Login" class="img-fluid mx-auto d-block la-locked__modal-img">
                          <p class="la-locked__modal-desc px-6">Please login & subscribe to gain full access to courses.</p>

                          <a href="/login"><button class="la-btn__app py-3 w-100 la-locked__modal-btn" type="button">Login</button></a>

                          <div class="la-locked__modal-register pt-3">
                              <span class="la-locked__modal-info pr-1">Don't have an account?</span>
                              <a href="/register" role="button" class="la-locked__modal-link">Register</a>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
        </div>
          <!-- Locked Login Popup: End -->

        <!-- Locked Subscribe Popup: Start -->
        <div class="col-12">
          <!--<a class="" data-toggle="modal" data-target="#locked_subscribe">Locked Course Subscribe</a> -->
        
            <div class="modal fade  la-locked__modal" id="locked_subscribe">
              <div class="modal-dialog  la-locked__modal-dialog">
                  <div class="modal-content  la-locked__modal-content px-6">
                      <div class="modal-header  la-locked__modal-header">
                          <button type="button" class="close text-4xl" data-dismiss="modal">&times;</button> <br/>
                      </div>
                    
                      <div class="modal-body  la-locked__modal-body text-center">
                          <h5 class="modal-title la-locked__modal-title ">Subscription Required!</h5>
                          <img src="/images/learners/status/locked-subscribe.svg" alt="Subscribe" class="img-fluid mx-auto d-block la-locked__modal-img">
                          <p class="la-locked__modal-desc">Please subscribe & continue to enjoy courses from you favourite mentors.</p>

                          <button class="la-btn__app py-3 w-100 la-locked__modal-btn" type="button">Subscribe Now</button>

                          <div class="la-locked__modal-register pt-3">
                              <span class="la-locked__modal-info pr-1">We have differents plans for you, check</span> <br/>
                              <a href="/learning-plans" role="button" class="la-locked__modal-link">Learning Plans</a>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
            <!-- Locked Subscribe Popup: End -->
        </div>

        <!-- Locked Signup Popup: Start -->
        <div class="col-12">
          <!--<a class="" data-toggle="modal" data-target="#locked_trial">Locked Course Signup</a>-->
                
            <div class="modal fade  la-locked__modal" id="locked_trial">
              <div class="modal-dialog  la-locked__modal-dialog">
                  <div class="modal-content  la-locked__modal-content px-6">
                      <div class="modal-header  la-locked__modal-header">
                          <button type="button" class="close text-4xl" data-dismiss="modal">&times;</button> <br/>
                      </div>
                    
                      <div class="modal-body  la-locked__modal-body text-center">
                          <h5 class="modal-title la-locked__modal-title ">We have a gift for you!</h5>
                          <img src="/images/learners/status/locked-signup.svg" alt="Gift for You" class="img-fluid mx-auto d-block la-locked__modal-img">
                          <p class="la-locked__modal-desc px-14">Access premium courses for free for first 7 days.</p>

                          <button class="la-btn__app py-3 w-100 la-locked__modal-btn" type="button">Signup Now</button>
                      </div>
                  </div>
              </div>
            </div>
        </div>
        <!-- Locked Signup Popup: End -->

      </div>
    </div>
  </section>
  <!-- ===== Popup Section: End ====== -->


@endsection

@section('footerScripts')
  <script>var course_id = {!! json_encode($course->id) !!};</script>
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
            var options = {
                max_value: 5,
                step_size: 1,
                url: '/',
                initial_value: 3,
                update_input_field_name: $("#input2, #rating_value_input, #rating_value_input2, #input3"),
            }
            // $('#input2').change(function(){   
            //     $('#reating_value_input').val($this.val());
            // });
            $(".rate2").rate(options);

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


  </script>
@endsection