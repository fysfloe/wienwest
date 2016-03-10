@extends('layouts.app')

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">Spielerprofil erstellen</div>
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

						{!! Form::model(new WienWest\Player, ['route' => ['player.store'], 'class' => 'form-horizontal', 'files' => true]) !!}
							 @include('player/partials/_form')
							 @include('player/partials/_avatars')
							<!-- Submit -->
							<div class="form-group">
								<div class="col-md-6 col-md-offset-4">{!! Form::submit('Schick\'s ab!', ['class'=>'btn btn-primary']) !!}</div>
							</div>
						 {!! Form::close() !!}



					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
