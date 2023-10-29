<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jomhuria&family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/login.css">
    <title>Login</title>
</head>
    <body>
        <form method="POST" action="/verify-otp" enctype="multipart/form-data" >
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
                    <h1 class="title">OTP Verification</h1>
                    <div class="form-text">
                            @Error('otp')
                            <h2 class="error-message" style="font-size: 30px; font-weight: 200;">{{$message}}</h2>
                           @enderror
                        <div class="label">
                            <label for="">OTP Verification was sent to your email.</label>
                        </div>
                        <input type="text" name="otp" id="otp" placeholder="Input OTP Verification">
                    </div>
                    <div class="button">
                        <button>Confirm Otp</button>
                        <h2><a href="/">Back</a></h2>
                    </div>
                </div>
            </div>
        </section>
        </form>
    </body>
</html>