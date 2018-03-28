@extends('layouts.public_index')
@section('content')
<div class="container-fluid bg_gray">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                @if (Session::has('not_activate'))
                    <div class="alert alert-danger">{{ Session::get('not_activate') }}</div>
                @endif
                 @if (Session::has('subscribe'))
                    <div class="alert alert-success">{{ Session::get('subscribe') }}</div>
                @endif
                <div class="playing_heading">
                    <h2 class="wow flipInX" data-wow-duration="2s" data-wow-delay="0.5s">TRENDING &nbsp; TRACKS</h2>
                </div>
                <div class="player_audio">
                    <div class="player_box clearfix">
                        <div class="s_player_left_side col-md-3 col-xs-12 col-sm-12">
                            <a href="#">
                                @if(!empty($abc->track_image) && $abc->track_image)
                                    <img class="img-responsive" src="{{asset('public/dashboard/musician/tracks/images/'.$abc->track_image)}}" alt="" style="height: 260px;">
                                @endif
                            </a>
                        </div>
                        <div class="player_body  col-md-8 col-xs-12 col-sm-12">
                            <h2>NOW &nbsp; PLAYING</h2>
                            <p>Track Name: <span class="track_name">
                            @if(!empty($abc->track_name))
                                {{$abc->track_name}}
                            @endif
                            </span></p>
                            <p>Artist: <span class="artist">
                                @if(!empty($abc->track_name))
                                {{$abc->user_name}}
                                @endif
                            </span>
                            </p>
                            <div class="s_rating_top">
                              Rating:
                              <form  action="" method="" id="">
                                  <span class="rating s_rating" id="">
                                      <span class="fa fa-star-o" data-rating="1" ></span>
                                      <span class="fa fa-star-o" data-rating="2" ></span>
                                      <span class="fa fa-star-o" data-rating="3" ></span>
                                      <span class="fa fa-star-o" data-rating="4" ></span>
                                      <span class="fa fa-star-o" data-rating="5" ></span>
                                      @if(isset($ratings[$abc->track_id]['average']) && $ratings[$abc->track_id]['average'] && !empty($ratings[$abc->track_id]['average']))
                                          <input type="hidden" name="rating_no" id="rating_no" class="rating-value" value="{{$ratings[$abc->track_id]['average']}}">
                                      @else
                                          <input type="hidden" name="rating_no" id="rating_no" class="rating-value" value="">
                                      @endif
                                  </span>
                              </form>
                            </div>
                            <p>Share:
                                <span class="red_color">
                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                    <i class="fa fa-twitter" aria-hidden="true"></i>
                                    <i class="fa fa-google-plus" aria-hidden="true"></i>
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--./End Row Player-->
        <div class="row">
          <div class="col-md-10 col-xs-7 col-sm-7">
            <h3 class="all_album">
                TRACKS &nbsp;
            </h3>
          </div>
          <div class="col-md-2 col-xs-5 col-sm-5">

            <div class="s_btn_random">
                <a href="" value="Refresh Page" onClick="window.location.href=window.location.href" class="btn btn-default" id="refresh_page">
                    <i class="fa fa-random fa-2x" aria-hidden="true"></i>
                </a>
            </div>
          </div>
        </div>
        <hr class="line">
        <div class="row">
        @foreach($tracks as $value)
            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                <div class="songs_box">
                    <a href="{{route('musicvoting_genre',['id' => $value->track_id])}}">
                        <img src="{{asset('public//dashboard/musician/tracks/images/'.$value->track_image)}}" class="img-responsive center-block" style="height: 150px;"/>
                        <div class="mask s_mask">
                        <span class="play_icon">
                            <i class="fa fa-play fa-5x" aria-hidden="true"></i>
                            <span data-img="images/song_img_.png"
                                  data-Tname="Xscape"
                                  data-album="Insurgency" data-artis="Michael Jackson" data-rating="">
                          </span>
                      </span>
                        </div>
                    </a>

                    <p>
                      <a href="#"><b> {{$value->track_name}}</b></a></p>
                    <a href="{{route('profile',['id'=>$value->user_id])}}"><p>{{$value->user_name}}</p></a>
                </div>
            </div>
        @endforeach
        </div>
        <div class="row">
          <div class="col-md-10 col-xs-7 col-sm-7">
            <h3 class="all_album">
                Albums &nbsp;
            </h3>
          </div>
          <div class="col-md-2 col-xs-5 col-sm-5">
            <div class="s_btn_random">
                <a href="" value="Refresh Page" onClick="window.location.href=window.location.href" class="btn btn-default" id="refresh_page">
                    <i class="fa fa-random fa-2x" aria-hidden="true"></i>
                </a>
            </div>
          </div>
        </div>
        <hr class="line">
        <div class="row">
        @foreach($albums as $value)
            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                <div class="songs_box">
                    <a href="{{route('album_view',['id' => $value->album_id])}}">
                        <img src="{{asset('public//dashboard/musician/albums/images/'.$value->album_image)}}" class="img-responsive center-block" style="height:150px;"/>
                    </a>
                    <p><a href="#"><b>{{$value->album_name}}</b></a></p>
                    <a href="{{route('profile',['id'=>$value->album_user_id])}}"><p>{{$value->user_name}}</p></a>
                </div>
            </div>
        @endforeach
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-center clearfix">
                <div class="sign_up_now">
                    <p class="wow flipInX" data-wow-duration="2s" data-wow-delay="0.5s">
                        sign up now to get your tracks featured along
                        with many others
                    </p>
                    <a href="{{route('register')}}" class="btn btn-default wow flipInX" data-wow-duration="2s" data-wow-delay="0.5s"">
                    SIGN UP NOW 
                    </a>
                </div>
            </div>
        </div>
    </div>
