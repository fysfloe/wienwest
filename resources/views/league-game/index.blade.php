@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Meisterschaftsspiele</div>

				<div class="panel-body">
					<ul class="league-games">
						@foreach($league_games as $game)
							<li class="league-game">{{ $game->date }}</li>
						@endforeach
					</ul>
					@if(Auth::user()->hasRole('admin')) <a class="btn btn-success" href="{{ route('league_game.create') }}"><i class="fa fa-btn fa-plus-circle"></i> Neues Spiel erstellen</a> @endif
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
