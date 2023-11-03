<?php

use App\Models\Cart;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\FreebiesController;
use App\Http\Controllers\AffiliateController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ActivityLogController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


    //Login
    Route::get('/', [UserController::class, 'login'])->name('login');

    Route::post('/verify-otp', [UserController::class, 'verifyOtp']);

    Route::post('/login/auth', [UserController::class, 'loginAuth']);

    //Logout
    Route::post('/logout', [UserController::class, 'logout']);

    //Register
    Route::get('/register', [UserController::class, 'registerView']);

    //Register Storing Database
    Route::post('/registerStore', [AccountController::class, 'registerStore']);

    //Registration Store Account Added in the database
    Route::post('/storeAccounts', [AccountController::class, 'accountStore']);

    Route::get('/otpVerification', [UserController::class, 'otpVerification']);

    //Referral Register Store
    Route::post('/refferalRegistrationStore', [AccountController::class, 'refferalRegistrationStore']);

    //Referral Login
    Route::get('/referralLogin', [AccountController::class, 'referralLogin']);

    Route::get('/404', function () {
        return view('referral.404');
    });
    
    Route::get('/affiliatee', function () {
        return view('user.affiliate-partners.affiliate');
    });
    
    Route::get('/affiliateRegister', function () {
        return view('user.affiliate-partners.affiliateRegister');
    });

    
    //Referral Register
    Route::get('/refferalRegistration', [AccountController::class, 'refferalRegistration']);

    //Storing data from Affiliate Partners
    Route::post('/affiliateStore', [AccountController::class, 'affiliateStore']);


// ----------------------oooooo--Admin Side Authorization--oooooooo-------------------------

    Route::group(['middleware' => ['auth', 'role:admin']], function(){


            Route::get('/customer-requestPayment', [AffiliateController::class, 'customerReqPayment']);

            Route::get('/requestPaymentView/{id}', [AffiliateController::class, 'requestPaymentView']);

            //Dashboard
            Route::get('/dashboard', [DashboardController::class, 'dashboard']);

            Route::get('/adminOrders', [OrderController::class, 'adminOrders']);

            Route::get('/adminOrdersView/{id}', [OrderController::class, 'adminOrdersView']);

            Route::post('/acceptOrder/{id}', [OrderController::class, 'acceptOrder']);

            Route::post('/cancelOrder/{id}', [OrderController::class, 'cancelOrder']);

            Route::post('/successOrder/{id}', [OrderController::class, 'successOrder']);

            Route::get('/cancelOrder', [OrderController::class, 'cancelOrderView']);

            Route::get('/sucessOrder', [OrderController::class, 'successOrderView']);

            Route::get('/newOrder', [OrderController::class, 'newOrderView']);

            Route::get('/pendingOrder', [OrderController::class, 'pendingOrderView']);

            //Activity Log
            Route::get('/activityLog', [ActivityLogController::class, 'activityLog']);


            //Storing data from Message from the customer to database
            Route::post('/customerMessageReply', [MessageController::class, 'customerMessageReplyStore']);

            //Get the message to database and it is all the messages
            Route::get('/message', [MessageController::class, 'messageGet']);

            //Get the message to database and it is the read messages
            Route::get('/messageUnread', [MessageController::class, 'messageUnread'])->middleware('auth');

            //Get the message to database and it is the read messages
            Route::get('/messageRead', [MessageController::class, 'messageRead'])->middleware('auth');

            Route::get('/sentMessage', [MessageController::class, 'sentMessageAdmin']);

            //View message individually
            Route::put('/messageView/{id}', [MessageController::class, 'messageViewID'])->middleware('auth');

            //Add Accounts Blade
            Route::get('/addAccounts', [AccountController::class, 'accountAdd'])->middleware('auth');

            //Manage Marketer Accounts
            Route::get('/marketerAccount', [AccountController::class, 'marketerAccount']);

            Route::get('/affiliatePartnerView/{id}', [AccountController::class, 'affiliatePartnerView']);
            
            Route::get('/customer-registered', [AccountController::class, 'customerRegistered']);

            Route::get('/add-freebies', [FreebiesController::class, 'addfreebies']);
            
            Route::post('/storeFreebies', [FreebiesController::class, 'storeFreebies']);

            Route::get('/freebies', [FreebiesController::class, 'freebies']);

            Route::get('/freebiesView/{id}', [FreebiesController::class, 'freebiesView']);

            Route::post('/freebiesDelete/{id}', [FreebiesController::class, 'freebiesDelete']);

            Route::post('/freebiesUpdate/{id}', [FreebiesController::class, 'freebiesUpdate']);
            
    });


