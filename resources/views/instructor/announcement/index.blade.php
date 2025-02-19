@extends('admin/layouts.master')
@section('title', 'All Announcement - Instructor')
@section('body')

<section class="content">
  @include('admin.message')
  <div class="row">
    <div class="col-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"> {{ __('adminstaticword.Course') }} {{ __('adminstaticword.Announcement') }}</h3>
          <a class="btn btn-info btn-sm" href="{{ url('instructor/announcement/create') }}">+  {{ __('adminstaticword.Add') }} {{ __('adminstaticword.Announcement') }}</a>
        </div>
       
        <!-- /.box-header -->
        <div class="box-body">
    
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <th>#</th>
                <th>{{ __('adminstaticword.Announcement') }}</th>
                <th>{{ __('adminstaticword.Course') }}</th>
                <th>{{ __('adminstaticword.Status') }}</th>
                <th>{{ __('adminstaticword.Edit') }}</th>
                <th>{{ __('adminstaticword.Delete') }}</th>
              </tr>
              </thead>
              <tbody>
                  <?php $i=0;?>
                  @foreach($announs as $announ)
                  <tr>
                    <?php $i++;?>
                    <td><?php echo $i;?></td>
                      <td>{{$announ->announsment}}</td>
                      <td>{{$announ->courses->title}}</td>
                    <td>
                        @if($announ->status==1)
                          {{ __('adminstaticword.Active') }}
                        @else
                        {{ __('adminstaticword.Deactive') }}
                        @endif                      
                    </td>
                    
                    <td>
                      <a class="btn btn-success la-admin__edit-btn" href="{{url('instructor/announcement/'.$announ->id)}}">
                        <i class="la-icon la-icon--lg icon-edit"></i>
                      </a>
                    </td>

                    <td><form  method="post" action="{{url('instructor/announcement/'.$announ->id)}}
                        "data-parsley-validate class="form-horizontal form-label-left">
                          {{ csrf_field() }}
                          {{ method_field('DELETE') }}
                          <button  type="submit" class="btn btn-danger"><i class="la-icon la-icon--lg icon-delete"></i></button>
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
