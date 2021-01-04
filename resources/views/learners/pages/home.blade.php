@extends('learners.layouts.app')

@section('content')
<!-- Section: Start-->
<section class="la-section la-section--hero clearfix p-0">
    <div class="la-section__inner">
      <div class="container">
        <div class="la-hero__top row align-items-center la-anim__wrap la-anim__wrap--hero">
          <!-- Column: Start-->
          <div class="col-12 col-lg-5 la-anim__item la-anim__item--left">
            <div class="la-hero py-6 py-md-0 la-anim__stagger">
              <p class="la-hero__tag mb-2 mb-md-0 la-anim__stagger-item">COURSES & CLASSES BY</p>
              <h1 class="la-hero__title la-anim__stagger-item">World’s best <span class="la-hero__subtitle">Creators</span></h1>
              <p class="la-hero__lead pr-5 la-anim__stagger-item">{{$firstSection->sub_heading}}</p>
              <div class="la-hero__actions d-lg-flex align-items-center la-anim__stagger-item">
                <div>
                    <a href="/learning-plans" class="btn btn-primary la-btn la-btn--primary d-none d-lg-block">Subscribe Now</a>
                    <a href="/learning-plans" class="btn btn-primary la-btn la-btn--primary btn-block d-block d-lg-none">Subscribe Now</a>
                    <p class="m-0 pt-1 pl-1 text-center text-sm-left">Access to all the Courses</p>
                </div>
                <div class="la-soffer d-flex d-lg-block justify-content-center  my-lg-0">
                  <div class="la-soffer__bestprice"> <sup><small>$</small></sup>  39 / Month</div>
                  <div class="la-soffer__realprice"> <sup><small>$</small></sup>  49 / Month</div>
                </div>
              </div>
             
            </div>
          </div>
          <!-- Column: End-->
          <!-- Column: Start-->
          <div class="col-12 col-lg-7 la-anim__item la-anim__item--right">
            <div class="la-hero__img position-relative d-flex align-items-center la-anim__fade-in-right">
              <span class="la-section__crossline"></span>
              <h2 class="la-section__title la-section__title--big"><div class="la-anim__text-move--content">{{$firstSection->image_text}}</div></h2>
              <img class="img-fluid" src="{{$firstSection->image}}" alt="{{$firstSection->image_text}}">
            </div>
          </div>
          <!-- Column: End-->
        </div>
        <!-- Row: Start-->
        <div class="la-anim__wrap">
          <div class="la-hero__bottom d-flex justify-content-center justify-content-lg-between align-items-center pt-14 pb-14 la-anim__fade-in">
            <div class="la-hero__bottom-trial la-btn__arrow text--green text-uppercase text--md font-weight--medium text-spacing"><a href="">Start free trial</a><span class="la-btn__arrow-icon la-icon la-icon--7xl icon-grey-arrow"> </span></div>
            <div class="la-hero__bottom-browse la-btn__arrow la-btn__arrow-down text--burple text-uppercase text--md font-weight--medium text-spacing d-none d-lg-block"><a href="/browse/courses">BROWSE COURSES</a><span class="la-btn__arrow-icon arrow-down la-icon la-icon--7xl icon-grey-arrow"> </span></div>
          </div>
        </div>
        <!-- Row: End-->
      </div>
    </div>
  </section>
  <!-- Section: End-->
  <!-- Section: Start-->
  <section class="la-section la-section--grey la-section--art-categories position-relative">
    <div class="la-section__inner la-anim__wrap">
      <div class="container"><span class="la-section__cross-line"></span>
        <div class="la-courses">
          <nav class="la-courses__nav d-flex justify-content-between">
            <ul class="nav nav-pills la-courses__nav-tabs la-anim__stagger-x" id="nav-tab" role="tablist">
              @foreach ($categories as $category)
                <li class="nav-item la-courses__nav-item la-anim__stagger-item--x"><a class="nav-link la-courses__nav-link @if ($loop->first) active @endif " id="nav-{{$category->slug}}-tab" data-toggle="tab" href="#nav-{{$category->slug}}" role="tab" aria-controls="nav-{{$category->slug}}" aria-selected="true"> <span class="position-relative">{{ $category->title}}</span></a></li>
              @endforeach
              
              {{-- <li class="nav-item la-courses__nav-item"><a class="nav-link la-courses__nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"> <span class="position-relative">Rangoli</span></a></li>
              <li class="nav-item la-courses__nav-item"><a class="nav-link la-courses__nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false"> <span class="position-relative">Design</span></a></li> --}}
            </ul><a class="la-icon--3xl icon-filter la-courses__nav-filter d-none d-lg-block" id="filterCourses" role="button"></a>
          </nav>          
          <x-add-to-playlist 
                      :playlists="$playlists"
                    />

          <div class="tab-content la-courses__content" id="nav-tabContent">
            @foreach ($categories as $category)
              <div class="tab-pane fade show @if ($loop->first) active @endif" id="nav-{{$category->slug}}" role="tabpanel" aria-labelledby="nav-{{$category->slug}}-tab">
                <div class="row row-cols-lg-3">
                      @foreach($category->courses as $course)
                        @if ($course->featured == 0)
                            @continue
                        @endif
                        <x-course 
                            :id="$course->id"
                            :img="$course->preview_image"
                            :course="$course->title"
                            :url="$course->slug"
                            :rating="$course->review->avg('rating')"
                            :creatorImg="$course->user->user_img"
                            :creatorName="$course->user->fname"
                            :creatorUrl="$course->user->fname"
                          />
                      @endforeach

                </div>
              </div>
            @endforeach
            {{-- <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
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
            </div> --}}
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Section: End-->
  <!-- Section: Start-->
  <section class="la-section la-section--artists position-relative la-anim__wrap">
    <div class="la-section__inner">
      <span class="la-section__circle"></span>
      <div class="swiper-container gallery-top la-artist__slider container">

        <div class="col-md-12 la-artist__slider-col la-artist__designation position-absolute d-flex align-items-center justify-content-center la-anim__fade-in-top la-anim__A">
            <h2 class="la-section__title la-section__title--big">Alien <span style="color: var(--gray);"> MENTOR </span></h2>
        </div>

        <div class="swiper-wrapper">
        @foreach ($featuredMentor as $feat)
              <x-artist 
                :artistName="ucfirst($feat->user->fullName)"
                :artistImage="$feat->user_image"
                :artistCategory="$feat->courses->category->title"
                :artistCampany="$feat->courses->title"
                :course="$feat->courses"
                :artistId="$feat->user->id"
              />
        @endforeach

          <!-- <div class="swiper-slide la-artist__slider">
            <div class="row la-artist__slider-row">
              <div class="col-md-12 la-artist__slider-col la-artist__designation position-absolute d-flex align-items-center justify-content-center">
                <h2 class="la-section__title la-section__title--big">Alien <span style="color: var(--gray);"> MENTOR </span></h2>
              </div>
              <div class="col-md-6 la-artist__slider-col la-artist__slide-img">
                <div class="la-artist__img text-center"><img src="./images/learners/home/artist.png" alt=""></div>
              </div>
              <div class="col-md-6 la-artist__slider-col la-artist__slide-content d-flex flex-column justify-content-around align-items-end">
                <div class="la-artist__content-top d-flex flex-column align-items-end">
                  <div class="la-artist__name">Alton Crew</div>
                  <div class="la-btn__arrow text--burple text-uppercase text-spacing font-weight--bold"><a href="/creator">read about</a><span class="la-btn__arrow-icon la-icon la-icon--7xl icon-grey-arrow"></span></div>
                </div>
                <div class="la-artist__content-bottom d-flex flex-column align-items-end">
                  <div class="la-artist__specialist text-uppercase">TATTOO</div>
                  <div class="la-artist__company-name">Tribal Tattoo</div>
                  <div class="la-btn__arrow text--burple text-uppercase text-spacing font-weight--bold"><a href="">learn more</a><span class="la-btn__arrow-icon la-icon la-icon--7xl icon-grey-arrow"></span></div>
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
                  <div class="la-btn__arrow text--burple text-uppercase text-spacing font-weight--bold"><a href="/creator">read about</a><span class="la-btn__arrow-icon la-icon la-icon--7xl icon-grey-arrow"></span></div>
                </div>
                <div class="la-artist__content-bottom d-flex flex-column align-items-end">
                  <div class="la-artist__specialist text-uppercase">TATTOO</div>
                  <div class="la-artist__company-name">Tribal Tattoo</div>
                  <div class="la-btn__arrow text--burple text-uppercase text-spacing font-weight--bold"><a href="">learn more</a><span class="la-btn__arrow-icon la-icon la-icon--7xl icon-grey-arrow"></span></div>
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
                  <div class="la-btn__arrow text--burple text-uppercase text-spacing font-weight--bold"><a href="/creator">read about</a><span class="la-btn__arrow-icon la-icon la-icon--7xl icon-grey-arrow"></span></div>
                </div>
                <div class="la-artist__content-bottom d-flex flex-column align-items-end">
                  <div class="la-artist__specialist text-uppercase">TATTOO</div>
                  <div class="la-artist__company-name">Tribal Tattoo</div>
                  <div class="la-btn__arrow text--burple text-uppercase text-spacing font-weight--bold"><a href="">learn more</a><span class="la-btn__arrow-icon la-icon la-icon--7xl icon-grey-arrow"></span></div>
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
                  <div class="la-btn__arrow text--burple text-uppercase text-spacing font-weight--bold"><a href="/creator">read about</a><span class="la-btn__arrow-icon la-icon la-icon--7xl icon-grey-arrow"></span></div>
                </div>
                <div class="la-artist__content-bottom d-flex flex-column align-items-end">
                  <div class="la-artist__specialist text-uppercase">TATTOO</div>
                  <div class="la-artist__company-name">Tribal Tattoo</div>
                  <div class="la-btn__arrow text--burple text-uppercase text-spacing font-weight--bold"><a href="">learn more</a><span class="la-btn__arrow-icon la-icon la-icon--7xl icon-grey-arrow"></span></div>
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
                  <div class="la-btn__arrow text--burple text-uppercase text-spacing font-weight--bold"><a href="/creator">read about</a><span class="la-btn__arrow-icon la-icon la-icon--7xl icon-grey-arrow"></span></div>
                </div>
                <div class="la-artist__content-bottom d-flex flex-column align-items-end">
                  <div class="la-artist__specialist text-uppercase">TATTOO</div>
                  <div class="la-artist__company-name">Tribal Tattoo</div>
                  <div class="la-btn__arrow text--burple text-uppercase text-spacing font-weight--bold"><a href="">learn more</a><span class="la-btn__arrow-icon la-icon la-icon--7xl icon-grey-arrow"></span></div>
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
                  <div class="la-btn__arrow text--burple text-uppercase text-spacing font-weight--bold"><a href="/creator">read about</a><span class="la-btn__arrow-icon la-icon la-icon--7xl icon-grey-arrow"></span></div>
                </div>
                <div class="la-artist__content-bottom d-flex flex-column align-items-end">
                  <div class="la-artist__specialist text-uppercase">TATTOO</div>
                  <div class="la-artist__company-name">Tribal Tattoo</div>
                  <div class="la-btn__arrow text--burple text-uppercase text-spacing font-weight--bold"><a href="">learn more</a><span class="la-btn__arrow-icon la-icon la-icon--7xl icon-grey-arrow"></span></div>
                </div>
              </div>
            </div>
          </div> -->
        </div>
      </div>
      <div class="swiper-container gallery-thumbs la-artist__thumbnails-wrap la-anim__fade-in-right">
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
  <section class="la-section la-section--classes la-section--grey position-relative la-anim__wrap">
    <div class="la-section__inner">
      <div class="container">
        <h2 class="la-section__title la-section__title--big position-relative la-anim__fade-in-top la-anim__A">Master <span>classes</span></h2>
        <div class="la-mccourses py-4">
          <div class="row justify-content-center px-lg-5 la-anim__stagger la-anim__A">
           
              @foreach ($master_classes as $master)
                <x-master-class
                  :img="$master->courses->preview_image"
                  :title="$master->courses->title"
                  :profileImg="'https://picsum.photos/100/100'"
                  :profileName="$master->courses->user->fullName"
                  :learners="'300'"
                />
              @endforeach
             
          </div>
        </div>
        <div class="la-mccourse__view-more position-relative text-right la-anim__wrap">
          <div class=" la-btn__arrow text--burple text-uppercase text-spacing font-weight--bold pt-8 la-anim__fade-in-right">
            <a href="" >explore more</a><span class="la-btn__arrow-icon la-icon la-icon--7xl icon-grey-arrow"></span>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Section: End-->
  <!-- Section: Start-->
  <section class="la-section la-section--trail position-relative la-anim__wrap">
    <div class="la-section__inner">
      <span class="la-section__circle la-section__circle--right"></span>
      <div class="container">
       
        <div class="row">
          <div class="col-12 col-md-5 la-trail__left">
            <div class="la-trail__title la-trail__title-out la-trail__title--black la-section__title la-section__title--big position-absolute la-anim__text-move">Observe.</div>
            <div class="la-trail__img-wrap la-anim__fade-in-right la-anim__B">
              <div class="la-trail__img position-relative">
                <img class="w-100" src="./images/learners/home/observe.jpg" alt="observe">
              </div>
              <div class="la-trail__title la-trail__title-in la-trail__title--purple la-section__title la-section__title--big position-absolute la-anim__text-move la-anim__text-move--z1">Observe.</div>
            </div>
          </div>
          <div class="col-12 col-md-7 pl-md-0">
            <div class="la-trail__btn la-btn__plain d-flex justify-content-center la-anim__fade-in-left">
              <a href="">ALIENS WAY OF TEACHING</a>
            </div>
            <div class="la-trail__right d-flex align-items-end ">
              <div class="la-trail__content-wrap pr-md-20 la-anim__stagger">
                <div class="la-trail__para pb-10 pr-md-20 la-anim__stagger-item la-anim__B">We believe that real learning happens with consistency. With consistent observation, learning and practicing a particular skill repetitively makes you a Pro at it.</div>
                <a class="btn btn-primary la-btn la-btn--primary mt-md-10 la-anim__stagger-item la-anim__B" href="/learning-plans">Start free trail</a>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Section: End-->
  <!-- Section: Start-->
  <section class="la-section la-section--price la-anim__wrap la-anim__wrap-pin">
    <div class="la-section__inner ">
      <div class="container la-price__container">
        <h2 class="la-section__title la-section__title--big leading-none la-anim__pin"> <span style="color: var(--gray);">Learn it </span><br><span>like aliens</span></h2>
        <div class="la-price__slider la-anim__slider">
            <div class="la-price__slide la-anim__slide">
              <div class="la-price__row row mb-16">
                <div class="col-12 col-lg-5 pt-20">
                  <h3 class="la-section__subtitle">How does subscription works?</h3>
                  <p class="la-section__text">Through our Radical team, we strive everyday to make knowledge Affordable, Accessible for all the individuals who have limited or no access to the Real knowledge.<br><br>So, you can subscribe to all the courses and classes. Or rent them to learn whenever you want.</p>
                  <div class="la-btn__arrow text--burple text-uppercase text-spacing font-weight--bold pt-8">
                    <a href="/learning-plans">learn more<span class="la-icon la-icon--7xl icon-grey-arrow la-btn__arrow-icon"></span></a>
                  </div>
                </div>
                <div class="col-12 offset-lg-1 col-lg-5 pt-20 la-anim__slide-box">
                  <div class="la-price__box">
                    <div class="la-price__box-inner"><a href="/learning-plans" class="btn btn-primary la-btn la-btn--primary w-100">SUBSCRIBE NOW</a>
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
            <div class="la-price__slide la-anim__slide">
              <div class="la-price__row row mb-16">
                <div class="col-12 col-lg-5 pt-20">
                  <h3 class="la-section__subtitle">What’s LILA for you ?</h3>
                  <p class="la-section__text">Keep learning to expand your potential and make a mark in the world<br><br>Our mission is to Encourage, Empower and Embrace Self-Learning among all the curious individuals who wish to learn,</p>
                  <div class="la-btn__arrow text--burple text-uppercase text-spacing font-weight--bold pt-8">
                    <a href="/learning-plans">learn more<span class="la-icon la-icon--7xl icon-grey-arrow la-btn__arrow-icon"></span></a>
                  </div>
                </div>
                <div class="col-12 offset-lg-1 col-lg-5 pt-20 la-anim__slide-box">
                  <div class="la-price__box">
                    <div class="la-price__box-inner"><a  href="/learning-plans" class="btn btn-primary la-btn la-btn--primary w-100">SUBSCRIBE NOW</a>
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
            <div class="la-price__slide la-anim__slide">
              <div class="la-price__row row">
                <div class="col-12 col-lg-5 pt-20">
                  <h3 class="la-section__subtitle">How does subscription works?</h3>
                  <p class="la-section__text">Through our Radical team, we strive everyday to make knowledge Affordable, Accessible for all the individuals who have limited or no access to the Real knowledge.<br><br>So, you can subscribe to all the courses and classes. Or rent them to learn whenever you want.</p>
                  <div class="la-btn__arrow text--burple text-uppercase text-spacing font-weight--bold pt-8">
                    <a href="/learning-plans">learn more<span class="la-icon la-icon--7xl icon-grey-arrow la-btn__arrow-icon"></span></a>
                  </div>
                </div>
                <div class="col-12 offset-lg-1 col-lg-5 pt-20 la-anim__slide-box">
                  <div class="la-price__box">
                    <div class="la-price__box-inner"><a  href="/learning-plans" class="btn btn-primary la-btn la-btn--primary w-100">SUBSCRIBE NOW</a>
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
      </div>
    </div>
  </section>
  <!-- Section: End-->
  @endsection
  