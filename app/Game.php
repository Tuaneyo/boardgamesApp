<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use willvincent\Rateable\Rateable;
use Illuminate\Support\Facades\Auth;

class Game extends Model
{
    use Rateable;
    protected $table = 'games';

    protected $fillable = [
      'name', 'nop', 'dor', 'publisher_id', 'duration', 'description', 'image'
    ];

    public static $rules = [
      'name' => 'required',
      'nop' => 'required|numeric|min:2',
      'dor' => 'required',
      'duration' => 'required',
      'description' => 'required',
      'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    ];

    /**
     * define ralationship with users table
     * */
    public function users()
    {
        return $this->belongsTo('App\User', 'publisher_id','id');
    }

    /**
     * define ralationship with battle table
     * */
    public function games()
    {
        return $this->hasMany('App\Battle', 'gameid', 'id');
    }

    /**
     * define ralationship with rates table
     * */
    public function rates()
    {
        return $this->hasMany('App\Rating','rateable_id', 'id');
    }

    /**
     * instande for returning sorted games
     * @var $id the id of the game
     * @return $games
     * */
    public function bestRatedGame($sAverage)
    {
        $games = [];
        foreach($sAverage as $x => $x_value) {
            $game = $this->find($sAverage[$x]['gameid']);
            if($game) array_push($games, $game);
        }
        return $games;

    }
    /**
     * define ralationship with comments table
     * */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id');
    }




}
