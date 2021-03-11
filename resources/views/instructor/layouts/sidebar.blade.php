<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          @if(Auth::User()->user_img != null || Auth::User()->user_img !='')
          <img src="{{ Auth::User()->user_img }}" class="img-circle img-fluid d-block rounded-circle" alt="User Image">

          @else
          <img src="{{ asset('images/default/user.jpg') }}" class="img-circle img-fluid d-block rounded-circle" alt="User Image">

          @endif
        </div>

        <div class="pull-left info">
          <p class="mb-1">{{ Auth::User()->fname }}</p>
          <a href="#" style="font-size:10px;"><i class="fa fa-circle text-success"></i> {{ __('adminstaticword.Instructor') }}</a>
        </div>
      </div>
 

      @if(Auth::User()->role == "mentors")
        <ul class="sidebar-menu" data-widget="tree">
          <!-- <li class="header">{{ __('adminstaticword.Navigation') }} </li> -->

          <li class="{{ Nav::isRoute('instructor.index') }}">
            <a class="d-flex align-items-center" href="{{route('instructor.index')}}">
              <!-- <i class="flaticon-web-browser" aria-hidden="true"></i> -->
              <i class="la-icon la-icon--md icon-dashboard mr-6"></i>
              <span>{{ __('adminstaticword.Dashboard') }}</span>
            </a>
          </li>
          
          <li class="{{ Nav::isResource('category') }} {{ Nav::isResource('subcategory') }} {{ Nav::isResource('childcategory') }} {{ Nav::isResource('course') }} {{ Nav::isResource('courselang') }} treeview">
              <a class="d-flex align-items-center" href="#">
                  <i class="la-icon la-icon--md icon-courses mr-6"></i>{{ __('adminstaticword.Course') }}
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
              </a>

              <ul class="treeview-menu">
                <li class="{{ Nav::isResource('category') }} {{ Nav::isResource('subcategory') }} {{ Nav::isResource('childcategory') }} {{ Nav::isResource('course') }} {{ Nav::isResource('courselang') }} treeview">
                 
                  {{-- @if($gsetting->cat_enable == 1)
                  <a class="d-flex align-items-center" href="#"> <i class="la-icon la-icon--lg icon-categories mr-4"></i>{{ __('adminstaticword.Category') }}
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  
                  <ul class="treeview-menu">
                    <li class="{{ Nav::isResource('category') }}"><a class="d-flex align-items-center" href="{{url('category')}}"> <i class="la-icon la-icon--lg icon-categories mr-4"></i>{{ __('adminstaticword.Category') }}</a></li>
                    <li class="{{ Nav::isResource('subcategory') }}"><a class="d-flex align-items-center" href="{{url('subcategory')}}"> <i class="la-icon la-icon--lg icon-sub-category mr-4"></i>{{ __('adminstaticword.SubCategory') }}</a></li>
                    <li class="{{ Nav::isResource('childcategory') }}"><a class="d-flex align-items-center" href="{{url('childcategory')}}"> <i class="la-icon la-icon--lg icon-child-category mr-4"></i>{{ __('adminstaticword.ChildCategory') }}</a></li>
                  </ul>
                  @endif                            
                  --}}

                  <li  class="@if(Request::segment(1) == 'course') active @endif"><a class="d-flex align-items-center" href="{{url('course')}}"> <i class="la-icon la-icon--lg icon-courses mr-4"></i><span>{{ __('adminstaticword.Course') }}</span></a></li>

                  <li class="{{ Nav::isResource('courselang') }}"><a class="d-flex align-items-center" href="{{url('courselang')}}">  <i class="la-icon la-icon--lg icon-course-language mr-4"></i><span> {{ __('adminstaticword.Course') }} {{ __('adminstaticword.Language') }}</span></a></li>
                  
                  {{-- @if($gsetting->assignment_enable == 1)
                  <li class="{{ Nav::isRoute('assignment.view') }}"><a class="d-flex align-items-center" href="{{route('assignment.view')}}"><i class="flaticon-computer" aria-hidden="true"></i><span>{{ __('adminstaticword.Assignment') }}</span></a></li>
                  @endif --}}
                 
                </li>
              </ul>
          </li>

          <!-- <li class="{{ Nav::isResource('userenroll') }}"><a href="{{url('userenroll')}}"> <span class="la-icon la-icon--lg icon-users mr-4"></span><span> {{ __('adminstaticword.Users') }}</span></a></li> -->

          {{-- <li class="{{ Nav::isResource('instructor/announcement') }}"><a class="d-flex align-items-center" href="{{url('instructor/announcement')}}"> <i class="la-icon la-icon--lg icon-announcement mr-4"></i><span>{{ __('adminstaticword.Announcement') }}</span></a></li> --}}

          <li class="{{ Nav::isResource('requests') }}">
            <a class="d-flex align-items-center" href="{{url('requests')}}">
              <i class="la-icon la-icon--md icon-request mr-6"></i>
              <span>Requests</span>
            </a>
          </li>

          <!-- <li class="{{ Nav::isResource('blog') }}"><a href="{{url('blog')}}"><i class="flaticon-personal-information"></i>{{ __('adminstaticword.Blog') }}</a></li> -->
          
          {{-- @if(isset($gsetting->feature_amount))
          <li class="{{ Nav::isResource('featurecourse') }}"><a href="{{url('featurecourse')}}"><i class="flaticon-smartphone" aria-hidden="true"></i><span> {{ __('adminstaticword.Feature') }} {{ __('adminstaticword.Course') }}</span></a></li>
          @endif --}}

          {{-- @if(isset($zoom_enable) && $zoom_enable == 1)
          <li class="{{ Nav::isRoute('meeting.create') }} {{ Nav::isRoute('zoom.show') }} {{ Nav::isRoute('zoom.edit') }} {{ Nav::isRoute('zoom.setting') }} {{ Nav::isRoute('zoom.index') }}  treeview">
            <a href="#">
             <i class="flaticon-live" aria-hidden="true"></i> <span>{{ __('Zoom Live Meetings') }}</span>
              <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ Nav::isRoute('zoom.setting') }}"><a href="{{route('zoom.setting')}}"><i class="flaticon-optimization"></i>{{ __('Zoom Settings') }}</a></li>
              <li class="{{ Nav::isRoute('zoom.index') }} {{ Nav::isRoute('zoom.show') }} {{ Nav::isRoute('zoom.edit') }} {{ Nav::isRoute('meeting.create') }}"><a href="{{route('zoom.index')}}"><i class="flaticon-layout"></i>{{ __('Zoom Dashboard') }}</a></li>
            </ul>
          </li>
          @endif --}}

          {{-- @if(isset($gsetting) && $gsetting->bbl_enable == 1)
              <li class="{{ Nav::isRoute('bbl.all.meeting') }} treeview">
                <a href="#">
                <i class="flaticon-live-1" aria-hidden="true"></i> <span>{{ __('Big Blue Meetings') }}</span>
                  <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  
                  <li class="{{ Nav::isRoute('bbl.all.meeting') }}"><a href="{{ route('bbl.all.meeting') }}"><i class="flaticon-document-2"></i>{{ __('List Meetings') }}</a></li>
                </ul>
              </li>
          @endif --}}


          <li class="{{ Nav::isRoute('pending.payout') }} {{ Nav::isRoute('instructor.revenue') }} {{ Nav::isRoute('admin.completed') }} treeview">
            <a class="d-flex align-items-center" href="#">
              <i class="la-icon la-icon--lg icon-my-revenue mr-5"></i> {{ __('adminstaticword.MyRevenue') }}
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>                            

            <ul class="treeview-menu">
              
              <li class="{{ Nav::isRoute('instructor.revenue') }}"><a class="d-flex align-items-center" href="{{route('instructor.revenue')}}"><i class="la-icon la-icon--lg icon-revenue mr-4"></i>{{ __('adminstaticword.Revenue') }}</a></li>

              <li class="{{ Nav::isRoute('pending.payout') }}"><a class="d-flex align-items-center" href="{{route('pending.payout')}}"><i class="la-icon la-icon--lg icon-pending-payout mr-4" aria-hidden="true"></i><span>{{ __('adminstaticword.PendingPayout') }}</span></a></li>

              <li class="{{ Nav::isRoute('admin.completed') }}"><a class="d-flex align-items-center" href="{{route('admin.completed')}}"><i class="la-icon la-icon--lg icon-completed-payout mr-4"></i>{{ __('adminstaticword.CompletedPayout') }}</a></li>
            </ul>
          </li>

          @if(isset($isetting))

          <li class="{{ Nav::isResource('instructor.pay') }}"><a  class="d-flex align-items-center" href="{{route('instructor.pay')}}"><i class="la-icon la-icon--lg icon-revenue mr-4"></i> <span>{{ __('adminstaticword.PayoutSettings') }}</span></a></li>

          @endif
          
          <li class="{{ Nav::isResource('instructorquestion') }} {{ Nav::isResource('instructoranswer') }} treeview">
            <a class="d-flex align-items-center" href="#">
              <i class="la-icon la-icon--lg icon-faq mr-5"></i> {{ __('adminstaticword.Faq') }} 
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>                            

            <ul class="treeview-menu">
              <li class="{{ Nav::isResource('instructorquestion') }}">
                <a class="d-flex align-items-center" href="{{url('instructorquestion')}}">
                  <i class="la-icon la-icon--md icon-help-filled mr-4 "></i>
                  <span>{{ __('adminstaticword.Question') }}</span>
                </a>
              </li>
              <li class="{{ Nav::isResource('instructoranswer') }}">
                <a class="d-flex align-items-center" href="{{url('instructoranswer')}}">
                  <i class="la-icon la-icon--lg icon-faq mr-4 mt-1"></i>
                  <span>{{ __('adminstaticword.Answer') }}</span>
                </a>
              </li>
            </ul>
          </li>

          <li>
            <a href="/contact" target="_blank" class="d-flex align-items-center">
              <i class="la-icon la-icon--md icon-contact-number mr-4"></i>
              <span class="mt-1">Contact Us</span>
            </a>
          </li>

          <li>
            <a role="button" href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="d-flex align-items-center">
              <i class="la-icon la-icon--md icon-logout mr-5"></i>
              <span>{{ __('adminstaticword.Logout') }}</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
              @csrf
            </form>
          </li>
        <ul>
      @endif


    </section>
    <!-- /.sidebar -->
</aside>