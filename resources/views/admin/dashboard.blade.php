@extends('admin.layouts.master')
@section('title', 'Dashboard - Admin')
@section('body')

@if(Auth::User()->role == "admin")

<section class="content-header">
  <h1 class="m-0 pt-6">
    {{ __('adminstaticword.Dashboard') }}
    <small>{{ $project_title }}</small>
  </h1>
  <!-- <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i>{{ __('adminstaticword.Home') }}</a></li>
    <li class="active">{{ __('adminstaticword.Dashboard') }}</li>
  </ol> -->
</section>
<section class="content">
	<!-- Main row -->
    <div class="row mr-md-20">
        <div class="col-lg-4 col-6 p-3">
          <!-- small box -->
          <div class="small-box bg-aqua"> 
            <div class="inner">
              <div class="icon">
                <span class="la-icon la-icon--5xl icon-users"></span>
              </div>
              <p class="m-0">{{ __('adminstaticword.Users') }}</p>
              <h3 class="m-0">
                  @php
                    $user = App\User::all();
                    if(count($user)>0){

                      echo count($user);
                    }
                    else{

                      echo "0";
                    }
                  @endphp
              </h3>
          </div>

            <a href="{{route('user.index')}}" class="small-box-footer"><!-- {{ __('adminstaticword.Moreinfo') }} --> 
              <!-- <i class="fa fa-arrow-circle-right"></i> -->
              <span class="la-icon la-icon--5xl icon-black-arrow"></span>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6 p-3">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
            <div class="icon">
             <!--  <i class="flaticon-layout"></i> -->
             <span class="la-icon la-icon--5xl icon-categories"></span>
            
            </div>
            <p>{{ __('adminstaticword.Categories') }}</p>
              <h3  class="m-0">
              	@php
              		$cat = App\Categories::all();
              		if(count($cat)>0){

              			echo count($cat);
              		}
              		else{

              			echo "0";
              		}
              	@endphp
              </h3>
            </div>
            <a href="{{url('category')}}" class="small-box-footer"><!--{{ __('adminstaticword.Moreinfo') }}-->
              <span class="la-icon la-icon--5xl icon-black-arrow"></span>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6 p-3">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <div class="icon">
                <span class="la-icon la-icon--5xl icon-courses"></span>
              </div>
              <p>{{ __('adminstaticword.Courses') }}</p>
              <h3  class="m-0">
              	@php
              		$course = App\Course::all();
              		if(count($course)>0){

              			echo count($course);
              		}
              		else{

              			echo "0";
              		}
              	@endphp
              </h3>       
            </div>  
            <a href="{{url('course')}}" class="small-box-footer"><!-- {{ __('adminstaticword.Moreinfo') }} --> 
              <!--  <i class="fa fa-arrow-circle-right"></i> -->
              <span class="la-icon la-icon--5xl icon-black-arrow"></span>
            </a>
          </div>
        </div>
    </div>

    <div class="row mr-5 pr-5">
        <!-- ./col -->
        <div class="col-lg-4 col-6 p-3">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <div class="icon">
                <!-- <i class="flaticon-shopping-cart-1"></i> -->
                <span class="la-icon la-icon--5xl icon-revenue"></span>
              </div>
              <p>{{ __('adminstaticword.Orders') }}</p>
              <h3  class="m-0">
              	@php
              		$page = App\Order::all();
              		if(count($page)>0){

              			echo count($page);
              		}
              		else{

              			echo "0";
              		}
              	@endphp
              </h3>
            </div>
            <a href="{{url('order')}}" class="small-box-footer"><!--{{ __('adminstaticword.Moreinfo') }} --> 
              <!--<i class="fa fa-arrow-circle-right"></i>-->
              <span class="la-icon la-icon--5xl icon-black-arrow"></span>
            </a>
          </div>
        </div>
        <!-- ./col -->
           <!-- small box -->
        <!-- <div class="col-lg-3 col-6">
          <div class="small-box bg-purple">
            <div class="inner">
              <div class="icon">
                <i class="flaticon-faq"></i>
              </div>
              <p>{{ __('adminstaticword.Faqs') }}</p>
              <h3  class="m-0">
              	@php
              		$faq = App\FaqStudent::all();
              		if(count($faq)>0){

              			echo count($faq);
              		}
              		else{

              			echo "0";
              		}
              	@endphp
              </h3>        
            </div>
            <a href="{{url('faq')}}" class="small-box-footer">{{ __('adminstaticword.Moreinfo') }} <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div> -->

        <!-- ./col -->
         <!-- small box -->
        <!-- <div class="col-lg-3 col-6">
          <div class="small-box bg-orange">
            <div class="inner">
              <div class="icon">
                 <i class="flaticon-report"></i>
              </div>
               <p>{{ __('adminstaticword.Pages') }}</p>
              <h3  class="m-0">@php
              		$review = App\Page::all();
              		if(count($review)>0){

              			echo count($review);
              		}
              		else{

              			echo "0";
              		}
              	@endphp
              </h3>       
            </div>
            <a href="{{ url('page') }}" class="small-box-footer"> {{ __('adminstaticword.Moreinfo') }} <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div> -->
        <!-- ./col -->
        <div class="col-lg-4 col-6 p-3">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <div class="icon">
              <!-- <i class="flaticon-teacher"></i>-->
              <span class="la-icon la-icon--5xl icon-all-mentors"></span>
              
              </div>
              <p>{{ __('adminstaticword.Instructors') }}</p>
              <h3  class="m-0">
                @php
              		$review = App\Instructor::all();
              		if(count($review)>0){

              			echo count($review);
              		}
              		else{

              			echo "0";
              		}
              	@endphp
              </h3>
            </div>
            <a href="{{route('all.instructor')}}" class="small-box-footer"><!-- {{ __('adminstaticword.Moreinfo') }} --> 
              <!-- <i class="fa fa-arrow-circle-right"></i> -->
              <span class="la-icon la-icon--5xl icon-black-arrow"></span>
            </a>
          </div>
        </div>
        <!-- ./col -->
         <!-- small box -->
        {{-- <div class="col-lg-4 col-6 p-3">
          <div class="small-box bg-blue">
            <div class="inner">
              <div class="icon">
              <i class="flaticon-customer-1"></i>
              </div>
              <p>{{ __('adminstaticword.Testimonials') }}</p>
              <h3  class="m-0">
                @php
              		$review = App\Testimonial::all();
              		if(count($review)>0){

              			echo count($review);
              		}
              		else{

              			echo "0";
              		}
              	@endphp
              </h3>
            </div>
            <a href="{{url('testimonial')}}" class="small-box-footer"> <!-- {{ __('adminstaticword.Moreinfo') }} --> 
              <!--<i class="fa fa-arrow-circle-right"></i>-->
              <img src="../css/images/icons/Black Arrow.svg" alt="Go" class="img-fluid mr-2 mb-2"/>
            </a>
          </div>
        </div> --}}
        <!-- ./col -->
    </div>
    <!-- /.row -->

	<!-- Main row -->
	<div class="row mr-md-20">
		<!-- Left col -->
    <div class="col-md-5">
      <!-- RECENTLY ADDED USERS LIST -->
      <div class="la-dash__recent-section">
          <div class="la-dash__recent-head">
            <h3 class="la-dash__recent-htitle">{{ __('adminstaticword.LatestUsers') }}</h3>
          </div>
           {{-- <div class="box-tools pull-right">
              <span class="label label-danger">
                @php
                    $user = App\User::all();
                    if(count($user)>0){

                      echo count($user);
                    }
                    else{

                      echo "0";
                    }
                  @endphp
                {{ __('adminstaticword.Users') }}
              </span>
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
              </button> 
             </div>  --}}
          <ul class="la-dash__recent-list">
            @php
              $users = App\User::limit(8)->orderBy('id', 'DESC')->get();
            @endphp
            <!-- <div class="row users-list"> -->
              @foreach($users as $user)
                <!-- <div class="col-md-8 px-0"> -->
                <li class="la-dash__recent-item ">
                  <div class="la-dash__recent-info">
                    <div class="la-dash__recent-img">
                      @if($user['user_img'] != null || $user['user_img'] !='')
                        <img src="{{ asset('/images/user_img/'.$user['user_img']) }}" class="img-fluid d-block" alt="User Image">
                      @else
                        <img src="{{ asset('images/default/user.jpg')}}" class="img-fluid d-block" alt="User Image">
                      @endif
                    </div>
                  
                    <div class="users-info la-dash__recent-desc ml-3 ">
                      <a class="users-list-name m-0 la-dash__recent-title" href="#">{{ $user['fname'] }} {{ $user['lname'] }}</a>
                      <div class="users-list-desc la-dash__recent-tag">CREATOR</div>
                    </div>
                  </div>
                  <!-- </div> -->
                  <div class="la-dash__recent-date">
                    <span class="users-list-date la-dash__recent-subdate">{{ date('F Y', strtotime($user['created_at'])) }}</span>
                  </div>
                </li>
              @endforeach
            <!-- </div> -->
            <!-- /.users-list -->
          </ul>
          <!-- /.box-body -->
          <div class="box-footer text-right ">
            <a href="{{route('user.index')}}" class="uppercase"> <!--{{ __('adminstaticword.ViewAll') }} -->
                  <!-- <i class="fa fa-long-arrow-right fa-2x" style="color:#777777"></i> -->
                  <span class="la-icon la-icon--5xl icon-black-arrow"></span>
            </a>
          </div> 
          <!-- /.box-footer -->
      </div>
      <!--/.box -->
    </div>

    <!-- RECENTLY ADDED COURSES LIST -->
    <div class="col-md-7">
      <div class="la-dash__recent-section">
        <div class="la-dash__recent-head">
          <h3 class="la-dash__recent-htitle">{{ __('adminstaticword.RecentCourses') }}</h3>
        </div>
        @php
          $courses = App\Course::limit(5)->orderBy('id', 'DESC')->get()
        @endphp
        @if(!$courses->isEmpty())
            {{-- <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div> 
            </div> --}}
              <!-- /.box-header -->
          <ul class="la-dash__recent-list">
            <!-- <ul class="products-list product-list-in-box"> -->
              @foreach($courses as $course)
              <li class=" la-dash__recent-item">
                <div class="la-dash__recent-info">
                  <div class="la-dash__recent-img">
                    @if($course['preview_image'] !== NULL && $course['preview_image'] !== '')
                      <img class="img-fluid d-block" src="images/course/<?php echo $course['preview_image'];  ?>" alt="Course Image">
                    @else
                      <img class="img-fluid d-block" src="{{ Avatar::create($course->title)->toBase64() }}" alt="Course Image">
                    @endif
                  </div>

                  <div class="la-dash__recent-desc">
                    <a href="javascript:void(0)" class=" la-dash__recent-title ">{{ str_limit($course['title'], $limit = 25, $end = '...') }}</a>
                    <div class="product-description la-dash__recent-tag">
                        {{ str_limit($course->short_detail, $limit = 40, $end = '...') }}
                    </div>
                  </div>
                </div>

                <div class="la-dash__recent-date d-flex justify-content-between align-items-center">
                  <div class="users-list-date la-dash__recent-subdate">{{ date('F Y', strtotime($user['created_at'])) }}</div>
                  <div class="label label-warning ml-20 ">
                      @if( $course->type == 1)
                        @php
                            $currency2 = App\Currency::first();
                        @endphp
                        @if($course->discount_price == !NULL)
                        <span class="la-dash__recent-price"><i class="{{ $currency2['icon'] }}"></i>{{ $course['discount_price'] }}</span>
                        @else
                        <span class="la-dash__recent-price"><i class="{{ $currency2['icon'] }}"></i>{{ $course['price'] }}</span>
                        @endif
                      @else
                        <span class="la-dash__recent-price">{{ __('adminstaticword.Free') }}</span>
                      @endif
                  </div>
                </div>
              </li>
              @endforeach
            <!-- </ul> -->
          </ul>
          <!-- /.box-body -->
          <div class="box-footer text-right">
            <a href="{{url('course')}}" class="uppercase"><!-- {{ __('adminstaticword.ViewAll') }} -->
              <span class="la-icon la-icon--5xl icon-black-arrow"></span>
            </a>
          </div>
          <!-- /.box-footer -->
      @endif
    </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->

    <!-- RECENT SUBSCRIPTIONS: START -->
    <div class="col-md-5">
        <div class="la-dash__recent-section">
          <div class="la-dash__recent-head">
            <h4 class="la-dash__recent-htitle">Recent Subscriptions</h4>
          </div>
              <ul class="la-dash__recent-list">
                  @php
                      $user1 = new stdClass;
                      $user1->userImg = "https://picsum.photos/50/50";
                      $user1->userName = "Nathan Spark";
                      $user1->userTag = "Creator";
                      $user1->userDate = "July 16, 2020";

                      $user2 = new stdClass;
                      $user2->userImg = "https://picsum.photos/50/50";
                      $user2->userName = "Amy D'souza";
                      $user2->userTag = "Learner";
                      $user2->userDate = "July 14, 2020";

                      $user3 = new stdClass;
                      $user3->userImg = "https://picsum.photos/50/50";
                      $user3->userName = "Natalia";
                      $user3->userTag = "Creator";
                      $user3->userDate = "July 12, 2020";

                      $user4 = new stdClass;
                      $user4->userImg = "https://picsum.photos/50/50";
                      $user4->userName = "Amy Dyana";
                      $user4->userTag = "Learner";
                      $user4->userDate = "July 10, 2020";

                      $user5 = new stdClass;
                      $user5->userImg = "https://picsum.photos/50/50";
                      $user5->userName = "Amy Dyana";
                      $user5->userTag = "Learner";
                      $user5->userDate = "July 10, 2020";

                      $users = array($user1, $user2, $user3, $user4, $user5);
                  @endphp

                  @foreach ($users as $user)
                      <x-admin-recent-subscription 
                          :userImg="$user->userImg"
                          :userName="$user->userName"
                          :userTag="$user->userTag"
                          :userDate="$user->userDate"
                      />
                  @endforeach
              </ul>

              <div class="la-dash__recent-more text-right">
                  <a href="" class="la-dash__more-btn">
                    <span class="la-icon la-icon--5xl icon-black-arrow"></span>
                  </a>
              </div>
        </div>
    </div>
    <!-- RECENT SUBSCRIPTIONS: END -->

     <!-- RECENTLY BOUGHT COURSES: START -->
    <div class="col-md-7">
        <div class="la-dash__recent-section">
          <div class="la-dash__recent-head">
            <h4 class="la-dash__recent-htitle">Recently Bought Courses</h4>
          </div>
              <ul class="la-dash__recent-list">
                @php
                  $course1 = new stdClass;
                  $course1->courseImg = "https://picsum.photos/50/50";
                  $course1->courseName = "Photography";
                  $course1->courseTag = "Creator Name";
                  $course1->courseDate = "July 14, 2020";
                  $course1->coursePrice = 65;

                  $course2 = new stdClass;
                  $course2->courseImg = "https://picsum.photos/50/50";
                  $course2->courseName = "Styling";
                  $course2->courseTag = "Creator Name";
                  $course2->courseDate = "July 13, 2020";
                  $course2->coursePrice = 85;

                  $course3 = new stdClass;
                  $course3->courseImg = "https://picsum.photos/50/50";
                  $course3->courseName = "Designer";
                  $course3->courseTag = "Creator Name";
                  $course3->courseDate = "July 12, 2020";
                  $course3->coursePrice = 65;

                  $course4 = new stdClass;
                  $course4->courseImg = "https://picsum.photos/50/50";
                  $course4->courseName = "Developer";
                  $course4->courseTag = "Creator Name";
                  $course4->courseDate = "July 10, 2020";
                  $course4->coursePrice = 95;

                  $course5 = new stdClass;
                  $course5->courseImg = "https://picsum.photos/50/50";
                  $course5->courseName = "Developer";
                  $course5->courseTag = "Creator Name";
                  $course5->courseDate = "July 10, 2020";
                  $course5->coursePrice = 95;


                  $courses = array($course1, $course2, $course3, $course4, $course5);
                @endphp

                  @foreach ($courses as $course)
                      <x-admin-recent-bought-course 
                          :courseImg="$course->courseImg"
                          :courseName="$course->courseName"
                          :courseTag="$course->courseTag"
                          :courseDate="$course->courseDate"
                          :coursePrice="$course->coursePrice"
                      />
                  @endforeach
              </ul>

              <div class="la-dash__recent-more text-right">
                  <a href="" class="la-dash__more-btn">
                    <span class="la-icon la-icon--5xl icon-black-arrow"></span>
                  </a>
              </div>
        </div>
    </div>
    <!-- RECENTLY BOUGHT COURSES: END -->

  
   <!-- PENDING CREATOR REQUESTS: START -->
    <div class="col-md-12">
        <div class="la-dash__recent-section">
            <div class="la-dash__recent-head">
              <h4 class="la-dash__recent-htitle">Pending Creator Requests</h4>
            </div>
      
            <div class="la-dash__pending-section">
                <div class="row no-gutters d-flex justify-content-between  la-dash__pending-head">
                    <div class="col la-dash__pending-title">Creator ID</div>
                    <div class="col la-dash__pending-title">Creator Name</div>
                    <div class="col la-dash__pending-title">Crourse ID</div>
                    <div class="col la-dash__pending-title">Course Name</div>
                    <div class="col la-dash__pending-title">On</div>
                    <div class="col la-dash__pending-title">Request Type</div>
                </div>

                <div class="la-dash__pending-body">
                  <ul class="la-dash__pending-list">
                      @php
                          $pending1 = new stdClass;
                          $pending1->creatorId = "AD103";
                          $pending1->creatorName = "Anna D'cruz";
                          $pending1->courseId = "ADC03";
                          $pending1->courseName = "Advance Sketching";
                          $pending1->dateOn = "July 10, 2020";
                          $pending1->requestType = "Publish";

                          $pending2 = new stdClass;
                          $pending2->creatorId = "AD103";
                          $pending2->creatorName = "Anna D'cruz";
                          $pending2->courseId = "ADC03";
                          $pending2->courseName = "Advance Sketching";
                          $pending2->dateOn = "July 10, 2020";
                          $pending2->requestType = "On hold";

                          $pending3 = new stdClass;
                          $pending3->creatorId = "AD103";
                          $pending3->creatorName = "Anna D'cruz";
                          $pending3->courseId = "ADC03";
                          $pending3->courseName = "Advance Sketching";
                          $pending3->dateOn = "July 10, 2020";
                          $pending3->requestType = "Archive";

                          $pending4 = new stdClass;
                          $pending4->creatorId = "AD103";
                          $pending4->creatorName = "Anna D'cruz";
                          $pending4->courseId = "ADC03";
                          $pending4->courseName = "Advance Sketching";
                          $pending4->dateOn = "July 10, 2020";
                          $pending4->requestType = "Publish";

                          $pendings = array($pending1, $pending2, $pending3, $pending4);
                      @endphp

                      @foreach ($pendings as $pending)
                          <x-admin-pending-request
                            :creatorId="$pending->creatorId"
                            :creatorName="$pending->creatorName"
                            :courseId="$pending->courseId"
                            :courseName="$pending->courseName"
                            :dateOn="$pending->dateOn"
                            :requestType="$pending->requestType"
                          />
                      @endforeach 
                  </ul>
                </div>
            </div>

            <div class="la-dash__recent-more text-right">
              <a href="" class="la-dash__more-btn">
                <span class="la-icon la-icon--5xl icon-black-arrow"></span>
              </a>
            </div>
        </div>
    </div>
    <!-- PENDING CREATOR REQUEST: END -->


    <!-- TABLE: LATEST ORDERS -->
		{{--<div class="col-md-12">
      @php
        $orders = App\Order::limit(7)->orderBy('id', 'DESC')->get();
      @endphp
      @if( !$orders->isEmpty() )
			<div class="box box-info box-recent__content">
			    <div class="box-header with-border">
			      <h3 class="box-title">{{ __('adminstaticword.LatestOrders') }}</h3>

			       <div class="box-tools pull-right">
			        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
			        </button>
			        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
			      </div>
			    </div> 
			     
			    <div class="box-body">
			      
			        <table class="table no-margin">
			          <thead>
                  <tr>
                    <th>{{ __('adminstaticword.User') }}</th>
                    <th>{{ __('adminstaticword.Course') }}</th>
                    <th>{{ __('adminstaticword.Amount') }}</th>
                    <th>{{ __('adminstaticword.Date') }}</th>
                    <th>{{ __('adminstaticword.Invoice') }}</th>
                  </tr>
			          </thead>
			          <tbody>
                  @php
                    $orders = App\Order::limit(7)->orderBy('id', 'DESC')->get();
                  @endphp
                  @foreach($orders as $order)
    			          <tr>
    			            <td><a href="#">{{ $order->user['fname'] }}</a></td>
    			            <td>
                        @if($order->course_id != NULL)
                          {{ $order->courses['title'] }}
                        @else
                          {{ $order->bundle['title'] }}
                        @endif
                      </td>
    			            <td>
                        @if($order->coupon_discount == !NULL)
                          <span class="label label-success"><i class="fa {{ $order['currency_icon'] }}"></i> {{ $order['total_amount'] - $order['coupon_discount'] }}</span>
                        @else
                          <span class="label label-success"><i class="fa {{ $order['currency_icon'] }}"></i> {{ $order['total_amount'] }}</span>
                        @endif
                      </td>
    			            <td>
    			              <div class="sparkbar" data-color="#00a65a" data-height="20">{{ date('jS F Y', strtotime($order['created_at'])) }}</div>
    			            </td>
                      <td><a href="{{route('view.order',$order['id'])}}">{{ __('adminstaticword.Invoice') }}</a></td>
    			          </tr>
                  @endforeach
			          </tbody>
			        </table>
			     
			    </div>
			  
			    <div class="box-footer clearfix">
			      <a href="{{url('order')}}" class="pull-right"> class="btn btn-sm btn-default btn-flat pull-right"> {{ __('adminstaticword.ViewAllOrders') }} 
              <i class="fa fa-long-arrow-right fa-2x" style="color:#777777"></i>
            </a>
			    </div>
			  
			</div>
      @endif 
			<!-- /.box -->

      <!-- Instructor box -->
     <!-- @php
        $instructors = App\Instructor::limit(3)->orderBy('id', 'DESC')->get();
      @endphp
      @if( !$instructors->isEmpty() )
      <div class="box box-success box-recent__content">
        <div class="box-header">
          <i class="fa fa-user-plus"></i>

          <h3 class="box-title">{{ __('adminstaticword.InstructorRequest') }}</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body chat" id="chat-box">
         
          
          @foreach($instructors as $instructor)
          @if($instructor->status == 0)
            <div class="item">
              <img src="{{ asset('images/instructor/'.$instructor['image'])}}" alt="user image" class="online">

              <p class="message">
                <a href="#" class="name">
                  <small class="text-muted pull-right"><i class="fa fa-calendar-check-o"></i>&nbsp;{{ date('jS F Y', strtotime($instructor['created_at'])) }}</small>
                  {{ $instructor['fname'] }}&nbsp;{{ $instructor['lname'] }}
                </a>
                {{ str_limit($instructor['detail'], $limit = 160, $end = '...') }}
              </p>
              <div class="attachment">
                <h4>{{ __('adminstaticword.Resume') }}:</h4>
                <p class="filename">
                  <a href="{{ asset('files/instructor/'.$instructor['file']) }}" download="{{$instructor['file']}}">{{ __('adminstaticword.Download') }} <i class="fa fa-download"></i></a>
                </p>

                <div class="pull-right">
                  <button type="button" onclick="window.location.href = '{{route('requestinstructor.edit',$instructor['id'])}}';" class="btn btn-primary btn-sm btn-flat">{{ __('adminstaticword.ViewDetails') }}</button>
                </div>
              </div>
             
            </div>
          @endif
          @endforeach
         
        </div>
       
       <div class="box-footer text-center">
          <a href="{{route('all.instructor')}}" class="btn btn-sm bg-navy btn-flat pull-left">{{ __('adminstaticword.AllInstructor') }}</a>
          <a href="{{url('requestinstructor')}}" class="btn btn-sm btn-default btn-flat pull-right">{{ __('adminstaticword.ViewAllInstructor') }}</a>
        </div> 
      </div>
      @endif
		</div>  --}}
	</div>
</section>

@endif

@endsection