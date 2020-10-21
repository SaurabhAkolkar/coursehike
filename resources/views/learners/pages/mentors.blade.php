@extends('learners.layouts.app')

@section('content')
<section class="la-section la-cbg--main">
    <div class="la-section__inner">
      <div class="container">
        <a class="la-icon--lg icon-arrow font-weight-bold mb-5 pb-5 mx-3 d-block d-md-none" href="#"></a>
        <div class="d-flex flex-column flex-lg-row mx-3 mb-5 align-items-center">
          <h1 class="la-page__title mr-auto">Alien Mentors</h1>
          <!-- Global Search: Start-->
          <div class="la-gsearch">
            <form class="form-inline" action="">
              <div class="form-group flex-grow-1">
                <input class="la-gsearch__input w-100 form-control" type="text" style="background:transparent" placeholder="Search Alien Mentor">
              </div>
              <button class="la-gsearch__submit btn" type="submit"><i class="la-icon la-icon--3xl icon icon-search"></i></button>
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


          $mentors = array($mentor1, $mentor2, $mentor3, $mentor4, $mentor5, $mentor6, $mentor7, $mentor8, $mentor9);
        @endphp

        <div class="la-mentors">
          <div class="row no-gutters">
              @foreach($mentors as $mentor)
                  <x-mentor :img="$mentor->img" :name="$mentor->name" :skill="$mentor->skill" />
               @endforeach
            </div>
        </div>
      </div>
    </div>
  </section>
@endsection