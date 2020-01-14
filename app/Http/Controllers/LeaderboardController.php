<?php

namespace App\Http\Controllers;

use App\Battle;
use App\Player;
use Illuminate\Http\Request;
use App\Game;
use PhpParser\ErrorHandler\Collecting;

class LeaderboardController extends Controller
{
    /**
     * Instance for showing index page

     * */
    public function index()
    {
        // get highest score
        $battles = Battle::all()->toArray();
        // count array column with multiple values once
        $sortedWons = $this->countDecsArrayByColumn($battles, 'wonby', 3);

        $sortGames = $this->countDecsArrayByColumn($battles, 'gameid', 7);
        // create new array with games data and previous sorted data combined
        $sortedGames = $this->getCollectArrayCounterKeys($sortGames);

        $players = Player::all();
        $sortedScores = $this->sortArrayBuilder($players);
        //dd($sortedScores);
        return view('boards.index', compact('sortedWons', 'sortedScores', 'sortedGames'));
    }

    public function getCollectArrayCounterKeys($data)
    {
        $counter = 0;
        $collect = collect();
        foreach ($data as $key => $counted){
            $game = Game::find($key);
            if($game){
                $collect->put($counter, ['id' => $game->id, 'name' => $game->name, 'dor' => $game->dor, 'counted' =>  $counted]);
            }
            $counter++;
        }
        return $collect;
    }


    /**
     * Instance to sorting array based on given column
     * @return
     * */
    public function countDecsArrayByColumn($data, $column, $offset)
    {
        $countArray = array_count_values(array_column($data, $column));
        $collectCountArray = collect($countArray);
        return $collectCountArray->sort()->reverse()->slice(0 , $offset);
    }


    /**
     * Instance to creating and returning array to sort
     * @return $playersScores
     * */
    public function sortArrayBuilder($data)
    {
        $playersScores = [];
        foreach ($data as $key => $player){
            $decodedScores = json_decode($player->score);
            array_push($playersScores, ['username' => $player->username,'scores' => $decodedScores]);

        }
        // sort array based on scores array
        $sortScores = array_sort($playersScores, 'scores',SORT_DESC);
        // reverse sorted array from highes to lowest
        $sortedScores = collect($sortScores)->reverse()->take(3);
        return $sortedScores;
    }

}
