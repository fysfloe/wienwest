<div class="other-announcements">
    <h4>Andere Ankündigungen</h4>
    @foreach($other_announcements as $announcement)
        <li class="row announcement">
            <a href="{{ route('announcements.show', $announcement->id) }}">
                    <div class="row">
                        <div class="col-md-12">
                            <h5>{{ $announcement->title }}</h5>
                        </div>
                    </div>
                    <div class="row created-at">
                        <div class="col-md-12">
                            <span>am</span> {{ date_format(new DateTime($announcement->created_at), 'd.m.Y') }} <span>um</span> {{ date_format(new DateTime($announcement->created_at), 'H:i') }}
                        </div>
                    </div>
            </a>
        </li>
    @endforeach
</div>