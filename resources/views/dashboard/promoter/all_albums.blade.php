@extends('layouts.dashboard_index')
@section('content')

  <div class="col-md-9">
    <h3 class="heading_dashboard">
      PROMOTER &nbsp; DASHBOARD
    </h3>
    <div class="border_red">
        <h3 class="album">
            MY &nbsp; ALBUMS
        </h3>
    </div>
    <div class="row">
      @foreach($albums as $album)
      <!-- <div class="col-md-10 color_bottom">
        <img src="{{asset('public/dashboard/musician/albums/images/'.$album->image)}}">
          <h3 class="all_album">
              {{$album->name}}
          </h3>
      </div> -->
      <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="box">
        <div class="dashboard_album">
          <img src="{{asset('public/dashboard/musician/albums/images/'.$album->image)}}" class="img-responsive custom-image-dashboard" >
        </div>
      </div>
      <h3 class="album_person_name">
        {{$album->name}}
      </h3>
    </div>
      @endforeach
    </div>
    <div class="row">
      <div class="col-md-10 color_bottom">
        <h3 class="all_album">
            ALL &nbsp; VIDEOS &nbsp;
        </h3>
      </div>
    </div>
    <hr class="line">
    <div class="row">
      @foreach($album_tracks as $album_track)
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard_album">
              <!-- Start Audio Tag -->
              <div class="custom_thumbnail">
                <div class="songs_box image_thumbnail">
                  <a>
                    <img class="" src="https://www.w3schools.com/howto/img_forest.jpg" class="img-responsive center-block" width="100%" >
                    <div class="mask s_mask">
                      <span class="play_icon">
                        <i class="fa fa-play fa-5x" aria-hidden="true" style="margin-top: 18%;"></i>
                      </span>
                    </div>
                  </a>
                </div>
                <a href="{{route('musicvoting_genre',['id' => $album_track->id])}}">
                <audio  class="audio_thumbnail" style="width:100%; padding:0px;" controls>
                    <source src="horse.ogg" type="audio/ogg">
                    <source src="{{asset('public/dashboard/musician/tracks/videos/'.$album_track->video)}}" type="audio/mpeg">
                  Your browser does not support the audio element.
                </audio>
              </a>
              </div>
              <!-- End Audio Tag -->
              <h3 class="album_person_name">
        				{{$album_track->name}}
        			</h3>
            </div>
        </div>
        @endforeach
    </div>
  </div>
@endsection
