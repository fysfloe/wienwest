@extends('layouts.app')

@section('content')
	@if (count($errors->league_game_create) > 0)
		<div class="alert alert-danger">
			<strong>Herst!</strong> Füll' das gfälligst richtig aus!<br><br>
			<ul>
				@foreach ($errors->league_game_create->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

	{!! Form::model(new WienWest\LeagueGame, ['route' => ['league_games.store'], 'class' => 'form-horizontal']) !!}
	 @include('games/league-games/partials/_form')
			<!-- Submit -->
	<div class="form-group">
		<div class="col-md-6 col-md-offset-4">{!! Form::submit('Spiel erstellen', ['class'=>'btn btn-primary']) !!}</div>
	</div>
	 {!! Form::close() !!}
@endsection
