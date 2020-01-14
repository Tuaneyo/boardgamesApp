@foreach($games as $game)
    @if($myGames && $game->users->id == Auth::user()->id )
        <div class="col-lg-3 col-md-3 col-sm-6 mt-3 mb-3 games-wrap ">
            <div class="view box-shadow games">
                <a href="{{ route('games.show' , $game->id ) }}">
                    <img src="{{asset('images/games/' . (($game->image) ? "$game->image" : 'battle-roman.jpg')) }}" height="100%" width="100%" alt="placeholder" >
                    <div class="mask d-flex align-items-end waves-effect waves-light pl-4 pb-3">
                        <h5 class="white-text m-0 game-title rgba-light-50 box-shadow">{{ $game->name }}</h5>
                    </div>
                </a>
            </div>

        </div>
    @elseif(!$myGames)
        <div class="col-lg-3 col-md-3 col-sm-6 mt-3 mb-3 games-wrap ">
            <div class="view box-shadow games">
                <a href="{{ route('games.show' , $game->id ) }}">
                    <img src="{{asset('images/games/' . (($game->image) ? "$game->image" : 'battle-roman.jpg')) }}" height="100%" width="100%" alt="placeholder" >
                    <div class="mask d-flex align-items-end waves-effect waves-light pl-4 pb-3">
                        <h5 class="white-text m-0 game-title rgba-light-50 box-shadow">{{ $game->name }}</h5>
                    </div>
                </a>
            </div>

        </div>
    @endif
@endforeach