@extends('admin/layouts.master')
@section('title', 'Course Review - Admin')
@section('body')

<section class="content">

  @include('admin.message')
  <div class="row">
    <div class="col-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">{{ __('adminstaticword.Course') }} Publish {{ __('adminstaticword.Request') }}</h3>
        </div>
       
        <!-- /.box-header -->
          <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">

                <thead>
                  
                  <tr>
                    <th>#</th>
                    <th>{{ __('adminstaticword.Image') }}</th>
                    <th>{{ __('adminstaticword.Title') }}</th>
                    <th>{{ __('adminstaticword.Instructor') }}</th>
                    <th>{{ __('adminstaticword.Slug') }}</th>
                    <th>{{ __('adminstaticword.Featured') }}</th>
                    <th>{{ __('adminstaticword.Status') }}</th>
                    <th>{{ __('adminstaticword.Edit') }}</th>
                  </tr>
                </thead>

                <tbody>
                  <?php $i=0;?>

                    @foreach($requests as $requests)
                      @if($requests->courses)
                        @if($requests->courses->status != 1)
                          <?php $i++;?>
                          <tr>
                            <td><?php echo $i;?></td>
                            <td>
                              @if($requests->courses['preview_image'] !== NULL && $requests->courses['preview_image'] !== '')
                                <img src="<?php echo $requests->courses['preview_image'];  ?>" class="img-fluid" >
                              @else
                                <img src="{{ Avatar::create($requests->courses->title)->toBase64() }}" class="img-fluid" >
                              @endif
                            </td>
                            <td>{{$requests->courses->title}}</td>
                            <td>{{ $requests->courses->user->fname }}</td>
                            <td>{{$requests->courses->slug}}</td>
                            <td>
                              <form action="{{ route('course.quick',$requests->courses->id) }}" method="POST">
                                {{ csrf_field() }}
                                <button  type="Submit" class="btn btn-xs {{ $requests->courses->featured ==1 ? 'btn-success' : 'btn-danger' }}">
                                  @if($requests->courses->featured ==1)
                                    {{ __('adminstaticword.Yes') }}
                                  @else
                                    {{ __('adminstaticword.No') }}
                                  @endif
                                </button>
                              </form>
                            </td>
                            
                            <td>
                              <form action="{{ route('course.quick',$requests->courses->id) }}" method="POST">
                                {{ csrf_field() }}
                                <button  type="Submit" class="btn btn-xs {{ $requests->courses->status ==1 ? 'btn-success' : 'btn-danger' }}">
                                  @if($requests->courses->status ==1)
                                    {{ __('adminstaticword.Active') }}
                                  @else
                                    {{ __('adminstaticword.Deactive') }}
                                  @endif
                                </button>
                              </form>
                            </td>

                            <td>
                              <a class="btn btn-primary btn-sm" href="{{ route('course.show',$requests->courses->id) }}">
                              <i class="fa fa-edit"></i></a>
                            </td>
                          </tr>
                        @endif
                      @endif
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
</section>
@endsection
