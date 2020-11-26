@extends('learners.layouts.app')

@section('content')
<section class="la-section la-cbg--main">
    <div class="la-section__inner">
      <div class="container">
        <!-- Alert Message -->
        @if(session('message'))
          <div class="la-btn__alert-success col-md-4 offset-md-8  alert alert-success alert-dismissible fade show" role="alert">
            <h6 class="la-btn__alert-msg">{{session('message')}}</h6>
            <button type="button" class="close mt-2" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true" class="text-white">&times;</span>
            </button>
          </div>
        @endif
        <!-- Wishlist Alert Message -->
        <div id="wishlist_alert_div"></div> 
        
        <a class="la-icon--lg icon-arrow font-weight-bold my-5 d-block d-md-none" href="#"></a>
        <div class="d-flex justify-content-between">  
          <h1 class="la-page__title mb-8">Browse Courses</h1><a class="la-icon--3xl icon-filter d-block d-lg-none" id="filterCourses" role="button"></a>
        </div>
        <!-- Global Search: Start-->
        <div class="la-gsearch">
          <form class="form-inline"  action="{{ url('/search-course/') }}">
            <div class="form-group ">
              <input class="la-gsearch__input form-control" style="width:300px; background:transparent" value="{{$search_input}}" name="course_name" type="text" placeholder="What you want to learn today?">
            </div>
            <button class="la-gsearch__submit btn" type="submit"><i class="la-icon la-icon--3xl icon icon-search"></i></button>
          </form>
        </div>
        <!-- Global Search: End-->

        <div class="la-courses mt-14">

          @php  

            $tattoo1 = new stdClass;$tattoo1->id=1;$tattoo1->img= "https://picsum.photos/600/400";$tattoo1->course= "Tattoo Art";$tattoo1->rating= "4";$tattoo1->url= "/course";$tattoo1->creatorImg= "https://picsum.photos/100";$tattoo1->creatorName= "Joseph Phill";$tattoo1->creatorUrl= "/creator";
            $tattoo2 = new stdClass;$tattoo2->id=2;$tattoo2->img= "https://picsum.photos/600/400"; $tattoo2->course= "Tattoo Art";$tattoo2->rating= "4";$tattoo2->url= "/course";$tattoo2->creatorImg= "https://picsum.photos/100";$tattoo2->creatorName= "Amy D'souza";$tattoo2->creatorUrl= "/creator";
            $tattoo3 = new stdClass;$tattoo3->id=3;$tattoo3->img= "https://picsum.photos/600/400";$tattoo3->course= "Tattoo Art";$tattoo3->rating= "4";$tattoo3->url= "/course";$tattoo3->creatorImg= "https://picsum.photos/100";$tattoo3->creatorName= "Alton Crew";$tattoo3->creatorUrl= "/creator";
            $tattoo4 = new stdClass;$tattoo4->id=4;$tattoo4->img= "https://picsum.photos/600/400";$tattoo4->course= "Tattoo Art";$tattoo4->rating= "4";$tattoo4->url= "/course";$tattoo4->creatorImg= "https://picsum.photos/100";$tattoo4->creatorName= "Nathan Spark";$tattoo4->creatorUrl= "/creator";
            $tattoo5 = new stdClass;$tattoo5->id=5;$tattoo5->img= "https://picsum.photos/600/400";$tattoo5->course= "Tattoo Art"; $tattoo5->rating= "4";$tattoo5->url= "/course"; $tattoo5->creatorImg= "https://picsum.photos/100"; $tattoo5->creatorName= "Harry Lisa"; $tattoo5->creatorUrl= "/creator";
            $tattoo6 = new stdClass;$tattoo6->id=6;$tattoo6->img= "https://picsum.photos/600/400";$tattoo6->course= "Tattoo Art";$tattoo6->rating= "4"; $tattoo6->url= "/course";$tattoo6->creatorImg= "https://picsum.photos/100";$tattoo6->creatorName= "Natalia Spark";$tattoo6->creatorUrl= "/creator";
            $tattoo7 = new stdClass;$tattoo7->id=7;$tattoo7->img= "https://picsum.photos/600/400"; $tattoo7->course= "Tattoo Art";$tattoo7->rating= "4"; $tattoo7->url= "/course";$tattoo7->creatorImg= "https://picsum.photos/100";$tattoo7->creatorName= "Remo Joseph"; $tattoo7->creatorUrl= "/creator";

            $tattoos = array($tattoo1, $tattoo2, $tattoo3, $tattoo4, $tattoo5, $tattoo6, $tattoo7);
          @endphp

             
                   <x-add-to-playlist 
                      :playlists="$playlists"
                    />
                  <!-- Add to Playlist Modal -->
                
              
                <div class="row row-cols-lg-3">
                      @foreach($courses as $course)
                        @if ($course->featured == 0)
                            @continue
                        @endif
                        <x-course 
                            :id="$course->id"
                            :img="$course->preview_image"
                            :course="$course->title"
                            :url="$course->slug"
                            :rating="$course->price"
                            :creatorImg="$course->user->user_img"
                            :creatorName="$course->user->fname"
                            :creatorUrl="$course->user->fname"
                          />
                      @endforeach

                </div>

        </div>
      </div>
    </div>
  </section>

  
  @endsection
  