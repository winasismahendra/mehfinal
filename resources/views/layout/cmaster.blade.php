
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Administrator SMKIUA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{asset('master/admin3/assets/images/icon/favicon.ico')}}">
    <link rel="stylesheet" href="{{asset('master/admin3/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('master/admin3/assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('master/admin3/assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('master/admin3/assets/css/metisMenu.css')}}">
    <link rel="stylesheet" href="{{asset('master/admin3/assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('master/admin3/assets/css/slicknav.min.css')}}">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="{{asset('master/admin3/assets/css/typography.css')}}">
    <link rel="stylesheet" href="{{asset('master/admin3/assets/css/default-css.css')}}">
    <link rel="stylesheet" href="{{asset('master/admin3/assets/css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('master/admin3/assets/css/responsive.css')}}">
    <!-- modernizr css -->
    <script src="{{asset('master/admin3/assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>
    @yield('css')
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
       
    @include('layout/bsidebar')

        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                            <li id="full-view"><i class="ti-fullscreen"></i></li>
                            <li id="full-view-exit"><i class="ti-zoom-out"></i></li>
                            <li class="settings-btn">
                                <i class="ti-settings"></i>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- header area end -->
                @yield('navigasi')
            <div class="main-content-inner">
                <div class="row">
                   @yield('isi')
                </div>
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p>Writed with <span>❤</span> by <a href="https://sembagiarutala.co.id">Sembagi Arutala Creative</a>.</p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
    <!-- offset area start -->
    <div class="offset-area">
        <div class="offset-close"><i class="ti-close"></i></div>
        <ul class="nav offset-menu-tab">
            
            <li><a data-toggle="tab" href="#settings">Settings</a></li>
        </ul>
        <div class="offset-content tab-content">
 
            <div id="settings" class="tab-pane fade in show active">
                <div class="offset-settings">
                    <div class="settings-list">
                        <div class="s-settings">
                            <div class="s-sw-title">
                                <h5>{{Auth::user()->name}}</h5>
                                <div class="s-swtich">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                            <p>Keep it 'On' When you want to get all the notification.</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
   

    <!-- offset area end -->
    <!-- jquery latest version -->
    <script src="{{asset('master/admin3/assets/js/vendor/jquery-2.2.4.min.js')}}"></script>
    <!-- bootstrap 4 js -->
    <script src="{{asset('master/admin3/assets/js/popper.min.js')}}"></script>
    <script src="{{asset('master/admin3/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('master/admin3/assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('master/admin3/assets/js/metisMenu.min.js')}}"></script>
    <script src="{{asset('master/admin3/assets/js/jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('master/admin3/assets/js/jquery.slicknav.min.js')}}"></script>

    <!-- others plugins -->
    <script src="{{asset('master/admin3/assets/js/plugins.js')}}"></script>
    <script src="{{asset('master/admin3/assets/js/scripts.js')}}"></script>
    @yield('js')
</body>

</html>

