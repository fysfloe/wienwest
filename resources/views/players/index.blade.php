@extends('layouts.app')

@section('content')

        <div class="panel-heading">Alle Spieler</div>

        <div class="panel-body">
            <div class="players">
                <div class="row">
                    <?php $i = 0; ?>
                    @foreach($players as $player)
                        @if($i % 3 == 0 && $i != 0) </div> @endif
                @if($i % 3 == 0 && $i != 0) <div class="row"> @endif
                    <div class="col-md-4">
                        <a href="{{ route('players.show', $player->id) }}">
                            <div class="row flex">
                                <div class="col-md-4">
                                    <div class="circular"
                                         style="background-image:url({{ asset('img/cartoons') . '/' . $player->avatar . '.png' }})"></div>
                                </div>
                                <div class="col-md-2">
                                    <div class="big-number">{{ $player->number }}</div>
                                </div>
                                <div class="col-md-6 name">
                                    {{ $player->firstname }} {{ $player->surname }}
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php $i++ ?>
                    @endforeach
                </div>
            </div>
        </div>
@endsection