// ----------------------oooooo--Customer Side Authorization--oooooooo-------------------------

    Route::group(['middleware' => ['auth', 'customerRole:customer']], function(){

            Route::get('/contact', function () {
                $user = auth()->user();
                $cartCount = Cart::where('username', $user->username)
                                ->where('status', 'cart')
                                ->orWhere('status', 'toPay')->count();
                return view('user.contact', compact('cartCount'));
            });

            
            Route::get('/about', function () {
                $user = auth()->user();
                $cartCount = Cart::where('username', $user->username)
                                ->where('status', 'cart')
                                ->orWhere('status', 'toPay')->count();
                return view('user.about', compact('cartCount'));
            });
            
            Route::get('/view-orders', function () {
                return view('admin.view-orders');
            });

            Route::get('/order-policy', function () {
                return view('user.ordering.order-policy');
            });

                
            //click the order now and view the ordering page
            Route::get('/home', [OrderController::class, 'orderView']);

            //Storing data of Order from the customer to database
            Route::post('/orderStore', [OrderController::class, 'orderStore']);

            //Storing data of Order from the customer to database
            Route::post('/orderNowStore', [OrderController::class, 'orderNowStore']);

            Route::get('/order-payment', [OrderController::class, 'orderPayment']);

            Route::get('/order-form', [OrderController::class, 'orderForm']);

            Route::post('/order-paymentStore', [OrderController::class, 'orderPaymentStore']);

            //Storing data from Message from the customer to database
            Route::post('/customerMessage', [MessageController::class, 'customerMessageStore']);

            Route::get('/customerMessage', [MessageController::class, 'customerMessage']);

            //Customer Message
            Route::get('/customerMessage', [MessageController::class, 'customerMessage']);

            Route::get('/sent-message', [MessageController::class, 'customerSentMessage']);

            //View message individually
            Route::put('/sentmessage-view/{id}', [MessageController::class, 'messageSentViewID']);

            //View message individually
            Route::put('/sanlechonmessage-view/{id}', [MessageController::class, 'sanlechonmessageID']);

            //View ordering individually of what kls they pick
            Route::get('/orderViewKls/{id}', [OrderController::class, 'orderViewKls']);

            Route::get('/cakeView/{id}', [OrderController::class, 'cakeView']);

            Route::post('/addCart/{id}', [OrderController::class, 'addCart']);
            
            Route::post('/addCartLechon/{id}', [OrderController::class, 'addCartLechon']);

            Route::post('/changeFreebies/{id}', [OrderController::class, 'changeFreebies']);

            Route::post('/changeFreeb', [OrderController::class, 'changeFreeb']);

            Route::post('/changeFreeb2', [OrderController::class, 'changeFreeb2']);

            Route::post('/changeFreebies2/{id}', [OrderController::class, 'changeFreebies2']);

            Route::get('/cart', [OrderController::class, 'cart']);

            Route::get('/custPendingOrder', [OrderController::class, 'custPendingOrder']);

            Route::post('/cartDelete/{id}', [OrderController::class, 'cartDelete']);
   
    });

    // ----------------------oooooo--Affiliate Partner Side Authorization--oooooooo-------------------------

    Route::group(['middleware' => ['auth', 'affiliateRole:influencer']], function(){

            Route::get('/help-center', function () {
                return view('marketer.helpCenter');
            });    

            Route::get('/marketer-dashboard', [AffiliateController::class, 'marketerDashboard']);

            Route::get('/my-wallet', [AffiliateController::class, 'mywallet']);

            Route::get('/edit-profile', [AffiliateController::class, 'editProfile']);

            Route::put('/update-profile', [AffiliateController::class, 'updateProfile'])->name('profile.update');

            Route::get('/marketerProfile', [AffiliateController::class, 'marketerProfile']);

            Route::get('/requestPayout', [AffiliateController::class, 'requestPayout']);

            Route::post('/requestPayoutStore', [AffiliateController::class, 'requestPayoutStore']);

    });




    Route::get('/dash', function () {
        return view('layout.admin-dashboard');
    });    

    Route::get('/dashee', function () {
        return view('dashee');
    });    



