<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe;
use App\Models\myOrder;
use App\Models\myCart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function paymentPost(Request $request)
    {
	       
    Stripe\Stripe::setApiKey(config('services.stripe.secret'));
        Stripe\Charge::create ([
                "amount" => $request->sub*100,   // RM10  10=10 cen 10*100=1000 cen
                "currency" => "MYR",
                "source" => $request->stripeToken,
                "description" => "This payment is testing purpose of southern online",
        ]);

        $newOrder=myOrder::Create([
            'paymentStatus'=>'Done',
            'userID'=>Auth::id(),
            'amount'=>$request->sub,
        ]);
        //get latest orderID just now create
        $orderID=DB::table('my_orders')->where('userID','=',Auth::id())->orderBy('created_at','desc')->first();
        $items=$request->input('cid');
        foreach($items as $item=>$value){
            $cart=myCart::find($value);
            $cart->orderID=$orderID->id;
            $cart->save();    
        }
        (new CartController)->cartItem();
        return back();
    }
}
