@extends('layout.header-footer-layout')
@section('content')

<div class="row justify-content-center">
    <!-- col end -->
    <div class="col-lg-7 mt-5">
        <p>Sent on {{$messa->created_at}}</p>
        <div class="card card mx-auto shadow">
            <div class="card-body">

                    <div class="row">
                        
                        <div>
                           
                            <label for="terms_and_conditions">Sent from San's Lechon </label>     
                            <p class="text-justify"> &ensp; &ensp; &ensp; {{$messa->message}}
                            </p>
                        </div>
                    </div>
<br>
<br>
                    <div class="container mt-4">
                    <div class="row pb-3">

                    </div>

                    

            </div>



            </div>
        </div>
    </div>
</div>
<br>
<br>
@endsection