<?php

namespace WienWest;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $table = 'announcements';

    protected $fillable = [
        'title',
        'text',
        'user_id',
    ];

    public function user() {
        return $this->belongsTo('WienWest\User');
    }

    public function replies() {
        return $this->morphMany('WienWest\Reply', 'repliable');
    }
}
