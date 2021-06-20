@extends('learners.layouts.app')

@section('seo_content')
    <title> Search Mentors | Learn Tattoo & Graphic Design | LILA </title>
    <meta name='description' itemprop='description' content='Search Mentors who teach on LILA Platform on tattoo, graphic design, digital art .Join LILA & enhance your skills with these online classes.' />

    <meta property="og:description" content="Search Mentors who teach on LILA Platform on tattoo, graphic design, digital art .Join LILA & enhance your skills with these online classes." />
    <meta property="og:title" content="Search Mentors | Learn Tattoo & Graphic Design | LILA" />
    <meta property="og:url" content="{{Request::url()}}" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="LILA Art" />
    <meta property="og:image" content="{{config('app.url')}}/images/learners/logo.svg" />
    <meta property="og:image:url" content="{{config('app.url')}}/images/learners/logo.svg" />
    <meta property="og:image:size" content="300" />

    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="Search Mentors | Learn Tattoo & Graphic Design | LILA" />
    <meta name="twitter:site" content="@lilaaliens" />

    <script type="application/ld+json">{"@context":"https://schema.org","@type":"WebPage","name":"Search Mentors | Learn Tattoo & Graphic Design | LILA"}</script>
@endsection

@section('content')
<section class="la-section__small la-cbg--main">
    <div class="la-section__inner">
     
      <div class="container-fluid">
      <div class="row">
          <div class="col-12 ">
            <a class="mt-n4 ml-n1 d-block d-xl-none" href="{{URL::previous()}}" style="color:var(--gray4)"><span class="la-icon la-icon--5xl icon-back-arrow"></span></a> 
            
            <div class="d-md-flex justify-content-between align-items-center">              
              <a  href="{{URL::previous()}}" class="la-vcreator__back d-none d-xl-block" style="margin-top:-30px;"><span class="la-icon la-icon--5xl icon-back-arrow"></span></a>
              <h1 class="la-page__title mb-2 mb-lg-8">Alien Mentors</h1>
              <!-- Global Search: Start-->
              <div class="la-gsearch">
                <form class="form-inline" action="/search-mentor" method="get">
                  <div class="form-group mb-0 w-75">
                    <input class="la-gsearch__input w-100 form-control" value="{{$inputValue}}" name="name" type="text" style="background:transparent;" placeholder="Search Alien Mentor" required>
                  </div>
                  <button class="la-gsearch__submit btn" type="submit"><i class="la-icon la-icon--3xl icon icon-search"></i></button>
                </form>
              </div>
              <!-- Global Search: End-->
            </div>
            
            <div class="la-mentors py-6">
              <div class="row la-anim__wrap">
                  @if(count($mentors))
                  @foreach($mentors as $mentor)
                      <x-mentor :img="$mentor->user_img" :id="$mentor->id" :name="$mentor->fname.' '.$mentor->lname" :skill="$mentor->skill" />
                  @endforeach
                </div>
                @else
                    <div class="col-12">
                      <div class="text-center bg-transparent py-10 py-md-20">
                          <h4 class=" m-0" style="color:var(--gray4)">No Mentor found.</h4>
                      </div>
                    </div>  
                @endif
            </div>
      </div>
    </div>
  </section>
@endsection