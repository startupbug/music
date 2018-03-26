@extends('layouts.public_index')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-11 col-md-offset-1">
    </div>
  </div>
</div>
<div class="container">
  <div class="row border">
    <div class="col-md-6">
      <h1 class="left_heading">TRACKS</h1>
    </div>
  </div>
</div>
<div class="container images_video">
  <div class="row">
      @if(count($searching_tracks) == 0)
        <h1>No track available with this name</h1>
      @else
        @foreach($searching_tracks as $searching_track)
          <div class="col-xs-12 col-sm-6 col-md-2 change_width">
            <a href="{{route('musicvoting_genre',['id' => $searching_track->id])}}">
              <div class="images_person"><img src="{{asset('public/dashboard/musician/tracks/images/'.$searching_track->image)}}" class="img-responsive"></div>
            </a>
            <h3 class="artist">
              {{$searching_track->name}}
            </h3>
          </div> 
        @endforeach
    @endif
  </div>
</div>
<div class="container">
  <div class="row border">
    <div class="col-md-6">
      <h1 class="left_heading">ARTIST</h1>
    </div>
    <div class="col-md-6">
      <h1 class="right_heading">SEE MORE</h1>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">

    @if(count($searching_users) == 0)
      <h1>No track available with this name</h1>
    @else
    @foreach($searching_users as $searching_user)
      <div class="col-md-2 col-md-6 col-md-12 width_change">
        <a href="{{route('profile',['id'=>$searching_user->id])}}">
        <div class="images_person">
          @if($searching_user->image == null || $searching_user->image == 0)
          <img src="{{asset('public/dashboard/profile_images/Default-avatar.jpg')}}" class="img-responsive">
          @else
          <img src="{{asset('public/dashboard/profile_images/'.$searching_user->image)}}" class="img-responsive">
          @endif
        </div>
      </a>
      <h3 class="artist">{{$searching_user->name}}
      </h3>
    </div>
    @endforeach
    @endif
  </div>
</div>
<div class="container">
  <div class="row border">
    <div class="col-md-6">
      <h1 class="left_heading">ALBUMS</h1>
    </div>
  </div>
</div>
 <div class="container">
  <div class="row">
    @if(count($searching_albums) == 0)
      <h1 class="album_available">No Album available with this name</h1>
    @else
    @foreach($searching_albums as $searching_album)
    <div class="col-md-2 col-md-6 col-md-12 width_change">
      <a href="{{route('album_view',['id' => $searching_album->id])}}">
          <div class="images_person"><img src="{{asset('public/dashboard/musician/albums/images/'.$searching_album->image)}}" class="img-responsive">
          </div>
      </a>
      <h3 class="artist">
        {{$searching_album->name}}
      </h3>
    </div>
    @endforeach
    @endif
  </div>
</div>

@endsection