@extends('admin/layouts.master')
@section('title', 'Course Review - Admin')
@section('body')

<section class="content">

  @include('admin.message')
  <div class="row">
    <div class="col-12">
      <div class="box box-primary">
          <h3 class="la-admin__section-title ml-2">{{ __('adminstaticword.Course') }} {{ __('adminstaticword.Request') }}</h3>
        
       
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
                    <th>{{ __('adminstaticword.Delete') }}</th>
                  </tr>
                </thead>

                <tbody>
                  <?php $i=0;?>

                    @foreach($course as $cat)
                    @if($cat->status == 0)
                      <?php $i++;?>
                      <tr>
                        <td><?php echo $i;?></td>
                        <td>
                          @if($cat['preview_image'] !== NULL && $cat['preview_image'] !== '')
                            <img src="images/course/<?php echo $cat['preview_image'];  ?>" class="img-fluid" >
                          @else
                            <img src="{{ Avatar::create($cat->title)->toBase64() }}" class="img-fluid" >
                          @endif
                        </td>
                        <td>{{$cat->title}}</td>
                        <td>{{ $cat->user->fname }}</td>
                        <td>{{$cat->slug}}</td>
                        <td>
                          <form action="{{ route('course.quick',$cat->id) }}" method="POST">
                            {{ csrf_field() }}
                            <button  type="Submit" class="btn btn-xs {{ $cat->featured ==1 ? 'btn-success' : 'btn-danger' }}">
                              @if($cat->featured ==1)
                                {{ __('adminstaticword.Yes') }}
                              @else
                                {{ __('adminstaticword.No') }}
                              @endif
                            </button>
                          </form>
                        </td>
                         
                        <td>
                          <form action="{{ route('course.quick',$cat->id) }}" method="POST">
                            {{ csrf_field() }}
                            <button  type="Submit" class="btn btn-xs {{ $cat->status ==1 ? 'btn-success' : 'btn-danger' }}">
                              @if($cat->status ==1)
                                {{ __('adminstaticword.Active') }}
                              @else
                                {{ __('adminstaticword.Deactive') }}
                              @endif
                            </button>
                          </form>
                        </td>

                        <td>
                          <a role="button" class="btn btn-success la-admin__edit-btn" href="{{ route('course.show',$cat->id) }}">
                          <i class="la-icon la-icon--lg icon-edit"></i></a>
                        </td>

                        <td>
                          <form  method="post" action="{{url('course/'.$cat->id)}}
                            "data-parsley-validate class="form-horizontal form-label-left">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button onclick="return confirm('Are you sure you want to delete?')"  type="submit" class="btn btn-danger"><i class="la-icon la-icon--lg icon-delete"></i></button>
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
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
</section>
@endsection
