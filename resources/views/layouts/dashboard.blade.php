<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
        @include('layouts.head')
</head>
<body>

        @include('layouts.nav')
        <!--Main Navigation-->
        @include('layouts.sidenav')
        @if (session('status'))
                <div class="alert alert-success d-alert" role="alert">
                        {{ session('status') }}
                </div>
        @elseif(session('danger'))
                <div class="alert alert-danger d-alert" role="alert">
                        {{ session('danger') }}
                </div>
        @elseif(session('info'))
                <div class="alert alert-info d-alert" role="alert">
                        {{ session('info') }}
                </div>
        @endif

        @yield('content')

        @include('layouts.dash-footer')
        @include('layouts.scripts')

</body>
</html>
