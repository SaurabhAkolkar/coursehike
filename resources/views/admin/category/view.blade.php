@extends('admin/layouts.master')
@section('title', 'View Category - Admin')
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
  @include('admin.message')
  <div class="row">
    <div class="col-12">
      <div class="box box-primary">
        <div class="d-flex justify-content-between align-items-center ml-2">
            <h3 class="la-admin__section-title">{{ __('adminstaticword.Category') }}</h3>
            <button role="button"class="btn btn-info "  data-toggle="modal" data-target="#myModal">
              <span class="la-icon la-icon--sm icon-plus"></span> {{ __('adminstaticword.AddCategory') }}
            </button>

            <!-- Modal -->
            <div class="modal fade show" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header d-block">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">{{ __('adminstaticword.AddCategory') }}</h4>
                  </div>
                  <div class="modal-body">
                    <form id="demo-form2" method="post" action="{{url('category/')}}" data-parsley-validate class="form-horizontal form-label-left" autocomplete="off" enctype="multipart/form-data">
                      {{ csrf_field() }}

                      <div class="row">
                        <div class="col-md-12">
                          <label for="c_name">{{ __('adminstaticword.Name') }}:<sup class="redstar">*</sup></label>
                          <input placeholder="Enter your category" type="text" class="form-control" name="title" required="">
                        </div>
                      </div>
                      <br>

                      <div class="row">
                        <div class="col-md-12">
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
                        <div class="col-md-12">
                          <label for="icon">{{ __('adminstaticword.Icon') }}:<sup class="redstar">*</sup></label>
                          <input type="text" class="form-control icp-auto icp" name="icon" required placeholder="Choose Icon">
                        </div>
                      </div>
                      <br> --}}

                      <div class="row">
                        <div class="col-md-4">
                          <label for="exampleInputDetails">{{ __('adminstaticword.Featured') }}:</label>
                            <li class="tg-list-item">              
                            <input class="la-admin__toggle-switch" id="featured" type="checkbox" name="featured" >
                            <label class="la-admin__toggle-label" data-tg-off="Disable" data-tg-on="Enable" for="featured"></label>
                          </li>
                          <input type="hidden"  name="free" value="0" for="featured" id="featured">
                        </div>
                        <div class="col-md-4">
                          <label for="exampleInputDetails">{{ __('adminstaticword.Status') }}:</label>
                          <li class="tg-list-item">              
                            <input class="la-admin__toggle-switch" id="status" type="checkbox" name="status" >
                            <label class="la-admin__toggle-label" data-tg-off="Disable" data-tg-on="Enable" for="status"></label>
                          </li>
                          <input type="hidden"  name="free" value="0" for="status" id="status">

                          
                        </div>
                      </div>
                      <br>
                      <button type="submit" class="btn btn-primary">{{ __('adminstaticword.Save') }}</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        </div>

        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>{{ __('adminstaticword.Category') }}</th>
                  <th>{{ __('adminstaticword.Image') }}</th>
                  {{-- <th>{{ __('adminstaticword.Icon') }}</th> --}}
                  <th>{{ __('adminstaticword.Slug') }}</th>
                  <th>{{ __('adminstaticword.Featured') }}</th>
                  <th>{{ __('adminstaticword.Status') }}</th>
                  <th>{{ __('adminstaticword.Edit') }}</th>
                  <th>{{ __('adminstaticword.Delete') }}</th>
                </tr>
              </thead>
              <tbody id="sortable">
                <?php $i=0;?>
                @foreach($cate as $cat)
                <?php $i++;?>
                  <tr class="sortable" id="id-{{ $cat->id }}">
                    <td><?php echo $i;?></td>
                    <td>{{$cat->title}}</td>
                    <td><img src="{{$cat->image}}" class="img-thumbnail"/></td>
                    {{-- <td><i class="fa {{$cat->icon}}"></i></td> --}}
                    <td>{{$cat->slug}}</td>
                    <td>
                      <form action="{{ route('categoryf.quick',$cat->id) }}" method="POST">
                          {{ csrf_field() }}
                          <button type="Submit" class="btn btn-xs {{ $cat->featured ==1 ? 'btn-success' : 'btn-danger' }}">
                            @if($cat->featured ==1)
                            {{ __('adminstaticword.Yes') }}
                            @else
                            {{ __('adminstaticword.No') }}
                            @endif
                          </button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('category.quick',$cat->id) }}" method="POST">
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
                      <a class="btn btn-success btn-sm" href="{{url('category/'.$cat->id)}}"><i class="la-icon la-icon--lg icon-edit"></i></a></td>
                    <td>
                      <form  method="post" action="{{url('category/'.$cat->id)}}"data-parsley-validate class="form-horizontal form-label-left">
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
        <!-- /.box-body -->
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
  $( function() {
    $( "#sortable" ).sortable();
    $( "#sortable" ).disableSelection();
  } );

   $("#sortable").sortable({
   update: function (e, u) {
    var data = $(this).sortable('serialize');
   
    $.ajax({
        url: "{{ route('category_reposition') }}",
        type: 'get',
        data: data,
        dataType: 'json',
        success: function (result) {
          console.log(data);
        }
    });

  }

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

$(document).on("change", ".preview_video", function(evt) {
  var $source = $(this).siblings('.preview-video');
  $source.find("source").attr("src", URL.createObjectURL(this.files[0]));
  $source.load();
  $($source).removeClass('d-none');
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


