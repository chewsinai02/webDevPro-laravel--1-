<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\myCart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function add(){
        $r=request();
        $add=myCart::create([
            'quantity'=>$r->quantity,
            'orderID'=>'',
            'foodID'=>$r->id,
            'dateAdd'=>'',
            'userID'=>Auth::id(),
        ]);
        return redirect()->route('myCart');
    }

    public function view(){
        $cart=DB::table('my_carts')->leftjoin('food','food.id','=','my_carts.foodId')->select('my_carts.quantity as cartQty','my_carts.id as cid', 'food.*')->where('my_carts.orderID','=','')
        ->where('my_carts.userID','=',Auth::id())->get();
        (new CartController)->cartItem();
        return view('myCart')->with('cart',$cart);
    }

    public function cartItem(){
        $cartItem=0;
        $noItem=DB::table('my_carts')->leftjoin('food','food.id','=','my_carts.foodId')->select(DB::raw('COUNT(*) as count_item'))->where('my_carts.orderID','=','')
        ->where('my_carts.userID','=',Auth::id())->groupBy('my_carts.userID')->first();
        if($noItem){
            $cartItem=$noItem->count_item;
        }
        Session()->put('cartItem',$cartItem);
    }
}
