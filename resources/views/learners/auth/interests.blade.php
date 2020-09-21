@extends('learners.layouts.app')

@section('content')
<section class="la-entry__sec">
    <div class="container-fluid la-entry__sec-inner">
      <div class="row la-entry__row h-100">
        <div class="col-md-7 la-entry__col la-entry__col-left h-100 d-none d-md-block">
                      <div class="la-entry__slider-wrap d-flex align-items-center">
                        <div class="swiper-container entry-swiper-container h-100 la-entry__slider">
                          <div class="swiper-wrapper">
                            <div class="swiper-slide" style="width: 60vh;height: 60vh;background-image:url(./images/login-register/slide1.png)"></div>
                            <div class="swiper-slide" style="width: 60vh;height: 60vh;background-image:url(./images/creator/earn.png)"></div>
                          </div>
                          <div class="swiper-pagination swiper-pagination-black"></div>
                        </div>
                      </div>
        </div>
        <div class="col-md-5 la-entry__col la-entry__col-right h-100">
          <div class="la-entry__content-wrap d-flex flex-column justify-content-center">
            <div class="la-entry__interests-wrap">
              <div class="la-entry__interests-title la-entry__content-title text-center mb-4">Your Interests</div>
              <ul class="la-entry__interests d-flex flex-wrap mb-3">
                <li class="la-entry__interest">
                  <div class="la-entry__interest-inner position-relative d-flex align-items-end"><span class="la-entry__interest-thumbnail position-absolute z-0"><img class="img-fluid" src="https://picsum.photos/115/115" alt=""></span><span class="la-entry__interest-name">Design</span></div>
                </li>
                <li class="la-entry__interest">
                  <div class="la-entry__interest-inner position-relative d-flex align-items-end"><span class="la-entry__interest-thumbnail position-absolute z-0"><img class="img-fluid" src="https://picsum.photos/115/115" alt=""></span><span class="la-entry__interest-name">Dance</span></div>
                </li>
                <li class="la-entry__interest">
                  <div class="la-entry__interest-inner position-relative d-flex align-items-end"><span class="la-entry__interest-thumbnail position-absolute z-0"><img class="img-fluid" src="https://picsum.photos/115/115" alt=""></span><span class="la-entry__interest-name">Rangoli</span></div>
                </li>
                <li class="la-entry__interest">
                  <div class="la-entry__interest-inner position-relative d-flex align-items-end"><span class="la-entry__interest-thumbnail position-absolute z-0"><img class="img-fluid" src="https://picsum.photos/115/115" alt=""></span><span class="la-entry__interest-name">Music</span></div>
                </li>
                <li class="la-entry__interest">
                  <div class="la-entry__interest-inner position-relative d-flex align-items-end"><span class="la-entry__interest-thumbnail position-absolute z-0"><img class="img-fluid" src="https://picsum.photos/115/115" alt=""></span><span class="la-entry__interest-name">Travel</span></div>
                </li>
                <li class="la-entry__interest">
                  <div class="la-entry__interest-inner position-relative d-flex align-items-end"><span class="la-entry__interest-thumbnail position-absolute z-0"><img class="img-fluid" src="https://picsum.photos/115/115" alt=""></span><span class="la-entry__interest-name">Tattoo</span></div>
                </li>
                <li class="la-entry__interest">
                  <div class="la-entry__interest-inner position-relative d-flex align-items-end"><span class="la-entry__interest-thumbnail position-absolute z-0"><img class="img-fluid" src="https://picsum.photos/115/115" alt=""></span><span class="la-entry__interest-name">Fashion</span></div>
                </li>
                <li class="la-entry__interest">
                  <div class="la-entry__interest-inner position-relative d-flex align-items-end"><span class="la-entry__interest-thumbnail position-absolute z-0"><img class="img-fluid" src="https://picsum.photos/115/115" alt=""></span><span class="la-entry__interest-name">Makeup</span></div>
                </li>
                <li class="la-entry__interest">
                  <div class="la-entry__interest-inner position-relative d-flex align-items-end"><span class="la-entry__interest-thumbnail position-absolute z-0"><img class="img-fluid" src="https://picsum.photos/115/115" alt=""></span><span class="la-entry__interest-name">Craft</span></div>
                </li>
                <li class="la-entry__interest">
                  <div class="la-entry__interest-inner position-relative d-flex align-items-end"><span class="la-entry__interest-thumbnail position-absolute z-0"><img class="img-fluid" src="https://picsum.photos/115/115" alt=""></span><span class="la-entry__interest-name">Makeup</span></div>
                </li>
                <li class="la-entry__interest">
                  <div class="la-entry__interest-inner position-relative d-flex align-items-end"><span class="la-entry__interest-thumbnail position-absolute z-0"><img class="img-fluid" src="https://picsum.photos/115/115" alt=""></span><span class="la-entry__interest-name">Craft</span></div>
                </li>
              </ul>
              <div class="la-entry__interest-actions text-center">
                <div class="la-entry__interest-next mb-2">GET STARTED</div>
                <div class="la-entry__interest-skip la-btn__plain text--burple"><a href="">skip</a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection