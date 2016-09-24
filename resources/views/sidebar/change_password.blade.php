<div class="change_password">
    @if (count($errors->password_change) > 0)
        <div class="alert alert-danger">
            <strong>Herst!</strong> Füll' das gfälligst richtig aus!<br><br>
            <ul>
                @foreach ($errors->password_change->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

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