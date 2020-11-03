<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          @if(Auth::User()->user_img != null || Auth::User()->user_img !='')
          <img src="{{ asset('images/user_img/'.Auth::User()->user_img)}}" class="img-circle rounded-circle" alt="User Image">

          @else
          <img src="{{ asset('images/default/user.jpg') }}" class="img-circle  rounded-circle" alt="User Image">

          @endif
        </div>
        <div class="pull-left info">
          <p>{{ Auth::User()->fname }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> {{ __('adminstaticword.Instructor') }}</a>
        </div>
      </div>
 

      @if(Auth::User()->role == "instructor")
        <ul class="sidebar-menu" data-widget="tree">
          <!-- <li class="header">{{ __('adminstaticword.Navigation') }} </li> -->

          <li class="{{ Nav::isRoute('instructor.index') }}"><a href="{{route('instructor.index')}}">
            <!-- <i class="flaticon-web-browser" aria-hidden="true"></i> -->
            <span class="la-icon la-icon--lg icon-dashboard mr-4"></span>
            <span>{{ __('adminstaticword.Dashboard') }}</span></a>
          </li>
          
          <li class="{{ Nav::isResource('category') }} {{ Nav::isResource('subcategory') }} {{ Nav::isResource('childcategory') }} {{ Nav::isResource('course') }} {{ Nav::isResource('courselang') }} treeview">
            <a href="#">
                <span class="la-icon la-icon--lg icon-courses mr-4"></span>{{ __('adminstaticword.Course') }}
                <i class="fa fa-angle-left pull-right"></i>
            </a>

            <ul class="treeview-menu">
              <li class="{{ Nav::isResource('category') }} {{ Nav::isResource('subcategory') }} {{ Nav::isResource('childcategory') }} {{ Nav::isResource('course') }} {{ Nav::isResource('courselang') }} treeview">
                 
                  @if($gsetting->cat_enable == 1)
                  <a href="#"> <span class="la-icon la-icon--lg icon-categories mr-4"></span>{{ __('adminstaticword.Category') }}<i class="fa fa-angle-left pull-right"></i></a>
                  
                  <ul class="treeview-menu">
                    <li class="{{ Nav::isResource('category') }}"><a href="{{url('category')}}"> <span class="la-icon la-icon--lg icon-categories mr-4"></span>{{ __('adminstaticword.Category') }}</a></li>
                    <li class="{{ Nav::isResource('subcategory') }}"><a href="{{url('subcategory')}}"> <span class="la-icon la-icon--lg icon-sub-category mr-4"></span>{{ __('adminstaticword.SubCategory') }}</a></li>
                    <li class="{{ Nav::isResource('childcategory') }}"><a href="{{url('childcategory')}}"> <span class="la-icon la-icon--lg icon-child-category mr-4"></span>{{ __('adminstaticword.ChildCategory') }}</a></li>
                  </ul>
                  @endif                           

                
                  <li class="{{ Nav::isResource('course') }}"><a href="{{url('course')}}"> <span class="la-icon la-icon--lg icon-courses mr-4"></span><span>{{ __('adminstaticword.Course') }}</span></a></li>

                  <li class="{{ Nav::isResource('courselang') }}"><a href="{{url('courselang')}}">  <span class="la-icon la-icon--lg icon-course-language mr-4"></span></i><span> {{ __('adminstaticword.Course') }} {{ __('adminstaticword.Language') }}</span></a></li>
                  
                  {{-- @if($gsetting->assignment_enable == 1)
                  <li class="{{ Nav::isRoute('assignment.view') }}"><a href="{{route('assignment.view')}}"><i class="flaticon-computer" aria-hidden="true"></i><span>{{ __('adminstaticword.Assignment') }}</span></a></li>
                  @endif --}}
                 
                </li>
              </ul>
          </li>



          <!-- <li class="{{ Nav::isResource('userenroll') }}"><a href="{{url('userenroll')}}"> <span class="la-icon la-icon--lg icon-users mr-4"></span><span> {{ __('adminstaticword.Users') }}</span></a></li> -->

          <li class="{{ Nav::isResource('instructor/announcement') }}"><a href="{{url('instructor/announcement')}}"> <span class="la-icon la-icon--lg icon-announcement mr-4"></span><span>{{ __('adminstaticword.Announcement') }}</span></a></li>

          <li class=""><a href="/requests"><span class="la-icon la-icon--md icon-request mr-5"></span>Requests</a></li>

          <!-- <li class="{{ Nav::isResource('blog') }}"><a href="{{url('blog')}}"><i class="flaticon-personal-information"></i>{{ __('adminstaticword.Blog') }}</a></li> -->
          
          @if(isset($gsetting->feature_amount))
          <li class="{{ Nav::isResource('featurecourse') }}"><a href="{{url('featurecourse')}}"><i class="flaticon-smartphone" aria-hidden="true"></i><span> {{ __('adminstaticword.Feature') }} {{ __('adminstaticword.Course') }}</span></a></li>
          @endif

          @if(isset($zoom_enable) && $zoom_enable == 1)
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
       @endif

       @if(isset($gsetting) && $gsetting->bbl_enable == 1)
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
       @endif


          <li class="{{ Nav::isResource('pending.payout') }} {{ Nav::isRoute('admin.completed') }} treeview">
            <a href="#">
              <span class="la-icon la-icon--lg icon-revenue mr-4"></span> {{ __('adminstaticword.MyRevenue') }}
                <i class="fa fa-angle-left pull-right"></i>
            </a>                            

            <ul class="treeview-menu">
              <li class="{{ Nav::isResource('pending.payout') }}"><a href="{{route('pending.payout')}}"><i class="flaticon-pending" aria-hidden="true"></i><span>{{ __('adminstaticword.PendingPayout') }}</span></a></li>

              <li class="{{ Nav::isRoute('admin.completed') }}"><a href="{{route('admin.completed')}}"><i class="flaticon-file"></i>{{ __('adminstaticword.CompletedPayout') }}</a></li>

            </ul>
          </li>

          @if(isset($isetting))

          <li class="{{ Nav::isResource('instructor.pay') }}"><a href="{{route('instructor.pay')}}"><i class="flaticon-settings-3" aria-hidden="true"></i><span>{{ __('adminstaticword.PayoutSettings') }}</span></a></li>

          @endif
          
          <li class="{{ Nav::isResource('instructorquestion') }} {{ Nav::isResource('instructoranswer') }} treeview">
            <a href="#">
              <span class="la-icon la-icon--lg icon-faq mr-4"></span> {{ __('adminstaticword.Faq') }} 
              <i class="fa fa-angle-left pull-right"></i>
            </a>                            

            <ul class="treeview-menu">
              <li class="{{ Nav::isResource('instructorquestion') }}">
                <a href="{{url('instructorquestion')}}">
                  <span class="la-icon la-icon--lg icon-help-filled mr-4 mt-1"></span><span>{{ __('adminstaticword.Question') }}</span>
                </a>
              </li>
              <li class="{{ Nav::isResource('instructoranswer') }}">
                <a href="{{url('instructoranswer')}}">
                  <span class="la-icon la-icon--lg icon-faq mr-4 mt-1"></span>{{ __('adminstaticword.Answer') }}</span>
                </a>
              </li>
            </ul>
          </li>

        <ul>
      @endif


    </section>
    <!-- /.sidebar -->
</aside>