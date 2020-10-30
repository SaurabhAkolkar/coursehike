<section class="content">
 
    <div class="row">
      <div class="col-md-12">
        <div class="text-right">
            <a data-toggle="modal" data-target="#add_resource" href="#" class="btn btn-info btn-sm">+ {{ __('adminstaticword.Add') }} Resource</a>
        </div><br/>
  
          <table id="example1" class="table table-bordered table-striped db">
            <thead>
              <tr>
                <th></th>
                <th>Resource ID</th>
                <th>Resource Name</th>
                <th>{{ __('adminstaticword.Edit') }}</th>
                <th>{{ __('adminstaticword.Delete') }}</th>
              </tr>
            </thead>

            <tbody id="sortable">
                <tr class="sortable row1" data-id="">
                    <td> <span class="la-icon la-icon--4xl icon-pdf" style="color:#FF7474;"></span></td>
                    <td>01</td>
                    <td>Tatto Art</td>
                    <td>
                      <a class="btn btn-success btn-sm" href="" ><i class="la-icon la-icon--lg icon-edit"></i></a>
                    </td> 
                    <td>
                      <form  method="post" action="" data-parsley-validate class="form-horizontal form-label-left">
                        <button  type="submit" class="btn btn-danger btn-sm"><i class="la-icon la-icon--lg icon-delete"></i></button>
                      </form>
                    </td>
                </tr>
            </tbody>
          </table>
      </div>
    </div>

    <!-- ADD RESOUCE MODAL: START -->
  <div class="modal fade show" id="add_resource" role="dialog" aria-labelledby="add_modal">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header d-block">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h3 class="modal-title" id="add_modal">{{ __('adminstaticword.Add') }} File</h3>
        </div>
        <div class="box box-primary">
          <div class="panel panel-sum">
              <div class="modal-body">
                <form enctype="multipart/form-data"  id="" method="post" action="">
                    <div class="row">
                        <div class="col-md-12 mt-4">
                            <label >File Name:<sup class="redstar">*</sup></label>
                            <input type="text" class="form-control" name="add_name" placeholder="Enter File Name">
                        </div>

                        <div class="col-md-12 mt-4">
                            <div class="la-admin__preview la-admin__course-imgvid">
                                <label for="add_file" class="la-admin__preview-label p-0">Upload File:<sup class="redstar">*</sup></label>
                                <div class="la-admin__preview-img" >
                                     <div class="la-admin__preview-text">
                                        <p></p>
                                        <p class="la-admin__preview-file la-admin__preview-filebg text-uppercase">Choose a File</p>
                                    </div>
                                    <div class="la-admin__preview-icon text-center mr-10">
                                        <span class="la-icon la-icon--8xl icon-pdf" style="font-size:120px;color:#E8E8E8;"></span>
                                    </div>
                                    <input type="file" class="form-control la-admin__preview-input preview_img" name="add_file" id="add_file" />
                                </div>
                              </div>
                        </div>

                        <div class="col-md-12 mt-10">
                            <button class="btn btn-primary col-md-4">Save</button>
                        </div>
                    </div> 
                </form>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- ADD RESOURCE MOADAL: END -->


</section>