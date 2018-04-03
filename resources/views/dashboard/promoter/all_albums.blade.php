@extends('layouts.dashboard_index') 
@section('content')
   
  <div class="col-md-9">
    <h3 class="heading_dashboard">
        ARTIST DASHBOARD
    </h3>
    <div class="border_red">
        <h3 class="album">
            MY ALBUMS
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
            ALL VIDEOS &nbsp
        </h3>
      </div>
    </div>
    <hr class="line">
    <div class="row">
      @foreach($album_tracks as $album_track)
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard_album">
              <a href="">
                <video width="100%" height="160px" controls>
                  <source src="{{asset('public/dashboard/musician/tracks/videos/'.$album_track->video)}}" type="video/mp4">             
                </video>
              </a>  
              <h3 class="album_person_name">
        				{{$album_track->name}}
        			</h3>
            </div>
        </div>    
        @endforeach
    </div>  
  </div>
@endsection