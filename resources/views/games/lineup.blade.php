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

    {!! Form::model(new WienWest\Lineup, ['route' => ['league_games.lineup.save', $game_id], 'class' => 'form-horizontal']) !!}
    <div class="form-group">
        {!! Form::label('mode', 'Modus', array('class' => 'col-md-4 control-label')) !!}
        <div class="col-md-6">{!! Form::select('mode', array('' => 'Auswählen', '4-2-3-1' => '4-2-3-1', '4-3-3' => '4-3-3'), array('class' => 'form-control')) !!}</div>
    </div>

    <hr>
    <div class="participants lineup">
        <h3>Aufstellung</h3>

        @if(isset($lineup))
            @include('games.lineups.droppable.'.$lineup->mode, array('lineup' => $lineup->lineup))
        @elseif(isset($lineup_ajax))
            @include('games.lineups.droppable.'.$lineup_ajax)
        @endif

        <hr>

        <h4>Bank</h4>

        <hr>

        <div class="row">
            <div class="col-md-3">
                <div class="droppable">
                    <span class="position">Sub1</span>
                    {!! Form::hidden('positions[sub1]', isset($lineup->sub1) ? $lineup->sub1 : null) !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="droppable">
                    <span class="position">Sub2</span>
                    {!! Form::hidden('positions[sub2]', isset($lineup->sub2) ? $lineup->sub2 : null) !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="droppable">
                    <span class="position">Sub3</span>
                    {!! Form::hidden('positions[sub3]', isset($lineup->sub3) ? $lineup->sub3 : null) !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="droppable">
                    <span class="position">Sub4</span>
                    {!! Form::hidden('positions[sub4]', isset($lineup->sub4) ? $lineup->sub4 : null) !!}
                </div>
            </div>
        </div>
    </div>

    <hr>

    <!-- Submit -->
    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">{!! Form::submit('Schick\'s ab!', ['class'=>'btn btn-primary']) !!}</div>
    </div>
     {!! Form::close() !!}
@endsection
