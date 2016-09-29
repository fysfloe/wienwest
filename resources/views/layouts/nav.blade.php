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