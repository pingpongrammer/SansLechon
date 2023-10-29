@extends('layout.admin-dashboard')
@section('content')

@include('components.alert-message')

<div class="mb-2 text-md uppercase text-[#75391d]">
    <h3>{{$payreq->name}} Request Payment</h3>
</div>
<section class="flex justify-center items-center">
    <div class="shadow-lg shadow-[#d6987b] overflow-auto h-5/6 w-96 sm:max-2xl:w-3/5 bg-white">
        <h1 class="mb-32 mt-2 text-lg pl-4">Confirm if it has been paid</h1>
        <h2 class="text-center text-5xl">Total Earnings: ₱{{$payreq->comission}} </h2>
        <div class="flex justify-end mt-32 mr-6 text-white">
            <button onclick="showDialog()" type="button" class="text-right bg-[#A65B37] px-6 py-2 rounded-md hover:scale-110 transition-transform mb-4">Confirm</button>
        </div>
         
    </div>
</section>

      <!-- Modal -->
      <form method="POST" action="/requestPayoutStore" enctype="multipart/form-data">
        @csrf
            <div id="dialog" class="fixed bg-black left-0 top-0 bg-opacity-50 w-screen h-screen justify-center items-center opacity-0 hidden transition-opacity duration-500">
                <div class="bg-white rounded shadow-md p-6 w-[85%] lg:max-2xl:w-[40%] ">
                    <div class=" flex">
                        <h3 class="text-2xl font-bold w-[95%]">Confirm Password</h3>
                        <button onclick="hideDialog()" class="-mt-5">X</button>
                    </div>
                    <hr class="w-full">
                    <div class="pt-4">
                        <h2 class="text-md">Please Enter Your Password to Confirm Your Request</h2>
                        <h4 class="text-xs text-yellow-500">This action connot be undone</h4>
                    </div>
                    
                    <div class="mt-10">
                            <label for="">Password</label>
                            @Error('verify')
                            <span class="text-xs ml-2 text-red-700">asdasdasdasd{{$message}}</span>
                            @enderror
                            <input type="password" placeholder="Input Password" name="verify" class="border w-full border-[#A65B37] rounded-lg p-2 outline-amber-800" required autocomplete="password" >
                    </div>
    
                    <div class="flex justify-end mt-14">
                        <button type="submit" class="bg-[#A65B37] px-6 py-2 rounded-md hover:scale-110 transition-transform text-white ">
                            Confirm
                        </button>
                    </div>
    
                </div>
            </div>
        </form>
            <!-- End Modal -->

@endsection