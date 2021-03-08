@extends('learners.layouts.app')

@section('content')
<section class="la-section__small la-cbg--main">
    <div class="la-section__inner">
     
      <div class="container-fluid">
      <div class="row">
          <div class="col-12 ">
            <div class="d-md-flex justify-content-between align-items-center">
              <a class="la-icon la-icon--5xl icon-back-arrow ml-n1 mt-n4 mb-2 d-block d-md-none" href="/mentors"></a> 
              <a href="/mentors" class="la-vcreator__back d-none d-lg-block" style="margin-top:-28px;"><span class="la-icon la-icon--5xl icon-back-arrow"></span></a>
              <h1 class="la-page__title mb-8">Alien Mentors</h1>
              <!-- Global Search: Start-->
              <div class="la-gsearch">
                <form class="form-inline" action="/search-mentor" method="get">
                  <div class="form-group">
                    <input class="la-gsearch__input w-100 form-control" value="{{$inputValue}}" name="name" type="text" style="background:transparent;" placeholder="Search Alien Mentor" required>
                  </div>
                  <button class="la-gsearch__submit btn" type="submit"><i class="la-icon la-icon--3xl icon icon-search"></i></button>
                </form>
              </div>
              <!-- Global Search: End-->
            </div>
            
            <div class="la-mentors">
              <div class="row la-anim__wrap">
                  @if(count($mentors))
                  @foreach($mentors as $mentor)
                      <x-mentor :img="$mentor->user_img" :id="$mentor->id" :name="$mentor->fname.' '.$mentor->lname" :skill="$mentor->skill" />
                  @endforeach
                </div>
                @else
                    <div class="col-12 ">
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