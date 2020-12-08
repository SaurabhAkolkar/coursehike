@extends('learners.layouts.app')

@section('content')
<section class="la-section la-cbg--main">
    <div class="la-section__inner">
      <div class="container">
        <div class="mx-3 ">
          <a class="la-icon la-icon--5xl icon-back-arrow d-block d-md-none ml-n1 mt-n2 mb-5" href="#"></a>
          <h1 class="la-page__title mb-8">Alien Mentors</h1>
          <!-- Global Search: Start-->
          <div class="la-gsearch">
            <form class="form-inline" action="/search-mentor" method="post">
              @csrf
              <div class="form-group">
                <input class="la-gsearch__input w-100 form-control" value="{{$inputValue}}" name="name" type="text" style="background:transparent" placeholder="Search Alien Mentor" required>
              </div>
              <button class="la-gsearch__submit btn" type="submit"><i class="la-icon la-icon--3xl icon icon-search"></i></button>
            </form>
          </div>
          <!-- Global Search: End-->
        </div>
        <div class="la-mentors">
          <div class="row no-gutters">
              @foreach($mentors as $mentor)
                  @php 
                        if($mentor->user_img == ""){
                            $mentor->user_img = "https://picsum.photos/400";
                        }else{
                            $mentor->user_img = asset('/images/user_img/'.$mentor->user_img);
                        }
                  @endphp
                  <x-mentor :img="$mentor->user_img" :id="$mentor->id" :name="$mentor->fname.' '.$mentor->lname" :skill="$mentor->skill" />
               @endforeach
            </div>
        </div>
      </div>
    </div>
  </section>
@endsection