@extends('layouts.app')
@section('content')

        <!--/ Begin content -->
        <div class="content black home-shadow" style="background: rgba(0,0,0,.1);background-image: url('http://www.gsfdcy.com/data/img/17/1305119-chess-wallpaper.png'); background-repeat: no-repeat; background-size: cover;">

            <div class="d-flex pb-5 h-50 justify-content-end align-items-start rgba-black flex-column">
                <h1 class="pl-4 pt-4 pr-5 pb-0 text-uppercase black-header ">Welcome</h1>
                <hr class="divider" />
            </div>
            <div class="d-flex h-50 justify-content-start align-items-start pl-4 p-4 pr-lg-5 pr-md-4 pr-0 rgba-black flex-column">
                <div class="black-content mt-lg-4 mt-md-4 mt-0">
                     <span class="ft-18 pr-lg-5 pr-md-4 pr-0">
                        Welcome to ADSD 2019. This gorgeous application is a
                        a place to register and view boardgames easier and faster.
                        You don't want to do anything else other than using this super webapplication with friendly user interfaces.
                    </span>
                </div>
            </div>
        </div>
        <div class="content white">


            <div class="d-flex h-50 justify-content-center align-items-end p-2 position-relative flex-lg-row flex-md-row flex-column" style="top:3em;">
                <img src="{{asset('img/pictures/browser-content.png')}}" class="img-fluid box-shadow" width="500px" height="200px" />
            </div>
            <div class="d-flex h-50 justify-content-around align-items-center p-4 flex-column">
                <div>
                    <a href="{{ route('login.show') }}" class="btn sign-btn btn-black" style="color: white !important;">Let's get started</a>
                </div>
                <div class="d-flex justify-content-center align-items-center down-btn animated bounce slow position-relative" style="top:3em;">
                    <a href="" class="text-black">
                        <span class="ft-30 text-black">
                        <i class="fas fa-angle-down"></i>
                    </span>
                    </a>
                </div>
            </div>
        </div>
        <div class="container section" style="clear: both;">
            <div class="row">
                <div class="col-lg-12 text-center mt-5 p-5">
                    <h1 class="section-heading">MY GAMES</h1>
                    <small  class="section-subheading">How this works</small>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 d-flex align-items-center justify-content-center mb-4">

                        <div class="section-number home-text-shadow pr-lg-0 pr-md-0 pr-3">
                            <h1>1</h1>
                        </div>
                        <div class="section-content pl-4">
                            <p class="m-0 ft-18">
                                Create an <b>account</b> for free within one minute.
                            </p>
                        </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 d-flex align-items-center justify-content-center mb-4">
                        <div class="section-number home-text-shadow">
                            <h1>2</h1>
                        </div>
                        <div class="section-content pl-4">
                            <p class="m-0 ft-18">
                                <b>Activate</b> your account with just one click.
                            </p>
                        </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 d-flex align-items-center justify-content-center mb-4">
                    <div class="section-number home-text-shadow">
                        <h1>3</h1>
                    </div>
                    <div class="section-content pl-4">
                        <p class="m-0 ft-18">
                            Login and <b>enjoy</b> the possibilities we offer you!
                        </p>
                    </div>
                </div>
                <div class="col-lg-12 text-center p-5">
                    <a href="{{ route('register.show') }}" class="btn sign-btn btn-black">create account</a>
                </div>
            </div>
            <div class="row mt-5 mb-5">

            </div>
            <!--/ End conten-->
        </div>

        <br />
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
@endsection

{{--<div class="d-flex flex-row w-100 justify-content-between">--}}
{{--<div class="d-flex flex-column black-hover  p-4 w-100 justify-content-center  align-items-center" style="border: 1px solid #0a0a0b;">--}}
{{--<span class="ft-20"><i class="fas fa-plus"></i></span>--}}
{{--<span class="ft-20">GAMES</span>--}}
{{--</div>--}}
{{--<div class="d-flex flex-column black-hover p-4 w-100 justify-content-center  align-items-center" style="border: 1px solid #0a0a0b;border-left:0 !important;">--}}
{{--<span class="ft-20"><i class="fas fa-plus"></i></span>--}}
{{--<span class="ft-20">BATTLES</span>--}}
{{--</div>--}}
{{--<div class="d-flex  flex-column black-hover p-4 w-100 justify-content-center  align-items-center" style="border: 1px solid #0a0a0b;border-left:0 !important;">--}}
{{--<span class="ft-20"><i class="fas fa-plus"></i></span>--}}
{{--<span class="ft-20">FORUM</span>--}}
{{--</div>--}}
{{--</div>--}}