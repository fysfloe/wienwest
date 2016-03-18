<div class="other-players">
    <h4>Bessere Spieler</h4>
    @foreach($other_players as $other_player)
        <li class="row other-player">
            <a href="{{ route('players.show', $other_player->id) }}">
                <div class="col-md-12">

                    <div class="row flex">
                        <div class="col-md-3">
                            <div class="circular" style="background-image:url({{ asset('img/cartoons') . '/' . $other_player->avatar . '.png' }})"></div>
                        </div>
                        <div class="col-md-3">
                            <div class="big-number">{{ $other_player->number }}</div>
                        </div>
                        <div class="col-md-6 name">
                            {{ $other_player->firstname }} {{ $other_player->surname }}
                        </div>
                    </div>

                </div>
            </a>
        </li>
    @endforeach
</div>