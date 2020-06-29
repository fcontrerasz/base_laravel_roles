@include('layouts.menu')
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ AppSettings::get('app_name', 'default value') }}</title>
    
    <link href="{{ asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    
    <link href="{{ asset('css/plugins/blueimp/css/blueimp-gallery.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/plugins/select2/select2.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/plugins/iCheck/custom.css') }}" rel="stylesheet">

    <link href="{{ asset('css/plugins/toastr/toastr.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/plugins/jasny/jasny-bootstrap.min.css') }}" rel="stylesheet">

    <script src="{{ asset('js/jquery-2.1.1.js') }}"></script>
    
    <link id="bsdp-css" href="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet">



    <style>

        .navbar-brand {
            background: none !important;
        }

        .back-to-top {
    cursor: pointer;
    position: fixed;
    z-index: 99991;
    bottom: 20px;
    right: 20px;
    display:none;
}

    </style>

        <style> .select2-container--default .select2-selection--multiple, .select2-container--default .select2-selection--single, .select2-selection .select2-selection--single { border: 1px solid #d2d6de; border-radius: 0; padding: 3px 12px; height: 34px; } .select2-container .select2-selection--single .select2-selection__rendered { padding-right: 10px; } .select2-container .select2-selection--single .select2-selection__rendered { padding-left: 0; } .select2-container--default .select2-selection--single .select2-selection__arrow b { margin-top: 0; } .select2-container--default .select2-selection--single .select2-selection__arrow { height: 28px; right: 3px; } </style>

</head>


<body class="fixed-sidebar skin-3 ">

      <a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" ><span class="glyphicon glyphicon-chevron-up"></span></a>

    <div id="wrapper" >
    
    <!--<x-loading ref="xcargad"></x-loading> -->

    <nav class="navbar-default navbar-static-side" role="navigation">

        <div class="sidebar-collapse">
            

            @yield('menues') 

        </div>
    </nav>


    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
        </div>

        <!--  <ul class="nav navbar-top-links navbar-right">
                    <li>
                        

                    </li>
                </ul>-->
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">Bienvenido(a) {{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}} - {{ Auth::user()->getRole()}}.</span>
                </li>
                
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope"></i>  <span class="label label-warning">16</span>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <div class="dropdown-messages-box">
                                <a href="profile.html" class="pull-left">
                                    <img alt="image" class="img-circle" src="{{ asset('img/a7.jpg') }}">
                                </a>
                                <div class="media-body">
                                    <small class="pull-right">46h ago</small>
                                    <strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>. <br>
                                    <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="dropdown-messages-box">
                                <a href="profile.html" class="pull-left">
                                    <img alt="image" class="img-circle" src="{{ asset('img/a4.jpg') }}">
                                </a>
                                <div class="media-body ">
                                    <small class="pull-right text-navy">5h ago</small>
                                    <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica Smith</strong>. <br>
                                    <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="dropdown-messages-box">
                                <a href="profile.html" class="pull-left">
                                    <img alt="image" class="img-circle" src="{{ asset('img/profile.jpg') }}">
                                </a>
                                <div class="media-body ">
                                    <small class="pull-right">23h ago</small>
                                    <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
                                    <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="text-center link-block">
                                <a href="mailbox.html">
                                    <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>

                


                <li>
                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out"></i> {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                </li>
            </ul>

        </nav>
        </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                     @yield('breadcrumbs')
                </div>
                <div class="col-lg-2">

                </div>
            </div>
            <div class="wrapper wrapper-content  animated fadeIn no-padding">
              @yield('content')

            </div>

        <!--<div class="footer">
            <div class="pull-right">
                <strong>Derechos</strong> Patache &copy; 2015-2019
            </div>
        </div>-->

        </div>
    
</div>
        <!-- <script src="{{asset('js/app.js')}}" ></script> -->
    
    
      <!-- jQuery UI -->
    <script src="{{ asset('js/plugins/jquery-ui/jquery-ui.min.js') }}"></script> 

    <!-- princiales scripts -->
    
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
    <script src="{{ asset('js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('js/plugins/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('js/plugins/select2/i18n/es.js') }}"></script>
        
    <!-- base javascript -->
    <script src="{{ asset('js/patache.js') }}"></script>
    <script src="{{ asset('js/plugins/pace/pace.min.js') }}"></script>

        <!-- Jasny -->
    <script src="{{ asset('js/plugins/jasny/jasny-bootstrap.min.js') }}"></script>


     

    <script>
        
        $.fn.select2.defaults.set('language', 'es');

              $(document).ready(function(){
                //alert(2222);
     $(window).scroll(function () {
            if ($(this).scrollTop() > 50) {
                $('#back-to-top').fadeIn();
            } else {
                $('#back-to-top').fadeOut();
            }
        });
        // scroll body to 0px on click
        $('#back-to-top').click(function () {
            $('#back-to-top').tooltip('hide');
            $('body,html').animate({
                scrollTop: 0
            }, 100);
            return false;
        });
        
        $('#back-to-top').tooltip('show');

});



    </script>

    



    <!-- scripts_base  -->
    @yield('scripts_base')

    <!-- fin - scripts_base -->


    

</body>

</html>
