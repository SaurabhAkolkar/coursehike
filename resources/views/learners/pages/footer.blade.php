@php
  $creators = App\User::where(['role'=>'mentors', 'status'=>1])->limit(6)->get();
  $footer_categories = App\Categories::where(['status'=>1])->orderBy('featured','DESC')->limit(6)->get();
  $courses = App\Course::where(['status'=>1])->limit(6)->get();
  $master_classes = App\MasterClass::with('courses')->limit(6)->get();
@endphp
<!-- Footer: Start-->
<footer class="la-footer">
    <div class="la-footer__inner">
      <div class="la-footer__top mb-5 pb-3">
        <div class="container">
          <div class="row">
            <!-- Column: Start-->
            <div class="col-7 col-lg-2">
              <div class="la-footer__brand mb-md-8">
                <a href="/"><img class="img-fluid" src="/images/learners/logo.svg" alt="Lila"></a>
              </div>
              <div class="la-footer__contact">
                <p class="la-footer__contact-address mb-2">K2, Old Sonal Industrial Est., Kanchpada, Malad Link Road, Malad West, Mumbai 400064. MH, India</p><a class="la-footer__contact-link" href="mailto:ask@learnitlikealiens.com"> <strong>ask@learnitlikealiens.com</strong></a>
              </div>
            </div>
            <!-- Column: End-->
            <!-- Column: Start-->
            <div class="col-12 col-lg-5 offset-lg-1">
              <div class="row row-cols-2 mt-md-18">
                <div class="col-12 col-sm-6 mb-5">
                  <div class="la-footer__title">Categories</div>
                  <ul class="la-footer__list">
                    @foreach ($footer_categories as $fc)
                      <li class="la-footer__list-item"><a href="#" class="la-footer__list-link" >{{$fc->title}}</a></li>
                    @endforeach
                  </ul><a class="la-footer__more" href="/browse/courses">See all</a>
                </div>

                <div class="col-12 col-sm-6  mb-8 mb-md-5">
                  <div class="la-footer__title">Creators</div>
                  <ul class="la-footer__list">
                    @foreach ($creators as $c)
                      <li class="la-footer__list-item"><a class="la-footer__list-link" href="/creator/{{$c->id}}">{{$c->fullName}}</a></li>
                    @endforeach
                  </ul><a class="la-footer__more" href="/mentors">See all</a>
                </div>

                <div class="col-12 col-sm-6 mb-8 mb-md-5">
                  <div class="la-footer__title">Courses</div>
                  <ul class="la-footer__list">
                    @foreach ($courses as $c)
                      <li class="la-footer__list-item"><a class="la-footer__list-link" href="/learn/course/{{$c->id}}/{{$c->slug}}">{{$c->title}}</a></li>
                    @endforeach
                  </ul><a class="la-footer__more" href="/browse/courses">See all</a>
                </div>

                <div class="col-12 col-sm-6 mb-8 mb-md-5">
                  <div class="la-footer__title">Master Classes</div>
                  <ul class="la-footer__list">
                    @foreach($master_classes as $mc)
                    <li class="la-footer__list-item"><a href="/learn/course/{{ $mc->courses->id }}/{{ $mc->courses->slug }}" class="la-footer__list-link">{{ $mc->courses->title }}</a></li>
                    @endforeach
                  </ul><a class="la-footer__more" href="/master-classes">See all</a>
                </div>

              </div>
            </div>
            <!-- Column: End-->
            <!-- Column: Start-->
            <div class="col-12 col-lg-4">
              <!-- <div class="la-footer__search"> -->
                 <!-- Global Search: Start-->
                <!-- <div class="la-gsearch mb-md-4">
                  <form class="form-inline d-flex align-items-start" action="{{ url('/search-course/') }}" method="get">
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
              <ul class="la-footer__nav mt-md-18">
                <!-- <li class="la-footer__nav-item"><a class="la-footer__nav-link" href="">About Us</a></li> -->
                <!-- <li class="la-footer__nav-item"><a class="la-footer__nav-link" href="">Testimonials</a></li> -->
                <li class="la-footer__nav-item"><a class="la-footer__nav-link" href="https://www.alienstattooschool.com/" target="_blank">Aliens Tattoo School</a></li>
                <li class="la-footer__nav-item"><a class="la-footer__nav-link" href="/learning-plans">Learning Plans</a></li>
                <li class="la-footer__nav-item"><a class="la-footer__nav-link" href="/become-creator">Become a Creator</a></li>
                <li class="la-footer__nav-item"><a class="la-footer__nav-link" href="/guided-creator">Guided Creator</a></li>
                <!-- <li class="la-footer__nav-item"><a class="la-footer__nav-link" href="">Request a Tutorial</a></li> -->
                <!-- <li class="la-footer__nav-item"><a class="la-footer__nav-link" href="">Teaching Techniques</a></li> -->
                <li class="la-footer__nav-item"><a class="la-footer__nav-link" href="/about">About Us</a></li>
                <li class="la-footer__nav-item"><a class="la-footer__nav-link" href="/contact">Contact Us</a></li>
                <li class="la-footer__nav-item"><a class="la-footer__nav-link" href="/learning-plans">Start Free Trial</a></li>
                <li class="la-footer__nav-item"><a class="la-footer__nav-link" href="/cancellations-refund">Cancellations & Refund</a></li>
              </ul>

              <div class="la-footer__social mt-md-14">
                  <a class="la-footer__social-link mr-2" href="https://www.facebook.com/learnitlikealiens" target="_blank"><span class="la-icon la-icon--5xl icon-facebook"></span></a>
                  <a class="la-footer__social-link mr-2" href="https://www.instagram.com/learnitlikealiens/" target="_blank"><span class="la-icon la-icon--5xl icon-insta"></span></a>
                  <a class="la-footer__social-link mr-2" href="https://www.youtube.com/channel/UC1LRPWR4rltOLKiR7e-pWEg" target="_blank"><span class="la-icon la-icon--5xl icon-youtube"></span></a>
              </div>
            </div>
            <!-- Column: End-->
          </div>
          <!-- Row: End-->
          <!-- Row: Start-->
        </div>
      </div>
      <div class="la-footer__btm mt-5 pt-3">
        <div class="la-footer__copyright text-center">Copyright © Lila Alien School. All Rights Reserved</div>
      </div>
    </div>
  </footer>
  <!-- Footer: End-->