<?php

namespace App\Http\Controllers;

use App\Battle;
use App\Verify;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Game;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Validator;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Player;

class BattlesController extends Controller
{
    /**
     * instance for showing the battle page
     * @return view
     * */
    public function index()
    {
        $battles = Battle::orderBy('created_at', 'desc')->with(['games', 'users'])->get();
        $myBattles = Battle::where('publisher_id', '=', Auth::user()->id)->orderBy('created_at', 'decs')->get();

        return view('battles.index', compact('battles', 'myBattles'));
    }

    /**
     * instance for showing the battle detail page
     * @return view
     * */
    public function show($id)
    {
        $battleArr = $this->handleBattles($id);

        if($battleArr){
            $battle =  $battleArr['battle'];
            $players = $battleArr['players'];
            $datePlayed = new Carbon(($battle->dtPlayed) ? $battle->dtPlayed : $battle->created_at);
            return view('battles.show', compact('battle','players', 'datePlayed'));
        }
        return Redirect()->to('/games')->with('info', 'something went horrible wrong eventhought with cascade delete on games. what i can\'t inmagine');
    }

    /**
     * instance for showing page to edit battle
     * @return view
     * */
    public function edit($id)
    {
        $battleArr = $this->handleBattles($id);
        if($battleArr){
            $battle =  $battleArr['battle'];
            $players = $battleArr['players'];
            if(Auth::user()->isAdmin()){
                return view('battles.edit', compact('battle','players'));
            }else{
                if($battle->publisher_id == Auth::user()->id){
                    return view('battles.edit', compact('battle','players'));
                }

                return Redirect()->to('battles')->with('danger', 'You got no permission to edit this battle ');
            }
        }

        return Redirect()->to('/battles')->with('danger', 'something went wrong. this battle does not exist anymore.');

    }

    /**
     * create function to update battle
     * @var $id the id of chosen battle
     * @var $request to get all post values
     * @return Redirect
     * */

    public function update(Request $request, $id)
    {

        $battleArr = $this->handleBattles($id);
        foreach($battleArr['players'] as $i => $player){
            $scores = json_encode($request->score[$i]);
            $battlePlayer = Player::find($player->id);
            $battlePlayer->score = $scores;
            $battlePlayer->save();
        }
        $request->validate([
            'wonby' => "required"
        ]);
        $battleArr['battle']->update($request->all());

        return Redirect()->to("/battles")->with('status', 'Congratz! battle has been updated');

    }

    /**
     * instance for handle battles request
     * */

    public function handleBattles($id)
    {
        $battleArr = [];
        $battle = Battle::where([['id', $id]])->with(['games', 'users'])->first();
        if($battle){
            $battleArr['battle'] = $battle;
            $battleArr['players'] = Player::findMany(json_decode($battle->battle_players_id));
            return $battleArr;
        }
        return false;
    }


    /**
     * instance for showing the step 1 battle form
     * @var $request
     * @return view
     * */
    public function createStep1(Request $request)
    {
        $uri =  $request->path();
        // steps number
        $active = $this->getUriStepInt($uri);
        // all games
        $games = Game::orderBy('created_at', 'DESC')->get();
        // game of user that is loged in
        $myGames = Game::where('publisher_id', '=', Auth::user()->id)->orderBy('created_at', 'DESC')->get();
        return view('battles.create-step1', compact('games', 'myGames', 'active'));
    }

    /**
     * instance for saving data from add battles step 1 on a session
     * @var $request
     * @return view
     * */
    public function postCreateStep1(Request $request)
    {
        $validated = $request->validate([
           'gameid' => 'required'
        ]);

        if(empty($request->session()->get('battles'))){
            $battle = new Battle();
            $battle->fill($validated);
            $request->session()->put('battle', $battle);
        }else{
            $battle = $request->session()->get('product');
            $battle->fill($validated);
            $request->session()->put('battle', $battle);
        }

        return redirect('/battles/create-step2');
    }

    /**
     * instance for showing the step 2 battle form
     * @var $request
     * @return view
     * */
    public function createStep2(Request $request)
    {
        $uri =  $request->path();
        $active = $this->getUriStepInt($uri);
        $battle = $request->session()->get('battle');
        // check if battle session is found
        if($battle){
            $game = Game::FindOrFail($battle->gameid);
            return view('battles.create-step2', compact('active', 'game', 'battle'));
        }
        return redirect('/battles/create-step3')->with('danger', 'session for step 2 is not set yet.');
    }

    /**
     * instance for putting form step 2 on a session
     * @var $request
     * @return view
     * */
    public function postCreateStep2(Request $request)
    {
        $playersArr = [];
        $int = $request->players;
        $users = User::all('username', 'id');
        $active = 3;
        while($int > 0){
            array_push($playersArr, $this->numberToRomanRepresentation($int));
            $int--;
        }

        $playersTotal = session()->put('playersTotal', array_reverse($playersArr));

        return view('battles.create-step3', compact('active', 'users'))->with('playersTotal', $playersTotal);
    }

    /**
     * instance for putting form step 2 on a session
     * @var $request
     * @return view
     * */
    public function postCreateStep3(Request $request)
    {
        $inputs = $request->all();
        //dd($inputs);
        $message = [
            'required' => 'This field is required'
        ];

        $valiPlayer = Validator::make($inputs, [
            'person.player.*' => 'required',
            'person.username.*' => 'required|unique:users,username|unique:verify,username',
            'person.email.*' => 'required|email|unique:users,email|unique:verify,email'
        ], $message);

        // return bac with errors meassage when validate not through
        if ($valiPlayer->fails()) {
            //dd($valiPlayer);
            return redirect('/battles/create-step3')->withErrors($valiPlayer)->withInput();
        }

        $battle = $request->session()->get('battle');
        $battle->players = $request->person;
        $request->session()->put('battle', $battle);
        return redirect('/battles/create-step4');
    }

