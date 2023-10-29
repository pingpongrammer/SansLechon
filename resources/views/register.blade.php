<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jomhuria&family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/login.css">
    <title>Register</title>
    <link rel="icon" href="assets/img/loginIcon.png">
</head>
    <body>
        <form action="/registerStore" enctype="multipart/form-data" method="post" role="form">
            @csrf
        <section class="section">
            <div class="display-logo">
                <img src="/assets/img/logo.png" alt="">
                <h1>Putok Batok sa Sarap!</h1>
                <div class="location-logo">
                    <img  src="/assets/img/location.png" alt="">
                    <h2>Located at San Ramon Baao Camarines Sur</h2>
                </div>
            </div>
            <div class="form">
                <div class="card">
                    <h1 class>Register</h1>
                        <div class="success-message">
                        @if(session()->has('message')) 
                            <h3 class="close"> {{session()->get('message')}} </h3>
                         @endif
                        <div>
                    <div class="form-text">
                        <div class="label">
                            <label for="">Name</label>
                            @Error('name')
                            <p class="error-message">{{$message}}</p>
                           @enderror
                        </div>
                        <input type="text" name="name" placeholder="Input Name" value="{{ old('name') }}">
                    </div>
                    <div class="form-text">
                        <div class="label">
                            <label for="">Phone Number</label>
                            @Error('phone_number')
                            <p class="error-message">{{$message}}</p>
                           @enderror
                        </div>
                        <input type="text" name="phone_number" placeholder="Input Phone Number" value="{{ old('phone_number') }}">
                    </div>
                    <div class="form-text">
                        <div class="label">
                            <label for="">Username</label>
                            @Error('username')
                            <p class="error-message">{{$message}}</p>
                           @enderror
                        </div>
                        <input type="text" name="username" placeholder="Input Username" value="{{ old('username') }}">
                    </div>
                    <div class="form-text">
                        <div class="label">
                            <label for="">Password</label>
                            @Error('password')
                            <p class="error-message">{{$message}}</p>
                           @enderror
                        </div>
                        <input type="password" name="password" placeholder="Input Password" value="{{ old('password') }}">
                    </div>
                    <div class="form-text">
                        <div class="label">
                            <label for="">Confirm Password</label>
                            @Error('password_confirmation')
                            <p class="error-message">{{$message}}</p>
                           @enderror
                        </div>
                        <input type="password" name="password_confirmation" placeholder="Input Confirm Password" value="{{ old('password_confirmation') }}">
                    </div>
                    <input hidden  id="adminType" name="adminType"  value="customer" >
                    <div class="button">
                        <button>Register</button>
                        <h2>Already have an account? <a href="/">Login</a></h2>
                    </div>
                </div>
            </div>
        </section>
    </form>
    </body>
</html>