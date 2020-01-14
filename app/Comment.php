<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected  $table = 'comments';

    /**
     * define ralationship with users table
     * */
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * define ralationship with comment table to declared key
     * */
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

    /**
     * Instance for calculatng duration between two given time
     * @return array
     * */
    public function calcDuration()
    {

        $timestamp = Carbon::parse($this->created_at);
        $now = Carbon::parse(Carbon::now());
        $hours = $now->diffInHours($timestamp);
        $mins  = $now->diffInMinutes($timestamp);
        return ['hours' => $hours, 'minutes' => $mins];
    }
}
