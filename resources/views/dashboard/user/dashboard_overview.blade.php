@extends('layouts.user_index')
@section('content')
<div class="col-md-9">
    <h3 class="heading_dashboard">
        USER &nbsp; DASHBOARD
    </h3>
    <div class="border_red">
        <h3 class="album">
            OVER &nbsp; VIEW
        </h3>
        @if (Session::has('activate'))
            <div class="alert alert-info">{{ Session::get('activate') }}</div>
        @endif
        @if (Session::has('delete'))
            <div class="alert alert-info">{{ Session::get('delete') }}</div>
        @endif
    </div>
    <div class="row">
        <div class="col-md-12 color_bottom">
            <h3 class="all_album">
                TRACKS
            </h3>
            <a href="{{route('all_tracks')}}">
            <h3 class="add_album">
                VIEW ALL
            </h3>
            </a>
        </div>
    </div>
    <hr class="line">
    <div class="row">
        @foreach($tracks as $track)
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard_album">
              <!-- Start Audio Tag -->
              <div class="custom_thumbnail">
                <div class="songs_box image_thumbnail">
                  <a>
                    <img class="" src="https://www.w3schools.com/howto/img_forest.jpg" class="img-responsive center-block" width="100%" height="180px" >
                    <div class="mask s_mask">
                      <span class="play_icon">
                        <i class="fa fa-play fa-5x" aria-hidden="true" style="margin-top: 30%;"></i>
                      </span>
                    </div>
                  </a>
                </div>
                <audio  class="audio_thumbnail" style="width:100%; padding:0px;" controls>
                    <source src="horse.ogg" type="audio/ogg">
                    <source src="http://www.jplayer.org/audio/m4a/Miaow-07-Bubble.m4a" type="audio/mpeg">
                  Your browser does not support the audio element.
                </audio>
              </div>
              <!-- End Audio Tag -->
                <a href="{{route('musicvoting_genre',['id' => $track->id])}}">
                  <img class="" src="https://www.w3schools.com/howto/img_forest.jpg" class="img-responsive center-block" width="100%" height="180" >
                  <audio controls class="col-md-12" style="padding:0px;">
                        <source src="{{asset('public/dashboard/musician/tracks/videos/'.$track->video)}}" type="video/mp4">
                  </audio>
                </a>
            </div>
            <h3 class="album_person_name">
                {{$track->name}}
            </h3>
                <h3 class="album_person_name">
                     <b>By</b><a href="{{route('profile',['id'=>$track->user_id])}}"> {{$track->user_name}}</a>
                </h3>
        </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-md-12 color_bottom">
            <h3 class="all_album">
                ALBUMS
            </h3>
            <h3 class="add_album">
                VIEW ALL
            </h3>
        </div>
    </div>
    <hr class="line">
    <div class="row">

        @foreach($albums as $album)
        <div class="col-md-3 col-sm-6 col-xs-12">
            <a href="{{route('user_album_videos',['id' => $album->id])}}">
            <div class="dashboard_album">
                <img src="{{asset('public/dashboard/musician/albums/images/'.$album->image)}}" class="img-responsive" style="height: 170px; width: 100%;">
            </div>
            </a>
            <h3 class="album_person_name">
                {{$album->name}}
            </h3>
                <h3 class="album_person_name">
                     <b>By</b> <a href="{{route('profile',['id'=>$album->user_id])}} ">{{$album->user_name}}</a>
                </h3>
        </div>
        @endforeach
    </div>
</div>
@endsection
