@extends('layout.admin-dashboard')
@section('content')

<section class="grid grid-cols-1 ">
    <div class="mb-2 text-md uppercase text-[#A65B37]">
        <h3>Activity Log</h3>
    </div>
    <div class="card shadow-md shadow-[#d6987b] overflow-auto">
        <table class="w-full border border-[#A65B37]">
            <thead class="bg-[#A65B37] text-sm text-white">
                <tr>
                    <th class="p-3 text-left whitespace-nowrap">User</th>
                    <th class="p-3 text-left whitespace-nowrap">Decription</th>
                    <th class="p-3 text-left whitespace-nowrap">Time</th>
                </tr>
            </thead>
            <tbody>
                @foreach($show as $shows)
                <tr class="border border-[#A65B37] text-sm sm:max-2xl:text-base">
                    <td class="p-3 whitespace-nowrap ">{{$shows->log_name}}</td>
                    <td class="p-3 whitespace-nowrap ">{{$shows->description}}</td>
                    <td class="p-3 whitespace-nowrap">{{$shows->created_at->diffForHumans()}}</td>
                </tr>
             @endforeach
            </tbody>
        </table>
        {{-- <div class="mt-6 p-4 ">
            {{ $show->links() }}dsdssf
        </div> --}}
    </div>
</section>



@endsection