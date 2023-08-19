@extends('layouts.app')

@section('content')
	@if(Auth::user()->hasRole('admin')) <a class="btn btn-success new-announcement" href="{{ route('announcements.create') }}"><i class="fa fa-btn fa-plus-circle"></i> Neue Ankündigung erstellen</a> @endif

	<ul class="announcements">
		@foreach($announcements as $announcement)
			<a href="{{ route('announcements.show', $announcement->id) }}">
				<li class="announcement row">
					<div class="row flex">
						<div class="col-md-1">
							<div class="circular" style="background-image:url({{ asset('img/cartoons') . '/' . $announcement->user->player->avatar . '.png' }})"></div>
						</div>
						<div class="col-md-2">
							<div class="username">{{ $announcement->user->player->firstname }} {{ $announcement->user->player->surname[0] }}.</div>
						</div>
						<div class="col-md-9">
							<h4>{{ $announcement->title }}</h4>
						</div>
					</div>
					<div class="row created-at">
						<div class="col-md-6 col-sm-6 col-xs-6">
							<span>{{ count($announcement->replies) }} @if(count($announcement->replies) != 1) Antworten @else Antwort @endif</span>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-6">
							<span>am</span> {{ date_format(new DateTime($announcement->created_at), 'd.m.Y') }} <span>um</span> {{ date_format(new DateTime($announcement->created_at), 'H:i') }}
						</div>
					</div>
				</li>
			</a>
			@if(Auth::user()->hasRole('admin') && Auth::user()->id == $announcement->user_id)
			<div class="btn-group">
				<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="fa fa-btn fa-gear"></i> <span class="caret"></span>
				</button>
				<ul class="dropdown-menu">
					<li><a href="{{ route('announcements.edit', $announcement->id) }}"><i class="fa fa-btn fa-edit"></i> Bearbeiten</a></li>
					<li>
						{!! Form::open(array('onsubmit' => 'return confirm("Willst du diese Ankündigung wirklich löschen?")', 'class' => 'form-inline', 'method' => 'DELETE', 'route' => array('announcements.destroy', $announcement->id))) !!}
						<button type="submit" class="btn btn-danger"><i class="fa fa-btn fa-trash"></i> Löschen</button>
						{!! Form::close() !!}
					</li>
				</ul>
			</div>
			@endif
		@endforeach
	</ul>

@endsection
