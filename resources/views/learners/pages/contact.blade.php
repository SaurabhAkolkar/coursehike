@extends('learners.layouts.app')

@section('content')
 <!-- Main Section: Start-->
 <section class="la-cbg--main">
    <!-- Section: Strat-->
    <section class="la-contact--page">
      <div class="container">
        <div class="row">
          <!-- Column: Start-->
          <div class="col-12 mt-8 mt-lg-10"><a class="la-back__page" href="#"> <span><img class="img-fluid" src="./images/learners/icons/long-arrow-dark.svg" alt="Previous"></span></a></div>
          <!-- Column: End-->
          <!-- Column: Start-->
          <div class="col-12 d-none d-sm-block">
            <div class="la-contact__title text-center pt-5">
              <h1>CONTACT US</h1>
            </div>
          </div>
          <!-- Column: End-->
        </div>
        <div class="row la-contact--info d-flex flex-row justify-content-between">
          <!-- Column: Start-->
          <div class="col-12 col-sm-6 col-lg-5 order-1">
            <div class="la-contact__lft">
              <div class="la-contact__connect order-first">
                <h6 class="m-0 text-xl text-md-2xl">Feel free to reach us</h6>
                <h2 class="text-4xl text-md-6xl">Let's Connect </h2>
                <p class="text-sm">Stet clita kasd gubergen, no sea takimata sanctus est Lorem Ipsum dolor sit amet. Lorem ipsum dolor sit amet.                            </p>
              </div>
              <div class="la-contact__btm d-none d-sm-block">
                <div class="la-contact__details"><span class="la-icon--lg icon-contact-number mr-3"></span><a class="text-md" href="tel:+91 9999999999">+91 9999999999</a></div>
                <div class="la-contact__details"><span class="la-icon--lg icon-mail-id mr-3"></span><a class="text-md" href="mailto:ask@learnitlikealiens.com">ask@learnitlikealiens.com</a></div>
                <div class="la-contact__smedia mt-6"><a class="mr-5" href="#"><img class="img-fluid" src="./images/learners/icons/facebook-dark.svg" alt="Facebook"></a><a class="mr-5" href="#"><img class="img-fluid" src="./images/learners/icons/instagram-dark.svg" alt="Instagram"></a><a class="mr-5" href="#"><img class="img-fluid" src="./images/learners/icons/youtube-dark.svg" alt="Youtube"></a></div>
              </div>
            </div>
          </div>
          <!-- Column: End-->
          <!-- Mobile Column: Start-->
          <div class="col order-3 order-sm-none my-5 py-5 px-5 mx-4 d-block d-sm-none"> 
            <div class="la-contact__btm-mobile py-5 my-5">
              <div class="la-contact__details"><span class="la-icon--lg icon-contact-number mr-3"></span><a class="text-md" href="tel:+91 9999999999">+91 9999999999</a></div>
              <div class="la-contact__details"><span class="la-icon--lg icon-mail-id mr-3"></span><a class="text-md" href="mailto:ask@learnitlikealiens.com">ask@learnitlikealiens.com</a></div>
              <div class="la-contact__smedia mt-8"><a class="mr-6" href="#"><img class="img-fluid" src="./images/learners/icons/facebook-dark.svg" alt="Facebook"></a><a class="mr-6" href="#"><img class="img-fluid" src="./images/learners/icons/instagram-dark.svg" alt="Instagram"></a><a class="mr-6" href="#"><img class="img-fluid" src="./images/learners/icons/youtube-dark.svg" alt="Youtube"></a></div>
            </div>
          </div>
          <!-- Mobile Column: End-->
          <!-- Column: Start-->
          <div class="col-12 col-sm-5 col-lg-4 order-2 order-sm-3 px-0 px-md-3">
            <div class="la-contact__title text-center pt-5 d-block d-sm-none">
              <h1>CONTACT</h1>
            </div>
            <div class="la-contact__rgt">
              <form class="la-contact__form" action="#" method="post" onsubmit="">
                <div class="form-group mb-5">
                  <label class="text-sm m-0" for="contName">Full Name</label>
                  <input class="form-control p-0" id="contName" type="text" name="contName" placeholder="Enter your name">
                </div>
                <div class="form-group mb-5">
                  <label class="text-sm m-0" for="contEmail">Email</label>
                  <input class="form-control p-0" id="contEmail" type="email" name="contEmail" placeholder="Enter your email id">
                </div>
                <div class="form-group mb-5">
                  <label class="text-sm m-0" for="contPhone">Contact Number</label>
                  <input class="form-control p-0" id="contPhone" type="tel" name="contPhone" placeholder="XXXXXXXXXX">
                </div>
                <div class="form-group mb-5">
                  <label class="text-sm" for="contMsg">Message</label>
                  <textarea class="form-control text-msg p-2" id="contMsg" rows="5" cols="50" name="contMsg" placeholder="Type here"></textarea>
                </div>
                <div class="la-contact__btn text-right d-none d-sm-block">
                  <div class="btn btn-desktop text-lg text-center" type="submit">SEND</div>
                </div>
                <!-- Mobile Button: Start-->
                <div class="la-contact__btn text-center pt-5 d-block d-sm-none">
                  <div class="btn btn-mobile btn-block text-lg text-center" type="submit">SEND</div>
                </div>
                <!-- Mobile Button: End-->
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Section: End-->
  </section>
  <!-- Main Section: End-->
@endsection