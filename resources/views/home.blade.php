@extends('layouts.app')

@section('content')
    <div class="summary">
        <h3>Die nächsten Termine</h3>
        <div class="row next-games">
            @if(isset($next_league_game))
                <div class="col-md-4">
                    <h4>Nächstes Meisterschaftsspiel: <a href="{{ route('league_games.show', $next_league_game->id) }}" class="opponent">{{ $next_league_game->opponent }}</a></h4>
                    <p>startet in</p>
                    <div class="timer row">
                        <div class="days col-md-4">{{ $next_league_game->diff->d }} <span class="caption">Tagen</span></div>
                        <div class="hours col-md-4">{{ $next_league_game->diff->h }} <span class="caption">Stunden</span></div>
                        <div class="minutes col-md-4">{{ $next_league_game->diff->i }} <span class="caption">Minuten</span></div>
                    </div>
                    <p class="{{ isset($next_league_game->reply_key) ? $next_league_game->reply_key : 'neutral' }} is-in">{{ $next_league_game->reply }}</p>
                </div>
            @endif
            @if(isset($next_training))
                <div class="col-md-4">
                    <h4>Nächstes Training: <a href="{{ route('trainings.show', $next_training->id) }}" class="opponent">{{ date_format(new DateTime($next_training->date), 'd.m.Y') }}</a></h4>
                    <p>startet in</p>
                    <div class="timer row">
                        <div class="days col-md-4">{{ $next_training->diff->d }} <span class="caption">Tagen</span></div>
                        <div class="hours col-md-4">{{ $next_training->diff->h }} <span class="caption">Stunden</span></div>
                        <div class="minutes col-md-4">{{ $next_training->diff->i }} <span class="caption">Minuten</span></div>
                    </div>
                    <p class="{{ isset($next_training->reply_key) ? $next_training->reply_key : 'neutral' }} is-in">{{ $next_training->reply }}</p>
                </div>
            @endif
            @if(isset($next_cup_game))
                <div class="col-md-4">
                    <h4>Nächstes Cupspiel: <a href="{{ route('cup_games.show', $next_cup_game->id) }}" class="opponent">{{ $next_cup_game->opponent }}</a></h4>
                    <p>startet in</p>
                    <div class="timer row">
                        <div class="days col-md-4">{{ $next_cup_game->diff->d }} <span class="caption">Tagen</span></div>
                        <div class="hours col-md-4">{{ $next_cup_game->diff->h }} <span class="caption">Stunden</span></div>
                        <div class="minutes col-md-4">{{ $next_cup_game->diff->i }} <span class="caption">Minuten</span></div>
                    </div>
                    <p class="{{ isset($next_cup_game->reply_key) ? $next_cup_game->reply_key : 'neutral' }} is-in">{{ $next_cup_game->reply }}</p>
                </div>
            @endif
        </div>
        <h3>Ergebnisse</h3>
        <div class="row past-games">
            @if(isset($past_league_game))
                <a href="{{ route('league_games.show', $past_league_game->id) }}">
                    <div class="col-md-6">
                        <h4>Letztes Meisterschaftsspiel</h4>
                        <span class="date-big">{{ date_format(new DateTime($past_league_game->date), 'D, d.m.Y') }}, {{ date_format(new DateTime($past_league_game->start_time), 'H:i') }}</span>
                        <div class="teams flex">
                            <span class="home-team">{{ $past_league_game->home ? 'DSG Wien West' : $past_league_game->opponent }}</span> <span class="vs">@if(($past_league_game->result)) {{ $past_league_game->result }} @else vs. @endif</span> <span class="away-team">{{ $past_league_game->home ? $past_league_game->opponent : 'DSG Wien West'}}</span>
                        </div>
                    </div>
                </a>
            @endif
            @if(isset($past_cup_game))
                    <a href="{{ route('cup_games.show', $past_cup_game->id) }}">
                        <div class="col-md-6">
                            <h4>Letztes Cupspiel</h4>
                            <span class="date-big">{{ date_format(new DateTime($past_cup_game->date), 'D, d.m.Y') }}, {{ date_format(new DateTime($past_cup_game->start_time), 'H:i') }}</span>
                            <div class="teams flex">
                                <span class="home-team">{{ $past_cup_game->home ? 'DSG Wien West' : $past_cup_game->opponent }}</span> <span class="vs">@if(($past_cup_game->result)) {{ $past_cup_game->result }} @else vs. @endif</span> <span class="away-team">{{ $past_cup_game->home ? $past_cup_game->opponent : 'DSG Wien West'}}</span>
                            </div>
                        </div>
                    </a>
            @endif

        </div>
    </div>
@endsection