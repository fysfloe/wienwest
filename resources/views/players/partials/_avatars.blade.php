<div class="avatar-cartoons">
    <?php $i = 0 ?>
    <div class="row">
        @foreach($avatars as $avatar)
            @if($i % 6 == 0 && $i != 0) </div> @endif
            @if($i % 6 == 0 && $i != 0) <div class="row"> @endif
                <div class="col-md-2 avatar{{ isset($player->avatar) && $player->avatar == $avatar ? ' chosen' : '' }}"><img src="{{ asset('img/cartoons/'.$avatar.'.png') }}" alt="{{ $avatar }}" data-radio="avatar{{ $i }}"></div>
            <?php $i++ ?>
        @endforeach
    </div>
    <div class="avatar-radios">
        @for ($i = 0; $i < count($avatars); $i++)
            {!! Form::radio('avatar', isset($player->avatar) && $player->avatar == $avatars[$i] ? $avatars[$i] : '', isset($player->avatar) && $player->avatar == $avatars[$i] ? true : false, array('data-avatar' => 'avatar'.$i)) !!}
        @endfor
    </div>
</div>