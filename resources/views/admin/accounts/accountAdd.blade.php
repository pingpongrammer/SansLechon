@extends('layout.admin-dashboard-layout')
@section('content')


    <!-- Start Contact -->
    <div class="container-fluid bg-light py-5">
        <div class="row py-5">

            <form action="/storeAccounts" enctype="multipart/form-data" class="col-md-9 m-auto" method="post" role="form">
                @csrf

                <div class="col-lg-12 m-auto">
                    <h2 class="h2 text-center"><b>ADD ACCOUNTS</b></h2>
                </div>
                {{-- <p>We're excited to assist you with any questions or inquiries you may have about our mouthwatering lechon and services. Kindly fill out the form below, and we'll get back to you as soon as possible to help make your celebration extra special. --}}


                <div class="row">                
                    <div class="form-group col-md-6 mb-3">
                        <label for="inputname">Name<span style="color: red">*</span></label>
                        <input type="text" class="form-control mt-1" id="name" name="name" placeholder="Name" value="" required>
                            @Error('name')
                                <p class="text-danger text-md mt-1">{{$message}}</p>
                            @enderror
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label for="inputemail">Username<span style="color: red">*</span></label>
                        <input type="text" class="form-control mt-1" id="email" name="username" placeholder="Username" value="" required>
                            @error('username')
                                <p class="text-danger text-md mt-1">{{$message}}</p>
                            @enderror
                    </div>
                </div>
                <div class="row"> 
                <div class="form-group col-md-6 mb-3">
                    <label for="inputsubject">Email<span style="color: red">*</span></label>
                    <input type="email" class="form-control mt-1" id="subject" name="email" placeholder="Email" value="" required>
                            @error('email')
                                <p class="text-danger text-md mt-1">{{$message}}</p>
                            @enderror
                </div>

                <div class="form-group col-md-6 mb-3">
                    <label>Admin Type<span style="color: red">*</span></label>
                    <select class="form-control mt-1" name="adminType" value="{{old('adminType')}}" required>
                      <option value="">-Select Admin Type-</option>
                      <option value="influencer">Influencer</option>
                      <option value="admin">Admin</option>
                   </select>
                    @Error('adminType')
                          <p class="text-danger text-md mt-1">{{$message}}</p>
                         @enderror
                </div>
            </div>
                <div class="mb-3">
                    <label for="inputsubject">Password<span style="color: red">*</span></label>
                    <input type="password" class="form-control mt-1" id="subject" name="password" placeholder="Password" value="" required>
                            @error('password')
                                <p class="text-danger text-md mt-1">{{$message}}</p>
                            @enderror
                </div>

                <div class="mb-3">
                    <label for="inputsubject">Confirm Password<span style="color: red">*</span></label>
                    <input type="password" class="form-control mt-1" id="subject" name="password_confirmation" placeholder="Password Confirmation" value="" required>
                            @error('password_confirmation')
                                <p class="text-danger text-md mt-1">{{$message}}</p>
                            @enderror
                </div>
                <input hidden class="form-control mt-1" id="subject" name="referral_code"  value="" >
                <div class="row">
                    <div class="col text-end mt-2">
                        <button type="submit" class="btn btn-success btn-lg px-3">Send</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End Contact -->
@endsection