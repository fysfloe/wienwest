<?php

namespace WienWest;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
  protected $table = 'exercises';

  protected $fillable = [
    'title',
    'description',
    'duration',
    'outline',
    'user_id',
  ];

  public function user() {
    return $this->belongsTo('WienWest\User');
  }

  public function categories() {
    return $this->belongsToMany('WienWest\ExerciseCategory');
  }

  public function variations() {
    return $this->hasMany('WienWest\ExerciseVariation');
  }

  public function replies() {
    return $this->morphMany('WienWest\Reply', 'repliable');
  }
}
