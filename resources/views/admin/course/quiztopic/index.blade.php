<section class="content">
  <div class="row">
    <div class="col-12">
        <div class="text-right">
          <a data-toggle="modal" data-target="#myModaltopic" href="#" class="btn btn-info btn-sm">+ {{ __('adminstaticword.Add') }} {{ __('adminstaticword.Quiz') }}</a>
        </div>
        <br/>

        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <th>#</th>
            <th>{{ __('adminstaticword.Question') }}</th>
            <th>{{ __('adminstaticword.Marks') }}</th>
            {{-- <th>{{ __('adminstaticword.Timer') }}</th> --}}
            <th>{{ __('adminstaticword.Status') }}</th>
            <th>{{ __('adminstaticword.Reattempt') }}</th>
            <th>{{ __('adminstaticword.DueDays') }}</th>
            <th>{{ __('adminstaticword.Action') }}</th>
          </tr>
          </thead>
          <tbody>
          <?php $i=0;?>
          @foreach($topics as $topic)
          <tr>
            <?php $i++;?>
            <td><?php echo $i;?></td>
              <td>{{$topic->title}}</td>
              <td>{{$topic->per_q_mark}}</td>
              {{-- <td>{{$topic->timer}}</td>  --}}
              
              <td>
                  @if($topic->status==1)
                    {{ __('adminstaticword.Active') }}
                  @else
                   {{ __('adminstaticword.Deactive') }}
                  @endif                      
              </td>
              <td>
                  @if($topic->quiz_again==1)
                    {{ __('adminstaticword.Yes') }}
                  @else
                   {{ __('adminstaticword.No') }}
                  @endif                      
              </td>
              <td>{{$topic->due_days}}</td>
            
              <td class="d-flex justify-content-between align-items-center">
                <a class="" title="Add Question" href="{{route('answersheet', $topic->id)}}"> Delete Answer</a>

                <a class="" title="Add Question" href="{{route('questions.show', $topic->id)}}"> {{ __('adminstaticword.Add') }} {{ __('adminstaticword.Question') }}</a>
             
                <a href="{{url('admin/quiztopic/'.$topic->id)}}" title="Edit" class="btn btn-success btn-sm"><i class="la-icon la-icon--lg icon-edit"></i></a>

                <form  method="post" action="{{url('admin/quiztopic/'.$topic->id)}}
                  "data-parsley-validate class="form-horizontal form-label-left">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button  type="submit" class="btn btn-danger btn-sm" title="Delete"><i class="la-icon la-icon--lg icon-delete"></i></button>
                </form>
                
              </td>
          </tr>


           


          @endforeach
          
          </tfoot>
        </table>
    

    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

  <!--Model start-->
  <div class="modal fade show" id="myModaltopic" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header d-block">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel"> {{ __('adminstaticword.Add') }} {{ __('adminstaticword.Quiz') }}</h4>
        </div>
        <div class="box box-primary">
          <div class="panel panel-sum">
            <div class="modal-body">
              <form id="demo-form2" method="post" action="{{url('admin/quiztopic/')}}" data-parsley-validate class="form-horizontal form-label-left">
                {{ csrf_field() }}
               
                <input type="hidden" name="course_id" value="{{ $cor->id }}"  />
               

                <div class="row">
                  <div class="col-md-12">
                    <label for="exampleInputTit1e">{{ __('adminstaticword.QuizTopic') }}:<span class="redstar">*</span> </label>
                    <input type="text" placeholder="Enter Quiz Topic" class="form-control " name="title" id="exampleInputTitle" value="">
                  </div>
                </div>
                <br>

                <div class="row">
                  <div class="col-md-12">
                    <label for="exampleInputDetails">{{ __('adminstaticword.QuizDescription') }}:<sup class="redstar">*</sup></label>
                    <textarea name="description" rows="3" class="form-control" placeholder="Enter Description"></textarea>
                  </div>
                </div>
                <br>

                <div class="row">
                  <div class="col-md-12">
                    <label for="exampleInputTit1e">{{ __('adminstaticword.Marks') }}:<span class="redstar">*</span> </label>
                    <input type="number" placeholder="Enter Per Question Mark" class="form-control " name="per_q_mark" id="exampleInputTitle" value="">
                  </div>
                </div>
                <br>


                <div class="row display-none">
                  <div class="col-md-12">
                    <label for="exampleInputTit1e">{{ __('adminstaticword.QuizTimer') }}:<span class="redstar">*</span> </label>
                    <input type="text" placeholder="Enter Quiz Time" class="form-control" name="timer" id="exampleInputTitle" value="1">
                  </div>
                </div>
               

                <div class="row">
                  <div class="col-md-12">
                    <label for="exampleInputTit1e">{{ __('adminstaticword.Days') }}:</label>
                    <small>(Days after quiz will start when user enroll in course)</small>
                    <input type="text" placeholder="Enter Due Days" class="form-control" name="due_days" id="exampleInputTitle" >
                  </div>
                </div>
                <br>

                <div class="row">
                  <div class="col-md-6">
                    <label for="exampleInputDetails">{{ __('adminstaticword.Status') }}:</label>
                    <li class="tg-list-item">   
                      <input class="la-admin__toggle-switch" id="c18" name="status"  type="checkbox"/>
                      <label class="la-admin__toggle-label" data-tg-off="Deactive" data-tg-on="Active" for="c18"></label>
                    </li>
                    <input type="hidden" name="free" value="1" id="t18">
                  </div>
               
                <div class="col-md-6">
                  <label for="exampleInputTit1e">{{ __('adminstaticword.QuizReattempt') }}:</label>
                    <li class="tg-list-item">              
                      <input class="la-admin__toggle-switch" id="111" type="checkbox" name="quiz_again"  >
                      <label class="la-admin__toggle-label" data-tg-off="Disable" data-tg-on="Enable" for="111"></label>
                    </li>
                    <input type="hidden" name="free" value="0" for="status" id="13">
                </div>
              </div>
                <br>
        
                <div class="box-footer">
                  <button type="submit" value="Add Answer" class="btn btn-md col-md-4 btn-primary"> {{ __('adminstaticword.Save') }}</button>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--Model close -->    
</section>
