@extends('layout.admin-dashboard')
@section('content')
@include('components.alert-message')

<section class="grid grid-cols-1 ">
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <div class="mb-2 text-lg uppercase text-[#A65B37] font-bold">
            <h3>Cancelled Orders</h3>
        </div>
        <div class="flex mt-2 m-3 bg-[#e0865c] hover:bg-[#aa613f] p-2 rounded-lg duration-300 items-center text-orange-50 relative" onclick="toggleDropdown()" id="dropdownButton">
                <i class="fa fa-pencil pr-2"></i>
                <div class="w-16">
                    <button class="text-sm">Cancelled</button>
                </div>
                <i class="fa fa-arrow-down pr-2 flex justify-end text-xs"></i>

            <!-- Dropdown -->
            <div class="absolute -bottom-[180px] left-1/2 transform -translate-x-1/2">
                <div class=" hidden ml-10 text-orange-50 text-sm bg-[#e0865c] rounded-lg px-1" id="submenu" >
                    <a href="/adminOrders" class="hover:bg-orange-50 p-2 rounded-lg hover:text-gray-950 block">All</a>
                    <a href="/newOrder" class="hover:bg-orange-50 p-2 rounded-lg hover:text-gray-950 block">New</a>
                    <a href="/pendingOrder" class="hover:bg-orange-50 p-2 rounded-lg hover:text-gray-950 block">Pending</a>
                    <a href="/sucessOrder" class="hover:bg-orange-50 p-2 rounded-lg hover:text-gray-950 block">Successful </a>
                    <a href="/cancelOrder" class="hover:bg-orange-50 p-2 rounded-lg hover:text-gray-950 block">Cancelled</a>
                </div>
            </div>
            <!--End Dropdown -->
        </div>
    </div>
    

    <div class="card shadow-md shadow-[#d6987b] overflow-auto">
        <table class="w-full border border-[#A65B37]">
            <thead class="bg-[#A65B37] text-sm text-white">
                <tr>
                    <th class="p-3 text-left whitespace-nowrap">No.</th>
                    <th class="p-3 text-left whitespace-nowrap">Name</th>
                    <th class="p-3 text-left whitespace-nowrap">Contact Number</th>
                    <th class="p-3 text-left whitespace-nowrap">Delivery Address</th>
                    <th class="p-3 text-left whitespace-nowrap">Size</th>
                    <th class="p-3 text-left whitespace-nowrap">Status</th>
                    <th class="p-3 text-left whitespace-nowrap">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($letc as $letchon)
                <tr class="border border-[#A65B37] text-sm sm:max-2xl:text-base">
                    <td class="p-3 whitespace-nowrap " scope="row">{{$loop->iteration }}</td>
                    <td class="p-3 whitespace-nowrap ">{{$letchon->name}}</td>
                    <td class="p-3 whitespace-nowrap">{{$letchon->phone_number}}</td>
                    <td class="p-3 whitespace-nowrap">{{$letchon->street}} {{$letchon->barangay}} {{$letchon->location}}</td>
                    <td class="p-3 whitespace-nowrap">{{$letchon->kls}}</td>
                    <td class="p-3 whitespace-nowrap text-xs"><span class="p-1 bg-red-300">Cancelled</span></td>
                    <td class="p-3 whitespace-nowrap"><a href="/adminOrdersView/{{$letchon->id}}" class="bg-amber-200 text-black py-1 px-4 rounded hover:bg-amber-300">View</a></td>
                </tr>
             @endforeach
            </tbody>
            
        </table>
    </div>
</section>

@endsection