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
                  <a class="btn btn-success btn-sm" href="{{url('announcement/'.$an->id)}}"><i class="la-icon la-icon--lg icon-edit"></i></a>
                </td> 

                <td>
                  <form  method="post" action="{{url('announcement/'.$an->id)}}" ata-parsley-validate class="form-horizontal form-label-left">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}

                    <button  type="submit" class="btn btn-danger"><i class="la-icon la-icon--lg icon-delete"></i></button>
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
             <!-- <form id="demo-form2" method="post" action="{{ route('announsment.store') }}" data-parsley-validate class="form-horizontal form-label-left">
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
                    <textarea name="announsment" rows="3" class="form-control" placeholder="Enter Your announcement"></textarea>
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
                  <button type="submit" class="btn btn-md btn-primary  col-md-4">{{ __('adminstaticword.Submit') }}</button>
                </div>
            </form> -->

            
            <form class="la-admin__announce-form" name="announcement-form" action="{{ route('announcement.store') }}" method="post"  enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="course_id" value="{{$cor->id}}" />
              <div class="row">
                <div class="form-group col-md-12">
                    <label for="announcement_title">Title:</label>
                    <input type="text" class="form-control" name="announcement_title" id="announcement_title" placeholder="Enter Title for the announcement">
                </div>

                <div class="form-group col-md-12">
                    <label for="announcement_category">Category:</label>
                    <select name="announcement_category" id="announcement_category" class="form-control js-example-basic-single">
                        <option selected disabled>Select</option>
                        @foreach($categories as $key=>$value)
                            <option value="{{$key}}">{{$value}}</option>
                        @endforeach
                    </select>
                </div>
               
                <div class="form-group col-md-12">
                    <label for="announcement_short">Short Description:</label>
                    <textarea cols="30" rows="4" class="form-control" name="announcement_short" id="announcement_short" placeholder="Short discription on the preview of the announcement"></textarea>
                </div>

                <div class="form-group col-md-12">
                  <label for="announcement_long">Long Description:</label>
                  <textarea id="announcement_long" name="announcement_long" rows="5" class="form-control" placeholder="Long description appear when someone clicks 'Read More'"></textarea>
                </div>
              </div>
               <!-- PREVIEW IMAGE & VIDEO FILES: START -->
               <div class="row">
                <div class="col-md-12">
                      <div class="la-admin__preview">
                        <label for="" class="la-admin__preview-label">{{ __('adminstaticword.PreviewImage') }}:</label>
                        <div class="la-admin__preview-img la-admin__course-imgvid" >
                             <div class="la-admin__preview-text">
                                  <p class="la-admin__preview-size m-0 ">Preview Image size: 250x150</p>
                                  <p class="la-admin__preview-file text-uppercase m-0 ">Choose a File</p>
                            </div>
                            <div class="text-center pr-20 mr-10">
                              <span class="la-icon la-icon--8xl icon-preview-image" style="font-size:160px;">
                                <span class="path1"><span class="path2"></span></span>
                              </span>
                            </div>
                            <input type="file" class="form-control la-admin__preview-input inputfile inputfile-1 preview_img" name="preview_image" id="image" />
                            <img src="" alt="" class="d-none preview-img"/>
                        </div>
                      </div>
                </div>
               
                <div class="col-md-12 mt-md-4">
                      <div class="la-admin__preview">
                        <label for="" class="la-admin__preview-label"> {{ __('adminstaticword.PreviewVideo') }}:</label>
                        <div class="la-admin__preview-video la-admin__course-imgvid">
                            <div class="la-admin__preview-text">
                                  <p class="la-admin__preview-size">Preview video size: 20MB</p>
                                  <p class="text-uppercase la-admin__preview-file">Choose a File</p>
                            </div>
                            <div class="text-center pr-20 mr-10">
                              <span class="la-icon la-icon--8xl icon-preview-video" style="font-size:160px;">
                                <span class="path1"><span class="path2"></span></span>
                              </span>
                            </div>
                            <input type="file" class="form-control la-admin__preview-input preview_video" name="preview_video" />
                            <video controls class="d-none preview-video w-100">
                              <source src="">
                                Your browser does not support HTML5 video.
                            </video>
                        </div>
                      </div>
                </div>
              </div>
               <!-- PREVIEW IMAGE & VIDEO FILES: END -->
               <label class="la-admin__announce-layouts pt-5">Layout:</label> 
               <div class="row">
                  <!-- Layout 1 -->
                  <div class="col-md-12 pb-4">
                    <input type="radio" id="layout1" name="layouts" value="1" class="la-admin__cp-input">
                    <label for="layout1" class="w-100 "> 
                      <div class="la-admin__cp-circle ">
                        <span class="la-admin__cp-radio"></span>
                        <span class="la-admin__cp-label ">Layout 1</span> 
                      </div>

                      <div class="d-flex justify-content-between align-items-start">
                          <div class="col-6 pl-0">
                            <div class="la-admin__announcement-layout text-center">
                              <span class="la-icon la-icon--8xl icon-preview-image mr-18" style="font-size:120px;">
                                <span class="path1"><span class="path2"></span></span>
                              </span>
                            </div>
                          </div>
              
                          <div class="col-6 pr-0">
                            <div class="">
                                <div class="la-admin__layout-title">Title</div>
                                <div class="la-admin__layout-img">
                                  <img src="../../images/announcement/layout_small.svg" class="img-fluid d-block mx-auto" alt="Layout" />
                                  <div class="la-admin__layout-button">
                                    <img src="../../images/announcement/layout_button.svg" class="img-fluid d-block ml-auto" alt="Button" />
                                  </div>
                                </div>
                            </div>
                          </div>
                      </div>
                    </label>
                  </div>

                  <!-- Layout 2 -->
                  <div class="col-md-12 pb-4">
                    <input type="radio" id="layout2" name="layouts" value="2" class="la-admin__cp-input">
                    <label for="layout2" class="w-100"> 
                      <div class="la-admin__cp-circle">
                        <span class="la-admin__cp-radio"></span>
                        <span class="la-admin__cp-label">Layout 2</span> 
                      </div>

                      <div class="d-flex justify-content-between align-items-start">
                          <div class="col-12 p-0">
                              <div class="la-admin__layout-title px-3 mb-1">Title</div>
                              <div class="la-admin__layout-img ">
                                <img src="../../images/announcement/layout_big.svg" class=" py-4 img-fluid d-block mx-auto" alt="Layout" />
                                <div class="la-admin__layout-button">
                                  <img src="../../images/announcement/layout_button.svg" class="py-2 img-fluid d-block ml-auto" alt="Button" />
                                </div>
                              </div>
                          </div>
                      </div>
                    </label>
                  </div>

                  <!-- Layout 3 -->
                  <div class="col-md-12 pb-4">
                    <input type="radio" id="layout3" name="layouts" value="3" class="la-admin__cp-input">
                    <label for="layout3" class="w-100"> 
                      <div class="la-admin__cp-circle">
                        <span class="la-admin__cp-radio"></span>
                        <span class="la-admin__cp-label">Layout 3</span> 
                      </div>

                      <div class="d-flex justify-content-between align-items-start">
                          <div class="col-12 p-0">
                              <div class="la-admin__layout-title px-3 mb-1">Title</div>
                              <div class="la-admin__layout-img mt-2"><img src="../../images/announcement/layout_line.svg" class="img-fluid d-block mx-auto" alt="Layout" /></div>
                              <div class="la-admin__announcement-layout text-center my-2">
                                <span class="la-icon la-icon--8xl icon-preview-image mr-18" style="font-size:120px;">
                                  <span class="path1"><span class="path2"></span></span>
                                </span>
                              </div>
                              <div class="la-admin__layout-img ">
                                  <img src="../../images/announcement/layout_button.svg" class="p-1 img-fluid d-block ml-auto" alt="Button" />
                              </div>
                          </div>
                      </div>
                    </label>
                  </div>
               </div>

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

               <div class="row box-footer">
                 <div class="col-md-12 px-0">
                  <button type="submit" class="btn btn-md btn-primary col-md-4 mx-2">POST</button>
                 </div>
              </div>
            </form>
          </div>
        </div>
      </div>

     <!--Model close -->    
</section> 

