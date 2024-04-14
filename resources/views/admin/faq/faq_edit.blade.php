@extends('admin/layouts.master')
@section('title', 'Edit Faq - Admin')
@section('body')

<section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <div class="box box-primary">
        <h3 class="la-admin__section-title ml-3"> {{ __('adminstaticword.Edit') }} {{ __('adminstaticword.FAQ') }}</h3>
        
        <div class="box-body">
          <form id="demo-form2" method="post" action="{{url('faq/'.$find->id)}}" data-parsley-validate class="form-horizontal form-label-left"  enctype="multipart/form-data">
            {{ csrf_field() }}
            {{method_field('PATCH')}}

            <div class="form-group col-md-8 p-0">              
        

              <label for="exampleInputName">{{ __('adminstaticword.Title') }}:<sup class="redstar">*</sup></label>
              <input type="text" class="form-control" name="title" id="exampleInputTitle" value="{{$find->title}}">
              @error('title')
              <div class="alert alert-danger">
                <ul>
                      <li>{{ $message }}</li>
                </ul>
              </div>
              @enderror
            
            </div>

            <div class="form-group col-8 p-0">
              <label for="exampleInputType">{{ __('adminstaticword.Type') }}:<sup class="redstar">*</sup></label>
              <select name="type" class="form-control">
                  <option value="subscription" @if(old('type') == 'subscription' || $find->type =="subscription") selected @endif>Subscription</option>
                  <option value="payment_methods" @if(old('type') == 'payment_methods' || $find->type =="payment_methods") selected @endif>Payment methods</option>
                  <option value="free_trial" @if(old('type') == 'free_trial' || $find->type =="free_trial") selected @endif>Free Trial</option>
                  <option value="course" @if(old('type') == 'course' || $find->type =="course") selected @endif> Course</option>
              </select>
              @error('type')
              <div class="alert alert-danger">
                <ul>
                      <li>{{ $message }}</li>
                </ul>
              </div>
              @enderror
            </div>

            <div class="form-group col-md-8 p-0">
              <label for="exampleInputDetails">{{ __('adminstaticword.Detail') }}:<sup class="redstar">*</sup></label>
              <textarea class="form-control" name="details"> {{$find->details}}</textarea>
              @error('details')
              <div class="alert alert-danger">
                <ul>
                      <li>{{ $message }}</li>
                </ul>
              </div>
              @enderror
            </div>
            <div class="form-group col-md-8 p-0">
            <label for="exampleInputTit1e">{{ __('adminstaticword.Status') }}:</label>
            <li class="tg-list-item">              
                <input class="la-admin__toggle-switch" id="status" type="checkbox" name="status" {{ $find->status == '1' ? 'checked' : '' }} >
                <label class="la-admin__toggle-label" data-tg-off="Disable" data-tg-on="Enable" for="status"></label>
            </li>
            <input type="hidden"  name="status" value="{{ $find->status }}" for="status" id="status_input">
            <br>
            <div class="box-footer">
            <button type="submit" class="btn btn-lg col-md-3 btn-primary">{{ __('adminstaticword.Save') }}</button>
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
  tinymce.init({selector:'textarea'});
})(jQuery);

$(function() {
    $('#status').change(function() {
      $('#status_input').val(+ $(this).prop('checked'))
    })
  })
</script>

@endsection
