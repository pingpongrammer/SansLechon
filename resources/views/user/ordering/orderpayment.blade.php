@extends('layout.header-footer-layout')
@section('content')


            
{{-- @if(session()->has('message'))
<div class="alert alert-success" id="alert">
<button type="button" class="close" data-dismiss="alert">x</button>
{{session()->get('message')}}
</div>
@endif --}}

<section class="bg-light">
    <div class="container pb-5">                    
    

        <div class="row">
            <div class="col-lg-5 mt-5">
                <div class="card mb-3 p-4">
                    @if($orderss->modeOfPayment == 'Gcash')
                    <h5 style="text-align: center">Gcash No: 09567556581</h5>
                    <img class="img-fluid" src="/assets/img/qrcode.png" alt="" style="width:400px; height:500px">
                    @endif

                    @if($orderss->modeOfPayment == 'Bank')
                    {{-- <h5 style="text-align: center">Gcash No: 09567556581</h5> --}}
                    <img class="img-fluid" src="/assets/img/bank.png" alt="" style="width:400px; height:500px">
                    @endif
                    
                    <p>Note: Please take a screenshot of your payment as proof and send it to us. Thank you!</p>
                </div>
                <div class="row">
            
                </div>
            </div>
            <!-- col end -->
            <div class="col-lg-6 mt-5">
                <div class="card">
                    <div class="card-body">

                        <h4>Send your proof of payment here</h4>

                            <form action="/order-paymentStore"  method="POST" enctype="multipart/form-data" class="col-md-11 m-auto" role="form">
                                @csrf

                            <div class="row">
                                <hr>
                                
                                <div class="form-group col-md-12 mb-3">
                                    <h6 style="font-size:12px" >Proof of Payment<span style="color: red">*</span></h6>
                                    <img id="prview"style="width: 270px; height:250px" />
                                    <input type="file" name="proofPayment" id="myInput">
                                    @Error('proofPayment')
                                    <p class="text-danger text-md mt-1">{{$message}}</p>
                                   @enderror
                                </div>
                               
                            </div>

                            <hr>
                            <div class="container mt-4">
                            <div class="row pb-3">
                                <div class="col d-grid ">
                                    <button type="submit" class="btn btn-success btn-lg"  id="myButton"  >Confirm</button>
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

<script>
    myInput.onchange = evt => {
      const [file] = myInput.files
      if (file) {
        prview.style.visibility = 'visible';
    
        prview.src = URL.createObjectURL(file)
      }
    }
  </script>

<script>
    const inputField = document.getElementById('myInput');
    const submitButton = document.getElementById('myButton');

    inputField.addEventListener('input', function() {
        if (inputField.value.trim() !== '') {
            submitButton.removeAttribute('disabled');
        } else {
            submitButton.setAttribute('disabled', 'true');
        }
    });
</script>

@endsection