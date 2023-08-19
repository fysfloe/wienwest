@extends('layouts.app')

@section('content')
	@if (count($errors->tryout_update) > 0)
		<div class="alert alert-danger">
			<strong>Herst!</strong> Füll' das gfälligst richtig aus!<br><br>
			<ul>
				@foreach ($errors->tryout_update->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

	{!! Form::model(new WienWest\LeagueGame, ['method' => 'PATCH', 'route' => ['tryouts.update', $game->id], 'class' => 'form-horizontal', 'files' => true]) !!}
	 @include('games/tryouts/partials/_form')
			<!-- Submit -->
	<div class="form-group">
		<div class="col-md-6 col-md-offset-4">{!! Form::submit('Schick\'s ab!', ['class'=>'btn btn-primary']) !!}</div>
	</div>
	 {!! Form::close() !!}
@endsection
