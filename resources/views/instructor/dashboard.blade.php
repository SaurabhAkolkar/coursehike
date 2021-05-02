@extends('admin.layouts.master')
@section('title', 'Dashboard - Creators')
@section('body')

@if(Auth::User()->role == "mentors")

<section class="content-header">
  <h3 class="la-admin__section-title">
    {{ __('adminstaticword.Dashboard') }}
    <span class="text-sm font-weight-normal">{{ __('adminstaticword.Instructor') }}</span>
  </h3>
  <!-- <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> {{ __('adminstaticword.Home') }}</a></li>
    <li class="active">{{ __('adminstaticword.Dashboard') }}</li>
  </ol> -->
</section>

<section class="content">
  <div class="la-admin__section-content">
	<!-- Main row -->
  <div class="row ">
      <div class="col-6 col-md-4 mt-md-1">
        <div class="small-box bg-red">
          <div class="inner">
            <div class="icon">
              <span class="la-icon la-icon--5xl icon-courses"></span>
            </div>
            <p class="m-0">{{ __('adminstaticword.Classes') }}</p>
            <h3 class="m-0">
            	@php
            		$course = App\Course::where('user_id', Auth::User()->id)->get();
            		if(count($course)>0){
            			echo count($course);
            		}
            		else{
            			echo "0";
            		}
            	@endphp
            </h3>
          </div>
         
          <a href="{{url('course')}}" class="small-box-footer"> {{-- {{ __('adminstaticword.Moreinfo') }} --}}
           <!-- <i class="fa fa-arrow-circle-right"></i> -->
            <span class="la-icon la-icon--5xl icon-black-arrow"></span>
          </a>
        </div>
      </div>
      <!-- ./col -->

      <div class="col-6 col-md-4  mt-md-1">
        <div class="small-box bg-green">
          <div class="inner">
            <div class="icon">
              <span class="la-icon la-icon--5xl icon-users"></span>
            </div>
            <p class="m-0"> Learners</p>
            <h3 class="m-0">
            	{{ count($payout['learners']) + ($total_earning['count'])}}
            </h3>
          </div>
          <a href="{{url('userenroll')}}" class="small-box-footer"> {{-- {{ __('adminstaticword.Moreinfo') }} --}}
            
            <span class="la-icon la-icon--5xl icon-black-arrow"></span>
          </a>
        </div>
      </div>
      <!-- ./col -->

      <div class="col-6 col-md-4 mt-4 mt-md-1">
        <div class="small-box bg-green">
          <div class="inner">
            <div class="icon">
              <span class="la-icon la-icon--5xl icon-revenue"></span>
            </div>
            <p class="m-0"> Revenue</p>
            <h3 class="m-0">
              ${{ $payout['total_income'] + ($total_earning['total_income'])}}
            </h3>
          </div>
          <a href="{{route('instructor.revenue')}}" class="small-box-footer"> 
            <span class="la-icon la-icon--5xl icon-black-arrow"></span>
          </a>
        </div>
      </div>

      {{-- <div class="col-lg-4 col-6">
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3>
            	@php
            		$question = App\Question::where('instructor_id', Auth::User()->id)->get();
            		if(count($question)>0){
            			echo count($question);
            		}
            		else{
            			echo "0";
            		}
            	@endphp
            </h3>
            <p> {{ __('adminstaticword.Total') }} {{ __('adminstaticword.Question') }}</p>
          </div>
          <div class="icon">
            <i class="flaticon-questions"></i>
          </div>
          <a href="{{url('instructorquestion')}}" class="small-box-footer"> {{ __('adminstaticword.Moreinfo') }}<i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div> --}}
      <!-- ./col -->

       <!-- small box -->
      {{-- <div class="col-lg-4 col-6">
        <div class="small-box bg-purple">
          <div class="inner">
            <h3>
            	@php
            		$answer = App\Answer::all();
            		if(count($answer)>0){
            			echo count($answer);
            		}
            		else{
            			echo "0";
            		}
            	@endphp
            </h3>
            <p> {{ __('adminstaticword.Total') }} {{ __('adminstaticword.Answer') }}</p>
          </div>
          <div class="icon">
            <i class="flaticon-online-business"></i>
          </div>
          <a href="{{url('instructoranswer')}}" class="small-box-footer"> {{ __('adminstaticword.Moreinfo') }}<i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div> --}}
      <!-- ./col -->
  </div>

  <div class="row my-md-10">
        <!-- RECENT LEARNERS: START -->
      <div class="col-md-6 col-lg-5">
        <div class="la-dash__recent-section">
          <div class="la-dash__recent-head">
            <h4 class="la-dash__recent-htitle">Recent Purchased Learners</h4>
          </div>
              <ul class="la-dash__recent-list">
                  @php            		
                    if($course){
                        $courses_id = $course->pluck('id');
                        $users = App\UserPurchasedCourse::with('user')->whereIn('course_id', $courses_id)->groupBy('user_id')->limit(5)->get();
                    }
                  @endphp

                  @foreach ($users as $user)
                      <x-admin-recent-subscription 
                          :userImg="$user->user->userImg"
                          :userName="$user->user->fullName"
                          :userTag="$user->user->role=='mentors'?'Creator':'Learner'"
                          :userDate="Carbon\Carbon::parse($user->crated_at)->format('M d, Y')"
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
       <!-- RECENT LEARNERS: END -->

      <!-- RECENTLY BOUGHT COURSES: START -->
      <div class="col-md-6 col-lg-7">
        <div class="la-dash__recent-section">
          <div class="la-dash__recent-head">
            <h4 class="la-dash__recent-htitle">Recently Bought Courses</h4>
          </div>
              <ul class="la-dash__recent-list">
                @php
                    if($course){
                      $courses_id = $course->pluck('id');
                      $courses = App\UserPurchasedCourse::with('course','course.user')->whereIn('course_id', $courses_id)->groupBy('course_id')->limit(5)->get();
                    }
                @endphp

                  @foreach ($courses as $course)
                      <x-admin-recent-bought-course 
                          :courseImg="$course->course->preview_image"
                          :courseName="$course->course->title"
                          :courseTag="$course->course->user->fullName"
                          :courseDate="Carbon\Carbon::parse($course->course->created_at)->format('M d, Y')"
                          :coursePrice="$course->course->price"
                      />
                  @endforeach
              </ul>

              <div class="la-dash__recent-more text-right">
                  <a href="{{route('instructor.revenue')}}" class="la-dash__more-btn">
                    <span class="la-icon la-icon--5xl icon-black-arrow"></span>
                  </a>
              </div>
        </div>
      </div>
      <!-- RECENTLY BOUGHT COURSES: END -->

    </div>
  <!-- /.row -->
	</div>
</section>

@endif

@endsection