@extends('layouts.dashboard')
@section('content')
    <div id="carousel-header" class="carousel slide carousel-fade" data-ride="carousel" >
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <div class="view v-section" style="background-image: url({{asset('img/pictures/games.png')}}); background-repeat: no-repeat; background-size: cover;background-position: center;">
                    <div class="h-100 pb-lg-4 pb-2 text-white flex-column d-flex align-items-start justify-content-lg-end justify-content-md-end justify-content-center pt-5 mx-lg-5 pl-dashboard text-lg-left text-center" >
                        <div class="header-wrap box-shadow-light">
                            <h1 class="m-0">check if you can do better</h1>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <main class="pt-5 mx-lg-5">
        <!-- Custom breadcrums -->
        <div class="d-flex flex-row justify-content-between align-items-center">
            <div class="bread-wrap h-100 d-flex align-items-center">
                <ol class="widgets ft-20 p-0 m-0">
                    <li><a href="{{ route('home') }}"><i class="fas fa-gamepad"></i></a></li>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li class="home-color"><a href="">leaderboard</a></li>
                </ol>
            </div>
            <a id="back-btn" href="javascript:history.back()" class="btn bg-white home-color ft-18 pt-2 pb-2 no-box-shadow no-radius" style="border: 1px solid #c88859;">
                <i class="fas fa-arrow-left"></i>
                Back
            </a>
        </div>
        <!-- Custom breadcrums -->

        @include('layouts.content.divider', ['msgDivider' => 'Top highest scores'])
        <div class="row mt-5 leaderboard">
            @foreach($sortedScores as $sortedScore )
                <div class="col-lg-4 col-md-4 col-12 mt-4 mb-4">
                    <a name="players" class="w-100 pt-4 pb-4 no-border box-shadow d-flex flex-column justify-content-center align-items-center players-wrap score-wrap position-relative ">
                        <div class="d-flex justify-content-around w-100 board-wrap">
                            <div class="board"></div>
                            <div class="board"></div>
                        </div>
                        <span class="mt-2 mb-2 ft-30 players-content">{{ $sortedScore['username'] }}</span>
                        <div class="d-flex mt-2 mb-2 flex-column" style="font-family: 'Orbitron', sans-serif;">
                            <div class="w-100 text-center score-text mt-2 mb-4">
                                Score
                            </div>
                            <div class="d-flex score-content ">
                                @foreach($sortedScore['scores'] as $score)
                                    <input type="text" disabled value="{{ $score }}" />
                                @endforeach
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        @include('layouts.content.divider', ['msgDivider' => 'Top winners'])

    <!-- winner row -->
        <div class="row">
            @foreach($sortedWons as $username => $sWon)
                <div class="col-lg-4 col-md-4 col-12 mb-4">
                    <div class="winners-wrap ">
                        <div class="winners-img d-flex flex-column align-items-center justify-content-center">
                            <img src="{{ asset('img/pictures/bronze.jpeg') }}" alt="" class="img-fluid" width="250px" height="100%" />
                            <div class="d-flex position-absolute flex-column align-items-center justify-content-center">
                                <span class="win-number">{{ $sWon }}</span>
                                <small>win{{ ($sWon == 1)?'':'s'}}</small>
                            </div>
                        </div>
                        <div class="winners-name w-100 text-center ">
                            <span class="ft-20">{{ $username }}</span>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

        @include('layouts.content.divider', ['msgDivider' => 'other statistics'])
        <div class="row mt-4">
            <div class="col-lg-6 col-md-6 col-12 mt-2 mb-3">
                <div class="card ownCard p-0 no-box-shadow no-radius leaderCard h-100">
                    <div class="card-header bg-transparent text-center  p-4 h-100">
                        <h5 class="m-0">mostly played games</h5>
                    </div>
                    <div class="card-body border-grey">
                        <div class="table-responsive table-borderless p-1 h-100">
                            <table class="table font-roboto">
                                <thead>
                                <tr>
                                    <th>number</th>
                                    <th >game</th>
                                    <th >date of register</th>
                                    <th >totaal played</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($sortedGames as $key => $game)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $game['name'] }}</td>
                                            <td>{{ $game['dor'] }}</td>
                                            <td>{{ $game['counted'] }}</td>
                                            <td>
                                                <form action="{{ route('battles.post.create-step1') }}" method="post" class="game-data">
                                                    @csrf
                                                    <input type="hidden" name="gameid" value="{{$game['id']}}" />
                                                    <button type="submit" class="btn btn-house sign-btn p-1 pr-2 pl-2 ft-10">
                                                        Play
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12 mb-3 mt-2">
                <div class="card ownCard p-0 no-box-shadow no-radius leaderCard h-100">
                    <div class="card-header bg-transparent text-center  p-4 ">
                        <h5 class="m-0">What can come here? :S</h5>
                    </div>
                    <div class="card-body border-grey">
                        <div class="table-responsive table-borderless p-1 h-100">
                            <table class="table font-roboto h-100">
                                <thead>
                                <tr>
                                    <th>number</th>
                                    <th >game</th>
                                    <th >date of register</th>
                                    <th >totaal played</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($sortedGames as $key => $game)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $game['name'] }}</td>
                                        <td>{{ $game['dor'] }}</td>
                                        <td>{{ $game['counted'] }}</td>
                                        <td>
                                            <form action="{{ route('battles.post.create-step1') }}" method="post" class="game-data">
                                                @csrf
                                                <input type="hidden" name="gameid" value="{{$game['id']}}" />
                                                <button type="submit" class="btn btn-house sign-btn p-1 pr-2 pl-2 ft-10">
                                                    Play
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br />
        <br />
        <br />
        <br />
        <br />

    </main>

@endsection
