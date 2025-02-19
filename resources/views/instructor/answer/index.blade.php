@extends('admin/layouts.master')
@section('title', 'All Answers - Instructor')
@section('body')

<section class="content">
  @include('admin.message')
  <div class="row">
    <div class="col-12">
      <div class="box box-primary">
        <div class="d-flex justify-content-between align-items-center">
          <h3 class="la-admin__section-title ml-2"> Course Answers</h3>
          <a class="btn btn-info btn-sm" href="{{ url('instructoranswer/create') }}">
              <span class="la-icon la-icon--sm icon-plus"></span> Add Answer
          </a>
        </div>
        
        <!-- /.box-header -->
        <div class="box-body">
        
            <table id="example1" class="table table-bordered table-striped">

              <thead>
              
                <th>#</th>
                <th>{{ __('adminstaticword.Answer') }}</th>
                <th>{{ __('adminstaticword.Question') }}</th>
                <th>{{ __('adminstaticword.Course') }}</th>
                <th>{{ __('adminstaticword.Status') }}</th>
                <th>{{ __('adminstaticword.Edit') }}</th>
                <th>{{ __('adminstaticword.Delete') }}</th>
              </tr>
              </thead>
              <tbody>
                    <?php $i=0;?>
                    @foreach($answers as $ans)
                    <tr>
                      <?php $i++;?>
                      <td><?php echo $i;?></td>
                        <td>{{$ans->answer}}</td>
                        <td>{{$ans->question->question}}</td>
                        <td>{{$ans->courses->title}}</td> 
                      <td>
                          @if($ans->status==1)
                          {{ __('adminstaticword.Active') }}
                          @else
                          {{ __('adminstaticword.Deactive') }}
                          @endif                      
                      </td>
                      
                      <td>
                        <a class="btn btn-success la-admin__edit-btn" href="{{url('instructoranswer/'.$ans->id)}}">
                          <span class="la-icon la-icon--lg icon-edit"></span>
                        </a>
                      </td>

                      <td><form  method="post" action="{{url('instructoranswer/'.$ans->id)}}
                          "data-parsley-validate class="form-horizontal form-label-left">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button  type="submit" class="btn btn-danger">
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
