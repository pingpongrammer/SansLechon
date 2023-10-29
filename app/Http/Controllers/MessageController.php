<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function customerMessageStore(Request $request){
        $formFields = $request->validate([
            'name' => 'required',
            'phone_number' => ['required','numeric','digits:11'],
            'message' => 'required',
            'num' => 'required',
            'messageFrom'=>'required',
        ]);

        Message::create($formFields);
        return back()->with('message', 'Your message has been sent!');
    }

    public function customerMessageReplyStore(Request $request){
        $formFields = $request->validate([
            'name' => 'required',
            'phone_number' => ['required','numeric','digits:11'],
            'message' => 'required',
            'num' => 'required',
            'messageFrom'=>'required',
        ]);

        Message::create($formFields);
        return redirect('/message')->with('message', 'Your message has been sent!');
    }



    public function messageGet(){
        $message = Message::orderBy('id','DESC')
                            ->where('messageFrom', 'customer')->get();

        $count_mess = Message::where('num','0')
                                ->where('messageFrom', 'customer')
                                ->count();

        return view('admin.messages.messages',['message'=>$message, 'count_mess'=>$count_mess]);
    }



    public function sentMessageAdmin(){
        $message = Message::orderBy('id','DESC')
                            ->where('messageFrom', 'customer')->get();


        $count_mess = Message::where('num','0')
                                ->where('messageFrom','customer')
                                ->count();

        return view('admin.messages.sent',['message'=>$message, 'count_mess'=>$count_mess]);
    }

    public function messageUnread(){
        $message = Message::where('num','0')->orderBy('id','DESC')->where('messageFrom', 'customer')->get();
        return view('admin.messages.messages',['message'=>$message]);
    }

    public function messageRead(){
        $message = Message::where('num','1')->orderBy('id','DESC')->where('messageFrom', 'customer')->get();
        return view('admin.messages.messages',['message'=>$message]);
    }

    public function messageViewID($id){
        $mess = Message::find($id);
        $num = 1;
        Message::where('id', $id)->update(['num' => $num]);

        // dd($request->all());
        return view('admin.messages.messageView', ['mess'=>$mess]);
    }

    public function messageSentViewID($id){
        $messa = Message::find($id);
        $num = 1;
        Message::where('id', $id)->update(['num' => $num]);

        // dd($request->all());
        return view('user.message.messageSentView', ['messa'=>$messa]);
    }

    public function sanlechonmessageID($id){
        $messa = Message::find($id);
        $num = 1;
        Message::where('id', $id)->update(['num' => $num]);

        // dd($request->all());
        return view('user.message.sanlechonmessageView', ['messa'=>$messa]);
    }

    public function customerMessage(){
        $userPhoneNumber = auth()->user()->phone_number;
        $user = auth()->user()->username; 
    
        // Retrieve messages with the same phone number as the authenticated user
        $message = Message::where('phone_number', $userPhoneNumber)
                           ->where('messageFrom', 'admin')
                           ->orderBy('id', 'DESC')
                           ->get();
    
        $count_mess = Message::where('phone_number', $userPhoneNumber)
                             ->where('num', '0')
                             ->where('messageFrom', 'admin')
                             ->count();
        $cartCount = Cart::where('username', $user)
        ->where('status', 'cart')
        ->orWhere('status', 'toPay')->count();
        return view('user.message.customerMessage', [
            'message' => $message,
            'count_mess' => $count_mess,
            'cartCount' => $cartCount,
        ]);
    }

    public function customerSentMessage(){
        $userPhoneNumber = auth()->user()->phone_number;
    
        // Retrieve messages with the same phone number as the authenticated user
        $message = Message::where('phone_number', $userPhoneNumber)
                           ->where('messageFrom', 'customer')
                           ->orderBy('id', 'DESC')
                           ->get();
    
        $count_mess = Message::where('phone_number', $userPhoneNumber)
                             ->where('num', '0')
                             ->where('messageFrom', 'admin')
                             ->count();
    
        return view('user.message.messageSent', [
            'message' => $message,
            'count_mess' => $count_mess,
        ]);
    }

}
