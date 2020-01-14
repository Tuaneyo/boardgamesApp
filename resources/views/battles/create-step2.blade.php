@extends('layouts.dashboard')
@section('content')
    <div id="carousel-header" class="carousel slide carousel-fade" data-ride="carousel" style="height: 20vh;">
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <div class="view " style="background-image: url({{asset('img/pictures/battle3.jpg')}}); background-repeat: no-repeat; background-size: cover;background-position: top;">
                    <div class="h-100 display-sm-none text-white d-flex align-items-end justify-content-start pt-5 mx-lg-5 pl-dashboard text-lg-left text-center" >
                        <div class="header-wrap mb-lg-4 mb-md-4 mb-0 box-shadow ">
                            <h1 class="m-0 ">Add battle: <strong>step 11</strong></h1>
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
        <div class="mt-5 mb-5 text-center w-100 pt-4 pb-0">
            <h2>how many people played <span class="home-color ">{{ $game->name  }}</span>?</h2>
            <small class="font-roboto text-uppercase">Click on the totaal players that plays this game</small><br/>

        </div>
        <div class="row mt-5 mb-5">
            @for($i=0; $i < ($game->nop - 1);$i++)
                <div class="col-lg-3 col-md-4 col-12 mt-3 mb-3">
                    <form action="{{ route('battles.post.create-step2') }}" method="post">
                        @csrf
                        <button type="submit" name="players" value="{{ ($i+2) }}" class="w-100 d-flex flex-column justify-content-center align-items-center players-wrap games-wrap">
                            <span class="players-icon"><i class="fas fa-users"></i></span>
                            <span class="mt-2 mb-2 ft-25 players-content">{{ ($i+2) }} Players</span>
                        </button>
                     </form>
                </div>
            @endfor
        </div>
        <hr class="w-100"/>
        <div class="row mt-5 mb-5">
            <div class="col-12 text-right">
                @include('battles.back')
            </div>
        </div>
        <!-- Classic tabs -->
        <br />
        <br />
        <br />
        <br />
        <br />
    </main>
@endsection
