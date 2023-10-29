@extends('layout.affiliatePartner-header-footer')
@section('content')

<section class="bg-light">
    <div class="container pb-5">                    
        
        @if(session()->has('message'))
        <div class="alert alert-success" id="alert">
        <button type="button" class="close" data-dismiss="alert">x</button>
        {{session()->get('message')}}
        </div>
    @endif

        <div class="row justify-content-center">
            <!-- col end -->
            <div class="col-lg-7 mt-5">
                <div class="card card mx-auto">
                    <div class="card-body">
                            <form action="/affiliateStore" enctype="multipart/form-data" class="col-md-11 m-auto" method="post" role="form">
                                @csrf

                            <div class="row">
                                <div class="form-group col-md-12 mb-1">
                                    <h5 style="font-size:19px; color:rgb(7, 7, 7); font-weight:700" for="inputsubject">Affiliate Program Form:</h5>
                                </div>
                                        
                                <div class="form-group col-md-12 mb-3">
                                    <h6 style="font-size:12px">Name<span style="color: red">*</span></h6>
                                    <input type="text" class="input form-control mt-1" id="inputName"  name="name" placeholder="Name" value="{{ old('name') }}">
                                        @Error('name')
                                            <p class="text-danger text-md mt-1">{{$message}}</p>
                                        @enderror
                                </div>

                                <div class="form-group col-md-12 mb-3">
                                        <h6 style="font-size:12px">Contact Number<span style="color: red">*</span></h6>
                                        <input type="number" class="input form-control mt-1" id="inputContact" name="phone_number" placeholder="Contact Number" value="{{ old('phone_number') }}">
                                        @Error('phone_number')
                                        <p class="text-danger text-md mt-1">{{$message}}</p>
                                    @enderror
                                </div>
                                
                                <div class="form-group col-md-12 mb-3">
                                        <h6 style="font-size:12px">Gender<span style="color: red">*</span></h6>
                                        <select class="input form-control mt-1" name="gender" value="{{old('gender')}}"  required style="font-size:12px">
                                        <option value="">-Select Gender-</option>
                                        <option value="Male" @if (old('gender') == "Male") {{ 'selected' }} @endif >Male</option>
                                        <option value="Female" @if (old('gender') == "Female") {{ 'selected' }} @endif>Female</option>
                                    </select>
                                        @Error('gender')
                                            <p class="text-danger text-md mt-1">{{$message}}</p>
                                            @enderror
                                </div>

                            </div>
                            <div class="row">

                                <div class="form-group col-md-12 mb-3">
                                    <h6 style="font-size:12px" >Address<span style="color: red">*</span></h6>
                                    <input type="text" class="input form-control mt-1" id="address" name="address" placeholder="Address" value="{{ old('address') }}">
                                    @Error('address')
                                    <p class="text-danger text-md mt-1">{{$message}}</p>
                                    @enderror
                                </div>
                         
                                <div class="form-group col-md-12 mb-3">
                                    <h6 style="font-size:12px" >Email<span style="color: red">*</span></h6>
                                    <input type="text" class=" input form-control mt-1" id="email" name="email" placeholder="Email" value="{{ old('email') }}">
                                    @Error('email')
                                    <p class="text-danger text-md mt-1">{{$message}}</p>
                                   @enderror
                                </div>

                                <div class="form-group col-md-12 mb-3">
                                    <h6 style="font-size:12px">Username<span style="color: red">*</span></h6>
                                    <input type="text" class=" input form-control mt-1" id="username" name="username" placeholder="Username" value="{{ old('username') }}">
                                    @Error('username')
                                    <p class="text-danger text-md mt-1">{{$message}}</p>
                                   @enderror
                                </div>

                                <div class="form-group col-md-12 mb-3">
                                    <h6 style="font-size:12px" >Password<span style="color: red">*</span></h6>
                                    <input type="password" class=" input form-control mt-1" id="password" name="password" placeholder="Password">
                                    @Error('password')
                                    <p class="text-danger text-md mt-1">{{$message}}</p>
                                   @enderror
                                </div>

                                       <!-- Password Confirmation -->
                                <div class="form-group col-md-12 mb-3">
                                    <h6 style="font-size:12px" >Confirm Password<span style="color: red">*</span></h6>
                                    <input type="password" name="password_confirmation" placeholder="Confirm Password" class="form-control bg-white border-left-0 border-md">
                                    @Error('password_confirmation')
                                    <p class="text-danger text-md mt-1">{{$message}}</p>
                                @enderror
                                </div>

                                <div class="form-group col-md-12 mb-3">
                                    <h6 style="font-size:12px" >Profile Image<span style="color: red">*</span></h6>
                                    <img id="prview"style="width: 170px; height:130px" />
                                    <input type="file" name="profile_image" id="profile_image">
                                    @Error('profile_image')
                                    <p class="text-danger text-md mt-1">{{$message}}</p>
                                   @enderror
                                </div>
                             
                                <input hidden class="form-control mt-1" id="adminType" name="adminType"  value="influencer" >
                                <input hidden class="form-control mt-1"  name="referral_code" >
                                
                                <div>
                                    <input type="checkbox" id="terms_and_conditions" class="input"/>
                                    <label for="terms_and_conditions">Privacy Policy<span style="color: red">*</span></label>     
                                    <p class="text-justify"> &ensp; &ensp; &ensp;By submitting this form, you agree that we may collect, use, and protect your information for affiliate program-related purposes only. We are committed to safeguarding your privacy and do not share your data with others. For more details, contact us at sanslechon@gmail.com or 09776162392.
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="container mt-4">
                            <div class="row pb-3">
                                <div class="col d-grid ">
                                    <button type="submit" class="btn btn-success btn-lg" id="copyButton">Submit</button>
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
  </div>

  <script>
    profile_image.onchange = evt => {
      const [file] = profile_image.files
      if (file) {
        prview.style.visibility = 'visible';
    
        prview.src = URL.createObjectURL(file)
      }
    }
  </script>



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