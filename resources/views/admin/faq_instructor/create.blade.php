@extends('admin/layouts.master')
@section('title', 'Add Faq Instructor - Admin')
@section('body')

<section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <h3 class="la-admin__section-title ml-3"> {{ __('adminstaticword.Add') }} {{ __('adminstaticword.FAQ') }}</h3>
             
        <div class="box-body">
          <div class="form-group">
            <form id="demo-form2" method="post" action="{{url('faqinstructor/')}}" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
              {{ csrf_field() }}

              <div class="row">
                <div class="col-md-8">
                  <label for="exampleInputTit1e">{{ __('adminstaticword.Title') }}:<sup class="redstar">*</sup></label>
                  <input type="text" class="form-control" name="title" placeholder=" Enter Your Title" id="exampleInputTitle" value="{{ old('title') }}">

                  @error('title')
                    <div class="alert alert-danger">
                          {{$message}}
                    </div>
                  @enderror

                </div>
              </div>
              <br>

              <div class="row">
                <div class="col-md-8">
                  <label for="exampleInputDetails">{{ __('adminstaticword.Detail') }}:<sup class="redstar">*</sup></label>
                  <textarea name="details" class="form-control" rows="5" placeholder="Enter Your Details" >{{ old('details') }}</textarea>
                  @error('details')
                    <div class="alert alert-danger">
                          {{$message}}
                    </div>
                  @enderror
                </div>
              </div>
              <br>

              <div class="row">
                <div class="col-md-8">
                  <label for="exampleInputDetails">{{ __('adminstaticword.Status') }}:</label>
                  <br>
                  <li class="tg-list-item">
                    <input class="la-admin__toggle-switch" id="status" type="checkbox" name="status" value="{{ old('status') }}">
                    <label class="la-admin__toggle-label" data-tg-off="Disable" data-tg-on="Enable" for="status"></label> 
                    <input type="hidden"  name="status" value="0" for="status" id="status_input">
                  </li>
                  
                </div>
              </div>
              <br>

              <div class="row">
                <div class="col-md-8">
                  <div class="box-footer">
                    <button type="submit" class="btn btn-lg col-md-3 btn-primary">{{ __('adminstaticword.Submit') }}</button>
                  </div>
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


@section('script')

<script>
(function($) {
"use strict";
  tinymce.init({selector:'textarea'});
})(jQuery);

$(function() {
    $('#status').change(function() {
      $('#status_input').val(+ $(this).prop('checked'))
    })
  })
</script>

@endsection
