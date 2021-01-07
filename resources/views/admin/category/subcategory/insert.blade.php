@extends('admin/layouts.master')
@section('title', 'Add Subcategory - Admin')
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
    <div class="col-12">
      <!-- general form elements -->
      <div class="box box-primary">
          <h3 class="la-admin__section-title ml-3">{{ __('adminstaticword.AddSubCategory') }}</h3>
        
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body">
          <div class="form-group">
            <form id="demo-form2" method="post" action="{{url('subcategory/')}}" data-parsley-validate class="form-horizontal form-label-left" autocomplete="off">
              {{ csrf_field() }}

              <div class="row">
                <div class="col-md-6">
                  <label for="exampleInputTit1e">{{ __('adminstaticword.Category') }}</label>
                  <select name="category_id" class="form-control js-example-basic-single col-md-7 col-12">
                    @foreach($category as $cate)
                    <option value="{{$cate->id}}">{{$cate->title}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-5 d-none">
                  <label for="exampleInputTit1e">{{ __('adminstaticword.Category') }}</label>
                  <br>
                  <button type="button" data-dismiss="modal" data-toggle="modal" data-target="#myModal9" title="AddCategory"  class="btn btn-md btn-primary col-md-5">{{ __('adminstaticword.Add') }}</button>
                </div>
              </div><br>
             
              <div class="row">
                <div class="col-md-6">
                  <label for="exampleInputTit1e">{{ __('adminstaticword.SubCategory') }}:<sup class="redstar">*</sup></label>
                  <input type="text" class="form-control" name="title" id="exampleInputTitle" placeholder="Enter Your subcategory" value="">
                </div>
              </div><br>

              {{-- <div class="row">
                <div class="col-md-6">
                  <label for="exampleInputTit1e">{{ __('adminstaticword.Icon') }}:<sup class="redstar">*</sup></label>
                  <input type="text" class="form-control icp-auto icp" name="icon" id="exampleInputTitle" placeholder="Enter Your icon" value="">
                </div>
              </div>
              <br> --}}

              <div class="row">
                <div class="col-md-6">
                  <label for="exampleInputDetails">{{ __('adminstaticword.Status') }}:</label>
                  <li class="tg-list-item">              
                    <input class="la-admin__toggle-switch" id="status" type="checkbox" name="status" >
                    <label class="la-admin__toggle-label" data-tg-off="Disable" data-tg-on="Enable" for="status"></label>
                  </li>
                  <input type="hidden"  name="free" value="0" for="status" id="status">
                </div>
              </div>
              <br>
         
              <div class="row">
                <div class="col-md-6">
                  <div class="box-footer">
                    <button type="submit" class="btn btn-lg col-md-4 btn-primary">{{ __('adminstaticword.Save') }}</button>
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

@include('admin.category.subcategory.cat') 

@endsection


