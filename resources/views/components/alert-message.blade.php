@if(session()->has('message'))
<div class="fixed top-0 left-0 w-full h-full" id="alertMess">
  <div class="flex min-h-screen items-center justify-center bg-gray-200 bg-opacity-50">
      <div class="rounded w-3/5 max-w-lg bg-green-100 text-green-700 shadow-md shadow-green-600/20">
          <div class="flex justify-center items-center pt-3">
              <i class="fa fa-check-circle pr-2 text-7xl text-center"></i>
          </div>
          
          <h3 class="font-bold capitalize text-xl py-5 px-5 break-words text-center">
            {{session()->get('message')}}
          </h3>
          
          <div class=" flex justify-center text-white">   
              <button onclick="alertMessage()" class="p-3 bg-green-600 w-full hover:bg-green-800"><i class="fa fa-times-circle "></i> Close</button>
          </div>
      </div>
  </div>
</div>
@endif

@if(session()->has('error'))
<div class="fixed top-0 left-0 w-full h-full" id="alertErr">
  <div class="flex min-h-screen items-center justify-center bg-gray-200 bg-opacity-50">
      <div class="rounded w-3/5 max-w-lg bg-red-100 text-red-700 shadow-md shadow-green-600/20">
          <div class="flex justify-center items-center">
              <i class="fa fa-times-circle-o pt-3 pr-2 text-7xl text-center"></i>
          </div>
          
          <h3 class="font-bold capitalize text-xl py-5 px-5 break-words text-center">
            {{session()->get('error')}}
          </h3>
          {{-- <button type="button" class="close" data-dismiss="alert">close</button> --}}
          
          <div class=" flex justify-center text-white">   
              <button onclick="alertError()" class="p-3 bg-red-500 w-full hover:bg-red-700"><i class="fa fa-times-circle "></i> Close</button>
          </div>
      </div>
  </div>
</div>
@endif