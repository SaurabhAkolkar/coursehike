@php
  $creators = Cache::remember('footers_creators', config('cache.time'), function () { return App\User::where(['role'=>'mentors', 'status'=>1])->limit(6)->get(); });
  $footer_categories = Cache::remember('footers_categories', config('cache.time'), function () { return App\Categories::where(['status'=>1])->orderBy('featured','DESC')->limit(6)->get(); });
  $courses = Cache::remember('footers_courses', config('cache.time'), function () { return App\Course::where(['status'=>1])->orderBy('created_at','DESC')->limit(6)->get(); });
  $master_classes = Cache::remember('footers_master_classes', config('cache.time'), function () { return App\MasterClass::with(array('courses' => function($query) {$query->where(['status' => 1]);}))->orderBy('created_at','DESC')->limit(6)->get(); });
@endphp
<!-- Footer: Start-->
<footer class="la-footer">
    <div class="la-footer__inner">
      <div class="la-footer__top mb-5 pb-md-3">
        <div class="container-fluid">
          <div class="row">
            <!-- Column: Start-->
            <div class="col-12 col-md-6 col-lg-4 mb-10 mb-md-1">
              <div class="la-footer__brand mb-4 mb-md-5">
                <a href="/"><img class="img-fluid" src="/images/learners/logo.svg" alt="Lila" /></a>
              </div>
              <div class="la-footer__contact">
                <!-- <p class="la-footer__contact-address mb-2">K2, Old Sonal Industrial Est., Kanchpada, Malad Link Road, Malad West, Mumbai 400064. MH, India</p> -->
                <a class="la-footer__contact-link" href="mailto:support@lila.art"> <strong>support@lila.art</strong></a>
              </div>
              <ul class="la-footer__nav">
                <!-- <li class="la-footer__nav-item"><a class="la-footer__nav-link" href="">About Us</a></li> -->
                <!-- <li class="la-footer__nav-item"><a class="la-footer__nav-link" href="">Testimonials</a></li> -->
                <li class="la-footer__nav-item"><a class="la-footer__nav-link" href="/learning-plans">Learning Plans</a></li>
                @if(Auth::check() && Auth::user()->role != 'mentors')<li class="la-footer__nav-item"><a class="la-footer__nav-link" href="/become-mentor">Become a Mentor</a></li>@endif
                <li class="la-footer__nav-item"><a class="la-footer__nav-link" href="/guided-mentor">Guided Mentor</a></li>
                <!-- <li class="la-footer__nav-item"><a class="la-footer__nav-link" href="">Request a Tutorial</a></li> -->
                <!-- <li class="la-footer__nav-item"><a class="la-footer__nav-link" href="">Teaching Techniques</a></li> -->
                <li class="la-footer__nav-item"><a class="la-footer__nav-link" href="/about">About Us</a></li>
                <li class="la-footer__nav-item"><a class="la-footer__nav-link" href="/contact">Contact Us</a></li>
                <li class="la-footer__nav-item"><a class="la-footer__nav-link" href="/learning-plans">Start Free Trial</a></li>
                <li class="la-footer__nav-item"><a class="la-footer__nav-link" href="/terms-conditions" target="_blank">Terms & Conditions</a></li>
                <li class="la-footer__nav-item"><a class="la-footer__nav-link" href="/cancellations-refund">Cancellations & Refund</a></li>
                <li class="la-footer__nav-item"><a class="la-footer__nav-link" href="https://www.alienstattooschool.com/" target="_blank">Aliens Tattoo School</a></li>
              </ul>

              <div class="la-footer__social mt-4">
                  <a class="la-footer__social-link mr-2" href="https://www.facebook.com/learnitlikealiens" target="_blank"><span class="la-icon la-icon--5xl icon-facebook"></span></a>
                  <a class="la-footer__social-link mr-2" href="https://www.instagram.com/learnitlikealiens/" target="_blank"><span class="la-icon la-icon--5xl icon-insta"></span></a>
                  <a class="la-footer__social-link mr-2" href="https://www.youtube.com/channel/UC1LRPWR4rltOLKiR7e-pWEg" target="_blank"><span class="la-icon la-icon--5xl icon-youtube"></span></a>
              </div>
            </div>
            <!-- Column: End-->
            <!-- Column: Start-->
            <div class="col-12  col-md-6  col-lg-5">
              <div class="row row-cols-2 mt-md-18">
                {{-- <div class="col-6 mb-10">
                  <div class="la-footer__title">Categories</div>
                  <ul class="la-footer__list">
                    @foreach ($footer_categories as $fc)
                      <li class="la-footer__list-item"><a href="/category/{{$fc->id}}/{{$fc->title}}" class="la-footer__list-link" >{{$fc->title}}</a></li>
                    @endforeach
                  </ul><a class="la-footer__more" href="/browse/courses">See all</a>
                </div> --}}

                <div class="col-6 mb-10">
                  <div class="la-footer__title">Courses</div>
                  <ul class="la-footer__list">
                    @foreach ($courses as $c)
                      <li class="la-footer__list-item"><a class="la-footer__list-link" href="/learn/course/{{$c->id}}/{{$c->slug}}">{{$c->title}}</a></li>
                    @endforeach
                  </ul><a class="la-footer__more" href="/browse/courses">See all</a>
                </div>


              </div>
            </div>
            <!-- Column: End-->
            <!-- Column: Start-->
            <div class="col-12 col-md-6 col-lg-3">
              <div class="mt-md-18">
                <div class="col-12 px-0 mb-10">
                  <div class="la-footer__title">Master Classes</div>
                  <ul class="la-footer__list">
                    @foreach($master_classes as $mc)
                      @if($mc->courses != null)
                        <li class="la-footer__list-item"><a href="/learn/course/{{ $mc->courses->id }}/{{ $mc->courses->slug }}" class="la-footer__list-link">{{ $mc->courses->title }}</a></li>
                      @endif
                    @endforeach
                  </ul><a class="la-footer__more" href="/master-classes">See all</a>
                </div>

                <div class="col-12 px-0 mb-10">
                  <div class="la-footer__title">Mentors</div>
                  <ul class="la-footer__list">
                    @foreach ($creators as $c)
                      <li class="la-footer__list-item"><a class="la-footer__list-link" href="/mentor/{{$c->id}}">{{$c->fullName}}</a></li>
                    @endforeach
                  </ul><a class="la-footer__more" href="/mentors">See all</a>
                </div>
              </div>
              <!-- <div class="la-footer__search"> -->
                 <!-- Global Search: Start-->
                <!-- <div class="la-gsearch mb-md-4">
                  <form class="form-inline d-flex align-items-start" action="{{ url('/explore') }}" method="get">
                    <div class="form-group ">
                      <input class="la-gsearch__input w-100 form-control la-gsearch__input-footersearch" style="border-left:1px solid rgba(229,229,229,0.2); background:transparent;font-size:15px" type="text" name="course_name" value="{{isset($search_input)?$search_input:''}}" required placeholder="What you want to learn today?">
                    </div>
                    <button class="la-gsearch__submit  btn text-white" type="submit">
                      <i class="la-icon icon icon-search la-gsearch__input-footericon"></i>
                    </button>
                  </form>
                </div> -->
                <!-- Global Search: End-->
              <!-- </div> -->

            </div>
            <!-- Column: End-->
          </div>
          <!-- Row: End-->
          <!-- Row: Start-->
        </div>
      </div>
      <div class="la-footer__btm mt-5 pt-3">
        <div class="la-footer__copyright text-center">Copyright © Lila Art School. All Rights Reserved</div>
      </div>
    </div>
  </footer>
  <!-- Footer: End-->
