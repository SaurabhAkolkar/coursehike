@extends('learners.layouts.app')

@section('content')
  <!-- Section: Start-->
  <section class="la-page--bcreator ">
    <div class="container-fluid">
    @if(session('message'))
              <div class="la-btn__alert position-relative">
                <div class="la-btn__alert-success col-md-4 offset-md-4  alert alert-success alert-dismissible fade show" role="alert">
                    <span class="la-btn__alert-msg">{{session('message')}}</span>
                    <button type="button" class="close la-btn__alert-close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true" style="color:#56188C">&times;</span>
                    </button>
                </div>
              </div>
     @endif
      <div class="row la-anim__wrap">
        <!-- Column: Start-->
        <div class="col-12 col-sm-12 la-bcreator__banner " style="background:url('../images/learners/creator/bcreator-banner.png') no-repeat bottom rgba(0, 0, 0, 0.5); background-size:cover;">
          <div class="la-bcreator text-left text-sm-center px-6">

            <a class="la-bcreator__back-link position-absolute la-anim__stagger-item--x" href="{{URL::previous()}}"><span class="la-icon la-icon--5xl icon-back-arrow"></span></a>
            <div class="la-bcreator__content">
              <strong class=" text-white text-uppercase m-0 la-anim__stagger-item--x">Design your own course!</strong>
              <h1 class="la-bcreator__title text-white text-uppercase d-none d-md-block la-anim__stagger-item--x">Become a Creator</h1>
              <h1 class="la-bcreator__title text-white text-uppercase d-block d-md-none la-anim__stagger-item--x">Become <br/> a Creator</h1>
              <h6 class="la-bcreator__tag  leading-tight d-none d-md-block la-anim__stagger-item--x ">Join LILA’s inspiring community, <br/> share knowledge and start earning for your values</h6>
              <h6 class="la-bcreator__tag  leading-tight d-block d-md-none la-anim__stagger-item--x">Join LILA’s inspiring community, share knowledge and start earning for your values</h6>
            </div>
            <div class="la-bcreator__content-btn la-anim__stagger-item--x"><a class="la-btn__app text-white text-uppercase" role="button" href="/creator-signup">Start Teaching</a></div>
          </div>
        </div>
        <!-- Column: End-->
      </div>
    </div>
    <div class="container-fluid px-0 la-anim__wrap">
      <div class="row la-bcreator__banner-btm py-5">
        <!-- Column: Start-->
        <div class="col-12 col-lg-4 py-5 py-sm-0">
          <div class="la-bcreator__left-text la-anim__stagger-item--x">
            <h4 class="text-white pb-5">Make a difference, <br>Start Creating at LILA</h4>
            <p class="pt-3 pt-sm-8">
              We're on a mission to help hobbies flourish into something more than just a past time activity. Join us.
              Lead the movement. This is your chance to inspire 
              someone &#38; be the wind benath their wings&#33;
            </p>
          </div>
        </div>
        <!-- Column: End-->
        <!-- Column: Start-->
        <div class="col-12 col-lg-8 pl-lg-16 la-anim__stagger-item--x">
          <div class="la-mcard__slider-wrap">
            <div class="swiper-container h-100 la-mcard__container">
              <div class="swiper-wrapper la-mcard__wrapper">
                                        <div class="swiper-slide la-mcard__slider mb-16">
                                          <div class="la-mcard__item p-4 p-lg-5">
                                            <div class="la-mcard__info d-flex align-items-center">
                                              <div class="li-mcard__prfle mr-4 mr-lg-10 la-anim__stagger-item--x"><img class="rounded-circle d-block la-mcard__img" src="https://picsum.photos/100" alt="Mentor Name"></div>
                                              <div class="la-mcard__details">
                                                <div class="la-mcard__name text-lg text-lg-xl la-anim__stagger-item--x">Mentor Name</div>
                                                <div class="la-mcard__skill text-sm d-block d-lg-none la-anim__stagger-item--x">Expertise</div>
                                                <div class="la-mcard__desc text-md d-none d-lg-block la-anim__stagger-item--x">So, you can subscribe to all the courses and classes. Or rent them to learn whenever you want.</div>
                                              </div>
                                            </div>
                                            <div class="la-mcard__desc d-block d-lg-none pt-3">
                                              <div class="la-mcard__desc text-md la-anim__stagger-item--x">So, you can subscribe to all the courses and classes. Or rent them to learn whenever you want.</div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="swiper-slide la-mcard__slider mb-16">
                                          <div class="la-mcard__item p-4 p-lg-5">
                                            <div class="la-mcard__info d-flex align-items-center">
                                              <div class="li-mcard__prfle mr-4 mr-lg-10 la-anim__stagger-item--x"><img class="rounded-circle d-block la-mcard__img" src="https://picsum.photos/100" alt="Mentor Name"></div>
                                              <div class="la-mcard__details">
                                                <div class="la-mcard__name text-lg text-lg-xl la-anim__stagger-item--x">Mentor Name</div>
                                                <div class="la-mcard__skill text-sm d-block d-lg-none la-anim__stagger-item--x">Expertise</div>
                                                <div class="la-mcard__desc text-md d-none d-lg-block la-anim__stagger-item--x">So, you can subscribe to all the courses and classes. Or rent them to learn whenever you want.</div>
                                              </div>
                                            </div>
                                            <div class="la-mcard__desc d-block d-lg-none pt-3">
                                              <div class="la-mcard__desc text-md la-anim__stagger-item--x">So, you can subscribe to all the courses and classes. Or rent them to learn whenever you want.</div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="swiper-slide la-mcard__slider mb-16">
                                          <div class="la-mcard__item p-4 p-lg-5">
                                            <div class="la-mcard__info d-flex align-items-center">
                                              <div class="li-mcard__prfle mr-4 mr-lg-10"><img class="rounded-circle d-block la-mcard__img" src="https://picsum.photos/100" alt="Mentor Name"></div>
                                              <div class="la-mcard__details">
                                                <div class="la-mcard__name text-lg text-lg-xl">Mentor Name</div>
                                                <div class="la-mcard__skill text-sm d-block d-lg-none">Expertise</div>
                                                <div class="la-mcard__desc text-md d-none d-lg-block">So, you can subscribe to all the courses and classes. Or rent them to learn whenever you want.</div>
                                              </div>
                                            </div>
                                            <div class="la-mcard__desc d-block d-lg-none pt-3">
                                              <div class="la-mcard__desc text-md">So, you can subscribe to all the courses and classes. Or rent them to learn whenever you want.</div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="swiper-slide la-mcard__slider mb-16">
                                          <div class="la-mcard__item p-4 p-lg-5">
                                            <div class="la-mcard__info d-flex align-items-center">
                                              <div class="li-mcard__prfle mr-4 mr-lg-10"><img class="rounded-circle d-block la-mcard__img" src="https://picsum.photos/100" alt="Mentor Name"></div>
                                              <div class="la-mcard__details">
                                                <div class="la-mcard__name text-lg text-lg-xl">Mentor Name</div>
                                                <div class="la-mcard__skill text-sm d-block d-lg-none">Expertise</div>
                                                <div class="la-mcard__desc text-md d-none d-lg-block">So, you can subscribe to all the courses and classes. Or rent them to learn whenever you want.</div>
                                              </div>
                                            </div>
                                            <div class="la-mcard__desc d-block d-lg-none pt-3">
                                              <div class="la-mcard__desc text-md">So, you can subscribe to all the courses and classes. Or rent them to learn whenever you want.</div>
                                            </div>
                                          </div>
                                        </div>
              </div>
            </div>
            <div class="swiper-pagination swiper-pagination-custom la-mcard__pagination"></div>
          </div>
        </div>
        <!-- Column: End-->
      </div>
    </div>
  </section>
  <!-- Section: End-->
  <!-- Section: Start-->
  <section class="la-start-creating ">
    <div class="container la-dashed__vline">
      <div class="row">
        <!-- Column: Start-->
        <div class="col-md-5 col-lg-5 py-5 py-sm-2 px-5 px-sm-2 d-flex flex-row align-items-center la-anim__wrap">
          <div class="la-start-btn mb-8 la-anim__stagger-item"><span class="text-4xl m-0 font-weight-bold">Easy steps to start</span>
            <h2 class="text-6xl font-weight-bold la-anim__stagger-item">Sharing Values</h2><br>
            <a class="la-btn__app text-uppercase la-anim__stagger-item" role="button" href="/creator-signup">Start Creating</a>
          </div>
        </div>
        <!-- Column: End-->
        <!-- Column: Start-->
        <div class="col-md-6 col-lg-6 px-4 px-sm-0 py-8 py-sm-0 ml-6 la-vdot__class ">
          <div class="la-vdotted__bar position-relative px-4">
            <div class="la-vicon d-flex align-items-start la-anim__wrap">
              <div class="la-icon__vline la-anim__stagger-item"><span class="la-icon la-icon--7xl icon-video-unfilled position-absolute "></span></div>
              <div class="la-vicon__text">
                <h5 class="la-vicon__title la-anim__stagger-item">Record a Video</h5>
                <p class="la-vicon__desc pt-2 la-anim__stagger-item">Classify and videotape the course of your expertise as classes for better understanding</p>
                <a class="la-vicon__link text-uppercase position-absolute la-anim__stagger-item" href="/guided-creator">Need Assistance<span class="la-vicon__arrow la-icon la-icon--5xl icon-grey-arrow"></span></a>
              </div>
            </div>
            <div class="la-vicon d-flex align-items-start la-anim__wrap">
              <div class="la-icon__vline la-anim__stagger-item"><span class="la-icon la-icon--6xl icon-upload-unfilled position-absolute "></span></div>
              <div class="la-vicon__text">
                <h5 class=" la-vicon__title la-anim__stagger-item">Upload</h5>
                <p class="la-vicon__desc pt-2 la-anim__stagger-item">Edit and Upload classes in the recommended format</p>
              </div>
            </div>
            <div class="la-vicon d-flex align-items-start la-anim__wrap">
              <div class="la-icon__vline la-anim__stagger-item"><span class="la-icon la-icon--6xl icon-share-image position-absolute "></span></div>
              <div class="la-vicon__text">
                <h5 class="la-vicon__title la-anim__stagger-item">Share the World</h5>
                <p class="la-vicon__desc pt-2 la-anim__stagger-item">Your students and subscribers from all around the world get to learn new art forms, all while sitting in the comfort of their homes.</p>
              </div>
            </div>
            <div class="la-vicon d-flex align-items-start la-anim__wrap">
              <div class="la-icon__vline la-anim__stagger-item"><span class="la-icon la-icon--6xl icon-dollar position-absolute pl-1 "></span></div>
              <div class="la-vicon__text">
                <h5 class="la-vicon__title la-anim__stagger-item">Earn with your Creations</h5>
                <p class="la-vicon__desc pt-2 la-anim__stagger-item">Values aren't the only takeaway for a creator. Earn for your life of dreams while helping others follow theirs!</p>
                <a class="la-vicon__link text-uppercase position-absolute la-anim__stagger-item" href="#how_you_earn">Learn More<span class="la-vicon__arrow la-icon la-icon--5xl icon-grey-arrow"></span></a>
              </div>
            </div>
          </div>
        </div>
        <!-- Column: End-->
        <!-- Column: Start-->
        <div class="col-lg-1"></div>
        <!-- Column: End-->
      </div>
    </div>
  </section>
  <!-- Section: End-->
  <!-- Section: Start-->
  <section class="la-bcreator--earn py-5 mt-5 ">
    <div class="container">
      <div class="row">
        <!-- Column: Start-->
        <div class="col-sm-12" id="how_you_earn">
          <div class="la-earn__blog la-anim__wrap">
            <h3 class="la-earn__blog-title la-anim__stagger-item" >How you earn?</h3>
            <img class="img-fluid mx-auto d-block la-anim__stagger-item--x la-anim__D" src="../images/learners/creator/earn.svg" alt="How you Earn?">
          </div>
        </div>
        <!-- Column: End-->
      </div>
    </div>
    <div class="container-fluid la-bcreator--calc-wrapper my-5">
      <div class="container py-0 py-sm-3 px-0 px-lg-5">
        <div class="row my-5 px-0 px-lg-5">
          <!-- Column: Start-->
          <div class="col-sm-12 py-5 my-5 px-0 px-lg-5  la-anim__wrap">
            <div class="la-bcreator__calc text-center px-lg-4">
              <p class="la-bcreator__calc-title text-2xl pb-6 la-anim__stagger-item">How do we calculate your earnings?</p>
              <div class="row la-bcreator__calc-inner d-flex flex-row justify-content-center">
                <div class="col-3 col-lg la-bcreator__calc-itm px-0">
                  <span class="text-sm text-sm-md la-anim__stagger-item--x">Total watch time</span>
                  <p class="text-sm text-sm-lg la-anim__stagger-item--x">xxx<span class="pl-2">minutes</span></p>
                </div>
                <div class="la-bcreator-calcs text-2xl text-sm-5xl font-weight-bold mt-2 la-anim__stagger-item--x">&#xd7;</div>
                <div class="col-3 col-lg la-bcreator__calc-itm px-0">
                  <span class="text-sm text-sm-md la-anim__stagger-item--x">Earnings per minute</span>
                  <p class="text-sm text-sm-lg la-anim__stagger-item--x">$ xxx <span>  / minute</span></p>
                </div>
                <div class="la-bcreator-calcs text-2xl text-sm-5xl font-weight-bold mt-2 la-anim__stagger-item--x">&#x2212;</div>
                <div class="col-3 col-lg la-bcreator__calc-itm px-0">
                  <span class="text-sm text-sm-md la-anim__stagger-item--x">Slab rate</span>
                  <p class="text-sm text-sm-lg la-anim__stagger-item--x">$ x</p>
                </div>
                <div class="la-bcreator-calcs text-2xl text-sm-5xl font-weight-bold mt-2 la-anim__stagger-item--x"> &#x3d;</div>
                <div class="col-12 col-lg la-bcreator__calc-itm">
                  <span class="text-sm text-sm-md la-anim__stagger-item--x">Total Earnings</span>
                  <p class="text-sm text-sm-lg la-anim__stagger-item--x" style="color:#1EC812; ">$ xxx</p>
                </div>
              </div>
            </div>
          </div>
          <!-- Column: End       -->
        </div>
      </div>
    </div>
  </section>
  <!-- Section: End-->
  <!-- Section: Start-->
  <section class="la-bcreator-reach-stats">
    <div class="container my-5 ">
      <div class="row my-5">
        <!-- Column: Start-->
        <div class="col-sm-12 col-md-5">
          <div class="la-bcreator__reach-main pb-5 pb-sm-0 la-anim__wrap">
            <span class="la-bcreator__reach-tag la-anim__stagger-item">LILA&#39;s </span><br>
            <h3 class="la-bcreator__reach-title la-anim__stagger-item--x">Reach</h3>
          </div>
        </div>
        <!-- Column: End-->
        <!-- Column: Start-->
        <div class="col col-sm-4 col-md-2 my-auto">
          <div class="la-bcreator__stats">
            <div class="la-bcreator__stats-item la-anim__wrap">
              <h4 class="la-bcreator__stats-count m-0 la-anim__stagger-item">80 M</h4>
              <p class="la-bcreator__stats-desc  text-uppercase la-anim__stagger-item">Students</p>
            </div>
          </div>
        </div>
        <!-- Column: End-->
        <!-- Column: Start-->
        <div class="col col-sm-4 col-md-2 my-auto">   
          <div class="la-bcreator__stats-item la-anim__wrap">
            <h4 class="la-bcreator__stats-count m-0 la-anim__stagger-item">20 &#43;</h4>
            <p class="la-bcreator__stats-desc text-uppercase la-anim__stagger-item">Courses</p>
          </div>
        </div>
        <!-- Column: End-->
        <!-- Column: Start-->
        <div class="col col-sm-4 col-md-2 my-auto">
          <div class="la-bcreator__stats-item la-anim__wrap">
            <h4 class="la-bcreator__stats-count m-0 la-anim__stagger-item">100 &#43;</h4>
            <p class="la-bcreator__stats-desc text-uppercase la-anim__stagger-item">Countries</p>
          </div>
        </div>
        <!-- Column: End-->
        <!-- Column: Start-->
        <div class="col col-sm-12 col-md-1"></div>
        <!-- Column: End-->
      </div>
      <div class="row mt-5">
        <!-- Column: Start-->
        <div class="col col-sm-12 mt-2 mt-sm-14 la-anim__wrap">
          <div class="la-bcreator__stats-btn text-center d-none d-sm-block la-anim__stagger-item">
            <a class="btn-get__started la-btn__app text-uppercase" role="button" href="/creator-signup">Get Started</a>
          </div>
          <!-- For Mobile-->
          <div class="la-bcreator__stats-btn text-center d-block d-sm-none la-anim__stagger-item">
            <a class="btn-get__started la-btn__app btn-block px-5 text-uppercase" role="button" href="/creator-signup">Get Started</a>
          </div>
        </div>
        <!-- Column: End-->
      </div>
    </div>
  </section>
  <!-- Section: End-->
  <!-- Section: Start-->
  <section class="la-bcreator--benefits ">
    <div class="container">
      <div class="row ">
        <!-- Column: Start-->
        <div class="col-12 ">
          <div class=" position-relative la-anim__wrap">
            <h2 class="la-bcreator__benefits-main text-uppercase text-center la-anim__fade-in-top ">Benefits</h2>
          </div>
        </div>
        <!-- Column: End-->
        <!-- Column: Start-->
        <div class="col-md-6 col-lg-4 text-center la-anim__wrap">
          <div class="la-bcreator__benefits-card p-5 p-sm-3 py-lg-3 px-lg-12 la-anim__stagger-item--x">
            <div class="p-2">
              <span class="la-bcreator__benefits-icon la-icon la-icon--7xl icon-earnings-image ml-md-n4 la-anim__stagger-item"></span>
              <h5 class="la-bcreator__benefits-title pt-3 pt-sm-5 la-anim__stagger-item">Earnings</h5>
              <p class="la-bcreator__benefits-para pt-3 la-anim__stagger-item">Make a living, earn values all while sharing with the world, what you are best at</p>
            </div>
          </div>
        </div>
        <!-- Column: End-->
        <!-- Column: Start-->
        <div class="col-md-6 col-lg-4 text-center la-anim__wrap">
          <div class="la-bcreator__benefits-card p-5 p-sm-1 py-lg-3 px-lg-10 la-anim__stagger-item--x">
            <div class="p-2">
              <span class="la-bcreator__benefits-icon la-icon la-icon--8xl icon-recognition-image ml-md-n4 mt-md-1 la-anim__stagger-item"></span>
              <h5 class="la-bcreator__benefits-title  pt-3 pt-sm-5 la-anim__stagger-item">Recognition</h5>
              <p class="la-bcreator__benefits-para pt-3 la-anim__stagger-item">With students from all parts of the world, become a household name in the art of your expertise</p>
            </div>
          </div>
        </div>
        <!-- Column: End-->
        <!-- Column: Start-->
        <div class="col-md-12 col-lg-4 text-center la-anim__wrap">
          <div class="la-bcreator__benefits-card p-5 p-sm-3 py-lg-3 px-lg-14 la-anim__stagger-item--x">
            <div class="p-2">
              <span class="la-bcreator__benefits-icon la-icon la-icon--8xl icon-inspire-image ml-md-n4 la-anim__stagger-item"></span>
              <h5 class="la-bcreator__benefits-title  pt-3 pt-sm-5 la-anim__stagger-item">Inspire Students</h5>
              <p class="la-bcreator__benefits-para pt-3 la-anim__stagger-item">Help people realize their potential and bring out the true artist in them</p>
            </div>
          </div>
        </div>
        <!-- Column: End-->
      </div>
    </div>
  </section>
  <!-- Section: End-->
  <!-- Section: Start-->
  <section class="la-bgcreator--ad-banner ">
    <div class="container">
      <div class="row">
        <!-- Column: Start-->
        <div class="col-sm-12 px-0 px-sm-3 la-anim__wrap">
          <div class="la-bgcreator__ad-content text-center text-white px-5 la-anim__stagger-item">
            <div class="px-5">
              <p class="la-bgcreator__ad-para la-anim__stagger-item">Broaden your reach! Help students hone their skills through your courses</p><br>
              <a class=" la-btn__app text-white text-uppercase la-anim__stagger-item" role="button" href="/creator-signup">Start Creating</a>
              <div class="mt-4">
                <a class="la-arrow-link text-uppercase position-relative la-anim__stagger-item" href="/guided-creator"> Learn More
                  <span class="la-icon la-icon--5xl icon-grey-arrow la-anim__stagger-item--x"></span>
                </a>
              </div>
            </div>
          </div>
        </div>
        <!-- Column: End-->
      </div>
    </div>
  </section>
  <!-- Section: End-->
  <!-- Section: Start-->
  <section class="la-bgcreator--faq la-anim__wrap">
    <div class="container">
      <div class="row">
        <!-- Column: Start-->
        <div class="col-12 px-5 px-sm-0 la-anim__wrap">
          <div class="panel-group" id="accordion">
            <h4 class="la-bgcreator__faq-title la-anim__stagger-item">FAQ&#39;s</h4>

              @foreach($faqs->take(3) as $f)
                <div class="panel panel-default la-bgcreator__faq-panel la-anim__stagger-item">
                  <div class="panel-heading la-bgcreator__panel-head la-anim__stagger-item--x" id="faqCalcHead">
                    <div class="panel-title la-bgcreator__panel-title"><a class="accordion-toggle collapsed text-md" href="#faq_{{ $f->id }}" data-toggle="collapse" aria-expanded="true" aria-controls="#faq_{{ $f->id }}">{{ $f->title }}</a></div>
                  </div>
                  <div class="panel-collapse collapse" id="faq_{{ $f->id }}" aria-labelledby="faqCalcHead" data-parent="#accordion">
                    <div class="panel-body la-bgcreator__panel-body">
                      <p class="m-0 la-bgcreator__panel-para panel-text text-md">{!! $f->details !!}</p>
                    </div>
                  </div>
                </div>
              @endforeach


            <!-- See all Collapse: Start -->
            <div class="collapse" id="faq_collapse">

              @foreach($faqs->skip(3) as $f)
                  <div class="panel panel-default la-bgcreator__faq-panel la-anim__stagger-item">
                    <div class="panel-heading la-bgcreator__panel-head la-anim__stagger-item--x" id="faqCalcHead">
                      <div class="panel-title la-bgcreator__panel-title"><a class="accordion-toggle collapsed text-md" href="#faq_{{ $f->id }}" data-toggle="collapse" aria-expanded="true" aria-controls="#faq_{{ $f->id }}">{{ $f->title }}</a></div>
                    </div>
                    <div class="panel-collapse collapse" id="faq_{{ $f->id }}" aria-labelledby="faqCalcHead" data-parent="#accordion">
                      <div class="panel-body la-bgcreator__panel-body">
                        <p class="m-0 la-bgcreator__panel-para panel-text text-md">{!! $f->details !!}</p>
                      </div>
                    </div>
                  </div>
              @endforeach

              
            </div>
             <!-- See all Collapse: End -->
            
            <div class="la-bgcreator__faq-all text-center text-sm-right pt-4 la-anim__stagger-item">
              <a class= "text-sm collapsed" data-toggle="collapse" href="#faq_collapse"><span class="la-bgcreator__all-link"></span></a>
            </div>
            
          </div>
        </div>
        <!-- Column: End-->
      </div>
    </div>
  </section>
  <!-- Section: End-->
@endsection