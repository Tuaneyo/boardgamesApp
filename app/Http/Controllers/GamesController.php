<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Game;
use Illuminate\Http\Request;
use Faker\Provider\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Rating;
use PhpParser\ErrorHandler\Collecting;

class GamesController extends Controller
{
    /**
     * Instance making sure user is loged in
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    /**
      * Instance for showing al the added games

    * */
    public function index()
    {
        //Game::orderBy('created_at', 'DESC')->with(['users'])->get();
        $games = Game::orderBy('created_at', 'DESC')->with(['users'])->get();
        $myGames = countArrayValues($games->toArray(), Auth::user()->id);
        return view('games.index', compact('games', 'myGames'));
    }


    /**
     * Instance for showing al the chosen game
     * @var $id the id of the game
     * @return view
     * */
    public function show($id)
    {

        $game = Game::where('id', '=', $id)->with(['users', 'rates'])->first();
        if($game){
            $ratings = Rating::where('rateable_id', '=', $game->id)->get();
            $rated = $this->checkIfRated($ratings);
            // Sort games based on average rating
            $allGames = Game::all();
            $gamesArr = collect();

            foreach ($allGames as $key => $sGame){
                $gamesArr->put($key, ['gameid' => $sGame->id, 'average' => $sGame->averageRating]);
            }
            $sortedAverage = $gamesArr->sortByDesc('average')->splice(0, 4);
            $sortedAGames = $game->bestRatedGame($sortedAverage);
            //dd($sortedAGames);
            return view('games.show', compact('game', 'ratings', 'sortedAGames', 'rated', 'comments'));
        }

        return Redirect()->to('/games')->with('info', 'Game can\'t be find');
    }

    /**
     * Instance for checking if current use rated before
     * @var $ratings all rating of chosen game
     * @return $rated
     * */
    public function checkIfRated($ratings)
    {
        $rated = false;
        foreach ($ratings as $key => $rating){
            if($rating->user_id == Auth::user()->id){
                $rated = $rating->rating;
            }
        }
        return $rated;

    }

    /**
     * create function to show game create page
     * */
    public function create()
    {
        return view('games.create');
    }

    /**
     * instance for saving the games data
     * @var $request to get all post values
     * @return Redirect
     */
    public function store(Request $request)
    {
        $inputs = array_merge($request->all(), ['publisher_id' => Auth::user()->id]);
        $request->validate(Game::$rules);
        if ($request->hasFile('image')) {
            $imageName = $this::moveFileToPath($request->image);
            $inputs['image'] = $imageName;
        }
        // change ld input image value to new value

        Game::create($inputs);
        return Redirect()->to('games')->with('status', 'Your game has ben added');
    }

    /**
     * create function to show game edit page
     * @var $id the id of chosen game
     * @return view
     * */
    public function edit($id)
    {
        // Check user permission to edit game
        $game = Game::where('id', '=', $id)->with(['users'])->first();
        if($game){
            if(Auth::user()->isAdmin()){
                return view('games.edit', compact('game'));
            }else{
                if($game->publisher_id == Auth::user()->id){
                    return view('games.edit', compact('game'));
                }
            }
        }

        return Redirect()->to('games')->with('danger', 'You got no permission to edit this game. It\'s not your game. ');
    }

    /**
     * create function to update game
     * @var $id the id of chosen game
     * @var $request to get all post values
     * @return Redirect
     * */
    public function update(Request $request, $id)
    {
        $game = Game::where('id', '=', $id)->with(['users'])->first();
        $inputs = $request->all();
        $request->validate(Game::$rules);
        if($request->hasFile('image')){
            $imageName = $this::moveFileToPath($request->image);
            $filename = public_path().'/images/games/'.$game->image;
            \File::delete($filename);
            $inputs['image'] = $imageName;
        }

        $game->update($inputs);
        return Redirect()->to("games")->with('status', 'Congratz! game has been updated');

    }

    /**
     * create function to delete game
     * @var $id the id of chosen game
     * @return Redirect
     * */
    public function destroy($id)
    {
        $game = Game::FindOrFail($id);
        $game->delete();
        return Redirect()->to('games/')->with('status', 'Your game is successfully deleted');
    }
    /**
     * create function to move upload file to path
     * @var $image the value of file
     * @return $imageNamee
     * */
    public function moveFileToPath($image)
    {
        $imageName = time() . '-'. $image->getClientOriginalName();
        $directory = '/images/games';
        // move file to public path images/games
        $image->move(public_path().$directory, $imageName);
        return $imageName;
    }


}
