@extends('admin/layouts.master')
@section('title', 'All Report - Admin')
@section('body')

<section class="content">
  @include('admin.message')
  <div class="row">
    <div class="col-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">{{ __('adminstaticword.ReportCourse') }}</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              
                <tr>
                  <th>#</th>
                  <th>{{ __('adminstaticword.User') }}</th>
                  <th>{{ __('adminstaticword.Course') }}</th>
                  <th>{{ __('adminstaticword.Title') }}</th>
                  <th>{{ __('adminstaticword.Email') }}</th>
                  <th>{{ __('adminstaticword.Detail') }}</th>
                  <th>{{ __('adminstaticword.Edit') }}</th>
                  <th>{{ __('adminstaticword.Delete') }}</th>
                </tr>
              </thead>
              <tbody>
                <?php $i=0;?>
                @foreach($items as $item)
                  <?php $i++;?>
                  <tr>
                    <td><?php echo $i;?></td>
                    <td>{{$item->user['fname']}}</td>
                    <td>{{$item->courses['title']}}</td>
                    <td>{{$item->title}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{ str_limit($item->detail, $limit=50, $end="...")}}</td>
                    <td>
                      <a class="btn btn-success la-admin__edit-btn" href="{{url('user/course/report/'.$item->id)}}">
                      <i class="la-icon la-icon--lg icon-edit"></i></a>
                    </td>
                    <td>
                      <form  method="post" action="{{url('user/course/report/'. $item->id)}}
                        "data-parsley-validate class="form-horizontal form-label-left">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                         <button type="submit" class="btn btn-danger"><i class="la-icon la-icon--lg icon-delete"></i></button>
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
