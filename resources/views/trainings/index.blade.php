@extends('layouts.app')

@section('content')
	<div class="panel-body">
		@if(Auth::user()->hasRole('admin')) <a class="btn btn-success" href="{{ route('trainings.create') }}"><i class="fa fa-btn fa-plus-circle"></i> Neues Training erstellen</a> @endif

		<hr>
		<h4>Kommende Trainings</h4>
		<ul class="trainings games">
			<?php $i = 0 ?>
			<div class="row">
				@foreach($upcoming as $game)
					@if($i % 3 == 0 && $i != 0) </div><div class="row"> @endif
				<a href="{{ route('trainings.show', $game->id) }}">
					<li class="training col-md-4 flex">
						<div class="col-md-12">
							<span class="date-big">{{ date_format(new DateTime($game->date), 'D, d.m.Y') }}</span><br>
							<span class="start-time border-bottom"><strong><i class="fa fa-clock-o"></i> Start: </strong>{{ date_format(new DateTime($game->start_time), 'H:i') }}</span>
							<span class="meeting-time border-bottom"><strong><i class="fa fa-users"></i> Treffpunkt: </strong>{{ date_format(new DateTime($game->meeting_time), 'H:i') }}</span>
							<span class="location"><strong><i class="fa fa-map-marker"></i> Ort: </strong>{{ $game->location }}</span>
						</div>
					</li>
				</a>
					<?php $i++; ?>
			@endforeach
		</ul>

		<hr>
		<h4>Vergangene Trainings</h4>
			<ul class="trainings games">
				<?php $i = 0 ?>
				<div class="row">
					@foreach($past as $game)
						@if($i % 3 == 0 && $i != 0) </div><div class="row"> @endif
					<a href="{{ route('trainings.show', $game->id) }}">
						<li class="training col-md-4 flex">
							<div class="col-md-12">
								<span class="date-big">{{ date_format(new DateTime($game->date), 'D, d.m.Y') }}</span><br>
								<span class="start-time border-bottom"><strong><i class="fa fa-clock-o"></i> Start: </strong>{{ date_format(new DateTime($game->start_time), 'H:i') }}</span>
								<span class="meeting-time border-bottom"><strong><i class="fa fa-users"></i> Treffpunkt: </strong>{{ date_format(new DateTime($game->meeting_time), 'H:i') }}</span>
								<span class="location"><strong><i class="fa fa-map-marker"></i> Ort: </strong>{{ $game->location }}</span>
							</div>
						</li>
					</a>
				@endforeach
			</ul>
	</div>
@endsection
