<div class="players-in">
    <h4>Dabei ({{ count($players) }})</h4>
    @if(count($players) > 0)
        <ul class="participants">
            <div class="row">
                @foreach($players as $player)
                    <li class="col-md-12 draggable" data-id="{{ $player->id }}">

                        <div class="row flex">
                            <div class="col-md-3 image">
                                <div class="circular" style="background-image:url({{ asset('img/cartoons') . '/' . $player->avatar . '.png' }})"></div>
                            </div>
                            <div class="col-md-3 number">
                                <div class="big-number">{{ $player->number }}</div>
                            </div>
                            <div class="col-md-6 name">
                                {{ $player->firstname }} {{ $player->surname }}
                            </div>
                        </div>

                    </li>
                @endforeach
            </div>
            @else
                <p>Whoooot?! Noch niemand!</p>
            @endif
        </ul>
</div>