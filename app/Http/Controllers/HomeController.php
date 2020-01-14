<?php

namespace App\Http\Controllers;

use App\Player;
use Ghanem\Rating\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Game;
use App\Battle;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userid = Auth::user()->id;
        //$games = Game::OrderBy('created_at', 'desc')->get();
        $myGames = Game::where('publisher_id', $userid)->OrderBy('created_at', 'desc')->get();
        $battles = Battle::where('publisher_id', $userid)->OrderBy('created_at', 'desc')->get();
        $wons = Battle::where('wonby', '=', Auth::user()->username)->get();
        $rates = Rating::where('user_id', Auth::user()->id)->get();

        return view('home', compact('myGames', 'battles', 'wons', 'rates'));
    }
}
