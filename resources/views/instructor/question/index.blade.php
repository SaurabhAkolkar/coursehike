@extends('admin/layouts.master')
@section('title', 'All Questions - Instructor')
@section('body')

<section class="content">
  @include('admin.message')
  <div class="row">
    <div class="col-12">
      <div class="box box-primary">
        <div class="d-flex justify-content-between align-items-center">
          <h3 class="la-admin__section-title ml-md-2">Course Questions</h3>
          <a class="btn btn-info btn-sm" href="{{ url('instructorquestion/create') }}">
              <span class="la-icon la-icon--sm icon-plus"></span> Add Question
          </a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
         
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Course</th>
                  <th>Question</th>
                  <th>Status</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                @foreach($questions as $que)
                  <tr>
                    <td>{{$que->courses->title}}</td>
                    <td>{{$que->question}}</td> 
                    <td>
                      <form action="{{ route('ansr.quick',$que->id) }}" method="POST">
                        {{ csrf_field() }}
                        <button type="Submit" class="btn btn-xs {{ $que->status ==1 ? 'btn-success' : 'btn-danger' }}">
                          @if($que->status ==1)
                          Active
                          @else
                          Deactive
                          @endif
                        </button>
                      </form>
                    </td>
                    <td>
                      <a class="btn btn-success btn-sm la-admin__edit-btn" href="{{url('instructorquestion/'.$que->id)}}">
                      <span class="la-icon la-icon--lg icon-edit"></span>
                      </a>
                    </td>
                    <td>
                      <form  method="post" action="{{url('instructorquestion/'.$que->id)}}" data-parsley-validate class="form-horizontal form-label-left">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}

                        <button type="submit" class="btn btn-danger">
                          <span class="la-icon la-icon--lg icon-delete"></span>
                        </button>
                      </form>
                    </td>
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
