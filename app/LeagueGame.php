<?php

namespace WienWest;

use Illuminate\Database\Eloquent\Model;

class LeagueGame extends Game
{
    protected $table = 'league_games';

    protected $fillable = [
        'home',
        'opponent',
        'date',
        'start_time',
        'meeting_time',
        'location',
        'title',
        'description',
        'lineup',
        'user_id',
    ];

    public function participants() {
        return $this->hasMany('WienWest\Player');
    }

    public function replies() {
        return $this->morphMany('WienWest\Reply', 'repliable');
    }
}
