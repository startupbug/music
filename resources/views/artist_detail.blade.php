@extends('layouts.public_index')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8">

      @foreach($musician_details as $musician_detail)
        <div class="row">
          <div class="col-md-4">
            <div class="img-side">
              @if($musician_detail->image == 0)
                <img src="{{asset('public/dashboard/profile_images/Default-avatar.jpg')}}" class="img-responsive" style="width: 100%; height: 175px;"/>
              @else
                <img src="{{asset('public/dashboard/profile_images/'.$musician_detail->image)}}" class="img-responsive" style="width: 100%; height: 175px;"/>
              @endif
            </div>
          </div>
          <div class="col-md-8">
            <a href="{{route('profile',['id'=>$musician_detail->id])}}">
            <h1 class="side_heading">
              {{$musician_detail->username}}
            </h1>
            </a>
            <h2 class="sub_heading">
              {{$musician_detail->name}}
            </h2>
            <h2 class="sub_heading">
              @if($musician_detail->albums_no == null)
                No. Of Albums: &nbsp;0
              @else
                No. Of Albums: &nbsp;{{$musician_detail->albums_no}}
              @endif
            </h2>
            <h2 class="sub_heading">
              @if($musician_detail->tracks_no == null)
                No. Of Tracks: &nbsp; 0
              @else
                No. Of Tracks: &nbsp;{{$musician_detail->tracks_no}}
              @endif
            </h2>
            <div class="row">
              <div class="col-md-12">
                <ul>
                  <a href="https://www.instagram.com/" target="_blank">
                    <li class="social_media"><img src="{{asset('public/assets/images/instagram.png')}}"></li>
                  </a>
                  <a href="https://www.facebook.com" target="_blank">
                    <li class="social_media"><img src="{{asset('public/assets/images/facebook.png')}}"></li>
                  </a>
                  <a href="www.twitter.com/" target="_blank">
                    <li class="social_media"><img src="{{asset('public/assets/images/google-plus.png')}}"></li>
                  </a>
                </ul>
              </div>
            </div>
          </div>
        </div>
      @endforeach
      <!--<h3 class="last_heading">TRACKS</h3>-->
        {{ $musician_details->links() }}
    </div>
    <br>
    <div class="col-md-4">
      <h3 class="side_menu">
        ALL ALBUMS
      </h3>
      @foreach($albums_tracks as $album_tracks => $tracks)
      <ul class="nav1">
          <li><a class="s_pointer">{{$album_tracks}}</a>
            <ul class="s_nav_sub">
              @foreach($tracks as $track)
              <li><a href="{{route('musicvoting_genre',['id' => $track->track_id])}}">{{$track->name}}</a></li>
              @endforeach
            </ul>
          </li>
      </ul>
      @endforeach
    </div>
  </div>
</div>
@endsection
