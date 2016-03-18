@extends('layouts.app')

@section('content')
    <div class="players">
        <div class="row">
            <?php $i = 0; ?>
            @foreach($players as $player)
                @if($i % 3 == 0 && $i != 0) </div> @endif
                @if($i % 3 == 0 && $i != 0) <div class="row"> @endif
                    <a href="{{ route('players.show', $player->id) }}">
                        <div class="col-md-4 player">
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
                        </div>
                    </a>
            <?php $i++ ?>
            @endforeach
        </div>
    </div>
@endsection
