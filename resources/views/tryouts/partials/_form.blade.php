<div class="form-group">
    <div class="col-md-6 col-md-offset-4">{!! Form::checkbox('home', null, array('class' => 'form-control')) !!}</div>
</div>
<div class="form-group">
    {!! Form::label('opponent', 'Gegner', array('class' => 'col-md-4 control-label')) !!}
    <div class="col-md-6">{!! Form::text('opponent', null, array('class' => 'form-control')) !!}</div>
</div>
<div class="form-group">
    {!! Form::label('date', 'Datum', array('class' => 'col-md-4 control-label')) !!}
    <div class="col-md-6">{!! Form::text('date', null, array('class' => 'form-control')) !!}</div>
</div>
<div class="form-group">
    {!! Form::label('start_time', 'Anpfiff', array('class' => 'col-md-4 control-label')) !!}
    <div class="col-md-6">{!! Form::text('start_time', null, array('class' => 'form-control')) !!}</div>
</div>
<div class="form-group">
    {!! Form::label('meeting_time', 'Treffpunkt', array('class' => 'col-md-4 control-label')) !!}
    <div class="col-md-6">{!! Form::text('meeting_time', null, array('class' => 'form-control')) !!}</div>
</div>
<div class="form-group">
    {!! Form::label('location', 'Ort', array('class' => 'col-md-4 control-label')) !!}
    <div class="col-md-6">{!! Form::text('location', 'ASV 13 Platz', array('class' => 'form-control')) !!}</div>
</div>
<div class="form-group">
    {!! Form::label('title', 'Titel (optional)', array('class' => 'col-md-4 control-label')) !!}
    <div class="col-md-6">{!! Form::text('title', null, array('class' => 'form-control')) !!}</div>
</div>
<div class="form-group">
    {!! Form::label('description', 'Beschreibung (optional)', array('class' => 'col-md-4 control-label')) !!}
    <div class="col-md-6">{!! Form::textarea('description', null, array('class' => 'form-control')) !!}</div>
</div>