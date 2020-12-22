@extends('admin.layouts.master')
@section('title', 'First Section - Admin')
@section('body')
 
<section class="content">
   @include('admin.message')
	<div class="row">
        <div class="col-md-12">
        	<div class="box box-primary">
	           	<div class="box-header with-border">
              	<h3 class="box-title">{{ __('adminstaticword.FirstSection') }}</h3>
           		</div>
	          	<div class="panel-body">
	          		<form action="{{action('FirstSectionController@update')}}" method="POST" enctype="multipart/form-data">
		                {{ csrf_field() }}
		                {{ method_field('PUT') }}
		                
		              
                            <div class="row">
                                <div class="col-md-6">
                                <label for="exampleInputTit1e">{{ __('adminstaticword.Heading') }}:<sup class="redstar">*</sup></label>
                                <input type="text" class="form-control" name="heading" id="exampleInputTitle" value="{{$show['heading']}}">
                                </div>
                        
                                <div class="col-md-6">
                                <label for="exampleInputTit1e">{{ __('adminstaticword.SubHeading') }}:<sup class="redstar">*</sup></label>
                                <input type="text" class="form-control" name="sub_heading" id="exampleInputTitle" value="{{$show['sub_heading']}}">
                                </div>
                            </div>
                            <br> 

                            <div class="row">
                                <div class="col-md-6">
                                <label for="exampleInputTit1e">{{ __('adminstaticword.ImageText') }}:<sup class="redstar">*</sup></label>
                                <input type="text" class="form-control" name="image_text" id="exampleInputTitle" value="{{$show['image_text']}}">
                                </div>
                                <div class="col-md-6">
                                <label>{{ __('adminstaticword.Image') }}</label>
                                    <input type="file" name="image"  id="image">@if($show['image'])<img height="200" src="{{ $show['image'] }}"/>@endif
                                </br>
                                </div>
                            </div>
                            <br> 
                            <div class="box-footer">
                                <button type="submit" class="btn btn-lg col-md-2 btn-primary">+ {{ __('adminstaticword.Save') }}</button>
                            </div>

		          	</form>
	          	</div>
	      	</div>
      	</div>
  	</div>
</section>
@endsection
