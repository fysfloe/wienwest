@extends('layouts.app')

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">Meisterschaftsspiel erstellen</div>
					<div class="panel-body">
						@if (count($errors) > 0)
							<div class="alert alert-danger">
								<strong>Herst!</strong> Füll' das gfälligst richtig aus!<br><br>
								<ul>
									@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
						@endif

						{!! Form::model(new WienWest\LeagueGame, ['route' => ['league_game.store'], 'class' => 'form-horizontal']) !!}
							 @include('league-game/partials/_form')
							<!-- Submit -->
							<div class="form-group">
								<div class="col-md-6 col-md-offset-4">{!! Form::submit('Spiel erstellen', ['class'=>'btn btn-primary']) !!}</div>
							</div>
						 {!! Form::close() !!}



					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
