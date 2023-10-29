@extends('layout.admin-dashboard')
@section('content')

<section class="grid grid-cols-1 ">
    <div class="mb-2 text-md uppercase text-[#A65B37]">
        <h3>Affiliate Partners</h3>
    </div>
    <div class="card shadow-md shadow-[#d6987b] overflow-auto">
        <table class="w-full border border-[#A65B37]">
            <thead class="bg-[#A65B37] text-sm text-white">
                <tr>
                    <th class="p-3 text-left whitespace-nowrap">No.</th>
                    <th class="p-3 text-left whitespace-nowrap">Name</th>
                    <th class="p-3 text-left whitespace-nowrap">Address</th>
                    <th class="p-3 text-left whitespace-nowrap">Email</th>
                    <th class="p-3 text-left whitespace-nowrap">Phone Number</th>
                    <th class="p-3 text-left whitespace-nowrap">Username</th>
                    <th class="p-3 text-left whitespace-nowrap">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($acc as $account)
                <tr class="border border-[#A65B37] text-sm sm:max-xl:text-base">
                    <td class="p-3 whitespace-nowrap " scope="row">{{$loop->iteration }}</td>
                    <td class="p-3 whitespace-nowrap ">{{$account->name}}</td>
                    <td class="p-3 whitespace-nowrap">{{$account->address}}</td>
                    <td class="p-3 whitespace-nowrap">{{$account->email}}</td>
                    <td class="p-3 whitespace-nowrap">{{$account->phone_number}}</td>
                    <td class="p-3 whitespace-nowrap">{{$account->username}}</td>
                    <td class="p-3 whitespace-nowrap"> <a href="/affiliatePartnerView/{{$account->id}}" class="bg-amber-200 text-black py-1 px-4 rounded hover:bg-amber-300">View</a></td>
                   
                </tr>
             @endforeach
            </tbody>
            
        </table>
    </div>
</section>
@endsection