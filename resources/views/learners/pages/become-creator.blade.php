@extends('learners.layouts.app')

@section('seo_content')
    <title> Become a Mentor | Become mentors and earn online sharing skills | Online art school</title>
    <meta name='description' itemprop='description' content='Looking for ways to earn sharing your skills? Join LILA, teach online, share your knowledge and start earning for your values. Join best online art school.' />

    <meta property="og:description" content="Looking for ways to earn sharing your skills? Join LILA, teach online, share your knowledge and start earning for your values. Join best online art school." />
    <meta property="og:title" content="Become a Mentor | Become mentors and earn online sharing skills | Online art school" />
    <meta property="og:url" content="{{Request::url()}}" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="LILA Art" />
    <meta property="og:image" content="{{config('app.url')}}/images/learners/logo.svg" />
    <meta property="og:image:url" content="{{config('app.url')}}/images/learners/logo.svg" />
    <meta property="og:image:size" content="300" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="Become a Mentor | Become mentors and earn online sharing skills | Online art school" />
    <meta name="twitter:site" content="@lilaaliens" />

    <script type="application/ld+json">{"@context":"https://schema.org","@type":"WebPage","name":" Become a Mentor | Become mentors and earn online sharing skills | Online art school"}</script>
@endsection

@section('content')

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
          
  <!-- Section: Start-->
  <section class="la-page--bcreator ">
    <div class="w-100 h-100">
      <div class="row la-anim__wrap">
        <!-- Column: Start-->
        <div class="col-12 col-sm-12 la-bcreator__banner " style="background:url('../images/learners/creator/bcreator-banner2.png') no-repeat bottom rgba(0, 0, 0, 0.5); background-size:cover;">
        <a class="la-bcreator__back-link position-absolute la-anim__stagger-item--x" href="{{URL::previous()}}"><span class="la-icon la-icon--5xl icon-back-arrow"></span></a>
        <div class="col-12  la-bcreator text-left">
            <div class="la-bcreator__content ">
              <strong class=" la-bcreator__title--mini  text-uppercase m-0 la-anim__fade-in-top">Design your own course!</strong>
              <h1 class="la-bcreator__title text-uppercase ml-n1 la-anim__stagger-item">Become <br class="d-block d-md-none" /> a Mentor</h1>
              <h6 class="la-bcreator__tag  leading-tight  la-anim__stagger-item--x ">Join LILA’s inspiring community, <br class="d-none d-md-block"/> share knowledge and start earning for your values</h6>
            </div>
            <div class="la-bcreator__content-btn la-anim__stagger-item--x"><a class="btn btn--primary la-btn__app text-white text-uppercase" role="button" href="/creator-signup">Start Teaching</a></div>
          </div>
        </div>
        <!-- Column: End-->
      </div>
    </div>

    <div class="container-fluid la-bcreator__banner-container la-anim__wrap">
      <div class="row la-bcreator__banner-btm py-5">
        <!-- Column: Start-->
        <div class="col-12 col-lg-4 py-5 py-sm-0">
          <div class="la-bcreator__left-text la-anim__stagger-item--x">
            <h4 class="la-bcreator__left-title pb-5">Make a difference, <br>Start Creating at LILA</h4>
            <p class="la-bcreator__left-para pt-3 pt-sm-8">
              We're on a mission to help hobbies flourish into something more than just a past time activity. Join us.
              Lead the movement. This is your chance to inspire 
              someone &#38; be the wind beneath their wings&#33;
            </p>
          </div>
        </div>
        <!-- Column: End-->
        <!-- Column: Start-->
        <div class="col-12 col-lg-8 pr-0 la-anim__stagger-item--x">
          <div class="la-mcard__slider-wrap ">
            <div class="swiper-container h-100 la-mcard__container">
              <div class="swiper-wrapper la-mcard__wrapper">                    
                    @foreach($testimonial as $t)
                    <div class="swiper-slide la-mcard__slider mb-12">
                      <div class="la-mcard__item">
                        <div class="la-mcard__info d-flex align-items-center">
                          <div class="li-mcard__prfle mr-4 mr-lg-10 la-anim__stagger-item--x">
                            <img class="rounded-circle d-block la-mcard__img lazy" src="{{ asset('images/testimonial/'.$t->image) }}" data-src="{{ asset('images/testimonial/'.$t->image) }}" alt="{{ $t->client_name }}" />
                          </div>
                          <div class="la-mcard__details my-2">
                            <div class="la-mcard__name text-lg text-lg-xl la-anim__stagger-item--x">{{ $t->client_name }}</div>
                            <div class="la-mcard__skill text-sm d-block d-lg-none la-anim__stagger-item--x">{{ ucfirst($t->type) }}</div>
                                <div class="la-lp__test-rating d-flex flex-row">
                                  @if($t->rating == 5)

                                      <div class="la-icon--lg icon-star la-rtng__fill"></div>
                                      <div class="la-icon--lg icon-star la-rtng__fill"></div>
                                      <div class="la-icon--lg icon-star la-rtng__fill"></div>
                                      <div class="la-icon--lg icon-star la-rtng__fill"></div>
                                      <div class="la-icon--lg icon-star la-rtng__fill"></div>

                                  @elseif($t->rating >= 4)

                                      <div class="la-icon--lg icon-star la-rtng__fill"></div>
                                      <div class="la-icon--lg icon-star la-rtng__fill"></div>
                                      <div class="la-icon--lg icon-star la-rtng__fill"></div>
                                      <div class="la-icon--lg icon-star la-rtng__fill"></div>
                                      <div class="la-icon--lg icon-star la-rtng__unfill"></div>

                                  @elseif($t->rating >= 3)

                                      <div class="la-icon--lg icon-star la-rtng__fill"></div>
                                      <div class="la-icon--lg icon-star la-rtng__fill"></div>
                                      <div class="la-icon--lg icon-star la-rtng__fill"></div>
                                      <div class="la-icon--lg icon-star la-rtng__unfill"></div>
                                      <div class="la-icon--lg icon-star la-rtng__unfill"></div>

                                  @elseif($t->rating >= 2)

                                      <div class="la-icon--lg icon-star la-rtng__fill"></div>
                                      <div class="la-icon--lg icon-star la-rtng__fill"></div>
                                      <div class="la-icon--lg icon-star la-rtng__unfill"></div>
                                      <div class="la-icon--lg icon-star la-rtng__unfill"></div>
                                      <div class="la-icon--lg icon-star la-rtng__unfill"></div>

                                  @elseif($t->rating >= 1)

                                      <div class="la-icon--lg icon-star la-rtng__fill"></div>
                                      <div class="la-icon--lg icon-star la-rtng__unfill"></div>
                                      <div class="la-icon--lg icon-star la-rtng__unfill"></div>
                                      <div class="la-icon--lg icon-star la-rtng__unfill"></div>
                                      <div class="la-icon--lg icon-star la-rtng__unfill"></div>

                                  @else

                                      <div class="la-icon--lg icon-star la-rtng__unfill"></div>
                                      <div class="la-icon--lg icon-star la-rtng__unfill"></div>
                                      <div class="la-icon--lg icon-star la-rtng__unfill"></div>
                                      <div class="la-icon--lg icon-star la-rtng__unfill"></div>
                                      <div class="la-icon--lg icon-star la-rtng__unfill"></div>

                                  @endif
                              </div>
                            
                            <div class="la-mcard__desc text-md d-none d-lg-block la-anim__stagger-item--x pt-2">{!! $t->details !!}</div>
                          </div>
                        </div>
                        <div class="la-mcard__desc d-block d-lg-none pt-3">
                          <div class="la-mcard__desc text-md la-anim__stagger-item--x">{!! $t->details !!}</div>
                        </div>
                      </div>
                    </div>
                    @endforeach
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
    <div class="container-fluid la-dashed__vline">
      <div class="row">
        <!-- Column: Start-->
        <div class="col-md-5 col-lg-5 py-5 py-sm-2 px-5 px-sm-2 d-flex flex-row align-items-center la-anim__wrap">
          <div class="mb-8 la-anim__stagger-item"><span class="la-vdotted__lft-tag text-xl text-md-2xl">Easy steps to start</span>
            <h2 class="la-vdotted__lft-title text-4xl text-lg-5xl la-anim__stagger-item">Sharing Values</h2><br>
            <a class="la-btn__app text-uppercase la-anim__stagger-item" role="button" href="/creator-signup">Start Teaching</a>
          </div>
        </div>
        <!-- Column: End-->
        <!-- Column: Start-->
        <div class="col-md-6 col-lg-6 px-4 px-sm-0 py-8 py-sm-0 ml-6 la-vdot__class ">
          <div class="la-vdotted__bar position-relative pl-4">
            <div class="la-vicon d-flex align-items-start la-anim__wrap">
              <div class="la-icon__vline la-anim__stagger-item"><span class="la-icon la-icon--7xl icon-video-unfilled position-absolute "></span></div>
              <div class="la-vicon__text">
                <h5 class="la-vicon__title la-anim__stagger-item">Record a Video</h5>
                <p class="la-vicon__desc pt-2 la-anim__stagger-item">Classify and videotape the course of your expertise as classes for better understanding</p>
                <a class="la-vicon__link text-uppercase position-absolute la-anim__stagger-item" href="/guided-mentor">Need Assistance<span class="la-vicon__arrow la-icon la-icon--5xl icon-grey-arrow"></span></a>
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
    <div class="container-fluid">
      <div class="row">
        <!-- Column: Start-->
        <div class="col-sm-12" id="how_you_earn">
          <div class="la-earn__blog la-anim__wrap">
            <h3 class="la-earn__blog-title la-anim__stagger-item text-3xl text-lg-5xl" >How you earn?</h3>
            <img class="img-fluid mx-auto d-block la-anim__stagger-item--x lazy" src="../images/learners/creator/earn.svg" data-src="../images/learners/creator/earn.svg" alt="How you Earn?" />
          </div>
        </div>
        <!-- Column: End-->
      </div>
    </div>
    
    <div class="container-fluid la-bcreator--calc-wrapper la-section__small">
      <div class="container">
        <div class="row ">
          <!-- Column: Start-->
          <div class="col-lg-8 offset-lg-2 la-anim__wrap py-8">
              <h6 class="la-bcreator__calc-title text-center text-xl text-md-2xl pb-md-6 la-anim__stagger-item">How do we calculate your earnings?</h6>
              
              <div class="pt-10 pt-md-8 la-bcreator__calc-inner d-flex justify-content-between align-items-start flex-wrap">
                  <div class="la-bcreator__calc-itm  la-anim__stagger-item--x">
                      <div class="mb-2">Per Play Cost<sub class="text-4xl">*</sub></div>
                      <div class="text-center text-lg" style="color:#1EC812;">$ xxx</div>
                  </div>
                  <div class="la-bcreator-calcs text-3xl text-md-5xl  la-anim__stagger-item--x mt-5" style="color:var(--gray6);">&#215;</div>
                  <div class="la-bcreator__calc-itm la-anim__stagger-item--x">
                      <div class="mb-2">Channel Plays</div>
                      <div class="text-center text-lg" style="color:#1EC812;">xxx</div>
                  </div>
                  <div class="la-bcreator-calcs text-3xl text-md-5xl  la-anim__stagger-item--x  mt-5" style="color:var(--gray6);">&#x3d;</div>
                  <div class="la-bcreator__calc-itm  la-anim__stagger-item--x">
                      <div class="mb-2">Mentor's Revenue</div>
                      <div class="text-center text-lg" style="color:#1EC812;">$ xxx</div>
                  </div>
              </div>

              <div class="pt-6 pt-md-8 la-bcreator__calc-inner text-center">
                  <div class="la-bcreator__calc-itm text-sm la-anim__stagger-item--x">
                      <span><sub class="text-3xl">*</sub> Per Play Cost</span>
                      <span class="text-xl px-2">&#x3d;</span>
                      <span>(Revenue &#x2212; Tax)</span>
                      <span>/</span>
                      <span>Total Number of Plays</span>
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
    <div class="container-fluid my-5 ">
      <div class="row">
        <!-- Column: Start-->
        <div class="col-sm-12 col-md-5">
          <div class="la-bcreator__reach-main pb-10 pb-sm-4 la-anim__wrap">
            <span class="la-bcreator__reach-tag la-anim__stagger-item">LILA&#39;s </span><br>
            <h3 class="la-bcreator__reach-title la-anim__stagger-item--x">Reach</h3>
          </div>
        </div>
        <!-- Column: End-->
        <!-- Column: Start-->
        <div class="col col-sm-4 col-md-2 my-auto">
          <div class="la-bcreator__stats">
            <div class="la-bcreator__stats-item la-anim__wrap">
              <h4 class="la-bcreator__stats-count m-0 la-anim__stagger-item">150 &#43;</h4>
              <p class="la-bcreator__stats-desc  text-uppercase la-anim__stagger-item">Learners</p>
            </div>
          </div>
        </div>
        <!-- Column: End-->
        <!-- Column: Start-->
        <div class="col col-sm-4 col-md-2 my-auto">   
          <div class="la-bcreator__stats-item la-anim__wrap">
            <h4 class="la-bcreator__stats-count m-0 la-anim__stagger-item">60 &#43;</h4>
            <p class="la-bcreator__stats-desc text-uppercase la-anim__stagger-item">Courses</p>
          </div>
        </div>
        <!-- Column: End-->
        <!-- Column: Start-->
        <div class="col col-sm-4 col-md-2 my-auto">
          <div class="la-bcreator__stats-item la-anim__wrap">
            <h4 class="la-bcreator__stats-count m-0 la-anim__stagger-item">15 &#43;</h4>
            <p class="la-bcreator__stats-desc text-uppercase la-anim__stagger-item">Countries</p>
          </div>
        </div>
        <!-- Column: End-->
        <!-- Column: Start-->
        <div class="col col-sm-12 col-md-1"></div>
        <!-- Column: End-->
      </div>
      <div class="row d-flex justify-content-center">
        <!-- Column: Start-->
        <div class="col-12 mt-2 mt-md-10 text-center la-anim__wrap">
          <div class="la-bcreator__stats-btn  d-none d-sm-block la-anim__stagger-item">
            <a class="btn-get__started la-btn__app text-uppercase" role="button" href="/creator-signup">Start Teaching</a>
          </div>
          <!-- For Mobile-->
          <div class="la-bcreator__stats-btn text-center d-block d-sm-none la-anim__stagger-item">
            <a class="btn-get__started la-btn__app btn-block px-5 text-uppercase" role="button" href="/creator-signup">Start Teaching</a>
          </div>
        </div>
        <!-- Column: End-->
      </div>
    </div>
  </section>
  <!-- Section: End-->
  <!-- Section: Start-->
  <section class="la-bcreator--benefits ">
    <div class="container-fluid">
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
          <div class="la-bcreator__benefits-card la-anim__stagger-item--x">
              <span class="la-bcreator__benefits-icon la-icon la-icon--7xl icon-earnings-image ml-md-n4 la-anim__stagger-item"></span>
              <h5 class="la-bcreator__benefits-title pt-3 pt-sm-5 mb-0 la-anim__stagger-item">Earnings</h5>
              <p class="la-bcreator__benefits-para pt-3 la-anim__stagger-item">Make a living, earn values all while sharing with the world, what you are best at</p>
          </div>
        </div>
        <!-- Column: End-->
        <!-- Column: Start-->
        <div class="col-md-6 col-lg-4 text-center la-anim__wrap">
          <div class="la-bcreator__benefits-card  la-anim__stagger-item--x">
              <span class="la-bcreator__benefits-icon la-icon la-icon--8xl icon-recognition-image ml-md-n4 mt-md-1 la-anim__stagger-item"></span>
              <h5 class="la-bcreator__benefits-title  pt-3 pt-sm-5 mb-0  la-anim__stagger-item">Recognition</h5>
              <p class="la-bcreator__benefits-para pt-3 la-anim__stagger-item">With students from all parts of the world, become a household name in the art of your expertise</p>
          </div>
        </div>
        <!-- Column: End-->
        <!-- Column: Start-->
        <div class="col-md-12 col-lg-4 text-center la-anim__wrap">
          <div class="la-bcreator__benefits-card  la-anim__stagger-item--x">
              <span class="la-bcreator__benefits-icon la-icon la-icon--8xl icon-inspire-image ml-md-n4 la-anim__stagger-item"></span>
              <h5 class="la-bcreator__benefits-title  pt-3 pt-sm-5 mb-0 la-anim__stagger-item">Inspire Students</h5>
              <p class="la-bcreator__benefits-para pt-3 la-anim__stagger-item">Help people realize their potential and bring out the true artist in them</p>
          </div>
        </div>
        <!-- Column: End-->
      </div>
    </div>
  </section>
  <!-- Section: End-->

  <!-- Section: Start-->
  <section class="la-bgcreator--ad-banner ">
    <div class="w-100 h-100">
      <div class="row  la-anim__wrap">
        <!-- Column: Start-->
        <div class="col-12 la-anim__stagger-item">
          <div class="la-bgcreator__ad-content text-center text-white" style="background:url('../images/learners/creator/become-cta.jpg') no-repeat center rgba(0, 0, 0, 0.65); background-size:cover;">
            <div class="col-12 px-0 px-md-8">
              <p class="la-bgcreator__ad-para la-anim__stagger-item">Broaden your reach! Help students hone their skills through your courses</p>
              
              <div class="pt-10">
                <p class="mb-6"><a class=" la-btn__app text-white text-uppercase la-anim__stagger-item" role="button" href="/creator-signup">Start Teaching</a></p>
                <a class="la-arrow-link text-uppercase position-relative la-anim__stagger-item" href="/guided-mentor"> Learn More
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
    <div class="container-fluid">
      <div class="row">
        <!-- Column: Start-->
        <div class="col-12 px-3 px-sm-0 la-anim__wrap">
          <div class="panel-group" id="accordion">
            <h4 class="la-bgcreator__faq-title la-anim__stagger-item">FAQs</h4>

              @foreach($faqs->take(3) as $f)
                <div class="panel panel-default la-bgcreator__faq-panel la-anim__stagger-item">
                  <div class="panel-heading la-bgcreator__panel-head" id="faqCalcHead">
                    <div class="panel-title la-bgcreator__panel-title"><a class="accordion-toggle collapsed text-md" href="#faq_{{ $f->id }}" data-toggle="collapse" aria-expanded="true" aria-controls="#faq_{{ $f->id }}">{{ $f->title }}</a></div>
                  </div>
                  <div class="panel-collapse collapse" id="faq_{{ $f->id }}" aria-labelledby="faqCalcHead" data-parent="#accordion">
                    <div class="panel-body la-bgcreator__panel-body">
                      <div class="la-bgcreator__panel-para panel-text text-md">{!! $f->details !!}</div>
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