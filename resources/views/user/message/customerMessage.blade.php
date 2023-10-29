@extends('layout.header-footer-layout')

@section('content')

<link href="/assets/css/admin/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
<link href="/assets/css/admin/lib/chartist/chartist.min.css" rel="stylesheet">
<link href="/assets/css/admin/lib/font-awesome.min.css" rel="stylesheet">
<link href="/assets/css/admin/lib/themify-icons.css" rel="stylesheet">
<link href="/assets/css/admin/lib/owl.carousel.min.css" rel="stylesheet" />
<link href="/assets/css/admin/lib/owl.theme.default.min.css" rel="stylesheet" />
<link href="/ssets/css/admin/lib/weather-icons.css" rel="stylesheet" />
<link href="/assets/css/admin/lib/menubar/sidebar.css" rel="stylesheet">
<link href="/assets/css/admin/lib/bootstrap.min.css" rel="stylesheet">
<link href="/assets/css/admin/lib/helper.css" rel="stylesheet">
<link href="/assets/css/admin/styleMessage.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <div class="compose-email">
            <div class="mail-box">
              <aside class="sm-side">
                <div class="user-head">
                  <a class="inbox-avatar" href="javascript:;">
                                              <img class="img-fluid" src="./assets/img/loginbg.png" alt="logo" >
                        </a>                  
                  <div class="user-name">
                    <h5><a href="#">San's Letchon</a></h5>
                    <span><a href="#">09776162392</a></span>
                  </div>
                </div>
                <div class="inbox-body text-center">
                  <a href="#myModal" data-toggle="modal" title="Compose" class="btn btn-compose"> Message San's Letchon</a>
                
                
                  <!-- Modal -->
                  <div aria-hidden="true" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                    <div class="modal-dialog">
                      <div class="modal-content text-left">
                        <div class="modal-header">
                            <h4 class="modal-title">Message</h4>
                          <button aria-hidden="true" data-dismiss="modal" class="close" type="button"><i class="ti-close"></i></button>
                          
                        </div>
                        <div class="modal-body bg-light">
                            <div class="container-fluid  py-1">
                                <div class="row py-1">
                        
                                    <form action="/customerMessage" enctype="multipart/form-data" class="col-md-12 m-auto" method="post" role="form">
                                        @csrf
                        
                                        <div class="row">                

    
                                                <input hidden name="name" value="{{auth()->user()->name}}" require>
                                                <input hidden name="phone_number" value="{{auth()->user()->phone_number}}" >

                                        </div>

                                        <div class="mb-1">
                                            {{-- <label for="inputmessage">Message</label> --}}
                                            <textarea class="form-control mt-1" id="message" name="message"  rows="8" placeholder="Type here...." value="{{old('message')}}" required></textarea>
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
                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal -->
                </div>
                <ul class="inbox-nav inbox-divider">
                  <li class="breadcrumb-item active">
                    <a href="/customerMessage"><i class="fa fa-inbox"></i> Inbox <span class="badge badge-success pull-right m-t-12">@if(intval($count_mess)>0) {{$count_mess}} @endif</span></a>
                  </li>
                  <li>
                    <a href="/sent-message"><i class="fa fa-envelope-open"></i> Sent Message</a>
                  </li>
                  <li>
                   
                  </li>
                  <li>
                   
                  </li>

                </ul>


                <div class="inbox-body text-center">

              </aside>
              <aside class="lg-side">

                @if(session()->has('message'))
                <div class="alert alert-success" id="alert">
                <button type="button" class="close" data-dismiss="alert">x</button>
                {{session()->get('message')}}
                </div>
            @endif
            
                <div class="inbox-head">
                  <h3 class="input-text">Inbox</h3>
                  <form action="#" class="pull-right position">
             
                  </form>
                </div>
 
               
              
                @foreach($message as $messages)
                
                <div class="table-responsive">
                  <table class="table table-inbox table-hover table-responsive">
                    <tbody>
                      @if($messages->num == 0)
                      <tr style="background-color: rgb(68, 93, 126)">
                      @endif
                      @if($messages->num == 1)
                      <tr>
                      @endif
                      
                      @if($messages->num == 0)
                        <td style="width:20%; text-align:center; color:white">Message From:</td>
                        <td style="width:80%; text-align:center; color:white">San's Lechon</td>
                      @endif

                      @if($messages->num == 1)
                        <td style="width:20%; text-align:center; color:rgb(0, 0, 0)">Message From:</td>
                        <td style="width:80%; text-align:center; color:rgb(2, 1, 1)">San's Lechon</td>
                      @endif
                        <form action="/sanlechonmessage-view/{{$messages->id}}" enctype="multipart/form-data" method="POST" role="form">
                          @csrf
                          @method('PUT')
                        <td style="width:10%; text-align:center"><button type="submit" style="border:0 "><i class="fa fa-envelope fa fa-white"></button></i></td>
                      </form>
                      </tr>
                    </tbody>
                  </table>
                </div>
                @endforeach
              
              </aside>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <script>
    const myButton = document.getElementById('myButton');
    const myDiv = document.getElementById('myDiv');

    myButton.addEventListener('click', function() {
        // Change the background color of the div
        myDiv.style.backgroundColor = 'blue';
    });
</script>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script src="assets/js/script.js"></script>

<script type="text/javascript">

  $("document").ready(function()
  
  {
    setTimeout(function()
      {
        $("div.alert").remove();
      },3000);
  });
  </script>
@endsection