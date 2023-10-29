<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Orders;
use App\Models\Message;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
 
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        $messagess = Message::orderBy('id','DESC')
                         ->where('messageFrom', 'customer')->get();
        $messa = Message::all();
        $count_mess = Message::where('num','0')->count();
        $newCustomer = Orders::where('status', 'new')->count();

        View::share( 'messagess', $messagess);
        View::share( 'messa', $messa);
        View::share( 'count_mess', $count_mess);
        View::share( 'newCustomer', $newCustomer);
    }

    
}
