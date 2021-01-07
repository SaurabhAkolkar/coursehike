@extends('admin/layouts.master')
@section('title', 'Edit Featured Mentor - Admin')
@section('body')

<section class="content">
  @include('admin.message')
  <div class="row">
    <div class="col-12">
      <div class="box box-primary">
          <h3 class="la-admin__section-title ml-3">{{ __('adminstaticword.Edit') }} {{ __('adminstaticword.FeaturedMentors') }}</h3>
       
        <div class="box-body">
          <div class="form-group">
            <form id="demo-form2" method="post" action="{{action('FeaturedMentorController@update')}}"vdata-parsley-validate 
              class="form-horizontal form-label-left"enctype="multipart/form-data">
              {{ csrf_field() }}
                  
            <input type="hidden" value="{{$data->id}}" name="featured_id" />
              <div class="row">
                    <div class="col-md-4">
                        <label for="Mentor">{{ __('adminstaticword.Mentor') }}:<sup class="redstar">*</sup></label>
                        <select name="mentor" id="mentor" class="form-control js-example-basic-single" disabled>
                            <option selected disabled >Select Mentor</option>
                            @foreach($users as $u)
                                <option value="{{$u->id}}" @if($u->id == $data->user_id) selected @endif >{{$u->fullName}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="Course">{{ __('adminstaticword.Course') }}:<sup class="redstar">*</sup></label>
                        <select name="course" id="courses" class="form-control js-example-basic-single">
                            <option selected disabled>Select User First</option>
                            @foreach($courses as $c)
                                <option value="{{$c->id}}" @if($c->id == $data->course_id) selected @endif>{{$c->title}}</option>
                            @endforeach
                        </select>
                    </div>
              </div>
            <br>

              <div class="row">
                    <div class="col-md-4">
                        <div class="la-admin__preview">
                            <label>{{ __('adminstaticword.UserImage') }}:<sup class="redstar">*</sup></label>
                            <br>
                            <div class="la-admin__preview-img la-admin__course-imgvid la-admin__course-modal-imgvid" >
                              <div class="la-admin__preview-text">
                                <p class="la-admin__preview-size">Preview Image</p>
                                <p class="la-admin__preview-file text-uppercase">Choose a File</p>
                              </div>
                              <div class="text-center pr-20 mr-10">
                                <span class="la-icon la-icon--8xl icon-preview-image" style="font-size:160px;">
                                  <span class="path1"><span class="path2"></span></span>
                                </span>
                              </div>
                                <input type="file" name="user_image"  id="user_image">
                                @if($data['user_thumbnail'])<img height="200" src="{{ $data['user_image'] }}"/>@endif
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="la-admin__preview">
                            <label>{{ __('adminstaticword.ImageThumbnail') }}:<sup class="redstar">*</sup></label>
                            <br>
                            <div class="la-admin__preview-img la-admin__course-imgvid la-admin__course-modal-imgvid" >
                              <div class="la-admin__preview-text">
                                <p class="la-admin__preview-size">Preview Image</p>
                                <p class="la-admin__preview-file text-uppercase">Choose a File</p>
                              </div>
                              <div class="text-center pr-20 mr-10">
                                <span class="la-icon la-icon--8xl icon-preview-image" style="font-size:160px;">
                                  <span class="path1"><span class="path2"></span></span>
                                </span>
                              </div>
                                <input type="file" name="image_thumbnail"  id="image_thumbnail">
                                @if($data['user_thumbnail'])<img height="200" src="{{ $data['user_thumbnail'] }}"/>@endif
                            </div>
                        </div>
                    </div>                  
              </div>
              <br>

              <div class="row">
                <div class="col-md-6">
                
                            <label>{{ __('adminstaticword.Status') }}:</label>
                            <li class="tg-list-item">
                              <input class="la-admin__toggle-switch" id="cb1" type="checkbox" name="status" @if($data->status == 1) checked @endif value="1" >
                              <label class="la-admin__toggle-label" data-tg-off="No" data-tg-on="Yes" for="cb1"></label>
                            </li>
                </div>
              </div>

              <div class="row">
                <div class="col-md-8">
              
                  <div class="box-footer">
                    <button type="submit" value="Add Slider" class="btn btn-md btn-primary px-14"> {{ __('adminstaticword.Save') }}</button>
                  </div>
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

</script>
@endsection