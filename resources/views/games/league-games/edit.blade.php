@extends('layouts.app')

@section('content')
	@if (count($errors->league_game_update) > 0)
		<div class="alert alert-danger">
			<strong>Herst!</strong> Füll' das gfälligst richtig aus!<br><br>
			<ul>
				@foreach ($errors->league_game_update->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

	<a href="{{ route('league_games.show', $game->id) }}" class="link-back"><i class="fa fa-chevron-left"></i> Zurück zum Spiel</a>

	{!! Form::model(new WienWest\LeagueGame, ['method' => 'PATCH', 'route' => ['league_games.update', $game->id], 'class' => 'form-horizontal', 'files' => true]) !!}
	 @include('games/league-games/partials/_form')
			<!-- Submit -->
	<div class="form-group">
		<div class="col-md-6 col-md-offset-4">{!! Form::submit('Schick\'s ab!', ['class'=>'btn btn-primary']) !!}</div>
	</div>
	 {!! Form::close() !!}
@endsection
