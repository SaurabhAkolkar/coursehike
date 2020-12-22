@extends('admin/layouts.master')
@section('title', 'Add Featured Mentor - Admin')
@section('body')

<section class="content">
  @include('admin.message')
  <div class="row">
    <div class="col-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">{{ __('adminstaticword.Add') }} {{ __('adminstaticword.FeaturedMentors') }}</h3>
        </div>
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
                    <div class="col-md-4">
                            <label>{{ __('adminstaticword.Status') }}</label>
                            <li class="tg-list-item">
                              <input class="la-admin__toggle-switch" id="cb1" type="checkbox" name="status" @if($data->status == 1) checked @endif value="1" >
                              <label class="la-admin__toggle-label" data-tg-off="No" data-tg-on="Yes" for="cb1"></label>
                            </li>
                            <input type="hidden" name="status" id="f" @if($data->status == 1) value="1" @endif>
                            </br>
                    </div>
                   
              </div>
            <br>
              <div class="row">
                    <div class="col-md-4">
                            <label>{{ __('adminstaticword.UserImage') }}</label>
                                <input type="file" name="user_image"  id="user_image">
                                @if($data['user_thumbnail'])<img height="200" src="{{ url('/images/featuredmentor/'.$data['user_image']) }}"/>@endif
                            </br>
                    </div>
                    <div class="col-md-4">
                            <label>{{ __('adminstaticword.ImageThumbnail') }}</label>
                                <input type="file" name="image_thumbnail"  id="image_thumbnail">
                                @if($data['user_thumbnail'])<img height="200" src="{{ url('/images/featuredmentor/thumbnail/'.$data['user_thumbnail']) }}"/>@endif
                            </br>
                    </div>

                  
              </div>
              <br>
              
              <div class="box-footer">
                <button type="submit" value="Add Slider" class="btn btn-md col-md-2 btn-primary">+ {{ __('adminstaticword.Save') }}</button>
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