<?php

namespace App\Http\Controllers;

use App\Battle;
use App\Game;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    /**
     * instance for showing all the games in table form
     * @return view
     * */
    public function manage()
    {
        $games = Game::orderBy('created_at', 'decs')->with(['users'])->get();
        $battles = Battle::orderBy('created_at', 'decs')->with(['users',  'games'])->get();
        $users = User::all();
        return view('games.admin.index', compact('games', 'battles', 'users'));
    }



}
