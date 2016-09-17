@extends('layouts.app')

@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Herst!</strong> Mach' das gfälligst richtig!<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <a href="{{ route($game_type.'.show', $game_id) }}" class="link-back"><i class="fa fa-chevron-left"></i> Zurück zum Spiel</a>

    <hr>

    {!! Form::model(new WienWest\Lineup, ['route' => ['lineup.save',$game_type, $game_id], 'class' => 'form-horizontal']) !!}
    <div class="form-group">
        {!! Form::label('mode', 'Modus', array('class' => 'col-md-4 control-label')) !!}
        <div class="col-md-6">{!! Form::select('mode', array('4-2-3-1' => '4-2-3-1', '4-3-3' => '4-3-3'), isset($lineup->mode) ? $lineup->mode : '4-2-3-1', array('class' => 'form-control')) !!}</div>
    </div>

    <hr>
    <div class="participants lineup" data-mode="@if(isset($lineup->mode)){{ $lineup->mode }}@else{{'4-2-3-1'}}@endif">
        <h3>Aufstellung</h3>

            @include('games.lineups.droppable.4-2-3-1', isset($lineup) ? array('lineup' => $lineup) : array())
            @include('games.lineups.droppable.4-3-3', isset($lineup) ? array('lineup' => $lineup) : array())

            @include('games.lineups.droppable.bench', isset($lineup) ? array('lineup' => $lineup) : array())
    </div>

    <hr>

    <!-- Submit -->
    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">{!! Form::submit('Schick\'s ab!', ['class'=>'btn btn-primary']) !!}</div>
    </div>
     {!! Form::close() !!}
@endsection
