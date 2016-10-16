@extends('layouts.app')

@section('content')
	<a href="{{ route('league_games.show', $game_id) }}" class="link-back"><i class="fa fa-chevron-left"></i> Zurück zum Spiel</a>
	<div class="row admin-manage-players">
		{{ Form::open(['route' => ['league_games.manage_players_update', $game_id]]) }}
		<div class="col-md-6">
			<h3>Spieler, die geantwortet haben:</h3>
			<ul class="participants">
				@foreach($players_replied as $player)
					<li class="col-md-12">

						<div class="row flex">
							<div class="col-md-2">
								<div class="big-number">{{ $player->number }}</div>
							</div>
							<div class="col-md-6 name">
								{{ $player->firstname }} {{ $player->surname }}
							</div>
							<div class="col-md-4">
								<div class="btn-group btn-group-lg" role="group" aria-label="...">
									<div class="btn-group" role="group">
										<button type="button" data-player-id="{{ $player->id }}" class="btn btn-default glyphicon glyphicon-ok in @if (isset($player->league_games->first()->pivot->in) && $player->league_games->first()->pivot->in == 'in') selected @endif" data-option="in"></button>
									</div>
									<div class="btn-group" role="group">
										<button type="button" data-player-id="{{ $player->id }}" class="btn btn-default glyphicon glyphicon-question-sign maybe @if (isset($player->league_games->first()->pivot->in) && $player->league_games->first()->pivot->in == 'maybe') selected @endif" data-option="maybe"></button>
									</div>
									<div class="btn-group" role="group">
										<button type="button" data-player-id="{{ $player->id }}" class="btn btn-default glyphicon glyphicon-remove out @if (isset($player->league_games->first()->pivot->in) && $player->league_games->first()->pivot->in == 'out') selected @endif" data-option="out"></button>
									</div>
								</div>
								{!! Form::text($player->id . '_in', isset($player->league_games->first()->pivot->in) ? $player->league_games->first()->pivot->in : null) !!}
							</div>
						</div>

					</li>
				@endforeach
			</ul>
		</div>

		<div class="col-md-6">
			<h3>Spieler, die noch nicht geantwortet haben:</h3>
			<ul class="participants">
				@foreach($players_no_reply as $player)
					<li class="col-md-12">

						<div class="row flex">
							<div class="col-md-2">
								<div class="big-number">{{ $player->number }}</div>
							</div>
							<div class="col-md-6 name">
								{{ $player->firstname }} {{ $player->surname }}
							</div>
							<div class="col-md-4">
								<div class="btn-group btn-group-lg" role="group" aria-label="...">
									<div class="btn-group" role="group">
										<button type="button" data-player-id="{{ $player->id }}" class="btn btn-default glyphicon glyphicon-ok in @if (isset($player->league_games->first()->pivot->in) && $player->league_games->first()->pivot->in == 'in') selected @endif" data-option="in"></button>
									</div>
									<div class="btn-group" role="group">
										<button type="button" data-player-id="{{ $player->id }}" class="btn btn-default glyphicon glyphicon-question-sign maybe @if (isset($player->league_games->first()->pivot->in) && $player->league_games->first()->pivot->in == 'maybe') selected @endif" data-option="maybe"></button>
									</div>
									<div class="btn-group" role="group">
										<button type="button" data-player-id="{{ $player->id }}" class="btn btn-default glyphicon glyphicon-remove out @if (isset($player->league_games->first()->pivot->in) && $player->league_games->first()->pivot->in == 'out') selected @endif" data-option="out"></button>
									</div>
								</div>
								{!! Form::text($player->id . '_in', isset($player->league_games->first()->pivot->in) ? $player->league_games->first()->pivot->in : null) !!}
							</div>
						</div>

					</li>
				@endforeach
			</ul>
		</div>
		<div class="clearfix"></div>

		{!! Form::submit('Schick\'s ab!', ['class'=>'btn btn-primary pull-right']) !!}
		{!! Form::close() !!}
	</div>
@endsection