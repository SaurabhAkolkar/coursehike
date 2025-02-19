<!DOCTYPE html>
<?php
$language = Session::get('changed_language'); //or 'english' //set the system language
$rtl = array('ar','he','ur', 'arc', 'az', 'dv', 'ku'); //make a list of rtl languages

$global_settings = App\Setting::first();
?>

<html class="no-js" lang="en" @if (in_array($language,$rtl)) dir="rtl" @endif>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title') | {{ $global_settings->project_title }}</title>
  <!-- Tell the browser to be
   to screen width -->


  <meta name="description" content="{{ $global_settings->meta_data_desc }}">
  <meta name="keywords" content="{{ $global_settings->meta_data_keyword }}">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{url('css/dashboard/bootstrap.min.css')}}"> <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ url('css/datepicker.css') }}">
  <link rel="icon" type="image/icon" href="{{ asset('images/favicon/favicon.svg') }}"> <!-- favicon-icon -->
  <link rel="stylesheet" href="{{ url('css/dashboard/select2.min.css') }}"> <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url('css/dashboard/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{ url('css/fontawesome-iconpicker.min.css') }}">
  <link rel="stylesheet" href="{{url('css/dashboard/jquery-ui.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{url('css/dashboard/ionicons.min.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{url('css/dashboard/dataTables.bootstrap.min.css')}}"> <!-- Theme style -->
  <link rel="stylesheet" href="{{url('css/dashboard/bootstrap-datepicker.min.css')}}">
  <?php
  $language = Session::get('changed_language'); //or 'english' //set the system language
  $rtl = array('ar','he','ur', 'arc', 'az', 'dv', 'ku'); //make a list of rtl languages
  ?>
  @if (in_array($language,$rtl))
  <link rel="stylesheet" href="{{url('css/dashboard/AdminLTE-rtl.min.css')}}">  <!-- adminLTE RTL  style -->
  @else
  <link rel="stylesheet" href="{{url('css/dashboard/AdminLTE.min.css')}}">
  @endif

  <link rel="stylesheet" href="{{url('css/toggle.css')}}">
  <link rel="stylesheet" type="text/css" href="{{url('css/component.css')}}">
  <link rel="stylesheet" type="text/css" href="{{url('css/normalize.css')}}">
  <link rel="stylesheet" href="{{ URL::asset('css/dashboard/pace.min.css') }}">
  <link rel="stylesheet" href="{{url('css/dashboard/_all-skins.min.css')}}">
  <link href="{{url('css/dashboard/bootstrap-toggle.min.css')}}">
  <link rel="stylesheet" href="{{ url('css/animate.min.css') }}"><!-- Custom Css -->
  @if (in_array($language,$rtl))
  <link rel="stylesheet" href="{{ url('css/dashboard/admin-rtl.css') }}">
  @else
  <link rel="stylesheet" href="{{ url('css/dashboard/admin-creator.css') }}">
  <link rel="stylesheet" href="{{ url('css/dashboard/admin.css') }}">
  @endif
  <link rel="stylesheet" href="{{ asset('css/custom-style.css') }}"/>

  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->

  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">
  <link rel="stylesheet" href="{{ url('css/dashboard/flaticon.css') }}" /> <!-- fontawesome css -->

  @yield('stylesheets')

</head>

<body class="hold-transition skin-blue sidebar-mini fixed">
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="{{ url('/') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">
        <img title="{{ $global_settings->project_title }}" width="50px" src="{{ url('images/logo/'.$global_settings->logo) }}" alt=""/>
      </span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"> <img title="{{ $global_settings->project_title }}" width="60px" src="{{ url('images/logo/'.$global_settings->logo) }}" alt=""/></span>
    </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-fixed-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav d-inline-block mx-lg-10">
            <!-- Messages: style can be found in dropdown.less-->
            @php
                $languages = App\Language::all();
            @endphp
            <li class="dropdown admin-nav language">
            <!-- <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><i class="fa fa-globe"></i> {{Session::has('changed_language') ? Session::get('changed_language') : ''}}</button> -->

              <ul class="dropdown-menu animated flipInX">
                @if (isset($languages) && count($languages) > 0)
                  @foreach ($languages as $language)
                    <li><a href="{{ route('languageSwitch', $language->local) }}">{{$language->name}} ({{$language->local}}) </a></li>
                  @endforeach
                @endif
              </ul>

            </li>
            <!-- User Account: style can be found in dropdown.less -->
            <li><a href="{{ url('/') }}" target="_blank" class="visit site" >{{ __('adminstaticword.VisitSite') }}</a></li>

            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                @if(Auth::User()->user_img != null || Auth::User()->user_img !='')
                  <img width="25" height="25" src="{{ Auth::User()->user_img}}" class="user-image" alt="">
                @else
                  <img width="25" height="25" src="{{ asset('images/default/user.jpg')}}" class="user-image" alt="">
                @endif
                <span class="hidden-xs">Hi ! {{ Auth::User()->fname }}</span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  @if(Auth::User()->user_img != null || Auth::User()->user_img !='')
                    <img width="90" height="90" src="{{ Auth::User()->user_img }}" class="img-circle" alt="User Image">
                  @else
                    <img src="{{ asset('images/default/user.jpg')}}" class="img-circle" alt="User Image">
                  @endif
                  <br>
                  <p>
                   {{Auth::User()->fname}}
                    <small>{{ __('adminstaticword.MemberSince') }}: {{ date('jS F Y',strtotime( Auth::User()->created_at))}}</small>
                  </p>

                </li>

                <li class="user-footer">
                  <div class="pull-left">
                    <a href="{{ url('user/edit/'.Auth::User()->id)}}" class="btn-small">{{ __('adminstaticword.Profile') }}</a>
                  </div>
                  <div class="pull-right">

                    <a class="btn-small" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('adminstaticword.Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                    </form>
                  </div>
                </li>
              </ul>

            </li>
            <!-- Control Sidebar Toggle Button -->
            {{-- <li>
                 <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
                    {{ __('adminstaticword.Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>
            </li> --}}
          </ul>
        </div>
      </nav>
    </header>

    <!-- Left side column. contains the logo and sidebar -->
    @if(Auth::User()->role == "admin")
      @include('admin.layouts.sidebar')
    @endif
    @if(Auth::User()->role == "mentors")
      @include('instructor.layouts.sidebar')
    @endif

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Main content -->
      @yield('body')

      <!-- Main content end-->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        {{ $global_settings->project_title }} ({{ config('app.version') }})
      </div>
     {{ $global_settings->cpy_txt }}
    </footer>
    <!-- /.control-sidebar -->
    <div class="control-sidebar-bg"></div>
  </div>
  <!-- ./wrapper -->

  <!-- jQuery 3 -->
  <script src="{{url('js/jquery.min.js')}}"></script>
  <script src="{{ url('js/select2.min.js')}}"></script>
  <script src="{{ asset('/installer/js/jquery.validate.min.js') }} "></script>
  <script src="https://unpkg.com/@popperjs/core@2"></script>
  <!-- Bootstrap 3.3.7 -->


  <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />


  <script src="{{url('js/dashboard/bootstrap.min.js')}}"></script> <!-- DataTables -->
  <script src="{{url('js/dashboard/jquery.dataTables.min.js')}}"></script>
  <script src="{{url('js/dashboard/dataTables.bootstrap.min.js')}}"></script> <!-- SlimScroll -->
  <script src="{{url('js/dashboard/jquery.slimscroll.min.js')}}"></script> <!-- FastClick -->
  <script src="{{url('js/dashboard/fastclick.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{url('js/dashboard/adminlte.min.js')}}"></script> <!-- AdminLTE for demo purposes -->
  <script src="{{url('js/dashboard/demo.js')}}"></script>
  <script src="{{ URL::asset('js/dashboard/pace.min.js') }}"></script>
  <!-- PACE -->
  <script src="{{ URL::asset('js/dashboard/ckeditor/ckeditor.js') }}"></script>
  <!-- CK Editor -->
  <script src="{{ URL::asset('js/dashboard/bootstrap-datepicker.min.js')}}"></script> <!-- bootstrap datepicker -->
  <script src="{{ url('js/jquery-ui.js')}}"></script>
  <script src="{{ url('js/custom-toggle.js') }}"></script>
  <script src="{{ url('js/custom-file-input.js')}}"></script>
  <script src="{{ url('js/fontawesome-iconpicker.js')}}"></script>
  <script src="{{ url('js/dashboard/courseclass.js')}}"></script>

  <script src="{{ url('js/tinymce.min.js')}}"></script>
  <script src="{{ url('js/dashboard/moment.js') }}"></script>
  <script src="{{ url('js/datepicker.js') }}"></script>
  <script src="{{ url('js/custom-js.js')}}"></script>

  <script src="{{ url('js/dashboard/dataTables.buttons.min.js')}}"></script>
  <script src="{{ url('js/dashboard/buttons.flash.min.js')}}"></script>
  <script src="{{ url('js/dashboard/jszip.min.js')}}"></script>
  <script src="{{ url('js/dashboard/pdfmake.min.js')}}"></script>
  <script src="{{ url('js/dashboard/vfs_fonts.js')}}"></script>
  <script src="{{ url('js/dashboard/buttons.html5.min.js')}}"></script>
  <script src="{{ url('js/dashboard/buttons.print.min.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>



  <!-- page script -->
  <script>
    $(function () {
      var oTable = $('#example1').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        'paging'      : true,
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : true,
        "order": [],
        // "oLanguage": {
      	// "sSearch": "Search Name & Email"
    	// },
      })

    $('.input-daterange input').daterangepicker({
      opens: 'left',
      showDropdowns: true,
      minDate: "02/01/2021",
      applyButtonClasses: "btn-success",
      locale: {
          cancelLabel: 'Clear'
      }
    }, function(start, end, label) {
      minDateFilter = new Date(start.format('YYYY-MM-DD')).getTime();
      maxDateFilter = new Date(end.format('YYYY-MM-DD')).getTime();
      oTable.draw();
    });
  })

  // Date range filter
  minDateFilter = "";
  maxDateFilter = "";

  // Extend dataTables search
  $.fn.dataTableExt.afnFiltering.push(
    function(oSettings, aData, iDataIndex) {
      if (typeof aData._date == 'undefined' || isNaN(aData._date)) {
        aData._date = new Date(aData[DateTableColumn]).getTime();
      }

      if (minDateFilter && !isNaN(minDateFilter)) {
        if (aData._date < minDateFilter) {
          return false;
        }
      }
      if (maxDateFilter && !isNaN(maxDateFilter)) {
        if (aData._date > maxDateFilter) {
          return false;
        }
      }
      return true;
    }
  );

  </script>

  <script>
    $(document).ready(function() {
      $('#example2').DataTable( {
          dom: 'Bfrtip',
          buttons: [
              'copy', 'csv', 'excel', 'pdf', 'print'
          ],
          'paging'      : true,
          'lengthChange': true,
          'searching'   : true,
          'ordering'    : true,
          'info'        : true,
          'autoWidth'   : true
      });
    });
  </script>

  <script>
  (function($) {
    "use strict";
    tinymce.init({
      mode : "specific_textareas",
      editor_selector : "myTextEditor",
      plugins: 'table,textcolor,image,lists,link,code,wordcount,advlist, autosave',
      theme: 'modern',
      menubar: 'none',
      height : '300',
      toolbar: 'restoredraft,bold italic underline | fontselect |  fontsizeselect | forecolor backcolor |alignleft aligncenter alignright alignjustify| bullist,numlist | link image'
    });

    })();
  </script>

  <script>
    window.setTimeout(function(){
      $(".alert").fadeTo(300,0).slideUp(500, function(){
        $(this).remove();
      });
    },2000);
  </script>

  <script>
    $(function(){
      $('.icp-auto').iconpicker();
    });
  </script>

  <script>

    $(function () {
      $('.action-destroy').on('click', function () {
        $.iconpicker.batch('.icp.iconpicker-element', 'destroy');
      });
      $(document).on('click', '.action-placement', function (e) {
        $('.action-placement').removeClass('active');
        $(this).addClass('active');
        $('.icp-opts').data('iconpicker').updatePlacement($(this).text());
        e.preventDefault();
        return false;
      });
      $('.action-create').on('click', function () {
        $('.icp-auto').iconpicker();

        $('.icp-dd').iconpicker({

        });
        $('.icp-opts').iconpicker({
          title: 'With custom options',
          icons: [
            {
              title: "fab fa-github",
              searchTerms: ['repository', 'code']
            },
            {
              title: "fas fa-heart",
              searchTerms: ['love']
            },
            {
              title: "fab fa-html5",
              searchTerms: ['web']
            },
            {
              title: "fab fa-css3",
              searchTerms: ['style']
            }
          ],
          selectedCustomClass: 'label label-success',
          mustAccept: true,
          placement: 'bottomRight',
          showFooter: true,
          // note that this is ignored cause we have an accept button:
          hideOnSelect: true,
          // fontAwesome5: true,
          templates: {
            footer: '<div class="popover-footer">' +
            '<div style="text-align:left; font-size:12px;">Placements: \n\
            <a href="#" class=" action-placement">inline</a>\n\
            <a href="#" class=" action-placement">topLeftCorner</a>\n\
            <a href="#" class=" action-placement">topLeft</a>\n\
            <a href="#" class=" action-placement">top</a>\n\
            <a href="#" class=" action-placement">topRight</a>\n\
            <a href="#" class=" action-placement">topRightCorner</a>\n\
            <a href="#" class=" action-placement">rightTop</a>\n\
            <a href="#" class=" action-placement">right</a>\n\
            <a href="#" class=" action-placement">rightBottom</a>\n\
            <a href="#" class=" action-placement">bottomRightCorner</a>\n\
            <a href="#" class=" active action-placement">bottomRight</a>\n\
            <a href="#" class=" action-placement">bottom</a>\n\
            <a href="#" class=" action-placement">bottomLeft</a>\n\
            <a href="#" class=" action-placement">bottomLeftCorner</a>\n\
            <a href="#" class=" action-placement">leftBottom</a>\n\
            <a href="#" class=" action-placement">left</a>\n\
            <a href="#" class=" action-placement">leftTop</a>\n\
            </div><hr></div>'
          }
        }).data('iconpicker').show();
      }).trigger('click');


      $('.icp').on('iconpickerSelected', function (e) {
        $('.lead .picker-target').get(0).className = 'picker-target fa-3x ' +
          e.iconpickerInstance.options.iconBaseClass + ' ' +
          e.iconpickerInstance.options.fullClassFormatter(e.iconpickerValue);
      });
    });

  </script>

  <script>
    $('#datepicker').datepicker({
      autoclose: true,
      changeYear: true,
    })
  </script>

  <script>
    $(function(){
      $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
          localStorage.setItem('activeTab', $(e.target).attr('href'));
      });
      var activeTab = localStorage.getItem('activeTab');
      if(activeTab){
          $('#nav-tab a[href="' + activeTab + '"]').tab('show');
      }
    });
  </script>

  <script>
    $(function() {
        $('form').attr('autocomplete','off');
    });
  </script>

  <script>
    $(function() {
      $('.js-example-basic-single').select2(
        {
          tags: true,
          tokenSeparators: [',', ' ']
        });
    });
  </script>

  @if($global_settings->rightclick=='1')
    <script>
      (function($) {
        "use strict";
          $(function() {
            $(document).on("contextmenu",function(e) {
               return false;
            });
        });
      })(jQuery);
    </script>
  @endif
  @if($global_settings->inspect=='1')
    <script>
      (function($) {
      "use strict";
           document.onkeydown = function(e) {
          if(event.keyCode == 123) {
             return false;
          }
          if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
             return false;
          }
          if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
             return false;
          }
          if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
             return false;
          }
          if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
             return false;
          }
        }
      })(jQuery);


    </script>

  @endif

@yield('scripts')
@yield('script')

<script>

  $("form[name='announcement_form']").validate({

      // Specify validation rules
      rules: {
        // The key name on the left side is the name attribute
        // of an input field. Validation rules are defined
        // on the right side
        announcement_title: "required",
        announcement_short: "required",
        announcement_long: "required",
        announcement_category: "required",
        preview_image: {
              extension: "jpg|jpeg|png",
        },
        preview_video: {
          extension: "mp4",
        }
      },
      // Specify validation error messages
      messages: {
        announcement_title: "Please enter title.",
        announcement_short: "Please enter Short Description.",
        announcement_long : "Please enter long Decription.",
        announcement_category : "Please select category.",
        preview_image : "Preview Image should be of jpg, jpeg, png type.",
        preview_video : "Preview Video Should be of .mp4 format.",
      },
      // Make sure the form is submitted to the destination defined
      // in the "action" attribute of the form when valid
      submitHandler: function(form) {
        form.submit();
      }

    });
</script>
</body>
</html>
