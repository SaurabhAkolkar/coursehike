@extends('admin/layouts.master')
@section('title', 'Edit Faq Instructor - Admin')
@section('body')


<section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-12">
      <div class="box box-primary">
        <h3 class="la-admin__section-title ml-3"> {{ __('adminstaticword.Edit') }} {{ __('adminstaticword.FAQ') }} - {!! $find->title !!}  </h3>
        
        <div class="box-body">
          <div class="form-group">              
            <form id="demo-form2" method="post" action="{{url('faqinstructor/'.$find->id)}}" data-parsley-validate class="form-horizontal form-label-left"  enctype="multipart/form-data">
              {{ csrf_field() }}
              {{method_field('PATCH')}}


              <div class="row">
                <div class="col-md-8">
                  <label for="exampleInputName">{{ __('adminstaticword.Title') }}:<sup class="redstar">*</sup></label>
                  <input type="text" class="form-control" name="title" id="exampleInputTitle"value="{{$find->title}}">
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
                  <textarea class="form-control" name="details"> {{$find->details}}</textarea>
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
                  <label for="exampleInputTit1e">{{ __('adminstaticword.Status') }}:</label>
                  <li class="tg-list-item">              
                      <input class="la-admin__toggle-switch" id="status" type="checkbox" name="status" {{ $find->status == '1' ? 'checked' : '' }} >
                      <label class="la-admin__toggle-label" data-tg-off="Disable" data-tg-on="Enable" for="status"></label>
                  </li>
                  <input type="hidden"  name="free" value="0" for="status" id="status">
                </div>
              </div>
              <br>

              <div class="row">
                <div class="col-md-8">
                  <div class="box-footer">
                    <button type="submit" class="btn btn-lg col-md-3 btn-primary">{{ __('adminstaticword.Save') }}</button>
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
</script>

@endsection
