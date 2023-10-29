@extends('layout.admin-dashboard')
@section('content')

<section class="grid grid-cols-1 ">
    <div class="mb-2 text-md uppercase text-[#A65B37]">
        <h3>Request Payments</h3>
    </div>
    <div class="card shadow-md shadow-[#d6987b] overflow-auto">
        <table class="w-full border border-[#A65B37]">
            <thead class="bg-[#A65B37] text-sm text-white">
                <tr>
                    <th class="p-3 text-left whitespace-nowrap">No.</th>
                    <th class="p-3 text-left whitespace-nowrap">Name</th>
                    <th class="p-3 text-left whitespace-nowrap">Username</th>
                    <th class="p-3 text-left whitespace-nowrap">Phone Number</th>
                    <th class="p-3 text-left whitespace-nowrap">Comission</th>
                    <th class="p-3 text-left whitespace-nowrap">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($payreq as $paymentreq)
                <tr class="border border-[#A65B37] text-sm sm:max-2xl:text-base">
                    <td class="p-3 whitespace-nowrap " scope="row">{{$loop->iteration }}</td>
                    <td class="p-3 whitespace-nowrap ">{{$paymentreq->name}}</td>
                    <td class="p-3 whitespace-nowrap">{{$paymentreq->username}}</td>
                    <td class="p-3 whitespace-nowrap">{{$paymentreq->phone_number}}</td>
                    <td class="p-3 whitespace-nowrap">{{$paymentreq->comission}}</td>
                    <td class="p-3 whitespace-nowrap"><a href="/requestPaymentView/{{$paymentreq->id}}" class="bg-amber-200 text-black py-1 px-4 rounded hover:bg-amber-300">View</a></td>
                </tr>
             @endforeach
            </tbody>
            
        </table>
    </div>
</section>

@endsection