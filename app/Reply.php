<?php

namespace WienWest;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $table = 'replies';

    protected $fillable = [
        'in',
        'content',
        'user_id',
        'repliable_id',
        'repliable_type',
    ];

    /**
     * Get all of the owning repliable models.
     */
    public function repliable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo('WienWest\User');
    }
}
