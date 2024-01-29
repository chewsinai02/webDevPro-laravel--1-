<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Cashier\Subscription;
use Barryvdh\DomPDF\Facade\Pdf;

class SubscriptionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function subscriptions(Request $request){
        return view('subscription',['intent'=>$request->user()->createSetupIntent()]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'token' => 'required'
        ]);

        $plan = Plan::where('slug', $request->plan)
            ->orWhere('slug', 'monthly')
            ->first();

        $request->user()->newSubscription('default', $plan->stripe_id)
            ->create($request->token);

        return redirect()->route('subscribed')->with('message', 'Thanks for your subscribe.');
    }

    public function showSubscribed(){
        $subscriptions = Subscription::where('user_id',auth()->id())->get();
        return view('subscribed',compact('subscriptions'));
    }

    public function pdf(){
        set_time_limit(300);

        $data = [
            'subscriptions' => Subscription::where('user_id', auth()->id())->get(),
            'users' => User::where('id', auth()->id())->get(),
        ];
        $pdf=PDF::loadView('pdf',$data);
        return $pdf->download('subscription-invoice.pdf');
    }
}
