@extends('admin/layouts.master')
@section('title', 'Edit Announcement - Admin')
@section('body')

<section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title pb-6">{{ __('adminstaticword.Edit') }} {{ __('adminstaticword.Announcement') }}</h3>
        </div>
        <!-- /.box-header -->
        @if($errors->any())
        <div class="box-body">
          <div class="alert alert-danger">
            <ul>
              @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        </div>   
        @endif 
        <div class="box-body">
         <form class="la-admin__announce-form mr-20 pr-20" name="announcement_form" enctype="multipart/form-data" action="{{url('announcement/'.$annou->id)}}" method="post">
          @method('PUT')
          @csrf
            <div class="row">
              <div class="form-group col-12 mb-5">
                  <label for="announcement_title">Title:</label>
                  <input type="text" class="form-control" name="announcement_title" id="announcement_title" value="{{$annou->title}}" placeholder="Enter Title for the announcement">
              </div>

              <div class="form-group col-md-6">
                  <label for="announcement_short">Short Description:</label>
                  <textarea cols="30" rows="5" class="form-control" name="announcement_short" id="announcement_short" placeholder="Short discription on the preview of the announcement">{{$annou->short_description}}</textarea>
              </div>

              <div class="form-group col-md-6">
                <label for="announcement_long">Long Description:</label>
                <textarea id="announcement_long" name="announcement_long" rows="5" class="form-control" placeholder="Long description appear when someone clicks 'Read More'">{{$annou->long_description}}</textarea>
              </div>
            </div>

             <!-- PREVIEW IMAGE & VIDEO FILES: START -->
             <div class="row">
              <div class="col-md-6">
                    <div class="la-admin__preview">
                      <label for="" class="la-admin__preview-label">{{ __('adminstaticword.PreviewImage') }}:</label>
                      <div class="la-admin__preview-img la-admin__course-imgvid" >
                           <div class="la-admin__preview-text">
                                <p class="la-admin__preview-size m-0 ">Preview Image size: 250x150</p>
                                <p class="la-admin__preview-file text-uppercase m-0 ">Choose a File</p>
                          </div>
                          <div class="text-center pr-20 mr-10">
                            <span class="la-icon la-icon--8xl icon-preview-image" style="font-size:160px;">
                              <span class="path1"><span class="path2"></span></span>
                            </span>
                          </div>
                          <input type="file" class="form-control la-admin__preview-input inputfile inputfile-1 preview_img" name="preview_image" id="image" />
                          <img src="{{asset('images/announcement/'.$annou->preview_image)}}" alt="" class="@if($annou->preview_image) @else d-none @endif preview-img"/>
                      </div>
                    </div>
              </div>
             </div>
             <!-- PREVIEW IMAGE & VIDEO FILES: END -->
             <label class="la-admin__announce-layouts pt-5">Layout:</label> 
             <div class="row">
                <!-- Layout 1 -->
                <div class="col-md-4">
                  <input type="radio" id="layout1" name="layouts" value="1" class="la-admin__cp-input" @if($annou->layout == 1) checked @endif>
                  <label for="layout1" class="w-100"> 
                    <div class="la-admin__cp-circle">
                      <span class="la-admin__cp-radio"></span>
                      <span class="la-admin__cp-label">Layout 1</span> 
                    </div>

                    <div class="d-flex justify-content-between align-items-start">
                        <div class="col-6 pl-0">
                          <div class="la-admin__announcement-layout text-center py-12">
                            <span class="la-icon la-icon--8xl icon-preview-image mr-18" style="font-size:120px;">
                              <span class="path1"><span class="path2"></span></span>
                            </span>
                          </div>
                        </div>
            
                        <div class="col-6 px-0">
                          <div class="">
                              <div class="la-admin__layout-title py-2 mb-2">Title</div>
                              <div class="la-admin__layout-img">
                                <img src="../../images/announcement/layout_small.svg" class="img-fluid d-block mx-auto py-6" alt="Layout" />
                                <div class="la-admin__layout-button">
                                  <img src="../../images/announcement/layout_button.svg" class="img-fluid d-block ml-auto pt-6 pb-6" alt="Button" />
                                </div>
                              </div>
                          </div>
                        </div>
                    </div>
                  </label>
                </div>

                <!-- Layout 2 -->
                <div class="col-md-4">
                  <input type="radio" id="layout2" name="layouts" value="2" class="la-admin__cp-input" @if($annou->layout == 2) checked @endif> 
                  <label for="layout2" class="w-100"> 
                    <div class="la-admin__cp-circle">
                      <span class="la-admin__cp-radio"></span>
                      <span class="la-admin__cp-label">Layout 2</span> 
                    </div>

                    <div class="d-flex justify-content-between align-items-start">
                        <div class="col-12 p-0">
                            <div class="la-admin__layout-title py-2 px-3 mb-2">Title</div>
                            <div class="la-admin__layout-img ">
                              <img src="../../images/announcement/layout_big.svg" class=" py-8 img-fluid d-block mx-auto" alt="Layout" />
                              <div class="la-admin__layout-button">
                                <img src="../../images/announcement/layout_button.svg" class="py-4 img-fluid d-block ml-auto" alt="Button" />
                              </div>
                            </div>
                        </div>
                    </div>
                  </label>
                </div>

                <!-- Layout 3 -->
                <div class="col-md-4 pb-4">
                  <input type="radio" id="layout3" name="layouts" value="3" class="la-admin__cp-input" @if($annou->layout == 3) checked @endif>
                  <label for="layout3" class="w-100"> 
                    <div class="la-admin__cp-circle">
                      <span class="la-admin__cp-radio"></span>
                      <span class="la-admin__cp-label">Layout 3</span> 
                    </div>

                    <div class="d-flex justify-content-between align-items-start">
                        <div class="col-12 p-0">
                            <div class="la-admin__layout-title px-3 mb-1">Title</div>
                            <div class="la-admin__layout-img mt-2"><img src="../../images/announcement/layout_line.svg" class="img-fluid d-block mx-auto" alt="Layout" /></div>
                            <div class="la-admin__announcement-layout text-center my-2">
                              <span class="la-icon la-icon--8xl icon-preview-image mr-18" style="font-size:120px;">
                                <span class="path1"><span class="path2"></span></span>
                              </span>
                            </div>
                            <div class="la-admin__layout-img ">
                                <img src="../../images/announcement/layout_button.svg" class="p-1 img-fluid d-block ml-auto" alt="Button" />
                            </div>
                        </div>
                    </div>
                  </label>
                </div>
             </div>

             <div class="row">
              <div class="col-md-12">
                <label for="exampleInputTit1e">{{ __('adminstaticword.Status') }}:</label>
                <li class="tg-list-item">              
                    <input class="la-admin__toggle-switch" id="status" type="checkbox" name="status" {{ $annou->status == '1' ? 'checked' : '' }} >
                    <label class="la-admin__toggle-label" data-tg-off="Disable" data-tg-on="Enable" for="status"></label>
                </li>
              </div>
            </div>
            
             <div class="row box-footer mt-6">
               <div class="col-md-12 px-0">
                <button type="submit" class="btn btn-md btn-primary col-md-3 mx-2">POST</button>
               </div>
            </div>
          </form>
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









