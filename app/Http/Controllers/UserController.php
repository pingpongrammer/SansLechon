<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use App\Models\PageView;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\OTP; // Import the OTP model
use App\Models\User; // Import the User model
use App\Mail\OtpMail; // Import your OtpMail class
// use Illuminate\Http\Request; // Import the Request class

class UserController extends Controller
{
    public function login(Request $request){
    
        return view('login');
    }


    public function otpVerification(){
        return view('emails.otpverification');
    }


    public function logout(Request $request) {
        
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    
    public function registerView(){
        return view('/register');
    }




    public function loginAuth(Request $request) {
        $formFields = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
    
        // Attempt to authenticate using the provided username and password
        if (auth()->attempt(['username' => $formFields['username'], 'password' => $formFields['password']])) {
            // Authentication successful
            $user = auth()->user();
    
            if ($user->adminType == 'customer') {
                // For customers, directly log them in and redirect to home
                Auth::login($user);
                $request->session()->regenerate();
                return redirect('/home')->with('message', 'Welcome ' . $user->name .  '. You are now logged in!');
            }
    
            // Send OTP email and then redirect to OTP verification
            $this->sendOtpEmail($user);
    
            return redirect('/otpVerification')->with('message', 'OTP sent to your email for verification');
        }
    
        // Authentication failed
        return back()->withErrors(['password' => 'Invalid Username or Password'])->onlyInput('password');
    }
    
//     public function verifyOtp(Request $request) {
//         $user = Auth::user();
    
//         if ($user && $user->otp == $request->otp) {
//             $otpCreatedAt = Carbon::parse($user->created_at);
//             $currentTime = Carbon::now();
    
//             $otpExpiryMinutes = 1; // Adjust this value to your desired OTP expiry time in minutes
    
//             if ($otpCreatedAt->diffInMinutes($currentTime) <= $otpExpiryMinutes) {
//                 // OTP is valid and hasn't expired
//                 $user->otp = null;
//                 $user->created_at = null; // Clear OTP and timestamp
//                 $user->save();
    
//             // Proceed with login
//             Auth::login($user);
//             $request->session()->regenerate();
    
//             // Redirect based on user type
//             if ($user->adminType == 'admin') {
//                      $user = auth()->user();
//                      $logName = "{$user->username}";
            
//                      activity()->useLog($logName)
//                     ->log('You have been Login');
//             return redirect('/dashboard')->with('message', 'Welcome ' . $user->name .  '. You are now logged in!');
//             } else if ($user->adminType == 'customer') {
//                 return redirect('/home')->with('message', 'You are now logged in as a customer!');
//             } else if ($user->adminType == 'influencer') {
//                 return redirect('/marketer-dashboard')->with('message', 'You are now logged in as an influencer!');
//             }
    
//     } else {
//         return back()->withErrors(['otp' => 'OTP has expired.'])->onlyInput('otp');
//     }
// } else {
//     return back()->withErrors(['otp' => 'Invalid OTP'])->onlyInput('otp');
// }

// }

public function verifyOtp(Request $request) {
    $user = Auth::user();

    if ($user) {
        if ($user->adminType == 'customer') {
            // For customers, directly log them in and redirect to home
            Auth::login($user);
            $request->session()->regenerate();
            return redirect('/home')->with('message', 'Welcome ' . $user->name .  '. You are now logged in!');
        } else if ($user->otp && $user->otp == $request->otp) {
            $otpCreatedAt = Carbon::parse($user->created_at);
            $currentTime = Carbon::now();

            
            $otpExpiryMinutes = 5; // Adjust this value to your desired OTP expiry time in minutes

            if ($otpCreatedAt->diffInMinutes($currentTime) <= $otpExpiryMinutes) {
                // OTP is valid and hasn't expired
                $user->otp = null;
                $user->created_at = null; // Clear OTP and timestamp
                $user->save();

                // Proceed with login
                Auth::login($user);
                $request->session()->regenerate();

                // Redirect based on user type
                if ($user->adminType == 'admin') {
                    $logName = "{$user->name}";
                    activity()->useLog($logName)->log('You have been Login');
                    return redirect('/dashboard')->with('message', 'Welcome ' . $user->name .  '. You are now logged in!');

                } elseif ($user->adminType == 'influencer') {
                    return redirect('/marketer-dashboard')->with('message', 'Welcome ' . $user->name .  '. You are now logged in!');
                }
            } else {
                return back()->withErrors(['otp' => 'OTP has expired.'])->onlyInput('otp');
            }
        } else {
            return back()->withErrors(['otp' => 'Invalid OTP'])->onlyInput('otp');
        }
    }
}



    public function sendOtpEmail(User $user) {
        if ($user->adminType == 'admin' || $user->adminType == 'influencer') {
            $otp = mt_rand(100000, 999999);
            $user->otp = $otp;
            $user->created_at = now(); // Store the timestamp
            $user->save();
    
            $emailData = [
                'name' => auth()->user()->name,
                'title' => 'OTP Confirmation',
                'body' => 'Your OTP is ' . $otp,
            ];
    
            // Mail::to($user->email)->send(new OtpMail($emailData));
    
            // dd('Email sent successfully');
        }
    }
    
}
