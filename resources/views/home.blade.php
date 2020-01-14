@extends('layouts.dashboard')

@section('content')
    <div id="carousel-header" class="carousel slide carousel-fade" data-ride="carousel" >
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <div class="view" style="background-image: url({{asset('img/pictures/wallpaper3.jpg')}}); background-repeat: no-repeat; background-size: cover;background-position: center;">
                    <div class="h-100 pb-lg-4 pb-2 text-white d-flex align-items-center justify-content-center mx-lg-5 pl-dashboard" >
                        <div class="d-flex flex-column align-items-center justify-content-center w-100">
                            {{--<div class="auhour-img-wrap bg-white radius-100 mb-3">--}}
                                {{--<img src="{{asset('img/pictures/avatar-classic.png') }}" height="75px" width="75px" alt="placeholder" >--}}
                            {{--</div>--}}
                            <div class="author-content text-center text-white font-roboto ">
                                <h6 class=" text-white text-uppercase ft-30" style="text-shadow: 0 0 2px white;"><strong>{{ Auth::user()->username}} </strong> arrived, the game begins</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <main class="pt-0 mx-lg-5 ">
        <div class="container p-0">
            <div class="row mt-0 bg-transparent w-100 justify-content-center user-info-wrap">
                <div class="col-lg-3 col-md-3 col-6 box-shadow-rwhite bg-green" style="border-left: unset;z-index: 4;">
                    <div class="d-flex flex-row align-items-center justify-content-center pt-2 pb-2">
                        <div class="d-flex  w-100 justify-content-center">
                            <span class="user-info-icon text-white"><i class="fas fa-gamepad" ></i></span>
                        </div>
                        <div class="d-flex flex-column w-100">
                            <span class="user-info-num">{{ ($myGames) ?  count($myGames) :'0' }}</span>
                            <label class="user-info-label">Games</label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-6 box-shadow-rwhite bg-blue" style="z-index: 3;">
                    <div class="d-flex flex-row align-items-center justify-content-center pt-2 pb-2">
                        <div class="d-flex  w-100 justify-content-center">
                            <span class="user-info-icon text-white"><i class="fas fa-fist-raised " ></i></span>
                        </div>
                        <div class="d-flex flex-column w-100">
                            <span class="user-info-num">{{ ($battles) ?  count($battles) : '0' }}</span>
                            <label class="user-info-label">Battles</label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-6 box-shadow-rwhite bg-red" style="z-index: 2;">
                    <div class="d-flex flex-row align-items-center justify-content-center  pt-2 pb-2">
                        <div class="d-flex  w-100 justify-content-center">
                            <span class="user-info-icon text-white"><i class="fas fa-trophy"></i></span>
                        </div>
                        <div class="d-flex flex-column w-100">
                            <span class="user-info-num">{{ ($wons) ?  count($wons) :'0' }}</span>
                            <label class="user-info-label">Wins</label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-6 box-shadow-rwhite bg-yellow">
                    <div class="d-flex flex-row align-items-center justify-content-center pt-2 pb-2">
                        <div class="d-flex  w-100 justify-content-center">
                            <span class="user-info-icon text-white"><i class="fas fa-star " ></i></span>
                        </div>
                        <div class="d-flex flex-column w-100">
                            <span class="user-info-num">{{ ($rates) ?  count($rates) :'0' }}</span>
                            <label class="user-info-label">Rating</label>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row mt-0 p-2 font-roboto text-uppercase text-center">
                <div class="col-lg-3 col-md-3 col-6 animated fadeInDown mt-lg-0 mt-mb-0 mt-3  mb-lg-0 mb-md-0 mb-3">
                    <a class="ft-30 d-flex flex-column justify-content-center align-items-center user-menu-wrap text-green border-green"
                       href="{{ route('games.create.show') }}">
                        <span class="user-menu-icon ft-30 mt-2 mb-2"><i class="fas fa-dice-four"></i></span>
                        <span class="user-menu-link ft-20 mt-2 mb-2">add game </span>
                    </a>
                </div>
                <div class="col-lg-3 col-md-3 col-6 animated fadeInDown delay-25ms mt-lg-0 mt-mb-0 mt-3  mb-lg-0 mb-md-0 mb-3">
                    <a class="ft-30 d-flex flex-column justify-content-center align-items-center user-menu-wrap text-blue border-blue"
                       href="{{ route('battles.create-step1') }}">
                        <span class="user-menu-icon ft-30 mt-2 mb-2"><i class="fas fa-handshake"></i></span>
                        <span class="user-menu-link  ft-20 mt-2 mb-2">add battle</span>
                    </a>
                </div>
                <div class="col-lg-3 col-md-3 col-6 animated fadeInDown  delay-50ms mt-lg-0 mt-mb-0 mt-3  mb-lg-0 mb-md-0 mb-3">
                    <a class="ft-30 d-flex flex-column justify-content-center align-items-center user-menu-wrap text-red border-red"
                       href="{{ route('account') }}">
                        <span class="user-menu-icon ft-30 mt-2 mb-2"><i class="fas fa-id-card-alt"></i></span>
                        <span class="user-menu-link ft-20 mt-2 mb-2">my account </span>
                    </a>
                </div>
                <div class="col-lg-3 col-md-3 col-6 animated fadeInDown  delay-75ms mt-lg-0 mt-mb-0 mt-3  mb-lg-0 mb-md-0 mb-3">
                    <a class="ft-30 d-flex flex-column justify-content-center align-items-center user-menu-wrap text-yellow border-yellow"
                       href="{{ route((Auth::user()->isAdmin()) ? 'admin.manage' : 'user.manage') }}">
                        <span class="user-menu-icon ft-30 mt-2 mb-2"><i class="fas fa-hammer"></i></span>
                        <span class="user-menu-link  ft-20 mt-2 mb-2">manage products</span>
                    </a>
                </div>
            </div>

            <div class="row games-row-wrap p-2 mt-0 mb-5  text-uppercase animated fadeIn delay-1s">
                @if(count($myGames) )
                    @for($i = 0; $i < count($myGames);$i++)
                        @if($i < 2 )
                            <div class="col-lg-6 col-md-6 col-12 games-row mt-5 mb-5 re-game-2 font-roboto">
                                <div class=" w-100 h-100 position-relative">
                                    <div class="view games">
                                        <a href="{{ route('games.show', $myGames[$i]->id) }}">
                                            <img src="{{asset( ($myGames[$i]->image) ?  "images/games/{$myGames[$i]->image }"   : 'chess.jpg') }}" height="100%" width="100%" alt="placeholder" >
                                            <div class="mask d-flex align-items-end waves-effect waves-light pl-4 pb-3 rgba-white-light border-slight">
                                                <div class="position-absolute w-100 h-100 d-flex justify-content-center align-items-center check">
                                                    <span><i class="far fa-eye"></i></span>
                                                </div>
                                                <h5 class="white-text m-0 game-title rgba-light-50 box-shadow">{{ $myGames[$i]->name }}</h5>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="bg-white d-flex justify-content-between">
                                        <div class="games-it">
                                            <span><i class="fas fa-users"></i></span>
                                            <span>2 - {{ $myGames[$i]->nop }} Players</span>
                                        </div>
                                        <div class="games-it">
                                            <span><i class="fas fa-clock"></i></span>
                                            <span>{{ $myGames[$i]->duration }} min</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if(count($myGames) == 1)
                            <div class="col-lg-6 col-md-6 col-12 games-row mt-5 mb-5">
                                @include('layouts.content.addGame', ['link' => 'games.create.show','name' => 'game'])
                            </div>
                        @endif
                    @endfor
                @else
                    <div class="col-lg-6 col-md-6 col-12 mt-5 mb-5">
                        @include('layouts.content.addGame', ['link' => 'games.create.show','name' => 'game'])
                    </div>
                @endif

            </div>
            <!-- Battles row 4 -->
            <div class="p-2  animated fadeIn delay-2s">
                @include('layouts.content.divider', ['msgDivider' => 'My latest battles'])
            </div>
            <div class="row games-row-wrap  p-2  animated fadeIn delay-2s">
                @if(count($battles))
                    @foreach($battles as $key => $battle)
                        @if($key < 4)
                            <div class="col-lg-3 col-md-3 col-12 games-row mt-4 mb-4">
                                <div class=" w-100 h-100 position-relative">
                                    <div class="view games" style="height: 200px;">
                                        <a href="{{ route('battles',  $battle->id ) }}">
                                            <img src="{{asset( ($battle->games->image) ?  "images/games/{$battle->games->image }"   : 'images/games/battle-roman.jpg') }}" height="100%" width="100%" alt="placeholder" >
                                            <div class="mask d-flex align-items-end waves-effect waves-light pl-4 pb-3 rgba-white-light border-slight ">
                                                <div class="position-absolute w-100 h-100 d-flex justify-content-center align-items-center check">
                                                    <div class="d-flex flex-column align-items-center">
                                                        <span><i class="far fa-eye"></i></span>
                                                        <span class="ft-20"> {{ $battle->games->name}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="bg-white d-flex justify-content-start">
                                        <div class="battle-it ">
                                            <span><span><i class="fas fa-calendar-alt"></i></span></span>
                                            <span class="mx-2">{{  euroDate(substr($battle->created_at, 0 , 10)) }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif
                @if(count($battles) < 4)
                    <div class="col-lg-3 col-md-3 col-sm-6 mt-4 mb-4 games-wrap">
                        @include('layouts.content.addGame', ['link' => 'battles.create-step1', 'name' => 'battle' ])
                    </div>
                @endif


            </div>
            <!-- Battles row 4 -->
        </div>

        <br />
        <br />
        <br />
        <br />
        <br />
    </main>
@endsection
