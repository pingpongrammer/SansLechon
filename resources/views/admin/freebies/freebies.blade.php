@extends('layout.admin-dashboard')
@section('content')
@include('components.alert-message')

<section class="grid grid-cols-1 ">
    <div style="display: flex; justify-content: space-between; align-items: center flex justify-between;">
        <div class="mb-2 text-lg uppercase text-[#A65B37] font-bold ">
            <h3>Manage Freebies Cake</h3>
        </div>
        <a class="bg-[#A65B37] px-2 rounded-md pt-2 text-white text-sm " href="/add-freebies"> <i class="fas fa-plus"></i>Add Freebies</a>
    </div>
    

    <div class="card shadow-md shadow-[#d6987b] overflow-auto mt-1">
        <table class="w-full border border-[#A65B37]">
            <thead class="bg-[#A65B37] text-sm text-white">
                <tr>
                    <th class="p-3 text-left whitespace-nowrap">No.</th>
                    <th class="p-3 text-left whitespace-nowrap">Image</th>
                    <th class="p-3 text-left whitespace-nowrap">Shop</th>
                    <th class="p-3 text-left whitespace-nowrap">Type</th>
                    <th class="p-3 text-left whitespace-nowrap">Description</th>
                    <th class="p-3 text-left whitespace-nowrap">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($freeb1 as $freebies)
                <tr class="border border-[#A65B37] text-sm sm:max-2xl:text-base">
                    <td class="p-3 whitespace-nowrap " scope="row">{{$loop->iteration }}</td>
                    <td class="p-3 whitespace-nowrap "> <img class="freebies-image rounded-3 img-fluid" id="preview" src="{{ asset('storage/' . $freebies->img) }}" alt=""/></td>
                    <td class="p-3 whitespace-nowrap">{{$freebies->shop}}</td>
                    <td class="p-3 whitespace-nowrap">{{$freebies->type}}</td>
                    <td class="p-3 whitespace-nowrap">{{$freebies->description}}</td>
               
                    <td class=" whitespace-nowrap flex items-center mt-4">
                        <a href="/freebiesView/{{$freebies->id}}" class="bg-amber-200 text-black py-1 px-2 rounded hover:bg-amber-300 mr-2">View</a>
                        <form method="POST" action="{{ url('freebiesDelete', $freebies->id) }}">
                            @csrf
                                <button type="submit" class="bg-red-400 text-black py-1 px-2 rounded hover:bg-red-600">Delete</button>
                        </form>
                    </td>
                </tr>
             @endforeach
            </tbody>
            
        </table>
    </div>

    <div style="display: flex; justify-content: space-between; align-items: center flex justify-between ;">
        <div class="mb-2 text-lg uppercase text-[#A65B37] font-bold mt-3">
            <h3>Manage Freebies Minimalist</h3>
        </div>
    </div>
    

    <div class="card shadow-md shadow-[#d6987b] overflow-auto mt-1">
        <table class="w-full border border-[#A65B37]">
            <thead class="bg-[#A65B37] text-sm text-white">
                <tr>
                    <th class="p-3 text-left whitespace-nowrap">No.</th>
                    <th class="p-3 text-left whitespace-nowrap">Image</th>
                    <th class="p-3 text-left whitespace-nowrap">Shop</th>
                    <th class="p-3 text-left whitespace-nowrap">Type</th>
                    <th class="p-3 text-left whitespace-nowrap">Description</th>
                    <th class="p-3 text-left whitespace-nowrap">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($freeb3 as $freebies)
                <tr class="border border-[#A65B37] text-sm sm:max-2xl:text-base">
                    <td class="p-3 whitespace-nowrap " scope="row">{{$loop->iteration }}</td>
                    <td class="p-3 whitespace-nowrap "> <img class="freebies-image rounded-3 img-fluid" id="preview" src="{{ asset('storage/' . $freebies->img) }}" alt=""/></td>
                    <td class="p-3 whitespace-nowrap">{{$freebies->shop}}</td>
                    <td class="p-3 whitespace-nowrap">{{$freebies->type}}</td>
                    <td class="p-3 whitespace-nowrap">{{$freebies->description}}</td>
               
                    <td class=" whitespace-nowrap flex items-center mt-4">
                        <a href="/freebiesView/{{$freebies->id}}" class="bg-amber-200 text-black py-1 px-2 rounded hover:bg-amber-300 mr-2">View</a>
                        <form method="POST" action="{{ url('freebiesDelete', $freebies->id) }}">
                            @csrf
                                <button type="submit" class="bg-red-400 text-black py-1 px-2 rounded hover:bg-red-600">Delete</button>
                        </form>
                    </td>
                </tr>
             @endforeach
            </tbody>
            
        </table>
    </div>

    <div style="display: flex; justify-content: space-between; align-items: center;">
        <div class="mb-2 text-lg uppercase text-[#A65B37] font-bold mt-6">
            <h3>Manage Freebies Mombizz</h3>
        </div>

    </div>

    <div class="card shadow-md shadow-[#d6987b] overflow-auto mb-14">
        <table class="w-full border border-[#A65B37]">
            <thead class="bg-[#A65B37] text-sm text-white">
                <tr>
                    <th class="p-3 text-left whitespace-nowrap">No.</th>
                    <th class="p-3 text-left whitespace-nowrap">Image</th>
                    <th class="p-3 text-left whitespace-nowrap">Shop</th>
                    <th class="p-3 text-left whitespace-nowrap">Type</th>
                    <th class="p-3 text-left whitespace-nowrap">Description</th>
                    <th class="p-3 text-left whitespace-nowrap">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($freeb2 as $freebies)
                <tr class="border border-[#A65B37] text-sm sm:max-2xl:text-base">
                    <td class="p-3 whitespace-nowrap " scope="row">{{$loop->iteration }}</td>
                    <td class="p-3 whitespace-nowrap "> <img class="freebies-image rounded-3 img-fluid" id="preview" src="{{ asset('storage/' . $freebies->img) }}" alt=""/></td>
                    <td class="p-3 whitespace-nowrap">{{$freebies->shop}}</td>
                    <td class="p-3 whitespace-nowrap">{{$freebies->type}}</td>
                    <td class="p-3 whitespace-nowrap">{{$freebies->description}}</td>
               
                    <td class=" whitespace-nowrap flex items-center mt-4">
                        <a href="/freebiesView/{{$freebies->id}}" class="bg-amber-200 text-black py-1 px-2 rounded hover:bg-amber-300 mr-2">View</a>
                        <form method="POST" action="{{ url('freebiesDelete', $freebies->id) }}">
                            @csrf
                                <button type="submit" class="bg-red-400 text-black py-1 px-2 rounded hover:bg-red-600">Delete</button>
                        </form>
                    </td>
                </tr>
             @endforeach
            </tbody>
            
        </table>
    </div>
</section>

@endsection