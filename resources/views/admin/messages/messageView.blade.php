@extends('layout.admin-dashboard')
@section('content')
@include('components.alert-message')

<section class="flex items-center justify-center">
  <div class="w-3/6 shadow-lg shadow-[#A65B37]">
    <h1 class="text-center text-xl bg-[#A65B37] p-3 text-white font-bold capitalize">Message From: {{$mess->name}}</h1>
    <div class="h-72 m-4">
       <h3>Hello mga bobo</h3>
    </div>
    <hr class="border-[#A65B37] mx-5">
    <div class="flex justify-end text-white">
      <button onclick="replyDialog()" class="px-7 py-2 m-5 ml-auto rounded-lg bg-[#A65B37]">Reply</button>
    </div>
  </div>
</section>



 {{-- Reply Message --}}
 <form action="/customerMessageReply" enctype="multipart/form-data" class="col-md-12 m-auto" method="post" role="form">
  @csrf

  <div id="replyDialog" class="fixed bg-black left-0 top-0 bg-opacity-50 w-screen h-screen justify-center items-center hidden transition-opacity duration-500">
    <div class="bg-white rounded shadow-md p-6 w-[85%] lg:max-2xl:w-[40%]">
      <div class="flex">
        <h3 class="text-2xl font-bold w-[95%]">New Message</h3>
        <button type="button" onclick="hideReplyDialog()" class="-mt-5">X</button>
      </div>
      <hr class="w-full">
          
      
        <input hidden name="phone_number" value="{{$mess->phone_number}}" >
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