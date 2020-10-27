@extends('learners.layouts.app')

@section('content')
<section class="la-section">
    <div class="la-vcourse">
      <div class="container">
        <div class="row  mb-12"> 
          <div class="col-12 col-lg-7">
            <div class="la-vcourse__header d-flex align-items-center">
              <h1 class="la-vcourse__title mr-8">Water Color Art</h1>
              <div class="la-vcourse__badges">
                <img src="./images/icons/badge.svg" alt="badge">
              </div>
            </div>
            <div class="la-vcourse__rating mb-2">
              <div id="rateYo"></div>
            </div>
            <p class="la-vcourse__excerpt mb-5">Improvise your color theory knowledge and paint any idea in your own colors.</p>
            <div class="la-vcourse__creator d-flex align-items-center">
              <div class="la-vcourse__creator-avator"><img src="https://picsum.photos/200/200" alt=""></div>
              <div class="la-vcourse__creator-name">Amy D'souza</div>
            </div>
          </div>
          <div class="col-12 col-lg-5 d-flex flex-column justify-content-between">
            <div class="la-vcourse__buy text-right mb-2">
              <a class="btn btn-primary la-btn la-btn--primary d-lg-inline-flex justify-content-end">Subscribe Now</a>
            </div>
            <div class="la-vcourse__info-items d-flex align-items-center justify-content-end">
              <div class="la-vcourse__info-item la-vcourse__info--videos d-flex flex-column align-items-center justify-content-end">
                <div class="la--count">05</div>
                <span class="la--label mt-1">Videos</span>
              </div>
              <div class="la-vcourse__info-item la-vcourse__info--learners d-flex flex-column align-items-center justify-content-end mx-10">
                <div class="la--count">300</div>
                <span class="la--label mt-1">Learners</span>
              </div>
              <div class="la-vcourse__info-item la-vcourse__info--level d-flex flex-column align-items-center justify-content-end">
                <div class="la--icon"><img src="./images/icons/level-beginner.svg" alt="beginner"></div>
                <span class="la--label mt-1">Beginner</span>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <ul class="list-unstyled d-block d-lg-flex mb-6">
              <li class="la-vcourse__duration mr-14"><span class="la-text-gray4">Duration </span>  15h 32m</li>
              <li class="la-vcourse__updatedon mr-14"><span class="la-text-gray4">Last Updated </span>  June19, 2020</li>
              <li class="la-vcourse__languages mr-14"> <span class="la-text-gray4">Languages </span>  English, Hindi </li>
            </ul>
          </div>
          <div class="col-12 la-vcourse__primary-info d-flex mb-2">
            <div class="la-vcourse__classes-info pr-2">
              <span class="la--count">2</span>
              <span class="la--label">Classes</span>
            </div>
            <div class="la-vcourse__videos-info pl-2">
              <span class="la--count">5</span>
              <span class="la--label">Videos</span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12 col-lg-6">
            <div class="la-player la-vcourse__player mb-3">
              <div class="la-player__inner"></div>
            </div>
            <h2 class="la-vlesson__title m-0">At vero eos et accusam et</h2><small class="la-vlesson__creator">Amy D'souza</small>
          </div>
          <div class="col-12 col-lg-6">
            <div class="la-vcourse__curriculam pl-2 pl-lg-8">
              <div class="la-vcourse__class">
                <div class="la-vcourse__class-header d-flex mb-7 ml-5">
                  <div class="la-vcourse__class-thumb mr-3"><img class="img-fluid" src="https://picsum.photos/100"></div>
                  <div class="d-flex flex-column">
                    <div class="la-vcourse__class-title leading-4 text-xl mb-1">Class 1: Lorem ipsum dolor sit</div><small class="la-vcourse__class-videoscount">2 Videos</small>
                  </div>
                </div>
                <div class="la-vcourse__lessons">
                  <div class="la-vcourse__lesson position-relative">
                    <div class="la-vcourse__access-wrap">
                      <div class="la-vcourse__access la-vcourse__access--free d-flex align-items-center justify-content-center">
                        <span class="icon-play la-vcourse__access-icon la-vcourse__access-icon--white"></span>
                      </div>
                    </div>
                    <div class="la-vcourse__lesson-left position-relative">
                      <div class="la-vcourse__lesson-thumbnail">
                        <img class="img-fluid" src="https://picsum.photos/200/120">
                      </div>
                      <div class="la-vcourse__lesson-playbtn">
                        <span></span>
                      </div>
                      <div class="la-vcourse__video-progress position-absolute w-100">
                        <div class="la-vcourse__video-time text-right mr-1">01:15:00</div>
                        <div class="la-vcourse__video-track position-relative">
                          <span class="la-vcourse__video-bar"></span>
                        </div>
                      </div>
                    </div>
                    <div class="la-vcourse__lesson-right d-flex flex-column">
                      <div class="la-vcourse__lesson-title">1. At vero eos et accusam et</div>
                      <div class="la-vcourse__lesson-creator pl-4">Amy D'souza</div>
                      <div class="la-vcourse__lesson-learnt mt-auto">0%</div>
                      <div class="la-vcourse__lesson-status"></div>
                    </div>
                  </div>
                  <div class="la-vcourse__lesson position-relative">
                    <div class="la-vcourse__access-wrap">
                      <div class="la-vcourse__access la-vcourse__access--locked d-flex align-items-center justify-content-center">
                        <span class="icon-lock la-vcourse__access-icon la-vcourse__access-icon--danger"></span>
                      </div>
                    </div>
                    <div class="la-vcourse__lesson-left position-relative">
                      <div class="la-vcourse__lesson-thumbnail">
                        <img class="img-fluid" src="https://picsum.photos/200/120">
                      </div>
                      <div class="la-vcourse__lesson-playbtn">
                        <span></span>
                      </div>
                      <div class="la-vcourse__video-progress position-absolute w-100">
                        <div class="la-vcourse__video-time text-right mr-1">01:15:00</div>
                        <div class="la-vcourse__video-track position-relative">
                          <span class="la-vcourse__video-bar"></span>
                        </div>
                      </div>
                    </div>
                    <div class="la-vcourse__lesson-right d-flex flex-column">
                      <div class="la-vcourse__lesson-title">1. At vero eos et accusam et</div>
                      <div class="la-vcourse__lesson-creator pl-4">Amy D'souza</div>
                      <div class="la-vcourse__lesson-learnt mt-auto">0%</div>
                      <div class="la-vcourse__lesson-status"></div>
                    </div>
                  </div>
                  <div class="la-vcourse__lesson position-relative">
                    <div class="la-vcourse__access-wrap">
                      <div class="la-vcourse__access la-vcourse__access--locked d-flex align-items-center justify-content-center">
                        <span class="icon-lock la-vcourse__access-icon la-vcourse__access-icon--danger"></span>
                      </div>
                    </div>
                    <div class="la-vcourse__lesson-left position-relative">
                      <div class="la-vcourse__lesson-thumbnail">
                        <img class="img-fluid" src="https://picsum.photos/200/120">
                      </div>
                      <div class="la-vcourse__lesson-playbtn">
                        <span></span>
                      </div>
                      <div class="la-vcourse__video-progress position-absolute w-100">
                        <div class="la-vcourse__video-time text-right mr-1">01:15:00</div>
                        <div class="la-vcourse__video-track position-relative">
                          <span class="la-vcourse__video-bar"></span>
                        </div>
                      </div>
                    </div>
                    <div class="la-vcourse__lesson-right d-flex flex-column">
                      <div class="la-vcourse__lesson-title">1. At vero eos et accusam et</div>
                      <div class="la-vcourse__lesson-creator pl-4">Amy D'souza</div>
                      <div class="la-vcourse__lesson-learnt mt-auto">0%</div>
                      <div class="la-vcourse__lesson-status"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="la-vcourse__class">
                <div class="la-vcourse__class-header d-flex mb-7 ml-5">
                  <div class="la-vcourse__class-thumb mr-3"><img class="img-fluid" src="https://picsum.photos/100"></div>
                  <div class="d-flex flex-column">
                    <div class="la-vcourse__class-title leading-4 text-xl">Class 1: Lorem ipsum dolor sit</div><small class="la-vcourse__class-videoscount">2 Videos</small>
                  </div>
                </div>
                <div class="la-vcourse__lessons">
                  <div class="la-vcourse__lesson position-relative">
                    <div class="la-vcourse__access-wrap">
                      <div class="la-vcourse__access la-vcourse__access--locked d-flex align-items-center justify-content-center">
                        <span class="icon-lock la-vcourse__access-icon la-vcourse__access-icon--danger"></span>
                      </div>
                    </div>
                    <div class="la-vcourse__lesson-left position-relative">
                      <div class="la-vcourse__lesson-thumbnail">
                        <img class="img-fluid" src="https://picsum.photos/200/120">
                      </div>
                      <div class="la-vcourse__lesson-playbtn">
                        <span></span>
                      </div>
                      <div class="la-vcourse__video-progress position-absolute w-100">
                        <div class="la-vcourse__video-time text-right mr-1">01:15:00</div>
                        <div class="la-vcourse__video-track position-relative">
                          <span class="la-vcourse__video-bar"></span>
                        </div>
                      </div>
                    </div>
                    <div class="la-vcourse__lesson-right d-flex flex-column">
                      <div class="la-vcourse__lesson-title">1. At vero eos et accusam et</div>
                      <div class="la-vcourse__lesson-creator pl-4">Amy D'souza</div>
                      <div class="la-vcourse__lesson-learnt mt-auto">0%</div>
                      <div class="la-vcourse__lesson-status"></div>
                    </div>
                  </div>
                  <div class="la-vcourse__lesson position-relative">
                    <div class="la-vcourse__access-wrap">
                      <div class="la-vcourse__access la-vcourse__access--locked d-flex align-items-center justify-content-center">
                        <span class="icon-lock la-vcourse__access-icon la-vcourse__access-icon--danger"></span>
                      </div>
                    </div>
                    <div class="la-vcourse__lesson-left position-relative">
                      <div class="la-vcourse__lesson-thumbnail">
                        <img class="img-fluid" src="https://picsum.photos/200/120">
                      </div>
                      <div class="la-vcourse__lesson-playbtn">
                        <span></span>
                      </div>
                      <div class="la-vcourse__video-progress position-absolute w-100">
                        <div class="la-vcourse__video-time text-right mr-1">01:15:00</div>
                        <div class="la-vcourse__video-track position-relative">
                          <span class="la-vcourse__video-bar"></span>
                        </div>
                      </div>
                    </div>
                    <div class="la-vcourse__lesson-right d-flex flex-column">
                      <div class="la-vcourse__lesson-title">1. At vero eos et accusam et</div>
                      <div class="la-vcourse__lesson-creator pl-4">Amy D'souza</div>
                      <div class="la-vcourse__lesson-learnt mt-auto">0%</div>
                      <div class="la-vcourse__lesson-status"></div>
                    </div>
                  </div>
                  <div class="la-vcourse__lesson position-relative">
                    <div class="la-vcourse__access-wrap">
                      <div class="la-vcourse__access la-vcourse__access--locked d-flex align-items-center justify-content-center">
                        <span class="icon-lock la-vcourse__access-icon la-vcourse__access-icon--danger"></span>
                      </div>
                    </div>
                    <div class="la-vcourse__lesson-left position-relative">
                      <div class="la-vcourse__lesson-thumbnail">
                        <img class="img-fluid" src="https://picsum.photos/200/120">
                      </div>
                      <div class="la-vcourse__lesson-playbtn">
                        <span></span>
                      </div>
                      <div class="la-vcourse__video-progress position-absolute w-100">
                        <div class="la-vcourse__video-time text-right mr-1">01:15:00</div>
                        <div class="la-vcourse__video-track position-relative">
                          <span class="la-vcourse__video-bar"></span>
                        </div>
                      </div>
                    </div>
                    <div class="la-vcourse__lesson-right d-flex flex-column">
                      <div class="la-vcourse__lesson-title">1. At vero eos et accusam et</div>
                      <div class="la-vcourse__lesson-creator pl-4">Amy D'souza</div>
                      <div class="la-vcourse__lesson-learnt mt-auto">0%</div>
                      <div class="la-vcourse__lesson-status"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="la-vcourse__btn-wrap text-center mt-3">
              <a class="la-btn__arrow-down la-vcourse__btn d-inline-block" href="">
                <span class="icon-down-arrow la-btn__icon la-btn__icon--grey"></span>
                <div class="la-btn__text la-btn__text--purple">See the list</div>
              </a>
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
              <li class="nav-item la-courses__nav-item"><a class="nav-link la-courses__nav-link text-capitalize" id="cnav-resource-tab" data-toggle="tab" href="#cnav-resource" role="tab" aria-controls="cnav-resource" aria-selected="false">Resources</a></li>
              <li class="nav-item la-courses__nav-item"><a class="nav-link la-courses__nav-link text-capitalize" id="cnav-certificate-tab" data-toggle="tab" href="#cnav-certificate" role="tab" aria-controls="cnav-certificate" aria-selected="false">Certificate</a></li>
            </ul>
          </nav>
          <div class="tab-content la-courses__content" id="cnav-tabContent">
            <div class="tab-pane fade show active" id="cnav-about" role="tabpanel" aria-labelledby="cnav-about-tab">
              <div class="col-lg-9 px-0">
                <div class="col-12 col-lg px-0">
                  <div class="la-ctabs__about">
                    <div class="la-ctabs__about-desc">
                      <p class="text-md">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.</p>
                      <p class="text-md">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.<span>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.</span><span>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.</span></p>
                    </div>
                    <div class="la-ctabs__about-list my-6">
                      <div class="la-ctabs__list d-flex"><i class="la-icon icon-tick"></i><span class="ml-5">Lorem ipsum dolor sit amet, consetetur</span></div>
                      <div class="la-ctabs__list d-flex"><i class="la-icon icon-tick"></i><span class="ml-5">Lorem ipsum dolor sit amet, consetetur</span></div>
                      <div class="la-ctabs__list d-flex"><i class="la-icon icon-tick"></i><span class="ml-5">Lorem ipsum dolor sit amet, consetetur</span></div>
                      <div class="la-ctabs__list d-flex"><i class="la-icon icon-tick"></i><span class="ml-5">Lorem ipsum dolor sit amet, consetetur</span></div>
                      <p class="collapse mt-3" id="readmore">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.</p>
                    </div>
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
            <div class="tab-pane fade" id="cnav-resource" role="tabpanel" aria-labelledby="cnav-resource-tab">
              <div class="col-lg px-0 d-flex">
                <div class="col-12 col-md col-lg px-0">
                  <div class="la-ctabs__resources d-flex">
                    <div class="la-ctabs__resource-pdf"><i class="la-icon--5xl icon-download mr-8"></i></div>
                    <div class="la-ctabs__resource-desc">
                      <div class="la-ctabs__resource-title text-lg head-font text-uppercase">Things to follow</div><a class="la-ctabs__resource-file text-sm" href="">things_to_follow.pdf</a>
                    </div>
                  </div>
                </div>
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
              <div class="col-12 px-0 d-flex justify-content-end"> <a class="la-ctabs__download-all text-sm" href=""><span class="text-uppercase">DOWNLOAD ALL<span class="pl-1 la-icon icon-download"> </span></span></a></div>
            </div>
            <div class="tab-pane fade" id="cnav-certificate" role="tabpanel" aria-labelledby="cnav-certificate-tab">
              <div class="col-lg px-0 d-flex">
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
        <!-- Mobile Version-->
        <div class="la-ctabs d-block d-sm-none">
          <div class="la-ctabs__content">
            <div class="col-12 mb-20">
              <div class="la-ctabs__title text-4xl mb-8">About</div>
                <div class="col-12 col-lg px-0">
                  <div class="la-ctabs__about">
                    <div class="la-ctabs__about-desc">
                      <p class="text-md">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.</p>
                      <p class="text-md">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.<span>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.</span><span>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.</span></p>
                    </div>
                    <div class="la-ctabs__about-list my-6">
                      <div class="la-ctabs__list d-flex"><i class="la-icon icon-tick"></i><span class="ml-5">Lorem ipsum dolor sit amet, consetetur</span></div>
                      <div class="la-ctabs__list d-flex"><i class="la-icon icon-tick"></i><span class="ml-5">Lorem ipsum dolor sit amet, consetetur</span></div>
                      <div class="la-ctabs__list d-flex"><i class="la-icon icon-tick"></i><span class="ml-5">Lorem ipsum dolor sit amet, consetetur</span></div>
                      <div class="la-ctabs__list d-flex"><i class="la-icon icon-tick"></i><span class="ml-5">Lorem ipsum dolor sit amet, consetetur</span></div>
                      <p class="collapse mt-3" id="readmore">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.</p>
                    </div>
                  </div><a class="la-ctabs__readmore d-flex justify-content-center justify-content-md-end mt-lg-3" role="button" href="#readmore" data-toggle="collapse" aria-expanded="true">Read More</a>
                </div>
            </div>
            <div class="col-12 mb-4">
              <div class="la-ctabs__title text-4xl mb-8">Resources</div>
                <div class="col-12 col-md col-lg px-0">
                  <div class="la-ctabs__resources d-flex">
                    <div class="la-ctabs__resource-pdf"><i class="la-icon--5xl icon-download mr-8"></i></div>
                    <div class="la-ctabs__resource-desc">
                      <div class="la-ctabs__resource-title text-lg head-font text-uppercase">Things to follow</div><a class="la-ctabs__resource-file text-sm" href="">things_to_follow.pdf</a>
                    </div>
                  </div>
                </div>
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
                <div class="mb-7"><img class="img-fluid" src="./images/learners/course-benefits/video.svg"></div>
                <h4 class="la-cbenefits__item-title mb-3">Unlimited Learning</h4>
                <p class="la-cbenefits__item-desc m-0">One plan - All subscribed content</p>
              </div>
            </div>
            <div class="col">
              <div class="la-cbenefits__item d-flex flex-column align-items-center">
                <div class="mb-7"><img class="img-fluid" src="./images/learners/course-benefits/certificate.svg"></div>
                <h4 class="la-cbenefits__item-title mb-3">Certification</h4>
                <p class="la-cbenefits__item-desc m-0">Course completion certificate</p>
              </div>
            </div>
            <div class="col">
              <div class="la-cbenefits__item d-flex flex-column align-items-center">
                <div class="mb-7"><img class="img-fluid" src="./images/learners/course-benefits/online-course.svg"></div>
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
  <section class="la-section la-section--grey la-vcourse__purchase">
    <div class="la-vcourse__purchase-inwrap container">
      <div class="row la-vcourse__purchase-row">
        <div class="col-md-6 la-vcourse__purchase-left">
          <div class="la-vcourse__purchase-prize mb-8">Purchase this Course @ <span class="la-vcourse__purchase-prize--amount"><b>$35</b></span></div>
          <form class="la-vcourse__purchase-form" action="">
            <div class="la-vcourse__purchase-classes">
              <div class="la-vcourse__purchase-class la-vcourse__purchase-class--all mb-4">
                <div class="la-form__radio-wrap">
                  <input class="la-form__radio d-none la-vcourse__purchase-input" checked type="radio" value="all-classes" name="classes" id="allClasses">
                  <label class="d-flex align-items-center la-vcourse__purchase-label" for="allClasses">
                    <span class="la-form__radio-circle la-form__radio-circle--typeB d-flex justify-content-center align-items-center mr-2"></span>
                    <span class="">All Classes</span>
                  </label>
                </div>
              </div>
              <div class="la-vcourse__purchase-class la-vcourse__purchase-class--select">
                <div class="la-form__radio-wrap">
                  <input class="la-form__radio d-none la-vcourse__purchase-input" type="radio" value="select-classes" name="classes" id="selectClasses">
                  <label class="d-flex align-items-center la-vcourse__purchase-label" for="selectClasses">
                    <span class="la-form__radio-circle la-form__radio-circle--typeB d-flex justify-content-center align-items-center mr-2"></span>
                    <span class="">Select Classes</span>
                  </label>
                </div>
                <div class="la-vcourse__purchase-items mt-8 pl-8">
                  <table class="w-100 la-vcourse__classes-wrap">
                    <tr class="la-vcourse__sclass-item">
                      <th class="mb-4 la-vcourse__sclass-heading"></th>
                      <th class="mb-4 la-vcourse__sclass-heading">Class</th>
                      <th class="mb-4 la-vcourse__sclass-heading">Name</th>
                      <th class="mb-4 la-vcourse__sclass-heading">Mentor</th>
                      <th class="mb-4 la-vcourse__sclass-heading">Price</th>
                    </tr>
                    <tr class="la-vcourse__sclass-item align-top">
                      <td class="la-vcourse__sclass-data pt-3 la-vcourse__sclass-data--checkbox">
                        <div>
                          <input id="selectItem1" class="la-form__checkbox-input custom-control-input" type="checkbox">
                          <label class="" for="selectItem1">
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
                      <td class="la-vcourse__sclass-data pt-3 la-vcourse__sclass-data--name">At vero eos</td>
                      <td class="la-vcourse__sclass-data pt-3 la-vcourse__sclass-data--mentor">Amy D'souza</td>
                      <td class="la-vcourse__sclass-data pt-3 la-vcourse__sclass-data--price">$20</td>
                    </tr>
                    <tr class="la-vcourse__sclass-item align-top">
                      <td class="la-vcourse__sclass-data pt-3 la-vcourse__sclass-data--checkbox">
                        <div>
                          <input id="selectItem2" class="la-form__checkbox-input custom-control-input" type="checkbox">
                          <label class="" for="selectItem2">
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
                      <td class="la-vcourse__sclass-data pt-3 la-vcourse__sclass-data--name">At vero eos</td>
                      <td class="la-vcourse__sclass-data pt-3 la-vcourse__sclass-data--mentor">Amy D'souza</td>
                      <td class="la-vcourse__sclass-data pt-3 la-vcourse__sclass-data--price">$20</td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
            <div class="la-vcourse__purchase-actions d-flex flex-wrap align-items-center mt-8">
              <div class="la-vcourse__purchase-btn w-50">
                <a class="btn btn-primary la-btn la-btn--primary w-100 text-center">BUy course</a>
              </div>
              <div class="la-vcourse__purchase-btn w-50">
                <a class="btn la-btn la-btn__plain text--green w-100 text-center">ADD TO CART</a>
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
                <a class="btn btn-primary active la-btn la-btn--primary text-center">SUBSCRIBE NOW</a>
              </div>
              <a href="" class="la-vcourse__purchase-trial--lnk mt-8">Start free 7 Days trial</a>
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
        <div class="row">
          <div class="col-lg-12">
            <li class="la-rtng__item">
              <div class="la-rtng__inner d-flex flex-column flex-md-row justify-content-between">
                <div class="la-rtng__title head-font text-xl">Reviews &amp; Ratings
                  <div class="la-rtng__wrapper d-flex flex-column flex-md-row justify-content-between">
                    <div class="la-rtng__overall text-left text-md-center">
                      <div class="la-rtng__total body-font text-5xl mx-4 mx-md-0 px-5 px-md-0">4.0</div>
                      <div class="la-rtng__icons d-inline-flex">
                        <div class="la-icon--xl icon-star la-rtng__fill"> </div>
                        <div class="la-icon--xl icon-star la-rtng__fill"> </div>
                        <div class="la-icon--xl icon-star la-rtng__fill"> </div>
                        <div class="la-icon--xl icon-star la-rtng__fill"> </div>
                        <div class="la-icon--xl icon-star la-rtng__unfill"> </div>
                      </div>
                      <div class="la-rtng__course body-font text-sm mt-n1 px-3 px-md-0">Course Rating</div>
                    </div>
                    <div class="la-rtng__indicators">
                      <div class="la-rtng__bars d-flex flex-row jsutify-content-between">
                        <div class="progress la-rtng__progress">
                          <div class="progress-bar la-rtng__progress-bar" role="progressbar" style="width:60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="la-rtng__pg-rtng d-inline-flex px-3">
                          <div class="la-icon--md icon-star la-rtng__fill"></div>
                          <div class="la-icon--md icon-star la-rtng__fill"></div>
                          <div class="la-icon--md icon-star la-rtng__fill"></div>
                          <div class="la-icon--md icon-star la-rtng__fill"></div>
                          <div class="la-icon--md icon-star la-rtng__fill"></div>
                        </div>
                        <div class="la-rtng__percent body-font text-xs">60%</div>
                      </div>
                      <div class="la-rtng__bars d-flex flex-row jsutify-content-between">
                        <div class="progress la-rtng__progress">
                          <div class="progress-bar la-rtng__progress-bar" role="progressbar" style="width:29%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="la-rtng__pg-rtng d-inline-flex px-3">
                          <div class="la-icon--md icon-star la-rtng__fill"></div>
                          <div class="la-icon--md icon-star la-rtng__fill"></div>
                          <div class="la-icon--md icon-star la-rtng__fill"></div>
                          <div class="la-icon--md icon-star la-rtng__fill"></div>
                          <div class="la-icon--md icon-star la-rtng__unfill"></div>
                        </div>
                        <div class="la-rtng__percent body-font text-xs">29%</div>
                      </div>
                      <div class="la-rtng__bars d-flex flex-row jsutify-content-between">       
                        <div class="progress la-rtng__progress">
                          <div class="progress-bar la-rtng__progress-bar" role="progressbar" style="width:8%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="la-rtng__pg-rtng d-inline-flex px-3">
                          <div class="la-icon--md icon-star la-rtng__fill"></div>
                          <div class="la-icon--md icon-star la-rtng__fill"></div>
                          <div class="la-icon--md icon-star la-rtng__fill"></div>
                          <div class="la-icon--md icon-star la-rtng__unfill"></div>
                          <div class="la-icon--md icon-star la-rtng__unfill"></div>
                        </div>
                        <div class="la-rtng__percent body-font text-xs">8%</div>
                      </div>
                      <div class="la-rtng__bars d-flex flex-row jsutify-content-between">       
                        <div class="progress la-rtng__progress">
                          <div class="progress-bar la-rtng__progress-bar" role="progressbar" style="width:1%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="la-rtng__pg-rtng d-inline-flex px-3">
                          <div class="la-icon--md icon-star la-rtng__fill"></div>
                          <div class="la-icon--md icon-star la-rtng__fill"></div>
                          <div class="la-icon--md icon-star la-rtng__unfill"></div>
                          <div class="la-icon--md icon-star la-rtng__unfill"></div>
                          <div class="la-icon--md icon-star la-rtng__unfill"></div>
                        </div>
                        <div class="la-rtng__percent body-font text-xs">1%</div>
                      </div>
                      <div class="la-rtng__bars d-flex flex-row jsutify-content-between">       
                        <div class="progress la-rtng__progress">
                          <div class="progress-bar la-rtng__progress-bar" role="progressbar" style="width:2%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">  </div>
                        </div>
                        <div class="la-rtng__pg-rtng d-inline-flex px-3">
                          <div class="la-icon--md icon-star la-rtng__fill"></div>
                          <div class="la-icon--md icon-star la-rtng__unfill"></div>
                          <div class="la-icon--md icon-star la-rtng__unfill"></div>
                          <div class="la-icon--md icon-star la-rtng__unfill"></div>
                          <div class="la-icon--md icon-star la-rtng__unfill"></div>
                        </div>
                        <div class="la-rtng__percent body-font text-xs">2%</div>
                      </div>
                    </div>
                  </div>
                </div><a class="la-rtng__review text-uppercase text-center text-md-right" href="">Leave a Review</a>
              </div>
            </li>
          </div>
          <div class="col-lg-8">
            <li class="la-lcreviews__item">
              <div class="la-lcreviews__inner">
                <div class="la-lcreviews__wrapper d-flex flex-column flex-md-row justify-content-between">
                  <div class="la-lcreviews__prfle d-inline-flex">
                    <div class="la-lcreviews__prfle-img"><img class="img-fluid rounded-circle d-block" src="https://picsum.photos/70" alt="Nathan Spark"></div>
                    <div class="la-lcreviews__prfle-info">
                      <div class="la-reviews__timestamp text-sm">2 weeks ago</div>
                      <div class="la-reviews__uname text-xl text-uppercase">Nathan Spark</div>
                    </div>
                  </div>
                  <div class="la-lcreviews__content w-100">
                    <div class="la-lcreviews__ratings"><span class="la-icon--xl icon-star la-rtng__fill"></span><span class="la-icon--xl icon-star la-rtng__fill"></span><span class="la-icon--xl icon-star la-rtng__fill"></span><span class="la-icon--xl icon-star la-rtng__fill"></span><span class="la-icon--xl icon-star la-rtng__unfill"></span></div>
                    <div class="la-lcreviews__comment text-md">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. </div>
                  </div>
                </div>
              </div>
            </li>
            <li class="la-lcreviews__item">
              <div class="la-lcreviews__inner">
                <div class="la-lcreviews__wrapper d-flex flex-column flex-md-row justify-content-between">
                  <div class="la-lcreviews__prfle d-inline-flex">
                    <div class="la-lcreviews__prfle-img"><img class="img-fluid rounded-circle d-block" src="https://picsum.photos/70" alt="Amish Patel"></div>
                    <div class="la-lcreviews__prfle-info">
                      <div class="la-reviews__timestamp text-sm">4 weeks ago</div>
                      <div class="la-reviews__uname text-xl text-uppercase">Amish Patel</div>
                    </div>
                  </div>
                  <div class="la-lcreviews__content w-100">
                    <div class="la-lcreviews__ratings"><span class="la-icon--xl icon-star la-rtng__fill"></span><span class="la-icon--xl icon-star la-rtng__fill"></span><span class="la-icon--xl icon-star la-rtng__fill"></span><span class="la-icon--xl icon-star la-rtng__fill"></span><span class="la-icon--xl icon-star la-rtng__unfill"></span></div>
                    <div class="la-lcreviews__comment text-md">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. </div>
                  </div>
                </div>
              </div>
            </li>
            <li class="la-lcreviews__item">
              <div class="la-lcreviews__inner">
                <div class="la-lcreviews__wrapper d-flex flex-column flex-md-row justify-content-between">
                  <div class="la-lcreviews__prfle d-inline-flex">
                    <div class="la-lcreviews__prfle-img"><img class="img-fluid rounded-circle d-block" src="https://picsum.photos/70" alt="Nathan Spark"></div>
                    <div class="la-lcreviews__prfle-info">
                      <div class="la-reviews__timestamp text-sm">2 weeks ago</div>
                      <div class="la-reviews__uname text-xl text-uppercase">Nathan Spark</div>
                    </div>
                  </div>
                  <div class="la-lcreviews__content w-100">
                    <div class="la-lcreviews__ratings"><span class="la-icon--xl icon-star la-rtng__fill"></span><span class="la-icon--xl icon-star la-rtng__fill"></span><span class="la-icon--xl icon-star la-rtng__fill"></span><span class="la-icon--xl icon-star la-rtng__fill"></span><span class="la-icon--xl icon-star la-rtng__unfill"></span></div>
                    <div class="la-lcreviews__comment text-md">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. </div>
                  </div>
                </div>
              </div>
            </li>
            <li class="la-lcreviews__item">
              <div class="la-lcreviews__inner">
                <div class="la-lcreviews__wrapper d-flex flex-column flex-md-row justify-content-between">
                  <div class="la-lcreviews__prfle d-inline-flex">
                    <div class="la-lcreviews__prfle-img"><img class="img-fluid rounded-circle d-block" src="https://picsum.photos/70" alt="Amish Patel"></div>
                    <div class="la-lcreviews__prfle-info">
                      <div class="la-reviews__timestamp text-sm">4 weeks ago</div>
                      <div class="la-reviews__uname text-xl text-uppercase">Amish Patel</div>
                    </div>
                  </div>
                  <div class="la-lcreviews__content w-100">
                    <div class="la-lcreviews__ratings"><span class="la-icon--xl icon-star la-rtng__fill"></span><span class="la-icon--xl icon-star la-rtng__fill"></span><span class="la-icon--xl icon-star la-rtng__fill"></span><span class="la-icon--xl icon-star la-rtng__fill"></span><span class="la-icon--xl icon-star la-rtng__unfill"></span></div>
                    <div class="la-lcreviews__comment text-md">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. </div>
                  </div>
                </div>
              </div>
            </li>
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
      </div>
    </div>
  </section>
  <!-- Section: End-->
  <!-- Section: Start-->
  <section class="la-section la-section--grey">
    <div class="la-section__inner">
      <div class="container">
        <h2 class="la-section__title mb-9">More from Creators</h2>
        <div class="row row-cols-3">
          <div class="col-12 col-md">
            <div class="la-course">
              <div class="la-course__inner">
                <div class="la-course__overlay" href="">
                  <ul class="la-course__options list-unstyled text-white">
                    <li class="la-course__option"><a class="d-inline-block la-course__addtocart"><i class="la-icon la-icon--2xl icon icon-cart"></i></a></li>
                    <li class="la-course__option"><a class="d-inline-block la-course__like"><i class="la-icon la-icon--2xl icon icon-share"></i></a></li>
                    <li class="la-course__option">
                      <div class="dropdown"><a class="dropdown-toggle d-inline-block la-course__menubtn" data-toggle="dropdown" href="javascript:void(0);"><i class="la-icon la-icon--2xl icon icon-menu"></i></a>
                        <div class="la-cmenu dropdown-menu"><a class="dropdown-item la-cmenu__item d-inline-flex"><i class="icon icon-cart la-icon la-icon--2xl mr-2"></i>  Add to Playlist</a><a class="dropdown-item la-cmenu__item d-inline-flex"><i class="icon icon-cart la-icon la-icon--2xl mr-2"></i>  Add to Wishlist</a><a class="dropdown-item la-cmenu__item d-inline-flex"><i class="icon icon-cart la-icon la-icon--2xl mr-2"></i>  Add to Cart</a></div>
                      </div>
                    </li>
                  </ul>
                  <div class="la-course__learners"><strong>300</strong>  learners</div>
                </div>
                <div class="la-course__imgwrap"><img class="img-fluid" src="https://picsum.photos/600/400" alt="Tattoo Art"></div>
              </div>
              <div class="la-course__btm">
                <div class="la-course__info d-flex align-items-center"><a class="la-course__title" href="">Tattoo Art</a>
                  <div class="la-course__rating ml-auto">4</div>
                </div><a class="la-course__creator d-inline-flex align-items-center" href="">
                  <div class="la-course__creator-imgwrap"><img class="img-fluid" src="https://picsum.photos/100/100" alt="Jospeh Phill"></div>
                  <div class="la-course__creator-name">Jospeh Phill</div></a>
              </div>
            </div>
          </div>
          <div class="col-12 col-md">
            <div class="la-course">
              <div class="la-course__inner">
                <div class="la-course__overlay" href="">
                  <ul class="la-course__options list-unstyled text-white">
                    <li class="la-course__option"><a class="d-inline-block la-course__addtocart"><i class="la-icon la-icon--2xl icon icon-cart"></i></a></li>
                    <li class="la-course__option"><a class="d-inline-block la-course__like"><i class="la-icon la-icon--2xl icon icon-share"></i></a></li>
                    <li class="la-course__option">
                      <div class="dropdown"><a class="dropdown-toggle d-inline-block la-course__menubtn" data-toggle="dropdown" href="javascript:void(0);"><i class="la-icon la-icon--2xl icon icon-menu"></i></a>
                        <div class="la-cmenu dropdown-menu"><a class="dropdown-item la-cmenu__item d-inline-flex"><i class="icon icon-cart la-icon la-icon--2xl mr-2"></i>  Add to Playlist</a><a class="dropdown-item la-cmenu__item d-inline-flex"><i class="icon icon-cart la-icon la-icon--2xl mr-2"></i>  Add to Wishlist</a><a class="dropdown-item la-cmenu__item d-inline-flex"><i class="icon icon-cart la-icon la-icon--2xl mr-2"></i>  Add to Cart</a></div>
                      </div>
                    </li>
                  </ul>
                  <div class="la-course__learners"><strong>300</strong>  learners</div>
                </div>
                <div class="la-course__imgwrap"><img class="img-fluid" src="https://picsum.photos/600/400" alt="Tattoo Art"></div>
              </div>
              <div class="la-course__btm">
                <div class="la-course__info d-flex align-items-center"><a class="la-course__title" href="">Tattoo Art</a>
                  <div class="la-course__rating ml-auto">4</div>
                </div><a class="la-course__creator d-inline-flex align-items-center" href="">
                  <div class="la-course__creator-imgwrap"><img class="img-fluid" src="https://picsum.photos/100/100" alt="Jospeh Phill"></div>
                  <div class="la-course__creator-name">Jospeh Phill</div></a>
              </div>
            </div>
          </div>
          <div class="col-12 col-md">
            <div class="la-course">
              <div class="la-course__inner">
                <div class="la-course__overlay" href="">
                  <ul class="la-course__options list-unstyled text-white">
                    <li class="la-course__option"><a class="d-inline-block la-course__addtocart"><i class="la-icon la-icon--2xl icon icon-cart"></i></a></li>
                    <li class="la-course__option"><a class="d-inline-block la-course__like"><i class="la-icon la-icon--2xl icon icon-share"></i></a></li>
                    <li class="la-course__option">
                      <div class="dropdown"><a class="dropdown-toggle d-inline-block la-course__menubtn" data-toggle="dropdown" href="javascript:void(0);"><i class="la-icon la-icon--2xl icon icon-menu"></i></a>
                        <div class="la-cmenu dropdown-menu"><a class="dropdown-item la-cmenu__item d-inline-flex"><i class="icon icon-cart la-icon la-icon--2xl mr-2"></i>  Add to Playlist</a><a class="dropdown-item la-cmenu__item d-inline-flex"><i class="icon icon-cart la-icon la-icon--2xl mr-2"></i>  Add to Wishlist</a><a class="dropdown-item la-cmenu__item d-inline-flex"><i class="icon icon-cart la-icon la-icon--2xl mr-2"></i>  Add to Cart</a></div>
                      </div>
                    </li>
                  </ul>
                  <div class="la-course__learners"><strong>300</strong>  learners</div>
                </div>
                <div class="la-course__imgwrap"><img class="img-fluid" src="https://picsum.photos/600/400" alt="Tattoo Art"></div>
              </div>
              <div class="la-course__btm">
                <div class="la-course__info d-flex align-items-center"><a class="la-course__title" href="">Tattoo Art</a>
                  <div class="la-course__rating ml-auto">4</div>
                </div><a class="la-course__creator d-inline-flex align-items-center" href="">
                  <div class="la-course__creator-imgwrap"><img class="img-fluid" src="https://picsum.photos/100/100" alt="Jospeh Phill"></div>
                  <div class="la-course__creator-name">Jospeh Phill</div></a>
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
        <h2 class="la-section__title mb-9">Looking for something else?</h2>
        <div class="row row-cols-3">
          <div class="col-12 col-md">
            <div class="la-course">
              <div class="la-course__inner">
                <div class="la-course__overlay" href="">
                  <ul class="la-course__options list-unstyled text-white">
                    <li class="la-course__option"><a class="d-inline-block la-course__addtocart"><i class="la-icon la-icon--2xl icon icon-cart"></i></a></li>
                    <li class="la-course__option"><a class="d-inline-block la-course__like"><i class="la-icon la-icon--2xl icon icon-share"></i></a></li>
                    <li class="la-course__option">
                      <div class="dropdown"><a class="dropdown-toggle d-inline-block la-course__menubtn" data-toggle="dropdown" href="javascript:void(0);"><i class="la-icon la-icon--2xl icon icon-menu"></i></a>
                        <div class="la-cmenu dropdown-menu"><a class="dropdown-item la-cmenu__item d-inline-flex"><i class="icon icon-cart la-icon la-icon--2xl mr-2"></i>  Add to Playlist</a><a class="dropdown-item la-cmenu__item d-inline-flex"><i class="icon icon-cart la-icon la-icon--2xl mr-2"></i>  Add to Wishlist</a><a class="dropdown-item la-cmenu__item d-inline-flex"><i class="icon icon-cart la-icon la-icon--2xl mr-2"></i>  Add to Cart</a></div>
                      </div>
                    </li>
                  </ul>
                  <div class="la-course__learners"><strong>300</strong>  learners</div>
                </div>
                <div class="la-course__imgwrap"><img class="img-fluid" src="https://picsum.photos/600/400" alt="Tattoo Art"></div>
              </div>
              <div class="la-course__btm">
                <div class="la-course__info d-flex align-items-center"><a class="la-course__title" href="">Tattoo Art</a>
                  <div class="la-course__rating ml-auto">4</div>
                </div><a class="la-course__creator d-inline-flex align-items-center" href="">
                  <div class="la-course__creator-imgwrap"><img class="img-fluid" src="https://picsum.photos/100/100" alt="Jospeh Phill"></div>
                  <div class="la-course__creator-name">Jospeh Phill</div></a>
              </div>
            </div>
          </div>
          <div class="col-12 col-md">
            <div class="la-course">
              <div class="la-course__inner">
                <div class="la-course__overlay" href="">
                  <ul class="la-course__options list-unstyled text-white">
                    <li class="la-course__option"><a class="d-inline-block la-course__addtocart"><i class="la-icon la-icon--2xl icon icon-cart"></i></a></li>
                    <li class="la-course__option"><a class="d-inline-block la-course__like"><i class="la-icon la-icon--2xl icon icon-share"></i></a></li>
                    <li class="la-course__option">
                      <div class="dropdown"><a class="dropdown-toggle d-inline-block la-course__menubtn" data-toggle="dropdown" href="javascript:void(0);"><i class="la-icon la-icon--2xl icon icon-menu"></i></a>
                        <div class="la-cmenu dropdown-menu"><a class="dropdown-item la-cmenu__item d-inline-flex"><i class="icon icon-cart la-icon la-icon--2xl mr-2"></i>  Add to Playlist</a><a class="dropdown-item la-cmenu__item d-inline-flex"><i class="icon icon-cart la-icon la-icon--2xl mr-2"></i>  Add to Wishlist</a><a class="dropdown-item la-cmenu__item d-inline-flex"><i class="icon icon-cart la-icon la-icon--2xl mr-2"></i>  Add to Cart</a></div>
                      </div>
                    </li>
                  </ul>
                  <div class="la-course__learners"><strong>300</strong>  learners</div>
                </div>
                <div class="la-course__imgwrap"><img class="img-fluid" src="https://picsum.photos/600/400" alt="Tattoo Art"></div>
              </div>
              <div class="la-course__btm">
                <div class="la-course__info d-flex align-items-center"><a class="la-course__title" href="">Tattoo Art</a>
                  <div class="la-course__rating ml-auto">4</div>
                </div><a class="la-course__creator d-inline-flex align-items-center" href="">
                  <div class="la-course__creator-imgwrap"><img class="img-fluid" src="https://picsum.photos/100/100" alt="Jospeh Phill"></div>
                  <div class="la-course__creator-name">Jospeh Phill</div></a>
              </div>
            </div>
          </div>
          <div class="col-12 col-md">
            <div class="la-course">
              <div class="la-course__inner">
                <div class="la-course__overlay" href="">
                  <ul class="la-course__options list-unstyled text-white">
                    <li class="la-course__option"><a class="d-inline-block la-course__addtocart"><i class="la-icon la-icon--2xl icon icon-cart"></i></a></li>
                    <li class="la-course__option"><a class="d-inline-block la-course__like"><i class="la-icon la-icon--2xl icon icon-share"></i></a></li>
                    <li class="la-course__option">
                      <div class="dropdown"><a class="dropdown-toggle d-inline-block la-course__menubtn" data-toggle="dropdown" href="javascript:void(0);"><i class="la-icon la-icon--2xl icon icon-menu"></i></a>
                        <div class="la-cmenu dropdown-menu"><a class="dropdown-item la-cmenu__item d-inline-flex"><i class="icon icon-cart la-icon la-icon--2xl mr-2"></i>  Add to Playlist</a><a class="dropdown-item la-cmenu__item d-inline-flex"><i class="icon icon-cart la-icon la-icon--2xl mr-2"></i>  Add to Wishlist</a><a class="dropdown-item la-cmenu__item d-inline-flex"><i class="icon icon-cart la-icon la-icon--2xl mr-2"></i>  Add to Cart</a></div>
                      </div>
                    </li>
                  </ul>
                  <div class="la-course__learners"><strong>300</strong>  learners</div>
                </div>
                <div class="la-course__imgwrap"><img class="img-fluid" src="https://picsum.photos/600/400" alt="Tattoo Art"></div>
              </div>
              <div class="la-course__btm">
                <div class="la-course__info d-flex align-items-center"><a class="la-course__title" href="">Tattoo Art</a>
                  <div class="la-course__rating ml-auto">4</div>
                </div><a class="la-course__creator d-inline-flex align-items-center" href="">
                  <div class="la-course__creator-imgwrap"><img class="img-fluid" src="https://picsum.photos/100/100" alt="Jospeh Phill"></div>
                  <div class="la-course__creator-name">Jospeh Phill</div></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Section: End-->
@endsection