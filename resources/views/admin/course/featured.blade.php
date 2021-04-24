@extends('admin/layouts.master')
@section('title', 'Featured Classes - Admin')
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
            <h3 class="la-admin__section-title">{{ __('adminstaticword.featuredClasses') }}</h3>
        </div>

        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>{{ __('adminstaticword.Image') }}</th>
                  <th>{{ __('adminstaticword.Title') }}</th>
                  <th>Category</th>
                  <th>{{ __('adminstaticword.Slug') }}</th>
                  <th>{{ __('adminstaticword.Status') }}</th>
                  <th>{{ __('adminstaticword.Edit') }}</th>
                </tr>
              </thead>

              <tbody id="sortable">
                <?php $i=0;?>
                @foreach($courses as $c)
                <?php $i++;?>
                  <tr class="sortable" id="id-{{ $c->id }}">
                    <td><?php echo $i;?></td>
                    <td><img src="{{$c->preview_image}}" class="img-fluid mx-auto d-block"/></td>
                    <td>{{$c->title}}</td>
                    <td>{{$c->category->title}} </td>
                    <td>{{$c->slug}}</td>
                   
                    <td>
                        <form action="{{ route('category.quick',$c->id) }}" method="POST">
                          {{ csrf_field() }}
                          <button type="Submit" class="btn btn-xs {{ $c->status ==1 ? 'btn-success' : 'btn-danger' }}">
                            @if($c->status ==1)
                            {{ __('adminstaticword.Active') }}
                            @else
                            {{ __('adminstaticword.Deactive') }}
                            @endif
                          </button>
                        </form>
                    </td>
            
                    <td>
                      <a class="btn btn-success btn-sm" href="{{url('category/'.$c->id)}}"><i class="la-icon la-icon--lg icon-edit"></i></a></td>
                    
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
        url: "{{ route('course_reposition') }}",
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


