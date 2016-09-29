<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>FC Wien West | Intern</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,600,700,400italic' rel='stylesheet' type='text/css'>
    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-switch.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">

    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('css/quill.snow.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/wienwest.css') }}" rel="stylesheet" type="text/css">

    <style>
        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
<header role="banner">
<nav class="navbar navbar-default" role="navigation">
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
                <li class="@if(isset($active) && $active == 'home') active @endif"><a href="{{ url('/home') }}"><i class="fa fa-home"></i></a></li>
                <li class="@if(isset($active) && $active == 'league_games') active @endif"><a href="{{ url('/league_games') }}">Meisterschaft</a></li>
                <li class="@if(isset($active) && $active == 'cup_games') active @endif"><a href="{{ url('/cup_games') }}">Cupspiele</a></li>
                <li class="@if(isset($active) && $active == 'tryouts') active @endif"><a href="{{ url('/tryouts') }}">Testspiele</a></li>
                <li class="@if(isset($active) && $active == 'trainings') active @endif"><a href="{{ url('/trainings') }}">Trainings</a></li>
                <li class="@if(isset($active) && $active == 'players') active @endif"><a href="{{ url('/players') }}">Spieler</a></li>
                <li class="@if(isset($active) && $active == 'announcements') active @endif"><a href="{{ url('/announcements') }}">Ankündigungen</a></li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right @if (Auth::guest()) logged-out @endif">
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

<div class="header-image-wrap">
    <img src="{{ asset('img/header_1600x400.jpg') }}" class="header-image" alt="Wien West">
</div>
</header>

<main role="main">
<div class="container">
    @if(isset($title))
        <div class="row page-title">
            <h1 class="page-title">{{ $title }}</h1>
        </div>
    @endif
    @if(Session::has('message') || Session::has('success'))
        <div class="container">
            <div class="alert alert-{{ Session::has('success') ? 'success' : (Session::has('message') ? 'warning' : '') }}">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>{{ Session::has('message') ? Session::get('message') : Session::get('success') }}</strong>
            </div>
        </div>
    @endif

    <div class="row">
        <div class="main-content @if(isset($sidebar)) col-md-9 @else col-md-12 @endif">
            @yield('content')
        </div>
        @if(isset($sidebar))
            <div class="col-md-3 sidebar" role="complementary">
                @include('sidebar')
            </div>
        @endif
    </div>
</div>
</main>

<footer role="contentinfo">
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <h4>Sinnvolle Links</h4>
                    <ul>
                        <li><a href="{{ route('league_games.index') }}">Meisterschaftsspiele</a></li>
                        <li><a href="{{ route('cup_games.index') }}">Cupspiele</a></li>
                        <li><a href="{{ route('tryouts.index') }}">Testspiele</a></li>
                        <li><a href="{{ route('trainings.index') }}">Trainings</a></li>
                        <li><a href="{{ route('players.index') }}">Spieler</a></li>
                        <li><a href="{{ route('announcements.index') }}">Ankündigungen</a></li>
                        <!--<li><a href="{{ url('contact') }}">Kontakt</a></li>
                        <li><a href="{{ url('imprint') }}">Impressum</a></li>-->
                    </ul>
                </div>
                <div class="col-md-4">
                    <h4>Anregungen</h4>
                    <p>
                        Diese App ist großartig! Trotzdem gibt's natürlich immer etwas zu verbessern. Meistens fällt das aber erst im laufenden Betrieb auf. Scheut euch deshalb nicht, mir sofort zu schreiben, wenn etwas gar nicht oder nicht so funktioniert, wie ihr es erwartet habt.
                    </p>
                    <p>
                        Natürlich kann dieses Formular auch dazu genutzt werden, um mir zu sagen, wie toll ich bin oder um neue (bestenfalls realistische) Ideen für die App einzubringen.
                    </p>
                </div>
                <div class="col-md-5 col-md-offset-1 contact-form">
                    @if (count($errors->contact) > 0)
                        <div class="alert alert-danger">
                            <strong>Herst!</strong> Füll' das gfälligst richtig aus!<br><br>
                            <ul>
                                @foreach ($errors->contact->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <h4>Schreibt's ma wos</h4>
                    {!! Form::open(['method' => 'POST', 'url' => 'contactform', 'class' => 'form-horizontal']) !!}
                    <div class="row">
                        <div class="col-md-6">
                            {!! Form::label('contact-name', 'Name') !!}
                            {!! Form::text('contact-name', null, array('class' => 'form-control')) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Form::label('contact-email', 'E-Mail') !!}
                            {!! Form::email('contact-email', null, array('class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            {!! Form::label('contact-message', 'Nachricht') !!}
                            {!! Form::textarea('contact-message', null, array('class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            {!! Form::submit('Schick\'s ab!', array('class' => 'btn btn-default')) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        &copy; Florian Csizmazia | 2016
    </div>
</footer>

<!-- JavaScripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="http://code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="{{ asset('/js/moment-with-locales.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-switch.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/bootbox.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/quill.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/wienwest.js') }}" type="text/javascript"></script>
{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
