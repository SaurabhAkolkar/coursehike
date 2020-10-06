<section class="content">
 
  <div class="row">
    <div class="col-md-12">
      <a data-toggle="modal" data-target="#myModalp" href="#" class="btn btn-info btn-sm">+ {{ __('adminstaticword.Add') }}</a>
      <br>
      <br>
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>{{ __('adminstaticword.Course') }}</th>
              <th>{{ __('adminstaticword.ClassName') }}</th>
              <th>{{ __('adminstaticword.Status') }}</th>
              <th>{{ __('adminstaticword.Edit') }}</th>
              <th>{{ __('adminstaticword.Delete') }}</th>
            </tr>
          </thead>
          <tbody>
            <?php $i=0;?>
            @foreach($coursechapter as $cat)
              <tr>
                <?php $i++;?>
                <td><?php echo $i;?></td>
                <td>{{$cat->courses->title}}</td>
                <td>{{$cat->chapter_name}}</td>
                <td>
                  <form action="{{ route('Chapter.quick',$cat->id) }}" method="POST">
                    {{ csrf_field() }}

                    <button type="Submit" class="btn btn-xs {{ $cat->status ==1 ? 'btn-success' : 'btn-danger' }}">
                      @if($cat->status ==1)
                      {{ __('adminstaticword.Active') }}
                      @else
                      {{ __('adminstaticword.Deactive') }}
                      @endif
                    </button>
                  </form>
                </td>
                <td>
                  <a class="btn btn-success btn-sm" href="{{url('coursechapter/'.$cat->id)}}"><i class="fa fa-edit"></i></a>
                </td>

                <td>
                  <form  method="post" action="{{url('coursechapter/'.$cat->id)}}"  data-parsley-validate class="form-horizontal form-label-left">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                      <button type="submit" class="btn btn-danger"><i class="fa fa-fw fa-trash-o"></i></button>
                  </form>
                </td>

              </tr>
            @endforeach
          </tbody>

        </table>
    </div>
  </div>

  <!--Model start-->
  <div class="modal fade show" id="myModalp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header d-block">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">{{ __('adminstaticword.AddCourseChapter') }}</h4>
        </div>
        <div class="box box-primary">
          <div class="panel panel-sum">
            <div class="modal-body">
              <form id="demo-form2" method="post" action="{{ route('coursechapter.store') }}" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                {{ csrf_field() }}

              
                <select name="course_id" class=" form-control  display-none">
                  <option value="{{ $cor->id }}">{{ $cor->title }}</option>
                </select> <br/> 

                <div class="row">
                  <div class="col-md-12">
                    <label for="exampleInputTit1e">{{ __('adminstaticword.ClassName') }}:<span class="redstar">*</span> </label>
                    <input type="text" placeholder="Enter Your Class Name" class="form-control " name="chapter_name" id="exampleInputTitle" value="">
                  </div>
                  <div class="col-md-6"> 
                   
                  </div>
                </div>
                <br>

                <!-- CLASS THUMBNAIL: START -->
                <div class="row">
                  <div class="col-12">
                        <div class="la-admin__preview">
                          <label for="" class="la-admin__preview-label"> Class Thumbnail<sup class="redstar">*</sup></label>
                          <div class="la-admin__preview-img" >
                               <div class="la-admin__preview-text">
                                    <p class="la-admin__preview-size">Thumbnail | 500x350</p>
                                    <p class="la-admin__preview-file la-admin__preview-filebg text-uppercase">Choose a File</p>
                              </div>
                              <input type="file" class="form-control la-admin__preview-input preview_img" name="preview_image" />
                              <img src="" alt="" class="d-none preview-img"/>
                          </div>
                        </div>
                  </div>
                </div>
                <!-- CLASS THUMBNAIL: END -->
                <br>

                <div class="row">
                  <div class="col-md-12">
                    <label>One-Time Purchase Cost:<span class="redstar">*</span> </label>
                    <input type="text" placeholder="Enter Your Class Price" class="form-control " name="price" value="">
                  </div>
                  <div class="col-md-6"> 
                   
                  </div>
                </div>
                <br>

                <!--  ADD CLASS STATUS: START -->
                <div class="row">
                    <div class="col-12">
                      <label class="la-admin__preview-label"> Status<sup class="redstar">*</sup></label>
                      <div class="la-admin__class-status d-flex justify-content-start">
                        <div class="la-admin__class-active pr-5">
                            <input type="radio" name="status" id="addClass-active" value="2" class="la-admin__cp-input" >
                            <label for="addClass-active" > 
                              <div class="la-admin__cp-circle">
                                <span class="la-admin__cp-radio"></span>
                                <span class="la-admin__cp-label">Active</span> 
                              </div>
                            </label>
                        </div>

                        <div class="la-admin__class-hold pr-5">
                          <input type="radio" name="status" id="addClass-hold" value="0" class="la-admin__cp-input" >
                          <label for="addClass-hold" > 
                            <div class="la-admin__cp-circle">
                              <span class="la-admin__cp-radio"></span>
                              <span class="la-admin__cp-label">On hold</span> 
                            </div>
                          </label>
                        </div>

                        <div class="la-admin__class-archive pr-5">
                          <input type="radio" name="status" id="addClass-archive" value="1" class="la-admin__cp-input" >
                          <label for="addClass-archive" > 
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

                {{-- <div class="row"> 
                  <div class="col-md-12">
                  
                      <label for="exampleInputDetails">{{ __('adminstaticword.LearningMaterial') }}</label> - <p class="inline info">eg: zip or pdf files</p>
                      <br>
                      <input type="file" name="file" id="file" class="{{ $errors->has('file') ? ' is-invalid' : '' }} inputfile inputfile-1"/>
                      <label for="file"><span>{{ __('adminstaticword.Chooseafile') }}</span></label>
                      <span class="text-danger invalid-feedback" role="alert"></span>
                    
                  </div>
                </div> --}}
                     
                <div class="box-footer">
                 <button type="submit" class="btn btn-md col-md-6 btn-primary">{{ __('adminstaticword.Submit') }}</button>
                </div>
                   
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--Model close -->    

</section> 

@section('scripts')

<script>
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();    
    reader.onload = function(e) {
      $('#preview-img').attr('src', e.target.result).removeClass('d-none');
    }
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}

$(".preview_img").change(function() {
  readURL(this);
});

$(document).on("change", ".preview_video", function(evt) {
  var $source = $('#preview-video-source');
  $source[0].src = URL.createObjectURL(this.files[0]);
  var video_tag = $source.parent()[0]
  video_tag.load();
  $(video_tag).removeClass('d-none');
});

</script>
  
@endsection