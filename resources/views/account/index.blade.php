@extends('layouts.dashboard')
@section('content')
    <div id="carousel-header" class="carousel slide carousel-fade" data-ride="carousel" style="height: 20vh;">
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <div class="view " style="background-image: url({{asset('img/pictures/wallpaper2.jpg')}});background-repeat: no-repeat; background-size: cover;background-position: center;">
                    <div class="h-100 display-sm-none text-white d-flex align-items-end justify-content-start pt-5 mx-lg-5 pl-dashboard text-lg-left text-center" >
                        <div class="header-wrap mb-lg-4 mb-md-4 mb-0 box-shadow ">
                            <h1 class="m-0 ">My account</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <main class="pt-5 mx-lg-5">
        <div class="row">
            <div class="col-12">
                <!-- Custom breadcrums -->
                <div class="d-flex flex-row justify-content-between align-items-center">
                    <div class="bread-wrap h-100 d-flex align-items-center">
                        <ol class="widgets ft-20 p-0 m-0">
                            <li><a href="{{ route('home') }}"><i class="fas fa-gamepad"></i></a></li>
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li class="home-color"><a href="">edit account</a></li>
                        </ol>
                    </div>
                    <a id="back-btn" href="javascript:history.back()" class="btn bg-white home-color ft-18 pt-2 pb-2 no-box-shadow no-radius" style="border: 1px solid #c88859;">
                        <i class="fas fa-arrow-left"></i>
                        Back
                    </a>
                </div>
                <!-- Custom breadcrums -->
            </div>
        </div>

        <div class="row mt-4 mb-5" >
            <div class="col-12 ">

                <!-- Select game dan date -->
                    <div class="row mt-3 mb-3 position-relative " style="border-top: 1px solid rgba(0,0,0,.1);">
                        <div class="d-flex position-absolute diamond">
                            <i class="far fa-circle bg-white ft-20" ></i>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 account-card p-lg-5 p-md-4 p-2" style="border-right: 1px solid rgba(0,0,0,.1);">
                            <form  method="POST" action="{{ route('account.post') }}">
                                @csrf
                            <div class="card ownCard bg-transparent no-box-shadow">
                                <div class="card-header bg-transparent">
                                    <div class="w-100 h-100 home-color text-center">
                                        <h5 class="m-0 p-2">Account information</h5>
                                    </div>
                                </div>
                                <div class="card-body mt-4">
                                    <div class="form-group w-100">
                                        <label>first name<small>*</small></label>
                                        <div class="input-group h-100">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fas fa-user"></i></div>
                                            </div>
                                            <input type="text" name="fname" class="form-control{{ $errors->has('fname') ? ' is-invalid' : '' }}"
                                                   placeholder="game name" value="{{ $user->fname }}">
                                        </div>
                                        <small class="text-danger">{{ $errors->first('fname') }}</small>
                                    </div>
                                    <div class="form-group w-100">
                                        <label>last name<small>*</small></label>
                                        <div class="input-group h-100">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fas fa-id-card-alt"></i></div>
                                            </div>
                                            <input type="text" name="lname" class="form-control{{ $errors->has('lname') ? ' is-invalid' : '' }}"
                                                   placeholder="game name" value="{{ $user->lname }}">
                                        </div>
                                        <small class="text-danger">{{ $errors->first('lname.') }}</small>
                                    </div>
                                </div>
                            </div>
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn sign-btn home-btn pr-4 pl-4 pt-2 pb-2 ft-18">
                                       update
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 account-card  p-lg-5 p-md-4 p-2">
                            <form method="POST"  action="{{ route('password.email') }}" >
                                @csrf
                                <div class="card ownCard bg-transparent no-box-shadow">
                                    <div class="card-header bg-transparent">
                                        <div class="w-100 h-100 text-center home-color">
                                            <h5 class="m-0 p-2">login information</h5>
                                        </div>
                                    </div>
                                    <div class="card-body mt-4">
                                        <div class="form-group w-100">
                                            <label class="home-color">username</label>
                                            <div class="input-group h-100">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fas fa-user-circle"></i></div>
                                                </div>
                                                <input type="text" class="form-control" disabled
                                                        value="{{ $user->username }}">
                                            </div>
                                        </div>
                                        <div class="form-group w-100">
                                            <label class="home-color">email</label>
                                            <div class="input-group h-100">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                                                </div>
                                                <input type="text"  class="form-control" disabled
                                                       value="{{ $user->email }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 text-center">
                                    <input type="hidden" name="email" value="{{ $user->email }}" />
                                    <button type="submit" class="btn sign-btn btn-black text-white">
                                        create new password
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>

            </div>
        </div>
    </main>
@endsection
