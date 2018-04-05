@extends('layouts.public_index')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">Musician Profile</h3>
				</div>
				<div class="panel-body">
					<div class="row">
              <div class="col-md-9 col-lg-9">
              	<table class="table table-user-information">
              		<tbody>
              			<tr>
              				<td>Name:</td>
              				<td>{{$userInfo->name}}</td>
              			</tr>
              			<tr>
              				<td>User Name</td>
              				<td>{{$userInfo->username}}</td>
              			</tr>
              			<tr>
                      <td>Email</td>
                      <td><a href="mailto:info@support.com">{{$userInfo->email}}</a></td>
                    </tr>
                    <tr>
                      <td>No of Albums</td>
                      <td>{{count($albumss)}}</a></td>
                    </tr>
                    <tr>
                      <td>No of Tracks</td>
                      <td>{{count($tracks)}}</a></td>
                    </tr>
                    <tr>
                      <td>Instagram</td>
                      <td><a href="instagram.com">{{$userInfo->instagram}}</a></td>
                    </tr>
                    <tr>
                      <td>Twitter</td>
                      <td><a href="twitter.com">{{$userInfo->twitter}}</a></td>
                    </tr>
                    <tr>
              				<td>Facebook</td>
              			  <td><a href="facebook.com">{{$userInfo->facebook}}</a></td>
              			</tr>
              			<tr>
              			 <td>Phone Number</td>
              			 <td>{{$userInfo->phone}}</td>
              		  </tr>
              	  </tbody>
                </table>
              </div>
            <div class="col-md-3 col-lg-3 " align="center">
              <div class="image_profile">
                @if($userInfo->image == null)
                  <img src="{{asset('public/dashboard/profile_images/default-avatar.png')}}" class="img-circle img-responsive">
                @else
                  <img src="{{asset('public/dashboard/profile_images/'. $userInfo->image )}}" class="img-circle img-responsive">
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@if($userInfo->role_id == '2')
<section class="music_album">
  <div class="container">
    <h1 class="profileName">{{ $userInfo->name}} ALBUMS</h1>
    @foreach($albumss as $album)
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="box">
          <a href="{{route('album_view',['id' => $album->id])}}">
            <div class="dashboard_album">
              <div class="images_person">
                <img src="{{asset('public/dashboard/musician/albums/images/'.$album->image)}}" class="img-responsive">
              </div>
            </div>
          </a>
        </div>
        <h3 class="album_person_name bottom_name">
          {{$album->name}}
        </h3>
      </div>
    @endforeach
     @if(count($albumss) == 0)
      <h1>There is no Albums to display</h1>
    @endif 
  </div>
</section>
<section class="music_track">
  <div class="container">
	  <h1 class="profileName">{{ $userInfo->name}} TRACKS</h1>
    @foreach($tracks as $track)
      <div class="col-md-3 col-sm-6 col-xs-12">
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
					 <a href="{{route('musicvoting_genre',['id' => $track->id])}}">
          <div class="box">
            <div class="dashboard_album">
            <audio  class="audio_thumbnail" controls>
              <source src="horse.ogg" type="audio/ogg">
              <source src="{{asset('public/dashboard/musician/tracks/videos/'.$track->video)}}" type="audio/mpeg">
            Your browser does not support the audio element.
            </audio>
            </div>
          </div>
        </a>
        <h3 class="album_person_name">
          {{$track->name}}
        </h3>
				</div>
				<!-- End Audio Tag -->
      </div>
    @endforeach
    @if(count($tracks) == 0)
      <h1>There is no Track to display</h1>
    @endif 	
  </div>
</section>
@endif
@endsection
