@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Spielerprofil: {{ $player->firstname }} {{ $player->surname }}</div>

				<div class="panel-body">
					<div class="row">
						<div class="col-md-2">
							<img src="{{ asset('img/cartoons') . '/' . $player->avatar }}">
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
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
