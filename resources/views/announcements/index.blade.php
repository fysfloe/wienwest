@extends('layouts.app')

@section('content')
	@if(Auth::user()->hasRole('admin')) <a class="btn btn-success" href="{{ route('announcements.create') }}"><i class="fa fa-btn fa-plus-circle"></i> Neue Anknündigung erstellen</a> @endif

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
						<div class="col-md-6">
							<span>{{ count($announcement->replies) }} @if(count($announcement->replies) != 1) Antworten @else Antwort @endif</span>
						</div>
						<div class="col-md-6">
							<span>am</span> {{ date_format(new DateTime($announcement->created_at), 'd.m.Y') }} <span>um</span> {{ date_format(new DateTime($announcement->created_at), 'H:i') }}
						</div>
					</div>
				</li>
			</a>
		@endforeach
	</ul>

@endsection
