@extends('learners.layouts.app')

@section('content')
<section class="la-cbg--main">
    <!-- Section Ongoing: Start-->
    <section class="la-section">
      <div class="la-section__inner">
        <div class="container"><a class="la-icon--lg icon-arrow my-5 px-3 d-block d-md-none" href="#"></a>
          <div class="col-12 d-lg-flex justify-content-between align-items-center mb-4">
            <h1 class="la-mycourses__title text-4xl">My Courses</h1>
            <!-- Global Search: Start-->
            <div class="la-gsearch">
              <form class="form-inline" action="">
                <div class="form-group flex-grow-1">
                  <input class="la-gsearch__input w-100 form-control" type="text" placeholder="What you want to learn today?">
                </div>
                <button class="la-gsearch__submit btn" type="submit"><i class="la-icon la-icon--3xl icon icon-search"></i></button>
              </form>
            </div>
            <!-- Global Search: End-->
          </div>
          <div class="col-12 d-flex justify-content-between mb-8">
            <div class="la-mycourses__subtitle text-2xl head-font">Ongoing</div>
            <div class="la-icon--2xl icon-filter"></div>
          </div>
          <div class="col-12">
            <div class="row row-cols-lg-3">
              @php  

                $tattoo1 = new stdClass;$tattoo1->img= "https://picsum.photos/600/400";$tattoo1->course= "Tattoo Art";$tattoo1->rating= "4";$tattoo1->url= "";$tattoo1->creatorImg= "https://picsum.photos/100";$tattoo1->creatorName= "Joseph Phill";$tattoo1->creatorUrl= "/creator";
                $tattoo2 = new stdClass;$tattoo2->img= "https://picsum.photos/600/400"; $tattoo2->course= "Tattoo Art";$tattoo2->rating= "4";$tattoo2->url= "";$tattoo2->creatorImg= "https://picsum.photos/100";$tattoo2->creatorName= "Amy D'souza";$tattoo2->creatorUrl= "/creator";
                $tattoo3 = new stdClass;$tattoo3->img= "https://picsum.photos/600/400";$tattoo3->course= "Tattoo Art";$tattoo3->rating= "4";$tattoo3->url= "";$tattoo3->creatorImg= "https://picsum.photos/100";$tattoo3->creatorName= "Alton Crew";$tattoo3->creatorUrl= "/creator";
                $tattoo4 = new stdClass;$tattoo4->img= "https://picsum.photos/600/400";$tattoo4->course= "Tattoo Art";$tattoo4->rating= "4";$tattoo4->url= "";$tattoo4->creatorImg= "https://picsum.photos/100";$tattoo4->creatorName= "Nathan Spark";$tattoo4->creatorUrl= "/creator";
                $tattoo5 = new stdClass;$tattoo5->img= "https://picsum.photos/600/400";$tattoo5->course= "Tattoo Art"; $tattoo5->rating= "4";$tattoo5->url= ""; $tattoo5->creatorImg= "https://picsum.photos/100"; $tattoo5->creatorName= "Harry Lisa"; $tattoo5->creatorUrl= "/creator";
                $tattoo6 = new stdClass;$tattoo6->img= "https://picsum.photos/600/400";$tattoo6->course= "Tattoo Art";$tattoo6->rating= "4"; $tattoo6->url= "";$tattoo6->creatorImg= "https://picsum.photos/100";$tattoo6->creatorName= "Natalia Spark";$tattoo6->creatorUrl= "/creator";
            
                $tattoos = array($tattoo1, $tattoo2, $tattoo3, $tattoo4, $tattoo5, $tattoo6);
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
                    
            </div><a class="la-mycourses__more" id="viewOngoing">See all</a>
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
              @php  
                $tattoo1 = new stdClass;$tattoo1->img= "https://picsum.photos/600/400";$tattoo1->course= "Tattoo Art";$tattoo1->rating= "4";$tattoo1->url= "";$tattoo1->creatorImg= "https://picsum.photos/100";$tattoo1->creatorName= "Joseph Phill";$tattoo1->creatorUrl= "/creator";
                $tattoo2 = new stdClass;$tattoo2->img= "https://picsum.photos/600/400"; $tattoo2->course= "Tattoo Art";$tattoo2->rating= "4";$tattoo2->url= "";$tattoo2->creatorImg= "https://picsum.photos/100";$tattoo2->creatorName= "Amy D'souza";$tattoo2->creatorUrl= "/creator";
                $tattoo3 = new stdClass;$tattoo3->img= "https://picsum.photos/600/400";$tattoo3->course= "Tattoo Art";$tattoo3->rating= "4";$tattoo3->url= "";$tattoo3->creatorImg= "https://picsum.photos/100";$tattoo3->creatorName= "Alton Crew";$tattoo3->creatorUrl= "/creator";
                $tattoo4 = new stdClass;$tattoo4->img= "https://picsum.photos/600/400";$tattoo4->course= "Tattoo Art";$tattoo4->rating= "4";$tattoo4->url= "";$tattoo4->creatorImg= "https://picsum.photos/100";$tattoo4->creatorName= "Nathan Spark";$tattoo4->creatorUrl= "/creator";
                $tattoo5 = new stdClass;$tattoo5->img= "https://picsum.photos/600/400";$tattoo5->course= "Tattoo Art"; $tattoo5->rating= "4";$tattoo5->url= ""; $tattoo5->creatorImg= "https://picsum.photos/100"; $tattoo5->creatorName= "Harry Lisa"; $tattoo5->creatorUrl= "/creator";
                $tattoo6 = new stdClass;$tattoo6->img= "https://picsum.photos/600/400";$tattoo6->course= "Tattoo Art";$tattoo6->rating= "4"; $tattoo6->url= "";$tattoo6->creatorImg= "https://picsum.photos/100";$tattoo6->creatorName= "Natalia Spark";$tattoo6->creatorUrl= "/creator";
            
                $tattoos = array($tattoo1, $tattoo2, $tattoo3, $tattoo4, $tattoo5, $tattoo6);
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
                $tattoo1 = new stdClass;$tattoo1->img= "https://picsum.photos/600/400";$tattoo1->course= "Tattoo Art";$tattoo1->rating= "4";$tattoo1->url= "";$tattoo1->creatorImg= "https://picsum.photos/100";$tattoo1->creatorName= "Joseph Phill";$tattoo1->creatorUrl= "/creator";
                $tattoo2 = new stdClass;$tattoo2->img= "https://picsum.photos/600/400"; $tattoo2->course= "Tattoo Art";$tattoo2->rating= "4";$tattoo2->url= "";$tattoo2->creatorImg= "https://picsum.photos/100";$tattoo2->creatorName= "Amy D'souza";$tattoo2->creatorUrl= "/creator";
                $tattoo3 = new stdClass;$tattoo3->img= "https://picsum.photos/600/400";$tattoo3->course= "Tattoo Art";$tattoo3->rating= "4";$tattoo3->url= "";$tattoo3->creatorImg= "https://picsum.photos/100";$tattoo3->creatorName= "Alton Crew";$tattoo3->creatorUrl= "/creator";
                $tattoo4 = new stdClass;$tattoo4->img= "https://picsum.photos/600/400";$tattoo4->course= "Tattoo Art";$tattoo4->rating= "4";$tattoo4->url= "";$tattoo4->creatorImg= "https://picsum.photos/100";$tattoo4->creatorName= "Nathan Spark";$tattoo4->creatorUrl= "/creator";
                $tattoo5 = new stdClass;$tattoo5->img= "https://picsum.photos/600/400";$tattoo5->course= "Tattoo Art"; $tattoo5->rating= "4";$tattoo5->url= ""; $tattoo5->creatorImg= "https://picsum.photos/100"; $tattoo5->creatorName= "Harry Lisa"; $tattoo5->creatorUrl= "/creator";
                $tattoo6 = new stdClass;$tattoo6->img= "https://picsum.photos/600/400";$tattoo6->course= "Tattoo Art";$tattoo6->rating= "4"; $tattoo6->url= "";$tattoo6->creatorImg= "https://picsum.photos/100";$tattoo6->creatorName= "Natalia Spark";$tattoo6->creatorUrl= "/creator";
            
                $tattoos = array($tattoo1, $tattoo2, $tattoo3, $tattoo4, $tattoo5, $tattoo6);
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
                                 
            </div><a class="la-mycourses__more" id="viewCompleted">See all</a>
          </div>
        </div>
      </div>
    </section>
    <!-- Section Completed: End-->
  </section>
@endsection