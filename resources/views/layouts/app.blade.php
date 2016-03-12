<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-switch.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">

    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <link href="{{ asset('css/wienwest.css') }}" rel="stylesheet" type="text/css">

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    <!-- DSG Wien West --><img src="{{ asset('img/logo.png') }}" alt="Wien West Logo">
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav navbar-left">
                    <li><a href="{{ url('/home') }}"><i class="fa fa-home"></i></a></li>
                    <li><a href="{{ url('/league_games') }}">Meisterschaft</a></li>
                    <li><a href="{{ url('/tryouts') }}">Testspiele</a></li>
                    <li><a href="{{ url('/trainings') }}">Trainings</a></li>
                    <li><a href="{{ url('/players') }}">Spieler</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <div class="username-wrap flex">
                                    <?php
                                    if($player = Auth::user()->player()->first()) {
                                        $avatar = $player->avatar;
                                    } else {
                                        $avatar = 'plus';
                                    }
                                    ?>
                                    <div class="circular" style="background-image:url({{ asset('img/cartoons' . '/' . $avatar . '.png') }})"></div> <span class="username">{{ Auth::user()->name }}</span> <span class="caret"></span>
                                </div>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/myProfile') }}"><i class="fa fa-btn fa-user"></i>Profil</a></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <img src="{{ asset('img/header_1600x400.jpg') }}" class="header-image" alt="Wien West">

    <div class="container">
        <div class="row page-title">
            <h1 class="page-title">{{ $title }}</h1>
        </div>

        @if(Session::has('message') || Session::has('success'))
            <div class="container">
                <div class="alert alert-{{ Session::has('success') ? 'success' : (Session::has('message') ? 'warning' : '') }}">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>{{ Session::has('message') ? Session::get('message') : Session::get('success') }}</strong>
                </div>
            </div>
        @endif

        <div class="row">
            <div class="col-md-9 main-content">
                @yield('content')
            </div>
            <div class="col-md-3 sidebar">
                @include('sidebar')
            </div>
        </div>
    </div>

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="{{ asset('/js/moment.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('/js/bootstrap-datetimepicker.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap-switch.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/wienwest.js') }}" type="text/javascript"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
