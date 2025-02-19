@extends('admin/layouts.master')
@section('title', 'View Slider - Admin')
@section('body')

@if($errors->any())
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
          <h3 class="la-admin__section-title">{{ __('adminstaticword.Slider') }}</h3>
            <a class="btn btn-info btn-sm" href="{{url('slider/create')}}">
              <span class="la-icon la-icon--sm icon-plus"></span> 
              <span>{{ __('adminstaticword.Add') }} {{ __('adminstaticword.Slider') }}</span>
            </a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">

            <thead>
              <tr>
                <th>#</th>
                <th>{{ __('adminstaticword.Image') }}</th>
                <th>{{ __('adminstaticword.Heading') }}</th>
                <th>{{ __('adminstaticword.SubHeading') }}</th>
                <th>{{ __('adminstaticword.Status') }}</th>
                <th>{{ __('adminstaticword.Edit') }}</th>
                <th>{{ __('adminstaticword.Delete') }}</th>
              </tr>
            </thead>
            <tbody id="sortable">
              <?php $i=0;?>
              @foreach($sliders as $cat)
              <?php $i++;?>
              <tr class="sortable" id="id-{{ $cat->id }}">
                <td><?php echo $i;?></td>
                <td>
                  <img src="{{ asset('images/slider/'.$cat->image) }}" class="img-fluid">
                </td>
                <td>{{$cat->heading}}</td>
                <td>{{$cat->sub_heading}}</td> 
                <td>
                   <form action="{{ route('slider.quick',$cat->id) }}" method="POST">
                      {{ csrf_field() }}
                      <button  type="Submit" class=" btn btn-xs {{ $cat->status ==1 ? 'btn-success' : 'btn-danger' }}">
                        @if($cat->status ==1)
                        {{ __('adminstaticword.Active') }}
                        @else
                        {{ __('adminstaticword.Deactive') }}
                        @endif
                      </button>
                    </form>
                </td>
              
                <td>
                    <a class="btn btn-sm la-admin__edit-btn"  href="{{url('slider/'.$cat->id)}}">
                      <i class="la-icon la-icon--lg icon-edit"></i>
                    </a>
                </td>

                <td>
                  <form  method="post" action="{{url('slider/'.$cat->id)}}
                      "data-parsley-validate class="form-horizontal form-label-left">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                       <button  type="submit" class="btn btn-danger btn-sm">
                          <i class="la-icon la-icon--lg icon-delete"></i>
                       </button>
                  </form>
                </td>

                @endforeach
             
              </tr>
            </tfoot>
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
        url: "{{ route('slider_reposition') }}",
        type: 'get',
        data: data,
        dataType: 'json',
        success: function (result) {
          console.log(data);
        }
    });

  }

});
  </script>

@endsection
