@extends('layouts.app')

@section('content')
	<div class="announcements">
		<a href="{{ route('announcements.index') }}" class="link-back"><i class="fa fa-chevron-left"></i> Alle Ankündigungen</a>

		<div class="announcement reply row">
				<div class="row flex">
					<div class="col-md-1">
						<div class="circular" style="background-image:url({{ asset('img/cartoons') . '/' . $announcement->user->player->avatar . '.png' }})"></div>
					</div>
					<div class="col-md-2">
						<div class="username">{{ $announcement->user->player->firstname }} {{ $announcement->user->player->surname[0] }}.</div>
					</div>
					<div class="col-md-9">
						<h3>{{ $announcement->title }}</h3>
						{!! str_replace('<p><br></p>', '', $announcement->text) !!}
					</div>
				</div>
				<div class="row created-at">
					<div class="col-md-12">
						<span>am</span> {{ date_format(new DateTime($announcement->created_at), 'd.m.Y') }} <span>um</span> {{ date_format(new DateTime($announcement->created_at), 'H:i') }}
					</div>
				</div>
		</div>

		@if(count($replies) > 0)
			<h4>Antworten</h4>
			<ul class="replies">
				@foreach($replies as $reply)
					@include('replies.show', $reply)
				@endforeach
			</ul>
			{!! $replies->render() !!}
		@endif

		<div class="post-reply row">
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

			{!! Form::model(new WienWest\Reply, ['route' => ['replies.store'], 'class' => 'form-horizontal']) !!}
			{!! Form::hidden('in', 'in') !!}
			{!! Form::hidden('repliable_id', $announcement->id) !!}
			{!! Form::hidden('repliable_type', 'WienWest\Announcement') !!}

			{!! Form::label('content', 'Gibt\'s irgendwas dazu zu sagen?', array('class' => 'control-label')) !!}
			{!! Form::textarea('content', null, array('class' => 'form-control', 'rows' => 5)) !!}
					<!-- Submit -->

			{!! Form::submit('Schick\'s ab!', ['class'=>'btn btn-primary']) !!}
			 {!! Form::close() !!}
		</div>
	</div>
@endsection
