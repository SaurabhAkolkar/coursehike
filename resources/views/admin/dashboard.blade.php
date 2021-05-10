@extends('admin.layouts.master')
@section('title', 'Dashboard - Admin')
@section('body')

@if(Auth::User()->role == "admin")

<section class="content-header">
  <h3 class="la-admin__section-title mb-0">
    {{ __('adminstaticword.Dashboard') }}
    <span class="text-xs">LILA</span>
  </h3>
  <!-- <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i>{{ __('adminstaticword.Home') }}</a></li>
    <li class="active">{{ __('adminstaticword.Dashboard') }}</li>
  </ol> -->
</section>
<section class="content">
<div class="la-admin__section-content">
	<!-- Main row -->
    <div class="row">
        <div class="col-6 col-md-4">
          <!-- small box -->
            <a  href="{{route('user.index')}}" >
            <div class="small-box"> 
              <div class="inner">
                <div class="icon">
                  <span class="la-icon la-icon--5xl icon-users"></span>
                </div>
                <p class="m-0">{{ __('adminstaticword.Users') }}</p>
                <h3 class="m-0">{{$users}}</h3>
            </div>

              <span class="small-box-footer"><!-- {{ __('adminstaticword.Moreinfo') }} --> 
                <!-- <i class="fa fa-arrow-circle-right"></i> -->
                <span class="la-icon la-icon--5xl icon-black-arrow"></span>
              </span>
            </div>
            </a>
        </div>
        <!-- ./col -->
        <div class="col-6  col-md-4">
          <!-- small box -->
          <a href="{{url('category')}}" >
            <div class="small-box">
              <div class="inner">
              <div class="icon py-2">
              <!--  <i class="flaticon-layout"></i> -->
              <span class="la-icon la-icon--3xl icon-categories"></span>
              
              </div>
              <p>{{ __('adminstaticword.Categories') }}</p>
                <h3  class="m-0">{{$categories}}</h3>
              </div>
              <span  class="small-box-footer"><!--{{ __('adminstaticword.Moreinfo') }}-->
                <span class="la-icon la-icon--5xl icon-black-arrow"></span>
              </span>
            </div>
          </a>
        </div>
        <!-- ./col -->
        <div class="col-6 col-md-4">
          <!-- small box -->
          <a href="{{url('course')}}" >
          <div class="small-box la-admin__dash-cards">
            <div class="inner">
              <div class="icon py-1">
                <span class="la-icon la-icon--4xl icon-courses"></span>
              </div>
              <p>{{ __('adminstaticword.Courses') }}</p>
              <h3  class="m-0">
                @php
                  $course = App\Course::all()->count();
                  echo $course;
                @endphp
              </h3>       
            </div>  
            <span  class="small-box-footer"><!-- {{ __('adminstaticword.Moreinfo') }} --> 
              <!--  <i class="fa fa-arrow-circle-right"></i> -->
              <span class="la-icon la-icon--5xl icon-black-arrow"></span>
            </span>
          </div>
          </a>
        </div>
    
        <!-- ./col -->
        <div class="col-6 col-md-4 pt-8">
          <!-- small box -->
          <a href="{{url('order')}}"  >
            <div class="small-box">
              <div class="inner">
                <div class="icon">
                  <!-- <i class="flaticon-shopping-cart-1"></i> -->
                  <span class="la-icon la-icon--5xl icon-revenue"></span>
                </div>
                <p>{{ __('adminstaticword.Orders') }}</p>
                <h3  class="m-0">$ {{$total}}</h3>
              </div>
              <span class="small-box-footer"><!--{{ __('adminstaticword.Moreinfo') }} --> 
                <!--<i class="fa fa-arrow-circle-right"></i>-->
                <span class="la-icon la-icon--5xl icon-black-arrow"></span>
              </span>
            </div>
          </a>
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
              		$faq = App\FaqStudent::all()->count();
              		echo $faq;
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
              		echo count($review);
              	@endphp
              </h3>       
            </div>
            <a href="{{ url('page') }}" class="small-box-footer"> {{ __('adminstaticword.Moreinfo') }} <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div> -->
        <!-- ./col -->
        <div class="col-6 col-md-4 pt-8">
          <!-- small box -->
            <a  href="{{route('all.instructor')}}" >
              <div class="small-box">
                <div class="inner">
                  <div class="icon">
                  <!-- <i class="flaticon-teacher"></i>-->
                  <span class="la-icon la-icon--5xl icon-all-mentors"></span>
                  
                  </div>
                  <p>{{ __('adminstaticword.Instructors') }}</p>
                  <h3  class="m-0">{{$mentor}}</h3>
                </div>
                <span class="small-box-footer"><!-- {{ __('adminstaticword.Moreinfo') }} --> 
                  <!-- <i class="fa fa-arrow-circle-right"></i> -->
                  <span class="la-icon la-icon--5xl icon-black-arrow"></span>
                </span>
              </div>
            </a>
        </div>
        <!-- ./col -->
         <!-- small box -->
        {{-- <div class="col-lg-4  p-3">
          <div class="small-box ">
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
	<div class="row">
		<!-- Left col -->
    <div class="col-md-6 col-lg-5">
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
              $users = App\User::limit(5)->orderBy('id', 'DESC')->get();
            @endphp
            <!-- <div class="row users-list"> -->
              @foreach($users as $user)
                <!-- <div class="col-md-8 px-0"> -->
                <li class="la-dash__recent-item ">
                  <div class="la-dash__recent-info">
                    <div class="la-dash__recent-img">
                      @if($user['user_img'] != null || $user['user_img'] !='')
                        <img src="{{ $user['user_img'] }}" class="img-fluid d-block" alt="{{ $user['fname'] }}">
                      @else
                        <img src="{{ asset('images/default/user.jpg')}}" class="img-fluid d-block" alt="{{ $user['fname'] }}">
                      @endif
                    </div>
                  
                    <div class="users-info la-dash__recent-desc ml-3 ">
                      <div class="users-list-name m-0 la-dash__recent-title" >{{ $user['fname'] }} {{ $user['lname'] }}</div>
                      <div class="users-list-desc la-dash__recent-tag">@if($user->role == 'user') {{ ucfirst($user->role) }} @else Creator @endif</div>
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
          <div class="la-dash__recent-more text-right">
            <a href="{{route('user.index')}}" class="la-dash__more-btn">
                <span class="la-icon la-icon--5xl icon-black-arrow"></span>
            </a>
          </div>
          <!-- /.box-footer -->
      </div>
      <!--/.box -->
    </div>

    <!-- RECENTLY ADDED COURSES LIST -->
    <div class="col-md-6 col-lg-7">
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
                      <img class="img-fluid d-block" src="<?php echo $course['preview_image'];  ?>" alt="Course Image">
                    @else
                      <img class="img-fluid d-block" src="{{ Avatar::create($course->title)->toBase64() }}" alt="Course Image">
                    @endif
                  </div>

                  <div class="la-dash__recent-desc">
                    <div class=" la-dash__recent-title ">{{ str_limit($course['title'], $limit = 25, $end = '...') }}</div>
                    <div class="product-description la-dash__recent-tag">
                        {{ str_limit($course->short_detail, $limit = 40, $end = '...') }}
                    </div>
                  </div>
                </div>

                <div class="la-dash__recent-date d-flex justify-content-between align-items-center">
                  <div class="users-list-date la-dash__recent-subdate">{{ date('F Y', strtotime($user['created_at'])) }}</div>
                  <div class="label label-warning ml-4 ml-md-6 ml-lg-20 ">
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
          <div class="la-dash__recent-more text-right">
            <a href="{{url('course')}}" class="la-dash__more-btn">
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
    <div class="col-md-6 col-lg-5">
        <div class="la-dash__recent-section">
          <div class="la-dash__recent-head">
            <h4 class="la-dash__recent-htitle">Recent Subscriptions</h4>
          </div>
              <ul class="la-dash__recent-list">
                
                  @foreach ($recent_subscriptions as $recent)
                      <x-admin-recent-subscription 
                          :userImg="$recent->user->user_img"
                          :userName="$recent->user->fullName"
                          :userTag="$recent->user->role=='admin'||$recent->user->role=='mentors'?'Creator':'Learner'"
                          :userDate="Carbon\Carbon::parse($recent->created_at)->format('M d Y')"
                      />
                  @endforeach
              </ul>

              <div class="la-dash__recent-more text-right">
                  <a href="{{url('order')}}" class="la-dash__more-btn">
                    <span class="la-icon la-icon--5xl icon-black-arrow"></span>
                  </a>
              </div>
        </div>
    </div>
    <!-- RECENT SUBSCRIPTIONS: END -->

     <!-- RECENTLY BOUGHT COURSES: START -->
    <div class="col-md-6 col-lg-7">
        <div class="la-dash__recent-section">
          <div class="la-dash__recent-head">
            <h4 class="la-dash__recent-htitle">Recently Bought Courses</h4>
          </div>
              <ul class="la-dash__recent-list">
                  @foreach ($recent_courses as $rc)
                    @if ($rc->course)
                        <x-admin-recent-bought-course 
                          :courseImg="$rc->course->preview_image"
                          :courseName="$rc->course->title"
                          :courseTag="$rc->course->category_id"
                          :courseDate="Carbon\Carbon::parse($rc->course->created_at)->format('M d Y')"
                          :coursePrice="$rc->price"
                           />
                    @endif
                  @endforeach
              </ul>

              <div class="la-dash__recent-more text-right">
                  <a href="{{url('order')}}" class="la-dash__more-btn">
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
              <h4 class="la-dash__recent-htitle pb-4">Pending Creator Requests</h4>
            </div>
      
            <div class="la-dash__pending-section px-0 px-md-10">
                <div class="row no-gutters d-flex justify-content-between  la-dash__pending-head">
                    <div class="col-1 col-md-1 la-dash__pending-title">#</div>
                    <div class="col-3 col-md-3 la-dash__pending-title">Creator Name</div>
                    <!-- <div class="col la-dash__pending-title">Crourse ID</div> -->
                    <div class="col-4 col-md-4 la-dash__pending-title">Course Name</div>
                    <div class="col-2 col-md-2 la-dash__pending-title text-center text-md-left">On</div>
                    <div class="col-2 col-md-2 la-dash__pending-title">Request Type</div>
                </div>

                <div class="la-dash__pending-body">
                  <ul class="la-dash__pending-list">
                      @php
                          $requests = App\PublishRequest::with('user','course')->where(['status'=>1])->limit(5)->get();
                          $i = 0;
                      @endphp

                      @foreach ($requests as $r)
                        @if ($r->course)
                          <x-admin-pending-request
                            :sr="++$i"
                            :creatorName="$r->user->fullName"
                            :courseName="$r->course->title"
                            :dateOn="Carbon\Carbon::parse($r->created_at)->format('M d Y')"
                            :requestType="$r->request_type=='publish'?'Publish':'Unpublish'"
                          />
                          @endif
                      @endforeach 
                      @if(count($requests) == 0)
                        <div class="text-center py-12">
                            <h4 style="color:var(--gray8);font-weight:var(--font-medium);">No Requests Found</h4>
                        </div>
                      @endif
                  </ul>
                </div>
            </div>

            <div class="la-dash__recent-more text-right">
              <a href="{{url('publishrequest')}}" class="la-dash__more-btn">
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
      @php
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
</div>
</section>

@endif

@endsection