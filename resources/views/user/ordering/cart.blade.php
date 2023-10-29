@extends('layout.header-footer-layout')
@section('content')
@include('components.customer-alert-message')
<div class="col-lg-12 mt-5">
    <div class="card mb-3 p-4">
        <h3 class="mx-auto d-block">Your Cart <i class="fa fa-shopping-cart mx-2"></i> </h3>
        <hr>

    @if($cartCount <= 0)
    <h5>Your Cart is Empty</h5>
    @endif
    

    @foreach($cartItems as $category)
    @if($category->shop == 'Lechon')
        <div class="pb-4 overflow-auto">
            <div class="d-flex flex-row align-items-center justify-content-between bg-brown-body px-3 rounded overflow-auto">
                <img class="card-img img-fluid p-1 mr-3" src="/assets/img/Lechon.png" alt="Card image cap" id="product-detail" style="width:115px; height:115px">
                    {{-- <h6>{{$category->categories->type}}</h6> --}}
                    <div class="my-3 mr-3">
                        <h6 class="mb-0 pl-4">{{$category->shop}} </h6>
                        <h6 class="mb-0 py-2" style="font-size: 12px">Freebis: </h6>
                        <h6 class="mb-0 text-capitalize order-text flex-fill">+ {{ $category->freeby1 ? $category->freeby1->type : 'Cake' }}, {{ $category->freeby1 ? $category->freeby1->description : null}} ({{ $category->sizeCake ? $category->sizeCake : 'Small'}}) -additional (₱{{ $category->priceCake ? $category->priceCake : '0' }})</h6>
                        <h6 class="mb-0 text-capitalize order-text flex-fill"> + {{ $category->freeby2 ? $category->freeby2->type : 'Bilao' }}, {{ ($category->freeby2 ? $category->freeby2->description : 'Pancit Guisado') }} ({{ $category->sizeMom ? $category->sizeMom : 'Small'}})-addtional (₱{{ $category->priceMom ? $category->priceMom : '0' }})</h6>
                        <h6 class="mb-0 order-text"> + 1.5 Coke</h6>
                        <h6 class="mb-0 order-text"> + Sauce</h6>
                    </div>
            
                    <h6 class="mr-3 order-text">{{$category->size}}</h6>
                    <div class="mr-3 order-text">
                        <h6 class="order-text">₱{{$category->price}}</h6>
                        <h6 class="order-text">{{ $category->priceCake ? '+' . '₱' .$category->priceCake : null }}</h6>
                        <h6 class="order-text">{{ $category->priceMom ? '+' . '₱' .$category->priceMom : null }}</h6>
                    </div>
                    <form method="POST" action="{{ url('cartDelete', $category->id) }}">
                        @csrf
                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash mx-2"></i></button>
                    </form>
            </div>
        </div>
        @endif
        @endforeach
    
        
    @foreach($cartItems as $category)
        @if($category->shop == 'cake')
            <div class="shop">
                <img src="/assets/img/shop1.jpg" class="img-logo">
                <h5>Sweet Bites <span>by: Cindy Barcenas</span></h5>
            </div>
            @break
        @endif
    @endforeach
    

        @foreach($cartItems as $category)
        @if($category->shop == 'cake')
            <div class="pt-1">
                <div class="d-flex flex-row align-items-center justify-content-between bg-brown-body px-3 rounded">
                    <img class="card-img rounded-0 img-fluid" id="preview" src="{{$category->categories->img ? asset ('storage/' .$category->categories->img) : asset('/storage/no/-image.png')}}" alt="" style="width:85px; height:85px"/>
                    <h6 class="text-capitalize">{{$category->categories->type}}</h6>
                        <h6 class="text-capitalize">{{$category->categories->description}}</h6>
                        <h6 class="text-capitalize">{{$category->size}}</h6>
                        <h6 class="text-capitalize">₱{{$category->price}}</h6>
                        <form method="POST" action="{{ url('cartDelete', $category->id) }}">
                            @csrf
                            {{-- @method('DELETE') --}}
                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash mx-2"></i></button>
                        </form>
                </div>
            </div>
            @endif
            @endforeach
    
        
            @foreach($cartItems as $category)
            @if($category->shop == 'mombizz')
            <div class="shop pt-4">
                <img src="/assets/img/shop2.jpg" class="img-logo">
                <h5>MOMBIZZ</h5>
            </div>
            @break
            @endif
        @endforeach

       
            @foreach($cartItems as $category)
            @if($category->shop == 'mombizz')
                <div class="pt-1">
                    <div class="d-flex flex-row align-items-center justify-content-between bg-brown-body px-3 rounded">
                        <img class="card-img rounded-0 img-fluid" id="preview" src="{{$category->categories->img ? asset ('storage/' .$category->categories->img) : asset('/storage/no/-image.png')}}" alt="" style="width:85px; height:85px"/>
                        <h6 class="text-capitalize">{{$category->categories->type}}</h6>
                        <h6 class="text-capitalize">{{$category->categories->description}}</h6>
                        <h6 class="text-capitalize">{{$category->size}}</h6>
                        <h6 class="text-capitalize">₱{{$category->price}}</h6>
                        <form method="POST" action="{{ url('cartDelete', $category->id) }}">
                            @csrf
                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash mx-2"></i></button>
                        </form>
                    </div>
                </div>
            @endif
        @endforeach

        <hr>
        
        @if($cartCount > 0)

        <div class="mt-5 block mx-auto border border-2 border-black">
            <div class="flex-shrink-1 flex-grow-0 mx-5">
                <h4>Total Payment</h4>
            </div>


            <hr>
            @foreach($cartItems as $category)
            @if($category->categories)
                {{-- <div class="d-flex justify-content-between align-items-center px-3">
                    <h6>{{$category->categories->type}}</h6>  
                    <h6>₱{{$category->price}}</h6>
                </div>
                <hr> --}}
            @endif
        @endforeach
            <div class="d-flex justify-content-between align-items-center px-3">
                <h6>Total</h6>
                <h6>₱{{$totalPrice}}</h6>
            </div>
            <a href="order-form" class="btn btn-success btn-md mb-2 mt-5 d-block mx-auto">Checkout</a>
        </div>
        @endif

            

    </div>
</div>

@endsection