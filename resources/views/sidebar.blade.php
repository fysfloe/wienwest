
    <h3>So nebenbei</h3>

    @if (isset($next_opponent))
        @include('sidebar.time-to-next-game', ['next_opponent' => $next_opponent])
    @endif

    @if (isset($next_training))
        @include('sidebar.time-to-next-game', ['next_training' => $next_training])
    @endif

    @if (isset($players_in))
        @include('sidebar.players-in', ['players_in' => $players_in])
    @endif

    @if (isset($players_maybe))
        @include('sidebar.players-maybe', ['players_maybe' => $players_maybe])
    @endif

    @if (isset($players_out))
        @include('sidebar.players-out', ['players_out' => $players_out])
    @endif

    @if (isset($max_players))
        @include('sidebar.max-players', ['max_players' => $max_players])
    @endif

    @if (isset($other_players))
        @include('sidebar.other-players', ['other_players' => $other_players])
    @endif

    @if (isset($players_droppable))
        @include('sidebar.players-droppable', ['players' => $players_droppable])
    @endif