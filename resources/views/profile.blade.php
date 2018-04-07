@extends('layouts.public_index')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-3">
					<div class="img-side">
							@if($userInfo->image)
							<img src="{{asset('public/assets/images/album_one.png')}}" class="img-responsive" style="width: 100%; height: 180px;"/>
							@else
							<img src="{{asset('public/dashboard/profile_images/'. $userInfo->image )}}" class="img-responsive" style="width: 100%; height: 180px;"/>
							@endif
					</div>
				</div>
				<div class="col-md-3">
					<a href="{{route('profile',['id'=>$userInfo->id])}}">
						<h1 class="side_heading">
							{{$userInfo->username}}
						</h1>
					</a>
					<h2 class="sub_heading">
						{{$userInfo->name}}
					</h2>
					<h2 class="sub_heading">
							No. Of Albums: &nbsp;{{count($albumss)}}
					</h2>
					<h2 class="sub_heading">
							No. Of Tracks: &nbsp; {{count($tracks)}}
					</h2>
				</div>

				<div class="col-md-3 img-side">
					<h2 class="sub_heading">
						<i class="fa fa-phone" style="color:#464646"> </i> {{$userInfo->phone}}
					</h2>
					<h2 class="sub_heading">
						<i class="fa fa-envelope" style="color:#464646"> </i> {{$userInfo->email}}
					</h2>
					<br>
					<div class="row">
            <div class="col-md-3 col-lg-3 " align="center">
            </div>
          </div>
        </div>
      </div>
						<div class="col-md-12">
							<ul>
								<a href="https://www.instagram.com/{{$userInfo->instagram}}" target="_blank">
									<li class="social_media"><img src="{{asset('public/assets/images/instagram.png')}}"></li>
								</a>
								<a href="https://www.facebook.com/{{$userInfo->facebook}}" target="_blank">
									<li class="social_media"><img src="{{asset('public/assets/images/facebook.png')}}"></li>
								</a>
								<a href="https://www.twitter.com/{{$userInfo->twitter}}" target="_blank">
									<li class="social_media"><img src="{{asset('public/assets/images/twitter.png')}}"></li>
								</a>
							</ul>
						</div>
					</div>
				</div>
			</div>
</div><br>
@if($userInfo->role_id == '2')
<section class="music_album">
  <div class="container">
    <h1 class="profileName">{{ $userInfo->name}} ALBUMS</h1>
    @if(empty($albums))
    <h1 class="not_display_data">There is no album to display</h1>
    @endif
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
  </div>
</section>
<section class="music_track">
  <div class="container">
	  <h1 class="profileName">{{ $userInfo->name}} TRACKS</h1>
    @if(empty($albumss))
    <h1 class="not_display_data">There is no albums to display</h1>
    @endif
    @foreach($tracks as $track)
      <div class="col-md-3 col-sm-6 col-xs-12">
				<!-- Start Audio Tag -->
				<div class="custom_thumbnail">
					<div class="songs_box image_thumbnail">
						<a href="{{route('musicvoting_genre',['id' => $track->id])}}">
							<img class="" src="https://www.w3schools.com/howto/img_forest.jpg" class="img-responsive center-block" width="100%" >
							<div class="mask s_mask">
								<span class="play_icon">
									<i class="fa fa-play fa-5x" aria-hidden="true" style="margin-top: 18%;"></i>
								</span>
							</div>
						</a>
					</div>
					 <a href="{{route('musicvoting_genre',['id' => $track->id])}}">
					<audio  class="audio_thumbnail" controls>
							<source src="horse.ogg" type="audio/ogg">
							<source src="{{asset('public/dashboard/musician/tracks/videos/'.$track->video)}}" type="audio/mpeg">
						Your browser does not support the audio element.
					</audio>
				</div>
				<!-- End Audio Tag -->



        <!-- <a href="{{route('musicvoting_genre',['id' => $track->id])}}">
>>>>>>> 928b8c95e1f34734a6943af59061db302edda8ff
          <div class="box">
            <div class="dashboard_album">
            <audio  class="audio_thumbnail" controls>
              <source src="horse.ogg" type="audio/ogg">
              <source src="{{asset('public/dashboard/musician/tracks/videos/'.$track->video)}}" type="audio/mpeg">
            Your browser does not support the audio element.
            </audio>
            </div>
          </div>
        </a> -->
        <h3 class="album_person_name">
          {{$track->name}}
        </h3>
				</div>
				<!-- End Audio Tag -->
      </div>
    @endforeach
    @if(count($tracks) == 0)
      <h1 class="not_display_data">There is no Track to display</h1>
    @endif 	
  </div>
	<br>
</section>
@endif
@endsection
