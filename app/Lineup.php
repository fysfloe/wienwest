<?php

namespace WienWest;

use Illuminate\Database\Eloquent\Model;

class Lineup extends Model
{
    protected $fillable = [
        'mode',
        'lineup',
        'gameable_id',
        'gameable_type'
    ];

    public function gameable() {
        return $this->morphTo();
    }
}