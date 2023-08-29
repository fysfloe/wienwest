<div class="form-group">
    <div class="col-md-6 col-md-offset-4">{!! Form::checkbox('home', isset($game->home) && $game->home ? true : false, array('class' => 'form-control')) !!}</div>
</div>
<div class="form-group">
    {!! Form::label('round', 'Runde', array('class' => 'col-md-4 control-label')) !!}
    <div class="col-md-6">{!! Form::text('round', isset($game->round) ? $game->round : null, array('class' => 'form-control')) !!}</div>
</div>
<div class="form-group">
    {!! Form::label('opponent', 'Gegner', array('class' => 'col-md-4 control-label')) !!}
    <div class="col-md-6">{!! Form::text('opponent', isset($game->opponent) ? $game->opponent : null, array('class' => 'form-control')) !!}</div>
</div>
<div class="form-group">
    {!! Form::label('date', 'Datum', array('class' => 'col-md-4 control-label')) !!}
    <div class="col-md-6">{!! Form::text('date', isset($game->date) ? $game->date : null, array('class' => 'form-control')) !!}</div>
</div>
<div class="form-group">
    {!! Form::label('start_time', 'Anpfiff', array('class' => 'col-md-4 control-label')) !!}
    <div class="col-md-6">{!! Form::text('start_time', isset($game->start_time) ? $game->start_time : null, array('class' => 'form-control')) !!}</div>
</div>
<div class="form-group">
    {!! Form::label('meeting_time', 'Treffpunkt', array('class' => 'col-md-4 control-label')) !!}
    <div class="col-md-6">{!! Form::text('meeting_time', isset($game->meeting_time) ? $game->meeting_time : null, array('class' => 'form-control')) !!}</div>
</div>
<div class="form-group">
    {!! Form::label('location', 'Ort', array('class' => 'col-md-4 control-label')) !!}
    <div class="col-md-6">{!! Form::text('location', isset($game->location) ? $game->location : 'Auf der Schmelz 10', array('class' => 'form-control', 'placeholder' => 'Tippst du ein...')) !!}</div>
</div>
<div class="form-group">
    {!! Form::label('title', 'Titel (optional)', array('class' => 'col-md-4 control-label')) !!}
    <div class="col-md-6">{!! Form::text('title', isset($game->title) ? $game->title : null, array('class' => 'form-control')) !!}</div>
</div>
<div class="form-group">
    {!! Form::label('description', 'Beschreibung (optional)', array('class' => 'col-md-4 control-label')) !!}
    <div class="col-md-6">{!! Form::textarea('description', isset($game->description) ? $game->description : null, array('class' => 'form-control')) !!}</div>
</div>