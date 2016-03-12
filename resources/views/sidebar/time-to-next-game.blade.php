<div class="time-to-next-game">
    @if(isset($next_opponent))
        <h4>Nächstes Spiel: <a href="{{ route('league_games.show', $next_opponent->id) }}" class="opponent">{{ $next_opponent->opponent }}</a></h4>
        <p>startet in</p>
        <div class="timer row">
            @if($next_opponent->diff->m > 0) <span class="months">{{ $next_opponent->diff->m }} </span>Monaten&nbsp; @endif
            <div class="days col-md-4">{{ $next_opponent->diff->d }} <span class="caption">Tagen</span></div>
            <div class="hours col-md-4">{{ $next_opponent->diff->h }} <span class="caption">Stunden</span></div>
            <div class="minutes col-md-4">{{ $next_opponent->diff->i }} <span class="caption">Minuten</span></div>
        </div>
    @endif
        @if(isset($next_training))
            <h4>Nächstes Training: {{ date_format(new DateTime($next_training->date), 'd.m.Y') }}</h4>
            <p>startet in</p>
            <div class="timer row">
                @if($next_training->diff->m > 0) <span class="months">{{ $next_training->diff->m }} </span>Monaten&nbsp; @endif
                <div class="days col-md-4">{{ $next_training->diff->d }} <span class="caption">Tagen</span></div>
                <div class="hours col-md-4">{{ $next_training->diff->h }} <span class="caption">Stunden</span></div>
                <div class="minutes col-md-4">{{ $next_training->diff->i }} <span class="caption">Minuten</span></div>
            </div>
        @endif

</div>