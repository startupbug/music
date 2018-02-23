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
                      <td>Account Type</td>
                      <td>{{$roles->name}}</a></td>
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
          <div class="col-md-3 col-lg-3 " align="center"> <div class="image_profile">
            <img src="{{asset('/dashboard/profile_images/'. $userInfo->image )}}" class="img-circle img-responsive">
          </div>
      </div>
  </div>
</div>
</div>
</div>
</div>
</div>
@if($userInfo->role_id == '2')
<section class="music_track">
  <div class="container">
    	<div class="row">
    	  <h1 class="profileName">{{ $userInfo->name}} TRACKS</h1>
        @foreach($tracks as $track)
          <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="box">  
            <div class="dashboard_album">        
                <video width="100%" height="160px" controls>
                    <source src="{{asset('/dashboard/musician/tracks/videos/'.$track->video)}}" type="video/mp4">             
                </video>               
            </div> 
          </div>      
            <h3 class="album_person_name">
              {{$track->name}}
            </h3>      
          </div>
        @endforeach 
    	</div>
  </div>
</section>
@endif
@endsection