<?php

namespace WienWest;

use Illuminate\Database\Eloquent\Model;

class Training extends Game
{
    protected $table = 'trainings';

    protected $fillable = [
        'date',
        'start_time',
        'meeting_time',
        'location',
        'title',
        'description'
    ];

    public function participants() {
        return $this->hasMany('WienWest\Player');
    }
}
