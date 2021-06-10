@extends('learners.layouts.app')

@section('seo_content')
    <title> Referrals | Learn Tattoo & Graphic Design | LILA </title>
    <meta name='description' itemprop='description' content='Check out your Profile & keep a track on your subscribed courses.Join LILA & enhance your skills with these online classes.' />

    <meta property="og:description" content="Check out your Profile & keep a track on your subscribed courses.Join LILA & enhance your skills with these online classes." />
    <meta property="og:title" content="Referrals | Learn Tattoo & Graphic Design | LILA" />
    <meta property="og:url" content="{{Request::url()}}" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="LILA Art" />
    <meta property="og:image" content="{{config('app.url')}}/images/learners/logo.svg" />
    <meta property="og:image:url" content="{{config('app.url')}}/images/learners/logo.svg" />
    <meta property="og:image:size" content="300" />

    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="Referrals | Learn Tattoo & Graphic Design | LILA" />
    <meta name="twitter:site" content="@lilaaliens" />

    <script type="application/ld+json">{"@context":"https://schema.org","@type":"WebPage","name":"Referrals | Learn Tattoo & Graphic Design | LILA"}</script>
@endsection

@section('content')

<div class="la-profile">
    <div class="la-profile__wrap">
    
    <!-- Side Navbar : Start -->
    @include ('learners.pages.sidebar')
    <!-- Side Navbar: End --> 

        <div class="la-profile__main">
            <div class="container la-anim__wrap">
                <div class="la-profile__main-inner pb-20">
                    <div class="la-profile__title-wrap la-anim__stagger-item">
                        <a class="la-icon la-icon--5xl icon-back-arrow d-block d-md-none ml-n1 mt-n2 mb-3" href="{{URL::previous()}}"></a>
                        <h1 class="la-profile__title m-0">Referrals</h1>
                    </div>

                    <div class="row la-refer__section">
                        <div class="col-md-10 col-lg-8 col-xl-6 la-refer__inner">
                            <form class="la-refer__form">
                                <div class="la-refer__card la-anim__stagger-item">
                                    <h5 class="la-refer__card-title">Refer your friends to get one month free access!</h5>

                                    <div class="form-group">
                                        <label class="la-form__lable la-refer__card-label mb-1" for="referral_code">Referral Code</label>
                                        <div class="input-group">
                                            <input type="text" class="la-form__input la-form__input-border form-control text-sm" id="referral_code" name="referral_code" value="JS0987yu" />
                                            <div class="input-group-append">
                                                <button class="input-group-btn btn btn-outline-light bg-transparent la-form__input-btn" type="button" style="color:var(--gray3);">
                                                    <span class="la-icon la-icon--md icon-copy-clipboard"></span>
                                                </button>
                                            </div>
                                        </div>                                            
                                    </div>

                                    <div class="form-group">
                                        <label class="la-form__lable la-refer__card-label mb-1" for="referral_link">Referral Link</label>
                                        <div class="input-group">
                                            <input type="text" class="la-form__input la-form__input-border form-control text-sm" id="referral_link" name="referral_link" value="https://lila.art/referral/JS0987yu" />
                                            <div class="input-group-append">
                                                <button class="input-group-btn btn btn-outline-light bg-transparent la-form__input-btn" type="button" style="color:var(--gray3);">
                                                    <span class="la-icon la-icon--md icon-portfolio-link"></span>
                                                </button>
                                            </div>
                                        </div>                                            
                                    </div>

                                    <div class="la-refer__share mt-7">
                                        <h6 class="la-refer__share-title mb-2">Share on Social Media</h6>
                                            
                                        <a href="" role="button">
                                            <span class="la-icon la-icon--4xl icon-whatsapp"></span>
                                        </a>
                                        <a href="" role="button">
                                            <span class="la-icon la-icon--4xl icon-facebook-colored"></span>
                                        </a>
                                        <a href="" role="button">
                                            <span class="la-icon la-icon--4xl icon-linkedin-colored"></span>
                                        </a>
                                        <a href="" role="button">
                                            <span class="la-icon la-icon--4xl icon-twitter"></span>
                                        </a>
                                        <a href="" role="button">
                                            <span class="la-icon la-icon--4xl icon-pinterest"></span>
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="row mt-8">
                        <div class="col-md-5 col-lg-4 col-xl-3 mb-8">
                            <div class="la-refer__card la-anim__stagger-item">
                                <div class="la-refer__status-icon">
                                    <span class="la-icon la-icon--4xl icon-birthday"></span>
                                </div>
                                <h4 class="la-refer__status-info">Free Months left</h4>
                                <h2 class="la-refer__status-count">4</h2>
                            </div>
                        </div>

                        <div class="col-md-5 col-lg-4 col-xl-3">
                            <div class="la-refer__card la-anim__stagger-item">
                                <div class="la-refer__status-icon">
                                    <span class="la-icon la-icon--4xl icon-referral"></span>
                                </div>
                                <h4 class="la-refer__status-info">Total Referred Users</h4>
                                <h3 class="la-refer__status-count">5</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection