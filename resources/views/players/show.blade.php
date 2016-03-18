@extends('layouts.app')

@section('content')
	<div class="row player single flex">
		<div class="col-md-2">
			<div class="circular" style="background-image:url({{ asset('img/cartoons') . '/' . $player->avatar . '.png' }})"></div>
		</div>
		<div class="col-md-2">
			<div class="big-number">{{ $player->number }}</div>
		</div>
		<div class="col-md-8">
			<table class="player-table table">
				<tr>
					<th>Name:</th>
					<td>{{ $player->firstname }} {{ $player->surname }}</td>
				</tr>
				<tr>
					<th>Lieblingsposition:</th>
					<td>{{ isset($player->fav_position) ? $player->fav_position : 'Homma ned!' }}</td>
				</tr>
				<tr>
					<th>Lieblingskuscheltier:</th>
					<td>{{ isset($player->fav_soft_toy) ? $player->fav_soft_toy : 'Homma ned!' }}</td>
				</tr>
			</table>
		</div>
	</div>

	<div class="row games league-games">
		<h3>Meisterschaftsspiele</h3>
		<table class="table">
			@if(count($player->league_games_past) > 0)
				<tr>
					<th>Datum</th>
					<th>Heim/Auswärts</th>
					<th>Gegen</th>
				</tr>
				@foreach($player->league_games_past as $game)
					<tr>
						<td>{{ date_format(new DateTime($game->date), 'd.m.Y') }} | {{ date_format(new DateTime($game->start_time), 'H:i') }}</td>
						<td>{{ $game->home ? 'Heim' : 'Auswärts' }}</td>
						<td><a href="{{ route('league_games.show', $game->id) }}">{{ $game->opponent }}</a></td>
					</tr>
				@endforeach
			@else
				<tr>
					<td colspan="4">Nix!</td>
				</tr>
			@endif
		</table>
	</div>
	<div class="row games tryouts">
		<h3>Testspiele</h3>
		<table class="table">
			@if(count($player->tryouts_past) > 0)
				<tr>
					<th>Datum</th>
					<th>Heim/Auswärts</th>
					<th>Gegen</th>
					<th>Ergebnis</th>
				</tr>
				@foreach($player->tryouts_past as $game)
					<tr>
						<td>{{ date_format(new DateTime($league_game->date), 'd.m.Y') }} {{ date_format(new DateTime($game->start_time), 'H:i') }}</td>
						<td>{{ $game->home ? 'Heim' : 'Auswärts' }}</td>
						<td>{{ $game->opponent }}</td>
						<td>{{ $game->result }}</td>
					</tr>
				@endforeach
			@else
				<tr>
					<td colspan="4">Nix!</td>
				</tr>
			@endif
		</table>
	</div>
	<div class="row games trainings">
		<h3>Trainings</h3>
		<table class="table">
			@if(count($player->trainings_past) > 0)
				<tr>
					<th>Datum</th>
				</tr>
				@foreach($player->trainings_past as $game)
					<tr>
						<td>{{ date_format(new DateTime($game->date), 'd.m.Y') }}</td>
					</tr>
				@endforeach
			@else
				<tr>
					<td colspan="4">Nix!</td>
				</tr>
			@endif
		</table>
	</div>
@endsection
