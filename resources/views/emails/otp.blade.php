

<img src="{{$message->embed(public_path().'/assets/img/loginbg.png')}}" style="width: 100%">
<h1 style="text-align: center">{{ $emailData['title'] }}</h1>
<p>Dear {{ $emailData['name']}}</p>
<p>You are receiving this message following your request to login to your SansLechon account.</p>
<p>If you made this request, plese input the otp verification code at the verification page. This Otp code will expire in 5 minutes. Thank you!</p>
<br>
<h3 style="text-align: center">{{ $emailData['body']}}</h3>
<br>
<p>If you did not not request to login into your account please ignore this email.</p>
<p>Best Regards, </p>
<p>SansLechon</p>