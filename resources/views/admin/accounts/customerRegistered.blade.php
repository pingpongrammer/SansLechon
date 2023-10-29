@extends('layout.admin-dashboard')
@section('content')

<section class="grid grid-cols-1 ">
    <div class="mb-2 text-md uppercase text-[#A65B37]">
        <h3>Registered Customer</h3>
    </div>
    <div class="card shadow-md shadow-[#d6987b] overflow-auto">
        <table class="w-full border border-[#A65B37]">
            <thead class="bg-[#A65B37] text-sm text-white">
                <tr>
                    <th class="p-3 text-left whitespace-nowrap">No.</th>
                    <th class="p-3 text-left whitespace-nowrap">Name</th>
                    <th class="p-3 text-left whitespace-nowrap">Phone Number</th>
                    <th class="p-3 text-left whitespace-nowrap">Username</th>
                    <th class="p-3 text-left whitespace-nowrap">Referral Link Name</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($customerData as $data)
                <tr class="border border-[#A65B37] text-sm sm:max-xl:text-base">
                    <td class="p-3 whitespace-nowrap " scope="row">{{$loop->iteration }}</td>
                    <td class="p-3 whitespace-nowrap ">{{ $data['customer']->name }}</td>
                    <td class="p-3 whitespace-nowrap">{{ $data['customer']->phone_number }}</td>
                    <td class="p-3 whitespace-nowrap">{{ $data['customer']->username }}</td>
                    @if ($data['influencer'])
                        <td class="p-3 whitespace-nowrap">{{ $data['influencer']->name ?? 'N/A' }}</td>
                    @else
                        <td class="p-3 whitespace-nowrap">Toms Lechon Main Link</td>
                    @endif
                </tr>
             @endforeach
            </tbody>
            
        </table>
    </div>
</section>
@endsection