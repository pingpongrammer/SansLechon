@extends('layout.header-footer-layout')
@section('content')
@include('components.customer-alert-message')

<link rel="stylesheet" href="/assets/css/order.css">

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

<!-- Open Content -->
<section class="bg-brown-body">
    <div class="container pb-5">                    
        
        @if(session()->has('message'))
        <div class="alert alert-success" id="alert">
        <button type="button" class="close" data-dismiss="alert">x</button>
        {{session()->get('message')}}
        </div>
    @endif

        <div class="row">
            <div class="col-lg-10 mt-5 mx-auto">
                <div class="card ">
                    <div class="card-body">
                        <div class="card border-0">
                            <img class=" img-fluid" src="/assets/img/Lechon.png" alt="Card image cap" id="product-detail">
                        </div>
                        <div class="row">
                            <div >
                                <div class="container pt-1 lechon-bg">
                                    <div class="row">
                                      <div class="col-3 px-1">
                                        @foreach($freeby as $freebies)
                                        @if($freebies->freeb1 === null && $freebies->freeby1 && $freebies->freeby1->shop === 'sweet bites')
                                            <img class="box-imagee card-img rounded-0 img-fluid" src="/assets/img/cake.png" id="image{{ $loop->index }}">
                                        @endif
                                        @if($freebies->freeb1 == null)
                                        <img class="box-imagee card-img rounded-0 img-fluid" src="/assets/img/cake.png" id="image{{ $loop->index }}">
                                        @endif
                                        @if($freebies->freeb1 != null && $freebies->freeby1 && $freebies->freeby1->shop === 'sweet bites')
                                        {{-- @if($freebies->category_id != null) --}}
                                        <img class="box-imagee card-img rounded-0 img-fluid" id="preview" src="{{ asset('storage/' . $freebies->freeby1->img) }}" alt=""/>
                                        @endif
                                        @endforeach
                                      </div>
                                      <div class="col-3 px-1">
                                        @foreach($freeby as $freebies)
                                        @if($freebies->freeb2 === null && $freebies->freeby2 && $freebies->freeby2->shop === 'mombizz')
                                            <img class="box-imagee card-img rounded-0 img-fluid" src="/assets/img/mombizz2.jpg" id="image{{ $loop->index }}">
                                        @endif
                                        @if($freebies->freeb2 != null && $freebies->freeby2 && $freebies->freeby2->shop === 'mombizz')
                                        <img class="box-imagee rounded-0 img-fluid" id="preview" src="{{ asset('storage/' . $freebies->freeby2->img) }}" alt=""/>
                                        @endif
                                        @if($freebies->freeb2 == null)
                                        <img class="box-imagee card-img rounded-0 img-fluid" src="/assets/img/mombizz2.jpg" id="image{{ $loop->index }}">
                                        @endif
                                        @endforeach
                                      </div>
                                  
                                      <div class="col-3 px-1">
                                        <div class="card rounded-0">
                                          <img class="box-imagee card-img rounded-0 img-fluid" src="/assets/img/coke2.jpg" >
                                        </div>
                                      </div>
                                  
                                      <div class="col-3 px-1">
                                        <div class="card rounded-0">
                                          <img class="box-imagee card-img rounded-0 img-fluid" src="/assets/img/freebies3.jpg" >
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                             
                            </div>
                        </div>
                        <ul class="list-unstyled d-flex justify-content-between" >
                            <li>
                                <h3 id="sourceHeading" style="font-size:30px; color:green"><b><i>{{$let->kls}}</i></b></h3>
                            </li>
                            <h3 style="font-size:30px; color:green; display: inline-block;"><b>₱<h3 style="font-size:30px; color:green; display: inline-block;" id="pricesss">{{$let->prices}}</h3></b></h3>
                        </ul>


                            <form action="/orderNowStore" enctype="multipart/form-data" class="col-md-11 m-auto" method="post" role="form">
                                @csrf

                            <div class="row">
                                <hr>
                                <div class="form-group col-md-12 mb-1">
                                    <h6 style="font-size:19px; color:rgb(7, 7, 7); font-weight:700" for="inputsubject">Order Form:</h6>
                                </div>
                                        
                                <div class="form-group col-md-6 mb-3">
                                    <h6 style="font-size:12px">Name<span style="color: red">*</span></h6>
                                    <input type="text" class="input form-control mt-1" id="inputName"  name="name" placeholder="Name">
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <h6 style="font-size:12px">Contact Number<span style="color: red">*</span></h6>
                                    <input type="text" class="input form-control mt-1" id="inputContact" name="phone_number" placeholder="Phone Number">
                                </div>

                            </div>

                            <div class="row">


                                <div class="form-group col-md-12 mb-1">
                                    <h6 style="font-size:15px; color:green" for="inputsubject">Delivery Address</h6>
                                </div>

                                <div class="form-group col-md-4 mb-3">
                                    <h6 style="font-size:12px">City/location<span style="color: red">*</span></h6>
                                    <select class="input form-control mt-1" value="{{old('location')}}" name="location" id="inputLocation" required>
                                      <option value="">-Select City/Location-</option>
                                      <option value="Baao">Baao</option>
                                      <option value="Buhi">Buhi</option>
                                      <option value="Bato">Bato</option>
                                      <option value="Bula">Bula</option>
                                      <option value="Balatan">Balatan</option>
                                      <option value="Nabua">Nabua</option>
                                      <option value="Iriga">Iriga</option>
                                      <option value="Pili">Pili</option>
                                      <option value="Naga">Naga</option>
                                   </select>
                                    @Error('location')
                                          <p class="text-danger text-md mt-1">{{$message}}</p>
                                         @enderror
                                </div>
                         

                                <div class="form-group col-md-4 mb-3">
                                    <h6 style="font-size:12px" for="inputsubject">Barangay<span style="color: red">*</span></h6>
                                    <input type="text" class=" input form-control mt-1" id="inputBarangay" name="barangay" placeholder="Barangay">
                                </div>

                                <div class="form-group col-md-4 mb-3">
                                    <h6 style="font-size:12px" for="inputsubject">Street<span style="color: red">*</span></h6>
                                    <input type="text" class=" input form-control mt-1" id="inputStreet" name="street" placeholder="Street">
                                </div>

                                <div class="form-group col-md-4 mb-3">
                                    <h6 style="font-size:12px" for="inputsubject">Preferred Delivery date<span style="color: red">*</span></h6>
                                    <input type="date" class=" input form-control mt-1" id="inputDate" name="deliveryDate" placeholder="Address">
                                </div>

                                <div class="form-group col-md-4 mb-3">
                                    <h6 style="font-size:12px" for="inputsubject">Preferred Delivery Time<span style="color: red">*</span></h6>
                                    <input type="time" class=" input form-control mt-1" id="inputTime" name="deliveryTime" placeholder="Address">
                                </div>

                                <div class="form-group col-md-4 mb-3">
                                    <h6 style="font-size:12px">Mode of Payment <span style="color: red">*</span></h6>
                                    <select class="input form-control mt-1" name="modeOfPayment" value="{{old('payment')}}"  required>
                                      <option value="">-Select Mode of Payment-</option>
                                      <option value="Gcash">Gcash</option>
                                      <option value="Bank">Bank</option>
                                      {{-- <option value="Cash On Pickup">Cash on Pickup</option> --}}
                                   </select>
                                    @Error('adminType')
                                          <p class="text-danger text-md mt-1">{{$message}}</p>
                                         @enderror
                                </div>
                             
                                <input hidden  id="inputStatus" name="status" value="pendingproof">
                                <input hidden  id="referral_code" name="referral_code" value="{{auth()->user()->referral_code}}">
                                <input hidden  id="reset" name="payment" value="new">
                                <input hidden  name="letchon_id" value="{{$let->id}}">

                                @foreach($freeby as $freebies)
                                    <input hidden  name="priceCake" value="{{$freebies->priceCake}}">
                                    <input hidden  name="priceMom" value="{{$freebies->priceMom}}">
                                    <input hidden  name="sizeCake" value="{{$freebies->sizeCake}}">
                                    <input hidden  name="sizeMom" value="{{$freebies->sizeMom}}">
                                    <input hidden  name="freeb1" value="{{$freebies->freeb1}}">
                                    <input hidden  name="freeb2" value="{{$freebies->freeb2}}">
                                    <input hidden  name="price" value="{{$let->prices}}">
                                    <input hidden  name="size" value="{{$let->kls}}">
                                @endforeach
                                
                                <div>
                                    <input type="checkbox" id="terms_and_conditions" class="input"/>
                                    <label for="terms_and_conditions">Privacy Policy<span style="color: red">*</span></label>     
                                    <p class="text-justify"> &ensp; &ensp; &ensp;By placing an order, you agree that we may collect, use, and protect your information for order processing and customer service purposes only. We do not share your data with others. For details, contact us at sansletchon@gmail.com or 09776162392.
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="container mt-4">
                            <div class="row pb-3">
                                <div class="col d-grid ">
                                    <button type="button" class="btn btn-success btn-lg" id="copyButton" name="submit" value="buy" data-toggle="modal" data-target="#myModal" disabled>Place Order</button>
                                </div>
                            </div>

                            
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header bg-brown">
                                            <h5 class="modal-title text-white" id="exampleModalLabel">Order Information</h5>
                                            <button type="button text-white" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="card">
                                                <div class="card-body">
                                                  <div class="container" style="padding: 0">
                                                    {{-- <p class="my-5 mx-5" style="font-size: 40px;">Order Description</p> --}}
                                                    <div class="row">
                                                      <ul class="list-unstyled">
                                                        <li class="text-black"><p class="paragh">Name:</p><h6 class="fw-boldd" id="copyname"></h6></li>
                                                        <li class="text-black"><p class="paragh">Contact: </p><h6 class="fw-boldd" id="copycontact"></h6></li>
                                                        <li class="text-black"><p class="paragh">Delivery Date: </p><h6 class="fw-boldd" id="copyDate"></h6></li>
                                                        <li class="text-black"><p class="paragh">Delivery Time: </p><h6 class="fw-boldd" id="copyTime"></h6></li>
                                                        <li class="text-black"><p class="paragh">Delivery Address: </p><h6 class="fw-boldd" id="copyStreet" ></h6> <h6 class="fw-boldd" id="copyBarangay" style="display: inline-block;"></h6> <h6 class="fw-boldd" id="copyLocation" style="display: inline-block;"></h6></li>
                                                      </ul>
                                                      <hr>
                                                    </div>
    
                                                    <h6 class="d-block mx-auto text-center pb-2">Your Order</h6>

                                                    @foreach($freeby as $freebies)
                                                    
                                                        <div id="targetHeading" class="d-flex justify-content-between text-uppercase text-success text-sm mb-4" >
                                                            <div style="width: 220px">
                                                                <h6 class="fw-boldd">Lechon</h6>
                                                                <h6 class="fw-boldd">+ {{ $freebies->freeby1 ? $freebies->freeby1->type : 'Cake' }}, {{ $freebies->freeby1 ? $freebies->freeby1->description : null}} ({{ $freebies->sizeCake ? $freebies->sizeCake : 'Small'}}) -additional (₱{{ $freebies->priceCake ? $freebies->priceCake - 500 : '0' }})</h6>
                                                                <h6 class="fw-boldd"> + {{ $freebies->freeby2 ? $freebies->freeby2->type : 'Bilao' }}, {{ ($freebies->freeby2 ? $freebies->freeby2->description : 'Pancit Guisado') }} ({{ $freebies->sizeMom ? $freebies->sizeMom : 'Small'}})-addtional (₱{{ $freebies->priceMom ? $freebies->priceMom : '0' }})</h6>
                                                                <h6 class="fw-boldd d-block"> + 1.5 Coke</h6>
                                                                <h6 class="fw-boldd d-block"> + Sauce</h6>
                                                            </div>
                                                            <h6 class="fw-boldd">{{$freebies->size}}</h6>
                                                            <div>
                                                                <h6 class="fw-boldd d-block">₱{{$let->prices}}</h6>
                                                                <h6 class="fw-boldd d-block">{{ $freebies->priceCake ? '+' . '₱' .$freebies->priceCake - 500: null }}</h6>
                                                                <h6 class="fw-boldd d-block">{{ $freebies->priceMom ? '+' . '₱' .$freebies->priceMom : null }}</h6>
                                                            </div>
                                                        </div>
                                                        <hr class="bg-brown">
                                                     
                                                        @endforeach
    
                                                      <hr>
    
                                                      <div class="d-flex justify-content-between text-uppercase text-success text-sm" >
                                                            <h6 class="fw-boldd">Delivery Fee (<span id="copyLocation2"></span>)</h6>
                                                            <h6 class="fw-boldd">₱ <span id="copylocationFee"></span></h6>
                                                    </div>
    
                                                      <hr style="border: 2px solid black;">
                                               
                                                      <div class="d-flex justify-content-between text-uppercase text-sm" >
                                                        <p class="paragh fw-bold" >Total:</p>
                                                        <p class="fw-bold d-none" id="totalPrice" >₱{{$totalPrice}}</p>
                                                        <p id="displayResult"></p>
                                                    </div>
    
                                                      <hr style="border: 2px solid black; ">
                                                   
                                                    <div class="text-center" style="margin-top: 9px;">
    
                                                    </div>
                                              
                                                  </div>
                                                </div>
                                              </div>
    
                                              <br>
    
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-primary">Pay Now</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Close Content -->


    <script src="/assets/js/admin-dashboard.js"></script>
    <script src="/assets/js/order.js"></script>


@endsection