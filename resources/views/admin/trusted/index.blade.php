@extends('admin/layouts.master')
@section('title', 'Trusted Sliders - Admin')
@section('body')

<section class="content">
  @include('admin.message')
  <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
            <div class="d-flex justify-content-between align-items-center">
              <h3 class="la-admin__section-title ml-2">{{ __('adminstaticword.TrustedSlider') }}</h3>
              <a class="btn btn-info btn-sm" href="{{url('trusted/create')}}">
                  <i class="la-icon la-icon--sm icon-plus"></i> 
                  <span>{{ __('adminstaticword.Add') }} {{ __('adminstaticword.TrustedSlider') }}</span>
              </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  
                 
                  <tr>
                    <th>#</th>
                    <th>{{ __('adminstaticword.Image') }}</th>
                    <th>{{ __('adminstaticword.URL') }}</th>
                    <th>{{ __('adminstaticword.Status') }}</th>
                    <th>{{ __('adminstaticword.Edit') }}</th>
                    <th>{{ __('adminstaticword.Delete') }}</th>
                  </tr>
                </thead>
                <tbody>
                <?php $i=0;?>
                @foreach($trusted as $trusted)
                <?php $i++;?>
                <tr>
                  <td><?php echo $i;?></td>
                  <td>
                    <img src="images/trusted/<?php echo $trusted['image'];  ?>">
                  </td>
                  <td>{{$trusted->url}}</td>
                  <td>
                    @if($trusted->status==1)
                      {{ __('adminstaticword.Active') }}
                    @else
                      {{ __('adminstaticword.Deactive') }}
                    @endif
                  </td>
                  <td>              
                    <a class="btn btn-success la-admin__edit-btn" href="{{url('trusted/'.$trusted->id)}}">
                    <i class="la-icon la-icon--lg icon-edit"></i></a>
                  </td>
                  <td>

                    <form  method="post" action="{{url('trusted/'.$trusted->id)}}
                        "data-parsley-validate class="form-horizontal form-label-left">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-sm btn-danger"><i class="la-icon la-icon--lg icon-delete"></i></button>
                    </form>
                  </td>
                </tr>
                @endforeach
                
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