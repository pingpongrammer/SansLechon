@extends('layout.header-footer-layout')
@section('content')
@include('components.customer-alert-message')

<h3 class="text-center m-3">Pending Order</h3>

<tbody>
    @foreach($orderData as $order)
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-brown">
                <h5 class="modal-title text-white" id="exampleModalLabel">Order Information (Order Paid)</h5>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <div class="container" style="padding: 0">
                            <div class="row">
                                @foreach($order['items'] as $letchon)
                                @if(!$loop->first)
                                    <!-- Display order information only once per order ID -->
                                    @continue
                                @endif
                                <ul class="list-unstyled">
                                    <li class="text-black"><p class="paragh">Name:</p><h6 class="fw-boldd">{{ $letchon->orders->name }}</h6></li>
                                    <li class="text-black"><p class="paragh">Contact: </p><h6 class="fw-boldd">{{ $letchon->orders->phone_number }}</h6></li>
                                    <li class="text-black"><p class="paragh">Delivery Date: </p><h6 class="fw-boldd">{{ $letchon->orders->deliveryDate }}</h6></li>
                                    <li class="text-black"><p class="paragh">Delivery Time: </p><h6 class="fw-boldd">{{ $letchon->orders->deliveryTime }}</h6></li>
                                    <li class="text-black"><p class="paragh">Delivery Address: </p><h6 class="fw-boldd">{{ $letchon->orders->street }} {{ $letchon->orders->barangay }} {{ $letchon->orders->location }}</h6></li>
                                </ul>
                                @endforeach
                                <hr>
                            </div>

                            <h6 class="d-block mx-auto text-center pb-2">Orders</h6>
                            
                            @foreach($order['items'] as $letchon)
                                @if($letchon->letchon)
                                    <div id="targetHeading" class="d-flex justify-content-between text-uppercase text-success text-sm mb-4" >
                                        <div style="width: 220px">
                                            <h6 class="fw-boldd">{{$letchon->shop}} </h6>
                                            <h6 class="fw-boldd">+ {{ $letchon->freeby1 ? $letchon->freeby1->type : 'Cake' }}, {{ $letchon->freeby1 ? $letchon->freeby1->description : null}} ({{ $letchon->sizeCake ? $letchon->sizeCake : 'Small'}}) -additional (₱{{ $letchon->priceCake ? $letchon->priceCake : '0' }})</h6>
                                            <h6 class="fw-boldd"> + {{ $letchon->freeby2 ? $letchon->freeby2->type : 'Bilao' }}, {{ ($letchon->freeby2 ? $letchon->freeby2->description : 'Pancit Guisado') }} ({{ $letchon->sizeMom ? $letchon->sizeCake : 'Small'}})-addtional (₱{{ $letchon->priceMom ? $letchon->priceMom : '0' }})</h6>
                                            <h6 class="fw-boldd d-block"> + 1.5 Coke</h6>
                                            <h6 class="fw-boldd d-block"> + Sauce</h6>
                                        </div>
                                        <h6 class="fw-boldd">{{$letchon->size}}</h6>
                                        <div>
                                            <h6 class="fw-boldd d-block">₱{{$letchon->price}}</h6>
                                            <h6 class="fw-boldd d-block">{{ $letchon->priceCake ? '+' . '₱' .$letchon->priceCake : null }}</h6>
                                            <h6 class="fw-boldd d-block">{{ $letchon->priceMom ? '+' . '₱' .$letchon->priceMom : null }}</h6>
                                        </div>
                                    </div>
                                    <hr class="bg-brown">
                                @endif
                            @endforeach

                            @foreach($order['items'] as $letchon)
                                @if($letchon->categories)
                                    <div id="targetHeading" class="d-flex justify-content-between text-uppercase text-success text-sm" >
                                        <h6 class="fw-boldd">{{$letchon->categories->type}}</h6>
                                        <h6 class="fw-boldd">{{$letchon->categories->description}}</h6>
                                        <h6 class="fw-boldd">{{$letchon->size}}</h6>
                                        <h6 class="fw-boldd">₱{{$letchon->price}}</h6>
                                    </div>
                                @endif
                            @endforeach

                            <hr>

                            <div class="d-flex justify-content-between text-uppercase text-success text-sm" >
                                <h6 class="fw-boldd">Delivery Fee (<span >{{ $order['location'] }}</span>)</h6>
                                <h6 class="fw-boldd">₱ <span id="copylocationFee">{{ $order['fee'] }}</span></h6>
                            </div>

                            <hr style="border: 2px solid black;">
                       
                            <div class="d-flex justify-content-between text-uppercase text-sm" >
                                <p class="paragh fw-bold" >Total:</p>
                                <p class="fw-bold d-none" id="totalPrice" ></p>
                                <p id="displayResult">₱{{ $order['totalPrice'] }}</p>
                            </div>

                            <hr style="border: 2px solid black; ">
                           
                            <div class="text-center" style="margin-top: 9px">

                            </div>
                      
                        </div>
                    </div>
                </div>

                <br>

            </div>
        </div>
    </div>
    @endforeach
</tbody>

@endsection
