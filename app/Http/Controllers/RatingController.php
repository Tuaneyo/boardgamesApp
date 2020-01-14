<?php

namespace App\Http\Controllers;

use App\Game;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    /**
     * Instance for rating game
     * @var $id the id of the game
     * @return redirect
     * */
    public function postRate(Request $request)
    {
        //dd($request->all());
        $game = Game::find($request->gameid);
        $userid = auth()->user()->id;
        $rating = $game->ratings()->where('user_id', '=' ,auth()->user()->id)->first();
        // check if rating exist
        if(is_null($rating)){
            $rating = new \willvincent\Rateable\Rating;
            $rating->rating = $request->rate;
            $rating->user_id = $userid;
            $game->ratings()->save($rating);
            return redirect()->back()->with('status', "Thanks, you gave this game $request->rate star");
        }
        else{
            $rating->rating = $request->rate;
            $rating->user_id = $userid;
            $game->ratings()->save($rating);
            return redirect()->back()->with("status","Changed rating this game to  $request->rate star");
        }

    }
}
