@extends('layouts.dashboard')
@section('content')
    <div id="carousel-header" class="carousel slide carousel-fade" data-ride="carousel" >
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <div class="view v-section" style="background-image: url({{asset('img/pictures/games.png')}}); background-repeat: no-repeat; background-size: cover;background-position: center;">
                    <div class="h-100 pb-lg-4 pb-2 text-white flex-column d-flex align-items-start justify-content-lg-end justify-content-md-end justify-content-center pt-5 mx-lg-5 pl-dashboard text-lg-left text-center" >
                        <div class="header-wrap box-shadow-light">
                            <h1 class="m-0">Play with the latest games</h1>
                        </div>
                        <div class="btn-icon position-relative text-lg-left text-md-left text-center ml-lg-0  ml-2">
                            <a href="{{ route('games.create.show') }}" class="btn pr-5 pl-5 m-0 ft-18 box-shadow" style="color: white !important;background: #c88859;">
                                Add game
                            </a>
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
                    <li class="home-color"><a href="{{ route('games')}}">Games</a></li>
                </ol>
            </div>
            <a id="back-btn" href="javascript:history.back()" class="btn bg-white home-color ft-18 pt-2 pb-2 no-box-shadow no-radius" style="border: 1px solid #c88859;">
                <i class="fas fa-arrow-left"></i>
                Back
            </a>
        </div>
        <!-- Custom breadcrums -->
        @include('layouts.content.divider', ['msgDivider' => 'Find a game'])
        <div class="row mt-5">
            <div class="col-md-12">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">All games</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">My games</a>
                    </li>
                </ul>
                @if($games)
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active " id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row mt-4">
                            @include('layouts.content.games', ['myGames' => false])
                            <div class="col-lg-3 col-md-3 col-sm-6 mt-3 mb-3 games-wrap">
                                @include('layouts.content.addGame', ['link' => 'games.create.show','name' => 'game'])
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="w-100 mt-5 mb-4 text-center">
                            <h3 class="mt-4">Games added by me</h3>
                            <small>{{ $myGames }} games</small>
                        </div>
                        <div class="row mt-4">
                            @include('layouts.content.games', ['myGames' => true])
                            <div class="col-lg-3 col-md-3 col-sm-6 mt-3 mb-3 games-wrap">
                                @include('layouts.content.addGame', ['link' => 'games.create.show','name' => 'game'])
                            </div>
                            @if(!$myGames)
                                <div class="bg-light d-flex align-items-center justify-content-center p-4 w-100 p-4">
                                    <h4>You don't have any games yet. Please add a game.</h4>
                                </div>
                           @endif
                        </div>
                    </div>
                </div>
                @else
                    <h1>no games add game <a href="https://adsd.clow.nl/~s1131670/P2_Laravel_Opdracht/games/create">add game</a></h1>
                @endif
            </div>
        </div>
        <!-- Classic tabs -->
        <div class="row animated fadeIn pt-home">

            <!--Grid column-->
            <div class="col-md-12 mb-4">



            </div>
            <!--Grid column-->


        </div>
        <br />
        <br />
        <br />
        <br />
        <br />

    </main>

@endsection