</div><!--./End Tradding Trackers-->
<div class="container-fluid bg_color_white how_it_work_main">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="heading_two">
                    <h2 class="wow flipInX" data-wow-duration="2s" data-wow-delay="0.5s">HOW &nbsp; IT &nbsp; WORKS</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
                <div class="work_box wow bounceIn" data-wow-duration="2s" data-wow-delay="0.5s">
                    <img src="{{asset('public/assets/images/user_icon.png')}}" class="img-responsive center-block"/>
                    <h4>register</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque pharetra at augue et
                        facilisis.</p>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
                <div class="work_box wow bounceIn" data-wow-duration="2s" data-wow-delay="0.5s"
                ">
                <img src="{{asset('public/assets/images/upload_icon.png')}}" class="img-responsive center-block"/>
                <h4>upload</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque pharetra at augue et
                    facilisis.</p>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
                <div class="work_box wow bounceIn" data-wow-duration="2s" data-wow-delay="0.5s"
                ">
                <img src="{{asset('public/assets/images/get_famous_icon.png')}}" class="img-responsive center-block"/>
                <h4>Get famous</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque pharetra at augue et
                    facilisis.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-center clearfix">
                <div class="sign_up_now">
                    <p class="wow flipInX" data-wow-duration="2s" data-wow-delay="0.5s">
                        sign up now to get your tracks featured along
                        with many others
                    </p>
                    <a href="{{route('register')}}" class="btn btn-default wow flipInX" data-wow-duration="2s" data-wow-delay="0.5s">
                        SIGN UP NOW
                    </a>
                </div>
            </div>
        </div>
    </div>
</div><!--/End How IT Work -->
<div class="container-fluid bg_gray">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
                <div class="what_we_do wow fadeIn" data-wow-duration="2s" data-wow-delay="0.5s">
                    <h2>what we do</h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque pharetra at augue et facilisis.
                        Phasellus varius velit ut turpis dapibus, quis consectetur lectus tristique. Aliquam dapibus
                        feugiat urna, at facilisis purus elementum a. Aenean condimentum arcu iaculis egestas rutrum.
                        Quisque tempus commodo dolor, a commodo arcu luctus vel.
                    </p>
                    <a href="{{route('register')}}" class="btn btn-default">
                        <span>SIGN UP now</span>
                        and earn with the best!
                    </a>
                </div>
            </div>
                <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 mid-div">
                </div>
                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
                    <div class="laptop_picture wow fadeIn " data-wow-duration="2s" data-wow-delay="0.5s"
                    ">
                    <img src="{{asset('public/assets/images/laptop_img.png')}}" class="img-responsive center-block"/>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid contest_bg">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-center clearfix">
                        <div class="contest_box">
                            <h2 class="wow flipInX" data-wow-duration="2s" data-wow-delay="0.5s">OPEN &nbsp; CONTEST &nbsp; TO &nbsp; SEE &nbsp; WHO’S &nbsp; THE &nbsp; BEST</h2>
                            <p class="wow flipInX" data-wow-duration="2s" data-wow-delay="0.5s">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus commodo ex in sapien
                                euismod,
                                at suscipit lectus blandit. Nam lacinia neque vel sollicitudin ultricies.
                            </p>
                            <a href="#" class="btn btn-default wow flipInX" data-wow-duration="2s"
                               data-wow-delay="0.5s">
                                go to contests now!
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
