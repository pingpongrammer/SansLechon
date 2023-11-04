<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- theme meta -->
    <meta name="theme-name" content="focus" />
    <title>San's Lechon</title>
    <link rel="icon" href="assets/img/loginIcon.png">
    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    {{-- <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff"> --}}
    <!-- Styles -->
    <link href="/assets/css/admin/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
    <link href="/assets/css/admin/lib/chartist/chartist.min.css" rel="stylesheet">
    <link href="/assets/css/admin/lib/font-awesome.min.css" rel="stylesheet">
    <link href="/assets/css/admin/lib/themify-icons.css" rel="stylesheet">
    <link href="/assets/css/admin/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="/assets/css/admin/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="/ssets/css/admin/lib/weather-icons.css" rel="stylesheet" />
    <link href="/assets/css/admin/lib/menubar/sidebar.css" rel="stylesheet">
    <link href="/assets/css/admin/lib/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/admin/lib/helper.css" rel="stylesheet">
    <link href="/assets/css/admin/style.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
    <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
        <div class="nano">
            <div class="nano-content">
                <ul>
                    <div class="logo"><a href="#">
                       {{-- <img class="img-fluid" src="/assets/img/tomsIcon3.png" alt="" style="height: 40px"> --}}
                        <img class="img-fluid" src="./assets/img/loginbg.png" alt="" style="height: 65px"> 
                    </a></div>
                    <li class="label">Main</li>
                    <li><a href="/marketer-dashboard"><i class="ti-home"></i> Dashboard </a></li>
                    <li class="label">Features</li>
                    <li><a href="/marketerProfile"><i class="ti-user"></i>Profile </a></li>
                    <li><a href="/my-wallet"><i class="ti-wallet"></i>My Wallet</a></li>
                    <li><a href="/help-center"><i class="ti-help"></i> Help Center</a></li>     
                    
                    </form>
                </ul>
            </div>
        </div>
    </div>
    <!-- /# sidebar -->

    <div class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="float-left">
                        <div class="hamburger sidebar-toggle">
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class="line"></span>
                        </div>
                    </div>
                    <div class="float-right">
                        
                        <div class="dropdown dib">
                            <div class="header-icon" data-toggle="dropdown">
                                <span class="user-avatar">{{ auth()->user()->username }}
                                    <i class="ti-angle-down f-s-10"></i>
                                </span>
                            </div>
                            <div class="drop-down dropdown-profile dropdown-menu dropdown-menu-right">
                                <div class="dropdown-content-heading">
                                    <span class="text-left">Hello {{ auth()->user()->username }}</span>
                                </div>
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <form class="inline" action="/logout" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-link">
                                                    <i class="ti-power-off"></i>
                                                    <span>Logout</span>
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
              

                <!-- /# row -->
                <section id="main-content">
                    <!-- /# row -->

                        @yield('content')

                </section>
            </div>
        </div>
    </div>

    <!-- jquery vendor -->
    <script src="/assets/js/admin/lib/jquery.min.js"></script>
    <script src="/assets/js/admin/lib/jquery.nanoscroller.min.js"></script>
    <!-- nano scroller -->
    <script src="/assets/js/admin/lib/menubar/sidebar.js"></script>
    <script src="/assets/js/admin/lib/preloader/pace.min.js"></script>
    <!-- sidebar -->

    <script src="/assets/js/admin/lib/bootstrap.min.js"></script>
    <script src="/assets/js/admin/scripts.js"></script>
    <!-- bootstrap -->

    <script src="/assets/js/admin/lib/calendar-2/moment.latest.min.js"></script>
    <script src="/assets/js/admin/lib/calendar-2/pignose.calendar.min.js"></script>
    <script src="/assets/js/admin/lib/calendar-2/pignose.init.js"></script>


    <script src="/assets/js/admin/lib/weather/jquery.simpleWeather.min.js"></script>
    <script src="/assets/js/admin/lib/weather/weather-init.js"></script>
    <script src="/assets/js/admin/lib/circle-progress/circle-progress.min.js"></script>
    <script src="/assets/js/admin/lib/circle-progress/circle-progress-init.js"></script>
    <script src="/assets/js/admin/lib/chartist/chartist.min.js"></script>
    <script src="/assets/js/admin/lib/sparklinechart/jquery.sparkline.min.js"></script>
    <script src="/assets/js/admin/lib/sparklinechart/sparkline.init.js"></script>
    <script src="/assets/js/admin/lib/owl-carousel/owl.carousel.min.js"></script>
    <script src="/assets/js/admin/lib/owl-carousel/owl.carousel-init.js"></script>
    <!-- scripit init-->
    <script src="/assets/js/admin/dashboard2.js"></script>
</body>

</html>
