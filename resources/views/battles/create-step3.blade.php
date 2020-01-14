@extends('layouts.dashboard')
@section('content')
    <div id="carousel-header" class="carousel slide carousel-fade" data-ride="carousel" style="height: 20vh;">
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <div class="view " style="background-image: url({{asset('img/pictures/battle3.jpg')}}); background-repeat: no-repeat; background-size: cover;background-position: top;">
                    <div class="h-100 display-sm-none text-white d-flex align-items-end justify-content-start pt-5 mx-lg-5 pl-dashboard text-lg-left text-center" >
                        <div class="header-wrap mb-lg-4 mb-md-4 mb-0 box-shadow ">
                            <h1 class="m-0 ">Add battle: <strong>step 111</strong></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <main class="pt-5 mx-lg-5">
        <div class="row mt-5 mb-0">
            @include('layouts.content.status')
        </div>
        <div class="mt-5 mb-1 text-center w-100 pt-4 pb-0">
            <h2>Who are these <span class="home-color">{{ count(session()->get('playersTotal'))   }}</span> soldiers?</h2>
            <small class="font-roboto text-uppercase">Fill in data for each player. </small><br/>

        </div>
        <div class="row mt-0 mb-5">
            <div class="col-lg-2 col-md-2 col-12"></div>
            <div class="col-lg-8 col-md-12 col-12 p-lg-2 p-2">
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

                <form class=" p-2 form-wrap" action="{{ route('battles.post.create-step3') }}" method="post">
                    @csrf
                    <ul class="stepper">
                        @foreach(session()->get('playersTotal')  as $number => $roman)
                            <li class="step" data-step-roman="{{ $roman }}">
                                <div data-step-label="Select existing player or add temporary player" class="step-title waves-effect waves-dark">Player {{ ($number + 1) }}</div>
                                <div class="step-new-content">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <ul class="nav nav-tabs no-border nav-tabs-user" role="tablist">
                                                <li class="nav-item mt-4 mb-lg-4 mb-md-4 mb-2 mb-4">
                                                    <a class="nav-link active p-2 existing" data-toggle="tab" role="tab" aria-controls="home" aria-selected="true" style="font-size: 18px;">
                                                        Existing user
                                                    </a>
                                                </li>
                                                <li class="nav-item mt-4 mb-lg-4 mb-md-4 mb-2 mb-4">
                                                    <a class="nav-link p-2 temp" data-toggle="tab" role="tab" aria-controls="profile" aria-selected="false" style="font-size: 18px;">
                                                        Temp. user
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="row mt-2 mb-2 existing-user {{ ($errors->has('person.username.'.$number) || $errors->has('person.email.'.$number)) ? '' : 'active' }}" >
                                        <div class="col-12">
                                            <div class="md-form">
                                                <select id="cSelect{{ $number }}" class="browser-default custom-select big-select no-radius existing-select" {{ ($errors->has('person.username.'.$number) || $errors->has('person.email.'.$number)) ? '' : "name=person[player][]" }}>
                                                    <option selected value="" >Search player</option>
                                                    @foreach($users as $user)
                                                        <option value="{{$user->username}}">{{$user->username}}</option>
                                                    @endforeach
                                                </select>
                                                <small class="text-danger">{{ $errors->first('person.player.'.$number) }}</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3 mb-3 temp-user {{ ($errors->has('person.username.'.$number) || $errors->has('person.email.'.$number)) ? 'active' : '' }}">
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="md-form">
                                                <div class="input-group-prepend h-100">
                                                    <div class="input-group-text"><i class="fas fa-id-card-alt ft-20"></i></div>
                                                </div>
                                                <input type="text"  class="form-control  pl-lg-0 pl-md-0 pl-3 temp-username ft-20 formInput{{ $errors->has('person.username.'.$number) ? ' is-invalid' : '' }}"
                                                       value="{{ old('person.username.'.$number) }}" {{ ($errors->has('person.username.'.$number) || $errors->has('person.email.'.$number)) ? "name=person[username][]" : "" }}>
                                                <label class="ft-20 pl-lg-0 pl-md-0 pl-3">Username</label>
                                            </div>
                                            <small class="text-danger">{{ $errors->first('person.username.'.$number) }}</small>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="md-form">
                                                <div class="input-group-prepend h-100">
                                                    <div class="input-group-text"><i class="fas fa-envelope ft-20"></i></div>
                                                </div>
                                                <input type="email"  class="form-control pl-lg-0 pl-md-0 pl-3  email   temp-email ft-20 formInput{{ $errors->has('person.email.'.$number) ? ' is-invalid' : '' }}"
                                                       value="{{ old('person.email.'.$number) }}" {{ ($errors->has('person.username.'.$number) || $errors->has('person.email.'.$number)) ? "name=person[email][]" : "" }}>
                                                <label class="ft-20 pl-lg-0 pl-md-0 pl-3 ">email</label>
                                            </div>
                                            <small class="text-danger email-danger">{{ $errors->first('person.email.'.$number) }}</small>
                                        </div>
                                    </div>
                                    <div class="step-actions d-flex justify-content-between">
                                        <a class="waves-effect waves-dark  previous-step ml-0 mt-4  pt-2 pb-2 text-black-50 bg-slight">BACK</a>
                                        <a class="waves-effect waves-dark btn bg-home-color-brown next-step ml-0 mt-4  pt-2 pb-2 text-white">CONTINUE</a>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                        <li class="step" data-step-roman="&#10004;">
                            <div class="step-title waves-effect waves-dark">Finished</div>
                            <div class="step-new-content">
                                <div class="d-flex w-100 flex-column justify-content-center align-items-center">
                                    <div class="text-center w-100 mt-2">
                                        <img src="{{asset('img/pictures/trophy.png')}}" height="75px" width="75px" />
                                    </div>
                                    <h3 class="p-2 text-center">Great job. Almost done!</h3>
                                    <hr class="w-100"/>
                                    <small class="p-2 text-center font-roboto text-uppercase">Click on <strong>continue</strong> and go to last step.</small>

                                </div>
                                <div class="step-actions d-flex justify-content-between">
                                    <a class="waves-effect waves-dark  previous-step ml-0 mt-4  pt-2 pb-2 text-black-50 bg-slight">BACK</a>
                                    <button type="submit" class="waves-effect waves-dark btn bg-home-color-brown ml-0 mt-4">CONTINUE</button>
                                </div>
                            </div>
                        </li>
                    </ul>
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

        <!-- Classic tabs -->
    </main>
@endsection
