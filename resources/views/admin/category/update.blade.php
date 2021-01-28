@extends('admin/layouts.master')
@section('title', 'Edit Category - Admin')
@section('body')

<section class="content">
  @include('admin.message')
  <div class="row">
    <div class="col-12">

      <div class="box box-primary">
          <h3 class="la-admin__section-title ml-3">{{ __('adminstaticword.EditCategory') }}</h3>
        
       
        <div class="panel-body pl-3">

          <form id="demo-form" method="post" action="{{url('category/'.$cate->id)}}
              "data-parsley-validate class="form-horizontal form-label-left" autocomplete="off">
              {{ csrf_field() }}
              {{ method_field('PUT') }}

            <div class="row">
              <div class="col-md-6">
                <label for="exampleInputTit1e">{{ __('adminstaticword.Category') }}:<sup class="redstar">*</sup></label>
                <input type="text" class="form-control" name="title" id="exampleInputTitle" value="{{$cate->title}}">
                @error('title')
                      <div class="alert alert-danger">
                          {{$message}}
                      </div>
                @enderror
              </div>
            </div><br/>

            {{-- <div class="row">
              <div class="col-md-6">
                <label for="exampleInputTit1e">{{ __('adminstaticword.Icon') }}:<sup class="redstar">*</sup></label>
                <input type="text" class="form-control icp-auto icp" name="icon" id="exampleInputTitle" value="{{$cate->icon}}">
              </div>
            </div><br/> --}}

            <div class="row">
              <div class="col-md-2">
                <label for="exampleInputTit1e">{{ __('adminstaticword.Featured') }}:</label>
                <li class="tg-list-item">              
                  <input class="la-admin__toggle-switch" id="featured" type="checkbox" name="featured" {{ $cate->featured == '1' ? 'checked' : '' }} >
                  <label class="la-admin__toggle-label" data-tg-off="Disable" data-tg-on="Enable" for="featured"></label>
                </li>
                <input type="hidden"  name="free" value="0" for="featured" id="featured">
              </div>

              <div class="col-md-2">
                <label for="exampleInputTit1e">{{ __('adminstaticword.Status') }}:</label>
               
                <li class="tg-list-item">              
                  <input class="la-admin__toggle-switch" id="status" type="checkbox" name="status" {{ $cate->status == '1' ? 'checked' : '' }} >
                  <label class="la-admin__toggle-label" data-tg-off="Disable" data-tg-on="Enable" for="status"></label>
                </li>
                <input type="hidden"  name="free" value="0" for="status" id="status">
              </div>
            </div>
            <br>
            
            <div class="row">
              <div class="col-md-6 text-right">
                <div class=" box-footer">
                  <button type="submit" class="btn btn-md btn-primary px-14">{{ __('adminstaticword.Save') }}</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
@endsection
