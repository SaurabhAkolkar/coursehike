@extends('admin/layouts.master')
@section('title', 'Requests - Instructor')
@section('body')

<div class="box">
  <div class="box-header ml-7 ">
    <h3 class=" la-admin__section-title">Requests</h3>
  </div>
  @if($errors->any())
  <div class="box-body">
    <div class="alert alert-danger">
      <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  </div>   
  @endif 
</div>

<section class="content">
  @include('admin.message')
  <div class="row">
    <div class="col-12">
      <div class="box box-primary">
        <div class="box-body">
          <div class="nav-tabs-custom" >
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" id="nav-tab" role="tablist" style="overflow-x:hidden !important;">
              <li role="presentation" class=""><a href="#pending" aria-controls="home" role="tab" data-toggle="tab">Pending</a></li>
              <li  class=""  role="presentation"><a href="#resolved" aria-controls="settings" role="tab" data-toggle="tab">Resolved</a></li>           
            </ul>

            <!-- Tab panes -->
            <div class="tab-content py-md-8" >

            <!-- PENDING REQUEST TAB: START -->
            <div role="tabpanel" class="tab-pane fadein active" id="pending">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Sr#</th>
                            <th>Course Name</th>
                            <th>Request Type</th>
                            <th>Request Date</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 0;
                        @endphp
                        @foreach($publishRequest as $pr)
                          <tr>
                              <td>{{++$i}}</td>
                              <td>
                                  <img src="{{$pr->course->preview_image}}" alt="" />
                              </td>
                              <td>{{$pr->course->title}}</td>
                              <td>@if($pr->request_type == 'publish') Publish Request @else Unpublish Request @endif</td>
                              <td>{{Carbon\Carbon::parse($pr->created_at)->format('d-m-Y')}}</td>

                              <td>
                                  <a class="btn btn-success la-admin__edit-btn" href="/course/create/{{$pr->course_id}}" role="button">
                                      <span class="la-icon la-icon--lg icon-edit" style="color:#000"></span>
                                  </a>
                              </td>

                              <td>
                                  <form  method="post" action="/delete-course-request" data-parsley-validate  class="form-horizontal form-label-left">
                                      @csrf
                                      <input type="hidden" name="request_id" value = "{{$pr->id}}" />
                                      <button  type="submit" class="btn btn-danger mt-1"><span class="la-icon la-icon--lg icon-delete"></span></button>
                                  </form>
                              </td>
                          </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- PENDING REQUEST TAB: END -->



            <!-- RESOLVED REQUEST TAB: START -->
            <div role="tabpanel" class="tab-pane fadein" id="resolved">
                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Sr#</th>
                            <th>Course Name</th>
                            <th>Request Type</th>
                            <th>Request Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 0;
                        @endphp
                        @foreach($publishRequestResolved as $pr)
                          <tr>
                              <td>{{++$i}}</td>
                              <td>
                                  <img src="{{$pr->course->preview_image}}" alt="" />
                              </td>
                              <td>{{$pr->course->title}}</td>
                              <td>@if($pr->request_type == 'publish') Publish Request @else Unpublish Request @endif</td>
                              <td>{{Carbon\Carbon::parse($pr->created_at)->format('d-m-Y')}}</td>
                              <td>Resolved</td>
                          </tr>
                        @endforeach
                    </tbody>
                </table>
              </div>
            </div>
            <!-- PENDING REQUEST TAB: END -->

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection


@section('script')

<script>
(function($) {
"use strict";
  $(document).ready(function(){
    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
        localStorage.setItem('activeTab', $(e.target).attr('href'));
    });
    var activeTab = localStorage.getItem('activeTab');
    if(activeTab){
        $('#nav-tab a[href="' + activeTab + '"]').tab('show');
    }
  });
})(jQuery);
</script>

@endsection
  