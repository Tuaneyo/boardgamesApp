@extends('layouts.dashboard')
@section('content')
    @include('layouts.content.game-create-bg', ['title' => 'add games'])
    <main class="pt-5 mx-lg-5">
        <div class="row">
            <div class="col-12">
                <!-- Custom breadcrums -->
                <div class="d-flex flex-row justify-content-between align-items-center">
                    <div class="bread-wrap h-100 d-flex align-items-center">
                        <ol class="widgets ft-20 p-0 m-0">
                            <li><a href="{{ route('home') }}"><i class="fas fa-gamepad"></i></a></li>
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li class="home-color"><a href="{{ route('games.create.show') }}">Add game</a></li>
                        </ol>
                    </div>
                    <a id="back-btn" href="javascript:history.back()" class="btn bg-white home-color ft-18 pt-2 pb-2 no-box-shadow no-radius" style="border: 1px solid #c88859;">
                        <i class="fas fa-arrow-left"></i>
                        Back
                    </a>
                </div>
                <hr class="w-100" />
                <!-- Custom breadcrums -->
            </div>
        </div>

        <div class="row mt-4 mb-5">
            <div class="col-12 ">
                <form  method="POST" action="{{ route('games.create.post') }}" enctype="multipart/form-data">
                @csrf
                <!-- Select game dan date -->
                    <div class="row ">
                        <div class="col-lg-7 col-md-6 col-sm-12 account-card">
                            <div class="card ownCard">
                                <div class="card-body">
                                    <div class="form-group w-100">
                                        <label>Name<small>*</small></label>
                                        <div class="input-group h-100">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fas fa-dice-six"></i></div>
                                            </div>
                                            <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"  placeholder="game name" value="{{ old('name') }}">

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div id="players" >
                                                <div class="form-group">
                                                    <label>date of register <small>*</small></label>
                                                    <div class="input-group h-100">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
                                                        </div>
                                                        <select class="year form-control no-radius " name="dor">
                                                            <option  value="2018" ></option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group ">
                                                <label>duration <small>*</small></label>
                                                <div class="input-group h-100">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><i class="fas fa-clock"></i></div>
                                                    </div>
                                                    <input type="number"  name="duration" class="form-control{{ $errors->has('nop') ? ' is-invalid' : '' }}" placeholder="minutes" value="{{ old('duration') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group w-100">
                                        <label>Number of players <small>*</small></label>
                                        <div class="input-group h-100">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
                                            </div>
                                            <input type="text" name="nop" min="2" max="15" maxlength="2" class="form-control{{ $errors->has('nop') ? ' is-invalid' : '' }}"  placeholder="min. of 2 players" value="{{ old('nop') }}" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>description</label>
                                        <div class="input-group h-100">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fas fa-align-justify"></i></div>
                                            </div>
                                            <textarea rows="4" name="description" cols="50" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="description of the game">{{ old('description') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6 col-sm-12 account-card d-flex flex-column justify-content-between">
                            <div class="card ownCard">
                                <div class="card-body">
                                    <div class="form-group w-100 pb-0 mb-0">
                                        <span class="form-heading-text">Upload image</span>
                                    </div>
                                    <div class="w-100 text-center">
                                        <img src="{{ asset('img/pictures/mountain-sun.svg') }}" class="img-fluid " width="150px" height="200px"  />
                                    </div>
                                    <div class="input-group p-3">
                                        <div class="input-group-prepend w-100 file-wrap">
                                            <input class="input-file" id="my-file" type="file" name="image" />
                                            <div class="d-flex flex-row"></div>
                                            <label class="input-file-trigger btn btn-md m-0 px-3 py-2 z-depth-0 waves-effect text-dark" style="border:2px solid black!important; min-width: 100px;" tabindex="0" for="my-file">Select image</label>
                                            <input class="no-br w-100 border-bottom-btn ml-2 pl-2" id="my-filename" type="text" placeholder="i.e game.jpg" />
                                        </div>
                                        <small class="text-danger">{{ $errors->first('image') }}</small>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-lg-0 mt-md-0 mt-5 mb-lg-0 mb-md-0 mb-3 pt-lg-4 pt-0">
                                <div class="col-3 pr-0">
                                    <img src="{{ asset('img/pictures/avatar.png') }}" class="img-fluid border-light radius-100 box-shadow "
                                         width="100%" height="100%" style="max-width: 80px; max-height: 80px;"/>
                                </div>
                                <div class="col-9 pl-lg-1 pl-md-1 pl-3">
                                    <div class="d-flex flex-column justify-content-center text-black w-100 h-100">
                                        <span class="form-heading-text">Author</span>
                                        <hr class="mt-1 mb-1" style="border-color:#ced4da;width: 100%;" />
                                        <span class="text-uppercase">{{ Auth::user()->username }}</span>
                                    </div>
                                </div>
                            </div>
                            {{--<div class="d-flex flex-row w-100 align-items-center mt-4 ">--}}
                            {{----}}
                            {{----}}
                            {{--</div>--}}



                            <div class="d-flex justify-content-end align-items-center flex-column ">
                                <small class="m-3">* Required, must be selected or filled in. </small>
                                <button type="submit" class="btn sign-btn btn-black text-white w-100" >create game</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
