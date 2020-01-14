@extends('layouts.dashboard')
@section('content')
    <div id="carousel-header" class="carousel slide carousel-fade" data-ride="carousel" >
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <div class="view" style="background-image: url({{asset((($battle->games->image) ? 'images/games/' . $battle->games->image : 'images/games/battle-roman.jpg')) }}); background-repeat: no-repeat; background-size: cover;background-position: center;">
                    <div class="h-100 pb-lg-4 pb-2 text-white flex-column d-flex align-items-start justify-content-lg-end justify-content-md-end justify-content-center pt-5 mx-lg-5 mt-lg-0 mt-md-0 mt-4 pl-dashboard text-lg-left" >
                        <div class="row w-100 m-0">
                            <div class="col-lg-5 col-md-6 col-sm-12 p-0">
                                <div class="header-wrap w-100 box-shadow-white">
                                    <h3 class="m-0">battle of {{ $battle->games->name }}</h3>
                                </div>
                            </div>
                        </div>
                        @if($battle->isPermitted())
                        <div class="ml-2 mb-2">
                            <a href="{{ route('battles.edit', $battle->id) }}" class="btn sign-btn home-btn w-100 pr-4 pl-4 ft-18">
                                edit this battle
                            </a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <main class="pt-5 mx-lg-5">
        <div class="authour-wrap position-relative m-0 p-0" style="top:-102px;">
            <div class="d-flex flex-column align-items-center justify-content-center">
                <div class="auhour-img-wrap bg-white radius-100">
                    <img src="{{asset('img/pictures/avatar-classic.png') }}" height="100px" width="100px" alt="placeholder" >
                </div>
                <div class="author-content text-center">
                    <small >Author</small>
                    <hr class="w-100 border-light mt-2 mb-2" />
                    <h6 class="home-color ft-20">{{ $battle->users->username }}</h6>
                </div>
            </div>
        </div>
        <div id="game-time" class=" position-relative" style="top:-70px;">
            <div class="d-flex text-dark p-lg-3 p-md-3 p-0 justify-content-center align-items-center">
                <span class="m-0">Game Added</span>
                <span class="ft-30"><i class="fas fa-calendar-alt"></i></span>
                <span class="m-0">{{ euroDate(substr($battle->created_at, 0 , 10)) }}</span>
                <span class="ft-30"><i class="far fa-clock"></i></span>
                <span>{{  substr($battle->created_at, 11 , 5) }}</span>
            </div>
        </div>
        <!-- Custom breadcrums -->
        <div class="d-flex flex-row justify-content-between align-items-center position-relative">
            <div class="bread-wrap h-100 d-flex align-items-center">
                <ol class="widgets ft-20 p-0 m-0">
                    <li><a href="{{ route('home') }}"><i class="fas fa-gamepad"></i></a></li>
                    <li><a href="{{ route('battles') }}">battles</a></li>
                    <li class="home-color"><a href="#">battle {{ $battle->games->name }}</a></li>
                </ol>
            </div>
            <a id="back-btn" href="javascript:history.back()" class="btn bg-white home-color ft-18 pt-2 pb-2 no-box-shadow no-radius" style="border: 1px solid #c88859;">
                <i class="fas fa-arrow-left"></i>
                Back
            </a>
        </div>
        <!-- Custom breadcrums -->
        <div class="mt-5 mb-5">
            @include('layouts.content.divider', ['msgDivider' => 'battle details'])
        </div>

        <div class="row mt-5 leaderboard">
            <div class="col-lg-1 col-md-1 col-12"></div>
            <div class="col-lg-10 col-md-10 col-12">
                <div class="row">
                    @foreach($players as $key => $player )
                        <div class="col-lg-6 col-md-6 col-12 mt-4 mb-4">
                            <a name="players" class="w-100 pt-4 pb-4 no-border box-shadow d-flex flex-column justify-content-center align-items-center players-wrap score-wrap position-relative ">
                                <div class="d-flex justify-content-around w-100 board-wrap">
                                    <div class="board"></div>
                                    <div class="board"></div>
                                </div>
                                <span class="mt-2 mb-2 ft-30 players-content">{{ $player->username }}</span>
                                <div class="d-flex mt-2 mb-2 flex-column" style="font-family: 'Orbitron', sans-serif;">
                                    <div class="w-100 text-center score-text mt-2 mb-4">
                                        Score
                                    </div>
                                    <div class="d-flex score-content ">
                                        @foreach(json_decode($player->score) as $score)
                                            <input type="text" disabled value="{{ (empty($score)) ? '0': $score }}" />
                                        @endforeach
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-1 col-md-1 col-12"></div>

        </div>
        <hr class="w-100 mt-5 mb-0 "/>
        <div class="row mt-0">
            <div class="col-lg-6 col-md-6 col-12 mb-3 troca-wrap">
                <div class="winners-wrap">
                    <div class="winners-img d-flex flex-column align-items-center justify-content-center">
                        <img src="{{ asset('img/pictures/bronze.jpeg') }}" alt="" class="img-fluid" width="250px" height="100%" />
                        <div class="d-flex position-absolute flex-column align-items-center justify-content-center">
                            <span class="win-number ft-20" >{{ $battle->wonby }} <small><sup>1 st</sup></small></span>
                        </div>
                    </div>
                    <div class="winners-name w-100 text-center " >
                    <span class="ft-25">{{ $battle->wonby }}</span>
                    </div>
                </div>

            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-lg-0 mt-md-0 mt-3 mb-3 troca-wrap">
                <div class="row ">
                    <div class="col-lg-4 col-md-4 col-2"></div>
                    <div class="col-lg-4 col-md-4 col-8 ">
                        <div class="d-flex flex-column justify-content-center w-100 align-items-center calendar ">
                            <div class=" d-flex flex-column no-box-shadow w-100">
                                <div class="cal-head text-uppercase">{{ $datePlayed->format('F')  }}</div>
                                <div class="cal-body">{{ $datePlayed->day }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="winners-name w-100 text-center  w-100" >
                     <span class="ft-25">{{ $datePlayed->format('Y') }}</span>
                    </div>
                    <div class="col-lg-4 col-md-4 col-2"></div>
                </div>

            </div>
        </div>


        <hr class="w-100 mt-5"/>
        <div class="row mt-5 mb-5">
            <div class="col-12 text-right">
                @if($battle->isPermitted())
                <a href="{{ route('battles.edit', $battle->id) }}" class="btn sign-btn home-btn pr-4 pl-4 ft-18">
                    edit this battle
                </a>
                @else
                    <p>Please note that you can only edit your own battle. to edit this battle be the author or admin.</p>
                @endif
            </div>
        </div>

        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
    </main>
@endsection
