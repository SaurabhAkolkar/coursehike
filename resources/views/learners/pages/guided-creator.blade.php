@extends('learners.layouts.app')

@section('seo_content')
    <title> Guided Mentor </title>
@endsection

@section('content')
 <!-- Section: Start-->
 <section class="la-page--gcreator">
    <div class="container-fluid la-anim__wrap">
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
      <div class="row">
        <!-- Column: Start-->
        <div class="col-12 col-lg-12 la-gc__banner">
          <a class="la-icon la-icon--5xl icon-back-arrow d-block d-lg-none pl-2 pt-5 mb-3 la-anim__stagger-item--x" href="{{URL::previous()}}"></a>
          <div class="la-gc__banner-itm d-flex flex-column flex-lg-row justify-content-lg-between">
            <div class="col-12 col-lg la-gcbanner__content d-flex flex-row align-items-center p-0">
              <div class="la-gcbanner__inner">
                <h1 class="la-gcbanner__title m-0 leading-none la-anim__stagger-item">Your Knowledge. </h1>
                <h2 class="la-gcbanner__tag la-anim__stagger-item"> Our Expertise.</h2>
                <p class="d-none d-md-block la-gcbanner__para mt-md-6 mb-md-14 la-anim__stagger-item">Get guidance to build exceptional coursework,<br/> the way you need!</p>
                <p class="d-block d-md-none la-gcbanner__para mt-2 mb-12 la-anim__stagger-item">Get guidance to build exceptional coursework, the way you need!</p>
                
                <a class="la-btn__app text-uppercase la-anim__stagger-item" role="button" href="/creator-signup">Get Started</a>
              </div>
            </div>
            <div class="col-12 col-lg p-0 la-anim__stagger-item--x">
              <div class="la-gcbanner__bg"><img class="img-fluid d-block" src="./images/learners/guided-creator/gc-banner-1a.png" alt="Guided Creator" /></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Section: End-->
  <!-- Section: Start-->
  <section class="la-page--how-this-works py-5 ">
    <div class="container-fluid py-5">
      <div class="row py-5">
        <!-- Column: Start-->
        <div class="col-12 py-5 ">
          <div class="la-anim__wrap ">
            <h2 class="la-gcreator__works-title la-anim__stagger-item">How this works?</h2>
          </div>
        </div>
        <!-- Column: End-->
      </div>
      <div class="row ">
        <!-- Column: Start-->
        <div class="col-12 col-lg-5 d-none d-lg-block la-anim__wrap">
          <div class="la-gcreator__works mt-n5 ">
            <img class="img-fluid d-block img-rounded la-anim__stagger-item lazy" src="../images/learners/creator/gcreator-1a.png" data-src="../images/learners/creator/gcreator-1a.png" alt="Record a Video" />
          </div>
          <div class="la-gcreator__works mt-2 ">
            <img class="img-fluid d-block img-rounded la-anim__stagger-item lazy" src="../images/learners/creator/gcreator-2a.png" data-src="../images/learners/creator/gcreator-2a.png" alt="Edit a Video" />
          </div>
          <div class="la-gcreator__works mt-n5 ">
            <img class="img-fluid d-block img-rounded la-anim__stagger-item lazy" src="../images/learners/creator/gcreator-3a.png" data-src="../images/learners/creator/gcreator-3a.png" alt="Share Video" />
          </div>
        </div>
        <!-- Column: End-->
        <!-- Column: Start-->
        <div class="col-12 col-lg-6 px-0 px-xl-3 mt-5 pt-5 ">
          <div class="la-gcreator__video-content position-relative">
            <div class="la-gvline d-flex align-items-start flex-column mt-5 la-anim__wrap">
              <div class="la-gcreator__works-mobile d-block d-lg-none pl-5 ml-5 mt-n5 la-anim__stagger-item">
                <img class="img-fluid mx-auto d-block img-rounded mt-n5 lazy" src="./images/learners/creator/gcreator-1a.png" data-src="./images/learners/creator/gcreator-1a.png" alt="Record a Video" />
              </div>

              <div class="la-gcreator__video-icon la-anim__stagger-item"><span class="la-icon la-icon--6xl icon-video-unfilled "></span></div>
              <div class="la-gcreator__video-content mt-5">
                <h5 class="la-gcreator__video-title la-anim__stagger-item">We'll record a Video</h5>
                <p class="la-gcreator__video-para pt-3 la-anim__stagger-item">Our team of expert videographers will help you with shooting exemplary videos for a well-explained coursework</p>
                <ul class="la-gcreator__list text-sm la-anim__stagger-item">
                  <li class="la-gcreator__list-item d-flex align-items-start"><span class="la-gcreator__list-tick la-icon la-icon--md icon-tick"></span> <span>Assistance with staging & set preparation</span></li>
                  <li class="la-gcreator__list-item d-flex align-items-start"><span class="la-gcreator__list-tick la-icon la-icon--md icon-tick"></span> <span>Get help with sound & lighting</span></li>
                  <li class="la-gcreator__list-item d-flex align-items-start"><span class="la-gcreator__list-tick la-icon la-icon--md icon-tick"></span> <span>Execution of concept through to completion as per original brief</span></li>
                </ul>

                {{-- <div class="form-group pt-6 la-anim__stagger-item">
                  <label class="d-flex" for="recordVideo">
                    <input class="d-none" id="recordVideo" type="checkbox" name="">
                    <span class="gcheck position-relative">
                      <div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div>
                    </span>
                    <div class="pl-4 mt-n1 text-sm">Yes, I want you to record for me!</div>
                  </label>
                </div> --}}
              </div>
            </div>

            <div class="la-gvline d-flex align-items-start flex-column la-anim__wrap">
              <div class="la-gcreator__works-mobile d-block d-lg-none pl-5 ml-5 mt-n5 la-anim__stagger-item">
                <img class="img-fluid mx-auto d-block img-rounded mt-n5 lazy" src="./images/learners/creator/gcreator-2a.png" data-src="./images/learners/creator/gcreator-2a.png" alt="Edit a Video" />
              </div>
              <div class="la-gcreator__video-icon la-anim__stagger-item"><span class="la-icon la-icon--6xl icon-edit-image "></span></div>
              <div class="la-gcreator__video-content mt-5">
                <h5 class="la-gcreator__video-title la-anim__stagger-item">We'll edit the Video</h5>
                <p class="la-gcreator__video-para pt-3 la-anim__stagger-item">Our in-house editors will aid you with video editing to create the most spectacular videos for your coursework, to help you give your students the best learning experience</p>
                <ul class="la-gcreator__list text-sm la-anim__stagger-item">
                  <li class="la-gcreator__list-item d-flex align-items-start"><span class="la-gcreator__list-tick la-icon la-icon--md icon-tick"></span>Give your tutorial the perfect flow with cuts, pace & sound to create the perfect output</li>
                  <li class="la-gcreator__list-item d-flex align-items-start"><span class="la-gcreator__list-tick la-icon la-icon--md icon-tick"></span>Make the transitions smooth and elegant to avoid jumpy & fast-paced mess that no one wants to watch</li>
                  <li class="la-gcreator__list-item d-flex align-items-start"><span class="la-gcreator__list-tick la-icon la-icon--md icon-tick"></span>Add voice overs and audio at the right junctions to ensure the tutorial is engaging for students</li>
                </ul>

                {{-- <div class="form-group pt-6 la-anim__stagger-item">
                  <label class="d-flex" for="editVideo">
                    <input class="d-none" id="editVideo" type="checkbox" name="">
                      <span class="gcheck position-relative">
                      <div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div>
                      </span>
                    <div class="pl-4 mt-n1 text-sm">Yes, I want you to edit for me!</div>
                  </label>
                </div> --}}
              </div>
            </div>

            <div class="la-gvline-last d-flex align-items-start flex-column la-anim__wrap">
              <div class="la-gcreator__works-mobile d-block d-lg-none pl-5 ml-5 mt-n5 la-anim__stagger-item">
                <img class="img-fluid mx-auto d-block img-rounded mt-n5 lazy" src="./images/learners/creator/gcreator-3a.png" data-src="./images/learners/creator/gcreator-3a.png" alt="Share Video" />
              </div>
              <div class="la-gcreator__video-icon la-anim__stagger-item"><span class="la-icon la-icon--6xl icon-share-image "></span></div>
              <div class="la-gcreator__video-content mt-5">
                <h5 class="la-gcreator__video-title la-anim__stagger-item">Share it with the World</h5>
                <p class="la-gcreator__video-para pt-3 la-anim__stagger-item">Share your wisdom. With LILA’s global reach, we assure that your content in your art of expertise will reach students beyond borders, helping them hone their skills through your knowledge</p>
                <ul class="la-gcreator__list text-sm la-anim__stagger-item"> 
                  <li class="la-gcreator__list-item d-flex align-items-start"><span class="la-gcreator__list-tick la-icon la-icon--md icon-tick"></span>Create unique tutorials that make a difference to budding tattoo artists</li>
                  <li class="la-gcreator__list-item d-flex align-items-start"><span class="la-gcreator__list-tick la-icon la-icon--md icon-tick"></span>Use the power of digital media to connect with artists all over the globe</li>
                  <li class="la-gcreator__list-item d-flex align-items-start"><span class="la-gcreator__list-tick la-icon la-icon--md icon-tick"></span>Build a community of passionate artists and help each other grow</li>
                </ul>
                
                {{-- 
                <div class="form-group mt-8 la-anim__stagger-item">
                  <button class="la-btn__app py-3 py-md-4" type="submit">Submit</button>
                </div> --}}
              </div>
            </div>

          </div>
        </div>
        <!-- Column: End-->
        <!-- Column: Start-->
        <div class="col-12 col-lg-2"></div>
        <!-- Column: End-->
      </div>
    </div>
  </section>
  <!-- Section: End-->
  <!-- Section: Start-->
  <section class="la-bgcreator--ad-banner">
    <div class="w-100 h-100">
      <div class="row la-anim__wrap">
        <!-- Column: Start-->
        <div class="col-12  la-anim__stagger-item">
          <div class="la-bgcreator__ad-content text-center text-white" style="background:url('../images/learners/creator/guided-cta.jpg') no-repeat center rgba(0, 0, 0, 0.65); background-size:cover;">
            <div class="">
              <p class="la-bgcreator__ad-para la-anim__stagger-item mb-8 mb-md-14">Ready to share your Creations?</p>
              <a class="la-btn__app text-white la-anim__stagger-item" role="button" href="/creator-signup">Get Started</a>
            </div>
          </div>
        </div>
        <!-- Column: End-->
      </div>
    </div>
  </section>
  <!-- Section: End-->
  
  <!-- Section: Start-->
  <section class="la-zoho__form-section">
    <div class="container-fluid w-100 h-100">
      <div class="row la-anim__wrap">
        <!-- Column: Start-->
        <div class="col-12 px-0 px-md-3 la-anim__stagger-item">
          <iframe frameborder="0" class="la-form__iframe" style="border:none;" src='https://forms.zohopublic.com/aliensart/form/GuidedCreator/formperma/v63ASHAUJuv-VdXhtUtXk9k3nBu6CfbWHDKm-_MJwuk'></iframe>
        </div>
        <!-- Column: End-->
      </div>
    </div>
  </section>
  <!-- Section: End-->

  <!-- Section: Start-->
  <section class="la-bgcreator--faq">
    <div class="container-fluid">
      <div class="row">
        <!-- Column: Start-->
        <div class="col-12 px-3 px-sm-0 la-anim__wrap">
          <div class="panel-group" id="accordion">
            <h4 class="la-bgcreator__faq-title">FAQ&#39;s</h4>

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
        <!-- Column: End-->
      </div>
    </div>
  </section>
  <!-- Section: End-->
@endsection