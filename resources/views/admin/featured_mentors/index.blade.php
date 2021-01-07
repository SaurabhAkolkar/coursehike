@extends('admin/layouts.master')
@section('title', 'Featured Mentors - Admin')
@section('body')

<section class="content">
  @include('admin.message')
  <div class="row">
    <div class="col-12">
      <div class="box box-primary">
        <div class="d-flex justify-content-between align-items-center">
          <h3 class="la-admin__section-title">{{ __('adminstaticword.FeaturedMentors') }}</h3>
            <a class="btn btn-info btn-sm" href="{{url('featuredMentors/create')}}">
              <i class="la-icon la-icon--sm icon-plus"></i> 
              <span>{{ __('adminstaticword.Add') }} {{ __('adminstaticword.FeaturedMentors') }}</span>
            </a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
           
              <tr>
                <th>#</th>
                <th>{{ __('adminstaticword.Name') }}</th>
                <th>{{ __('adminstaticword.Course') }}</th>
                <th>{{ __('adminstaticword.Thumbnail') }}</th>
                <th>{{ __('adminstaticword.Status') }}</th>
                <th>{{ __('adminstaticword.Edit') }}</th>
                <th>{{ __('adminstaticword.Delete') }}</th>
              </tr>
            </thead>
            <tbody>
              <?php $i=0;?>
              @foreach($data as $d)
              <?php $i++;?>
              <tr>
                <td><?php echo $i;?></td>
                <td>{{$d->user->fullName}}</td>
                <td>{{$d->courses->title}}</td>
                <td> <img src="{{ $d->user_thumbnail }}" class="img-fluid"></td>
                <td>{{$d->status == 1 ? 'Active' : 'Inactive'}}</td>
                <td>
                  <a class="btn btn-success la-admin__edit-btn" href="{{route('featuredmentor.edit',$d->id)}}">
                  <i class="la-icon la-icon--lg icon-edit"></i></a>
                </td>

                <td><form  method="post" action="{{url('featuredMentors/'.$d->id)}}
                      "data-parsley-validate class="form-horizontal form-label-left">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                       <button  type="submit" class="btn btn-danger"><i class="la-icon la-icon--lg icon-delete"></i></button>
                  </form>
                </td>

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
</section>

@endsection
