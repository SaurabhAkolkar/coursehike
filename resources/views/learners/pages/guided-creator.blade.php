@extends('learners.layouts.app')

@section('content')
 <!-- Section: Start-->
 <section class="la-page--gcreator">
    <div class="container-fluid">
      <div class="row">
        <!-- Column: Start-->
        <div class="col-12 col-lg-12 la-gc__banner">
          <a class="la-icon la-icon--5xl icon-back-arrow d-block d-lg-none pl-2 pt-5 mb-6" href="#"></a>
          <div class="la-gc__banner-itm d-flex flex-column flex-lg-row justify-content-lg-between">
            <div class="col-12 col-lg la-gcbanner__content d-flex flex-row align-items-center p-0">
              <div class="la-gcbanner__inner">
                <h1 class="la-gcbanner__title m-0 leading-none">Your Knowledge. </h1>
                <h2 class="la-gcbanner__tag leading-none"> Our Expertise.</h2>
                <p class="la-gcbanner__para mt-2 mt-md-6 mb-12 mb-md-14">Get guidance for whatever and <br/>whenever you want</p>
                
                <a class="la-btn__app text-uppercase " role="button" href="/creator-signup">Get Started</a>
              </div>
            </div>
            <div class="col-12 col-lg p-0">
              <div class="la-gcbanner__bg"><img class="img-fluid d-block" src="./images/learners/guided-creator/gc-banner-1a.png" alt="Guided Creator"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Section: End-->
  <!-- Section: Start-->
  <section class="la-page--how-this-works py-5">
    <div class="container-fluid pl-0 pl-md-5 py-5">
      <div class="row pl-4 py-5">
        <!-- Column: Start-->
        <div class="col-12 py-5 px-0 px-sm-4">
          <div class=" pl-5">
            <h2 class="la-gcreator__works-title pl-1 pl-md-5">How this works?</h2>
          </div>
        </div>
        <!-- Column: End-->
      </div>
      <div class="row px-2 px-md-5">
        <!-- Column: Start-->
        <div class="col-12 col-lg-5 d-none d-lg-block">
          <div class="la-gcreator__works mt-n5"><img class="img-fluid mx-auto d-block img-rounded" src="./images/learners/creator/gcreator-1a.png" alt="Record a Video"></div>
          <div class="la-gcreator__works mt-2"><img class="img-fluid mx-auto d-block img-rounded" src="./images/learners/creator/gcreator-2a.png" alt="Edit a Video"></div>
          <div class="la-gcreator__works mt-n5"><img class="img-fluid mx-auto d-block img-rounded" src="./images/learners/creator/gcreator-3a.png" alt="Share Video"></div>
        </div>
        <!-- Column: End-->
        <!-- Column: Start-->
        <div class="col-12 col-lg-5 px-0 px-xl-3 mt-5 pt-5">
          <div class="la-gcreator__video-content position-relative">
            <div class="la-gvline d-flex align-items-start flex-column mt-5">
              <div class="la-gcreator__works-mobile d-block d-lg-none pl-5 ml-5 mt-n5"><img class="img-fluid mx-auto d-block img-rounded mt-n5" src="./images/learners/creator/gcreator-1a.png" alt="Record a Video"></div>
              <div class="la-gcreator__video-icon"><span class="la-icon la-icon--8xl icon-video-unfilled"></span></div>
              <div class="la-gcreator__video-content mt-5">
                <h5 class="la-gcreator__video-title">We'll record a Video</h5>
                <p class="la-gcreator__video-para pt-3 text-md">Stet clita kasd gubergen, no sea takimata sanctus est Lorem Ipsum dolor sit amet. Lorem Ipsum dolor sit amet.</p>
                <ul class="la-gcreator__list text-sm">
                  <li><span class="la-gcreator__list-tick la-icon la-icon--md icon-tick"></span>Lorem Ipsum dolor sit amet, consetetur</li>
                  <li><span class="la-gcreator__list-tick la-icon la-icon--md icon-tick"></span>Lorem Ipsum dolor sit amet, consetetur</li>
                  <li><span class="la-gcreator__list-tick la-icon la-icon--md icon-tick"></span>Lorem Ipsum dolor sit amet, consetetur</li>
                  <li><span class="la-gcreator__list-tick la-icon la-icon--md icon-tick"></span>Lorem Ipsum dolor sit amet, consetetur</li>
                </ul>
                <div class="form-group pt-3">
                  <label class="d-flex" for="recordVideo">
                    <input class="d-none" id="recordVideo" type="checkbox" name=""><span class="gcheck position-relative">
                      <div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                    <div class="pl-4 mt-n1 text-sm">Yes, I want you to record for me!</div>
                  </label>
                </div>
              </div>
            </div>
            <div class="la-gvline d-flex align-items-start flex-column">
              <div class="la-gcreator__works-mobile d-block d-lg-none pl-5 ml-5 mt-n5"><img class="img-fluid mx-auto d-block img-rounded mt-n5" src="./images/learners/creator/gcreator-2a.png" alt="Edit a Video"></div>
              <div class="la-gcreator__video-icon"><span class="la-icon la-icon--8xl icon-edit-image"></span></div>
              <div class="la-gcreator__video-content mt-5">
                <h5 class="la-gcreator__video-title ">We'll edit the Video</h5>
                <p class="la-gcreator__video-para text-md pt-3">Stet clita kasd gubergen, no sea takimata sanctus est Lorem Ipsum dolor sit amet. Lorem Ipsum dolor sit amet.</p>
                <ul class="la-gcreator__list text-sm">
                  <li><span class="la-gcreator__list-tick la-icon la-icon--md icon-tick"></span>Lorem Ipsum dolor sit amet, consetetur</li>
                  <li><span class="la-gcreator__list-tick la-icon la-icon--md icon-tick"></span>Lorem Ipsum dolor sit amet, consetetur</li>
                  <li><span class="la-gcreator__list-tick la-icon la-icon--md icon-tick"></span>Lorem Ipsum dolor sit amet, consetetur</li>
                  <li><span class="la-gcreator__list-tick la-icon la-icon--md icon-tick"></span>Lorem Ipsum dolor sit amet, consetetur</li>
                </ul>
                <div class="form-group pt-3">
                  <label class="d-flex" for="editVideo">
                    <input class="d-none" id="editVideo" type="checkbox" name=""><span class="gcheck position-relative">
                      <div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                    <div class="pl-4 mt-n1 text-sm">Yes, I want you to edit for me!</div>
                  </label>
                </div>
              </div>
            </div>
            <div class="la-gvline-last d-flex align-items-start flex-column">
              <div class="la-gcreator__works-mobile d-block d-lg-none pl-5 ml-5 mt-n5"><img class="img-fluid mx-auto d-block img-rounded mt-n5" src="./images/learners/creator/gcreator-3a.png" alt="Share Video"></div>
              <div class="la-gcreator__video-icon"><span class="la-icon la-icon--8xl icon-share-image "></span></div>
              <div class="la-gcreator__video-content mt-5">
                <h5 class="la-gcreator__video-title ">Share it with the World</h5>
                <p class="la-gcreator__video-para text-md pt-3">Stet clita kasd gubergen, no sea takimata sanctus est Lorem Ipsum dolor sit amet. Lorem Ipsum dolor sit amet.</p>
                <ul class="la-gcreator__list text-sm"> 
                  <li><span class="la-gcreator__list-tick la-icon la-icon--md icon-tick"></span>Lorem Ipsum dolor sit amet, consetetur</li>
                  <li><span class="la-gcreator__list-tick la-icon la-icon--md icon-tick"></span>Lorem Ipsum dolor sit amet, consetetur</li>
                  <li><span class="la-gcreator__list-tick la-icon la-icon--md icon-tick"></span>Lorem Ipsum dolor sit amet, consetetur</li>
                  <li><span class="la-gcreator__list-tick la-icon la-icon--md icon-tick"></span>Lorem Ipsum dolor sit amet, consetetur</li>
                </ul>
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
    <div class="container">
      <div class="row">
        <!-- Column: Start-->
        <div class="col-sm-12 px-0 px-sm-0">
          <div class="la-bgcreator__ad-content text-center text-white">
            <div class="px-5">
              <p class="la-bgcreator__ad-para">Ready to share your Creations?</p><br>
              <a class="ad-btn la-btn__app text-white" role="button" href="/creator-signup">Get Started</a>
            </div>
          </div>
        </div>
        <!-- Column: End-->
      </div>
    </div>
  </section>
  <!-- Section: End-->
  <!-- Section: Start-->
  <section class="la-bgcreator--faq">
    <div class="container">
      <div class="row">
        <!-- Column: Start-->
        <div class="col-12 px-5 px-sm-0">
          <div class="panel-group" id="accordion">
            <h4 class="la-bgcreator__faq-title">FAQ&#39;s</h4>
            <div class="panel panel-default la-bgcreator__faq-panel">
              <div class="panel-heading la-bgcreator__panel-head " id="faqCalcHead">
                <div class="panel-title la-bgcreator__panel-title">
                  <a class="accordion-toggle collapsed text-md" href="#faqCalc" data-toggle="collapse" aria-expanded="true" aria-controls="#faq-calc">How amount is calculated ?</a>
                </div>
              </div>
              <div class="panel-collapse collapse" id="faqCalc" aria-labelledby="faqCalcHead" data-parent="#accordion">
                <div class="panel-body la-bgcreator__panel-body">
                  <p class="la-bgcreator__panel-para panel-text text-md m-0">Something</p>
                </div>
              </div>
            </div>

            
            <div class="panel panel-default la-bgcreator__faq-panel">
              <div class="panel-heading la-bgcreator__panel-head " id="faqCommHead">
                <div class="panel-title la-bgcreator__panel-title">
                  <a class="accordion-toggle collapsed text-md" href="#faqCommission" data-toggle="collapse" aria-expanded="false" aria-controls="#faq-commission">What is LILA's Commission ?</a>
                </div>
              </div>
              <div class="panel-collapse collapse" id="faqCommission" aria-labelledby="faqCommHead" data-parent="#accordion">
                <div class="panel-body la-bgcreator__panel-body">
                  <p class="m-0 la-bgcreator__panel-para text-md panel-text">Something</p>
                </div>
              </div>
            </div>
            <div class="panel panel-default la-bgcreator__faq-panel">
              <div class="panel-heading la-bgcreator__panel-head " id="faqSlabHead"><div class="panel-title la-bgcreator__panel-title"><a class="accordion-toggle collapsed text-md" href="#faqSlab" data-toggle="collapse" aria-expanded="false" aria-controls="#faq-slab-rate">How much is the slab rate ?</a></div></div>
              <div class="panel-collapse collapse" id="faqSlab" aria-labelledby="faqSlabHead" data-parent="#accordion">
                <div class="panel-body la-bgcreator__panel-body ">
                  <p class="m-0 la-bgcreator__panel-para text-md panel-text">Ut enim ad minim veniam, quis nostrud exercitation ullamo</p>
                </div>
              </div>
            </div>
            <div class="panel panel-default la-bgcreator__faq-panel">
              <div class="panel-heading la-bgcreator__panel-head " id="faqRedeemHead"><div class="panel-title la-bgcreator__panel-title"><a class="accordion-toggle collapsed text-md" href="#faqRedeem" data-toggle="collapse" aria-expanded="false" aria-controls="#faq-redeem">How to redeem amount from my wallet ?</a></div></div>
              <div class="panel-collapse collapse" id="faqRedeem" aria-labelledby="faqRedeemHead" data-parent="#accordion">
                <div class="panel-body la-bgcreator__panel-body">
                  <p class="m-0 la-bgcreator__panel-para text-md panel-text">Something</p>
                </div>
              </div>
            </div>
            <div class="la-bgcreator__faq-all text-center text-sm-right pt-4">
              <a class= "text-sm" href=""><span class="la-bgcreator__all-link">See all</span></a>
            </div>
        </div>
        <!-- Column: End-->
      </div>
    </div>
  </section>
  <!-- Section: End-->
@endsection