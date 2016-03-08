<?php

namespace WienWest;

use Illuminate\Database\Eloquent\Model;

class LeagueGame extends Game
{
    protected $table = 'league_games';

    protected $fillable = [
        'home',
        'date',
        'start_time',
        'meeting_time',
        'location',
        'title',
        'description',
        'lineup',
    ];

    public function participants() {
        return $this->hasMany('WienWest\Player');
    }
}
