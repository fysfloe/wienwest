<div class="max-players">
    <h4>Die meisten {{ $game_name }}</h4>
    @foreach($max_players as $max_player)
        <li class="row max-player">
            <a href="{{ route('players.show', $max_player->id) }}">
                <div class="col-md-12">

                    <div class="row flex">
                        <div class="col-md-3">
                            <div class="circular" style="background-image:url({{ asset('img/cartoons') . '/' . $max_player->avatar . '.png' }})"></div>
                        </div>
                        <div class="col-md-3">
                            <div class="big-number">{{ $max_player->games_count }}</div>
                        </div>
                        <div class="col-md-6 name">
                            {{ $max_player->firstname }} {{ $max_player->surname }}
                        </div>
                    </div>

                </div>
            </a>
        </li>
    @endforeach
</div>