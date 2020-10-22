@extends('learners.layouts.app')

@section('content')
<div class="la-profile">
    <div class="la-profile__wrap">

      <!-- Side Navbar: Start -->
        @include ('learners.pages.sidebar')
      <!-- Side Navbar: End -->

      @php  
      $tattoo1 = new stdClass;$tattoo1->img= "https://picsum.photos/600/400";$tattoo1->course= "Tattoo Art";$tattoo1->rating= "4";$tattoo1->url= "";$tattoo1->creatorImg= "https://picsum.photos/100";$tattoo1->creatorName= "Joseph Phill";$tattoo1->creatorUrl= "/creator";
      $tattoo2 = new stdClass;$tattoo2->img= "https://picsum.photos/600/400"; $tattoo2->course= "Tattoo Art";$tattoo2->rating= "4";$tattoo2->url= "";$tattoo2->creatorImg= "https://picsum.photos/100";$tattoo2->creatorName= "Amy D'souza";$tattoo2->creatorUrl= "/creator";
      $tattoo3 = new stdClass;$tattoo3->img= "https://picsum.photos/600/400";$tattoo3->course= "Tattoo Art";$tattoo3->rating= "4";$tattoo3->url= "";$tattoo3->creatorImg= "https://picsum.photos/100";$tattoo3->creatorName= "Alton Crew";$tattoo3->creatorUrl= "/creator";
     
      $tattoos = array($tattoo1, $tattoo2, $tattoo3);
      @endphp

      <div class="la-profile__main">
        <div class="container">
          <div class="la-profile__main-inner">
            <div class="la-profile__title-wrap">
              <h1 class="la-profile__title">Wishlist</h1>
            </div>
            <section class="la-section la-wishlist__sec pt-0">
              <div class="la-wishlist__inner">
                <div class="row la-wishlist__row">
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

                <div class="row la-wishlist__row">
                  <div class="col-md-4 col-lg-4">
                    <a class="la-btn__add d-flex justify-content-center align-items-center" href="">
                      <span class="la-btn__add-icon">+</span>
                    </a>
                  </div>
                </div>
              </div>
            </section>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection