<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>DevMarketer</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        
        <nav class="navbar has-shadow navbar-menu">
            <div class="container ">
                <div class="navbar-start" style="overflow:visible;">
                    <a class="navbar-item" href=" {{url('home')}}">
                        <img src="https://bulma.io/images/bulma-logo.png" alt="DevMarketer Logo">
                    </a>
                    <!-- <div>
                        <b-navbar-item href="#"> Learn</b-navbar-item>
                        <b-navbar-item href="#"> Discuss</b-navbar-item>
                        <b-navbar-item href="#"> Share</b-navbar-item>
                        </div> -->
                    <a href="#" class="navbar-item is-tab is-hidden-mobile m-l-10">Learn</a>
                    <a href="#" class="navbar-item is-tab is-hidden-mobile">Discuss</a>
                    <a href="#" class="navbar-item is-tab is-hidden-mobile">Share</a>
                </div>
                <div class="navbar-end navbar-item buttons">
                    @if(!Auth::guest())
                        @if(Route::current()->getName() == 'login')
                        <a href="{{url('register')}}" class="button is-primary">Join the Community</a>
                        @elseif(Route::current()->getName()== 'register')
                        <a href="{{url('login')}}" class="button is-light">Login</a>
                        @else
                        <a href="{{url('login')}}" class="button is-light">Login</a>
                        <a href="{{url('register')}}" class="button is-primary">Join the Community</a>
                        @endif

                    @else
                    <butten class="navbar-item is-tab has-dropdown is-hoverable">
                       <a class="navbar-link"> Hey Alex </a>
                        <ul class=" navbar-dropdown">
                            <li><a class="navbar-item" href="#">
                            <span class="icon"><i class="fa fa-fw m-r-10 fa-user-circle-o"></i></span>    
                            Profile</a></li>
                            <li><a class="navbar-item" href="#">
                            <span class="icon"><i class="fa fa-fw m-r-10 fa-bell"></i></span>   
                            Notifications</a></li>
                            <li><a class="navbar-item" href="#">
                            <span class="icon"><i class="fa fa-fw m-r-10 fa-cog"></i></span>   
                            Settings</a></li>
                            <li><a class="navbar-item" href="#">
                            <span class="icon"><i class="fa fa-fw m-r-10 fa-sign-out"></i></span>   
                            Logout</a></li>
                        </ul>


                    </butten>

                    @endif
                </div>
            </div>
        </nav>
        
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
