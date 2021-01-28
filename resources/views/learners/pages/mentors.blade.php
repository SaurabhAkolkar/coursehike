@extends('learners.layouts.app')

@section('content')
<section class="la-section__small la-cbg--main">
    <div class="la-section__inner">
      <div class="container ">
        <div class="mx-3 la-anim__wrap d-md-flex justify-content-between align-items-center">
          <a class="la-icon la-icon--5xl icon-back-arrow d-block d-md-none ml-n1 mt-n2 mb-5 la-anim__stagger-item--x" href="{{URL::previous()}}"></a>
          <h1 class="la-page__title mb-8 la-anim__stagger-item">Alien Mentors</h1>

          <!-- Global Search: Start-->
          <div class="la-gsearch la-anim__stagger-item--x">
            <form class="form-inline" action="/search-mentor" method="post">
              @csrf
              <div class="form-group d-flex align-items-center">
                <input class="la-gsearch__input w-100 form-control la-gsearch__input-browsecourses" name="name" type="text" style="background:transparent" placeholder="Looking for your favourite Alien mentor?">
              </div>
              <button class="la-gsearch__submit btn" type="submit"><i class="la-icon icon-search la-gsearch__input-icon"></i></button>
            </form>
          </div>
          <!-- Global Search: End-->
        </div>
        @php  
          $mentor1 = new stdClass;$mentor1->name="Alton Crew";$mentor1->img="https://picsum.photos/400";$mentor1->skill="Photography";
          $mentor2 = new stdClass; $mentor2->name="Alton"; $mentor2->img="https://picsum.photos/400"; $mentor2->skill="Design";
          $mentor3 = new stdClass;$mentor3->name="Amy D'souza";$mentor3->img="https://picsum.photos/400";$mentor3->skill="Tattoo";
          $mentor4 = new stdClass;$mentor4->name="Amy D'souza";$mentor4->img="https://picsum.photos/400";$mentor4->skill="Tattoo";
          $mentor5 = new stdClass;$mentor5->name="Amy D'souza";$mentor5->img="https://picsum.photos/400";$mentor5->skill="Tattoo";
          $mentor6 = new stdClass; $mentor6->name="Amy D'souza";$mentor6->img="https://picsum.photos/400";$mentor6->skill="Tattoo";
          $mentor7 = new stdClass; $mentor7->name="Amy D'souza";$mentor7->img="https://picsum.photos/400";$mentor7->skill="Tattoo";
          $mentor8 = new stdClass; $mentor8->name="Amy D'souza";$mentor8->img="https://picsum.photos/400";$mentor8->skill="Tattoo";
          $mentor9 = new stdClass; $mentor9->name="Amy D'souza";$mentor9->img="https://picsum.photos/400";$mentor9->skill="Tattoo";


          //$mentors = array($mentor1, $mentor2, $mentor3, $mentor4, $mentor5, $mentor6, $mentor7, $mentor8, $mentor9);
        @endphp

        <div class="la-mentors pt-md-10">
          <div class="row la-anim__wrap">
              <div class="col-12 d-md-inline-flex">
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
    </div>
  </section>
@endsection