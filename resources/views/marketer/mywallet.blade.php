@extends('layout.affiliate-dashboard')
@section('content')
@include('components.alert-message')

<section class=" grid sm:max-2xl:grid-cols-3 gap-4">
<div class="shadow-md shadow-[#d6987b] bg-white">
    <h1 class="text-center bg-[#A65B37] p-1 text-white font-bold"> Earning Summary</h1>
    <div class="flex justify-center items-center h-56">
        <h5 class="text-xl">Total Earnings: <span class="text-4xl text-green-600">₱{{$totalComission}}</span></h5>
    </div>
    <div class="flex justify-end m-4">
        <button onclick="requestPayDialog()" class="p-2 bg-[#A65B37] hover:bg-[#fcc1a5] rounded-xl text-white">Request Payout</button>
    </div>
</div>

<div class="card shadow-md sm:max-2xl:col-span-2 shadow-[#d6987b] overflow-auto">
    <table class="w-full border border-[#A65B37]">
        <thead class="bg-[#A65B37] text-sm text-white">
            <tr>
                <th class="p-3 text-left whitespace-nowrap">No.</th>
                <th class="p-3 text-left whitespace-nowrap">Date</th>
                <th class="p-3 text-left whitespace-nowrap">Customer</th>
                <th class="p-3 text-left whitespace-nowrap">Amount</th>
                <th class="p-3 text-left whitespace-nowrap">Qty</th>
                <th class="p-3 text-left whitespace-nowrap">Comission</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($successfulOrders as $order)
            <tr class="border border-[#A65B37] text-sm sm:max-2xl:text-base">
                <td class="p-3 whitespace-nowrap ">{{ $date[$order->id] }}</td>
                <td class="p-3 whitespace-nowrap">{{ $customer[$order->id] }}</td>
                {{-- <td class="p-3 whitespace-nowrap">{{$partners->price}}</td> --}}

                <td class="p-3 whitespace-nowrap">₱{{ $commissionData[$order->id] }}</td>
            </tr>
         @endforeach
        </tbody>
        
    </table>
</div>
</section>


 {{-- Request Payout Modal --}}
 <form method="POST" action="/requestPayoutStore" enctype="multipart/form-data">
    @csrf
    <div id="requestDialog" class="fixed bg-black left-0 top-0 bg-opacity-50 w-screen h-screen justify-center items-center  hidden transition-opacity duration-500">
        <div class="bg-white rounded shadow-md p-6 w-[85%] lg:max-2xl:w-[40%] ">
            <div class=" flex">
                <h3 class="text-2xl font-bold w-[95%]">Confirm Password</h3>
                <button type="button" onclick="hideRequestDialog()" class="-mt-5">X</button>
            </div>
            <hr class="w-full">
            <div class="pt-4">
                <h2 class="text-md">Please Enter Your Password to Confirm Your Request</h2>
                <h4 class="text-xs text-yellow-500">This action connot be undone</h4>
            </div>
            
            <input hidden value="" name="comission">
            <input hidden value="{{auth()->user()->name}}" name="name">
            <input hidden value="{{auth()->user()->username}}" name="username">
            <input hidden value="{{auth()->user()->phone_number}}" name="phone_number">
            <input hidden value="{{auth()->user()->referral_code}}" name="referral_code">

            
            <div class="mt-10">
                    <label for="">Password</label>
                    <input type="password" name="verify" placeholder="Input Password" class="border w-full border-[#A65B37] rounded-lg p-2 outline-amber-800" required>
            </div>

            <div class="flex justify-end mt-14">
                <button type="submit" class="bg-[#A65B37] px-6 py-2 rounded-md hover:scale-110 transition-transform text-white ">
                    Confirm
                </button>
            </div>

        </div>
    </div>
</form>

@endsection