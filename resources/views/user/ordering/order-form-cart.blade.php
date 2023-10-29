@extends('layout.header-footer-layout')
@section('content')
@include('components.customer-alert-message')


<link rel="stylesheet" href="/assets/css/order.css">

<section class="bg-brown-body">
    <div class="container pb-5">                    
        <div class="row">        
            <!-- col end -->
            <div class="col-lg-10 mt-5 mx-auto">
                <div class="card">
                    <div class="card-body">

                            <form action="/orderStore" enctype="multipart/form-data" class="col-md-11 m-auto" method="post" role="form">
                                @csrf

                            <div class="row">
                                <div class="form-group col-md-12 mb-1">
                                    <h6 class="text-center" style="font-size:30px; color:rgb(7, 7, 7); font-weight:700" for="inputsubject">Order Form</h6>
                                </div>

                                <hr>

                                        
                                <div class="form-group col-md-6 mb-3">
                                    <h6 style="font-size:12px">Name<span style="color: red">*</span></h6>
                                    <input type="text" class="input form-control mt-1" id="inputName"  name="name" placeholder="Name">
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <h6 style="font-size:12px">Contact Number<span style="color: red">*</span></h6>
                                    <input type="text" class="input form-control mt-1" id="inputContact" name="phone_number" placeholder="Phone Number">
                                </div>

                                {{-- <div class="form-group col-md-2 mb-3">
                                    <h6 style="font-size:12px" for="inputsubject">Quantity<span style="color: red">*</span></h6>
                                    <input type="number" class="input form-control mt-1" id="inputQty" name="qty" placeholder="Quantity">
                                </div> --}}
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
                                
                                <div>
                                    <input type="checkbox" id="terms_and_conditions" class="input" />
                                    <label for="terms_and_conditions " style="font-size: 12px">Privacy Policy<span style="color: red">*</span></label>     
                                    <p class="text-justify" style="font-size: 12px"> &ensp; &ensp; &ensp;By placing an order, you agree that we may collect, use, and protect your information for order processing and customer service purposes only. We do not share your data with others. For details, contact us at sansletchon@gmail.com or 09776162392.
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

                                                <h6 class="d-block mx-auto text-center pb-2">Orders</h6>
                                                
                                                @foreach($cartItems as $category)
                                                @if($category->letchon)
                                                    <div id="targetHeading" class="d-flex justify-content-between text-uppercase text-success text-sm mb-4" >
                                                        <div style="width: 220px">
                                                            <h6 class="fw-boldd">{{$category->shop}} </h6>
                                                            <h6 class="fw-boldd">+ {{ $category->freeby1 ? $category->freeby1->type : 'Cake' }}, {{ $category->freeby1 ? $category->freeby1->description : null}} ({{ $category->sizeCake ? $category->sizeCake : 'Small'}}) -additional (₱{{ $category->priceCake ? $category->priceCake : '0' }})</h6>
                                                            <h6 class="fw-boldd"> + {{ $category->freeby2 ? $category->freeby2->type : 'Bilao' }}, {{ ($category->freeby2 ? $category->freeby2->description : 'Pancit Guisado') }} ({{ $category->sizeMom ? $category->sizeCake : 'Small'}})-addtional (₱{{ $category->priceMom ? $category->priceMom : '0' }})</h6>
                                                            <h6 class="fw-boldd d-block"> + 1.5 Coke</h6>
                                                            <h6 class="fw-boldd d-block"> + Sauce</h6>
                                                        </div>
                                                        <h6 class="fw-boldd">{{$category->size}}</h6>
                                                        <div>
                                                            <h6 class="fw-boldd d-block">₱{{$category->price}}</h6>
                                                            <h6 class="fw-boldd d-block">{{ $category->priceCake ? '+' . '₱' .$category->priceCake : null }}</h6>
                                                            <h6 class="fw-boldd d-block">{{ $category->priceMom ? '+' . '₱' .$category->priceMom : null }}</h6>
                                                        </div>
                                                    </div>
                                                    <hr class="bg-brown">
                                                    @endif
                                                    @endforeach

                                                @foreach($cartItems as $category)
                                                @if($category->categories)
                                                    <div id="targetHeading" class="d-flex justify-content-between text-uppercase text-success text-sm" >
                                                        <h6 class="fw-boldd">{{$category->categories->type}}</h6>
                                                        <h6 class="fw-boldd">{{$category->categories->description}}</h6>
                                                        <h6 class="fw-boldd">{{$category->size}}</h6>
                                                        <h6 class="fw-boldd">₱{{$category->price}}</h6>
                                                    </div>
                                                   
                                                    @endif
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

<script src="/assets/js/admin-dashboard.js"></script>
<script src="/assets/js/order.js"></script>

@endsection