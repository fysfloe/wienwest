@extends('layouts.app')

@section('content')
	@if (count($errors->player_update) > 0)
		<div class="alert alert-danger">
			<strong>Herst!</strong> Füll' das gfälligst richtig aus!<br><br>
			<ul>
				@foreach ($errors->player_update->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

	{!! Form::model(new WienWest\Player, ['method' => 'PATCH', 'route' => ['players.update', $player->id], 'class' => 'form-horizontal', 'files' => true]) !!}
	 @include('players/partials/_form')
	 @include('players/partials/_avatars')
			<!-- Submit -->
	<div class="form-group">
		<div class="col-md-6 col-md-offset-4">{!! Form::submit('Schick\'s ab!', ['class'=>'btn btn-primary']) !!}</div>
	</div>
	 {!! Form::close() !!}
@endsection
