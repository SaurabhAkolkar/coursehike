@extends('learners.layouts.app')

@section('content')
<section class="la-section__small la-cbg--main">
    <div class="la-section__inner">
      <div class="container-fluid">
      <a class="la-icon la-icon--5xl icon-back-arrow d-block d-md-none mt-n4 ml-n1 mb-2" href="{{URL::previous()}}"></a>
        <div class="la-anim__wrap d-md-flex justify-content-between align-items-center">
          <h1 class="la-page__title mb-4 mb-md-8 la-anim__stagger-item">Alien Creators</h1>

          <!-- Global Search: Start-->
          <div class="la-gsearch la-anim__stagger-item--x">
            <form class="form-inline" action="/search-creator" method="post">
              @csrf
              <div class="form-group d-flex align-items-center">
                <input class="la-gsearch__input w-100 form-control la-gsearch__input-browsecourses" name="name" type="text" style="background:transparent" placeholder="Looking for your favourite Alien Creator?">
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