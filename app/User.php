<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname', 'lname', 'username', 'email', 'password', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function Role()
    {
        return $this->hasOne('App\Role', 'id','role_id');
    }

    public function isAdmin()
    {
        if(Auth::user()->role_id == 1) return true;
        return false;
    }

    public function myGames()
    {
        return $this->hasMany('App\Game', 'publisher_id', 'id');
    }

    public function likes(){
        return $this->hasMany('App\Like');
    }
}
