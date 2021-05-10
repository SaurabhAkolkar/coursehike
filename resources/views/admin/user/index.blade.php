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
          <h3 class="la-admin__section-title mb-0">{{ __('adminstaticword.Users') }}</h3>
          <a class="btn btn-info btn-sm" href="{{ route('user.add') }}"><span class="la-icon la-icon--sm icon-plus"></span> {{ __('adminstaticword.Add') }} {{ __('adminstaticword.User') }}</a>
        </div>
       
        <!-- /.box-header -->
        <div class="box-body">
            <!--<div class="la-admin__filter-icons text-right" style="position:relative; top:50px;z-index:0;">
              <a href="#" role="button"><span class="la-icon la-icon--3xl icon-sort mr-2" style="color:#000;"></span></a>
               <a href="#" role="button"><span class="la-icon la-icon--3xl icon-excel mr-2" style="color:#1D6F42"></span></a> 
            </div>-->
            {{-- <div class='filters pt-6 mx-4'>
             
              <div class='filter-container row' >
                  <input autocomplete='off' class='filter col p-1 mb-3' name='image' placeholder='Name'  data-col="FirstName" />
                  <input autocomplete='off' class='filter col p-1  mb-3' name='drink' placeholder='Email' data-col="Email" />
                  <input autocomplete='off' class='filter col p-1  mb-3' name='pizza' placeholder='Role' data-col="Role" />
                  <input autocomplete='off' class='filter col p-1  mb-3' name='movie' placeholder='Mobile' data-col="Mobile"/>
                  <input autocomplete='off' class='filter col p-1  mb-3' name='movie' placeholder='Country' data-col="Country"/>
                  <input autocomplete='off' class='filter col p-1  mb-3' name='movie' placeholder='Subscription' data-col="Subscription"/>

              </div>
             
              <div class='filter-container'>
              </div>
              <div class='filter-container'>
              </div>
              <div class='filter-container'>
              </div>

              <div class='clearfix'></div>
            </div> --}}

			<div class="col-md-4 pull-right">
				<div class="input-group input-daterange">			  
				<input type="text" id="min-date" class="form-control date-range-filter" data-date-format="yyyy-mm-dd" placeholder="Filter Date Range">			  
				</div>
			</div>

              
            <table id="example1" class=" table table-bordered table-striped js-dynamitable">

                <!-- <thead class="bg-transparent la-admin__user-filters">
                  <tr>
                    <th class="px-0 py-0"></th>
                    <th class="px-0 py-0">  {{-- <input  class="js-filter  form-control px-2 py-5" type="text" value=""> --}}</th>
                    <th class="px-0 py-0"><input  class="js-filter  form-control px-2 py-5" type="text" value="" placeholder="First Name"></th>
                    <th class="px-0 py-0"> <input  class="js-filter  form-control px-2 py-5" type="text" value=""  placeholder="Email"> </th>
                    <th class="px-0 py-0">
                      <select class="js-filter form-control px-0" style="height:42px;">
                        <option value="" selected>Role</option>
                        <option value="user">User</option>
                        <option value="mentors">Mentor</option>
                        <option value="admin">Admin</option>
                      </select> 
                      {{-- <input  class="js-filter  form-control px-2" type="text" value=""> --}}
                    </th>
                    <th class="px-0 py-0"> <input  class="js-filter  form-control px-2 py-5" type="text" value=""  placeholder="Mobile"></th>
                    <th  class="px-0 py-0"> <input  class="js-filter  form-control px-2 py-5" type="text" value=""  placeholder="Country"></th>
                    <th  class="px-0 py-0"> <input  class="js-filter  form-control px-2 py-5" type="text" value=""  placeholder="Registered"></th>
                    <th  class="px-0 py-0">
                      <input  class="js-filter  form-control px-2 py-5" type="text" value=""  placeholder="Purchased">
                      {{--                       
                      <select class="js-filter  form-control px-0">
                        <option value=""></option>
                        <option value="@dynamitable.com">dynamitable.com</option>
                        <option value="@sample.com">Sample</option>
                      </select> --}}
                    </th>
                    <th  class="px-0 py-0"><input class="js-filter  form-control px-2 py-5" type="text" value=""  placeholder="Subscription"></th>
                    <th  class="px-0 py-0"><input class="js-filter  form-control px-2 py-5" type="text" value=""  placeholder="Status"></th>
                    {{-- <th class="px-0 py-0"><input class="js-filter  form-control px-2 py-5" type="text" value=""></th> --}}
                    <th class="px-0 py-0"></th>
                  </tr>
                </thead> -->

                <thead>
                  <tr>
                    <th>#</th>
                    <th>{{ __('adminstaticword.Image') }}</th>
                    <th>{{ __('adminstaticword.FirstName') }}</th>
                    <th>{{ __('adminstaticword.Email') }}</th>
                    <th>{{ __('adminstaticword.Role') }}</th>
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
                        <td>{{ ucfirst($user['role']) }}</td>
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

    $('.filters').multifilter({
      'target' : $('#example1')
    })

    // $('#example1_filter').hide();

  });
    
  </script>
  
@endsection


