<?php

namespace WienWest;

use Illuminate\Database\Eloquent\Model;

class ExerciseVariation extends Model
{
  protected $table = 'exercise_variations';

  protected $fillable = [
    'description',
    'duration',
    'outline',
    'exercise_id',
    'user_id',
  ];

  public function user() {
    return $this->belongsTo('WienWest\User');
  }

  public function exercise() {
    return $this->belongsTo('WienWest\Exercise');
  }
}
