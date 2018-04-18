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
            <img src="{{asset('public/assets/images/slider_banner_1.png')}}" class="img-responsive center-block" width="100%" alt="music voting">
            <div class="carousel-caption">
                <h2>the &nbsp; biggest &nbsp; contest &nbsp; is &nbsp; in &nbsp; session!</h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque pharetra at augue et facilisis.
                    Phasellus varius velit ut turpis dapibus,
                    quis consectetur lectus tristique.
                </p>
                <a href="{{route('contest_listing')}}" class="btn btn-danger" >Go to contest
                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                </a>
            </div>
        </div>
        <div class="item">
            <img src="{{asset('public/assets/images/slider_banner_1.png')}}" class="img-responsive center-block" width="100%" alt="music voting">
            <div class="carousel-caption">
                <h2>the &nbsp; biggest &nbsp; contest &nbsp; is &nbsp; in &nbsp; session!</h2>
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