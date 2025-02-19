<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ url('installer/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('installer/css/shards.min.css') }}">
    <link rel="stylesheet" href="{{ url('installer/css/custom.css') }}">
    <link rel="stylesheet" href="{{url('admin/bower_components/font-awesome/css/font-awesome.min.css')}}">
    <title>Installing App - Server Requirement</title>
    
  </head>
  <body>
    @include('admin.message')
      <div class="preL display-none">
        <div class="preloader3 display-none"></div>
      </div>

   		<div class="container">
   			<div class="card">
          <div class="card-header">
              <h3 class="m-3 text-center text-dark ">
                  Server Requirement
              </h3>
          </div>
   				<div class="card-body" id="stepbox">
               <form autocomplete="off" action="{{ route('store.server') }}" id="step1form" method="POST" class="needs-validation" novalidate>
                  @csrf
                  @php
                    $servercheck= array();
                  @endphp
                  <div class="form-row">
                      <br>
                     <div class="col-md-12">
                        <table class="table table-bordered table-striped">
                          <thead>
                            <tr>
                              <th>php extension</th>
                              <th>Status</th>
                            </tr>
                          </thead>

                          <tbody>

                             <tr>
                                @php
                                  $v = phpversion();
                                @endphp
                              <td>php version (<b>{{ $v }}</b>)</td>
                              <td>
                               
                               @if($v >= 7.1)
                                 
                                 <i class="text-success fa fa-check-circle"></i>
                                 @php
                                   array_push($servercheck, 1);
                                 @endphp
                               @else
                                <i class="text-danger fa fa-times-circle"></i>
                                 <i class="text-success fa fa-times-circle"></i> Require php version is 7.1 or above
                                 @php
                                   array_push($servercheck, 0);
                                 @endphp
                               @endif
                              </td>
                            </tr>

                             <tr>
                              <td>pdo</td>
                              <td>
                               
                                  @if (extension_loaded('pdo'))
                                       
                                    <i class="text-success fa fa-check-circle"></i> 
                                    @php
                                      array_push($servercheck, 1);
                                    @endphp
                                  @else
                                     <i class="text-danger fa fa-times-circle"></i>
                                     @php
                                      array_push($servercheck, 0);
                                     @endphp
                                  @endif
                              </td>
                            </tr>

                             <tr>
                              <td>BCMath</td>
                              <td>
                               
                                  @if (extension_loaded('BCMath'))
                                       
                                    <i class="text-success fa fa-check-circle"></i> 
                                    @php
                                      array_push($servercheck, 1);
                                    @endphp
                                  @else
                                     <i class="text-danger fa fa-times-circle"></i>
                                     @php
                                      array_push($servercheck, 0);
                                     @endphp
                                  @endif
                              </td>
                            </tr>

                             <tr>
                              <td>openssl</td>
                              <td>
                               
                                  @if (extension_loaded('openssl'))
                                       
                                    <i class="text-success fa fa-check-circle"></i> 
                                     @php
                                      array_push($servercheck, 1);
                                    @endphp
                                  @else
                                     <i class="text-danger fa fa-times-circle"></i>
                                     @php
                                      array_push($servercheck, 0);
                                     @endphp
                                  @endif
                              </td>
                            </tr>

                            <tr>
                              <td>json</td>
                              <td>
                               
                                  @if (extension_loaded('json'))
                                       
                                    <i class="text-success fa fa-check-circle"></i> 
                                    @php
                                      array_push($servercheck, 1);
                                    @endphp
                                  @else
                                     <i class="text-danger fa fa-times-circle"></i>
                                     @php
                                      array_push($servercheck, 0);
                                     @endphp
                                  @endif
                              </td>
                            </tr>

                            <tr>
                              <td>session</td>
                              <td>
                               
                                  @if (extension_loaded('session'))
                                       
                                    <i class="text-success fa fa-check-circle"></i> 
                                     @php
                                      array_push($servercheck, 1);
                                    @endphp
                                  @else
                                     <i class="text-danger fa fa-times-circle"></i>
                                     @php
                                      array_push($servercheck, 0);
                                    @endphp
                                  @endif
                              </td>
                            </tr>

                             <tr>
                              <td>gd</td>
                              <td>
                               
                                  @if (extension_loaded('gd'))
                                       
                                    <i class="text-success fa fa-check-circle"></i> 
                                    @php
                                      array_push($servercheck, 1);
                                    @endphp
                                  @else
                                     <i class="text-danger fa fa-times-circle"></i>
                                     @php
                                      array_push($servercheck, 0);
                                     @endphp
                                  @endif
                              </td>
                            </tr>

                            
                            <tr>
                              <td>allow_url_fopen</td>
                              <td>
                               
                                  @if (ini_get('allow_url_fopen'))
                                       
                                    <i class="text-success fa fa-check-circle"></i> 
                                     @php
                                      array_push($servercheck, 1);
                                    @endphp
                                  @else
                                     <i class="text-danger fa fa-times-circle"></i>
                                      @php
                                      array_push($servercheck, 0);
                                     @endphp
                                  @endif
                              </td>
                            </tr>
                            

                             <tr>
                              <td>xml</td>
                              <td>
                               
                                  @if (extension_loaded('xml'))
                                       
                                    <i class="text-success fa fa-check-circle"></i> 
                                     @php
                                      array_push($servercheck, 1);
                                    @endphp
                                  @else
                                     <i class="text-danger fa fa-times-circle"></i>
                                     @php
                                      array_push($servercheck, 0);
                                     @endphp
                                  @endif
                              </td>
                            </tr>

                             <tr>
                              <td>tokenizer</td>
                              <td>
                               
                                  @if (extension_loaded('tokenizer'))
                                       
                                    <i class="text-success fa fa-check-circle"></i> 
                                     @php
                                      array_push($servercheck, 1);
                                    @endphp
                                  @else
                                     <i class="text-danger fa fa-times-circle"></i>
                                     @php
                                      array_push($servercheck, 0);
                                    @endphp
                                  @endif
                              </td>
                            </tr>
                             <tr>
                              <td>standard</td>
                              <td>
                               
                                  @if (extension_loaded('standard'))
                                       
                                    <i class="text-success fa fa-check-circle"></i> 
                                     @php
                                      array_push($servercheck, 1);
                                    @endphp
                                  @else
                                     <i class="text-danger fa fa-times-circle"></i>
                                     @php
                                      array_push($servercheck, 0);
                                    @endphp
                                  @endif
                              </td>
                            </tr>

                            <tr>
                              <td>mysqli</td>
                              <td>
                               
                                  @if (extension_loaded('mysqli'))
                                       
                                    <i class="text-success fa fa-check-circle"></i> 
                                     @php
                                      array_push($servercheck, 1);
                                    @endphp
                                  @else
                                     <i class="text-danger fa fa-times-circle"></i>
                                     @php
                                      array_push($servercheck, 0);
                                    @endphp
                                  @endif
                              </td>
                            </tr>

                            <tr>
                              <td>mbstring</td>
                              <td>
                               
                                  @if (extension_loaded('mbstring'))
                                       
                                    <i class="text-success fa fa-check-circle"></i> 
                                     @php
                                      array_push($servercheck, 1);
                                    @endphp
                                  @else
                                     <i class="text-danger fa fa-times-circle"></i>
                                     @php
                                      array_push($servercheck, 0);
                                    @endphp
                                  @endif
                              </td>
                            </tr>

                             <tr>
                              <td>ctype</td>
                              <td>
                               
                                  @if (extension_loaded('ctype'))
                                       
                                    <i class="text-success fa fa-check-circle"></i> 
                                     @php
                                      array_push($servercheck, 1);
                                    @endphp
                                  @else
                                     <i class="text-danger fa fa-times-circle"></i>
                                     @php
                                      array_push($servercheck, 0);
                                    @endphp
                                  @endif
                              </td>
                            </tr>

                            <tr>
                            <td>fileinfo</td>
                              <td>
                               
                                  @if (extension_loaded('fileinfo'))
                                       
                                    <i class="text-success fa fa-check-circle"></i> 
                                     @php
                                      array_push($servercheck, 1);
                                    @endphp
                                  @else
                                     <i class="text-danger fa fa-times-circle"></i>
                                     @php
                                      array_push($servercheck, 0);
                                     @endphp
                                  @endif
                              </td>
                            
                          </tr>

                          <tr>
                            <td><b>{{storage_path()}}</b> is writable?</td>
                            <td>
                              @php
                                $path = storage_path();
                              @endphp
                              @if(is_writable($path))
                               <i class="text-success fa fa-check-circle"></i> 
                              @else
                                <i class="text-danger fa fa-times-circle"></i>
                              @endif
                            </td>
                          </tr>

                          <tr>
                            <td><b>{{base_path('bootstrap/cache')}}</b> is writable?</td>
                            <td>
                              @php
                                $path = base_path('bootstrap/cache');
                              @endphp
                              @if(is_writable($path))
                                <i class="text-success fa fa-check-circle"></i> 
                              @else
                                <i class="text-danger fa fa-times-circle"></i>
                              @endif
                            </td>
                          </tr>



                          </tbody>
                        </table>
                     </div>
                     
                  </div>
                  @if(!in_array(0, $servercheck))
                    <button class="float-right step1btn btn btn-primary" type="submit">Continue to Installation...</button>
                  @else
                    <p class="pull-right text-danger"><b>Some extension are missing. Contact your host provider for enable it.</b></p>
                  @endif
              </form>
   				</div>
   			</div>
        <p class="text-center m-3 text-white">&copy;{{ date('Y') }} | eClass - Learning Management System | Installer v1.1 | <a class="text-white" href="http://mediacity.co.in">Mediacity</a></p>
   		</div>
      
    <div class="corner-ribbon bottom-right sticky green shadow">Server Check </div>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ url('installer/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ url('installer/js/jquery.validate.min.js') }}"></script>
    <script src="{{ url('installer/js/additional-methods.min.js') }}"></script>
    <script src="{{ url('installer/js/ej.web.all.min.js') }}"></script>
    <script src="{{ url('installer/js/popper.min.js') }}"></script>
    <script src="{{ url('installer/js/bootstrap.min.js') }}"></script>

    <script src="{{ url('installer/js/shards.min.js') }}"></script>
    @yield('script-zone')
    <script>
      
      (function() {
        'use strict';
        window.addEventListener('load', function() {
          var forms = document.getElementsByClassName('needs-validation');
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();

  </script>

  <script>
    (function() {
      'use strict';
        $(function() 
        { 
          $("form").submit(function () {
            if($(this).valid()){
                $('.preL').fadeIn('fast');
                $('.preloader3').fadeIn('fast');
                $('.container').css({ '-webkit-filter':'blur(5px)'});
                $('body').attr('scroll','no');
                $('body').css('overflow','hidden');
              }
          });
        });
      })();
  </script>

</body>
</html>
