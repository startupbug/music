<nav class="navbar  navbar-fixed-top music_navigation_main">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                <img src="{{asset('assets/images/site_logo.png')}}" class="img-responsive center-block" width="100%"/>
            </a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right music_navbar">
                <li><a href="">HOME</a></li>
                <li><a href="{{route('contest')}}">CONTEST</a></li>
                <li><a href="{{route('winner')}}">WINNER</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">Genre <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('musicvoting_genre')}}">Genre</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">artist <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('artist_detail')}}">Artist</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                    </ul>
                </li>
                <li><a href="#">Free Beats</a></li>
                <li><a href="{{route('musicvoting_search')}}"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                <li><a href="{{url('login')}}" class="btn btn-default">log in</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-->
</nav>