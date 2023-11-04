@extends('layout.header-footer-layout')
@section('content')
@include('components.customer-alert-message')

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



    <!-- Start Banner Hero -->
    <div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner bg-brown-body">
            <div class="carousel-item active ">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="./assets/img/let2.JPG" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left align-self-center">
                                <img class="img-fluid rounded mx-auto d-none d-sm-block" src="./assets/img/tomsIcon3.png" alt="" style="height: 140px; width:360px">
                                <h2 style="text-align: center">Good and Quality Lechon</h2>
                                <p>
                                    "Planning a Birthday, Wedding, Debut, or any special occasion? Reserve your spot now with San's Lechon! Drop us a message to secure your date. For easy orders, message us directly on our Facebook Page, or place your order here by selecting your desired lechon size at the bottom. Let's make your celebration unforgettable with San's Lechon!"
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="./assets/img/let1.jpg" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <img class="img-fluid rounded mx-auto d-none d-sm-block" src="./assets/img/tomsIcon3.png" alt="" style="height: 140px; width:360px">
                                <h2 style="text-align: center">Freebies</h2>
                                {{-- <h3 class="h2">Aliquip ex ea commodo consequat</h3> --}}
                                <p>
                                    "San's Lechon: Celebrate with Tradition and Enjoy Freebies! Order now and get 3 bottles of beer, chicharrón, and sauce to make your feast even more special!"
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="./assets/img/let7.jpg" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <img class="img-fluid rounded mx-auto d-none d-sm-block" src="./assets/img/tomsIcon3.png" alt="" style="height: 140px; width:360px">
                                <h2 style="text-align: center">Preffered Sizes Available!</h2>
                                <p>
                                    "Discover the perfect size of lechon for your celebration, ranging from intimate gatherings to grand festivities. San's Lechon offers a variety of sizes, including 16-20 kgs, 21-25 kgs, and 26 to 30 kgs, to cater to your every occasion."
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="prev">
            <i class="fas fa-chevron-left"></i>
        </a>
        <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="next">
            <i class="fas fa-chevron-right"></i>
        </a>
    </div>
    <!-- End Banner Hero -->


    <!-- Start Categories of The Month -->
    <section class="container py-5 ">
     <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1">Order Now!</h1>
                    <p>
                        "Tatak San's Lechon: Lasapin ang Lutong-Pinoy, Sama-samang Sarap, Sama-samang Saya!"
                    </p>
                </div>
            </div>
            <div class="row">
            @foreach($letc as $letchon)
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-80 bg-brown-body text-dark">
                        <a>
                            <img src="./assets/img/Lechon.png" class="card-img-top" alt="...">
                        </a>
                        <div >
                            <div class="container pt-1 lechon-bg pb-2">
                                <div class="row">
                                  <div class="col-3 px-1">
                                    <div class="card rounded-3 ">
                                        @foreach($freeby as $freebies)
                                        @if($freebies->freeb1 === null && $freebies->freeby1 && $freebies->freeby1->shop === 'sweet bites')
                                            <img class="box-image  rounded-3 img-fluid" src="/assets/img/cake.png" id="image{{ $loop->index }}">
                                        @endif
                                        @if($freebies->freeb1 == null)
                                        <img class="box-image  rounded-3 img-fluid" src="/assets/img/cake.png" id="image{{ $loop->index }}">
                                        @endif
                                        @if($freebies->freeb1 != null && $freebies->freeby1 && $freebies->freeby1->shop === 'sweet bites')
                                        {{-- @if($freebies->category_id != null) --}}
                                        <img class="box-image rounded-3 img-fluid" id="preview" src="{{ asset('storage/' . $freebies->freeby1->img) }}" alt=""/>
                                        @endif
                                        @endforeach
                                    </div>
                                  </div>
                                  <div class="col-3 px-1">
                                    <div class="card rounded-3">
                                        @foreach($freeby as $freebies)
                                        @if($freebies->freeb2 === null && $freebies->freeby2 && $freebies->freeby2->shop === 'mombizz')
                                            <img class="box-image rounded-3 img-fluid" src="/assets/img/mombizz2.jpg" id="image{{ $loop->index }}">
                                        @endif
                                        @if($freebies->freeb2 != null && $freebies->freeby2 && $freebies->freeby2->shop === 'mombizz')
                                        <img class="box-image rounded-3 img-fluid" id="preview" src="{{ asset('storage/' . $freebies->freeby2->img) }}" alt=""/>
                                        @endif
                                        @if($freebies->freeb2 == null)
                                        <img class="box-image rounded-3 img-fluid" src="/assets/img/mombizz2.jpg" id="image{{ $loop->index }}">
                                        @endif
                                        @endforeach
                                    </div>
                                  </div>
                              
                                  <div class="col-3 px-1">
                                    <div class="card rounded-3">
                                      <img class="box-image  rounded-3 img-fluid" src="/assets/img/coke1.jpg" >
                                    </div>
                                  </div>
                              
                                  <div class="col-3 px-1">
                                    <div class="card rounded-3">
                                      <img class="box-image  rounded-3 img-fluid" src="/assets/img/freebies3.jpg" >
                                    </div>
                                  </div>
                                </div>
                              </div>
                         
                        </div>
                        <div class="card-body">

                            <p  class="h3 text-decoration-none text-dark text-center pb-2"><b> {{$letchon->kls}}  /  ₱{{$letchon->prices}} </p></b>

                            

                         <div class="d-flex justify-content-center">
                            <form method="POST"action="{{ url('addCartLechon', ['id' => $letchon->id]) }}">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm  mr-2">Add to Cart</button> 
                                <input hidden name="letchon_id" value="{{$letchon->id}}">
                                <input hidden name="price" value="{{$letchon->prices}}">
                                <input hidden name="size" value="{{$letchon->kls}}">
                                <input hidden name="type" value="Lechon">
                                <input hidden name="shop" value="Lechon">
                                <input hidden name="username" value="{{auth()->user()->username}}">
                                <input hidden name="status" value="cart">
                            </form>
                            <a href="{{url('orderViewKls',$letchon->id)}}" class="btn btn-success btn-sm">Order Now</a>

                        </div>
                        </div>
                    </div>
                </div>
                @endforeach

                </div>
            </div>
    </section>
    <!-- End Categories of The Month -->



