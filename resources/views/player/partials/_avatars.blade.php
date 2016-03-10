<div class="avatar-cartoons">
    <div class="row">
        <div class="col-md-2 avatar"><img src="{{ asset('img/cartoons/messi.png') }}" alt="Messi" data-radio="avatar1"></div>
        <div class="col-md-2 avatar"><img src="{{ asset('img/cartoons/ronaldo.png') }}" alt="Ronaldo" data-radio="avatar2"></div>
        <div class="col-md-2 avatar"><img src="{{ asset('img/cartoons/ronaldinho.png') }}" alt="Ronaldinho" data-radio="avatar3"></div>
        <div class="col-md-2 avatar"><img src="{{ asset('img/cartoons/ribery.png') }}" alt="Ribery" data-radio="avatar4"></div>
        <div class="col-md-2 avatar"><img src="{{ asset('img/cartoons/bale.png') }}" alt="Bale" data-radio="avatar5"></div>
        <div class="col-md-2 avatar"><img src="{{ asset('img/cartoons/iniesta.png') }}" alt="Iniesta" data-radio="avatar6"></div>
    </div>
    <div class="row">
        <div class="col-md-2 avatar"><img src="{{ asset('img/cartoons/alonso.png') }}" alt="Alonso" data-radio="avatar7"></div>
        <div class="col-md-2 avatar"><img src="{{ asset('img/cartoons/ramos.png') }}" alt="Ramos" data-radio="avatar8"></div>
        <div class="col-md-2 avatar"><img src="{{ asset('img/cartoons/villa.png') }}" alt="Villa" data-radio="avatar9"></div>
        <div class="col-md-2 avatar"><img src="{{ asset('img/cartoons/xavi.png') }}" alt="Xavi" data-radio="avatar10"></div>
        <div class="col-md-2 avatar"><img src="{{ asset('img/cartoons/van_persie.png') }}" alt="Van Persie" data-radio="avatar11"></div>
        <div class="col-md-2 avatar"><img src="{{ asset('img/cartoons/schweinsteiger.png') }}" alt="Schweinsteiger" data-radio="avatar12"></div>
    </div>
    <div class="row">
        <div class="col-md-2 avatar"><img src="{{ asset('img/cartoons/balotelli.png') }}" alt="Balotelli" data-radio="avatar13"></div>
        <div class="col-md-2 avatar"><img src="{{ asset('img/cartoons/chicharito.png') }}" alt="Chicharito" data-radio="avatar14"></div>
        <div class="col-md-2 avatar"><img src="{{ asset('img/cartoons/de_gea.png') }}" alt="De Gea" data-radio="avatar15"></div>
        <div class="col-md-2 avatar"><img src="{{ asset('img/cartoons/gerrard.png') }}" alt="Gerrard" data-radio="avatar16"></div>
        <div class="col-md-2 avatar"><img src="{{ asset('img/cartoons/henry.png') }}" alt="Henry" data-radio="avatar17"></div>
        <div class="col-md-2 avatar"><img src="{{ asset('img/cartoons/rooney.png') }}" alt="Rooney" data-radio="avatar18"></div>
    </div>
    <div class="row">
        <div class="col-md-2 avatar"><img src="{{ asset('img/cartoons/kaka.png') }}" alt="Kaka" data-radio="avatar19"></div>
        <div class="col-md-2 avatar"><img src="{{ asset('img/cartoons/gomez.png') }}" alt="Gomez" data-radio="avatar20"></div>
        <div class="col-md-2 avatar"><img src="{{ asset('img/cartoons/tevez.png') }}" alt="Tevez" data-radio="avatar21"></div>
        <div class="col-md-2 avatar"><img src="{{ asset('img/cartoons/suarez.png') }}" alt="Suarez" data-radio="avatar22"></div>
    </div>
    <div class="avatar-radios">
        @for ($i = 1; $i <= 22; $i++)
            {!! Form::radio('avatar', '', false, array('data-avatar' => 'avatar'.$i)) !!}
        @endfor
    </div>
</div>