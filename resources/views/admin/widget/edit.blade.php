@extends('admin.layouts.master')
@section('title', 'Widget Setting - Admin')
@section('body')
 
<section class="content">
   @include('admin.message')
	<div class="row">
        <div class="col-md-12">
        	<div class="box box-primary">
              	<h3 class="la-admin__section-title">{{ __('adminstaticword.WidgetSetting') }}</h3>
           		
	          	<div class="panel-body">
	          		<form action="{{action('WidgetController@update')}}" method="POST">
		                {{ csrf_field() }}
		                {{ method_field('PUT') }}
		                
		              	<div class="row">
		                  <div class="col-md-6">
		                    <label for="heading">{{ __('adminstaticword.WidgetOne') }}<sup class="redstar">*</sup></label>
		                    <input value="{{ $show?$show['widget_one']:'' }}" autofocus name="widget_one" type="text" class="form-control" placeholder="Enter widget" required/>
						  </div>
						</div> <br/>

						<div class="row">
	                      <div class="col-md-6">
	                        <label for="heading">{{ __('adminstaticword.WidgetTwo') }}<sup class="redstar">*</sup></label>
	                        <input value="{{ $show?$show['widget_two']:'' }}" autofocus name="widget_two" type="text" class="form-control" placeholder="Enter widget" required/>
						  </div>
						</div><br/>

						<div class="row">
	                      <div class="col-md-6">
	                        <label for="heading">{{ __('adminstaticword.WidgetThree') }}<sup class="redstar">*</sup></label>
	                        <input value="{{ $show?$show['widget_three']:'' }}" autofocus name="widget_three" type="text" class="form-control" placeholder="Enter widget" required/>
	                      </div>
			            </div>
			            <br/>
						
						<div class="row">
							<div class="col-6">
								<div class="box-footer">
									<button value="" type="submit"  class="btn btn-md btn-primary px-14">{{ __('adminstaticword.Save') }}</button>
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
