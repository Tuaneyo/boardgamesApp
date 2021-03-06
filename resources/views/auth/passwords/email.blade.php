@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center align-items-center mb-4" style="min-height: 100%;">
        <!-- Content -->
        <div class="container">
            <!--Grid row-->
            <div class="row pt-lg-0 pt-md-0 pt-5 mt-lg-0 mt-md-0 mt-2 box-shadow ">
                @include('layouts.content.auth', ['msgHeader' => 'Don\'t you worry', 'msgSmall' => 'cause every little thing, is gonna be alright'])
                <div class="col-lg-7 col-md-7 col-sm-12 no-radius">
                    <div class="card no-box-shadow">
                        <div class="card-body font-roboto p-lg-5 p-md-4 p-2">
                            <div class="card-header p-2 bg-white no-border d-flex flex-row align-items-center">
                                <h3 class="h1-reponsive text-uppercase home-color font-weight-bold wow fadeInDown mr-2" data-wow-delay="0.3s">
                                    <strong>Password reset</strong>
                                </h3>
                                <a href="{{ route('login.show') }}">
                                    <span class="text-light"> / log in</span>
                                </a>

                            </div>
                            <form method="POST" class="form-wrap p-2" action="{{ route('password.email') }}" >
                                @csrf
                                <div class="md-form mb-4">
                                    <div class="input-group-prepend h-100">
                                        <div class="input-group-text "><i class="fas fa-user-circle"></i></div>
                                    </div>
                                    <input type="email"  class="form-control ft-20 {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                           name="email" value="{{ old('email') }}" required >
                                    <label>E-mail</label>
                                    <small class="text-danger">{{ $errors->first('email') }}</small>
                                </div>
                                <div class="text-center mt-2 mb-2">
                                    <small>
                                       Please, enter the email that you sign up with.
                                    </small>
                                </div>
                                <div class="d-flex w-100 flex-column justify-content-center align-items-start">
                                    <div class="w-100 d-flex justify-content-between align-items-end">
                                        <button type="submit" class="btn no-radius sign-btn mt-4 border-grey">
                                            Send me reset link
                                        </button>
                                        <a class="text-center"   style=" text-decoration: underline;"  href="{{ route('login.show') }}">
                                            remember again? login
                                        </a>
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
