<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Orders;
use App\Models\Letchon;
use App\Models\Freebies;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class OrderController extends Controller
{

    public function orderView(){
        $user = auth()->user()->username;
        $user_id = auth()->user()->id; 

        $letc = Letchon::all();
        $cat = Categories::where('shop', 'cake')->get();
        $mombi = Categories::where('shop', 'mombizz')->get();
        $cartCount = Cart::where('username', $user)
                        ->where('status', 'cart')
                        ->orWhere('status', 'toPay')->count();
        $freeby = Freebies::where('user_id', $user_id)->get();

        return view('user.index', ['letc'=>$letc, 'cartCount'=>$cartCount, 'cat'=>$cat, 'mombi' => $mombi, 'freeby' => $freeby]);
    }

    public function orderPayment(Request $request){
        $user = auth()->user()->username;
        $letc = Letchon::all();
        $user = Auth::user();
        $orderss = $user->orders()->latest()->first();
        $cartCount = Cart::where('username', $user)
                    ->where('status', 'cart')
                    ->orWhere('status', 'toPay')->count();
        return view('user.ordering.orderpayment', ['orderss' => $orderss, 'cartCount'=>$cartCount]);
    }

    public function orderForm(Request $request){
        $user = auth()->user()->username;
        $cartItems = Cart::where('username', $user)
                     ->where('status', 'cart')->get();
        $cartCount = Cart::where('username', $user)
                     ->where('status', 'cart')
                     ->orWhere('status', 'toPay')->count();

        $totalPrice = 0;
    
        foreach ($cartItems as $cartItem) {
            if ($cartItem) {
                $totalPrice += $cartItem->price + $cartItem->priceCake + $cartItem->priceMom;
            }
        }

        return view('user.ordering.order-form-cart', ['cartItems' => $cartItems, 'totalPrice' => $totalPrice, 'cartCount'=>$cartCount]);
    }

  public function orderpaymentStore(Request $request)
{
    $this->validate($request, [
        'proofPayment' => 'required',
    ]);

    $userr = auth()->user()->username;
    // Get the currently authenticated user
    $user = Auth::user();

    $order = $user->orders()->latest()->first(); // Get the latest order
    $carttt = Cart::where('username', $userr)->get();
    $status = 'pending';


    if ($request->hasFile('proofPayment')) {
        $image = $request->file('proofPayment')->store('images', 'public');
        
        Cart::where('username', $userr)->where('status', 'toPay')->update(['orders_id' => $order->id]);
        // Update the order with the proofPayment file path
        $order->update(['proofPayment' => $image, 'status' => 'new']);
        foreach ($carttt as $cartItem) {
            $cartItem->update(['status' => $status]);
        }
   
        return redirect('/custPendingOrder')->with('message', 'Order was been successfull. Sans Lechon will reachout to you and you can also message us in our fb page and send your proof of payment. Thank You');
    }
}

    public function orderViewKls($id){
        $user_id = auth()->user()->id; 
        $user = auth()->user()->username;
        $let = Letchon::find($id);
        $letc = Letchon::all();
        $cat = Categories::where('shop', 'cake')->get();
        $mombi = Categories::where('shop', 'mombizz')->get();
        $freeby = Freebies::where('user_id', $user_id)->get();
        $cartCount = Cart::where('username', $user)
                    ->where('status', 'cart')
                    ->orWhere('status', 'toPay')->count();

        $cartItems = Cart::where('username', $user)
                        ->where('status', 'cart')->get();

        $totalPrice = 0;
    
        foreach ($freeby as $freebies) {
            if ($freebies) {
                $totalPrice += $let->prices + $freebies->priceCake + $freebies->priceMom;
            }
        }
        return view('user.ordering.order', ['let'=>$let, 'letc'=>$letc, 'cat'=>$cat, 'mombi' => $mombi, 'cartCount'=>$cartCount, 'freeby'=>$freeby, 'cartItems' => $cartItems, 'totalPrice' => $totalPrice,]);
    }

    public function adminOrders(){

        $letc = Orders::orderBy('id','DESC')
                        ->where('status','new')
                        ->orWhere('status', 'pending')
                        ->orWhere('status', 'success')
                        ->orWhere('status', 'cancel')
                        ->get();

        return view('admin.order.adminOrders', ['letc'=>$letc]);
    }
    
    public function cancelOrderView(){

        $letc = Orders::orderBy('id','DESC')
                        ->where('status','cancel')->get();

        return view('admin.order.cancelOrder', ['letc'=>$letc]);
    }

    public function successOrderView(){
        $letc = Orders::orderBy('id','DESC')->where('status','success')->get();
        return view('admin.order.successOrder', ['letc'=>$letc]);
    }

    public function newOrderView(){
        $letc = Orders::orderBy('id','DESC')->where('status','new')->get();
        return view('admin.order.newOrder', ['letc'=>$letc]);
    }

    public function pendingOrderView(){
        $letc = Orders::orderBy('id','DESC')->where('status','pending')->get();
        return view('admin.order.pendingOrder', ['letc'=>$letc]);
    }

    public function adminOrdersView(Request $request, $id){
        
        $letc = Orders::find($id);
        // $letcc = $letc->id;
        // dd($letcc);
        $cartItems = Cart::where('orders_id', $letc->id)
        ->where('status', 'pending')->get();
        $totalPrice = 0;
    
 
        
        if($letc->location ==='Baao'){
           $fee = $letc->location;   
           $fee = 35;   
        }
        if($letc->location ==='Iriga'){
            $fee = $letc->location; 
            $fee = 84;     
         }
         if($letc->location ==='Nabua'){
            $fee = $letc->location;   
            $fee = 84;     
         }
         if($letc->location ==='Pili'){
            $fee = $letc->location;   
            $fee = 158;     
         }
         if($letc->location ==='Bula'){
            $fee = $letc->location;   
            $fee = 105;     
         }
         if($letc->location ==='Bato'){
            $fee = $letc->location;   
            $fee = 116;     
         }
         if($letc->location ==='Buhi'){
            $fee = $letc->location;   
            $fee = 140;     
         }
         if($letc->location ==='Balatan'){
            $fee = $letc->location;   
            $fee = 140;     
         }
         if($letc->location ==='Naga'){
            $fee = $letc->location;   
            $fee = 332;     
         }
        //  $total = $pricee + $fee;

         foreach ($cartItems as $cartItem) {
            // Check if the categories relationship is loaded and not null
            if ($cartItem) {
                // Assuming 'price' is the attribute in the 'categories' table
                $totalPrice += $cartItem->price + $cartItem->priceCake + $cartItem->priceMom + $fee;
            }
        }
        return view('admin.order.adminOrdersView', ['letc'=>$letc, 'fee'=>$fee, 'cartItems' => $cartItems, 'totalPrice' => $totalPrice,]);
    }

        //Accept Orders
        public function acceptOrder(Request $request, $id)
        {
            $letc=Orders::find($id);
            $status = 'pending';

            $verify=$request->input('verify');
            $hashedPassword = Auth::user()->getAuthPassword();
      
            if (Hash::check($verify, $hashedPassword)) {
    
            Orders::where('id', $id)->update(['status' => $status]);
    
            $user = auth()->user();
            $logName = "{$user->name}";
            
            activity()->useLog($logName)
                    ->log('Have Accepted the Order of '. $letc->name );
    
          return back()->with('message', 'Order been Accepted!');
    
        }else{
            return back()->with('error', 'Password Confirmation is Wrong');
        }
    }

        //Cancel Orders
        public function cancelOrder(Request $request, $id)
        {
            $letc=Orders::find($id);
            $status = 'cancel';
    
            Orders::where('id', $id)->update(['status' => $status]);
    
            $user = auth()->user();
            $logName = "{$user->name}";
            
            activity()->useLog($logName)
                      ->log('Have Cancelled the Order of '. $letc->name);
    
            return redirect('/adminOrders')->with('message', 'Order of ' . $letc->name. ' has been Cancelled!');
        }

        //Success Orders
        public function successOrder(Request $request, $id)
        {
            $letc=Orders::find($id);
            $status = 'success';

            $verify=$request->input('verify');
            $hashedPassword = Auth::user()->getAuthPassword();
      
            if (Hash::check($verify, $hashedPassword)) {
    
            Orders::where('id', $id)->update(['status' => $status]);
    
            $user = auth()->user();
            $logName = "{$user->name}";
            
            activity()->useLog($logName)
                    ->log('Confirm Order Successfull of '. $letc->name);
    
            return redirect('/adminOrders')->with('message', 'Order of ' . $letc->name. ' has been Successfull!');
        }else{
            return back()->with('error', 'Password Confirmation is Wrong');
        }
    }
    
    public function orderStore(Request $request){
// dd($request->all());

$user_name = auth()->user()->username; 

       $request->validate([
            'name' => 'required',
            'phone_number' => ['required','numeric','digits:11'],
            'location' => 'required',
            'barangay' => 'required',
            'street' => 'required',
            'deliveryDate' => 'required',
            'deliveryTime' => 'required',
            'modeOfPayment' => 'required',
            'status' => 'required',
            'referral_code' => '',
            'payment' => 'required',
        ]);


        $user = new Orders([
            'user_id' => auth()->user()->id,
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'location' => $request->location,
            'barangay' => $request->barangay,
            'street' => $request->street,
            'deliveryDate' => $request->deliveryDate,
            'deliveryTime' => $request->deliveryTime,
            'modeOfPayment' => $request->modeOfPayment,
            'status' => $request->status,
            'referral_code' => $request->referral_code,
            'payment' => $request->payment,
        ]);
        $user->save();

        Cart::where('username', $user_name)->where('status', 'cart')->update(['status' => 'toPay']);
        // Cart::where('username', $user_name)->where('status', 'cart')->update(['orders_id' => $user->id]);

        return redirect('/order-payment')->with('message', 'You can send now your payment to finish your order. And please take a screenshot of your payment, Thank youu!');
    }

    public function orderNowStore(Request $request){
        // $free = Freebies::where('user_id', $user_id)->first(); 
        $user_name = auth()->user()->username; 
        
               $request->validate([
                    'name' => 'required',
                    'phone_number' => ['required','numeric','digits:11'],
                    'location' => 'required',
                    'barangay' => 'required',
                    'street' => 'required',
                    'deliveryDate' => 'required',
                    'deliveryTime' => 'required',
                    'modeOfPayment' => 'required',
                    'status' => 'required',
                    'referral_code' => '',
                    'payment' => 'required',
                ]);
        
        
                $user = new Orders([
                    'user_id' => auth()->user()->id,
                    'name' => $request->name,
                    'phone_number' => $request->phone_number,
                    'location' => $request->location,
                    'barangay' => $request->barangay,
                    'street' => $request->street,
                    'deliveryDate' => $request->deliveryDate,
                    'deliveryTime' => $request->deliveryTime,
                    'modeOfPayment' => $request->modeOfPayment,
                    'status' => $request->status,
                    'referral_code' => $request->referral_code,
                    'payment' => $request->payment,
                ]);
                $user->save();
        
                // $userID = $user->id;

                // dd($userID);
                $cart = Cart::create([
                    'username' => $user_name,
                    'shop' => 'Lechon',
                    'priceCake' => $request->priceCake !== null ? $request->priceCake - 500 : null,
                    'priceMom' => $request->priceMom !== null ? $request->priceMom - 499 : null,
                    'sizeCake' =>$request->sizeCake,
                    'sizeMom' =>$request->sizeMOm,
                    'freeb1' =>$request->freeb1,
                    'freeb2' =>$request->freeb2,
                    'price' =>$request->price,
                    'size' =>$request->size,
                    'status' => 'toPay',
                ]);
            
                // Cart::where('username', $user_name)->where('status', 'cart')->update(['status' => 'toPay']);
                // Cart::where('username', $user_name)->where('status', 'cart')->update(['orders_id' => $user->id]);
        
                return redirect('/order-payment')->with('message', 'You can send now your payment to finish your order. And please take a screenshot of your payment, Thank youu!');
            }

    public function addCart(Request $request, $id)
    {
        $cakePrice = 0;
        $cat = Categories::find($id);

        $cakeSize = $request->input('size');

        switch ($cakeSize) {
            case 'small':
                $cakePrice = $cat->small;
                break;
            case 'medium':
                $cakePrice = $cat->medium;
                break;
            case 'large':
                $cakePrice = $cat->large;
                break;
            case 'xlarge':
                $cakePrice = $cat->extraLarge;
                break;
        }

        $cart = Cart::create([
            'username' => $request->username,
            'shop' => $request->shop,
            'size' => $request->input('size'),
            'price' => $cakePrice,
            'categories_id' => $cat->id,
            'status' => $request->status,
        ]);
    
        return back()->with('message', $cat->type.' successfully added to your cart');
    }

    public function addCartMom(Request $request, $id)
    {
        $mombizz = 0;
        $cat = Categories::find($id);

        $cakeSize = $request->input('size');

        switch ($cakeSize) {
            case 'small':
                $mombizz =  $cat->small;
                break;
            case 'medium':
                $mombizz =  $cat->medium;
                break;
            case 'large':
                $mombizz =  $cat->large;
                break;
            case 'xlarge':
                $mombizz =  $cat->extraLarge;
                break;
        }

        $cart = Cart::create([
            'username' => $request->username,
            'shop' => $request->shop,
            'size' => $request->input('size'),
            'price' => $mombizz,
            'categories_id' => $cat->id,
            'status' => $request->status,
        ]);
    
        return back()->with('message', $cat->type.' successfully added to your cart');
    }

    public function addCartLechon(Request $request, $id)
    {
        $letc = Letchon::find($id);
        $user_id = auth()->user()->id; 
        $free = Freebies::where('user_id', $user_id)->first(); 

        // dd($request->all());
        $cart = Cart::create([
            'username' => $request->username,
            'shop' => $request->shop,
            'size' => $request->size,
            'price' => $request->price,
            'status' => $request->status,
            'letchon_id' => $request->letchon_id,
            'freeb1' => $free->freeb1,
            'freeb2' => $free->freeb2,
            'sizeCake' => $free->sizeCake,
            'sizeMom' => $free->sizeMom,
            'priceCake' => $free->priceCake !== null ? $free->priceCake - 500 : null,
            'priceMom' => $free->priceMom !== null ? $free->priceMom - 499 : null,
        ]);
    
        return back()->with('message', $request->type.' successfully added to your cart');
    }

    public function changeFreeb(Request $request)
    {
        $cake = null;
        $user_id = auth()->user()->id; 
        $priceCake = $request->input('size');

        switch ($priceCake) {
            case 'small':
                $cake = null;
                break;
            case 'medium':
                $cake = 100;
                break;
            case 'large':
                $cake = 200;
                break;
            case 'xlarge':
                $cake = 300;
                break;
        }

        Freebies::where('user_id', $user_id)->update(['freeb1' => null]);
        Freebies::where('user_id', $user_id)->update(['priceCake' => $cake]);
        Freebies::where('user_id', $user_id)->update(['sizeCake' => $priceCake]);

        return back()->with('message', 'Freebies Changed');
    }

    public function changeFreeb2(Request $request)
    {
        $mom = null;
        $user_id = auth()->user()->id; 
        $priceMom = $request->input('size');

        switch ($priceMom) {
            case 'small':
                $mom = null;
                break;
            case 'medium':
                $mom = 100;
                break;
            case 'large':
                $mom = 200;
                break;
            case 'xlarge':
                $mom = 300;
                break;
        }

        Freebies::where('user_id', $user_id)->update(['freeb2' => null]);
        Freebies::where('user_id', $user_id)->update(['priceMom' => $mom]);
        Freebies::where('user_id', $user_id)->update(['sizeMom' => $priceMom]);

        return back()->with('message', 'Freebies Changed');
    }



    public function changeFreebies(Request $request, $id)
    {
        $cake = 0;
        $user_id = auth()->user()->id; 
        $cat_id = $request->id;
        $priceCake = $request->input('size');   
        $cat = Categories::find($id);

        switch ($priceCake) {
            case 'small':
                $cake = $cat->small;
                break;
            case 'medium':
                $cake = $cat->medium;
                break;
            case 'large':
                $cake = $cat->large;
                break;
            case 'xlarge':
                $cake = $cat->extraLarge;
                break;
        }
        Freebies::where('user_id', $user_id)->update(['freeb1' => $cat_id]);
        Freebies::where('user_id', $user_id)->update(['priceCake' => $cake]);
        Freebies::where('user_id', $user_id)->update(['sizeCake' => $priceCake]);

        return back()->with('message', 'Freebies Changed');
    }

    public function changeFreebies2(Request $request, $id)
    {
        $mom = 0;
        $user_id = auth()->user()->id; 
        $cat_id = $request->id;
        $priceMom = $request->input('size');   
        $cat = Categories::find($id);
        
        switch ($priceMom) {
            case 'small':
                $mom = $cat->small;
                break;
            case 'medium':
                $mom = $cat->medium;
                break;
            case 'large':
                $mom = $cat->large;
                break;
            case 'xlarge':
                $mom = $cat->extraLarge;
                break;
        }
        Freebies::where('user_id', $user_id)->update(['freeb2' => $cat_id]);
        Freebies::where('user_id', $user_id)->update(['priceMom' => $mom]);
        Freebies::where('user_id', $user_id)->update(['sizeMom' => $priceMom]);

        return back()->with('message', 'Freebies Changed');
    }

    
    public function cartDelete(Request $request, $id)
    {
        $cat = Cart::find($id);
    
       $cat->delete();
    
        return back()->with('error', 'One item successfully deleted to your cart');;
    }

    public function cart(Request $request)
    {
        $user = auth()->user()->username;
        $cartItems = Cart::where('username', $user)
                        ->where('status', 'cart')
                        ->orWhere('status', 'toPay')->get();
        $cartCount = Cart::where('username', $user)
                    ->where('status', 'cart')
                    ->orWhere('status', 'toPay')->count();

        $totalPrice = 0;
    
        foreach ($cartItems as $cartItem) {
            // Check if the categories relationship is loaded and not null
            if ($cartItem) {
                // Assuming 'price' is the attribute in the 'categories' table
                $totalPrice += $cartItem->price + $cartItem->priceCake + $cartItem->priceMom;
            }
        }
        return view('user.ordering.cart', ['cartItems' => $cartItems, 'totalPrice' => $totalPrice, 'cartCount'=>$cartCount]);
    }
    
    


    public function settings(){
        return view('admin.settings');
    }

 
    public function custPendingOrder(){
        $orders = Orders::all();
        $orderIds = $orders->pluck('id')->toArray();
        $user = auth()->user()->username;
        
        $letc = Cart::orderBy('id', 'DESC')
            ->whereIn('orders_id', $orderIds)
            ->where('status', 'pending')
            ->where('username', $user)
            ->get()
            ->groupBy('orders_id');
    
        $user = auth()->user()->username;
        $cartCount = Cart::where('username', $user)
            ->where('status', 'cart')
            ->orWhere('status', 'toPay')
            ->count();
    
        $orderData = []; // Array to store order data
    
        foreach ($letc as $orderId => $items) {
            // Assuming 'location' is an attribute in the 'Orders' model
            $order = $orders->firstWhere('id', $orderId);
    
            // Set the fee based on the location
            switch ($order->location) {
                case 'Baao':
                    $fee = 35;
                    break;
                case 'Iriga':
                case 'Nabua':
                    $fee = 84;
                    break;
                case 'Pili':
                    $fee = 158;
                    break;
                case 'Bula':
                    $fee = 105;
                    break;
                case 'Bato':
                    $fee = 116;
                    break;
                case 'Buhi':
                    $fee = 140;
                    break;
                case 'Balatan':
                    $fee = 140;
                    break;
                case 'Naga':
                    $fee = 332;
                    break;
                // Add more cases as needed
                default:
                    $fee = 0; // Set a default fee if the location is not matched
            }
    
            $totalPrice = 0; // Reset total price for each order
    
            foreach ($items as $letchon) {
                // Assuming 'price', 'priceCake', 'priceMom' are attributes in the 'Cart' model
                $totalPrice += $letchon->price + $letchon->priceCake + $letchon->priceMom;
            }
    
            $totalPrice += $fee; // Add the fee to the total price
    
            $orderData[] = [
                'orderId' => $orderId,
                'items' => $items,
                'totalPrice' => $totalPrice,
                'location' => $order->location,
                'fee' => $fee, // Include the fee in the order data
            ];
        }
    
        return view('user.ordering.pending-order', ['cartCount'=>$cartCount, 'orderData'=>$orderData]);
    }
    
    
    



    public function settingsStore(Request $request){
        // dd($request->all());
        $request->validate([
            'img' => 'required', 
            'shop' => 'required', 
            'type' => 'required', 
            'description' => 'required', 
            'small' => 'required', 
            'medium' => 'required', 
            'large' => 'required', 
            'extraLarge' => 'required', 

        ]);
    
        $pot = null;
    
        if($request->hasFile('img')){
            $pot = $request->file('img')->store('pictures', 'public');
        }
    
        $categories = new Categories([
            'img' => $pot,
            'shop' => $request->shop,
            'type' => $request->type,
            'description' => $request->description,
            'small' => $request->small,
            'medium' => $request->medium,
            'large' => $request->large,
            'extraLarge' => $request->extraLarge,
        ]);
        $categories->save();
    
        return back();
    }
}
