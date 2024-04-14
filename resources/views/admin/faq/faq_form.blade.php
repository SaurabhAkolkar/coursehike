@extends('admin/layouts.master')
@section('title', 'Add Faq - Admin')
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
  <div class="row">
    <!-- left column -->
    <div class="col-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <h3 class="la-admin__section-title ml-3"> {{ __('adminstaticword.Add') }} {{ __('adminstaticword.FAQ') }}</h3>
             
        <div class="box-body">
          <div class="form-group">
            <form id="demo-form2" method="post" action="{{url('faq/')}}" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
              {{ csrf_field() }}


              <div class="row">
                <div class="col-md-8">
                  <label for="exampleInputTit1e">{{ __('adminstaticword.Title') }}:<sup class="redstar">*</sup></label>
                  <input type="text" class="form-control" name="title" placeholder=" Enter Your Title" id="exampleInputTitle" value="{{ old('title') }}">
                </div>
              </div>
              <br>
              
            <div class="form-group col-8 p-0">
              <label for="exampleInputDetails">{{ __('adminstaticword.Type') }}:<sup class="redstar">*</sup></label>
              <select name="type" class="form-control">
                  <option value="subscription" @if(old('type') == 'subscription') selected @endif>Subscription</option>
                  <option value="payment_methods" @if(old('type') == 'payment_methods') selected @endif>Payment methods</option>
                  <option value="free_trial" @if(old('type') == 'free_trial') selected @endif>Free Trial</option>
                  <option value="course" @if(old('type') == 'course') selected @endif>Course</option>
              </select>
              @error('type')
              <div class="alert alert-danger">
                <ul>
                      <li>{{ $message }}</li>
                </ul>
              </div>
              @enderror
            </div>
            
              <div class="row">
                <div class="col-md-8">
                  <label for="exampleInputDetails">{{ __('adminstaticword.Detail') }}:<sup class="redstar">*</sup></label>
                  <textarea name="details" class="form-control" rows="5" placeholder="Enter Your Details" value="{{ old('details') }}"></textarea>
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
                  </li>
                  <input type="hidden"  name="status" value="0" for="status" id="status_input">
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
  tinymce.init({
    selector:'textarea'
  });
})(jQuery);

$(function() {
    $('#status').change(function() {
      $('#status_input').val(+ $(this).prop('checked'))
    })
  })
</script>

@endsection