<li class="reply row {{ $reply->in }}">
    @if(Auth::user()->id == $reply->user_id)
        {!! Form::open(array('onsubmit' => 'return confirm("Willst du diese Antwort wirklich löschen?")', 'class' => 'form-inline', 'method' => 'DELETE', 'route' => array('replies.destroy', $reply->id))) !!}
        <button type="submit"><i class="fa fa-remove"></i></button>
        {!! Form::close() !!}
    @endif
    <div class="row flex">
        <div class="col-md-1">
            <div class="circular" style="background-image:url({{ asset('img/cartoons') . '/' . $reply->user()->first()->player()->first()->avatar . '.png' }})"></div>
        </div>
        <div class="col-md-2">
            <div class="username">{{ $reply->user->player->firstname }} {{ $reply->user->player->surname[0] }}.</div>
        </div>
        <div class="col-md-9">
            {!! nl2br($reply->content) !!}
        </div>
    </div>
    <div class="row created-at">
        <div class="col-md-12">
            <span>am</span> {{ date_format(new DateTime($reply->created_at), 'd.m.Y') }} <span>um</span> {{ date_format(new DateTime($reply->created_at), 'H:i') }}
        </div>
    </div>
</li>