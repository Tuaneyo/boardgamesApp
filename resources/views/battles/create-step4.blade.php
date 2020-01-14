@extends('layouts.dashboard')
@section('content')
    <div id="carousel-header" class="carousel slide carousel-fade" data-ride="carousel" style="height: 20vh;">
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <div class="view " style="background-image: url({{asset('img/pictures/battle3.jpg')}}); background-repeat: no-repeat; background-size: cover;background-position: top;">
                    <div class="h-100 display-sm-none text-white d-flex align-items-end justify-content-start pt-5 mx-lg-5 pl-dashboard text-lg-left text-center" >
                        <div class="header-wrap mb-lg-4 mb-md-4 mb-0 box-shadow ">
                            <h1 class="m-0 ">Add battle: <strong>step 1V</strong></h1>
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
            <h2>Fill in battle outcome</h2>
            <small class="font-roboto text-uppercase">Fill in for each player score and select the champion.</small><br/>

        </div>
        <div class="row mt-5 mb-5">
            <div class="col-lg-2 col-md-2 col-12"></div>
            <div class="col-lg-8 col-md-12 col-12">
                <div class="row mt-4 p-2">
                    @if($errors->any())
                        <div class="col-12">
                            <h6>Please check the following soldiers: </h6>
                        </div>
                        @foreach ($errors->all() as $key => $error)
                            <div class="col-lg-6 col-md-6 col-12 mt-1">
                                <div class="d-flex flex-column error-wrap">
                                    <div class="d-flex">
                                        <div class="error-icon d-flex justify-content-around align-items-center w-25 ">
                                            <i class="fab fa-wpforms ft-20"></i>
                                            <span class="ft-20">{{($key + 1)}}</span>
                                        </div>
                                        <span class="error-msg w-75 ml-1 d-flex justify-content-start align-items-center pl-4">{{$error}}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <hr class="w-100 mb-0"/>
                    @endif

                </div>
                <form class=" form-wrap" action="{{ route('battles.post.create-step4') }}" method="post">
                    @csrf
                <div class="row">
                    @foreach($players as $i => $username)
                        <div class="col-lg-6 col-md-6 col-12 mt-4 mb-5">
                            <a name="players" class="w-100 pt-4 pb-4 no-border box-shadow d-flex flex-column justify-content-center align-items-center players-wrap score-wrap position-relative ">
                                <div class="d-flex justify-content-around w-100 board-wrap">
                                    <div class="board"></div>
                                    <div class="board"></div>
                                </div>
                                <span class="mt-2 mb-2 ft-30 players-content">{{ $username }}</span>
                                <div class="d-flex mt-2 mb-2 flex-column" style="font-family: 'Orbitron', sans-serif;">
                                    <div class="w-100 text-center score-text mt-2 mb-2">
                                        Score
                                    </div>
                                    <div class="d-flex score-content">
                                        <input type="text" maxlength="1" name="score[{{$i}}][]" oninput="this.value=this.value.replace(/[^0-9]/g,'');" placeholder="0" autofocus/>
                                        <input type="text" maxlength="1" name="score[{{$i}}][]" oninput="this.value=this.value.replace(/[^0-9]/g,'');" placeholder="0" autofocus/>
                                        <input type="text" maxlength="1" name="score[{{$i}}][]" oninput="this.value=this.value.replace(/[^0-9]/g,'');" placeholder="0" autofocus/>
                                        <input type="text" maxlength="1" name="score[{{$i}}][]" oninput="this.value=this.value.replace(/[^0-9]/g,'');" placeholder="0" autofocus/>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <hr class="w-100 mt-5 mb-0 "/>
                <div class="row mt-0">
                    <div class="col-lg-6 col-md-6 col-12 mb-3 troca-wrap">
                        <div class="w-100 h-100 p-4 d-flex flex-column align-items-center justify-content-between ">
                            <span class="mt-2 mb-2 troca-icon"><i class="fas fa-trophy" ></i></span>
                            <small>Wonby</small>
                            <div class="md-form w-100 troca-content">
                                <small class="text-danger">{{ $errors->first('wonby') }}</small>
                                <select class="browser-default custom-select big-select no-radius existing-select w-100 no-box-shadow" name="wonby" >
                                    <option selected value="">Open this select menu</option>
                                    @foreach($players as $i => $username)
                                        <option value="{{$username}}">{{$username}}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>

                    </div>
                    <div class="col-lg-6 col-md-6 col-12 mt-lg-0 mt-md-0 mt-3 mb-3 troca-wrap">
                        <div class="w-100 h-100 p-4 d-flex flex-column align-items-center justify-content-between">
                            <span class="mt-2 mb-2 troca-icon"><i class="fas fa-calendar"></i></span>
                            <small>date played</small>
                            <div class="md-form w-100 troca-content">
                                <div class="input-group h-100">
                                    <input type="date" name="dtPlayed" class="form-control date-input {{ $errors->has('dtPlayed') ? ' is-invalid' : '' }}" placeholder="minutes" value="{{ old('dtPlayed') }}">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="w-100 text-center mt-5 d-flex flex-column align-items-center">
                    <small class="m-3">It was a rought battle soldier! Save this battle to write history. </small>
                    <button type="submit" class="btn sign-btn btn-black text-white" >save battle</button>
                </div>
                </form>


            </div>
            <div class="col-lg-2 col-md-2 col-12"></div>


        </div>
        <hr class="w-100"/>
        <div class="row mt-5 mb-5">
            <div class="col-12 text-right">
                @include('battles.back')
            </div>
        </div>
    </main>
@endsection
