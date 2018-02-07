    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Music Voting</title>
    <!-- Bootstrap -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- FontAwesome -->
    <link href="{{asset('assets/css/font-awesome.min.css')}}" rel="stylesheet">

    <link href="{{asset('assets/css/responsive.css')}}" rel="stylesheet">

    <!-- Animate -->
    <link href="{{asset('assets/css/animate.css')}}" rel="stylesheet">
    <!-- Owl Slider -->
    <link href="{{asset('assets/css/owl.carousel.css')}}" rel="stylesheet">
    <!-- Owl Slider Theme -->
    <link href="{{asset('assets/css/owl.theme.css')}}" rel="stylesheet">
    <!--Jquery Validation -->
    <link href="{{asset('assets/css/validationEngine.jquery.css')}}" rel="stylesheet">

    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <!-- Custom -->
    <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet">
    <!-- StyleSheet -->
    <!-- Responsive -->



    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
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
                <li><a href="{{route('home')}}">HOME</a></li>
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
<div id="carousel-example-generic" class="carousel slide music_voting_slider" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li><!-- 
        <li data-target="#carousel-example-generic" data-slide-to="2"></li> -->
    </ol>
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img src="{{asset('assets/images/slider_banner_1.png')}}" class="img-responsive center-block" width="100%" alt="music voting">
            <div class="carousel-caption">
                <h2>the biggest contest is in session!</h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque pharetra at augue et facilisis.
                    Phasellus varius velit ut turpis dapibus,
                    quis consectetur lectus tristique.
                </p>
                <a href="#" class="btn btn-danger" data-toggle="modal" data-target=".bs-example-modal-sm">Go to contest
                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                </a>
            </div>
        </div>
        <div class="item">
            <img src="{{asset('assets/images/slider_banner_1.png')}}" class="img-responsive center-block" width="100%" alt="music voting">
            <div class="carousel-caption">
                <h2>the biggest contest is in session!</h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque pharetra at augue et facilisis.
                    Phasellus varius velit ut turpis dapibus,
                    quis consectetur lectus tristique.
                </p>
                <a href="#" class="btn btn-danger" data-toggle="modal" data-target=".bs-example-modal-sm">Go to contest
                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>