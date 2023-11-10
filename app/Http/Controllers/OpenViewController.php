<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Letchon;
use App\Models\PageView;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class OpenViewController extends Controller
{
    public function openHome(){

        $letc = Letchon::all();
        $cat = Categories::where('shop', 'sweet bites')->get();
        $mombi = Categories::where('shop', 'mombizz')->get();
        return view('User-Open-View.o-home', ['letc'=>$letc,'cat'=>$cat, 'mombi' => $mombi]);
    }

    public function openContact() {
        return view('User-Open-View.o-contact');
    }

    
    public function openAbout() {
        return view('User-Open-View.o-about');
    }


    public function refHome(Request $request){
        $letc = Letchon::all();
        $cat = Categories::where('shop', 'sweet bites')->get();
        $mombi = Categories::where('shop', 'mombizz')->get();

        if(isset($request->ref)){

            $referral = $request->ref;
            $userData = User::where('referral_code', $referral)->get();
            $domain = URL::to('/');
            $urlContact = $domain.'/ref-contact?ref='.$referral;
            $urlHome = $domain.'/ref-home?ref='.$referral;
            $urlAbout = $domain.'/ref-about?ref='.$referral;
            $urlLogin = $domain.'/referralLogin?ref='.$referral;

            if(count($userData) > 0 ){
                $count = PageView::where('referral_code', $referral)->first();
                $countViews = $count->views + 1;
                
                PageView::where('referral_code', $referral)->update([
                    'views' => $countViews,
                ]);
                
                return view('referral.ref-home', compact('referral', 'urlContact', 'urlAbout', 'urlHome', 'letc', 'cat', 'mombi', 'urlLogin' ));

            }else{
                return view('referral.404');
            }

    } 
        else{
            return redirect('/');
        }
    }

    public function refContact(Request $request){

        if(isset($request->ref)){

            $referral = $request->ref;
            $userData = User::where('referral_code', $referral)->get();
            $domain = URL::to('/');
            $urlContact = $domain.'/ref-contact?ref='.$referral;
            $urlHome = $domain.'/ref-home?ref='.$referral;
            $urlAbout = $domain.'/ref-about?ref='.$referral;
            $urlLogin = $domain.'/referralLogin?ref='.$referral;

            if(count($userData) > 0 ){
                return view('referral.ref-contact', compact('referral', 'urlContact', 'urlAbout', 'urlHome', 'urlLogin'));
            }else{
                return view('referral.404');
            }
    } 
        else{
            return redirect('/');
        }
    }

    public function refAbout(Request $request){

        if(isset($request->ref)){

            $referral = $request->ref;
            $userData = User::where('referral_code', $referral)->get();
            $domain = URL::to('/');
            $urlContact = $domain.'/ref-contact?ref='.$referral;
            $urlHome = $domain.'/ref-home?ref='.$referral;
            $urlAbout = $domain.'/ref-about?ref='.$referral;
            $urlLogin = $domain.'/referralLogin?ref='.$referral;

            if(count($userData) > 0 ){
                return view('referral.ref-contact', compact('referral', 'urlContact', 'urlAbout', 'urlHome', 'urlLogin'));
            }else{
                return view('referral.404');
            }
    } 
        else{
            return redirect('/');
        }
    }
}
