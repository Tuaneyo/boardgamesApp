<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use App\Game;
use App\Battle;
use App\User;

class UserController extends Controller
{

    /**
     * instance for showing all produtc of the user
     * @return view
     * */
    public function manage()
    {
        $userid = Auth::user()->id;
        $games = Game::where('publisher_id',$userid )->orderBy('created_at', 'decs')->with(['users'])->get();
        $battles = Battle::where('publisher_id',$userid )->orderBy('created_at', 'decs')->with(['users',  'games'])->get();
        $users = User::where('id', $userid)->get();

        return view('games.admin.index', compact('games', 'battles', 'users'));
    }
}
