<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          @if(Auth::User()->user_img != null || Auth::User()->user_img !='')
          <img src="{{ Auth::User()->user_img}}"  class="rounded-circle img-fluid d-block" alt="User Image">

          @else
          <img src="{{ asset('images/default/user.jpg') }}"  class="rounded-circle img-fluid d-block" alt="User Image">

          @endif
        </div>

        <div class="pull-left info">
            <p class="mb-1">{{ Auth::User()->fname }}</p>
            <a href="#"><i class="fa fa-circle text-success"></i> {{ __('adminstaticword.Admin') }}</a>
        </div>
      </div>

      @if(Auth::User()->role == "admin")
        <ul class="sidebar-menu" data-widget="tree">
          <!-- <li class="header">{{ __('adminstaticword.Navigation') }}</li> -->
        
          <li class="{{ Nav::isRoute('admin.index') }}"><a href="{{route('admin.index')}}" class="d-flex align-items-center"><i class="la-icon la-icon--md icon-dashboard mr-5" aria-hidden="true"></i><span>{{ __('adminstaticword.Dashboard') }}</span></a></li>

          <li class="{{ Nav::isRoute('user.index') }} {{ Nav::isRoute('create.subscription') }} {{ Nav::isRoute('store.user.course') }} {{ Nav::isRoute('user.add') }} {{ Nav::isRoute('user.edit') }}"><a href="{{route('user.index')}}" class="d-flex align-items-center"><i class="la-icon la-icon--lg icon-users  mr-4" aria-hidden="true"></i><span>{{ __('adminstaticword.Users') }}</span></a></li>

          @if(isset($zoom_enable) && $zoom_enable == 1)
          <li class="{{ Nav::isRoute('meeting.create') }} {{ Nav::isRoute('zoom.show') }} {{ Nav::isRoute('zoom.edit') }} {{ Nav::isRoute('zoom.setting') }} {{ Nav::isRoute('zoom.index') }} {{ Nav::isRoute('meeting.show') }} treeview">
            <a href="#">
              <i class="flaticon-live-1" aria-hidden="true"></i> <span>{{ __('Zoom Live Meetings') }}</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ Nav::isRoute('zoom.setting') }}"><a href="{{route('zoom.setting')}}"><i class="flaticon-settings-1"></i>{{ __('Zoom Settings') }}</a></li>
              <li class="{{ Nav::isRoute('zoom.index') }} {{ Nav::isRoute('zoom.show') }} {{ Nav::isRoute('zoom.edit') }} {{ Nav::isRoute('meeting.create') }}"><a href="{{route('zoom.index')}}"><i class="fa fa-file-text-o"></i>{{ __('Zoom Dashboard') }}</a></li>
              <li class="{{ Nav::isRoute('meeting.show') }}"><a href="{{route('meeting.show')}}"><i class="flaticon-online-education"></i>{{ __('adminstaticword.AllMeetings') }}</a></li>
            </ul>
          </li>
          @endif

          @if(isset($global_settings) && $global_settings->bbl_enable == 1)
              <li class="{{ Nav::isRoute('bbl.setting') }} {{ Nav::isRoute('bbl.all.meeting') }} {{ Nav::isRoute('download.meeting') }} treeview">
                <a href="#">
                  <i class="flaticon-honesty" aria-hidden="true"></i> <span>{{ __('Big Blue Meetings') }}</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li class="{{ Nav::isRoute('bbl.setting') }}"><a href="{{ route('bbl.setting') }}"><i class="flaticon-settings"></i>{{ __('Big Blue Button Settings') }}</a></li>
                  <li class="{{ Nav::isRoute('bbl.all.meeting') }}"><a href="{{ route('bbl.all.meeting') }}"><i class="flaticon-terms-and-conditions"></i>{{ __('List Meetings') }}</a></li>
                </ul>
              </li>
          @endif

          <!-- <li class="{{ Nav::isResource('admin/country') }} {{ Nav::isResource('admin/state') }} {{ Nav::isResource('admin/city') }} treeview">
            <a href="#">
              <i class="flaticon-location" aria-hidden="true"></i> <span>{{ __('adminstaticword.Location') }}</span>
              <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ Nav::isResource('admin/country') }}"><a href="{{url('admin/country')}}"><i class="flaticon-flag"></i>{{ __('adminstaticword.Country') }}</a></li>
              <li class="{{ Nav::isResource('admin/state') }}"><a href="{{url('admin/state')}}"><i class="flaticon-placeholder"></i>{{ __('adminstaticword.State') }}</a></li>
              <li class="{{ Nav::isResource('admin/city') }}"><a href="{{url('admin/city')}}"><i class="flaticon-home"></i>{{ __('adminstaticword.City') }}</a></li>
            </ul>
          </li> -->

          <!--
          <li class="{{ Nav::isResource('currency') }}"><a href="{{url('currency')}}"> <i class="flaticon-wallet"></i><span>{{ __('adminstaticword.Currency') }}</span></a></li>
          -->

          <li class="@if(Request::segment(1) == 'category' || Request::segment(1) == 'subcategory' || Request::segment(1) == 'course' || Request::segment(1) == 'featuredcourses' ) active menu-open @endif {{ Nav::isResource('category') }} {{ Nav::isResource('subcategory') }} {{ Nav::isResource('publishrequest') }} {{ Nav::isResource('childcategory') }} {{ Nav::isResource('bundle') }} {{ Nav::isResource('courselang') }}  {{Nav::isResource('coursereviewunpublish')}} treeview">
            <a href="#" class="d-flex align-items-center">
                <i class="la-icon la-icon--lg icon-courses mr-4"></i>{{ __('adminstaticword.Course') }}
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>                            

            <ul class="treeview-menu">
              <li class="{{ Nav::isResource('category') }}  {{ Nav::isResource('subcategory') }} {{ Nav::isResource('childcategory') }}  treeview">
                  <a href="#" class="d-flex align-items-center"><i class="la-icon la-icon--md icon-categories mr-4"></i>{{ __('adminstaticword.Category') }}<i class="fa fa-angle-left pull-right"></i></a>
                  
                  <ul class="treeview-menu">
                    <li class="@if(Request::segment(1) == 'category') active @endif"><a href="{{url('category')}}" class="d-flex align-items-center"><i class="la-icon la-icon--sm icon-categories mr-4"></i>{{ __('adminstaticword.Category') }}</a></li>
                    <li class="@if(Request::segment(1) == 'subcategory') active @endif"><a href="{{url('subcategory')}}" class="d-flex align-items-center"><i class="la-icon la-icon--sm icon-sub-category mr-4"></i>{{ __('adminstaticword.SubCategory') }}</a></li>
                    {{--<li class="{{ Nav::isResource('childcategory') }}"><a href="{{url('childcategory')}}" class="d-flex align-items-center"><i class="la-icon la-icon--sm icon-child-category mr-4"></i>{{ __('adminstaticword.ChildCategory') }}</a></li> --}}
                  </ul>

                  <li class="@if(Request::segment(1) == 'course') active @endif"><a href="{{url('course')}}" class="d-flex align-items-center"><i class="la-icon la-icon--md icon-courses mr-4"></i><span>{{ __('adminstaticword.Classes') }}</span></a></li>

                  <li class="@if(Request::segment(1) == 'featuredcourses') active @endif"><a href="{{url('featuredcourses')}}" class="d-flex align-items-center"><i class="la-icon la-icon--md icon-courses mr-4"></i><span>{{ __('adminstaticword.featuredClasses') }}</span></a></li>

                  <!-- <li class="{{ Nav::isResource('bundle') }}"><a href="{{url('bundle')}}"><i class="flaticon-interface" aria-hidden="true"></i><span>{{ __('adminstaticword.BundleCourse') }}</span></a></li> -->

                  <li class="{{ Nav::isResource('courselang') }}"><a href="{{url('courselang')}}" class="d-flex align-items-center"><i class="la-icon la-icon--md icon-course-language mr-4" aria-hidden="true"></i><span>{{ __('adminstaticword.CourseLanguage') }}</span></a></li>
                  
                  <li class="{{ Nav::isResource('publishrequest') }}"><a href="{{url('publishrequest')}}" class="d-flex align-items-center"><i class="la-icon la-icon--lg icon-published-course mr-3" aria-hidden="true"></i><span>{{ __('adminstaticword.PublishRequest') }}</span></a></li>
                  
                  <li class="{{ Nav::isResource('coursereviewunpublish') }}"><a href="{{url('coursereviewunpublish')}}" class="d-flex align-items-center"><i class="la-icon la-icon--lg icon-unpublished-course mr-3" aria-hidden="true"></i><span>{{ __('adminstaticword.UnpublishRequest') }}</span></a></li>

                  {{-- @if($global_settings->assignment_enable == 1)
                    <li class="{{ Nav::isRoute('assignment.view') }}"><a href="{{route('assignment.view')}}" class="d-flex align-items-center"><i class="flaticon-computer" aria-hidden="true"></i><span>{{ __('adminstaticword.Assignment') }}</span></a></li>
                  @endif --}}
                  
              </li>
            </ul>
          </li>

          <li class="{{ Nav::isResource('coupon') }}"><a href="{{url('coupon')}}" class="d-flex align-items-center"><i class="la-icon  la-icon--lg icon-coupon mr-4" aria-hidden="true"></i><span>{{ __('adminstaticword.Coupon') }}</span></a></li>

          <li class="{{ Nav::isRoute('all.instructor') }} {{ Nav::isResource('requestinstructor') }} treeview">
           <a href="#" class="d-flex align-items-center">
             <i class="la-icon la-icon--xl icon-all-mentors mr-3" aria-hidden="true"></i> <span>{{ __('adminstaticword.Instructor') }}</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ Nav::isRoute('all.instructor') }}"><a href="{{route('all.instructor')}}" class="d-flex align-items-center"><i class="la-icon la-icon--lg icon-all-mentors mr-3"></i>{{ __('adminstaticword.AllInstructor') }}</a></li>
              <li class="{{ Nav::isResource('requestinstructor') }}"><a href="{{url('requestinstructor')}}" class="d-flex align-items-center"><i class="la-icon la-icon--md icon-request mr-4"></i>{{ __('adminstaticword.InstructorRequest') }}</a></li>
            </ul>
          </li> 
          

          <li class="{{ Nav::isResource('order') }}"><a href="{{url('order')}}" class="d-flex align-items-center"><i class="la-icon la-icon--lg icon-revenue mr-4" aria-hidden="true"></i><span>{{ __('adminstaticword.Order') }}</span></a></li>
         
         <!-- <li class="{{ Nav::isResource('page') }}"><a href="{{url('page')}}"><i class="la-icon la-icon--lg icon-pages mr-4" aria-hidden="true"></i><span>{{ __('adminstaticword.Pages') }}</span></a></li> -->
          
          <li class="{{ Nav::isResource('faq') }} {{ Nav::isResource('faqinstructor') }}  treeview">
            <a href="#" class="d-flex align-items-center">
             <i class="la-icon la-icon--lg icon-faq mr-4" aria-hidden="true"></i> <span>{{ __('adminstaticword.Faq') }}</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="@if(Request::segment(1) == 'faq') active @endif"><a href="{{url('faq')}}" class="d-flex align-items-center"><i class="la-icon la-icon--lg icon-learner-faq mr-3"></i> <span>{{ __('adminstaticword.FaqStudent') }}</span></a></li>
              <li class="{{ Nav::isResource('faqinstructor') }}"><a href="{{url('faqinstructor')}}" class="d-flex align-items-center"><i class="la-icon la-icon--lg icon-mentor-faq mr-3"></i><span>{{ __('adminstaticword.FaqInstructor') }}</span></a></li>
            </ul>
          </li> 

         <li class="{{ Nav::isRoute('instructor.settings') }} {{ Nav::isRoute('admin.instructor') }} {{ Nav::isRoute('admin.completed') }}  treeview">
           <a href="#" class="d-flex align-items-center">
             <i class="la-icon la-icon--xl icon-mentor-payout mr-3" aria-hidden="true"></i> <span>{{ __('adminstaticword.InstructorPayout') }}</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              {{-- <li class="{{ Nav::isRoute('instructor.settings') }}"><a href="{{route('instructor.settings')}}" class="d-flex align-items-center"><i class="la-icon la-icon--lg icon-payout-settings mr-3"></i>{{ __('adminstaticword.PayoutSettings') }}</a></li>
              <li class="{{ Nav::isRoute('admin.instructor') }}"><a href="{{route('admin.instructor')}}" class="d-flex align-items-center"><i class="la-icon la-icon--lg icon-pending-payout mr-3"></i>{{ __('adminstaticword.PendingPayout') }}</a></li>
              <li class="{{ Nav::isRoute('admin.completed') }}"><a href="{{route('admin.completed')}}" class="d-flex align-items-center"><i class="la-icon la-icon--lg icon-completed-payout mr-3"></i>{{ __('adminstaticword.CompletedPayout') }}</a></li> --}}
              
              <li class="{{ Nav::isRoute('admin.creatorpayoutanalytics') }}"><a href="{{route('admin.creatorpayoutanalytics')}}" class="d-flex align-items-center"><i class="la-icon la-icon--lg icon-mentor-payout mr-3"></i>Payout Analytics</a></li>
              <li class="{{ Nav::isRoute('admin.creatorpayout') }}"><a href="{{route('admin.creatorpayout')}}" class="d-flex align-items-center"><i class="la-icon la-icon--lg icon-mentor-payout mr-3"></i>{{ __('adminstaticword.CreatorPayout') }}</a></li>
            
            </ul>
          </li> 

          <!-- <li class="{{ Nav::isResource('user/course/report') }}  treeview">
           <a href="#">
             <i class="flaticon-flag" aria-hidden="true"></i> <span>{{ __('adminstaticword.Report') }}</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ Nav::isResource('user/course/report') }}"><a href="{{url('user/course/report')}}"><i class="flaticon-error"></i><span>{{ __('adminstaticword.Report') }} Course</span></a></li>
              <li class="{{ Nav::isResource('user/question/report') }}"><a href="{{url('user/question/report')}}"><i class="flaticon-question-mark"></i><span>{{ __('adminstaticword.Report') }} Question</span></a></li>
            </ul>
          </li> -->

          <li class="{{ Nav::isResource('slider') }} {{ Nav::isResource('settings') }} {{ Nav::isResource('facts') }} {{ Nav::isRoute('category.slider') }} {{ Nav::isResource('firstsection') }} {{Nav::isResource('featuredMentors')}} {{ Nav::isResource('coursetext') }} {{ Nav::isResource('getstarted') }} {{ Nav::isResource('trusted') }} {{ Nav::isRoute('widget.setting') }} {{ Nav::isRoute('terms') }} {{ Nav::isResource('testimonial') }} treeview">
           <a href="#" class="d-flex align-items-center">
             <i class="la-icon la-icon--xl icon-front-Settings mr-3" aria-hidden="true"></i> <span>{{ __('adminstaticword.Setting') }}</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="@if(Request::segment(1) == 'settings') active @endif" ><a href="{{url('settings')}}"  class="d-flex align-items-center"><i class="la-icon la-icon--lg icon-settings mr-4" aria-hidden="true"></i><span>General {{ __('adminstaticword.Setting') }}</span></a></li>
              <!-- <li class="@if(Request::segment(1) == 'slider') active @endif"><a href="{{url('slider')}}" class="d-flex align-items-center"><i class="la-icon la-icon--xl icon-sliders mr-3"></i><span>{{ __('adminstaticword.Slider') }}</span></a></li>
              <li class="@if(Request::segment(1) == 'facts') active @endif"><a href="{{url('facts')}}" class="d-flex align-items-center"><i class="la-icon la-icon--lg icon-fact-sliders mr-4"></i><span>{{ __('adminstaticword.FactsSlider') }}</span></a></li>
              <li class="@if(Request::segment(1) == 'frontslider') active @endif"><a href="{{route('category.slider')}}" class="d-flex align-items-center"><i class="la-icon la-icon--xl icon-category-sliders mr-3"></i><span>{{ __('adminstaticword.CategorySlider') }}</span></a></li>
              <li class="@if(Request::segment(1) == 'coursetext') active @endif"><a href="{{url('coursetext')}}" class="d-flex align-items-center"><i class="la-icon la-icon--xl icon-course-text mr-3"></i> {{ __('adminstaticword.CourseText') }}</a></li>
              <li class="@if(Request::segment(1) == 'getstarted') active @endif"><a href="{{url('getstarted')}}" class="d-flex align-items-center"><i class="la-icon la-icon--lg icon-get-started mr-4"></i>{{ __('adminstaticword.GetStarted') }}</a></li>
              <li class="@if(Request::segment(1) == 'trusted') active @endif"><a href="{{url('trusted')}}" class="d-flex align-items-center"><i class="la-icon la-icon--md icon-trusted-sliders mr-5"></i><span>{{ __('adminstaticword.TrustedSlider') }}</span></a></li>
              <li class="@if(Request::segment(1) == 'widget') active @endif"><a href="{{route('widget.setting')}}" class="d-flex align-items-center"><i class="la-icon la-icon--lg icon-widget-settings mr-4"></i>{{ __('adminstaticword.WidgetSetting') }}</a></li>-->
              <li class="@if(Request::segment(1) == 'testimonial') active @endif"><a href="{{url('testimonial')}}" class="d-flex align-items-center"><i class="la-icon la-icon--lg icon-testimonials mr-4"></i>{{ __('adminstaticword.Testimonial') }}</a></li>
              <li class="@if(Request::segment(1) == 'firstsection') active @endif"><a href="{{url('firstsection')}}" class="d-flex align-items-center"><i class="la-icon la-icon--lg icon-first-section mr-4"></i>{{ __('adminstaticword.FirstSection') }}</a></li>
              <li class="@if(Request::segment(1) == 'featuredMentors') active @endif"><a href="{{url('featuredMentors')}}" class="d-flex align-items-center"><i class="la-icon la-icon--lg icon-featured-mentor mr-4"></i>{{ __('adminstaticword.FeaturedMentors') }}</a></li>
            </ul>
          </li>
          
           <!--<li class="{{ Nav::isRoute('gen.set') }} {{ Nav::isRoute('api.setApiView') }} {{ Nav::isResource('blog') }} {{ Nav::isRoute('about.page') }} {{ Nav::isRoute('careers.page') }} {{ Nav::isRoute('comingsoon.page') }} {{ Nav::isRoute('termscondition') }} {{ Nav::isRoute('policy') }} {{ Nav::isRoute('bank.transfer') }} {{ Nav::isRoute('show.pwa') }} {{ Nav::isRoute('adsense') }} treeview">
           <a href="#">
             <i class="flaticon-tools" aria-hidden="true"></i> <span>{{ __('adminstaticword.SiteSetting') }}</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ Nav::isRoute('gen.set') }}"><a href="{{route('gen.set')}}"><i class="flaticon-admin"></i><span>{{ __('adminstaticword.Setting') }}</span></a></li>
              <li class="{{ Nav::isRoute('api.setApiView') }}"><a href="{{route('api.setApiView')}}"><i class="flaticon-report"></i>{{ __('adminstaticword.APISetting') }}</a></li>
              
              <li class="{{ Nav::isResource('blog') }}"><a href="{{url('blog')}}"><i class="flaticon-real-state"></i>{{ __('adminstaticword.Blog') }}</a></li>
              <li class="{{ Nav::isRoute('about.page') }}"><a href="{{route('about.page')}}"><i class="flaticon-book"></i>{{ __('adminstaticword.About') }}</a></li>
              <li class="{{ Nav::isRoute('careers.page') }}"><a href="{{route('careers.page')}}"><i class="flaticon-mobile-marketing"></i>{{ __('adminstaticword.Career') }}</a></li>
              <li class="{{ Nav::isRoute('comingsoon.page') }}"><a href="{{route('comingsoon.page')}}"><i class="flaticon-fast-time"></i>{{ __('adminstaticword.ComingSoon') }}</a></li>
              <li class="{{ Nav::isRoute('termscondition') }}"><a href="{{route('termscondition')}}"><i class="flaticon-terms-and-conditions"></i>{{ __('adminstaticword.Terms&Condition') }} </a></li>
              <li class="{{ Nav::isRoute('policy') }}"><a href="{{route('policy')}}"><i class="flaticon-smartphone"></i> {{ __('adminstaticword.PrivacyPolicy') }}</a></li>

              <li class="{{ Nav::isRoute('bank.transfer') }}"><a href="{{route('bank.transfer')}}"><i class="flaticon-bank"></i> {{ __('adminstaticword.BankDetails') }}</a></li>

              <li class="{{ Nav::isRoute('show.pwa') }}"><a href="{{route('show.pwa')}}"><i class="flaticon-mobile-marketing" aria-hidden="true"></i><span> {{ __('adminstaticword.PWASetting') }}</span></a></li>
              <li class="{{ Nav::isRoute('adsense') }}"><a href="{{url('/admin/adsensesetting')}}" title="Page Setting"><span><i class="flaticon-settings-3"></i> &nbsp;&nbsp;{{ __('adminstaticword.AdsenseSetting') }}</span></a></li>
              
              @if(isset($global_settings) && $global_settings->ipblock_enable == 1)
              <li class="{{ Nav::isRoute('ipblock.view') }}"><a href="{{url('admin/ipblock')}}" title="Page Setting"><span><i class="flaticon-error"></i> &nbsp;&nbsp;{{ __('adminstaticword.IPBlockSettings') }}</span></a></li>
              @endif

            </ul>
          </li> -->

          <!-- <li class="{{ Nav::isRoute('player.set') }} {{ Nav::isRoute('ads') }} {{ Nav::isRoute('ad.setting') }} treeview">
           <a href="#">
             <i class="flaticon-video" aria-hidden="true"></i> <span>{{ __('adminstaticword.PlayerSettings') }}</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">

              <li class="{{ Nav::isRoute('player.set') }}"><a href="{{route('player.set')}}"><i class="flaticon-digital-marketing"></i> {{ __('adminstaticword.PlayerCustomization') }}</a></li>

              <li class="{{ Nav::isRoute('ads') }}"><a href="{{url('admin/ads')}}" title="Create ad"><i class="flaticon-video-advertising"></i>{{ __('adminstaticword.Advertise') }}</a></li>
              @php $ads = App\Ads::all(); @endphp
              @if($ads->count()>0)
              <li class="{{ Nav::isRoute('ad.setting') }}"><a href="{{url('admin/ads/setting')}}" title="Ad Settings"><i class="flaticon-project-management"></i>{{ __('adminstaticword.AdvertiseSettings') }}</a></li>
              @endif

            </ul>
          </li> -->

         <!-- <li class="{{ Nav::isRoute('show.lang') }}"><a href="{{route('show.lang')}}"><i class="flaticon-translation" aria-hidden="true"></i><span>{{ __('adminstaticword.Language') }}</span></a></li> -->

          <li class="{{ Nav::isResource('usermessage') }}"><a href="{{url('usermessage')}}" class="d-flex align-items-center"><i class="la-icon la-icon--lg icon-messages mr-4" aria-hidden="true"></i><span>{{ __('adminstaticword.AllMessages') }}</span></a></li>
        

         <!-- <li class="mt-md-20 pt-md-10">
          <a href="" class="d-flex align-items-center">
            <i class="la-icon la-icon--lg icon-help-filled mr-4"></i>
            <span>Help</span>
          </a>
        </li> -->

        <li class="">
          <a role="button" href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="d-flex align-items-center">
            <i class="la-icon la-icon--lg icon-logout mr-4"></i>
            <span>{{ __('adminstaticword.Logout') }}</span>
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
          </form>
        </li>

        </ul>
      @endif


    </section>
    <!-- /.sidebar -->
</aside>