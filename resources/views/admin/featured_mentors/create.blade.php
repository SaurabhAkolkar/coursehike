@extends('admin/layouts.master')
@section('title', 'Add Featured Mentor - Admin')
@section('body')

<section class="content">
  @include('admin.message')
  <div class="row">
    <div class="col-12">
      <div class="box box-primary">
          <h3 class="la-admin__section-title ml-3">{{ __('adminstaticword.Add') }} {{ __('adminstaticword.FeaturedMentors') }}</h3>
        
        <div class="box-body">
          <div class="form-group">
            <form id="demo-form2" method="post" action="{{action('FeaturedMentorController@store')}}"vdata-parsley-validate 
              class="form-horizontal form-label-left"enctype="multipart/form-data">
              {{ csrf_field() }}
                  

              <div class="row">
                    <div class="col-md-4 mt-3">
                        <label for="Mentor">{{ __('adminstaticword.Mentor') }}:<sup class="redstar">*</sup></label>
                        <select name="mentor" id="mentor" class="form-control js-example-basic-single" required >
                            <option selected disabled >Select Mentor</option>
                            @foreach($users as $u)
                                <option value="{{$u->id}}" @if(old('mentor') == $u->id) selected @endif>{{$u->fullName}}</option>
                            @endforeach
                        </select>
                        @error('mentor')
                              <div class="la-btn__alert-danger col-md-6 offset-md-3 animated fadeInDown alert alert-danger" role="alert">
                                <h6 class="la-btn__alert-msg">{{ $message }}</h6>
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-4  mt-3">
                        <label for="Course">{{ __('adminstaticword.Course') }}:<sup class="redstar">*</sup></label>
                        <select name="course" id="courses" class="form-control js-example-basic-single" required>
                            <option selected disabled>Select User First</option>
                        </select>

                        @error('course')
                              <div class="la-btn__alert-danger col-md-6 offset-md-3 animated fadeInDown alert alert-danger" role="alert">
                                <h6 class="la-btn__alert-msg">{{ $message }}</h6>
                            </div>
                        @enderror
                    </div>
              </div>
           
              <div class="row">
                    <div class="col-md-4 mt-4 mt-md-6">
                      <div class="la-admin__preview mt-0">
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
                            <input type="file" class="form-control la-admin__preview-input inputfile inputfile-1 preview_img" name="user_image" value="{{ old('user_img') }}" id="image" />
                            <img src="{{ old('user_img') }}" alt="" class="d-none preview-img img-fluid text-center" required/>
                        </div>

                        @error('user_img')
                              <div class="la-btn__alert-danger col-md-6 offset-md-3 animated fadeInDown alert alert-danger" role="alert">
                                <h6 class="la-btn__alert-msg">{{ $message }}</h6>
                            </div>
                        @enderror
                      </div>
                    </div>
                 
                    <div class="col-md-4  mt-4 mt-md-6">
                        {{-- <div class="la-admin__preview ">
                          <label>{{ __('adminstaticword.ImageThumbnail') }}:<sup class="redstar">*</sup></label>
                          <br>
                          <div class="la-admin__preview-img la-admin__course-imgvid" >
                            <div class="la-admin__preview-text" onclick="$('#user_image').click()">
                              <p class="la-admin__preview-size">Preview Image</p>
                              <p class="la-admin__preview-file text-uppercase">Choose a File</p>
                            </div>
                            <div class="text-center pr-20 mr-10">
                              <span class="la-icon la-icon--8xl icon-preview-image" style="font-size:160px;">
                                <span class="path1"><span class="path2"></span></span>
                              </span>
                            </div>
                            <input type="file" name="image_thumbnail"  id="image_thumbnail" class="d-none">
                          </div>
                        </div> --}}

                        <div class="la-admin__preview mt-0">
                          <label>{{ __('adminstaticword.ImageThumbnail') }}:<sup class="redstar">*</sup></label>
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
                         <input type="file" class="form-control la-admin__preview-input inputfile inputfile-1 preview_img" value="{{ old('image_thumbnail') }}" name="image_thumbnail" id="image" />
                         <img src="{{ old('user_img') }}" alt="" class="d-none preview-img img-fluid text-center" required/>
                     </div>

                      @error('image_thumbnail')
                            <div class="la-btn__alert-danger col-md-6 offset-md-3 animated fadeInDown alert alert-danger" role="alert">
                              <h6 class="la-btn__alert-msg">{{ $message }}</h6>
                          </div>
                      @enderror
                    </div>

                    </div>
              </div>
              <br>

              <div class="row">
                <div class="col-md-4">
                    <label>{{ __('adminstaticword.Status') }}</label>
                    <li class="tg-list-item">
                      <input class="la-admin__toggle-switch" id="cb1" type="checkbox" name="status" value="1" >
                       <label class="la-admin__toggle-label" data-tg-off="No" data-tg-on="Yes" for="cb1"></label>
                    </li>
                    <input type="hidden" name="status" id="f">
                    </br>
                </div>
              </div><br/>
              
              <div class="row">
                <div class="col-md-8 text-right">
                    <button type="submit" value="Add Slider" class="btn btn-primary px-14"> {{ __('adminstaticword.Save') }}</button>
                </div>
              </div>
         
            </form>
          </div>
        </div>
        <!-- /.box -->
      </div>
      <!-- /.box -->
    </div>
    <!--/.col (right) -->
  </div>
  <!-- /.row -->
</section> 

@endsection


@section('script')
<script>

    var urlLike = '{{ url('featuredMentors/getcourses') }}';
    $('#mentor').change(function() {
      var up = $('#courses').empty();
      var user_id = $(this).val();    
      if(user_id){
        $.ajax({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type:"GET",
          url: urlLike,
          data: {user_id: user_id},
          success:function(data){   
            console.log(data);
            up.append('<option value="0" disabled selected>Please Choose</option>');
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

    $(function() {
      $('#cb1').change(function() {
        $('#f').val(+ $(this).prop('checked'))
      })
    })

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