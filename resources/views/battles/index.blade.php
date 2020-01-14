@extends('layouts.dashboard')
@section('content')
    <div id="carousel-header" class="carousel slide carousel-fade" data-ride="carousel" style="height: 40vh;">
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <div class="view v-section" style="background-image: url({{asset('img/pictures/battle-roman2.jpg')}}); background-repeat: no-repeat; background-size: cover;background-position: center;">
                    <div class="h-100 pb-lg-4 pb-2 text-white flex-column d-flex align-items-start justify-content-end pt-5 mx-lg-5 pl-dashboard text-lg-left text-center" >
                        <div class="btn-icon position-relative text-lg-left text-md-left text-center ml-lg-0  ml-2">
                            <a href="{{ route('battles.create-step1') }}" class="btn pr-5 pl-5 m-0 ft-18 box-shadow" style="color: white !important;background: #c88859;">
                                Add new battle
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <main class="pt-5 mx-lg-5 mb-5">
        <!-- Custom breadcrums -->
        <div class="d-flex flex-row justify-content-between align-items-center">
            <div class="bread-wrap h-100 d-flex align-items-center">
                <ol class="widgets ft-20 p-0 m-0">
                    <li><a href="{{ route('home') }}"><i class="fas fa-gamepad"></i></a></li>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li class="home-color"><a href="#">Battles</a></li>
                </ol>
            </div>
            <a id="back-btn" href="javascript:history.back()" class="btn bg-white home-color ft-18 pt-2 pb-2 no-box-shadow no-radius" style="border: 1px solid #c88859;">
                <i class="fas fa-arrow-left"></i>
                Back
            </a>
        </div>
        <!-- Custom breadcrums -->
        @include('layouts.content.divider', ['msgDivider' => 'Most recent battles '])
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">My battles</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Al battles</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active " id="home" role="tabpanel" aria-labelledby="home-tab">
                <!-- Battles row 3 -->
                @if($battles && count($myBattles))
                    @include('layouts.content.battles', ['battles' => $myBattles])
                @else
                    <div class="row mt-5 ">
                        <div class="col-3">
                            @include('layouts.content.addGame', ['link' => 'battles.create-step1', 'name' => 'battle'])
                        </div>
                    </div>
                @endif

            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                @if($battles)
                    @include('layouts.content.battles', ['battles' => $battles])
                @endif

                <div class="row mt-4">
                    @if(!count($battles))
                        <div class="col-lg-3 col-md-3 col-12">
                            @include('layouts.content.addGame', ['link' => 'battles.create-step1', 'name' => 'battles'])
                        </div>
                    @endif
                </div>
            </div>

        </div>

    </main>
@endsection
