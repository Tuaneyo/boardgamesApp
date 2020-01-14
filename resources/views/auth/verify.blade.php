@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center align-items-center mb-4" style="min-height: 100%;">
        <!-- Content -->
        <div class="container">
            <!--Grid row-->
            <div class="row pt-lg-0 pt-md-0 pt-5 mt-lg-0 mt-md-0 mt-2 box-shadow ">
                @include('layouts.content.auth', ['msgHeader' => 'Almost there', 'msgSmall' => 'Now only verify your email'])
                <div class="col-lg-7 col-md-7 col-sm-12 no-radius">
                    <div class="card no-box-shadow">
                        <div class="card-body font-roboto p-lg-5 p-md-4 p-2">
                            <div class="card-header p-2 bg-white no-border d-flex flex-row align-items-end text-center">
                                <h3 class="h1-reponsive text-uppercase home-color font-weight-bold wow fadeInDown mr-2 mb-0" data-wow-delay="0.3s">
                                    <strong>Thank you </strong>
                                </h3>
                                <h5 class="text-black-50 text-uppercase mb-1"> , for joining us</h5>
                            </div>
                            <div class="d-flex w-100 flex-column justify-content-center align-items-center">
                                <div class="text-center w-100 mt-2">
                                    <img src="{{asset('img/pictures/trophy.png')}}" height="75px" width="75px" />
                                </div>
                                <small>Hi <b>{{ Auth::user()->username  }}</b>, congratulation!</small>
                                <h3 class="p-2 text-center">Your acount is almost done</h3>
                                <div class="d-flex justify-content-center align-items-center">
                                    <i class="far fa-envelope ft-25 mr-2" style="color: #9ac43c;"></i>
                                    <span class="text-black-50">{{Auth::user()->email}}</span>
                                </div>
                                <hr class="w-100"/>
                                <h5 class="p-2 text-center">Before proceeding, please check your email for a verification link.</h5>
                                <small class="">Did you not recieve email? click then on <b>resend mail</b></small>
                                <div class="w-100 d-flex justify-content-center align-items-end">
                                    <a href="{{ route('verification.resend') }}" class="btn no-radius sign-btn mt-4 border-grey">
                                        resend mail
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
