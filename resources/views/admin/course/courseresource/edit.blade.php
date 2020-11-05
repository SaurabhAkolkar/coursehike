@extends('admin/layouts.master')
@section('title', 'Edit Chapter - Admin')
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
    <div class="col-6">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title pb-6">Edit File</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body">
          <div class="form-group">
            <form id="demo-form" method="post" action="" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
              {{ csrf_field() }}
              {{ method_field('PUT') }}
                    <div class="row">
                        <input type="hidden" class="form-control " name="course_id" value={{ $cate->courses->id }}>
                        <div class="col-md-12 mt-4">
                            <label >File Name:<sup class="redstar">*</sup></label>
                            <input type="text" class="form-control" name="file_name" placeholder="Enter File Name" value="{{$cate->file_name}}">
                        </div>
                        <div class="col-md-12 mt-4">
                          <label >Current File:<sup class="redstar">*</sup></label>
                          <a href="{{'/files/material/'.$cate->file_url}}">{{$cate->file_url}}</a>
                      </div>
                
                        <div class="col-md-12 mt-4">
                            <div class="la-admin__preview la-admin__course-imgvid">
                                <label for="edit_file" class="la-admin__preview-label p-0">Replace File:<sup class="redstar">*</sup></label>
                                <div class="la-admin__preview-img" >
                                     <div class="la-admin__preview-text">
                                        <p></p>
                                        <p class="la-admin__preview-file la-admin__preview-filebg text-uppercase">Choose a File</p>
                                    </div>
                                    <div class="la-admin__preview-icon text-center mr-10">
                                        <span class="la-icon la-icon--8xl icon-pdf" style="font-size:120px;color:#E8E8E8;"></span>
                                    </div>
                                    <input type="file" class="form-control la-admin__preview-input preview_img" name="edit_file" id="edit_file" />
                                </div>
                              </div>
                        </div>
                    </div> 
                
                    <div class="box-footer mt-10">
                        <button type="submit" class="btn btn-md col-md-4 btn-primary">{{ __('adminstaticword.Save') }}</button>
                    </div>
            </form>
          </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!--/.col (right) -->
  </div>
  <!-- /.row -->
</section> 

@endsection