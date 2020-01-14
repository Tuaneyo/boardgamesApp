@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center align-items-center mb-4" style="min-height: 100%;">
        <!-- Content -->
        <div class="container">
            <!--Grid row-->
            <div class="row pt-lg-0 pt-md-0 pt-5 mt-lg-0 mt-md-0 mt-2 box-shadow ">
                @include('layouts.content.auth', ['msgHeader' => 'Let\'s get started', 'msgSmall' => 'Discover the art of game administration'])
                <div class="col-lg-7 col-md-7 col-sm-12 no-radius">
                    <div class="card no-box-shadow">
                        <div class="card-body font-roboto p-lg-5 p-md-4 p-2">
                            <div class="card-header p-2 bg-white no-border d-flex flex-row align-items-center">
                                <h3 class="h1-reponsive text-uppercase home-color font-weight-bold wow fadeInDown mr-2" data-wow-delay="0.3s">
                                    <strong>Sign up</strong>
                                </h3>
                                <a href="{{ route('login.show') }}">
                                    <span class="text-light"> / login</span>
                                </a>

                            </div>
                            <form  method="post" action="{{ route('register.show') }}" class=" p-2 form-wrap">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="md-form">
                                            <div class="input-group-prepend h-100">
                                                <div class="input-group-text"><i class="fas fa-user-circle"></i></div>
                                            </div>
                                            <input type="text"  class="form-control formInput {{ $errors->has('fname') ? ' is-invalid' : '' }}" name="fname"
                                                   value="{{ old('fname') }}" required>
                                            <label >firstname</label>
                                            <small class="text-danger">{{ $errors->first('fname') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="md-form">
                                            <div class="input-group-prepend h-100">
                                                <div class="input-group-text"><i class="fas fa-user"></i></div>
                                            </div>
                                            <input type="text" name="lname" class="form-control formInput{{ $errors->has('lname') ? ' is-invalid' : '' }}" name="lname"
                                                   value="{{ old('lname') }}" required>
                                            <label>lastname</label>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="md-form">
                                            <div class="input-group-prepend h-100">
                                                <div class="input-group-text"><i class="fas fa-id-card-alt"></i></div>
                                            </div>
                                            <input type="text" name="username" class="form-control formInput{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username"
                                                   value="{{ old('username') }}" required>
                                            <label>Username</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="md-form">
                                            <div class="input-group-prepend h-100">
                                                <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                                            </div>
                                            <input type="email" name="email" class="form-control formInput{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                                   value="{{ old('email') }}" required>
                                            <label>email</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="md-form">
                                            <div class="input-group-prepend h-100">
                                                <div class="input-group-text addPlayerLabel"><i class="fas fa-unlock"></i></div>
                                            </div>
                                            <input type="password" name="password" class="form-control formInput {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                   required>
                                            <label >password</label>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="md-form">
                                            <div class="input-group-prepend h-100">
                                                <div class="input-group-text"><i class="fas fa-lock"></i></div>
                                            </div>
                                            <input type="password" name="password_confirmation" class="form-control formInput{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}"
                                                   required>
                                            <label>confirm password</label>
                                        </div>

                                    </div>
                                </div>
                                <div class="text-center mt-2 mb-2">
                                    <small>By clicking on <b>Create account</b> you agree with the <a href=""> terms and condition</a>
                                    .Just trust me
                                    </small>
                                </div>
                                <div class="w-100 d-flex justify-content-between align-items-end">
                                    <button type="submit" class="btn no-radius sign-btn mt-4 border-grey p-3">
                                        Create account
                                    </button>
                                    <a class="text-center"  style=" text-decoration: underline;"  href="{{ route('login.show') }}">
                                        Already account? log in
                                    </a>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
