<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Orders;
use App\Models\PageView;
use App\Models\Payoutreq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AffiliateController extends Controller
{

        public function editProfile(){
            $domain = URL::to('/');
            $url = $domain.'/refferalRegistration?ref='.auth()->user()->referral_code;
            return view('marketer.editProfile', ['url'=>$url]);
        }

        public function requestPayout(){

            $affiliateRef = auth()->user()->referral_code;
            $totalOrders = Orders::where('referral_code', $affiliateRef)
            ->where('status', 'success')->get();


            $comission = $totalOrders->sum(function ($order) {
                return ($order->qty * $order->price) * 0.02;  // Calculate the total price for each order and sum them up
            });

            return view('marketer.requestPayout', ['comission' => $comission]);
        }

        public function requestPayoutStore(Request $request){

            // dd($request->all());
            $formFields = $request->validate([
                'name' => 'required',
                'username' => 'required',
                'phone_number' => 'required',
                'comission' => 'required',
                'referral_code' => 'required',
            ]);
            

            $affiliateRef = auth()->user()->referral_code;

            $payment = 'request';

            $verify=$request->input('verify');
            $hashedPassword = Auth::user()->getAuthPassword();
      
            if (Hash::check($verify, $hashedPassword)) {

            Payoutreq::create($formFields);
            Orders::where('referral_code', $affiliateRef)->where('status', 'success')->update(['payment' => $payment]);

            return back()->with('message', 'Your Request has been sent, Please wait and Sans Lechon will contact you for payout. Thank You');
        }else{
            return back()->with('error', 'Password Confirmation is Wrong');
        }
    }


    public function customerReqPayment(Request $request){

        $payreq = Payoutreq::all();

        return view('admin.accounts.customerReqPayment', ['payreq'=>$payreq]);

    }

    public function requestPaymentView(Request $request, $id){
        // dd($request->all());
        $payreq = Payoutreq::find($id);
        $reco_code = $payreq->referral_code;

        $pay = Orders::where('referral_code', $reco_code)->get();

        $payment = 'reset';
        
        // Iterate through each order and update the payment column
        foreach ($pay as $order) {
            $order->update(['payment' => $payment]);
        }
        
        return view('admin.accounts.ReqPaymentView', ['payreq' => $payreq]);
    }

          //Update data of affiliate partner
       public function updateProfile(Request $request)
       {
           $rules = [
               'name' => 'required',
               'username' => '',
               'email' => '',
               'phone_number' => '',
               'password' => '',
               'address' => '',
               'birthday' => '',
               'gender' => '',
               'profile_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust validation rules for the image if needed
           ];
       
           // Validate the data
           $request->validate($rules);
       
           // Get the user
           $user = auth()->user();
       
           // Only update the profile image if a new file is uploaded
           if ($request->hasFile('profile_image')) {
               // Store the new profile image
               $profile = $request->file('profile_image')->store('pictures', 'public');
               // Delete the old profile image if it exists
               if ($user->profile_image) {
                   Storage::disk('public')->delete($user->profile_image);
               }
               // Update the user's profile image
               $user->profile_image = $profile;
           }
       
           // Update the other profile fields
           $user->name = $request->input('name');
           $user->username = $request->input('username');
           $user->email = $request->input('email');
           $user->phone_number = $request->input('phone_number');
           $user->address = $request->input('address');
           $user->birthday = $request->input('birthday');
           $user->gender = $request->input('gender');
       
           // Save the user model
           $user->save();
       
           return redirect('/marketerProfile')->with('message', 'Edit Profile Successful');
       }


        //Marketer DashboardProfile
        public function marketerProfile(){
            $domain = URL::to('/');
            $url = $domain.'/refferalRegistration?ref='.auth()->user()->referral_code;
            return view('marketer.marketer-profile', ['url'=>$url]);
        }

        //Marketer Dashboard
        public function marketerDashboard(){

            $affiliateRef = auth()->user()->referral_code;
            $pageViewCount = PageView::where('referral_code', $affiliateRef)->count();
            $webviews = User::where('referral_code', $affiliateRef)->count() - 1;
        
            $orders = Orders::where('referral_code', $affiliateRef)
                        ->where('payment', 'new')
                        ->where('status', 'success')
                        ->orWhere('payment', 'request')
                        ->get();
        
            $order_ids = $orders->pluck('id')->toArray();
            
            $totalOrders = Cart::whereIn('orders_id', $order_ids)->count();
        
            $comission = Cart::whereIn('orders_id', $order_ids)->get()->sum(function ($cart) {
                return $cart->price + $cart->priceCake + $cart->priceMom;
            }) * 0.02;
        
            return view('marketer.marketer-dashboard', ['webviews' => $webviews, 'totalOrders' => $totalOrders, 'comission' => $comission, 'pageViewCount' => $pageViewCount]);
        }
        


            //Marketer Wallet
            public function mywallet(){

                $affiliateRef = auth()->user()->referral_code;

                    
                $successfulOrders = Orders::where('referral_code', $affiliateRef)
                ->where('status', 'success')
                ->get();

  
                $commissionData = [];
    
                foreach ($successfulOrders as $order) {
                    $orderIds = [$order->id];

                    $totalCommission = Cart::whereIn('orders_id', $orderIds)->get()->sum(function ($cart) {
                        return $cart->price + $cart->priceCake + $cart->priceMom;
                    }) * 0.02;
            
                    $commission = Cart::whereIn('orders_id', $orderIds)->get()->sum(function ($cart) {
                        return $cart->price + $cart->priceCake + $cart->priceMom;
                    }) * 0.02;
            
                    $commissionData[$order->id] = $commission;
                    $customer[$order->id] = $order->name;
                    $date[$order->id] = $order->created_at;
                }


            return view('marketer.mywallet', [
                'successfulOrders' => $successfulOrders,
                'commissionData' => $commissionData,
                'customer' => $customer,
                'date' => $date,
                'totalComission'=>$totalCommission
            ]);
        }


        
}
