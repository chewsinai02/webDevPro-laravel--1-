<!DOCTYPE html>
<html>
<head>
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <!-- Semantic UI CSS -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap">

  <!-- Require this to allow logout function -->
  @vite(['resources/sass/app.scss', 'resources/js/app.js'])

  <!-- Semantic UI JavaScript dependencies -->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://js.stripe.com/v3/"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/components/visibility.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/components/sidebar.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/components/transition.js"></script>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
     
  <link href='https://fonts.googleapis.com/css?family=Varela Round' rel='stylesheet'>
  <link href="https://cdn.jsdelivr.net/npm/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet">
  
  <style type="text/css">

    .hidden.menu {
      display: none;
    }

    .masthead.segment {
      max-height: 100px;
      padding: 1em 0em;
    }
    .masthead .logo.item img {
      margin-right: 1em;
    }
    .masthead .ui.menu .ui.button {
      margin-left: 0.5em;
    }
    .masthead h1.ui.header {
      margin-top: 3em;
      margin-bottom: 0em;
      font-size: 4em;
      font-weight: normal;
    }
    .masthead h2 {
      font-size: 1.7em;
      font-weight: normal;
    }

    .ui.vertical.stripe {
      padding: 8em 0em;
    }
    .ui.vertical.stripe h3 {
      font-size: 2em;
    }
    .ui.vertical.stripe .button + h3,
    .ui.vertical.stripe p + h3 {
      margin-top: 3em;
    }
    .ui.vertical.stripe .floated.image {
      clear: both;
    }
    .ui.vertical.stripe p {
      font-size: 1.33em;
    }
    .ui.vertical.stripe .horizontal.divider {
      margin: 3em 0em;
    }

    .ui.large.secondary.inverted.pointing.menu .right.item > li {
    list-style-type: none;
    display: inline;
    margin-right: 10px;
    margin-top: -10px; /* Adjust this value as needed */
    }

    .quote.stripe.segment {
      padding: 0em;
    }
    .quote.stripe.segment .grid .column {
      padding-top: 5em;
      padding-bottom: 5em;
    }

    .footer.segment {
      padding: 5em 0em;
    }

    .secondary.pointing.menu .toc.item {
      display: none;
    }

    @media only screen and (max-width: 700px) {
      .ui.fixed.menu {
        display: none !important;
      }
      .secondary.pointing.menu .item,
      .secondary.pointing.menu .menu {
        display: none;
      }
      .secondary.pointing.menu .toc.item {
        display: block;
      }
      .masthead.segment {
        min-height: 50px;
        padding: 1em 0em;
      }
      .masthead h1.ui.header {
        font-size: 2em;
        margin-top: 1.5em;
      }
      .masthead h2 {
        margin-top: 0.5em;
        font-size: 1.5em;
      }
      .hide{
        display: none!important;
      }
    }
  </style>

<style type="text/css">
  body {
    background-color: #FFFFFF;
  }
  .main.container {
    margin-top: 2em;
  }

  .main.menu {
    margin-top: 4em;
    border-radius: 0;
    border: none;
    box-shadow: none;
    transition:
      box-shadow 0.5s ease,
      padding 0.5s ease
    ;
  }
  .main.menu .item img.logo {
    margin-right: 1.5em;
  }

  .overlay {
    float: left;
    margin: 0em 3em 1em 0em;
  }
  .overlay .menu {
    position: relative;
    left: 0;
    transition: left 0.5s ease;
  }

  .main.menu.fixed {
    background-color: #FFFFFF;
    border: 1px solid #DDD;
    box-shadow: 0px 3px 5px rgba(0, 0, 0, 0.2);
  }
  .overlay.fixed .menu {
    left: 800px;
  }

  .text.container .left.floated.image {
    margin: 2em 2em 2em -4em;
  }
  .text.container .right.floated.image {
    margin: 2em -4em 2em 2em;
  }

  .ui.footer.segment {
    margin: 5em 0em 0em;
    padding: 5em 0em;
  }
</style>

<style type="text/css">
  .ui.large.secondary.inverted.pointing.menu .right.item > li {
    list-style-type: none;
    display: inline; /* Ensures items are displayed inline */
    margin-right: 10px; /* Adjust the margin as needed for spacing */
  }
