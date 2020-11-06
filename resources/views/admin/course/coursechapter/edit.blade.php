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
          <h3 class="box-title pb-6">{{ __('adminstaticword.EditCourseChapter') }}</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body">
          <div class="form-group">
            <form id="demo-form" method="post" action="{{url('coursechapter/'.$cate->id)}}"data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
              {{ csrf_field() }}
              {{ method_field('PUT') }}

              <label class="">{{ __('adminstaticword.SelectCourse') }}</label>
              <select name="course_id" class=" form-control  col-12 display-none">
                @foreach($courses as $cou)
                  <option value="{{ $cou->id }}" {{$cate->courses->id == $cou->id  ? 'selected' : ''}}>{{ $cou->title}}</option>
                @endforeach
              </select>

              <div class="row">
                <div class="col-md-12">
                  <label for="exampleInputTit1e">{{ __('adminstaticword.Name') }}:<span class="redstar">*</span></label>
                  <input type="" class="form-control" name="chapter_name" id="exampleInputTitle" value="{{$cate->chapter_name}}">
                  <br>
                </div>
              </div>

              <!-- CLASS THUMBNAIL: START -->
              <div class="row">
                <div class="col-12">
                      <div class="la-admin__preview">
                        <label for="" class="la-admin__preview-label"> Class Thumbnail<sup class="redstar">*</sup></label>
                        <div class="la-admin__preview-img la-admin__course-imgvid" >
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
                            <img src="/images/course/{{$cate->thumbnail}}" alt="" class="preview-img"/>
                        </div>
                      </div>
                </div>
              </div>
              <!-- CLASS THUMBNAIL: END -->
              <br>

              <div class="row">
                <div class="col-md-12">
                  <label>One-Time Purchase Cost:<span class="redstar">*</span> </label>
                  <input type="text" placeholder="Enter Your Class Price" class="form-control " name="price" value="{{$cate->price}}">
                </div>
                <div class="col-md-6"> 
                  
                </div>
              </div>


              {{-- <div class="row">
                <div class="col-md-12">
                  <label for="exampleInputTit1e">{{ __('adminstaticword.Status') }}:</label>
                   <li class="tg-list-item">              
                    <input class="la-admin__toggle-switch" id="status" type="checkbox" name="status" {{ $cate->status == '1' ? 'checked' : '' }} >
                    <label class="la-admin__toggle-label" data-tg-off="Disable" data-tg-on="Enable" for="status"></label>
                  </li>
                  <input type="hidden"  name="free" value="0" for="status" id="status">
                </div>
              </div> --}}
              


                <!--  ADD CLASS STATUS: START -->
                <div class="row mt-3">
                  <div class="col-12">
                    <label class="la-admin__preview-label"> Status<sup class="redstar">*</sup></label>
                    <div class="la-admin__class-status d-flex justify-content-start">
                      <div class="la-admin__class-active pr-5">
                          <input type="radio" name="status" id="addClass-active" value="2" class="la-admin__cp-input" {{ $cate->status == '2' ? 'checked' : '' }} >
                          <label for="addClass-active" > 
                            <div class="la-admin__cp-circle">
                              <span class="la-admin__cp-radio"></span>
                              <span class="la-admin__cp-label">Active</span> 
                            </div>
                          </label>
                      </div>

                      <div class="la-admin__class-hold pr-5">
                        <input type="radio" name="status" id="addClass-hold" value="0" class="la-admin__cp-input" {{ $cate->status == '0' ? 'checked' : '' }} >
                        <label for="addClass-hold" > 
                          <div class="la-admin__cp-circle">
                            <span class="la-admin__cp-radio"></span>
                            <span class="la-admin__cp-label">On hold</span> 
                          </div>
                        </label>
                      </div>

                      <div class="la-admin__class-archive pr-5">
                        <input type="radio" name="status" id="addClass-archive" value="1" class="la-admin__cp-input" {{ $cate->status == '1' ? 'checked' : '' }} >
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


@section('scripts')

<script>
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

</script>
  
@endsection