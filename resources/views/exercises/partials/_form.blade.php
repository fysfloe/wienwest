<div class="row">
<div class="form-group col-md-12">
    {!! Form::label('title', 'Titel', array('class' => 'control-label')) !!}<br>
    {!! Form::text('title', isset($exercise->title) ? $exercise->title : null, array('class' => 'form-control')) !!}
</div>
<div class="form-group col-md-12">
    {!! Form::label('description', 'Beschreibung', array('class' => 'control-label')) !!}
    <div id="quill-text" data-field="#description"></div>
    <span class="notice">Bitte Links immer inklusive http:// angeben, z.B. http://orf.at.</span>
    {!! Form::hidden('description', isset($exercise->description) ? $exercise->description : null, array('class' => 'form-control')) !!}
</div>
<div class="form-group col-md-12">
    {!! Form::label('duration', 'Dauer (in min.)', array('class' => 'control-label')) !!}
    {!! Form::number('duration', isset($exercise->duration) ? $exercise->duration : null, array('class' => 'form-control')) !!}
</div>
</div>
