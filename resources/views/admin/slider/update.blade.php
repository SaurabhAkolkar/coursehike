@extends('admin/layouts.master')
@section('title', 'Edit Slider - Admin')
@section('body')

<section class="content">
  @include('admin.message')
  <div class="row">
    <div class="col-12">
      <div class="box box-primary">
          <h3 class="la-admin__section-title ml-3"> {{ __('adminstaticword.Edit') }} {{ __('adminstaticword.Slider') }}</h3>
        
        <!-- /.box-header -->
        <div class="box-body">
          <div class="form-group">
            <form id="demo-form" method="post"  action="{{url('slider/'.$cate->id)}}
              "data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
              {{ csrf_field() }}
              {{ method_field('PUT') }}
           

              <div class="row">
                <div class="col-md-3">
                  <label for="exampleInputTit1e">{{ __('adminstaticword.Heading') }}:<sup class="redstar">*</sup></label>
                  <input type="text" class="form-control" name="heading" id="exampleInputTitle" value="{{$cate->heading}}">
                </div>
          
                <div class="col-md-3">
                  <label for="exampleInputTit1e">{{ __('adminstaticword.SubHeading') }}:<sup class="redstar">*</sup></label>
                  <input type="text" class="form-control" name="sub_heading" id="exampleInputTitle" value="{{$cate->sub_heading}}">
                </div>
              </div>
              <br> 

              <div class="row">
                <div class="col-md-6 display-none">
                  <label for="exampleInputTit1e">{{ __('adminstaticword.SearchText') }}:<sup class="redstar">*</sup></label>
                  <input type="text" class="form-control" name="search_text" id="exampleInputTitle" value="0">
                </div>
                <div class="col-md-6">
                  <label for="exampleInputTit1e">{{ __('adminstaticword.Detail') }}:<sup class="redstar">*</sup></label>
                  <input type="text" class="form-control" name="detail" id="exampleInputTitle" value="{{$cate->detail}}">
                </div>
              </div>
              <br> 

              <div class="row">
                <div class="col-md-6">
                  <div class="la-admin__preview">
                    <label>{{ __('adminstaticword.Image') }}:<sup class="redstar">*</sup></label>
                    <br>
                    <div class="la-admin__preview-img la-admin__course-imgvid" >
                      <div class="la-admin__preview-text">
                          <p class="la-admin__preview-size">Preview Image</p>
                          <p class="la-admin__preview-file text-uppercase">Choose a File</p>
                      </div>
                      <div class="text-center pr-20 mr-10">
                        <span class="la-icon la-icon--8xl icon-preview-image" style="font-size:160px;">
                            <span class="path1"><span class="path2"></span></span>
                        </span>
                      </div>
                      <input type="file" name="image"  id="image"><img src="{{ url('/images/slider/'.$cate->image) }}"/>
                    </div>
                  </div>
                </div>
              </div><br/>

              <div class="row">
                <div class="col-md-6">
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
                <div class="col-md-6">
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary px-14"> {{ __('adminstaticword.Save') }}</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!--/.col -->
  </div>
</section>

@endsection
