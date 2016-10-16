<div class="players-in">
    @if(Auth::user()->hasRole('admin'))
        <a href="{{ route('league_games.manage_players_show', $game->id) }}">Spieler managen</a>
    @endif
    <h4>Dabei ({{ count($players_in) }})</h4>
    @if(count($players_in) > 0)
        <ul class="participants">
            <?php $i = 0; ?>
            <div class="row">
                @foreach($players_in as $player)
                    @if($i % 3 == 0 && $i != 0) </div> @endif
            @if($i % 3 == 0 && $i != 0) <div class="row"> @endif
                <a href="{{ route('players.show', $player->id) }}">
                    <li class="col-md-12">

                        <div class="row flex">
                            <div class="col-md-3">
                                <div class="circular" style="background-image:url({{ asset('img/cartoons') . '/' . $player->avatar . '.png' }})"></div>
                            </div>
                            <div class="col-md-3">
                                <div class="big-number">{{ $player->number }}</div>
                            </div>
                            <div class="col-md-6 name">
                                {{ $player->firstname }} {{ $player->surname }}
                            </div>
                        </div>

                    </li>
                </a>
            <?php $i++ ?>
            @endforeach
        </ul>
    @else
        <p>Whoooot?! Noch niemand!</p>
    @endif
</div>