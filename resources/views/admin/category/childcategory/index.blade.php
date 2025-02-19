@extends('admin/layouts.master')
@section('title', 'Child Category - Admin')
@section('body')

<section class="content">
  @include('admin.message')
  <div class="row">
    <div class="col-12">
      <div class="box box-primary">
        <div class="d-flex justify-content-between align-items-center ml-2">
          <h3 class="la-admin__section-title">{{ __('adminstaticword.ChildCategory') }}</h3>
          <a href="{{url('childcategory/create')}}" class="btn btn-info btn-sm">
            <span class="la-icon la-icon--sm icon-plus"></span> {{__('adminstaticword.AddChildCategory') }}</a> 
        </div>
     

        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                
                <tr>
                  
                  <th>#</th>
                  <th>{{ __('adminstaticword.SubCategory') }}</th>
                  <th>{{ __('adminstaticword.ChildCategory') }}</th>
                  {{-- <th>{{ __('adminstaticword.Icon') }}</th> --}}
                  <th>{{ __('adminstaticword.Status') }}</th>
                  <th>{{ __('adminstaticword.Edit') }}</th>
                  <th>{{ __('adminstaticword.Delete') }}</th>
                </tr>
              </thead>
              <tbody>
                <?php $i=0;?>
                @foreach($childcategory as $cat)
                <?php $i++;?>
                <tr>
                  <td><?php echo $i;?></td>
                  <td>{{$cat->subcategory->title}}</td>
                  <td>{{$cat->title}}</td>
                  {{-- <td><i class="fa {{$cat->icon}}"></i></td> --}}
                  <td>
                    <form action="{{ route('childcategory.quick',$cat->id) }}" method="POST">
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
                    <a class="btn btn-success btn-sm" href="{{url('childcategory/'.$cat->id)}}"><i class="la-icon la-icon--lg icon-edit"></i></a>
                  </td>
                  <td>
                    <form  method="post" action="{{url('childcategory/'.$cat->id)}}"data-parsley-validate class="form-horizontal form-label-left">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                      <button  type="submit" class="btn btn-danger btn-sm"><i class="la-icon la-icon--lg icon-delete"></i>
                      </button>
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
