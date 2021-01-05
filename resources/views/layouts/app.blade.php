<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CANDE</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm mb-0">
            <div class="container">
                <a class="navbar-brand mr-0" href="{{ url('/') }}">
                    <img src="<?php echo asset('assets/logo-1.PNG')?>" width="150" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @guest
                    @else
                    <ul class="navbar-nav ml-0 mr-auto">
                        <div class="offset-md-4 pt-3" style="width: 700px;">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Search for items, people and brands..." style="font-style: italic;">
                                <div class="input-group-append">
                                    <span type="button" class="input-group-text" href="#"><i class="fa fa-search"></i></span>
                                </div>
                            </div>
                        </div>
                    </ul>
                    @endguest

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <?php
                                $pesanan = \App\transaction::where('user_id', Auth::user()->id)->where
                                ('status', 0)->first();
                                $count = \App\transaction::where('user_id', Auth::user()->id)->count();
                                
                                if($count > 0) {
                                    $notif = \App\transaction_details::where('transaction_id', $pesanan->id)->count();
                                }
                                else $notif = " ";
                            ?>

                            <li class="nav-item mt-auto mb-auto ml-2">
                                <button type="submit" class="btn" style="border: none; background-color: white;" onclick="location.href='{{ url('cart') }}'">
                                <i class="fa fa-shopping-cart"></i><span class="badge badge-pill badge-danger">{{ $notif }}</span></button>                               
                            </li>
                            <li class="nav-item mt-auto mb-auto ml-2">
                                <a href="{{ url('/product/create') }}" role="button" style="text-decoration: none; color: #817e7e;"> Sell </a>                                
                            </li>
                            <li class="nav-item dropdown ml-2">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('/user/profile') }}">My Profile</a>
                                    <a class="dropdown-item" href="{{ url('/user/edit') }}">Edit Profile</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')
        <!-- /.container -->

        <!-- Footer -->
        <footer class="py-2 mt-2 bg-dark text-center">
            <p class=" text-center text-white"> Follow Us :</p>
            <div class="template-demo" style="align-center"> 
                <button type="button" style="color:  #ffffff " class="bg-secondary btn btn-social-icon btn-facebook btn-ro mr-2 "><i class="fa fa-facebook"></i></button> 
                <button type="button" style="color: #ffffff " class="bg-secondary btn btn-social-icon btn-youtube btn-ro mr-2"><i class="fa fa-youtube"></i></button> 
                <button type="button" style="color: #ffffff " class="bg-secondary btn btn-social-icon btn-twitter btn-ro mr-2"><i class="fa fa-twitter"></i></button> 
                <button type="button" style="color: #ffffff " class="bg-secondary btn btn-social-icon btn-instagram btn-ro mr-2"><i class="fa fa-instagram"></i></button> 
            </div>
            <br>
            <p class=" text-center text-white">Copyright &copy; cande 2020</p>
        </footer>
    </div>
</body>
</html>
