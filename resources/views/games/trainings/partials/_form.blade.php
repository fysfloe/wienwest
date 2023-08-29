<div class="form-group">
    {!! Form::label('recurring', 'Wiederkehrend', array('class' => 'col-md-4 control-label')) !!}
    <div class="col-md-6">{!! Form::checkbox('recurring', null, false) !!}</div>
</div>
<div class="form-group recurring-times">
    {!! Form::label('recurring_times', 'Wie viele Wochen?', array('class' => 'col-md-4 control-label')) !!}
    <div class="col-md-6">{!! Form::number('recurring_times', null, array('class' => 'form-control', 'min' => 1, 'max' => 15)) !!}</div>
</div>
<div class="form-group">
    {!! Form::label('date', 'Datum', array('class' => 'col-md-4 control-label')) !!}
    <div class="col-md-6">{!! Form::text('date', null, array('class' => 'form-control')) !!}</div>
</div>
<div class="form-group">
    {!! Form::label('start_time', 'Start', array('class' => 'col-md-4 control-label')) !!}
    <div class="col-md-6">{!! Form::text('start_time', null, array('class' => 'form-control')) !!}</div>
</div>
<div class="form-group">
    {!! Form::label('meeting_time', 'Treffpunkt', array('class' => 'col-md-4 control-label')) !!}
    <div class="col-md-6">{!! Form::text('meeting_time', null, array('class' => 'form-control')) !!}</div>
</div>
<div class="form-group">
    {!! Form::label('location', 'Ort', array('class' => 'col-md-4 control-label')) !!}
    <div class="col-md-6">{!! Form::text('location', 'Auf der Schmelz 10', array('class' => 'form-control', 'placeholder' => 'Tippst du ein...')) !!}</div>
</div>
<div class="form-group">
    {!! Form::label('title', 'Titel (optional)', array('class' => 'col-md-4 control-label')) !!}
    <div class="col-md-6">{!! Form::text('title', null, array('class' => 'form-control')) !!}</div>
</div>
<div class="form-group">
    {!! Form::label('description', 'Beschreibung (optional)', array('class' => 'col-md-4 control-label')) !!}
    <div class="col-md-6">{!! Form::textarea('description', null, array('class' => 'form-control')) !!}</div>
</div>