@extends('layouts.dashboard')
@section('content')
    <div id="carousel-header" class="carousel slide carousel-fade" data-ride="carousel" >
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <div class="view" style="background-image: url({{asset('images/games/' . (($game->image) ? "$game->image" : 'battle-roman.jpg')) }}); background-repeat: no-repeat; background-size: cover;background-position: center;">
                    <div class="h-100 pb-lg-4 pb-2 text-white flex-column d-flex align-items-start justify-content-lg-end justify-content-md-end justify-content-center pt-5 mx-lg-5 mt-lg-0 mt-md-0 mt-4 pl-dashboard text-lg-left" >
                        <div class="row w-100 m-0">
                            <div class="col-lg-5 col-md-6 col-sm-12 p-0">
                                <div class="header-wrap w-100 box-shadow-white">
                                    <h3 class="m-0">{{ $game->name }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="ml-2 mb-2">
                            <form action="{{ route('battles.post.create-step1') }}" method="post">
                                @csrf
                                <input type="hidden" name="gameid" value="{{$game->id}}" />
                                <button type="submit" class="btn sign-btn home-btn w-100 pr-4 pl-4 ft-18">
                                   Play this game
                                </button>
                            </form>
                        </div>
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
                    <h6 class="home-color ft-20">{{ $game->users->username }}</h6>
                </div>
            </div>
        </div>
        <div id="game-time" class=" position-relative" style="top:-70px;">
            <div class="d-flex text-dark p-lg-3 p-md-3 p-0 justify-content-center align-items-center">
                <span class="m-0">Battle Added</span>
                <span class="ft-30"><i class="fas fa-calendar-alt"></i></span>
                <span class="m-0">{{ euroDate(substr($game->created_at, 0 , 10)) }}</span>
                <span class="ft-30"><i class="far fa-clock"></i></span>
                <span>{{  substr($game->created_at, 11 , 5) }}</span>
            </div>
        </div>
        <!-- Custom breadcrums -->
        <div class="d-flex flex-row justify-content-between align-items-center position-relative">
            <div class="bread-wrap h-100 d-flex align-items-center">
                <ol class="widgets ft-20 p-0 m-0">
                    <li><a href="{{ route('games') }}"><i class="fas fa-gamepad"></i></a></li>
                    <li><a href="{{ route('games') }}">Games</a></li>
                    <li class="home-color"><a href="#">{{$game->name}}</a></li>
                </ol>
            </div>
            <a id="back-btn" href="javascript:history.back()" class="btn bg-white home-color ft-18 pt-2 pb-2 no-box-shadow no-radius" style="border: 1px solid #c88859;">
                <i class="fas fa-arrow-left"></i>
                Back
            </a>
        </div>
        <!-- Custom breadcrums -->
        <hr class="w-100" />
        <div class="d-flex justify-content-between align-items-center mt-4 mb-4">
            <h3 class="m-0">Game detail</h3>
            <div class="text-right d-flex align-items-end">
                <input id="input-1" name="input-1" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1"
                       value="{{ $game->averageRating }}" data-size="xs" disabled="">
                <small class="mb-1">( {{ ($ratings) ? count($ratings)  : '0' }} review{{ ($ratings && count($ratings) > 1) ? 's'  : '' }} )</small>

            </div>

        </div>

        <hr class="w-100" />
        <div class="row mt-5 mb-5 pb-lg-5 pb-md-5 pb-0">
                <div class="col-lg-3 col-md-3 col-sm-6 mt-3 mb-3 games-wrap">
                    <div class="d-flex flex-column justify-content-center align-items-center box-shadow-light game-content">
                        <span class="icon mt-4"><i class="fas fa-users"></i></span>
                        <span class="mt-2 mb-2 ft-18 text-black-50">Players</span>
                        <span class="text mt-4 mb-4">2 - {{$game->nop}}</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 mt-3 mb-3 games-wrap">
                    <div class="d-flex flex-column justify-content-center align-items-center box-shadow-light game-content">
                        <span class="icon mt-4"><i class="fas fa-stopwatch"></i></span>
                        <span class="mt-2 mb-2 ft-18 text-black-50">duration</span>
                        <span class="text mt-4 mb-4">{{$game->duration}} min</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 mt-3 mb-3 games-wrap">
                    <div class="d-flex flex-column justify-content-center align-items-center box-shadow-light game-content">
                        <span class="icon mt-4"><i class="fas fa-calendar-plus"></i></span>
                        <span class="mt-2 mb-2 ft-18 text-black-50">date of register</span>
                        <span class="text mt-4 mb-4">{{$game->dor}}</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 mt-3 mb-3 games-wrap">
                    <div class="d-flex flex-column justify-content-center align-items-center  box-shadow-light game-content">
                        <span class="icon mt-4"><i class="fas fa-fist-raised"></i></span>
                        <span class="mt-2 mb-2 ft-18 text-black-50">battles</span>
                        <span class="text mt-4 mb-4">{{$game->nop}}</span>
                    </div>
                </div>
        </div>
        @include('layouts.content.divider', ['msgDivider' => 'complete description'])
        <div class="row mt-5 mb-5">
            <div class="col-lg-9 col-md-7 col-sm-12 order-lg-1 order-md-1 order-2">
                <div class="game-content box-shadow-light" style="min-height: 200px;">
                    <p class="m-0 p-4 ft-18">
                        {{ (strlen($game->description) > 150) ? $game->description : $game->description .' When your description is too short this text will also be shown to make
                        the description longer. Nice game is this. Play it. Player ' .$game->users->username .  ' made a good choise to
                        add this game. Be like ' . $game->users->username}}
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-5 col-sm-12 order-lg-2 order-md-2 order-1 games-wrap">
                <div class="view box-shadow-light games ">
                        <img src="{{asset('images/games/' . (($game->image) ? "$game->image" : 'battle-roman.jpg')) }}" height="100%" width="100%" alt="placeholder" >
                        @if($game->publisher_id == Auth::user()->id || Auth::user()->isAdmin())
                            <a href="{{ route('games.edit', $game->id) }}" class="text-center" >
                                <div class="mask d-flex flex-column justify-content-center align-items-center waves-effect waves-light p-4 rgba-grey-light ">
                                    <span><i class="fas fa-edit text-white ft-30 mb-2"></i></span>
                                    <h5 class="text-white m-0 text-shadow">Edit {{ $game->name }}</h5>
                                </div>
                            </a>
                        @endif

                </div>
            </div>
        </div>

        <div class="row mt-5 mb-5">
            <div class="col-lg-9 col-md-8 col-12 order-1">
                @include('layouts.content.divider', ['msgDivider' => 'Reet this game'])
            </div>
            <div class="col-lg-3 col-md-4 col-12 order-lg-2 order-md-2 order-4">
                @include('layouts.content.divider', ['msgDivider' => 'Best rated games'])
            </div>
            <div class="col-lg-9 col-md-8 col-12 order-lg-3 order-md-3 order-2">
                <form  action="{{ route('rate.post')   }}" method="POST" style="border-bottom: 1px solid #212121;">
                    @csrf
                    <div class="row pb-5">
                        <div class="col-lg-5 col-md-5 col-12 order-2 pt-4 pb-4">
                            <span class="ft-25 text-black-50">I rate this game with </span>
                        </div>
                        <div class="col-lg-7 col-md-7 col-12 order-lg-2 order-md-2 order-1 font-weight-light pt-4 pb-4 font-roboto">
                            @if(!$rated)
                                Let people know what you think about <span class="home-color font-weight-bold">{{ $game->name }}</span>.
                                {{ ($ratings && $game->averageRating > 0 && count($ratings) > 1)
                                    ? count($ratings) . " people are already ahead of you"
                                    : " Be one of the first to rate this game"}}.

                            @else
                                <span class="text-green">Thanks</span> for rating this game. You gave this game <span class="text-yellow font-weight-bold">{{ $rated }}</span> star.
                                It is possible to update your previous rating if you changed your mind by Aaron.
                            @endif
                        </div>
                        <div class="col-lg-5 col-md-5 col-12 order-3">
                            <div class="h-100 w-100 d-flex align-items-center">
                                <div class="rating ft-25 ">
                                    <input id="input-2" name="rate" class="rating rating-loading" data-min="0" data-max="5" data-step="1"
                                           value="{{ (!$rated) ? '3' : $rated}}" data-size="xs">
                                    <input type="hidden" name="gameid" required="" value="{{$game->id}}">
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-7 col-md-7 col-12 order-4">
                            <div class="h-100 w-100 d-flex align-items-center">
                                <button type="submit" class="btn btn-goldenrod p-2 ft-18 no-box-shadow m-0">
                                    Submit review
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row my-4">

                    <div class="col-12">
                        <h6>Leave a comment behind</h6>
                        <hr />
                        <form  action="{{ route('comment.add') }}" method="POST" class="w-100 text-right">
                            @csrf
                            <textarea class="form-control no-radius mb-4" name="comment" id="addComment" rows="3" placeholder="comment here"></textarea>
                            <input type="hidden" name="gameid" value="{{ $game->id }}" />
                            <button type="submit" class="waves-effect waves-dark btn bg-home-color-brown next-step m-0 pt-2 pb-2 text-white no-radius">save comment</button>
                        </form>
                    </div>
                    <div class="col-12 my-2">
                        <hr />
                        <h6 class="m-0">{{ ($game->comments)? count($game->comments) : '0' }} comments</h6>
                    </div>
                    @include('layouts.content.replies-comment', ['comments' => $game->comments, 'gameid' => $game->id])

                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-12 order-lg-4 order-md-4 order-5">
                <div class="row">
                    @foreach($sortedAGames as $game)
                        <div class="col-12 mt-0 mb-4 games-wrap ">
                            <div class="view box-shadow games">
                                <a href="{{ route('games.show', $game->id) }}">
                                    <img src="{{asset('images/games/' . (($game->image) ? "$game->image" : 'battle-roman.jpg')) }}" height="100%" width="100%" alt="placeholder" >
                                    <div class="mask d-flex align-items-end waves-effect waves-light pl-4 pb-3">
                                        <h5 class="white-text m-0 game-title rgba-light-50 box-shadow">{{ $game->name }}</h5>
                                    </div>
                                </a>
                            </div>

                        </div>
                    @endforeach
                </div>

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
