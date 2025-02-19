<section class="content">
 
<div class="row">
  <div class="col-md-12">
    <div class="text-right">
      <a data-toggle="modal" data-target="#myModalJ" href="#" class="btn btn-info btn-sm text-right">+ {{ __('adminstaticword.AddCourseInclude') }}</a>
    </div><br/>
   
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>{{ __('adminstaticword.Course') }}</th>
            <th>{{ __('adminstaticword.Detail') }}</th>
            <th>{{ __('adminstaticword.Status') }}</th>
            <th>{{ __('adminstaticword.Edit') }}</th>
            <th>{{ __('adminstaticword.Delete') }}</th>
          </tr>
        </thead>

        <tbody>
          <?php $i=0;?>
          @foreach($courseinclude as $cat)
            <tr>
              <?php $i++;?>
              <td><?php echo $i;?></td>
              <td>{{$cat->courses->title}}</td>
              <td>{{ strip_tags($cat->detail) }}</td> 
              <td>
                @if($cat->status==1)
                  {{ __('adminstaticword.Active') }}
                @else
                  {{ __('adminstaticword.Deactive') }}
                @endif
                
              </td>
              <td>
                  <a class="btn btn-success btn-sm" href="{{url('courseinclude/'.$cat->id)}}">
                    <i class="la-icon la-icon--lg icon-edit"></i></a>
              </td>              

              <td>
                <form  method="post" action="{{url('courseinclude/'.$cat->id)}}
                     "data-parsley-validate class="form-horizontal form-label-left">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button  type="submit"  class="btn btn-danger"><i class="la-icon la-icon--lg icon-delete"></i></button>
                </form>
              </td>

            </tr>
                   
          @endforeach
                   
                
        </tbody>
      </table>
  </div>
</div>

<!--Model start-->
<div class="modal fade show" id="myModalJ" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header d-block">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title " id="myModalLabel">{{ __('adminstaticword.Add') }} {{ __('adminstaticword.CourseInclude') }}</h4>
      </div>
       <div class="box box-primary">
          <div class="panel panel-sum">
            <div class="modal-body">
              <form id="demo-form2" method="post" action="{{ route('courseinclude.store') }}" data-parsley-validate class="form-horizontal form-label-left">
                {{ csrf_field() }}
     
                <select class="display-none" name="course_id" class="form-control">
                  <option value="{{ $cor->id }}">{{ $cor->title }}</option>
                </select>

                <div class="row">
                  <div class="col-md-12">
                    <label for="exampleInputDetails">{{ __('adminstaticword.Detail') }}:<sup class="redstar">*</sup></label>
                    <textarea rows="2" name="detail" class="form-control" placeholder="Enter Your Detail"></textarea>
                  </div>
                </div>
                <br>

                <div class="col-md-12">
                  <label for="exampleInputDetails">{{ __('adminstaticword.Status') }}:</label>
                  <li class="tg-list-item">              
                    <input class="la-admin__toggle-switch" id="status" type="checkbox" name="status" >
                    <label class="la-admin__toggle-label" data-tg-off="Disable" data-tg-on="Enable" for="status"></label>
                  </li>
                  <input type="hidden"  name="free" value="0" for="status" id="status">
                </div>
                <br>
                <div class="box-footer">
                  <button type="submit" class="btn btn-lg col-md-6 btn-primary">{{ __('adminstaticword.Submit') }}</button>
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


