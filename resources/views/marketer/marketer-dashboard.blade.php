@extends('layout.affiliate-dashboard')
@section('content')
@include('components.alert-message')

<section class=" grid lg:grid-cols-2 gap-4 sm:grid-cols-2 w-5/6 mx-auto">
    <div class="card shadow-md shadow-[#d6987b] flex justify-start items-center pt-2 pb-2 bg-white">
        <div class="mr-6">
            <i class="fa fa-wallet text-6xl m-4 text-amber-700"></i>
        </div>
        <div>
            <h1 class="text-4xl">{{$comission}}</h1>
            <h3 class="text-sm">Comission</h3>
        </div>
    </div>
    
    <div class="card shadow-md shadow-[#d6987b] flex justify-start items-center pt-2 pb-2 bg-white">
        <div class="mr-6">
            <i class="fa fa-user-circle-o text-6xl m-4 text-amber-700" ></i>
        </div>
        <div>
            <h1 class="text-4xl">{{$totalOrders}}</h1>
            <h3 class="text-sm">Total Orders</h3>
        </div>
    </div>
    <div class="card shadow-md shadow-[#d6987b] flex justify-start items-center pt-2 pb-2 bg-white">
        <div class="mr-6">
            <i class="fa fa-users text-6xl m-4 text-amber-700"></i>
        </div>
        <div>
            <h1 class="text-4xl">{{$pageViewCount}}</h1>
            <h3 class="text-sm">Clicks</h3>
        </div>
    </div>
    <div class="card shadow-md shadow-[#d6987b] flex justify-start items-center pt-2 pb-2 bg-white">
        <div class="mr-6">
            <i class="fa fa-eye text-6xl m-4 text-amber-700"></i>
        </div>
        <div>
            <h1 class="text-4xl">{{$webviews}}</h1>
            <h3 class="text-sm">Website Views</h3>
        </div>
    </div>
    </section>

@endsection