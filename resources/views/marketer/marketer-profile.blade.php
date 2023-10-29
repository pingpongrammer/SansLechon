@extends('layout.affiliate-dashboard')
@section('content')
@include('components.alert-message')

<style>
  .contact-title{
    color: rgb(8, 177, 36);
  }
  
  .paragraph-container {
            position: relative;
            display: inline-block;
        }

        /* Style for the icon-only copy button */
        .icon-copy-button {
            background-color: transparent;
            border: none;
            cursor: pointer;
            font-size: 14px;
            color: #3498db;
            vertical-align: middle;
            margin-left: 5px; /* Add some spacing between text and button */
        }

   /* Style for the "Copied" text */
   .copied-text {
            position: absolute;
            top: 100%;
            left: 50%;
            transform: translateX(-50%);
            background-color: #2980b9;
            color: #fff;
            border-radius: 4px;
            padding: 5px;
            opacity: 0;
            pointer-events: none; /* Prevent interaction with the text */
            transition: opacity 0.3s ease;
        }

        /* Show the "Copied" text when the button is clicked */
        .icon-copy-button.clicked + .copied-text {
            opacity: 1;
        }
</style>
<section class="flex flex-col md:max-2xl:flex-row w-[97%] bg-white mx-auto shadow-md shadow-[#d6987b]">
  <div class="lg:max-2xl:w-[35%] p-5">
    <img class="w-[70%] block mx-auto" src="{{auth()->user()->profile_image ? asset('storage/' .auth()->user()->profile_image) : asset('./assets/img/user-profile.jpg')}}" />
    <div class="flex justify-center">
      <a href="/edit-profile" class="m-2 bg-blue-300 hover:bg-blue-600 px-4 py-1 rounded-lg  ">Edit Profile</a>
    </div>
    
    <h1 class="font-bold text-md text-[#995333]">Date of Registration </h1>
    <span class="text-black ml-4">{{auth()->user()->created_at}}</span>
    <h1 class="font-bold mt-3 text-[#995333]">Your Referral Link:</h1>
    <h4 class="max-w-full text-sm break-all">
      {{$url}}
      <span class="paragraph-container">
        <button id="copyButton" class="icon-copy-button"><i class="fas fa-copy"></i>Copy</button>
        <span class="copied-text">Copied</span>
      </span>
    </h4>
</div>
  <div class="flex-1 ml-4">
    <h1 class="text-xl md:max-2xl:text-3xl font-bold text-[#995333] py-4 capitalize break-all">{{auth()->user()->name}}</h1>
    <p>About</p>
    <hr class="border-[#c47450] mr-10">
    <h3 class="text-sm font-bold pt-2 pb-2 text-black">CONTACT INFORMATION</h3>

      <div class="mt-3 flex ">
        <h5 class="text-[#995333] font-bold w-24">Phone:</h5> 
        <span class="text-black ml-4 break-all">{{auth()->user()->phone_number}}</span>
      </div>

      <div class="mt-3 flex ">
        <h5 class="text-[#995333] font-bold w-24">Address:</h5> 
        <span class="text-black ml-4 break-all">{{auth()->user()->address}}</span>
      </div>

      <div class="mt-3 flex ">
        <h5 class="text-[#995333] font-bold w-24 ">Email:</h5> 
        <span class="text-black ml-4 break-all">{{auth()->user()->email}}</span>
      </div>

      <div class="mt-3 flex ">
        <h5 class="text-[#995333] font-bold w-24">Username:</h5> 
        <span class="text-black ml-4 break-all">{{auth()->user()->username}}</span>
      </div>

      <h3 class="text-sm font-bold pt-6 text-black">BASIC INFORMATION</h3>

      <div class="mt-3 flex ">
        <h5 class="text-[#995333] font-bold w-24">Birthday:</h5> 
        <span class="text-black ml-4">{{auth()->user()->birthday}}</span>
      </div>

      <div class="mt-3 flex mb-10">
        <h5 class="text-[#995333] font-bold w-24">Gender:</h5> 
        <span class="text-black ml-4">{{auth()->user()->gender}}</span>
      </div>
  </div>
</section>



@endsection