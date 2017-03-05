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
    <link href="{{ asset('css/fullcalendar.min.css') }}" rel="stylesheet" type="text/css" />
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
        @include('layouts.nav')
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

@include('layouts.footer')

<!-- JavaScripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="http://code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="{{ asset('/js/moment-with-locales.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-switch.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/bootbox.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/quill.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/fullcalendar.min.js') }}" type="text/javascript"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwOe625nUJQpEwYYdweX9N7WZHwvB70cw&libraries=places" type="text/javascript"></script>


<script src="{{ asset('js/wienwest.js') }}" type="text/javascript"></script>
{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
