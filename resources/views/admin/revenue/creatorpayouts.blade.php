@extends('admin/layouts.master')
@section('title', 'Mentor Payouts - Admin')
@section('body')

<section class="content">
  @include('admin.message')
  <div class="row">
    <div class="col-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title pb-6">  {{ __('adminstaticword.CreatorPayout') }}</h3>
          <a class="btn btn-info btn-sm" href="{{url('admin/addpayout')}}">
          + {{ __('adminstaticword.Add') }} {{ __('adminstaticword.CreatorPayout') }}
        </a>
        </div>
        
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <th>#</th>
                <th>{{ __('adminstaticword.Instructor') }}</th>
                <th>{{ __('adminstaticword.Month') }}</th>
                <th>{{ __('adminstaticword.SubscriptionAmount') }}</th>
                <th>{{ __('adminstaticword.CourseAmount') }}</th>
                <th>{{ __('adminstaticword.Total') }}</th>
                <th>{{ __('adminstaticword.Status') }}</th>
                <th>{{ __('adminstaticword.View') }}</th>
              </tr>
              </thead>
              <tbody>
                <?php $i=0;?>
                @foreach($payouts as $payout)
                <tr>
                  <?php $i++;?>
                    <td><?php echo $i;?></td>
                    <td>{{$payout->user->fullName}}</td>
                    <td>{{$payout->month}}</td>
                    <td>$ {{$payout->subscription_amount}}</td>
                    <td>$ {{$payout->course_amount}}</td>
                    <td>$ {{$payout->subscription_amount+$payout->course_amount}}</td>
                    <td>{{ucfirst($payout->status)}}</td>
                    <td>
                        <a class="text-dark" href="{{ route('creatorpayout.edit',$payout->id) }}"><i class="la-icon la-icon--lg icon-edit"></i></a>
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
