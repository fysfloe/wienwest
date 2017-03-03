<ul class="cup-games games @if(isset($past_games)) past-games @endif">
    @foreach($games as $game)
        <a href="{{ route('cup_games.show', $game->id) }}">
            <li class="cup-game row flex @if($game->home) home @else away @endif">
              <div class="is-in <?php if($game->replies->first()) echo $game->replies->first()->in; else echo 'not-yet-replied' ?>"></div>

                <div class="col-md-4">
                    <span class="date-big">{{ date_format(new DateTime($game->date), 'D, d.m.Y') }}</span><br>
                    <span class="start-time border-bottom"><strong><i class="fa fa-clock-o"></i> Anpfiff: </strong>{{ date_format(new DateTime($game->start_time), 'H:i') }}</span>
                    <span class="meeting-time border-bottom"><strong><i class="fa fa-users"></i> Treffpunkt: </strong>{{ date_format(new DateTime($game->meeting_time), 'H:i') }}</span>
                    <span class="location"><strong><i class="fa fa-map-marker"></i> Ort: </strong>{{ $game->location }}</span>
                </div>
                <div class="col-md-8 teams flex">
                    <span class="home-team">{{ $game->home ? 'DSG Wien West' : $game->opponent }}</span> <span class="vs"> @if(isset($game->result)) <strong>{{ $game->result }}</strong> @else vs. @endif</span> <span class="away-team">{{ $game->home ? $game->opponent : 'DSG Wien West'}}</span>
                </div>
            </li>
        </a>
        @if(Auth::user()->hasRole('admin') && !isset($past_games))
                <!-- Single button -->
        <div class="btn-group">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-btn fa-gear"></i> <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <li><a data-toggle="modal" data-target="#edit-result-{{$game->id}}"><i class="fa fa-btn fa-futbol-o"></i> Ergebnis eintragen</a></li>
                <li><a href="{{ route('cup_games.edit', $game->id) }}"><i class="fa fa-btn fa-edit"></i> Bearbeiten</a></li>
                <li>
                    {!! Form::open(array('onsubmit' => 'return confirm("Willst du dieses Spiel wirklich löschen?")', 'class' => 'form-inline', 'method' => 'DELETE', 'route' => array('cup_games.destroy', $game->id))) !!}
                    <button type="submit" class="btn btn-danger"><i class="fa fa-btn fa-trash"></i> Löschen</button>
                    {!! Form::close() !!}
                </li>
            </ul>
        </div>

        <div id="edit-result-{{$game->id}}" class="modal fade edit-result" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    {!! Form::open(array('method' => 'POST', 'route' => array('cup_games.edit_result', $game->id))) !!}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Ergebnis eintragen</h4>
                    </div>
                    <div class="modal-body">
                        <label class="home-team" for="home_team">{{ $game->home ? 'DSG Wien West' : $game->opponent }}</label>
                        {{ Form::number('home_team', isset($game->result) ? explode(':', $game->result)[0] : null, array('class' => 'form-control', 'min' => 0, 'max' => 50)) }} : {{ Form::number('away_team', isset($game->result) ? explode(':', $game->result)[1] : null, array('class' => 'form-control', 'min' => 0, 'max' => 50)) }}
                        <label class="away-team" for="away_team">{{ $game->home ? $game->opponent : 'DSG Wien West'}}</label>
                    </div>
                    <div class="modal-footer">
                        {!! Form::submit('Eintragen', array('class' => 'btn btn-primary')) !!}
                    </div>
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
        @endif
    @endforeach
</ul>
