@extends('layout.admin-dashboard')
@section('content')

<section class="grid grid-cols-1 ">
    <div class="mb-2 text-sm uppercase text-[#A65B37]">
        <h3>{{$user->name}}'s Comission</h3>
    </div>
    <div class="card shadow-md shadow-[#d6987b] overflow-auto">
        <table class="w-full border border-[#A65B37]">
            <thead class="bg-[#A65B37] text-sm text-white">
                <tr>
                    <th class="p-3 text-left whitespace-nowrap">No.</th>
                    <th class="p-3 text-left whitespace-nowrap">Date</th>
                    <th class="p-3 text-left whitespace-nowrap">Customer</th>
                    {{-- <th class="p-3 text-left whitespace-nowrap">Amount</th> --}}
                    <th class="p-3 text-left whitespace-nowrap">Comission</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($successfulOrders as $order)
                <tr class="border border-[#A65B37] text-sm sm:max-2xl:text-base">
                    <td class="p-3 whitespace-nowrap " scope="row">{{$loop->iteration }}</td>
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

@endsection