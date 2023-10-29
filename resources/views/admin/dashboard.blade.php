@extends('layout.admin-dashboard')

@section('content')

@include('components.alert-message')
<section class=" grid lg:grid-cols-4 gap-4 sm:grid-cols-2">
    <div class="card shadow-sm shadow-[#d6987b] flex justify-start items-center pt-2 pb-2 bg-white">
        <div class="mr-6">
            <i class="fa fa-wallet text-6xl m-4 text-amber-700"></i>
        </div>
        <div>
            <h1 class="text-4xl">{{$sales}}</h1>
            <h3 class="text-sm">Total Sales</h3>
        </div>
    </div>
    
    <div class="card shadow-sm shadow-[#d6987b] flex justify-start items-center pt-2 pb-2 bg-white">
        <div class="mr-6">
            <i class="fa fa-user-circle-o text-6xl m-4 text-amber-700" ></i>
        </div>
        <div>
            <h1 class="text-4xl">{{$newCus}}</h1>
            <h3 class="text-sm">New customer</h3>
        </div>
    </div>
    <div class="card shadow-sm shadow-[#d6987b] flex justify-start items-center pt-2 pb-2 bg-white">
        <div class="mr-6">
            <i class="fa fa-users text-6xl m-4 text-amber-700"></i>
        </div>
        <div>
            <h1 class="text-4xl">{{$succ}}</h1>
            <h3 class="text-sm">Total Orders</h3>
        </div>
    </div>
    <div class="card shadow-sm shadow-[#d6987b] flex justify-start items-center pt-2 pb-2 bg-white">
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