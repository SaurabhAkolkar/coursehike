@extends('admin.layouts.master')
@section('title', 'View User - Admin')
@section('body')

<section class="content">
  @include('admin.message')
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">{{ __('adminstaticword.Users') }}</h3>
          <a class="btn btn-info btn-sm" href="{{ route('user.add') }}"><span class="la-icon icon-plus"></span>{{ __('adminstaticword.Add') }} {{ __('adminstaticword.User') }}</a>
        </div>
       
        <!-- /.box-header -->
        <div class="box-body">
            <div class="la-admin__filter-icons text-right" style="position:relative; top:50px;z-index:0;">
              <a href="#" role="button"><span class="la-icon la-icon--3xl icon-sort mr-2" style="color:#000;"></span></a>
              <a href="#" role="button"><span class="la-icon la-icon--3xl icon-excel mr-2" style="color:#1D6F42"></span></a>
            </div>
            
              <table id="example1" class="table table-bordered table-striped text-center display nowrap">
                <thead>
                  <th>#</th>
                  <th>{{ __('adminstaticword.StartDate') }}</th>
                  <th>{{ __('adminstaticword.EndDate') }}</th>
                  <th></th>
                </thead> 

                <tbody>
                  <?php $i=0;?>

                    @foreach ($users as $user)
                    
                        <?php $i++;?>

                      <tr>
                        <td><?php echo $i;?></td>
                        <td>
                          @if($user->user_img != null || $user->user_img !='')
                            <img src="{{ url('/images/user_img/'.$user->user_img) }}" class="img-fluid">
                          @else
                            <img src="{{ asset('images/default/user.jpg')}}" class="img-fluid" alt="User Image">
                          @endif
                        </td>
                        <td>{{ $user['fname'] }}</td>
                        <td>{{ $user['email'] }}</td>
                        <td>{{ $user['role'] }}</td>
                        <td>
                          {{$user->mobile}}
                        </td>
                        <td>
                          @if($user->country_id)
                          {{  $user->country['nicename']  }}
                          @endif
                        </td>
                        <td class="text-center">
                          <a class="" href="{{ route('user.subscriptions',$user->id) }}">View</a>
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
                              
                        <td><form  method="post" action="{{ route('user.delete',$user->id) }}
                            "data-parsley-validate class="form-horizontal form-label-left">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                             
                              <button onclick="return confirm('Are you sure you want to delete?')"  type="submit" class="btn btn-danger btn-sm"><i class="la-icon la-icon--lg icon-delete"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endif

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


