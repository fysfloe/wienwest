@extends('layouts.app')

@section('content')
	@if(Auth::user()->hasRole('admin')) <a class="btn btn-success" href="{{ route('cup_games.create') }}"><i class="fa fa-btn fa-plus-circle"></i> Neues Spiel erstellen</a> @endif

	<hr>
	<h4>Kommende Spiele</h4>
	@include('games.cup-games.partials._games-list', array('games' => $upcoming))

	<hr>
	<h4>Vergangene Spiele</h4>
	@include('games.cup-games.partials._games-list', array('games' => $past, 'past_games' => true))

@endsection
