@extends('admin.layouts.master')
@section('title', 'First Section - Admin')
@section('body')
 
<section class="content">
   @include('admin.message')
	<div class="row">
        <div class="col-md-12">
        	<div class="box box-primary">
              	<h3 class="la-admin__section-title">{{ __('adminstaticword.FirstSection') }}</h3>
           		
	          	<div class="panel-body">
	          		<form action="{{action('FirstSectionController@update')}}" method="POST" enctype="multipart/form-data">
		                {{ csrf_field() }}
		                {{ method_field('PUT') }}
		                
		              
                            <div class="row">
                                <div class="col-md-3">
                                <label for="exampleInputTit1e">{{ __('adminstaticword.Heading') }}:<sup class="redstar">*</sup></label>
                                <input type="text" class="form-control" name="heading" id="exampleInputTitle" value="{{$show['heading']}}" placeholder="Enter Section Heading">
                                </div>
                            
                                <div class="col-md-3">
                                <label for="exampleInputTit1e">{{ __('adminstaticword.SubHeading') }}:<sup class="redstar">*</sup></label>
                                <input type="text" class="form-control" name="sub_heading" id="exampleInputTitle" value="{{$show['sub_heading']}}" placeholder="Enter Section Sub Heading">
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 mt-4">
                                    <label for="exampleInputTit1e">{{ __('adminstaticword.ImageText') }}:<sup class="redstar">*</sup></label>
                                    <input type="text" class="form-control" name="image_text" id="exampleInputTitle" value="{{$show['image_text']}}" placeholder="Enter Image Text">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mt-4">
                                    <div class="la-admin__preview">
                                        <label>{{ __('adminstaticword.Image') }}:<sup class="redstar">*</sup></label><br/>
                                        <div class="la-admin__preview-img la-admin__course-imgvid" >
                                            <div class="la-admin__preview-text" onclick="$('#image').click()">
                                                <p class="la-admin__preview-size">Preview Image</p>
                                                <p class="la-admin__preview-file text-uppercase">Choose a File</p>
                                            </div>
                                            <div class="text-center pr-20 mr-10">
                                                <span class="la-icon la-icon--8xl icon-preview-image" style="font-size:160px;">
                                                    <span class="path1"><span class="path2"></span></span>
                                                </span>
                                            </div>
                                                                                   
                                            <input type="file" name="image"  id="image" class="d-none ">@if($show['image'])<img height="200"  src="{{ $show['image'] }}" style="margin-left:200px;"/>@endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>

                        <!-- VIDEO: START -->
                            <div class="row mt-3">
                            <div class="col-6">
                                    <div class="la-admin__preview">
                                    <label for="" class="la-admin__preview-label p-0">Video Upload:<sup class="redstar">*</sup></label>
                                    <div class="la-admin__preview-img la-admin__course-imgvid" >
                                        <div class="la-admin__preview-text">
                                                <p class="la-admin__preview-size">Video | 100MB</p>
                                                <p class="la-admin__preview-file la-admin__preview-filebg text-uppercase">Choose a File</p>
                                        </div>
                                        <div class="text-center pr-20 mr-20">
                                            <span class="la-icon la-icon--8xl icon-preview-video" style="font-size:150px;">
                                            <span class="path1"><span class="path2"></span></span>
                                            </span>
                                        </div>
                                        <input type="file" class="form-control la-admin__preview-input preview_video" name="preview_video" />
                                        @if($show['video_url'] != null)
                                        <video controls  class="preview-video w-100">
                                            <source src="{{$show['video_url']}}">
                                            Your browser does not support HTML5 video.
                                        </video>
                                        @endif
                                    </div>
                                    </div>
                            </div>
                            </div>
                        <!-- VIDEO: END -->
                            <br>
                            
                            <div class="row">
                                <div class="col-6">
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-lg btn-primary px-14"> {{ __('adminstaticword.Save') }}</button>
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
