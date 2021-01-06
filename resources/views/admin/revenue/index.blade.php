@extends('admin/layouts.master')
@section('title', 'Pending Payouts - Admin')
@section('body')

<section class="content">
  @include('admin.message')
  <div class="row">
    <div class="col-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title pb-6">  {{ __('adminstaticword.PendingPayout') }}</h3>
        </div>
        
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <th>#</th>
                <th>{{ __('adminstaticword.Instructor') }}</th>
                <th>{{ __('adminstaticword.View') }}</th>
              </tr>
              </thead>
              <tbody>
                <?php $i=0;?>
                @foreach($users as $user)
                <tr>
                  <?php $i++;?>
                    <td><?php echo $i;?></td>
                    <td>{{$user->fname}}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="{{ route('admin.pending', $user->id) }}">{{ __('adminstaticword.PendingPayout') }}</a>

                        <a class="btn btn-success btn-sm" href="{{ route('admin.paid', $user->id) }}">{{ __('adminstaticword.CompletedPayout') }}</a>
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
