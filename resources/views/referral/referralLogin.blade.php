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
    <link rel="icon" href="assets/img/loginIcon.png">
</head>
    <body>
        <form method="POST" action="/login/auth" >
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
                    <h1 class="title">Login</h1>
                    <div class="form-text">
                        <div class="label">
                            <label for="">Username</label>
                            @Error('username')
                            <p class="error-message">{{$message}}</p>
                           @enderror
                        </div>
                        <input type="text" name="username" id="username" placeholder="Input Username">
                    </div>
                    <div class="form-text">
                        <div class="label">
                            <label for="">Password</label>
                            @Error('password')
                            <p class="error-message">{{$message}}</p>
                           @enderror
                        </div>
                        <input type="password" name="password" id="password" placeholder="Input Password">
                    </div>
                    <div class="button">
                        <button>Login</button>
                        <h2>Don't have an account? <a href="/register">Register Here</a></h2>
                    </div>
                </div>
            </div>
        </section>
        </form>
    </body>
</html>