@extends('layouts.app')

@section('content')
	<a class="btn btn-success" href="{{ route('exercises.create') }}"><i class="fa fa-btn fa-plus-circle"></i> Neue Übung erstellen</a>

	<hr>
	<ul class="exercises">
		@foreach($exercises as $exercise)
			<a href="{{ route('exercises.show', $exercise->id) }}">
				<li class="exercise row">
					<div class="row flex">
						<div class="col-md-1">
							<div class="circular" style="background-image:url({{ asset('img/cartoons') . '/' . $exercise->user->player->avatar . '.png' }})"></div>
						</div>
						<div class="col-md-2">
							<div class="username">{{ $exercise->user->player->firstname }} {{ $exercise->user->player->surname[0] }}.</div>
						</div>
						<div class="col-md-9">
							<h4>{{ $exercise->title }}</h4>
						</div>
					</div>
					<div class="row created-at">
						<div class="col-md-6 col-sm-6 col-xs-6">
							<span>{{ count($exercise->replies) }} @if(count($exercise->replies) != 1) Antworten @else Antwort @endif</span>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-6">
							<span>am</span> {{ date_format(new DateTime($exercise->created_at), 'd.m.Y') }} <span>um</span> {{ date_format(new DateTime($exercise->created_at), 'H:i') }}
						</div>
					</div>
				</li>
			</a>
			@if(Auth::user()->id == $exercise->user_id)
			<div class="btn-group">
				<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="fa fa-btn fa-gear"></i> <span class="caret"></span>
				</button>
				<ul class="dropdown-menu">
					<li><a href="{{ route('announcements.edit', $exercise->id) }}"><i class="fa fa-btn fa-edit"></i> Bearbeiten</a></li>
					<li>
						{!! Form::open(array('onsubmit' => 'return confirm("Willst du diese Übung wirklich löschen?")', 'class' => 'form-inline', 'method' => 'DELETE', 'route' => array('exercises.destroy', $exercise->id))) !!}
						<button type="submit" class="btn btn-danger"><i class="fa fa-btn fa-trash"></i> Löschen</button>
						{!! Form::close() !!}
					</li>
				</ul>
			</div>
			@endif
		@endforeach
	</ul>

@endsection
