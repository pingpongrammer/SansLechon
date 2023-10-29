@extends('layout.admin-dashboard')
@section('content')
@include('components.alert-message')

<section class="grid md:max-[50px]:grid-rows-2 md:max-2xl:grid-cols-4 bg-white shadow-md shadow-[#A65B37]">
    <div class= "text-black bg-orange-200 border border-[#A65B37]">
        <img class="block mx-auto w-44 pt-3 " src="../assets/img/loginbg.png" alt="">
        <button onclick="composeDialog()" class="block p-2 mx-auto bg-[#A65B37] text-white mt-3 rounded-md"><i class="fa fa-plus px-2 text-xs" ></i>Compose Message</button>
        
        <div class="flex justify-start bg-orange-100 mx-5 mt-3 mb-1 py-3 shadow-sm shadow-[#A65B37]">
            <a href="/message" class="ml-2"> <i class="fa fa-inbox" ></i> Inbox</a>
        </div>

        <div class="flex justify-start bg-orange-100 mx-5 mb-3 py-3 shadow-sm shadow-[#A65B37]">
            <a href="/sentMessage" class="ml-2"> <i class="fa fa-envelope" ></i> Sent Message</a>
        </div>
    </div>
    <div class="md:max-2xl:col-span-3 text-black">
        <div class="flex justify-center items-center h-16 text-3xl text-white bg-[#A65B37]">Inbox</div>
        @foreach($message as $messages)
            @if($messages->num == 0)
                <div class="flex justify-between items-center h-12 text-sm px-4 shadow-sm shadow-[#A65B37] bg-orange-200">
                    <div>Message From:</div>
                    <div>{{$messages->name}}/{{$messages->phone_number}}</div>
                <form action="/messageView/{{$messages->id}}" enctype="multipart/form-data" method="POST" role="form">
                @csrf
                @method('PUT')
                    <div><button type="submit" class="bg-[#f5b495] px-2 py-1">View</button></div>
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


 {{-- Compose Message --}}
 <form action="/customerMessage" enctype="multipart/form-data" method="post" role="form">
    @csrf
    <div id="composeDialog" class="fixed bg-black left-0 top-0 bg-opacity-50 w-screen h-screen justify-center items-center hidden transition-opacity duration-500">
      <div class="bg-white rounded shadow-md p-6 w-[85%] lg:max-2xl:w-[40%]">
        <div class="flex">
          <h3 class="text-2xl font-bold w-[95%]">New Message</h3>
          <button type="button" onclick="hideComposeDialog()" class="-mt-5">X</button>
        </div>
        <hr class="w-full">
  
        <div class="mt-10">
          <label for="phone_number">Phone Number</label>
          <input type="text" name="phone_number" id="phone_number" id="phone_number" placeholder="Input Phone Number" class="border w-full border-[#A65B37] rounded-lg p-2 outline-amber-800 " value="{{old('phone_number')}}"required >
        </div>
  
        <input hidden name="name" value="Tom's Letchon" >
        <input hidden class="form-control mt-1" id="subject" name="num" value="0" >
        <input hidden class="form-control mt-1" id="subject" name="messageFrom" value="admin" >

        <div class="mt-4">
          <label for="message">Message</label>
          <textarea name="message" id="message" placeholder="Type your message here..." rows="5" class="border w-full border-[#A65B37] rounded-lg p-2 outline-amber-800" required>{{ old('message') }}</textarea>
        </div>
  
        <div class="flex justify-end mt-5">
          <button type="submit" class="bg-[#A65B37] px-6 py-2 rounded-md hover:scale-110 transition-transform text-white">
            Send
          </button>
        </div>
  
      </div>
    </div>
  </form>
  


@endsection