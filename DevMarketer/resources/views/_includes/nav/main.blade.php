<nav class="navbar has-shadow ">
            <div class="container ">
                <div class="navbar-brand" >
                    <a class="navbar-item is-paddingless m-r-15" href=" {{url('home')}}">
                        <img src="{{asset('images/bulma-logo.png')}}" alt="DevMarketer Logo">
                    </a>
                    @if(Request::segment(1) == "manage")
                        <a id="admin-slidout-button" class="navbar-item">
                            <span class="icon"><i class="fa fa-angle-double-right"></i></span>
                        </a>
                    @endif

                    <a class="navbar-burger" role="button" aria-label="menu" aria-expanded="false">
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                    </a>                
                </div>
                <div class="navbar-menu">
                    <div class="navbar-start">
                        <a class="navbar-item is-tab is-active">Learn</a>
                        <a class="navbar-item is-tab">Discuss</a>
                        <a class="navbar-item is-tab">Share</a>
                    </div> <!-- end of .navbar-start -->
                    <div class="navbar-end nav-menu " style="over-flow: visable">
                        @if(Auth::guest())
                       
                        <a href="{{url('login')}}" class="button is-light">Login</a>
                        <a href="{{url('register')}}" class="button is-primary">Join the Community</a>

                        @else
                        <butten class="navbar-item is-tab has-dropdown is-hoverable">
                        <a class="navbar-link "> Hey {{Auth::user()->name}}</a>
                            <ul class=" navbar-dropdown">
                                <li><a class="navbar-item" href="#">
                                    <span class="icon"><i class="fa fa-fw m-r-10 fa-user-circle-o"></i></span>    
                                    Profile</a></li>
                                <li><a class="navbar-item" href="#">
                                <span class="icon"><i class="fa fa-fw m-r-10 fa-bell"></i></span>   
                                Notifications</a></li>
                                <li><a class="navbar-item" href="{{route('manage.dashboard')}}">
                                    <span class="icon"><i class="fa fa-fw m-r-10 fa-cog"></i></span>   
                                    Manage</a></li>
                                <li><a class="navbar-item" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <span class="icon"><i class="fa fa-fw m-r-10 fa-sign-out"></i></span>   
                                    Logout</a></li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </ul>
                        </butten>
                        
                        @endif
                    </div>

                </div>
            </div>
    </nav>

    <!-- <nav class="navbar has-shadow" >
        <div class="container">
            <div class="navbar-brand">
            <a class="navbar-item is-paddingless brand-item" href="{{route('home')}}">
                <img src="{{asset('images/devmarketer-logo.png')}}" alt="DevMarketer logo">
            </a>

            @if (Request::segment(1) == "manage")
                <a class="navbar-item is-hidden-desktop" id="admin-slideout-button">
                <span class="icon">
                    <i class="fa fa-arrow-circle-right"></i>
                </span>
                </a>
            @endif

            <button class="button navbar-burger">
            <span></span>
            <span></span>
            <span></span>
            </button>
            </div>
            <div class="navbar-menu">
            <div class="navbar-start">
                <a class="navbar-item is-tab is-active">Learn</a>
                <a class="navbar-item is-tab">Discuss</a>
                <a class="navbar-item is-tab">Share</a>
            </div> 


            <div class="navbar-end nav-menu" style="overflow: visible">
                @guest
                <a href="{{route('login')}}" class="navbar-item is-tab">Login</a>
                <a href="{{route('register')}}" class="navbar-item is-tab">Join the Community</a>
                @else
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">Hey {{Auth::user()->name}}</a>
                    <div class="navbar-dropdown is-right" >
                    <a href="#" class="navbar-item">
                        <span class="icon">
                        <i class="fa fa-fw fa-user-circle-o m-r-5"></i>
                        </span>Profile
                    </a>

                    <a href="#" class="navbar-item">
                        <span class="icon">
                        <i class="fa fa-fw fa-bell m-r-5"></i>
                        </span>Notifications
                    </a>
                    <a href="{{route('manage.dashboard')}}" class="navbar-item">
                        <span class="icon">
                        <i class="fa fa-fw fa-cog m-r-5"></i>
                        </span>Manage
                    </a>
                    <hr class="navbar-divider">
                    <a href="{{route('logout')}}" class="navbar-item" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                        <span class="icon">
                        <i class="fa fa-fw fa-sign-out m-r-5"></i>
                        </span>
                        Logout
                    </a>
                    </div>
                </div>
                @endguest
            </div>
            </div>

        </div>
    </nav> -->