@extends('admin/layouts.master')
@section('title', 'Edit Class - Admin')
@section('body')

<section class="content">
  
  <div class="row">
    <div class="col-md-7">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">{{ __('adminstaticword.Edit') }} {{ __('adminstaticword.CourseClass') }}</h3>
        </div>
        <div class="box-body">
          <div class="form-group">
            <form enctype="multipart/form-data" id="demo-form" method="post" action="{{url('courseclass/'.$cate->id)}}"data-parsley-validate class="form-horizontal form-label-left">
              {{ csrf_field() }}
              {{ method_field('PUT') }}
                        
              <select class="d-none" name="coursechapter" class="form-control col-md-7 col-12">
                @php
                 $coursechapters = App\CourseChapter::all();
                @endphp  
                @foreach($coursechapters as $cat)
                    <option {{ $cate->coursechapter_id == $cat->id ? 'selected' : "" }} value="{{ $cat->id }}">{{ $cat->chapter_name }}</option>
                @endforeach
              </select>


              <div class="row">
                <div class="col-md-12">
                  <label for="exampleInputDetails">{{ __('adminstaticword.Title') }}:<sup class="redstar">*</sup></label>
                  <input type="text" class="form-control " name="title" id="exampleInputTitle"  value="{{$cate->title}}" required>                  
                </div>
              </div>
              <br>


              <div class="row">
                <div class="col-md-12">
                  <label for="type">{{ __('adminstaticword.CourseChapter') }}:</label>

                  <select name="coursechapter_id" id="chapters" class="form-control">
                    @foreach($coursechapt as $chapters)
                    <option value="{{ $chapters->id }}" {{ $cate->coursechapter_id==$chapters->id ? 'selected' : '' }}>{{ $chapters->chapter_name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <br>

              <div class="row">
                <div class="col-md-12">
                  <label for="exampleInputDetails">{{ __('adminstaticword.Detail') }}:</label>
                  <textarea name="detail" rows="5"  class="form-control" placeholder="Enter Your Details">{{ $cate->detail }}</textarea>
                </div>
              </div>
              <br>
              
              <div class="row">
                <div class="col-md-12">
                  <label for="type">{{ __('adminstaticword.Type') }}:</label>
                  <select name="type" id="filetype" class="form-control">
                    <option value="{{ $cate->type }}">{{ $cate->type }}</option>
                  </select>
                </div>
              </div>
              <br>
             
              @if($cate->type =="video")
                <div class="row">
                  <div class="col-md-12" id="videotype">
                    <input type="radio" name="checkVideo" id="ch1" value="url" {{ $cate->url !="" ? 'checked' : "" }}>&nbsp;{{ __('adminstaticword.URL') }}&emsp;
                    <input type="radio" name="checkVideo" id="ch2" value="uploadvideo" {{ $cate->video !="" ? 'checked' : "" }}>&nbsp;{{ __('adminstaticword.UploadVideo') }}&emsp;
                    <input type="radio" name="checkVideo" id="ch9" value="iframeurl" {{ $cate->iframe_url !="" ? 'checked' : "" }}>&nbsp;{{ __('adminstaticword.IframeURL') }}&emsp;
                    <input type="radio" name="checkVideo" id="ch10" value="liveurl" {{ $cate->date_time !="" ? 'checked' : "" }}>&nbsp;{{ __('adminstaticword.LiveClass') }}&emsp;
                    

                    @if($gsetting->aws_enable == 1)
                    <input type="radio" name="checkVideo" id="ch13" value="aws_upload" {{ $cate->aws_upload !="" ? 'checked' : "" }}>&nbsp;{{ __('adminstaticword.AWSUpload') }}

                    @endif
                    <br>
                  </div>
                </div>
                


                <!-- aws edit -->
                @if($gsetting->aws_enable == 1)
                <div class="row">
                  <div class="col-md-12">
                    <div id="awsUpload" @if($cate->video !=NULL || $cate->iframe_url !=NULL || $cate->url) class="d-none" @endif >
                      <label for="">{{ __('adminstaticword.AWSUpload') }}: </label>
                      <input type="file" name="aws_upload" class="form-control">
                      @if($cate->aws_upload !="")
                        <label for="">{{ __('adminstaticword.AWSFileName') }}:</label>
                        <input disabled value="{{ $cate->aws_upload }}" class="form-control">
                      @endif
                    </div>
                  </div>
                </div>
                @endif

                <div class="row">
                  <div class="col-md-12">
                    <div id="videoURL" @if($cate->video !=NULL || $cate->iframe_url !=NULL || $cate->aws_upload !=NULL) class="d-none" @endif >
                      <label for="">{{ __('adminstaticword.URL') }}: </label>
                      <input type="text" value="{{ $cate->url }}" name="vidurl" class="form-control">
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-md-12">
                    <div id="videoUpload" @if($cate->url !=NULL || $cate->iframe_url !=NULL || $cate->aws_upload !=NULL) class="d-none" @endif >
                      <label for="">{{ __('adminstaticword.UploadVideo') }}: </label>
                      <input type="file" name="video_upld" class="form-control">
                      @if($cate->video !="")
                        <video src="{{ asset('video/class/'.$cate->video) }}" autoplay="no">
                        </video>
                      @endif
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <div id="iframeURLBox" @if($cate->url !=NULL || $cate->video !=NULL || $cate->aws_upload !=NULL) class="d-none" @endif >
                      <label for="">{{ __('adminstaticword.IframeURL') }}: </label>
                      <input type="text" value="{{ $cate->iframe_url }}" name="iframe_url" class="form-control">
                    </div>
                  </div>
                </div>

              

                <div class="row">
                  <div class="col-md-12">
                    <div id="liveURLBox" @if($cate->iframe_url !=NULL || $cate->video !=NULL || $cate->aws_upload !=NULL || $cate->url !=NULL) class="d-none" @endif >
                      <label for="appt">Select a Date & Time:</label>
                      
                      <input type="datetime-local" id="date_time" name="date_time" value="{{ $live_date }}" class="form-control">
                    </div>
                  </div>
                </div>


                
                <div class="row">
                  <div  class="col-md-12" id="duration">
                    <label for="">{{ __('adminstaticword.Duration') }} :</label>
                    <input type="text" name="duration" value="{{ $cate->duration }}" class="form-control" placeholder="Enter class duration in (mins) Eg:160">
                  </div>
                </div>
                <br>
              @endif

              @if($cate->type =="audio")
                  
                  <div class="form-group">
                    <div class="col-md-12">
                      <input type="radio" name="checkAudio" id="ch11" value="audiourl" {{ $cate->url !="" ? 'checked' : "" }}> {{ __('adminstaticword.URL') }}
                      <input type="radio" name="checkAudio" id="ch12"  {{ $cate->audio !="" ? 'checked' : "" }} value="uploadaudio"> {{ __('adminstaticword.UploadAudio') }}
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <div class="col-md-12">
                      <div id="audioURL" @if($cate->audio != "") class="d-none" @endif >
                        <label for="">{{ __('adminstaticword.URL') }}: </label>
                        <input type="text" value="{{ $cate->url }}" name="audiourl" class="form-control">
                      </div>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <div class="col-md-12">
                      <div id="audioUpload" @if($cate->url !="") class="d-none" @endif >
                      <label for="">{{ __('adminstaticword.UploadAudio') }}:</label>
                      <input type="file" name="audio" class="form-control">
                      <br>
                      @if($cate->audio !="")
                      <label for="">{{ __('adminstaticword.AudioFileName') }}:</label>
                      <input disabled value="{{ $cate->audio }}" class="form-control">

                      @endif
                    </div>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <div  class="col-md-12" id="duration">
                      <label for="">{{ __('adminstaticword.Duration') }} :</label>
                      <input type="text" name="duration" value="{{ $cate->duration }}" class="form-control" placeholder="Enter class duration in (mins) Eg:160">
                    </div>
                  </div>
              @endif

              @if($cate->type =="image")
               
                <div class="col-md-7" id="imagetype">
                  <input type="radio" name="checkImage" id="ch3" value="url" {{ $cate->url !="" ? 'checked' : "" }}> {{ __('adminstaticword.URL') }}
                  <input type="radio" name="checkImage" id="ch4"  {{ $cate->image !="" ? 'checked' : "" }} value="uploadimage"> {{ __('adminstaticword.UploadImage') }}
                </div>

                <div class="form-group">
                  <div class="col-md-12">
                    <div id="imageURL" @if($cate->image !="") class="d-none" @endif >
                      <label for="">{{ __('adminstaticword.URL') }}: </label>
                      <input type="text" value="{{ $cate->url }}" name="imgurl" class="form-control">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-12">
                    <div id="imageUpload" @if($cate->url !="") class="d-none" @endif >
                      <label for="">{{ __('adminstaticword.UploadImage') }}:</label>
                      <input type="file" name="image" class="form-control">
                      <br>
                      @if($cate->image !="")
                      <img src="{{ asset('images/class/'.$cate->image) }}" width="200" height="150" autoplay="no"> 
                      </img>

                      @endif
                    </div>
                  </div>
                </div>
                <br>

                <div class="form-group">
                   <div  class="col-md-12" id="size">
                    <label for="">{{ __('adminstaticword.Size') }}:</label>
                    <input type="text" name="size" value="{{ $cate->size }}" class="form-control">
                  </div>
                </div>
              @endif

              @if($cate->type =="zip")
                <div class="form-group">
                  <div class="col-md-12" id="ziptype">
                    <input type="radio" name="checkZip" id="ch5" value="url" {{ $cate->url !="" ? 'checked' : "" }}> {{ __('adminstaticword.URL') }}
                    <input type="radio" name="checkZip" id="ch6"  {{ $cate->zip !="" ? 'checked' : "" }} value="uploadzip"> {{ __('adminstaticword.UploadZip') }}
                  </div>
                </div>
                
                <div class="form-group">
                  <div class="col-md-12">
                    <div id="zipURL" @if($cate->zip !="") class="d-none" @endif >
                      <label for=""> {{ __('adminstaticword.URL') }}: </label>
                      <input type="text" value="{{ $cate->url }}" name="zipurl" class="form-control">
                    </div>
                  </div>
                </div>
                
                <div class="form-group">
                  <div class="col-md-12">
                    <div id="zipUpload" @if($cate->url !="") class="d-none" @endif>
                      <label for="">{{ __('adminstaticword.UploadZip') }}:</label>
                      <input type="file" name="zip" class="form-control">
                      <br>
                      @if($cate->zip !="")
                      <label for="">{{ __('adminstaticword.ZipFileName') }}:</label>
                      <input disabled value="{{ $cate->zip }}" class="form-control">
                      @endif
                    </div>
                  </div>
                </div>
                <br>
              
                <div class="col-md-12" id="size">
                  <label for=""> {{ __('adminstaticword.Size') }}:</label>
                  <input type="text" name="size" value="{{ $cate->size }}" class="form-control">
                </div>
              @endif

              @if($cate->type =="pdf")
                <div class="col-md-12" id="pdftype">
                  <input type="radio" name="checkPdf" id="ch8" value="url" {{ $cate->url !="" ? 'checked' : "" }}> {{ __('adminstaticword.URL') }}
                  <input type="radio" name="checkPdf" id="ch9"  {{ $cate->pdf !="" ? 'checked' : "" }} value="uploadpdf"> {{ __('adminstaticword.UploadPdf') }}
                </div>


                <div class="form-group">
                  <div class="col-md-12" id="pdfURL" @if($cate->pdf !="") class="d-none" @endif >
                    <div id="pdfURL" @if($cate->pdf !="") class="d-none" @endif >
                      <label for=""> {{ __('adminstaticword.URL') }}: </label>
                      <input type="text" value="{{ $cate->url }}" name="pdfurl" class="form-control">
                    </div>
                  </div>
                </div>

                <div class="col-md-7" id="pdfUpload" @if($cate->url !="") class="d-none" @endif >
                  <label for=""> {{ __('adminstaticword.UploadPdf') }}:</label>
                  <input type="file" name="pdf" class="form-control">
                  <br>
                  @if($cate->pdf !="")
                  <label for="">{{ __('adminstaticword.PdfFileName') }}:</label>
                  <input disabled value="{{ $cate->pdf }}" class="form-control">
                  @endif
                </div>
                <br>
                <br>

                 <div  class="col-md-12" id="size">
                  <label for="">{{ __('adminstaticword.Size') }}:</label>
                  <input type="text" name="size" value="{{ $cate->size }}" class="form-control">
                </div>
              @endif


              <!-- preview video -->
              @if($cate->type =="video")
              <div class="row">
                <div class="col-md-12">
                  <label for="exampleInputDetails">{{ __('adminstaticword.PreviewVideo') }}:</label>  
                  <li class="tg-list-item"> 
                    <input name="preview_type" class="tgl tgl-skewed" id="previewvide" type="checkbox" >

                    <label class="tgl-btn" data-tg-off="URL" data-tg-on="Upload" for="previewvide" ></label>
                  </li>
                  <input type="hidden" name="free" value="0" id="to">

                  <div @if($cate->preview_type =="url" ) class="d-none" @endif id="document11">
                    <label for="exampleInputSlug">Preview {{ __('adminstaticword.UploadVideo') }}: <sup class="redstar">*</sup></label>
                    <input  type="file" class="form-control" name="preview_video" id="video" value="{{ $cate->video }}">
                    @if($cate->preview_video !="")
                      <video src="{{ asset('video/class/preview/'.$cate->preview_video) }}" width="200" height="150" autoplay="no">
                      </video>
                    @endif 
                  </div>

                  <div @if($cate->preview_type =="video") class="d-none" @endif id="document22">
                   
                    <label for="exampleInputSlug">Preview {{ __('adminstaticword.URL') }}: <sup class="redstar">*</sup></label>
                    <input  class="form-control" placeholder="Enter Your URL" name="preview_url" id="url" value="{{ $cate->preview_url }}">
                  </div>
                </div>
              </div>
              <br>
              @endif

              <!-- end preview video -->
             
              <div class="row">
                <div class="col-md-4"> 
                  <label for="exampleInputTit1e">{{ __('adminstaticword.Status') }}:</label>
                  <li class="tg-list-item">              
                  <input class="tgl tgl-skewed" id="status" type="checkbox" name="status" {{ $cate->status == '1' ? 'checked' : '' }} >
                  <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="status"></label>
                </li>
                <input type="hidden"  name="free" value="0" for="status" id="status">
                  <br>
                </div>
                <div class="col-md-4"> 
                  <label for="exampleInputTit1e">{{ __('adminstaticword.Featured') }}:</label>
                  <li class="tg-list-item">              
                  <input class="tgl tgl-skewed" id="featured" type="checkbox" name="featured" {{ $cate->featured == '1' ? 'checked' : '' }} >
                  <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="featured"></label>
                </li>
                  <input type="hidden" name="free" value="0" id="featured">
                  <br>
                </div>
              </div>

                <!-- CLASS THUMBNAIL: START -->
              <div class="row">
                <div class="col-12">
                  <div class="la-admin__preview">
                      <label for="" class="la-admin__preview-label"> Class Thumbnail<sup class="redstar">*</sup></label>
                  </div>
                </div>

                <div class="col-6">
                  <div class="la-admin__preview">
                    <h6 class="la-admin__editimg-title mb-2" > Current </h6>
                      <div class="la-admin__preview-img la-admin__editclass-preview" >
                          
                      </div>
                  </div>
                </div>

                <div class="col-6">
                      <div class="la-admin__preview">
                          <h6 class="la-admin__editimg-title  mb-2" > Update new </h6>
                          <div class="la-admin__preview-img la-admin__editclass-preview" >
                               <div class="la-admin__preview-text d-block">
                                  <p class="la-admin__preview-file la-admin__preview-filebg text-uppercase text-center">Choose a File</p>
                                  <p class="la-admin__preview-size text-center">Thumbnail | 500x350</p>
                              </div>
                              <input type="file" class="form-control la-admin__preview-input" name="preview-img" id="edit-upload" />
                          </div>
                      </div>
                </div>
              </div>
                <!-- CLASS THUMBNAIL: END -->

               <!-- COURSE PACKAGE TYPE: START -->
               <div class="row">
                <div class="col-12">
                  <div class="la-admin__course-package la-admin__class-package">
                      <div class="la-admin__cp-subscription">
                          <input type="radio" name="editClass-subscription" id="editClassSub" value="Subscription" class="la-admin__cp-input" /> 
                          <label for="editClassSub"> 
                            <div class="la-admin__cp-circle">
                                <span class="la-admin__cp-radio"></span>
                                <span class="la-admin__cp-label">Subscription</span> 
                                <small><i class="fa fa-info-circle px-1"></i> (Default)</small>
                            </div>

                            <div class="la-admin__cp-desc">
                              <p>This course is accessible by all Subscribers & also available for life-time purchase. </p>
                              <p>Please enter the Course cost for One-Time Purchase</p>
                              <div class="form-group row  la-admin__subform-group">
                                  <div class="input-group col-7 la-admin__subinput-group">
                                    <div class="input-group-prepend la-admin__subinput-prepend" >
                                        <span class="fa fa-dollar input-group-text la-admin__subinput-text"></span> 
                                    </div>
                                    <input type="text" name="edit-OTP" id="edit-OTP" class="form-control la-admin__subform-input" value="20" />
                                  </div>
                              </div>
                            </div>
                          </label>
                      </div> <br/>

                      <div class="la-admin__cp-free">
                            <input type="radio" name="editClass-subscription" id="editClassFree" value="Free" class="la-admin__cp-input">
                            <label for="editClassFree" > 
                              <div class="la-admin__cp-circle">
                                <span class="la-admin__cp-radio"></span>
                                <span class="la-admin__cp-label">Free</span> 
                                <small><i class="fa fa-info-circle pl-1"></i> </small>
                              </div>

                                <div class="la-admin__cp-desc">
                                    <p class="la-admin__cp-info">  This course is accessible only by any learner </p>
                                </div>
                            </label>
                      </div>
                  </div>
                </div>
              </div>
             <!-- COURSE PACKAGE TYPE: END -->

              <!--  ADD CLASS STATUS: START -->
              <div class="row">
                <div class="col-12">
                  <label for="" class="la-admin__preview-label"> Status<sup class="redstar">*</sup></label>
                  <div class="la-admin__class-status d-flex justify-content-start">
                    <div class="la-admin__class-active pr-5">
                        <input type="radio" name="editClass-status" id="editClass-active" value="active" class="la-admin__cp-input" >
                        <label for="editClass-active" > 
                          <div class="la-admin__cp-circle">
                            <span class="la-admin__cp-radio"></span>
                            <span class="la-admin__cp-label">Active</span> 
                          </div>
                        </label>
                    </div>

                    <div class="la-admin__class-hold pr-5">
                      <input type="radio" name="editClass-status" id="editClass-hold" value="hold" class="la-admin__cp-input" >
                      <label for="editClass-hold" > 
                        <div class="la-admin__cp-circle">
                          <span class="la-admin__cp-radio"></span>
                          <span class="la-admin__cp-label">On hold</span> 
                        </div>
                      </label>
                    </div>

                    <div class="la-admin__class-archive pr-5">
                      <input type="radio" name="editClass-status" id="editClass-archive" value="archive" class="la-admin__cp-input" >
                      <label for="editClass-archive" > 
                        <div class="la-admin__cp-circle">
                          <span class="la-admin__cp-radio"></span>
                          <span class="la-admin__cp-label">Archive</span> 
                        </div>
                      </label>
                  </div>
                </div>
                </div>
            </div>
            <!-- ADD CLASS STATUS: END --> 

            <!-- ADD CLASS MASTER TOGGLER: START -->
            <div class="row">
              <div class="col-12">
                  <div class="la-admin__master-toggler">
                    <label for="" class="la-admin__preview-label"> Master Class<sup class="redstar">*</sup></label>
                    <div class="la-admin__master-class">
                        <input type="checkbox" id="edit-switch" name="edit-switch" class="la-admin__toggle-switch" />
                        <label for="edit-switch" class="la-admin__toggle-label"></label> 
                    </div>
                  </div>
              </div>
            </div>
            <!-- ADD CLASS MASTER TOGGLER: END -->

              <div class="box-footer">
                <button type="submit" class="btn btn-lg col-md-4 btn-primary">{{ __('adminstaticword.Save') }}</button>
              </div>
            </form>
          </div>
      </div>
      </div>
    </div>


    @if($cate->type =="video")

    <div class="col-md-5">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">{{ __('adminstaticword.Subtitle') }}</h3>
        </div>
        <div class="box-body">
        <a data-toggle="modal" data-target="#myModalSubtitle" href="#" class="btn btn-info btn-sm">+  {{ __('adminstaticword.Add') }} {{ __('adminstaticword.Subtitle') }}</a>

          <!--Model start-->
        <div class="modal fade" id="myModalSubtitle" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"> {{ __('adminstaticword.Add') }}{{ __('adminstaticword.Subtitle') }}</h4>
              </div>
              <div class="box box-primary">
              <div class="panel panel-sum">
                <div  class="modal-body">
                  <form enctype="multipart/form-data" id="demo-form2" method="post" action="{{ route('add.subtitle',$cate->id) }}" data-parsley-validate class="form-horizontal form-label-left">
                    {{ csrf_field() }}

                    <div id="subtitle">

                      <label>{{ __('adminstaticword.Subtitle') }}:</label>
                      <table class="table table-bordered" id="dynamic_field">  
                        <tr> 
                            <td>
                               <div class="{{ $errors->has('sub_t') ? ' has-error' : '' }} input-file-block">
                                <input type="file" name="sub_t[]"/>
                                <p class="info">Choose subtitle file ex. subtitle.srt, or. txt</p>
                                <small class="text-danger">{{ $errors->first('sub_t') }}</small>
                              </div>
                            </td>

                            <td>
                              <input type="text" name="sub_lang[]" placeholder="Subtitle Language" class="form-control name_list" />
                            </td>  
                            <td><button type="button" name="add" id="add" class="btn btn-xs btn-success">
                              <i class="fa fa-plus"></i>
                            </button></td>  
                        </tr>  
                      </table>
                     
                    </div>
                    <div class="box-footer">
                      <button type="submit" class="btn btn-lg col-md-3 btn-primary">{{ __('adminstaticword.Submit') }}</button>
                    </div>

                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
      <table id="example1" class="table table-bordered table-striped">
          <thead>
            <br>
            <br>
            <tr>
              <th>#</th>
              <th>{{ __('adminstaticword.SubtitleLanguage') }} </th>
              <th>{{ __('adminstaticword.Delete') }}</th>
            </tr>
          </thead>
          <tbody>
            <?php $i=0;?>
            @foreach($subtitles as $subtitle)
              <?php $i++;?>
              <tr>
                <td><?php echo $i;?></td>
                <td>{{$subtitle->sub_lang}}</td>
                <td>
                  <form  method="post" action="{{ route('del.subtitle',$subtitle->id) }}"
                        data-parsley-validate class="form-horizontal form-label-left">
                    {{ csrf_field() }}

                    <button type="submit" class="btn btn-danger d-inline">
                      <i class="fa fa-fw fa-trash-o"></i>
                    </button>
                  </form>
                </td>
              </tr>
            @endforeach 
          </tbody> 
        </table>
    </div>
    @endif
  </div>
</section> 

@endsection


@section('script')

<script>
(function($) {
  "use strict";
    tinymce.init({selector:'textarea'});
})(jQuery);
</script>

<script>
   $('#previewvide').on('change',function(){

    if($('#previewvide').is(':checked')){
      $('#document11').show('fast');
      $('#document22').hide('fast');
    }else{
      $('#document22').show('fast');
      $('#document11').hide('fast');
    }

  });
</script>

 @if($cate->type =="video")
  <script>
    (function($) {
    "use strict";
   
     $('#ch1').click(function(){
       $('#videoURL').show();
       $('#videoUpload').hide();
       $('#iframeURLBox').hide();
       $('#liveURLBox').hide();
       $('#awsUpload').hide();
     });
    
    $('#ch2').click(function(){
       $('#videoURL').hide();
       $('#videoUpload').show();
       $('#iframeURLBox').hide();
       $('#liveURLBox').hide();
       $('#awsUpload').hide();
     });

    $('#ch9').click(function(){
       $('#iframeURLBox').show();
       $('#videoURL').hide();
       $('#videoUpload').hide();
       $('#liveURLBox').hide();
       $('#awsUpload').hide();
     });

    $('#ch10').click(function(){
       $('#iframeURLBox').hide();
       $('#videoURL').show();
       $('#videoUpload').hide();
       $('#liveURLBox').show();
       $('#awsUpload').hide();
     });


    //aws checkbox
    $('#ch13').click(function(){
       $('#awsUpload').show();
       $('#iframeURLBox').hide();
       $('#videoURL').hide();
       $('#videoUpload').hide();
       $('#liveURLBox').hide();
     });

    })(jQuery);
   
  </script>
 @endif

 @if($cate->type =="audio")
  <script>
    (function($) {
    "use strict";
   
     $('#ch11').click(function(){
       $('#audioURL').show();
       $('#audioUpload').hide();
     });
    
    $('#ch12').click(function(){
       $('#audioURL').hide();
       $('#audioUpload').show();

     });

  })(jQuery);
  </script>
 @endif

 @if($cate->type =="image")
  <script>
    (function($) {
    "use strict";
   
     $('#ch3').click(function(){
       $('#imageURL').show();
       $('#imageUpload').hide();
     });
    
    $('#ch4').click(function(){
       $('#imageURL').hide();
       $('#imageUpload').show();

     });

  })(jQuery);
  </script>
 @endif

 @if($cate->type =="zip")
  <script>
    (function($) {
    "use strict";
   
     $('#ch5').click(function(){
       $('#zipURL').show();
       $('#zipUpload').hide();
     });
    
    $('#ch6').click(function(){
       $('#zipURL').hide();
       $('#zipUpload').show();
     });

  })(jQuery);
   
  </script>

  

  
 @endif
@endsection
