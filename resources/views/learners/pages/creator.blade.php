@extends('learners.layouts.app')

@section('content')
<!-- Page: Start-->
<section class="la-cbg--main">
  <div class="la-page la-page--vcreator ">
      <div class="la-page__header">
        <div class="container">
          <div class="row">
            <div class="col-1 ">
              <a href="" class="la-vcreator__back-link"><span class="la-icon la-icon--6xl icon-grey-arrow"></span></a>
            </div>
            <div class="col offset-7">
              <!-- Global Search: Start-->
              <div class="la-gsearch my-10">
                <form class="form-inline" action="">
                  <div class="form-group flex-grow-1">
                    <input class="la-gsearch__input w-100 form-control" style="background:transparent" type="text" placeholder="Search Alien Mentor">
                  </div>
                  <button class="la-gsearch__submit btn" type="submit"><i class="la-icon la-icon--3xl icon icon-search"></i></button>
                </form>
              </div>
              <!-- Global Search: End-->
            </div>
          </div>

          @php
              $creator = new stdClass;
              $creator->img = "https://picsum.photos/1200/600";
              $creator->name = "Dyna Acker";
              $creator->desc = "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd";
              $creator->skill = "Tattoo Artist";
              $creator->location = "California, US State";
              $creator->courses = 10;
              $creator->rating = 4.5;
              $creator->awards = 5;

              $creators = array($creator);
          @endphp

          
            <x-creator-profile 
                  :img="$creator->img"
                  :name="$creator->name"
                  :desc="$creator->desc"
                  :skill="$creator->skill"
                  :location="$creator->location"
                  :courses="$creator->courses"
                  :rating="$creator->rating"
                  :awards="$creator->awards"
              />
        

          <div class="row py-6 py-md-20">   
            <div class="col p-md-0">
              <h4 class="text-3xl head-font font-weight-bold p-3">Courses from Dyna</h4>
              <div class="la-courses__creator-courses d-flex flex-row">
                @php  
                  $tattoo1 = new stdClass;$tattoo1->img= "https://picsum.photos/600/400";$tattoo1->course= "Tattoo Art";$tattoo1->rating= "4";$tattoo1->url= "";$tattoo1->creatorImg= "https://picsum.photos/100";$tattoo1->creatorName= "Joseph Phill";$tattoo1->creatorUrl= "/creator";
                  $tattoo2 = new stdClass;$tattoo2->img= "https://picsum.photos/600/400"; $tattoo2->course= "Tattoo Art";$tattoo2->rating= "4";$tattoo2->url= "";$tattoo2->creatorImg= "https://picsum.photos/100";$tattoo2->creatorName= "Amy D'souza";$tattoo2->creatorUrl= "/creator";
                  $tattoo3 = new stdClass;$tattoo3->img= "https://picsum.photos/600/400";$tattoo3->course= "Tattoo Art";$tattoo3->rating= "4";$tattoo3->url= "";$tattoo3->creatorImg= "https://picsum.photos/100";$tattoo3->creatorName= "Alton Crew";$tattoo3->creatorUrl= "/creator";
                
                  $tattoos = array($tattoo1, $tattoo2, $tattoo3);
                @endphp

                @foreach($tattoos as $tattoo)
                  <x-course 
                      :img="$tattoo->img" 
                      :course="$tattoo->course" 
                      :url="$tattoo->url" 
                      :rating="$tattoo->rating"
                      :creatorImg="$tattoo->creatorImg"
                      :creatorName="$tattoo->creatorName"
                      :creatorUrl="$tattoo->creatorUrl"
                    />
                @endforeach

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
    <!-- Page: End-->
@endsection