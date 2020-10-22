@extends('learners.layouts.app')

@section('content')
<section class="la-section la-cbg--main">
    <div class="la-section__inner">
      <div class="container"><a class="la-icon--lg icon-arrow font-weight-bold my-5 d-block d-md-none" href="#"></a>
        <div class="d-flex justify-content-between">  
          <h1 class="la-page__title mb-8">Browse Courses</h1><a class="la-icon--3xl icon-filter d-block d-lg-none" id="filterCourses" role="button"></a>
        </div>
        <!-- Global Search: Start-->
        <div class="la-gsearch">
          <form class="form-inline" action="">
            <div class="form-group ">
              <input class="la-gsearch__input form-control" style="width:300px; background:transparent" type="text" placeholder="What you want to learn today?">
            </div>
            <button class="la-gsearch__submit btn" type="submit"><i class="la-icon la-icon--3xl icon icon-search"></i></button>
          </form>
        </div>
        <!-- Global Search: End-->
        <div class="la-courses mt-14">
          <nav class="la-courses__nav d-flex justify-content-between">
            <ul class="nav nav-pills la-courses__nav-tabs" id="nav-tab" role="tablist">
              <li class="nav-item la-courses__nav-item"><a class="nav-link la-courses__nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"> <span class="position-relative">Tattoo</span></a></li>
              <li class="nav-item la-courses__nav-item"><a class="nav-link la-courses__nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"> <span class="position-relative">Rangoli</span></a></li>
              <li class="nav-item la-courses__nav-item"><a class="nav-link la-courses__nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false"> <span class="position-relative">Design</span></a></li>
            </ul><a class="la-icon--3xl icon-filter d-none d-lg-block" id="filterCourses" role="button"></a>
          </nav>

          @php  

            $tattoo1 = new stdClass;$tattoo1->img= "https://picsum.photos/600/400";$tattoo1->course= "Tattoo Art";$tattoo1->rating= "4";$tattoo1->url= "";$tattoo1->creatorImg= "https://picsum.photos/100";$tattoo1->creatorName= "Joseph Phill";$tattoo1->creatorUrl= "/creator";
            $tattoo2 = new stdClass;$tattoo2->img= "https://picsum.photos/600/400"; $tattoo2->course= "Tattoo Art";$tattoo2->rating= "4";$tattoo2->url= "";$tattoo2->creatorImg= "https://picsum.photos/100";$tattoo2->creatorName= "Amy D'souza";$tattoo2->creatorUrl= "/creator";
            $tattoo3 = new stdClass;$tattoo3->img= "https://picsum.photos/600/400";$tattoo3->course= "Tattoo Art";$tattoo3->rating= "4";$tattoo3->url= "";$tattoo3->creatorImg= "https://picsum.photos/100";$tattoo3->creatorName= "Alton Crew";$tattoo3->creatorUrl= "/creator";
            $tattoo4 = new stdClass;$tattoo4->img= "https://picsum.photos/600/400";$tattoo4->course= "Tattoo Art";$tattoo4->rating= "4";$tattoo4->url= "";$tattoo4->creatorImg= "https://picsum.photos/100";$tattoo4->creatorName= "Nathan Spark";$tattoo4->creatorUrl= "/creator";
            $tattoo5 = new stdClass;$tattoo5->img= "https://picsum.photos/600/400";$tattoo5->course= "Tattoo Art"; $tattoo5->rating= "4";$tattoo5->url= ""; $tattoo5->creatorImg= "https://picsum.photos/100"; $tattoo5->creatorName= "Harry Lisa"; $tattoo5->creatorUrl= "/creator";
            $tattoo6 = new stdClass;$tattoo6->img= "https://picsum.photos/600/400";$tattoo6->course= "Tattoo Art";$tattoo6->rating= "4"; $tattoo6->url= "";$tattoo6->creatorImg= "https://picsum.photos/100";$tattoo6->creatorName= "Natalia Spark";$tattoo6->creatorUrl= "/creator";
            $tattoo7 = new stdClass;$tattoo7->img= "https://picsum.photos/600/400"; $tattoo7->course= "Tattoo Art";$tattoo7->rating= "4"; $tattoo7->url= "";$tattoo7->creatorImg= "https://picsum.photos/100";$tattoo7->creatorName= "Remo Joseph"; $tattoo7->creatorUrl= "/creator";

            $tattoos = array($tattoo1, $tattoo2, $tattoo3, $tattoo4, $tattoo5, $tattoo6, $tattoo7);
          @endphp

          <!-- Tattoo Art Tab: Start -->
          <div class="tab-content la-courses__content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
              <div class="row row-cols-lg-3">
      
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
            <!-- Tattoo Art Tab: End -->
            
            <!-- Rangoli Tab: Start -->
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
              <div class="row row-cols-lg-3">

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
             <!-- Rangoli Tab: End -->

             <!-- Design Tab: Start -->
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
              <div class="row row-cols-lg-3">

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
             <!-- Rangoli Tab: End -->

          </div>
        </div>
      </div>
    </div>
  </section>
  @endsection