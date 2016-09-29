<footer role="contentinfo">
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <h4>Sinnvolle Links</h4>
                    <ul>
                        <li><a href="{{ route('league_games.index') }}">Meisterschaftsspiele</a></li>
                        <li><a href="{{ route('cup_games.index') }}">Cupspiele</a></li>
                        <li><a href="{{ route('tryouts.index') }}">Testspiele</a></li>
                        <li><a href="{{ route('trainings.index') }}">Trainings</a></li>
                        <li><a href="{{ route('players.index') }}">Spieler</a></li>
                        <li><a href="{{ route('announcements.index') }}">Ankündigungen</a></li>
                        <!--<li><a href="{{ url('contact') }}">Kontakt</a></li>
                        <li><a href="{{ url('imprint') }}">Impressum</a></li>-->
                    </ul>
                </div>
                <div class="col-md-4">
                    <h4>Anregungen</h4>
                    <p>
                        Diese App ist großartig! Trotzdem gibt's natürlich immer etwas zu verbessern. Meistens fällt das aber erst im laufenden Betrieb auf. Scheut euch deshalb nicht, mir sofort zu schreiben, wenn etwas gar nicht oder nicht so funktioniert, wie ihr es erwartet habt.
                    </p>
                    <p>
                        Natürlich kann dieses Formular auch dazu genutzt werden, um mir zu sagen, wie toll ich bin oder um neue (bestenfalls realistische) Ideen für die App einzubringen.
                    </p>
                </div>
                <div class="col-md-5 col-md-offset-1 contact-form">
                    @if (isset($errors) && count($errors->contact) > 0)
                        <div class="alert alert-danger">
                            <strong>Herst!</strong> Füll' das gfälligst richtig aus!<br><br>
                            <ul>
                                @foreach ($errors->contact->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <h4>Schreibt's ma wos</h4>
                    {!! Form::open(['method' => 'POST', 'url' => 'contactform', 'class' => 'form-horizontal']) !!}
                    <div class="row">
                        <div class="col-md-6">
                            {!! Form::label('contact-name', 'Name') !!}
                            {!! Form::text('contact-name', null, array('class' => 'form-control')) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Form::label('contact-email', 'E-Mail') !!}
                            {!! Form::email('contact-email', null, array('class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            {!! Form::label('contact-message', 'Nachricht') !!}
                            {!! Form::textarea('contact-message', null, array('class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            {!! Form::submit('Schick\'s ab!', array('class' => 'btn btn-default')) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        &copy; Florian Csizmazia | 2016
    </div>
</footer>