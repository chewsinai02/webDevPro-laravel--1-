<link rel="stylesheet" href="{{asset('css/plans.css')}}">
@extends('layout')
@section('content')
<h1 style="font-family: Verdana, Geneva, Tahoma, sans-serif; font-size: 32px; font-weight: bold; text-align:center; color: #dc3545;">
        Subscription Plans
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
    <div class="col-md-1"></div>
    <div class="col-md-4">
        @foreach($plans as $plan)
        <div class="container-plans">
            <div class="plans">
                <div class="mr-5 mb-5">
                    <h2 class="plan-title">{{$plan->title}} Plan</h2>
                    <h6 class="plan-subtitle">Awesome Plan</h3>
                    <p class="price-category">
                        <span class="price">RM{{$plan->price}}</span>
                        <span class="abbreviation">{{$plan->abbreviation}}</span>
                    </p>
                    <hr>
                    <h4>What's Include</h4>
                    <li>{{$plan->description}}</li>
                    @if(count($subscriptions)>0)
                    <h4 class="purchased"><strong>You have purchase this plan!</strong></h4>
                    @else
                    <a href="{{ route('subscriptions', ['plan' => $plan->slug]) }}" class="btn btn-dark btn-sm" id="buy">Buy {{ $plan->title }} Plan</a>
                    @endif
                </div>
        </div>
        </div>
        @endforeach
    </div>
</div>
@endsection