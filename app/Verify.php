<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Verify extends Model
{
    protected $table = 'verify';

    protected $fillable = [
      'email', 'username', 'hash'
    ];


}
