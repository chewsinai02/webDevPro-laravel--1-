<link rel="stylesheet" href="{{asset('css/subscribed.css')}}">
@extends('layout')
@section('content')
<h1 style="font-family: Verdana, Geneva, Tahoma, sans-serif; font-size: 32px; font-weight: bold; text-align:center; color: #dc3545;">
        Your Subscription
    </h1><br><br>
<div class="row">
<div class="col-md-1"></div>
    <div class="col-md-2">
        <div class="link">
            <ul>
                <li><a href="/plans" id="link">Plans</a></li>
            </ul>
        </div>
        <div class="link">
            <ul>
                <li><a href="/subscribed" id="link">Subscribed</a></li>
            </ul>
        </div>
    </div>
        <div class="col-md-6">
            @if(count($subscriptions)>0)
            <h4>Thanks for your subscribe!!!</h4><br>
            <table class="table table-bordered">
                <thead class="head">
                    <tr>
                        <th>Plan Name</th>
                        <th>Price</th>
                        <th>Trials Start At</th>
                        <th>PDF Invoice</th>
                    </tr>
                </thead>
                <tbody class="body">
                    @foreach($subscriptions as $subscription)
                    <tr>
                        <td>{{$subscription->plan->title}} Plan</td>
                        <td>RM{{$subscription->plan->price}}</td>
                        <td>{{$subscription->plan->created_at}}</td>
                        <td><a href="{{route('pdf')}}" target="_blank" class="pdf">Download Invoice</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <h4>You are not subscribed to any plan</h4>
            @endif
        </div>
    </div>
</div>
@endsection