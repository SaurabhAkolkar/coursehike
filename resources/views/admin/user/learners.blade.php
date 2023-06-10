@php
use Carbon\Carbon;
@endphp
@extends('admin.layouts.master')
@section('title', 'View User - Admin')
@section('body')

<section class="content">
  @include('admin.message')
  <div class="row">
    <div class="col-12">
      <div class="box box-primary">
        <div class="d-flex justify-content-between align-items-center ml-2">
          <h3 class="la-admin__section-title mb-0">{{ __('adminstaticword.Learners') }}</h3>
        </div>

        <!-- /.box-header -->
        <div class="box-body">
            <!--<div class="la-admin__filter-icons text-right" style="position:relative; top:50px;z-index:0;">
              <a href="#" role="button"><span class="la-icon la-icon--3xl icon-sort mr-2" style="color:#000;"></span></a>
               <a href="#" role="button"><span class="la-icon la-icon--3xl icon-excel mr-2" style="color:#1D6F42"></span></a>
            </div>-->
            <div class='filters pt-6 mx-4'>

              <div class='filter-container row' >
                  <input autocomplete='off' class='filter col p-1 mb-3' name='Name' placeholder='Name'  data-col="FirstName" />
                  <input autocomplete='off' class='filter col p-1  mb-3' name='Email' placeholder='Email' data-col="Email" />
                  <input autocomplete='off' class='filter col p-1  mb-3' name='Mobile' placeholder='Mobile' data-col="Mobile"/>
                  <input autocomplete='off' class='filter col p-1  mb-3' name='Country' placeholder='Country' data-col="Country"/>
                  <input autocomplete='off' class='filter col p-1  mb-3' name='Subscription' placeholder='Subscription' data-col="Subscription"/>

              </div>

              <div class='clearfix'></div>
            </div>


            <table id="example1" class=" table table-bordered table-striped js-dynamitable">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>{{ __('adminstaticword.Image') }}</th>
                    <th>{{ __('adminstaticword.FirstName') }}</th>
                    <th>{{ __('adminstaticword.Email') }}</th>
                    <th>{{ __('adminstaticword.Mobile') }}</th>
                    <th>{{ __('adminstaticword.Country') }}</th>
                    <th>{{ __('adminstaticword.Registered') }}</th>
                    <th>Active {{ __('adminstaticword.Subscription') }}</th>
                    <th>Add Access</th>
                    <th>{{ __('adminstaticword.Status') }}</th>
                    <th>{{ __('adminstaticword.Edit') }}</th>
                    <th>{{ __('adminstaticword.Delete') }}</th>
                  </tr>
                </thead>

                <tbody>
                  <?php $i=0;?>

                    @foreach ($users as $user)
                      @if($user->id != Auth::User()->id)
                        <?php $i++;?>

                      <tr>
                        <td><?php echo $i;?></td>
                        <td>
                          @if($user->user_img != null || $user->user_img !='')
                            <img src="{{ $user->user_img }}" class="img-fluid">
                          @else
                            <img src="{{ asset('images/default/user.jpg')}}" class="img-fluid" alt="User Image">
                          @endif
                        </td>
                        <td>{{ $user['fname'] }}</td>
                        <td>{{ $user['email'] }}</td>
                        <td>
                          {{$user->mobile}}
                        </td>
                        <td>
                          @if($user->country_id)
                          {{  $user->country['nicename']  }}
                          @endif
                        </td>
                        <td class="text-left">
                          {{Carbon::parse($user->created_at)->format('d M Y')}}
                        </td>
                        <td class="text-left">
                          @if(!$user->subscription()) No Subscription @else {{$user->subscription()->plan->name}} @endif
                        </td>
                        <td class="text-left">
                          <a class="btn btn-info text-capitalize font-weight-normal" href="{{ route('user.subscriptions',$user->id) }}">View</a>
                        </td>
                        <td>
                          <form action="{{ route('user.quick',$user->id) }}" method="POST">
                            {{ csrf_field() }}
                            <button  type="Submit" class="btn btn-xs {{ $user->status ==1 ? 'btn-success' : 'btn-danger' }}">
                              @if($user->status ==1)
                              {{ __('adminstaticword.Active') }}
                              @else
                              {{ __('adminstaticword.Deactive') }}
                              @endif
                            </button>
                          </form>
                        </td>

                        <td>
                          <a class="btn btn-success btn-sm" href="{{ route('user.update',$user->id) }}">
                            <i class="la-icon la-icon--lg icon-edit"></i></a>
                        </td>

                        <td>
                          <form  method="post" action="{{ route('user.delete',$user->id) }}
                            "data-parsley-validate class="form-horizontal form-label-left">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                              <button onclick="return confirm('Are you sure you want to delete?')"  type="submit" class="btn btn-danger btn-sm"><i class="la-icon la-icon--lg icon-delete"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endif
                    @endforeach

                </tbody>
            </table>
          </div>
        <!-- /.box-body -->
      </div>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>

@endsection
@section('script')
<script src="{{url('js/multifilter.min.js')}}"></script>

<script type='text/javascript'>
    var DateTableColumn = 7;
  $(document).ready(function() {

    $('.filter').multifilter({
      'target' : $('#example1')
    })

    $('#example1_filter').hide();

  });

  </script>

@endsection


