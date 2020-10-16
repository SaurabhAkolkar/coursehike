@extends('learners.layouts.app')

@section('content')
<!-- Section: Start-->
<section class="la-section la-section--hero clearfix p-0">
    <div class="la-section__inner">
      <div class="container">
        <div class="la-hero__top row align-items-center">
          <!-- Column: Start-->
          <div class="col-12 col-lg-5">
            <!-- Global Search: Start-->
            <div class="la-gsearch">
              <form class="form-inline" action="">
                <div class="form-group flex-grow-1">
                  <input class="la-gsearch__input w-100 form-control" type="text" placeholder="What you want to learn today?">
                </div>
                <button class="la-gsearch__submit btn" type="submit"><i class="la-icon la-icon--2xl icon icon-search"></i></button>
              </form>
            </div>
            <!-- Global Search: End-->
            <div class="la-hero">
              <p class="la-hero__tag m-0">COURSES & CLASSES BY</p>
              <h1 class="la-hero__title">World’s best Creators</h1>
              <p class="la-hero__lead pr-5">Observe, learn and converse with creators to master your arts</p>
              <div class="la-hero__actions d-lg-flex align-items-center">
                <div>
                    <a class="btn btn-primary la-btn la-btn--primary d-none d-lg-block">Subscribe Now</a>
                    <a class="btn btn-primary la-btn la-btn--primary btn-block d-block d-lg-none">Subscribe Now</a>
                    <p class="m-0 pt-1">Access to all the Courses</p>
                </div>
                <div class="la-soffer d-flex d-lg-block my-6 my-lg-0">
                  <div class="la-soffer__bestprice"> <sup><small>$</small></sup>  39 / Month</div>
                  <div class="la-soffer__realprice"> <sup><small>$</small></sup>  49 / Month</div>
                </div>
              </div>
             
            </div>
          </div>
          <!-- Column: End-->
          <!-- Column: Start-->
          <div class="col-12 col-lg-7">
            <div class="la-hero__img position-relative d-flex align-items-center ">
              <h2 class="la-section__title la-section__title--big">Design</h2><img class="img-fluid" src="./images/learners/home/design-a@2x.png" alt="Design">
            </div>
          </div>
          <!-- Column: End-->
        </div>
        <!-- Row: Start-->
        <div class="la-hero__bottom d-flex justify-content-center justify-content-lg-between align-items-center pt-14 pb-14">
          <div class="la-hero__bottom-trial la-btn__arrow text--green text-uppercase text--md font-weight--medium text-spacing"><a href="">Start free trial</a><span class="la-btn__arrow-icon">  <img src="./images/learners/icons/long-arrow.svg" alt=""></span></div>
          <div class="la-hero__bottom-browse la-btn__arrow la-btn__arrow-down text--burple text-uppercase text--md font-weight--medium text-spacing d-none d-lg-block"><a href="">BROWSE COURSES</a><span class="la-btn__arrow-icon arrow-down"> <img src="./images/learners/icons/long-arrow.svg" alt=""></span></div>
        </div>
        <!-- Row: End-->
      </div>
    </div>
  </section>
  <!-- Section: End-->
  <!-- Section: Start-->
  <section class="la-section la-section--grey la-section--art-categories position-relative">
    <div class="la-section__inner">
      <div class="container"><span class="la-section__circle"></span><span class="la-section__cross-line"></span>
        <div class="la-courses mt-14">
          <nav class="la-courses__nav d-flex justify-content-between">
            <ul class="nav nav-pills la-courses__nav-tabs" id="nav-tab" role="tablist">
              <li class="nav-item la-courses__nav-item"><a class="nav-link la-courses__nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"> <span class="position-relative">Tattoo</span></a></li>
              <li class="nav-item la-courses__nav-item"><a class="nav-link la-courses__nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"> <span class="position-relative">Rangoli</span></a></li>
              <li class="nav-item la-courses__nav-item"><a class="nav-link la-courses__nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false"> <span class="position-relative">Design</span></a></li>
            </ul><a class="la-icon--3xl icon-filter d-none d-lg-block" id="filterCourses" role="button"></a>
          </nav>

          @php  
          $tattoo1 = new stdClass;$tattoo1->img= "https://picsum.photos/600/400";$tattoo1->course= "Tattoo Art";$tattoo1->rating= "4";$tattoo1->url= "";$tattoo1->creatorImg= "https://picsum.photos/100";$tattoo1->creatorName= "Joseph Phill";$tattoo1->creatorUrl= "/creator";
          $tattoo2 = new stdClass;$tattoo2->img= "https://picsum.photos/600/400"; $tattoo2->course= "Tattoo Art";$tattoo2->rating= "4";$tattoo2->url= "";$tattoo2->creatorImg= "https://picsum.photos/100";$tattoo2->creatorName= "Amy D'souza";$tattoo2->creatorUrl= "/creator";
          $tattoo3 = new stdClass;$tattoo3->img= "https://picsum.photos/600/400";$tattoo3->course= "Tattoo Art";$tattoo3->rating= "4";$tattoo3->url= "";$tattoo3->creatorImg= "https://picsum.photos/100";$tattoo3->creatorName= "Alton Crew";$tattoo3->creatorUrl= "/creator";
          $tattoo4 = new stdClass;$tattoo4->img= "https://picsum.photos/600/400";$tattoo4->course= "Tattoo Art";$tattoo4->rating= "4";$tattoo4->url= "";$tattoo4->creatorImg= "https://picsum.photos/100";$tattoo4->creatorName= "Nathan Spark";$tattoo4->creatorUrl= "/creator";
          $tattoo5 = new stdClass;$tattoo5->img= "https://picsum.photos/600/400";$tattoo5->course= "Tattoo Art"; $tattoo5->rating= "4";$tattoo5->url= ""; $tattoo5->creatorImg= "https://picsum.photos/100"; $tattoo5->creatorName= "Harry Lisa"; $tattoo5->creatorUrl= "/creator";
          $tattoo6 = new stdClass;$tattoo6->img= "https://picsum.photos/600/400";$tattoo6->course= "Tattoo Art";$tattoo6->rating= "4"; $tattoo6->url= "";$tattoo6->creatorImg= "https://picsum.photos/100";$tattoo6->creatorName= "Natalia Spark";$tattoo6->creatorUrl= "/creator";
          $tattoo7 = new stdClass;$tattoo7->img= "https://picsum.photos/600/400"; $tattoo7->course= "Tattoo Art";$tattoo7->rating= "4"; $tattoo7->url= "";$tattoo7->creatorImg= "https://picsum.photos/100";$tattoo7->creatorName= "Remo Joseph"; $tattoo7->creatorUrl= "/creator";

          $tattoos = array($tattoo1, $tattoo2, $tattoo3, $tattoo4, $tattoo5, $tattoo6, $tattoo7);
        @endphp
          <div class="tab-content la-courses__content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
              <div class="row row-cols-lg-3">
                            
                    @foreach($tattoos as $tattoo)
                    <x-course 
                        :img="$tattoo->img" 
                        :course="$tattoo->course" 
                        :url="$tattoo->url" 
                        :rating="$tattoo->rating"
                        :creatorImg="$tattoo->creatorImg"
                        :creatorName="$tattoo->creatorName"
                        :creatorUrl="$tattoo->creatorUrl"
                      />
                  @endforeach

              </div>
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
              <div class="row row-cols-lg-3">
                     
                    @foreach($tattoos as $tattoo)
                      <x-course 
                          :img="$tattoo->img" 
                          :course="$tattoo->course" 
                          :url="$tattoo->url" 
                          :rating="$tattoo->rating"
                          :creatorImg="$tattoo->creatorImg"
                          :creatorName="$tattoo->creatorName"
                          :creatorUrl="$tattoo->creatorUrl"
                        />
                    @endforeach
              </div>
            </div>
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
              <div class="row row-cols-lg-3">
                              
                    @foreach($tattoos as $tattoo)
                    <x-course 
                        :img="$tattoo->img" 
                        :course="$tattoo->course" 
                        :url="$tattoo->url" 
                        :rating="$tattoo->rating"
                        :creatorImg="$tattoo->creatorImg"
                        :creatorName="$tattoo->creatorName"
                        :creatorUrl="$tattoo->creatorUrl"
                      />
                  @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Section: End-->
  <!-- Section: Start-->
  <section class="la-section la-section--artists">
    <div class="la-section__inner">
      <div class="swiper-container gallery-top la-artist__slider container">
        <div class="swiper-wrapper">
                    <div class="swiper-slide la-artist__slider">
                      <div class="row la-artist__slider-row">
                        <div class="col-md-12 la-artist__slider-col la-artist__designation position-absolute d-flex align-items-center justify-content-center">
                          <h2 class="la-section__title la-section__title--big">Alien <span style="color: var(--gray);">MENTOR </span></h2>
                        </div>
                        <div class="col-md-6 la-artist__slider-col la-artist__slide-img">
                          <div class="la-artist__img text-center"><img src="./images/learners/home/artist.png" alt=""></div>
                        </div>
                        <div class="col-md-6 la-artist__slider-col la-artist__slide-content d-flex flex-column justify-content-around align-items-end">
                          <div class="la-artist__content-top d-flex flex-column align-items-end">
                            <div class="la-artist__name">Alton Crew</div>
                            <div class="la-btn__arrow text--burple text-uppercase text-spacing font-weight--bold"><a href="">read about</a><span class="la-btn__arrow-icon"><img src="./images/learners/icons/long-arrow.svg" alt=""></span></div>
                          </div>
                          <div class="la-artist__content-bottom d-flex flex-column align-items-end">
                            <div class="la-artist__specialist text-uppercase">TATTOO</div>
                            <div class="la-artist__company-name">Tribal Tattoo</div>
                            <div class="la-btn__arrow text--burple text-uppercase text-spacing font-weight--bold"><a href="">learn more</a><span class="la-btn__arrow-icon"><img src="./images/learners/icons/long-arrow.svg" alt=""></span></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="swiper-slide la-artist__slider">
                      <div class="row la-artist__slider-row">
                        <div class="col-md-12 la-artist__slider-col la-artist__designation position-absolute d-flex align-items-center justify-content-center">
                          <h2 class="la-section__title la-section__title--big">Alien<span style="color: var(--gray);">MENTOR </span></h2>
                        </div>
                        <div class="col-md-6 la-artist__slider-col la-artist__slide-img">
                          <div class="la-artist__img text-center"><img src="./images/learners/home/artist.png" alt=""></div>
                        </div>
                        <div class="col-md-6 la-artist__slider-col la-artist__slide-content d-flex flex-column justify-content-around align-items-end">
                          <div class="la-artist__content-top d-flex flex-column align-items-end">
                            <div class="la-artist__name">Alton Crew</div>
                            <div class="la-btn__arrow text--burple text-uppercase text-spacing font-weight--bold"><a href="">read about</a><span class="la-btn__arrow-icon"><img src="./images/learners/icons/long-arrow.svg" alt=""></span></div>
                          </div>
                          <div class="la-artist__content-bottom d-flex flex-column align-items-end">
                            <div class="la-artist__specialist text-uppercase">TATTOO</div>
                            <div class="la-artist__company-name">Tribal Tattoo</div>
                            <div class="la-btn__arrow text--burple text-uppercase text-spacing font-weight--bold"><a href="">learn more</a><span class="la-btn__arrow-icon"><img src="./images/learners/icons/long-arrow.svg" alt=""></span></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="swiper-slide la-artist__slider">
                      <div class="row la-artist__slider-row">
                        <div class="col-md-12 la-artist__slider-col la-artist__designation position-absolute d-flex align-items-center justify-content-center">
                          <h2 class="la-section__title la-section__title--big">Alien<span style="color: var(--gray);">MENTOR </span></h2>
                        </div>
                        <div class="col-md-6 la-artist__slider-col la-artist__slide-img">
                          <div class="la-artist__img text-center"><img src="./images/learners/home/artist.png" alt=""></div>
                        </div>
                        <div class="col-md-6 la-artist__slider-col la-artist__slide-content d-flex flex-column justify-content-around align-items-end">
                          <div class="la-artist__content-top d-flex flex-column align-items-end">
                            <div class="la-artist__name">Alton Crew</div>
                            <div class="la-btn__arrow text--burple text-uppercase text-spacing font-weight--bold"><a href="">read about</a><span class="la-btn__arrow-icon"><img src="./images/learners/icons/long-arrow.svg" alt=""></span></div>
                          </div>
                          <div class="la-artist__content-bottom d-flex flex-column align-items-end">
                            <div class="la-artist__specialist text-uppercase">TATTOO</div>
                            <div class="la-artist__company-name">Tribal Tattoo</div>
                            <div class="la-btn__arrow text--burple text-uppercase text-spacing font-weight--bold"><a href="">learn more</a><span class="la-btn__arrow-icon"><img src="./images/learners/icons/long-arrow.svg" alt=""></span></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="swiper-slide la-artist__slider">
                      <div class="row la-artist__slider-row">
                        <div class="col-md-12 la-artist__slider-col la-artist__designation position-absolute d-flex align-items-center justify-content-center">
                          <h2 class="la-section__title la-section__title--big">Alien<span style="color: var(--gray);">MENTOR </span></h2>
                        </div>
                        <div class="col-md-6 la-artist__slider-col la-artist__slide-img">
                          <div class="la-artist__img text-center"><img src="./images/learners/home/artist.png" alt=""></div>
                        </div>
                        <div class="col-md-6 la-artist__slider-col la-artist__slide-content d-flex flex-column justify-content-around align-items-end">
                          <div class="la-artist__content-top d-flex flex-column align-items-end">
                            <div class="la-artist__name">Alton Crew</div>
                            <div class="la-btn__arrow text--burple text-uppercase text-spacing font-weight--bold"><a href="">read about</a><span class="la-btn__arrow-icon"><img src="./images/learners/icons/long-arrow.svg" alt=""></span></div>
                          </div>
                          <div class="la-artist__content-bottom d-flex flex-column align-items-end">
                            <div class="la-artist__specialist text-uppercase">TATTOO</div>
                            <div class="la-artist__company-name">Tribal Tattoo</div>
                            <div class="la-btn__arrow text--burple text-uppercase text-spacing font-weight--bold"><a href="">learn more</a><span class="la-btn__arrow-icon"><img src="./images/learners/icons/long-arrow.svg" alt=""></span></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="swiper-slide la-artist__slider">
                      <div class="row la-artist__slider-row">
                        <div class="col-md-12 la-artist__slider-col la-artist__designation position-absolute d-flex align-items-center justify-content-center">
                          <h2 class="la-section__title la-section__title--big">Alien<span style="color: var(--gray);">MENTOR </span></h2>
                        </div>
                        <div class="col-md-6 la-artist__slider-col la-artist__slide-img">
                          <div class="la-artist__img text-center"><img src="./images/learners/home/artist.png" alt=""></div>
                        </div>
                        <div class="col-md-6 la-artist__slider-col la-artist__slide-content d-flex flex-column justify-content-around align-items-end">
                          <div class="la-artist__content-top d-flex flex-column align-items-end">
                            <div class="la-artist__name">Alton Crew</div>
                            <div class="la-btn__arrow text--burple text-uppercase text-spacing font-weight--bold"><a href="">read about</a><span class="la-btn__arrow-icon"><img src="./images/learners/icons/long-arrow.svg" alt=""></span></div>
                          </div>
                          <div class="la-artist__content-bottom d-flex flex-column align-items-end">
                            <div class="la-artist__specialist text-uppercase">TATTOO</div>
                            <div class="la-artist__company-name">Tribal Tattoo</div>
                            <div class="la-btn__arrow text--burple text-uppercase text-spacing font-weight--bold"><a href="">learn more</a><span class="la-btn__arrow-icon"><img src="./images/learners/icons/long-arrow.svg" alt=""></span></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="swiper-slide la-artist__slider">
                      <div class="row la-artist__slider-row">
                        <div class="col-md-12 la-artist__slider-col la-artist__designation position-absolute d-flex align-items-center justify-content-center">
                          <h2 class="la-section__title la-section__title--big">Alien<span style="color: var(--gray);">MENTOR </span></h2>
                        </div>
                        <div class="col-md-6 la-artist__slider-col la-artist__slide-img">
                          <div class="la-artist__img text-center"><img src="./images/learners/home/artist.png" alt=""></div>
                        </div>
                        <div class="col-md-6 la-artist__slider-col la-artist__slide-content d-flex flex-column justify-content-around align-items-end">
                          <div class="la-artist__content-top d-flex flex-column align-items-end">
                            <div class="la-artist__name">Alton Crew</div>
                            <div class="la-btn__arrow text--burple text-uppercase text-spacing font-weight--bold"><a href="">read about</a><span class="la-btn__arrow-icon"><img src="./images/learners/icons/long-arrow.svg" alt=""></span></div>
                          </div>
                          <div class="la-artist__content-bottom d-flex flex-column align-items-end">
                            <div class="la-artist__specialist text-uppercase">TATTOO</div>
                            <div class="la-artist__company-name">Tribal Tattoo</div>
                            <div class="la-btn__arrow text--burple text-uppercase text-spacing font-weight--bold"><a href="">learn more</a><span class="la-btn__arrow-icon"><img src="./images/learners/icons/long-arrow.svg" alt=""></span></div>
                          </div>
                        </div>
                      </div>
                    </div>
        </div>
      </div>
      <div class="swiper-container gallery-thumbs la-artist__thumbnails-wrap">
        <div class="swiper-wrapper la-artist__thumbnails">
          <div class="swiper-slide la-artist__thumbnail"><img src="./images/learners/home/artist-thumb/artist-thumb-1.png" alt=""></div>
          <div class="swiper-slide la-artist__thumbnail"><img src="./images/learners/home/artist-thumb/artist-thumb-2.png" alt=""></div>
          <div class="swiper-slide la-artist__thumbnail"><img src="./images/learners/home/artist-thumb/artist-thumb-3.png" alt=""></div>
          <div class="swiper-slide la-artist__thumbnail"><img src="./images/learners/home/artist-thumb/artist-thumb-4.png" alt=""></div>
          <div class="swiper-slide la-artist__thumbnail"><img src="./images/learners/home/artist-thumb/artist-thumb-5.png" alt=""></div>
          <div class="swiper-slide la-artist__thumbnail"><img src="./images/learners/home/artist-thumb/artist-thumb-6.png" alt=""></div>
          <div class="swiper-slide la-artist__thumbnail"><img src="./images/learners/home/artist-thumb/artist-thumb-1.png" alt=""></div>
          <div class="swiper-slide la-artist__thumbnail"><img src="./images/learners/home/artist-thumb/artist-thumb-2.png" alt=""></div>
          <div class="swiper-slide la-artist__thumbnail"><img src="./images/learners/home/artist-thumb/artist-thumb-3.png" alt=""></div>
          <div class="swiper-slide la-artist__thumbnail"><img src="./images/learners/home/artist-thumb/artist-thumb-4.png" alt=""></div>
          <div class="swiper-slide la-artist__thumbnail"><img src="./images/learners/home/artist-thumb/artist-thumb-5.png" alt=""></div>
          <div class="swiper-slide la-artist__thumbnail"><img src="./images/learners/home/artist-thumb/artist-thumb-6.png" alt=""></div>
          <div class="swiper-slide la-artist__thumbnail"><img src="./images/learners/home/artist-thumb/artist-thumb-1.png" alt=""></div>
          <div class="swiper-slide la-artist__thumbnail"><img src="./images/learners/home/artist-thumb/artist-thumb-2.png" alt=""></div>
          <div class="swiper-slide la-artist__thumbnail"><img src="./images/learners/home/artist-thumb/artist-thumb-3.png" alt=""></div>
          <div class="swiper-slide la-artist__thumbnail"><img src="./images/learners/home/artist-thumb/artist-thumb-4.png" alt=""></div>
          <div class="swiper-slide la-artist__thumbnail"><img src="./images/learners/home/artist-thumb/artist-thumb-5.png" alt=""></div>
          <div class="swiper-slide la-artist__thumbnail"><img src="./images/learners/home/artist-thumb/artist-thumb-6.png" alt=""></div>
        </div>
      </div>
    </div>
  </section>
  <!-- Section: End-->
  <!-- Section: Start-->
  <section class="la-section la-section--classes la-section--grey position-relative">
    <div class="la-section__inner">
      <div class="container"><span class="la-section__circle la-section__circle--right"></span>
        <h2 class="la-section__title la-section__title--big position-relative">Master <span>classes</span></h2>
        <div class="la-mccourses py-4">
          <div class="row justify-content-center px-lg-5">
            <div class="col-12 col-md-6">
                        <div class="la-mccourse mb-5">
                          <div class="la-mccourse__imgwrap"><img class="img-fluid" src="https://picsum.photos/600/400" alt="Master in Photography"></div>
                          <div class="la-mccourse__overlay"><a class="la-mccourse__tag"><img class="img-fluid" src="./images/learners/home/master-class-desk.png" alt="Master in Photography"></a>
                            <div class="la-mccourse__type">video</div>
                            <div class="la-mccourse__title">Master in Photography</div>
                            <div class="la-mccourse__btm">
                              <div class="la-mccourse__cprofile">
                                <div class="la-mccourse__cprofile-imgwrap"><img class="img-fluid" src="https://picsum.photos/100/100" alt="Charlotte Floyd"></div>
                                <div class="la-mccourse__cprofile-name">Charlotte Floyd</div>
                              </div>
                              <div class="la-mccourse__learners">300 learners</div>
                            </div>
                          </div>
                        </div>
            </div>
            <div class="col-12 col-md-6">
                        <div class="la-mccourse mb-5">
                          <div class="la-mccourse__imgwrap"><img class="img-fluid" src="https://picsum.photos/600/400" alt="Master in Photography"></div>
                          <div class="la-mccourse__overlay"><a class="la-mccourse__tag"><img class="img-fluid" src="./images/learners/home/master-class-desk.png" alt="Master in Photography"></a>
                            <div class="la-mccourse__type">video</div>
                            <div class="la-mccourse__title">Master in Photography</div>
                            <div class="la-mccourse__btm">
                              <div class="la-mccourse__cprofile">
                                <div class="la-mccourse__cprofile-imgwrap"><img class="img-fluid" src="https://picsum.photos/100/100" alt="Charlotte Floyd"></div>
                                <div class="la-mccourse__cprofile-name">Charlotte Floyd</div>
                              </div>
                              <div class="la-mccourse__learners">300 learners</div>
                            </div>
                          </div>
                        </div>
            </div>
            <div class="col-12 col-md-6">
                        <div class="la-mccourse mb-5">
                          <div class="la-mccourse__imgwrap"><img class="img-fluid" src="https://picsum.photos/600/400" alt="Master in Photography"></div>
                          <div class="la-mccourse__overlay"><a class="la-mccourse__tag"><img class="img-fluid" src="./images/learners/home/master-class-desk.png" alt="Master in Photography"></a>
                            <div class="la-mccourse__type">video</div>
                            <div class="la-mccourse__title">Master in Photography</div>
                            <div class="la-mccourse__btm">
                              <div class="la-mccourse__cprofile">
                                <div class="la-mccourse__cprofile-imgwrap"><img class="img-fluid" src="https://picsum.photos/100/100" alt="Charlotte Floyd"></div>
                                <div class="la-mccourse__cprofile-name">Charlotte Floyd</div>
                              </div>
                              <div class="la-mccourse__learners">300 learners</div>
                            </div>
                          </div>
                        </div>
            </div>
            <div class="col-12 col-md-6">
                        <div class="la-mccourse mb-5">
                          <div class="la-mccourse__imgwrap"><img class="img-fluid" src="https://picsum.photos/600/400" alt="Master in Photography"></div>
                          <div class="la-mccourse__overlay"><a class="la-mccourse__tag"><img class="img-fluid" src="./images/learners/home/master-class-desk.png" alt="Master in Photography"></a>
                            <div class="la-mccourse__type">video</div>
                            <div class="la-mccourse__title">Master in Photography</div>
                            <div class="la-mccourse__btm">
                              <div class="la-mccourse__cprofile">
                                <div class="la-mccourse__cprofile-imgwrap"><img class="img-fluid" src="https://picsum.photos/100/100" alt="Charlotte Floyd"></div>
                                <div class="la-mccourse__cprofile-name">Charlotte Floyd</div>
                              </div>
                              <div class="la-mccourse__learners">300 learners</div>
                            </div>
                          </div>
                        </div>
            </div>
            <div class="col-12 col-md-6">
                        <div class="la-mccourse mb-5">
                          <div class="la-mccourse__imgwrap"><img class="img-fluid" src="https://picsum.photos/600/400" alt="Master in Photography"></div>
                          <div class="la-mccourse__overlay"><a class="la-mccourse__tag"><img class="img-fluid" src="./images/learners/home/master-class-desk.png" alt="Master in Photography"></a>
                            <div class="la-mccourse__type">video</div>
                            <div class="la-mccourse__title">Master in Photography</div>
                            <div class="la-mccourse__btm">
                              <div class="la-mccourse__cprofile">
                                <div class="la-mccourse__cprofile-imgwrap"><img class="img-fluid" src="https://picsum.photos/100/100" alt="Charlotte Floyd"></div>
                                <div class="la-mccourse__cprofile-name">Charlotte Floyd</div>
                              </div>
                              <div class="la-mccourse__learners">300 learners</div>
                            </div>
                          </div>
                        </div>
            </div>
            <div class="col-12 col-md-6">
                        <div class="la-mccourse mb-5">
                          <div class="la-mccourse__imgwrap"><img class="img-fluid" src="https://picsum.photos/600/400" alt="Master in Photography"></div>
                          <div class="la-mccourse__overlay"><a class="la-mccourse__tag"><img class="img-fluid" src="./images/learners/home/master-class-desk.png" alt="Master in Photography"></a>
                            <div class="la-mccourse__type">video</div>
                            <div class="la-mccourse__title">Master in Photography</div>
                            <div class="la-mccourse__btm">
                              <div class="la-mccourse__cprofile">
                                <div class="la-mccourse__cprofile-imgwrap"><img class="img-fluid" src="https://picsum.photos/100/100" alt="Charlotte Floyd"></div>
                                <div class="la-mccourse__cprofile-name">Charlotte Floyd</div>
                              </div>
                              <div class="la-mccourse__learners">300 learners</div>
                            </div>
                          </div>
                        </div>
            </div>
            <div class="col-12 col-md-6">
                        <div class="la-mccourse mb-5">
                          <div class="la-mccourse__imgwrap"><img class="img-fluid" src="https://picsum.photos/600/400" alt="Master in Photography"></div>
                          <div class="la-mccourse__overlay"><a class="la-mccourse__tag"><img class="img-fluid" src="./images/learners/home/master-class-desk.png" alt="Master in Photography"></a>
                            <div class="la-mccourse__type">video</div>
                            <div class="la-mccourse__title">Master in Photography</div>
                            <div class="la-mccourse__btm">
                              <div class="la-mccourse__cprofile">
                                <div class="la-mccourse__cprofile-imgwrap"><img class="img-fluid" src="https://picsum.photos/100/100" alt="Charlotte Floyd"></div>
                                <div class="la-mccourse__cprofile-name">Charlotte Floyd</div>
                              </div>
                              <div class="la-mccourse__learners">300 learners</div>
                            </div>
                          </div>
                        </div>
            </div>
            <div class="col-12 col-md-6">
                        <div class="la-mccourse mb-5">
                          <div class="la-mccourse__imgwrap"><img class="img-fluid" src="https://picsum.photos/600/400" alt="Master in Photography"></div>
                          <div class="la-mccourse__overlay"><a class="la-mccourse__tag"><img class="img-fluid" src="./images/learners/home/master-class-desk.png" alt="Master in Photography"></a>
                            <div class="la-mccourse__type">video</div>
                            <div class="la-mccourse__title">Master in Photography</div>
                            <div class="la-mccourse__btm">
                              <div class="la-mccourse__cprofile">
                                <div class="la-mccourse__cprofile-imgwrap"><img class="img-fluid" src="https://picsum.photos/100/100" alt="Charlotte Floyd"></div>
                                <div class="la-mccourse__cprofile-name">Charlotte Floyd</div>
                              </div>
                              <div class="la-mccourse__learners">300 learners</div>
                            </div>
                          </div>
                        </div>
            </div>
          </div>
        </div>
        <div class="text-right">
          <div class="la-btn__arrow text--burple text-uppercase text-spacing font-weight--bold pt-8"><a href="">explore more</a><span class="la-btn__arrow-icon"><img src="./images/learners/icons/long-arrow.svg" alt=""></span></div>
        </div>
      </div>
    </div>
  </section>
  <!-- Section: End-->
  <!-- Section: Start-->
  <section class="la-section la-section--trail">
    <div class="la-section__inner">
      <div class="container">
       
        <div class="row">
          <div class="col-12 col-md-5 la-trail__left">
            <div class="la-trail__title la-trail__title-out la-trail__title--black la-section__title la-section__title--big position-absolute">Observe.</div>
            <div class="la-trail__img-wrap">
              <div class="la-trail__img position-relative">
                <img class="img-fluid" src="./images/learners/home/observe.jpg" alt="observe">
              </div>
              <div class="la-trail__title la-trail__title-in la-trail__title--purple la-section__title la-section__title--big position-absolute">Observe.</div>
            </div>
          </div>
          <div class="col-12 col-md-7 pl-md-0">
            <div class="la-trail__btn la-btn__plain d-flex justify-content-center">
              <a href="">ALIENS WAY OF TEACHING</a>
            </div>
            <div class="la-trail__right d-flex align-items-end ">
              <div class="la-trail__content-wrap pr-md-20 ">
                <div class="la-trail__para pb-10 pr-md-20">We believe that real learning happens with consistency. With consistent observation, learning and practicing a particular skill repetitively makes you a Pro at it.</div>
                <a class="btn btn-primary la-btn la-btn--primary mt-md-10">Start free trail</a>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Section: End-->
  <!-- Section: Start-->
  <section class="la-section la-section--about pb-0">
    <div class="la-section__inner">
      <div class="container">
        <h2 class="la-section__title la-section__title--big"> <span style="color: var(--gray);">Learn it </span><br><span>like aliens</span></h2>
        <div class="swiper-container la-price__slider">
          <div class="swiper-wrapper">
            <div class="swiper-slide la-price__slide">
              <div class="la-price__row row mb-16">
                <div class="col col-lg-5 pt-20">
                  <h3 class="la-section__subtitle">How does subscription works?</h3>
                  <p class="la-section__text">Through our Radical team, we strive everyday to make knowledge Affordable, Accessible for all the individuals who have limited or no access to the Real knowledge.<br><br>So, you can subscribe to all the courses and classes. Or rent them to learn whenever you want.</p>
                  <div class="la-btn__arrow text--burple text-uppercase text-spacing font-weight--bold pt-8"><a href="">learn more</a><span class="la-btn__arrow-icon"><img src="./images/icons/long-arrow.svg" alt=""></span></div>
                </div>
                <div class="col offset-lg-1 col-lg-5 pt-20">
                  <div class="la-price__box">
                    <div class="la-price__box-inner"><a class="btn btn-primary la-btn la-btn--primary w-100">SUBSCRIBE NOW</a>
                      <p class="la-price__box-para mt-8 mb-2">Get <span class="la-color--primary">20% savings </span>on Annual Plan</p>
                      <div class="la-price__box-soffer la-soffer ml-0">
                        <div class="la-soffer__bestprice la-soffer__bestprice--black"> <sup><small>$</small></sup>  39 / Month</div>
                        <div class="la-soffer__realprice"> <sup><small>$</small></sup>  49 / Month</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-slide la-price__slide">
              <div class="la-price__row row mb-16">
                <div class="col col-lg-5 pt-20">
                  <h3 class="la-section__subtitle">What’s LILA for you ?</h3>
                  <p class="la-section__text">Keep learning to expand your potential and make a mark in the world<br><br>Our mission is to Encourage, Empower and Embrace Self-Learning among all the curious individuals who wish to learn,</p>
                  <div class="la-btn__arrow text--burple text-uppercase text-spacing font-weight--bold pt-8"><a href="">learn more</a><span class="la-btn__arrow-icon"><img src="./images/icons/long-arrow.svg" alt=""></span></div>
                </div>
                <div class="col offset-lg-1 col-lg-5 pt-20">
                  <div class="la-price__box">
                    <div class="la-price__box-inner"><a class="btn btn-primary la-btn la-btn--primary w-100">SUBSCRIBE NOW</a>
                      <p class="la-price__box-para mt-8 mb-2">Get <span class="la-color--primary">20% savings </span>on Annual Plan</p>
                      <div class="la-price__box-soffer la-soffer ml-0">
                        <div class="la-soffer__bestprice la-soffer__bestprice--black"> <sup><small>$</small></sup>  39 / Month</div>
                        <div class="la-soffer__realprice"> <sup><small>$</small></sup>  49 / Month</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-slide la-price__slide">
              <div class="la-price__row row">
                <div class="col col-lg-5 pt-20">
                  <h3 class="la-section__subtitle">How does subscription works?</h3>
                  <p class="la-section__text">Through our Radical team, we strive everyday to make knowledge Affordable, Accessible for all the individuals who have limited or no access to the Real knowledge.<br><br>So, you can subscribe to all the courses and classes. Or rent them to learn whenever you want.</p>
                  <div class="la-btn__arrow text--burple text-uppercase text-spacing font-weight--bold pt-8"><a href="">learn more</a><span class="la-btn__arrow-icon"><img src="./images/icons/long-arrow.svg" alt=""></span></div>
                </div>
                <div class="col offset-lg-1 col-lg-5 pt-20">
                  <div class="la-price__box">
                    <div class="la-price__box-inner"><a class="btn btn-primary la-btn la-btn--primary w-100">SUBSCRIBE NOW</a>
                      <p class="la-price__box-para mt-8 mb-2">Get <span class="la-color--primary">20% savings </span>on Annual Plan</p>
                      <div class="la-price__box-soffer la-soffer ml-0">
                        <div class="la-soffer__bestprice la-soffer__bestprice--black"> <sup><small>$</small></sup>  39 / Month</div>
                        <div class="la-soffer__realprice"> <sup><small>$</small></sup>  49 / Month</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </div>
  </section>
  <!-- Section: End-->
  @endsection