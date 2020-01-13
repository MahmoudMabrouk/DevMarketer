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
                    @if(Auth::guest())
                       
                        <a href="{{url('login')}}" class="button is-light">Login</a>
                        <a href="{{url('register')}}" class="button is-primary">Join the Community</a>

                    @else
                    <butten class="navbar-item is-tab has-dropdown is-hoverable">
                       <a class="navbar-link"> Hey {{Auth::user()->name}} </a>
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
    </nav>