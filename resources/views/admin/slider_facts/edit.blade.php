@extends('admin.layouts.master')
@section('title', 'Edit Facts Slider - Admin')
@section('body')
 
<section class="content">
  @include('admin.message')
  <div class="row">
    <div class="col-12">
    	<div class="box box-primary">
          <h3 class="la-admin__section-title ml-3">{{ __('adminstaticword.Edit') }} {{ __('adminstaticword.FactsSlider') }}</h3>
       	
        	<div class="panel-body">
        		<form action="{{route('facts.update',$show->id)}}" method="POST">
              {{ csrf_field() }}
                {{ method_field('PUT') }}
				
				
                <div class="row">
                  <div class="col-md-6">
                    <label for="icon"> {{ __('adminstaticword.Icon') }}<sup class="redstar">*</sup></label>
                    <input value="{{ $show->icon }}" autofocus required name="icon" type="text" class="form-control icp-auto icp" placeholder="Enter Facts Icon"/>
                  </div> 
                </div><br/>

                <div class="row">
                  <div class="col-md-6">
                    <label for="heading"> {{ __('adminstaticword.Heading') }}<sup class="redstar">*</sup></label>
                    <input value="{{ $show->heading }}" autofocus required name="heading" type="text" class="form-control" placeholder="Enter Facts Heading"/>
                  </div>
                </div><br/>

                <div class="row">
                  <div class="col-md-6">
                    <label for="sub_heading"> {{ __('adminstaticword.SubHeading') }}<sup class="redstar">*</sup></label>
                    <input value="{{ $show->sub_heading }}" autofocus required name="sub_heading" type="text" class="form-control" placeholder="Enter Facts Sub Heading"/>
                  </div>
              	</div>
              	<br><br/>
                
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
