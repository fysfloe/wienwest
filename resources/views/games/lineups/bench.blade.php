<hr>

<h4>Bank</h4>

<hr>

<div class="row bench">
    <div class="col-md-2">
        @if(isset($positions->sub1))
            <li class="col-md-12 " data-id="{{ $positions->sub1->id }}">

                <div class="row">
                    <div class="image">
                        <div class="circular" style="background-image:url({{ asset('img/cartoons') . '/' . $positions->sub1->avatar . '.png' }})"></div>
                    </div>
                    <div class="number">
                        <div class="big-number">{{ $positions->sub1->number }}</div>
                    </div>
                    <div class="name">
                        {{ $positions->sub1->firstname }} {{ $positions->sub1->surname }}
                    </div>
                </div>

            </li>
        @else
            <span class="question-mark">?</span>
        @endif
    </div>
    <div class="col-md-2">
        @if(isset($positions->sub2))
            <li class="col-md-12 " data-id="{{ $positions->sub2->id }}">

                <div class="row">
                    <div class="image">
                        <div class="circular" style="background-image:url({{ asset('img/cartoons') . '/' . $positions->sub2->avatar . '.png' }})"></div>
                    </div>
                    <div class="number">
                        <div class="big-number">{{ $positions->sub2->number }}</div>
                    </div>
                    <div class="name">
                        {{ $positions->sub2->firstname }} {{ $positions->sub2->surname }}
                    </div>
                </div>

            </li>
        @else
            <span class="question-mark">?</span>
        @endif
    </div>
    <div class="col-md-2">
        @if(isset($positions->sub3))
            <li class="col-md-12 " data-id="{{ $positions->sub3->id }}">

                <div class="row">
                    <div class="image">
                        <div class="circular" style="background-image:url({{ asset('img/cartoons') . '/' . $positions->sub3->avatar . '.png' }})"></div>
                    </div>
                    <div class="number">
                        <div class="big-number">{{ $positions->sub3->number }}</div>
                    </div>
                    <div class="name">
                        {{ $positions->sub3->firstname }} {{ $positions->sub3->surname }}
                    </div>
                </div>

            </li>
        @else
            <span class="question-mark">?</span>
        @endif
    </div>
    <div class="col-md-2">
        @if(isset($positions->sub4))
            <li class="col-md-12 " data-id="{{ $positions->sub4->id }}">

                <div class="row">
                    <div class="image">
                        <div class="circular" style="background-image:url({{ asset('img/cartoons') . '/' . $positions->sub4->avatar . '.png' }})"></div>
                    </div>
                    <div class="number">
                        <div class="big-number">{{ $positions->sub4->number }}</div>
                    </div>
                    <div class="name">
                        {{ $positions->sub4->firstname }} {{ $positions->sub4->surname }}
                    </div>
                </div>

            </li>
        @else
            <span class="question-mark">?</span>
        @endif
    </div>
    <div class="col-md-2">
        @if(isset($positions->sub5))
            <li class="col-md-12 " data-id="{{ $positions->sub5->id }}">

                <div class="row">
                    <div class="image">
                        <div class="circular" style="background-image:url({{ asset('img/cartoons') . '/' . $positions->sub5->avatar . '.png' }})"></div>
                    </div>
                    <div class="number">
                        <div class="big-number">{{ $positions->sub5->number }}</div>
                    </div>
                    <div class="name">
                        {{ $positions->sub5->firstname }} {{ $positions->sub5->surname }}
                    </div>
                </div>

            </li>
        @else
            <span class="question-mark">?</span>
        @endif
    </div>
</div>