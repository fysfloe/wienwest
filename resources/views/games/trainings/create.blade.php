@extends('layouts.app')

@section('content')
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

	{!! Form::model(new WienWest\Training, ['route' => ['trainings.store'], 'class' => 'form-horizontal']) !!}
	 @include('trainings.partials._form')
			<!-- Submit -->
	<div class="form-group">
		<div class="col-md-6 col-md-offset-4">{!! Form::submit('Training erstellen', ['class'=>'btn btn-primary']) !!}</div>
	</div>
	 {!! Form::close() !!}
@endsection
