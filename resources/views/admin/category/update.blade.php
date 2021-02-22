@extends('admin/layouts.master')
@section('title', 'Edit Category - Admin')
@section('body')

<section class="content">
  @include('admin.message')
  <div class="row">
    <div class="col-12">
      
      <div class="box box-primary">
          <h3 class="la-admin__section-title ml-md-3 mb-8 mb-md-6 ">{{ __('adminstaticword.EditCategory') }}</h3>
        
       
        <div class="panel-body pl-md-3">

          <form id="demo-form" method="post" action="{{url('category/'.$cate->id)}}
              "data-parsley-validate class="form-horizontal form-label-left" autocomplete="off" enctype="multipart/form-data">
              {{ csrf_field() }}
              {{ method_field('PUT') }}

            <div class="row">
              <div class="col-md-6">
                <label for="exampleInputTit1e">{{ __('adminstaticword.Category') }}:<sup class="redstar">*</sup></label>
                <input type="text" class="form-control" name="title" id="exampleInputTitle" value="{{$cate->title}}">
                @error('title')
                      <div class="alert alert-danger">
                          {{$message}}
                      </div>
                @enderror
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 mt-0 mt-md-6">
                <div class="la-admin__preview">
                  <label for="" class="la-admin__preview-label">{{ __('adminstaticword.Image') }}:</label>
                  <div class="la-admin__preview-img la-admin__course-imgvid" >
                       <div class="la-admin__preview-text">
                            <p class="la-admin__preview-size">Preview Image size: 250x150</p>
                            <p class="la-admin__preview-file text-uppercase">Choose a File</p>
                      </div>
                      <div class="text-center pr-20 mr-10">
                        <span class="la-icon la-icon--8xl icon-preview-image" style="font-size:160px;">
                          <span class="path1"><span class="path2"></span></span>
                        </span>
                      </div>
                      <input type="file" class="form-control la-admin__preview-input inputfile inputfile-1 preview_img" name="image" id="image" />
                      <img src="" alt="" class="d-none preview-img" required/>
                  </div>
                </div>
              </div>
            </div>
            <br>

            {{-- <div class="row">
              <div class="col-md-6">
                <label for="exampleInputTit1e">{{ __('adminstaticword.Icon') }}:<sup class="redstar">*</sup></label>
                <input type="text" class="form-control icp-auto icp" name="icon" id="exampleInputTitle" value="{{$cate->icon}}">
              </div>
            </div><br/> --}}

            <div class="row">
              <div class="col-6 col-md-2">
                <label for="exampleInputTit1e">{{ __('adminstaticword.Featured') }}:</label>
                <li class="tg-list-item">              
                  <input class="la-admin__toggle-switch" id="featured" type="checkbox" name="featured" {{ $cate->featured == '1' ? 'checked' : '' }} >
                  <label class="la-admin__toggle-label" data-tg-off="Disable" data-tg-on="Enable" for="featured"></label>
                </li>
                <input type="hidden"  name="free" value="0" for="featured" id="featured">
              </div>

              <div class="col-6 col-md-2">
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
              <div class="col-md-6 text-right">
                <div class=" box-footer">
                  <button type="submit" class="btn btn-md btn-primary px-14">{{ __('adminstaticword.Save') }}</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
@endsection

@section('scripts')
<script type="text/javascript">
      
        $(document).on("change", ".preview_video", function(evt) {
          var $source = $(this).siblings('.preview-video');
          $source.find("source").attr("src", URL.createObjectURL(this.files[0]));
          $source.load();
          $($source).removeClass('d-none');
        });

        
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
        

        $('#preview').on('change',function(){

        if($('#preview').is(':checked')){
          $('#document1').show('fast');
          $('#document2').hide('fast');
        }else{
          $('#document2').show('fast');
          $('#document1').hide('fast');
        }

        });
    </script>
@endsection
