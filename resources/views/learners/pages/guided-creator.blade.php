@extends('learners.layouts.app')

@section('content')
 <!-- Section: Start-->
 <section class="la-page--gcreator">
    <div class="container-fluid">
      <div class="row">
        <!-- Column: Start-->
        <div class="col-12 col-lg-12 la-gc__banner"><a class="la-icon--lg icon-arrow font-weight-bold d-block d-lg-none px-5 py-4 ml-3" href="#"></a>
          <div class="la-gc__banner-itm d-flex flex-column flex-lg-row justify-content-lg-between">
            <div class="col-12 col-lg la-gcbanner__content d-flex flex-row align-items-center p-0">
              <div class="la-gcbanner__inner">
                <h1 class="m-0 font-weight-bold">Your Knowledge. </h1>
                <h2 class="font-weight-bold"> Our Expertise.</h2>
                <p class="m-0 text-lg">Get guidance for whatever and whenever you want</p><br><br><a class="la-btn__app text-uppercase" role="button" href="#">Get Started</a>
              </div>
            </div>
            <div class="col-12 col-lg p-0">
              <div class="la-gcbanner__bg"><img class="img-fluid d-block" src="./images/guided-creator/gc-banner-1a.png" alt="Guided Creator"></div>
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
          <div class="la-gcreator__works-title pl-5">
            <h2 class="text-5xl pl-5 font-weight-bold">How this works?</h2>
          </div>
        </div>
        <!-- Column: End-->
      </div>
      <div class="row px-2 px-md-5">
        <!-- Column: Start-->
        <div class="col-12 col-lg-5 d-none d-lg-block">
          <div class="la-gcreator__works mt-n5"><img class="img-fluid mx-auto d-block img-rounded" src="./images/creator/gcreator-1a.png" alt="Record a Video"></div>
          <div class="la-gcreator__works mt-2"><img class="img-fluid mx-auto d-block img-rounded" src="./images/creator/gcreator-2a.png" alt="Edit a Video"></div>
          <div class="la-gcreator__works mt-n5"><img class="img-fluid mx-auto d-block img-rounded" src="./images/creator/gcreator-3a.png" alt="Share Video"></div>
        </div>
        <!-- Column: End-->
        <!-- Column: Start-->
        <div class="col-12 col-lg-5 px-0 px-xl-3 mt-5 pt-5">
          <div class="la-gcreator__video-content position-relative">
            <div class="la-gvline d-flex align-items-start flex-column mt-5">
              <div class="la-gcreator__works-mobile d-block d-lg-none pl-5 ml-5 mt-n5"><img class="img-fluid mx-auto d-block img-rounded mt-n5" src="./images/creator/gcreator-1a.png" alt="Record a Video"></div>
              <div class="la-gcreator__video-icon"><span class="la-icon--5xl icon-wallet"></span></div>
              <div class="la-gcreator__video-content mt-5">
                <h5>We'll record a Video</h5><span class="text-md text-black">Stet clita kasd gubergen, no sea takimata sanctus est Lorem Ipsum dolor sit amet. Lorem Ipsum dolor sit amet.</span>
                <ul class="pt-2 text-sm">
                  <li>Lorem Ipsum dolor sit amet, consetetur</li>
                  <li>Lorem Ipsum dolor sit amet, consetetur</li>
                  <li>Lorem Ipsum dolor sit amet, consetetur</li>
                  <li>Lorem Ipsum dolor sit amet, consetetur</li>
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
              <div class="la-gcreator__works-mobile d-block d-lg-none pl-5 ml-5 mt-n5"><img class="img-fluid mx-auto d-block img-rounded mt-n5" src="./images/creator/gcreator-2a.png" alt="Edit a Video"></div>
              <div class="la-gcreator__video-icon"><span class="la-icon--5xl icon-edit-line"></span></div>
              <div class="la-gcreator__video-content mt-5">
                <h5>We'll edit the Video</h5><span class="text-md text-black">Stet clita kasd gubergen, no sea takimata sanctus est Lorem Ipsum dolor sit amet. Lorem Ipsum dolor sit amet.</span>
                <ul class="pt-2 text-sm">
                  <li>Lorem Ipsum dolor sit amet, consetetur</li>
                  <li>Lorem Ipsum dolor sit amet, consetetur</li>
                  <li>Lorem Ipsum dolor sit amet, consetetur</li>
                  <li>Lorem Ipsum dolor sit amet, consetetur</li>
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
              <div class="la-gcreator__works-mobile d-block d-lg-none pl-5 ml-5 mt-n5"><img class="img-fluid mx-auto d-block img-rounded mt-n5" src="./images/creator/gcreator-3a.png" alt="Share Video"></div>
              <div class="la-gcreator__video-icon"><span class="la-icon--5xl icon-share"></span></div>
              <div class="la-gcreator__video-content mt-5">
                <h5>Share it to the World</h5><span class="text-md text-black">Stet clita kasd gubergen, no sea takimata sanctus est Lorem Ipsum dolor sit amet. Lorem Ipsum dolor sit amet.</span>
                <ul class="pt-2 text-sm"> 
                  <li>Lorem Ipsum dolor sit amet, consetetur</li>
                  <li>Lorem Ipsum dolor sit amet, consetetur</li>
                  <li>Lorem Ipsum dolor sit amet, consetetur</li>
                  <li>Lorem Ipsum dolor sit amet, consetetur</li>
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
              <p class="text-2xl">Ready to share your Creations?</p><br><a class="ad-btn la-btn__app text-white" role="button" href="#">Get Started</a>
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
        <div class="col-12">
          <div class="panel-group" id="accordion">
            <h4 class="faq-title">FAQ's</h4>

            @php
              $faq1 = new stdClass;
              $faq1->mainId = 1;
              $faq1->question = "How amount is calculated?";
              $faq1->subId = 1;
              $faq1->answer= "Something";

              $faq2 = new stdClass;
              $faq2->mainId = 2;
              $faq2->question = "What is LILA's Commission?";
              $faq2->subId = 2;
              $faq2->answer= "Something";

              $faq3 = new stdClass;
              $faq3->mainId = 3;
              $faq3->question = "How much is the slab rate?";
              $faq3->subId = 3;
              $faq3->answer= "Something";

              $faq4 = new stdClass;
              $faq4->mainId = 4;
              $faq4->question = "How to redeem amount from my wallet?";
              $faq4->subId = 4;
              $faq4->answer= "Something";

              $faqs = array($faq1, $faq2, $faq3,$faq4);
            @endphp

            @foreach ($faqs as $faq)
                <x-faq
                  :mainId="$faq->mainId"
                  :question="$faq->question"
                  :subId="$faq->subId"
                  :answer="$faq->answer"
                />
            @endforeach

            <div class="faq-see-all text-right pt-4">
                <a class="text-sm" role="button" href="" data-toggle="collapse" aria-expanded="true">See all</a>
            </div>

          </div>
        </div>
        <!-- Column: End-->
      </div>
    </div>
  </section>
  <!-- Section: End-->
@endsection