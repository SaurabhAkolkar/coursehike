@extends('admin/layouts.master')
@section('title', 'Course Unpublish Requests - Admin')
@section('body')

<section class="content">

  @include('admin.message')
  <div class="row">
    <div class="col-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">{{ __('adminstaticword.Course') }} Unpublish Request</h3>
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

                    @foreach($requests as $r)
                    @if($r->course->status == 1)
                      <?php $i++;?>
                      <tr>
                        <td><?php echo $i;?></td>
                        <td>
                          @if($r->course['preview_image'] !== NULL && $r->course['preview_image'] !== '')
                            <img src="<?php echo $r->course['preview_image'];  ?>" class="img-fluid" >
                          @else
                            <img src="{{ Avatar::create($r->course->title)->toBase64() }}" class="img-fluid" >
                          @endif
                        </td>
                        <td>{{$r->course->title}}</td>
                        <td>{{ $r->course->user->fname }}</td>
                        <td>{{$r->course->slug}}</td>
                        <td>
                          <form action="{{ route('course.quick',$r->course->id) }}" method="POST">
                            {{ csrf_field() }}
                            <button  type="Submit" class="btn btn-xs {{ $r->course->featured ==1 ? 'btn-success' : 'btn-danger' }}">
                              @if($r->course->featured ==1)
                                {{ __('adminstaticword.Yes') }}
                              @else
                                {{ __('adminstaticword.No') }}
                              @endif
                            </button>
                          </form>
                        </td>
                         
                        <td>
                          <form action="{{ route('course.quick',$r->course->id) }}" method="POST">
                            {{ csrf_field() }}
                            <button  type="Submit" class="btn btn-xs {{ $r->course->status ==1 ? 'btn-success' : 'btn-danger' }}">
                              @if($r->course->status ==1)
                                {{ __('adminstaticword.Active') }}
                              @else
                                {{ __('adminstaticword.Deactive') }}
                              @endif
                            </button>
                          </form>
                        </td>

                        <td>
                          <a class="btn btn-success la-admin__edit-btn" href="{{ route('course.show',$r->course->id) }}">
                            <i class="la-icon la-icon--lg icon-edit"></i>
                          </a>
                        </td>
                      </tr>
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
