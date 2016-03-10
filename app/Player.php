<?php

namespace WienWest;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = [
        'firstname',
        'surname',
        'number',
        'fav_soft_toy',
        'fav_position',
        'avatar',
        'user_id',
    ];

    public function trainings() {
        return $this->belongsToMany('WienWest\Training');
    }

    public function user() {
        return $this->belongsTo('WienWest\User');
    }
}
