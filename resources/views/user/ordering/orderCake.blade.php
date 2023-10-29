@extends('layout.header-footer-layout')

@section('content')

<style>
    .paragh{
        margin: 0;
        display: inline-block;
        padding-right:7px;
        
        
    }

    .fw-boldd{
        margin:0;
        display: inline-block;
        text-transform: uppercase;
        font-size:13px;
        font-weight: bold;
        color: rgb(37, 190, 37)
    }
    .form-control{
        height: 53%;
        font-size: 12px;
    }

    input::placeholder {
      color: #999; /* Placeholder text color */
      font-style: italic; /* Placeholder font style */
      font-size: 12px
    }

    input[type="date"] {
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 12px;
      color: #333;
      /* Add more styles as needed */
    }

    #customInput {
      font-size: 10px;
    }

    .kls{
        font-family: 'Courier New', Courier, monospace;
        color:rgb(22, 128, 22);
        padding: 0px;
    }
    
@media (max-width: 400) {
    .kls{
        font-size: 1px
  }

}


</style>

    <!-- Modal -->
    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Open Content -->
    <section class="bg-light">
        <div class="container pb-5">                    
            
            @if(session()->has('message'))
            <div class="alert alert-success" id="alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            {{session()->get('message')}}
            </div>
        @endif

            <div class="row">
                <div class="col-lg-5 mt-5">
                    <div class="card mb-3 p-4">
                        <h6>Order Policy:</h6>
                        <h3 style="font-size: 13px">1.<b style="color:green"> Advance Reservations:</b> To ensure availability, we kindly request customers to place their orders in advance, especially for large quantities or special events.</h3>
                        <h3 style="font-size: 13px">2.<b style="color:green"> Order Confirmation:</b>  All orders will be confirmed upon receipt of full payment. Confirmation details will be provided upon order placement.</h3>
                        <h3 style="font-size: 13px">3.<b style="color:green"> Payment:</b>  Full payment is required to secure your order. Full payment must be made at least 3 days before the scheduled date of delivery. Failure to make the payment within this timeframe may result in the cancellation of your order.</h3>
                        <h3 style="font-size: 13px">4.<b style="color:green"> Change in Order Size:</b>  Requests to change the size or quantity of lechon must be made 2-3 days before the scheduled pickup or delivery, subject to availability.</h3>
                        <h3 style="font-size: 13px">5.<b style="color:green"> Cancellation and Refunds:</b> Any cancellations must be made at least 24 hours before the scheduled pickup or delivery. Cancellations made within this timeframe may be subject to a partial refund for 30%, depending on the order status.</h3>
                        <h3 style="font-size: 13px">6.<b style="color:green"> Delivery and Pickup:</b> Customers can choose between pickup from our location or delivery to their preferred address. Delivery charges may apply based on the distance.</h3>
                        <h3 style="font-size: 13px">7.<b style="color:green"> Customer Satisfaction:</b> Your satisfaction is our priority. If you encounter any issues with your order, please contact us immediately, and we will strive to resolve it promptly.</h3>
                   <br>
                        <h3 style="font-size: 13px; color:green">Thank you for choosing San's Lechon for your special occasion. By placing an order with us, you agree to comply with our order policy. We look forward to serving you and making your event truly special! 🎉</h3>
                    </div>
                    <div class="row">
                
                    </div>
                </div>

                <div class="modal fade" id="pricelist" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Price List</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="card">
                                    <div class="card-body">
                                      <div class="container" style="padding: 0">
                                        {{-- <p class="my-5 mx-5" style="font-size: 40px;">Order Description</p> --}}
                                        <div class="row">
                                            <h5 style="text-align: center">6x6 Cake - ₱1500</h5>
                                            <h5 style="text-align: center">7x5 Cake - ₱1450</h5>
                                            <h5 style="text-align: center">8x4 Cake - ₱1780</h5>
                                            <h5 style="text-align: center">9x4 Cake - ₱2000</h5>
                                          <hr>
                                          <p>Note: Please specify your desired cake design below. Alternatively, you can reach us at 09776162392 for further assistance.</p>
                                        </div>

                                  
                                      </div>
                                    </div>
                                  </div>

                                  <br>

                            </div>
                        </div>
                    </div>
                </div>

            


        
                <!-- col end -->
                <div class="col-lg-7 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="card mb-3">
                                <img class="card-img img-fluid" id="preview" src="{{$cat->img ? asset ('storage/' .$cat->img) : asset('/storage/no/-image.png')}}" alt="" />
                                {{-- <img class="card-img img-fluid" src="/assets/img/let9.jpg" alt="Card image cap" id="product-detail"> --}}
                            </div>
                            <div class="row">
                                <div id="carousel-related-producttt">
        
                                    @foreach($categ as $categories)
                                    <div class="p-2 pb-3">
                                        <div class="product-wap card rounded-0">
                                            <div class="card rounded-0">
                                                <img class="card-img rounded-0 img-fluid" id="preview" src="{{$categories->img ? asset ('storage/' .$categories->img) : asset('/storage/no/-image.png')}}" alt="" />

                                                {{-- <img class="card-img rounded-0 img-fluid" src="/assets/img/let2.JPG"> --}}
                                                <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                                    <ul class="list-unstyled">
                                                        <li><a class="btn btn-success text-white mt-2" href="{{url('cakeView',$categories->id)}}"><i class="fas fa-cart-plus"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body" style="padding: 0px">
                                            {{-- <p class="kls text-center" ><b>{{$letchon->kls}}</b></p> --}}
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
          

                           
     
                                <div class="text-center">
                                    <button type="button" class="btn btn-success center pr-5 pl-5 mb-2" data-toggle="modal" data-target="#pricelist" >View Pricelist</button>
                                  </div>

   
                                <form action="/orderStore" enctype="multipart/form-data" class="col-md-11 m-auto" method="post" role="form">
                                    @csrf

                                <div class="row">
                                    <hr>
                                    <div class="form-group col-md-12 mb-1">
                                        <h6 style="font-size:19px; color:rgb(7, 7, 7); font-weight:700" for="inputsubject">Order Form:</h6>
                                    </div>
                                            
                                    <div class="form-group col-md-5 mb-3">
                                        <h6 style="font-size:12px">Name<span style="color: red">*</span></h6>
                                        <input type="text" class="input form-control mt-1" id="inputName"  name="name" placeholder="Name">
                                    </div>
                                    <div class="form-group col-md-5 mb-3">
                                        <h6 style="font-size:12px">Contact Number<span style="color: red">*</span></h6>
                                        <input type="text" class="input form-control mt-1" id="inputContact" name="phone_number" placeholder="Phone Number">
                                    </div>

                                    <div class="form-group col-md-2 mb-3">
                                        <h6 style="font-size:12px" for="inputsubject">Quantity<span style="color: red">*</span></h6>
                                        <input type="number" class="input form-control mt-1" id="inputQty" name="qty" placeholder="Quantity">
                                    </div>
                                </div>

                                <div class="row">


                                    <div class="form-group col-md-12 mb-1">
                                        <h6 style="font-size:15px; color:green" for="inputsubject">Delivery Address</h6>
                                    </div>

                                    <div class="form-group col-md-4 mb-3">
                                        <h6 style="font-size:12px">City/location<span style="color: red">*</span></h6>
                                        <select class="input form-control mt-1" value="{{old('location')}}" name="location" id="inputLocation" required>
                                          <option value="">-Select City/Location-</option>
                                          <option value="Baao">Baao</option>
                                          <option value="Buhi">Buhi</option>
                                          <option value="Bato">Bato</option>
                                          <option value="Bula">Bula</option>
                                          <option value="Balatan">Balatan</option>
                                          <option value="Nabua">Nabua</option>
                                          <option value="Iriga">Iriga</option>
                                          <option value="Pili">Pili</option>
                                          <option value="Naga">Naga</option>
                                       </select>
                                        @Error('location')
                                              <p class="text-danger text-md mt-1">{{$message}}</p>
                                             @enderror
                                    </div>
                             

                                    <div class="form-group col-md-4 mb-3">
                                        <h6 style="font-size:12px" for="inputsubject">Barangay<span style="color: red">*</span></h6>
                                        <input type="text" class=" input form-control mt-1" id="inputBarangay" name="barangay" placeholder="Barangay">
                                    </div>

                                    <div class="form-group col-md-4 mb-3">
                                        <h6 style="font-size:12px" for="inputsubject">Street<span style="color: red">*</span></h6>
                                        <input type="text" class=" input form-control mt-1" id="inputStreet" name="street" placeholder="Street">
                                    </div>

                                    <div class="form-group col-md-4 mb-3">
                                        <h6 style="font-size:12px" for="inputsubject">Preferred Delivery date<span style="color: red">*</span></h6>
                                        <input type="date" class=" input form-control mt-1" id="inputDate" name="deliveryDate" placeholder="Address">
                                    </div>

                                    <div class="form-group col-md-4 mb-3">
                                        <h6 style="font-size:12px" for="inputsubject">Preferred Delivery Time<span style="color: red">*</span></h6>
                                        <input type="time" class=" input form-control mt-1" id="inputTime" name="deliveryTime" placeholder="Address">
                                    </div>

                                    <div class="form-group col-md-4 mb-3">
                                        <h6 style="font-size:12px">Mode of Payment <span style="color: red">*</span></h6>
                                        <select class="input form-control mt-1" name="modeOfPayment" value="{{old('payment')}}"  required>
                                          <option value="">-Select Mode of Payment-</option>
                                          <option value="Gcash">Gcash</option>
                                          <option value="Bank">Bank</option>
                                          {{-- <option value="Cash On Pickup">Cash on Pickup</option> --}}
                                       </select>
                                        @Error('adminType')
                                              <p class="text-danger text-md mt-1">{{$message}}</p>
                                             @enderror
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <h6 style="font-size:12px">Size of Cake <span style="color: red">*</span></h6>
                                        <select class="input form-control mt-1" name="modeOfPayment" value="{{old('payment')}}"  required>
                                          <option value="">-Select Size of Cake-</option>
                                          <option value="Gcash">6x6</option>
                                          <option value="Bank">7x5</option>
                                          <option value="Bank">8x4</option>
                                          <option value="Bank">9x4</option>
                                          {{-- <option value="Cash On Pickup">Cash on Pickup</option> --}}
                                       </select>
                                        @Error('adminType')
                                              <p class="text-danger text-md mt-1">{{$message}}</p>
                                             @enderror
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <h6 style="font-size:12px" for="inputsubject">Description<span style="color: red">*</span></h6>
                                        <textarea type="time" class=" input form-control mt-1" id="inputTime" name="deliveryTime" placeholder="Description of Cake Design"></textarea>
                                    </div>
                                 
                                    {{-- <input hidden  id="inputKls" name="kls" value="{{$let->kls}}">
                                    <input hidden  id="inputPriceeee" name="price" value="{{$let->prices}}">
                                    <input hidden  id="inputStatus" name="status" value="pendingproof">
                                    <input hidden  id="referral_code" name="referral_code" value="{{auth()->user()->referral_code}}">
                                    <input hidden  id="reset" name="payment" value="new">
                                     --}}
                                    <div>
                                        <input type="checkbox" id="terms_and_conditions" class="input"/>
                                        <label for="terms_and_conditions">Privacy Policy<span style="color: red">*</span></label>     
                                        <p class="text-justify"> &ensp; &ensp; &ensp;By placing an order, you agree that we may collect, use, and protect your information for order processing and customer service purposes only. We do not share your data with others. For details, contact us at sansletchon@gmail.com or 09776162392.
                                        </p>
                                    </div>
                                </div>
                                <hr>
                                <div class="container mt-4">
                                <div class="row pb-3">
                                    <div class="col d-grid ">
                                        <button type="button" class="btn btn-success btn-lg" id="copyButton" name="submit" value="buy" data-toggle="modal" data-target="#myModal" disabled>Place Order</button>
                                    </div>
                                </div>

                                
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Order Information</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="card">
                                                <div class="card-body">
                                                  <div class="container" style="padding: 0">
                                                    {{-- <p class="my-5 mx-5" style="font-size: 40px;">Order Description</p> --}}
                                                    <div class="row">
                                                      <ul class="list-unstyled">
                                                        <li class="text-black"><p class="paragh">Name:</p><p class="fw-boldd" id="copyname"></p></li>
                                                        <li class="text-black"><p class="paragh">Contact: </p><p class="fw-boldd" id="copycontact"></p></li>
                                                        <li class="text-black"><p class="paragh">Delivery Date: </p><p class="fw-boldd" id="copyDate"></p></li>
                                                        <li class="text-black"><p class="paragh">Delivery Time: </p><p class="fw-boldd" id="copyTime"></p></li>
                                                        <li class="text-black"><p class="paragh">Delivery Address: </p><p class="fw-boldd" id="copyStreet" ></p> <p class="fw-boldd" id="copyBarangay" style="display: inline-block;"></p> <p class="fw-boldd" id="copyLocation" style="display: inline-block;"></p></li>
                                                      </ul>
                                                      <hr>
                                                    </div>
                                                        <p class="paragh" style="margin-right: 50px">Kilos(live weight) </p>
                                              
                                                
                                                        <p id="targetHeading" class="fw-boldd" >
                                                            {{-- {{$let->kls}} --}}
                                                        </p>
    
                                                      <hr>
                                                    
                                                   
                                                      
                                                        <p class="paragh">Quantity x </p><p id="copyQty" class="fw-boldd" style="margin-right: 80px"></p>
                                                     
                                                    
                                                        <p class="paragh">₱ </p><p id="displayResult" class="fw-boldd"></p>
                                                    
                                                      <hr>
                                                
                                                 
                                                  
                                                        <p class="paragh">Delivery Fee</p> <p style="display: inline-block;" >(</p> <p id="copyLocation2" class="fw-boldd"></p><p style="display: inline-block; margin-right: 40px" >) </p>
                                                  
                                                    
                                                        <p style="display: inline-block;">₱ </p><p id="copylocationFee" class="fw-boldd"></p>
                                            
                                                      <hr style="border: 2px solid black;">
                                               

                                                
                                                    
                                                        <p class="paragh fw-bold" style="margin-right: 115px">Total:</p>
                                                  
                                                    
                                                        <p class="fw-bold" style="display: inline-block;">₱</p><p class="fw-boldd" id="displayTotal" style="display: inline-block;"></p>
                                               
                                                      <hr style="border: 2px solid black;">
                                                   
                                                    <div class="text-center" style="margin-top: 9px;">

                                                    </div>
                                              
                                                  </div>
                                                </div>
                                              </div>

                                              <br>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-primary">Pay Now</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Close Content -->

    <!-- Start Article -->
    <section class="py-5">
        <div class="container">
            <div class="row text-left p-2 pb-3">
                <h4>Lechon Available</h4>
            </div>

            <!--Start Carousel Wrapper-->
            <div id="carousel-related-product">

                @foreach($let as $letchon)
                <div class="p-2 pb-3">
                    <div class="product-wap card rounded-0">
                        <div class="card rounded-0">
                            <img class="card-img rounded-0 img-fluid" src="/assets/img/let2.JPG">
                            <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                <ul class="list-unstyled">
                                    <li><a class="btn btn-success text-white mt-2" href="{{url('orderViewKls',$letchon->id)}}"><i class="fas fa-cart-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled d-flex justify-content-between" >
                                <li>
            
                                    <i class="text-danger">(Live Weight)</i>
                                </li>
                                <li class="text-right text-danger"><b>{{$letchon->kls}}</b></li>
                            </ul>
                            <p class="text-center mb-0">{{$letchon->prices}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>


        </div>
    </section>
    <!-- End Article -->

    <script>
        document.getElementById("copyButton").addEventListener("click", function() {
            var modalInputData = document.getElementById("inputName").value;
            document.getElementById("copyname").textContent = modalInputData;
        });
    </script>

<script>
    document.getElementById("copyButton").addEventListener("click", function() {
        var modalInputData = document.getElementById("inputContact").value;
        document.getElementById("copycontact").textContent = modalInputData;
    });
</script>

<script>
    document.getElementById("copyButton").addEventListener("click", function() {
        var modalInputData = document.getElementById("inputDate").value;
        document.getElementById("copyDate").textContent = modalInputData;
    });
</script>
<script>
    document.getElementById("copyButton").addEventListener("click", function() {
        var modalInputData = document.getElementById("inputTime").value;
        document.getElementById("copyTime").textContent = modalInputData;
    });
</script>

<script>
    document.getElementById("copyButton").addEventListener("click", function() {
        var modalInputData = document.getElementById("inputLocation").value;
        document.getElementById("copyLocation").textContent = modalInputData;
    });
</script>
<script>
    document.getElementById("copyButton").addEventListener("click", function() {
        var modalInputData = document.getElementById("inputLocation").value;
        document.getElementById("copyLocation2").textContent = modalInputData;
    });
</script>
<script>
    document.getElementById("copyButton").addEventListener("click", function() {
        var modalInputData = document.getElementById("inputBarangay").value;
        document.getElementById("copyBarangay").textContent = modalInputData;
    });
</script>
<script>
    document.getElementById("copyButton").addEventListener("click", function() {
        var modalInputData = document.getElementById("inputStreet").value;
        document.getElementById("copyStreet").textContent = modalInputData;
    });
</script>



<script>
    document.getElementById("copyButton").addEventListener("click", function() {
        var modalInputData = document.getElementById("inputQty").value;
        document.getElementById("copyQty").textContent = modalInputData;
    });
</script>

<script>
    document.getElementById("copyButton").addEventListener("click", function() {
        var modalInputData = document.getElementById("inputLocation").value;

        if(modalInputData === "Baao"){
            document.getElementById("copylocationFee").textContent = 35;
        }
        if(modalInputData === "Iriga"){
            document.getElementById("copylocationFee").textContent = 84;
        }
        if(modalInputData === "Nabua"){
            document.getElementById("copylocationFee").textContent = 84;
        }
        if(modalInputData === "Pili"){
            document.getElementById("copylocationFee").textContent = 158;
        }
        if(modalInputData === "Bula"){
            document.getElementById("copylocationFee").textContent = 105;
        }
        if(modalInputData === "Bato"){
            document.getElementById("copylocationFee").textContent = 116;
        }
        if(modalInputData === "Buhi"){
            document.getElementById("copylocationFee").textContent = 140;
        }
        if(modalInputData === "Balatan"){
            document.getElementById("copylocationFee").textContent = 140;
        }
        if(modalInputData === "Naga"){
            document.getElementById("copylocationFee").textContent = 331;
        }
        
    });
</script>

{{-- <script>
    const number1Element = document.getElementById('copyQty');
    const number2Element = document.getElementById('pricesss');
    const calculateButton = document.getElementById('copyButton');
    const displayResultElement = document.getElementById('displayResult'); // New result <p> tag

    calculateButton.addEventListener('click', function() {
      const number1 = parseFloat(number1Element.textContent);
      const number2 = parseFloat(number2Element.textContent);

      const sum = number1 * number2;
      displayResultElement.textContent = sum; // Update new result <p> tag
    });
  </script> --}}


  {{-- Total na babayaran --}}
<script>
    const number1Element = document.getElementById('copyQty');
    const number2Element = document.getElementById('pricesss');
    const calculateButton = document.getElementById('copyButton');
    const displayResultElement = document.getElementById('displayResult'); 
    const displayTotalElement = document.getElementById('displayTotal'); 
    var modalInputData = document.getElementById("inputLocation").value;

    calculateButton.addEventListener('click', function() {
        

            if(modalInputData === "Baao"){
                document.getElementById("copylocationFee").textContent = 20;
            }
            if(modalInputData === "Buhi"){
                document.getElementById("copylocationFee").textContent = 100;
            }
            if(modalInputData === "Bato"){
                document.getElementById("copylocationFee").textContent = 80;
            }
            if(modalInputData === "Bula"){
                document.getElementById("copylocationFee").textContent = 100;
            }

      const result = document.getElementById("copylocationFee").textContent;

      const overallResult = parseFloat(result);
      const number1 = parseFloat(number1Element.textContent);
      const number2 = parseFloat(number2Element.textContent);

      const sum = number1 * number2;
      displayResultElement.textContent = sum; // Update new result <p> tag

      const total = sum + overallResult;
      displayTotalElement.textContent = total; // Update new result <p> tag
    });

</script>





{{-- modal disabling --}}
{{-- <script>
$(document).ready(function() {
    // Select all input fields by class
    var inputs = $('.input');
    var submitButton = $('#copyButton');

    // Function to check if any input field is empty
    function checkInputs() {
        var emptyInputExists = false;
        
        inputs.each(function() {
            if ($(this).val() === '') {
                emptyInputExists = true;
                return false; // Exit loop early
            }
        });

        submitButton.prop('disabled', emptyInputExists);
    }

    // Monitor input fields for changes
    inputs.on('input', checkInputs);

    // Check inputs on page load
    checkInputs();
});
</script> --}}

<script>
    $(document).ready(function() {
        // Select all input fields by class
        var inputs = $('.input');
        var typeCheckbox = $('#terms_and_conditions');
        var submitButton = $('#copyButton');

        // Function to check if any input field is empty or checkbox is unchecked
        function checkInputs() {
            var emptyInputExists = false;

            inputs.each(function() {
                if ($(this).val() === '') {
                    emptyInputExists = true;
                    return false; // Exit loop early
                }
            });

            var isCheckboxChecked = typeCheckbox.prop('checked');
            
            submitButton.prop('disabled', emptyInputExists || !isCheckboxChecked);
        }

        // Monitor input fields and checkbox for changes
        inputs.on('input', checkInputs);
        typeCheckbox.on('change', checkInputs);

        // Check inputs on page load
        checkInputs();
    });
</script>


@endsection