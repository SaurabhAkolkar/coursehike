<section class="content">
 
  <div class="row">
    <div class="col-md-12 px-0 px-md-4">
      <div class="text-right">
        <a data-toggle="modal" data-target="#myModalab" href="#" class="btn btn-info btn-sm">+ {{ __('adminstaticword.UploadVideo') }}</a>
        <a data-toggle="modal" data-target="#exitingVideo" href="#" class="btn btn-info btn-sm">+ {{ __('adminstaticword.Add') }} {{ __('adminstaticword.ExistingChapter') }}</a>
      </div><br/>

      <div class="la-admin__tab-table">
        <table id="example1" class="table table-bordered table-striped db">
          <thead>
            <tr>
              <th>#</th>
              <th>{{ __('adminstaticword.CourseChapter') }}</th>
              <th>{{ __('adminstaticword.Title') }}</th>
              <th>{{ __('adminstaticword.Status') }}</th>
              <th>{{ __('adminstaticword.Featured') }}</th>
              <th>{{ __('adminstaticword.Edit') }}</th>
              <th>{{ __('adminstaticword.Delete') }}</th>
            </tr>
          </thead>
          <tbody id="sortable">
            <?php $i=0;?>
            @foreach($courseclass as $cat)
              <tr class="sortable row1" data-id="{{ $cat->id }}">
                <?php $i++;?>
                <td><?php echo $i;?></td>
                @php
                $chname = App\CourseChapter::where('id','=',$cat->coursechapter_id)->get();
                @endphp
                <td>
                  @foreach($chname as $cc)
                  {{ $cc->chapter_name }}
                  @endforeach
                </td>
                <td>{{$cat->title}}</td>
                <td>
                  @if($cat->status==1)
                   {{ __('adminstaticword.Active') }}
                  @else
                   {{ __('adminstaticword.Deactive') }}
                  @endif
                </td>
                <td>
                  @if($cat->featured==1)
                    {{ __('adminstaticword.Yes') }}
                  @else
                    {{ __('adminstaticword.No') }}
                  @endif
                </td>
                <td>
                  <a class="btn btn-success btn-sm" href="{{url('courseclass/'.$cat->id)}}"><i class="la-icon la-icon--lg icon-edit"></i></a>
                </td> 
                <td>
                  <form  method="post" action="{{url('courseclass/'.$cat->id)}}"data-parsley-validate class="form-horizontal form-label-left">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}

                    <button  type="submit" class="btn btn-danger btn-sm"><i class="la-icon la-icon--lg icon-delete"></i></button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        </div>
    </div>
  </div>

  <!--Model start-->
  <div class="modal fade show" id="myModalab" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header d-block">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h3 class="modal-title" id="myModalLabel">{{ __('adminstaticword.UploadVideo') }}</h3>
        </div>
        <div class="box box-primary">
          <div class="panel panel-sum">
            <div class="modal-body">
              <form enctype="multipart/form-data" id="demo-form2" method="post" action="{{ route('courseclass.store') }}" data-parsley-validate class="form-horizontal form-label-left">
                {{ csrf_field() }}
                          
                <div class="row">
                  <div class="col-md-12">
                    <select class="display-none" name="course_id" class="form-control">
                      <option value="{{ $cor->id }}">{{ $cor->title }}</option>
                    </select>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <label >{{ __('adminstaticword.ChapterName') }}:<sup class="redstar">*</sup></label>
                    <select name="course_chapters" class="form-control  col-12 js-example-basic-single" required>
                      @foreach($coursechapters as $c)
                      <option value="{{ $c->id }}">{{ $c->chapter_name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="row mt-3">
                  <div class="col-md-12">
                    <label >{{ __('adminstaticword.CourseClass') }} {{ __('adminstaticword.Title') }}:<sup class="redstar">*</sup></label>
                    <input type="text" class="form-control " name="title" id="exampleInputTitle"   placeholder="Enter Your Title"value="" required>
                  </div>
                </div>

                <div class="row mt-3">
                  <div class="col-md-12">
                    <label>{{ __('adminstaticword.Detail') }}:</label><br>
                    <textarea name="detail" rows="3" class="form-control"></textarea>
                  </div>
                </div>
                
                <!-- CLASS THUMBNAIL: START -->
                <div class="row mt-3">
                  <div class="col-12">
                        <div class="la-admin__preview">
                          <label for="" class="la-admin__preview-label p-0">Thumbnail Image:<sup class="redstar">*</sup></label>
                          <div class="la-admin__preview-img la-admin__course-imgvid la-admin__course-modal-imgvid" >
                               <div class="la-admin__preview-text">
                                    <p class="la-admin__preview-size">Thumbnail | 500x350</p>
                                    <p class="la-admin__preview-file la-admin__preview-filebg text-uppercase">Choose a File</p>
                              </div>
                              <div class="text-center pr-20 mr-20">
                                <span class="la-icon la-icon--8xl icon-preview-image" style="font-size:160px;">
                                  <span class="path1"><span class="path2"></span></span>
                                </span>
                              </div>
                              <input type="file" class="form-control la-admin__preview-input preview_img" name="preview_image" />
                              <img src="" alt="" class="d-none preview-img"/>
                          </div>
                        </div>
                  </div>
                </div>
                <!-- CLASS THUMBNAIL: END -->
                
                <!-- CLASS VIDEO: START -->
                <div class="row mt-3">
                  <div class="col-12">
                        <div class="la-admin__preview">
                          <label for="" class="la-admin__preview-label p-0">Video Upload:<sup class="redstar">*</sup></label>
                          <div class="la-admin__preview-img la-admin__course-imgvid" >
                               <div class="la-admin__preview-text">
                                    <p class="la-admin__preview-size">Video | 2G</p>
                                    <p class="la-admin__preview-file la-admin__preview-filebg text-uppercase">Choose a File</p>
                              </div>
                              <div class="text-center pr-20 mr-20">
                                <span class="la-icon la-icon--8xl icon-preview-video" style="font-size:150px;">
                                  <span class="path1"><span class="path2"></span></span>
                                </span>
                              </div>
                              <input type="file" class="form-control la-admin__preview-input preview_video" name="video_upld" />
                              <video controls  class="d-none preview-video w-100">
                                <source src="">
                                  Your browser does not support HTML5 video.
                              </video>
                          </div>
                        </div>
                  </div>
                </div>
                <!-- CLASS VIDEO: END -->


                <div class="row mt-3">
                  <div class="col-12">
                        <div class="la-admin__preview">
                          <label for="" class="la-admin__preview-label p-0">Duration<sup class="redstar">*</sup></label>
                          <input type="text" class="form-control " name="duration" id="exampleInputTitle"   placeholder="Enter duration in hh:mm:ss"  required>
                        </div>
                  </div>
                </div>


                <div class="row mt-3">  
                  <div class="col-md-6">    
                    <label >{{ __('adminstaticword.Is_preview_video') }}:</label>
                    <li class="tg-list-item">   
                      <input class="la-admin__toggle-switch" id="c11" name="is_preview"  type="checkbox"/>
                      <label class="la-admin__toggle-label" data-tg-off="Deactive" data-tg-on="Active" for="c11"></label>
                    </li>
                    {{-- <input type="hidden" name="status" value="0" id="t11"> --}}
                  </div>
                  <div class="col-md-6">
                    <label >{{ __('adminstaticword.Featured') }}:</label>    
                    <li class="tg-list-item">
                      <input class="la-admin__toggle-switch" id="cb100" name="featured" type="checkbox"/>
                      <label class="la-admin__toggle-label" data-tg-off="NO" data-tg-on="YES" for="cb100"></label>
                    </li>
                  </div>
                </div> 
                <br>
               
                {{-- <div id="subtitle">
                  <label>{{ __('adminstaticword.Subtitle') }}:</label>
                  <table class="table table-bordered" id="dynamic_field">  
                    <tr> 
                        <td class="p-0">
                           <div class="{{ $errors->has('sub_t') ? ' has-error' : '' }} input-file-block">
                            <input type="file" name="sub_t[]"/>
                            <p class="info">Choose subtitle file ex. subtitle.srt.,</p>
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
                </div> --}}

                

              <!--  ADD CLASS STATUS: START -->
              <div class="row">
                <div class="col-12">
                  <label class="la-admin__preview-label"> Status:<sup class="redstar">*</sup></label>
                  <div class="la-admin__class-status d-flex justify-content-start">
                    <div class="la-admin__class-active pr-5">
                        <input type="radio" name="status" id="addVideo-active" value="2" class="la-admin__cp-input" >
                        <label for="addVideo-active" > 
                          <div class="la-admin__cp-circle">
                            <span class="la-admin__cp-radio"></span>
                            <span class="la-admin__cp-label">Active</span> 
                          </div>
                        </label>
                    </div>

                    <div class="la-admin__class-hold pr-5">
                      <input type="radio" name="status" id="addVideo-hold" value="0" class="la-admin__cp-input" >
                      <label for="addVideo-hold" > 
                        <div class="la-admin__cp-circle">
                          <span class="la-admin__cp-radio"></span>
                          <span class="la-admin__cp-label">Inactive</span> 
                        </div>
                      </label>
                    </div>
{{-- 
                    <div class="la-admin__class-archive pr-5">
                      <input type="radio" name="status" id="addVideo-archive" value="1" class="la-admin__cp-input" >
                      <label for="addVideo-archive" > 
                        <div class="la-admin__cp-circle">
                          <span class="la-admin__cp-radio"></span>
                          <span class="la-admin__cp-label">Archive</span> 
                        </div>
                      </label>
                  </div> --}}
                </div>
                </div>
            </div> <br/>
            <!-- ADD CLASS STATUS: END -->

                <div class="box-footer">
                  <button type="submit" class="btn btn-lg btn-primary col-md-4">{{ __('adminstaticword.Submit') }}</button>
                </div>
             
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--Model close -->    

  
  <!--Model start: Existing Video-->
  <div class="modal fade show" id="exitingVideo" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-md la-class__modal-dailog" role="document">
      <div class="modal-content">
        <div class="modal-header pl-0 d-block">
          <button type="button" class="close mt-2" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h3 class="la-admin__section-title modal-title mb-0" id="myModalLabel">{{ __('adminstaticword.ExistingChapter') }} </h3>
        </div>
        <div class="box box-primary">
          <div class="panel panel-sum">
            <div class="modal-body">

                <div class="row">
                  <div class="col-md-12 px-0 mb-6">
                    <label >
                      {{ __('adminstaticword.ChapterName') }}:<sup class="redstar">*</sup> <br/>
                      <span class="text-xs">(Select the chapter name to which the video will be added)</span>
                    </label>
                    <select name="course_chapters" id="chapter_id" class="form-control  col-12 js-example-basic-single" required>
                      @foreach($coursechapters as $c)
                      <option value="{{ $c->id }}">{{ $c->chapter_name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12 px-0 mb-6">
                    <div class="d-flex flex-wrap justify-content-between align-items-center">
                        <label >{{ __('adminstaticword.SelectVideo') }}:<sup class="redstar">*</sup></label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control py-6" name="title" id="search_title"   placeholder="Enter Your Title"value="" required>
                            <div class="input-group-append" onclick="serachVideos()">
                                <span class="input-group-text px-6" style="cursor:pointer;">
                                  <span class="la-icon la-icon--xl icon-search"></span>
                                </span>
                            </div>
                        </div>


                       {{-- <div class="col-md-8 pl-0 pr-0 pr-md-2">
                          <label >{{ __('adminstaticword.SelectVideo') }}:<sup class="redstar">*</sup></label>
                          <input type="text" class="form-control " name="title" id="search_title"   placeholder="Enter Your Title"value="" required>
                        </div>

                        <div class="col-md-4 pr-0 mt-3 mt-md-auto">
                          <button class="btn btn-lg btn-primary px-md-14" onclick="serachVideos()">Search</button>
                        </div>--}}
                    </div>
                  </div>
                </div>
                
                <div class="video_results"></div>

            <!-- ADD CLASS STATUS: END -->

               
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--Model close : Exxiting Video-->    

</section> 

 

@section('script')
<!--courseclass.js is included -->

<script>
(function($) {
  "use strict";
    tinymce.init({selector:'textarea#abcd'});
})(jQuery);
</script>

<script type="text/javascript">
 $('#previewvid').on('change',function(){

  if($('#previewvid').is(':checked')){
    $('#document11').show('fast');
    $('#document22').hide('fast');
  }else{
    $('#document22').show('fast');
    $('#document11').hide('fast');
  }

});

</script>

<script>
    
    $( "#sortable" ).sortable({
      items: "tr",
      cursor: 'move',
      opacity: 0.6,
      update: function() {
          sendOrderToServer();
      }
    });

    function sendOrderToServer() {

      var order = [];
      var token = $('meta[name="csrf-token"]').attr('content');
      $('tr.row1').each(function(index,element) {
        order.push({
          id: $(this).attr('data-id'),
          position: index+1
        });
      });

      $.ajax({
        type: "POST", 
        dataType: "json", 
        url: "{{ route('class-sort') }}",
        data: {
           order: order,
          _token: "{{ csrf_token() }}",
        },
        success: function(response) {
            if (response.status == "success") {
              console.log(response);
            } else {
              console.log(response);
            }
        }
      });
    }

    function serachVideos(){

      let title = $('#search_title').val();
      let chapter_id = $('#chapter_id').val();

      if(title.length > 0){
          $.ajax({
          type: "GET", 
          url: "{{ route('search-class-video') }}",
          data: {
            title: title,
            chapter_id : chapter_id,
            course_id:{{$cor->id}},
            _token: "{{ csrf_token() }}",
          },
          success: function(response) {
                
                $('.video_results').html(response);
              
          }
        });
      }
      else{
        alert('Video title is required');
      }
    }
</script>

@endsection
