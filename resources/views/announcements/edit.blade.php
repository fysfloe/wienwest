@extends('layouts.app')

@section('content')
	@if (count($errors->announcement_update) > 0)
		<div class="alert alert-danger">
			<strong>Herst!</strong> Füll' das gfälligst richtig aus!<br><br>
			<ul>
				@foreach ($errors->announcement_update->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

	<a href="{{ route('announcements.show', $announcement->id) }}" class="link-back"><i class="fa fa-chevron-left"></i> Zurück zur Ankündigung</a>

	{!! Form::model(new WienWest\Announcement, ['method' => 'PATCH', 'route' => ['announcements.update', $announcement->id], 'class' => 'form-horizontal', 'files' => true]) !!}
	 @include('announcements/partials/_form')
			<!-- Submit -->
	<div class="form-group">
		<div class="col-md-12">{!! Form::submit('Ankündigung aktualisieren', ['class'=>'btn btn-primary']) !!}</div>
	</div>
	 {!! Form::close() !!}
@endsection
