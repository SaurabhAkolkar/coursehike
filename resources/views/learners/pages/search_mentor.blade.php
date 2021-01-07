@extends('learners.layouts.app')

@section('content')
<section class="la-section__small la-cbg--main">
    <div class="la-section__inner">
     
      <div class="container">
      <div class="row">
          <div class="col-12 ">
              <a class="la-icon la-icon--5xl icon-back-arrow ml-n1 mt-n2 mb-5 d-block d-md-none" href="{{URL::previous()}}"></a> 
              <a href="{{URL::previous()}}" class="la-vcreator__back d-none d-md-block" style="margin-top:-40px;"><span class="la-icon la-icon--5xl icon-back-arrow"></span></a>
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
            
            <div class="la-mentors">
              <div class="row no-gutters">
                  @if(count($mentors))
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
                @else
                    <div class="col-12 ">
                      <div class="text-center bg-transparent py-10 py-md-20">
                          <h4 class=" m-0" style="color:var(--gray4)">No Mentors found.</h4>
                      </div>
                    </div>  
                @endif
            </div>
      </div>
    </div>
  </section>
@endsection