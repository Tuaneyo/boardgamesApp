@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center align-items-center mb-4" style="min-height: 100%;">
        <!-- Content -->
        <div class="container">
            <!--Grid row-->
            <div class="row pt-lg-0 pt-md-0 pt-5 mt-lg-0 mt-md-0 mt-2 box-shadow ">
                <div class="col-lg-5 col-md-5 col-sm-12 w-100 d-flex h-auto w-100 text-dark justify-content-center align-items-center p-0">
                    <div id="commerce" class="view" style="background-image: url('https://fruitguys.com/sites/default/files/2018-01-worklife-clean-desk-organized-123rf-41084086-MAIN_0.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
                        <!-- Mask & flexbox options-->
                        <div class="mask rgba-gradient waves-effect h-100 waves-light rgba-home-light font-roboto" style="height: 100vh;">
                            <div class="d-flex flex-column justify-content-around align-items-center h-100">
                                <a class="logo">
                                    <img src="{{asset('img/logo/logo-2.png')}}" width="100px" height="50px" />
                                </a>
                                <div class="d-flex text-white text-uppercase flex-column text-center">
                                    <h1 class="font-weight-bold">Almost there</h1>
                                    <small>This time remember your password</small>
                                </div>
                                <div class="d-flex text-white app-func-list align-items-center">
                                    <div class="d-flex flex-column p-3 w-100 justify-content-center align-items-center func-content" >
                                        <span class="">GAMES</span>
                                    </div>
                                    <span class="ml-1 mr-1 ft-10"><i class="far fa-circle"></i></span>
                                    <div class="d-flex flex-column  p-3 w-100 justify-content-center align-items-center func-content" >
                                        {{--<span class=""><i class="far fa-circle"></i></span>--}}
                                        <span class="">BATTLES</span>
                                    </div>
                                    <span class="ml-1 mr-1 ft-10"><i class="far fa-circle"></i></span>
                                    <div class="d-flex  flex-column p-3 w-100 justify-content-center align-items-center func-content" >
                                        {{--<span class=""><i class="far fa-circle"></i></span>--}}
                                        <span class="">FORUM</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-7 col-md-7 col-sm-12 no-radius">
                    <div class="card no-box-shadow">
                        <div class="card-body font-roboto p-lg-5 p-md-4 p-2">
                            <div class="card-header p-2 bg-white no-border d-flex flex-row align-items-center">
                                <h3 class="h1-reponsive text-uppercase home-color font-weight-bold wow fadeInDown mr-2" data-wow-delay="0.3s">
                                    <strong>Reset password</strong>
                                </h3>
                            </div>
                            <form method="POST" class="form-wrap p-2" action="{{ route('password.update') }}" >
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">

                                <div class="md-form mb-4">
                                    <div class="input-group-prepend h-100">
                                        <div class="input-group-text "><i class="fas fa-user-circle"></i></div>
                                    </div>
                                    <input type="email"  class="form-control ft-20 {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                           name="email" value="{{ old('email') }}" required >
                                    <label>E-mail</label>
                                    <small class="text-danger">{{ $errors->first('email') }}</small>
                                </div>
                                <div class="md-form mb-4">
                                    <div class="input-group-prepend h-100">
                                        <div class="input-group-text addPlayerLabel"><i class="fas fa-unlock"></i></div>
                                    </div>
                                    <input type="password" name="password" class="form-control formInput {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                           required>
                                    <label >password</label>
                                    <small class="text-danger">{{ $errors->first('password') }}</small>
                                </div>
                                <div class="md-form mb-4">
                                    <div class="input-group-prepend h-100">
                                        <div class="input-group-text"><i class="fas fa-lock"></i></div>
                                    </div>
                                    <input type="password" name="password_confirmation" class="form-control formInput{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}"
                                           required>
                                    <label>confirm password</label>
                                </div>
                                <div class="d-flex w-100 flex-column justify-content-center align-items-start">
                                    <div class="w-100 d-flex justify-content-between align-items-end">
                                        <button type="submit" class="btn no-radius sign-btn mt-4 border-grey">
                                            reset password
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
