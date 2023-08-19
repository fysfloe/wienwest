<div class="form-group">
    {!! Form::label('firstname', 'Vorname', array('class' => 'col-md-4 control-label')) !!}
    <div class="col-md-6">{!! Form::text('firstname', isset($player->firstname) ? $player->firstname : null, array('class' => 'form-control')) !!}</div>
</div>
<div class="form-group">
    {!! Form::label('surname', 'Nachname', array('class' => 'col-md-4 control-label')) !!}
    <div class="col-md-6">{!! Form::text('surname', isset($player->surname) ? $player->surname : null, array('class' => 'form-control')) !!}</div>
</div>
<div class="form-group">
    {!! Form::label('number', 'Rückennummer', array('class' => 'col-md-4 control-label')) !!}
    <div class="col-md-6">{!! Form::text('number', isset($player->number) ? $player->number : null, array('class' => 'form-control')) !!}</div>
</div>
<div class="form-group">
    {!! Form::label('fav_position', 'Lieblingsposition', array('class' => 'col-md-4 control-label')) !!}
    <div class="col-md-6">{!! Form::text('fav_position', isset($player->fav_position) ? $player->fav_position : null, array('class' => 'form-control')) !!}</div>
</div>
<div class="form-group">
    {!! Form::label('fav_soft_toy', 'Lieblingskuscheltier', array('class' => 'col-md-4 control-label')) !!}
    <div class="col-md-6">{!! Form::text('fav_soft_toy', isset($player->fav_soft_toy) ? $player->fav_soft_toy : null, array('class' => 'form-control')) !!}</div>
</div>