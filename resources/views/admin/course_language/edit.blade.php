@extends('admin/layouts.master')
@section('title', 'Edit Course Language - Admin')
@section('body')

<section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <h3 class="la-admin__section-title ml-3">{{ __('adminstaticword.Edit') }} {{ __('adminstaticword.Language') }}</h3>
        
        <!-- /.box-header -->
        <!-- form start -->
     
          <div class="box-body">
            <div class="form-group">
            <form id="demo-form" method="post" action="{{url('courselang/'.$language->id)}}
                  "data-parsley-validate class="form-horizontal form-label-left">
              {{ csrf_field() }}
              {{ method_field('PUT') }}

            <div class="row">
              <div class="col-md-6">
                <label >{{ __('adminstaticword.Name') }}: <sup class="redstar">*</sup></label>
                <input type="text" class="form-control" name="name" value="{{ $language->name }}" placeholder="Please Enter Your  Language Name">
                @error('name')
                    <div class="la-btn__alert-danger alert alert-danger">
                          {{$message}}
                    </div>
                @enderror
              </div>
            </div>

            <div class="row">
              <div class="col-md-3  mt-3 mt-md-6">
                <label >ISO Code: <sup class="redstar">*</sup></label>
                <input type="text" class="form-control" name="iso_code" value="{{ $language->iso_code }}" placeholder="Please Enter Your  Language Name">
                @error('iso_code')
                    <div class="la-btn__alert-danger alert alert-danger">
                          {{$message}}
                    </div>
                @enderror
              </div>
              <div class="col-md-3  mt-3 mt-md-6">
                <label for="exampleInputTit1e">{{ __('adminstaticword.Status') }}:</label>
                <li class="tg-list-item">
                <input class="la-admin__toggle-switch" id="xyz" type="checkbox" {{ $language->status==1 ? 'checked' : '' }}>
                <label class="la-admin__toggle-label" data-tg-off="Deactive" data-tg-on="Active" for="xyz"></label>
                </li>
                <input type="hidden" name="status" value="{{ $language->status }}" id="xyzz">
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-md-6">
                <div class="box-footer">
                  <button type="submit" class="btn btn-md btn-primary">{{ __('adminstaticword.Submit') }}</button>
                </div>
              </div>
            </div>
          </div>
          <!-- /.box-body -->
          
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
