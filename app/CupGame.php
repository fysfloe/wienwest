<?php

namespace WienWest;

use Illuminate\Database\Eloquent\Model;

class CupGame extends Game
{
    protected $table = 'cup_games';

    protected $fillable = [
        'home',
        'opponent',
        'round',
        'date',
        'start_time',
        'meeting_time',
        'location',
        'title',
        'result',
        'description',
        'user_id',
    ];

    public function participants() {
        return $this->belongsToMany('WienWest\Player');
    }

    public function ins() {
        return $this->belongsToMany('WienWest\Player')->withPivot('in')->wherePivot('in', 'in')->orderBy('number');
    }

    public function maybes() {
        return $this->belongsToMany('WienWest\Player')->withPivot('in')->wherePivot('in', 'maybe')->orderBy('number');
    }

    public function outs() {
        return $this->belongsToMany('WienWest\Player')->withPivot('in')->wherePivot('in', 'out')->orderBy('number');
    }

    public function replies() {
        return $this->morphMany('WienWest\Reply', 'repliable');
    }

    public function getType() {
        return 'WienWest\CupGame';
    }

    public function lineup() {
        return $this->morphOne('WienWest\Lineup', 'gameable');
    }
}
