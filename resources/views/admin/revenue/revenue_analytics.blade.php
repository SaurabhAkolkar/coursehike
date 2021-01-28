@extends('admin/layouts.master')
@section('title', 'Completed Payouts - Instructor')
@section('body')

<section class="content">
  @include('admin.message')
  <div class="row">
    <div class="col-12">
      <div class="box box-primary">
        <h3 class="la-admin__section-title ml-3">  {{ __('adminstaticword.CreatorPayoutAnalytics') }}</h3>
        
        
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">

              <thead>
              
                <th>Creator ID</th>
                <th>Creator Name</th>
                <th>Email</th>
                <th>No. of Learners</th>
                <th>Total watch time</th>
                <th>Subscribers Total Revenue</th>
                <th>Courses & Classes Purchased</th>
                <th>Purchase Revenue</th>
                <th>Month</th>
                <th>Year</th>
                {{-- <th>Actions</th> --}}
              
              </tr>
              </thead>

              <tbody>
                @foreach($creators as $creator)
                <tr>
                  {{-- {{dd($creator)}} --}}
                  <td>{{$creator['id']}}</td>
                  <td>{{$creator['name']}}</td>
                  <td>{{$creator['email']}}</td>
                  <td>{{count($creator['payout']['learners'])}}</td>
                  <td>{{$creator['payout']['watch_time']}}</td>
                  <td>${{$creator['payout']['subscribers_total_income']}}</td>
                  <td>{{$creator['payout']['course_sale']['count']}}</td>
                  <td>${{$creator['payout']['course_sale']['total_income']}}</td>
                  <td>{{$creator['month']}}</td>
                  <td>{{$creator['year']}}</td>

                  {{-- <td>
                    <a class="btn btn-primary btn-sm" href="">{{ __('adminstaticword.View') }}</a>
                  </td> --}}
                    
                  

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
