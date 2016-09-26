<div class="row">
<div class="form-group col-md-12">
    {!! Form::label('title', 'Titel', array('class' => 'control-label')) !!}<br>
    {!! Form::text('title', isset($announcement->title) ? $announcement->title : null, array('class' => 'form-control')) !!}
</div>
<div class="form-group col-md-12">
    {!! Form::label('text', 'Text', array('class' => 'control-label')) !!}
    <div id="quill-text"></div>
    <span class="notice">Bitte Links immer inklusive http:// angeben, z.B. http://orf.at.</span>
    {!! Form::hidden('text', isset($announcement->text) ? $announcement->text : null, array('class' => 'form-control')) !!}
</div>
</div>