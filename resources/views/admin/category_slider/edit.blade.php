@extends('admin.layouts.master')
@section('title', 'Category Slider - Admin')
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
              	<h3 class="la-admin__section-title mb-10">{{ __('adminstaticword.CategorySlider') }} </h3>
           		
	          	<div class="panel-body">
	          		<form action="{{ action('CategorySliderController@update') }}" method="POST" enctype="multipart/form-data">
		                {{ csrf_field() }}
		                {{ method_field('PUT') }}
					
		                <div class="row">
		                  <div class="col-md-6">
		                  	<div class="form-group">
			                  <label for="heading">{{ __('adminstaticword.SelectCategory') }}</label>
			                  <select class="form-control js-example-basic-single" name="category_id[]" multiple="multiple" size="3" required>

		                      @foreach ($category as $cat)
							 
								@if($cat->status == 1)
		                        <option value="{{ $cat->id }}" {{in_array($cat->id, $category_slider['category_id']) ? "selected": ""}}>{{ $cat->title }}
		                        </option>
		                        @endif

		                      @endforeach

		                    </select>
		                	</div>
		                  </div>
		                  <div class="col-md-6">
		                  	<div class="form-group">
		                      <input value="1" name="category_to_show" type="hidden" class="form-control" />
		                	</div>
		                  </div>
		              	</div>
		              	<br>
						
						<div class="row">
		                  <div class="col-md-6">
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