    /**
     * instance for checking if array values a unique
     * @param $array
     * @return
     */

    public function array_has_dupes($array) {
        return count($array) !== count(array_unique($array));
    }


    /**
     * instance for convert int to roman numbers
     * @param int $number
     * @return
     */
    function numberToRomanRepresentation($number) {
        $map = array( 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
        $romanNum = '';
        while ($number > 0) {
            foreach ($map as $roman => $int) {
                if($number >= $int) {
                    $number -= $int;
                    $romanNum .= $roman;
                    break;
                }
            }
        }
        return $romanNum;
    }

    /**
     * instance for showing the step 3 battle form,
     * safety reason, mainly used to check if session of previous step isset.
     * @var $request
     * @return view
     * */
    public function createStep3(Request $request)
    {
        $uri =  $request->path();
        $active = $this->getUriStepInt($uri);
        $users = User::all('username', 'id');

        // check if session for step 3 is set.
        if(!session('playersTotal')){
            return redirect('/battles/create-step1')->with('info', 'Battle session expired.');
        }
        return view('battles.create-step3', compact('active', 'users'));

    }

    /**
     * instance for showing the step 4 battle form
     * @var $request
     * @return view
     * */
    public function createStep4(Request $request)
    {
        $uri =  $request->path();
        $active = $this->getUriStepInt($uri);
        $battle = $request->session()->get('battle');

        $players = [];
        //dd($battle->players);
        // Create a custo temporary players list
        $players = [];
        if($battle && is_array($battle->players)){
            foreach ($battle->players as $key => $name){
                // check array key based on inputs name
                if($key == 'player' || $key == 'username'){
                    // get unique username from previous session
                    foreach($battle->players[$key] as $i => $username){
                        array_push($players, $username);
                    }
                }
            }
        }else{
            return redirect('/battles/create-step2')->with('danger', 'Session players expired');
        }



        return view('battles.create-step4', compact('active', 'players'));

    }

    /**
     * instance for putting form step 4 on a session
     * @var $request
     * @return view
     * */
    public function postCreateStep4(Request $request)
    {
        $inputs = $request->all();
        $battle = $request->session()->get('battle');

        $validated = Validator::make($inputs, [
            'wonby' => 'required'
        ]);

        if ($validated->fails()) {
            //dd($validated);
            return redirect('/battles/create-step4')->withErrors($validated)->withInput();
        }
        $battle->score = $request->score;
        $battle->fill($inputs);
        $request->session()->put('battle', $battle);
        //dd($battle);
        // create templayers account
        $battle_players = [];
        $playerCounter = 0;
        if($battle && is_array($battle->players)){
            foreach ($battle->players as $key => $value){

                if($key == 'player' || $key == 'username'){
                    // get unique username from previous session
                    foreach($battle->players[$key] as $i => $username){
                        $score = $battle->score[$playerCounter++];
                        $userid = User::where('username', '=', $username)->first();
                        if($userid){
                            $userid = $userid->id;
                        }
                        $battleid = Player::create([
                            'username' => $username,
                            'account_id' => $userid,
                            'score' => json_encode($score),
                            ])->id;
                        array_push($battle_players, $battleid);
                    }
                }
            }
            $this->sendTempPlayerMail($battle->players);

            Battle::create([
                'dtPlayed' => $battle->dtPlayed,
                'gameid' => $battle->gameid,
                'wonby' => $battle->wonby,
                'battle_players_id' => json_encode($battle_players),
                'publisher_id' => Auth::user()->id
            ]);
        }

        session()->forget(['battle', 'playersTotal']);
        return redirect('/battles')->with('status', 'Your battle has been made soldier.');

    }

    public function sendTempPlayerMail($players)
    {
        foreach ($players as $key => $name) {
            // check array key based on inputs name
            if ($key == 'email') {
                $emailKey = 'username';
                // get unique username from previous session
                foreach ($players[$key] as $k => $v) {
                    // put values in verify table and send this user an email
                    $hash = Hash::make(str_random(10));
                    $inputs = ['email' => $v, 'username' => $players['username'][$k], 'hash' => $hash];
                    $store = Verify::create($inputs);
                    //$store = true;
                    if ($store) {
                        // send mail to new user
                        $data = array('email' => $inputs['email'], 'hash' => $inputs['hash']);
                        Mail::send('emails.addUser', $data, function ($message) use ($data) {
                            $message->from("info@bounces.tuannet.nl", 'MY ADSD GAMES');
                            $message->to($data['email'], 'users')->subject('SIGN UP');
                        });
                    }
                }
            }
        }
    }

    /**
     * create function to delete battle
     * @var $id the id of chosen battle
     * @return Redirect
     * */
    public function destroy($id)
    {
        $battle = Battle::find($id);
        $players = json_decode($battle->battle_players_id);
        foreach ($players as $playerId){
            $player = Player::find($playerId);
            $player->delete();
        }
        $battle->delete();
        return Redirect()->to('battles')->with('status', 'Your battle is successfully deleted');
    }


    /**
     * instance to get int of a uri
     * @var $u
     * @return int
     * */
    public function getUriStepInt($u)
    {
        $numbersUri =  preg_replace("/[^0-9]/", '', $u);
        $int =  substr ($numbersUri, 0,1 );
        return $int;
    }


}

