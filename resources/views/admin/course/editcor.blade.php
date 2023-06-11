<section class="content">
  {{-- @include('admin.message') --}}
  <div class="row">
    <!-- left column -->
    <div class="col-12 px-0">
        <h3 class="la-admin__section-title ml-3"> {{ __('adminstaticword.Edit') }} {{ __('adminstaticword.Course') }}</h3>
        
        
        <!-- /.box-header -->
        <div class="box-body px-0">
          <div class="form-group">
            <form action="{{route('course.update',$cor->id)}}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}  
              {{ method_field('PUT') }}
             
              <div class="row">
                <div class="col-md-4 mt-3 mt-md-0">
                  <label>{{ __('adminstaticword.Category') }}<span class="redstar">*</span></label>
                  <select name="category_id" id="category_id" class="form-control js-example-basic-single" required>
                    <option value="0">{{ __('adminstaticword.SelectanOption') }}</option>
                    @php
                      $category = App\Categories::all();
                    @endphp 

                    @foreach($category as $caat)
                      <option {{ $cor->category_id == $caat->id ? 'selected' : "" }} value="{{ $caat->id }}">{{ $caat->title }}</option>
                    @endforeach 
                  </select>
                </div>
                <div class="col-md-4 mt-3 mt-md-0">
                  <label>{{ __('adminstaticword.SubCategory') }}:<span class="redstar">*</span></label>
                  <select name="subcategory_id" id="upload_id" class="form-control js-example-basic-single">
                    @php
                      $subcategory = App\SubCategory::all();
                    @endphp
                    @foreach($subcategory as $caat)
                      <option {{ $cor->subcategory_id == $caat->id ? 'selected' : "" }} value="{{ $caat->id }}">{{ $caat->title }}</option>
                    @endforeach
                  </select>
                </div>
                {{-- <div class="col-md-3 mt-3 mt-md-0">
                  <label>{{ __('adminstaticword.ChildCategory') }}:</label>
                  <select name="childcategory_id" id="grand" class="form-control js-example-basic-single">
                    @php
                      $childcategory = App\ChildCategory::all();
                    @endphp 

                    @foreach($childcategory as $caat)
                      <option {{ $cor->childcategory_id == $caat->id ? 'selected' : "" }} value="{{ $caat->id }}">{{ $caat->title }}</option>
                    @endforeach
                  </select>
                </div> --}}     
                <div class="col-md-4 mt-3 mt-md-0">
                  @php
                    $User = App\User::all();
                  @endphp
                  <label for="exampleInputSlug">{{ __('adminstaticword.Instructor') }}</label>
                  <select name="user_id" class="form-control js-example-basic-single ">
                    @foreach($users as $user)
                      <option  value="{{ $user->id }}" @if($user->id == $cor->user_id) selected @endif)>{{ $user->fullName }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              

              <div class="row">
                <div class="col-md-6 mt-3 mt-md-6"> 
                  <label for="exampleInputTit1e">{{ __('adminstaticword.Title') }}:<sup class="redstar">*</sup></label>
                  <input type="text" class="form-control" name="title" id="exampleInputTitle" value="{{ $cor->title }}">
                </div>

                <div class="col-md-6 mt-3 mt-md-6"> 
                  @php
                      $languages = App\CourseLanguage::where(['status'=>1])->get();
                  @endphp
                  <label for="exampleInputSlug">{{ __('adminstaticword.SelectLanguage') }}</label>
                  <select name="language_id" class="form-control js-example-basic-single col-12">
                    @foreach($languages as $cat)
                      <option {{ $cor->language_id == $cat->id ? 'selected' : "" }} value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach
                  </select>
                </div>
                
              </div>
             

              <div class="row">
                <div class="col-md-6 mt-3 mt-md-6">
                  <label for="exampleInputDetails">{{ __('adminstaticword.ShortDetail') }}:<sup class="redstar">*</sup></label>
                  <textarea name="short_detail" rows="3" class="form-control" >{!! $cor->short_detail !!}</textarea>
                </div>
                <div class="col-md-6 mt-3 mt-md-6">
                  <label for="exampleInputDetails">{{ __('adminstaticword.Requirements') }}:<sup class="redstar">*</sup></label>
                  <textarea name="requirement" rows="3" class="form-control" required >{!! $cor->requirement !!}</textarea>
                </div>
              </div>
              

              <div class="row">
                <div class="col-md-6 mt-3 mt-md-6">
                  <label for="exampleInputDetails">{{ __('adminstaticword.level') }}:<sup class="redstar">*</sup></label>
                  <select name="level" class="form-control js-example-basic-single">
                    <option disabled selected > Select Level</option>
                    <option value="1" @if($cor->level == 1) selected @endif> Begginer</option>
                    <option value="2" @if($cor->level == 2) selected @endif > Intermediate</option>
                    <option value="3" @if($cor->level == 3) selected @endif> Advanced</option>
                  </select> 
                </div>

                <div class="col-md-6 mt-3 mt-md-6">
                  <label for="exampleInputSlug">Course Duration(in Hours)</label>
                  <input min="1" class="form-control" name="duration" type="number" id="duration" value="{{ $cor->duration }}" placeholder="Enter Duration in hours">
                </div>

              </div>
             

              <div class="row">
                <div class="col-md-12 mt-3 mt-md-6">
                  <label for="exampleInputDetails">{{ __('adminstaticword.Detail') }}:<sup class="redstar">*</sup></label>
                  <textarea id="detail" name="detail" rows="3" class="form-control">{!! $cor->detail !!}</textarea>
                </div>
              </div>
              <br>
            
              <!-- COURSE PACKAGE TYPE: START -->
              <div class="row">
                <div class="col-md-12">
                  <div class="la-admin__course-package">
                      <label for="" class="la-admin__cp-title">Course package type<sup class="redstar">*</sup></label><br/>
                      <div class="la-admin__cp-subscription">
                          <input type="radio" name="package_type" id="subPaid" value="1" class="la-admin__cp-input" {{ $cor->package_type == '1' ? 'checked' : '' }} > 
                           <label for="subPaid"> 
                             <div class="la-admin__cp-circle">
                                <span class="la-admin__cp-radio"></span>
                                <span class="la-admin__cp-label">Subscription</span> 
                                <small class=" text-xs mt-1 pl-1">(Default)</small>
                             </div>

                              <div class="la-admin__cp-desc">
                                  <p>This course is accessible by all Subscribers & also available for life-time purchase. </p>
                                  <p>Please enter the Course cost for One-Time Purchase</p>
                                  <div class="form-group row  la-admin__subform-group">
                                      <div class="input-group col-10 col-sm-6 la-admin__subinput-group">
                                        <div class="input-group-prepend la-admin__subinput-prepend" >
                                            <span class="fa fa-dollar input-group-text la-admin__subinput-text"></span> 
                                        </div>
                                        <input type="text" class="form-control la-admin__subform-input" name="price" style="width:160px" value="{{ $cor->price }}"/>
                                      </div>
                                  </div>
                              </div>
                          </label>
                      </div>

                        {{-- <div class="la-admin__cp-premium ">
                          <input type="radio" name="subscription" id="subPremium" value="Premium" class="la-admin__cp-input"> 
                              <label for="subPremium" > 
                                <div class="la-admin__cp-circle">
                                  <span class="la-admin__cp-radio"></span>
                                  <span class="la-admin__cp-label">Premium </span>
                                  <div class="mx-1 mt-1" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="There are many variations of passages of Lorem Ipsum available">
                                    <span class="la-icon la-icon--md icon-details"> 
                                  </div>
                                </div>
                                <div class="la-admin__cp-desc">
                                    <p> This course is accessible only by exclusive purchase </p>
                                </div>
                            </label>
                        </div> <br/> --}}

                        <div class="la-admin__cp-free">
                            <input type="radio" name="package_type" id="subFree" value="0" class="la-admin__cp-input" {{ $cor->package_type == '0' ? 'checked' : '' }} >
                            <label for="subFree" > 
                              <div class="la-admin__cp-circle">
                                <span class="la-admin__cp-radio"></span>
                                <span class="la-admin__cp-label">Free</span> 
                              </div>

                                <div class="la-admin__cp-desc">
                                    <p class="la-admin__cp-desc">  This course is accessible by any learner </p>
                                </div>
                            </label>
                        </div>
                  </div>
                </div>
              </div>
               <!-- COURSE PACKAGE TYPE: END -->
              <div class="la-admin__hr-line"></div>
               <!-- PREVIEW IMAGE & VIDEO FILES: START -->
              <div class="row">
                
                <div class="col-md-6 col-xl-5">
                    <div class="la-admin__preview">
                      <label for="" class="la-admin__preview-label">{{ __('adminstaticword.PreviewImage') }}:<sup class="redstar">*</sup></label>
                      <div class="la-admin__preview-img la-admin__course-imgvid" >
                            <div class="la-admin__preview-text">
                                <p class="la-admin__preview-size">vertical Preview Image size: 500x500</p>
                                <p class="la-admin__preview-file text-uppercase">Choose a File</p>
                          </div>
                          <div class="text-center pr-20 mr-10">
                            <span class="la-icon la-icon--8xl icon-preview-image" style="font-size:150px;">
                              <span class="path1"><span class="path2"></span></span>
                            </span>
                          </div>
                          <input type="file" class="form-control la-admin__preview-input inputfile inputfile-1 preview_img" name="preview_image" id="image" />
                          @if($cor['preview_image'] !== NULL && $cor['preview_image'] !== '')
                              <img src="{{ $cor->preview_image }}" class="preview-img" />
                          @else
                              <img src="{{ Avatar::create($cor->title)->toBase64() }}" alt="course" class="preview-img img-fluid">
                          @endif
                      </div>
                    </div>
                </div>
                
                <div class="col-md-6 col-xl-7">
                  <div class="la-admin__preview">
                    <label for="" class="la-admin__preview-label">Video Player {{ __('adminstaticword.PreviewImage') }}:<sup class="redstar">*</sup></label>
                    <div class="la-admin__preview-img la-admin__course-imgvid" >
                        <div class="la-admin__preview-text">
                              <p class="la-admin__preview-size">Horizontal Preview Image size: 1280x600</p>
                              <p class="la-admin__preview-file text-uppercase">Choose a File</p>
                        </div>
                        <div class="text-center pr-20 mr-10">
                          <span class="la-icon la-icon--8xl icon-preview-image" style="font-size:150px;">
                            <span class="path1"><span class="path2"></span></span>
                          </span>
                        </div>
                        <input type="file" class="form-control la-admin__preview-input preview_img" name="video_preview_img" />
                        @if($cor['video_preview_img'] !== NULL && $cor['video_preview_img'] !== '')
                              <img src="{{ $cor->video_preview_img }}" class="preview-img" />
                        @endif
                    </div>
                  </div>
              </div>
            </div>

            <div class="row mt-6">
                <div class="col-md-5">
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
                            <input type="file" class="form-control la-admin__preview-input preview_video" name="preview_video" value="{{ $cor->preview_video }}"/>
                            {{-- @if($cor->video !="") --}}
                              <video controls class="preview-video w-100">
                                <source src="{{ $cor->preview_video }}" id="preview-video-source">
                                  Your browser does not support HTML5 video.
                              </video>
                            {{-- @endif  --}}
                        </div>
                      </div>
                </div>
              </div>
               <!-- PREVIEW IMAGE & VIDEO FILES: END -->
              <br>
              <br> 

              <div class="row">    

                {{-- <div class="col-6 col-md-2">
                  <label for="exampleInputDetails">Master Class:</label>
                  <li class="tg-list-item">              
                    <input class="la-admin__toggle-switch" id="master_class" type="checkbox" name="master_class" @if($check_master_class) checked @endif >
                    <label class="la-admin__toggle-label" data-tg-off="Disable" data-tg-on="Enable" for="master_class"></label>
                  </li>
                  <input type="hidden"  name="master_class"  for="master_class" id="master_class2" @if($check_master_class) value="1" @endif>
                </div> --}}

                <div class="col-6 col-md-2"> 
                  @if(Auth::User()->role == "admin")
                  <label for="exampleInputTit1e">{{ __('adminstaticword.Featured') }}:</label>
                  <li class="tg-list-item">
                    <input class="la-admin__toggle-switch" id="cb1" type="checkbox" name="featured" {{ $cor->featured==1 ? 'checked' : '' }}>
                    <label class="la-admin__toggle-label" data-tg-off="No" data-tg-on="Yes" for="cb1"></label>
                  </li>
                  <input type="hidden" name="featured" value="{{ $cor->featured }}" id="f">
                  @endif
                </div>                

                <div class="col-md-4">
                  @if(Auth::User()->role == "admin")
                  <label for="exampleInputTit1e">{{ __('adminstaticword.Status') }}:</label>
                      <div class="d-flex align-items-center">
                          <label class="mr-3 font-weight-normal"><input type="radio" name="status" id="ch1" value="1" {{ $cor->status == 1 ? 'checked' : '' }}>  {{ __('adminstaticword.Active') }} </label>
                          <label class="mr-3  font-weight-normal"><input type="radio" name="status" id="ch2" value="0" {{ $cor->status == 0 ? 'checked' : '' }}>  {{ __('OnHold') }} </label>
                          <label class="mr-3  font-weight-normal"><input type="radio" name="status" id="ch3" value="2" {{ $cor->status == 2 ? 'checked' : '' }}>  {{ __('Archive') }} </label>
                      </div>
                   
                  @endif
                </div> 
              </div> 
              <br/>

              <div class="box-footer">
                <button type="submit" class="btn btn-lg col-md-3 btn-primary">{{ __('adminstaticword.Save') }}</button>
              </div>
         
            </form>
          </div>
        </div>
        <!-- /.box -->
    </div>
    <!--/.col (right) -->
  </div>
  <!-- /.row -->
  <hr>
  <div class="la-admin__hr-line"></div>
	<div class="row pr-md-10">

		<div class="box box-primary">
			<div class="box-header d-flex align-items-center">
			<h3 class="box-title"> {{ __('adminstaticword.MultilingualPreviewVideos') }}</h3>
			<a data-toggle="modal" data-target="#myModalAdditionVideo" href="#" class="btn btn-info btn-sm ml-auto">+  {{ __('adminstaticword.Add') }} {{ __('adminstaticword.MultilingualPreviewVideos') }}</a>
			</div>
			<div class="box-body p-0">
			<!--Model start-->
			<div class="modal fade" id="myModalAdditionVideo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel"> {{ __('adminstaticword.Add') }} {{ __('adminstaticword.MultilingualPreviewVideos') }}</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="box box-primary">
					<div class="panel panel-sum">
						<div  class="modal-body">
						<form enctype="multipart/form-data" id="multilingual-preview-form" method="post" action="{{ route('add.multilingual_preview',$cor->id) }}" data-parsley-validate class="form-horizontal form-label-left">
							{{ csrf_field() }}
		
							<div id="additional_video">
							<input type="hidden" name="course_id" value="{{$cor->id}}">
							<label>{{ __('adminstaticword.MultilingualPreviewVideos') }}:</label>
							<table class="table table-bordered" id="dynamic_field">  
								<tr> 
									<td>
										<div class="{{ $errors->has('video') ? ' has-error' : '' }} input-file-block">
										<input type="file" name="video" id="multilingual-browse"/>
										<p class="info"></p>
										<small class="text-danger">{{ $errors->first('video') }}</small>
									</div>
									</td>
		
									<td>
									<select name="sub_lang" class="">
										@foreach ($preview_languages as $language)
										<option value="{{$language->iso_code}}">{{$language->name}}</option>
										@endforeach
									</select>
									</td>  
								</tr>  
							</table>
							
							<div class="progress d-none" style="height: 30px;">
								<div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
							</div>

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
					<th>{{ __('adminstaticword.MultilingualPreviewVideos') }} </th>
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
						<form method="post" action="{{ route('del.multilingual',$video->id) }}"
							data-parsley-validate class="form-horizontal form-label-left">
						{{ csrf_field() }}
						<input type="hidden" name="course_id" value="{{$cor->course_id}}"/>
						<input type="hidden" name="course_class_id" value="{{$cor->id}}"/>
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
	</div>
</section> 


@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/resumable.js/1.1.0/resumable.min.js"></script>
<script>
(function($) {
  "use strict";
    tinymce.init({selector:'textarea#detail'});
})(jQuery);
</script>

<script>
(function($) {
  "use strict";

  $(function() {
    $('.js-example-basic-single').select2();
  });

  $(function() {
    $('#cb1').change(function() {
      $('#f').val(+ $(this).prop('checked'))
    })
  })

  $(function() {
    $('#master_class').change(function() {
      $('#master_class2').val(+ $(this).prop('checked'))
    })
  })



  $(function() {
    $('#cb3').change(function() {
      $('#test').val(+ $(this).prop('checked'))
    })
  })

  $(function(){

      $('#murl').change(function(){
        if($('#murl').val()=='yes')
        {
            $('#doab').show();
        }
        else
        {
            $('#doab').hide();
        }
      });

  });

  $(function(){

      $('#murll').change(function(){
        if($('#murll').val()=='yes')
        {
            $('#doabb').show();
        }
        else
        {
            $('#doab').hide();
        }
      });

  });

  $('#preview').on('change',function(){

    if($('#preview').is(':checked')){
      $('#document1').show('fast');
      $('#document2').hide('fast');    

    }else{
      $('#document2').show('fast');
      $('#document1').hide('fast');    
    }

  });

  $(function() {
    var urlLike = '{{ url('admin/dropdown') }}';
    $('#category_id').change(function() {
      var up = $('#upload_id').empty();
      var cat_id = $(this).val();    
      if(cat_id){
        $.ajax({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type:"GET",
          url: urlLike,
          data: {catId: cat_id},
          success:function(data){   
            console.log(data);
            up.append('<option value="0">Please Choose</option>');
            $.each(data, function(id, title) {
              up.append($('<option>', {value:id, text:title}));
            });
          },
          error: function(XMLHttpRequest, textStatus, errorThrown) {
            console.log(XMLHttpRequest);
          }
        });
      }
    });
  });

  $(function() {
    var urlLike = '{{ url('admin/gcat') }}';
    $('#upload_id').change(function() {
      var up = $('#grand').empty();
      var cat_id = $(this).val();    
      if(cat_id){
        $.ajax({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type:"GET",
          url: urlLike,
          data: {catId: cat_id},
          success:function(data){   
            console.log(data);
            up.append('<option value="0">Please Choose</option>');
            $.each(data, function(id, title) {
              up.append($('<option>', {value:id, text:title}));
            });
          },
          error: function(XMLHttpRequest, textStatus, errorThrown) {
            console.log(XMLHttpRequest);
          }
        });
      }
    });
  });

})(jQuery);

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();    
    reader.onload = function(e) {
      $(input).siblings('.preview-img').attr('src', e.target.result).removeClass('d-none');
    }
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}

