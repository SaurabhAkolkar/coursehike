@extends('admin.layouts.master')
@section('title', 'Get Started - Admin')
@section('body')
 
<section class="content">
   @include('admin.message')
  	<div class="row">
        <div class="col-md-12">
        	<div class="box box-primary">
              	<h3 class="la-admin__section-title">{{ __('adminstaticword.GetStarted') }}</h3>
           		
	          	<div class="panel-body">
	          		<form action="{{ action('GetstartedController@update') }}" method="POST" enctype="multipart/form-data">
		                {{ csrf_field() }}
		                {{ method_field('PUT') }}
		                
		              	<div class="row">
		                  <div class="col-md-6">
		                    <label for="heading">{{ __('adminstaticword.Heading') }}</label>
		                    <input value="{{ $show?$show['heading']:'' }}" autofocus name="heading" type="text" class="form-control" placeholder="Enter Heading"/>
						  </div>
						</div><br/>

						<div class="row">
		                  <div class="col-md-6">
		                    <label for="sub_heading">{{ __('adminstaticword.SubHeading') }}</label>
		                    <input value="{{ $show?$show['sub_heading']: '' }}" autofocus name="sub_heading" type="text" class="form-control" placeholder="Enter Sub Heading"/>
		                  </div>
		              	</div>	<br/>
		              

		              	<div class="row">
		                  <div class="col-md-6">
		                    <label for="button_txt">{{ __('adminstaticword.ButtonText') }}</label>
		                    <input value="{{ $show?$show['button_txt']: '' }}" autofocus name="button_txt" type="text" class="form-control" placeholder="Enter Button Text"/>
		                  </div>
						</div><br/>

						<div class="row">
		                  <div class="col-md-6">
						  	<div class="la-admin__preview">
								<label for="image">{{ __('adminstaticword.BackgroundImage') }}:<sup class="redstar">*</sup></label>
								<br>
								<div class="la-admin__preview-img la-admin__course-imgvid" >
									<div class="la-admin__preview-text">
										<p class="la-admin__preview-size">Preview Image</p>
										<p class="la-admin__preview-file text-uppercase">Choose a File</p>
									</div>
									<div class="text-center pr-20 mr-10">
										<span class="la-icon la-icon--8xl icon-preview-image" style="font-size:160px;">
											<span class="path1"><span class="path2"></span></span>
										</span>
									</div>
									<input type="file" name="image" id="image">
									@if($show)
									<img src="{{ url('/images/getstarted/'.$show['image']) }}" class="img-fluid"/>
									@endif
								</div>
							</div>
		                  </div>
		              	</div><br/>
						  
						 
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


