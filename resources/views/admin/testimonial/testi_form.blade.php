@extends('admin/layouts.master')
@section('title', 'Add Testimonial - Admin')
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
    <!-- left column -->
    <div class="col-md-12">   
      <!-- general form elements -->
      <div class="box box-primary">
          <h3 class="la-admin__section-title ml-3"> {{ __('adminstaticword.Add') }} {{ __('adminstaticword.Testimonial') }}</h3>
                
          <div class="box-body">
            <div class="form-group">
              <form id="demo-form2" method="post" action="{{url('testimonial/')}}" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="row">
                  <div class="col-md-6">
                    <label for="exampleInputTit1e">{{ __('adminstaticword.Name') }}:<sup class="redstar">*</sup></label>
                    <input type="text" class="form-control" name="client_name" id="exampleInputTitle" placeholder=" Enter Your Name" value="{{ old('client_name') }}">
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 mt-md-3">
                    <div class="la-admin__preview">
                      <div class="la-admin__preview">
                        <label for="" class="la-admin__preview-label">{{ __('adminstaticword.Image') }}:</label>
                        <div class="la-admin__preview-img la-admin__course-imgvid" >
                             <div class="la-admin__preview-text">
                                  <p class="la-admin__preview-size">Preview Image size: 250x150</p>
                                  <p class="la-admin__preview-file text-uppercase">Choose a File</p>
                            </div>
                            <div class="text-center pr-20 mr-10">
                              <span class="la-icon la-icon--8xl icon-preview-image" style="font-size:160px;">
                                <span class="path1"><span class="path2"></span></span>
                              </span>
                            </div>
                            <input type="file" class="form-control la-admin__preview-input inputfile inputfile-1 preview_img" name="image" id="image" />
                            <img src="" alt="" class="d-none preview-img" required/>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <br/>
                
                <div class="row">
                  <div class="col-md-6">
                    <label for="exampleInputDetails">{{ __('adminstaticword.Type') }}:<sup class="redstar">*</sup></label>
                      <select name="type" class ="form-control js-example-basic-single">
                          <option value="learner" @if(old('type')=='learner') selected @endif>Learner</option>
                          <option value="mentor" @if(old('type')=='mentor') selected @endif>Mentor</option>
                      </select>
                    <br>
                  </div>
                </div>
                <br />

                <div class="row">
                  <div class="col-md-6">
                    <label for="exampleInputDetails">{{ __('adminstaticword.Detail') }}:<sup class="redstar">*</sup></label>
                     <textarea name="details" rows="5"  class="form-control" placeholder="Enter Your Detail">
                      {{ old('details')}}
                    </textarea>
                    <br>
                  </div>
                </div>

                <div class="row">
                  <div class="col-6 col-md-3">
                    <div class="la-rtng__review-stars">
                      <div class="starRatingContainer">
                          <label for="exampleInputDetails">Rating:<sup class="redstar">*</sup></label>
                          <div class="rate2"></div>
                          <input id="input2" type="hidden" name="rating" value="3"></div>
                    </div>
                  </div>
                
                  <div class="col-6 col-md-3">
                    <label for="exampleInputDetails">{{ __('adminstaticword.Status') }}:</label>
                    <br>
                    <li class="tg-list-item">              
                      <input class="la-admin__toggle-switch" id="status" type="checkbox" name="status" >
                      <label class="la-admin__toggle-label" data-tg-off="Disable" data-tg-on="Enable" for="status"></label>
                    </li>
                    <input type="hidden"  name="free" value="0" for="status" id="status">
                  </div>
                </div>
                <br/>
               

                <div class="row">
                    <div class="col-md-6 text-right mt-8">
                        <button type="submit" class="btn btn-lg btn-primary px-14">{{ __('adminstaticword.Submit') }}</button>
                    </div>
                </div>

              </form>
            </div>
       
          </div>
          <!-- /.box -->
      </div>
      <!-- /.box -->
    </div>
    <!--/.col (right) -->
  </div>
  <!-- /.row -->
</section> 
@endsection

@section('scripts')
<script src="{{asset('/js/rater.min.js')}}" charset="utf-8"></script>
<script>
(function($) {
  "use strict";
  tinymce.init({selector:'textarea'});
})(jQuery);

var options = {
                max_value: 5,
                step_size: 1,
                url: '/',
                initial_value: 3,
                update_input_field_name: $("#input2"),
            };

$(".rate2").rate(options);


function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();    
    reader.onload = function(e) {
      $(input).siblings('.preview-img').attr('src', e.target.result).removeClass('d-none');
    }
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}

$(".preview_img").change(function() {
  readURL(this);
});

$(document).on("change", ".preview_video", function(evt) {
  var $source = $(this).siblings('.preview-video');
  $source.find("source").attr("src", URL.createObjectURL(this.files[0]));
  $source.load();
  $($source).removeClass('d-none');
});

$('#preview').on('change',function(){

if($('#preview').is(':checked')){
  $('#document1').show('fast');
  $('#document2').hide('fast');
}else{
  $('#document2').show('fast');
  $('#document1').hide('fast');
}

});
</script>

@endsection