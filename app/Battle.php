<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Battle extends Model
{
    protected $table = 'battles';

    protected $fillable = [
        'dtPlayed', 'gameid', 'wonby', 'battle_players_id', 'publisher_id'
    ];

    public function games()
    {
        return $this->hasOne('App\Game', 'id', 'gameid');
    }

    public function users()
    {
        return $this->hasOne('App\User', 'id', 'publisher_id');
    }

    public function isPermitted()
    {
        $myBattle = $this->where('publisher_id', '=', Auth::user()->id)->first();
        if($myBattle){
            return true;
        }
        return false;
    }

}
