@extends('learners.layouts.app')

@section('content')
<section class="la-cbg--main">
    <!-- Section Ongoing: Start-->
    <section class="la-section">
      <div class="la-section__inner">
        <!-- Alert Message-->
        <div id="wishlist_alert_div" class="container"></div> 
        <div class="container">
          <div class="col-12 ">
            <a class="la-icon la-icon--5xl icon-back-arrow d-block d-md-none ml-n1 mt-n2 mb-5" href="#"></a>
            <h1 class="la-mycourses__title text-4xl  mb-8">My Courses</h1>
            <!-- Global Search: Start-->
            <div class="la-gsearch">
              <form class="form-inline">
                <div class="form-group ">
                  <input class="la-gsearch__input form-control w-100" style="background:transparent" type="text" placeholder="Search course or class">
                </div>
                <button class="la-gsearch__submit btn" type="submit"><i class="la-icon la-icon--3xl icon icon-search"></i></button>
              </form>
            </div>
            <!-- Global Search: End-->
          </div>
          <div class="col-12 d-flex justify-content-between align-items-center mb-8">
            <div class="la-mycourses__subtitle text-2xl head-font">Ongoing</div>
            <div class="la-icon--2xl icon-filter"></div>
          </div>
          
          <x-add-to-playlist 
                      :playlists="$playlists"
          />
          <div class="col-12">
            <div class="row row-cols-lg-3">

              @php  

                $tattoo1 = new stdClass;$tattoo1->id= 1;$tattoo1->img= "https://picsum.photos/600/400";$tattoo1->course= "Tattoo Art";$tattoo1->rating= "4";$tattoo1->url= "/course";$tattoo1->creatorImg= "https://picsum.photos/100";$tattoo1->creatorName= "Joseph Phill";$tattoo1->creatorUrl= "/creator";
                $tattoo2 = new stdClass;$tattoo2->id= 2;$tattoo2->img= "https://picsum.photos/600/400"; $tattoo2->course= "Tattoo Art";$tattoo2->rating= "4";$tattoo2->url= "/course";$tattoo2->creatorImg= "https://picsum.photos/100";$tattoo2->creatorName= "Amy D'souza";$tattoo2->creatorUrl= "/creator";
                $tattoo3 = new stdClass;$tattoo3->id= 3;$tattoo3->img= "https://picsum.photos/600/400";$tattoo3->course= "Tattoo Art";$tattoo3->rating= "4";$tattoo3->url= "/course";$tattoo3->creatorImg= "https://picsum.photos/100";$tattoo3->creatorName= "Alton Crew";$tattoo3->creatorUrl= "/creator";
                $tattoo4 = new stdClass;$tattoo4->id= 4;$tattoo4->img= "https://picsum.photos/600/400";$tattoo4->course= "Tattoo Art";$tattoo4->rating= "4";$tattoo4->url= "/course";$tattoo4->creatorImg= "https://picsum.photos/100";$tattoo4->creatorName= "Nathan Spark";$tattoo4->creatorUrl= "/creator";
                $tattoo5 = new stdClass;$tattoo5->id= 5;$tattoo5->img= "https://picsum.photos/600/400";$tattoo5->course= "Tattoo Art"; $tattoo5->rating= "4";$tattoo5->url= "/course"; $tattoo5->creatorImg= "https://picsum.photos/100"; $tattoo5->creatorName= "Harry Lisa"; $tattoo5->creatorUrl= "/creator";
                $tattoo6 = new stdClass;$tattoo6->id= 6;$tattoo6->img= "https://picsum.photos/600/400";$tattoo6->course= "Tattoo Art";$tattoo6->rating= "4"; $tattoo6->url= "/course";$tattoo6->creatorImg= "https://picsum.photos/100";$tattoo6->creatorName= "Natalia Spark";$tattoo6->creatorUrl= "/creator";
                $tattoo7 = new stdClass;$tattoo7->id= 7;$tattoo7->img= "https://picsum.photos/600/400"; $tattoo7->course= "Tattoo Art";$tattoo7->rating= "4"; $tattoo7->url= "/course";$tattoo7->creatorImg= "https://picsum.photos/100";$tattoo7->creatorName= "Remo Joseph"; $tattoo7->creatorUrl= "/creator";

                $tattoos = array($tattoo1, $tattoo2, $tattoo3, $tattoo4, $tattoo5, $tattoo6);
              @endphp

              @foreach($tattoos as $tattoo)
              <x-course 
                  :id="$tattoo->id"
                  :img="$tattoo->img" 
                  :course="$tattoo->course" 
                  :url="$tattoo->url" 
                  :rating="$tattoo->rating"
                  :creatorImg="$tattoo->creatorImg"
                  :creatorName="$tattoo->creatorName"
                  :creatorUrl="$tattoo->creatorUrl"
                />
              @endforeach
                    
            </div><a class="la-mycourses__more" id="viewOngoing">See all</a>

            <div class="la-empty__courses d-md-flex justify-content-between align-items-start">
              <div class="la-empty__inner">
                  <h6 class="la-empty__course-title pb-2">No Courses</h6>
                  <p class="la-empty__course-desc m-0">You currently don't have any ongoing course, start new course</p>
              </div>
              <div class="la-empty__browse-courses">
                  <a href="{{Url('/browse/courses')}}" class="la-empty__browse">
                      Browse Courses
                      <span class="la-empty__browse-icon la-icon la-icon--5xl icon-grey-arrow"></span>
                  </a>
              </div>
          </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Section Ongoing: End-->
    <!-- Section Yet to Start: Start-->
    <section class="la-section">
      <div class="la-section__inner">
        <div class="container">
          <div class="col-12 d-flex justify-content-between mb-6">
            <div class="la-mycourses__subtitle text-2xl head-font">Yet to Start</div>
            <div class="la-icon--2xl icon-filter"></div>
          </div>
          <div class="col-12">
            <div class="row row-cols-lg-3">
              {{-- @php  
                $tattoo1 = new stdClass;$tattoo1->img= "https://picsum.photos/600/400";$tattoo1->course= "Tattoo Art";$tattoo1->rating= "4";$tattoo1->url= "";$tattoo1->creatorImg= "https://picsum.photos/100";$tattoo1->creatorName= "Joseph Phill";$tattoo1->creatorUrl= "/creator";
                $tattoo2 = new stdClass;$tattoo2->img= "https://picsum.photos/600/400"; $tattoo2->course= "Tattoo Art";$tattoo2->rating= "4";$tattoo2->url= "";$tattoo2->creatorImg= "https://picsum.photos/100";$tattoo2->creatorName= "Amy D'souza";$tattoo2->creatorUrl= "/creator";
                $tattoo3 = new stdClass;$tattoo3->img= "https://picsum.photos/600/400";$tattoo3->course= "Tattoo Art";$tattoo3->rating= "4";$tattoo3->url= "";$tattoo3->creatorImg= "https://picsum.photos/100";$tattoo3->creatorName= "Alton Crew";$tattoo3->creatorUrl= "/creator";
                $tattoo4 = new stdClass;$tattoo4->img= "https://picsum.photos/600/400";$tattoo4->course= "Tattoo Art";$tattoo4->rating= "4";$tattoo4->url= "";$tattoo4->creatorImg= "https://picsum.photos/100";$tattoo4->creatorName= "Nathan Spark";$tattoo4->creatorUrl= "/creator";
                $tattoo5 = new stdClass;$tattoo5->img= "https://picsum.photos/600/400";$tattoo5->course= "Tattoo Art"; $tattoo5->rating= "4";$tattoo5->url= ""; $tattoo5->creatorImg= "https://picsum.photos/100"; $tattoo5->creatorName= "Harry Lisa"; $tattoo5->creatorUrl= "/creator";
                $tattoo6 = new stdClass;$tattoo6->img= "https://picsum.photos/600/400";$tattoo6->course= "Tattoo Art";$tattoo6->rating= "4"; $tattoo6->url= "";$tattoo6->creatorImg= "https://picsum.photos/100";$tattoo6->creatorName= "Natalia Spark";$tattoo6->creatorUrl= "/creator";
            
                $tattoos = array($tattoo1, $tattoo2, $tattoo3, $tattoo4, $tattoo5, $tattoo6);
              @endphp --}}

              @foreach($tattoos as $tattoo)
              <x-course 
                  :id="$tattoo->id"
                  :img="$tattoo->img" 
                  :course="$tattoo->course" 
                  :url="$tattoo->url" 
                  :rating="$tattoo->rating"
                  :creatorImg="$tattoo->creatorImg"
                  :creatorName="$tattoo->creatorName"
                  :creatorUrl="$tattoo->creatorUrl"
                />
              @endforeach
                                
            </div><a class="la-mycourses__more" id="viewStart">See all</a>
          </div>
        </div>
      </div>
    </section>
    <!-- Section Yet to Start: End-->
    <!-- Section Completed: Start-->
    <section class="la-section">
      <div class="la-section__inner">
        <div class="container">
          <div class="col-12 d-flex justify-content-between mb-6">
            <div class="la-mycourses__subtitle text-2xl head-font">Completed</div>
            <div class="la-icon--2xl icon-filter"></div>
          </div>
          <div class="col-12">
            <div class="row row-cols-lg-3">
              @php  
                // $tattoo1 = new stdClass;$tattoo1->img= "https://picsum.photos/600/400";$tattoo1->course= "Tattoo Art";$tattoo1->rating= "4";$tattoo1->url= "";$tattoo1->creatorImg= "https://picsum.photos/100";$tattoo1->creatorName= "Joseph Phill";$tattoo1->creatorUrl= "/creator";
                // $tattoo2 = new stdClass;$tattoo2->img= "https://picsum.photos/600/400"; $tattoo2->course= "Tattoo Art";$tattoo2->rating= "4";$tattoo2->url= "";$tattoo2->creatorImg= "https://picsum.photos/100";$tattoo2->creatorName= "Amy D'souza";$tattoo2->creatorUrl= "/creator";
                // $tattoo3 = new stdClass;$tattoo3->img= "https://picsum.photos/600/400";$tattoo3->course= "Tattoo Art";$tattoo3->rating= "4";$tattoo3->url= "";$tattoo3->creatorImg= "https://picsum.photos/100";$tattoo3->creatorName= "Alton Crew";$tattoo3->creatorUrl= "/creator";
                // $tattoo4 = new stdClass;$tattoo4->img= "https://picsum.photos/600/400";$tattoo4->course= "Tattoo Art";$tattoo4->rating= "4";$tattoo4->url= "";$tattoo4->creatorImg= "https://picsum.photos/100";$tattoo4->creatorName= "Nathan Spark";$tattoo4->creatorUrl= "/creator";
                // $tattoo5 = new stdClass;$tattoo5->img= "https://picsum.photos/600/400";$tattoo5->course= "Tattoo Art"; $tattoo5->rating= "4";$tattoo5->url= ""; $tattoo5->creatorImg= "https://picsum.photos/100"; $tattoo5->creatorName= "Harry Lisa"; $tattoo5->creatorUrl= "/creator";
                // $tattoo6 = new stdClass;$tattoo6->img= "https://picsum.photos/600/400";$tattoo6->course= "Tattoo Art";$tattoo6->rating= "4"; $tattoo6->url= "";$tattoo6->creatorImg= "https://picsum.photos/100";$tattoo6->creatorName= "Natalia Spark";$tattoo6->creatorUrl= "/creator";
            
                // $tattoos = array($tattoo1, $tattoo2, $tattoo3, $tattoo4, $tattoo5, $tattoo6);
              @endphp

              @foreach($tattoos as $tattoo)
              <x-course 
                  :id="$tattoo->id"
                  :img="$tattoo->img" 
                  :course="$tattoo->course" 
                  :url="$tattoo->url" 
                  :rating="$tattoo->rating"
                  :creatorImg="$tattoo->creatorImg"
                  :creatorName="$tattoo->creatorName"
                  :creatorUrl="$tattoo->creatorUrl"
                />
              @endforeach
                                 
            </div><a class="la-mycourses__more" id="viewCompleted">See all</a>

            <div class="la-empty__courses d-md-flex justify-content-between align-items-start">
              <div class="la-empty__inner">
                  <h6 class="la-empty__course-title pb-2">No Courses</h6>
                  <p class="la-empty__course-desc m-0">You have not finished any course yet.</p>
              </div>
              <div class="la-empty__browse-courses">
                  <a href="" class="la-empty__browse">
                      Browse Courses
                      <span class="la-empty__browse-icon la-icon la-icon--5xl icon-grey-arrow"></span>
                  </a>
              </div>
          </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Section Completed: End-->
  </section>
@endsection