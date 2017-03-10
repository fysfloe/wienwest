<div class="participants lineup 3-4-1-2">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="col-md-4 col-md-offset-2">
                @if(isset($positions->ls))
                <li class="col-md-12 " data-id="{{ $positions->ls->id }}">

                    <div class="row">
                        <div class="image">
                            <div class="circular" style="background-image:url({{ asset('img/cartoons') . '/' . $positions->ls->avatar . '.png' }})"></div>
                        </div>
                        <div class="number">
                            <div class="big-number">{{ $positions->ls->number }}</div>
                        </div>
                        <div class="name">
                            {{ $positions->ls->firstname }} {{ $positions->ls->surname }}
                        </div>
                    </div>

                </li>
                @else
                    <span class="question-mark">?</span>
                @endif
            </div>
            <div class="col-md-4">
                @if(isset($positions->rs))
                    <li class="col-md-12 " data-id="{{ $positions->rs->id }}">

                        <div class="row">
                            <div class="image">
                                <div class="circular" style="background-image:url({{ asset('img/cartoons') . '/' . $positions->rs->avatar . '.png' }})"></div>
                            </div>
                            <div class="number">
                                <div class="big-number">{{ $positions->rs->number }}</div>
                            </div>
                            <div class="name">
                                {{ $positions->rs->firstname }} {{ $positions->rs->surname }}
                            </div>
                        </div>

                    </li>
                @else
                    <span class="question-mark">?</span>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="col-md-offset-4 col-md-4">
                @if(isset($positions->zom))
                <li class="col-md-12 " data-id="{{ $positions->zom->id }}">

                    <div class="row">
                        <div class="image">
                            <div class="circular" style="background-image:url({{ asset('img/cartoons') . '/' . $positions->zom->avatar . '.png' }})"></div>
                        </div>
                        <div class="number">
                            <div class="big-number">{{ $positions->zom->number }}</div>
                        </div>
                        <div class="name">
                            {{ $positions->zom->firstname }} {{ $positions->zom->surname }}
                        </div>
                    </div>

                </li>
                @else
                    <span class="question-mark">?</span>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-3">
                @if(isset($positions->lm))
                <li class="col-md-12 " data-id="{{ $positions->lm->id }}">

                    <div class="row">
                        <div class="image">
                            <div class="circular" style="background-image:url({{ asset('img/cartoons') . '/' . $positions->lm->avatar . '.png' }})"></div>
                        </div>
                        <div class="number">
                            <div class="big-number">{{ $positions->lm->number }}</div>
                        </div>
                        <div class="name">
                            {{ $positions->lm->firstname }} {{ $positions->lm->surname }}
                        </div>
                    </div>

                </li>
                @else
                    <span class="question-mark">?</span>
                @endif
            </div>
            <div class="col-md-3 back">
                @if(isset($positions->ldm))
                <li class="col-md-12 " data-id="{{ $positions->ldm->id }}">

                    <div class="row">
                        <div class="image">
                            <div class="circular" style="background-image:url({{ asset('img/cartoons') . '/' . $positions->ldm->avatar . '.png' }})"></div>
                        </div>
                        <div class="number">
                            <div class="big-number">{{ $positions->ldm->number }}</div>
                        </div>
                        <div class="name">
                            {{ $positions->ldm->firstname }} {{ $positions->ldm->surname }}
                        </div>
                    </div>

                </li>
                @else
                    <span class="question-mark">?</span>
                @endif
            </div>
            <div class="col-md-3 back">
                @if(isset($positions->rdm))
                <li class="col-md-12 " data-id="{{ $positions->rdm->id }}">

                    <div class="row">
                        <div class="image">
                            <div class="circular" style="background-image:url({{ asset('img/cartoons') . '/' . $positions->rdm->avatar . '.png' }})"></div>
                        </div>
                        <div class="number">
                            <div class="big-number">{{ $positions->rdm->number }}</div>
                        </div>
                        <div class="name">
                            {{ $positions->rdm->firstname }} {{ $positions->rdm->surname }}
                        </div>
                    </div>

                </li>
                @else
                    <span class="question-mark">?</span>
                @endif
            </div>
            <div class="col-md-3">
                @if(isset($positions->rm))
                <li class="col-md-12 " data-id="{{ $positions->rm->id }}">

                    <div class="row">
                        <div class="image">
                            <div class="circular" style="background-image:url({{ asset('img/cartoons') . '/' . $positions->rm->avatar . '.png' }})"></div>
                        </div>
                        <div class="number">
                            <div class="big-number">{{ $positions->rm->number }}</div>
                        </div>
                        <div class="name">
                            {{ $positions->rm->firstname }} {{ $positions->rm->surname }}
                        </div>
                    </div>

                </li>
                @else
                    <span class="question-mark">?</span>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="col-md-4">
            @if(isset($positions->liv))
            <li class="col-md-12 " data-id="{{ $positions->liv->id }}">

                <div class="row">
                    <div class="image">
                        <div class="circular" style="background-image:url({{ asset('img/cartoons') . '/' . $positions->liv->avatar . '.png' }})"></div>
                    </div>
                    <div class="number">
                        <div class="big-number">{{ $positions->liv->number }}</div>
                    </div>
                    <div class="name">
                        {{ $positions->liv->firstname }} {{ $positions->liv->surname }}
                    </div>
                </div>

            </li>
            @else
                <span class="question-mark">?</span>
            @endif
        </div>
        <div class="col-md-4">
            @if(isset($positions->iv))
            <li class="col-md-12 " data-id="{{ $positions->iv->id }}">

                <div class="row">
                    <div class="image">
                        <div class="circular" style="background-image:url({{ asset('img/cartoons') . '/' . $positions->iv->avatar . '.png' }})"></div>
                    </div>
                    <div class="number">
                        <div class="big-number">{{ $positions->iv->number }}</div>
                    </div>
                    <div class="name">
                        {{ $positions->iv->firstname }} {{ $positions->iv->surname }}
                    </div>
                </div>

            </li>
            @else
                <span class="question-mark">?</span>
            @endif
        </div>
        <div class="col-md-4">
            @if(isset($positions->riv))
            <li class="col-md-12 " data-id="{{ $positions->riv->id }}">

                <div class="row">
                    <div class="image">
                        <div class="circular" style="background-image:url({{ asset('img/cartoons') . '/' . $positions->riv->avatar . '.png' }})"></div>
                    </div>
                    <div class="number">
                        <div class="big-number">{{ $positions->riv->number }}</div>
                    </div>
                    <div class="name">
                        {{ $positions->riv->firstname }} {{ $positions->riv->surname }}
                    </div>
                </div>

            </li>
            @else
                <span class="question-mark">?</span>
            @endif
        </div>
      </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="col-md-4 col-md-offset-4">
                @if(isset($positions->tw))
                <li class="col-md-12 " data-id="{{ $positions->tw->id }}">

                    <div class="row">
                        <div class="image">
                            <div class="circular" style="background-image:url({{ asset('img/cartoons') . '/' . $positions->tw->avatar . '.png' }})"></div>
                        </div>
                        <div class="number">
                            <div class="big-number">{{ $positions->tw->number }}</div>
                        </div>
                        <div class="name">
                            {{ $positions->tw->firstname }} {{ $positions->tw->surname }}
                        </div>
                    </div>

                </li>
                @else
                    <span class="question-mark">?</span>
                @endif
            </div>
        </div>
    </div>
</div>
