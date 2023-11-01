<!DOCTYPE html>
<html lang="en">

<head>
    <title>San's Lechon</title>
    <link rel="icon" href="assets/img/loginIcon.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="apple-touch-icon" href="/assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/titleimg.png" style="height:100px; width:100px">

    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/templatemo.css">
    <link rel="stylesheet" href="/assets/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="/assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="/assets/css/user-dashboard.css">
    <link rel="stylesheet" href="/assets/css/order.css">

       <!-- Slick -->
       <link rel="stylesheet" type="text/css" href="/assets/css/slick.min.css">
       <link rel="stylesheet" type="text/css" href="/assets/css/slick-theme.css">

       <script src="/assets/js/admin/lib/jquery.min.js"></script>
       <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!--

    
    
TemplateMo 559 Zay Shop

https://templatemo.com/tm-559-zay-shop

-->
</head>

<body>
    <!-- Start Top Nav -->
    <nav class="navbar navbar-expand-lg bg-brown navbar-light d-none d-lg-block" id="templatemo_nav_top">
        <div class="container text-light">
            <div class="w-100 d-flex justify-content-between">
                <div>
                    <i class="fa fa-envelope mx-2"></i>
                    <a class="navbar-sm-brand text-white text-decoration-none">sansletchon@gmail.com</a>
                    <i class="fa fa-phone mx-2"></i>
                    <a class="navbar-sm-brand text-white text-decoration-none">09776162392</a>
                </div>
                <div>
                    <a class="text-white" href="https://www.facebook.com/profile.php?id=100092437762406" target="_blank" rel="sponsored"><i class="fab fa-facebook-f fa-sm fa-fw me-2"></i></a>
                    <a class="text-white" href="#"><i class="fab fa-instagram fa-sm fa-fw me-2"></i></a>
                    {{-- <a class="text-light" href="https://twitter.com/" target="_blank"><i class="fab fa-twitter fa-sm fa-fw me-2"></i></a> --}}
                </div>
            </div>
        </div>
    </nav>
    <!-- Close Top Nav -->


    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow ">
        <div class="container d-flex justify-content-between align-items-center">

            <a class="navbar-brand text-success logo h5 align-self-center" href="/home">
                <img class="img-fluid" src="/assets/img/tomsIcon3.png" alt="" style="height: 40px">
            </a>

            <div class="d-flex">
                <a class="nav-link position-relative text-decoration-none font-weight-bold navbar-toggler border-0 mt-1" href="/cart">
                    <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                    <span class="nav-link position-absolute top-14 left-80 translate-middle badge rounded-pill bg-light text-dark">{{$cartCount}}</span>
                </a>
                <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

            </div>
            <div class="align-self-center collapse navbar-collapse flex-fill d-lg-flex justify-content-center justify-content-lg-between " id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex  text-center justify-content-lg-between mx-auto ">
                        <li class="nav-item">
                            <a class="nav-link font-weight-bold" href="/home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font-weight-bold" href="/about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font-weight-bold" href="/contact">Contact</a>
                        </li>
                    </ul>
                </div>
                <div class="navbar justify-content-center align-items-center pl-2 mr-0">
                    <a class="nav-link position-relative text-decoration-none font-weight-bold border-0 d-lg-block d-md-none d-sm-none d-none" href="/cart">
                        Cart
                        <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                        <span class="nav-link position-absolute top-14 left-80 translate-middle badge rounded-pill bg-light text-dark">{{$cartCount}}</span>
                    </a>
                                        
                    <div class="dropdown">
                        <button class="nav-icon position-relative text-decoration-none dropdown-toggle" style="background-color: white; border: none;" type="button" id="responsiveDropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ auth()->user()->username }}
                        </button>
                        <div class="dropdown-menu mt-3" aria-labelledby="responsiveDropdownMenuButton">
                            <a href="/custPendingOrder" class="btn btn-link btn-sm" style="text-decoration: none;"><i class="fa fa-fw fa-user text-dark mr-2"></i></i>Pending Order</a>
                            <form action="/logout" method="POST" class="dropdown-item">
                                @csrf
                                <button type="submit" class="btn btn-link btn-sm" style="text-decoration: none;"><i class="fa fa-fw fa-share text-dark mr-2"></i>Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </nav>
    <!-- Close Header -->

    @yield('content')

    

    <!-- Start Footer -->
    <footer class="footer-start bg-brown-light" id="tempaltemo_footer">
        <div class="container">
            <div class="row">

                <div class="col-md-4 pt-5">
                    <h2 class="h2  border-bottom pb-3  logo">San's Letchon</h2>
                    <ul class="list-unstyled text-white footer-link-list">
                        <li>
                            <i class="fas fa-map-marker-alt fa-fw"></i>
                            Bay Street, San Ramon Baao Cam Sur
                        </li>
                        <li>
                            <i class="fa fa-phone fa-fw"></i>
                            <a class="text-decoration-none text-white">09776162392</a>
                        </li>
                        <li>
                            <i class="fa fa-envelope fa-fw"></i>
                            <a class="text-decoration-none text-white">sansletchon@gmail.com</a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-4 pt-5">
                    <h2 class="h2 border-bottom pb-3 font-weight-bold">Payments</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li><a class="text-decoration-none text-white" >Gcash</a></li>
                        <li><a class="text-decoration-none text-white" >Bank</a></li>
                    </ul>
                </div>

                <div class="col-md-4 pt-5">
                    <h2 class="h2 border-bottom pb-3 font-weight-bold">Further Info</h2>
                    <ul class="list-unstyled footer-link-list">
                        <li><a class="text-decoration-none text-white" href="/">Home</a></li>
                        <li><a class="text-decoration-none text-white" href="/about">About Us</a></li>
                        <li><a class="text-decoration-none text-white" href="/contact">Shop Locations</a></li>
                        <li><a class="text-decoration-none text-white" href="/contact">Contact</a></li>
                    </ul>
                </div>

            </div>

            <div class="row text-light mb-4">
                <div class="col-12 mb-3">
                    <div class="w-100 my-3 border-top "></div>
                </div>
                <div class="col-auto me-auto">
                    <ul class="list-inline text-left footer-icons text-white">
                        <li class="list-inline-item border rounded-circle text-center">
                            <a class="text-decoration-none" target="_blank" href="https://www.facebook.com/profile.php?id=100092437762406"><i class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border rounded-circle text-center">
                            <a class="text-decoration-none"  href="#"><i class="fab fa-instagram fa-lg fa-fw text-white"></i></a>
                        </li>
                        {{-- <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://twitter.com/"><i class="fab fa-twitter fa-lg fa-fw"></i></a>
                        </li> --}}
                    </ul>
                </div>

            </div>
        </div>

        <div class="w-175 bg-brown ">
            <div class="container ">
                <div class="row pt-2 ">
                    <div class="col-12 bg-brown">
                        <p class="text-center text-white">
                            Copyright &copy; 2023 San's Letchon 
                            | @Pingpongrammer
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </footer>
    <!-- End Footer -->

    <!-- Start Script -->
    <script src="/assets/js/jquery-1.11.0.min.js"></script>
    <script src="/assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/templatemo.js"></script>
    <script src="/assets/js/custom.js"></script>
    <!-- End Script -->

    
<!-- Start Slider Script -->
<script src="./assets/js/slick.min.js"></script>
<script src="./assets/js/admin-dashboard.js"></script>
<script>
    $('#carousel-related-product').slick({
        infinite: true,
        arrows: false,
        slidesToShow: 4,
        // slidesToScroll: 3,
        dots: true,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    // slidesToScroll: 3
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    // slidesToScroll: 3
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                    // slidesToScroll: 3
                }
            }
        ]
    });
</script>

<script>
    $('#carousel-related-producttt').slick({
        infinite: true,
        arrows: false,
        slidesToShow: 4,
        // slidesToScroll: 3,
        dots: true,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    // slidesToScroll: 3
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    // slidesToScroll: 3
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                    // slidesToScroll: 3
                }
            }
        ]
    });
</script>
<!-- End Slider Script -->


<script>
    $('#carousel-related-producttttt').slick({
        infinite: true,
        arrows: false,
        slidesToShow: 4,
        // slidesToScroll: 3,
        dots: true,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    // slidesToScroll: 3
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    // slidesToScroll: 3
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                    // slidesToScroll: 3
                }
            }
        ]
    });
</script>
<!-- End Slider Script -->


</body>

</html>