<?php

namespace WienWest;

use Illuminate\Database\Eloquent\Model;

class ExerciseCategory extends Model
{
  protected $table = 'exercise_categories';

  protected $fillable = [
    'name',
    'slug',
    'user_id',
  ];

  public function user() {
    return $this->belongsTo('WienWest\User');
  }

  public function exercises() {
    return $this->belongsToMany('WienWest\Exercise');
  }
}
