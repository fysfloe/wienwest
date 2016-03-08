<?php

namespace WienWest;

use Illuminate\Database\Eloquent\Model;

class Tryout extends Game
{
    protected $table = 'tryouts';

    protected $fillable = [
        'home',
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
