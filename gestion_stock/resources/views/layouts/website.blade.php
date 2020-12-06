<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>AS QUICK</title>

    <!-- Favicon -->
    <link rel="icon" href="{{asset('website')}}/img/core-img/favicon.ico">

    <!-- Core Stylesheet -->
    <link href="{{asset('website')}}/style.css" rel="stylesheet">

    <!-- Responsive CSS -->
    <link href="{{asset('website')}}/css/responsive/responsive.css" rel="stylesheet">

</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="caviar-load"></div>
        <div class="preload-icons">
            <img class="preload-1" src="{{asset('website')}}/img/core-img/preload-1.png" alt="">
            <img class="preload-2" src="{{asset('website')}}/img/core-img/preload-2.png" alt="">
            <img class="preload-3" src="{{asset('website')}}/img/core-img/preload-3.png" alt="">
        </div>
    </div>

    <!-- ***** Search Form Area ***** -->
    <div class="caviar-search-form d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-close-btn" id="closeBtn">
                        <i class="pe-7s-close-circle" aria-hidden="true"></i>
                    </div>
                    <form action="#" method="get">
                        <input type="search" name="caviarSearch" id="search" placeholder="Search Your Favourite Dish ...">
                        <input type="submit" class="d-none" value="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- ***** Header Area Start ***** -->
    <header class="header_area" id="header">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-12 h-100">
                    <nav class="h-100 navbar navbar-expand-lg align-items-center">
                        <a class="navbar-brand" href="#">
                            <img  src="{{asset('website')}}/img/bg-img/logo.png" class="rounded float-left" alt="M-Yassine Logo" >
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#caviarNav" aria-controls="caviarNav" aria-expanded="false" aria-label="Toggle navigation"><span class="fa fa-bars"></span></button>
                        <div class="collapse navbar-collapse" id="caviarNav">
                            <ul class="navbar-nav ml-auto" id="caviarMenu">
                                <li class="nav-item active">
                                    <a class="nav-link"  href="#home">Home <span class="sr-only">(current)</span></a>
                                </li>
                            
                                <li class="nav-item">
                                    <a class="nav-link" href="#about">Qui Sommes-Nous</a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a class="nav-link" href="#testimonial">Services</a>
                                </li> --}}
                                {{-- <li class="nav-item">
                                    <a class="nav-link" href="#awards">Nos Tarifs</a>
                                </li> --}}
                              
                                <li class="nav-item">
                                    <a class="nav-link" href="#contact">Contact</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Mon Compte</a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('login') }}" >Connexion</a>
                                        <a class="dropdown-item" href="{{ route('register') }}">Inscription</a>
                                  
                                    </div>
                                </li>
                            </ul>
                            <!-- Search Btn -->
                            <div class="caviar-search-btn">
                                <a id="search-btn" href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->


    @yield('content')



    <!-- Jquery-2.2.4 js -->
    <script src="{{asset('website')}}/js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="{{asset('website')}}/js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap-4 js -->
    <script src="{{asset('website')}}/js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="{{asset('website')}}/js/others/plugins.js"></script>
    <!-- Active JS -->
    <script src="{{asset('website')}}/js/active.js"></script>
</body>