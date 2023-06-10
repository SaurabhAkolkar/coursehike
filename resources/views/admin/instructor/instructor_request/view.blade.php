@extends('admin.layouts.master')
@section('title', 'View Instructor - Admin')
@section('body')
 
<section class="content">
  @include('admin.message')
  <div class="row">
    <div class="col-md-12">
    	<div class="box box-primary">
          	<h3 class="la-admin__section-title ml-3">{{ __('adminstaticword.InstructorRequest') }}</h3>
			   
			<div class="row py-10">
				<div class="col-3 h-100 px-0">
					<div class="la-admin__mentor-lft">
						<img src="{{ asset('images/user_img/'.$show->image) }}" alt="{{ $show->fname }} {{ $show['lname'] }}" class="img-fluid mx-auto d-block la-admin__mentor-img" />
						<div class="la-admin__mentor-profile text-center pt-4">
							<h1 class="la-admin__mentor-name text-uppercase text-2xl mb-3">{{ $show->fname }} {{ $show['lname'] }}</h1>
							<div class="la-admin__mentor-contact  mb-1 d-flex align-items-center justify-content-center">
								<span class="la-icon la-icon--lg icon-contact-number" style="color:#000;"></span>
								<span class="ml-2">{{ $show->mobile }} </span>
							</div>
							<div class="la-admin__mentor-contact mb-1 d-flex align-items-center justify-content-center">
								<span class="la-icon la-icon--xl icon-mail-id" style="color:#000;"></span>
								<span class="ml-2">{{ $show->email }}</span>
							</div>
						</div>
					</div>
				</div>

				<div class="col-1 text-center">
					<div class="la-admin__mentor-vline h-100"></div>
				</div>

				<div class="col-5 offset-1 h-100 px-0">
					<div class="la-admin__mentor-rgt">
						<div class="la-admin__mentor-list">
							<div class="la-admin__mentor-item d-flex align-items-start">
								<span class="col-4 la-admin__mentor-info">{{ __('adminstaticword.Role') }}:</span>
								<span class="col-8 text-capitalize la-admin__mentor-desc">{{ $show->role }}</span>
							</div>

							<div class="la-admin__mentor-item d-flex align-items-start">
								<span class="col-4 la-admin__mentor-info">{{ __('adminstaticword.DateofBirth') }}:</span>
								<span class="col-8 text-capitalize la-admin__mentor-desc">{{ $show->dob }}</span>
							</div>

							<div class="la-admin__mentor-item d-flex align-items-start">
								<span class="col-4 la-admin__mentor-info">{{ __('adminstaticword.Gender') }}:</span>
								<span class="col-8 text-capitalize la-admin__mentor-desc">{{ $show->gender }}</span>
							</div>

							<div class="la-admin__mentor-item d-flex align-items-start">
								<span class="col-4 la-admin__mentor-info">{{ __('Awards') }}:</span>
								<span class="col-8 text-capitalize la-admin__mentor-desc">
									@php foreach(json_decode($show->awards) as $a)
										{
											echo $a;
										}
									@endphp
								</span>
							</div>

							<div class="la-admin__mentor-item d-flex align-items-start">
								<span class="col-4 la-admin__mentor-info">{{ __('Portfolio') }}:</span>
								<span class="col-8 text-capitalize la-admin__mentor-desc">
									@php foreach(json_decode($show->portfolio_links) as $a)
										{
											echo $a.',';
										}
									@endphp
								</span>
							</div>

							<div class="la-admin__mentor-item d-flex align-items-start">
								<span class="col-4 la-admin__mentor-info">{{ __('adminstaticword.Detail') }}:</span>
								<span class="col-8 text-capitalize la-admin__mentor-desc">{{ $show->detail }}</span>
							</div>

							<div class="la-admin__mentor-item d-flex align-items-start">
								<span class="col-4 la-admin__mentor-info">{{ __('adminstaticword.Resume') }}:</span>
								<span class="col-8 text-capitalize la-admin__mentor-desc">
									<a class="la-admin__mentor-resume" href="{{ asset('files/instructor/'.$show->file) }}" download="{{$show->file}}">{{ __('adminstaticword.Download') }} <i class="la-icon icon-download"></i></a>
								</span>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-10">
					<form action="{{route('requestinstructor.update',$show->id)}}" method="POST" enctype="multipart/form-data">
						{{ csrf_field() }}
						{{ method_field('PUT') }}

						<input type="hidden" value="{{ $show->user_id }}" name="user_id" class="form-control">
								<input type="hidden" value="mentors" name="role" class="form-control">
						<input type="hidden" value="{{ $show->mobile }}" name="mobile" class="form-control">
						<input type="hidden" value="{{ $show->detail }}" name="detail" class="form-control">
						<input type="hidden" value="{{ $show->gender }}" name="gender" class="form-control">
						<input type="hidden" value="{{ $show->dob }}" name="dob" class="form-control">
						<input type="hidden" value="{{ $show->image }}" name="image" class="form-control">

						<div class="row">
							<div class="col-md-2 pt-2 text-center">
								<label for="exampleInputTit1e">{{ __('adminstaticword.Status') }}:</label>
								<br>
								<li class="tg-list-item">
								<input class="la-admin__toggle-switch" id="cb333" type="checkbox" {{ $show->status==1 ? 'checked' : '' }}>
								<label class="la-admin__toggle-label" data-tg-off="Pending" data-tg-on="Approved" for="cb333"></label>
								</li>
								<input type="hidden" name="status" value="{{ $show->status }}" id="c33">
							</div>
						
						</div>
						<br>
						
						<div class="row">
							<div class="col-12 text-right mb-6">
								<button value="" type="submit"  class="btn btn-lg btn-primary px-20">{{ __('adminstaticword.Save') }}</button>
							</div>
						</div>
					</form>
				</div>
			</div>
      	</div>
  	</div>
  </div>
</section>
@endsection