</style>

  <!--SIDE BAR-->
  <script>
  $(document)
    .ready(function() {

      // fix menu when passed
      $('.masthead')
        .visibility({
          once: false,
          onBottomPassed: function() {
            $('.fixed.menu').transition('fade in');
          },
          onBottomPassedReverse: function() {
            $('.fixed.menu').transition('fade out');
          }
        })
      ;

      // create sidebar and attach to menu open
      $('.ui.sidebar')
        .sidebar('attach events', '.toc.item')
      ;
    })
  ;
  </script>

  <!--FLOAT-->
  <script>
  $(document)
    .ready(function() {

      // fix main menu to page on passing
      $('.main.menu').visibility({
        type: 'fixed'
      });
      $('.overlay').visibility({
        type: 'fixed',
        offset: 110
      });

      // lazy load images
      $('.image').visibility({
        type: 'image',
        transition: 'vertical flip in',
        duration: 500
      });

      // show dropdown on hover
      $('.main.menu  .ui.dropdown').dropdown({
        on: 'hover'
      });
    })
  ;
  </script>
  <title>Hong Fong</title>
</head>

<body>
@if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{Session::get('success')}}
    </div>
@endif

<!-- Sidebar Menu -->
<div class="ui vertical inverted sidebar menu">
  <a class="active item" href="/" style="font-weight:bold">Home</a>
  <a class="item" href="/aboutUs" style="font-weight:bold">About Us</a>
  <a class="item" style="font-weight:bold">Category</a>
  <a class="item" href="/shopNow" style="padding-left: 50px">All Products</a>
  <a class="item" href="/drinks" style="padding-left: 50px">Drinks</a>
  <a class="item" href="/snacks" style="padding-left: 50px">Snacks</a>
  <a class="item" href="/chocolate" style="padding-left: 50px">Chocolate</a>
  <a class="item" href="/instant-noodle" style="padding-left: 50px">Instant Noodle</a>
  <a class="item" href="/plans" style="font-weight:bold">Plans</a>
  <a class="item" href="/myCart" style="font-weight:bold">Shopping Cart</a>
  <!-- Authentication Links -->
          @guest
            @if (Route::has('login'))
              <li class="nav-item" style="margin-bottom: -5px;">
                <a class="ui inverted button hide" href="{{ route('login') }}">{{ __('Login') }}</a>
                <a class="ui inverted button hide" href="{{ route('register') }}">{{ __('Register') }}</a>
              </li>
            @endif
            @else
            <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
              </a>
              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
              </div>
            </li>
          @endguest
</div>

<!-- Header -->
<div class="pusher" style="min-height:150px;">
  <div class="ui inverted vertical masthead center aligned segment">
    <div class="ui container">
      <div class="ui large secondary inverted pointing menu">
        <a class="toc item">
          <i class="sidebar icon"></i> 
        </a>
        <a class="item" style="display:flex;margin-bottom: -15px;" href="/">
          <img src="image/logo1.png">
          <p1>HF Distributor(M) Sdn. Bhd.</p1>
        </a>
        <a class="active item" href="/" >Home</a>
        <a class="item" href="/aboutUs">About Us</a>
        <a class="item" href="/shopNow">Shop Now</a>
        <div class="ui simple dropdown item">
          <span class="text">Category</span>
          <i class="dropdown icon"></i>
          <div class="menu">
            <a class="item" href="/shopNow">All Products</a>
            <div class="divider"></div>
            <a class="item" href="/drinks">Drinks</a>
            <a class="item" href="/snacks">Snacks</a>
            <a class="item" href="/chocolate">Chocolate</a>
            <a class="item" href="/instant-noodle">Instant Noodle</a>
          </div>
        </div>
        <a class="item" href="/plans">Plans</a>
        <form class="form-inline my-2 my-lg-0 item" method="post" action="{{route('search')}}">
        @csrf
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="keyword">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        <div class="right item">
          <a class="navbar-brand" href="/myCart" style="margin-bottom: px;"><i class='bx bxs-cart'><span class="badge badge-pill badge-danger" id="cartItemCount">{{Session()->get('cartItem')}}</span></i></a>
          <ul class="navbar-nav ms-auto">
          @guest
            @if (Route::has('login'))
              <li class="nav-item" style="margin-bottom: -5px;">
                <a class="ui inverted button hide" href="{{ route('login') }}">{{ __('Login') }}</a>
                <a class="ui inverted button hide" href="{{ route('register') }}">{{ __('Register') }}</a>
              </li>
            @endif
            @else
            <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
              </a>
              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
              </div>
            </li>
          @endguest
          </ul>
        </div>
      </div>
    </div>

