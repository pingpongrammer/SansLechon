<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Orders;
use App\Models\Account;
use App\Models\Network;
use App\Models\Freebies;
use App\Models\PageView;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AccountController extends Controller
{
    public function accountAdd(){
        return view('admin.accounts.accountAdd');
    }

    public function customerRegistered(Request $request){

        // Retrieve all users with adminType 'customer'
        $customers = User::where('adminType', 'customer')->orderBy('id','DESC')->get();
    
        // Create an empty array to store the results
        $customerData = [];
    
        // Loop through each customer
        foreach ($customers as $customer) {
            // Get the referral code for the current customer
            $referralCode = $customer->referral_code;
    
            // Retrieve the influencer with the same referral code
            $influencer = User::where('adminType', 'influencer')
                              ->where('referral_code', $referralCode)
                              ->first();
    
            // Add customer and influencer data to the results array
            $customerData[] = [
                'customer' => $customer,
                'influencer' => $influencer,
            ];
        }
    
        return view('admin.accounts.customerRegistered', ['customerData' => $customerData]);
    }
    

    public function marketerAccount(){
        $acc = User::where('adminType', 'influencer')->orderBy('id','DESC')->get();
        return view('admin.accounts.marketerAccount', ['acc'=>$acc]);
    }

    public function affiliatePartnerView(Request $request, $id){
        $user = User::find($id);

        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }
    
        $referralCode = $user->referral_code;
    
        $successfulOrders = Orders::where('referral_code', $referralCode)
            ->where('status', 'success')
            ->get();
    
            $commissionData = [];
            $customer = []; 
            $date = []; 
    
        foreach ($successfulOrders as $order) {
            $orderIds = [$order->id];
    
            $commission = Cart::whereIn('orders_id', $orderIds)->get()->sum(function ($cart) {
                return $cart->price + $cart->priceCake + $cart->priceMom;
            }) * 0.02;
    
            $commissionData[$order->id] = $commission;
            $customer[$order->id] = $order->name;
            $date[$order->id] = $order->created_at;
        }
    
        return view('admin.accounts.affiliatePartnerView', [
            'user' => $user,
            'successfulOrders' => $successfulOrders,
            'commissionData' => $commissionData,
            'customer' => $customer,
            'date' => $date
        ]);
    }    


    public function accountStore(Request $request){
        // dd($request->all());
        $formFields = $request->validate([
            'name' => 'required',
            'username' => ['required','min:4', Rule::unique('users', 'username')],
            'email' => 'email',
            'adminType' => 'required',
            'password' => ['required', 'confirmed', 'min:6']
        ]);
            //Hash Password
        $formFields['password'] =  bcrypt($formFields['password']);

        
        $user = User::create($formFields);

        return back()->with('message', 'Registration Complete');
    }


//Registration Store to database
    public function registerStore(Request $request){
        // dd($request->all());
        $formFields = $request->validate([
            'name' => 'required',
            'username' => ['required','min:4', Rule::unique('users', 'username')],
            'phone_number' => ['required','numeric', Rule::unique('users', 'phone_number')],
            'adminType' => 'required',
            'referral_code' => '',
            'password' => ['required', 'confirmed', 'min:6'],
        ]);
            //Hash Password
        $formFields['password'] =  bcrypt($formFields['password']);
       
        $user = User::create($formFields);

        Freebies::create([
            'user_id' => $user->id,
        ]);

        return back()->with('message', 'Registration Complete! You can now login.');
    }

    //Registration Store to database
    public function affiliateStore(Request $request){
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'username' => ['required','min:4', Rule::unique('users', 'username')],
            'email' => 'email',
            'phone_number' => ['required'],
            'adminType' => 'required',
            'password' => ['required', 'confirmed', 'min:6'],
            'referral_code' => '',
            'address' => '',
            'birthday' => '',
            'gender' => '',
            'profile_image' => '',
        ]);

        if($request->hasFile('profile_image')){
            $profile = $request->file('profile_image')->store('pictures', 'public');
        }

    $referralCode = Str::random(10);

            $user = new User([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'adminType' => $request->adminType,
                'address' => $request->address,
                'birthday' => $request->birthday,
                'gender' => $request->gender,
                'profile_image' => $profile,
                'password' => Hash::make($request->password),
                'referral_code' => $referralCode,
            ]);
            $user->save();

            PageView::create([
                'username' => $request->username, 
                'views' => 0,
                'referral_code' => $referralCode,
            ]);

            return back()->with('message', 'Your Registration has been successful, You can now login in SansLechon login page');
    } 


     
   
    public function refferalRegistration(Request $request){


        if(isset($request->ref)){

            $referral = $request->ref;
            $userData = User::where('referral_code', $referral)->get();
            $domain = URL::to('/');
            $url = $domain.'/referralLogin?ref='.$referral;

            if(count($userData) > 0 ){
                return view('referral.referralRegistration', compact('referral', 'url'));

            }else{
                return view('referral.404');
            }

    } 
        else{
            return redirect('/');
        }

        
    }

    public function referralLogin(Request $request){

        if(isset($request->ref)){

            $referral = $request->ref;
            $userData = User::where('referral_code', $referral)->get();
            $domain = URL::to('/');
            $url = $domain.'/refferalRegistration?ref='.$referral;

            if(count($userData) > 0){
                
                return view('referral.referralLogin', compact('referral', 'url'));

            }else{
                return view('referral.404');
            }
        }
        else{
            return redirect('/');
        }

        
    }
    

    //Registration Store to database
    public function refferalRegistrationStore(Request $request){
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'username' => ['required','min:4', Rule::unique('users', 'username')],
            'phone_number' => 'required',
            'adminType' => 'required',
            'password' => ['required', 'confirmed', 'min:6']
        ]);
            
        // $referralCode = Str::random(10);
    
        if (isset($request->referral_code)) {
            $userData = User::where('referral_code', $request->referral_code)->first();
    
            if ($userData) {
                $user = new User([
                    'name' => $request->name,
                    'username' => $request->username,
                    'phone_number' => $request->phone_number,
                    'adminType' => $request->adminType,
                    'password' => Hash::make($request->password),
                    'referral_code' => $request->referral_code,
                ]);
                $user->save();
    
                Network::create([
                    'referral_code' => $request->referral_code,
                    'user_id' => $user->id,
                    'parent_user_id' => $userData->id,
                ]);
            } else {
                return back()->with('error', 'Please enter a valid referral code!');
            }
        } else {
            $user = new User([
                'name' => $request->name,
                'username' => $request->username,
                'phone_number' => $request->phone_number,
                'adminType' => $request->adminType,
                'password' => Hash::make($request->password),
                'referral_code' => $referralCode,
            ]);
            $user->save();
        }
    
        return back()->with('message', 'Registration Complete! You can now login.');
    }
    

   
}

