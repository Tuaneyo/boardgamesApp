<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $table = 'battle_players';

    protected $fillable = [
        'username', 'account_id', 'score'
    ];
}
