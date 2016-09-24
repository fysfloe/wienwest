@extends('layouts.app')

@section('content')
		<div class="panel-body trainings games">
			<a href="{{ route('trainings.index') }}" class="link-back"><i class="fa fa-chevron-left"></i> Alle Trainings</a>

			<div class="training row flex single">
				<div class="col-md-12">
					<span class="date-big">{{ date_format(new DateTime($game->date), 'D, d.m.Y') }}</span><br>
					<span class="start-time border-bottom"><strong><i class="fa fa-clock-o"></i> Start: </strong>{{ date_format(new DateTime($game->start_time), 'H:i') }}</span>
					<span class="meeting-time border-bottom"><strong><i class="fa fa-users"></i> Treffpunkt: </strong>{{ date_format(new DateTime($game->meeting_time), 'H:i') }}</span>
					<span class="location"><strong><i class="fa fa-map-marker"></i> Ort: </strong>{{ $game->location }}</span>
				</div>
			</div>
			<div class="post-reply row">
				<h3>Wie schauma aus?</h3>
				@if (count($errors->reply) > 0)
					<div class="alert alert-danger">
						<strong>Herst!</strong> Füll' das gfälligst richtig aus!<br><br>
						<ul>
							@foreach ($errors->reply->all() as $error)
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

			@if(count($replies) > 0)
				<h3>Antworten</h3>
				<ul class="replies">
					@foreach($replies as $reply)
						@include('replies.show', $reply)
					@endforeach
				</ul>
				{!! $replies->render() !!}
			@endif
		</div>
@endsection
