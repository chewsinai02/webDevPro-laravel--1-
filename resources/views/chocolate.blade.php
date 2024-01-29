@extends('layout')
@section('content')
<style>
.card-image {
    object-fit: cover;
    width: 100%;
    height: 100%;
}

.card-deck {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
}

.card {
    flex: 0 0 auto; /* Remove fixed width */
    margin: 10px; /* Adjust the margin based on your layout needs */
}

.card-body {
    height: 100%; /* Set a flexible height for the card body */
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}
</style>

<script>
document.addEventListener("DOMContentLoaded", function() {
    // Get all cards
    var cards = document.querySelectorAll('.card');

    // Find the card with the maximum height and width
    var maxHeight = 0;
    var maxWidth = 0;

    cards.forEach(function(card) {
        maxHeight = Math.max(maxHeight, card.offsetHeight);
        maxWidth = Math.max(maxWidth, card.offsetWidth);
    });

    // Set all cards to the maximum height and width
    cards.forEach(function(card) {
        card.style.height = maxHeight + 'px';
        card.style.width = maxWidth + 'px';
    });
});
</script>

<div class="container-fluid">
    <div class="col-sm-12">
        <h1 style="font-family: Verdana, Geneva, Tahoma, sans-serif; font-size: 32px; font-weight: bold; text-align:center; color: #dc3545;">
            Chocolate
        </h1>
        <div style="text-align:center;">
            <div class="row">
                @foreach ($foods as $food)
                <div class="col-md-3"><br>
                    <div class="card-deck">
                        <form action="{{route('addCart')}}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$food->id}}">
                            <div class="card border-secondary">
                                <img src="{{asset('images')}}/{{$food->foodImage}}" class="card-image">
                                <div class="card-body">
                                    <h6 class="text-center">{{$food->foodName}}</h6>
                                    <div class="card-heading">Quantity <input type="number" name="quantity" value="1" min="1"></div>
                                    <h4 class="card-title text-danger">RM{{$food->foodPrice}}</h4>
                                    <button class="btn btn-danger btn-xs">Add to Cart</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
