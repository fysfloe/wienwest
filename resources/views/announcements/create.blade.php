@extends('layouts.app')

@section('content')
	@if (count($errors->announcement_create) > 0)
		<div class="alert alert-danger">
			<strong>Herst!</strong> Füll' das gfälligst richtig aus!<br><br>
			<ul>
				@foreach ($errors->announcement_create->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

	{!! Form::model(new WienWest\Announcement, ['route' => ['announcements.store'], 'class' => 'form-horizontal']) !!}
	 @include('announcements/partials/_form')
			<!-- Submit -->
	<div class="form-group">
		<div class="col-md-12">{!! Form::submit('Ankündigung erstellen', ['class'=>'btn btn-primary']) !!}</div>
	</div>
	 {!! Form::close() !!}
@endsection
