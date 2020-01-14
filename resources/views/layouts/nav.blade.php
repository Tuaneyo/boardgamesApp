<!-- Navbar-->
<div class="container-fluid p-0">
    <nav class="navbar navbar-dark scrolling-navbar pr-2 pl-4 bg-transparent no-box-shadow" style="position:fixed;width:100%;z-index:1000;">
        <a class="logo">
            <img src="{{asset('img/logo/logo-2.png')}}" width="100px" height="50px" />
        </a>
        <!-- Collapse button-->
        <!--button.navbar-toggler.toggler-example.p-nav(type='button', style='padding: 1em 1.5em;', data-toggle='collapse', data-target='#navbarSupportedContent1', aria-controls='navbarSupportedContent1', aria-expanded='false', aria-label='Toggle navigation')-->
        <button class="navbar-toggler toggler-example p-nav pr-4 ft-30" style="color:black;" id="navbar-ham" type="button" data-target="#centerModalSuccess" data-toggle="modal"><span class="dark-blue-text"><i class="fa fa-bars fa-1x nav-fa-bars"></i></span></button>
    </nav>
    <!-- modal-->
    <div class="modal animated fadeInRight fast "  id="centerModalSuccess" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="left:unset;">
        <div class="modal-dialog modal-notify fixed-modal m-0 h-100" role="document">
            <!-- Content-->
            <div class="modal-content h-100">
                <!-- Header-->
                <div class="modal-header m-header d-flex justify-content-between p-2 bg-dark" style="height: 60px;">
                    <img src="{{asset('img/logo/logo-2.png')}}" width="70px" height="100%"/>
                    <button class="close nav-close ft-30" type="button" data-dismiss="modal" aria-label="Close"><span class="white-text" aria-hidden="true">×</span></button>
                </div>
                <!-- Body-->
                <div class="modal-body p-0 position-relative">
                    <!-- Links-->
                    <ul class="navbar-nav mr-auto flex-md-row justify-content-around o-nav flex-wrap oNav">
                        <li class="nav-item o-nav-item w-100">
                            <a class="nav-link h-100 p-4 d-flex flex-column justify-content-center align-items-center" href="{{ route('home') }}">
                                <span class="p-2">
                                    <i class="fas fa-home nav-icons"></i>
                                </span>
                                <span class="p-2 oNav-text">home</span>
                            </a>
                        </li>
                        <li class="nav-item o-nav-item w-100" >
                            <a class="nav-link h-100 p-4 d-flex flex-column justify-content-center align-items-center" href="{{ route('games') }}">
                                <span class="p-2">
                                    <i class="fas fa-gamepad nav-icons"></i>
                                </span>
                                <span class="p-2 oNav-text">games</span>
                            </a></li>
                        <li class="nav-item o-nav-item w-100" >
                            <a class="nav-link h-100 p-4 d-flex flex-column justify-content-center align-items-center" href="{{ route('battles') }}">
                                <span class="p-2">
                                     <i class="fas fa-fist-raised nav-icons"></i>
                                </span>
                                <span class="p-2 oNav-text">battles</span>
                            </a>
                        </li>
                        <li class="nav-item o-nav-item w-100" >
                            <a class="nav-link h-100 p-4 d-flex flex-column justify-content-center align-items-center" href="{{ route('boards') }}">
                                <span class="p-2"><i class="fas fa-th-list nav-icons"></i></span>
                                <span class="p-2 oNav-text">leaderboards</span>
                            </a>
                        </li>
                        @if(!Auth::user())
                        <li class="nav-item o-nav-item w-100" >
                            <a class="nav-link h-100 p-4 d-flex flex-column justify-content-center align-items-center" href="{{ route('login.show') }}" >
                                <span class="p-2">
                                    <i class="fas fa-sign-in-alt nav-icons"></i>
                                </span>
                                <span class="p-2 oNav-text">login</span>
                            </a>
                        </li>
                        <li class="nav-item o-nav-item w-100" >
                            <a class="nav-link h-100 p-4 d-flex flex-column justify-content-center align-items-center" href="{{ route('register.show') }}">
                                <span class="p-2">
                                   <i class="fas fa-user nav-icons"></i>
                                </span>
                                <span class="p-2 oNav-text">register</span>
                            </a>
                        </li>
                        @else
                            <li class="nav-item o-nav-item w-100" >
                                <a class="nav-link h-100 p-4 d-flex flex-column justify-content-center align-items-center" href="{{ route('account') }}">
                                <span class="p-2">
                                    <i class="fas fa-book-reader nav-icons"></i>
                                </span>
                                    <span class="p-2 oNav-text">account</span>
                                </a>
                            </li>
                            <li class="nav-item o-nav-item w-100" >
                                <a class="nav-link h-100 p-4 d-flex flex-column justify-content-center align-items-center" href="{{ route('logout') }}">
                                <span class="p-2">
                                    <i class="fas fa-power-off nav-icons"></i>
                                </span>
                                    <span class="p-2 oNav-text">logout</span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
                <!-- Footer-->
                <div class="modal-footer justify-content-center bg-dark p-2">
                    <p class="m-0 text-white test"><small>&copy; Copyright 2018: Tuan Nguyen</small></p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="position-absolute w-100 bg-transparent" style="height: 60px;">

</div>