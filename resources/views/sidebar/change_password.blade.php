<div class="change_password">
    <h4>Passwort ändern</h4>
    {!! Form::open(['method' => 'POST', 'url' => '/players/' . $player->id . '/change-password', 'class' => 'form-horizontal']) !!}

    {!! Form::label('old_password', 'Altes Passwort') !!}
    {!! Form::password('old_password', ['class'=>'form-control']) !!}

    {!! Form::label('changed_password', 'Neues Passwort') !!}
    {!! Form::password('changed_password', ['class'=>'form-control']) !!}

    {!! Form::label('changed_password_confirmation', 'Passwort bestätigen') !!}
    {!! Form::password('changed_password_confirmation', ['class'=>'form-control']) !!}

    {!! Form::submit('Passwort ändern', array('class' => 'btn btn-default')) !!}

    {!! Form::close() !!}
</div>