<link rel="stylesheet" href="{{asset('css/subscription.css')}}">
@extends('layout')
@section('content')
<h1 style="font-family: Verdana, Geneva, Tahoma, sans-serif; font-size: 32px; font-weight: bold; text-align:center; color: #dc3545;">
        Check Out
    </h1><br><br>
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <div class="subscribe-container">
                <form action="{{route('subscriptions')}}" method="post" id="card-form">
                    @csrf
                    <div class="mt-4">
                        <label for="card-holder-name">Name Of Card</label><br>
                        <input id="card-holder-name" class="block mt-1 w-full" type="text" name="name" :value="old('name')">                        
                    </div>
                    <div class="mt-4">
                        <label for="card">Card Details</label>
                        <div id="card-element"></div>                       
                    </div>
                    <div class="mt-4" align="right">
                        <button id="card-button" class="card-button" data-secrect="{{$intent->client_secret}}">Pay</button>                       
                    </div>
                </form>
            </div>                
        </div>

        <script>
            const strip = Stripe('pk_test_51OJpX5KVP0IkqNbgjga8ZGIzWzKthIfEpMehLHTwYPIse2aAHqWJjzG8jP2AmTVKJgKvZq1ExuirI2OdZ01RylaP00fftWpvpm')
            const elements = strip.elements();
            const cardElement = elements.create('card');

            cardElement.mount('#card-element');

            const form = document.getElementById('card-form')
            const cardButton = document.getElementById('card-button')
            const cardHolderName = document.getElementById('card-holder-name')

            form.addEventListener('submit', async(e)=>{
                e.preventDefault()
                cardButton.disabled = true

                const {setupIntent, error} = await strip.confirmCardSetup(
                    cardButton.dataset.secrect, {
                        payment_method: {
                            card: cardElement,
                            billing_details: {
                                name: cardHolderName.value
                            }
                        }
                    }
                )

                if(error){
                    cardButton.disabled = false
                } else{
                    let token = document.createElement('input');

                    token.setAttribute('type', 'hidden');
                    token.setAttribute('name', 'token');
                    token.setAttribute('value', setupIntent.payment_method);

                    form.appendChild(token)

                    form.submit();
                }
            });
        </script>
    </div>
@endsection