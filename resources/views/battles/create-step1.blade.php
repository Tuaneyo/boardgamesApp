@extends('layouts.dashboard')
@section('content')
    <div id="carousel-header" class="carousel slide carousel-fade" data-ride="carousel" style="height: 20vh;">
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <div class="view " style="background-image: url({{asset('img/pictures/battle3.jpg')}}); background-repeat: no-repeat; background-size: cover;background-position: top;">
                    <div class="h-100 display-sm-none text-white d-flex align-items-end justify-content-start pt-5 mx-lg-5 pl-dashboard text-lg-left text-center" >
                        <div class="header-wrap mb-lg-4 mb-md-4 mb-0 box-shadow ">
                            <h1 class="m-0 ">Add battle: <strong>step 1</strong></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <main class="pt-5 mx-lg-5">
        <div class="row mt-5 mb-5">
            @include('layouts.content.status')
        </div>
        <div class="mt-5 mb-5 text-center w-100 p-4">
            <h2>Which game you want to battle?</h2>
            <small class="font-roboto text-uppercase">To get started on your battle, please select a game of your own choice.</small>
        </div>
        @if(count($games))
        <div class="row mt-5 mb-5">
            <div class="col-md-12">
                <ul class="nav nav-tabs d-flex justify-content-center align-items-center no-border " id="myTab" role="tablist">
                    <li class="nav-item ml-lg-3 ml-md-3 ml-1 mr-lg-3 mr-md-3 mr-1 bg-slight box-shadow-light">
                        <a class="nav-link active p-4" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">All games</a>
                    </li>
                    <li class="nav-item  ml-lg-3 ml-md-3 ml-1 mr-lg-3 mr-md-3 mr-1 bg-slight box-shadow-light">
                        <a class="nav-link p-4" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">My games</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active " id="home" role="tabpanel" aria-labelledby="home-tab">
                        <form action="{{ route('battles.post.create-step1') }}" method="post">
                            @csrf
                            <div class="row mt-4">
                                @foreach($games as $game)
                                    <div class="col-lg-3 col-md-3 col-sm-6 mt-3 mb-3 games-wrap">
                                        <div class="view box-shadow games">
                                            <button type="submit" class="m-0 p-0 submit-game no-radius" name="gameid" value="{{$game->id}}">
                                                <img src="{{asset('images/games/' . (($game->image) ? "$game->image" : 'chess.jpg')) }}" height="200px" width="100%" alt="placeholder" >
                                                <div class="mask d-flex align-items-end waves-effect waves-light pl-4 pb-3">
                                                    <h5 class="white-text m-0 game-title rgba-light-50 box-shadow">{{ $game->name }}</h5>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </form>

                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <form action="{{ route('battles.post.create-step1') }}" method="post">
                            @csrf
                            <div class="row mt-4">
                                @foreach($myGames as $game)
                                    <div class="col-lg-3 col-md-3 col-sm-6 mt-3 mb-3 games-wrap">
                                        <div class="view box-shadow-light games">
                                            <button type="submit" class="m-0 p-0 submit-game no-radius" name="gameid" value="{{$game->id}}">
                                                <img src="{{asset('images/games/' . (($game->image) ? "$game->image" : 'chess.jpg')) }}" height="200px" width="100%" alt="placeholder" >
                                                <div class="mask d-flex align-items-end waves-effect waves-light pl-4 pb-2 ">
                                                    <h5 class="white-text m-0 game-title box-shadow">{{ $game->name }}</h5>
                                                </div>
                                                <input type="hidden" name="gameid" value="{{$game->id}}" />
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @else
            <div class="text-center w-100">
                <h6>There is no game. Please kindly add a game first. </h6>
                <div class="games-wrap p-4 mt-4 mb-4">
                    @include('layouts.content.addGame', ['link' => 'games.create.show', 'name' => 'game'])
                </div>
            </div>

        @endif
        <hr class="w-100"/>
        <div class="row mt-5 mb-5">
            <div class="col-12 text-right">
                @include('battles.back')
            </div>
        </div>
        <!-- Classic tabs -->
    </main>
@endsection
