@extends('admin.layouts.master')
@section('title', 'Course Text - Admin')
@section('body')

@if ($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif
 
<section class="content">
   @include('admin.message')
  	<div class="row">
        <div class="col-md-12">
        	<div class="box box-primary">
              	<h3 class="la-admin__section-title">{{ __('adminstaticword.CourseText') }}</h3>
           	
	          	<div class="panel-body">
	          		<form action="{{ action('CoursetextController@update') }}" method="POST" enctype="multipart/form-data">
		                {{ csrf_field() }}
		                {{ method_field('PUT') }}
		                
		              	<div class="row">
		                  <div class="col-md-6">
		                    <label for="heading">{{ __('adminstaticword.Heading') }}<sup class="redstar">*</sup></label>
		                    <input value="{{ $show?$show['heading']: '' }}" autofocus required name="heading" type="text" class="form-control" placeholder="Enter Facts Heading"/>
						  </div>
						</div><br/>
						  
						<div class="row">
		                  <div class="col-md-6">
		                    <label for="sub_heading">{{ __('adminstaticword.SubHeading') }}<sup class="redstar">*</sup></label>
		                    <input value="{{ $show?$show['sub_heading']: '' }}" autofocus required name="sub_heading" type="text" class="form-control" placeholder="Enter Facts Sub Heading"/>
		                  </div>
		              	</div><br>
						  

						<div class="row">
		                  <div class="col-md-6">
							<div class="box-footer">
								<button value="" type="submit" class="btn btn-md btn-primary px-14">{{ __('adminstaticword.Save') }}</button>
							</div>
						</div>
						</div>
		          	</form>
	          	</div>
	      	</div>
      	</div>
  	</div>
</section>
@endsection


