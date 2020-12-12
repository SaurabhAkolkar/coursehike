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
          <!-- <div class="form-group">
            <form id="demo-form" method="post" action="{{url('announsment/'.$annou->id)}}" data-parsley-validate class="form-horizontal form-label-left">
              {{ csrf_field() }}
              {{ method_field('PUT') }}

              <label class="display-none" for="exampleInputSlug">{{ __('adminstaticword.SelectCourse') }}</label>
              <select name="course_id" class="form-control col-md-7 col-12 display-none">
                @foreach($courses as $cou)
                  <option class="display-none" value="{{ $cou->id }}" {{$annou->courses->id == $cou->id  ? 'selected' : ''}}>{{ $cou->title}}</option>
                @endforeach
              </select>

              <label class="display-none" for="exampleInputSlug">{{ __('adminstaticword.User') }}</label>
              <select  name="user" class="form-control col-md-7 col-12 display-none">
                @foreach($user as $cu)
                  <option class="display-none" value="{{ $cu->id }}" {{$annou->user->id == $cu->id  ? 'selected' : ''}}>{{ $cu->fname}}</option>
                @endforeach
              </select>
                 
              <div class="row">
                <div class="col-md-9">
                  <label for="exampleInputDetails">{{ __('adminstaticword.Announcement') }}:<sup class="redstar">*</sup></label>
                  <textarea name="announsment" rows="3" class="form-control" >{{$annou->announsment}}</textarea>
                </div>
                <div class="col-md-3">
                  <label for="exampleInputTit1e">{{ __('adminstaticword.Status') }}:</label>
                  <li class="tg-list-item">              
                      <input class="la-admin__toggle-switch" id="status" type="checkbox" name="status" {{ $annou->status == '1' ? 'checked' : '' }} >
                      <label class="la-admin__toggle-label" data-tg-off="Disable" data-tg-on="Enable" for="status"></label>
                  </li>
                  <input type="hidden"  name="free" value="0" for="status" id="status">
                </div>
              </div>
              <br>
           

              <div class="box-footer">
                <button type="submit" class="btn btn-md col-md-2 btn-primary">{{ __('adminstaticword.Save') }}</button>
              </div>
            </form>
          </div> -->

          <form class="la-admin__announce-form mr-20 pr-20" name="announcement_form" enctype="multipart/form-data" action="{{url('announcement/'.$annou->id)}}" method="post">
          @method('PUT')
          @csrf
            <input type="hidden" name="course_id" value="{{$annou->course_id}}" />
            <div class="row">
              <div class="form-group col-md-6">
                  <label for="announcement_title">Title:</label>
                  <input type="text" class="form-control" name="announcement_title" id="announcement_title" value="{{$annou->title}}" placeholder="Enter Title for the announcement">
              </div>

              <div class="form-group col-md-6">
                  <label for="announcement_category">Category:</label>
                  <select name="announcement_category" id="announcement_category" class="form-control js-example-basic-single">
                      @foreach($categories as $key=>$value)
                          <option value="{{$key}}" @if($key == $annou->category_id) selected @endif >{{$value}}</option> 
                      @endforeach
                  </select>
              </div>

              <div class="form-group col-md-12">
                  <label for="announcement_short">Short Description:</label>
                  <textarea cols="30" rows="4" class="form-control" name="announcement_short" id="announcement_short" placeholder="Short discription on the preview of the announcement">{{$annou->short_description}}</textarea>
              </div>

              <div class="form-group col-md-12">
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
             
              <div class="col-md-6">
                    <div class="la-admin__preview">
                      <label for="" class="la-admin__preview-label"> {{ __('adminstaticword.PreviewVideo') }}:</label>
                      <div class="la-admin__preview-video la-admin__course-imgvid">
                          <div class="la-admin__preview-text">
                                <p class="la-admin__preview-size">Preview video size: 20MB</p>
                                <p class="text-uppercase la-admin__preview-file">Choose a File</p>
                          </div>
                          <div class="text-center pr-20 mr-10">
                            <span class="la-icon la-icon--8xl icon-preview-video" style="font-size:160px;">
                              <span class="path1"><span class="path2"></span></span>
                            </span>
                          </div>
                          <input type="file" class="form-control la-admin__preview-input preview_video" name="preview_video" />
                          <video controls class="d-none preview-video w-100">
                            <source src="">
                              Your browser does not support HTML5 video.
                          </video>
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









