<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;
use Laravel\Cashier\Subscription;

class PlanController extends Controller
{
    public function plans(){
        $plans = Plan::all();
        $subscriptions = Subscription::where('user_id',auth()->id())->get();
        return view('plans',['plans'=> $plans], ['subscriptions'=> $subscriptions]);
    }
}