@extends('layouts.app')

@section('content')
		<div class="panel-body tryouts games">
			<div class="tryout row flex @if($game->home) home @else away @endif">
				<div class="col-md-4">
					<span class="date-big">{{ date_format(new DateTime($game->date), 'D, d.m.Y') }}</span><br>
					<span class="start-time border-bottom"><strong><i class="fa fa-clock-o"></i> Anpfiff: </strong>{{ date_format(new DateTime($game->start_time), 'H:i') }}</span>
					<span class="meeting-time border-bottom"><strong><i class="fa fa-users"></i> Treffpunkt: </strong>{{ date_format(new DateTime($game->meeting_time), 'H:i') }}</span>
					<span class="location"><strong><i class="fa fa-map-marker"></i> Ort: </strong>{{ $game->location }}</span>
				</div>
				<div class="col-md-8 teams flex">
					<span class="home-team" @if($game->home) style="font-weight:bold" @endif>{{ $game->home ? 'DSG Wien West' : $game->opponent }}</span> <span class="vs">vs.</span> <span class="away-team" @if(!$game->home) style="font-weight:bold" @endif>{{ $game->home ? $game->opponent : 'DSG Wien West'}}</span>
				</div>
			</div>
			<div class="lineup row">
				<h3>Aufstellung</h3>
				@if($game->lineup)
					foo
				@else
					<p>Wird noch bekannt gegeben.</p>
				@endif
			</div>
			<div class="post-reply row">
				<h3>Wie schauma aus?</h3>
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

					<div class="btn-group btn-group-lg" id="reply-buttons" role="group" aria-label="...">
						<div class="btn-group" role="group">
							<button type="button" class="btn btn-default in @if (isset($reply) && $reply->in == 'in') selected @endif" data-option="in">Dabei!</button>
						</div>
						<div class="btn-group" role="group">
							<button type="button" class="btn btn-default maybe @if (isset($reply) && $reply->in == 'maybe') selected @endif" data-option="maybe">Vielleicht dabei...</button>
						</div>
						<div class="btn-group" role="group">
							<button type="button" class="btn btn-default out @if (isset($reply) && $reply->in == 'out') selected @endif" data-option="out">Nicht dabei.</button>
						</div>
					</div>

					{!! Form::model(new WienWest\Reply, ['route' => ['replies.store'], 'class' => 'form-horizontal']) !!}
					{!! Form::text('in', null) !!}
					{!! Form::hidden('repliable_id', $game->id) !!}
					{!! Form::hidden('repliable_type', $game->getType()) !!}

					{!! Form::label('content', 'Gibt\'s irgendwas dazu zu sagen?', array('class' => 'control-label')) !!}
					{!! Form::textarea('content', null, array('class' => 'form-control')) !!}
							<!-- Submit -->

					{!! Form::submit('Schick\'s ab!', ['class'=>'btn btn-primary']) !!}
					 {!! Form::close() !!}
			</div>
		</div>
@endsection
