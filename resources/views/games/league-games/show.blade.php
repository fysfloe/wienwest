@extends('layouts.app')

@section('content')
	<div class="league-games games">
		@if(Auth::user()->hasRole('admin'))
			@if ($errors->get('home_team') || $errors->get('away_team'))
				<div class="alert alert-danger">
					<strong>Herst!</strong> Fehler beim Ergebnis eintragen! Versuch's noch einmal.<br><br>
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif

			<button type="button" data-toggle="modal" data-target="#edit-result" class="btn btn-info"><i class="fa fa-btn fa-futbol-o"></i> Ergebnis eintragen</button>

			<div id="edit-result" class="modal fade" role="dialog">
				<div class="modal-dialog">

					<!-- Modal content-->
					<div class="modal-content">
						{!! Form::open(array('method' => 'POST', 'route' => array('league_games.edit_result', $game->id))) !!}
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

			<a class="btn btn-primary" href="{{ route('league_games.edit', $game->id) }}"><i class="fa fa-btn fa-edit"></i> Bearbeiten</a>
			{!! Form::open(array('onsubmit' => 'return confirm("Willst du dieses Spiel wirklich löschen?")', 'class' => 'form-inline', 'method' => 'DELETE', 'route' => array('league_games.destroy', $game->id))) !!}
			<button type="submit" class="btn btn-danger"><i class="fa fa-btn fa-trash"></i> Löschen</button>
			{!! Form::close() !!}
				<hr>
		@endif

		<a href="{{ route('league_games.index') }}" class="link-back"><i class="fa fa-chevron-left"></i> Alle Meisterschaftsspiele</a>

		<div class="league-game row flex @if($game->home) home @else away @endif">
			<div class="col-md-4">
				<span class="date-big">{{ date_format(new DateTime($game->date), 'D, d.m.Y') }}</span><br>
				<span class="start-time border-bottom"><strong><i class="fa fa-clock-o"></i> Anpfiff: </strong>{{ date_format(new DateTime($game->start_time), 'H:i') }}</span>
				<span class="meeting-time border-bottom"><strong><i class="fa fa-users"></i> Treffpunkt: </strong>{{ date_format(new DateTime($game->meeting_time), 'H:i') }}</span>
				<span class="location"><strong><i class="fa fa-map-marker"></i> Ort: </strong>{{ $game->location }}</span>
			</div>
			<div class="col-md-8 teams flex">
				<span class="home-team">{{ $game->home ? 'DSG Wien West' : $game->opponent }}</span> <span class="vs">@if(($game->result)) {{ $game->result }} @else vs. @endif</span> <span class="away-team">{{ $game->home ? $game->opponent : 'DSG Wien West'}}</span>
			</div>
		</div>
		<div class="lineup row">
			<a href="#game-lineup" data-toggle="collapse"><h3>Aufstellung <i class="fa fa-angle-down" id="game-lineup-arrow"></i></h3></a>
			@if($game->lineup && count(array_filter(json_decode($game->lineup->lineup, true)['positions'])) >= 11)
				<div id="game-lineup" class="collapse in">
				@include('games.lineups.'.$game->lineup->mode, ['positions' => $positions])
				@include('games.lineups.bench', ['positions' => $positions])
				</div>
			@else
				<p>Wird noch bekannt gegeben.</p>
			@endif
			@if(Auth::user()->hasRole('admin') && !isset($past_game))
				<a class="btn btn-default" href="{{ route('lineup', 'league_games', $game->id) }}"><i class="fa fa-btn fa-users"></i> Aufstellung</a>
			@endif
		</div>
		@if(!isset($past_game))
			<div class="post-reply row">
				<h3>Wie schauma aus?</h3>
				@if ($errors->get('in'))
					<div class="alert alert-danger">
						<strong>Herst!</strong> Füll' das gfälligst richtig aus!<br><br>
						<ul>
							<li>{{ $errors->first('in') }}</li>
						</ul>
					</div>
				@endif

				<div class="btn-group btn-group-lg" id="reply-buttons" role="group" aria-label="...">
					<div class="btn-group" role="group">
						<button type="button" class="btn btn-default in @if (isset($reply) && $reply->in == 'in') selected @endif" data-option="in">Dabei!</button>
					</div>
					<div class="btn-group" role="group">
						<button type="button" class="btn btn-default maybe @if (isset($reply) && $reply->in == 'maybe') selected @endif" data-option="maybe">Vielleicht dabei...</button>
					</div>
					<div class="btn-group" role="group">
						<button type="button" class="btn btn-default out @if (isset($reply) && $reply->in == 'out') selected @endif" data-option="out">Nicht dabei.</button>
					</div>
				</div>

				{!! Form::model(new WienWest\Reply, ['route' => ['replies.store'], 'class' => 'form-horizontal']) !!}
				{!! Form::text('in', isset($reply) ? $reply->in : null) !!}
				{!! Form::hidden('repliable_id', $game->id) !!}
				{!! Form::hidden('repliable_type', $game->getType()) !!}

				{!! Form::label('content', 'Gibt\'s irgendwas dazu zu sagen?', array('class' => 'control-label')) !!}
				{!! Form::textarea('content', null, array('class' => 'form-control', 'rows' => 5)) !!}
						<!-- Submit -->

				{!! Form::submit('Schick\'s ab!', ['class'=>'btn btn-primary']) !!}
				 {!! Form::close() !!}
			</div>
		@endif

		@if(count($replies) > 0)
			<h3>Antworten</h3>
			<ul class="replies">
			@foreach($replies as $reply)
				@include('replies.show', $reply)
			@endforeach
			</ul>
			{!! $replies->render() !!}
		@endif
	</div>
@endsection
