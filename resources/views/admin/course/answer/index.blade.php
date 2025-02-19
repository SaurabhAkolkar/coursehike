<section class="content">
  <div class="row">
    <div class="col-12">
        <div class="text-right">
           <a data-toggle="modal" data-target="#myModalanswer" href="#" class="btn btn-info btn-sm">+ {{ __('adminstaticword.AddAnswer') }}</a>
        </div><br/>
       
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <th>#</th>
            <th>{{ __('adminstaticword.Question') }}</th>
            <th>{{ __('adminstaticword.Answer') }}</th>
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
            	<td>{{$ans->question->question}}</td>
            	<td>{{$ans->answer}}</td> 
            <td>
                @if($ans->status==1)
                  {{ __('adminstaticword.Active') }}
                @else
                  {{ __('adminstaticword.Deactive') }}
                @endif	                    
            </td>
            
            <td>
              <a class="px-0 text-dark btn btn-success la-admin__edit-btn" href="{{route('courseanswer.edit',$ans->id)}}"><i class="la-icon la-icon--lg icon-edit"></i></a>
            </td>

            <td><form  method="post" action="{{url('courseanswer/'.$ans->id)}}
                "data-parsley-validate class="form-horizontal form-label-left">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                  <button  type="submit" class="btn btn-danger"><i class="la-icon la-icon--lg icon-delete"></i></button>
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
  <div class="modal fade show" id="myModalanswer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header d-block">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel"> {{ __('adminstaticword.Add') }} {{ __('adminstaticword.Answer') }}</h4>
        </div>
        <div class="box box-primary">
          <div class="panel panel-sum">
            <div class="modal-body">
              <form id="demo-form2" method="post" action="{{url('courseanswer/')}}" data-parsley-validate class="form-horizontal form-label-left">
                {{ csrf_field() }}
               
                <input type="hidden" name="instructor_id" class="form-control" value="{{ Auth::User()->id }}"  />
                <input type="hidden" name="ans_user_id" value="{{Auth::user()->id}}" />
           
                <div class="row">
                  <div class="col-md-12">
                    <label  for="exampleInputTit1e">{{ __('adminstaticword.SelectQuestion') }}:<sup class="redstar">*</sup></label>
                    <br>
                    <select style="width: 100%" name="question_id" required class="form-control col-md-7 col-12 js-example-basic-single">
                      <option value="none" selected disabled hidden> 
                       {{ __('adminstaticword.SelectanOption') }}
                      </option>
                      @foreach($questions as $ques)
                        <option value="{{ $ques->id }}">{{ $ques->question}}</option>
                      @endforeach
                    </select>
                  </div>
                  @foreach($questions as $ques)
                  <input type="hidden" name="ques_user_id"  value="{{$ques->user_id}}" />
                  <input type="hidden" name="course_id"  value="{{$ques->course_id}}" />
                  @endforeach
                </div>
                <br>

                <div class="row">
                  <div class="col-md-12">
                    <label for="exampleInput">{{ __('adminstaticword.Answer') }}:<sup class="redstar">*</sup></label>
                    <textarea name="answer" rows="4" class="form-control" placeholder="Please Enter Your Answer"></textarea>
                  </div>
                </div>
                <br>

                <div class="row">
                  <div class="col-md-6">
                    <label for="exampleInputDetails">{{ __('adminstaticword.Status') }}:</label>
                    <li class="tg-list-item">   
                      <input class="la-admin__toggle-switch" id="c12"  type="checkbox"/>
                      <label class="la-admin__toggle-label" data-tg-off="Deactive" data-tg-on="Active" for="c12"></label>
                    </li>
                    <input type="hidden" name="status" value="1" id="t12">
                  </div>
                </div>
                <br>
        
                <div class="box-footer">
                  <button type="submit" value="Add Answer" class="btn btn-md btn-primary col-md-4 ">  {{ __('adminstaticword.Save') }}</button>
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
