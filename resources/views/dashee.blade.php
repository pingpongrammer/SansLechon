@extends('layout.admin-dashboard')
@section('content')
@include('components.alert-message')

<section class="grid grid-cols-4 bg-white shadow-md shadow-[#A65B37]">
    <div class= "text-black bg-orange-200 border border-[#A65B37]">
        <img class="block mx-auto w-44 pt-3 " src="../assets/img/loginbg.png" alt="">
        <button class="block p-2 mx-auto bg-orange-200 mt-3 rounded-md text-black"><i class="fa fa-plus" ></i>Compose Message</button>
        
        <div class="flex justify-start bg-orange-100 mx-5 mt-3 mb-1 py-3 shadow-sm shadow-[#A65B37]">
            <button class="ml-2"> <i class="fa fa-inbox" ></i> Inbox</button>
        </div>

        <div class="flex justify-start bg-orange-100 mx-5 mb-3 py-3 shadow-sm shadow-[#A65B37]">
            <button class="ml-2"> <i class="fa fa-envelope" ></i> Sent Message</button>
        </div>
    </div>
    <div class="col-span-3 text-black">
        <div class="flex justify-center items-center h-16 text-3xl text-white bg-[#A65B37]">Inbox</div>
        @foreach($message as $messages)
            @if($messages->num == 0)
                <div class="flex justify-between items-center h-12 text-sm px-4 shadow-sm shadow-[#A65B37] bg-orange-200">
                    <div>Message From:</div>
                    <div>{{$messages->name}}/{{$messages->phone_number}}</div>
                <form action="/messageView/{{$messages->id}}" enctype="multipart/form-data" method="POST" role="form">
                @csrf
                @method('PUT')
                    <div><button type="submit" >View</button></div>
                </form>
                </div>
            @endif

            @if($messages->num == 1)
            <div class="flex justify-between items-center h-12 text-sm px-4 shadow-sm shadow-[#A65B37]">
                <div>Message From:</div>
                <div>{{$messages->name}}/{{$messages->phone_number}}</div>
            <form action="/messageView/{{$messages->id}}" enctype="multipart/form-data" method="POST" role="form">
            @csrf
            @method('PUT')
                <div><button type="submit" >View</button></div>
            </form>
            </div>
        @endif
        @endforeach
    </div>
    
</section>


@endsection