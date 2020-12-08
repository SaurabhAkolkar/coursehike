@extends('admin.layouts.master')
@section('title', 'Dashboard - Creators')
@section('body')

@if(Auth::User()->role == "mentors")

<section class="content-header">
  <h1 class="m-0 pt-6">
    {{ __('adminstaticword.Dashboard') }}
    <small>{{ __('adminstaticword.Instructor') }}</small>
  </h1>
  <!-- <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> {{ __('adminstaticword.Home') }}</a></li>
    <li class="active">{{ __('adminstaticword.Dashboard') }}</li>
  </ol> -->
</section>
<section class="content">
	<!-- Main row -->
  <div class="row pr-md-20">
      <div class="col-lg-4 col-6">
        <div class="small-box bg-red">
          <div class="inner">
            <div class="icon">
              <span class="la-icon la-icon--5xl icon-courses"></span>
            </div>
            <p class="m-0">{{ __('adminstaticword.Course') }}</p>
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

      <div class="col-lg-4 col-6">
        <div class="small-box bg-green">
          <div class="inner">
            <div class="icon">
              <span class="la-icon la-icon--5xl icon-users"></span>
            </div>
            <p class="m-0"> Active {{ __('adminstaticword.Users') }}</p>
            <h3 class="m-0">
            	@php
            		$cat = App\Order::where('instructor_id', Auth::User()->id)->get();
            		if(count($cat)>0){
            			echo count($cat);
            		}
            		else{
            			echo "0";
            		}
            	@endphp
            </h3>
          </div>
          <a href="{{url('userenroll')}}" class="small-box-footer"> {{-- {{ __('adminstaticword.Moreinfo') }} --}}
            <!--<i class="fa fa-arrow-circle-right"></i> -->
            <span class="la-icon la-icon--5xl icon-black-arrow"></span>
          </a>
        </div>
      </div>
      <!-- ./col -->

      <div class="col-lg-4 col-6">
        <div class="small-box bg-green">
          <div class="inner">
            <div class="icon">
              <span class="la-icon la-icon--5xl icon-revenue"></span>
            </div>
            <p class="m-0"> Earnings</p>
            <h3 class="m-0">
              0
            </h3>
          </div>
          <a href="" class="small-box-footer"> 
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

  <div class="row my-md-10 pr-md-20">
        <!-- RECENT LEARNERS: START -->
      <div class="col-md-5">
        <div class="la-dash__recent-section">
          <div class="la-dash__recent-head">
            <h4 class="la-dash__recent-htitle">Recent Learners</h4>
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
       <!-- RECENT LEARNERS: END -->

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

    </div>
  <!-- /.row -->
	
</section>

@endif

@endsection