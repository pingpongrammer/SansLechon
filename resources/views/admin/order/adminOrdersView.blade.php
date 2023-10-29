@extends('layout.admin-dashboard')
@section('content')
@include('components.alert-message')
           
<div class="mb-2 text-lg uppercase text-[#75391d] font-bold">
  <h3>ORDER OF {{$letc->name}}</h3>
</div>
<section class="grid grid-cols-1 gap-4 md:max-2xl:grid-cols-2">
  <div class="card shadow-md shadow-[#A65B37]">

       @if($letc->status == 'new')
      <div class="bg-green-600 p-2">
          <h3 class="text-center text-3xl font-bold text-white"><i class="fa fa-user "></i> NEW ORDER</h3>
      </div>
      @endif 

       @if($letc->status == 'pending') 
      <div class="bg-yellow-500 p-2">
          <h3 class="text-center text-3xl font-bold text-white"><i class="fa fa-spinner "></i> PENDING ORDER</h3>
      </div>
      @endif 


      <div class="mx-12 my-4 text-sm md:max-2xl:text-md ">
          <p>Name: <span class="uppercase text-[#75391d] ml-2 font-bold">{{$letc->name}}</span></p>
          <p>Contact: <span class="uppercase text-[#75391d] ml-2 font-bold">{{$letc->phone_number}}</span></p>
          <p>Delivery Date: <span class="uppercase text-[#75391d] ml-2 font-bold">{{$letc->deliveryDate}}</span></p>
          <p>Delivery Time: <span class="uppercase text-[#75391d] ml-2 font-bold">{{$letc->deliveryTime}}</span></p>
          <p>Delivery Address: <span class="uppercase text-[#75391d] ml-2 font-bold">{{$letc->street}} {{$letc->barangay}} {{$letc->location}}</span></p>
      </div>
      <hr class="border-[#75391d] mx-6">

      <div class="mx-12 my-4 text-md">

          @foreach ($cartItems as $carts)
          <h3 class="uppercase text-[#75391d] ml-2 font-bold">{{$carts->shop}} - {{$carts->price}}</h3>
          <h6 class="text-xs">Freebies:</h6>
          <h3 class="uppercase text-[#75391d] ml-2 font-bold">+ {{ $carts->freeby1 ? $carts->freeby1->type : 'Cake' }}, {{ $carts->freeby1 ? $carts->freeby1->description : null}} ({{ $carts->sizeCake ? $carts->sizeCake : 'Small'}}) -additional (₱{{ $carts->priceCake ? $carts->priceCake : '0' }})</h3>
          <h3 class="uppercase text-[#75391d] ml-2 font-bold">+ {{ $carts->freeby2 ? $carts->freeby2->type : 'Bilao' }}, {{ ($carts->freeby2 ? $carts->freeby2->description : 'Pancit Guisado') }} ({{ $carts->sizeCake ? $carts->sizeCake : 'Small'}})-addtional (₱{{ $carts->priceMom ? $carts->priceMom : '0' }})</h3>
          <h3 class="uppercase text-[#75391d] ml-2 font-bold">+ 1.5 Coke</h3>
          <h3 class="uppercase text-[#75391d] ml-2 font-bold">+ Sauce</h3>

          <h3 class="uppercase text-[#75391d] ml-2 font-bold mt-2">Delivery Fee ({{$letc->location}}) - {{$fee}}</h3>
          <hr class="border-[#75391d] mx-6 my-4">
          @endforeach
    
        </div>
      <hr class="border-[#75391d] mx-6">
      <div class="mx-12 my-4 text-md">
          <h3>Total: <span class="uppercase text-[#75391d] ml-2 font-bold">₱ {{$totalPrice}}</span></h3>
      </div>
      <hr class="border-[#75391d] mx-6">

      @if($letc->status == 'new')
      <button onclick="showAcceptDialog()" type="button" class="px-4 py-2 bg-green-500 mx-auto block my-3 rounded-lg hover:bg-green-700 text-white">Accept Order</button>
      @endif

      @if($letc->status == 'pending')
      <button onclick="showPendingDialog()" type="button" class="px-4 py-2 bg-yellow-500 mx-auto block my-3 rounded-lg hover:bg-yellow-600 text-white">Order Succesfull</button>
      @endif

    </div>

  <div class="card shadow-md shadow-[#A65B37]">
      <div class="bg-[#A65B37] p-2">
          <h3 class="text-center text-xl font-bold text-white"><i class="fa fa-picture-o "></i> PROOF OF PAYMENT</h3>
      </div>
      <div class="flex justify-center items-center m-4">
          <img  src="{{$letc->proofPayment ? asset ('storage/' .$letc->proofPayment) : asset('./assets/img/user-profile.jpg')}}" alt="" class=" object-cover h-96 w-96">
      </div>
  </div>
</section>

    <!-- Modal -->
    {{-- Accept Order Modal --}}
    <form method="POST" action="{{ url('acceptOrder', $letc->id) }}">
      @csrf
      <div id="acceptDialog" class="fixed bg-black left-0 top-0 bg-opacity-50 w-screen h-screen justify-center items-center  hidden transition-opacity duration-500">
          <div class="bg-white rounded shadow-md p-6 w-[85%] lg:max-2xl:w-[40%] ">
              <div class=" flex">
                  <h3 class="text-2xl font-bold w-[95%]">Confirm Password</h3>
                  <button type="button" onclick="hideAcceptDialog()" class="-mt-5">X</button>
              </div>
              <hr class="w-full">
              <div class="pt-4">
                  <h2 class="text-md">Please Enter Your Password to Accept Order</h2>
                  <h4 class="text-xs text-yellow-500">This action connot be undone</h4>
              </div>
              
              <div class="mt-10">
                      <label for="">Password</label>
                      <input type="password" name="verify" placeholder="Input Password" class="border w-full border-[#A65B37] rounded-lg p-2 outline-amber-800" required>
              </div>

              <div class="flex justify-end mt-14">
                  <button type="submit" class="bg-[#A65B37] px-6 py-2 rounded-md hover:scale-110 transition-transform text-white ">
                      Confirm
                  </button>
              </div>

          </div>
      </div>
  </form>

  {{-- Success Order Modal --}}
  <form method="POST" action="{{ url('successOrder', $letc->id) }}">
    @csrf
    <div id="pendingDialog" class="fixed bg-black left-0 top-0 bg-opacity-50 w-screen h-screen justify-center items-center hidden transition-opacity duration-500">
        <div class="bg-white rounded shadow-md p-6 w-[85%] lg:max-2xl:w-[40%] ">
            <div class=" flex">
                <h3 class="text-2xl font-bold w-[95%]">Confirm Password</h3>
                <button type="button" onclick="hidePendingDialog()" class="-mt-5">X</button>
            </div>
            <hr class="w-full">
            <div class="pt-4">
                <h2 class="text-md">Please Enter Your Password to Accept Order</h2>
                <h4 class="text-xs text-yellow-500">This action connot be undone</h4>
            </div>
            
            <div class="mt-10">
                    <label for="">Password</label>
                    <input type="password" name="verify" placeholder="Input Password" class="border w-full border-[#A65B37] rounded-lg p-2 outline-amber-800" required >
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
