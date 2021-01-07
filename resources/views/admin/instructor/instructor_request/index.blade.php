@extends('admin/layouts.master')
@section('title', 'Mentors Request - Admin')
@section('body')

<section class="content">
  @include('admin.message')
  <div class="row">
    <div class="col-12">
      <div class="box box-primary">
          <h3 class="la-admin__section-title ml-2 mb-0">{{ __('adminstaticword.InstructorRequest') }}</h3>
        
        <!-- /.box-header -->
        <div class="box-body">
            <div class="la-admin__filter-icons text-right" style="position:relative; top:50px;z-index:0;">
              <a href="#" role="button"><span class="la-icon la-icon--3xl icon-sort mr-2" style="color:#000;"></span></a>
              <a href="#" role="button"><span class="la-icon la-icon--3xl icon-excel mr-2" style="color:#1D6F42"></span></a>
            </div>

            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                	<th>{{ __('adminstaticword.Image') }}</th>
                  <th>{{ __('adminstaticword.Name') }}</th>
                  <th>{{ __('adminstaticword.Email') }}</th>
                  <th>{{ __('adminstaticword.Detail') }}</th>
                  <th>{{ __('adminstaticword.Status') }}</th>
                  <th>{{ __('adminstaticword.View') }}</th>
                  <th>{{ __('adminstaticword.Delete') }}</th>
                </tr>
              </thead>
              <tbody>
                @foreach($items as $item)
                <tr>
                  @if($item->status == '0')
                  	<td><img src="{{ asset('images/user_img/'.$item->image)}}"></td> 
                    <td>{{$item->fname}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{ str_limit($item->detail, $limit= 50, $end = '...')}}</td>
                    <td>
                      @if($item->status==1)
                        {{ __('adminstaticword.Approved') }}
                      @else
                        {{ __('adminstaticword.Pending') }}
                      @endif
                    </td>
                    <td><a class="btn btn-success la-admin__edit-btn" href="{{route('requestinstructor.edit',$item->id)}}">{{ __('adminstaticword.View') }}</a></td>

                    <td><form  method="post" action="{{url('requestinstructor/'.$item->id)}}
                          "data-parsley-validate class="form-horizontal form-label-left">
                          {{ csrf_field() }}
                          {{ method_field('DELETE') }}
                           <button type="submit" class="btn btn-danger"><i class="la-icon la-icon--lg icon-delete"></i></button>
                        </form>
                    </td>
                  @endif

                  @endforeach
               
                </tr>
              </tfoot>
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