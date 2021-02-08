<!DOCTYPE html>
<?php
$language = Session::get('changed_language'); //or 'english' //set the system language
$rtl = array('ar','he','ur', 'arc', 'az', 'dv', 'ku'); //make a list of rtl languages

$global_settings = App\Setting::first();
?>

<html class="no-js" lang="en" <?php if(in_array($language,$rtl)): ?> dir="rtl" <?php endif; ?>>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $__env->yieldContent('title'); ?> | <?php echo e($global_settings->project_title); ?></title>
  <!-- Tell the browser to be 
   to screen width -->

 
  <meta name="description" content="<?php echo e($global_settings->meta_data_desc); ?>">
  <meta name="keywords" content="<?php echo e($global_settings->meta_data_keyword); ?>">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo e(url('css/dashboard/bootstrap.min.css')); ?>"> <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo e(url('css/datepicker.css')); ?>">
  <link rel="icon" type="image/icon" href="<?php echo e(asset('images/favicon/favicon.svg')); ?>"> <!-- favicon-icon -->
  <link rel="stylesheet" href="<?php echo e(url('css/dashboard/select2.min.css')); ?>"> <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo e(url('css/dashboard/font-awesome.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(url('css/fontawesome-iconpicker.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(url('css/dashboard/jquery-ui.css')); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo e(url('css/dashboard/ionicons.min.css')); ?>">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo e(url('css/dashboard/dataTables.bootstrap.min.css')); ?>"> <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo e(url('css/dashboard/bootstrap-datepicker.min.css')); ?>">
  <?php
  $language = Session::get('changed_language'); //or 'english' //set the system language
  $rtl = array('ar','he','ur', 'arc', 'az', 'dv', 'ku'); //make a list of rtl languages
  ?>
  <?php if(in_array($language,$rtl)): ?>
  <link rel="stylesheet" href="<?php echo e(url('css/dashboard/AdminLTE-rtl.min.css')); ?>">  <!-- adminLTE RTL  style -->
  <?php else: ?>
  <link rel="stylesheet" href="<?php echo e(url('css/dashboard/AdminLTE.min.css')); ?>">
  <?php endif; ?>
  
  <link rel="stylesheet" href="<?php echo e(url('css/toggle.css')); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo e(url('css/component.css')); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo e(url('css/normalize.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(URL::asset('css/dashboard/pace.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(url('css/dashboard/_all-skins.min.css')); ?>">
  <link href="<?php echo e(url('css/dashboard/bootstrap-toggle.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(url('css/animate.min.css')); ?>"><!-- Custom Css -->
  <?php if(in_array($language,$rtl)): ?>
  <link rel="stylesheet" href="<?php echo e(url('css/dashboard/admin-rtl.css')); ?>">
  <?php else: ?>
  <link rel="stylesheet" href="<?php echo e(url('css/dashboard/admin-creator.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(url('css/dashboard/admin.css')); ?>">
  <?php endif; ?>
  <link rel="stylesheet" href="<?php echo e(asset('css/custom-style.css')); ?>"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">
  <link rel="stylesheet" href="<?php echo e(url('css/dashboard/flaticon.css')); ?>" /> <!-- fontawesome css -->

  <?php echo $__env->yieldContent('stylesheets'); ?>
  
</head>

<body class="hold-transition skin-blue sidebar-mini fixed">
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="<?php echo e(url('/')); ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">
        <img title="<?php echo e($global_settings->project_title); ?>" width="60px" src="<?php echo e(url('images/logo/'.$global_settings->logo)); ?>" alt=""/>
      </span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"> <img title="<?php echo e($global_settings->project_title); ?>" width="100px" src="<?php echo e(url('images/logo/'.$global_settings->logo)); ?>" alt=""/></span>
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
          <ul class="nav navbar-nav d-inline-block mx-10">
            <!-- Messages: style can be found in dropdown.less-->
            <?php
                $languages = App\Language::all(); 
            ?>
            <li class="dropdown admin-nav language">
            <!-- <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><i class="fa fa-globe"></i> <?php echo e(Session::has('changed_language') ? Session::get('changed_language') : ''); ?></button> -->

              <ul class="dropdown-menu animated flipInX">
                <?php if(isset($languages) && count($languages) > 0): ?>
                  <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><a href="<?php echo e(route('languageSwitch', $language->local)); ?>"><?php echo e($language->name); ?> (<?php echo e($language->local); ?>) </a></li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
              </ul>
              
            </li>
            <!-- User Account: style can be found in dropdown.less -->
            <li><a href="<?php echo e(url('/')); ?>" target="_blank" class="visit site" ><?php echo e(__('adminstaticword.VisitSite')); ?></a></li>

            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <?php if(Auth::User()->user_img != null || Auth::User()->user_img !=''): ?>
                  <img width="25" height="25" src="<?php echo e(Auth::User()->user_img); ?>" class="user-image" alt="">
                <?php else: ?>
                  <img width="25" height="25" src="<?php echo e(asset('images/default/user.jpg')); ?>" class="user-image" alt="">
                <?php endif; ?>
                <span class="hidden-xs">Hi ! <?php echo e(Auth::User()->fname); ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <?php if(Auth::User()->user_img != null || Auth::User()->user_img !=''): ?>
                    <img width="90" height="90" src="<?php echo e(Auth::User()->user_img); ?>" class="img-circle" alt="User Image">
                  <?php else: ?>
                    <img src="<?php echo e(asset('images/default/user.jpg')); ?>" class="img-circle" alt="User Image">
                  <?php endif; ?>
                  <br>
                  <p>
                   <?php echo e(Auth::User()->fname); ?>

                    <small><?php echo e(__('adminstaticword.MemberSince')); ?>: <?php echo e(date('jS F Y',strtotime( Auth::User()->created_at))); ?></small>
                  </p>
                  
                </li>

                <li class="user-footer">
                  <div class="pull-left">
                    <a href="<?php echo e(url('user/edit/'.Auth::User()->id)); ?>" class="btn-small"><?php echo e(__('adminstaticword.Profile')); ?></a>
                  </div>
                  <div class="pull-right">

                    <a class="btn-small" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <?php echo e(__('adminstaticword.Logout')); ?>

                    </a>

                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                    </form>
                  </div>
                </li>
              </ul>

            </li>
            <!-- Control Sidebar Toggle Button -->
            
          </ul>
        </div>
      </nav>
    </header>

    <!-- Left side column. contains the logo and sidebar -->
    <?php if(Auth::User()->role == "admin"): ?>
      <?php echo $__env->make('admin.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <?php if(Auth::User()->role == "mentors"): ?>
      <?php echo $__env->make('instructor.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Main content -->
      <?php echo $__env->yieldContent('body'); ?>
      <!-- Main content end-->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <?php echo e($global_settings->project_title); ?> (<?php echo e(config('app.version')); ?>)
      </div>
     <?php echo e($global_settings->cpy_txt); ?> 
    </footer>
    <!-- /.control-sidebar -->
    <div class="control-sidebar-bg"></div>
  </div>
  <!-- ./wrapper -->

  <!-- jQuery 3 -->
  <script src="<?php echo e(url('js/jquery.min.js')); ?>"></script>
  <script src="<?php echo e(url('js/select2.min.js')); ?>"></script>
  <script src="<?php echo e(asset('/installer/js/jquery.validate.min.js')); ?> "></script>
  <script src="https://unpkg.com/@popperjs/core@2"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?php echo e(url('js/dashboard/bootstrap.min.js')); ?>"></script> <!-- DataTables -->
  <script src="<?php echo e(url('js/dashboard/jquery.dataTables.min.js')); ?>"></script>
  <script src="<?php echo e(url('js/dashboard/dataTables.bootstrap.min.js')); ?>"></script> <!-- SlimScroll -->
  <script src="<?php echo e(url('js/dashboard/jquery.slimscroll.min.js')); ?>"></script> <!-- FastClick -->
  <script src="<?php echo e(url('js/dashboard/fastclick.js')); ?>"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo e(url('js/dashboard/adminlte.min.js')); ?>"></script> <!-- AdminLTE for demo purposes -->
  <script src="<?php echo e(url('js/dashboard/demo.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('js/dashboard/pace.min.js')); ?>"></script> 
  <!-- PACE -->
  <script src="<?php echo e(URL::asset('js/dashboard/ckeditor/ckeditor.js')); ?>"></script>
  <!-- CK Editor -->
  <script src="<?php echo e(URL::asset('js/dashboard/bootstrap-datepicker.min.js')); ?>"></script> <!-- bootstrap datepicker -->
  <script src="<?php echo e(url('js/jquery-ui.js')); ?>"></script>
  <script src="<?php echo e(url('js/custom-toggle.js')); ?>"></script>
  <script src="<?php echo e(url('js/custom-file-input.js')); ?>"></script>
  <script src="<?php echo e(url('js/fontawesome-iconpicker.js')); ?>"></script>
  <script src="<?php echo e(url('js/dashboard/courseclass.js')); ?>"></script>
   
  <script src="<?php echo e(url('js/tinymce.min.js')); ?>"></script>
  <script src="<?php echo e(url('js/dashboard/moment.js')); ?>"></script>
  <script src="<?php echo e(url('js/datepicker.js')); ?>"></script>
  <script src="<?php echo e(url('js/custom-js.js')); ?>"></script>

  <script src="<?php echo e(url('js/dashboard/dataTables.buttons.min.js')); ?>"></script> 
  <script src="<?php echo e(url('js/dashboard/buttons.flash.min.js')); ?>"></script> 
  <script src="<?php echo e(url('js/dashboard/jszip.min.js')); ?>"></script>
  <script src="<?php echo e(url('js/dashboard/pdfmake.min.js')); ?>"></script>
  <script src="<?php echo e(url('js/dashboard/vfs_fonts.js')); ?>"></script>
  <script src="<?php echo e(url('js/dashboard/buttons.html5.min.js')); ?>"></script>
  <script src="<?php echo e(url('js/dashboard/buttons.print.min.js')); ?>"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

 
  
  <!-- page script -->
  <script>
    $(function () {
      $('#example1').DataTable({
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
      })
    }) 
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

  <?php if($global_settings->rightclick=='1'): ?>
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
  <?php endif; ?>
  <?php if($global_settings->inspect=='1'): ?>
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

  <?php endif; ?>

<?php echo $__env->yieldContent('scripts'); ?>
<?php echo $__env->yieldContent('script'); ?>

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
<?php /**PATH E:\lila-laravel\resources\views/admin/layouts/master.blade.php ENDPATH**/ ?>