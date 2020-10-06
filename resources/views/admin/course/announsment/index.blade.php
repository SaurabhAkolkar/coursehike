<section class="content">
 
  <div class="row">
    <div class="col-md-12">
      <div class="text-right">
        <a data-toggle="modal" data-target="#myModalabcdef" href="#" class="btn btn-info btn-sm">+ {{ __('adminstaticword.Add') }} {{ __('adminstaticword.Announcement') }}</a>
      </div>
      <br>
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>{{ __('adminstaticword.Course') }}</th>
              <th>{{ __('adminstaticword.Announcement') }}</th>
              <th>{{ __('adminstaticword.Status') }}</th>
              <th>{{ __('adminstaticword.Edit') }}</th>
              <th>{{ __('adminstaticword.Delete') }}</th>
            </tr>
          </thead>
          <tbody>
            <?php $i=0;?>
            @foreach($cor->announsment as $an)
              <tr>
                <?php $i++;?>
                <td><?php echo $i;?></td>
                <td>{{$an->courses->title}}</td>
                <td>{{ str_limit($an->announsment, $limit = 70, $end = '....')}}</td> 
                <td>
                  @if($an->status==1)
                   {{ __('adminstaticword.Active') }}
                  @else
                    {{ __('adminstaticword.Deactive') }}
                  @endif
                </td>
            
                <td>
                  <a class="btn btn-success btn-sm" href="{{url('announsment/'.$an->id)}}"><i class="fa fa-edit"></i></a>
                </td> 

                <td>
                  <form  method="post" action="{{url('announsment/'.$an->id)}}" ata-parsley-validate class="form-horizontal form-label-left">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}

                    <button  type="submit" class="btn btn-danger"><i class="fa fa-fw fa-trash-o"></i></button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
    </div>
  </div>

  <!--Model start-->
  <div class="modal fade show" id="myModalabcdef" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header d-block">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">{{ __('adminstaticword.Add') }} {{ __('adminstaticword.Announcement') }}</h4>
        </div>
        <div class="box box-primary">
          <div class="panel panel-sum">
            <div class="modal-body">
              <form id="demo-form2" method="post" action="{{ route('announsment.store') }}" data-parsley-validate class="form-horizontal form-label-left">
                {{ csrf_field() }}
                          
               
                <label class="display-none" for="exampleInputSlug"> {{ __('adminstaticword.Course') }}<span class="required" >*</span></label>
                <select name="course_id" class="form-control display-none">
                  <option value="{{ $cor->id }}">{{ $cor->title }}</option>
                </select>
            
                <label class="display-none"  for="exampleInputTit1e">{{ __('adminstaticword.User') }}</label>

                <select class="display-none" name="user_id" class="form-control col-md-7 col-12">
                  @php
                   $users = App\User::all();
                  @endphp

                  @foreach($users as $us)
                  <option value="{{$us->id}}">{{$us->fname}}</option>
                  @endforeach
                </select>
                
                <div class="row pt-4">
                  <div class="col-md-12">
                    <label for="exampleInputDetails">{{ __('adminstaticword.Announcement') }}:<sup class="redstar">*</sup></label>
                    <textarea name="announsment" rows="3" class="form-control" placeholder="Enter Your announsment"></textarea>
                  </div>
                </div>
                <br>

                <div class="row">
                  <div class="col-md-12">
                    <label for="exampleInputDetails">{{ __('adminstaticword.Status') }}:</label>
                    <li class="tg-list-item">
                      <input class="la-admin__toggle-switch" id="uuuu"  type="checkbox"/>
                      <label class="la-admin__toggle-label" data-tg-off="Deactive" data-tg-on="Active" for="uuuu"></label>
                    </li>
                    <input type="hidden" name="status" value="1" id="uuuuu">
                  </div>
                </div>
                <br>
          
                <div class="box-footer">
                  <button type="submit" class="btn btn-md col-md-6 btn-primary">{{ __('adminstaticword.Submit') }}</button>
                </div>
             
            </form>
          </div>
        </div>
      </div>

     <!--Model close -->    

</section> 
