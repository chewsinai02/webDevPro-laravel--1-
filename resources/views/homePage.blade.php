@extends('layout')
@section('content')
<link rel="stylesheet" href="{{asset('css/home.css')}}">
<div class="container-fluid">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="image/1.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="image/2.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="image/3.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <a class="nav-link" href="https://shopee.com.my/hongfongfoodstore">
                <img src="image/4.png" class="d-block w-100" alt="...">
              </a>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </button>
        </div>
    </div>
    <br>
    <div class="container-fluid position-relative">
      <div class="row">
        <div class="col-md-12">
          <img src="image/5.png" class="d-block w-100">
        </div>
      </div>
    </div>
@endsection