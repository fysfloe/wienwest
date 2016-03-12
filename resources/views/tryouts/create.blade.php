@extends('layouts.app')

@section('content')
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

					{!! Form::model(new WienWest\Tryout, ['route' => ['tryouts.store'], 'class' => 'form-horizontal']) !!}
					 @include('tryouts.partials._form')
							<!-- Submit -->
					<div class="form-group">
						<div class="col-md-6 col-md-offset-4">{!! Form::submit('Spiel erstellen', ['class'=>'btn btn-primary']) !!}</div>
					</div>
					 {!! Form::close() !!}
				</div>
@endsection
