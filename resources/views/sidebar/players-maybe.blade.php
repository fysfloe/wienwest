<div class="players-maybe">
    <h4>Vielleicht dabei ({{ count($players_maybe) }})</h4>
    @if(count($players_maybe) > 0)
        <ul class="participants">
            <?php $i = 0; ?>
            <div class="row">
                @foreach($players_maybe as $reply)
                    <?php $player = $reply->user()->first()->player()->first() ?>
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
        <p>Keine Unentschlossenen.</p>
    @endif
</div>