<?php

namespace WienWest;

use Illuminate\Database\Eloquent\Model;

class Tryout extends Game
{
    protected $table = 'tryouts';

    protected $fillable = [
        'home',
        'opponent',
        'date',
        'start_time',
        'meeting_time',
        'location',
        'title',
        'description',
        'result',
        'user_id',
    ];

    public function participants() {
        return $this->belongsToMany('WienWest\Player');
    }

    public function ins() {
        return $this->belongsToMany('WienWest\Player')->withPivot('in')->wherePivot('in', 'in');
    }

    public function maybes() {
        return $this->belongsToMany('WienWest\Player')->withPivot('in')->wherePivot('in', 'maybe');
    }

    public function outs() {
        return $this->belongsToMany('WienWest\Player')->withPivot('in')->wherePivot('in', 'out');
    }

    public function replies() {
        return $this->morphMany('WienWest\Reply', 'repliable');
    }

    public function getType() {
        return 'WienWest\Tryout';
    }

    public function lineup() {
        return $this->morphOne('WienWest\Lineup', 'gameable');
    }
}
