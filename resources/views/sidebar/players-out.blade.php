<div class="players-out">
    <h4>Nicht dabei ({{ count($players_out) }})</h4>
    @if(count($players_out) > 0)
        <ul class="participants">
            <?php $i = 0; ?>
            <div class="row">
                @foreach($players_out as $player)
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
        <p>Niemand!</p>
    @endif
</div>