<!-- Messenger Chat Plugin Code -->
    <div id="fb-root"></div>

    <!-- Your Chat Plugin code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>


    
    <!-- Start Featured Product -->
    <section class="bg-brown-body">
        <div class="container py-5">
            <div class="row text-center pt-3">
                <div class="col-lg-8 m-auto">
                    <h1 class="fs-1">We Have Freebies!</h1>
                    <p>
                        "San's Lechon: Celebrate with Tradition and Enjoy Freebies! Order now and get a cake, 1 food bilao, a 1.5 coke and sauce to make your feast even more special!"
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-6 col-md-3 p-3 mt-3">
                    <a href="#"><img src="./assets/img/cake.png" class="index-image rounded-3 img-fluid border bg-white" ></a>
                    <h2 class="h5 text-center mt-3 mb-3">Cake</h2>
                </div>
                <div class="col-6 col-md-3 p-3 mt-3">
                    <a href="#"><img src="./assets/img/mombizz2.jpg" class="index-image rounded-3 img-fluid border" ></a>
                    <h2 class="h5 text-center mt-3 mb-3">1 Food Bilao</h2>
                </div>
                <div class="col-6 col-md-3 p-3 mt-3">
                    <a href="#"><img src="./assets/img/coke1.jpg" class="index-image rounded-3 img-fluid border" ></a>
                    <h2 class="h5 text-center mt-3 mb-3">1.5 COKE</h2>
                </div>
                <div class="col-6 col-md-3 p-3 mt-3">
                    <a href="#"><img src="./assets/img/freebies3.jpg" class="index-image rounded-3 img-fluid border" ></a>
                    <h2 class="h5 text-center mt-3 mb-3">SAUCE</h2>
                </div>
            </div>
        </div>
    </section>
    <!-- End Featured Product -->

        <!-- Start Article -->
        <section class="py-5">
            <div class="container">
                <div class="row text-center pt-3 pb-3">
                    <div class="col-lg-8 m-auto">
                        <h3 class="fs-2">Also Available In The Shop!</h3>
                    </div>
                </div>
    
                <!--Start Carousel Wrapper-->
                <div class="shop">
                    <img src="/assets/img/shop1.jpg" class="img-logo">
                    <h5>Sweet Bites <span>by: Cindy Barcenas</span></h5>
                </div>
                <div id="carousel-related-producttt">
                    <div class="p-2 pb-3 ">
                        <div class="product-wap card rounded-0">
                            <form method="POST" action="/changeFreeb">
                                @csrf
                                <img class="shop-img rounded-0 img-fluid" id="preview" src="./assets/img/cake.png"  alt=""/>
                                <select class="input form-control mt-1" name="size" required>
                                    {{-- <option value="">-Select Size-</option> --}}
                                    <option value="small" {{ old('size') == 'small' ? 'selected' : '' }}>Small(6x6 tall)</option>
                                    <option value="medium" {{ old('size') == 'medium' ? 'selected' : '' }}>Medium(7x5 tall)</option>
                                    <option value="large" {{ old('size') == 'large' ? 'selected' : '' }}>Large(8x4 tall)</option>
                                    <option value="xlarge" {{ old('size') == 'xlarge' ? 'selected' : '' }}>Extra Large(9x4 tall)</option>
                                </select>
                                
                            </div>
                        <div class="d-flex mt-3" style="justify-content: center; items:center">
                            
                            <button type="submit" class="btn btn-success btn-sm mr-2 order-button">Change Freebies</button>

                        </form>
                    </div>
                    </div>

                @foreach($cat as $categories) 
                    <div class="p-2 pb-3 ">
                        <div class="product-wap card rounded-0">
    
                        <form method="POST" action="{{ url('addCart', $categories->id) }}">
                                @csrf
                                <img class="shop-img rounded-0 img-fluid" id="preview" src="{{$categories->img ? asset ('storage/' .$categories->img) : asset('/storage/no/-image.png')}}" alt=""/>
                                <input hidden name="username" value="{{auth()->user()->username}}">
                                <input hidden name="shop" value="{{$categories->shop}}">
                                <input hidden name="status" value="cart">
                                <input hidden name="price" value="{{$categories->price}}">
                                <select class="input form-control mt-1" name="size" id="inputType{{ $loop->index }}" onchange="checkInputType({{ $loop->index }})">
                                    <option value="">-Select Size-</option>
                                    <option value="small" {{ old('size') == 'small' ? 'selected' : '' }}>Small(6x6 tall) - ₱{{$categories->small}} or add - {{$categories->small - 600}}</option>
                                    <option value="medium" {{ old('size') == 'medium' ? 'selected' : '' }}>Medium(7x5 tall) - ₱{{$categories->medium}} or  add - {{$categories->medium - 600}}</option>
                                    <option value="large" {{ old('size') == 'large' ? 'selected' : '' }}>Large(8x4 tall) - ₱{{$categories->large}} or  add - {{$categories->large - 600}}</option>
                                    <option value="xlarge" {{ old('size') == 'xlarge' ? 'selected' : '' }}>Extra Large(9x4 tall)- ₱{{$categories->extraLarge}} or  add - {{$categories->extraLarge  - 600}}</option>
                                </select>
                                
                            </div>
                            
                        <div class="d-flex mt-3" style="justify-content: center; items:center">
                          
                            <button id="submitButton1{{ $loop->index }}" disabled onclick="submitForm(1, {{ $loop->index }})" type="submit" class="order-button btn btn-success btn-sm mr-2">Add to Cart</button> 
                        </form>
                        <form method="POST" action="{{ url('changeFreebies', $categories->id) }}">
                            @csrf
                            <input type="hidden" name="freeb1" value="{{$categories->id}}">
                            <input type="hidden" name="size" id="sizeInput{{ $loop->index }}" value="">
                            <button id="submitButton2{{ $loop->index }}" disabled onclick="submitForm(2, {{ $loop->index }})" type="submit" class=" order-button btn btn-success btn-sm mr-2">Change Freebies</button>
                        </form>
                    </div>
                    </div>
                    @endforeach
                </div>

                            <!--Start Carousel Wrapper-->
                            <div class="shop">
                                <img src="/assets/img/shop2.jpg" class="img-logo">
                                <h5>MOMBIZZ</h5>
                            </div>
                            <div id="carousel-related-product">
                                 <div class="p-2 pb-3 ">
                                    <div class="product-wap card rounded-0">
                                        <form method="POST" action="/changeFreeb2">
                                            @csrf
                                            <img class="shop-img rounded-0 img-fluid" id="preview" src="./assets/img/mombizz2.jpg" alt="" />
                                            <select class="input form-control mt-1" name="modeOfPayment" value="{{old('payment')}}"  required>
                                                <option value="">-Select Size-</option>
                                                <option value="medium">Medium(6-8 pax)</option>
                                                <option value="large">Large(10-12 pax) - add ₱300</option>
                                                <option value="xlarge">Extra Large(14x16 pax) - add ₱600</option>
                                            </select>
                                    
                                    </div>
                                        <div class="d-flex mt-3" style="justify-content: center; items:center">
                                        <button class="btn btn-success btn-sm  mr-2 order-button">Change Freebies</button>
                                    </form>
                                        </div>
                                </div> 

                                @foreach($mombi as $mombizz) 
                                    <div class="p-2 pb-3 ">
                                        <div class="product-wap card rounded-0">
                                            <form method="POST" action="{{ url('addCart', $mombizz->id) }}">
                                                @csrf
                                                <img class="shop-img rounded-0 img-fluid" id="preview" src="{{$mombizz->img ? asset ('storage/' .$mombizz->img) : asset('/storage/no/-image.png')}}" alt="" />
                                                <input hidden name="username" value="{{auth()->user()->username}}">
                                                <input hidden name="shop" value="{{$mombizz->shop}}">
                                                <input hidden name="status" value="cart">
                                                <input hidden name="price" value="{{$mombizz->price}}">
                                                <select class="input form-control mt-1" name="size" id="inputTypeMombizz{{ $loop->index }}" onchange="checkInputTypeMombizz({{ $loop->index }})">
                                                    <option value="">-Select Size-</option>
                                                    <option value="medium" {{ old('size') == 'medium' ? 'selected' : '' }}>Medium(7x5 tall) - ₱{{$mombizz->medium}} or add - {{$mombizz->small - 499}}</option>
                                                    <option value="large" {{ old('size') == 'large' ? 'selected' : '' }}>Large(8x4 tall) - ₱{{$mombizz->large}} or add - {{$mombizz->small - 499}}</option>
                                                    @if($mombizz->extraLarge != null)
                                                    <option value="xlarge" {{ old('size') == 'xlarge' ? 'selected' : '' }}>Extra Large(9x4 tall) - ₱{{$mombizz->extraLarge}} or add - {{$mombizz->small - 499}}</option>
                                                    @endif
                                                </select>
                                        </div>

                                        <div class="d-flex mt-3" style="justify-content: center; items:center">
                                            <button id="submitButton1Mombizz{{ $loop->index }}" disabled onclick="submitForm(1, {{ $loop->index }})" type="submit" class="order-button btn btn-success btn-sm  mr-2">Add to Cart</button> 
                                        </form>
                                        <form method="POST" action="{{ url('changeFreebies2', $mombizz->id) }}">
                                            @csrf
                                            <input type="hidden" name="freeb1" value="{{$mombizz->id}}">
                                            <input type="hidden" name="size" id="sizeInputMombizz{{ $loop->index }}" value="">
                                            <button id="submitButton2Mombizz{{ $loop->index }}" disabled onclick="submitForm(2, {{ $loop->index }})" type="submit" class="order-button btn btn-success btn-sm mr-2">Change Freebies</button>
                                        </form>
                                    </div>
                                    </div>
                                @endforeach

                                
                            </div>
          
    
    
        </section>

        <script src="/assets/js/order.js"></script>
        <script>
            function checkInputType(index) {
                var inputTypeSelect = document.getElementById("inputType" + index);
                var submitButton1 = document.getElementById("submitButton1" + index);
                var submitButton2 = document.getElementById("submitButton2" + index);
                var sizeInput = document.getElementById("sizeInput" + index);
        
                // Check if an option is selected
                if (inputTypeSelect.value !== "") {
                    // Enable both submit buttons
                    submitButton1.removeAttribute("disabled");
                    submitButton2.removeAttribute("disabled");
        
                    // Set the selected size in the hidden input field
                    sizeInput.value = inputTypeSelect.value;
                } else {
                    // Disable both submit buttons
                    submitButton1.setAttribute("disabled", "true");
                    submitButton2.setAttribute("disabled", "true");
        
                    // Clear the value in the hidden input field
                    sizeInput.value = "";
                }
            }
        </script>
        
        <script>
            function checkInputTypeMombizz(index) {
                var inputTypeSelect = document.getElementById("inputTypeMombizz" + index);
                var submitButton1 = document.getElementById("submitButton1Mombizz" + index);
                var submitButton2 = document.getElementById("submitButton2Mombizz" + index);
                var sizeInput = document.getElementById("sizeInputMombizz" + index);
        
                // Check if an option is selected
                if (inputTypeSelect.value !== "") {
                    // Enable both submit buttons
                    submitButton1.removeAttribute("disabled");
                    submitButton2.removeAttribute("disabled");
        
                    // Set the selected size in the hidden input field
                    sizeInput.value = inputTypeSelect.value;
                } else {
                    // Disable both submit buttons
                    submitButton1.setAttribute("disabled", "true");
                    submitButton2.setAttribute("disabled", "true");
        
                    // Clear the value in the hidden input field
                    sizeInput.value = "";
                }
            }
        </script>
        
        <script>
            var chatbox = document.getElementById('fb-customer-chat');
            chatbox.setAttribute("page_id", "108405412259037");
            chatbox.setAttribute("attribution", "biz_inbox");
          </script>
        
    <!-- Your SDK code -->
    <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v18.0'
          });
        };
  
        (function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
      </script>
@endsection
