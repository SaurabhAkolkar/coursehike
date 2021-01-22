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
              <div class="la-hero__actions d-md-flex align-items-center la-anim__stagger-item">
                <div class="col-md-7 px-0">
                    <a href="/learning-plans" class="btn btn-primary la-btn la-btn--primary d-none d-lg-block">Subscribe Now</a>
                    <a href="/learning-plans" class="btn btn-primary la-btn la-btn--primary btn-block d-block d-lg-none">Subscribe Now</a>
                    <p class="m-0 pt-1 pl-1 text-center text-md-left">Instant access to all courses at nominal monthly fees</p>
                </div>
                <div class="col-md-5 px-0 la-soffer d-flex d-lg-block justify-content-center  mb-lg-auto">
                  <div class="la-soffer__bestprice"> <sup><small>$</small></sup>  39 / Month</div>
                  <div class="la-soffer__realprice"> <sup><small>$</small></sup>  99 (USD)</div>
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
          <div class="la-hero__bottom d-flex justify-content-center justify-content-lg-between align-items-center  pb-14 la-anim__fade-in">
            <div class="la-hero__bottom-trial la-btn__arrow text--green text-uppercase text--md font-weight--medium text-spacing"><a href="/login">Start free trial</a><span class="la-btn__arrow-icon la-icon la-icon--7xl icon-grey-arrow"> </span></div>
            <div class="la-hero__bottom-browse la-btn__arrow la-btn__arrow-down text--burple text-uppercase text--md font-weight--medium text-spacing d-none d-lg-block"><a href="#home_courses">BROWSE COURSES</a><span class="la-btn__arrow-icon arrow-down la-icon la-icon--7xl icon-grey-arrow"> </span></div>
          </div>
        </div>
        <!-- Row: End-->
      </div>
    </div>
  </section>
  <!-- Section: End-->
  <!-- Section: Start-->
  <section class="la-section la-section--grey la-section--art-categories position-relative"  id="home_courses">
    <div class="la-section__inner la-anim__wrap" >
      <div class="container"><span class="la-section__cross-line"></span>
        <div class="la-courses">
          <nav class="la-courses__nav d-flex justify-content-between">
            <ul class="nav nav-pills la-courses__nav-tabs la-anim__stagger-x" id="nav-tab" role="tablist">
              @foreach ($categories as $category)
                <li class="nav-item la-courses__nav-item la-anim__stagger-item--x">
                  <a class="nav-link la-courses__nav-link @if ($loop->first) active @endif " id="nav-{{$category->slug}}-tab" data-toggle="tab" href="#nav-{{$category->slug}}" role="tab" aria-controls="nav-{{$category->slug}}" aria-selected="true"> 
                    <span class="position-relative">{{ $category->title}}</span>
                  </a>
                </li>
              @endforeach
              
              {{-- <li class="nav-item la-courses__nav-item"><a class="nav-link la-courses__nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"> <span class="position-relative">Rangoli</span></a></li>
              <li class="nav-item la-courses__nav-item"><a class="nav-link la-courses__nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false"> <span class="position-relative">Design</span></a></li> --}}
            </ul>
            <!-- Filters : Start -->
            <div class="la-courses__nav-filters mt-2">
              <div class="la-courses__nav-props">
                <a class="la-icon icon-list-layout la-courses__nav-filter mr-3" id="showLayout" role="button"></a>
              </div>
              <div class="la-courses__nav-props">
                <a class="la-icon icon-sort la-courses__nav-filter  mr-3" id="sortCourses" data-toggle="dropdown" href="javascript:void(0);" role="button"></a>
                <!-- Sort Courses Dropdown -->
                <div class="dropdown-menu dropdown-menu-right la-header__dropdown-menu" aria-labelledby="sortCourses"  style="border:none !important;">
                  <div class="la-form__input-wrap px-5">
                      <div class="la-form__lable la-form__lable--medium mb-2 text-md pt-2 text-dark">Sort by</div>
                      <div class=" pt-2">
                          <div class="la-form__radio-wrap mr-5">
                                <input class="la-form__radio d-none" type="radio" value="most_popular" name="sort_by" id="most_popular">
                                <label class="d-flex align-items-center text-sm" for="most_popular"><span class="la-form__radio-circle d-flex justify-content-center align-items-center mr-2"></span><span>Most Popular</span></label>
                          </div>
                          <div class="la-form__radio-wrap mr-5">
                              <input class="la-form__radio d-none" type="radio" value="highest_rated" name="sort_by" id="highest_rated">
                              <label class="d-flex align-items-center text-sm" for="highest_rated"><span class="la-form__radio-circle d-flex justify-content-center align-items-center mr-2"></span><span>Highest Rated</span></label>
                          </div>
                          <div class="la-form__radio-wrap mr-5">
                              <input class="la-form__radio d-none" type="radio" value="latest" name="sort_by" id="latest">
                              <label class="d-flex align-items-center text-sm" for="latest"><span class="la-form__radio-circle d-flex justify-content-center align-items-center mr-2"></span><span>Latest</span></label>
                          </div>
                      </div>
                  </div>
                </div>
              </div>

              <div class="la-courses__nav-filterprops">
              <a class="la-icon icon-filter la-courses__nav-filter " id="filteredCourses"  role="button"></a>
                <!-- Filter Courses Dropdown -->
                <div class="la-courses__nav-filterdropdown" id="filtered_sidebar">
                    <div class="la-form__input-wrap px-5">
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="la-form__lable la-form__lable--medium mb-2 text-md pt-3 text-dark">Filter by</div>
                        <button class="la-courses__nav-filterclose close text-4xl mt-1" type="button" id="filter_close">&times;</button>
                      </div>
                      <from action="" method="">
                        <div class="form-group pt-2">
                          <label class="glabel-main" > Course Duration</label>
                          <label class="glabel d-flex" for="dur_hr">
                            <input class="d-none" id="dur_hr" type="checkbox" name=""><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                            <div class="pl-2 mt-n1">less than an hr</div>
                          </label>

                          <label class="glabel d-flex" for="dur_hrs">
                            <input class="d-none" id="dur_hrs" type="checkbox" name=""><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                            <div class="pl-2 mt-n1">1 hr - 5 hr</div>
                          </label>

                          <label class="glabel d-flex" for="dur_more">
                            <input class="d-none" id="dur_more" type="checkbox" name=""><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                            <div class="pl-2 mt-n1">more than 5 hrs</div>
                          </label>
                        </div>

                        <div class="form-group pt-2">
                          <label class="glabel-main" > Category</label>
                          <label class="glabel d-flex" for="course_1">
                            <input class="d-none" id="course_1" type="checkbox" name=""><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                            <div class="pl-2 mt-n1">Tattoo</div>
                          </label>

                          <label class="glabel d-flex" for="course_2">
                            <input class="d-none" id="course_2" type="checkbox" name=""><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                            <div class="pl-2 mt-n1">Design</div>
                          </label>

                          <label class="glabel d-flex" for="course_3">
                            <input class="d-none" id="course_3" type="checkbox" name=""><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                            <div class="pl-2 mt-n1">Photography</div>
                          </label>
                        </div>

                        <div class="form-group pt-2">
                          <label class="glabel-main" > Language</label>
                          <label class="glabel d-flex" for="lang_1">
                            <input class="d-none" id="lang_1" type="checkbox" name=""><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                            <div class="pl-2 mt-n1">English</div>
                          </label>

                          <label class="glabel d-flex" for="lang_2">
                            <input class="d-none" id="lang_2" type="checkbox" name=""><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                            <div class="pl-2 mt-n1">Hindi</div>
                          </label>

                          <label class="glabel d-flex" for="lang_3">
                            <input class="d-none" id="lang_3" type="checkbox" name=""><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                            <div class="pl-2 mt-n1">Japanese</div>
                          </label>
                        </div>

                        <div class="form-group pt-2">
                          <label class="glabel-main" >Level</label>
                          <label class="glabel d-flex" for="level_1">
                            <input class="d-none" id="level_1" type="checkbox" name=""><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                            <div class="pl-2 mt-n1">Beginner</div>
                          </label>

                          <label class="glabel d-flex" for="level_2">
                            <input class="d-none" id="level_2" type="checkbox" name=""><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                            <div class="pl-2 mt-n1">Intermediate</div>
                          </label>

                          <label class="glabel d-flex" for="level_3">
                            <input class="d-none" id="level_3" type="checkbox" name=""><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                            <div class="pl-2 mt-n1">Advanced</div>
                          </label>
                        </div>

                        <button onclick="" class="la-btn la-btn__secondary bg-transparent text-uppercase text-center py-3 mt-5">Apply</button> 
                      </form>
                    </div>
                </div>
              </div>
            </div>
            <!-- Filters : End -->
          </nav>          
          <x-add-to-playlist 
              :playlists="$playlists"
          />

          <div class="tab-content la-courses__content" id="nav-tabContent">
            @foreach ($categories as $category)
              <div class="tab-pane fade show @if ($loop->first) active @endif" id="nav-{{$category->slug}}" role="tabpanel" aria-labelledby="nav-{{$category->slug}}-tab">
                <div class="row row-cols-md-2 row-cols-lg-3">
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
                            :learnerCount="$course->learnerCount"
                          />
                      @endforeach

                </div>
              </div>
            @endforeach
            {{-- <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
              <div class="row row-cols-md-2 row-cols-lg-3">
                            
                    @foreach($tattoos as $tattoo)
                    <x-course 
                        :img="$tattoo->img" 
                        :course="$tattoo->course" 
                        :url="$tattoo->url" 
                        :rating="$tattoo->rating"
                        :creatorImg="$tattoo->creatorImg"
                        :creatorName="$tattoo->creatorName"
                        :creatorUrl="$tattoo->creatorUrl"
                        :learnerCount="$tattoo->learnerCount"
                      />
                  @endforeach

              </div>
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
              <div class="row row-cols-md-2 row-cols-lg-3">
                     
                    @foreach($tattoos as $tattoo)
                      <x-course 
                          :img="$tattoo->img" 
                          :course="$tattoo->course" 
                          :url="$tattoo->url" 
                          :rating="$tattoo->rating"
                          :creatorImg="$tattoo->creatorImg"
                          :creatorName="$tattoo->creatorName"
                          :creatorUrl="$tattoo->creatorUrl"
                          :learnerCount="$tattoo->learnerCount"
                        />
                    @endforeach
              </div>
            </div>
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
              <div class="row row-cols-md-2 row-cols-lg-3">
                              
                    @foreach($tattoos as $tattoo)
                    <x-course 
                        :img="$tattoo->img" 
                        :course="$tattoo->course" 
                        :url="$tattoo->url" 
                        :rating="$tattoo->rating"
                        :creatorImg="$tattoo->creatorImg"
                        :creatorName="$tattoo->creatorName"
                        :creatorUrl="$tattoo->creatorUrl"
                        :learnerCount="$tattoo->learnerCount"
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
        <div class="la-mccourses pt-14 pt-md-4">
          <div class="row justify-content-center px-lg-5 la-anim__stagger la-anim__A">
           
              @foreach ($master_classes as $master)
                <x-master-class
                  :img="$master->courses->preview_image"
                  :title="$master->courses->title"
                  :profileImg="'https://picsum.photos/100/100'"
                  :profileName="$master->courses->user->fullName"
                  :learners="'300'"
                  :id="$master->courses->id"
                  :slug="$master->courses->slug"
                />
              @endforeach
             
          </div>
        </div>
        <div class="la-mccourse__view-more position-relative text-right la-anim__wrap">
          <div class=" la-btn__arrow text--burple text-uppercase text-spacing font-weight--bold pt-md-8 mr-5 mr-md-1 la-anim__fade-in-right">
            <a href="/master-classes" >explore more</a><span class="la-btn__arrow-icon la-icon la-icon--7xl icon-grey-arrow"></span>
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
              <a href="" class="d-none d-md-block">ALIENS WAY OF TEACHING</a>
            </div>
            <div class="la-trail__right d-flex align-items-end ">
              <div class="la-trail__content-wrap pr-md-20 la-anim__stagger">
                <div class="la-trail__para pb-10 pr-md-20 la-anim__stagger-item la-anim__B">We strongly believe observation is integral to honing art. Learn from masters in their respective fields with consistent practice, and become a pro yourself!</div>
                <a class="btn btn-primary la-btn la-btn--primary mt-md-10 la-anim__stagger-item la-anim__B" href="/login">Start free trail</a>
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
                  <p class="la-section__text">Learning need not be expensive. At LILA, our subscription model gives you the benefit to choose from any number of courses or individual classes, as you please.<br/><br/> All at nominal fees! So, learn away! </p>
                  <div class="la-btn__arrow text--burple text-uppercase text-spacing font-weight--bold pt-8">
                    <a href="/learning-plans">learn more<span class="la-icon la-icon--7xl icon-grey-arrow la-btn__arrow-icon"></span></a>
                  </div>
                </div>
                <div class="col-12 offset-lg-1 col-lg-5 pt-20  ">
                  <div class="la-anim__wrap la-anim__wrap-pin2">
                  <div class="la-price__box la-anim__pin2 ">
                    <div class="la-price__box-inner "><a href="/learning-plans" class="btn btn-primary la-btn la-btn--primary w-100">SUBSCRIBE NOW</a>
                      <p class="la-price__box-para mt-8 mb-2">Get <span class="la-color--primary">35% savings </span>on Annual Plan</p>
                      <div class="la-price__box-soffer la-soffer ml-0">
                        <div class="la-soffer__bestprice la-soffer__bestprice--black"> <sup><small>$</small></sup>  39 / Month</div>
                        <div class="la-soffer__realprice"> <sup><small>$</small></sup>  99 (USD) </div>
                      </div>
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
                  <p class="la-section__text">Our mission is to Encourage, Empower and Embrace self-learning among all curious individuals who wish to learn, expand their potential and make a mark in the world.<br/><br/> 
                      Through our Radical team, we strive every day to make knowledge Affordable, Accessible for everyone regardless of who or where they are
                  </p>
                  <div class="la-btn__arrow text--burple text-uppercase text-spacing font-weight--bold pt-8">
                    <a href="/about">learn more<span class="la-icon la-icon--7xl icon-grey-arrow la-btn__arrow-icon"></span></a>
                  </div>
                </div>
                <!--<div class="col-12 offset-lg-1 col-lg-5 pt-20 la-anim__slide-box ">
                  <div class="la-price__box ">
                    <div class="la-price__box-inner"><a  href="/learning-plans" class="btn btn-primary la-btn la-btn--primary w-100">SUBSCRIBE NOW</a>
                      <p class="la-price__box-para mt-8 mb-2">Get <span class="la-color--primary">20% savings </span>on Annual Plan</p>
                      <div class="la-price__box-soffer la-soffer ml-0">
                        <div class="la-soffer__bestprice la-soffer__bestprice--black"> <sup><small>$</small></sup>  39 / Month</div>
                        <div class="la-soffer__realprice"> <sup><small>$</small></sup>  49 / Month</div>
                      </div>
                    </div>
                  </div>
                </div> -->
              </div>
            </div>
            <!-- <div class="la-price__slide la-anim__slide">
              <div class="la-price__row row">
                <div class="col-12 col-lg-5 py-10 pt-md-20">
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
            </div> -->
        </div>
      </div>
    </div>
  </section>
  <!-- Section: End-->
  @endsection
  