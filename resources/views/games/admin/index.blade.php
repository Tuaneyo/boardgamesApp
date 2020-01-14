@extends('layouts.dashboard')
@section('content')
    @include('layouts.content.game-create-bg', ['title' => 'manage all games'])
    <main class="pt-5 mx-lg-5">
        <!-- Custom breadcrums -->
        <div class="d-flex flex-row justify-content-between align-items-center">
            <div class="bread-wrap h-100 d-flex align-items-center">
                <ol class="widgets ft-20 p-0 m-0">
                    <li><a href="{{ route('home') }}"><i class="fas fa-gamepad"></i></a></li>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li class="home-color"><a href="#">manage</a></li>
                </ol>
            </div>
            <a id="back-btn" href="javascript:history.back()" class="btn bg-white home-color ft-18 pt-2 pb-2 no-box-shadow no-radius" style="border: 1px solid #c88859;">
                <i class="fas fa-arrow-left"></i>
                Back
            </a>
        </div>
        <!-- Custom breadcrums -->
        <div class="row animated fadeIn mt-5">

            <!--Grid column-->
            <div class="col-md-12 mb-4">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">All games</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">All battles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#users" role="tab" aria-controls="profile" aria-selected="false">
                            {{ (Auth::user()->isAdmin()) ? 'All users' : 'my account'}}
                        </a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active " id="home" role="tabpanel" aria-labelledby="home-tab">
                        <!--Card-->
                        @include('layouts.content.allGames')
                        <!--/.Card-->
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        @include('layouts.content.allBattles')
                    </div>
                    <div class="tab-pane fade" id="users" role="tabpanel" aria-labelledby="profile-tab">
                        @include('layouts.content.allUsers')
                    </div>
                </div>


            </div>
            <!--Grid column-->


        </div>
    </main>
@endsection
