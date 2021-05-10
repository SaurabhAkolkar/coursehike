@extends('admin/layouts.master')
@section('title', 'Edit Video - Admin')
@section('body')

<section class="content">
  
  <div class="row">
    <div class="col-md-6">
      <div class="box box-primary">
          <h3 class="la-admin__section-title ml-3">{{ __('adminstaticword.Edit') }} {{ __('adminstaticword.CourseClass') }}</h3>
        
        <div class="box-body">
          <div class="form-group">
            <form enctype="multipart/form-data" id="edit-form" method="post" action="{{url('courseclass/'.$cate->id)}}" data-parsley-validate class="form-horizontal form-label-left">
              {{ csrf_field() }}
              {{ method_field('PUT') }}
                        
              <select class="display-none" name="coursechapter" class="form-control col-md-7 col-12">
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

                  <select name="coursechapter_id" id="chapters" class=" form-control">
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

			  <div class="row mt-3">
				<div class="col-12">
					  <div class="la-admin__preview">
						<label for="" class="la-admin__preview-label p-0">Video Upload:<sup class="redstar">*</sup></label>
						<div class="la-admin__preview-img la-admin__course-imgvid" id="resumable-drop" style="display: none">
							 <div class="la-admin__preview-text">
								  <p class="la-admin__preview-size">Video | 2G</p>
								  <p class="la-admin__preview-file la-admin__preview-filebg text-uppercase" id="resumable-browse" data-url="{{ url('upload') }}" >Choose a File</p>
							</div>
							<div class="text-center pr-20 mr-20">
							  <span class="la-icon la-icon--8xl icon-preview-video" style="font-size:150px;">
								<span class="path1"><span class="path2"></span></span>
							  </span>
							</div>
							@if($cate->video !="")
							<video class="preview-video w-100" controls>
							  <source src="{{ $cate->video }}" >
								Your browser does not support HTML5 video.
							</video>							
							@endif
						</div>
					  </div>
				</div>
			  </div>
              
              <div class="row">
                <div  class="col-md-12 mt-4" id="duration">
                  <label for="">{{ __('adminstaticword.Duration') }} :</label>
                  <input type="text" name="duration" value="{{ $cate->duration }}" class="form-control" placeholder="Enter class duration in (hh:mm:ss) Eg:01:30:20">
                </div>
              </div>
              <br>
             
              <div class="row">
                <div class="col-md-6">    
                  <label >{{ __('adminstaticword.Is_preview_video') }}:</label>
                  <li class="tg-list-item">   
               
                    <input class="la-admin__toggle-switch" id="c11" name="is_preview" type="checkbox" {{ $cate->is_preview == '1' ? 'checked' : '' }} />
                    <label class="la-admin__toggle-label" data-tg-off="Deactive" data-tg-on="Active" for="c11"></label>
                  </li>
                </div> 
                       
                <div class="col-md-4"> 
                  <label>{{ __('adminstaticword.Featured') }}:</label>
                  <li class="tg-list-item">
                    <input class="la-admin__toggle-switch" id="featured" type="checkbox" name="featured" {{ $cate->featured == '1' ? 'checked' : '' }} >
                    <label class="la-admin__toggle-label" data-tg-off="Disable" data-tg-on="Enable" for="featured"></label>
                  </li>
                  <input type="hidden" name="free" value="0" id="featured">
                  <br>
                </div>
              </div>

                <!-- CLASS THUMBNAIL: START -->
              <div class="row">
                <div class="col-12">
                  <div class="la-admin__preview">
                      <label for="" class="la-admin__preview-label"> Class Thumbnail:<sup class="redstar">*</sup></label>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="la-admin__preview">
                      <h6 class="la-admin__editing-title mb-2" > Current: </h6>
                      <div class="la-admin__preview-img la-admin__preview-img2 la-admin__editclass-preview" >
                          <img src="{{ $cate->image }}" alt="">
                      </div>
                  </div>
                </div>

                <div class="col-md-6">
                      <div class="la-admin__preview">
                          <h6 class="la-admin__editing-title  mb-2" > Update New: </h6>
                          <div class="la-admin__preview-img la-admin__preview-img2 la-admin__course-imgvid" >
                               <div class="la-admin__preview-text d-block">
                                  <p class="la-admin__preview-file la-admin__preview-filebg text-uppercase text-center">Choose a File</p>
                                  <p class="la-admin__preview-size text-center">Thumbnail | 500x350</p>
                              </div>
                              <div class="text-center mr-10">
                                <span class="la-icon la-icon--5xl icon-preview-image" style="font-size:100px;">
                                  <span class="path1"><span class="path2"></span></span>
                                </span>
                              </div>
                              <input type="file" class="form-control la-admin__preview-input" name="preview_image" id="edit-upload" />
                          </div>
                      </div>
                </div>
              </div> <br/>
                <!-- CLASS THUMBNAIL: END -->

              <!--  ADD CLASS STATUS: START -->
              <div class="row">
                <div class="col-12">
                  <label for="" class="la-admin__preview-label"> Status:<sup class="redstar">*</sup></label>
                  <div class="la-admin__class-status d-flex justify-content-start align-items-center">
                    <div class="la-admin__class-active pr-5">
                        <input type="radio" name="editClass-status" id="editClass-active" value="active" class="la-admin__cp-input" {{ $cate->status == '2' ? 'checked' : '' }} >
                        <label for="editClass-active" > 
                          <div class="la-admin__cp-circle d-flex align-items-center">
                            <span class="la-admin__cp-radio"></span>
                            <span class="la-admin__cp-label">Active</span> 
                          </div>
                        </label>
                    </div>

                    <div class="la-admin__class-hold pr-5">
                      <input type="radio" name="editClass-status" id="editClass-hold" value="hold" class="la-admin__cp-input" {{ $cate->status == '0' ? 'checked' : '' }} >
                      <label for="editClass-hold" > 
                        <div class="la-admin__cp-circle d-flex align-items-center">
                          <span class="la-admin__cp-radio"></span>
                          <span class="la-admin__cp-label">Inactive</span> 
                        </div>
                      </label>
                    </div>

                  </div>
                </div>
              </div>

              <div class="progress d-none" style="height: 30px;">
                <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
              </div>

              <div class="box-footer mt-12">
                <button type="submit" class="btn btn-lg col-md-4 btn-primary">{{ __('adminstaticword.Save') }}</button>
              </div>
			  
            </form>

			
            
          
          </div>
      </div>
      </div>
    </div>

    <div class="col-md-5 offset-md-1">
        <!-- SUBTITLE SECTION: START -->

        <div class="row pr-md-10">
          <div class="box box-primary">
            <div class="box-header d-flex align-items-center">
              <h3 class="box-title"> {{ __('adminstaticword.Subtitle') }}</h3>
              <a data-toggle="modal" data-target="#myModalSubtitle" href="#" class="btn btn-info btn-sm ml-auto">+  {{ __('adminstaticword.Add') }} {{ __('adminstaticword.Subtitle') }}</a>
            </div>
            <div class="box-body p-0">
              <!--Model start-->
              <div class="modal fade" id="myModalSubtitle" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="myModalLabel"> {{ __('adminstaticword.Add') }} {{ __('adminstaticword.Subtitle') }}</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
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
                                        <p class="info">Choose subtitle file only in vtt format</p>
                                        <small class="text-danger">{{ $errors->first('sub_t') }}</small>
                                      </div>
                                    </td>
        
                                    <td>
                                      {{-- <input type="text" name="sub_lang[]" placeholder="Subtitle Language" class="form-control name_list" /> --}}
                                      <select name="sub_lang[]" class="">
                                        @foreach ($languages as $language)
                                          <option value="{{$language->iso_code}}">{{$language->name}}</option>
                                        @endforeach
                                        {{-- <option value="fr">French</option>
                                        <option value="zh">Chinese</option>
                                        <option value="hi">Hindi</option>
                                        <option value="tr">Turkish</option>
                                        <option value="ta">Tamil</option> --}}
                                      </select>
                                    </td>  
                                    {{-- <td><button type="button" name="add" id="add" class="btn btn-xs btn-success">
                                      <i class="la-icon la-icon--sm icon-plus"></i>
                                    </button></td>   --}}
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
                  <tr>
                    <th>#</th>
                    <th>{{ __('adminstaticword.SubtitleLanguage') }} </th>
                    <th>{{ __('adminstaticword.Delete') }}</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=0;?>
                  {{-- {{ dd($subtitles)}} --}}
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
                            <i class="la-icon la-icon--lg icon-delete"></i>
                          </button>
                        </form>
                      </td>
                    </tr>
                  @endforeach 
                </tbody> 
              </table>
            </div>
          </div>

          {{-- <div class="box box-primary">
            <div class="box-header d-flex align-items-center">
              <h3 class="box-title"> {{ __('adminstaticword.AdditionalVideos') }}</h3>
              <a data-toggle="modal" data-target="#myModalAdditionVideo" href="#" class="btn btn-info btn-sm ml-auto">+  {{ __('adminstaticword.Add') }} {{ __('adminstaticword.AdditionalVideos') }}</a>
            </div>
            <div class="box-body p-0">
              <!--Model start-->
              <div class="modal fade" id="myModalAdditionVideo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="myModalLabel"> {{ __('adminstaticword.Add') }} {{ __('adminstaticword.AdditionalVideos') }}</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="box box-primary">
                      <div class="panel panel-sum">
                        <div  class="modal-body">
                          <form enctype="multipart/form-data" id="demo-form3" method="post" action="{{ route('add.additional',$cate->id) }}" data-parsley-validate class="form-horizontal form-label-left">
                            {{ csrf_field() }}
        
                            <div id="additional_video">
                              <input type="hidden" name="course_class_id" value="{{$cate->id}}">
                              <input type="hidden" name="course_id" value="{{$cate->course_id}}">
                              <label>{{ __('adminstaticword.AdditionalVideos') }}:</label>
                              <table class="table table-bordered" id="dynamic_field">  
                                <tr> 
                                    <td>
                                        <div class="{{ $errors->has('video') ? ' has-error' : '' }} input-file-block">
                                        <input type="file" name="video"/>
                                        <p class="info"></p>
                                        <small class="text-danger">{{ $errors->first('video') }}</small>
                                      </div>
                                    </td>
        
                                    <td>
                                      <select name="sub_lang" class="">
                                        @foreach ($languages as $language)
                                          <option value="{{$language->iso_code}}">{{$language->name}}</option>
                                        @endforeach
                                      </select>
                                    </td>  
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
                  <tr>
                    <th>#</th>
                    <th>{{ __('adminstaticword.AdditionalVideos') }} </th>
                    <th>{{ __('adminstaticword.Language') }} </th>
                    <th>{{ __('adminstaticword.Delete') }}</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=0;?>
                  @foreach($additional_videos as $video)
                    <?php $i++;?>
                    <tr>
                      <td><?php echo $i;?></td>
                      <td>  <video src="{{$video->video_path}}" controls>
                      </video></td>
                      <td>{{$video->vid_lang}}</td>
                      <td>
                        <form method="post" action="{{ route('del.additionalVideo',$video->id) }}"
                              data-parsley-validate class="form-horizontal form-label-left">
                          {{ csrf_field() }}
                          <input type="hidden" name="course_id" value="{{$cate->course_id}}"/>
                          <input type="hidden" name="course_class_id" value="{{$cate->id}}"/>
                          <button type="submit" class="btn btn-danger d-inline">
                            <i class="la-icon la-icon--lg icon-delete"></i>
                          </button>
                        </form>
                      </td>
                    </tr>
                  @endforeach 
                </tbody> 
              </table>
            </div>
          </div>  --}}

        </div>
        <!-- SUBTITLE SECTION: END -->

        <!-- AUDIO TRACKS SECTION: START -->

        {{-- <div class="row">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title "> {{ __('adminstaticword.AudioTrack') }}</h3>
            </div>
            <div class="box-body p-0">
              <a data-toggle="modal" data-target="#myModalAudioTrack" href="#" class="btn btn-info btn-sm">+  {{ __('adminstaticword.Add') }} {{ __('adminstaticword.AudioTrack') }}</a>
    
              <!--Model start-->
              <div class="modal fade" id="myModalAudioTrack" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="myModalLabel"> {{ __('adminstaticword.Add') }} {{ __('adminstaticword.AudioTrack') }}</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="box box-primary">
                      <div class="panel panel-sum">
                        <div  class="modal-body">
                          <form enctype="multipart/form-data" id="demo-form2" method="post" action="{{ route('add.audiotrack',$cate->id) }}" data-parsley-validate class="form-horizontal form-label-left">
                            {{ csrf_field() }}
        
                            <div id="AudioTrack">
        
                              <label>{{ __('adminstaticword.AudioTrack') }}:</label>
                              <table class="table table-bordered" id="dynamic_field">  
                                <tr> 
                                    <td>
                                        <div class="{{ $errors->has('name') ? ' has-error' : '' }} input-file-block">
                                        <input type="file" name="name[]"/>
                                        <p class="info">Choose AudioTrack file ex. .mp3,</p>
                                        <small class="text-danger">{{ $errors->first('name') }}</small>
                                      </div>
                                    </td>
        
                                    <td>
                                      <input type="text" name="audio_lang[]" placeholder="AudioTrack Language" class="form-control name_list" />
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
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                  <br>
                  <br>
                  <tr>
                    <th>#</th>
                    <th>{{ __('adminstaticword.AudioLanguage') }} </th>
                    <th>{{ __('adminstaticword.Delete') }}</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=0;?>
                  @foreach($audio_tracks as $audio_track)
                    <?php $i++;?>
                    <tr>
                      <td><?php echo $i;?></td>
                      <td>{{$audio_track->audio_lang}}</td>
                      <td>
                        <form method="post" action="{{ route('del.audiotrack',$audio_track->id) }}"
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
          </div>
        </div> --}}
        <!-- AUDIO TRACKS SECTION: END -->
        
    </div>
   
  </div>
