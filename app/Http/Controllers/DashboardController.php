<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Orders;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $year = date('Y');
        $month = date('n');
    
        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        $dayList = range(1, $daysInMonth);
    
        $successCounts = [];
        for ($day = 1; $day <= $daysInMonth; $day++) {
            $successCounts[$day] = Orders::where('status', 'success')
                ->whereDay('created_at', $day)
                ->count();
        }

        $orders = Orders::where('status', 'success')->get();
        
 
        $sales = $orders->sum(function ($order) {
            return $order->qty * $order->price;  // Calculate the total price for each order and sum them up
        });

        // $sales = $qty * $prices; 

        $newCus = Orders::where('status', 'new')->count();
        $succ = Orders::where('status', 'success')->count();
        $webviews = User::where('adminType', 'customer')->count();

        return view('admin.dashboard', compact('newCus', 'successCounts', 'dayList', 'daysInMonth', 'year', 'succ', 'month', 'sales', 'webviews'));
    }
    
   
}
