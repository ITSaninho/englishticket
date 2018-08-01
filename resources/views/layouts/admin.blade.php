<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>{{ config('app.name', 'English Ticket') }}</title>

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <!-- Main CSS Files -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

        <!-- core CSS -->
        <link href="/public/themes/multi/css/bootstrap.min.css" rel="stylesheet">
        <link href="/public/themes/multi/css/font-awesome.min.css" rel="stylesheet">
        <link href="/public/themes/multi/css/animate.min.css" rel="stylesheet">
        <link href="/public/themes/multi/css/owl.carousel.css" rel="stylesheet">
        <link href="/public/themes/multi/css/owl.transitions.css" rel="stylesheet">
        <link href="/public/themes/multi/css/prettyPhoto.css" rel="stylesheet">
        <link href="/public/themes/multi/css/main.css" rel="stylesheet">
        <link href="/public/themes/multi/css/responsive.css" rel="stylesheet">
        <!--[if lt IE 9]>
        <script src="/public/themes/multi/js/html5shiv.js"></script>
        <script src="/public/themes/multi/js/respond.min.js"></script>
        <![endif]-->
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.min.css" rel="stylesheet" />    --> 
        <link rel="shortcut icon" href="/public/favicon.ico">
     
    </head>
    <body id="home" class="homepage" data-ng-app="MyApp" data-ng-controller="appCtrl" ng-cloak ng-init="visibleLibrary()">

        <header id="header">
            <nav id="main-menu" class="navbar navbar-default navbar-fixed-top" role="banner">
                <div class="container">
                    <div class="navbar-header">
                        
                        <a class="navbar-brand" href="{{route('admin_index')}}">
                            <img class="my-logo pull-left" src="/public/img/logo.png" alt="logo">
                            <span class="pull-left my-logo-text">English Ticket</span>
                            <!-- <span class="pull-left my-logo-text my-compani">English Ticket</span> -->
                        </a>
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    
                    <div class="collapse navbar-collapse navbar-right">
                        <ul class="nav navbar-nav">
                            <li><a href="{{route('admin_index')}}"><i class="fa fa-home fa-lg"></i></a></li>
                            <li><a href="{{route('admin_dictionary')}}">Словник</a></li>
                            <li><a href="{{route('admin_about')}}">Про нас</a></li>
                            @guest
                            <li><a href="{{route('login')}}">Вхід</a></li>
                            <li><a href="{{route('register')}}">Реєстрація</a></li>
                            @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{route('admin_contact')}}">Повідомлення</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            @endguest                   
                        </ul>
                    </div>
                </div><!--/.container-->
            </nav><!--/nav-->
        </header><!--/header-->

        <!--container start-->
        <div class="content">
            <div class="container">
                <div class="row">
                @yield('content')
                </div><!--/.row-->    
            </div><!--/.container-->
        </div>
        <!--container end-->

        <section id="get-in-touch">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title text-center wow fadeInDown">Time of change</h2>
                    <p class="text-center wow fadeInDown">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p>
                </div>
            </div>
        </section><!--/#get-in-touch-->

        <footer id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <p>United8Space {{date('Y')}} &copy;</p>
                    </div>
                    <div class="col-sm-6">
                        <ul class="social-icons">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-behance"></i></a></li>
                            <li><a href="#"><i class="fa fa-flickr"></i></a></li>
                            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-github"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer><!--/#footer-->

        <!-- Include JavaScript resources -->
        <script src="/public/angular/angular.js"></script>
        <script src="/public/angular/appCtrl.js"></script>
        <script src="/public/angular/factories.js"></script>




        <script src="/public/themes/multi/js/jquery.js"></script>
        <script src="/public/themes/multi/js/bootstrap.min.js"></script>
        <script src="/public/themes/multi/js/owl.carousel.min.js"></script>
        <script src="/public/themes/multi/js/mousescroll.js"></script>
        <script src="/public/themes/multi/js/jquery.prettyPhoto.js"></script>
        <script src="/public/themes/multi/js/jquery.isotope.min.js"></script>

        <script src="/public/themes/multi/js/wow.min.js"></script>
        <script src="/public/themes/multi/js/main.js"></script>
        
    </body>
</html>