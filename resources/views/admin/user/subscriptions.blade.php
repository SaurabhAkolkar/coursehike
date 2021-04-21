@extends('admin.layouts.master')
@section('title', 'User Subscripion - Admin')
@section('body')

<section class="content">
  @include('admin.message')
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="d-flex justify-content-between align-items-center ml-2">
          <h3 class="la-admin__section-title">{{$user->fullName}}'s {{ __('adminstaticword.Subscription') }}</h3>
          <a class="btn btn-info btn-sm" href="{{route('create.subscription', $user_id)}}"><span class="la-icon la-icon--sm icon-plus"></span> {{ __('adminstaticword.Add') }} / {{__('adminstaticword.Update')}} {{ __('adminstaticword.Subscription') }}</a>
        </div>
       
        <!-- /.box-header -->
        <div class="box-body">
            <!-- <div class="la-admin__filter-icons text-right" style="position:relative; top:50px;z-index:0;">
              <a href="#" role="button"><span class="la-icon la-icon--3xl icon-sort mr-2" style="color:#000;"></span></a>
              <a href="#" role="button"><span class="la-icon la-icon--3xl icon-excel mr-2" style="color:#1D6F42"></span></a>
            </div> -->
            
              <table id="example1" class="table table-bordered table-striped text-center display nowrap">
                <thead>
                  <th>#</th>
                  <th>Plan</th>
                  <th>{{ __('adminstaticword.StartDate') }}</th>
                  <th>{{ __('adminstaticword.EndDate') }}</th>
                  <th>{{ __('adminstaticword.Amount') }}</th>
                </thead> 

                <tbody>
                  <?php $i=0;?>

                    @foreach ($subscriptions as $s)
                    
                        <?php $i++;?>

                      <tr>
                        <td><?php echo $i;?></td>
                        <td>{{$s->plan->name}}</td>   
                        <td>{{$s->starts_at}}</td>                 
                        <td>{{$s->ends_at}}</td>                 
                        <td>{{$s->plan->currency}} {{$s->plan->price}}</td>                 
                    </tr>
                  @endforeach

                </tbody>
              </table>
          </div>
        <!-- /.box-body -->
      </div>
    </div>


    <div class="col-md-12 mt-20">
      <div class="box box-primary">
        <div class="d-flex justify-content-between align-items-center ml-2">
          <h3 class="la-admin__section-title">{{$user->fullName}}'s {{ __('adminstaticword.Course') }}</h3>
          <a class="btn btn-info btn-sm" href="/user/subscriptions/add-course/{{$user_id}}"><span class="la-icon la-icon--sm icon-plus"></span> {{ __('adminstaticword.Add') }} {{ __('adminstaticword.Courses') }}</a>
        </div>
       
        <!-- /.box-header -->
        <div class="box-body">            
              <table id="example2" class="table table-bordered table-striped text-center display nowrap">
                <thead>
                  <th>#</th>
                  <th>{{ __('adminstaticword.Title') }}</th>
                  <th>{{ __('adminstaticword.PurchaseDate') }}</th>
                </thead> 

                <tbody>
                  <?php $i=0;?>

                    @foreach ($courses_purchased as $cp)
                    
                        <?php $i++;?>

                      <tr>
                        <td><?php echo $i;?></td>
                        <td>{{$cp->bundle->title}}</td>                 
                        <td>{{Carbon\Carbon::parse($cp->created_at)->format('d-M-Y')}}</td>                 
                      </tr>
                  @endforeach

                </tbody>
              </table>
          </div>
        <!-- /.box-body -->
      </div>
    </div>

    <div class="col-md-12 mt-20">
      <div class="box box-primary">
        <div class="d-flex justify-content-between align-items-center ml-2">
          <h3 class="la-admin__section-title">{{$user->fullName}}'s {{ __('adminstaticword.Class') }}</h3>
          <a class="btn btn-info btn-sm" href="/user/subscriptions/add-class/{{$user_id}}"><span class="la-icon la-icon--sm icon-plus"></span> {{ __('adminstaticword.Add') }} {{ __('adminstaticword.Class') }}</a>
        </div>
       
        <!-- /.box-header -->
        <div class="box-body">            
              <table id="example2" class="table table-bordered table-striped text-center display nowrap">
                <thead>
                  <th>#</th>
                  <th>{{ __('adminstaticword.Title') }}</th>
                  <th>{{ __('adminstaticword.Classes') }}</th>
                  <th>{{ __('adminstaticword.PurchaseType') }}</th>
                  <th>{{ __('adminstaticword.PurchaseDate') }}</th>
                </thead> 

                <tbody>
                  <?php $i=0;?>

                    @foreach ($class_purchased as $cp)
                    
                        <?php $i++;?>

                      <tr>
                        <td><?php echo $i;?></td>
                        <td>{{$cp->course->title}}</td>                 
                        <td>{{count(json_decode($cp->class_id))}}</td>                 
                        <td>{{$cp->purchase_type=='all_classes'?'All Classes':'Selected Classes'}}</td>                 
                        <td>{{Carbon\Carbon::parse($cp->created_at)->format('d-M-Y')}}</td>                 
                      </tr>
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


