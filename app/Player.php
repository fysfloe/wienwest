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

    public function league_games() {
        return $this->belongsToMany('WienWest\LeagueGame');
    }

    public function cup_games() {
        return $this->belongsToMany('WienWest\CupGame');
    }

    public function tryouts() {
        return $this->belongsToMany('WienWest\Tryout');
    }

    public function trainings_past() {
        return $this->belongsToMany('WienWest\Training')->where('in', 'in')->where('date', '<', date('Y-m-d'));
    }

    public function league_games_past() {
        return $this->belongsToMany('WienWest\LeagueGame')->where('in', 'in')->where('date', '<', date('Y-m-d'));
    }

    public function tryouts_past() {
        return $this->belongsToMany('WienWest\Tryout')->where('in', 'in')->where('date', '<', date('Y-m-d'));
    }

    public function user() {
        return $this->belongsTo('WienWest\User');
    }

    public function replies() {
        return $this->hasManyThrough('WienWest\Reply', 'WienWest\User');
    }

    public function league_games_count() {
        $this->games_count = $this->league_games()->where('in', 'in')->where('date', '<', date('Y-m-d'))->count();
        return $this;
    }

    public function tryouts_count() {
        $this->games_count = $this->tryouts()->where('in', 'in')->where('date', '<', date('Y-m-d'))->count();
        return $this;
    }

    public function cup_games_count() {
        $this->games_count = $this->cup_games()->where('in', 'in')->where('date', '<', date('Y-m-d'))->count();
        return $this;
    }

    public function trainings_count() {
        $this->games_count = $this->trainings()->where('in', 'in')->where('date', '<', date('Y-m-d'))->count();
        return $this;
    }
}