$(".preview_img").change(function() {
  readURL(this);
});

$(document).on("change", ".preview_video", function(evt) {
  var $source = $(this).siblings('.preview-video');
  $source.find("source").attr("src", URL.createObjectURL(this.files[0]));
  $source.load();
  $($source).removeClass('d-none');
});


var $multilingualFileUpload = $('#multilingual-browse');

if ($multilingualFileUpload.length > 0) {

	var resumableMultilingual = new Resumable({
		chunkSize: 15 * 1024 * 1024, // 1MB
		simultaneousUploads: 1,
		maxFiles: 1,
		testChunks: false,
		throttleProgressCallbacks: 1,
		fileType: ['mov', 'mp4', 'mkv', 'm4v'],
		target: "{{route('add.multilingual_preview',$cor->id)}}",
	});

	if (resumableMultilingual.support) {
		resumableMultilingual.assignBrowse($multilingualFileUpload[0]);

		resumableMultilingual.on('fileSuccess', function (file, message) {
			resumableMultilingual.removeFile(file);
			$(window).off("beforeunload");
			$('.progress').addClass('d-none');
			$("#multilingual-preview-form").append('<div class="alert alert-success">Updated Successfully!</div>');
      setTimeout(function () {
					location.reload(true);
				}, 2000);
		});

		resumableMultilingual.on('fileProgress', function (file) {
			$('.progress-bar').css({width: Math.floor(resumableMultilingual.progress() * 100) + '%'});
			$('.progress-bar').html(Math.floor(file.progress() * 100) + '%');
		});

		$(document).on('submit','#multilingual-preview-form',function(e){
      console.log('multilingual-preview-form', resumableMultilingual);

			if(resumableMultilingual.files.length > 0)
				e.preventDefault();

			$('.progress').removeClass('d-none');

			var serializeArray = $('#multilingual-preview-form').serializeArray();
			var serializeData = {};

			$.map(serializeArray, function(n, i){
				serializeData[n['name']] = n['value'];
			});

			resumableMultilingual.opts.query = serializeData;

			resumableMultilingual.upload();

			$(window).on("beforeunload", function() {
				return "Are you sure?";
			});
		});

	}
	
}
</script>
  
@endsection
