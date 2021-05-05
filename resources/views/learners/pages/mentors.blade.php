@extends('learners.layouts.app')

@section('seo_content')
    <title>Mentors  | Learn Tattoo & Graphic Design | LILA</title>
    <meta name='description' itemprop='description' content='Check out about your mentor.Learn about them how they carved there niche in the world of Tattoo design .Join LILA & enhance your skills with these online classes.' />

    <meta property="og:description" content="Check out about your mentor.Learn about them how they carved there niche in the world of Tattoo design .Join LILA & enhance your skills with these online classes." />
    <meta property="og:title" content="Mentors | Learn Tattoo & Graphic Design | LILA" />
    <meta property="og:url" content="{{Request::url()}}" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="LILA Art" />
    <meta property="og:image" content="{{config('app.url')}}/images/learners/logo.svg" />
    <meta property="og:image:url" content="{{config('app.url')}}/images/learners/logo.svg" />
    <meta property="og:image:size" content="300" />

    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="Mentors | Learn Tattoo & Graphic Design | LILA" />
    <meta name="twitter:site" content="@lilaaliens" />
    
    <script type="application/ld+json">{"@context":"https://schema.org","@type":"WebPage","name":"Mentors | Learn Tattoo & Graphic Design | LILA"}</script>
@endsection

@section('content')
<section class="la-section__small la-cbg--main  ">
    <div class="la-section__inner">
      <div class="container-fluid la-anim__wrap">
      <a class="la-icon la-icon--5xl icon-back-arrow d-block d-md-none mt-n4 ml-n1 mb-2 la-anim__stagger-item" href="{{URL::previous()}}"></a>
        <div class="d-md-flex justify-content-between align-items-center">
          <h1 class="la-page__title mb-4 mb-md-8 la-anim__stagger-item">Alien Mentors</h1>

          <!-- Global Search: Start-->
          <div class="la-gsearch la-anim__stagger-item--x">
            <form class="form-inline" action="/search-mentor" method="get">
              <div class="form-group d-flex align-items-center mb-0">
                <input class="la-gsearch__input w-100 form-control la-gsearch__input-browsecourses" name="name" type="text" style="background:transparent" placeholder="Looking for your favourite Alien Mentor?">
              </div>
              <button class="la-gsearch__submit btn" type="submit"><i class="la-icon icon-search la-gsearch__input-icon"></i></button>
            </form>
          </div>
          <!-- Global Search: End-->
        </div>

        <div class="la-mentors ">
          <div class="row la-anim__wrap pt-4 pt-lg-10">
              
                @foreach($mentors as $mentor)
                    <x-mentor :img="$mentor->user_img" :id="$mentor->id" :name="$mentor->fname.' '.$mentor->lname" :skill="$mentor->skill" />
                @endforeach
             
            </div>
        </div>
      </div>
    </div>
  </section>
@endsection
@section('footerScripts')
  <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
@endsection