</section> 

@endsection


@section('script')

<script src="https://cdnjs.cloudflare.com/ajax/libs/resumable.js/1.1.0/resumable.min.js"></script>

<script>
        var $ = window.$; // use the global jQuery instance

        var $fileUpload = $('#resumable-browse');
        var $fileUploadDrop = $('#resumable-drop');

        if ($fileUpload.length > 0 && $fileUploadDrop.length > 0) {

            var resumable = new Resumable({
                chunkSize: 15 * 1024 * 1024, // 1MB
                simultaneousUploads: 1,
				maxFiles: 1,
                testChunks: false,
                throttleProgressCallbacks: 1,
			    fileType: ['mov', 'mp4', 'mkv', 'm4v'],
                target: "{{url('courseclass/'.$cate->id)}}",
            });

            if (resumable.support) {
                $fileUploadDrop.show();
                resumable.assignDrop($fileUpload[0]);
                resumable.assignBrowse($fileUploadDrop[0]);

                resumable.on('fileAdded', function (file) {
                    
					var $source = $('.preview-video');
					$source.find("source").attr("src", URL.createObjectURL(file.file));
					$source.load();
					$($source).removeClass('d-none');
                });

                resumable.on('fileSuccess', function (file, message) {
					resumable.removeFile(file);
					$(window).off("beforeunload");
                    $('.progress').addClass('d-none');
					$("#edit-form").append('<div class="alert alert-success">Updated Successfully!</div>');
                });

                resumable.on('fileError', function (file, message) {
                    $('.resumable-file-' + file.uniqueIdentifier + ' .resumable-file-progress').html('(file could not be uploaded: ' + message + ')');
                });

                resumable.on('fileProgress', function (file) {
                    $('.progress-bar').css({width: Math.floor(resumable.progress() * 100) + '%'});
                    $('.progress-bar').html(Math.floor(file.progress() * 100) + '%');
                });

				$(document).on('submit','#edit-form',function(e){

					if(resumable.files.length > 0)
						e.preventDefault();

					$('.progress').removeClass('d-none');

					var serializeArray = $('#edit-form').serializeArray();
					var serializeData = {};

					$.map(serializeArray, function(n, i){
						serializeData[n['name']] = n['value'];
					});

					if($('input[name="preview_image"]')[0].files.length > 0)
						serializeData['preview_image'] = $('input[name="preview_image"]')[0].files[0];

					resumable.opts.query = serializeData;

					resumable.upload();

					$(window).on("beforeunload", function() {
						return "Are you sure?";
					});
				});

            }
			

        }

		$(document).on("change", ".preview_video", function(evt) {
			var $source = $(this).siblings('.preview-video');
			$source.find("source").attr("src", URL.createObjectURL(this.files[0]));
			$source.load();
			$($source).removeClass('d-none');
		});

</script>

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
