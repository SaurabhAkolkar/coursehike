@extends('learners.layouts.app')

@section('content')
<div class="la-profile">
    <div class="la-profile__wrap">

       <!-- Side Navbar: Start -->
       @include ('learners.pages.sidebar')
       <!-- Side Navbar: End -->

      
      <div class="la-profile__main">
        <div class="container la-anim__wrap">
        @if(session('message'))
            <div class="la-btn__alert position-relative">
              <div class="la-btn__alert-success col-md-4 offset-md-2 alert alert-success alert-dismissible fade show" role="alert">
                  <h6 class="la-btn__alert-msg">{{session('message')}}</h6>
                  <button type="button" class="close mt-3" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true" style="color:#56188C">&times;</span>
                  </button>
              </div>
            </div>
          @endif
          <div class="la-profile__main-inner">
            <div class="la-profile__title-wrap">
                <h1 class="la-profile__title la-anim__stagger-item">
                    <a href="/playlist" role="button" style="color:var(--app-indigo-1)">My Playlist</a> / 
                    <span class="">{{$playlist->name}}</span>
                </h1>
            </div>
            
            <section class="la-section la-playlist__sec pt-0">
              <div class="la-playlist__wrap">
                
                    @php  
                    $tattoo1 = new stdClass;$tattoo1->id=1;$tattoo1->img= "https://picsum.photos/600/400";$tattoo1->course= "Tattoo Art";$tattoo1->rating= "4";$tattoo1->url= "/course";$tattoo1->creatorImg= "https://picsum.photos/100";$tattoo1->creatorName= "Joseph Phill";$tattoo1->creatorUrl= "/creator";
                    $tattoo2 = new stdClass;$tattoo2->id=2;$tattoo2->img= "https://picsum.photos/600/400"; $tattoo2->course= "Tattoo Art";$tattoo2->rating= "4";$tattoo2->url= "/course";$tattoo2->creatorImg= "https://picsum.photos/100";$tattoo2->creatorName= "Amy D'souza";$tattoo2->creatorUrl= "/creator";
                    $tattoo7 = new stdClass;$tattoo7->id=7;$tattoo7->img= "https://picsum.photos/600/400"; $tattoo7->course= "Tattoo Art";$tattoo7->rating= "4"; $tattoo7->url= "/course";$tattoo7->creatorImg= "https://picsum.photos/100";$tattoo7->creatorName= "Remo Joseph"; $tattoo7->creatorUrl= "/creator";
                    $img = "https://picsum.photos/600/400";
                    $creatorImg = "https://picsum.photos/100";
                    $course_rating = 4;
                    $course_type = "Tattoo Art";
                    $course_url = "/creator";
                    $tattoos = array($tattoo1, $tattoo2, $tattoo7);
                    $removeFromPlaylist = true;
                    @endphp


                        <div class="row la-playlist__items">

                            @if(count($courses) > 0)
                              @foreach($courses as $course)
                              <div class="col-md-4 px-0">
                                <x-course   
                                    :id="$course->courses[0]->id"
                                    :img="$img" 
                                    :course="$course_type" 
                                    :url="$course_url" 
                                    :rating="$course_rating"
                                    :creatorImg="$creatorImg"
                                    :creatorName="$course->courses[0]->title"
                                    :creatorUrl="$course_url"
                                    :removeFromPlaylist="$removeFromPlaylist"
                                    :learnerCount="$course->learnerCount"
                                />
                              </div>
                              @endforeach
                            @else
                            <div class="col-12 col-md-8">
                                <div class="la-playlist__course-nocourse text-center d-md-flex justify-content-between align-items-center">
                                    <h4 class=" m-0">No Course In this Playlist</h4>
                                    <div class="la-playlist__course-browse">
                                      <a href="/browse/courses" class="la-playlist__course-view" role="button">
                                          Browse Courses 
                                          <span class="la-icon la-icon--5xl icon-grey-arrow"></span>
                                      </a>
                                    </div>
                                </div>
                            </div>  
                            @endif

                        </div>
                   
              </div>
            </section>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

