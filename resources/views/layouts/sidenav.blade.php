<header>
    <!-- Navbar -->

    <!-- Sidebar -->
    <div class="sidebar-fixed position-fixed pl-0 pr-0 pb-1 box-shadow" style="background: #1a1a1a;">

        <div id="sidebar-user" class="d-flex flex-column justify-content-between h-100">
            <a class="logo-wrapper waves-effect w-100 p-4 d-flex align-items-center justify-content-center" style="z-index: 6;">
                <img src="{{asset('img/logo/logo-2.png')}}" width="100px"/>
            </a>

            {{--<a href="" class="d-flex justify-content-between p-4"  style="background: #c77e4999;">--}}
                {{--<span class="sidebar-link">Welcome: {{ Auth::user()->username }}</span>--}}
                {{--<span class="sidebar-icon"><i class="fas fa-user"></i></span>--}}
            {{--</a>--}}
            <a href="{{ route('home') }}" class="d-flex flex-column w-100 align-items-center align-items-center p-4" style="background: #c77e4999;">
               <span class="ft-30 text-white">
                     <i class="far fa-user-circle"></i>
               </span>
                <span class="ft-18 text-white"><b>{{ Auth::user()->username }}</b></span>
            </a>
            <a href="{{ route('home') }}" class="d-flex justify-content-between p-4" style=" background: #272727;z-index: 5;">
                <span class="sidebar-link">Account</span>
                <span class="sidebar-icon"><i class="fas fa-user"></i> </span>
            </a>
            <a href="{{ route('games') }}" class="d-flex justify-content-between p-4" style="background: #313131;z-index: 4;">
                <span class="sidebar-link">Games</span>
                <span class="sidebar-icon"><i class="fas fa-gamepad"></i></span>
            </a>
            <a href="{{ route('battles') }}" class="d-flex justify-content-between p-4" style="background: #3f3f3f;z-index: 3;">
                <span class="sidebar-link">battles</span>
                <span class="sidebar-icon"><i class="fas fa-handshake"></i></span>
            </a>
            <a href="{{ route('boards') }}" class="d-flex justify-content-between p-4" style="background: #464646;z-index: 2;">
                <span class="sidebar-link">leaderboard</span>
                <span class="sidebar-icon"><i class="fas fa-th-list"></i></span>
            </a>
            {{--<a href="/user/forum" class="d-flex justify-content-between p-4" style="background: #464646;">--}}
                {{--<span class="sidebar-link">logout</span>--}}
                {{--<span class="sidebar-icon"><i class="fas fa-power-off"></i></span>--}}
            {{--</a>--}}
            <div class="d-flex justify-content-between h-100 pt-1 pb-1" style="background: #525252;">
                <a href="{{ route('homie') }}" class="side-link text-white d-flex flex-column w-100 align-items-center  justify-content-center pt-4 pb-4 w-100 h-100" style="border-right: 1px solid #8b8b8b;">
                    <span class="ft-25"><i class="fas fa-home"></i></span>
                    <span class="ft-15">home</span>
                </a>
                <a href="{{ route('logout') }}" class="side-link text-white d-flex flex-column w-100 align-items-center justify-content-center pt-4 pb-4 w-100 h-100">
                    <span class="ft-25"><i class="fas fa-power-off"></i></span>
                    <span class="ft-15">Logout</span>
                </a>
            </div>
        </div>

    </div>
    <!-- Sidebar -->

</header>