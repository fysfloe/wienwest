<div class="avatar-cartoons">
    <?php $i = 0 ?>
    <div class="row">
        @foreach($avatars as $avatar)
            @if($i % 6 == 0 && $i != 0) </div> @endif
            @if($i % 6 == 0 && $i != 0) <div class="row"> @endif
                <div class="circular avatar{{ isset($player->avatar) && $player->avatar == $avatar ? ' chosen' : '' }}" style="background-image: url({{ asset('img/cartoons/'.$avatar.'.png') }})" data-radio="avatar{{ $i }}" data-alt="{{ $avatar }}"></div>
            <?php $i++ ?>
        @endforeach
    </div>
    <div class="avatar-radios">
        @for ($i = 0; $i < count($avatars); $i++)
            {!! Form::radio('avatar', isset($player->avatar) && $player->avatar == $avatars[$i] ? $avatars[$i] : '', isset($player->avatar) && $player->avatar == $avatars[$i] ? true : false, array('data-avatar' => 'avatar'.$i)) !!}
        @endfor
    </div>
</div>