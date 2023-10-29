@extends('layout.header-footer-layout')

@section('content')

    <!-- Modal -->
    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>



    <section class="bg-brown-body py-5">
        <div class="container">
            <div class="row align-items-center py-5">
                <div class="col-md-8 text-black">
                    <h1>About Us</h1>
                    <p>
                        Good day!

                        A warm greeting from San's Lechon! Here in our home of tradition and delight, we proudly present the finest lechon in town.</p>
                        
                       <p> We are truly delighted to be part of your special occasions. From family gatherings, late-night revelries with friends, to business partners celebrating success, our lechon promises to be the centerpiece of joy and happiness.
                        
                        So, we cordially invite you to reserve your orders to ensure that your guests are pleasantly surprised and your celebration reaches new heights of delight.</p>
                        
                        Feel free to reach out to us for reservations or any inquiries about our services. It would be our pleasure to serve you and make your occasion extraordinary.
                        
                        With sincere gratitude from San's Lechon!
                    </p>
                </div>
                <div class="col-md-4">
                    <img class="img-fluid" src="./assets/img/tomsIcon3.png" alt="" style="height: 210px">
                    {{-- <img src="assets/img/about-hero.svg" alt="About Hero"> --}}
                </div>
            </div>
        </div>
    </section>
    <!-- Close Banner -->

    <!-- Start Section -->
    <section class="container py-5">
        <div class="row text-center pt-5 pb-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Our Services</h1>
                {{-- <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    Lorem ipsum dolor sit amet.
                </p> --}}
            </div>
        </div>
        <div class="row">

            <div class="col-md-6 col-lg-4 pb-5">
                <div class="h-100 py-5 services-icon-wap shadow">
                    <div class="h1 text-brown text-center"><i class="fa fa-truck fa-lg"></i></div>
                    <h2 class="h5 mt-4 text-center">Delivery Services</h2>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 pb-5">
                <div class="h-100 py-5 services-icon-wap shadow">
                    <div class="h1 text-brown text-center"><i class="fa fa-percent"></i></div>
                    <h2 class="h5 mt-4 text-center">Special Discounts</h2>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 pb-5">
                <div class="h-100 py-5 services-icon-wap shadow">
                    <div class="h1 text-brown text-center"><i class="fa fa-user"></i></div>
                    <h2 class="h5 mt-4 text-center">24 Hours Service</h2>
                </div>
            </div>
        </div>
    </section>
    <!-- End Section -->

    <!-- Start Brands -->
    <section class="bg-brown-body py-5">
        <div class="container my-4">
            <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1">Payment Method</h1>
                    {{-- <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        Lorem ipsum dolor sit amet.
                    </p> --}}
                </div>
                <div class="col-lg-9 m-auto tempaltemo-carousel">
                    <div class="row d-flex flex-row">
                        <!--Controls-->
                        <div class="col-1 align-self-center">
                            <a class="h1" href="#templatemo-slide-brand" role="button" data-bs-slide="prev">
                                <i class="text-light fas fa-chevron-left"></i>
                            </a>
                        </div>
                        <!--End Controls-->

                        <!--Carousel Wrapper-->
                        <div class="col">
                            <div class="carousel slide carousel-multi-item pt-2 pt-md-0" id="templatemo-slide-brand" >
                                <!--Slides-->
                                <div class="carousel-inner product-links-wap" role="listbox">

                                    <!--First slide-->
                                    <div class="carousel-item active">
                                        <div class="row">
                                            <div class="col-6 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="assets/img/gcash3.png" alt="Brand Logo" style="margin-top: 50px"></a>
                                            </div>
                                             <div class="col-6 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="assets/img/bank2.png" alt="Brand Logo"></a>
                                            </div>
                                           {{-- <div class="col-4 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="assets/img/cop1.png" alt="Brand Logo"></a>
                                            </div> --}}
                                    
                                        </div>
                                    </div>
                                    <!--End First slide-->
                                </div>
                                <!--End Slides-->
                            </div>
                        </div>
                        <!--End Carousel Wrapper-->

                        <!--Controls-->
                        <div class="col-1 align-self-center">
                            <a class="h1" href="#templatemo-slide-brand" role="button" data-bs-slide="next">
                                <i class="text-light fas fa-chevron-right"></i>
                            </a>
                        </div>
                        <!--End Controls-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Brands-->
@endsection