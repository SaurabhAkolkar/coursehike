@extends('learners.layouts.app')
<!-- Playlist Alert Message-->
@if(session('message'))
<div class="la-btn__alert position-relative">
  <div class="la-btn__alert-success col-lg-4 offset-lg-4  alert alert-success alert-dismissible fade show" role="alert">
      <span class="la-btn__alert-msg">{{session('message')}}</span>
      <button type="button" class="close la-btn__alert-close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true" style="color:#56188C">&times;</span>
      </button>
  </div>
</div>
@endif

<!-- Wishlist Alert Message-->
<div id="wishlist_alert_div"></div> 
@section('content')

<section class="la-section__small la-cbg--main">
    <div class="la-section__inner">
      <div class="container">
        <a class="la-icon la-icon--5xl icon-back-arrow d-block d-md-none ml-n1 mt-n2 mb-2" href="{{URL::previous()}}"></a>
        <div class="d-flex justify-content-between la-anim__wrap">  
          <h1 class="la-page__title mb-16 mb-md-8 la-anim__stagger-item">Master Classes</h1>
          <a class="la-icon--2xl icon-filter d-none d-lg-none" id="filterCourses" role="button"></a>
        </div>  

            <section class="la-section la-section--classes la-section--grey position-relative la-anim__wrap">
                <div class="la-section__inner">
                <div class="container px-0">
                    <div class="la-mccourses py-4">
                      <div class="row justify-content-center px-0 la-anim__stagger la-anim__A">

                      @if(count($master_classes) == 0)
                      <div class="la-empty__courses w-100 d-md-flex justify-content-between align-items-center mx-5 mt-0 mt-md-6">
                          <div class="la-empty__inner">
                              <h6 class="col la-empty__course-title text-xl la-anim__stagger-item">No Master Classes</h6>
                          </div>
                          <div class="col text-md-right la-empty__browse-courses mt-n4 la-anim__stagger-item--x">
                              <a href="/browse/courses" class="la-empty__browse">
                                  Browse Courses
                                  <span class="la-empty__browse-icon la-icon la-icon--5xl icon-grey-arrow "></span>
                              </a>
                          </div>
                      </div>  

                      @else
                      
                          @foreach ($master_classes as $master)
                              <x-master-class
                              :img="$master->courses->preview_image"
                              :title="$master->courses->title"
                              :profileImg="'https://picsum.photos/100/100'"
                              :profileName="$master->courses->user->fullName"
                              :learners="'300'"
                              :id="$master->courses->id"
                              :slug="$master->courses->slug"
                              />
                          @endforeach

                      @endif
                          
                      </div>
                    </div>
                </div>
                </div>
            </section>
        </div>
      </div>
    </div>
  </section>
  @endsection
  @section('footerScripts')
      <script>
          $('input[type=radio][name=sort_by]').change(function() {
             window.location.href= '{{url()->current()}}?sort_by='+this.value;

          });
      </script>
  @endsection