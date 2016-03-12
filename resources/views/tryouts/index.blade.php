@extends('layouts.app')

@section('content')
	<div class="panel-body">
		@if(Auth::user()->hasRole('admin')) <a class="btn btn-success" href="{{ route('tryouts.create') }}"><i class="fa fa-btn fa-plus-circle"></i> Neues Spiel erstellen</a> @endif

		<hr>
		<h4>Kommende Spiele</h4>
		<ul class="tryouts games">
			@foreach($upcoming as $game)
				<a href="{{ route('tryouts.show', $game->id) }}">
					<li class="tryout row flex @if($game->home) home @else away @endif">
						<div class="col-md-4">
							<span class="date-big">{{ date_format(new DateTime($game->date), 'D, d.m.Y') }}</span><br>
							<span class="start-time border-bottom"><strong><i class="fa fa-clock-o"></i> Anpfiff: </strong>{{ date_format(new DateTime($game->start_time), 'H:i') }}</span>
							<span class="meeting-time border-bottom"><strong><i class="fa fa-users"></i> Treffpunkt: </strong>{{ date_format(new DateTime($game->meeting_time), 'H:i') }}</span>
							<span class="location"><strong><i class="fa fa-map-marker"></i> Ort: </strong>{{ $game->location }}</span>
						</div>
						<div class="col-md-8 teams flex">
							<span class="home-team" @if($game->home) style="font-weight:bold" @endif>{{ $game->home ? 'DSG Wien West' : $game->opponent }}</span> <span class="vs">vs.</span> <span class="away-team" @if(!$game->home) style="font-weight:bold" @endif>{{ $game->home ? $game->opponent : 'DSG Wien West'}}</span>
						</div>
					</li>
				</a>
				@if(Auth::user()->hasRole('admin'))
					{!! Form::open(array('onsubmit' => 'confirm("Willst du dieses Spiel wirklich löschen?"', 'class' => 'form-inline', 'method' => 'DELETE', 'route' => array('tryouts.destroy', $game->id))) !!}
					<button type="submit" class="btn btn-danger"><i class="fa fa-btn fa-trash"></i> Löschen</button>
					{!! Form::close() !!}
				@endif
			@endforeach
		</ul>

		<hr>
		<h4>Vergangene Spiele</h4>
		<ul class="tryouts games past-games">
			@foreach($past as $game)
				<a href="{{ route('tryouts.show', $game->id) }}">
					<li class="tryout row flex @if($game->home) home @else away @endif">
						<div class="col-md-4">
							<span class="date-big">{{ date_format(new DateTime($game->date), 'D, d.m.Y') }}</span><br>
							<span class="start-time border-bottom"><strong><i class="fa fa-clock-o"></i> &nbsp;Anpfiff: </strong>{{ date_format(new DateTime($game->start_time), 'H:i') }}</span>
							<span class="meeting-time border-bottom"><strong><i class="fa fa-users"></i> Treffpunkt: </strong>{{ date_format(new DateTime($game->meeting_time), 'H:i') }}</span>
							<span class="location"><strong><i class="fa fa-map-marker"></i> Ort: </strong>{{ $game->location }}</span>
						</div>
						<div class="col-md-8 teams flex">
							<span class="home-team">{{ $game->home ? 'DSG Wien West' : $game->opponent }}</span> <span class="vs"><strong>{{ $game->result }}</strong></span> <span class="away-team">{{ $game->home ? $game->opponent : 'DSG Wien West'}}</span>

						</div>
					</li>
				</a>
				@if(Auth::user()->hasRole('admin'))
					{!! Form::open(array('onsubmit' => 'confirm("Willst du dieses Spiel wirklich löschen?"', 'class' => 'form-inline', 'method' => 'DELETE', 'route' => array('tryouts.destroy', $game->id))) !!}
					<button type="submit" class="btn btn-danger"><i class="fa fa-btn fa-trash"></i> Löschen</button>
					{!! Form::close() !!}
				@endif
			@endforeach
		</ul>
	</div>
@endsection
