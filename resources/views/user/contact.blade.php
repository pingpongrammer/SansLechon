@extends('layout.header-footer-layout')

@section('content')

<style>
    .wrap-element {
  position: relative;
  overflow: hidden;
  padding-top: 56.25%;
}

.wrapped-iframe {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  border: 0;
}
</style>
    <!-- Modal -->

    @if(session()->has('message'))
    <div class="alert alert-primary" id="alert">
    <button type="button" class="close" data-dismiss="alert">x</button>
    {{session()->get('message')}}

  </div>
  @endif
  
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
    
 


    <!-- Start Content Page -->
    <div class="container-fluid bg-brown-body py-5">
        <div class="col-md-10 m-auto text-center">
            <h1 class="h1">Contact Us</h1>
            <p>
                "We'd love to hear from you! At San's Lechon, customer satisfaction is our top priority. Whether you have questions about our mouthwatering lechon offerings, want to place a reservation for your special celebration, or simply want to share your feedback, our team is here to assist you. Feel free to get in touch with us through any of the following channels and let us help you create cherished memories and a delightful feast:

📞 Call us at <b>09776162392</b>
📧 Email us at <b>sansletchon@gmail.com</b>
💬 Message us on our Facebook Page: <a href="https://www.facebook.com/profile.php?id=100092437762406"><b>San's Lechon</b></a> . 

Thank you for considering San's Lechon for your upcoming celebration. We look forward to serving you and making your event truly special!"
            </p>
        </div>
        
    </div>

    <section class="container py-5">
        <div class="row text-center pt-5 pb-3">
            <div class="col-lg-8 m-auto">
                {{-- <h1 class="h1">Location</h1> --}}
                <p>
                    "Experience flavor and tradition at its finest – San's Lechon, located in <b>San Ramon Baao, Camarines Sur</b>. Join us for authentic Filipino cuisine and indulge in the essence of celebration!"
                </p>
            </div>
        </div>
        <div class="row">


                <div class="wrap-element">
                    <iframe class="wrapped-iframe" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3880.300415086431!2d123.3656668747481!3d13.455569904083752!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a19738621d4859%3A0x5d2b0492bcd8ad9a!2sTom&#39;s%20Letchon!5e0!3m2!1sfil!2sph!4v1691136153523!5m2!1sfil!2sph" gesture="media"  allow="encrypted-media" allowfullscreen></iframe>
                    {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3880.300415086431!2d123.3656668747481!3d13.455569904083752!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a19738621d4859%3A0x5d2b0492bcd8ad9a!2sTom&#39;s%20Letchon!5e0!3m2!1sfil!2sph!4v1691136153523!5m2!1sfil!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>  --}}
                </div>
        </div>
    </section>

    <!-- Start Contact -->
    <div class="container-fluid bg-brown-body py-5">
        <div class="row py-5">

            <form action="/customerMessage" enctype="multipart/form-data" class="col-md-9 m-auto" method="post" role="form">
                @csrf

                <div class="col-lg-8 m-auto">
                    <h2 class="h1 text-center">Message San's Letchon!</h2>
                </div>
                <p>We're excited to assist you with any questions or inquiries you may have about our mouthwatering lechon and services. Kindly fill out the form below, and we'll get back to you as soon as possible to help make your celebration extra special.


                <div class="row">                
                    <div class="form-group col-md-6 mb-3">
                        <label for="inputname">Name</label>
                        <input type="text" class="form-control mt-1" id="name" name="name" placeholder="Name" value="{{old('name')}}" required>
                            @Error('name')
                                <p class="text-danger text-md mt-1">{{$message}}</p>
                            @enderror
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label for="inputemail">Phone Number</label>
                        <input type="text" class="form-control mt-1" id="email" name="phone_number" placeholder="Phone Number" value="{{old('phone_number')}}" require>
                            @error('phone_number')
                                <p class="text-danger text-md mt-1">{{$message}}</p>
                            @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="inputsubject">Address</label>
                    <input type="text" class="form-control mt-1" id="subject" name="address" placeholder="Address" value="{{old('address')}}" required>
                            @error('address')
                                <p class="text-danger text-md mt-1">{{$message}}</p>
                            @enderror
                </div>
                <div class="mb-3">
                    <label for="inputmessage">Message</label>
                    <textarea class="form-control mt-1" id="message" name="message" placeholder="Message" rows="8" value="{{old('message')}}" required></textarea>
                            @error('message')
                                <p class="text-danger text-md mt-1">{{$message}}</p>
                            @enderror
                </div>

                <input hidden class="form-control mt-1" id="subject" name="num" value="0" >
                <input hidden class="form-control mt-1" id="subject" name="messageFrom" value="customer" >

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