<!-- Following Menu -->
<div class="ui large top fixed hidden menu" style="color:white;">
  <div class="ui container ">
    <a class="active item" href="/" >Home</a>
    <a class="item" href="/aboutUs" >About Us</a>
    <div class="ui simple dropdown item">
      <span class="text">Products</span>
        <i class="dropdown icon"></i>
          <div class="menu">
            <a class="item" href="/shopNow">All Products</a>
            <div class="divider"></div>
            <a class="item" href="/drinks">Drinks</a>
            <a class="item" href="/snacks">Snacks</a>
            <a class="item" href="/chocolate">Chocolate</a>
            <a class="item" href="/instant-noodle">Instant Noodle</a>
          </div>
    </div>
    <a class="item" href="/plans">Plans</a>
    <div class="right menu" style="margin: 3px;">
    <a class="navbar-brand" href="/myCart"><i class='bx bxs-cart' style="color:black;"><span class="badge badge-pill badge-danger" id="cartItemCount">{{Session()->get('cartItem')}}</span></i></a>
      <!-- Authentication Links -->
      <ul class="navbar-nav ms-auto">
          @guest
            @if (Route::has('login'))
              <li class="nav-item" style="margin-bottom: -5px;">
                <a class="ui inverted button hide" href="{{ route('login') }}">{{ __('Login') }}</a>
                <a class="ui inverted button hide" href="{{ route('register') }}">{{ __('Register') }}</a>
              </li>
            @endif
            @else
            <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
              </a>
              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
              </div>
            </li>
          @endguest
          </ul>
    </div>
  </div>
</div>
</div>

<div class="overlay">
  <div class="ui labeled icon vertical menu" style="position: absolute; top: 50%; left: 50%; background-color: rgba(0, 0, 0, 0.3);">
    <a class="item" href="https://wa.me/60197556613"><i class="whatsapp icon"></i>Whatsapp</a>
    <a class="item" href="https://www.facebook.com/hongfongjb" ><i class="facebook icon"></i>Facebook</a>
    <a class="item" href="mailto:info@hongfong.com.my" ><i class="mail icon"></i> E-mail</a>
  </div>  
</div>

<!--Content Display Here-->
<div class="container-fluid">  
      @yield('content')
</div>

<!--Footer-->
  <div class="ui inverted vertical footer segment">
    <div class="ui container">
      <div class="ui stackable inverted divided equal height stackable grid center aligned">
        <div class="four wide column" style="text-align: left;">
          <h4 class="ui inverted header">HONG FONG GROUP TRADING</h4>
          <p class="card-text">HONG FONG GROUP TRADING - Based in Johor, Malaysia, the company supplies beverage, breakfast cereal, candy, chocolate, cookie, instant noodle, popcorn, seaweed, tea, vinegar, etc.</p>
        </div>
        <div class="four wide column" style="text-align: left;">
          <h4 class="ui inverted header">Location</h4>
          <div class="ui inverted link list">
            <a href="https://goo.gl/maps/FU5KYr4CThApwXEf9" class="item">34a, Jalan Impian Emas 7, Taman Impian Emas, 81300 Skudai, Johor, Malaysia.</a>
          </div>
        </div>
        <div class="four wide column" style="text-align: left;">
          <h4 class="ui inverted header">Contact Us</h4>
          <div class="ui inverted link list">
            <span>          
              <text>CS</text>
              <a href="https://wa.me/60197556613" class="item"><i class='bx bxl-whatsapp'></i>+6019-7556613</a>
            </span>
            <br>
            <span>          
              <text>Wendy</text>
              <a href="https://wa.me/60127676442" class="item"><i class='bx bxl-whatsapp'></i>+6012-7676442</a>
              <br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
              <a href="https://wa.me/601139394343" class="item"><i class='bx bxl-whatsapp'></i>+6011-3939 4343</a>
            </span>
            <a href="mailto:info@hongfong.com.my" class="item"><i class='bx bxs-envelope' ></i> info@hongfong.com.my</a>
            <a href="#" class="item">__________________________________</a>
            <a href="https://www.facebook.com/hongfongjb" target="_blank" class="item">
                      &nbsp;<i class='bx bxl-facebook-circle'></i>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
        <div align="center" style="font-family: 'Varela Round';">
          <br>
          <p>
            <i class='bx bx-copyright'>2020-2023</i> <span style="font-size: 20px;">HONG FONG GROUP TRADING</span> JM0673090-K<br>
            <span style="font-weight: bold;">Powered</span> by Chew & Lim
          </p>
          <br>        
        </div>
      </div>
  </div>
</div>
  </div>
</body>

</html>