@extends('learners.layouts.app')

@section('content')
<section class="la-section la-cbg--main">
    <div class="la-section__inner">
      <div class="container">
        <!-- Playlist Alert Message-->
        @if(session('message'))
          <div class="la-btn__alert-success col-md-4 offset-md-8  alert alert-success alert-dismissible" role="alert">
              <h6 class="la-btn__alert-msg">{{session('message')}}</h6>
              <button type="button" class="close mt-1" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true" class="text-white">&times;</span>
              </button>
          </div>
        @endif

        <!-- Wishlist Alert Message-->
        <div id="wishlist_alert_div"></div> 

        <a class="la-icon la-icon--5xl icon-back-arrow d-block d-md-none ml-n1 mt-n2 mb-5" href="{{URL::previous()}}"></a>
        <div class="d-flex justify-content-between la-anim__wrap">  
          <h1 class="la-page__title mb-8 la-anim__stagger-item">Browse Courses</h1><a class="la-icon--3xl icon-filter d-block d-lg-none" id="filterCourses" role="button"></a>
        </div>
        
        <!-- Global Search: Start-->
        <div class="la-gsearch la-anim__wrap">
          <form class="form-inline la-anim__stagger-item"  action="{{ url('/search-course/') }}">
            <div class="form-group ">
              <input class="la-gsearch__input form-control" style="width:270px; background:transparent" name="course_name" type="text" placeholder="What you want to learn today?">
            </div>
            <button class="la-gsearch__submit btn" type="submit"><i class="la-icon la-icon--3xl icon icon-search"></i></button>
          </form>
        </div>
        <!-- Global Search: End-->

        

        <div class="la-courses mt-6 mt-md-14 la-anim__wrap">
          <nav class="la-courses__nav d-flex justify-content-between">
            <ul class="nav nav-pills la-courses__nav-tabs " id="nav-tab" role="tablist">
              {{-- <li class="nav-item la-courses__nav-item"><a class="nav-link la-courses__nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"> <span class="position-relative">Tattoo</span></a></li>
              <li class="nav-item la-courses__nav-item"><a class="nav-link la-courses__nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"> <span class="position-relative">Rangoli</span></a></li>
              <li class="nav-item la-courses__nav-item"><a class="nav-link la-courses__nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false"> <span class="position-relative">Design</span></a></li> --}}
              @foreach ($categories as $category)
                <li class="nav-item la-courses__nav-item la-anim__stagger-item--x"><a class="nav-link la-courses__nav-link @if ($loop->first) active @endif " id="nav-{{$category->slug}}-tab" data-toggle="tab" href="#nav-{{$category->slug}}" role="tab" aria-controls="nav-{{$category->slug}}" aria-selected="true"> <span class="position-relative">{{ $category->title}}</span></a></li>
              @endforeach
            </ul><a class="la-icon--3xl icon-filter d-none d-lg-block" id="filterCourses" role="button"></a>
          </nav>

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
                  

          <!-- Tattoo Art Tab: Start -->
          <div class="tab-content la-courses__content la-anim__wrap" id="nav-tabContent">

            @foreach ($categories as $category)
              <div class="tab-pane fade show @if ($loop->first) active @endif" id="nav-{{$category->slug}}" role="tabpanel" aria-labelledby="nav-{{$category->slug}}-tab">
                <div class="row row-cols-lg-3 la-anim__stagger-item">
                      @foreach($category->courses as $course)
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
            @endforeach
            {{-- <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
              <div class="row row-cols-lg-3">
      
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
                
              </div>
            </div>
            <!-- Tattoo Art Tab: End -->
            
            <!-- Rangoli Tab: Start -->
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
              <div class="row row-cols-lg-3">

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

              </div>
            </div>
             <!-- Rangoli Tab: End -->

             <!-- Design Tab: Start -->
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
              <div class="row row-cols-lg-3">

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
                  
              </div>
            </div> --}}
             <!-- Rangoli Tab: End -->

          </div>
        </div>
      </div>
    </div>
  </section>

  
  @endsection
  
  @section('footerScripts')
  <script>
   function addToCart(id='1', classes='all') {

      let course_id = id;
      if(classes != 'all'){

      }

      if(course_id){
        $.ajax({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type:"get",
          url: '/add-to-cart',
          data: {course_id: course_id, classes : classes},
          success:function(data){   
            $('#wishlist_alert_div').html(' ');
            $('#course_'+id).remove(); 
            let successAlert = `<div class="la-btn__alert-success col-md-4 offset-md-8 alert alert-success alert-dismissible" id="wishlist_alert" role="alert">
                                  <h6 id="wishlist_alert_message" class="la-btn__alert-msg">${data}</h6>
                                  <button type="button" class="close mt-1" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true" class="text-white">&times;</span>
                                  </button>
                                </div>`
            $('#wishlist_alert_div').html(successAlert);
            window.setTimeout(function() {
              $(".alert").fadeTo(500, 0).slideUp(500, function() {
                  $(this).remove();
              });
            }, 3000);
                  
          },
          error: function(XMLHttpRequest, textStatus, errorThrown) {
            console.log(XMLHttpRequest);
          }
        });
      }else{
        alert('Something went wrong');
      }
   
   }
  </script>
  @endsection