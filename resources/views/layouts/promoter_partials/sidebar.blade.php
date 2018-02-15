<?php
use App\User;
$users = User::select('name','image')->where('id',Auth::user()->id)->first();
?>
<div class="col-md-3 color_bg">
	<div class="dashboard_name">
		<!-- <form action="{{ route('musicianImageUpload') }}" enctype="multipart/form-data" method="POST">
			<div class="alert alert-danger print-error-msg" style="display:none">
			<ul></ul>
			</div>
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="form-group">

			<img src="{{asset('/dashboard/musician_image/'. $users->image )}}" class="img-responsive">
			<input type="file" name="image" class="form-control">
			</div>
			<div class="form-group">
			<button class="btn btn-success upload-image" type="submit">Upload Image</button>
			</div>
		</form> -->
		<div class="image-box" style="height: 198px;">
			<img src="{{asset('/dashboard/promoter_images/'. $users->image )}}" class="img-responsive">
			<form action="{{route('promoterImageUpload')}}" method="post" enctype="multipart/form-data" id="change_profile">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="camera_image">
					<i class="fa fa-camera fa-2x" aria-hidden="true"></i>
					<input type="file" name="image" id="change_profile">
				</div>
			</form>
		</div>
	</div>
	<h3 class="name_person">
		{{$users->name}}
	</h3>
	<div class="row">
		<div class="col-md-6 col-sm-6 col-xs-12">
			<div class="side_border">
				<div class="side_img"><img src="{{asset('/assets/images/side_one.png')}}" class="img-responsive"></div>
				<p class="side_heading">
					500
				</p>
				<p class="side_paragraph">
					POINTS
				</p>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-xs-12">
			<div class="side_border">
				<a href="{{route('promoterdashboard')}}">
				<div class="side_img"><img src="{{asset('/assets/images/side_two.png')}}" class="img-responsive"></div>
				<p class="side_paragraph">
					OVERVIEW
				</p>
				</a>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 col-sm-6 col-xs-12">
			<div class="side_border">
				<div class="side_img"><img src="{{asset('/assets/images/side_three.png')}}" class="img-responsive"></div>
				<a href="">
					<p class="side_paragraph">
						INVITATIONS
					</p>
				</a>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-xs-12">
			<div class="side_border">
				<a href="{{route('promotermusicvoting_tracks')}}">
				<div class="side_img"><img src="{{asset('/assets/images/side_four.png')}}" class="img-responsive"></div>
				<p class="side_paragraph">
					MY TRACKS
				</p>
			</a>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 col-sm-6 col-xs-12">
			<div class="side_border">
				 <?php
        			$promoter_id = Auth::user()->id;
        		?>
				<a href="{{route('promotersetting')}}">
				<div class="side_img"><img src="{{asset('/assets/images/side_five.png')}}" class="img-responsive"></div>
				<p class="side_paragraph">
					SETTINGS
				</p>
			</a>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-xs-12">
			<div class="side_border">
				<a href="{{route('promoterredeempoint')}}">
				<div class="side_img"><img src="{{asset('/assets/images/side_six.png')}}" class="img-responsive"></div>
				<p class="side_paragraph">
					REDEEMPOINTS
				</p>
			</a>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="last_border">
				<a href="{{route('logout_promoter')}}">
				<p class="side_para">
					LOGOUT
				</p>
				</a>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="last_feature">
				<p class="account">GET MY ACCOUNT</p>
				<p class="feature">FEATURED</p>
			</div>
			<span class="glyphicon glyphicon-play"></span>
		</div>
	</div>
</div>